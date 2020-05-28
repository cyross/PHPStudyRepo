-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2020 年 5 月 28 日 11:21
-- サーバのバージョン： 8.0.20
-- PHP のバージョン: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tekitou5`
--
CREATE DATABASE IF NOT EXISTS `tekitou5` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tekitou5`;

-- --------------------------------------------------------

--
-- テーブルの構造 `alignment`
--

CREATE TABLE `alignment` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `alignment`
--

INSERT INTO `alignment` (`id`, `name`, `create_date`) VALUES
(1, '中立', '2020-05-28 10:38:33'),
(2, '混沌', '2020-05-28 10:38:55'),
(3, '秩序', '2020-05-28 10:39:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `chara`
--

CREATE TABLE `chara` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class_id` int NOT NULL DEFAULT '1' COMMENT '職業ID',
  `level` int NOT NULL DEFAULT '0',
  `hp` int NOT NULL DEFAULT '0',
  `mp` int NOT NULL DEFAULT '0',
  `str` int NOT NULL DEFAULT '0' COMMENT 'つよさ',
  `def` int NOT NULL DEFAULT '0' COMMENT 'みのまもり',
  `agr` int NOT NULL DEFAULT '0' COMMENT 'すばやさ',
  `magic` int NOT NULL DEFAULT '0' COMMENT '魔法力',
  `magic_reg` int NOT NULL DEFAULT '0' COMMENT '魔法防御力',
  `luck` int NOT NULL DEFAULT '0' COMMENT 'うんのよさ',
  `alignment_id` int NOT NULL DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `chara`
--

INSERT INTO `chara` (`id`, `name`, `class_id`, `level`, `hp`, `mp`, `str`, `def`, `agr`, `magic`, `magic_reg`, `luck`, `alignment_id`, `create_date`) VALUES
(1, 'A.クォート', 1, 1, 15, 0, 13, 12, 8, 0, 0, 6, 2, '2020-05-28 11:06:39'),
(2, 'ミヒャエル', 1, 1, 20, 0, 15, 18, 6, 0, 0, 5, 1, '2020-05-28 11:07:37'),
(3, 'リード・Ｘ', 2, 1, 8, 16, 5, 6, 8, 20, 18, 4, 3, '2020-05-28 11:16:01'),
(4, 'リック', 4, 1, 11, 3, 7, 7, 21, 6, 2, 18, 1, '2020-05-28 11:16:01'),
(5, 'レンドール', 3, 1, 15, 20, 13, 12, 10, 15, 15, 9, 2, '2020-05-28 11:17:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `class`
--

CREATE TABLE `class` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='職業';

--
-- テーブルのデータのダンプ `class`
--

INSERT INTO `class` (`id`, `name`, `create_date`) VALUES
(1, '戦士', '2020-05-28 11:10:49'),
(2, '魔法使い', '2020-05-28 11:10:49'),
(3, '僧侶', '2020-05-28 11:10:49'),
(4, '盗賊', '2020-05-28 11:10:49');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `alignment`
--
ALTER TABLE `alignment`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `chara`
--
ALTER TABLE `chara`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `alignment`
--
ALTER TABLE `alignment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `chara`
--
ALTER TABLE `chara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルのAUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
