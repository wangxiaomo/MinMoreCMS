<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 后台附件上传处理程序
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Interview\Controller;
use Common\Controller\AdminBase;
class AdminController extends AdminBase {

   
    //初始化

    protected function _initialize() {
    	parent::_initialize();
    }

  
    public function index() {
        
    	$interview_m  		 =  M("interview");
    	$where 				 =  array();
    	
    	if($keyword!=""){
			$where['_string']='(title like "%'.$keyword.'%")  OR (guest like "'.$keyword.'")';
		}
		
    	$count 	= 	$interview_m->where($where)->count();
    	$page 	= 	page($count, 10);
    	$data 	= 	$interview_m->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

    	
    	$tempData = array();
    	
    	foreach ($data as $row){
    		$row["is_have"]  = $this->isHaveReply($row["id"]);
    		$row["msgtotal"]  = $this->getmsgtotal($row["id"]);
    		$tempData[] = $row;
    	}
    	//dump($tempData);
    	$this->assign("title", "访谈");
    	$this->assign('dataList', $tempData);
    	$this->assign("Page", $page->show('Admin'));
    	$this->display();
    }
    
    
    public function msginfo() {
    	 
    	$interview_m  		 =  M("interview_message as a");
    	$where 				 =  array();
    	$where["view_id"] = I("get.id");
    	if($keyword!=""){
    		$where['_string']='(a.username like "%'.$keyword.'%")  OR (a.tel like "'.$keyword.'")  OR (a.info like "'.$keyword.'")';
    	}
    
    	$count 	= 	$interview_m->join("minmore_interview as b on a.view_id=b.id")->where($where)->count();
    	$page 	= 	page($count, 10);
    	
    	
    	$data 	= 	$interview_m->field("a.*,b.title as title")->join("minmore_interview as b on a.view_id=b.id")->where($where)
    					        ->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
    
    	 
    	$tempData = array();
    	//dump($data);
    	$this->assign("title", "访谈留言");
    	$this->assign('dataList', $data);
    	$this->assign("Page", $page->show('Admin'));
    	$this->display();
    }
    
    
    public function addinterview() {
    	$interview_m  		 =  M("interview");
    	if(IS_GET){
    		$where["id"] = I("id");
    		$obj         = $interview_m->where($where)->find();
    		$this->assign("obj",$obj);
    		$this->display("addinfo");
    	}
    	else {
    		
    		$id = I("post.id","");
    		$reuslt =false;
    		if($id==""){
    			$data["title"] 		 =  I("title");
    			$data["start_time"]  =  I("start_time");
    			$data["guest"] 		 =  I("guest");
    			$data["summary"] 	 =  I("summary");
    			$data["is_open"] 	 =  I("is_open");
    			$data["create_time"] =  date("Y-m-d H:i:s");
    			$data["banner"]  	 = I("img");
    			$data["video"]       = I("video");
    			
    			$reuslt  =	$interview_m->data($data)->add();
    		}
    		else {
    			$data["id"] 		 =  $id;
    			$data["title"] 		 =  I("title");
    			$data["start_time"]  =  I("start_time");
    			$data["guest"] 		 =  I("guest");
    			$data["summary"] 	 =  I("summary");
    			$data["is_open"] 	 =  I("is_open");
    			$data["create_time"] =  date("Y-m-d H:i:s");
    			$data["banner"]  	 = I("img");
    			$data["video"]       = I("video");
    			 
    			$reuslt  =	$interview_m->data($data)->save();
    		}
    	   
    	   if($reuslt){
    	   	$this->success('访谈添加成功！', U('index'));
    	   }
    	   else {
    	   	 $this->error('访谈添加失败！');
    	   }
    	}
    }
    
    public function addinfo() {
    	$interview_m  		 =  M("interview");
    	if(IS_GET){
    		$where["id"] = I("id");
    		$obj         = $interview_m->where($where)->find();
    		$this->assign("obj",$obj);
    		$this->display("addview");
    	}
    	else {
    		$interview_reply  	 =  M("interview_reply");
    		$data["view_id"] 	 =  I("view_id");
    		$data["info"] 	     =  $_POST["info"];
    		$data["master"] 	 =  I("master");
    		$data["summary"] 	 =  I("summary");
    		$data["title"] 	     =  I("title");
    		$data["create_time"] =  date("Y-m-d H:i:s");
    		 
    
    		$reuslt  =	$interview_reply->data($data)->add();
    
    		if($reuslt){
    			$this->success('访谈实录添加成功！', U('index'));
    		}
    		else {
    			$this->error('访谈实录添加失败！');
    		}
    	}
    }
	
    public function editeinfo() {
    	$interview_m  		 =  M("interview");
    	$interview_reply  	 =  M("interview_reply");
    	if(IS_GET){
    		$where["id"] = I("get.id");
    		$obj          = $interview_m->where($where)->find();
    		$where1["view_id"] = I("get.id");
    		$obj1         = $interview_reply->where($where1)->find();
    		//dump($obj1);
    		//echo M()->getLastSql();
    		$this->assign("obj",$obj);
    		$this->assign("view",$obj1);
    		$this->display("editeview");
    	}
    	else {
    		//$interview_reply  	 =  M("interview_reply");
    		$data["id"] 	 	 =  I("id");
    		$data["info"] 	     =  $_POST["info"];
    		$data["master"] 	 =  I("master");
    		$data["summary"] 	 =  I("summary");
    		$data["title"] 	     =  I("title");
    		$data["create_time"] =  date("Y-m-d H:i:s");
    		    
    		$reuslt  =	$interview_reply->data($data)->save();
    		if($reuslt){
    			$this->success('访谈实录修改成功！', U('index'));
    		}
    		else {
    			$this->error('访谈实录修改失败！');
    		}
    	}
    }
    
    
    
    
	/**
	 * 上传图片
	 */
	public function uploadImage(){
	
		$jsonOp = array();
		$upload     	   =    new \Think\Upload();// 实例化上传类
		$upload->rootPath  =	"./";
		$upload->maxSize   =    1024*1024*100 ;// 设置附件上传大小
		$addtime		   =	date("Ymd",time());
		$adddatetime	   =	date("YmdHis",time());
		$upload->exts      =    array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->saveExt   =    "jpg";
		$imagesname        =    $adddatetime.mt_rand(1000,9999).$upload->ext;
		$upload->saveName  =    $imagesname;
		$upload->autoSub   =    false;
		$testdir		   =	"./d/file/".$addtime."/";
		$upload->savePath  =    $testdir; // 设置附件上传目录    // 上传文件
		$filePath          =   './d/file/'.$addtime.'/'.$upload->saveName.'.'.$upload->saveExt;
		
		
		if(file_exists($testdir)){
		}
		else{
			mkdir($testdir,0777);
		}
		//上传文件
		$info = $upload->upload();
	
	
		if(!$info) {// 上传错误提示错误信息
			$jsonOp["success"] = false;
			$jsonOp["isLogin"] = true;
			$jsonOp["msg"]     = $upload->getError();
			$jsonOp["data"]    = $info;
			
		}else{// 上传成功
				
			$image  = new \Think\Image();
			$image->open('./d/file/'.$addtime.'/'.$upload->saveName.'.'.$upload->saveExt);
			$image_width   		  = $image->width();//获取图片宽度
			$image_height  		  = $image->height();//获取图片高度
			
			$pic_name      =  $upload->saveName.'_'.$image_width.'_'.$image_height.'.'.$upload->saveExt;//重新命名的文件名
			$filePathNew   =  './d/file/'.$addtime.'/'.$pic_name;
				
			@rename($filePath,$filePathNew);
				
			$photo_m   			  = M("interview_file");
			
			$data["file_name"]     = $pic_name;
			$data["file_path"]     = $addtime;
			$data["file_size"]     = $info["file"]["size"];
			$data["file_size_str"] = GetSize($data["file_size"]);
				
			$data["file_type"]	   =  "img";
			$data["create_time"]   =  date("Y-m-d H:i:s");
	        $data["md5"]           =  $info["file"]["md5"];
	        
			$result = $photo_m->data($data)->add();
			
			
			$jsonOp->data    = $info;
			$jsonOp->isLogin = true;
			if($result) {
				$jsonOp["success"] = true;
				$jsonOp["msg"]     = "上传成功";
				$jsonOp["data"]    = '/d/file/'.$addtime.'/'.$pic_name;
				
			}else {
				$jsonOp["success"] = true;
				$jsonOp["msg"]     = "上传失败";
			}
		}
		 $this->ajaxReturn($jsonOp);
	}
	
	
	/**
	 * 上传图片
	 */
	public function uploadVideo(){
	
		$jsonOp = array();
		$upload     	   =    new \Think\Upload();// 实例化上传类
		$upload->rootPath  =	"./";
		$upload->maxSize   =    1024*1024*100 ;// 设置附件上传大小
		$addtime		   =	date("Ymd",time());
		$adddatetime	   =	date("YmdHis",time());
		$upload->exts      =    array('mp4', 'avi');// 设置附件上传类型
		$upload->saveExt   =    "mp4";
		$imagesname        =    $adddatetime.mt_rand(1000,9999).$upload->ext;
		$upload->saveName  =    $imagesname;
		$upload->autoSub   =    false;
		$testdir		   =	"./d/file/".$addtime."/";
		$upload->savePath  =    $testdir; // 设置附件上传目录    // 上传文件
		$filePath          =   './d/file/'.$addtime.'/'.$upload->saveName.'.'.$upload->saveExt;
	
	
		if(file_exists($testdir)){
		}
		else{
			mkdir($testdir,0777);
		}
		//上传文件
		$info = $upload->upload();
	
	
		if(!$info) {// 上传错误提示错误信息
			$jsonOp["success"] = false;
			$jsonOp["isLogin"] = true;
			$jsonOp["msg"]     = $upload->getError();
			$jsonOp["data"]    = $info;
				
		}else{// 上传成功
	 
			$pic_name      =  $upload->saveName.'.'.$upload->saveExt;//重新命名的文件名
			$filePathNew   =  './d/file/'.$addtime.'/'.$pic_name;
	
			@rename($filePath,$filePathNew);
	
			$photo_m   			  = M("interview_file");
				
			$data["file_name"]     = $pic_name;
			$data["file_path"]     = $addtime;
			$data["file_size"]     = $info["file"]["size"];
			$data["file_size_str"] = GetSize($data["file_size"]);
	
			$data["file_type"]	   =  "img";
			$data["create_time"]   =  date("Y-m-d H:i:s");
			$data["md5"]           =  $info["file"]["md5"];
			 
			$result = $photo_m->data($data)->add();
				
				
			$jsonOp->data    = $info;
			$jsonOp->isLogin = true;
			if($result) {
				$jsonOp["success"] = true;
				$jsonOp["msg"]     = "上传成功";
				$jsonOp["data"]    = '/d/file/'.$addtime.'/'.$pic_name;
				$jsonOp["filename"]    = $pic_name;
	
			}else {
				$jsonOp["success"] = true;
				$jsonOp["msg"]     = "上传失败";
			}
		}
		$this->ajaxReturn($jsonOp);
	}
	
	//删除信件
	public function delete() {
		$interview_m  		 =  M("interview");
		if (IS_POST) {
			$ids = I('post.ids');
		} else {
			$ids = I('get.id', 0, 'intval');
		}
		if (empty($ids)) {
			$this->error('请指定需要删除的信件！');
		}
		
		$where = array();
		if (is_array($ids)) {
			$where['id'] = array('IN', $ids);
		} else {
			$where['id'] = $ids;
		}
		$res  = $interview_m->where($where)->delete();
		if($res) {
			$this->success('删除成功！');
		} else {
			$error = $this->db->getError();
			$this->error($error ? $error : '删除失败！');
		}
	}
	
	
	public function changeop(){
		
		if(IS_POST){
			
			$id 	 = 	$ids = I('post.id');
			$op  	 = 	$ids = I('post.op');
			$interview_m   =  M("interview");
			$where["id"]   =  $id;
			$res  		   =  $interview_m->where($where)->setField('is_open_msg',$op);
			//echo M()->getLastSql();
			if($res){
				$jsonOp["success"] = true;
				$jsonOp["msg"]     = "设置成功";
			}
			else {
				$jsonOp["success"] = false;
				$jsonOp["msg"]     = "设置失败";
			}
			$this->ajaxReturn($jsonOp);
		}
		
	}
	
	private function isHaveReply($id){
		 
		$interview_m  		 =  M("interview_reply");
		$where["view_id"] 	 =  $id;
		$total 				 =  $interview_m->where($where)->count();
		return $total>0?true:false;
	}
	
	private function getmsgtotal($id){
			
		$interview_m  		 =  M("interview_message");
		$where["view_id"] 	 =  $id;
		$total 				 =  $interview_m->where($where)->count();
		return $total;
	}
}
