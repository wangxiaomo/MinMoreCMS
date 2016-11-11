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

        //wangxiaomo: get service start information
        $star = D('ServiceStar')->join('minmore_service_star_data on minmore_service_star.id=minmore_service_star_data.id')
                    ->field("title as name,thumb,policeid,position,department")->find();
        $this->assign("star", $star);
                                                                                
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
		
		$interviewMsg_m 		 =  M("interview");
        $wherereply["is_open"]   =  "on";
        $interview          		 =  $interviewMsg_m->where($wherereply)->order("create_time desc")->find();
        $this->assign('interview',$interview);
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
        $children[] = array(
            "name"  =>  "电子地图",
            "url"   =>  get_site_cache('baidu_loc'),
        );
        $this->assign("catid", "21");
        $this->assign("parent", $parent);
        $this->assign("children", $children);
        $this->display("Index/service_people");
    }

    public function l2_service() {
        //link => Level 2 便民服务
        $this->display("Index/service");
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

    public function special_list() {
        $role = get_site_role();
        $specials = D('Special')->where("role=$role")->select();
        $this->assign('specials', $specials);
        $this->display("Pages/special_list");
    }

    public function news() {
        $this->assign("show_L1_news", true);
        $this->display("Index/news");
    }

    public function xuanchuan() {
        $this->assign("show_L1_xuanchuan", true);
        $this->display("Index/xuanchuan");
    }
}
