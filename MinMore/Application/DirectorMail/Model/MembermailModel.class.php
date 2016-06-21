<?php

namespace DirectorMail\Model;

use Common\Model\Model;

class MembermailModel extends Model {

    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('type', 'require', '性质不能为空！', 1, 'regex', 3),
        array('zhuti', 'require', '主题不能为空！', 1, 'regex', 3),
        array('introduce', 'require', '详细内容不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('createtime', 'time', 1, 'function'),
    );

    /**
     * 回复信件
     * @param type $data
     * @return boolean
     */
    public function replyMembermail($data) {
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
    public function addMembermail($data) {
        if (empty($data)) {
            $this->error = '详细内容不能为空！';
            return false;
        }
        $data = $this->create($data, 1);
        if (!$data) {
            return false;
        }
        $id = $this->add($data);
        if ($id) {
            return $id;
        }
        $this->error = '提交建议失败！';
        return false;
    }

    /**
     * 信件删除
     * @param type $ids 留言ID
     * @return boolean
     */
    public function deleteMembermail($ids) {
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
                'uid' => session('membermailuid')
            );
        $data = $this->where($where)->find();
        if (!$data) {
            $this->error = '非法操作！';
            return false;
        }
        $data['tel'] = M('MembermailUser')->where(array('uid' => $data['uid']))->getField('tel');
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
     * 添加信件类型
     * @param type $data
     * @return boolean
     */
    public function addMember($data) {
        if (empty($data['tel']) || empty($data['pwd']) || empty($data['remarks'])) {
            $this->error = '请填写全部信息！';
            return false;
        }
        $data['pwd'] = md5($data['pwd']);
        $db = M('MembermailUser');
        $data = $db->create($data, 1);
        if ($data) {
            $uid = $db->add($data);
            if ($uid) {
                return $uid;
            } else {
                $this->error = '代表委员信息添加失败！';
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
    public function deleteMember($uid) {
        if (empty($uid)) {
            $this->error = '请指定需要删除的代表委员！';
            return false;
        }
        $db = M('MembermailUser');
        if ($db->where(array('uid' => $uid))->delete() !== false) {
            $this->where(array('uid' => $uid))->delete();
            return true;
        } else {
            $this->error = '代表委员删除失败！';
            return fale;
        }
    }

}