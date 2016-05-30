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
            $id = I("id");
            $prefix = I("prefix");
            D("RoleLevel")->where("id=$id")->save(Array(
                "template_prefix"=>$prefix,
            ));
            $this->jsonReturn(Array("r"=>1));
        }else{
            $levels = D("RoleLevel")->order("listorder")->select();
            $this->assign("levels", $levels);
            $this->display();
        }
    }
}
