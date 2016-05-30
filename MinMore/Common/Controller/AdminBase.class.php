<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 后台Controller
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Common\Controller;

use Admin\Service\User;
use Libs\System\RBAC;

//定义是后台
define('IN_ADMIN', true);

class AdminBase extends MinMoreCMS {

    //初始化
    protected function _initialize() {
        C(array(
            "USER_AUTH_ON" => true, //是否开启权限认证
            "USER_AUTH_TYPE" => 1, //默认认证类型 1 登录认证 2 实时认证
            "REQUIRE_AUTH_MODULE" => "", //需要认证模块
            "NOT_AUTH_MODULE" => "Public", //无需认证模块
            "USER_AUTH_GATEWAY" => U("Admin/Public/login"), //登录地址
        ));
        if (false == RBAC::AccessDecision(MODULE_NAME)) {
            //检查是否登录
            if (false === RBAC::checkLogin()) {
                //跳转到登录界面
                redirect(C('USER_AUTH_GATEWAY'));
            }
            //没有操作权限
            $this->error('您没有操作此项的权限！');
        }
        parent::_initialize();
        //验证登录
        if($this->competence()){
            $this->syncAdminRole();
        }
    }

    private function syncAdminRole() {
        $request_domain = get_request_domain();
        $user = User::getInstance()->getInfo();
        \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"] = $user["role_id"];
        $r = D("Role")->where("id=" . $user["role_id"])->find();
        if($r["level"] && $request_domain != $r["domain"]){
            User::getInstance()->logout();
            $this->error(
                "即将为您跳转到正确的登录后台，请重新登录!",
                "http://" . $r["domain"] . "/admin.php"
            );
        }
    }

    protected function isSuperUser() {
        $role_id = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
        return intval($role_id) === 1;
    }

    protected function isSiteUser($cache=true) {
        if($cache){
            $r = cache(C("MINMORE_CACHE_PREFIX") . "is_site_user");
            if($r) return $r;
        }
        $role_id = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
        $role = D("Role")->where("id=$role_id")->find();
        $r = (bool)$role && $role["parentid"] == C("SITE_ROLE_PARENT");
        cache(C("MINMORE_CACHE_PREFIX") . "is_site_user", $r);
        return $r;
    }

    /**
     * 验证登录
     * @return boolean
     */
    private function competence() {
        //检查是否登录
        $uid = (int) User::getInstance()->isLogin();
        if (empty($uid)) {
            return false;
        }
        //获取当前登录用户信息
        $userInfo = User::getInstance()->getInfo();
        if (empty($userInfo)) {
            User::getInstance()->logout();
            return false;
        }
        //是否锁定
        if (!$userInfo['status']) {
            User::getInstance()->logout();
            $this->error('您的帐号已经被锁定！', U('Public/login'));
            return false;
        }
        return $userInfo;
    }

    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    final public function error($message = '', $jumpUrl = '', $ajax = false) {
        D('Admin/Operationlog')->record($message, 0);
        parent::error($message, $jumpUrl, $ajax);
    }

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    final public function success($message = '', $jumpUrl = '', $ajax = false) {
        D('Admin/Operationlog')->record($message, 1);
        parent::success($message, $jumpUrl, $ajax);
    }

    /**
     * 分页输出
     * @param type $total 信息总数
     * @param type $size 每页数量
     * @param type $number 当前分页号（页码）
     * @param type $config 配置，会覆盖默认设置
     * @return type
     */
    protected function page($total, $size = 20, $number = 0, $config = array()) {
        $Page = parent::page($total, $size, $number, $config);
        $Page->SetPager('default', '<span class="all">共有{recordcount}条信息</span>{first}{prev}{liststart}{list}{listend}{next}{last}');
        return $Page;
    }

}
