-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 15 2015 г., 22:15
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `url`, `showhide`) VALUES
(1, 'Футбол', 'football', 'show'),
(2, 'Теннис', 'tennis', 'show'),
(3, 'Баскетбол', 'basketball', 'show'),
(4, 'Зимние виды', 'winter', 'show'),
(5, 'Прочее', 'other', 'show'),
(18, 'Гребля', 'greblia', 'show'),
(19, 'Ссаный спорт', 'sanniy', 'show'),
(20, 'Шашки', 'shahki', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `chemps`
--

CREATE TABLE IF NOT EXISTS `chemps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `picture` tinytext NOT NULL,
  `picturesmall` tinytext NOT NULL,
  `showhide` tinytext NOT NULL,
  `putdate` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `chemps`
--

INSERT INTO `chemps` (`id`, `name`, `body`, `picture`, `picturesmall`, `showhide`, `putdate`, `cat_id`) VALUES
(20, 'Чемпионат израиля', '<p>хуй</p>\r\n', '15_04_15_10_16_basketball.png', 'S_15_04_15_10_16_basketball.png', 'show', '2015-04-15', 1),
(21, 'Чемпионат ирана', '<p>хуй1</p>\r\n', '15_04_15_10_16_foot.png', 'S_15_04_15_10_16_foot.png', 'show', '2015-04-15', 1),
(22, 'Чемпионат катара', '<p>хуй3</p>\r\n', '15_04_15_10_17_4.jpg', 'S_15_04_15_10_17_4.jpg', 'show', '2015-04-15', 1),
(23, 'Монте-карло', '<p>хуй</p>\r\n', '15_04_15_10_18_tennis.jpg', 'S_15_04_15_10_18_tennis.jpg', 'show', '2015-04-15', 2),
(24, 'ИТФ', '<p>фывфывф</p>\r\n', '', '', 'show', '2015-04-15', 2),
(25, 'НБА', '<p>вфыы</p>\r\n', '15_04_15_10_19_1.png', 'S_15_04_15_10_19_1.png', 'show', '2015-04-15', 3),
(26, 'Единая лига ВТБ', '<p>фывфыв</p>\r\n', '15_04_15_10_19_logotip.png', 'S_15_04_15_10_19_logotip.png', 'show', '2015-04-15', 1),
(27, 'ыва', '<p>ыва</p>\r\n', '15_04_15_11_51_fontop.jpg', 'S_15_04_15_11_51_fontop.jpg', 'show', '2015-04-15', 19),
(28, '[[[qq', '<p>gggggg</p>\r\n', '15_04_15_08_34_logotip.png', 'S_15_04_15_08_34_logotip.png', 'show', '2015-04-15', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `enter`
--

CREATE TABLE IF NOT EXISTS `enter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `blockunblock` enum('unblock','block') NOT NULL,
  `datereg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `enter`
--

INSERT INTO `enter` (`id`, `login`, `email`, `password`, `blockunblock`, `datereg`, `lastvisit`) VALUES
(10, '111', '111@111.com', '111', 'unblock', '2015-04-07', '2015-04-14 13:13:35'),
(11, '123', '123456@1.com', '123', 'unblock', '2015-04-08', '2015-04-08 19:23:25');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `lang` enum('ru','en','by') NOT NULL DEFAULT 'ru',
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `putdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `lang`, `showhide`, `putdate`) VALUES
(1, '<span style = "color:red" align=center /span>Главные новости', '					 <div class = ''maintext''>\r\n						<div>\r\n						<center><a href=''#'' ><img src=''media/img/1.png'' ></a></center>\r\n						\r\n					\r\n<br>Лента трансферных новостей забита анонсами сумасшедших сделок «Ювентуса»: \r\nпо версии Marca, два главных испанских клуба (плюс «ПСЖ» и «МЮ») готовы выложить миллиарды песет за Погба, \r\nно Поль почему-то до сих пор в Турине (зато зарплата повысилась до 4 миллионов евро).<a href = ''#''> ...Подробнее</a></>\r\n						\r\n						</div>\r\n						<br></>\r\n						<br></>\r\n						\r\n						<div>\r\n						<center><a href=''#'' ><img src=''media/img/2.png'' ></a></center>\r\n						\r\n					\r\n<br>Новое амплуа Коэнтрау, форма Босингвы и засуха Криштиану \r\n– Кирилл Воробьев собрал самые интересные моменты матча между Португалией и Сербией в одном материале.<a href = ''#''> ...Подробнее</a></>\r\n						\r\n						</div>\r\n						<br></>\r\n						<br></>\r\n						\r\n						<div>\r\n						<center><a href=''#'' ><img src=''media/img/3.png'' ></a></center>\r\n						\r\n					\r\n<br>Форвард «ястребов» всю ночь отдыхал в одном из ночных заведений в центре столицы, \r\nпосле чего пытался уйти, не заплатив по счету.<a href = ''#''> ...Подробнее</a></>\r\n						\r\n						</div>\r\n						\r\n					\r\n					</div> ', 'index', 'ru', 'show', '2015-03-30 00:00:00'),
(2, '<span style = "color:red" align=center /span>Контакты', '<center>1234</center>', 'contact', 'ru', 'show', '2015-03-30 00:00:00'),
(6, '<span style = "color:red" align=center /span>LIVE', '<script type="text/javascript"> n=3; c=20; v_width=800; t=0</script><script type="text/javascript" src="http://sportgoal.net/stream_modul/stream_modul.js"></script>', 'live', 'ru', 'show', '2015-04-15 00:00:00'),
(7, '<span style = "color:red" align=center /span>Результаты', '', 'results', 'ru', 'show', '2015-04-17 00:00:00'),
(8, '<span style = "color:red" align=center /span>Расписание', '<IFRAME FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=YES align="center" WIDTH=100% HEIGHT=1800 SRC="http://vprognoze.ru/onlinevideo.php?gt=3"></IFRAME>', 'timing', 'ru', 'show', '2015-04-15 00:00:00'),
(9, '<span style = "color:red" align=center /span>Лига чемпионов', '<div class="footboom-link"><strong><a href="http://footboom.com">Новости от Footboom.com</a></strong></div>\r\n<div id="news-informer" class="footboom-informer">Загружается...</div>\r\n<script>\r\n(function() {\r\n    var fb = document.createElement(''script''); fb.type = ''text/javascript''; fb.async = true;\r\n    fb.src = ''http://footboom.com/news/informer/feed?placeholder=news-informer&controller=informer&section_id%5B0%5D=127&limit=5&image=block&orientation=horizontal'';\r\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(fb, s);\r\n})();\r\n</script>\r\n', 'league', 'ru', 'show', '2015-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `ots`
--

CREATE TABLE IF NOT EXISTS `ots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` tinytext NOT NULL,
  `body` text NOT NULL,
  `bodyots` text NOT NULL,
  `otsdate` datetime NOT NULL,
  `showhide` enum('show','hide') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- Дамп данных таблицы `ots`
--

INSERT INTO `ots` (`id`, `login`, `body`, `bodyots`, `otsdate`, `showhide`) VALUES
(103, '111', '', '1', '2015-04-13 12:38:10', 'show'),
(104, '111', '', '2', '2015-04-13 12:38:12', 'show'),
(105, '111', '', '3', '2015-04-13 12:38:14', 'show'),
(106, '111', '', '4', '2015-04-13 12:38:17', 'show'),
(107, '111', '', '5', '2015-04-13 12:38:21', 'show'),
(108, '111', '', '6', '2015-04-13 12:38:24', 'show'),
(109, '111', '', '7', '2015-04-13 12:38:27', 'show'),
(110, '111', '', '8', '2015-04-13 12:38:30', 'show'),
(111, '111', '', '9', '2015-04-13 12:38:33', 'show'),
(112, '111', '', '10', '2015-04-13 12:38:37', 'show'),
(113, '111', '', 'asd', '2015-04-13 12:46:52', 'show'),
(114, '111', '', 'asdas', '2015-04-13 12:47:04', 'show'),
(115, '10', 'bgbb', '', '2015-04-14 13:13:50', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `system_accounts`
--

CREATE TABLE IF NOT EXISTS `system_accounts` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `system_accounts`
--

INSERT INTO `system_accounts` (`id_account`, `name`, `pass`) VALUES
(26, 'test', '098f6bcd4621d373cade4e832627b4f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
