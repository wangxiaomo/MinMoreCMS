<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Formguide\Uninstall;

use Libs\System\UninstallBase;

class Uninstall extends UninstallBase {

    public function run() {
        //取得模型
        $model = D('Content/Model')->where(array("type" => 3))->select();
        if ($model) {
            foreach ($model as $r) {
                if ($r['modelid'] && $r['type'] == 3) {
                    //删除模型数据
                    D('Content/Model')->where(array('modelid' => $r['modelid']))->delete();
                    //删除数据表
                    D('Content/Model')->DeleteTable($r['tablename']);
                }
            }
        }
        return true;
    }

}
