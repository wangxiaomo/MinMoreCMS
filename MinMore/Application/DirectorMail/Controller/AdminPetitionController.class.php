<?php

namespace DirectorMail\Controller;

use Admin\Service\User;
use Common\Controller\AdminBase;

class AdminPetitionController extends AdminBase {

    //信件模型
    private $db = NULL;

	protected function _initialize() {
		parent::_initialize();
		$userInfo = User::getInstance()->getInfo();
		$this->deptid=$userInfo['ouoid'];
		$this->mailtype=4;
		$this->db = D('Petition');
	}

    //后台首页
    public function index() {
        $where = array(
		'deptid'=>$this->deptid
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
	    if($info['deptid']!=$this->deptid){
		$this->error("您无权回复该信件");
		}
            $reply = I('post.reply');
            $qreply = I('post.quickreply');
            if (empty($reply) && empty($qreply)) {
                $this->error('回复内容不能为空！');
            }
            if ($this->db->replyPetition(array('id' => $id, 'reply' => $reply))) {
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
	    $comments=M('comment')->where(array('mailid'=>$id,'mailtype'=>6))->order(array('createtime'=>asc))->select();
	C('DB_PREFIX',"");
	    foreach($comments as &$cmt){
			$cmt['from']=M("huoyi_office")->where(array('id'=>$cmd['from']))->getField('oname');
			//$cmt['to']=M("huoyi_office")->where(array('id'=>$cmd['to']))->getField('oname');
		}
	C('DB_PREFIX',"minmore_");
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
		if ($this->db->deletePetition($ids)) {
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
		    $mailtype=6;
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
