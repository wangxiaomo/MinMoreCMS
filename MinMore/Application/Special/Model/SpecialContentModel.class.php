<?php

namespace Special\Model;
use Common\Model\Model;
use Admin\Service\User;

class SpecialContentModel extends Model {

    //数据表
    protected $tableName = 'special_content';
    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('specialid', 'require', '专题ID不能为空！', 1, 'regex', 3),
        array('title', 'require', '标题不能为空！', 1, 'regex', 3),
        array('typeid', 'require', '所属分类不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('inputtime', 'time', 1, 'function'),
    );

    /**
     * 导入信息
     * @param type $specialid 专题ID
     * @param type $modelid 模型ID
     * @param type $typeid 类别ID
     * @param type $ids 信息ID
     * @return boolean
     */
    public function import($specialid, $modelid, $typeid, $ids) {
        if (empty($specialid) || empty($modelid) || empty($typeid) || empty($ids)) {
            $this->error = '参数不正确！';
            return false;
        }
        $contentModel = \Content\Model\ContentModel::getInstance($modelid)->relation(false);
        if (is_array($ids)) {
            foreach ($ids as $id) {
                //取得文章信息
                $info = $contentModel->where(array('id' => $id))->find();
                $user = User::getInstance()->getInfo();
                if ($info) {
                    //开始导入
                    $data = array(
                        'specialid' => $specialid,
                        'title' => $info['title'],
                        'typeid' => $typeid,
                        'thumb' => $info['thumb'],
                        'keywords' => $info['keywords'],
                        'description' => $info['description'],
                        'url' => $info['url'],
                        'curl' => $info['catid'] . '|' . $info['id'],
                        'listorder' => 0,
                        'userid' => $user['id'],
                        'username' => $user['username'],
                        'inputtime' => $info['inputtime'],
                        'updatetime' => $info['updatetime'],
                        'islink' => 1,
                    );
                    $this->add($data);
                }
            }
            return true;
        }
    }

    /**
     * 添加文章
     * @param type $data
     * @return boolean
     */
    public function addContent($data) {
        if (empty($data)) {
            $this->error = '提交数据错误！';
            return false;
        }
        //验证数据
        $data = $this->create($data, 1);
        if ($data) {
            import("@.ORG.SpecialUrl");
            $url = new SpecialUrl();
            //检查专题是否存在
            $special = D('Special')->where(array('id' => $data['specialid']))->find();
            if (empty($special)) {
                $this->error = '该专题不存在，无法添加信息！';
                return false;
            }
            //检查真实发表时间，如果有时间转换为时间戳
            if ($data['updatetime'] && !is_numeric($data['updatetime'])) {
                $data['updatetime'] = strtotime($data['updatetime']);
            } elseif (!$data['updatetime']) {
                $data['updatetime'] = time();
            }
            //用户名
            $user = User::getInstance()->getInfo();
            $data['username'] = $user['username'];
            $data['userid'] = $user['id'];
            //自动提取摘要，如果有设置自动提取，且description为空，且有内容字段才执行
            if (empty($data['description']) && isset($data['content'])) {
                $content = stripslashes($data['content']);
                $introcude_length = 200;
                $data['description'] = str_cut(str_replace(array("\r\n", "\t", '[page]', '[/page]', '&ldquo;', '&rdquo;', '&nbsp;'), '', strip_tags($content)), $introcude_length);
                $data['description'] = \Input::getVar($data['description']);
            }
            //自动提取缩略图，从content 中提取
            if ($data['thumb'] == '' && isset($data['content'])) {
                $content = $content ? $content : stripslashes($data['content']);
                $auto_thumb_no = 0;
                if (preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches)) {
                    $data['thumb'] = $matches[3][$auto_thumb_no];
                }
            }
            //入库
            $id = $this->add($data);
            if ($id) {
                $data['id'] = $id;
                //转向地址
                $urls = array();
                if ($data['islink']) {
                    $urls['url'] = $_POST['linkurl'];
                } else {
                    //生成该篇地址
                    $urls = $url->show($data, $special);
                }
                //更新地址
                $this->where(array('id' => $id))->save(array('url' => $urls['url']));
                //更新附件状态，把相关附件和文章进行管理
                $attachment = service("Attachment");
                $attachment->api_update('', 'special-' . $data['specialid'] . '-' . $id, 2);
                import("@.ORG.SpecialHtml");
                $SpecialHtml = get_instance_of('SpecialHtml');
                $SpecialHtml->show($id);
                return true;
            } else {
                $this->error = '添加失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 修改内容
     * @param type $data
     * @return boolean
     */
    public function editContent($data) {
        if (empty($data) || empty($data['id'])) {
            $this->error = '提交数据错误！';
            return false;
        }
        $id = (int) $data['id'];
        unset($data['id']);

        //验证数据
        $data = $this->token(false)->create($data, 2);
        if ($data) {
            //检查专题是否存在
            $special = D('Special')->where(array('id' => $data['specialid']))->find();
            if (empty($special)) {
                $this->error = '该专题不存在，无法添加信息！';
                return false;
            }
            //检查真实发表时间，如果有时间转换为时间戳
            if ($data['updatetime'] && !is_numeric($data['updatetime'])) {
                $data['updatetime'] = strtotime($data['updatetime']);
            } elseif (!$data['updatetime']) {
                $data['updatetime'] = time();
            }
            //自动提取摘要，如果有设置自动提取，且description为空，且有内容字段才执行
            if (empty($data['description']) && isset($data['content'])) {
                $content = stripslashes($data['content']);
                $introcude_length = 200;
                $data['description'] = str_cut(str_replace(array("\r\n", "\t", '[page]', '[/page]', '&ldquo;', '&rdquo;', '&nbsp;'), '', strip_tags($content)), $introcude_length);
                $data['description'] = \Input::getVar($data['description']);
            }
            //自动提取缩略图，从content 中提取
            if ($data['thumb'] == '' && isset($data['content'])) {
                $content = $content ? $content : stripslashes($data['content']);
                $auto_thumb_no = 0;
                if (preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches)) {
                    $data['thumb'] = $matches[3][$auto_thumb_no];
                }
            }
            //更新
            if (false !== $this->where(array('id' => $id))->save($data)) {
                import("@.ORG.SpecialUrl");
                $url = new SpecialUrl();
                //转向地址
                $urls = array();
                if ($data['islink']) {
                    $urls['url'] = $_POST['linkurl'];
                } else {
                    $data = $this->where(array('id' => $id))->find();
                    //生成该篇地址
                    $urls = $url->show($data, $special);
                }
                //更新地址
                $this->where(array('id' => $id))->save(array('url' => $urls['url']));
                //更新附件状态，把相关附件和文章进行管理
                $attachment = service("Attachment");
                $attachment->api_update('', 'special-' . $data['specialid'] . '-' . $id, 2);
                import("@.ORG.SpecialHtml");
                $SpecialHtml = get_instance_of('SpecialHtml');
                $SpecialHtml->show($id);
                return true;
            } else {
                $this->error = '添加失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 删除文章
     * @param type $id 需要删除的ID
     * @return boolean
     */
    public function delContent($id) {
        $id = (int) $id;
        if (empty($id)) {
            $this->error = '请指定需要删除的文章！';
            return false;
        }
        //查询出文章所属专题
        $info = $this->where(array('id' => $id))->find();
        $specialid = $info['specialid'];
        //取得专题信息
        $specialInfo = D('Special')->where(array('id' => $specialid))->find();
        if (empty($specialInfo)) {
            $this->error = '该专题不存在，无法删除内容！';
            return false;
        }
        //判断是否生成静态
        if ($specialInfo['ishtml']) {
            if (false !== $this->where(array('id' => $id))->delete()) {
                //取得该内容生成地址
                import("@.ORG.SpecialUrl");
                $url = get_instance_of('SpecialUrl');
                $urls = $url->show($info, $specialInfo);
                $fileurl = $urls['path'];
                //删除静态文件
                $lasttext = strrchr($fileurl, '.');
                $len = -strlen($lasttext);
                $path = substr($fileurl, 0, $len);
                $path = ltrim($path, '/');
                $filelist = glob(SITE_PATH . "/" . $path . '*');
                foreach ($filelist as $delfile) {
                    $lasttext = strrchr($delfile, '.');
                    if (!in_array($lasttext, array('.htm', '.html', '.shtml')))
                        continue;
                    @unlink($delfile);
                }
                //删除附件
                service("Attachment")->api_delete('special-' . $specialid . '-' . $id);
                return true;
            } else {
                $this->error = '信息删除失败！';
                return false;
            }
        } else {
            if (false !== $this->where(array('id' => $id))->delete()) {
                //删除附件
                service("Attachment")->api_delete('special-' . $specialid . '-' . $id);
                return true;
            } else {
                $this->error = '信息删除失败！';
                return false;
            }
        }
    }

}