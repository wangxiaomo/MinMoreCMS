<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\MinMoreCMS;

class SmsController extends MinMoreCMS {
    function send() {
        if(IS_POST){
            $mobile = I("mobile");
            if(is_numeric($mobile) && strlen($mobile) == 11){
                $vcode = send_vcode_sms($mobile);
                $this->jsonReturn(array(
                    'code'  =>  $vcode,
                ));
            }
        }
    }
}
