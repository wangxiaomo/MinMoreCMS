<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 后台用户服务
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Admin\Service;

class User {

    //存储用户uid的Key
    const userUidKey = 'spf_userid';
    //超级管理员角色id
    const administratorRoleId = 1;

    //当前登录会员详细信息
    private static $userInfo = array();

    /**
     * 连接后台用户服务
     * @staticvar \Admin\Service\Cache $systemHandier
     * @return \Admin\Service\Cache
     */
    static public function getInstance() {
        static $handier = NULL;
        if (empty($handier)) {
            $handier = new User();
        }
        return $handier;
    }

    /**
     * 魔术方法
     * @param type $name
     * @return null
     */
    public function __get($name) {
        //从缓存中获取
        if (isset(self::$userInfo[$name])) {
            return self::$userInfo[$name];
        } else {
            $userInfo = $this->getInfo();
            if (!empty($userInfo)) {
                return $userInfo[$name];
            }
            return NULL;
        }
    }

    /**
     * 获取当前登录用户资料
     * @return array 
     */
    public function getInfo() {
        if (empty(self::$userInfo)) {
            self::$userInfo = $this->getUserInfo($this->isLogin());
        }
        return !empty(self::$userInfo) ? self::$userInfo : false;
    }

    /**
     * 检验用户是否已经登陆
     * @return boolean 失败返回false，成功返回当前登陆用户基本信息
     */
    public function isLogin() {
        $userId = \Libs\Util\Encrypt::authcode(session(self::userUidKey), 'DECODE');
        if (empty($userId)) {
            return false;
        }
        return (int) $userId;
    }

    private function get_virtual_role($r) {
        if($r){
            $department_id = $r['ouoid'];
            C("DB_PREFIX", "huoyi_");
            $result = D("Office")->where("oid=$department_id")->find();
            C("DB_PREFIX", "minmore_");
            return $result?$result['oname'] . ' ' . $r['ouwork']:'';
        }
    }

    private function get_mock_role_id($r){
        if($r && $r['virtual_user'] && $r['role']){
            $result = D("Role")->where("name='" . $r['role'] . "'")->find();
            return $result?$result['id']:self::administratorRoleId;
        }
    }

    private function update_virtual_user($r){
        if($r){
            $r['id'] = $r['ouid'];
            $r['username'] = $r['oucompellation'];
            $r['role'] = $this->get_virtual_role($r);
            $r['virtual_user'] = true;
            $r['status'] = 1;
            $r['role_id'] = $this->get_mock_role_id($r);
        }
        return $r;
    }

    private function check_virtual_user_login($username, $password) {
        if(empty($username) || empty($password)) return false;
        $conditions = array(
            'oucompellation' => $username,
            'oupwd' => md5($password)
        );
        C("DB_PREFIX", "huoyi_");
        $r = D("OfficeUser")->where($conditions)->find();
        $r = $this->update_virtual_user($r);
        C("DB_PREFIX", "minmore_");
        return $r;
    }

    public function get_virtual_user_by_id(int $id){
        
        C("DB_PREFIX", "huoyi_");
        $r = D("OfficeUser")->where("ouid=$id")->find();
        $r = $this->update_virtual_user($r);
        C("DB_PREFIX", "minmore_");
        return $r;
    }

    //登录后台
    public function login($identifier, $password) {
        if (empty($identifier) || empty($password)) {
            return false;
        }
        //验证
        $userInfo = $this->getUserInfo($identifier, $password);
        if (false == $userInfo) {
            //wangxiaomo:hack admin auth. check virtual user
            $userInfo = $this->check_virtual_user_login($identifier, $password);
            if(!$userInfo){
                //记录登录日志
                $this->record($identifier, $password, 0);
                return false;
            }
        }
        //记录登录日志
        $this->record($identifier, $password, 1);
        //注册登录状态
        $this->registerLogin($userInfo);
        return true;
    }

    public function is_virtual_user() {
        $userInfo = $this->getInfo();
        return $userInfo['virtual_user'];
    }

    /**
     * 检查当前用户是否超级管理员
     * @return boolean
     */
    public function isAdministrator() {
        $userInfo = $this->getInfo();
        if (!empty($userInfo) && $userInfo['role_id'] == self::administratorRoleId) {
            return true;
        }
        return false;
    }

    /**
     * 注销登录状态
     * @return boolean
     */
    public function logout() {
        session('[destroy]');
        return true;
    }

    /**
     * 记录登陆日志
     * @param type $identifier 登陆方式，uid,username
     * @param type $password 密码
     * @param type $status
     */
    private function record($identifier, $password, $status = 0) {
        //登录日志
        D('Admin/Loginlog')->addLoginLogs(array(
            "username" => $identifier,
            "status" => $status,
            "password" => $status ? '密码保密' : $password,
            "info" => is_int($identifier) ? '用户ID登录' : '用户名登录',
        ));
    }

    /**
     * 注册用户登录状态
     * @param array $userInfo 用户信息
     */
    private function registerLogin(array $userInfo) {
        //写入session
        session(self::userUidKey, \Libs\Util\Encrypt::authcode((int) $userInfo['id'], ''));
        //更新状态
        if(empty($userInfo['virtual_user'])){
            D('Admin/User')->loginStatus((int) $userInfo['id']);
        }
        //注册权限
        \Libs\System\RBAC::saveAccessList((int) $userInfo['id']);
    }

    /**
     * 获取用户信息
     * @param type $identifier 用户名或者用户ID
     * @return boolean|array
     */
    private function getUserInfo($identifier, $password = NULL) {
        if (empty($identifier)) {
            return false;
        }
        $userInfo = D('Admin/User')->getUserInfo($identifier, $password);
        if(!$userInfo){
            $userInfo = $this->get_virtual_user_by_id((int)$identifier);
        }
        return $userInfo;
    }
}
