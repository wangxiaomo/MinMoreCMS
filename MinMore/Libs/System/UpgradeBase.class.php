<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 模块升级脚本抽象类
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Libs\System;

abstract class UpgradeBase {

    //错误信息
    protected $error = '';

    /**
     * 卸载开始执行
     * @return boolean
     */
    public function run() {
        return true;
    }

    /**
     * 卸载完回调
     * @return boolean
     */
    public function end() {
        return true;
    }

    /**
     * 获取错误
     * @return string
     */
    public function getError() {
        return $this->error;
    }

}
