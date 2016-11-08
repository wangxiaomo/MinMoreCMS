<?php

namespace Special\TagLib;

class SpecialTagLib {

    protected $db = NULL;

    public function __construct() {
        //import("SpecialModel", APP_PATH . C("APP_GROUP_PATH") . '/Special/Model/');
        $this->db = D('Special');
    }

    /**
     * 数据统计，用于分页
     * @param type $data
     * @return type
     */
    public function count($data) {
        //专题列表
        if ($data['action'] == 'lists') {
            $where = array(
                'disabled' => 1,
            );
            //站点
            if ($data['role']) {
                $where['role'] = array('EQ', $data['role']);
            }
            //是否推荐
            if ($data['elite']) {
                $where['elite'] = 1;
            }
            //缩略图是否允许为空
            if ($data['thumb']) {
                $where['thumb'] = array('NEQ', '');
            }
            return $this->db->where($where)->count('id');
        } else if ($data['action'] == 'content_list') {//专题信息
            //import("SpecialContentModel", APP_PATH . C("APP_GROUP_PATH") . '/Special/Model/');
            $this->db = D('SpecialContent');
            $where = array();
            //专题ID
            if ((int) $data['specialid']) {
                $where['specialid'] = (int) $data['specialid'];
            }
            //分类ID
            if ((int) $data['typeid']) {
                $where['typeid'] = (int) $data['typeid'];
            }
            //缩略图是否允许为空
            if ((int) $data['thumb']) {
                $where['thumb'] = array('NEQ', '');
            }
            return $this->db->where($where)->count('id');
        }
    }

    /**
     * 专题列表
     * 参数名                       是否必须	默认值	 说明
     * siteid                        否	当前站点	 站点ID
     * elite                          否	null	 是否推荐
     * isthumb	 否	null	 必须有缩略图
     * order                        否	null	 排序
     * @param type $data
     * @return type
     */
    public function lists($data) {
        //缓存时间
        $cache = (int) $data['cache'];
        $cacheID = to_guid_string($data);
        if ($cache && $return = S($cacheID)) {
            return $return;
        }
        $where = array(
            'disabled' => 1,
        );
        //站点
        if ($data['role']) {
            $where['role'] = array('EQ', $data['role']);
        }
        //是否推荐
        if ($data['elite']) {
            $where['elite'] = 1;
        }
        //缩略图是否允许为空
        if ($data['thumb']) {
            $where['thumb'] = array('NEQ', '');
        }
        //排序方式
        $order = $data['order'] ? $data['order'] : array('id' => 'DESC');
        //判断是否启用分页，如果没启用分页则显示指定条数的内容
        if (!isset($data['limit'])) {
            $data['limit'] = (int) $data['num'] == 0 ? 10 : (int) $data['num'];
        }
        //查询数据
        $return = $this->db->where($where)->limit($data['limit'])->order($order)->select();
        //结果进行缓存
        if ($cache) {
            S($cacheID, $return, $cache);
        }
        //log
        if (APP_DEBUG) {
            $getLastSql = $this->db->_sql();
            $msg = "SpecialTagLib标签->lists：SQL:" . $getLastSql;
        }
        return $return;
    }

    /**
     * 专题信息列表
     * 参数名       是否必须        默认值	 说明
     * specialid    是                  null	 专题ID
     * typeid       否                  null	 分类ID
     * isthumb      否                  null	 必须有缩略图
     * order        否                  null	 排序
     * @param type $data
     * @return type
     */
    public function content_list($data) {
        //缓存时间
        $cache = (int) $data['cache'];
        $cacheID = to_guid_string($data);
        if ($cache && $return = S($cacheID)) {
            return $return;
        }
        //import("SpecialContentModel", APP_PATH . C("APP_GROUP_PATH") . '/Special/Model/');
        $this->db = D('SpecialContent');
        $where = array();
        //专题ID
        if ((int) $data['specialid']) {
            $where['specialid'] = (int) $data['specialid'];
        } else {
            return false;
        }
        //分类ID
        if ((int) $data['typeid']) {
            $where['typeid'] = (int) $data['typeid'];
        }
        //缩略图是否允许为空
        if ((int) $data['thumb']) {
            $where['thumb'] = array('NEQ', '');
        }
        //排序方式
        $order = $data['order'] ? $data['order'] : array('listorder' => 'ASC', 'id' => 'DESC');
        //判断是否启用分页，如果没启用分页则显示指定条数的内容
        if (!isset($data['limit'])) {
            $data['limit'] = (int) $data['num'] == 0 ? 10 : (int) $data['num'];
        }
        //查询数据
        $return = $this->db->where($where)->limit($data['limit'])->order($order)->select();
        //结果进行缓存
        if ($cache) {
            S($cacheID, $return, $cache);
        }
        //log
        if (APP_DEBUG) {
            $getLastSql = $this->db->_sql();
            $msg = "SpecialTagLib标签->content_list：SQL:" . $getLastSql;
        }
        return $return;
    }

    /**
     * 取得专题分类
     * 参数名       是否必须        默认值	 说明
     * specialid    是                  null	 专题ID
     * order        否                  null	 排序
     * @param type $data
     * @return type
     */
    public function get_type($data) {
        //缓存时间
        $cache = (int) $data['cache'];
        $cacheID = to_guid_string($data);
        if ($cache && $return = S($cacheID)) {
            return $return;
        }
        //import("SpecialTypeModel", APP_PATH . C("APP_GROUP_PATH") . '/Special/Model/');
        $this->db = D('SpecialType');
        $where = array();
        //专题ID
        if ((int) $data['specialid']) {
            $where['parentid'] = (int) $data['specialid'];
        } else {
            return false;
        }
        //排序方式
        $order = $data['order'] ? $data['order'] : array('listorder' => 'ASC', 'typeid' => 'DESC');
        //判断是否启用分页，如果没启用分页则显示指定条数的内容
        if (!isset($data['limit'])) {
            $data['limit'] = (int) $data['num'] == 0 ? 10 : (int) $data['num'];
        }
        
        //查询数据
        $return = $this->db->where($where)->limit($data['limit'])->order($order)->select();

        //结果进行缓存
        if ($cache) {
            S($cacheID, $return, $cache);
        }
        //log
        if (APP_DEBUG) {
            $getLastSql = $this->db->_sql();
            $msg = "SpecialTagLib标签->get_type：SQL:" . $getLastSql;
        }
        return $return;
    }

}
