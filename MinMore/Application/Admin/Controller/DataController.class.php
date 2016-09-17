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

		$response=array();

		$this->assign("sumaryLabel",json_encode($sumaryLabel));
		$this->assign("sumaryData",json_encode($sumaryData));
		$this->assign("trendMonth",json_encode($trendMonth));
		$this->assign("trendData",$trendData);
		$this->assign("response",$response);
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

	/*
	protected function getResponseTime()
	{  
		$deptid=$this->deptid;
		$mDirectorMail=M('directormail');
		$mPetition=M('petition');
		$mConsult=M('consult');
		$mMemberMail=M('membermail');
		$mComment=M('comment');
		$stat=array();
		$mailist=$mDirectorMail->field('id,createtime,replytime,deptid')->select();
		foreach($mailist as $mail)
		{
			$stat[$mail['deptid']][$mail['id']]['in']=$mail['createtime'];
			$comments=$mComment->where(array('mailid'=>$mail['id'],'mailtype'=>1))->select();
			foreach($comments as $c)
			{
				if(isset($stat[$c['from']]))
				{
					$stat[$c['from']]=array();
				}
				if(isset($stat[$c['from']][$c['mailid']]))
				{
					$stat[$c['from']][$c['mailid']]=array();
				}
				$stat[$c['from']][$c['mailid']]['out']=$c['createtime'];
				if(isset($stat[$c['to']]))
				{
					$stat[$c['to']]=array();
				}
				if(isset($stat[$c['to']][$c['mailid']]))
				{
					$stat[$c['to']][$c['mailid']]=array();
				}
				$stat[$c['to']][$c['mailid']]['in']=$c['createtime'];
			}
		}
	}
	*/
}
