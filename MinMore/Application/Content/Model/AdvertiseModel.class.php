<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 推荐位模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

namespace Content\Model;

use Common\Model\Model;

class AdvertiseModel extends Model {

    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('topic', 'require', '主题不能为空！', 0, 'regex', 1),
        array('topic', '', '广告主题已经存在！', 0, 'unique', 1),
        array('type', 'require', '必须选择一种位置类型!', 1, 'regex', 3),
        array('status', 'require', '需设定启用状态!', 1, 'regex', 3),
        array('picture', 'require', '必须上传图片!', 1, 'regex', 3),
    );

    /**
     * 添加广告
     * @param type $data 数据
     * @return boolean
     */
    public function advertiseAdd($data) {
        if (empty($data)) {
            $this->error = '没有数据！';
            return false;
        }
	if(!preg_match('/(http:\/\/)|(https:\/\/)/i', $data['link'])){
		$data['link']="http://".$data['link'];	
	}
        $data = $this->create($data, 1);
        if ($data) {
            $posid = $this->add($data);
            if ($posid) {
                return $posid;
            } else {
                $this->error = '添加失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 广告删除
     * @param type $ids 广告ID
     * @return boolean
     */
    public function advertiseDel($ids) {
        if (empty($ids)) {
            $this->error = '请指定需要删除的广告！';
            return false;
        }
        $where = array();
        if (is_array($ids)) {
            $where['id'] = array('IN', $ids);
        } else {
            $where['id'] = $ids;
        }
        $this->where($where)->delete();
        return true;
    }

    /**
     * 广告操作
     * @param type $id 广告ID $type 操作类型
     * @return boolean
     */
    public function advertiseOp($id,$name,$value) {
        if (empty($id)) {
            $this->error = '请指定需要操作的广告！';
            return false;
        }
        $where['id'] = $id;
        $data[$name] = $value;
	$this->where($where)->field('type,status')->filter('strip_tags')->save($data);
        return true;
    }

    /**
     * 广告操作
     * @param type $id 广告ID $type 操作类型
     * @return boolean
     */
    public function advertiseGet($type) {
        if (empty($type)) {
            $this->error = '请指定广告位类型！';
            return false;
        }
	switch($type){
		case 'left':
        	$where['type'] = 1;
		break;
		case 'right':
        	$where['type'] = 2;
		break;
		case 'float':
        	$where['type'] = 3;
		break;
		default:
		return false;
	}
	$where['roleid']=get_site_role();
        $where['status'] = 1;
	$ad=$this->where($where)->order(array('id'=>'DESC'))->find();
        return $ad;
    }
}
