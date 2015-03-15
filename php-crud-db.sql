/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php-crud-example`
--
CREATE DATABASE IF NOT EXISTS `php-crud-example` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `php-crud-example`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(122) NOT NULL,
  `type_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `type_id`, `color_id`) VALUES
(1, 'BMW', 4, 3),
(2, 'Volkswagen', 2, 2),
(3, 'Mercedes Benz', 3, 2),
(4, 'Skoda', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_color`
--

CREATE TABLE IF NOT EXISTS `car_color` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(122) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_color`
--

INSERT INTO `car_color` (`id`, `color`) VALUES
(1, 'red'),
(2, 'white'),
(3, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(122) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`id`, `type`) VALUES
(1, 'wagon'),
(2, 'van'),
(3, 'sedan'),
(4, 'coupe');