<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

return array(
    //模块名称
    'modulename' => '搜索',
    //图标
    'icon' => 'http://www.minmore.com/assets/search.png',
    //模块简介
    'introduce' => '全站内容信息搜索',
    //模块介绍地址
    'address' => 'http://www.minmore.com',
    //模块作者
    'author' => 'wangxiaomo',
    //作者地址
    'authorsite' => 'http://www.minmore.com',
    //作者邮箱
    'authoremail' => 'dev@minmore.com',
    //版本号，请不要带除数字外的其他字符
    'version' => '1.0.2',
    //适配最低MinMoreCMS版本，
    'adaptation' => '2.0.0',
    //签名
    'sign' => '2e01dfe1d6be7e454aea66c442639b7e',
    //依赖模块
    'depend' => array('Content'),
    //行为注册
    'tags' => array(
        'content_add_end' => array(
            'title' => '内容添加结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
        'content_edit_end' => array(
            'title' => '内容编辑结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
        'content_check_end' => array(
            'title' => '内容审核结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
        'content_delete_end' => array(
            'title' => '内容删除结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
    ),
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => array(
        'Search_config' => array(
            'name' => '全站搜索配置',
            'model' => 'Search',
            'action' => 'search_cache',
        ),
    ),
);
