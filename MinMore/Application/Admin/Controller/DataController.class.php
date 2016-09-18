<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 数据展示 
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Admin\Service\User;
use Common\Controller\AdminBase;


class DataController extends AdminBase {

	protected function _initialize() {

		parent::_initialize();
		$userInfo = User::getInstance()->getInfo();
		$this->deptid=$userInfo['ouoid'];
	}

	public function index() {
		$sumary=$this->getSumary();
		$sumaryLabel=array_keys($sumary);
		$sumaryData=array_values($sumary);

		$trend=$this->getTrend();
		$trendMonth=array_keys($trend['局长信箱']);
		foreach($trend as $label=>$data)
		{
			$trendData["'".$label."'"]=json_encode(array_values($data));
		}

		$response=$this->getResponseTime();
		$responseLabel=array_keys($response);
		$responseData=$this->statResponse($response);

		$this->assign("sumaryLabel",json_encode($sumaryLabel));
		$this->assign("sumaryData",json_encode($sumaryData));
		$this->assign("trendMonth",json_encode($trendMonth));
		$this->assign("trendData",$trendData);
		$this->assign("responseLabel",json_encode($responseLabel));
		$this->assign("responseData",$responseData);

		$this->display();
	}

	protected function getSumary()
	{  
		$mDirectorMail=M('directormail');
		$mPetition=M('petition');
		$mConsult=M('consult');
		$mMemberMail=M('membermail');
		$sumary['局长信箱']=$mDirectorMail->count();
		$sumary['代表委员信箱']=$mMemberMail->count();
		$sumary['网上举报']=$mConsult->where(array('type'=>'wsjb'))->count();
		$sumary['群众投诉']=$mConsult->where(array('type'=>'qzts'))->count();
		$sumary['网上咨询']=$mConsult->where(array('type'=>'wszx'))->count();
		$sumary['建言献策']=$mConsult->where(array('type'=>'jyxc'))->count();
		$sumary['网上信访']=$mPetition->count();
		return $sumary;
	}

	protected function getTrend()
	{  
		$curMonth=date('m',time());
		$mDirectorMail=M('directormail');
		$mPetition=M('petition');
		$mConsult=M('consult');
		$mMemberMail=M('membermail');
		$trend['局长信箱']=$mDirectorMail->where('year(from_unixtime(createtime))=year(now())')->field('month(from_unixtime(createtime)) month,count(id) count')->group('month')->order('month','asc')->select();
		$trend['代表委员信箱']=$mMemberMail->where('year(from_unixtime(createtime))=year(now())')->field('month(from_unixtime(createtime)) month,count(id) count')->group('month')->order('month','asc')->select();
		$trend['网上举报']=$mConsult->where("year(from_unixtime(tjsj))=year(now()) and type='wsjb'")->field('month(from_unixtime(tjsj)) month,count(id) count')->group('month')->order('month','asc')->select();
		$trend['群众投诉']=$mConsult->where("year(from_unixtime(tjsj))=year(now()) and type='qzts'")->field('month(from_unixtime(tjsj)) month,count(id) count')->group('month')->order('month','asc')->select();
		$trend['网上咨询']=$mConsult->where("year(from_unixtime(tjsj))=year(now()) and type='wszx'")->field('month(from_unixtime(tjsj)) month,count(id) count')->group('month')->order('month','asc')->select();
		$trend['建言献策']=$mConsult->where("year(from_unixtime(tjsj))=year(now()) and type='jyxc'")->field('month(from_unixtime(tjsj)) month,count(id) count')->group('month')->order('month','asc')->select();
		$trend['网上信访']=$mMemberMail->where('year(from_unixtime(createtime))=year(now())')->field('month(from_unixtime(createtime)) month,count(id) count')->group('month')->order('month','asc')->select();
		foreach($trend as $label=>$val)
		{
			foreach($val as $item)
			{
				$pair[$item['month']]=$item['count'];
			}
			for($i=1;$i<=$curMonth;$i++)
			{
				$data[$i."月"]=intval($pair[$i])?intval($pair[$i]):0;
			}
			$trend[$label]=$data;
		}
		return $trend;
	}

	protected function getResponseTime()
	{  
		$deptid=$this->deptid?$this->deptid:0;
		$mWorkflow=M('workflow');
		$Model=new \Think\Model();
		$Model->execute("update __PREFIX__workflow wf set wf.responsetime=wf.out-wf.in where id>0 and status<>0;");
		$response['局长信箱']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=1 and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		$response['代表委员信箱']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=2 and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		$response['网上举报']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=3 and subtype='wsjb' and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		$response['群众投诉']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=3 and subtype='qzts' and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		$response['网上咨询']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=3 and subtype='wszx' and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		$response['建言献策']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=3 and subtype='jyxc' and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		$response['网上信访']=$mWorkflow->alias('wf')->where("status<>0 and mailtype=4 and deptid=$deptid")->field('floor(wf.responsetime/86400) day,count(id) count')->group('day')->order('day','asc')->select();
		return $response;
	}

	protected function statResponse($response)
	{
		foreach($response as $label=>$data){
			if(empty($data)){
				$responseData["'".'三天内'."'"][]=0;
				$responseData["'".'七天内'."'"][]=0;
				$responseData["'".'七天后'."'"][]=0;
				continue;
			}
			$count=array('3'=>0,'7'=>0,'8'=>0);
			foreach($data as $pair){
				$day=intval($pair['day']);
				$c=intval($pair['count']);
				$count=array();
				switch($day){
					case $day>0&&$day<3:
						$count['3']+=$c;
						break;
					case $day>=3&&$day<=7:
						echo $label.":".$day.":".$c."\n";
						$count['7']+=$c;
						break;
					case $day>7:
						$count['8']+=$c;
						break;
					default:
						$count['0']+=$c;
				}
				$responseData["'".'三天内'."'"][]=$count['3']?$count['3']:0;
				$responseData["'".'七天内'."'"][]=$count['7']?$count['7']:0;
				$responseData["'".'七天后'."'"][]=$count['8']?$count['8']:0;
			}
		}
		$responseData["'".'三天内'."'"]=json_encode($responseData["'".'三天内'."'"]);
		$responseData["'".'七天内'."'"]=json_encode($responseData["'".'七天内'."'"]);
		$responseData["'".'七天后'."'"]=json_encode($responseData["'".'七天后'."'"]);

		return $responseData;
	}
}
