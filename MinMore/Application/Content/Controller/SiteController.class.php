<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 网站前台
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Content\Controller;

use Common\Controller\Base;
class SiteController extends Base {
    //这里放一些 CMS 不好处理的链接关系
    public function police_news() {
        //link => 警务资讯
        $this->display("Index/police_news");
    }

    public function work_building() {
        //link => 办事大厅
        header("Location:" . C("WORK_BUILDING_URL"));
    }

    public function sunshine_police() {
        //link => 阳光警务
        $this->display("Index/sunshine_police");
    }

    public function police_interaction() {
        //link => 警民互动
        $todaymin = strtotime(date('Ymd'));                                     
        $todaymax = $todaymin + 86399;                                          
                                                                                
        $db = M('Directormail');
        $yestodaymin = $todaymin - 86400;                                                                                                                                                
        $ysetodaymax = $todaymin - 1;                                           
        $todaywhere['roleid'] = get_site_role();                                
        $todaywhere['createtime'] = array('between', array($todaymin, $todaymax));
        $today = $db->where($todaywhere)->count();                        
        $yestodaywhere['roleid'] = get_site_role();                             
        $yestodaywhere['createtime'] = array('between', array($yestodaymin, $yestodaymax));
        $yestoday = $db->where($yestodaywhere)->count();                  
        $where['roleid'] = get_site_role();
        $where['reply'] = array('NEQ', '');
        $over = $db->where($where)->count();
        $this->assign('over', $over);
        $this->assign('today', $today);                                         
        $this->assign('yestoday', $yestoday);
        $this->display("Index/police_interaction");
    }

    public function service_people() {
        //link => 服务民生
        $catid = "15";
        $parent = getCategory($catid);
        $subids = explode(",", $parent["arrchildid"]);
        array_shift($subids);
        foreach($subids as $v){
            $cat = getCategory($v);
            $children[] = array(
                "name"  =>  $cat["catname"],
                "url"   =>  $cat["url"],
                "id"    =>  $cat["catid"],
            );
        }
        $this->assign("catid", "21");
        $this->assign("parent", $parent);
        $this->assign("children", $children);
        $this->display("Index/service_people");
    }

    public function l4_info() {
        //link => Level 4 社区简介
        $this->assign("show_info_page", true);
        $this->display("Index/info");
    }

    public function l4_service() {
        //link => Level 4 服务简介
        $this->assign("show_service_page", true);
        $this->display("Index/service");
    }

    public function l4_request() {
        //link => Level 4 线索举报
        $this->assign("show_request_page", true);
        $this->display("Index/request");
    }

    public function alarm_query() {
        //link => 警情受理查询
        $this->display("Pages/alarm_query");
    }

    public function case_query() {
        //link => 案件受理查询
        $this->display("Pages/case_query");
    }

    public function order_query() {
        //link => 刑事案件查询
        $this->display("Pages/order_query");
    }

    public function police_cards() {
        //link => 警民联系卡
        $this->assign("show_police_cards", true);
        $this->display("Pages/police_cards");
    }

    public function map() {
        //link => site map
        $this->display("Pages/map");
    }
}
