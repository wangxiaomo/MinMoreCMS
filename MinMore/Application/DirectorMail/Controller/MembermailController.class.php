<?php

namespace DirectorMail\Controller;

use Common\Controller\Base;

class MembermailController extends Base {

    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->assign("npc_page", true);
        $this->db = D('DirectorMail/Membermail');
    }
    public function info() {
        $this->assign("title", "代表委员会直通车");
        $this->display();
    }
    public function add() {
        $uid = $this->islogin();
        if (IS_POST) {
            $post = I('post.');
            $post['roleid'] = get_site_role();
            $post['uid'] = $uid;
            $id = $this->db->addMembermail($post); 
            if ($id) {
                $this->success('提交建议成功');
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '提交建议失败！');
            }
        } else {
            $where = array(
                'uid' => $uid,
            );
            $count = $this->db->where($where)->count();
            $page = page($count, 10);
            $data = $this->db->where($where)->limit($page->firstRow.','.$page->listRows)->order(array("id"=>"DESC"))->select();
            foreach ($data as &$value) {
                if ($value['roleid']) {
                    $role = M('Role')->where(array('id' => $value['roleid']))->find();
                    $value['roleid'] = $role['name'].$role['level'];
                } else {
                    $value['roleid'] = '暂无';
                }
            }
            $this->assign('dataList', $data);
            $this->assign("Page", $page->show('Admin'));
            $this->display();
        }
    }
    public function login() {
        if (IS_POST) {
            $tel = I('post.tel');
            $pwd = I('post.pwd');
            if (empty($tel) || empty($pwd)) {
                $this->error('手机号、密码不能为空');
            }
            $userMsg = M('MembermailUser')->where(array('tel'=>$tel))->find();
            if (md5($pwd) == $userMsg['pwd']) {
                session('membermailuid', $userMsg['uid']);
                $this->redirect('DirectorMail/Membermail/add');
            }
            $this->error('手机号、密码错误！');
        }
        $this->display();
    }
    public function mail() {
        $uid = $this->islogin(); 
        $mailid = I('get.mailid', 0, 'intval');
        $data = $this->db->mail($mailid);
        if (!$data) {
            $this->error('非法操作！');
        }
        $this->assign('data', $data);
        $this->display();
    }
    private function islogin() {
        $uid = session('membermailuid');
        if (!$uid) {
            $this->redirect('DirectorMail/Membermail/login');
        }
        return $uid;
    }
}
