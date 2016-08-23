<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 推荐位管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Content\Controller;

use Common\Controller\AdminBase;

class AdvertiseController extends AdminBase {

	public function _initialize() {
		parent::_initialize();
		$this->role = get_site_role();
		$this->db = D('Content/Advertise');
		$this->assign("isSuperUser", $this->isSuperUser());
	}

	//广告位列表
	public function index() {
		$where['roleid']=$this->role;
		$data = M('Advertise')->where($where)->order(array('status'=>'DESC','type'=>'ASC','id' => 'DESC'))->select();
		$this->assign('data', $data)
			->display();
	}


	//添加广告
	public function add() {
		if (IS_POST) {
			$post=I('post.');
			$post['roleid'] = $this->role;
			if (!empty($_FILES['picture']['tmp_name'])) {
				$info = $this->upload();
				if (!empty($info[0]['url'])) {
					$post['picture'] = $info[0]['url'];
				}
			}
			if ($this->db->advertiseAdd($post)) {
				$this->success("添加成功！", U("Content/Advertise/index"));
			} else {
				$this->error($this->db->getError());
			}
		}else{ 
			$this->display();
		}
	}
	//图片上传
	public function upload() {
		$config=array();
		$upload = new \Libs\Driver\Attachment\Local($config);
		$info = $upload->upload();
		if (!$info) {
			$this->error($upload->getErrorMsg());
		} else {
			return $info;
		}
	}
	//删除
	public function delete() {
		if (IS_POST) {
			$ids = I('post.ids');
		} else {
			$ids = I('get.id', 0, 'intval');
		}
		if (empty($ids)) {
			$this->error('请指定需要删除的广告！');
		}
		if ($this->db->advertiseDel($ids)) {
			$this->success('广告删除成功！');
		} else {
			$error = $this->db->getError();
			$this->error($error ? $error : '删除失败！');
		}
	}

	public function operate() {
		if (IS_POST) {
			$id= I('post.id');
		} else {
			$id= I('get.id', 0, 'intval');
		}
		if (empty($id)) {
			$this->error('请指定需要修改的广告！');
		}
		$op=I('op');
		$name=I('name');
		if($name=='status'){
		$value=($op=='open')?1:0;
		}
		if ($this->db->advertiseOp($id,$name,$value)) {
			$this->success('操作成功！');
		} else {
			$error = $this->db->getError();
			$this->error($error ? $error : '操作失败！');
		}
	}
}
