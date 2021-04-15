-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 02:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(57) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(19, 'Esports');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, '© © Copyright Ahmed vai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'about us', '<p>About us ... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat in fermentum posuere urna nec. Duis at tellus at urna condimentum mattis pellentesque id nibh. Dictum varius duis at consectetur lorem donec. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi etiam. Risus feugiat in ante metus dictum at tempor commodo. A iaculis at erat pellentesque adipiscing commodo. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut placerat. Arcu cursus vitae congue mauris rhoncus aenean vel. Sapien pellentesque habitant morbi tristique. Est sit amet facilisis magna. Sit amet tellus cras adipiscing enim eu turpis egestas. Elit duis tristique sollicitudin nibh sit amet commodo. Sed libero enim sed faucibus turpis in eu mi bibendum. Augue ut lectus arcu bibendum at varius vel pharetra. Volutpat odio facilisis mauris sit amet. Eget velit aliquet sagittis id consectetur. At augue eget arcu dictum varius duis. Mi proin sed libero enim sed.</p>'),
(2, 'DMCA', '<p><span>Facilisis sed odio morbi quis commodo odio. Rutrum quisque non tellus orci ac auctor. Posuere morbi leo urna molestie at. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere. Tellus at urna condimentum mattis pellentesque. Purus ut faucibus pulvinar elementum integer. Amet massa vitae tortor condimentum lacinia. Duis ultricies lacus sed turpis tincidunt id. Eu consequat ac felis donec et odio pellentesque. At tellus at urna condimentum mattis pellentesque id nibh. Amet venenatis urna cursus eget nunc scelerisque viverra mauris in. Erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Non arcu risus quis varius. Metus dictum at tempor commodo. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl. Eu feugiat pretium nibh ipsum consequat nisl vel pretium.</span></p>'),
(5, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque egestas congue quisque egestas. Consequat nisl vel pretium lectus quam id leo in vitae. Nibh sed pulvinar proin gravida hendrerit lectus. Neque gravida in fermentum et sollicitudin ac orci phasellus egestas. Condimentum mattis pellentesque id nibh. Sem integer vitae justo eget magna fermentum iaculis eu non. Vitae tortor condimentum lacinia quis vel eros. Sed felis eget velit aliquet sagittis. Egestas diam in arcu cursus euismod quis viverra. Fermentum leo vel orci porta. Eget nulla facilisi etiam dignissim. Nullam ac tortor vitae purus faucibus.</p>\r\n<p>Vulputate mi sit amet mauris commodo quis. Tempus imperdiet nulla malesuada pellentesque elit eget gravida cum sociis. Lobortis feugiat vivamus at augue. Aenean sed adipiscing diam donec adipiscing tristique risus nec. Ac placerat vestibulum lectus mauris ultrices eros in. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Risus sed vulputate odio ut enim blandit volutpat maecenas volutpat. Amet cursus sit amet dictum sit amet. Volutpat est velit egestas dui id ornare. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra.</p>\r\n<p>Facilisis sed odio morbi quis commodo odio aenean sed adipiscing. At elementum eu facilisis sed odio morbi quis. Viverra justo nec ultrices dui. Sed risus ultricies tristique nulla. Rutrum tellus pellentesque eu tincidunt. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Neque egestas congue quisque egestas diam in arcu cursus. Varius vel pharetra vel turpis nunc eget lorem dolor. Ut placerat orci nulla pellentesque dignissim. Dolor sit amet consectetur adipiscing elit pellentesque habitant. Lobortis mattis aliquam faucibus purus.</p>\r\n<p>Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Lacus vestibulum sed arcu non odio euismod lacinia at quis. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Tortor aliquam nulla facilisi cras fermentum odio eu. Metus aliquam eleifend mi in nulla posuere sollicitudin. Pretium lectus quam id leo in vitae turpis massa sed. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Quis vel eros donec ac. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Eu lobortis elementum nibh tellus. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Senectus et netus et malesuada. Leo duis ut diam quam nulla porttitor massa. Integer malesuada nunc vel risus commodo. Aliquam sem et tortor consequat id porta nibh. Dignissim cras tincidunt lobortis feugiat. Odio morbi quis commodo odio. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus.</p>\r\n<p>Arcu non sodales neque sodales. Faucibus purus in massa tempor nec feugiat nisl pretium. Justo nec ultrices dui sapien eget mi proin sed libero. Purus gravida quis blandit turpis cursus in hac habitasse platea. Imperdiet proin fermentum leo vel orci. Sagittis orci a scelerisque purus semper eget duis at tellus. Magna etiam tempor orci eu lobortis elementum nibh tellus. Pellentesque elit eget gravida cum sociis natoque penatibus. At augue eget arcu dictum. Ut etiam sit amet nisl. Vivamus arcu felis bibendum ut tristique. Dolor purus non enim praesent. Enim nec dui nunc mattis. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Egestas dui id ornare arcu odio ut sem nulla pharetra. Eget nulla facilisi etiam dignissim diam quis enim lobortis. Aliquet bibendum enim facilisis gravida neque convallis a.</p>'),
(11, 'new page', '<p>asdasfafasf aksjf lkasjf lkasjflk asjflkasjflkasj flkasjflkasjflkasjflasf</p>\r\n<p>asf</p>\r\n<p>asf</p>\r\n<p>as</p>\r\n<p>fas</p>\r\n<p>fqw;wlkwkwgjqlwkjflksadjflkasjfdlksajflkasjflksajflksafjsaklf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(57) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(12, 1, 'A brief Talking about java', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquet nibh praesent tristique magna sit amet. Dolor sit amet consectetur adipiscing elit. Vitae purus faucibus ornare suspendisse sed nisi. At ultrices mi tempus imperdiet nulla. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Sed id semper risus in. Integer feugiat scelerisque varius morbi enim nunc. Eget mauris pharetra et ultrices neque ornare. Egestas integer eget aliquet nibh. Lectus nulla at volutpat diam ut. Rhoncus aenean vel elit scelerisque. Purus semper eget duis at tellus at urna condimentum. A condimentum vitae sapien pellentesque.</p>\r\n<p>Faucibus turpis in eu mi bibendum neque egestas congue quisque. Sit amet massa vitae tortor condimentum. Malesuada fames ac turpis egestas integer eget aliquet. Gravida dictum fusce ut placerat. Ligula ullamcorper malesuada proin libero nunc. Mattis pellentesque id nibh tortor id aliquet. Nunc sed velit dignissim sodales ut eu sem integer. Vitae semper quis lectus nulla at. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Dictum sit amet justo donec enim diam. Libero id faucibus nisl tincidunt eget nullam non. Amet consectetur adipiscing elit ut. Aliquam sem et tortor consequat. Sit amet volutpat consequat mauris.</p>\r\n<p>Integer feugiat scelerisque varius morbi enim nunc faucibus. Quam adipiscing vitae proin sagittis nisl rhoncus mattis. Odio facilisis mauris sit amet massa vitae. Turpis tincidunt id aliquet risus feugiat in ante metus dictum. Ac turpis egestas integer eget aliquet nibh. Egestas erat imperdiet sed euismod nisi porta lorem. Quis auctor elit sed vulputate mi sit amet mauris. Semper risus in hendrerit gravida rutrum quisque non. Phasellus egestas tellus rutrum tellus pellentesque. Nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus.</p>\r\n<p>Tincidunt augue interdum velit euismod. Netus et malesuada fames ac turpis egestas sed. Sed arcu non odio euismod. In vitae turpis massa sed elementum tempus egestas sed. Egestas integer eget aliquet nibh. Ut sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Sem integer vitae justo eget magna fermentum iaculis eu non. Pretium aenean pharetra magna ac. Ut etiam sit amet nisl purus in. Condimentum mattis pellentesque id nibh tortor id aliquet lectus proin. Quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Feugiat nisl pretium fusce id velit ut tortor pretium. Non consectetur a erat nam at lectus urna. Congue mauris rhoncus aenean vel elit scelerisque mauris. Donec et odio pellentesque diam volutpat commodo sed egestas egestas. In fermentum posuere urna nec tincidunt praesent. Amet nisl suscipit adipiscing bibendum est ultricies. Mattis enim ut tellus elementum sagittis vitae.</p>\r\n<p>Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Nisi scelerisque eu ultrices vitae auctor. Odio ut enim blandit volutpat maecenas volutpat. Dignissim sodales ut eu sem integer vitae justo eget. Ut pharetra sit amet aliquam id diam maecenas ultricies. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Vitae et leo duis ut diam. Nullam eget felis eget nunc lobortis. Quam adipiscing vitae proin sagittis nisl rhoncus. Ac turpis egestas maecenas pharetra convallis posuere morbi leo urna.</p>', 'upload/cf7eb9f783.jpg', 'Ahmed', 'java', '2020-04-17 08:15:24'),
(13, 19, 'Platinum league of legends', '<p>i went to platinum last season ggwp guyz it was great :D</p>', 'upload/cc1111763c.jpg', 'goku57', 'league, esports', '2020-04-18 07:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `twitter`, `ln`, `google`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(57) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Scholarship Finder', 'we find it for you', 'upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
