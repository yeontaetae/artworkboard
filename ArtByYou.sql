-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 20, 2023 at 05:53 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ArtByYou`
--

-- --------------------------------------------------------

--
-- Table structure for table `About`
--

CREATE TABLE `About` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text,
  `Story` text,
  `AboutImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `About`
--

INSERT INTO `About` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'A community of artists coming together to share personal work and consignment pieces for the general public. Do you have what it takes?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'files/allArt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Artists`
--

CREATE TABLE `Artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'Joe Anderson', 'files/artists/joeanderson.png', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, 'Pete Sanderson', 'files/artists/petesanderson.png', 'Animal Lover', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(3, 'Mary Major', 'files/artists/marymajor.png', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(4, 'Sue Kass', 'files/artists/suekass.png', 'Painter/Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(5, 'Tina Vax', 'files/artists/tinavax.png', 'Pottery', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(6, 'Alan Doyle', 'files/artists/alandoyle.png', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(7, 'Carl Palmer', 'files/artists/carlpalmer.png', 'Textiles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(8, 'Jane Lester', 'files/artists/janelester.png', 'Painter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Table structure for table `Artwork`
--

CREATE TABLE `Artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `ArtImage` varchar(100) DEFAULT NULL,
  `ThemeID` int(11) DEFAULT NULL,
  `ArtistID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artwork`
--

INSERT INTO `Artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'Baby', 'files/BlackandWhite/photo1_Joe.png', 6, 1),
(2, 'Building', 'files/BlackandWhite/photo2_Joe.png', 6, 1),
(3, 'Flower', 'files/BlackandWhite/photo3_Joe.png', 6, 1),
(4, 'Horse', 'files/BlackandWhite/photo4_Joe.png', 6, 1),
(5, 'Mouse', 'files/Animals/mouse_Pete.png', 1, 2),
(6, 'Birds', 'files/Animals/birds_Pete.png', 1, 2),
(7, 'Cat', 'files/Animals/cat_Pete.png', 1, 2),
(8, 'Christmas Dog', 'files/Animals/dog_Pete.png', 1, 2),
(9, 'Corgi', 'files/Animals/dog2_Pete.png', 1, 2),
(10, 'White Fox', 'files/Animals/fox_Pete.png', 1, 2),
(11, 'Iceberg', 'files/Water/water1_Mary.png', 4, 3),
(12, 'Dolphin', 'files/Water/water2_Mary.png', 4, 3),
(13, 'Boat', 'files/Water/water3_Mary.png', 4, 3),
(14, 'Rock', 'files/Water/water4_Mary.png', 4, 3),
(15, 'Parasol', 'files/Water/water5_Mary.png', 4, 3),
(16, 'Sailing', 'files/Water/water6_Mary.png', 4, 3),
(17, 'Shark', 'files/Water/water7_Mary.png', 4, 3),
(18, 'Brown', 'files/Paintings/painting1_Sue.png', 5, 4),
(19, 'Yellow Flower', 'files/Paintings/painting2_Sue.png', 5, 4),
(20, 'Sapphire', 'files/Paintings/painting3_Sue.png', 5, 4),
(21, 'Brown Grass', 'files/Paintings/painting4_Sue.png', 5, 4),
(22, 'Fire', 'files/Paintings/painting5_Sue.png', 5, 4),
(23, 'White Wood', 'files/Paintings/painting6_Sue.png', 5, 4),
(24, 'Red Flower', 'files/Flowers/flower1_Sue.png', 3, 4),
(25, 'Purple Flower', 'files/Flowers/flower2_Sue.png', 3, 4),
(26, 'Red Bouquet', 'files/Flowers/flower3_Sue.png', 3, 4),
(27, 'Diversity', 'files/Crafts/pottery1_Tina.png', 2, 5),
(28, 'Grey Pottery', 'files/Crafts/pottery2_Tina.png', 2, 5),
(29, 'White Pottery', 'files/Crafts/pottery3_Tina.png', 2, 5),
(30, 'Rainbow Pottery', 'files/Crafts/pottery4_Tina.png', 2, 5),
(31, 'White and Blue', 'files/Crafts/pottery5_Tina.png', 2, 5),
(32, 'Sunflower', 'files/Flowers/flower1_Alan.png', 3, 6),
(33, 'Sunflower Bouquet', 'files/Flowers/flower2_Alan.png', 3, 6),
(34, 'Pink Flower', 'files/Flowers/flower3_Alan.png', 3, 6),
(35, 'White Bouquet', 'files/Flowers/flower4_Alan.png', 3, 6),
(36, 'Pink Bouquet', 'files/Flowers/flower5_Alan.png', 3, 6),
(37, 'White Flower', 'files/Flowers/flower6_Alan.png', 3, 6),
(38, 'Flower Textile', 'files/Crafts/textile1_Carl.png', 2, 7),
(39, 'White Pink', 'files/Crafts/textile2_Carl.png', 2, 7),
(40, 'Three Colour', 'files/Crafts/textile3_Carl.png', 2, 7),
(41, 'Rainbow Textile', 'files/Crafts/textile4_Carl.png', 2, 7),
(42, 'World', 'files/Crafts/textile5_Carl.png', 2, 7),
(43, 'Bracelets', 'files/Crafts/textile6_Carl.png', 2, 7),
(44, 'Purple', 'files/Paintings/painting1_Jane.png', 5, 8),
(45, 'Palette', 'files/Paintings/painting2_Jane.png', 5, 8),
(46, 'Orange Wall', 'files/Paintings/painting3_Jane.png', 5, 8),
(47, 'Sunset', 'files/Paintings/painting4_Jane.png', 5, 8),
(48, 'Sky', 'files/Paintings/painting5_Jane.png', 5, 8),
(49, 'Yellow Wall', 'files/Paintings/painting6_Jane.png', 5, 8),
(51, 'Water', 'files/Water/water9.png', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Signin`
--

CREATE TABLE `Signin` (
  `UserID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Signin`
--

INSERT INTO `Signin` (`UserID`, `ArtistID`, `Username`, `Password`) VALUES
(1, 1, 'jemwo', 'fowihe293'),
(2, 3, 'eifjw', 'abei234'),
(3, 6, 'wheoh', 'ihfo234'),
(4, 4, 'wheofh', 'wiefh393'),
(5, 5, 'owoqi', 'oooo2222');

-- --------------------------------------------------------

--
-- Table structure for table `Themes`
--

CREATE TABLE `Themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Themes`
--

INSERT INTO `Themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Animals', 'files/Animals/dog_Pete.png'),
(2, 'Crafts', 'files/Crafts/pottery1_Tina.png'),
(3, 'Flowers', 'files/Flowers/flower2_Alan.png'),
(4, 'Water', 'files/Water/water1_Mary.png'),
(5, 'Paintings', 'files/Paintings/painting2_Sue.png'),
(6, 'Black and White', 'files/BlackandWhite/photo1_Joe.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `Artwork`
--
ALTER TABLE `Artwork`
  ADD PRIMARY KEY (`ArtID`),
  ADD KEY `ThemeID` (`ThemeID`),
  ADD KEY `ArtistID` (`ArtistID`);

--
-- Indexes for table `Signin`
--
ALTER TABLE `Signin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `ArtistID` (`ArtistID`);

--
-- Indexes for table `Themes`
--
ALTER TABLE `Themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `About`
--
ALTER TABLE `About`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Artists`
--
ALTER TABLE `Artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Artwork`
--
ALTER TABLE `Artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `Signin`
--
ALTER TABLE `Signin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Themes`
--
ALTER TABLE `Themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Artwork`
--
ALTER TABLE `Artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`ThemeID`) REFERENCES `Themes` (`ThemeID`),
  ADD CONSTRAINT `artwork_ibfk_2` FOREIGN KEY (`ArtistID`) REFERENCES `Artists` (`ArtistID`);

--
-- Constraints for table `Signin`
--
ALTER TABLE `Signin`
  ADD CONSTRAINT `signin_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `Artists` (`ArtistID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
