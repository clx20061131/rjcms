-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-13 11:18:04
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rjcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `rj_admin`
--

CREATE TABLE IF NOT EXISTS `rj_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `unick` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '昵称',
  `upass` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  `roleid` tinyint(4) DEFAULT NULL COMMENT '角色id',
  `last_login_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '上次登录ip',
  `total_login_num` int(11) DEFAULT '0' COMMENT '总共登录次数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(4) DEFAULT '1' COMMENT '0-禁止 1-开放',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `rj_admin`
--

INSERT INTO `rj_admin` (`id`, `uname`, `unick`, `upass`, `roleid`, `last_login_time`, `last_login_ip`, `total_login_num`, `create_time`, `status`) VALUES
(1, 'admin', '超级管理员', '21232f297a57a5a743894a0e4a801fc3', 1, 1428715241, '127.0.0.1', 29, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `rj_admin_role`
--

CREATE TABLE IF NOT EXISTS `rj_admin_role` (
  `role_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '角色名字',
  `role_power` text COLLATE utf8_bin COMMENT '权利',
  `disabled` enum('0','1') COLLATE utf8_bin DEFAULT '0' COMMENT '是否可用 0-可用 1 -不可用',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `rj_admin_rule`
--

CREATE TABLE IF NOT EXISTS `rj_admin_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titile` varchar(50) COLLATE utf8_bin NOT NULL,
  `way` varchar(125) COLLATE utf8_bin NOT NULL COMMENT '方法',
  `disabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='权限表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `rj_ads`
--

CREATE TABLE IF NOT EXISTS `rj_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `short_info` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '简介',
  `sort_id` tinyint(4) DEFAULT NULL COMMENT '类别id',
  `link` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '连接',
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '图片',
  `listorder` int(10) unsigned DEFAULT '0' COMMENT '序列号',
  `usable` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1- 可用 2- 不可用',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `rj_ads`
--

INSERT INTO `rj_ads` (`id`, `title`, `short_info`, `sort_id`, `link`, `image`, `listorder`, `usable`, `update_time`, `create_time`) VALUES
(1, '百度', '百度公司', 4, 'http://baidu.com', '/rjcms/static/Public/plugins/kindeditor-4.1.10/attached/image/20150407/20150407101820_16547.png', 3, 1, NULL, NULL),
(2, '新浪网', '', 4, 'http://sina.com.cn', '/rjcms/static/Public/plugins/kindeditor-4.1.10/attached/image/20150407/20150407102508_15122.png', 4, 1, NULL, NULL),
(3, '58同城', '55', 4, 'http://58.com', '/rjcms/static/Public/plugins/kindeditor-4.1.10/attached/image/20150407/20150407103503_16616.png', 1, 1, NULL, NULL),
(4, '赶集网', 'eeee', 3, 'http://ganji.com', '/rjcms/static/Public/plugins/kindeditor-4.1.10/attached/image/20150407/20150407103753_43700.png', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rj_artic`
--

CREATE TABLE IF NOT EXISTS `rj_artic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL COMMENT '栏目id',
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varbinary(255) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `link` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '外链地址',
  `create_time` int(10) unsigned DEFAULT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0-关闭 1-普通 2-推荐',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `rj_artic`
--

INSERT INTO `rj_artic` (`id`, `catid`, `title`, `keywords`, `description`, `image`, `content`, `link`, `create_time`, `update_time`, `status`, `views`, `listorder`) VALUES
(1, 2, '美太平洋舰队司令：中国用挖掘机在南海建长城', '长城', '中国用挖掘机在南海建长城', '/rjcms/static/Public/plugins/kindeditor-4.1.10/attached/image/20150411/20150411044102_66156.jpg', '　在拉特基表态前，<strong>美国太平洋舰队司令哈里斯公开批评中国“用挖掘机和推土机在南海建‘沙土长城’”“增加地区紧张和导致误判的可能”。</strong>美\r\n防长卡特访日时刚刚称美国反对用胁迫方式改变南海现状，并“坚决反对军事化”。10日，他又在首尔暗批中国，称不用多边外交手段解决南海争端容易“没朋\r\n友”，而美国不用军事手段解决问题，在该地区朋友就多。《纽约时报》称，卡特用词比哈里斯更外交些，但意思一致——敦促北京停工。\r\n<p>\r\n	南海会成为近期中美对抗的中心舞台吗？这似乎要看华盛顿能否戒掉“防范中国”的心魔。“华盛顿-马尼拉”双簧改变不了什么，顶多是让“南海争锋”这部剧多了“假仗义”和“装委屈”这两个角色。\r\n</p>\r\n<p>\r\n	10日，中国外交部新闻发布厅，发言人华春莹穿着比前一天颜色鲜艳了不少的紫色外套出现在媒体镜头前。但她所要表态的第一个话题与24小时前完全一致——南海。\r\n</p>\r\n<p>\r\n	时间向前推几小时。金斯敦当地时间9日，作为肯尼迪后首个访问牙买加的美国总统，奥巴马在当地做了一次演讲，话题却直指中国。他在回答有关南海\r\n问题的提问时称，“我们担心的是，中国未必会遵守国际规范和规则，并利用其绝对的块头和肌肉迫使其他国家屈服”。他还说，“我们认为此事可以通过外交方式\r\n解决，菲律宾和越南并非像中国那样大，但这不意味着他们就可以被人挤到一边”。\r\n</p>', '', 1428720311, 1428722364, 1, 0, 2),
(2, 9, '电影娱乐新闻', '电影娱乐新闻', '电影娱乐新闻', '/rjcms/static/Public/plugins/kindeditor-4.1.10/attached/image/20150413/20150413031110_79834.jpg', '电影娱乐新闻电影娱乐新闻', '', 1428887472, 1428887472, 1, 0, 2),
(3, 4, '我是美国新闻', '我是美国新闻', '我是美国新闻', '', '我是美国新闻', '', 1428889742, 1428889742, 2, 0, 1),
(5, 9, '娱乐新闻2', '娱乐新闻2', '娱乐新闻2', '', '娱乐新闻2', '', 1428902120, 1428902120, 1, 0, 4),
(6, 9, '娱乐新问3', '娱乐新问3', '娱乐新问3', '', '娱乐新问3', '', 1428902236, 1428902236, 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `rj_category`
--

CREATE TABLE IF NOT EXISTS `rj_category` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(125) COLLATE utf8_bin NOT NULL COMMENT '栏目名称',
  `pid` int(11) NOT NULL COMMENT '父id',
  `sort_id` int(11) DEFAULT NULL COMMENT '类别id',
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '图片',
  `description` varchar(1024) COLLATE utf8_bin DEFAULT NULL COMMENT '描述',
  `seting` varchar(1024) COLLATE utf8_bin DEFAULT NULL COMMENT '设置',
  `listorder` int(10) unsigned DEFAULT NULL COMMENT '排序',
  `keywords` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '栏目连接key',
  `mid` tinyint(4) DEFAULT NULL COMMENT '模型id',
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `rj_category`
--

INSERT INTO `rj_category` (`catid`, `catname`, `pid`, `sort_id`, `image`, `description`, `seting`, `listorder`, `keywords`, `mid`) VALUES
(1, '新闻中心', 0, 1, '', '', NULL, 2, 'news', 2),
(2, '军事新闻', 1, 1, '', '', NULL, 1, 'news/junshi', 2),
(5, '国际新闻', 1, 1, '', '', NULL, 2, 'news/guoji', 2),
(4, '美国新闻', 5, 1, '', '', NULL, 3, 'news/meiguo', 2),
(8, '娱乐新闻', 1, NULL, '', '娱乐新闻娱乐新闻娱乐新闻娱乐新闻娱乐新闻娱乐新闻', NULL, 6, 'news/star', 2),
(9, '电影娱乐', 8, NULL, '', '电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐', NULL, 7, 'news/happy', 2),
(10, '关于我们', 0, NULL, '', '', NULL, 8, 'about', 1);

-- --------------------------------------------------------

--
-- 表的结构 `rj_menue`
--

CREATE TABLE IF NOT EXISTS `rj_menue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `modul_action` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '模型-控制器',
  `parame` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '参数',
  `disabled` tinyint(4) DEFAULT '0' COMMENT '是否可用',
  `level` tinyint(4) DEFAULT NULL COMMENT '等级',
  `listorder` int(10) unsigned DEFAULT NULL COMMENT '排序',
  `parent_ids` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '父级id序列',
  `sub_ids` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '子级id集合',
  `parent` int(11) DEFAULT NULL COMMENT '父级id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `rj_menue`
--

INSERT INTO `rj_menue` (`id`, `title`, `modul_action`, `parame`, `disabled`, `level`, `listorder`, `parent_ids`, `sub_ids`, `parent`) VALUES
(1, '首页', 'Index/index', NULL, 0, 1, 1, '1', '0', 0),
(2, '内容管理', 'Content/index', NULL, 0, 1, 2, '2', '0', 0),
(3, '个人中心', NULL, NULL, 0, 2, 1, '1', '1', 1),
(4, '编辑昵称', 'Index/edit_nick', NULL, 0, 3, 1, '1,3', NULL, 3),
(5, '修改密码', 'Index/edit_pass', '123?12323', 0, 3, 2, '1,3', NULL, 3),
(6, '模块', 'Modules/index', NULL, 0, 1, 4, '6', NULL, 0),
(7, '开发者', 'Developer/index', NULL, 0, 1, 4, '7', '0', 0),
(8, '菜单/权限', '', '', 0, 2, 1, '7', NULL, 7),
(9, '菜单列表', 'Menue/lis', NULL, 0, 3, 1, '7,8', NULL, 8),
(13, '权限管理', 'Rule/lis', '', 0, 3, 2, '7,8', NULL, 8),
(14, '内容管理', '', '', 0, 2, 1, '2', NULL, 2),
(15, '内容列表', 'Content/lis', '', 0, 3, 2, '2,14', NULL, 14),
(26, '网站设置', '', '', 0, 2, 15, '25', NULL, 25),
(27, 'SEO优化', 'Index/web_seo', '', 0, 3, 16, '25,26', NULL, 26),
(18, '广告管理', '', '', 0, 2, 7, '2', NULL, 2),
(23, '栏目管理', 'Category/lis', '', 0, 3, 12, '7,22', NULL, 22),
(22, '栏目/类别', '', '', 0, 2, 11, '7', NULL, 7),
(21, '广告列表', 'Ads/lis', '', 0, 3, 10, '2,18', NULL, 18),
(24, '类别管理', 'Sort/lis', '', 0, 3, 13, '7,22', NULL, 22),
(25, '设置', 'Setting/index', '', 0, 1, 3, '25', NULL, 0),
(28, '模块管理', 'Model/lis', '', 0, 3, 17, '7,22', NULL, 22);

-- --------------------------------------------------------

--
-- 表的结构 `rj_model`
--

CREATE TABLE IF NOT EXISTS `rj_model` (
  `mid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '名称',
  `mtable` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '模型表',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `rj_model`
--

INSERT INTO `rj_model` (`mid`, `title`, `mtable`) VALUES
(1, '单页面', 'page'),
(2, '文章模型', 'artic');

-- --------------------------------------------------------

--
-- 表的结构 `rj_page`
--

CREATE TABLE IF NOT EXISTS `rj_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `create_time` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-隐藏 1-正常 2-推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `rj_page`
--

INSERT INTO `rj_page` (`id`, `title`, `keywords`, `description`, `catid`, `content`, `create_time`, `update_time`, `listorder`, `status`) VALUES
(1, '关于我们', 'about us', '关于我们', 10, '<table class="ke-zeroborder" border="0" cellpadding="0" cellspacing="0" width="689">\r\n	<tbody>\r\n		<tr>\r\n			<td bgcolor="#e3e6f5" height="12">\r\n				<p>\r\n					<b>新浪网客户服务</b> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="121">\r\n				<p>\r\n					受理新浪网客户问题，包括产品咨询、技术支持、投诉受理、建议反馈，以及购买帮助等。<br />\r\n客户服务热线:<b><span>4006900000</span></b><br />\r\nEMAIL:<a href="mailto:sinacsc@vip.sina.com">sinacsc@vip.sina.com</a><br />\r\n微博官方账号请@<a href="http://weibo.com/cscd" target="_blank">新浪客服</a><br />\r\n各产品详情请<a href="http://help.sina.com.cn/index.php?s=contactus&a=view&id=25" target="_blank">联系客服</a>。\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor="#e3e6f5">\r\n				<p>\r\n					<b>新浪网广告销售</b> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="121">\r\n				<p>\r\n					广告销售部<br />\r\n新浪广告官方服务微博：@新浪广告 <a href="http://weibo.com/sinaemarketing" target="_blank">http://weibo.com/sinaemarketing</a><br />\r\n广告产品介绍请查看：<a href="http://emarketing.sina.com.cn" target="_blank">http://emarketing.sina.com.cn </a><br />\r\n新浪品牌广告及效果广告产品购买，请咨询新浪广告热线：<span><b>4008812813</b></span><br />\r\n新浪商业运营客户服务官方微博：@微博广告-渠道 <a href="http://weibo.com/wbguanggao" target="_blank">http://weibo.com/wbguanggao</a><br />\r\n效果广告产品介绍请查看： <a href="http://e.sina.com.cn/" target="_blank">http://e.sina.com.cn/</a> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor="#e3e6f5">\r\n				<b>新浪网新闻热线</b> \r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="96">\r\n				<p>\r\n					给新浪网提供新闻线索,重大新闻爆料<br />\r\n<a href="http://www.sina.com.cn/2008/agreement.html">自由撰稿稿件采购协议书</a> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor="#e3e6f5">\r\n				<b>新浪网各频道合作及分类</b> \r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="963">\r\n				<br />\r\n<span>内容报道合作</span>—欢迎各类媒体、影视剧公司、制作公司、专业网站、出版社、协会等与我们联系，在各类文字、图片、音视频资讯等方面建立长期合作。<br />\r\n<span>活动合作</span>—欢迎各方与新浪网洽谈推广会议、论坛、演唱会、大奖赛、巡展或体育赛事等各类活动。通过新浪的报道推广，扩大相关活动的影响力。<br />\r\nTel：(86-10)82628888 转 6420\r\n            媒体拓展部<br />\r\nFax：(86-10)62522426 <br />\r\nEmail：<a href="mailto:sinamedia@vip.sina.com">sinamedia@vip.sina.com</a><br />\r\n<span>出版合作</span>—欢迎各大出版社与新浪合作各类图书内容。<br />\r\nTel：(86-10)52719403<br />\r\nIdeal \r\n            Plaza, 19F, 58 Bei si huan xi Road, Haidian District, Beijing \r\n            100080, China<br />\r\n北京市北四环西路58号理想国际大厦19层 \r\n            邮编：100080<br />\r\n<br />\r\n<b>新浪无线</b><br />\r\n<span> 移动增值产品、语音增值业务——WAP、订阅、下载、彩铃、IVR（交互式语音应答）</span><br />\r\nTel：4006900000 转 2<br />\r\nFax：(86-20)38108645 <br />\r\nEmail：<a href="mailto:gzkf@staff.sina.com.cn">gzkf@staff.sina.com.cn</a><br />\r\n<br />\r\n<b>新浪微博</b> <br />\r\n客户服务热线：<br />\r\n4000960960 （个人） <br />\r\n4000980980（企业）<br />\r\n或4006900000 转 1 <br />\r\nIdeal Plaza, 9F, 58 Bei si huan xi Road, Haidian District, Beijing 100080,China <br />\r\n北京市北四环西路58号理想国际大厦9层 邮编：100080\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1428721727, 1428891069, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `rj_sort`
--

CREATE TABLE IF NOT EXISTS `rj_sort` (
  `sort_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) NOT NULL COMMENT '1-栏目 2-广告',
  `sort_title` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '类别',
  `listorder` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`sort_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `rj_sort`
--

INSERT INTO `rj_sort` (`sort_id`, `group_id`, `sort_title`, `listorder`) VALUES
(3, 2, '首页banner', 1),
(4, 2, '友链', 2);

-- --------------------------------------------------------

--
-- 表的结构 `rj_web`
--

CREATE TABLE IF NOT EXISTS `rj_web` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `key_word` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `web_code` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='网站设置';

--
-- 转存表中的数据 `rj_web`
--

INSERT INTO `rj_web` (`id`, `title`, `key_word`, `description`, `web_code`) VALUES
(1, '百度', '百度搜索', '百度一下你就知道', '<script>alert(''test'')</script>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
