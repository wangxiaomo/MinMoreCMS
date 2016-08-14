<?php

namespace DirectorMail\Controller;

use Common\Controller\AdminBase;

class AdminPetitionController extends AdminBase {

    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->db = D('Petition');
    }

    //后台首页
    public function index() {
        $where = array(
                'roleid' => get_site_role(),
            );
        $status= I('get.status');
        $query= I('post.keyword');
        $statusList = M('petition')->distinct(true)->getField('status', true);
        if ($status!="") {
            $where['status'] = $status;
        }
        if (!empty($query)) {
		$where['name|zhuti|shouji']=array('LIKE',"%".$query."%");
        }
        $count = $this->db->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign('data', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('statusList', $statusList);
        $this->assign('typeid', $status);
        $this->display();
    }
	//接访领导列表
    public function chief() {
        $query= I('post.name');
        $where = array(
                'roleid' => get_site_role(),
            );
	$oid=I('post.city')?I('post.city'):0;
	$oid=I('post.barue')?I('post.barue'):$oid;
	$oid=I('post.station')?I('post.station'):$oid;
	if($oid>0){
		$where['oid']=$oid;
	}
	C('DB_PREFIX','');
        if (!empty($query)) {
		$where['name']=array('LIKE',"%".$query."%");
        }
        $count = D('officer')->where($where)->count();
        $page = $this->page($count, 20);
        $data = D('officer')->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
	C('DB_PREFIX','minmore_');
    $citys= get_director_city();
    $this->assign('citys', $citys); 
        $this->assign('data', $data);
        $this->assign("Page", $page->show('chief'));
        $this->assign('typeid', $status);
        $this->display();
    }
    //添加接访领导
    public function addchief() {
	    if(IS_AJAX){
		    C('DB_PREFIX','');
		    $name=I('name');
		    $oid1=I('city');
		    $oid2=I('barue');
		    $oid3=I('station');
		    if($oid1>0){
			$oid=$oid1;
			if($oid2>0){
				$oid=$oid2;
				if($oid3>0){
					$oid=$oid3;
				}
			}
			}

		    $oname=M('huoyi_office')->where(array('oid'=>$oid))->getField('oname');
		    $chief=array('name'=>$name,'oid'=>$oid,'oname'=>$oname);
		    $officer_M=D('officer');
		    $ret=$officer_M->addOfficer($chief);
		    $error = $officer_M->getError();
	            C('DB_PREFIX','minmore_');
		    if($ret){
			    $this->success("添加成功");
		    }else{
			    $this->error($error ? $error : '添加失败！');
		    }
	    }
	    $citys= get_director_city();
	    $this->assign('citys', $citys); 
	    $this->assign('data', $data);
	    $this->display();
    }

    //删除接访领导
    public function delchief() {
        if (IS_POST) {
            $ids = I('post.ids');
        } else {
            $ids = I('get.id', 0, 'intval');
        }
        if (empty($ids)) {
            $this->error('请指定需要删除的领导！');
        }
	    C('DB_PREFIX','');
	    $ret=D('officer')->deleteOfficer($ids);
            $error = M('officer')->getError();
	    C('DB_PREFIX','minmore_');
        if ($ret) {
            $this->success('接访领导删除成功！');
        } else {
            $this->error($error ? $error : '删除失败！');
        }
    }
    //信件回复
    public function reply() {
	$roleid=get_admin_role();
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
            if ($this->db->replyPetition(array('id' => $id, 'reply' => $reply))) {
                $this->success('回复成功！', U('index', "typeid={$info['tupeid']}&isadmin=1"));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '回复失败！');
            }
        } else {
            $id = I('get.id', 0, 'intval');
            $info = $this->db->where(array('id' => $id))->find();
		switch($info['type']){
		case 'mail':
			$info['type']='信件来访';
			break;
		case 'present':
			$info['type']='现场接访';
			break;
		case 'video':
			$info['type']='视频接访';
			break;
		default:
			$info['type']='未指定';
		}
            $quickreply = M('DirectormailQuickreply')->where(array('roleid'=>$roleid))->getField('quickreply', true);
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
        if ($this->db->deletePetition($ids)) {
            $this->success('信件删除成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }

}
