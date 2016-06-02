<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Member\Behavior;

class ContentCheckEndBehavior {

    public function run(&$params) {
        //参数是审核文章的数据
        if (!empty($params) && isset($params['sysadd']) && $params['sysadd'] == 0 && $params['sysadd'] != 99) {
            //标识审核状态
            M('MemberContent')->where(array('catid' => $params['catid'], 'content_id' => $params['id']))->save(array('status' => 1));
        }
    }

}
