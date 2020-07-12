-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 02:02 PM
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
-- Database: `db_taxmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(300) NOT NULL,
  `cat_slug` varchar(300) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_slug`, `is_delete`) VALUES
(1, 'Nasional', 'nasional', 0),
(2, 'Politik', 'politik', 0),
(3, 'Ekonomi', 'ekonomi', 0),
(4, 'Tekno & Sains', 'tekno-sains', 0),
(5, 'Entertainment', 'entertainment', 0),
(6, 'Khazanah', 'khazanah', 0),
(7, 'Sport', 'sport', 0),
(8, 'Test', 'test', 1),
(9, 'Hello', 'hello', 1),
(10, 'hello', 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `comment`, `created_at`, `is_delete`) VALUES
(1, 1, 'balita', 'Helo', '2020-06-09 02:07:08', 0),
(2, 1, 'administrator', 'test', '2020-06-08 02:05:09', 0),
(3, 5, 'tamhor', 'tamhor', '2020-06-08 02:33:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_slug` varchar(300) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_lvl` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_public` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_cat_id`, `post_content`, `post_slug`, `post_img`, `post_lvl`, `user_id`, `created_at`, `is_public`, `is_delete`) VALUES
(1, 'Gojek-Grab Perang Tarif, Pengemudi Mati', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati', '1594470528-1-notrash.png', 0, 1, '2018-12-15 12:07:16', 1, 0),
(4, 'Gojek-Grab Perang Tarif, Pengemudi Mati di Tengah-Tengah', 1, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati-di-tengah-tengah', 'nosmoking.jpg', 2, 1, '2018-12-15 13:07:37', 1, 0),
(5, 'Google, Raksasa Teknologi dari Negeri Paman Sam', 2, '<p>Google adalah salah satu perusahaan multinasional yang berfokus pada pengembangan teknologi untuk kebutuhan bisnis dan korporasi. </p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo odit voluptates non at sunt molestias doloremque praesentium dolore sapiente tempore, possimus, quis tenetur accusamus. Deserunt dolore soluta eum architecto blanditiis.</p>', 'google-raksasa-teknologi-dari-negeri-paman-sam', 'nosmoking.jpg', 1, 2, '2018-12-15 13:08:32', 1, 0),
(6, 'Sample Post 2', 1, '<p>Just for sample</p>', 'sample-post-2', 'nosmoking.jpg', 1, 1, '2018-12-15 13:10:20', 1, 0),
(8, 'Sample Rohmat Hidayat', 1, '<p>Sample Rohmat Hidayat</p>', 'sample-rohmat-hidayat', 'sendiki.jpg', 2, 1, '2020-06-15 02:05:48', 1, 0),
(11, 'No Smoking', 3, '<p>No smoking</p>', 'no-smoking', 'nosmoking.jpg', 2, 1, '2020-06-16 13:19:16', 1, 0),
(12, 'No Trash', 6, '<p>Try No Trash Content</p>', 'no-trash', 'notrash.png', 1, 1, '2020-06-21 12:24:14', 1, 0),
(13, 'thumb', 3, '<p>thumb</p>', 'thumb', '1592714013-13-.png', 0, 1, '2020-06-21 12:31:08', 1, 0),
(14, 'Gojek-Grab Perang Tarif, Pengemudi Mati di Tengah-Tengah', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati-di-tengah-tengah', '1594450380-0-sendiki.jpg', 0, 1, '2020-07-11 13:53:00', 1, 0),
(15, 'Gojek-Grab Perang Tarif, Pengemudi Mati', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati', '1594466227-0-nosmoking.jpg', 0, 1, '2020-07-11 18:17:07', 0, 0),
(16, 'Gojek-Grab Perang Tarif, Pengemudi Mati', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati', '1594470511-0-notrash.png', 0, 1, '2020-07-11 19:28:31', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `sub_slug` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id`, `cat_id`, `sub_title`, `sub_slug`, `is_delete`) VALUES
(1, 1, 'hello', 'hello', 0),
(2, 1, 'hello-wworl', 'hello-wworl', 0),
(3, 4, 'Hello-Indonesia', 'hello-indonesia', 0),
(4, 4, 'Hello Aku', 'hello-aku', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`, `role`, `is_delete`) VALUES
(1, 'administrator', '$2y$10$s2J2wnAhjReRIDm1DoIdZeo1E6ekMFG0E/Hp3Y.hJ7G.eG.gcDwp6', 'Administrator', 'admin@admin.com', 1, 0),
(2, 'tamhor', '$2y$10$tzNsZOhpmuoiMUOvRXt5EuRRyKnA5B2KBNqMIwlWNe6gwZKIJbI7C', 'Rohmat Hidayat', 'tamhor.hidayat@gmail.com', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
