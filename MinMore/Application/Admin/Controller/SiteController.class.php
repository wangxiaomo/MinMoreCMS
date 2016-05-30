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

    public function domain_management() {
        if(IS_POST){
            $id = I("id");
            $domain = I("domain");
            $theme = I("theme");
            if($domain && $theme){
                D("Role")->where("id=$id")->save(Array(
                    "domain"=>$domain,
                    "theme"=>$theme,
                ));
                $this->jsonReturn(Array("r"=>1));
            }else{
                $this->jsonReturn(Array("r"=>0));
            }
        }else{
            $table_prefix = C("DB_PREFIX");
            $data = D("Role")->join("${table_prefix}role_level as rl on ${table_prefix}role.level=rl.name")
                    ->where("parentid=" . C("SITE_ROLE_PARENT"))
                    ->field("${table_prefix}role.id,${table_prefix}role.name,domain,theme,level,remark,rl.template_prefix")
                    ->order("rl.listorder")
                    ->select();
            foreach($data as &$v){
                $v["theme_list"] = get_theme_list_by_role_level($v["level"]);
            }
            $this->assign("data", $data);
            $this->display();
        }
    }
}
