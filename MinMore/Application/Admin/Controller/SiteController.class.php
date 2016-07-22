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
            D("RoleLevel")->where("id=$id")->save(array(
                "template_prefix"=>$prefix,
            ));
            $this->jsonReturn(array("r"=>1));
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
                D("Role")->where("id=$id")->save(array(
                    "domain"=>$domain,
                    "theme"=>$theme,
                ));
                //clear cache
                clear_site_cache();
                $this->jsonReturn(array("r"=>1));
            }else{
                $this->jsonReturn(array("r"=>0));
            }
        }else{
            $table_prefix = C("DB_PREFIX");
            if($this->isSiteUser()) {
                $role_id = get_site_role();
                $condition = " and ${table_prefix}role.id=$role_id";
            }else{
                $condition = "";
            }
            $data = D("Role")->join("${table_prefix}role_level as rl on ${table_prefix}role.level=rl.name")
                    ->where("parentid=" . C("SITE_ROLE_PARENT") . $condition)
                    ->field("${table_prefix}role.id,${table_prefix}role.name,domain,theme,level,remark,rl.template_prefix")
                    ->order("rl.listorder")
                    ->select();
            foreach($data as &$v){
                $v["theme_list"] = get_theme_list_by_role_level($v["level"]);
            }
            $this->assign("isSiteUser", $this->isSiteUser());
            $this->assign("data", $data);
            $this->display();
        }
    }
}
