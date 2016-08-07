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
    public function query_alarm() {
        if(IS_POST){
            $caseID = I("caseID");
            $mobile = I("mobile");
            $code = I("code");

            if(check_user_vcode($code,$mobile)){
                C("DB_PREFIX", "ygjw_");
                $r = D("ajslxx")->where("ajbh='$caseID' and sjhm='$mobile'")->find();
                if($r){
                    $this->jsonReturn(array(
                        "r" => 1, "data" => $r,
                    ));
                }else{
                    $this->jsonReturn(array(
                        "r" =>  0, "msg"    =>  "查无此信息!"
                    ));
                }
            }else{
                $this->jsonReturn(array(
                    "r" =>  0, "msg"    =>  "验证码错误!"
                ));
            }
        }
    }

    public function query_alarm_phone() {
	    if(IS_POST){
		    $caseID = I("caseID");
		    $mobile = I("mobile");

		    C("DB_PREFIX", "ygjw_");
		    $r = D("ajslxx")->where("ajbh='$caseID' and sjhm='$mobile'")->find();
		    if($r){
			    $this->jsonReturn(array(
						    "r" => 1, "data" => $r,
						   ));
		    }else{
			    $this->jsonReturn(array(
						    "r" =>  0, "msg"    =>  "警情编号或者手机号码不正确，请核对后重新获取验证码"
						   ));
		    }
	    }
    }

    public function query_case() {
        if(IS_POST){
            $caseID = I("caseID");
            $mobile = I("mobile");
            $code = I("code");

            if(check_user_vcode($code,$mobile)){
                C("DB_PREFIX", "ygjw_");
                $r = D("zaajxx")->where("ajbh='$caseID' and sjhm='$mobile'")->find();
                if($r){
                    $this->jsonReturn(array(
                        "r" => 1, "data" => $r,
                    ));
                }else{
                    $this->jsonReturn(array(
                        "r" =>  0, "msg"    =>  "查无此信息!"
                    ));
                }
            }else{
                $this->jsonReturn(array(
                    "r" =>  0, "msg"    =>  "验证码错误!"
                ));
            }
        }
    }

    public function query_order() {
        if(IS_POST){
            $caseID = I("caseID");
            $mobile = I("mobile");
            $code = I("code");

            if(check_user_vcode($code,$mobile)){
                C("DB_PREFIX", "ygjw_");
                $r = D("xsajxx")->where("ajbh='$caseID' and sjhm='$mobile'")->find();
                if($r){
                    $this->jsonReturn(array(
                        "r" => 1, "data" => $r,
                    ));
                }else{
                    $this->jsonReturn(array(
                        "r" =>  0, "msg"    =>  "查无此信息!"
                    ));
                }
            }else{
                $this->jsonReturn(array(
                    "r" =>  0, "msg"    =>  "验证码错误!"
                ));
            }
        }
    }
}
