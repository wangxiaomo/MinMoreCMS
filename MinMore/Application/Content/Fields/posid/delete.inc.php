<?php

/**
 * 删除内容时，推荐位回调处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function posid($field, $value) {
    //删除推荐位
    $role = \Common\Controller\MinMoreCMS::$Cache["GLOBAL_ROLE"];
    return M('PositionData')->where(array('id' => $this->id, 'catid' => $this->catid, 'module' => 'content', 'role' => $role))->delete();
}
