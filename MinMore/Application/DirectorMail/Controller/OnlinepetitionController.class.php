<?php

namespace DirectorMail\Controller;

use Common\Controller\Base;

class OnlinepetitionController extends Base {

	private $db = NULL;

	protected function _initialize() {
		parent::_initialize();
		C('TMPL_ACTION_ERROR', APP_PATH . 'DirectorMail/View/error.php');
		C('TMPL_ACTION_SUCCESS', APP_PATH . 'DirectorMail/View/success.php');
		$this->assign('headicon', '网上接访');
		$this->db = D('Petition');
	}
	/*
	   public function info() {
	   $this->assign("title", "网上接访");
	   $this->display();
	   }
	 */
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
			//$post['typeid'] = 9;
			$post['roleid'] = get_site_role();
			if (!empty($_FILES['upload']['tmp_name'])) {
				$info = $this->upload();
				if (!empty($info[0]['url'])) {
					$post['upload'] = $info[0]['url'];
				}
			}
            $id = $this->db->addPetition($post);
/*
			$petition=M('petition');
			$petition->create();
			$id = $petition->add($post);
*/
			if ($id) {
				$message = 'C'.date('Ymd', time()).$id;                
				$this->success($message, U('Onlinepetition/search'));
			} else {
				$error = $this->db->getError();
				$this->error($error ? $error : '写信失败！');
			}
		} 
		/*
		   $area = M('area')->select();
		   $this->assign('area', $area); 
		 */
		$this->display();
	}

	public function upload() {
		$config=array();
		$upload = new \Libs\Driver\Attachment\Local($config);
		$info = $upload->upload();
		if (!$info) {
			$this->error($upload->getErrorMsg());
		} else {
			return $info;
		}
	}

	public function search() {
		if (IS_POST) {
			$tel = I('post.tel');
			if (!empty($tel)) {
				$where['shouji'] = $tel;
			} else {
				$this->error('请输入手机号码！');
			}
			$passwd= I('post.passwd');
			if (!empty($passwd)) {
				$where['passwd'] = $passwd;
			} else {
				$this->error('请输入查询密码！');
			}
			$count = M('petition')->where($where)->count();
			if($count>0){
				$mails = M('petition')->where($where)->field('id')->select();
				$mailids=array();
				foreach($mails as $key=>$val){
					$mailids[$val['id']]=1;
				}
				$this->mail_verified(false,$mailids);//有权限查看的邮件id加入session
			}
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
	public function mail() {
		$mailid = I('get.mailid', 0, 'intval');
		$this->mail_verified(true,$mailid);//检查是否有权限查看
        	$data = $this->db->mail($mailid);
		if (!$data) {
			$this->error('非法操作！');
		}
		$this->assign('data', $data);
		$this->display();
	}
	public function evaluate(){
		if(IS_AJAX){
			$mailid = I('mailid');
			$evaluation = I('evaluation');
			$mail=M('petition')->where("id=$mailid")->find();
			if(empty($mail['evaluation'])){
				$mail['evaluation']=$evaluation;
				$ret=M('petition')->save($mail);
				$msg="感谢您的评价！";
				$this->success($msg);
			}else{
				$data['status']="fail";
				$msg="您已评价过！";
				$this->error($msg);
			}
		}
	}
	private function mail_verified($type,$mailid) {
		$auth_ids= session('mailids')?session('mailids'):array();
		if($type){
			if(!isset($auth_ids[$mailid])) {
				$this->redirect('DirectorMail/Onlinepetition/search');
			}
		}else{
			foreach($mailid as $id=>$val){
				$auth_ids[$id]=1;
			}
			session('mailids',$auth_ids);
			return true;
		}
	}
}
