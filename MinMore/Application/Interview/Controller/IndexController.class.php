<?php

namespace Interview\Controller;

use Common\Controller\Base;

class IndexController extends Base {

    //信件类型
    private $typeId = 0;
    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->assign("title", "在线访谈");
        $this->assign("headicon", "在线访谈");       
    }

    //局长信箱首页
    public function index() {
    	$interview_m   =  M("interview as a");
    	$list          =  $interview_m->limit(10)->order(array("id" => "DESC"))->select();
    	$this->assign('interlist', $list);
        $this->display();
    }

    public function detail() {
    
    	$id  = I("id","");
    	if(id==""){
    		$this->error("加载错误");
    	}
    	else {
			
			$tempdatalist   =  array();
    		$interview_m    =  M("interview as a");
    		$where["id"]    =  $id;
    		$obj            =  $interview_m->where($where)->find();
    		$interviewMsg_m 		 =  M("interview_message");
    		$wherereply["view_id"]   =  $id;
    		$dataList          		 =  $interviewMsg_m->where($wherereply)->limit(5)->order(array("id" => "DESC"))->select();
 
			foreach ($dataList as $row){
				$row["rolename"]    = $this->getRoleName($row["role_id"]);
				$tempdatalist[] = $row;
			}
 
 
    		$interview_m   =  M("interview as a");
    		$list          =  $interview_m->limit(10)->order(array("id" => "DESC"))->select();
			
    		$interviewRely_m    	=  M("interview_reply");
    		$whereRely["view_id"]   =  $id;
    		$objrely          		=  $interviewRely_m->where($whereRely)->find();
    		$this->assign('interlist', $list);
    		$this->assign('datalist',array_reverse($tempdatalist));
			
    		$this->assign('objrely', $objrely);
    		$this->assign('obj', $obj);
    		$this->assign('title', $obj["title"]);
    		
			$interrole_m    =  M("interview_role");
			$whererole["view_id"] =  $id;
			$rolelist  			  =  $interrole_m->where($whererole)->select();
			$this->assign("rolelist",$rolelist);
			
			
    		$this->display();
    	}
    }
    
    public function info() {
    
    	$id  = I("id","");
    	if(id==""){
    		$this->error("加载错误");
    	}
    	else {
    		$interviewRely_m    =  M("interview_reply");
    		$where["view_id"]   =  $id;
    		$obj          		=  $interviewRely_m->where($where)->find();
     
    		$interview_m       =  M("interview as a");
    		$whereview["id"]   =  $obj["view_id"];
    		$objview           =  $interview_m->where($whereview)->find();
    		$this->assign('objview', $objview);
    		$this->assign('obj', $obj);
    		$this->display("detail_info");
    	}
    }
    
    public function sendmsg(){
    	
    	if(IS_POST){
    		
			$data["info"] 	 	 =  I('post.msg',"", "trim");
			$data["tel"] 	 	 =  I('post.tel',"", "trim");
			$data["username"] 	 =  I('post.username',"", "trim");
			$data["view_id"] 	 =  I('post.view_id',"", "trim");
			$data["role_id"] 	 =  I('post.role_id',"", "trim");
			$data["create_time"] =  date("Y-m-d H:i:s");
			
			$code = I("post.code", "", "trim");
			if (empty($code)) {
				$jsonOp["success"] = false;
				$jsonOp["msg"]     = "请输入验证码！";
			}
			
			$interview_m   =  M("interview_message");
			 
			$res  		   =  $interview_m->data($data)->add();
			//echo M()->getLastSql();
			if($res){
				$jsonOp["success"] = true;
				$jsonOp["msg"]     = "留言成功";
				$jsonOp["data"]    = $data;
			}
			else {
				$jsonOp["success"] = false;
				$jsonOp["msg"]     = "留言失败";
			}
			$this->ajaxReturn($jsonOp);
		}
    }
    
    public function getmsglist(){
    	$id  = I("get.id","");
    	if($id!=""){
    		$interviewMsg_m 		 =  M("interview_message");
    		$wherereply["view_id"]   =  $id;
    		$dataList          		 =  $interviewMsg_m->where($wherereply)->limit(10)->order("create_time desc")->select();
			$tempdatalist = array();
			foreach ($dataList as $row){
				$row["rolename"]    = $this->getRoleName($row["role_id"]);
				$tempdatalist[] = $row;
			}
			
    		$this->assign('datalist',array_reverse($tempdatalist));
    		$this->display("ajaxmsg");
    	}
    	else {
    		echo "暂时没有人留言";
    	}
    }
	
    private function getRoleName($id){
		$where["id"] 	 =  $id;
		$field 	=	M("interview_role")->where($where)->getField("name");
		return $field;
	}
}
