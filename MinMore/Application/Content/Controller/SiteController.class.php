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
        $this->display("Index/work_building");
    }

    public function sunshine_police() {
        //link => 阳光警务
        $this->display("Index/sunshine_police");
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
}
