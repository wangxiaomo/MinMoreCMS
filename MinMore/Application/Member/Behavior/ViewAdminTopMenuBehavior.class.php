<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Member\Behavior;

use Libs\System\Behavior;

class ViewAdminTopMenuBehavior extends Behavior {

    public function run(&$params) {
        $this->display();
    }

}
