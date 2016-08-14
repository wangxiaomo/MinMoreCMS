<?php

namespace DirectorMail\Controller;

use Common\Controller\AdminBase;

class ConsultadminController extends AdminBase {

    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->db = D('DirectorMail/Consult');
    }

    //后台首页
    public function index() {
	$status=I('get.status');
        $type = I('get.type');
        $query= I('post.keyword');
        $where = array(
                'roleid' => get_site_role(),
                'type' => I('get.type'),
            );
	if($status!=""){
		$where['hfnr']=$status?array('NEQ',''):array('EQ','');
	}
        if (!empty($query)) {
		$where['xm|xjzt|sjhm']=array('LIKE',"%".$query."%");
        }
        $count = $this->db->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
        $this->assign('data', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->assign("typeid", $status);
        $this->assign("type", $type);
        $this->display();
    }

    //信件回复
    public function reply() {
        if (IS_POST) {
            $id = I('post.id', 0, 'intval');
            if (empty($id)) {
                $this->error('回复信件错误！');
            }
            $info = $this->db->where(array('id' => $id))->find();
            if (empty($info)) {
                $this->error('该信件不存在！');
            }
            $reply = I('post.reply');
            $qreply = I('post.quickreply');
            if (empty($reply) && empty($qreply)) {
                $this->error('回复内容不能为空！');
            }
            if ($this->db->replyConsult(array('id' => $id, 'hfnr' => $reply))) {
                $this->success('回复成功！', U('index', "isadmin=1"));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '回复失败！');
            }
        } else {
            $id = I('get.id', 0, 'intval');
            $info = $this->db->where(array('id' => $id))->find();
            $quickreply = M('DirectormailQuickreply')->getField('quickreply', true);
            if (empty($info)) {
                $this->error('该信件不存在！');
            }
            if (!empty($quickreply)) {
                $this->assign('quickreply', $quickreply);
            }
            $this->assign('info', $info);
            $this->display();
        }
    }

    //删除信件
    public function delete() {
        if (IS_POST) {
            $ids = I('post.ids');
        } else {
            $ids = I('get.id', 0, 'intval');
        }
        if (empty($ids)) {
            $this->error('请指定需要删除的信件！');
        }
        if ($this->db->deleteConsult($ids)) {
            $this->success('信件删除成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }

}
