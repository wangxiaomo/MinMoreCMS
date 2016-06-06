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
    public function police_news() {
        $this->display("Index/police_news");
    }

    public function work_building() {
        $this->display("Index/work_building");
    }

    public function sunshine_police() {
        $this->display("Index/sunshine_police");
    }
}
