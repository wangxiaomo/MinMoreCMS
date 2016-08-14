<?php

namespace DirectorMail\Controller;

use Common\Controller\AdminBase;

class MemberadminController extends AdminBase {

    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->db = D('DirectorMail/Membermail');
    }

    //后台首页
    public function index() {
        $status= I('get.status');
        $query= I('post.keyword');
        $where = array(
                'roleid' => get_site_role(),
            );
        $type = I('get.type');
        if ($type != '全部' && !empty($type)) {
            $where['type'] = $type;
        }
        if ($status!="") {
		$where['reply']=$status?array('NEQ',''):array('EQ','');
        }
        if (!empty($query)) {
		$where['username|zhuti']=array('LIKE',"%".$query."%");
        }
        
        $count = $this->db->join('minmore_membermail_user ON minmore_membermail.uid=minmore_membermail_user.uid','LEFT')->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->db->join('minmore_membermail_user ON minmore_membermail.uid=minmore_membermail_user.uid','LEFT')->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
        $this->assign('data', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('type', $type);
        $this->assign('status', $status);
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
            if ($this->db->replyMembermail(array('id' => $id, 'reply' => $reply))) {
                $this->success('回复成功！', U('index', "typeid={$info['tupeid']}&isadmin=1"));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '回复失败！');
            }
        } else {
            $id = I('get.id', 0, 'intval');
            $info = $this->db->where(array('id' => $id))->find();
            $vo = M('MembermailUser')->where(array('uid'=>$info['uid']))->find();
            $info['usermsg'] = $vo['tel'].$vo['remarks'];
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
        if ($this->db->deleteMembermail($ids)) {
            $this->success('信件删除成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }

    //代表委员管理
    public function member() {
	    $db = M('MembermailUser');
		    $query= I('post.keyword');
	    if (IS_POST&&empty($query)) {
		    $uid = I('post.uid');
		    $mobile = I('post.mobile');
		    $username = I('post.username');
		    if (empty($uid) || !is_array($uid)) {
			    $this->error('请选择需要更新的内容！');
		    }
		    foreach ($uid as $id) {
			    if ($mobile[$id]) {
				    $db->where(array('uid' => $id))->save(array('mobile' => $mobile[$id]));
			    }
			    if ($username[$id]) {
				    $db->where(array('uid' => $id))->save(array('username' => $username[$id]));
			    }

		    }
		    $this->success('更新成功！');
	    } else {
			$where=array();
		    if (!empty($query)) {
			    $where['username|mobile']=array('LIKE',"%".$query."%");
		    }
		    $data = $db->where($where)->order(array('uid' => 'DESC'))->select();
		    $this->assign('data', $data);
		    $this->display();
	    }
    }

    //添加信件类型
    public function addmember() {
        if (IS_POST) {
            $post = I('post.');
            if ($this->db->addMember($post)) {
                $this->success('代表委员添加成功！', U('member', 'isadmin=1'));
            } else {
                $this->error('代表委员添加失败！');
            }
        } else {
            $this->display();
        }
    }

    //删除信件类型
    public function deletemember() {
        $uid = I('get.uid', 0, 'intval');
        if (empty($uid)) {
            $this->error('请指定需要删除的代表委员！');
        }
        if ($this->db->deleteMember($uid)) {
            $this->success('删除代表委员成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }
}
