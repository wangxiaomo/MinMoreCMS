<?php

namespace DirectorMail\Controller;

use Common\Controller\Base;

class ConsultController extends Base {

    //信件类型
    private $typeId = 0;
    private $flag = '';
    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        C('TMPL_ACTION_ERROR', APP_PATH . 'DirectorMail/View/error.php');
        C('TMPL_ACTION_SUCCESS', APP_PATH . 'DirectorMail/View/success.php');
        $headicon = I('get.type');
        switch ($headicon) {
            case 'wszx':
                $flag = '网上咨询';break;
            case 'wsjb':
                $flag = '网上举报';break;
            case 'qzts':
                $flag = '群众投诉';break;
            case 'jyxc':
                $flag = '建言献策';break;
        }
        if ($flag) {
            $this->flag = $flag;
            $this->assign('headicon', $flag);
            $this->assign('flag', $headicon);
            $this->assign("title", $this->flag);
        } else {
            $this->error('非法操作！');
        }
        $this->db = D('DirectorMail/Consult');
    }

    //网上咨询首页（最新回复列表）
    public function index() {
        $where = array(
            'roleid' => get_site_role(),
            'type' => I('get.type'),
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
		$this->assign('dataList', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->display();
    }

    //填写网上咨询
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
            $post['type'] = I('get.type');
		if($post['city']){
			$post['sljg']=$post['city'];
		if($post['barue']){
			$post['sljg']=$post['baure'];
		if($post['station']){
			$post['sljg']=$post['station'];
		}
		}
		}
            $id = $this->db->addConsult($post);
            if ($id) {
                $message = 'WSZX'.date('Ymd', time()).$id;                
                //$this->success($message,U('Consult/index',array('type'=>$post['type'])));
                $this->success($message,U('Consult/add',array('type'=>$post['type'])));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '提交' . $this->flag);
            }
        } else {
            $dataList = M()->query('select oid id, oname name from huoyi_office');
            $this->assign('data', $dataList);
		$citys=get_director_city();
		$this->assign('citys', $citys);
            $this->display();
        }
    }

    //我的咨询信息详情
    public function mail() {
        $mailid = I('get.mailid', 0, 'intval');
        $data = $this->db->mail($mailid);
        if (!$data) {
            $this->error('非法操作！');
        }
        $this->assign('data', $data);
        $this->display();
    }
    
    //我的咨询搜索列表
    public function search() {
        if (IS_POST) {
            $sjhm = I('post.sjhm');
            if (!empty($sjhm)) {
                $where['sjhm'] = $sjhm;
            } else {
                $this->error('请输入手机号码！');
            }
            $cxmm = I('post.cxmm');
            if (!empty($cxmm)) {
                $where['cxmm'] = $cxmm;
            } else {
                $this->error('请输入查询密码！');
            }
            $where['type'] = I('get.type');
            $count = $this->db->where($where)->count();
            $page = page($count, 10);
            $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
            foreach ($data as &$value) {
                if ($value['hfdw']) {
                    $role = M('Role')->where(array('id' => $value['hfdw']))->find();
                    $value['hfdw'] = $role['name'].$role['level'];
                } else {
                    $value['hfdw'] = '暂无';
                }
            }
		    $this->assign('dataList', $data);
        }
        $this->display(); 
    }
}
