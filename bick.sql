-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018-09-18 11:13:25
-- 服务器版本： 5.6.30-1
-- PHP Version: 5.6.26-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bick`
--

-- --------------------------------------------------------

--
-- 表的结构 `bik_admin`
--

CREATE TABLE `bik_admin` (
  `id` mediumint(9) NOT NULL COMMENT '管理员ｉｄ',
  `name` varchar(30) NOT NULL COMMENT '管理员用户名',
  `password` char(32) NOT NULL COMMENT '管理员密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_admin`
--

INSERT INTO `bik_admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'superAdmin', '21232f297a57a5a743894a0e4a801fc3'),
(11, 'admin123', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `bik_article`
--

CREATE TABLE `bik_article` (
  `id` mediumint(9) NOT NULL COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `keywords` varchar(100) NOT NULL COMMENT '关键字',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `author` varchar(30) NOT NULL COMMENT '作者',
  `thumb` varchar(160) NOT NULL COMMENT '缩略图',
  `content` text NOT NULL COMMENT '内容',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击数',
  `zan` mediumint(9) NOT NULL COMMENT '点赞数',
  `rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不推荐　１推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_article`
--

INSERT INTO `bik_article` (`id`, `title`, `keywords`, `desc`, `author`, `thumb`, `content`, `click`, `zan`, `rec`, `time`, `cateid`) VALUES
(1, '32222', '11', '1', '111', '', '<p>111</p>', 0, 0, 0, 0, 20),
(2, '死飞车', '死飞车，单车', '户外单车简介', '叶健林', '/thinkphp/public/uploads/20180904/223c85b195083023d62ef48d3d0eddb2.jpg', '<p>飞车内容飞车内容飞车内容飞车内容飞车内容飞车内容飞车内容</p>', 9, 0, 0, 0, 23),
(3, 'Alain Massabova: 40 Years in Paris BMX 视频', 'BMW', '极限运动', '叶子', '/thinkphp/public/uploads/20180904/193065142ff77245f045f4438dc9a2d9.jpg', '<p><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(244, 244, 244);\">Alain Massabova最近就走到巴黎，与导演JC Pieri合作，为《ART BMX Magazine》制作出最新的《40 Years in Paris》视频短片。这次Massabova...</span></p>', 16, 0, 0, 0, 23),
(4, '测试文章', '测试文章', '测试文章测试文章', '测试文章', '', '<p>测试文章测试文章</p>', 1, 0, 0, 1536108969, 24),
(5, 'COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚', '王力宏', '踩单车', '叶子', '/thinkphp/public/uploads/20180909/3d1d5db1fc588fee3e0320bb97126250.jpg', '<p>COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚</p>', 0, 0, 0, 1536504341, 28),
(6, '骑看世界：三个女孩的欧洲骑行之路', '女孩', '骑看世界\r\n', '测试', '', '<p><a target=\"_blank\" href=\"http://localhost/life/392.html\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(119, 119, 119); text-decoration-line: none; outline: none; font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">骑看世界：三个女孩的欧洲骑行之路</a><a target=\"_blank\" href=\"http://localhost/life/392.html\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(119, 119, 119); text-decoration-line: none; outline: none; font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">骑看世界：三个女孩的欧洲骑行之路</a></p>', 0, 0, 0, 1536504443, 28),
(7, '骑行40000公里 英国胶片摄影师的骑游之旅', '骑行', '１１１１', '叶健林', '/thinkphp/public/uploads/20180909/448a120365a1bb1d97f057da7aa4982d.jpg', '<p><a target=\"_blank\" href=\"http://localhost/life/361.html\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(119, 119, 119); text-decoration-line: none; outline: none; font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">骑行40000公里 英国胶片摄影师的骑游之旅</a></p>', 0, 0, 0, 1536504752, 30),
(8, '骑看世界：春节骑行海南岛 畅游冬日骑行天堂', '行天堂', '行天堂行天堂', '叶子', '/thinkphp/public/uploads/20180909/4fef12772fb8350a875d3038d6824ec9.jpg', '<p>行天堂行天堂</p>', 0, 0, 0, 1536504787, 30),
(9, '执着的小辫与西藏的骑车旅行', '１１１', '１１１', '测试', '/thinkphp/public/uploads/20180909/0e919130ebb3e0804ebfd6ba40ef389f.jpg', '<p><a target=\"_blank\" href=\"http://localhost/life/389.html\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(119, 119, 119); text-decoration-line: none; outline: none; font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">执着的小辫与西藏的骑车旅行</a><a target=\"_blank\" href=\"http://localhost/life/389.html\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(119, 119, 119); text-decoration-line: none; outline: none; font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">执着的小辫与西藏的骑车旅行</a></p>', 4, 0, 0, 1536504822, 30),
(10, '车把手', '车把手', '车把手车把手', '测试', '/thinkphp/public/uploads/20180910/8bd74d2dbe10eca0b278d6fb94d231cf.jpg', '<p>车把手车把手车把手车把手</p>', 2, 0, 0, 1536555773, 26),
(11, '测试', '测试测试测试', '测试测试测试', '叶健林', '/thinkphp/public/uploads/20180910/095f2726e040ee91dae1eb3a511a345b.jpg', '<p>测试测试测试</p>', 0, 0, 0, 1536555847, 27),
(12, '测试测试测试测试', '测试测试', '测试测试测试测试', '测试测试', '/thinkphp/public/uploads/20180910/d2e8362899534e26fec78d7c47d5d09b.jpg', '<p>测试测试测试测试测试测试测试测试测试测试测试</p>', 1, 0, 0, 1536555883, 29),
(13, '骑看世界：探索地中海科西嘉岛', '', '翻译：dracular 来源：pinkbike从波兰出发，驱车1800公里，再经过几个小时的轮渡就可以到达我们的目的地科西嘉岛了.', '叶健林', '/thinkphp/public/uploads/20180910/1013828868f52e6365b2c0bba80282a7.jpg', '<p><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">翻译：dracular 来源：pinkbike从波兰出发，驱车1800公里，再经过几个小时的轮渡就可以到达我们的目的地科西嘉岛了.</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">翻译：dracular 来源：pinkbike从波兰出发，驱车1800公里，再经过几个小时的轮渡就可以到达我们的目的地科西嘉岛了.</span></p>', 0, 0, 0, 1536565659, 28),
(14, 'Forward Set x Bicycle Belts联合出品U型锁腰带U-Lock Belt', '测试测试测试', 'Forward Set和Bicycle Belts似乎提供了一种新的可能，它们联手打造了一款U型锁腰带。这款腰带对于通勤和信使来说可谓相当便捷，腰带本身是采用二手的自行车轮胎改制而成', '测试', '/thinkphp/public/uploads/20180910/41cb5c8d5afb69cbabca724884ba432f.jpg', '<p><span style=\"color: rgb(85, 85, 85); font-family: \" microsoft=\"\" helvetica=\"\" font-size:=\"\" background-color:=\"\">Forward Set和Bicycle Belts似乎提供了一种新的可能，它们联手打造了一款U型锁腰带。这款腰带对于通勤和信使来说可谓相当便捷，腰带本身是采用二手的自行车轮胎改制而成</span><span style=\"color: rgb(85, 85, 85); font-family: \" microsoft=\"\" helvetica=\"\" font-size:=\"\" background-color:=\"\">Forward Set和Bicycle Belts似乎提供了一种新的可能，它们联手打造了一款U型锁腰带。这款腰带对于通勤和信使来说可谓相当便捷，腰带本身是采用二手的自行车轮胎改制而成</span></p>', 1, 0, 0, 1536565692, 26),
(15, '硅胶环保材质 Bone iPhone5 单车号角扬声器', '测试', '这款Bone iPhone5 单车号角扬声器利用号角的原理，将音源集中后，引导音源传导方向，达到扩大音量的效果，使用后可提高13分贝，并且无需任何外接电源，响应环保，节能减碳。', '叶子', '', '<p><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">这款Bone iPhone5 单车号角扬声器利用号角的原理，将音源集中后，引导音源传导方向，达到扩大音量的效果，使用后可提高13分贝，并且无需任何外接电源，响应环保，节能减碳。</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">这款Bone iPhone5 单车号角扬声器利用号角的原理，将音源集中后，引导音源传导方向，达到扩大音量的效果，使用后可提高13分贝，并且无需任何外接电源，响应环保，节能减碳。</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">这款Bone iPhone5 单车号角扬声器利用号角的原理，将音源集中后，引导音源传导方向，达到扩大音量的效果，使用后可提高13分贝，并且无需任何外接电源，响应环保，节能减碳。</span></p>', 0, 0, 0, 1536565712, 27),
(16, 'Rapha Continental x Vandeyk 联名手工车款', '测试', '英国单车服事配件品牌 Rapha，与美国知名的创意公路赛 Rapha Continental 找来德国单车品牌 Vandeyk 联手，发表一系列联名款单车，全由德国师傅手工打造而成', '叶健林', '/thinkphp/public/uploads/20180910/f7915afbf9d2174b61e6e1c033d16a96.jpg', '<p><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">英国单车服事配件品牌 Rapha，与美国知名的创意公路赛 Rapha Continental 找来德国单车品牌 Vandeyk 联手，发表一系列联名款单车，全由德国师傅手工打造而成</span></p>', 7, 0, 0, 1536565742, 23),
(17, '硬朗骑士归来，NEIGHBORHOOD 2013秋冬型录一览', '', '作为潮流界的硬汉，NEIGHBORHOOD其每一件的单品都给人以干净，利落，硬朗的印象。当然了，此次NEIGHBORHOOD推出的2013秋冬型录自然也不例外。', '叶健林', '', '<p><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">作为潮流界的硬汉，NEIGHBORHOOD其每一件的单品都给人以干净，利落，硬朗的印象。当然了，此次NEIGHBORHOOD推出的2013秋冬型录自然也不例外。</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">作为潮流界的硬汉，NEIGHBORHOOD其每一件的单品都给人以干净，利落，硬朗的印象。当然了，此次NEIGHBORHOOD推出的2013秋冬型录自然也不例外。</span><span style=\"color: rgb(85, 85, 85); font-family: &quot;Microsoft Yahei&quot;, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">作为潮流界的硬汉，NEIGHBORHOOD其每一件的单品都给人以干净，利落，硬朗的印象。当然了，此次NEIGHBORHOOD推出的2013秋冬型录自然也不例外。</span></p>', 2, 0, 0, 1536565765, 24),
(18, '测试轮播１', '1', '测试轮播１', '1', '/thinkphp/public/uploads/20180910/bd96099920d4579626b06ad7425ad712.jpg', '<p>测试轮播１</p>', 0, 0, 1, 1536574242, 23),
(19, '测试轮播２', '', '', '测试轮播２', '/thinkphp/public/uploads/20180910/5fa435110e8fa5024f00aef947d4e93f.jpg', '<p>测试轮播２</p>', 0, 0, 1, 1536574265, 24),
(20, '测试轮播３', '', '', '测试轮播3', '/thinkphp/public/uploads/20180910/6d907766b6d14415dedbc54f9a2bf34a.jpg', '<p>测试轮播２</p>', 3, 0, 1, 1536574301, 26),
(22, '轮播测试４４４', '', '', '轮播测试４４４', '/thinkphp/public/uploads/20180910/98f0c644ffa7bb73205f39e070f9bea6.png', '<p>轮播测试４４４轮播测试４４４</p>', 5, 0, 1, 1536575620, 26),
(23, '西甲-苏神登贝莱进球 巴萨3分钟2球2-1逆转客胜', '测试测试测试', '', '测试', '/thinkphp/public/uploads/20180916/f13343978787e92c5cf60ea874ce280e.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: arial; text-align: justify; background-color: rgb(255, 255, 255);\">北京时间9月15日晚10:15，2018-19赛季西甲第4轮的一场焦点战打响。巴萨做客阿诺埃塔球场对阵皇家社会。主队在上半场率先进球，而巴萨下半场3分钟连入两球将比分反超，最终从客场带走了3分，依然保持着开局连胜的势头。</span></p>', 0, 0, 0, 1537063850, 23);

-- --------------------------------------------------------

--
-- 表的结构 `bik_auth_group`
--

CREATE TABLE `bik_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_auth_group`
--

INSERT INTO `bik_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '16,17,20,19,18,11,12,15,14,13,1,7,10,9,8,6'),
(2, '友情链接', 1, '16,17,20,19,18'),
(3, '配置管理员', 1, '1,7,10,9,8,6');

-- --------------------------------------------------------

--
-- 表的结构 `bik_auth_group_access`
--

CREATE TABLE `bik_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_auth_group_access`
--

INSERT INTO `bik_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(10, 2),
(11, 3);

-- --------------------------------------------------------

--
-- 表的结构 `bik_auth_rule`
--

CREATE TABLE `bik_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT '0',
  `level` tinyint(1) DEFAULT '0',
  `sort` smallint(5) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_auth_rule`
--

INSERT INTO `bik_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `pid`, `level`, `sort`) VALUES
(1, 'conf', '系统设置', 1, 1, '', 0, 0, 13),
(6, 'conf/conf', '配置项', 1, 1, '', 1, 1, 50),
(7, 'conf/lst', '配置列表', 1, 1, '', 1, 1, 50),
(8, 'conf/add', '添加配置', 1, 1, '', 7, 2, 50),
(9, 'conf/del', '删除配置', 1, 1, '', 7, 2, 50),
(10, 'conf/edit', '编辑配置', 1, 1, '', 7, 2, 50),
(11, 'admin', '管理员', 1, 1, '', 0, 0, 50),
(12, 'admin/lst', '管理员列表', 1, 1, '', 11, 1, 50),
(13, 'admin/add', '管理员添加', 1, 1, '', 12, 2, 50),
(14, 'admin/edit', '管理员编辑', 1, 1, '', 12, 2, 50),
(15, 'admin/del', '删除管理员', 1, 1, '', 12, 2, 50),
(16, 'link', '友情链接', 1, 1, '', 0, 0, 50),
(17, 'link/lst', '链接列表', 1, 1, '', 16, 1, 50),
(18, 'link/add', '添加链接', 1, 1, '', 17, 2, 50),
(19, 'link/del', '删除链接', 1, 1, '', 17, 2, 50),
(20, 'link/edit', '编辑链接', 1, 1, '', 17, 2, 50);

-- --------------------------------------------------------

--
-- 表的结构 `bik_cate`
--

CREATE TABLE `bik_cate` (
  `id` mediumint(9) NOT NULL COMMENT '栏目ｉｄ',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目类型：　1：列表栏目２：单页栏目　３:图片列表',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级栏目ｉｄ',
  `rec_index` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1：推荐 0：不推荐',
  `rec_bottom` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1：推荐 0：不推荐',
  `sort` mediumint(9) NOT NULL DEFAULT '50' COMMENT '排序',
  `keywords` varchar(255) NOT NULL COMMENT '栏目关键词',
  `desc` varchar(255) NOT NULL COMMENT '栏目描述',
  `content` text NOT NULL COMMENT '栏目内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_cate`
--

INSERT INTO `bik_cate` (`id`, `catename`, `type`, `pid`, `rec_index`, `rec_bottom`, `sort`, `keywords`, `desc`, `content`) VALUES
(22, '单车分类', 1, 0, 0, 0, 50, '', '', ''),
(23, '死飞车', 1, 22, 1, 1, 50, '', '', ''),
(24, '复古骑行', 1, 22, 1, 1, 50, '', '', ''),
(25, '骑行装备', 1, 0, 1, 0, 50, '', '', ''),
(26, '车身装备', 1, 25, 1, 0, 50, '', '', ''),
(27, '人身装备', 1, 25, 1, 0, 50, '', '', ''),
(28, '单车生活', 3, 0, 1, 0, 50, '单车生活单车生活', '', ''),
(29, '行业咨询', 1, 0, 0, 0, 50, '', '', ''),
(30, '单车生活二级', 3, 28, 0, 0, 50, '单车生活二级', '单车生活二级', ''),
(31, '关于我们', 2, 0, 0, 1, 50, '关于我们关于我们关于我们关于我们', '关于我们关于我们', '<h1 label=\"标题居左\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;\">关于我们</h1><p><span style=\"text-decoration: underline;\"></span><br/></p><p>关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们</p>');

-- --------------------------------------------------------

--
-- 表的结构 `bik_conf`
--

CREATE TABLE `bik_conf` (
  `id` mediumint(9) NOT NULL COMMENT '配置项id',
  `cnname` varchar(50) NOT NULL COMMENT '配置中文名称',
  `enname` varchar(50) NOT NULL COMMENT '英文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置类型　１：单行文本框　２：文本域　３：单选按钮　４：复选按钮　５：下拉菜单',
  `value` varchar(255) NOT NULL COMMENT '配置值',
  `values` varchar(255) NOT NULL COMMENT '配置可选值',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '配置项排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_conf`
--

INSERT INTO `bik_conf` (`id`, `cnname`, `enname`, `type`, `value`, `values`, `sort`) VALUES
(1, '站点名称', 'siteName', 1, '自行车站点', '11111', 53),
(2, '自动清空缓存时间', 'checa', 5, '１小时', '１小时,２小时,3小时', 51),
(3, '站点描述', 'desc', 2, '我们本站有各种自行车信息，欢迎前来选购', '22,２２', 52),
(5, '网站状态', 'sitestate', 3, '开启', '开启,关闭', 50),
(8, '启用验证码', 'code', 4, '是', '是', 50),
(9, '站点关键字', 'keyword', 1, '自行车', '', 53);

-- --------------------------------------------------------

--
-- 表的结构 `bik_link`
--

CREATE TABLE `bik_link` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` mediumint(9) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bik_link`
--

INSERT INTO `bik_link` (`id`, `title`, `desc`, `url`, `sort`) VALUES
(1, '百度', '百度网百度\r\n', 'http://baiud.com', 3),
(3, '新浪', '新浪新浪新浪', 'www.sina.com', 1),
(4, '360000', '360360\r\n', 'www.360.com', 2),
(9, '新浪', '222', 'http://www.22baidu.com', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bik_admin`
--
ALTER TABLE `bik_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bik_article`
--
ALTER TABLE `bik_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bik_auth_group`
--
ALTER TABLE `bik_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bik_auth_group_access`
--
ALTER TABLE `bik_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `bik_auth_rule`
--
ALTER TABLE `bik_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `bik_cate`
--
ALTER TABLE `bik_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bik_conf`
--
ALTER TABLE `bik_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bik_link`
--
ALTER TABLE `bik_link`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bik_admin`
--
ALTER TABLE `bik_admin`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '管理员ｉｄ', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `bik_article`
--
ALTER TABLE `bik_article`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `bik_auth_group`
--
ALTER TABLE `bik_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `bik_auth_rule`
--
ALTER TABLE `bik_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `bik_cate`
--
ALTER TABLE `bik_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目ｉｄ', AUTO_INCREMENT=32;
--
-- 使用表AUTO_INCREMENT `bik_conf`
--
ALTER TABLE `bik_conf`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置项id', AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `bik_link`
--
ALTER TABLE `bik_link`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
