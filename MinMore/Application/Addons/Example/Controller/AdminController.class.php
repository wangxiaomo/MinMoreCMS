<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Addon\AddonsName\Controller;

use Addons\Util\Adminaddonbase;

class AdminController extends Adminaddonbase {

    public function index() {
        $this->display();
    }

}