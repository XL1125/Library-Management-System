-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-12-23 17:52:21
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `users`
--

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT '未借阅',
  `account` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `class`, `image_path`, `state`, `account`) VALUES
(1, '小王子', '安东尼·德·圣-埃克苏佩里', '儿童文学', 'image/books/小王子.jpg', '未借阅', NULL),
(2, '活着', '余华', '现实主义', 'image/books/活着.jpg', '未借阅', NULL),
(3, '平凡的世界', '路遥', '现实主义', 'image/books/平凡的世界.jpg', '未借阅', NULL),
(4, '白夜行', '东野圭吾', '悬疑', 'image/books/白夜行.jpg', '未借阅', NULL),
(5, '放学后', '东野圭吾', '悬疑', 'image/books/放学后.jpg', '未借阅', NULL),
(6, '冬牧场', '李娟', '现实主义', 'image/books/冬牧场.jpg', '未借阅', NULL),
(7, '嗡嗡嗡', '轻松的', '企鹅', '暂无图片', '未借阅', NULL),
(8, '失而复得', '微软', '额外人发但是', '暂无图片', '未借阅', NULL),
(9, '五色符', '额我让他', '堵塞', '暂无图片', '未借阅', NULL),
(10, '世代相传v', '二通过非法', '其实', '暂无图片', '未借阅', NULL),
(11, '世代相传', '啊我日', '阿斯弗', '暂无图片', '未借阅', NULL),
(12, '蓄电池', '请按双方', '阿斯顿', '暂无图片', '未借阅', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE `info` (
  `account` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`account`, `password`, `id`, `role`) VALUES
('admin', '123', '管理员', 'admin'),
('user', '123', '用户001', 'user');

--
-- 转储表的索引
--

--
-- 表的索引 `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account` (`account`);

--
-- 表的索引 `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
