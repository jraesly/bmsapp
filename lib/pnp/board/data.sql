
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;




CREATE TABLE IF NOT EXISTS `message_board` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `message` longtext,
  `email` varchar(150) default NULL,
  `url` varchar(150) default NULL,
  `ip_address` varchar(100) default NULL,
  `post_dt` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1711 ;
