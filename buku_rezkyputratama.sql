-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 06:30 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_rezkyputratama`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertBuku` (IN `id_buku` VARCHAR(11), IN `id_kategori` VARCHAR(11), IN `judul` VARCHAR(100), IN `isbn` VARCHAR(11), IN `penerbit` VARCHAR(100), IN `penulis` VARCHAR(100))  NO SQL
BEGIN
START TRANSACTION; 
INSERT INTO buku VALUES(id_buku,id_kategori,judul,isbn,penerbit,penulis); 
COMMIT; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertKategori` (IN `id_kategori` VARCHAR(11), IN `kategori` VARCHAR(100))  NO SQL
BEGIN
 START TRANSACTION;
 INSERT INTO kategori VALUES(id_kategori,kategori);
 COMMIT;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `totalBuku` (`id_kategori_in` VARCHAR(11)) RETURNS INT(11) NO SQL
BEGIN
     DECLARE total_buku int(11);
         SELECT COUNT(buku.id_kategori) INTO total_buku FROM 
           buku WHERE buku.id_kategori=id_kategori_in;
     RETURN total_buku;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(11) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isbn` varchar(11) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `isbn`, `penerbit`, `penulis`) VALUES
('B002', 'K003', 'Laskar Pelangi', '123-423', 'PT. Jayaindo', 'Andera Hirata');

--
-- Triggers `buku`
--
DELIMITER $$
CREATE TRIGGER `hapusBuku` AFTER DELETE ON `buku` FOR EACH ROW BEGIN 
INSERT INTO log_buku (id_buku, aksi, tgl) VALUES (OLD.id_buku, 'HAPUS', CURRENT_TIME); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertBuku` AFTER INSERT ON `buku` FOR EACH ROW BEGIN
INSERT INTO log_buku (id_buku, aksi, tgl) VALUES (NEW.id_buku, 'TAMBAH', CURRENT_TIME);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateBuku` AFTER UPDATE ON `buku` FOR EACH ROW BEGIN
    INSERT INTO log_buku (id_buku, aksi, tgl) VALUES (NEW.id_buku, 'UPDATE', CURRENT_TIME);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('K001', 'Sejarah'),
('K002', 'Fiksi'),
('K003', 'Non-Fiksi'),
('K006', 'Cerita Rakyat');

-- --------------------------------------------------------

--
-- Table structure for table `log_buku`
--

CREATE TABLE `log_buku` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_buku`
--

INSERT INTO `log_buku` (`id`, `id_buku`, `aksi`, `tgl`) VALUES
(1, 'B001', 'TAMBAH', '2020-12-01'),
(2, 'B002', 'TAMBAH', '2020-12-01'),
(3, 'B001', 'UPDATE', '2020-12-01'),
(4, 'B001', 'HAPUS', '2020-12-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1`
-- (See below for the actual view)
--
CREATE TABLE `v1` (
`id_kategori` varchar(11)
,`kategori` varchar(100)
,`total_Buku` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v2`
-- (See below for the actual view)
--
CREATE TABLE `v2` (
`id_buku` varchar(11)
,`judul` varchar(100)
,`kategori` varchar(100)
,`isbn` varchar(11)
,`penerbit` varchar(100)
,`penulis` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v1`
--
DROP TABLE IF EXISTS `v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1`  AS  select `kategori`.`id_kategori` AS `id_kategori`,`kategori`.`kategori` AS `kategori`,`totalBuku`(`buku`.`id_kategori`) AS `total_Buku` from (`buku` join `kategori` on(`buku`.`id_kategori` = `kategori`.`id_kategori`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v2`
--
DROP TABLE IF EXISTS `v2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v2`  AS  select `buku`.`id_buku` AS `id_buku`,`buku`.`judul` AS `judul`,`kategori`.`kategori` AS `kategori`,`buku`.`isbn` AS `isbn`,`buku`.`penerbit` AS `penerbit`,`buku`.`penulis` AS `penulis` from (`buku` join `kategori` on(`kategori`.`id_kategori` = `buku`.`id_kategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_buku`
--
ALTER TABLE `log_buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_buku`
--
ALTER TABLE `log_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
