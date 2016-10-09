<?php

namespace DirectorMail\Model;

use Common\Model\Model;

class ConsultModel extends Model {

    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('xm', 'require', '姓名不能为空！', 1, 'regex', 3),
        array('sjhm', 'require', '手机号码不能为空！', 1, 'regex', 3),
        array('yxdz', 'email', '联系邮箱填写错误！', 1, 'regex', 3),
        array('sfzh', 'require', '身份证号不能为空', 1, 'regex', 3),
        array('cxmm', 'require', '查询密码不能为空！', 1, 'regex', 3),
        array('sljg', 'require', '受理机构不能为空！', 1, 'regex', 3),
        array('xjzt', 'require', '新建主题不能为空！', 1, 'regex', 3),
        array('xxnr', 'require', '详细内容不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('tjsj', 'time', 1, 'function'),
        array('deptid', get_department_id,1,'function')
    );

    /**
     * 回复信件
     * @param type $data
     * @return boolean
     */
    public function replyConsult($data) {
        if (empty($data['hfnr']) || empty($data['id'])) {
            $this->error = '回复内容不能为空！';
            return false;
        }
        $saveData = array(
            'hfnr' => $data['hfnr'],
            'hfdw' => get_site_role(),
            'hfsj' => time(),
        );
        if ($this->where(array('id' => $data['id']))->save($saveData) !== false) {
            return true;
        } else {
            $this->error = '回复失败！';
            return false;
        }
    }

    /**
     * 添加网上咨询
     * @param type $data
     * @return boolean
     */
    public function addConsult($data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        $data = $this->create($data, 1);
        if (!$data) {
            return false;
        }
        $id = $this->add($data);
        if ($id) {
			$nowtime=time();
			$flow=array(
					'mailtype'=>3
					,'subtype'=>$data['type']
					,'mailid'=>$id
					,'deptid'=>get_department_id()
					,'status'=>0
					,'in'=>$nowtime
					,'updatetime'=>$nowtime
					);
			$ret=M('workflow')->add($flow);
            return $id;
        }
        $this->error = '填写网上咨询失败！';
        return false;
    }

    /**
     * 删除
     * @param type $ids 留言ID
     * @return boolean
     */
    public function deleteConsult($ids) {
        if (empty($ids)) {
            $this->error = '请指定需要删除的网上咨询信件！';
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
        if ($data['hfdw']) {
            $role = M('Role')->where(array('id' => $data['roleid']))->find();
            $data['hfdw'] = $role['name'].$role['level'];
            $data['zt'] = '已受理';
        } else {
            $data['hfdw'] = '暂无';
            $data['zt'] = '暂未受理';
        }
        return $data;
    }

}
