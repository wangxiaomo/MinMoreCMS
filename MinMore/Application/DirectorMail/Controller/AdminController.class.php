<?php

namespace DirectorMail\Controller;

use Common\Controller\AdminBase;

class AdminController extends AdminBase {

    //信件模型
    private $db = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->db = D('DirectorMail/Directormail');
    }

    //后台首页
    public function index() {
        $where = array(
                'roleid' => get_site_role(),
            );
        $typeId = I('get.typeid');
        $typeList = M('DirectormailType')->order(array('typeid' => 'DESC'))->getField('typeid,name', true);
        if ($typeId) {
            $where['typeid'] = $typeId;
        }
        $count = $this->db->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->db->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign('data', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('typeList', $typeList);
        $this->assign('typeid', $typeId);
        $this->display();
    }

    //信件回复
    public function reply() {
        if (IS_POST) {
            $id = I('post.id', 0, 'intval');
            if (empty($id)) {
                $this->error('回复信件错误！');
            }
            $info = $this->db->where(array('id' => $id))->find();
            if (empty($info)) {
                $this->error('该信件不存在！');
            }
            $reply = I('post.reply');
            $qreply = I('post.quickreply');
            if (empty($reply) && empty($qreply)) {
                $this->error('回复内容不能为空！');
            }
            if ($this->db->replyDirectorMail(array('id' => $id, 'reply' => $reply))) {
                $this->success('回复成功！', U('index', "typeid={$info['tupeid']}&isadmin=1"));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '回复失败！');
            }
        } else {
            $id = I('get.id', 0, 'intval');
            $info = $this->db->where(array('id' => $id))->find();
            $quickreply = M('DirectormailQuickreply')->getField('quickreply', true);
            if (empty($info)) {
                $this->error('该信件不存在！');
            }
            if (!empty($quickreply)) {
                $this->assign('quickreply', $quickreply);    
            }
            $this->assign('info', $info);
            $this->display();
        }
    }

    //删除信件
    public function delete() {
        if (IS_POST) {
            $ids = I('post.ids');
        } else {
            $ids = I('get.id', 0, 'intval');
        }
        if (empty($ids)) {
            $this->error('请指定需要删除的信件！');
        }
        if ($this->db->deleteDirectorMail($ids)) {
            $this->success('信件删除成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }

    //信件类型管理
    public function type() {
        $db = M('DirectormailType');
        if (IS_POST) {
            $typeid = I('post.typeid');
            $name = I('post.name');
            if (empty($typeid) || !is_array($typeid)) {
                $this->error('请选择需要更新的内容！');
            }
            foreach ($typeid as $id) {
                if ($name[$id]) {
                    $db->where(array('typeid' => $id))->save(array('name' => $name[$id]));
                }
            }
            $this->success('更新成功！');
        } else {
            $data = $db->order(array('typeid' => 'DESC'))->select();
            $this->assign('data', $data);
            $this->display();
        }
    }

    //添加信件类型
    public function addtype() {
        if (IS_POST) {
            $post = I('post.');
            if ($this->db->addType($post)) {
                $this->success('类型添加成功！', U('type', 'isadmin=1'));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '类型添加失败！');
            }
        } else {
            $this->display();
        }
    }

    //删除信件类型
    public function deletetype() {
        $typeid = I('get.typeid', 0, 'intval');
        if (empty($typeid)) {
            $this->error('请指定需要删除的信件类型！');
        }
        if ($this->db->deleteType($typeid)) {
            $this->success('删除信件类型成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }

    //快捷回复管理
    public function quickreply() {
        $db = M('DirectormailQuickreply');
        if (IS_POST) {
            $quickreplyid = I('post.id');
            $quickreply = I('post.quickreply');
            if (empty($quickreplyid) || !is_array($quickreplyid)) {
                $this->error('请选择需要更新的内容！');
            }
            foreach ($quickreplyid as $id) {
                if ($quickreply[$id]) {
                    $db->where(array('id' => $id))->save(array('quickreply' => $quickreply[$id]));
                }
            }
            $this->success('更新成功！');
        } else {
            $data = $db->order(array('id' => 'DESC'))->select();
            $this->assign('data', $data);
            $this->display();
        }
    }
    //添加快速回复
    public function addquickreply() {
        if (IS_POST) {
            $post = I('post.');
            if ($this->db->addQuickreply($post)) {
                $this->success('快捷回复成功！', U('quickreply', 'isadmin=1'));
            } else {
                $error = $this->db->getError();
                $this->error($error ? $error : '快捷回复添加失败！');
            }
        } else {
            $this->display();
        }
    }

    //删除快速回复
    public function deletequickreply() {
        $id = I('get.id', 0, 'intval');
        if (empty($id)) {
            $this->error('请指定需要删除的快捷回复！');
        }
        if ($this->db->deleteQuickreply($id)) {
            $this->success('删除快捷回复成功！');
        } else {
            $error = $this->db->getError();
            $this->error($error ? $error : '删除失败！');
        }
    }
}
