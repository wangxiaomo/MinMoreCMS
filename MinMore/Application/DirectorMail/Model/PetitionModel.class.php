<?php

namespace DirectorMail\Model;

use Common\Model\Model;

class PetitionModel extends Model {

    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('name', 'require', '信访人姓名不能为空！', 1, 'regex', 3),
        array('cardid', 'require', '身份证号不能为空', 1, 'regex', 3),
        array('passwd', 'require', '查询密码不能为空！', 1, 'regex', 3),
        array('shouji', 'require', '手机号不能为空', 1, 'regex', 3),
        array('zhuti', 'require', '信访标题不能为空！', 1, 'regex', 3),
        array('addr', 'require', '联系地址不能为空', 1, 'regex', 3),
        array('introduce', 'require', '上访事由不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('createtime', 'time', 1, 'function'),
        array('listorder', 0),
    );


    /**
     * 回复信件
     * @param type $data
     * @return boolean
     */
    public function replyPetition($data) {
        if (empty($data['reply']) || empty($data['id'])) {
            $this->error = '回复内容不能为空！';
            return false;
        }
        $saveData = array(
            'reply' => $data['reply'],
            'status' => '1',
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
    public function addPetition($data) {
        if (empty($data)) {
            $this->error = '信件内容不能为空！';
            return false;
        }
        $data = $this->create($data, 1);
        if (!$data) {
            return false;
        }
        //检查信件类型是否存在
        $db = M('petition');
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
    public function deletePetition($ids) {
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
            );
        $data = $this->where($where)->find();
        if (!$data) {
            $this->error = '非法操作！';
            return false;
        }
        if ($data['roleid']) {
            $role = M('Role')->where(array('id' => $data['roleid']))->find();
            $data['roleid'] = $role['name'].$role['level'];
        } else {
            $data['roleid'] = '暂无';
        }
        if ($data['reply']) {
            $data['zt'] = '已办结';
        } else {
            $data['zt'] = '未办结';
        }
        return $data;
    }
}

