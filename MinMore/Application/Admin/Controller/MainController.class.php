<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 后台框架首页
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Admin\Service\User;
use Common\Controller\AdminBase;

class MainController extends AdminBase {

	protected function _initialize() {

		parent::_initialize();
		$userInfo = User::getInstance()->getInfo();
		$this->deptid=$userInfo['ouoid']?$userInfo['ouoid']:0;
	}

    public function index() {
        //服务器信息
        $info = array(
            '操作系统' => PHP_OS,
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            'MYSQL版本' => mysql_get_server_info(),
            '产品名称' => '<font color="#FF0000">' . MINMORE_APPNAME . '</font>',
            '产品版本' => '<font color="#FF0000">' . MINMORE_VERSION . '</font>',
            '产品流水号' => '<font color="#FF0000">' . MINMORE_BUILD . '</font>',
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . "秒",
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
        );

		$todo=array(
				'局长信箱'=>array('link'=>U('DirectorMail/Admin/index'),'count'=>$this->getTodoCount($this->deptid,1)),
				'代表委员信箱'=>array('link'=>U('DirectorMail/Memberadmin/index'),'count'=>$this->getTodoCount($this->deptid,2)),
				'网上举报'=>array('link'=>U('DirectorMail/Consultadmin/index',array('type'=>'wsjb')),'count'=>$this->getTodoCount($this->deptid,3,'wsjb')),
				'群众投诉'=>array('link'=>U('DirectorMail/Consultadmin/index',array('type'=>'qzts')),'count'=>$this->getTodoCount($this->deptid,3,'qzts')),
				'网上咨询'=>array('link'=>U('DirectorMail/Consultadmin/index',array('type'=>'wszx')),'count'=>$this->getTodoCount($this->deptid,3,'wszx')),
				'建言献策'=>array('link'=>U('DirectorMail/Consultadmin/index',array('type'=>'jyxc')),'count'=>$this->getTodoCount($this->deptid,3,'jyxc')),
				'网上信访'=>array('link'=>U('DirectorMail/AdminPetition/index'),'count'=>$this->getTodoCount($this->deptid,4))
				);

        $this->assign('todo_list', $todo);
        $this->assign('server_info', $info);
        $this->display();
    }

    public function public_server() {
        $post = array(
            'domain' => $_SERVER['SERVER_NAME'],
        );
        $cache = S('_serverinfo');
        if (!empty($cache)) {
            $data = $cache;
        } else {
            $data = $this->Cloud->data($post)->act('get.serverinfo');
            S('_serverinfo', $data, 300);
        }
        if (!empty($_COOKIE['notice_' . $data['notice']['id']])) {
            $data['notice']['id'] = 0;
        }
        if (version_compare(MINMORE_VERSION, $data['latestversion']['version'], '<')) {
            $data['latestversion'] = array(
                'status' => true,
                'version' => $data['latestversion'],
            );
        } else {
            $data['latestversion'] = array(
                'status' => false,
                'version' => $data['latestversion'],
            );
        }
        $this->ajaxReturn($data);
    }

	private function getTodoCount($deptid=null,$mailtype=null,$subtype=null){
		$mWorkflow=M('workflow');
		$map['status']=array('eq',0);
		if($mailtype!=null){
			$where['mailtype']=$mailtype;
		}
		if($subtype!=null){
			$where['subtype']=$subtype;
		}
		if($deptid!=null){
			$where['deptid']=$deptid;
		}else{
			$where['deptid']='0';
		}
			$count=$mWorkflow->where($map)->where($where)->count();
			$count=$count?$count:0;
			return $count;
	}

}
