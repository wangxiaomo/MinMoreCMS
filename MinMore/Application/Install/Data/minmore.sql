-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-06-02 11:50:39
-- 服务器版本： 5.6.30
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minmore`
--

-- --------------------------------------------------------

--
-- 表的结构 `minmore_access`
--

DROP TABLE IF EXISTS `minmore_access`;
CREATE TABLE IF NOT EXISTS `minmore_access` (
  `role_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `app` varchar(20) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(20) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(20) NOT NULL DEFAULT '' COMMENT '方法',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否有效'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_addons`
--

DROP TABLE IF EXISTS `minmore_addons`;
CREATE TABLE IF NOT EXISTS `minmore_addons` (
  `id` int(10) unsigned NOT NULL COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '插件名或标识，区分大小写',
  `sign` varchar(255) NOT NULL DEFAULT '' COMMENT '签名',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1-启用 0-禁用 -1-损坏',
  `config` text COMMENT '配置 序列化存放',
  `author` varchar(40) NOT NULL DEFAULT '' COMMENT '作者',
  `version` varchar(20) NOT NULL DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1-有后台列表 0-无后台列表'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_admin_panel`
--

DROP TABLE IF EXISTS `minmore_admin_panel`;
CREATE TABLE IF NOT EXISTS `minmore_admin_panel` (
  `mid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '菜单ID',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(32) NOT NULL DEFAULT '' COMMENT '菜单名',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '菜单地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='常用菜单';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_article`
--

DROP TABLE IF EXISTS `minmore_article`;
CREATE TABLE IF NOT EXISTS `minmore_article` (
  `id` mediumint(8) unsigned NOT NULL,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `role` smallint(5) NOT NULL DEFAULT '1',
  `title` varchar(160) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `style` char(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keywords` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` mediumtext COLLATE utf8_unicode_ci,
  `url` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `posid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击总数',
  `yesterdayviews` int(11) NOT NULL DEFAULT '0' COMMENT '最日',
  `dayviews` int(10) NOT NULL DEFAULT '0' COMMENT '今日点击数',
  `weekviews` int(10) NOT NULL DEFAULT '0' COMMENT '本周访问数',
  `monthviews` int(10) NOT NULL DEFAULT '0' COMMENT '本月访问',
  `viewsupdatetime` int(10) NOT NULL DEFAULT '0' COMMENT '点击数更新时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_article_data`
--

DROP TABLE IF EXISTS `minmore_article_data`;
CREATE TABLE IF NOT EXISTS `minmore_article_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext COLLATE utf8_unicode_ci,
  `paginationtype` tinyint(1) NOT NULL DEFAULT '0',
  `maxcharperpage` mediumint(6) NOT NULL DEFAULT '0',
  `template` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allow_comment` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `copyfrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_attachment`
--

DROP TABLE IF EXISTS `minmore_attachment`;
CREATE TABLE IF NOT EXISTS `minmore_attachment` (
  `aid` int(10) unsigned NOT NULL COMMENT '附件ID',
  `module` char(15) NOT NULL DEFAULT '' COMMENT '模块名称',
  `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `filename` char(50) NOT NULL DEFAULT '' COMMENT '上传附件名称',
  `filepath` char(200) NOT NULL DEFAULT '' COMMENT '附件路径',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `fileext` char(10) NOT NULL DEFAULT '' COMMENT '附件扩展名',
  `isimage` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为图片 1为图片',
  `isthumb` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为缩略图 1为缩略图',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上传用户ID',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否后台用户上传',
  `uploadtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `uploadip` char(15) NOT NULL DEFAULT '' COMMENT '上传ip',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '附件使用状态',
  `authcode` char(32) NOT NULL DEFAULT '' COMMENT '附件路径MD5值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_attachment_index`
--

DROP TABLE IF EXISTS `minmore_attachment_index`;
CREATE TABLE IF NOT EXISTS `minmore_attachment_index` (
  `keyid` char(30) NOT NULL DEFAULT '' COMMENT '关联id',
  `aid` char(10) NOT NULL DEFAULT '' COMMENT '附件ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件关系表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_behavior`
--

DROP TABLE IF EXISTS `minmore_behavior`;
CREATE TABLE IF NOT EXISTS `minmore_behavior` (
  `id` int(11) unsigned NOT NULL COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-控制器，2-视图',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态（0：禁用，1：正常）',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '所属模块',
  `datetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统行为表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_behavior_log`
--

DROP TABLE IF EXISTS `minmore_behavior_log`;
CREATE TABLE IF NOT EXISTS `minmore_behavior_log` (
  `id` int(10) NOT NULL COMMENT '主键',
  `ruleid` int(10) NOT NULL DEFAULT '0' COMMENT '行为ID',
  `guid` char(50) NOT NULL DEFAULT '' COMMENT '标识',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '执行行为的时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行为日志';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_behavior_rule`
--

DROP TABLE IF EXISTS `minmore_behavior_rule`;
CREATE TABLE IF NOT EXISTS `minmore_behavior_rule` (
  `ruleid` int(11) NOT NULL COMMENT '主键',
  `behaviorid` int(11) NOT NULL DEFAULT '0' COMMENT '行为id',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '规则所属模块',
  `addons` char(20) NOT NULL DEFAULT '' COMMENT '规则所属插件',
  `rule` text COMMENT '行为规则',
  `listorder` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `datetime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行为规则表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_cache`
--

DROP TABLE IF EXISTS `minmore_cache`;
CREATE TABLE IF NOT EXISTS `minmore_cache` (
  `id` int(10) NOT NULL COMMENT '自增长ID',
  `key` char(100) NOT NULL DEFAULT '' COMMENT '缓存key值',
  `name` char(100) NOT NULL DEFAULT '' COMMENT '名称',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模块名称',
  `model` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '方法名',
  `param` char(255) NOT NULL DEFAULT '' COMMENT '参数',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='缓存更新列队';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_category`
--

DROP TABLE IF EXISTS `minmore_category`;
CREATE TABLE IF NOT EXISTS `minmore_category` (
  `catid` smallint(5) unsigned NOT NULL COMMENT '栏目ID',
  `module` varchar(15) NOT NULL DEFAULT '' COMMENT '所属模块',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `domain` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目绑定域名',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `arrparentid` varchar(255) NOT NULL DEFAULT '' COMMENT '所有父ID',
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否存在子栏目，1存在',
  `arrchildid` mediumtext COMMENT '所有子栏目ID',
  `catname` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `image` varchar(100) NOT NULL DEFAULT '' COMMENT '栏目图片',
  `description` mediumtext COMMENT '栏目描述',
  `parentdir` varchar(100) NOT NULL DEFAULT '' COMMENT '父目录',
  `catdir` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目目录',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '栏目点击数',
  `setting` mediumtext COMMENT '相关配置信息',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `sethtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否生成静态',
  `letter` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目拼音'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_category_field`
--

DROP TABLE IF EXISTS `minmore_category_field`;
CREATE TABLE IF NOT EXISTS `minmore_category_field` (
  `fid` smallint(6) NOT NULL COMMENT '自增长id',
  `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `fieldname` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `type` varchar(10) NOT NULL DEFAULT '' COMMENT '类型,input',
  `setting` mediumtext COMMENT '其他',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目扩展字段列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_category_priv`
--

DROP TABLE IF EXISTS `minmore_category_priv`;
CREATE TABLE IF NOT EXISTS `minmore_category_priv` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `roleid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色或者组ID',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为管理员 1、管理员',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '动作'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目权限表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_collection_content`
--

DROP TABLE IF EXISTS `minmore_collection_content`;
CREATE TABLE IF NOT EXISTS `minmore_collection_content` (
  `id` int(10) unsigned NOT NULL,
  `nodeid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '采集节点ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '采集状态{0:未采集,1:已采集,2:已导入}',
  `url` char(255) NOT NULL COMMENT '文章URL',
  `title` char(100) NOT NULL COMMENT '文章标题',
  `data` text NOT NULL COMMENT '文章数据'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='采集内容表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_collection_history`
--

DROP TABLE IF EXISTS `minmore_collection_history`;
CREATE TABLE IF NOT EXISTS `minmore_collection_history` (
  `md5` char(32) NOT NULL COMMENT 'URL地址MD5值',
  `nodeid` smallint(6) NOT NULL COMMENT '采集节点ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='采集历史';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_collection_node`
--

DROP TABLE IF EXISTS `minmore_collection_node`;
CREATE TABLE IF NOT EXISTS `minmore_collection_node` (
  `nodeid` smallint(6) unsigned NOT NULL COMMENT '采集节点ID',
  `role` smallint(5) DEFAULT NULL,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `lastdate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后采集时间',
  `sourcecharset` varchar(8) NOT NULL COMMENT '采集点字符集',
  `sourcetype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '网址类型',
  `urlpage` text NOT NULL COMMENT '采集地址',
  `pagesize_start` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '页码开始',
  `pagesize_end` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '页码结束',
  `page_base` char(255) NOT NULL COMMENT '网址base',
  `par_num` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '每次增加数',
  `url_contain` char(100) NOT NULL COMMENT '网址中必须包含',
  `url_except` char(100) NOT NULL COMMENT '网址中不能包含',
  `url_start` char(100) NOT NULL DEFAULT '' COMMENT '网址开始',
  `url_end` char(100) NOT NULL DEFAULT '' COMMENT '网址结束',
  `url_regular` char(100) NOT NULL DEFAULT '' COMMENT 'URL地址匹配规则',
  `title_rule` char(100) NOT NULL COMMENT '标题采集规则',
  `title_html_rule` text NOT NULL COMMENT '标题过滤规则',
  `author_rule` char(100) NOT NULL COMMENT '作者采集规则',
  `author_html_rule` text NOT NULL COMMENT '作者过滤规则',
  `comeform_rule` char(100) NOT NULL COMMENT '来源采集规则',
  `comeform_html_rule` text NOT NULL COMMENT '来源过滤规则',
  `time_rule` char(100) NOT NULL COMMENT '时间采集规则',
  `time_html_rule` text NOT NULL COMMENT '时间过滤规则',
  `content_rule` char(100) NOT NULL COMMENT '内容采集规则',
  `content_html_rule` text NOT NULL COMMENT '内容过滤规则',
  `content_page_start` char(100) NOT NULL COMMENT '内容分页开始',
  `content_page_end` char(100) NOT NULL COMMENT '内容分页结束',
  `content_page_rule` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '分页模式',
  `content_page` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '内容采集是否分页',
  `content_nextpage` char(100) NOT NULL COMMENT '下一页标识符',
  `down_attachment` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否下载图片',
  `watermark` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '图片加水印',
  `coll_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '导入顺序',
  `customize_config` text NOT NULL COMMENT '自定义采集规则'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='采集节点配置';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_collection_program`
--

DROP TABLE IF EXISTS `minmore_collection_program`;
CREATE TABLE IF NOT EXISTS `minmore_collection_program` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '方案名称',
  `nodeid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '采集点',
  `modelid` mediumint(6) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `catid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `config` text NOT NULL COMMENT '配置信息'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='采集导入规则表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_config`
--

DROP TABLE IF EXISTS `minmore_config`;
CREATE TABLE IF NOT EXISTS `minmore_config` (
  `id` smallint(8) unsigned NOT NULL,
  `varname` varchar(20) NOT NULL DEFAULT '',
  `info` varchar(100) NOT NULL DEFAULT '',
  `role` int(11) NOT NULL DEFAULT '0',
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站配置表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_config_field`
--

DROP TABLE IF EXISTS `minmore_config_field`;
CREATE TABLE IF NOT EXISTS `minmore_config_field` (
  `fid` smallint(6) NOT NULL COMMENT '自增长id',
  `role` int(11) NOT NULL DEFAULT '0',
  `fieldname` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `type` varchar(10) NOT NULL DEFAULT '' COMMENT '类型,input',
  `setting` mediumtext COMMENT '其他',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站配置，扩展字段列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_connect`
--

DROP TABLE IF EXISTS `minmore_connect`;
CREATE TABLE IF NOT EXISTS `minmore_connect` (
  `connectid` mediumint(8) NOT NULL,
  `openid` varchar(32) NOT NULL COMMENT '授权标识',
  `uid` mediumint(8) NOT NULL COMMENT '用户ID',
  `app` varchar(10) NOT NULL COMMENT '应用名称',
  `accesstoken` char(50) NOT NULL COMMENT 'access_token',
  `expires` int(10) NOT NULL COMMENT 'token过期时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='登陆授权';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_customlist`
--

DROP TABLE IF EXISTS `minmore_customlist`;
CREATE TABLE IF NOT EXISTS `minmore_customlist` (
  `id` int(11) NOT NULL COMMENT '自定义列表ID',
  `url` char(100) NOT NULL DEFAULT '' COMMENT '访问地址',
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '列表标题',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '网页标题',
  `keywords` varchar(40) NOT NULL DEFAULT '' COMMENT '网页关键字',
  `description` text COMMENT '页面简介',
  `totalsql` text COMMENT '数据统计SQL',
  `listsql` text COMMENT '数据查询SQL',
  `lencord` int(11) NOT NULL DEFAULT '0' COMMENT '每页显示',
  `urlruleid` int(11) NOT NULL DEFAULT '0' COMMENT 'URL规则ID',
  `urlrule` varchar(120) NOT NULL DEFAULT '' COMMENT 'URL规则',
  `template` mediumtext COMMENT '模板',
  `listpath` varchar(60) NOT NULL DEFAULT '' COMMENT '列表模板文件',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_customtemp`
--

DROP TABLE IF EXISTS `minmore_customtemp`;
CREATE TABLE IF NOT EXISTS `minmore_customtemp` (
  `tempid` smallint(6) NOT NULL COMMENT '模板ID',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '模板名称',
  `tempname` varchar(30) NOT NULL DEFAULT '' COMMENT '模板完整文件名',
  `temppath` varchar(200) NOT NULL DEFAULT '' COMMENT '模板生成路径',
  `temptext` mediumtext COMMENT '模板内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义模板表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_download`
--

DROP TABLE IF EXISTS `minmore_download`;
CREATE TABLE IF NOT EXISTS `minmore_download` (
  `id` mediumint(8) unsigned NOT NULL,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` char(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `style` char(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keywords` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` char(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `posid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击总数',
  `yesterdayviews` int(11) NOT NULL DEFAULT '0' COMMENT '最日',
  `dayviews` int(10) NOT NULL DEFAULT '0' COMMENT '今日点击数',
  `weekviews` int(10) NOT NULL DEFAULT '0' COMMENT '本周访问数',
  `monthviews` int(10) NOT NULL DEFAULT '0' COMMENT '本月访问',
  `viewsupdatetime` int(10) NOT NULL DEFAULT '0' COMMENT '点击数更新时间',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_download_data`
--

DROP TABLE IF EXISTS `minmore_download_data`;
CREATE TABLE IF NOT EXISTS `minmore_download_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `template` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allow_comment` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `download` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_locking`
--

DROP TABLE IF EXISTS `minmore_locking`;
CREATE TABLE IF NOT EXISTS `minmore_locking` (
  `userid` int(11) NOT NULL COMMENT '用户ID',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `id` mediumint(8) NOT NULL DEFAULT '0' COMMENT '信息ID',
  `locktime` int(10) NOT NULL DEFAULT '0' COMMENT '锁定时间'
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='信息锁定';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_loginlog`
--

DROP TABLE IF EXISTS `minmore_loginlog`;
CREATE TABLE IF NOT EXISTS `minmore_loginlog` (
  `id` int(11) NOT NULL COMMENT '日志ID',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '登录帐号',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间戳',
  `loginip` char(20) NOT NULL DEFAULT '' COMMENT '登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,1为登录成功，0为登录失败',
  `password` varchar(30) NOT NULL DEFAULT '' COMMENT '尝试错误密码',
  `info` varchar(255) NOT NULL DEFAULT '' COMMENT '其他说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_member`
--

DROP TABLE IF EXISTS `minmore_member`;
CREATE TABLE IF NOT EXISTS `minmore_member` (
  `userid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `encrypt` char(6) NOT NULL COMMENT '随机码',
  `checked` tinyint(1) NOT NULL COMMENT '是否审核',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '性别,1男,2女,0未知',
  `about` varchar(255) NOT NULL COMMENT '个人介绍',
  `heat` int(11) NOT NULL DEFAULT '0' COMMENT '空间热度',
  `theme` char(11) NOT NULL DEFAULT '' COMMENT '空间主题名称',
  `praise` int(11) NOT NULL DEFAULT '0' COMMENT '被赞数',
  `attention` int(11) NOT NULL DEFAULT '0' COMMENT '关注数',
  `fans` int(11) NOT NULL DEFAULT '0' COMMENT '粉丝数',
  `share` int(11) NOT NULL DEFAULT '0' COMMENT '分享数',
  `nickname` char(20) NOT NULL COMMENT '昵称',
  `userpic` varchar(200) NOT NULL COMMENT '会员头像',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `lastdate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '上次登录ip',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户组id',
  `areaid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '地区id',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '钱金总额',
  `point` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `message` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有短消息',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `vip` tinyint(1) NOT NULL COMMENT 'vip等级',
  `overduedate` int(10) NOT NULL COMMENT 'vip过期时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_member_content`
--

DROP TABLE IF EXISTS `minmore_member_content`;
CREATE TABLE IF NOT EXISTS `minmore_member_content` (
  `id` int(10) NOT NULL,
  `catid` smallint(5) NOT NULL COMMENT '栏目ID',
  `content_id` int(10) NOT NULL COMMENT '信息ID',
  `userid` mediumint(8) NOT NULL COMMENT '会员ID',
  `integral` tinyint(1) NOT NULL COMMENT '是否赠送过点数',
  `status` tinyint(1) NOT NULL COMMENT '审核状态',
  `time` int(10) NOT NULL COMMENT '添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员投稿信息记录表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_member_favorite`
--

DROP TABLE IF EXISTS `minmore_member_favorite`;
CREATE TABLE IF NOT EXISTS `minmore_member_favorite` (
  `fid` int(11) NOT NULL COMMENT '收藏ID',
  `userid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '用户UID',
  `modelid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型ID',
  `catid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '信息ID',
  `title` varchar(255) NOT NULL COMMENT '收藏标题',
  `url` char(255) DEFAULT NULL COMMENT '信息地址',
  `datetime` int(11) NOT NULL COMMENT '添加时间戳'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员收藏表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_member_group`
--

DROP TABLE IF EXISTS `minmore_member_group`;
CREATE TABLE IF NOT EXISTS `minmore_member_group` (
  `groupid` tinyint(3) unsigned NOT NULL COMMENT '会员组id',
  `name` char(15) NOT NULL COMMENT '用户组名称',
  `issystem` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否是系统组',
  `starnum` tinyint(2) unsigned NOT NULL COMMENT '会员组星星数',
  `point` smallint(6) unsigned NOT NULL COMMENT '积分范围',
  `allowmessage` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '许允发短消息数量',
  `allowvisit` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许访问',
  `allowpost` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许发稿',
  `allowpostverify` tinyint(1) unsigned NOT NULL COMMENT '是否投稿不需审核',
  `allowsearch` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许搜索',
  `allowupgrade` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否允许自主升级',
  `allowsendmessage` tinyint(1) unsigned NOT NULL COMMENT '允许发送短消息',
  `allowpostnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '每天允许发文章数',
  `allowattachment` tinyint(1) NOT NULL COMMENT '是否允许上传附件',
  `icon` char(255) NOT NULL COMMENT '用户组图标',
  `usernamecolor` char(7) NOT NULL COMMENT '用户名颜色',
  `description` char(100) NOT NULL COMMENT '描述',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '序排',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `expand` mediumtext NOT NULL COMMENT '扩展'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员组';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_member_online`
--

DROP TABLE IF EXISTS `minmore_member_online`;
CREATE TABLE IF NOT EXISTS `minmore_member_online` (
  `id` int(11) NOT NULL,
  `userid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `username` char(30) NOT NULL COMMENT '用户名',
  `lasttime` int(10) DEFAULT NULL COMMENT '最后操作时间戳'
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='在线用户表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_menu`
--

DROP TABLE IF EXISTS `minmore_menu`;
CREATE TABLE IF NOT EXISTS `minmore_menu` (
  `id` smallint(6) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `app` char(20) NOT NULL DEFAULT '' COMMENT '应用标识',
  `controller` char(20) NOT NULL DEFAULT '' COMMENT '控制键',
  `action` char(20) NOT NULL DEFAULT '' COMMENT '方法',
  `parameter` char(255) NOT NULL DEFAULT '' COMMENT '附加参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_model`
--

DROP TABLE IF EXISTS `minmore_model`;
CREATE TABLE IF NOT EXISTS `minmore_model` (
  `modelid` smallint(5) unsigned NOT NULL,
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `description` char(100) NOT NULL DEFAULT '' COMMENT '描述',
  `tablename` char(20) NOT NULL DEFAULT '' COMMENT '表名',
  `setting` text COMMENT '配置信息',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `items` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '信息数',
  `enablesearch` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启全站搜索',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用 1禁用',
  `default_style` char(30) NOT NULL DEFAULT '' COMMENT '风格',
  `category_template` char(30) NOT NULL DEFAULT '' COMMENT '栏目模板',
  `list_template` char(30) NOT NULL DEFAULT '' COMMENT '列表模板',
  `show_template` char(30) NOT NULL DEFAULT '' COMMENT '内容模板',
  `js_template` varchar(30) NOT NULL DEFAULT '' COMMENT 'JS模板',
  `sort` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '模块标识'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容模型列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_model_field`
--

DROP TABLE IF EXISTS `minmore_model_field`;
CREATE TABLE IF NOT EXISTS `minmore_model_field` (
  `fieldid` mediumint(8) unsigned NOT NULL,
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `field` varchar(20) NOT NULL DEFAULT '' COMMENT '字段名',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '别名',
  `tips` text COMMENT '字段提示',
  `css` varchar(30) NOT NULL DEFAULT '' COMMENT '表单样式',
  `minlength` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最小值',
  `maxlength` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最大值',
  `pattern` varchar(255) NOT NULL DEFAULT '' COMMENT '数据校验正则',
  `errortips` varchar(255) NOT NULL DEFAULT '' COMMENT '数据校验未通过的提示信息',
  `formtype` varchar(20) NOT NULL DEFAULT '' COMMENT '字段类型',
  `setting` mediumtext,
  `formattribute` varchar(255) NOT NULL DEFAULT '',
  `unsetgroupids` varchar(255) NOT NULL DEFAULT '',
  `unsetroleids` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否内部字段 1是',
  `issystem` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否系统字段 1 是',
  `isunique` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '值唯一',
  `isbase` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作为基本信息',
  `issearch` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作为搜索条件',
  `isadd` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '在前台投稿中显示',
  `isfulltext` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作为全站搜索信息',
  `isposition` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否入库到推荐位',
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 禁用 0启用',
  `isomnipotent` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模型字段列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_module`
--

DROP TABLE IF EXISTS `minmore_module`;
CREATE TABLE IF NOT EXISTS `minmore_module` (
  `module` varchar(15) NOT NULL COMMENT '模块',
  `modulename` varchar(20) NOT NULL DEFAULT '' COMMENT '模块名称',
  `sign` varchar(255) NOT NULL DEFAULT '' COMMENT '签名',
  `iscore` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '内置模块',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否可用',
  `version` varchar(50) NOT NULL DEFAULT '' COMMENT '版本',
  `setting` mediumtext COMMENT '设置信息',
  `installtime` int(10) NOT NULL DEFAULT '0' COMMENT '安装时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='已安装模块列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_operationlog`
--

DROP TABLE IF EXISTS `minmore_operationlog`;
CREATE TABLE IF NOT EXISTS `minmore_operationlog` (
  `id` int(11) NOT NULL COMMENT '日志ID',
  `uid` smallint(6) NOT NULL DEFAULT '0' COMMENT '操作帐号ID',
  `time` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `ip` char(20) NOT NULL DEFAULT '' COMMENT 'IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0错误提示，1为正确提示',
  `info` text COMMENT '其他说明',
  `get` varchar(255) NOT NULL DEFAULT '' COMMENT 'get数据'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台操作日志表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_page`
--

DROP TABLE IF EXISTS `minmore_page`;
CREATE TABLE IF NOT EXISTS `minmore_page` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `title` varchar(160) NOT NULL DEFAULT '' COMMENT '标题',
  `style` varchar(24) NOT NULL DEFAULT '' COMMENT '样式',
  `keywords` varchar(40) NOT NULL DEFAULT '' COMMENT '关键字',
  `content` text COMMENT '内容',
  `template` varchar(30) NOT NULL DEFAULT '',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页内容表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_photo`
--

DROP TABLE IF EXISTS `minmore_photo`;
CREATE TABLE IF NOT EXISTS `minmore_photo` (
  `id` mediumint(8) unsigned NOT NULL,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` char(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `style` char(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keywords` char(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` char(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `posid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击总数',
  `yesterdayviews` int(11) NOT NULL DEFAULT '0' COMMENT '最日',
  `dayviews` int(10) NOT NULL DEFAULT '0' COMMENT '今日点击数',
  `weekviews` int(10) NOT NULL DEFAULT '0' COMMENT '本周访问数',
  `monthviews` int(10) NOT NULL DEFAULT '0' COMMENT '本月访问',
  `viewsupdatetime` int(10) NOT NULL DEFAULT '0' COMMENT '点击数更新时间',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_photo_data`
--

DROP TABLE IF EXISTS `minmore_photo_data`;
CREATE TABLE IF NOT EXISTS `minmore_photo_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `template` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allow_comment` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `imgs` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_position`
--

DROP TABLE IF EXISTS `minmore_position`;
CREATE TABLE IF NOT EXISTS `minmore_position` (
  `posid` smallint(5) unsigned NOT NULL COMMENT '推荐位id',
  `modelid` char(30) NOT NULL DEFAULT '' COMMENT '模型id',
  `catid` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目id',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  `maxnum` smallint(5) NOT NULL DEFAULT '20' COMMENT '最大存储数据量',
  `extention` char(100) NOT NULL DEFAULT '',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_position_data`
--

DROP TABLE IF EXISTS `minmore_position_data`;
CREATE TABLE IF NOT EXISTS `minmore_position_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'ID',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `role` smallint(5) NOT NULL DEFAULT '1',
  `posid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位ID',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模型',
  `modelid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `thumb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有缩略图',
  `data` mediumtext COMMENT '数据信息',
  `listorder` mediumint(8) NOT NULL DEFAULT '0' COMMENT '排序',
  `expiration` int(10) NOT NULL,
  `extention` char(30) NOT NULL DEFAULT '',
  `synedit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否同步编辑'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位数据表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_role`
--

DROP TABLE IF EXISTS `minmore_role`;
CREATE TABLE IF NOT EXISTS `minmore_role` (
  `id` smallint(6) unsigned NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parentid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父角色ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `domain` varchar(50) DEFAULT NULL,
  `theme` varchar(100) NOT NULL,
  `level` varchar(50) DEFAULT '',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色信息列表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_role_level`
--

DROP TABLE IF EXISTS `minmore_role_level`;
CREATE TABLE IF NOT EXISTS `minmore_role_level` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '层级名称',
  `template_prefix` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `listorder` int(11) NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `minmore_search`
--

DROP TABLE IF EXISTS `minmore_search`;
CREATE TABLE IF NOT EXISTS `minmore_search` (
  `searchid` int(10) unsigned NOT NULL,
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '信息id',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目id',
  `modelid` smallint(5) NOT NULL COMMENT '模型id',
  `adddate` int(10) unsigned NOT NULL COMMENT '添加时间',
  `data` text NOT NULL COMMENT '数据'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='全站搜索数据表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_search_keyword`
--

DROP TABLE IF EXISTS `minmore_search_keyword`;
CREATE TABLE IF NOT EXISTS `minmore_search_keyword` (
  `keyword` char(20) NOT NULL COMMENT '关键字',
  `pinyin` char(20) NOT NULL COMMENT '关键字拼音',
  `searchnums` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '搜索次数',
  `data` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='搜索关键字表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_tags`
--

DROP TABLE IF EXISTS `minmore_tags`;
CREATE TABLE IF NOT EXISTS `minmore_tags` (
  `tagid` smallint(5) unsigned NOT NULL COMMENT 'tagID',
  `tag` char(20) NOT NULL DEFAULT '' COMMENT 'tag名称',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keyword` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo简介',
  `style` char(5) NOT NULL DEFAULT '' COMMENT '附加状态码',
  `usetimes` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '信息总数',
  `lastusetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后使用时间',
  `hits` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `lasthittime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近访问时间',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tags主表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_tags_content`
--

DROP TABLE IF EXISTS `minmore_tags_content`;
CREATE TABLE IF NOT EXISTS `minmore_tags_content` (
  `tag` char(20) NOT NULL COMMENT 'tag名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '信息地址',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '标题',
  `modelid` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `contentid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '信息ID',
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tags数据表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_terms`
--

DROP TABLE IF EXISTS `minmore_terms`;
CREATE TABLE IF NOT EXISTS `minmore_terms` (
  `id` bigint(20) unsigned NOT NULL COMMENT '分类ID',
  `parentid` smallint(5) NOT NULL DEFAULT '0' COMMENT '父ID',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `module` varchar(200) NOT NULL DEFAULT '' COMMENT '所属模块',
  `setting` mediumtext COMMENT '相关配置信息'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_urlrule`
--

DROP TABLE IF EXISTS `minmore_urlrule`;
CREATE TABLE IF NOT EXISTS `minmore_urlrule` (
  `urlruleid` smallint(5) unsigned NOT NULL COMMENT '规则id',
  `module` varchar(15) NOT NULL DEFAULT '' COMMENT '所属模块',
  `file` varchar(20) NOT NULL DEFAULT '' COMMENT '所属文件',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '生成静态规则 1 静态',
  `urlrule` varchar(255) NOT NULL DEFAULT '' COMMENT 'url规则',
  `example` varchar(255) NOT NULL DEFAULT '' COMMENT '示例'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容模型URL规则';

-- --------------------------------------------------------

--
-- 表的结构 `minmore_user`
--

DROP TABLE IF EXISTS `minmore_user`;
CREATE TABLE IF NOT EXISTS `minmore_user` (
  `id` smallint(5) unsigned NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称/姓名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `bind_account` varchar(50) NOT NULL DEFAULT '' COMMENT '绑定帐户',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(40) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `verify` varchar(32) NOT NULL DEFAULT '' COMMENT '证验码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `role_id` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '对应角色ID',
  `info` text COMMENT '信息'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台用户表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `minmore_access`
--
ALTER TABLE `minmore_access`
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `minmore_addons`
--
ALTER TABLE `minmore_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sign` (`sign`);

--
-- Indexes for table `minmore_admin_panel`
--
ALTER TABLE `minmore_admin_panel`
  ADD UNIQUE KEY `userid` (`mid`,`userid`);

--
-- Indexes for table `minmore_article`
--
ALTER TABLE `minmore_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`,`listorder`,`id`),
  ADD KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  ADD KEY `catid` (`catid`,`weekviews`,`views`,`dayviews`,`monthviews`,`status`,`id`),
  ADD KEY `thumb` (`thumb`);

--
-- Indexes for table `minmore_article_data`
--
ALTER TABLE `minmore_article_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_attachment`
--
ALTER TABLE `minmore_attachment`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `authcode` (`authcode`);

--
-- Indexes for table `minmore_attachment_index`
--
ALTER TABLE `minmore_attachment_index`
  ADD KEY `keyid` (`keyid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `minmore_behavior`
--
ALTER TABLE `minmore_behavior`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_behavior_log`
--
ALTER TABLE `minmore_behavior_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_behavior_rule`
--
ALTER TABLE `minmore_behavior_rule`
  ADD PRIMARY KEY (`ruleid`);

--
-- Indexes for table `minmore_cache`
--
ALTER TABLE `minmore_cache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ckey` (`key`);

--
-- Indexes for table `minmore_category`
--
ALTER TABLE `minmore_category`
  ADD PRIMARY KEY (`catid`),
  ADD KEY `module` (`module`,`parentid`,`listorder`,`catid`),
  ADD KEY `siteid` (`type`);

--
-- Indexes for table `minmore_category_field`
--
ALTER TABLE `minmore_category_field`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `minmore_category_priv`
--
ALTER TABLE `minmore_category_priv`
  ADD KEY `catid` (`catid`,`roleid`,`is_admin`,`action`);

--
-- Indexes for table `minmore_collection_content`
--
ALTER TABLE `minmore_collection_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodeid` (`nodeid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `minmore_collection_history`
--
ALTER TABLE `minmore_collection_history`
  ADD PRIMARY KEY (`md5`);

--
-- Indexes for table `minmore_collection_node`
--
ALTER TABLE `minmore_collection_node`
  ADD PRIMARY KEY (`nodeid`);

--
-- Indexes for table `minmore_collection_program`
--
ALTER TABLE `minmore_collection_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodeid` (`nodeid`);

--
-- Indexes for table `minmore_config`
--
ALTER TABLE `minmore_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_role_varname` (`varname`,`role`) USING BTREE;

--
-- Indexes for table `minmore_config_field`
--
ALTER TABLE `minmore_config_field`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `minmore_connect`
--
ALTER TABLE `minmore_connect`
  ADD PRIMARY KEY (`connectid`),
  ADD KEY `openid` (`openid`);

--
-- Indexes for table `minmore_customlist`
--
ALTER TABLE `minmore_customlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_customtemp`
--
ALTER TABLE `minmore_customtemp`
  ADD PRIMARY KEY (`tempid`),
  ADD KEY `tempname` (`tempname`);


--
-- Indexes for table `minmore_download`
--
ALTER TABLE `minmore_download`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`,`listorder`,`id`),
  ADD KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  ADD KEY `catid` (`catid`,`weekviews`,`views`,`dayviews`,`monthviews`,`status`,`id`),
  ADD KEY `thumb` (`thumb`);

--
-- Indexes for table `minmore_download_data`
--
ALTER TABLE `minmore_download_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_locking`
--
ALTER TABLE `minmore_locking`
  ADD KEY `userid` (`userid`),
  ADD KEY `onlinetime` (`locktime`);

--
-- Indexes for table `minmore_loginlog`
--
ALTER TABLE `minmore_loginlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_member`
--
ALTER TABLE `minmore_member`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`(20));

--
-- Indexes for table `minmore_member_content`
--
ALTER TABLE `minmore_member_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`catid`,`content_id`,`status`);

--
-- Indexes for table `minmore_member_favorite`
--
ALTER TABLE `minmore_member_favorite`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `minmore_member_group`
--
ALTER TABLE `minmore_member_group`
  ADD PRIMARY KEY (`groupid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `listorder` (`sort`);

--
-- Indexes for table `minmore_member_online`
--
ALTER TABLE `minmore_member_online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`) USING HASH,
  ADD KEY `lasttime` (`userid`,`lasttime`);

--
-- Indexes for table `minmore_menu`
--
ALTER TABLE `minmore_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentid` (`parentid`);

--
-- Indexes for table `minmore_model`
--
ALTER TABLE `minmore_model`
  ADD PRIMARY KEY (`modelid`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `minmore_model_field`
--
ALTER TABLE `minmore_model_field`
  ADD PRIMARY KEY (`fieldid`),
  ADD KEY `modelid` (`modelid`,`disabled`),
  ADD KEY `field` (`field`,`modelid`);

--
-- Indexes for table `minmore_module`
--
ALTER TABLE `minmore_module`
  ADD PRIMARY KEY (`module`),
  ADD KEY `sign` (`sign`);

--
-- Indexes for table `minmore_operationlog`
--
ALTER TABLE `minmore_operationlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `username` (`uid`);

--
-- Indexes for table `minmore_page`
--
ALTER TABLE `minmore_page`
  ADD PRIMARY KEY (`catid`),
  ADD KEY `catid` (`catid`);

--
-- Indexes for table `minmore_photo`
--
ALTER TABLE `minmore_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`,`listorder`,`id`),
  ADD KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  ADD KEY `catid` (`catid`,`weekviews`,`views`,`dayviews`,`monthviews`,`status`,`id`),
  ADD KEY `thumb` (`thumb`);

--
-- Indexes for table `minmore_photo_data`
--
ALTER TABLE `minmore_photo_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_position`
--
ALTER TABLE `minmore_position`
  ADD PRIMARY KEY (`posid`);

--
-- Indexes for table `minmore_position_data`
--
ALTER TABLE `minmore_position_data`
  ADD KEY `posid` (`posid`),
  ADD KEY `listorder` (`listorder`);

--
-- Indexes for table `minmore_role`
--
ALTER TABLE `minmore_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`parentid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `minmore_role_level`
--
ALTER TABLE `minmore_role_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minmore_search`
--
ALTER TABLE `minmore_search`
  ADD PRIMARY KEY (`searchid`),
  ADD KEY `id` (`id`,`catid`,`adddate`) USING BTREE,
  ADD KEY `modelid` (`modelid`,`catid`),
  ADD FULLTEXT KEY `data` (`data`);

--
-- Indexes for table `minmore_search_keyword`
--
ALTER TABLE `minmore_search_keyword`
  ADD UNIQUE KEY `keyword` (`keyword`),
  ADD UNIQUE KEY `pinyin` (`pinyin`),
  ADD FULLTEXT KEY `data` (`data`);

--
-- Indexes for table `minmore_tags`
--
ALTER TABLE `minmore_tags`
  ADD PRIMARY KEY (`tagid`),
  ADD UNIQUE KEY `tag` (`tag`),
  ADD KEY `usetimes` (`usetimes`,`listorder`),
  ADD KEY `hits` (`hits`,`listorder`);

--
-- Indexes for table `minmore_tags_content`
--
ALTER TABLE `minmore_tags_content`
  ADD KEY `modelid` (`modelid`,`contentid`),
  ADD KEY `tag` (`tag`(10));

--
-- Indexes for table `minmore_terms`
--
ALTER TABLE `minmore_terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `minmore_urlrule`
--
ALTER TABLE `minmore_urlrule`
  ADD PRIMARY KEY (`urlruleid`);

--
-- Indexes for table `minmore_user`
--
ALTER TABLE `minmore_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `minmore_addons`
--
ALTER TABLE `minmore_addons`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `minmore_article`
--
ALTER TABLE `minmore_article`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_attachment`
--
ALTER TABLE `minmore_attachment`
  MODIFY `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件ID';
--
-- AUTO_INCREMENT for table `minmore_behavior`
--
ALTER TABLE `minmore_behavior`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `minmore_behavior_log`
--
ALTER TABLE `minmore_behavior_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `minmore_behavior_rule`
--
ALTER TABLE `minmore_behavior_rule`
  MODIFY `ruleid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `minmore_cache`
--
ALTER TABLE `minmore_cache`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增长ID';
--
-- AUTO_INCREMENT for table `minmore_category`
--
ALTER TABLE `minmore_category`
  MODIFY `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID';
--
-- AUTO_INCREMENT for table `minmore_category_field`
--
ALTER TABLE `minmore_category_field`
  MODIFY `fid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '自增长id';
--
-- AUTO_INCREMENT for table `minmore_collection_content`
--
ALTER TABLE `minmore_collection_content`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_collection_node`
--
ALTER TABLE `minmore_collection_node`
  MODIFY `nodeid` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '采集节点ID';
--
-- AUTO_INCREMENT for table `minmore_collection_program`
--
ALTER TABLE `minmore_collection_program`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_config`
--
ALTER TABLE `minmore_config`
  MODIFY `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_config_field`
--
ALTER TABLE `minmore_config_field`
  MODIFY `fid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '自增长id';
--
-- AUTO_INCREMENT for table `minmore_connect`
--
ALTER TABLE `minmore_connect`
  MODIFY `connectid` mediumint(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_customlist`
--
ALTER TABLE `minmore_customlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自定义列表ID';
--
-- AUTO_INCREMENT for table `minmore_customtemp`
--
ALTER TABLE `minmore_customtemp`
  MODIFY `tempid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '模板ID';
--
-- AUTO_INCREMENT for table `minmore_download`
--
ALTER TABLE `minmore_download`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_loginlog`
--
ALTER TABLE `minmore_loginlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID';
--
-- AUTO_INCREMENT for table `minmore_member`
--
ALTER TABLE `minmore_member`
  MODIFY `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id';
--
-- AUTO_INCREMENT for table `minmore_member_content`
--
ALTER TABLE `minmore_member_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_member_favorite`
--
ALTER TABLE `minmore_member_favorite`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT COMMENT '收藏ID';
--
-- AUTO_INCREMENT for table `minmore_member_group`
--
ALTER TABLE `minmore_member_group`
  MODIFY `groupid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员组id';
--
-- AUTO_INCREMENT for table `minmore_member_online`
--
ALTER TABLE `minmore_member_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_menu`
--
ALTER TABLE `minmore_menu`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_model`
--
ALTER TABLE `minmore_model`
  MODIFY `modelid` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_model_field`
--
ALTER TABLE `minmore_model_field`
  MODIFY `fieldid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_operationlog`
--
ALTER TABLE `minmore_operationlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID';
--
-- AUTO_INCREMENT for table `minmore_photo`
--
ALTER TABLE `minmore_photo`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_position`
--
ALTER TABLE `minmore_position`
  MODIFY `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id';
--
-- AUTO_INCREMENT for table `minmore_role`
--
ALTER TABLE `minmore_role`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_role_level`
--
ALTER TABLE `minmore_role_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_search`
--
ALTER TABLE `minmore_search`
  MODIFY `searchid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minmore_tags`
--
ALTER TABLE `minmore_tags`
  MODIFY `tagid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'tagID';
--
-- AUTO_INCREMENT for table `minmore_terms`
--
ALTER TABLE `minmore_terms`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID';
--
-- AUTO_INCREMENT for table `minmore_urlrule`
--
ALTER TABLE `minmore_urlrule`
  MODIFY `urlruleid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id';
--
-- AUTO_INCREMENT for table `minmore_user`
--
ALTER TABLE `minmore_user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-06-02 11:53:27
-- 服务器版本： 5.6.30
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minmore`
--

--
-- 插入之前先把表清空（truncate） `minmore_access`
--

TRUNCATE TABLE `minmore_access`;

--
-- 插入之前先把表清空（truncate） `minmore_addons`
--

TRUNCATE TABLE `minmore_addons`;
--
-- 插入之前先把表清空（truncate） `minmore_admin_panel`
--

TRUNCATE TABLE `minmore_admin_panel`;
--
-- 插入之前先把表清空（truncate） `minmore_article`
--

TRUNCATE TABLE `minmore_article`;

--
-- 插入之前先把表清空（truncate） `minmore_article_data`
--

TRUNCATE TABLE `minmore_article_data`;

--
-- 插入之前先把表清空（truncate） `minmore_attachment`
--

TRUNCATE TABLE `minmore_attachment`;
--
-- 插入之前先把表清空（truncate） `minmore_attachment_index`
--

TRUNCATE TABLE `minmore_attachment_index`;
--
-- 插入之前先把表清空（truncate） `minmore_behavior`
--

TRUNCATE TABLE `minmore_behavior`;
--
-- 转存表中的数据 `minmore_behavior`
--

INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(1, 'app_init', '应用初始化标签位', '应用初始化标签位', 1, 1, 1, '', 1381021393);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(2, 'path_info', 'PATH_INFO检测标签位', 'PATH_INFO检测标签位', 1, 1, 1, '', 1381021411);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(3, 'app_begin', '应用开始标签位', '应用开始标签位', 1, 1, 1, '', 1381021424);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(4, 'action_name', '操作方法名标签位', '操作方法名标签位', 1, 1, 1, '', 1381021437);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(5, 'action_begin', '控制器开始标签位', '控制器开始标签位', 1, 1, 1, '', 1381021450);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(6, 'view_begin', '视图输出开始标签位', '视图输出开始标签位', 1, 1, 1, '', 1381021463);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(7, 'view_parse', '视图解析标签位', '视图解析标签位', 1, 1, 1, '', 1381021476);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(8, 'template_filter', '模板内容解析标签位', '模板内容解析标签位', 1, 1, 1, '', 1381021488);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(9, 'view_filter', '视图输出过滤标签位', '视图输出过滤标签位', 1, 1, 1, '', 1381021621);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(10, 'view_end', '视图输出结束标签位', '视图输出结束标签位', 1, 1, 1, '', 1381021631);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(11, 'action_end', '控制器结束标签位', '控制器结束标签位', 1, 1, 1, '', 1381021642);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(12, 'app_end', '应用结束标签位', '应用结束标签位', 1, 1, 1, '', 1381021654);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(13, 'appframe_rbac_init', '后台权限控制', '后台权限控制', 1, 1, 1, '', 1381023560);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(14, 'content_add_end', '内容添加结束行为标签', '模块Search中的行为！', 1, 1, 0, 'Search', 1464769944);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(15, 'content_edit_end', '内容编辑结束行为标签', '模块Search中的行为！', 1, 1, 0, 'Search', 1464769944);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(16, 'content_check_end', '内容审核结束行为标签', '模块Search中的行为！', 1, 1, 0, 'Search', 1464769944);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(17, 'content_delete_end', '内容删除结束行为标签', '模块Search中的行为！', 1, 1, 0, 'Search', 1464769944);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(18, 'view_admin_top_menu', '后台框架首页右上角菜单', '后台框架首页右上角菜单', 2, 1, 0, '', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(19, 'view_member_menu', '管理中心左侧导航', '管理中心左侧导航', 2, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(20, 'view_member_right', '管理中心右侧', '管理中心右侧', 2, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(21, 'view_member_show_medal', '会员个人空间首页勋章', '会员个人空间首页勋章显示', 2, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(22, 'view_member_home_indexright', '会员个人空间首页右侧', '会员个人空间首页右侧信息', 2, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(23, 'view_member_home_right', '会员个人空间右侧', '会员个人空间右侧信息', 2, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(24, 'view_member_home_nav', '会员个人空间导航', '会员个人空间导航', 2, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(25, 'action_member_loginend', '会员登陆成功后行为调用', '会员登陆成功后行为调用', 1, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(26, 'action_member_registerend', '会员注册成功后行为调用', '会员注册成功后行为调用', 1, 1, 0, 'Member', 1464858260);
INSERT INTO `minmore_behavior` (`id`, `name`, `title`, `remark`, `type`, `status`, `system`, `module`, `datetime`) VALUES(27, 'action_member_logout', '会员退出登陆后行为调用', '会员退出登陆后行为调用', 1, 1, 0, 'Member', 1464858260);

--
-- 插入之前先把表清空（truncate） `minmore_behavior_log`
--

TRUNCATE TABLE `minmore_behavior_log`;
--
-- 插入之前先把表清空（truncate） `minmore_behavior_rule`
--

TRUNCATE TABLE `minmore_behavior_rule`;
--
-- 转存表中的数据 `minmore_behavior_rule`
--

INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(1, 1, 1, '', '', 'phpfile:BuildLiteBehavior', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(2, 3, 1, '', '', 'phpfile:ReadHtmlCacheBehavior', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(3, 12, 1, '', '', 'phpfile:ShowPageTraceBehavior', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(4, 7, 1, '', '', 'phpfile:ParseTemplateBehavior', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(5, 8, 1, '', '', 'phpfile:ContentReplaceBehavior', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(6, 9, 1, '', '', 'phpfile:WriteHtmlCacheBehavior', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(7, 1, 1, '', '', 'phpfile:AppInitBehavior|module:Common', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(8, 3, 1, '', '', 'phpfile:AppBeginBehavior|module:Common', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(9, 6, 1, '', '', 'phpfile:ViewBeginBehavior|module:Common', 0, 1381021954);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(10, 14, 0, 'Search', '', 'phpfile:SearchApi|module:Search', 0, 1464769944);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(11, 15, 0, 'Search', '', 'phpfile:SearchApi|module:Search', 0, 1464769944);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(12, 16, 0, 'Search', '', 'phpfile:SearchApi|module:Search', 0, 1464769944);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(13, 17, 0, 'Search', '', 'phpfile:SearchApi|module:Search', 0, 1464769944);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(14, 18, 0, 'Member', '', 'phpfile:ViewAdminTopMenuBehavior|module:Member', 0, 1464858260);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(15, 21, 0, 'Member', '', 'phpfile:ViewMemberShowMedalBehavior|module:Member', 0, 1464858260);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(16, 22, 0, 'Member', '', 'phpfile:ViewMemberHomeIndexrightBehavior|module:Member', 0, 1464858260);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(17, 23, 0, 'Member', '', 'phpfile:ViewMemberHomeRightBehavior|module:Member', 0, 1464858260);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(18, 16, 0, 'Member', '', 'phpfile:ContentCheckEndBehavior|module:Member', 0, 1464858260);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(19, 15, 0, 'Member', '', 'phpfile:ContentEditEndBehavior|module:Member', 0, 1464858260);
INSERT INTO `minmore_behavior_rule` (`ruleid`, `behaviorid`, `system`, `module`, `addons`, `rule`, `listorder`, `datetime`) VALUES(20, 17, 0, 'Member', '', 'phpfile:ContentDeleteEndBehavior|module:Member', 0, 1464858260);

--
-- 插入之前先把表清空（truncate） `minmore_cache`
--

TRUNCATE TABLE `minmore_cache`;
--
-- 转存表中的数据 `minmore_cache`
--

INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(1, 'Config', '网站配置', '', 'Config', 'config_cache', '', 1);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(2, 'Module', '可用模块列表', '', 'Module', 'module_cache', '', 1);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(3, 'Behavior', '行为列表', '', 'Behavior', 'behavior_cache', '', 1);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(4, 'Menu', '后台菜单', 'Admin', 'Menu', 'menu_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(5, 'Category', '栏目索引', 'Content', 'Category', 'category_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(6, 'Model', '模型列表', 'Content', 'Model', 'model_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(7, 'Urlrules', 'URL规则', 'Content', 'Urlrule', 'urlrule_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(8, 'ModelField', '模型字段', 'Content', 'ModelField', 'model_field_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(9, 'Position', '推荐位', 'Content', 'Position', 'position_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(10, 'Addons', '插件列表', 'Addons', 'Addons', 'addons_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(11, 'Search_config', '全站搜索配置', 'Search', 'Search', 'search_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(12, 'Member_Config', '会员配置', 'Member', 'Member', 'member_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(13, 'Member_group', '会员组', 'Member', 'MemberGroup', 'membergroup_cache', '', 0);
INSERT INTO `minmore_cache` (`id`, `key`, `name`, `module`, `model`, `action`, `param`, `system`) VALUES(14, 'Model_Member', '会员模型', 'Member', 'Member', 'member_model_cahce', '', 0);

--
-- 插入之前先把表清空（truncate） `minmore_category`
--

TRUNCATE TABLE `minmore_category`;

--
-- 插入之前先把表清空（truncate） `minmore_category_field`
--

TRUNCATE TABLE `minmore_category_field`;
--
-- 插入之前先把表清空（truncate） `minmore_category_priv`
--

TRUNCATE TABLE `minmore_category_priv`;

--
-- 插入之前先把表清空（truncate） `minmore_collection_content`
--

TRUNCATE TABLE `minmore_collection_content`;
--
-- 插入之前先把表清空（truncate） `minmore_collection_history`
--

TRUNCATE TABLE `minmore_collection_history`;
--
-- 插入之前先把表清空（truncate） `minmore_collection_node`
--

TRUNCATE TABLE `minmore_collection_node`;
--
-- 插入之前先把表清空（truncate） `minmore_collection_program`
--

TRUNCATE TABLE `minmore_collection_program`;
--
-- 插入之前先把表清空（truncate） `minmore_config`
--

TRUNCATE TABLE `minmore_config`;
--
-- 转存表中的数据 `minmore_config`
--

INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(1, 'sitename', '网站名称', 0, 1, 'MinMoreCMS内容管理系统');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(2, 'siteurl', '网站网址', 0, 1, '/');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(3, 'sitefileurl', '附件地址', 0, 1, '/d/file/');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(4, 'siteemail', '站点邮箱', 0, 1, 'codevvip@yeah.net');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(6, 'siteinfo', '网站介绍', 0, 1, 'MinMoreCMS内容管理系统');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(89, 'siteurl', '网站网址', 0, 1, '/');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(90, 'sitefileurl', '附件地址', 0, 1, '/d/file/');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(91, 'siteemail', '站点邮箱', 0, 1, 'codevvip@yeah.net');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(7, 'sitekeywords', '网站关键字', 0, 1, 'MinMoreCMS内容管理系统');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(8, 'uploadmaxsize', '允许上传附件大小', 0, 1, '20240');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(9, 'uploadallowext', '允许上传附件类型', 0, 1, 'jpg|jpeg|gif|bmp|png|doc|docx|xls|xlsx|ppt|pptx|pdf|txt|rar|zip|swf');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(10, 'qtuploadmaxsize', '前台允许上传附件大小', 0, 1, '200');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(11, 'qtuploadallowext', '前台允许上传附件类型', 0, 1, 'jpg|jpeg|gif');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(12, 'watermarkenable', '是否开启图片水印', 0, 1, '1');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(13, 'watermarkminwidth', '水印-宽', 0, 1, '300');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(14, 'watermarkminheight', '水印-高', 0, 1, '100');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(15, 'watermarkimg', '水印图片', 0, 1, '/statics/images/mark_bai.png');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(16, 'watermarkpct', '水印透明度', 0, 1, '80');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(17, 'watermarkquality', 'JPEG 水印质量', 0, 1, '85');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(18, 'watermarkpos', '水印位置', 0, 1, '7');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(19, 'theme', '主题风格', 0, 1, 'Global');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(20, 'ftpstatus', 'FTP上传', 0, 1, '0');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(21, 'ftpuser', 'FTP用户名', 0, 1, '');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(22, 'ftppassword', 'FTP密码', 0, 1, '');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(23, 'ftphost', 'FTP服务器地址', 0, 1, '');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(24, 'ftpport', 'FTP服务器端口', 0, 1, '21');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(25, 'ftppasv', 'FTP是否开启被动模式', 0, 1, '1');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(26, 'ftpssl', 'FTP是否使用SSL连接', 0, 1, '0');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(27, 'ftptimeout', 'FTP超时时间', 0, 1, '10');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(28, 'ftpuppat', 'FTP上传目录', 0, 1, '/');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(29, 'mail_type', '邮件发送模式', 0, 1, '1');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(30, 'mail_server', '邮件服务器', 0, 1, 'smtp.qq.com');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(31, 'mail_port', '邮件发送端口', 0, 1, '25');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(32, 'mail_from', '发件人地址', 0, 1, 'codevvip@yeah.net');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(33, 'mail_auth', '密码验证', 0, 1, '1');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(34, 'mail_user', '邮箱用户名', 0, 1, 'admin');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(35, 'mail_password', '邮箱密码', 0, 1, '');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(36, 'mail_fname', '发件人名称', 0, 1, 'MinMoreCMS管理员');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(37, 'domainaccess', '指定域名访问', 0, 1, '0');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(38, 'generate', '是否生成首页', 0, 1, '1');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(39, 'index_urlruleid', '首页URL规则', 0, 1, '11');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(40, 'indextp', '首页模板', 0, 1, 'index.php');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(41, 'tagurl', 'TagURL规则', 0, 1, '8');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(42, 'checkcode_type', '验证码类型', 0, 1, '0');
INSERT INTO `minmore_config` (`id`, `varname`, `info`, `role`, `groupid`, `value`) VALUES(43, 'attachment_driver', '附件驱动', 0, 1, 'Local');


--
-- 插入之前先把表清空（truncate） `minmore_config_field`
--

TRUNCATE TABLE `minmore_config_field`;
--
-- 插入之前先把表清空（truncate） `minmore_connect`
--

TRUNCATE TABLE `minmore_connect`;
--
-- 插入之前先把表清空（truncate） `minmore_customlist`
--

TRUNCATE TABLE `minmore_customlist`;
--
-- 插入之前先把表清空（truncate） `minmore_customtemp`
--

TRUNCATE TABLE `minmore_customtemp`;

--
-- 插入之前先把表清空（truncate） `minmore_download`
--

TRUNCATE TABLE `minmore_download`;

--
-- 插入之前先把表清空（truncate） `minmore_download_data`
--

TRUNCATE TABLE `minmore_download_data`;

--
-- 插入之前先把表清空（truncate） `minmore_locking`
--

TRUNCATE TABLE `minmore_locking`;
--
-- 插入之前先把表清空（truncate） `minmore_loginlog`
--

TRUNCATE TABLE `minmore_loginlog`;

--
-- 插入之前先把表清空（truncate） `minmore_member`
--

TRUNCATE TABLE `minmore_member`;
--
-- 插入之前先把表清空（truncate） `minmore_member_content`
--

TRUNCATE TABLE `minmore_member_content`;
--
-- 插入之前先把表清空（truncate） `minmore_member_favorite`
--

TRUNCATE TABLE `minmore_member_favorite`;
--
-- 插入之前先把表清空（truncate） `minmore_member_group`
--

TRUNCATE TABLE `minmore_member_group`;
--
-- 转存表中的数据 `minmore_member_group`
--

INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(8, '游客', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '', '', 0, 0, '');
INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(2, '新手上路', 1, 1, 50, 100, 1, 1, 0, 1, 0, 1, 0, 0, '', '', '', 2, 0, '');
INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(6, '注册会员', 1, 2, 100, 150, 0, 1, 0, 1, 1, 1, 0, 1, '', '', '', 6, 0, '');
INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(4, '中级会员', 1, 3, 150, 500, 1, 1, 0, 1, 1, 1, 0, 1, '', '', '', 4, 0, '');
INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(5, '高级会员', 1, 5, 300, 999, 1, 1, 1, 1, 1, 1, 0, 1, '', '', '', 5, 0, '');
INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(1, '禁止访问', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', '', '0', 0, 0, '');
INSERT INTO `minmore_member_group` (`groupid`, `name`, `issystem`, `starnum`, `point`, `allowmessage`, `allowvisit`, `allowpost`, `allowpostverify`, `allowsearch`, `allowupgrade`, `allowsendmessage`, `allowpostnum`, `allowattachment`, `icon`, `usernamecolor`, `description`, `sort`, `disabled`, `expand`) VALUES(7, '邮件认证', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 'images/group/vip.jpg', '#000000', '', 7, 0, '');

--
-- 插入之前先把表清空（truncate） `minmore_member_online`
--

TRUNCATE TABLE `minmore_member_online`;
--
-- 插入之前先把表清空（truncate） `minmore_menu`
--

TRUNCATE TABLE `minmore_menu`;
--
-- 转存表中的数据 `minmore_menu`
--

INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(1, '缓存更新', 0, 'Admin', 'Index', 'cache', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(2, '我的面板', 0, 'Admin', 'Config', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(3, '设置', 0, 'Admin', 'Config', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(4, '个人信息', 2, 'Admin', 'Adminmanage', 'myinfo', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(5, '修改个人信息', 4, 'Admin', 'Adminmanage', 'myinfo', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(6, '修改密码', 4, 'Admin', 'Adminmanage', 'chanpass', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(7, '系统设置', 3, 'Admin', 'Config', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(8, '站点配置', 7, 'Admin', 'Config', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(9, '邮箱配置', 8, 'Admin', 'Config', 'mail', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(10, '附件配置', 8, 'Admin', 'Config', 'attach', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(11, '高级配置', 8, 'Admin', 'Config', 'addition', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(12, '扩展配置', 8, 'Admin', 'Config', 'extend', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(13, '行为管理', 7, 'Admin', 'Behavior', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(14, '行为日志', 13, 'Admin', 'Behavior', 'logs', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(15, '编辑行为', 13, 'Admin', 'Behavior', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(16, '删除行为', 13, 'Admin', 'Behavior', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(17, '后台菜单管理', 7, 'Admin', 'Menu', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(18, '添加菜单', 17, 'Admin', 'Menu', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(19, '修改', 17, 'Admin', 'Menu', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(20, '删除', 17, 'Admin', 'Menu', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(21, '管理员设置', 3, 'Admin', 'Management', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(22, '管理员管理', 21, 'Admin', 'Management', 'manager', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(23, '添加管理员', 22, 'Admin', 'Management', 'adminadd', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(24, '编辑管理信息', 22, 'Admin', 'Management', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(25, '删除管理员', 22, 'Admin', 'Management', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(26, '角色管理', 21, 'Admin', 'Rbac', 'rolemanage', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(27, '添加角色', 26, 'Admin', 'Rbac', 'roleadd', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(28, '删除角色', 26, 'Admin', 'Rbac', 'roledelete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(29, '角色编辑', 26, 'Admin', 'Rbac', 'roleedit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(30, '角色授权', 26, 'Admin', 'Rbac', 'authorize', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(31, '日志管理', 3, 'Admin', 'Logs', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(32, '后台登陆日志', 31, 'Admin', 'Logs', 'loginlog', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(33, '后台操作日志', 31, 'Admin', 'Logs', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(34, '删除一个月前的登陆日志', 32, 'Admin', 'Logs', 'deleteloginlog', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(35, '删除一个月前的操作日志', 33, 'Admin', 'Logs', 'deletelog', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(36, '添加行为', 13, 'Admin', 'Behavior', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(37, '模块', 0, 'Admin', 'Module', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(38, '在线云平台', 37, 'Admin', 'Cloud', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(39, '模块商店', 38, 'Admin', 'Moduleshop', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(40, '插件商店', 38, 'Admin', 'Addonshop', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(41, '在线升级', 38, 'Admin', 'Upgrade', 'index', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(42, '本地模块管理', 37, 'Admin', 'Module', 'local', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(43, '模块管理', 42, 'Admin', 'Module', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(44, '内容', 0, 'Content', 'Index', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(45, '内容管理', 44, 'Content', 'Content', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(46, '内容相关设置', 44, 'Content', 'Category', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(47, '栏目列表', 46, 'Content', 'Category', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(48, '添加栏目', 47, 'Content', 'Category', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(49, '添加单页', 47, 'Content', 'Category', 'singlepage', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(50, '添加外部链接栏目', 47, 'Content', 'Category', 'wadd', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(51, '编辑栏目', 47, 'Content', 'Category', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(52, '删除栏目', 47, 'Content', 'Category', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(53, '栏目属性转换', 47, 'Content', 'Category', 'categoryshux', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(54, '模型管理', 46, 'Content', 'Models', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(55, '创建新模型', 54, 'Content', 'Models', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(56, '删除模型', 54, 'Content', 'Models', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(57, '编辑模型', 54, 'Content', 'Models', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(58, '模型禁用', 54, 'Content', 'Models', 'disabled', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(59, '模型导入', 54, 'Content', 'Models', 'import', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(60, '字段管理', 54, 'Content', 'Field', 'index', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(61, '字段修改', 60, 'Content', 'Field', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(62, '字段删除', 60, 'Content', 'Field', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(63, '字段状态', 60, 'Content', 'Field', 'disabled', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(64, '模型预览', 60, 'Content', 'Field', 'priview', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(65, '管理内容', 45, 'Content', 'Content', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(66, '附件管理', 45, 'Attachment', 'Atadmin', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(67, '删除', 66, 'Attachment', 'Atadmin', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(68, '发布管理', 44, 'Content', 'Createhtml', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(69, '批量更新栏目页', 68, 'Content', 'Createhtml', 'category', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(70, '生成首页', 68, 'Content', 'Createhtml', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(71, '批量更新URL', 68, 'Content', 'Createhtml', 'update_urls', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(72, '批量更新内容页', 68, 'Content', 'Createhtml', 'update_show', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(73, '刷新自定义页面', 68, 'Template', 'Custompage', 'createhtml', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(74, 'URL规则管理', 46, 'Content', 'Urlrule', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(75, '添加规则', 74, 'Content', 'Urlrule', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(76, '编辑', 74, 'Content', 'Urlrule', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(77, '删除', 74, 'Content', 'Urlrule', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(78, '推荐位管理', 46, 'Content', 'Position', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(79, '信息管理', 78, 'Content', 'Position', 'item', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(80, '添加推荐位', 78, 'Content', 'Position', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(81, '修改推荐位', 78, 'Content', 'Position', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(82, '删除推荐位', 78, 'Content', 'Position', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(83, '信息编辑', 79, 'Content', 'Position', 'item_manage', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(84, '信息排序', 79, 'Content', 'Position', 'item_listorder', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(85, '数据重建', 78, 'Content', 'Position', 'rebuilding', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(86, 'Tags管理', 45, 'Content', 'Tags', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(87, '修改', 86, 'Content', 'Tags', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(88, '删除', 86, 'Content', 'Tags', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(89, 'Tags数据重建', 86, 'Content', 'Tags', 'create', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(90, '界面', 0, 'Template', 'Style', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(91, '模板管理', 90, 'Template', 'Style', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(92, '模板风格', 91, 'Template', 'Style', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(93, '添加模板页', 92, 'Template', 'Style', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(94, '删除模板', 92, 'Template', 'Style', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(95, '修改模板', 92, 'Template', 'Style', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(96, '主题管理', 91, 'Template', 'Theme', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(97, '主题更换', 96, 'Template', 'Theme', 'chose', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(98, '自定义页面', 90, 'Template', 'Custompage', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(99, '自定义页面', 98, 'Template', 'Custompage', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(100, '添加自定义页面', 99, 'Template', 'Custompage', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(101, '删除自定义页面', 99, 'Template', 'Custompage', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(102, '编辑自定义页面', 99, 'Template', 'Custompage', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(103, '自定义列表', 98, 'Template', 'Customlist', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(104, '添加列表', 103, 'Template', 'Customlist', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(105, '删除列表', 103, 'Template', 'Customlist', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(106, '编辑列表', 103, 'Template', 'Customlist', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(107, '生成列表', 103, 'Template', 'Customlist', 'generate', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(108, '安装模块', 39, 'Admin', 'Moduleshop', 'install', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(109, '升级模块', 39, 'Admin', 'Moduleshop', 'upgrade', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(110, '安装插件', 40, 'Admin', 'Addonshop', 'install', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(111, '升级插件', 40, 'Admin', 'Addonshop', 'upgrade', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(112, '栏目授权', 26, 'Admin', 'Rbac', 'setting_cat_priv', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(113, '模板前缀管理', 7, 'Admin', 'Site', 'template_prefix', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(114, '域名模板设置', 7, 'Admin', 'Site', 'domain_management', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(115, '采集管理', 45, 'Collection', 'Node', 'index', '', 1, 1, '采集模块是可以批量采集目标网站内容入库！', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(116, '添加采集点', 115, 'Collection', 'Node', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(117, '导入采集点', 115, 'Collection', 'Node', 'node_import', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(118, '编辑采集点', 115, 'Collection', 'Node', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(119, '删除采集点', 115, 'Collection', 'Node', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(120, '复制采集点', 115, 'Collection', 'Node', 'copy', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(121, '导出采集点', 115, 'Collection', 'Node', 'export', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(122, '采集网址入库', 115, 'Collection', 'Node', 'col_url_list', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(123, '采集内容入库', 115, 'Collection', 'Node', 'col_content', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(124, '内容发布', 115, 'Collection', 'Node', 'publist', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(125, '删除已采集文章', 124, 'Collection', 'Node', 'content_del', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(126, '导入文章', 124, 'Collection', 'Node', 'import', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(127, '导入文章到模型入库', 124, 'Collection', 'Node', 'import_content', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(128, '添加导入方案', 124, 'Collection', 'Node', 'import_program_add', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(129, '删除导入方案', 124, 'Collection', 'Node', 'import_program_del', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(130, '编辑导入方案', 124, 'Collection', 'Node', 'import_program_edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(131, '扩展', 0, 'Addons', 'Addons', 'index', '', 0, 1, '扩展管理！', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(132, '插件管理', 131, 'Addons', 'Addons', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(133, '插件管理', 132, 'Addons', 'Addons', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(134, '创建新插件', 133, 'Addons', 'Addons', 'create', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(135, '本地安装', 133, 'Addons', 'Addons', 'local', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(136, '插件打包', 133, 'Addons', 'Addons', 'unpack', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(137, '插件后台列表', 131, 'Addons', 'Addons', 'addonadmin', '', 0, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(138, '搜索配置', 42, 'Search', 'Search', 'index', '', 0, 1, '搜索配置！', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(139, '重建索引', 138, 'Search', 'Search', 'create', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(140, '热门搜索', 138, 'Search', 'Search', 'searchot', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(141, '用户', 0, 'Member', 'Member', 'index', '', 0, 1, '网站用户管理！', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(142, '会员管理', 141, 'Member', 'Member', 'create', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(143, '会员设置', 142, 'Member', 'Setting', 'setting', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(144, 'Ucenter 测试数据库链接', 143, 'Member', 'Setting', 'myqsl_test', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(145, '会员管理', 142, 'Member', 'Member', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(146, '添加会员', 145, 'Member', 'Member', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(147, '修改会员', 145, 'Member', 'Member', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(148, '删除会员', 145, 'Member', 'Member', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(149, '锁定', 145, 'Member', 'Member', 'lock', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(150, '解除锁定', 145, 'Member', 'Member', 'unlock', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(151, '资料查看', 145, 'Member', 'Member', 'memberinfo', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(152, '审核会员', 142, 'Member', 'Member', 'userverify', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(153, '登陆授权管理', 142, 'Member', 'Member', 'connect', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(154, '会员组管理', 142, 'Member', 'Group', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(155, '添加会员组', 154, 'Member', 'Group', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(156, '编辑会员组', 154, 'Member', 'Group', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(157, '删除会员组', 154, 'Member', 'Group', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(158, '会员组排序', 154, 'Member', 'Group', 'sort', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(159, '模型管理', 141, 'Member', 'Model', 'index', '', 0, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(160, '模型管理', 159, 'Member', 'Model', 'index', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(161, '添加模型', 160, 'Member', 'Model', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(162, '编辑模型', 160, 'Member', 'Model', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(163, '删除模型', 160, 'Member', 'Model', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(164, '移动模型', 160, 'Member', 'Model', 'move', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(165, '字段管理', 160, 'Member', 'Modelfield', 'index', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(166, '添加字段', 165, 'Member', 'Field', 'add', '', 1, 1, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(167, '字段编辑', 165, 'Member', 'Field', 'edit', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(168, '删除字段', 165, 'Member', 'Field', 'delete', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(169, '字段排序', 165, 'Member', 'Field', 'listorder', '', 1, 0, '', 0);
INSERT INTO `minmore_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(170, '字段启用与禁用', 165, 'Member', 'Field', 'disabled', '', 1, 0, '', 0);

--
-- 插入之前先把表清空（truncate） `minmore_model`
--

TRUNCATE TABLE `minmore_model`;
--
-- 转存表中的数据 `minmore_model`
--

INSERT INTO `minmore_model` (`modelid`, `name`, `description`, `tablename`, `setting`, `addtime`, `items`, `enablesearch`, `disabled`, `default_style`, `category_template`, `list_template`, `show_template`, `js_template`, `sort`, `type`) VALUES(1, '文章模型', '文章模型', 'article', '', 1403150253, 0, 1, 0, '', '', '', '', '', 0, 0);
INSERT INTO `minmore_model` (`modelid`, `name`, `description`, `tablename`, `setting`, `addtime`, `items`, `enablesearch`, `disabled`, `default_style`, `category_template`, `list_template`, `show_template`, `js_template`, `sort`, `type`) VALUES(2, '下载模型', '下载模型', 'download', '', 1403153866, 0, 1, 0, '', '', '', '', '', 0, 0);
INSERT INTO `minmore_model` (`modelid`, `name`, `description`, `tablename`, `setting`, `addtime`, `items`, `enablesearch`, `disabled`, `default_style`, `category_template`, `list_template`, `show_template`, `js_template`, `sort`, `type`) VALUES(3, '图片模型', '图片模型', 'photo', '', 1403153881, 0, 1, 0, '', '', '', '', '', 0, 0);

--
-- 插入之前先把表清空（truncate） `minmore_model_field`
--

TRUNCATE TABLE `minmore_model_field`;
--
-- 转存表中的数据 `minmore_model_field`
--

INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(1, 1, 'status', '状态', '', '', 0, 2, '', '', 'box', 'a:8:{s:7:"options";s:0:"";s:9:"fieldtype";s:7:"varchar";s:5:"width";s:0:"";s:4:"size";s:0:"";s:12:"defaultvalue";s:0:"";s:10:"outputtype";s:1:"0";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 15, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(2, 1, 'username', '用户名', '', '', 0, 20, '', '', 'text', 'a:5:{s:4:"size";s:0:"";s:12:"defaultvalue";s:0:"";s:10:"ispassword";s:1:"0";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 16, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(3, 1, 'islink', '转向链接', '', '', 0, 0, '', '', 'islink', 'a:3:{s:4:"size";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 0, 0, 1, 0, 0, 17, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(4, 1, 'template', '内容页模板', '', '', 0, 30, '', '', 'template', 'a:2:{s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '-99', '-99', 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(5, 1, 'allow_comment', '允许评论', '', '', 0, 0, '', '', 'box', 'a:10:{s:7:"options";s:32:"允许评论|1\n不允许评论|0";s:7:"boxtype";s:5:"radio";s:9:"fieldtype";s:7:"tinyint";s:9:"minnumber";s:1:"1";s:5:"width";s:2:"88";s:4:"size";s:0:"";s:12:"defaultvalue";s:1:"1";s:10:"outputtype";s:1:"1";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 14, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(6, 1, 'pages', '分页方式', '', '', 0, 0, '', '', 'pages', 'a:2:{s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '-99', '-99', 0, 0, 0, 1, 0, 0, 0, 0, 9, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(7, 1, 'inputtime', '真实发布时间', '', '', 0, 0, '', '', 'datetime', 'a:5:{s:9:"fieldtype";s:3:"int";s:6:"format";s:11:"Y-m-d H:i:s";s:11:"defaulttype";s:1:"0";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 1, 1, 0, 0, 0, 0, 0, 1, 11, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(8, 1, 'posid', '推荐位', '', '', 0, 0, '', '', 'posid', 'a:4:{s:5:"width";s:3:"125";s:12:"defaultvalue";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 1, 11, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(9, 1, 'url', 'URL', '', '', 0, 100, '', '', 'text', 'a:5:{s:4:"size";s:0:"";s:12:"defaultvalue";s:0:"";s:10:"ispassword";s:1:"0";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 1, 1, 0, 1, 0, 0, 0, 1, 12, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(10, 1, 'listorder', '排序', '', '', 0, 6, '', '', 'number', 'a:7:{s:9:"minnumber";s:0:"";s:9:"maxnumber";s:0:"";s:13:"decimaldigits";s:1:"0";s:4:"size";s:0:"";s:12:"defaultvalue";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 18, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(11, 1, 'relation', '相关文章', '', '', 0, 255, '', '', 'omnipotent', 'a:4:{s:8:"formtext";s:464:"<input type="hidden" name="info[relation]" id="relation" value="{FIELD_VALUE}" style="50" >\n<ul class="list-dot" id="relation_text">\n</ul>\n<input type="button" value="添加相关" onClick="omnipotent(''selectid'',GV.DIMAUB+''index.php?a=public_relationlist&m=Content&g=Content&modelid={MODELID}'',''添加相关文章'',1)" class="btn">\n<span class="edit_content">\n  <input type="button" value="显示已有" onClick="show_relation({MODELID},{ID})" class="btn">\n</span>";s:9:"fieldtype";s:7:"varchar";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 0, 0, 0, 0, 0, 1, 0, 8, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(12, 1, 'thumb', '缩略图', '', '', 0, 100, '', '', 'image', 'a:10:{s:5:"width";s:0:"";s:12:"defaultvalue";s:0:"";s:9:"show_type";s:1:"1";s:15:"upload_allowext";s:20:"jpg|jpeg|gif|png|bmp";s:9:"watermark";s:1:"0";s:13:"isselectimage";s:1:"1";s:12:"images_width";s:0:"";s:13:"images_height";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 0, 0, 1, 0, 1, 7, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(13, 1, 'catid', '栏目', '', '', 1, 6, '/^[0-9]{1,6}$/', '请选择栏目', 'catid', 'a:2:{s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '-99', '-99', 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(15, 1, 'title', '标题', '', 'inputtitle', 1, 80, '', '请输入标题', 'title', 'a:2:{s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 1, 1, 1, 1, 1, 3, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(16, 1, 'keywords', '关键词', '多关之间用空格或者“,”隔开', '', 0, 40, '', '', 'keyword', 'a:2:{s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '-99', '-99', 0, 1, 0, 1, 1, 1, 1, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(17, 1, 'tags', 'TAGS', '多关之间用空格或者“,”隔开', '', 0, 0, '', '', 'tags', 'a:4:{s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(18, 1, 'description', '摘要', '', '', 0, 255, '', '', 'textarea', 'a:7:{s:5:"width";s:2:"99";s:6:"height";s:2:"46";s:12:"defaultvalue";s:0:"";s:10:"enablehtml";s:1:"0";s:9:"fieldtype";s:10:"mediumtext";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 1, 0, 1, 1, 1, 5, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(19, 1, 'updatetime', '发布时间', '', '', 0, 0, '', '', 'datetime', 'a:5:{s:9:"fieldtype";s:3:"int";s:6:"format";s:11:"Y-m-d H:i:s";s:11:"defaulttype";s:1:"0";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 10, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(20, 1, 'content', '内容', '<style type="text/css">.content_attr{ border:1px solid #CCC; padding:5px 8px; background:#FFC; margin-top:6px}</style><div class="content_attr"><label><input name="add_introduce" type="checkbox"  value="1" checked>是否截取内容</label><input type="text" name="introcude_length" value="200" size="3">字符至内容摘要\n<label><input type=''checkbox'' name=''auto_thumb'' value="1" checked>是否获取内容第</label><input type="text" name="auto_thumb_no" value="1" size="2" class="">张图片作为标题图片\n</div>', '', 1, 999999, '', '内容不能为空', 'editor', 'a:7:{s:7:"toolbar";s:4:"full";s:12:"defaultvalue";s:0:"";s:15:"enablesaveimage";s:1:"1";s:6:"height";s:0:"";s:9:"fieldtype";s:10:"mediumtext";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 0, 0, 1, 0, 1, 1, 0, 6, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(21, 1, 'copyfrom', '来源', '', '', 0, 0, '', '', 'copyfrom', 'a:4:{s:12:"defaultvalue";s:0:"";s:5:"width";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 0, 0, 1, 0, 1, 0, 0, 5, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(26, 2, 'username', '用户名', '', '', 0, 20, '', '', 'text', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 16, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(27, 2, 'islink', '转向链接', '', '', 0, 0, '', '', 'islink', '', '', '', '', 0, 1, 0, 0, 0, 1, 0, 0, 17, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(28, 2, 'template', '内容页模板', '', '', 0, 30, '', '', 'template', 'a:2:{s:4:"size";s:0:"";s:12:"defaultvalue";s:0:"";}', '', '-99', '-99', 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(29, 2, 'allow_comment', '允许评论', '', '', 0, 0, '', '', 'box', 'a:9:{s:7:"options";s:33:"允许评论|1\r\n不允许评论|0";s:7:"boxtype";s:5:"radio";s:9:"fieldtype";s:7:"tinyint";s:9:"minnumber";s:1:"1";s:5:"width";s:2:"88";s:4:"size";s:0:"";s:12:"defaultvalue";s:1:"1";s:10:"outputtype";s:1:"1";s:10:"filtertype";s:1:"0";}', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 14, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(24, 1, 'prefix', '自定义文件名', '', '', 0, 255, '', '', 'text', 'a:5:{s:4:"size";s:3:"180";s:12:"defaultvalue";s:0:"";s:10:"ispassword";s:1:"0";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 17, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(66, 3, 'prefix', '自定义文件名', '', '', 0, 0, '', '', 'text', 'a:7:{s:4:"size";s:2:"50";s:12:"defaultvalue";s:0:"";s:10:"ispassword";s:1:"0";s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 8, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(25, 2, 'status', '状态', '', '', 0, 2, '', '', 'box', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 15, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(65, 2, 'prefix', '自定义文件名', '', '', 0, 0, '', '', 'text', 'a:7:{s:4:"size";s:3:"180";s:12:"defaultvalue";s:0:"";s:10:"ispassword";s:1:"0";s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 17, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(31, 2, 'inputtime', '真实发布时间', '', '', 0, 0, '', '', 'datetime', 'a:3:{s:9:"fieldtype";s:3:"int";s:6:"format";s:11:"Y-m-d H:i:s";s:11:"defaulttype";s:1:"0";}', '', '', '', 1, 1, 0, 0, 0, 0, 0, 1, 11, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(32, 2, 'posid', '推荐位', '', '', 0, 0, '', '', 'posid', 'a:4:{s:5:"width";s:3:"125";s:12:"defaultvalue";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 1, 11, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(33, 2, 'url', 'URL', '', '', 0, 100, '', '', 'text', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 1, 12, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(34, 2, 'listorder', '排序', '', '', 0, 6, '', '', 'number', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 18, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(35, 2, 'relation', '相关下载', '', '', 0, 255, '', '', 'omnipotent', 'a:4:{s:8:"formtext";s:464:"<input type="hidden" name="info[relation]" id="relation" value="{FIELD_VALUE}" style="50" >\n<ul class="list-dot" id="relation_text">\n</ul>\n<input type="button" value="添加相关" onClick="omnipotent(''selectid'',GV.DIMAUB+''index.php?a=public_relationlist&m=Content&g=Content&modelid={MODELID}'',''添加相关信息'',1)" class="btn">\n<span class="edit_content">\n  <input type="button" value="显示已有" onClick="show_relation({MODELID},{ID})" class="btn">\n</span>";s:9:"fieldtype";s:7:"varchar";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 0, 0, 0, 0, 0, 1, 0, 8, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(36, 2, 'thumb', '缩略图', '', '', 0, 100, '', '', 'image', 'a:9:{s:4:"size";s:2:"50";s:12:"defaultvalue";s:0:"";s:9:"show_type";s:1:"1";s:14:"upload_maxsize";s:4:"1024";s:15:"upload_allowext";s:20:"jpg|jpeg|gif|png|bmp";s:9:"watermark";s:1:"0";s:13:"isselectimage";s:1:"1";s:12:"images_width";s:0:"";s:13:"images_height";s:0:"";}', '', '', '', 0, 1, 0, 0, 0, 1, 0, 1, 7, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(37, 2, 'catid', '栏目', '', '', 1, 6, '/^[0-9]{1,6}$/', '请选择栏目', 'catid', 'a:1:{s:12:"defaultvalue";s:0:"";}', '', '-99', '-99', 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(38, 2, 'typeid', '类别', '', '', 0, 0, '', '', 'typeid', 'a:2:{s:9:"minnumber";s:0:"";s:12:"defaultvalue";s:0:"";}', '', '', '', 1, 1, 0, 1, 1, 1, 0, 0, 2, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(39, 2, 'title', '标题', '', 'inputtitle', 1, 80, '', '请输入标题', 'title', '', '', '', '', 0, 1, 0, 1, 1, 1, 1, 1, 3, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(40, 2, 'keywords', '关键词', '多关键词之间用空格隔开', '', 0, 40, '', '', 'keyword', 'a:2:{s:4:"size";s:3:"100";s:12:"defaultvalue";s:0:"";}', '', '-99', '-99', 0, 1, 0, 1, 1, 1, 1, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(41, 2, 'tags', 'TAGS', '多关之间用空格或者“,”隔开', '', 0, 0, '', '', 'tags', 'a:4:{s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(42, 2, 'description', '摘要', '', '', 0, 255, '', '', 'textarea', 'a:4:{s:5:"width";s:2:"98";s:6:"height";s:2:"46";s:12:"defaultvalue";s:0:"";s:10:"enablehtml";s:1:"0";}', '', '', '', 0, 1, 0, 1, 0, 1, 1, 1, 5, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(43, 2, 'updatetime', '发布时间', '', '', 0, 0, '', '', 'datetime', 'a:3:{s:9:"fieldtype";s:3:"int";s:6:"format";s:11:"Y-m-d H:i:s";s:11:"defaulttype";s:1:"0";}', '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 10, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(45, 3, 'status', '状态', '', '', 0, 2, '', '', 'box', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 15, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(46, 3, 'username', '用户名', '', '', 0, 20, '', '', 'text', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 16, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(47, 3, 'islink', '转向链接', '', '', 0, 0, '', '', 'islink', '', '', '', '', 0, 1, 0, 0, 0, 1, 0, 0, 17, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(48, 3, 'template', '内容页模板', '', '', 0, 30, '', '', 'template', 'a:2:{s:4:"size";s:0:"";s:12:"defaultvalue";s:0:"";}', '', '-99', '-99', 0, 0, 0, 0, 0, 0, 0, 0, 13, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(49, 3, 'allow_comment', '允许评论', '', '', 0, 0, '', '', 'box', 'a:9:{s:7:"options";s:33:"允许评论|1\r\n不允许评论|0";s:7:"boxtype";s:5:"radio";s:9:"fieldtype";s:7:"tinyint";s:9:"minnumber";s:1:"1";s:5:"width";s:2:"88";s:4:"size";s:0:"";s:12:"defaultvalue";s:1:"1";s:10:"outputtype";s:1:"1";s:10:"filtertype";s:1:"0";}', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 14, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(67, 2, 'download', '文件下载', '', '', 0, 0, '', '', 'downfiles', 'a:9:{s:15:"upload_allowext";s:20:"gif|jpg|jpeg|png|bmp";s:13:"isselectimage";s:1:"0";s:13:"upload_number";s:2:"10";s:10:"statistics";s:0:"";s:12:"downloadlink";s:1:"1";s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 0, 0, 1, 0, 1, 0, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(51, 3, 'inputtime', '真实发布时间', '', '', 0, 0, '', '', 'datetime', 'a:3:{s:9:"fieldtype";s:3:"int";s:6:"format";s:11:"Y-m-d H:i:s";s:11:"defaulttype";s:1:"0";}', '', '', '', 1, 1, 0, 0, 0, 0, 0, 1, 11, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(52, 3, 'posid', '推荐位', '', '', 0, 0, '', '', 'posid', 'a:4:{s:5:"width";s:3:"125";s:12:"defaultvalue";s:0:"";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 1, 11, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(53, 3, 'url', 'URL', '', '', 0, 100, '', '', 'text', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 1, 12, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(54, 3, 'listorder', '排序', '', '', 0, 6, '', '', 'number', '', '', '', '', 1, 1, 0, 1, 0, 0, 0, 0, 18, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(55, 3, 'relation', '相关图片', '', '', 0, 255, '', '', 'omnipotent', 'a:4:{s:8:"formtext";s:464:"<input type="hidden" name="info[relation]" id="relation" value="{FIELD_VALUE}" style="50" >\n<ul class="list-dot" id="relation_text">\n</ul>\n<input type="button" value="添加相关" onClick="omnipotent(''selectid'',GV.DIMAUB+''index.php?a=public_relationlist&m=Content&g=Content&modelid={MODELID}'',''添加相关信息'',1)" class="btn">\n<span class="edit_content">\n  <input type="button" value="显示已有" onClick="show_relation({MODELID},{ID})" class="btn">\n</span>";s:9:"fieldtype";s:7:"varchar";s:12:"backstagefun";s:0:"";s:8:"frontfun";s:0:"";}', '', '', '', 0, 0, 0, 0, 0, 0, 1, 0, 8, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(56, 3, 'thumb', '缩略图', '', '', 0, 100, '', '', 'image', 'a:9:{s:4:"size";s:2:"50";s:12:"defaultvalue";s:0:"";s:9:"show_type";s:1:"1";s:14:"upload_maxsize";s:4:"1024";s:15:"upload_allowext";s:20:"jpg|jpeg|gif|png|bmp";s:9:"watermark";s:1:"0";s:13:"isselectimage";s:1:"1";s:12:"images_width";s:0:"";s:13:"images_height";s:0:"";}', '', '', '', 0, 1, 0, 0, 0, 1, 0, 1, 7, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(57, 3, 'catid', '栏目', '', '', 1, 6, '/^[0-9]{1,6}$/', '请选择栏目', 'catid', 'a:1:{s:12:"defaultvalue";s:0:"";}', '', '-99', '-99', 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(59, 3, 'title', '标题', '', 'inputtitle', 1, 80, '', '请输入标题', 'title', '', '', '', '', 0, 1, 0, 1, 1, 1, 1, 1, 3, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(60, 3, 'keywords', '关键词', '多关键词之间用空格隔开', '', 0, 40, '', '', 'keyword', 'a:2:{s:4:"size";s:3:"100";s:12:"defaultvalue";s:0:"";}', '', '-99', '-99', 0, 1, 0, 1, 1, 1, 1, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(61, 3, 'tags', 'TAGS', '多关之间用空格或者“,”隔开', '', 0, 0, '', '', 'tags', 'a:4:{s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 0, 4, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(62, 3, 'description', '摘要', '', '', 0, 255, '', '', 'textarea', 'a:4:{s:5:"width";s:2:"98";s:6:"height";s:2:"46";s:12:"defaultvalue";s:0:"";s:10:"enablehtml";s:1:"0";}', '', '', '', 0, 1, 0, 1, 0, 1, 1, 1, 5, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(63, 3, 'updatetime', '发布时间', '', '', 0, 0, '', '', 'datetime', 'a:3:{s:9:"fieldtype";s:3:"int";s:6:"format";s:11:"Y-m-d H:i:s";s:11:"defaulttype";s:1:"0";}', '', '', '', 0, 1, 0, 0, 0, 0, 0, 0, 10, 0, 0);
INSERT INTO `minmore_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(68, 3, 'imgs', '图片列表', '', '', 0, 0, '', '', 'images', 'a:8:{s:15:"upload_allowext";s:20:"gif|jpg|jpeg|png|bmp";s:13:"isselectimage";s:1:"0";s:13:"upload_number";s:2:"10";s:9:"watermark";s:1:"0";s:12:"backstagefun";s:0:"";s:17:"backstagefun_type";s:1:"1";s:8:"frontfun";s:0:"";s:13:"frontfun_type";s:1:"1";}', '', '', '', 0, 0, 0, 1, 0, 1, 0, 0, 8, 0, 0);

--
-- 插入之前先把表清空（truncate） `minmore_module`
--

TRUNCATE TABLE `minmore_module`;
--
-- 转存表中的数据 `minmore_module`
--

INSERT INTO `minmore_module` (`module`, `modulename`, `sign`, `iscore`, `disabled`, `version`, `setting`, `installtime`, `updatetime`, `listorder`) VALUES('Collection', '采集', 'b4986c69efbd24886ca3bcb6c3b3dab8', 0, 1, '1.0.0', '', 1464752990, 1464752990, 0);
INSERT INTO `minmore_module` (`module`, `modulename`, `sign`, `iscore`, `disabled`, `version`, `setting`, `installtime`, `updatetime`, `listorder`) VALUES('Addons', '插件管理', '912b7e22bd9d86dddb1d460ca90581eb', 0, 1, '1.1.3', '', 1464769188, 1464769188, 0);
INSERT INTO `minmore_module` (`module`, `modulename`, `sign`, `iscore`, `disabled`, `version`, `setting`, `installtime`, `updatetime`, `listorder`) VALUES('Search', '搜索', '2e01dfe1d6be7e454aea66c442639b7e', 0, 1, '1.0.2', 'a:9:{s:7:"modelid";a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}s:13:"relationenble";s:1:"1";s:7:"segment";s:1:"1";s:9:"dzsegment";s:1:"0";s:8:"pagesize";s:2:"10";s:9:"cachetime";s:1:"0";s:12:"sphinxenable";s:1:"0";s:10:"sphinxhost";s:0:"";s:10:"sphinxport";s:0:"";}', 1464769944, 1464769944, 0);
INSERT INTO `minmore_module` (`module`, `modulename`, `sign`, `iscore`, `disabled`, `version`, `setting`, `installtime`, `updatetime`, `listorder`) VALUES('Member', '会员中心', '05f78872791fe1847815f5a192aa6dce', 0, 1, '1.0.2', 'a:29:{s:9:"interface";s:5:"Local";s:13:"allowregister";s:1:"1";s:11:"choosemodel";s:1:"0";s:15:"enablemailcheck";s:1:"0";s:14:"registerverify";s:1:"0";s:12:"showapppoint";s:1:"1";s:14:"rmb_point_rate";s:1:"1";s:12:"defualtpoint";s:1:"0";s:13:"defualtamount";s:1:"0";s:15:"showregprotocol";s:1:"1";s:16:"openverification";s:1:"1";s:11:"regprotocol";s:1739:"欢迎您注册成为MinMoreCMS用户,请仔细阅读下面的协议，只有接受协议才能继续进行注册。\n      1)从中国境内向外传输技术性资料时必须符合中国有关法规。 \n　　2)使用网站服务不作非法用途。 \n　　3)不干扰或混乱网络服务。 \n　　4)不在论坛BBS或留言簿发表任何与政治相关的信息。 \n　　5)遵守所有使用网站服务的网络协议、规定、程序和惯例。\n　　6)不得利用本站危害国家安全、泄露国家秘密，不得侵犯国家社会集体的和公民的合法权益。\n　　7)不得利用本站制作、复制和传播下列信息： \n　　　1、煽动抗拒、破坏宪法和法律、行政法规实施的；\n　　　2、煽动颠覆国家政权，推翻社会主义制度的；\n　　　3、煽动分裂国家、破坏国家统一的；\n　　　4、煽动民族仇恨、民族歧视，破坏民族团结的；\n　　　5、捏造或者歪曲事实，散布谣言，扰乱社会秩序的；\n　　　6、宣扬封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；\n　　　7、公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；\n　　　8、损害国家机关信誉的；\n　　　9、其他违反宪法和法律行政法规的；\n　　　10、进行商业广告行为的。\n　　用户不能传输任何教唆他人构成犯罪行为的资料；不能传输长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法律和国际法 律的资料。未经许可而非法进入其它电脑系统是禁止的。若用户的行为不符合以上的条款，MinMoreCMS将取消用户服务帐号。 ";s:21:"registerverifymessage";s:308:"Hi，{$username}:\n\n欢迎您注册成为MinMoreCMS用户，您的账号需要邮箱认证，点击下面链接进行认证：\n\n<a href="{$url}" target="_blank">{$url}</a>\n\n如果链接无法点击，请完整拷贝到浏览器地址栏里直接访问。\n\n邮件服务器自动发送邮件请勿回信 {$date}";s:14:"forgetpassword";s:315:"Hi，{$username}:\n\n你申请了重设密码，请在24小时内点击下面的链接，然后根据页面提示完成密码重设：\n\n<a href="{$url}" target="_blank">{$url}</a>\n\n如果链接无法点击，请完整拷贝到浏览器地址栏里直接访问。\n\n邮件服务器自动发送邮件请勿回信 {$date}";s:10:"uc_connect";s:0:"";s:6:"uc_api";s:0:"";s:5:"uc_ip";s:0:"";s:9:"uc_dbhost";s:0:"";s:9:"uc_dbuser";s:0:"";s:7:"uc_dbpw";s:0:"";s:9:"uc_dbname";s:0:"";s:13:"uc_dbtablepre";s:0:"";s:12:"uc_dbcharset";s:0:"";s:8:"uc_appid";s:0:"";s:6:"uc_key";s:0:"";s:11:"sinawb_akey";s:0:"";s:11:"sinawb_skey";s:0:"";s:7:"qq_akey";s:0:"";s:7:"qq_skey";s:0:"";}', 1464858260, 1464858260, 0);

--
-- 插入之前先把表清空（truncate） `minmore_operationlog`
--

TRUNCATE TABLE `minmore_operationlog`;

--
-- 插入之前先把表清空（truncate） `minmore_page`
--

TRUNCATE TABLE `minmore_page`;
--
-- 插入之前先把表清空（truncate） `minmore_photo`
--

TRUNCATE TABLE `minmore_photo`;

--
-- 插入之前先把表清空（truncate） `minmore_photo_data`
--

TRUNCATE TABLE `minmore_photo_data`;

--
-- 插入之前先把表清空（truncate） `minmore_position`
--

TRUNCATE TABLE `minmore_position`;
--
-- 转存表中的数据 `minmore_position`
--

INSERT INTO `minmore_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(1, '0', '0', '首页幻灯片', 10, '', 0);
INSERT INTO `minmore_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(2, '0', '0', '首页文字头条', 10, '', 0);
INSERT INTO `minmore_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(3, '0', '0', '首页推荐', 10, '', 0);

--
-- 插入之前先把表清空（truncate） `minmore_position_data`
--

TRUNCATE TABLE `minmore_position_data`;

--
-- 插入之前先把表清空（truncate） `minmore_role`
--

TRUNCATE TABLE `minmore_role`;
--
-- 转存表中的数据 `minmore_role`
--

INSERT INTO `minmore_role` (`id`, `name`, `parentid`, `status`, `domain`, `theme`, `level`, `remark`, `create_time`, `update_time`, `listorder`) VALUES(1, '超级管理员', 0, 1, NULL, '', NULL, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0);
INSERT INTO `minmore_role` (`id`, `name`, `parentid`, `status`, `domain`, `theme`, `level`, `remark`, `create_time`, `update_time`, `listorder`) VALUES(2, '站点分级角色[禁止修改]', 1, 1, NULL, '', '', '站点分级角色统一父级', 1464517511, 1464572353, 0);

--
-- 插入之前先把表清空（truncate） `minmore_role_level`
--

TRUNCATE TABLE `minmore_role_level`;
--
-- 转存表中的数据 `minmore_role_level`
--

INSERT INTO `minmore_role_level` (`id`, `name`, `template_prefix`, `listorder`, `update_time`) VALUES(1, '市级', 'L1_', 0, '2016-05-29 11:27:43');
INSERT INTO `minmore_role_level` (`id`, `name`, `template_prefix`, `listorder`, `update_time`) VALUES(2, '区县', 'L2_', 1, '2016-05-29 11:27:43');
INSERT INTO `minmore_role_level` (`id`, `name`, `template_prefix`, `listorder`, `update_time`) VALUES(3, '派出所', 'L3_', 2, '2016-05-29 11:28:14');
INSERT INTO `minmore_role_level` (`id`, `name`, `template_prefix`, `listorder`, `update_time`) VALUES(4, '社区警务室', 'L4_', 3, '2016-05-29 11:28:14');

--
-- 插入之前先把表清空（truncate） `minmore_search`
--

TRUNCATE TABLE `minmore_search`;

--
-- 插入之前先把表清空（truncate） `minmore_search_keyword`
--

TRUNCATE TABLE `minmore_search_keyword`;
--
-- 插入之前先把表清空（truncate） `minmore_tags`
--

TRUNCATE TABLE `minmore_tags`;
--
-- 插入之前先把表清空（truncate） `minmore_tags_content`
--

TRUNCATE TABLE `minmore_tags_content`;
--
-- 插入之前先把表清空（truncate） `minmore_terms`
--

TRUNCATE TABLE `minmore_terms`;
--
-- 插入之前先把表清空（truncate） `minmore_urlrule`
--

TRUNCATE TABLE `minmore_urlrule`;
--
-- 转存表中的数据 `minmore_urlrule`
--

INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(1, 'content', 'category', 0, 'index.php?a=lists&catid={$catid}|index.php?a=lists&catid={$catid}&page={$page}', '动态：index.php?a=lists&catid=1&page=1');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(2, 'content', 'category', 1, '{$categorydir}{$catdir}/index.shtml|{$categorydir}{$catdir}/index_{$page}.shtml', '静态：news/china/1000.shtml');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(3, 'content', 'show', 1, '{$year}/{$catdir}_{$month}/{$id}.shtml|{$year}/{$catdir}_{$month}/{$id}_{$page}.shtml', '静态：2010/catdir_07/1_2.shtml');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(4, 'content', 'show', 0, 'index.php?a=shows&catid={$catid}&id={$id}|index.php?a=shows&catid={$catid}&id={$id}&page={$page}', '动态：index.php?m=Index&a=shows&catid=1&id=1');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(5, 'content', 'category', 1, 'news/{$catid}.shtml|news/{$catid}-{$page}.shtml', '静态：news/1.shtml');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(6, 'content', 'category', 0, 'list-{$catid}.html|list-{$catid}-{$page}.html', '伪静态：list-1-1.html');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(7, 'content', 'tags', 0, 'index.php?a=tags&amp;tagid={$tagid}|index.php?a=tags&amp;tagid={$tagid}&amp;page={$page}', '动态：index.php?a=tags&amp;tagid=1');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(8, 'content', 'tags', 0, 'index.php?a=tags&amp;tag={$tag}|/index.php?a=tags&amp;tag={$tag}&amp;page={$page}', '动态：index.php?a=tags&amp;tag=标签');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(9, 'content', 'tags', 0, 'tag-{$tag}.html|tag-{$tag}-{$page}.html', '伪静态：tag-标签.html');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(10, 'content', 'tags', 0, 'tag-{$tagid}.html|tag-{$tagid}-{$page}.html', '伪静态：tag-1.html');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(11, 'content', 'index', 1, 'index.html|index_{$page}.html', '静态：index_2.html');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(12, 'content', 'index', 0, 'index.html|index_{$page}.html', '伪静态：index_2.html');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(13, 'content', 'index', 0, 'index.php|index.php?page={$page}', '动态：index.php?page=2');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(14, 'content', 'category', 1, 'download.shtml|download_{$page}.shtml', '静态：download.shtml');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(15, 'content', 'show', 1, '{$categorydir}{$id}.shtml|{$categorydir}{$id}_{$page}.shtml', '静态：/父栏目/1.shtml');
INSERT INTO `minmore_urlrule` (`urlruleid`, `module`, `file`, `ishtml`, `urlrule`, `example`) VALUES(16, 'content', 'show', 1, '{$catdir}/{$id}.shtml|{$catdir}/{$id}_{$page}.shtml', '示例：/栏目/1.html');

--
-- 插入之前先把表清空（truncate） `minmore_user`
--

TRUNCATE TABLE `minmore_user`;
--
-- 转存表中的数据 `minmore_user`
--

INSERT INTO `minmore_user` (`id`, `username`, `nickname`, `password`, `bind_account`, `last_login_time`, `last_login_ip`, `verify`, `email`, `remark`, `create_time`, `update_time`, `status`, `role_id`, `info`) VALUES(1, 'admin', '太原小众科技', '72e7b2cf0de866b9cd9bf481f432c733', '', 1464858198, '183.185.214.69', 'fZR5m5', 'codevvip@yeah.net', '太原小众科技 - MinMoreCMS', 1463906689, 1463906689, 1, 1, '');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
