-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-11-11 09:59:45
-- 服务器版本： 5.6.21
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lf`
--

-- --------------------------------------------------------

--
-- 表的结构 `lf_car`
--

CREATE TABLE IF NOT EXISTS `lf_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carname` varchar(50) DEFAULT NULL COMMENT '汽车名称',
  `carbrand` varchar(50) DEFAULT NULL COMMENT '品牌',
  `cardisplacement` double NOT NULL COMMENT '排量',
  `cartype` int(1) NOT NULL DEFAULT '1' COMMENT '类型 1:皮卡 2:轿车  3:板车 4:吊车',
  `carregtime` date DEFAULT NULL COMMENT '车辆注册日期',
  `caridnum` varchar(7) DEFAULT NULL COMMENT '车牌号码',
  `caryearcheckstarttime` datetime NOT NULL COMMENT '年检开始日期',
  `caryearcheckendtime` datetime NOT NULL COMMENT '年检到期日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lf_carapplication`
--

CREATE TABLE IF NOT EXISTS `lf_carapplication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '申请人id',
  `wid` int(11) NOT NULL COMMENT '用车计划部门',
  `cid` int(11) NOT NULL COMMENT '用车id',
  `appname` varchar(200) NOT NULL COMMENT '申请表名',
  `appdescript` varchar(500) NOT NULL COMMENT '申请表内容',
  `appstatus` int(1) NOT NULL COMMENT '状态 0:默认 1:各单位科长  2:生产科长',
  `appstarttime` datetime NOT NULL COMMENT '用车计划开始时间',
  `appendtime` datetime NOT NULL COMMENT '用车计划结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lf_user`
--

CREATE TABLE IF NOT EXISTS `lf_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_time` date NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL COMMENT '用户手机号码',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lf_user`
--

INSERT INTO `lf_user` (`id`, `user_name`, `user_password`, `user_type`, `user_time`, `user_phone`) VALUES
(3, 'aaaaa', 'bbbbbb', 1, '2014-10-12', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lf_workunit`
--

CREATE TABLE IF NOT EXISTS `lf_workunit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitname` varchar(50) DEFAULT NULL COMMENT '单位名称',
  `unitworkernumber` int(10) NOT NULL COMMENT '单位人数',
  `unitdescript` varchar(100) NOT NULL COMMENT '单位描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
