<?php

namespace DirectorMail\Controller;

use Admin\Service\User;
use Common\Controller\AdminBase;

class AdminController extends AdminBase {

    //信件模型
    private $db = NULL;

	protected function _initialize() {
		parent::_initialize();
		$userInfo = User::getInstance()->getInfo();
		$this->deptid=$userInfo['ouoid'];
		$this->mailtype=1;
		$this->db = D('DirectorMail/Directormail');
	}

    //后台首页
    public function index() {
        $status= I('get.status');
        $where = array(
		'deptid'=>$this->deptid
            );
	
        $typeId = I('get.typeid');
        $query= I('post.keyword');
        $typeList = M('DirectormailType')->order(array('typeid' => 'DESC'))->getField('typeid,name', true);
        if ($status!="") {
		$where['reply']=$status?array('NEQ',''):array('EQ','');
        }
        if ($typeId) {
            $where['typeid'] = $typeId;
        }
        if (!empty($query)) {
		$where['name|zhuti|shouji']=array('LIKE',"%".$query."%");
        }
        $count = $this->db->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign('data', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('typeList', $typeList);
        $this->assign('typeid', $typeId);
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
			if($info['deptid']!=$this->deptid){
				$this->error("您无权回复该信件");
			}
			if (empty($info)) {
				$this->error('该信件不存在！');
			}
			$reply = I('post.reply');
			$qreply = I('post.quickreply');
			if (empty($reply) && empty($qreply)) {
				$this->error('回复内容不能为空！');
			}
			if ($this->db->replyDirectorMail(array('id' => $id, 'reply' => $reply))) {
				$nowtime=time();
				$endflow=array('mailid'=>$id
						,'mailtype'=>$this->mailtype
						,'deptid'=>$this->deptid
						,'status'=>3
						,'out'=>$nowtime
						,'updatetime'=>$nowtime
						);
				D('workflow')->where(array('mailtype'=>$this->mailtype,'mailid'=>$id,'deptid'=>$this->deptid))->save($endflow);
				$this->success('回复成功！', U('index', "typeid={$info['tupeid']}&isadmin=1"));
			} else {
				$error = $this->db->getError();
				$this->error($error ? $error : '回复失败！');
			}
		} else {
			$id = I('get.id', 0, 'intval');
			$info = $this->db->where(array('id' => $id))->find();
			if($info['deptid']!=$this->deptid){
				$this->error("您无权查看该信件");
			}
			$comments=M('comment')->where(array('mailid'=>$id,'mailtype'=>1))->order(array('createtime'=>asc))->select();
			C('DB_PREFIX',"");
			foreach($comments as &$cmt){
				$cmt['from']=M("huoyi_office")->where(array('id'=>$cmd['from']))->getField('oname');
				//$cmt['to']=M("huoyi_office")->where(array('id'=>$cmd['to']))->getField('oname');
			}
			C('DB_PREFIX',"minmore_");
			$quickreply = M('DirectormailQuickreply')->where(array('roleid'=>get_admin_role()))->getField('quickreply', true);
			if (empty($info)) {
				$this->error('该信件不存在！');
			}
			if (!empty($quickreply)) {
				$this->assign('quickreply', $quickreply);    
			}
			if (!empty($comments)) {
				$this->assign('comments', $comments);    
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
		if(!is_array($ids)){
			$info = $this->db->where(array('id' => $ids))->find();
			if($info['deptid']!=$this->deptid){
				$this->error("您无权查看该信件");
			}
		}else{
			foreach($ids as $id){
				$info = $this->db->where(array('id' => $id))->find();
				if($info['deptid']!=$this->deptid){
					$this->error("您无权查看该信件");
				}
			}
		}
		if ($this->db->deleteDirectorMail($ids)) {
			$nowtime=time();
			if(!is_array($ids)){
				$id=$ids;
				$endflow=array('mailid'=>$id
						,'mailtype'=>$this->mailtype
						,'deptid'=>$this->deptid
						,'status'=>2
						,'out'=>$nowtime
						,'updatetime'=>$nowtime
						);
				D('workflow')->where(array('mailtype'=>$this->mailtype,'mailid'=>$id,'deptid'=>$this->deptid))->save($endflow);
			}
			else{
				foreach($ids as $id){
					$endflow=array('mailid'=>$id
							,'mailtype'=>$this->mailtype
							,'deptid'=>$this->deptid
							,'status'=>2
							,'out'=>$nowtime
							,'updatetime'=>$nowtime
							);
					D('workflow')->where(array('mailtype'=>$this->mailtype,'mailid'=>$id,'deptid'=>$this->deptid))->save($endflow);
				}
			}
			$this->success('信件删除成功！');
		} else {
			$error = $this->db->getError();
			$this->error($error ? $error : '删除失败！');
		}
	}

    //信件类型管理
    public function type() {
        $db = M('DirectormailType');
        if (IS_POST) {
            $typeid = I('post.typeid');
            $name = I('post.name');
            if (empty($typeid) || !is_array($typeid)) {
                $this->error('请选择需要更新的内容！');
            }
            foreach ($typeid as $id) {
                if ($name[$id]) {
                    $db->where(array('typeid' => $id))->save(array('name' => $name[$id]));
                }
            }
            $this->success('更新成功！');
        } else {
            $data = $db->order(array('typeid' => 'DESC'))->select();
            $this->assign('data', $data);
            $this->display();
        }
    }

    //添加信件类型
    public function addtype() {
        if (IS_POST) {
            $post = I('post.');
            if ($this->db->addType($post)) {
                $this->success('类型添加成功！', U('type', 'isadmin=1'));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '类型添加失败！');
            }
        } else {
            $this->display();
        }
    }

    //删除信件类型
    public function deletetype() {
        $typeid = I('get.typeid', 0, 'intval');
        if (empty($typeid)) {
            $this->error('请指定需要删除的信件类型！');
        }
        if ($this->db->deleteType($typeid)) {
            $this->success('删除信件类型成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }

    //快捷回复管理
    public function quickreply() {
        $db = M('DirectormailQuickreply');
	$roleid=get_admin_role();
        if (IS_POST) {
            $quickreplyid = I('post.id');
            $quickreply = I('post.quickreply');
            if (empty($quickreplyid) || !is_array($quickreplyid)) {
                $this->error('请选择需要更新的内容！');
            }
            foreach ($quickreplyid as $id) {
                if ($quickreply[$id]) {
                    $db->where(array('id' => $id,'roleid'=>$roleid))->save(array('quickreply' => $quickreply[$id]));
                }
            }
            $this->success('更新成功！');
        } else {
            $data = $db->where(array('roleid'=>$roleid))->order(array('id' => 'DESC'))->select();
            $this->assign('data', $data);
            $this->display();
        }
    }
    //添加快速回复
    public function addquickreply() {
        if (IS_POST) {
            $post = I('post.');
            $post['roleid'] = get_admin_role();
            if ($this->db->addQuickreply($post)) {
                $this->success('快捷回复成功！', U('quickreply', 'isadmin=1'));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '快捷回复添加失败！');
            }
        } else {
            $this->display();
        }
    }

    //删除快速回复
    public function deletequickreply() {
        $id = I('get.id', 0, 'intval');
        if (empty($id)) {
            $this->error('请指定需要删除的快捷回复！');
        }
        if ($this->db->deleteQuickreply($id)) {
            $this->success('删除快捷回复成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }
    //获取可转发的下级部门
    public function get_sub_department(){
	    $dept_id=$this->deptid;
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
		    $mailtype=1;
		    $comment=I('post.fd_comment');
		    $source=$this->deptid;
		    $target=I('post.fd_target');
	    $info = $this->db->where(array('id' => $mailid))->find();
	    if($info['deptid']!=$this->deptid){
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
			$nowtime=time();
			$forward=array('mailid'=>$mailid
					,'mailtype'=>$mailtype
					,'from'=>$source
					,'to'=>$target
					,'comment'=>$comment
					,'createtime'=>date("Y-m-d H:i:s",$nowtime)
					);
			$ret=D("comment")->add($forward);
			if(!$ret){
				$flag=0;		
				$error=$M_comment->getError();
			}

			$endflow=array('mailid'=>$mailid
					,'mailtype'=>$mailtype
					,'deptid'=>$source
					,'status'=>1
					,'out'=>$nowtime
					,'updatetime'=>$nowtime
					);
			D('workflow')->where(array('mailtype'=>$mailtype,'mailid'=>$mailid,'deptid'=>$source))->save($endflow);
			$startflow=array('mailid'=>$mailid
					,'mailtype'=>$mailtype
					,'deptid'=>$target
					,'status'=>0
					,'in'=>$nowtime
					,'updatetime'=>$nowtime
					);
			D('workflow')->add($startflow);

			if(!$flag){
				$this->db->rollback();
				$this->error($error ? $error : '转发失败！');
			}else{
				$this->db->commit();
				$this->success("信件转发成功",U('index'));
			}
		}else{
		    $this->error("转发失败:获取目标部门(detp:$target)失败！");
		}
	    }
    }
}
