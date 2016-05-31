<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 网站后台日志管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class LogsController extends AdminBase {

    //后台登陆日志
    public function loginlog() {
        if (IS_POST) {
            $this->redirect('loginlog', $_POST);
        }
        $where = array();
        $username = I('username');
        $start_time = I('start_time');
        $end_time = I('end_time');
        $loginip = I('loginip');
        $status = I('status');
        if (!empty($username)) {
            $where['username'] = array('like', '%' . $username . '%');
        }elseif($this->isSiteUser()){
            $role = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
            $r = D("User")->where("role_id=$role")->field("username")->select();
            foreach($r as $v){
                $usernames[] = $v["username"];
            }
            $where['username'] = array('in', $usernames);
        }
        if (!empty($start_time) && !empty($end_time)) {
            $start_time = strtotime($start_time);
            $end_time = strtotime($end_time) + 86399;
            $where['logintime'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
        }
        if (!empty($loginip)) {
            $where['loginip '] = array('like', "%{$loginip}%");
        }
        if ($status != '') {
            $where['status'] = $status;
        }
        $model = D("Admin/Loginlog");
        $count = $model->where($where)->count();
        $page = $this->page($count, 20);
        $data = $model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array('id' => 'DESC'))->select();

        $this->assign("isSuperUser", $this->isSuperUser());
        $this->assign("Page", $page->show())
                ->assign("data", $data)
                ->assign('where', $where)
                ->display();
    }

    //删除一个月前的登陆日志
    public function deleteloginlog() {
        $role = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
        if (D("Admin/Loginlog")->deleteAMonthago($role)) {
            $this->success("删除登陆日志成功！");
        } else {
            $this->error("删除登陆日志失败！");
        }
    }

    //操作日志查看
    public function index() {
        if (IS_POST) {
            $this->redirect('index', $_POST);
        }
        $uid = I('uid');
        $start_time = I('start_time');
        $end_time = I('end_time');
        $ip = I('ip');
        $status = I('status');
        $where = array();
        if (!empty($uid)) {
            $where['uid'] = array('eq', $uid);
        }elseif($this->isSiteUser()){
            $role = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
            $r = D("User")->where("role_id=$role")->field("id")->select();
            foreach($r as $v){
                $uids[] = $v["id"];
            }
            $where['uid'] = array('in', $uids);
        }
        if (!empty($start_time) && !empty($end_time)) {
            $start_time = strtotime($start_time);
            $end_time = strtotime($end_time) + 86399;
            $where['time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
        }
        if (!empty($ip)) {
            $where['ip '] = array('like', "%{$ip}%");
        }
        if ($status != '') {
            $where['status'] = (int) $status;
        }
        $count = M("Operationlog")->where($where)->count();
        $page = $this->page($count, 20);
        $Logs = M("Operationlog")->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "desc"))->select();
        $this->assign("isSuperUser", $this->isSuperUser());
        $this->assign("Page", $page->show());
        $this->assign("logs", $Logs);
        $this->display();
    }

    //删除一个月前的操作日志
    public function deletelog() {
        $role = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
        if (D("Admin/Operationlog")->deleteAMonthago($role)) {
            $this->success("删除操作日志成功！");
        } else {
            $this->error("删除操作日志失败！");
        }
    }

}
