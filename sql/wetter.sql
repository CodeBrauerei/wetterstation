--
-- MySQL 5.5.24
-- Mon, 29 Apr 2013 07:25:24 +0000
--

CREATE DATABASE `wetterdaten` DEFAULT CHARSET utf8;

USE `wetterdaten`;

CREATE TABLE `wetter` (
   `id` int(11) not null auto_increment,
   `T1` varchar(50),
   `T2` varchar(50),
   `T3` varchar(50),
   `LF` varchar(50),
   `LD` varchar(50),
   `BT` varchar(50),
   `WG` varchar(50),
   `WR` varchar(255),
   `NS` varchar(50),
   `LI` varchar(50),
   `insert-date` timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;

INSERT INTO `wetter` (`id`, `T1`, `T2`, `T3`, `LF`, `LD`, `BT`, `WG`, `WR`, `NS`, `LI`, `insert-date`) VALUES 
('1', '15.3', '15.7', '16', '68', '1026', '14', '0', 'NW', '0', '1000', '2013-04-25 10:19:01'),
('2', '15.8', '16.2', '15.9', '52', '1029', '14.5', '0', 'N', '0', '1000', '2013-04-25 10:19:51'),
('3', '16.3', '17.0', '16.9', '57', '1027', '14.9', '5', 'NNW', '0', '1000', '2013-04-25 10:20:48');