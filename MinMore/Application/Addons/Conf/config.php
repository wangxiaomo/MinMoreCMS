<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------
return array(
    'AUTOLOAD_NAMESPACE' => array_merge(C('AUTOLOAD_NAMESPACE'), array(
        'Addon' => PROJECT_PATH . 'Addon',
    )),
);
