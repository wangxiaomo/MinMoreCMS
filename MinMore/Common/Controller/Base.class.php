<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 前台Controller
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Common\Controller;

class Base extends MinMoreCMS {

    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->setupSite();
        //静态资源路径
        $this->assign('model_extresdir', self::$Cache['Config']['siteurl'] . MODULE_EXTRESDIR);
    }

    /**
     * 模板显示 调用内置的模板引擎显示方法，
     * @access protected
     * @param string $templateFile 指定要调用的模板文件
     * 默认为空 由系统自动定位模板文件
     * @param string $charset 输出编码
     * @param string $contentType 输出类型
     * @param string $content 输出内容
     * @param string $prefix 模板缓存前缀
     * @return void
     */
    protected function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '') {
        $this->view->display(parseTemplateFile($templateFile), $charset, $contentType, $content, $prefix);
    }

}
