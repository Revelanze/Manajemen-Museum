-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2026 at 01:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museum_nusantara`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sejarah'),
(2, 'Arkeologi'),
(3, 'Seni');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_koleksi` varchar(100) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `id_kategori`, `nama_koleksi`, `asal`, `tahun`, `deskripsi`, `foto`) VALUES
(1, 3, 'Keris Bali', 'Bali', '1800', 'Keris peninggalan Kerajaan Gelgel', '1782984997_Keris Bali.jpg'),
(2, 3, 'Topeng Barong', 'Bali', '1890', ' mahakarya seni ukir dan budaya spiritual yang melambangkan kebaikan, kekuatan pelindung, dan keseimbangan', '1782984975_topeng barong.jpg'),
(3, 3, 'Wayang Kulit Purwa', 'Yogyakarta', '1820', 'Wayang Kulit Purwa adalah seni pertunjukan teater bayangan tradisional Jawa di mana tokoh-tokohnya terbuat dari kulit tatahan. Kesenian ini menceritakan kisah-kisah epik Hindu klasik, utamanya wiracarita Mahabharata dan Ramayana. Kata \"purwa\" berasal dari bahasa Jawa Kuno yang berarti \"awal\" atau \"pertama\"', '1782984951_wayang kulit.jpg'),
(4, 2, 'Patung Ganesha', 'Jawa Timur', '13000', 'Patung Ganesha adalah representasi visual dari Dewa Ganesha dalam agama Hindu. Dewa ini dikenal sebagai dewa pelindung, ilmu pengetahuan, kebijaksanaan, dan penghalau segala rintangan. Patung ini umumnya digambarkan sebagai sosok berbadan manusia dengan kepala gajah, memiliki perut buncit, dan berlengan empat.', '1782984887_patung ganesha.jpg'),
(5, 2, 'Prasasti Ciaruteun', 'Jawa Barat ', '450', 'Prasasti Ciaruteun adalah peninggalan bersejarah dari Kerajaan Tarumanegara (abad ke-5 M) yang terletak di Kabupaten Bogor, Jawa Barat. Benda cagar budaya ini terkenal dengan pahatan sepasang telapak kaki Raja Purnawarman, serta tulisan beraksara Pallawa berbahasa Sanskerta yang memuji sang raja sebagai titisan Dewa Wisnu. ', '1782984861_Prasasti Ciaruteun.jpg'),
(6, 2, 'Nekara Perunggu ', 'Nusa Tenggara TImur', '1000', 'Nekara dan moko adalah artefak peninggalan Zaman Logam (Zaman Perundagian) yang berupa gendang atau drum perunggu. Nekara berukuran besar dan menyerupai dandang terbalik, sedangkan moko adalah sebutan lokal untuk nekara berukuran lebih kecil yang banyak ditemukan dan disakralkan di daerah Alor, Nusa Tenggara Timur', '1782984786_nekara perunggu moko.jpg'),
(7, 2, 'Arca Buddha Dipangkara', 'Sulawsi Selatan', '200', 'Arca Buddha Dipangkara (juga dikenal sebagai Arca Buddha Sempaga) adalah arca Buddha tertua dan arca perunggu berdiri terbesar di Indonesia, yang berasal dari abad ke-2 Masehi. Ditemukan di Sulawesi, arca ini merupakan bukti sejarah penting mengenai pelayaran kuno dan jejak awal kontak antara India dan Nusantara', '1782984682_arca buddha dipangkara.jpg'),
(8, 1, 'Naskah Khotbah Kuno Pangeran Diponogoro', 'Jawa Tengah ', '1825', 'naskah khotbah kuno Pangeran Diponegoro merujuk pada catatan pribadi beliau atau pandangan-pandangan spiritual dan politis yang tertuang dalam Babad Diponegoro—autobiografi setebal 1.150 halaman yang ditulis beliau dalam pengasingan. ', '1782984637_Naskah Khotbah Kuno Pangeran Diponogoro.png'),
(9, 1, 'Meriam Cetbang', 'Jawa Timur', '1400', 'Meriam Cetbang (awalnya dikenal sebagai bedil atau warastra) adalah senjata api meriam yang diproduksi dan digunakan oleh Kerajaan Majapahit pada abad ke-14. Menjadi teknologi militer mutakhir yang diinisiasi sejak era Gajah Mada, cetbang dikenal sebagai senjata sihir api petir yang sangat ditakuti oleh lawan-lawan Majapahit', '1782984622_Meriam Cetbang.jpg'),
(10, 1, 'Koin Emas Kesultanan Aceh', 'Aceh', '1600', 'Koin emas Kesultanan Aceh Darussalam, yang dikenal dengan nama Deureuham (Dirham), adalah mata uang emas murni yang menjadi bukti kemajuan ekonomi dan sistem moneter kesultanan pada abad ke-16 hingga ke-17. Koin ini tidak hanya berlaku di Aceh, tetapi juga diakui secara internasional dalam jalur perdagangan Nusantara', '1782984606_Koin emas Kesultanan aceh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `alamat`, `no_hp`) VALUES
(2, 'Deva', 'Bangli', '08198765432'),
(3, 'Gungwah', 'Denpasar', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_pengunjung` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_tiket` varchar(30) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_pengunjung`, `tanggal`, `jenis_tiket`, `jumlah`, `harga`, `total`) VALUES
(2, 2, '2026-06-28', 'Dewasa', 3, 50000, 150000),
(3, 3, '2026-06-28', 'Dewasa', 1, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `koleksi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
