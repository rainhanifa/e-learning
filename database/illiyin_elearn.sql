-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2017 at 05:12 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `illiyin_elearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` text NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `time`, `description`, `username`) VALUES
(1, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(2, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(3, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(4, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(5, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(6, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(7, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(8, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(9, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(10, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(11, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(12, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(13, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(14, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(15, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(16, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(17, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(18, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(19, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(20, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(21, '0000-00-00 00:00:00', 'mhandharbeni login', 'mhandharbeni'),
(22, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(23, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(24, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(25, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(26, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(27, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(28, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(29, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(30, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(31, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(32, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(33, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(34, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(35, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(36, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(37, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(38, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(39, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(40, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(41, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(42, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(43, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(44, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(45, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(46, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(47, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(48, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(49, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(50, '0000-00-00 00:00:00', 'mhandharbeni login', 'mhandharbeni'),
(51, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(52, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(53, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(54, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(55, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
(56, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(57, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(58, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(59, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
(60, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(61, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
(62, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `nama`, `nip`, `email`, `foto`) VALUES
(1, 'Ibnu Shodiqin', '19650819970110038', 'ibnuspeedster@gmail.com', 'ibnu1993-dosen-pa.png'),
(2, 'Super Admin', '0', 'rainhanifa@gmail.com', NULL),
(3, 'Muhammad Handharbeni', '12345678976543', 'mhandharbeni@gmail.com', 'mhandharbeni-dosen-pa.png'),
(4, 'Faiz Alqurni', '12301265816412641', 'faizalqurni@gmail.com', 'faizalqurni-dosen-pa.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `nama`, `tahun`) VALUES
(1, 'OFF A', 2017),
(2, 'OFF B', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama`, `nim`, `email`, `foto`) VALUES
(1, 'Luqman Hakim', '1105335430633', 'luqmanppmh@gmail.com', 'luqmanppmh-siswa.png'),
(2, 'Dimas Virdana', '170023456781', 'virdana10@gmail.com', 'virdana-siswi.png'),
(3, 'Akhmad Maulidi', '16356789876525', 'maulidi123@gmail.com', 'maulidi-siswa.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kelas`
--

INSERT INTO `detail_kelas` (`id`, `kelas_id`, `siswa_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `detail_mapel`
--

CREATE TABLE `detail_mapel` (
  `id` int(11) NOT NULL,
  `t_mapel_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_mapel`
--

INSERT INTO `detail_mapel` (`id`, `t_mapel_id`, `materi_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 5, 5),
(5, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `kontenmateri_id` int(11) DEFAULT NULL,
  `subyek` text,
  `deskripsi` text,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `user_id`, `level`, `kontenmateri_id`, `subyek`, `deskripsi`, `tanggal`) VALUES
(1, 1, 1, 1, 'Mau tanya', 'Di slidenya ada keterangan tapi saya kurang paham', '2017-11-14 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kontenmateri`
--

CREATE TABLE `kontenmateri` (
  `id` int(11) NOT NULL,
  `submateri_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tipe` varchar(5) NOT NULL COMMENT '''class'', ''lab'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontenmateri`
--

INSERT INTO `kontenmateri` (`id`, `submateri_id`, `isi`, `tipe`) VALUES
(1, 1, 'video/1-BALL_HANDING_LESSON_1.webm', 'class'),
(2, 1, 'video/BALL_HANDING_LESSON_1.webm', 'lab'),
(3, 8, '<p>Olah raga yang dimainkan dengan kok dan raket, kemungkinan berkembang di Mesir kuno sekitar 2000 tahun lalu tetapi juga disebut-sebut di India dan Republik Rakyat Tiongkok.</p>\r\n<p>Nenek moyang terdirinya diperkirakan ialah sebuah permainan Tionghoa, <span class="mw-redirect">Jianzi</span> yang melibatkan penggunaan kok tetapi tanpa raket. Alih-alih, objeknya dimanipulasi dengan kaki. Objek/misi permainan ini adalah untuk menjaga kok agar tidak menyentuh tanah selama mungkin tanpa menggunakan tangan.</p>\r\n<p>Di Inggris sejak zaman pertengahan permainan anak-anak yang disebut <em>Battledores</em> dan <em>Shuttlecocks</em> sangat populer. Anak-anak pada waktu itu biasanya akan memakai dayung/tongkat (Battledores) dan bersiasat bersama untuk menjaga kok tetap di udara dan mencegahnya dari menyentuh tanah. Ini cukup populer untuk menjadi nuansa harian di jalan-jalan London pada tahun 1854 ketika majalah <em><span class="new">Punch</span></em> mempublikasikan kartun untuk ini.</p>\r\n<p>Penduduk Inggris membawa permainan ini ke Jepang, Republik Rakyat Tiongkok, dan Siam (sekarang Thailand) selagi mereka mengolonisasi Asia. Ini kemudian dengan segera menjadi permainan anak-anak di wilayah setempat mereka.</p>\r\n<p>Olah raga kompetitif bulu tangkis diciptakan oleh petugas Tentara Britania di Pune, India pada <span class="mw-redirect">abad ke-19</span> saat mereka menambahkan jaring dan memainkannya secara bersaingan. Oleh sebab kota Pune dikenal sebelumnya sebagai Poona, permainan tersebut juga dikenali sebagai Poona pada masa itu.</p>\r\n<p>Para tentara membawa permainan itu kembali ke Inggris pada 1850-an. Olah raga ini mendapatkan namanya yang sekarang pada 1860 dalam sebuah pamflet oleh <span class="new">Isaac Spratt</span>, seorang penyalur mainan Inggris, berjudul "<em>Badminton Battledore - a new game</em>" ("Battledore bulu tangkis - sebuah permainan baru"). Ini melukiskan permainan tersebut dimainkan di <span class="new">Gedung Badminton</span> (<em>Badminton House</em>), estat <em><span class="new">Duke of Beaufort\'s</span></em> di Gloucestershire, Inggris.</p>\r\n<p>Rancangan peraturan yang pertama ditulis oleh <span class="new">Klub Badminton Bath</span> pada 1877. <span class="new">Asosiasi bulu tangkis Inggris</span> dibentuk pada 1893 dan kejuaraan internasional pertamanya berunjuk-gigi pertama kali pada 1899 dengan Kejuaraan <em><span class="mw-redirect">All England</span></em>.</p>\r\n<p>Bulu tangkis menjadi sebuah olah raga populer di dunia, terutama di wilayah Asia Timur dan Tenggara, yang saat ini mendominasi olah raga ini, dan di negara-negara Skandinavia.</p>', 'class');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`, `level`, `status`) VALUES
('ibnu1993', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 1, 1, 1),
('luqmanppmh', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 1, 2, 1),
('superadmin', 'b0e818d9d46ef26177190ef128130e026484bd28', 2, 9, 1),
('mhandharbeni', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 3, 1, 1),
('faizalqurni', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 4, 1, 1),
('virdana', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 2, 2, 1),
('maulidi', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama`) VALUES
(1, 'Media Pembelajaran dan TIK Olahraga'),
(2, 'Psikologi Pendidikan'),
(3, 'Sejarah dan Filosofi Olahraga'),
(4, 'Medis Olahraga'),
(5, 'Pelatihan Olahraga Tenis'),
(6, 'Pelatihan Olahraga Bulutangkis'),
(7, 'Manajemen Kepelatihan Olahraga Sepak Bola');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `nama`) VALUES
(1, 'Pengenalan Media Pembelajaran dan TIK Olahraga'),
(3, 'Pemilihan Media Sebagai Alat Bantu Pembelajaran'),
(4, 'Pengembangan Media Pembelajaran'),
(5, 'Pengenalan dan Sejarah Tenis'),
(6, 'Pengenalan dan Sejarah Bulu Tangkis');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `submateri_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `nilai_class` int(11) DEFAULT NULL,
  `nilai_lab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_materi`
--

CREATE TABLE `nilai_materi` (
  `id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `lab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_submateri`
--

CREATE TABLE `nilai_submateri` (
  `id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `submateri_id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `lab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `progress_belajar`
--

CREATE TABLE `progress_belajar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submateri_id` int(11) NOT NULL,
  `tugas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_belajar`
--

INSERT INTO `progress_belajar` (`id`, `user_id`, `submateri_id`, `tugas_id`) VALUES
(1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submateri`
--

CREATE TABLE `submateri` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submateri`
--

INSERT INTO `submateri` (`id`, `materi_id`, `nama`) VALUES
(1, 1, 'Dasar-Dasar Media Pembelajaran'),
(3, 1, 'TIK dalam Pembelajaran Olahraga'),
(4, 3, 'Jenis-Jenis Media Pembelajaran'),
(5, 4, 'Pemakaian dan pembuatan media grafis sebagai media'),
(6, 4, 'Pembiayaan Media Pembelajaran'),
(7, 5, 'Sejarah Tenis'),
(8, 6, 'Sejarah Bulu Tangkis');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `file` text,
  `siswa_id` int(11) DEFAULT NULL,
  `kontenmateri_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `t_mapel_id` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jam` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jadwal`
--

INSERT INTO `t_jadwal` (`id`, `kelas_id`, `t_mapel_id`, `tahun`, `jam`) VALUES
(1, 1, 3, 2017, '0000-00-00 00:00:00'),
(2, 1, 5, 2017, '0000-00-00 00:00:00'),
(3, 2, 1, 2017, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mapel`
--

INSERT INTO `t_mapel` (`id`, `mapel_id`, `dosen_id`) VALUES
(1, 1, 1),
(3, 1, 3),
(4, 5, 1),
(5, 3, 4),
(6, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_prioritas`
--

CREATE TABLE `t_prioritas` (
  `id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `prioritas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontenmateri`
--
ALTER TABLE `kontenmateri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_belajar`
--
ALTER TABLE `progress_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submateri`
--
ALTER TABLE `submateri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_mapel`
--
ALTER TABLE `detail_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kontenmateri`
--
ALTER TABLE `kontenmateri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `progress_belajar`
--
ALTER TABLE `progress_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `submateri`
--
ALTER TABLE `submateri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_mapel`
--
ALTER TABLE `t_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
