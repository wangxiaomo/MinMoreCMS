<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 系统权限配置，用户角色管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class SiteController extends AdminBase {
    public function template_prefix() {
        if(IS_POST){

        }else{
            $this->display();
        }
    }
}
