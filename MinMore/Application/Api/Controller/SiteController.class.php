<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 验证码处理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\MinMoreCMS;

class SiteController extends MinMoreCMS {
    public function query_alarm_phone() {
        //发送手机验证码
	    if(IS_POST){
            $lifeTime =600;
            session_set_cookie_params($lifeTime);
            session_start();
		    $caseID = I("caseID","","trim");
		    $mobile = I("mobile","", "trim");
		    $round = I("round","", "trim");
            if(is_numeric($mobile) && strlen($mobile) == 11&& strlen($caseID)== 25&& strlen($round) == 4) {
                $_SESSION['alarm_phonecode'] = $round;
                ini_set('max_execution_time', '400');
                $wsdl = "http://127.0.0.1:8081/SSMFramework/services/JqslcxService?wsdl";
                $client = new\SoapClient($wsdl);
                $parameters = array("args0" => $mobile, "args1" => $caseID, "args2" => $round);
                $ret = $client->GetJqslcxResult($parameters);
                $result = $ret->return;
                $result1 = json_decode($result);
                $result2 = $result1->success;
                $result3 = $result1->message;
                if ($result2 == false) {
                    echo 0;
                } else {
                    $result4 = $result1->data;
                    $result5 = $result4[0];
                    $data['sljjdw'] = $result5->sljjdw;
                    $data['mjxm'] = $result5->mjxm;
                    $data['mjdh'] = $result5->mjdh;
                    $data['slAjclqk'] = $result5->slAjclqk;
                    $data['zyaq'] = $result5->zyaq;
                    $data['id'] = $result5->id;
                    $data['ajbh'] = $result5->ajbh;
                    $_SESSION['alarm_return'] = $data;
                    echo json_encode($data);
                }
            }else{
                echo 0;
            }
	    }
    }
    public function query_alarm() {
        $alarm_phonecode=$_SESSION['alarm_phonecode'];
        $alarm_return=$_SESSION['alarm_return'];
        if(IS_POST){
            $caseID = I("caseID","", "trim");
            $mobile = I("mobile","", "trim");
            $code = I("code","", "trim");
            if($code==$alarm_phonecode){
                   echo json_encode($alarm_return);
            }else{
                echo 0;
            }
        }
    }

    public function alarm_pingjia()
    {
        $pjdj = I("post.kuang","","trim");//评价等级
        $cxrq = date("Y-m-d H:i:s ");
       $result=$_SESSION['alarm_return'];
        $id=$result['id'];
        $dwdmz=substr($result['ajbh'], 1, 8)."0000";
        if(IS_POST) {
                $dbh = new\PDO('mysql:dbname=wsga_hlw;host=192.168.100.12;charset=utf8', 'wsga_hlw', 'qazpl,123!@#BNM');
                $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                $sql = "UPDATE `ygjw_jqslxx_receive` SET `pjdj`=?,`cxrq`=?,`dwdmz`=? WHERE (`id`=?)";
                $query = $dbh->prepare($sql);
                $exeres = $query->execute(array($pjdj,$cxrq,$dwdmz,$id));
                $dbh = null;
                if ($exeres) {
                    echo 1;
                } else {
                    echo 0;
                }
        }
    }

    public function query_case_phone() {
        if(IS_POST){
            $lifeTime =600;
            session_set_cookie_params($lifeTime);
            session_start();
            $caseID = I("caseID","", "trim");
            $mobile = I("mobile","", "trim");
            $round = I("round","", "trim");
            if(is_numeric($mobile) && strlen($mobile) == 11&& strlen($caseID)== 23&& strlen($round) == 4) {
            $_SESSION['case_phonecode']=$round;
            ini_set('max_execution_time', '400');
            $wsdl = "http://127.0.0.1:8081/SSMFramework/services/ZaajcxService?wsdl";
            $client = new\SoapClient($wsdl);
            $parameters =array("args0" =>$mobile,"args1" =>$caseID,"args2" =>$round);
            $ret=$client->GetZaajcxResult($parameters);
            $result=$ret->return;
            $result1=json_decode($result);
            $result2=$result1->success;
            $result3=$result1->message;
            if($result2==false){
                echo 0;
            }else{
                $result4=$result1->data;
                $result5=$result4[0];
                $data['sljjdw']=$result5->sljjdw;
                $data['mjxm']=$result5->mjxm;
                $data['mjdh']=$result5->mjdh;
                $data['slAjclqk']=$result5->slAjclqk;
                $data['zyaq']=$result5->zyaq;
                $data['id']=$result5->id;
                $data['ajbh'] = $result5->ajbh;
                $_SESSION['case_return']=$data;
                echo json_encode($data);
            }
            }else{
                echo 0;
            }
        }
    }
    public function query_case() {
        $case_phorecode=$_SESSION['case_phonecode'];
        $case_return=$_SESSION['case_return'];
        if(IS_POST){
            $caseID = I("caseID","", "trim");
            $mobile = I("mobile","", "trim");
            $code = I("code","", "trim");
            if($code==$case_phorecode){
                echo json_encode($case_return);
            }else{
                echo 0;
            }
        }
    }

    public function case_pingjia()
    {
        $pjdj = I("post.kuang","","trim");//评价等级
        $cxrq = date("Y-m-d H:i:s ");
        $result=$_SESSION['case_return'];
        $id=$result['id'];
        $dwdmz=substr($result['ajbh'], 1, 8)."0000";
        if(IS_POST) {
            $dbh = new\PDO('mysql:dbname=wsga_hlw;host=192.168.100.12;charset=utf8', 'wsga_hlw', 'qazpl,123!@#BNM');
            $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $sql = "UPDATE `ygjw_zaajxx_receive` SET `pjdj`=?,`cxrq`=?,`dwdmz`=? WHERE (`id`=?)";
            $query = $dbh->prepare($sql);
            $exeres = $query->execute(array($pjdj,$cxrq,$dwdmz,$id));
            $dbh = null;
            if ($exeres) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function query_order_phone() {
        if(IS_POST){
            $lifeTime =600;
            session_set_cookie_params($lifeTime);
            session_start();
            $caseID = I("caseID","", "trim");
            $mobile = I("mobile","", "trim");
            $round = I("round","", "trim");
	
            if(is_numeric($mobile) && strlen($mobile) == 11&& strlen($caseID)==23&& strlen($round) == 4) {
		
            $_SESSION['order_phonecode']=$round;
            ini_set('max_execution_time', '400');
            $wsdl = "http://127.0.0.1:8081/SSMFramework/services/XsajcxService?wsdl";
            $client = new\SoapClient($wsdl);
            $parameters =array("args0" =>$mobile,"args1" =>$caseID,"args2" =>$round);
            $ret=$client->GetXsajcxResult($parameters);
            $result=$ret->return;
		
            $result1=json_decode($result);
            $result2=$result1->success;
            $result3=$result1->message;
            if($result2==false){
                echo 0;
            }else{
                $result4=$result1->data;
                $result5=$result4[0];
                $data['sljjdw']=$result5->sljjdw;
                $data['mjxm']=$result5->mjxm;
                $data['mjdh']=$result5->mjdh;
                $data['slAjclqk']=$result5->slAjclqk;
                $data['zyaq']=$result5->zyaq;
                $data['id']=$result5->id;
                $data['ajbh'] = $result5->ajbh;
                $_SESSION['order_return']=$data;
                echo json_encode($data);
            }
            }else{
                echo 0;
            }
        }
    }
  public function query_order() {
      $order_phorecode=$_SESSION['order_phonecode'];
      $order_return=$_SESSION['order_return'];
      if(IS_POST){
          $caseID = I("caseID","", "trim");
          $mobile = I("mobile","", "trim");
          $code = I("code","", "trim");
          if($code==$order_phorecode){
              echo json_encode($order_return);
          }else{
              echo 0;
          }
      }
  }
    public function order_pingjia()
    {
        $pjdj = I("post.kuang","","trim");//评价等级
		
        $cxrq = date("Y-m-d H:i:s ");
        $result=$_SESSION['order_return'];
        $id=$result['id'];
        $dwdmz=substr($result['ajbh'], 1, 8)."0000";
        if(IS_POST) {
            $dbh = new\PDO('mysql:dbname=wsga_hlw;host=192.168.100.12;charset=utf8', 'wsga_hlw', 'qazpl,123!@#BNM');
            $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $sql = "UPDATE `ygjw_xsajxx_receive` SET `pjdj`=?,`cxrq`=?,`dwdmz`=? WHERE (`id`=?)";
            $query = $dbh->prepare($sql);
            $exeres = $query->execute(array($pjdj,$cxrq,$dwdmz,$id));
            $dbh = null;
            if ($exeres) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}
