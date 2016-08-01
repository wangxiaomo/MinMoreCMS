<?php

namespace DirectorMail\Model;

use Common\Model\Model;

class OfficerModel extends Model {

	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('name', 'require', '姓名不能为空！', 1, 'regex', 3),
			array('oid', 'require', '单位ID不能为空', 1, 'regex', 3),
			array('oname', 'require', '单位名称为空或不完整！', 1, 'regex', 3),
			);
	//自动完成
	protected $_auto = array(
			//array(填充字段,填充内容,填充条件,附加规则)
			//        array('createtime', 'time', 1, 'function'),
			);

	/**
	 * 添加接访领导
	 * @param type $data
	 * @return boolean
	 */
	public function addOfficer($data) {
		if (empty($data)) {
			$this->error = '领导信息不能为空！';
			return false;
		}
		$data = $this->create($data, 1);
		if (!$data) {
			return false;
		}
		//检查信件类型是否存在
		$db = M('officer');
		$id = $this->add($data);
		if ($id) {
			return $id;
		}
		$this->error = '添加接访领导失败！';
		return false;
	}

	/**
	 * 信件删除
	 * @param type $ids 留言ID
	 * @return boolean
	 */
	public function deleteOfficer($ids) {
		if (empty($ids)) {
			$this->error = '请指定需要删除的领导！';
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

	public function getError(){
		return $this->error;
	}
}

