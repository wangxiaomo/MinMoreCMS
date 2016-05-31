<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 后台登录日志
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class LoginlogModel extends Model {

    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('logintime', 'time', 1, 'function'),
        array('loginip', 'get_client_ip', 3, 'function'),
    );

    /**
     * 删除一个月前的日志
     * @return boolean
     */
    public function deleteAMonthago($role) {
        $r = D("User")->where("role_id=$role")->field("username")->select();
        foreach($r as $v){
            $usernames[] = $v["username"];
        }
        $status = $this->where(array(
            "logintime" => array("lt", time() - (86400 * 30)),
            "username"  => array("in", $usernames),
        ))->delete();
        return $status !== false ? true : false;
    }

    /**
     * 添加登录日志
     * @param array $data
     * @return boolean
     */
    public function addLoginLogs($data) {
        $this->create($data);
        return $this->add() !== false ? true : false;
    }

}
