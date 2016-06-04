<?php

// +----------------------------------------------------------------------
// | MinMoreCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Formguide\Model;

use Content\Model\ModelFieldModel;

class FormaguideFieldModel extends ModelFieldModel {

    protected $tableName = 'model_field';

    /**
     * 根据模型ID，返回表名
     * @param type $modelid
     * @param type $modelid
     * @return string
     */
    protected function getModelTableName($modelid, $issystem) {
        //读取模型配置 以后优化缓存形式
        $model_cache = cache('Model_form');
        //表名获取
        $model_table = $model_cache[$modelid]['tablename'];
        return $model_table;
    }

}
