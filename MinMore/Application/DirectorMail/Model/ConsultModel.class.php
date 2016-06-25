<?php

namespace DirectorMail\Model;

use Common\Model\Model;

class ConsultModel extends Model {

    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('typeid', 'require', '信件类型不能为空！', 1, 'regex', 3),
        array('name', 'require', '姓名不能为空！', 1, 'regex', 3),
        array('zhuti', 'require', '主题不能为空！', 1, 'regex', 3),
        array('email', 'require', '联系邮箱不能为空！', 1, 'regex', 3),
        array('email', 'email', '联系邮箱填写错误！', 1, 'regex', 3),
        array('addr', 'require', '联系地址不能为空', 1, 'regex', 3),
        array('introduce', 'require', '信件内容不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('createtime', 'time', 1, 'function'),
        array('listorder', 0),
    );

    /**
     * 添加信件类型
     * @param type $data
     * @return boolean
     */
    public function addType($data) {
        if (empty($data)) {
            $this->error = '信件类型不能为空！';
            return false;
        }
        if (empty($data['name'])) {
            $this->error = '信件类型不能为空！';
            return false;
        }
        $db = M('DirectormailType');
        $data = $db->create($data, 1);
        if ($data) {
            $typeId = $db->add($data);
            if ($typeId) {
                return $typeId;
            } else {
                $this->error = '信件类型添加失败！';
                return false;
            }
        }
        return false;
    }

    /**
     * 删除信件类型
     * @param type $typeId 分类ID
     * @return boolean
     */
    public function deleteType($typeId) {
        if (empty($typeId)) {
            $this->error = '请指定需要删除的信件类型！';
            return false;
        }
        $db = M('DirectormailType');
        if ($db->where(array('typeid' => $typeId))->delete() !== false) {
            $this->where(array('typeid' => $typeId))->delete();
            return true;
        } else {
            $this->error = '信件类型删除失败！';
            return fale;
        }
    }

    /**
     * 回复信件
     * @param type $data
     * @return boolean
     */
    public function replyDirectorMail($data) {
        if (empty($data['reply']) || empty($data['id'])) {
            $this->error = '回复内容不能为空！';
            return false;
        }
        $saveData = array(
            'reply' => $data['reply'],
            'replytime' => time(),
        );
        if ($this->where(array('id' => $data['id']))->save($saveData) !== false) {
            return true;
        } else {
            $this->error = '回复失败！';
            return false;
        }
    }

    /**
     * 添加信件
     * @param type $data
     * @return boolean
     */
    public function addDirectorMail($data) {
        if (empty($data)) {
            $this->error = '信件内容不能为空！';
            return false;
        }
        $data = $this->create($data, 1);
        if (!$data) {
            return false;
        }
        //检查信件类型是否存在
        $db = M('DirectormailType');
        if ($db->where(array('typeid' => $data['typeid']))->count() == 0) {
            $this->error = '该信件类型不存在！';
            return false;
        }
        $id = $this->add($data);
        if ($id) {
            return $id;
        }
        $this->error = '填写信件失败！';
        return false;
    }

    /**
     * 信件删除
     * @param type $ids 留言ID
     * @return boolean
     */
    public function deleteDirectorMail($ids) {
        if (empty($ids)) {
            $this->error = '请指定需要删除的信件！';
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

    public function mail($mailid) {
        if (empty($mailid)) {
            $this->error = '非法操作！';
            return false;
        }
        $where = array(
                'id' => $mailid,                                            
                'secrecy' => 1
            );
        $data = $this->where($where)->find();
        if (!$data) {
            $this->error = '非法操作！';
            return false;
        }
        $data['typeid'] = M('DirectormailType')->where(array('typeid' => $data['typeid']))->getField('name');
        if ($data['roleid']) {
            $role = M('Role')->where(array('id' => $data['roleid']))->find();
            $data['roleid'] = $role['name'].$role['level'];
            $data['zt'] = '已受理';
        } else {
            $data['roleid'] = '暂无';
            $data['zt'] = '暂未受理';
        }
        return $data;
    }
    /**
     * 添加快捷回复
     * @param type $data
     * @return boolean
     */
    public function addQuickreply($data) {
        if (empty($data)) {
            $this->error = '快捷回复不能为空！';
            return false;
        }
        if (empty($data['quickreply'])) {
            $this->error = '快捷回复不能为空！';
            return false;
        }
        $db = M('DirectormailQuickreply');
        $data = $db->create($data, 1);
        if ($data) {
            $id = $db->add($data);
            if ($id) {
                return $id;
            } else {
                $this->error = '快捷回复添加失败！';
                return false;
            }
        }
        return false;
    }

    /**
     * 删除快捷回复
     * @param type $typeId 分类ID
     * @return boolean
     */
    public function deleteQuickreply($id) {
        if (empty($id)) {
            $this->error = '请指定需要删除的快捷回复！';
            return false;
        }
        $db = M('DirectormailQuickreply');
        if ($db->where(array('id' => $id))->delete() !== false) {
            return true;
        } else {
            $this->error = '信件类型删除失败！';
            return fale;
        }
    }
}
