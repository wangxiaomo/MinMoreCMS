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
		'deptid'=>get_department_id(),
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
	    if($info['deptid']!=get_department_id()){
		$this->error("您无权回复该信件");
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
            $quickreply = M('DirectormailQuickreply')->where(array('roleid'=>get_admin_role()))->getField('quickreply', true);
	    if($info['deptid']!=get_department_id()){
		$this->error("您无权查看该信件");
		}
	    $comments=M('comment')->where(array('mailid'=>$id,'mailtype'=>3))->order(array('createtime'=>asc))->select();
	C('DB_PREFIX',"");
	    foreach($comments as &$cmt){
			$cmt['from']=M("huoyi_office")->where(array('id'=>$cmd['from']))->getField('oname');
			//$cmt['to']=M("huoyi_office")->where(array('id'=>$cmd['to']))->getField('oname');
		}
	C('DB_PREFIX',"minmore_");
            if (!empty($comments)) {
                $this->assign('comments', $comments);    
            }
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

    //获取可转发的下级部门
    public function get_sub_department(){
	    $dept_id=get_department_id();
	    C('DB_PREFIX',"");
	    $M_office=M('huoyi_office');
	    C('DB_PREFIX',"minmore_");
	    $level=$M_office->where(array('oid'=>$dept_id))->getField('olevel');
	    $level=intval($level);
	    $where=array('oheadid'=>$dept_id,'olevel'=>intval($level)+1);
	    switch($level){
		    case 0:
			    $where['_string']="substr(osn,1,6)<>'000000' and substr(osn,7,6)='000000'";
			    break;
		    case 1:
			    $where['_string']="substr(osn,1,10)<>'000000' and substr(osn,11,2)='00'";
			    break;
	    }
	    if(intval($level)<3){
		    $sub_depts=$M_office->where($where)->field(array('oid','oname','osimplename'))->select();
		    $this->success($sub_depts);
	    }else{
		    $this->error("无可转发单位");
	    }
    }

    public function forward(){
	    if(IS_POST){
		    $title=I('post.fd_title');
		    $mailid=I('post.fd_mailid');
		    $mailtype=3;
            	    $type = I('post.type');
		    $comment=I('post.fd_comment');
		    $source=get_department_id();
		    $target=I('post.fd_target');
	    $info = $this->db->where(array('id' => $mailid))->find();
	    if($info['deptid']!=get_department_id()){
		$this->error("您无权操作该信件");
		}
		$this->db->startTrans();
		$flag=1;
		if($target){
			$data['deptid']=$target;
			$ret=$this->db->where(array('id'=>$mailid))->save($data);
			if($ret===false){
				$flag=0;		
				$error = $this->db->getError();
			}
			$forward=array('mailid'=>$mailid
					,'mailtype'=>$mailtype
					,'from'=>$source
					,'to'=>$target
					,'comment'=>$comment
					,'createtime'=>date("Y-m-d H:i:s")
					);
			$ret=D("comment")->add($forward);
			if(!$ret){
				$flag=0;		
				$error=$M_comment->getError();
			}
			if(!$flag){
				$this->db->rollback();
				$this->error($error ? $error : '转发失败！');
			}else{
				$this->db->commit();
				$this->success("信件转发成功",U('index',array('type'=>$type)));
			}
		}else{
		    $this->error("转发失败:获取目标部门(detp:$target)失败！");
		}
	    }
    }
}
