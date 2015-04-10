-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-10 10:26:32
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
(1, 'admin', '超级管理员', '21232f297a57a5a743894a0e4a801fc3', 1, 1428629323, '127.0.0.1', 28, 1, 1);

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
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varbinary(255) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `create_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0-关闭 1-普通 2-推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `rj_category`
--

INSERT INTO `rj_category` (`catid`, `catname`, `pid`, `sort_id`, `image`, `description`, `seting`, `listorder`, `keywords`, `mid`) VALUES
(1, '新闻中心', 0, 1, '', '', NULL, 2, 'news', NULL),
(2, '军事新闻', 1, 1, '', '', NULL, 1, 'news/junshi', 2),
(5, '国际新闻', 1, 1, '', '', NULL, 2, 'news/guoji', 1),
(4, '美国新闻', 5, 1, NULL, NULL, NULL, 3, 'news/meiguo', NULL),
(8, '娱乐新闻', 1, NULL, '', '娱乐新闻娱乐新闻娱乐新闻娱乐新闻娱乐新闻娱乐新闻', NULL, 6, 'news/star', 1),
(9, '电影娱乐', 8, NULL, '', '电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐电影娱乐', NULL, 7, 'news/happy', NULL);

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
  `keyword` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `create_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
