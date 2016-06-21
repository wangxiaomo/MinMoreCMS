<?php

namespace DirectorMail\Controller;

use Common\Controller\Base;

class IndexController extends Base {

    //信件类型
    private $typeId = 0;
    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        C('TMPL_ACTION_ERROR', APP_PATH . 'DirectorMail/View/error.php');
        C('TMPL_ACTION_SUCCESS', APP_PATH . 'DirectorMail/View/success.php');
        /*$this->typeId = I('typeid', 0, 'intval');
        if (empty($this->typeId)) {
            $this->error('信件类型错误！');
        }
        $this->assign('typeid', $this->typeId);*/
        $this->assign("director_mail_page", true);
        $this->db = D('DirectorMail/Directormail');
    }

    //局长信箱首页
    public function index() {
        $where = array(
            'secrecy' => 1,
            'roleid' => get_site_role(),
        );
        $count = $this->db->where($where)->count();
        $page = page($count, 10);
        $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
        foreach ($data as &$value) {
            if ($value['roleid']) {
                $role = M('Role')->where(array('id' => $value['roleid']))->find();
                $value['roleid'] = $role['name'].$role['level'];
            } else {
                $value['roleid'] = '暂无';
            }
        }
        //$this->assign('data', $data);
        $this->assign("title", "局长信箱");
		$this->assign('dataList', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->display();
    }

    //增加信件
    public function add() {
        if (IS_POST) {
            //验证码
            $validate = I('post.validate');
            if (empty($validate)) {
                $this->error('验证码不能为空！');
            }
            //验证
            if ($this->verify($validate, 'directormail') == false) {
                $this->error('验证码错误，请重新输入！');
            }
            //提交
            $post = I('post.');
            $post['roleid'] = get_site_role();
            if (!empty($_FILES['upload']['tmp_name'])) {
                $info = $this->upload();
                if (!empty($info[0]['url'])) {
                    $post['upload'] = $info[0]['url'];
                }
            }
            $id = $this->db->addDirectorMail($post);
            if ($id) {
                $message = 'C'.date('Ymd', time()).$id;                
                $this->success($message, U('Index/index', array('typeid' => $post['typeid'])));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '写信失败！');
            }
        } else {
            $typeList = M('DirectormailType')->order(array('typeid' => 'DESC'))->select();
            $this->assign('typeList', $typeList); 
            $this->display();
        }
    }

    public function info() {
        $this->display();
    }
    
    public function upload() {
        $upload = new \Libs\Driver\Attachment\Local();
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getErrorMsg());
        } else {
            return $info;
        }
    }

    public function mail() {
        $mailid = I('get.mailid', 0, 'intval');
        $data = $this->db->mail($mailid);
        if (!$data) {
            $this->error('非法操作！');
        }
        $this->assign('data', $data);
        $this->display();
    }

    public function search() {
        if (IS_POST) {
            $tel = I('post.tel');
            if (!empty($tel)) {
                $where['shouji'] = $tel;
            }
            $code = I('post.code');
            if (!empty($code) && strlen($code) > 9) {
                $where['id'] = substr($code, 9);
            }
            if (!isset($where)) {
                $this->error('请正确输入查询条件');
            }
                        
            $where['secrecy'] = 1;
            $count = $this->db->where($where)->count();
            $page = page($count, 10);
            $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
            foreach ($data as &$value) {
                if ($value['roleid']) {
                    $role = M('Role')->where(array('id' => $value['roleid']))->find();
                    $value['roleid'] = $role['name'].$role['level'];
                } else {
                    $value['roleid'] = '暂无';
                }
            }
		    $this->assign('dataList', $data);
        }
        $this->display(); 
    }
}
