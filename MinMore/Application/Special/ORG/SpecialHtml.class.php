<?php

use Common\Controller\Base;

class SpecialHtml extends Base {

    protected $special = NULL;
    protected $url = NULL;

    public function _initialize() {
        parent::_initialize();
        define('HTML', true);
        define("GROUP_MODULE", "Special");
        C('HTML_FILE_SUFFIX', "");
        $this->special = D('Special');
        import("@.ORG.SpecialUrl");
        $this->url = new \SpecialUrl();
    }

    /**
     * 更新专题首页
     * @param $specialid 专题ID
     * @param $page 页码，默认1
     */
    public function index($specialid, $page = 1) {
        $specialid = (int) $specialid;
        if (empty($specialid)) {
            $this->error('专题ID不能为空！');
        }
        $page = max($page, 1);
        //取得专题数据
        $specialInfo = $this->special->where(array('id' => $specialid, 'disabled' => 1))->find();
        if (empty($specialInfo)) {
            $this->error('该专题不存在！');
        }
        if (!$specialInfo['ishtml']) {
            return true;
        }
        //模板处理
        $tp = explode(".", $specialInfo['index_template']);
        $template = parseTemplateFile("Index:" . $tp[0]);
        if ($template == false && $tp[0] != "index") {
            //模板不存在，重新使用默认模板
            $template = "index";
            $template = parseTemplateFile("Index:" . $template);
            if ($template == false) {
                $this->error("专题首页模板不存在！");
            }
        } else if ($template == false) {
            $this->error("专题首页模板不存在！");
        }

        $SEO = seo("", $specialInfo['title'], $specialInfo['description'], $specialInfo['description']);

        $j = 1;
        //分页生成
        do {
            //把分页分配到模板
            $this->assign(C("VAR_PAGE"), $page);
            //seo分配到模板
            $this->assign("SEO", $SEO);
            $this->assign($specialInfo);
            $this->assign('specialid',$specialInfo['id']);
            //生成路径
            $urls = $this->url->index($specialInfo, $page);
            //获取URL规则
            $GLOBALS['URLRULE'] = $urls['page'];
            $filename = $urls['path'];
            //判断是否生成和入口文件同名，如果是，不生成！
            if ($filename != "/index.php") {
                $this->buildHtml($filename, SITE_PATH . "/", $template);
            }
            //如果GET有total_number参数则直接使用GET的，如果没有则根据$GLOBALS["Total_Pages"]获取分页总数
            $total_number = isset($_GET['total_number']) ? (int) $_GET['total_number'] : $GLOBALS["Total_Pages"];
            $page++;
            $j++;
        } while ($j <= $total_number);
        return true;
    }

    /**
     * 生成专题分类列表
     * @param type $typeid 专题ID
     */
    public function type($typeid) {
        $typeid = (int) $typeid;
        if (empty($typeid)) {
            $this->error('分类ID不能为空！');
        }
        //获取分类信息
        $info = D('SpecialType')->where(array('typeid' => $typeid,'role'=>get_site_role()))->find();
        //获取专题
        $special = D('Special')->where(array('id' => $info['parentid']))->find();
        //判断是否生成
        if (empty($special['ishtml'])) {
            return true;
        }
        //取得类别模板
        if ($special['list_template']) {
            $tpar = explode(".", $special['list_template'], 2);
            $template = "List:" . $tpar[0];
        } else {
            $template = "List:list";
        }
        //模板检测
        $template = parseTemplateFile($template);
        if (false == $template) {
            $this->error('模板不存在！');
        }
        $page = 1;
        $j = 1;
        //开始生成列表
        do {
            //生成路径
            $type_url = $this->url->type($info, $special, $page);
            //取得URL规则
            $urls = $type_url['page'];
            $GLOBALS['URLRULE'] = $urls;
            //把分页分配到模板
            $this->assign(C("VAR_PAGE"), $page);
            //把类别数据和专题数据分配到模板
            $this->assign($info);
            $this->assign('special', $special);
            //当前专题ID
            $this->assign('specialid',$special['id']);
            //站点ID
            $this->assign('siteid', $special['role']);
            //seo分配到模板
            $seo = seo('', $info['name'] . ' - ' . $special['title'], $special['description'], $special['description']);
            $this->assign("SEO", $seo);
            //生成
            $this->buildHtml($type_url["path"], SITE_PATH . "/", $template);
            $page++;
            $j++;
            //如果GET有total_number参数则直接使用GET的，如果没有则根据$GLOBALS["Total_Pages"]获取分页总数
            $total_number = isset($_GET['total_number']) ? (int) $_GET['total_number'] : $GLOBALS["Total_Pages"];
        } while ($j <= $total_number);
        return true;
    }

    /**
     * 生成内容页
     * @param  $data 数据
     * @param  $array_merge 是否合并
     * @param  $action 方法
     */
    public function show($id) {
        $id = (int) $id;
        if (empty($id)) {
            $this->error('请指定需要生成的信息！');
        }
        //查询内容
        $info = D('SpecialContent')->where(array('id' => $id))->find();
        if (empty($info)) {
            $this->error('该信息不存在！');
        }
        //转向地址不需要生成
        if ($info['islink']) {
            return true;
        }
        //专题ID
        $specialid = (int) $info['specialid'];
        //获取专题
        $special = D('Special')->where(array('id' => $specialid))->find();
        //检查是否需要生成
        if ($special['ishtml'] == 0) {
            return true;
        }
        $url = $this->url->show($info, $special);
        D('SpecialContent')->where(array('id'   =>  $id))->save(array('url' => $url['url']));
        $seo = seo(0, $info['title'], $info['description'], $info['keywords']);

        //内容页模板
        if ($special['show_template']) {
            //去除模板文件后缀
            $newstempid = explode(".", $special['show_template']);
            $template = $newstempid[0];
            unset($newstempid);
        } else {
            $template = "show";
        }
        //检测模板是否存在、不存在使用默认！
        $template = parseTemplateFile("Show:" . $template);
        if ($template == false) {
            $template = parseTemplateFile("Show:show");
            if ($template == false) {
                $this->error('模板不存在！');
            }
        }

        //分配解析后的文章数据到模板
        $this->assign($info);
        //seo分配到模板
        $this->assign("SEO", $seo);
        //专题ID
        $this->assign("specialid", $specialid);
        //站点ID
        $this->assign('siteid', $special['role']);
        //专题信息分配到模板
        $this->assign('special', $special);
        $pageurl = array();
        //分页生成处理 手动分页
        $CONTENT_POS = strpos($info['content'], '[page]');
        if ($CONTENT_POS !== false) {
            $contents = array_filter(explode('[page]', $info['content']));
            $pagenumber = count($contents);
            for ($i = 1; $i <= $pagenumber; $i++) {
                //URL地址处理
                $urlrules = $this->url->show($info, $special, $i);
                //用于分页导航
                if (!isset($pageurl['index'])) {
                    $pageurl['index'] = $urlrules['page']['index'];
                    $pageurl['list'] = $urlrules['page']['list'];
                }
                $pageurls[$i] = $urlrules;
            }
            $pages = "";
            //生成分页
            foreach ($pageurls as $page => $urls) {
                //$pagenumber 分页总数
                $_GET[C("VAR_PAGE")] = $page;
                $pages = page($pagenumber, 1, $page, 6, C("VAR_PAGE"), $pageurl, true)->show("default");
                //判断[page]出现的位置是否在第一位
                if ($CONTENT_POS < 7) {
                    $content = $contents[$page];
                } else {
                    $content = $contents[$page - 1];
                }
                //分页
                $this->assign("pages", $pages);
                $this->assign("content", $content);
                $this->buildHtml($urls['path'], SITE_PATH . "/", $template);
            }
            return true;
        }
        //对pages进行赋值null，解决由于上一篇有分页下一篇无分页的时候，会把上一篇的分页带到下一篇！
        $this->assign("pages", null);
        $this->assign("content", $info['content']);
        //当没有启用内容页分页时候（如果内容字段有启用分页，不会执行到此步骤），判断其他支持分页的标签进行分页处理
        $page = 1;
        $j = 1;
        //开始生成列表
        do {
            $this->assign(C("VAR_PAGE"), $page);
            //生成路径
            $category_url = $this->url->show($info, $special);
            $GLOBALS['URLRULE'] = implode("~", $category_url['page']);
            //生成
            $this->buildHtml($category_url["path"], SITE_PATH . "/", $template);
            $page++;
            $j++;
            $total_number = isset($_GET['total_number']) ? (int) $_GET['total_number'] : (int) $GLOBALS["Total_Pages"];
        } while ($j <= $total_number);
        return true;
    }

}
