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

class IndexController extends MinMoreCMS {

    public function token() {
        $token = \Libs\Util\Encrypt::authcode($_POST['token'], 'DECODE', C('CLOUD_USERNAME'));
        if (!empty($token)) {
            S($this->Cloud->getTokenKey(), $token, 3600);
            $this->success('验证通过');
            exit;
        }
        $this->error('验证失败');
    }

}
