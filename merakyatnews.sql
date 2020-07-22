-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2020 at 06:22 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benr9228_merakyatnews`
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
(1, 'Daerah', 'daerah', 0),
(2, 'Nasional', 'nasional', 0),
(3, 'Ekonomi', 'ekonomi', 0),
(4, 'Politik', 'politik', 0),
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
(1, 'Gojek-Grab Perang Tarif, Pengemudi Mati', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati', '1594470528-1-notrash.png', 0, 1, '2018-12-15 12:07:16', 1, 1),
(4, 'Gojek-Grab Perang Tarif, Pengemudi Mati di Tengah-Tengah', 1, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati-di-tengah-tengah', 'nosmoking.jpg', 2, 1, '2018-12-15 13:07:37', 1, 1),
(5, 'Google, Raksasa Teknologi dari Negeri Paman Sam', 2, '<p>Google adalah salah satu perusahaan multinasional yang berfokus pada pengembangan teknologi untuk kebutuhan bisnis dan korporasi. </p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo odit voluptates non at sunt molestias doloremque praesentium dolore sapiente tempore, possimus, quis tenetur accusamus. Deserunt dolore soluta eum architecto blanditiis.</p>', 'google-raksasa-teknologi-dari-negeri-paman-sam', 'nosmoking.jpg', 1, 2, '2018-12-15 13:08:32', 1, 1),
(6, 'Sample Post 2', 1, '<p>Just for sample</p>', 'sample-post-2', 'nosmoking.jpg', 1, 1, '2018-12-15 13:10:20', 1, 1),
(8, 'Sample Rohmat Hidayat', 1, '<p>Sample Rohmat Hidayat</p>', 'sample-rohmat-hidayat', 'sendiki.jpg', 2, 1, '2020-06-15 02:05:48', 1, 1),
(11, 'No Smoking', 3, '<p>No smoking</p>', 'no-smoking', 'nosmoking.jpg', 2, 1, '2020-06-16 13:19:16', 1, 1),
(12, 'No Trash', 6, '<p>Try No Trash Content</p>', 'no-trash', 'notrash.png', 1, 1, '2020-06-21 12:24:14', 1, 1),
(13, 'thumb', 3, '<p>thumb</p>', 'thumb', '1592714013-13-.png', 0, 1, '2020-06-21 12:31:08', 1, 1),
(14, 'Gojek-Grab Perang Tarif, Pengemudi Mati di Tengah-Tengah', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati-di-tengah-tengah', '1594450380-0-sendiki.jpg', 0, 1, '2020-07-11 13:53:00', 1, 1),
(15, 'Gojek-Grab Perang Tarif, Pengemudi Mati', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati', '1594466227-0-nosmoking.jpg', 0, 1, '2020-07-11 18:17:07', 0, 1),
(16, 'Gojek-Grab Perang Tarif, Pengemudi Mati', 2, '<p>Menjelang Ramadan 2015, Go-Jek, aplikasi ride-sharing yang baru berumur sekitar enam bulan, meluncurkan program “Ceban Menjelang Ramadhan”. Melalui program itu, pengguna Go-Ride dapat diantarkan ke tujuannya masing-masing —tak lebih dari 25 kilometer— hanya dengan ongkos Rp10 ribu. Strategi promosi tersebut sukses. </p><p><br></p><p>\"Saking banyaknya orang yang menggunakan promo itu, Go-Jek meledak jadi layanan aplikasi no. 1 di Jakarta. Kami ikut kaget,” ujar pendiri Go-Jek, Nadiem Makarim. </p><p><br></p><p>Secara umum, komponen tarif Go-Ride terdiri dari tarif dasar dan tarif per kilometer. Tarif dasar adalah tarif rata berbatas jarak tertentu. Pada 2015, jarak 0-6 kilometer dihargai Rp15 ribu. Kini, berdasarkan ujicoba aplikasi Go-Ride untuk bepergian dari kawasan Kemang Timur Raya ke berbagai variasi lokasi, tarif 0-5 kilometer dipatok Rp8 ribu. Sementara tarif per kilometer ialah tarif tambahan yang diberlakukan jika pengguna melebihi ketentuan jarak dari tarif dasar.</p><p><br></p><p>Naik-turun tarif Go-Jek merentang jauh hingga awal kemunculan aplikasi yang kini bertitel Unicorn. Tiga bulan selepas promo “Ceban Menjelang Ramadhan” digulirkan, Go-Ride mengubah tarifnya. Tepat pada September 2015, Go-Ride memberlakukan tarif sebesar Rp15 ribu untuk 6 kilometer pertama di jam-jam sibuk. Lebih dari 6 kilometer, pengguna dibebankan biaya sebesar Rp2.500 tiap tambahan kilometer. Di luar jam-jam sibuk, pengguna Go-Ride kena tarif rata sebesar Rp15 ribu untuk jarak maksimal 25 kilometer.</p><p><br></p><p>Di awal kemunculannya, Go-Ride mematok tarif per kilometer sebesar Rp4.000. Namun, seiring waktu, tarif Go-Ride per kilometer itu terus mengalami perubahan. Pada 2018, tarif per kilometer Go-Ride mengalami beberapa kali perubahan. Pada Juni 2018, tarif per kilometernya dipatok Rp2.200 hingga Rp3.300. Sejak November, tarifnya Rp1.200 per kilometer.</p><p><br></p>', 'gojek-grab-perang-tarif-pengemudi-mati', '1594470511-0-notrash.png', 0, 1, '2020-07-11 19:28:31', 0, 1),
(17, 'Pemakaman Pasien COVID-19 di Blitar Tanpa APD Layak, Ini Kata Gustug', 2, '<p><strong style=\"color: rgb(0, 0, 0);\">Blitar</strong><span style=\"color: rgb(0, 0, 0);\"> - </span>Gugus tugas<a href=\"https://www.detik.com/tag/covid_19\" target=\"_blank\" style=\"color: rgb(33, 64, 154);\"> COVID-19 </a>Blitar mengakui kebenaran video viral pemakaman jenazah Corona tanpa APD layak. Namun gugus tuga menyatakan jika pengurukan tanah makam yang dilakukan warga masih aman.</p><p>Jubir Gugus Tugas COVID-19 Pemkab Blitar Krisna Yekti menjelaskan video itu benar lokasinya di TPU Satreyan Kecamatan Kanigoro. Waktunya pada Minggu (19/7) sore hari, karena ada jenazah dari rumah sakit swasta yang terkonfirmasi positif Corona.</p><p>\"Video itu benar. Dan Lokasinya di Satreyan. Saya sudah menanyakan ke pihak rumah sakit swasta itu. Mereka merupakan rumah sakit penyangga penanganan Corona. Dan memang benar, mereka tidak menguruk tanah makam,\" kata Krisna kepada detikcom, Rabu (22/7/2020).</p><p>Apa yang dilakukan petugas rumkit itu, lanjutnya, sudah sesuai standar operasi (SOP) penanganan jenazah Corona. Mereka memakai <a href=\"https://www.detik.com/tag/covid_19\" target=\"_blank\" style=\"color: rgb(33, 64, 154);\">APD lengkap</a>, mengangkat peti jenazah sampai memasukkannya ke liang lahat.</p><p>\"Mereka sudah menyerahkan pengurukan tanah makam ke warga. Karena memang aman lho kalau tinggal menguruk tanah untuk menutup makam saja. Kan petinya sudah dibungkus plastik dengan rapat. Mereka yang nguruk juga tidak menyentuh peti matinya. Jadi yang dilakukan warga itu sudah aman dengan membungkus tangan dan kaki memakai kantong plastik,\" tandasnya.</p><p>Krisna mengaku memahami ketakutan masyarakat akan paparan virus Corona dari pemakaman itu. Namun kembali dia menandaskan, apa yang dilakukan petugas kesehatan sudah sesuai dengan protap Corona. Lalu tanggung jawab siapa sesungguhnya proses penggalian dan pengurukan makam jenazah positif Corona ?</p>', 'pemakaman-pasien-covid-19-di-blitar-tanpa-apd-layak-ini-kata-gustug', '1595401537-17-Sampel.jpeg', 2, 1, '2020-07-22 13:18:16', 1, 0),
(18, 'Stimulus Jumbo Rp 12.400 T Uni Eropa Lawan Corona', 1, '<p><strong style=\"color: rgb(0, 0, 0);\">Jakarta</strong><span style=\"color: rgb(0, 0, 0);\"> - </span>Para pemimpin negara Eropa sepakat untuk menciptakan dana pemulihan US$ 858 miliar (€750 miliar) untuk membangun kembali ekonomi Uni Eropa dari hantaman virus Corona.</p><p>Bila dirupiahkan dengan kurs dolar Amerika Serikat sebesar Rp 14.500, dana pemulihan ekonomi Uni Eropa ini jumlahnya mencapai Rp 12.441 triliun.</p><p>\"Ini adalah paket ambisius dan komprehensif yang menggabungkan anggaran klasik dengan upaya pemulihan luar biasa yang ditakdirkan untuk mengatasi dampak dari krisis yang belum pernah terjadi sebelumnya demi kepentingan terbaik Uni Eropa,\" kata para pemimpin UE dalam deklarasi bersama, dikutip dari <em>CNN</em>, Rabu (22/7/2020).</p><p>Komisi Eropa akan meminjam uang itu di pasar keuangan dan mendistribusikan US$ 446 miliar di antaranya sebagai hibah kepada negara-negara Uni Eropa yang paling terpukul ekonominya. Sisanya disediakan sebagai pinjaman.</p><p>Para pemimpin Eropa juga menyetujui anggaran Uni Eropa baru hampir US$ 1,3 triliun untuk 2021-2027. Anggaran ini akan menciptakan kekuatan belanja gabungan sekitar US$ 2 triliun.</p><p>Kesepakatan itu berfokus pada penyediaan dana pada tiga pilar. Mulai dari membantu bisnis pulih dari pandemi, meluncurkan langkah-langkah baru untuk reformasi ekonomi dalam jangka panjang, dan berinvestasi untuk membantu melindungi terhadap krisis masa depan.</p><p>\"Ini kesepakatan yang bagus, ini kesepakatan yang kuat, dan yang paling penting, ini adalah kesepakatan yang tepat untuk Eropa saat ini,\" kata Presiden Dewan Eropa Charles Michel.</p><p>Michel mengatakan ini adalah pertama kalinya para anggota Uni Eropa bersama-sama menegakkan ekonomi kita melawan krisis.</p><p>\"Kami berhasil! Eropa kuat. Eropa bersatu,\" tegas Michel.</p><p>Uni Eropa saat ini berjuang melawan resesi yang dipicu oleh pandemi. Negara-negara yang paling terpukul seperti Italia dan Spanyol sangat membutuhkan bantuan ekonomi baru.</p><p>Komisi Eropa mengatakan awal bulan ini mereka memprediksi ekonomi Uni Eropa menyusut 8,3% pada tahun 2020. Jauh lebih buruk daripada penurunan 7,4% yang diprediksi dua bulan lalu.</p>', 'stimulus-jumbo-rp-12400-t-uni-eropa-lawan-corona', '1595399387-18-uni_eropa.jpeg', 1, 1, '2020-07-22 13:20:25', 1, 0),
(19, 'Kemenag Seluma Tetapkan Besaran Zakat Fitrah', 2, '<p><span style=\"color: rgb(34, 34, 34);\">Seluma- Kementerian Agama Kabupaten Seluma bersama Pemerintah Kabupaten Seluma, Dinas Perindagkop, Kabag Kesra, MUI, BAZNAS, dan juga organisasi keislaman, telah usai melakukan rapat terbatas untuk membahas besaran pembayaran zakat fitrah di Seluma.</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">Dimana berdasarkan hasil rapat tersebut, bahwa dilihat dari situasi dan kondisi seperti saat ini, untuk tertinggi pembayaran zakat fitrah Rp 35 ribu.</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">\"Berdasarkan hasil bersama, maka untuk yang tertinggi disesuaikan dengan harga beras saat ini, adalah Rp 35 ribu, untuk menengah Rp 30 ribu dan terendah Rp 25 ribu,\" ungkap Herman Yatim, Kepala Kemenag Seluma, Selasa (21/04).</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">Hasil rapat ini nantinya, akan disampaikan hingga kepada seluruh desa yang ada di Seluma. Guna untuk diketahui oleh seluruh masyarakat Seluma, sehingga untuk pembayaran zakat fitrah nantinya sudah dapat diketahui oleh seluruh masyarakat.</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">\"Nanti akan kita buat surat edaran, sehingga akan kita sampaikan ke seluruh pelosok desa di Kabupaten Seluma,\" imbuhnya.</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">Sementara itu, sejak masuk pada satu Ramadhan yang nantinya akan ditentukan oleh Pemerintah pusat. Maka seluruh masyarakat Seluma sudah dapat membayarkan zakat, serta untuk seluruh panitia bisa mengumpulkan zakat.</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">\"Mulai ditetapkan satu Ramadhan, nanti sudah dapat mengumpulkan zakat fitrah,\" ujarnya.</span></p><p><br></p><p><span style=\"color: rgb(34, 34, 34);\">(Kaka004)</span></p>', 'kemenag-seluma-tetapkan-besaran-zakat-fitrah', '1595400692-0-WhatsApp_Image_2020-06-10_at_20_38_54.jpeg', 2, 1, '2020-07-22 13:51:32', 1, 0),
(20, 'Kemenparekraf Salurkan Bantuan Untuk Masyarakat Kota Bengkulu', 2, '<p>MerakyatNews.com, Bengkulu - Pemerintah Kota (Pemkot) Bengkulu menerima kunjungan dari Tim Deputi Kementerian Pariwisata dan Ekonomi Kreatif (Kemenparekraf) Republik Indonesia dalam rangka menyalurkan bantuan berupa paket bahan pokok bagi pelaku usaha pariwisata dan ekonomi kreatif yang terdampak Covid-19. </p><p><br></p><p>Saat kunjungan Direktur Pemasaran Pariwisata Regional II Deputi Kemenparekraf yang diwakili Kasubdit Pemasaran Pariwisata Regional III Dadang Jatmika, bertemu Walikota Bengkulu Helmi Hasan didampingi Wakil Walikota Bengkulu Dedy Wahyudi, menyampaikan bahwa bantuan tersebut adalah wujud kepedulian pemerintah terhadap masyarakat Kota Bengkulu. </p><p><br></p><p>“Semoga dengan adanya bantuan ini bisa membantu dan bermanfaat bagi para pelaku usaha ditengah pandemi Covid-19 ini untuk membangkitkan kembali perekonomian terutama masyarakat menengah ke bawah yang ada di Kota Bengkulu,” ujar Dadang di Balai Kota Bengkulu pada Rabu 22 Juli 2020. </p><p><br></p><p>Ditempatkan yang sama Dewi Coryati saat mendampingi Helmi Hasan, sangat mengapresiasi kinerja Walikota dan Wakilnya dalam menangani dampak Covid-19 di tengah-tengah masyarakat Kota Bengkulu.</p><p><br></p><p>“Alhamdulillah kita memiliki pemimpin yang luar biasa tanpa diminta Walikota dan Wakil Walikota Bengkulu langsung menindaklanjuti dampak terjadinya Covid-19 dengan langsung memberikan bantuan beras dan mie instan untuk masyarakat dengan menargetkan 100 persen warganya mendapatkan bantuan,” ujar Dewi.</p><p><br></p><p>Bantuan tersebut, sambung Dewi, merupakan kepedulian Pemerintah Pusat dalam mewujudkan kebahagiaan masyarakat Kota Bengkulu dibidang sektor pariwisata dan ekonomi kreatif.</p><p><br></p><p>“Bantuan ini bertujuan guna membangkitkan kembali semangat para pelaku usaha pariwisata dan ekonomi kreatif serta meningkatkan pendapatan anggaran daerah (PAD) dengan memberikan perhatian menyalurkan bantuan balasan (bantuan pokok, lauk siap saji) kurang lebih sebanyak 1000 bantuan untuk Kota Bengkulu dan semangat dalam menata kehidupan di era new normal ini,” jelas Dewi.</p><p><br></p><p>Ditempat yang sama Helmi Hasan Walikota dua periode ini mengucapakan ribuan terimakasih kepada Pemerintah pusat yang telah memperhatikan masyarakat Kota Bengkulu yang terdampak langsung pandemi Covid-19.</p><p><br></p><p>“Alhamdulillah hari ini kita mendapat bantuan bahan pokok dari Kemenparekraf dan kehadiran Ibu Dewi Coryati selaku anggota DPR RI yang terus menjalin kerjasama dengan Kemenparekraf untuk fokus memperhatikan para pelaku usaha sektor pariwisata dan ekonomi kreatif di Indonesia terutama di Kota Bengkulu,” ujar Helmi.</p><p><br></p><p>Diketahui, Bantuan tersebut berupa bahan pokok dari Kemenparekraf sebanyak 2800 yang akan disalurkan di Kota Bengkulu, Kabupaten Rejang Lebong dan Kabupaten Bengkulu Tengah. </p><p><br></p><p>Pertemuan tersebut turut hadir Direktur Komunikasi Pemasaran Pariwisata diwakili Kasubdit Strategi Komunikasi dan Kemitraan Kemenparekraf Ahmad Dedi Kurnia, Anggota DPR RI Komisi X Dewi Coryati, Ketua Komisi II DPRD Kota Bengkulu Indra Sukma, Anggota DPRD Kota Bengkulu Komisi III Heri Manto dan beberapa Organisasi Perangkat Daerah (OPD) Kota Bengkulu. [Soprian]</p>', 'kemenparekraf-salurkan-bantuan-untuk-masyarakat-kota-bengkulu', '1595400914-0-WhatsApp_Image_2020-07-22_at_13_48_42.jpeg', 2, 1, '2020-07-22 13:55:14', 1, 0),
(21, 'Terdampak Pandemi, Ini Saatnya Digitalisasi UMKM', 3, '<p><strong style=\"color: rgb(0, 0, 0);\">Jakarta</strong><span style=\"color: rgb(0, 0, 0);\"> - Dampak pandemi COVID-19 di Indonesia tak hanya menyerang sektor kesehatan. Ekonomi termasuk Usaha Mikro Kecil Menengah (UMKM) pun tak luput dari \'serangan\' virus Corona ini.</span>Padahal UMKM merupakan salah satu penopang ekonomi terbesar di Indonesia. Seorang peneliti in Mind Institute mengungkapkan, UMKM mampu menyerap 96% tenaga kerja di Indonesia. Dengan serapan tenaga kerja sebesar itu maka bila sektor UMKM terganggu akan berdampak pada masyarakat yang banyak kehilangan pekerjaan.</p><p>Berdasarkan data Kementerian Koperasi dan UKM, sebanyak 98% usaha pada level mikro atau sekitar 63 juta terkena dampak pandemi COVID-19. Jumlah ini terus meningkat seiring waktu pembatasan interaksi masyarakat.</p><p>Bahkan menurut catatan Organisation for Economic Co-operation and Development (OECD) hampir separuh UMKM di Indonesia akan bangkrut pada Desember 2020. Agar hal tersebut tak terjadi, UMKM perlu berbenah dan mencari jalan untuk tetap bisa bertahan di tengah gempuran pandemi ini.</p><p>Pemerintah pun tengah berusaha membantu keberlangsungan UMKM melalui beberapa skema ini. Ada bantuan langsung tunai (BLT), Kartu Prakerja untuk UMKM yang masuk kategori miskin dan rentan.</p><p>Ada pula pemberian insentif perpajakan untuk UMKM yang omzetnya di bawah Rp 4,8 miliar per tahun serta pemberian relaksasi dan restrukturisasi kredit UMKM dengan berbagai program.</p><p>Selain bantuan dari pemerintah, salah satu kunci untuk pertahankan usaha di tengah situasi seperti ini adalah dengan memanfaatkan <em>platform</em> digital. Mengingat di tengah masa pandemi ini, saat semua orang di rumah saja, hampir seluruh aktivitas dilakukan secara digital.</p><p>Mengintegrasikan UMKM dengan ekosistem digital memang tak semudah menjentikkan jari. Saat ini UMKM yang sudah terhubung dengan ekosistem digital baru 13% atau sekitar 8 jutaan saja. Inilah saatnya 87% UMKM di Indonesia mulai <em>go digital</em> agar bisa bertahan.</p><p>Namun perlu diwaspadai ada banyak kejahatan yang berada di dunia digital seperti peretasan atau hacking hingga penyalahgunaan data pribadi. Banyaknya <em>cyber crime</em> yang ada di dunia maya ini membuat para pelaku UMKM yang ingin <em>go digital </em>harus ekstra waspada.</p><p>Apalagi di tengah pandemi seperti saat ini, di saat banyak orang yang <em>work from home</em> (WFH) ada banyak sekali kasus peretasan yang bermunculan. Pakar <em>cyber security</em> seperti yang berasal dari <em>Cyber security</em> dan Infrastructure Security Agency (CISA) di Amerika Serikat melihat peningkatan dalam kasus peretas yang memangsa pekerja jarak jauh.</p><p>Untuk mencegah kejahatan tersebut, Anda bisa gunakan produk jaringan dan komunikasi teknologi yang aman dari Cisco System (Cisco). <a href=\"https://ad.doubleclick.net/ddm/clk/471307951;277214130;z\" target=\"_blank\" style=\"color: rgb(33, 64, 154);\">Cisco</a> menjual jaringan dan komunikasi teknologi, peralatan dan pelayanan transportasi untuk transportasi data, suara dan video ke seluruh dunia.</p><p>Adapun beberapa produknya, antara lain router, switch, network access, IP telephony, keamanan, jaringan fiber optik, jaringan data center, jaringan via sinyal, jaringan untuk rumah, dukungan layanan teknis, dan pelayanan jaringan.</p><p>Keamanan adalah hal utama bagi produk-produk Cisco. Oleh karena itu, Cisco ingin membantu para UMKM di Indonesia mendapatkan teknologi untuk meningkatkan keamanan bisnis mereka.</p><p>Cisco juga menyediakan lisensi gratis yang bisa diperpanjang untuk empat teknologi keamanan utama yang dirancang untuk melindungi pekerja jarak jauh. Keempat teknologi keamanan utama tersebut antara lain sebagai berikut.</p><p><strong>Cisco Umbrella</strong> yang mampu melindungi pengguna dari tujuan Internet berbahaya baik mereka ada di dalam atau di luar jaringan.</p><p><strong>Duo Security</strong> yang akan memverifikasi identitas pengguna dan membangun kepercayaan perangkat sebelum memberikan akses ke aplikasi.</p><p><strong>Cisco Any Connect Secure Mobility</strong> Klien yang memberdayakan karyawan untuk bekerja dari mana saja dengan laptop perusahaan atau perangkat seluler pribadi.</p><p><strong>Cisco Advanced Malware Protection</strong> <strong>(AMP) </strong>sebagai <em>end point</em> untuk mencegah pelanggaran dan memblokir <em>malware</em> di titik masuk.</p><p>Teknologi dari Cisco yang telah dipaparkan di atas bisa menjadi solusi bagi Anda para pengusaha UMKM yang ingin merintis usaha ke ranah digital tapi masih takut untuk memulai karena keamanan dunia <em>cyber</em>.</p><p>Cisco juga tak hanya melindungi situs web Anda dari para <em>hacker</em>, tapi juga mampu melindungi data perusahaan serta data pribadi pelanggan Anda. Dengan keamanan tingkat tinggi ini bisa meningkatkan kepercayaan <em>customer</em> dalam bertransaksi di situs web yang Anda miliki.</p><p>Selain keamanan, kunci membangun sebuah usaha ke ranah digital yaitu koordinasi antar sesama rekan kerja. Kebutuhan ini pun tak luput dari perhatian Cisco. Melalui produk kolaborasi Cisco Webex, pengguna bisa melakukan <em>video call</em> dan tetap terhubung dengan rekan kerja untuk berkoordinasi membangun usaha di mana saja dan kapan saja.</p><p>Jadi nggak ada alasan lagi sulit bekerja dari rumah. Melalui Cisco Webex Anda bisa tetap terhubung dengan rekan kerja sebaik saat Anda bekerja dari kantor. Anda bisa melakukan <em>meeting</em>, konferensi bisnis, presentasi, dari rumah dengan perangkat apapun yang Anda miliki.</p><p>Cisco Webex memiliki kamera 4K dengan lingkup pandang 120 derajat serta <em>built in mic speaker</em> yang bisa membuat video <em>confference </em>Anda makin berkualitas, jernih, tanpa gangguan baik gambar maupun suaranya.</p><p>Ada banyak pilihan Cisco Webex yang bisa Anda gunakan. Webex Room USB, misalnya, sangat fleksibel digunakan untuk mengadakan sebuah <em>video confference</em> dengan adanya koneksi USB langsung ke laptop atau perangkat Anda. Sedangkan Webex DX60 dengan HD Camera, <em>built in mic</em> <em>speaker</em>, serta layar sentuh akan sangat memudahkan Anda melakukan <em>confference bussines</em> class di rumah saja.</p><p>Cisco Webex juga sangat mudah digunakan atau dioperasikan dengan tampilan yang simpel serta kualitas video yang jernih. Selain itu, Anda juga tak perlu khawatir soal keamanannya karena Cisco Webex memproteksi segala data pribadi, akun, hingga percakapan dalam video confference yang Anda lakukan. Dengan begitu, kerja WFH di mana pun Anda berada jadi makin mudah, kan?</p><p>Solusi soal keamanan serta kemudahan dalam terhubung dengan rekan kerja telah diberikan Cisco. Namun ada satu hal lagi yang tak kalah penting dalam mendukung para UMKM bekerja secara <em>mobile</em> yaitu <em>networking </em>atau jaringan internet yang lancar.</p><p>Jika bekerja di kantor, Anda mungkin akan mendapatkan fasilitas internet cepat, perangkat dan kemudahan berkomunikasi dengan <em>partner </em>kerja. Namun di masa pandemi, saat pembatasan interaksi harus dilakukan memaksa wirausahawan bekerja dari rumah.</p><p>Namun Anda tak perlu khawatir, karena Cisco juga menawarkan produk-produk terbaiknya dari mulai <em>wireless internet</em>, router WiFi, hingga jaringan fiber optik. Dengan produk-produk yang mendukung kelancaran jaringan internet ini maka produktivitas dari usaha Anda akan makin berjalan lancar. Baik dari segi komunikasi sesama rekan kerja maupun dengan <em>customer</em>.</p><p>Teknologi tak melulu rumit, Cisco membuatnya menjadi sederhana dan mudah dimengerti. Dengan teknologi jaringan internet yang lancar dan aman pula lah Anda bisa memajukan bisnis yang telah Anda rintis agar bisa bertahan di kondisi apapun termasuk saat pandemi seperti saat ini.</p>', 'terdampak-pandemi-ini-saatnya-digitalisasi-umkm', '1595401481-0-adv-cisco.jpeg', 1, 1, '2020-07-22 14:04:41', 1, 0);

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
(1, 1, 'hello', 'hello', 1),
(2, 1, 'hello-wworl', 'hello-wworl', 1),
(3, 4, 'Hello-Indonesia', 'hello-indonesia', 1),
(4, 4, 'Hello Aku', 'hello-aku', 1),
(5, 2, 'Bengkulu Selatan', 'bengkulu-selatan', 0),
(6, 2, 'Seluma', 'seluma', 0),
(7, 2, 'Bengkulu Utara', 'bengkulu-utara', 0),
(8, 2, 'Bengkulu Tengah', 'bengkulu-tengah', 0);

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
(1, 'administrator', '$2y$10$psHKAr16g7dGX8Ylj6QiPew2DZoo9CY7CiCTD3gnQUhGVy/rf8P4C', 'Administrator', 'admin@admin.com', 1, 0),
(2, 'tamhor', '$2y$10$tzNsZOhpmuoiMUOvRXt5EuRRyKnA5B2KBNqMIwlWNe6gwZKIJbI7C', 'Rohmat Hidayat', 'tamhor.hidayat@gmail.com', 0, 1),
(3, 'alpaizon', '$2y$10$KExANi7SfnZslwJ13Hn7NOm6Q/mJh0sT05X205yGs9eqN0VjMtu2G', 'Alpaizon Yasa Putra', 'alpaizon.putra@gmail.com', 1, 0),
(4, 'alpaizon', '$2y$10$TU5xNSthm66UpaBQq0IXeOChXRLlDs94uR7z2N//n6qbDiIQjhnFe', 'Alpaizon Yasa Putra', 'alpaizon.putra@gmail.com', 0, 1),
(5, 'wizon', '$2y$10$C9jr7074ccPl4DTF1uRrUePWLwwEenuJglhRTO0Pg8v9eKyifffie', 'Wizon Paidi', 'alpa.putra@gmail.com', 0, 0),
(6, 'soprian', '$2y$10$8LCHDEr0K1rmC5IUKJGDoe/I0Lkx7LQ/LbYWQS411wz.niRmX39uu', 'Soprian Ardi', 'alpaizon.putra@gmail.com', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
