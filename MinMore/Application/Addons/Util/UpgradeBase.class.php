<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Addons\Util;

abstract class UpgradeBase {

    //错误信息
    protected $error = NULL;

    //实现升级代码
    abstract public function run();

    /**
     * 返回错误信息
     * @return type
     */
    public function getError() {
        return $this->error;
    }

}
