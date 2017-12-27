-- --------------------------------------------------------
-- Host:                         45.32.105.117
-- Server version:               10.0.28-MariaDB-1~jessie - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for illiyin_elearn
CREATE DATABASE IF NOT EXISTS `illiyin_elearn` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `illiyin_elearn`;

-- Dumping structure for table illiyin_elearn.activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `description` text NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.activity_log: ~102 rows (approximately)
DELETE FROM `activity_log`;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
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
	(62, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(63, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(64, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(65, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(66, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(67, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(68, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(69, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(70, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(71, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(72, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(73, '0000-00-00 00:00:00', 'maulidi login', 'maulidi'),
	(74, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(75, '0000-00-00 00:00:00', 'maulidi login', 'maulidi'),
	(76, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(77, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(78, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(79, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(80, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(81, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(82, '0000-00-00 00:00:00', 'mhandharbeni login', 'mhandharbeni'),
	(83, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
	(84, '0000-00-00 00:00:00', 'faizalqurni login', 'faizalqurni'),
	(85, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(86, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
	(87, '0000-00-00 00:00:00', 'virdana login', 'virdana'),
	(88, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
	(89, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(90, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(91, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(92, '0000-00-00 00:00:00', 'virdana login', 'virdana'),
	(93, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(94, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(95, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(96, '0000-00-00 00:00:00', 'superadmin login', 'superadmin'),
	(97, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(98, '0000-00-00 00:00:00', 'luqmanppmh login', 'luqmanppmh'),
	(99, '0000-00-00 00:00:00', 'virdana login', 'virdana'),
	(100, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(101, '0000-00-00 00:00:00', 'ibnu1993 login', 'ibnu1993'),
	(102, '2017-12-21 10:25:47', 'login ke sistem', 'ibnu1993');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.data_guru
CREATE TABLE IF NOT EXISTS `data_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.data_guru: ~4 rows (approximately)
DELETE FROM `data_guru`;
/*!40000 ALTER TABLE `data_guru` DISABLE KEYS */;
INSERT INTO `data_guru` (`id`, `nama`, `nip`, `email`, `foto`) VALUES
	(1, 'Ibnu Shodiqin Suhaemy', '1105335430633', 'ibnuspeedster@gmail.com', 'ibnu1993-ibnu1993.png'),
	(2, 'Super Admin', '0', 'rainhanifa@gmail.com', NULL),
	(3, 'Muhammad Handharbeni', '12345678976543', 'mhandharbeni@gmail.com', 'mhandharbeni-dosen-pa.png'),
	(4, 'Faiz Alqurni', '12301265816412641', 'faizalqurni@gmail.com', 'faizalqurni-dosen-pa.png');
/*!40000 ALTER TABLE `data_guru` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.data_kelas
CREATE TABLE IF NOT EXISTS `data_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.data_kelas: ~2 rows (approximately)
DELETE FROM `data_kelas`;
/*!40000 ALTER TABLE `data_kelas` DISABLE KEYS */;
INSERT INTO `data_kelas` (`id`, `nama`, `tahun`) VALUES
	(1, 'OFF A', '2017'),
	(2, 'OFF B', '2017');
/*!40000 ALTER TABLE `data_kelas` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.data_siswa
CREATE TABLE IF NOT EXISTS `data_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.data_siswa: ~3 rows (approximately)
DELETE FROM `data_siswa`;
/*!40000 ALTER TABLE `data_siswa` DISABLE KEYS */;
INSERT INTO `data_siswa` (`id`, `nama`, `nim`, `email`, `foto`) VALUES
	(1, 'M Luqman Hakim', '11053354306123', 'luqmanppmh@gmail.com', 'luqmanppmh-milk.jpg'),
	(2, 'Dimas Virdana', '170023456781', 'virdana10@gmail.com', 'virdana-siswi.png'),
	(3, 'Akhmad Maulidi', '16356789876525', 'maulidi123@gmail.com', 'maulidi-siswa.png');
/*!40000 ALTER TABLE `data_siswa` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.detail_kelas
CREATE TABLE IF NOT EXISTS `detail_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.detail_kelas: ~3 rows (approximately)
DELETE FROM `detail_kelas`;
/*!40000 ALTER TABLE `detail_kelas` DISABLE KEYS */;
INSERT INTO `detail_kelas` (`id`, `kelas_id`, `siswa_id`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 1, 3);
/*!40000 ALTER TABLE `detail_kelas` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.detail_mapel
CREATE TABLE IF NOT EXISTS `detail_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_mapel_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.detail_mapel: ~5 rows (approximately)
DELETE FROM `detail_mapel`;
/*!40000 ALTER TABLE `detail_mapel` DISABLE KEYS */;
INSERT INTO `detail_mapel` (`id`, `t_mapel_id`, `materi_id`) VALUES
	(1, 1, 1),
	(2, 1, 3),
	(3, 1, 4),
	(4, 5, 5),
	(5, 3, 6);
/*!40000 ALTER TABLE `detail_mapel` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.komentar
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `kontenmateri_id` int(11) DEFAULT NULL,
  `subyek` text,
  `deskripsi` text,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.komentar: ~2 rows (approximately)
DELETE FROM `komentar`;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
INSERT INTO `komentar` (`id`, `user_id`, `level`, `kontenmateri_id`, `subyek`, `deskripsi`, `tanggal`) VALUES
	(1, 1, 1, 1, 'Mau tanya', 'Di slidenya ada keterangan tapi saya kurang paham', '2017-11-14 10:00:00'),
	(2, 1, 2, 1, 'Videonya terpotong', 'Pak, videonya terpotong tidak sampai akhir', '2017-11-30 09:52:18');
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.kontenmateri
CREATE TABLE IF NOT EXISTS `kontenmateri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submateri_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tipe` varchar(5) NOT NULL COMMENT '''class'', ''lab''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.kontenmateri: ~5 rows (approximately)
DELETE FROM `kontenmateri`;
/*!40000 ALTER TABLE `kontenmateri` DISABLE KEYS */;
INSERT INTO `kontenmateri` (`id`, `submateri_id`, `isi`, `tipe`) VALUES
	(1, 1, '', 'class'),
	(2, 1, 'video/BALL_HANDING_LESSON_1.webm', 'lab'),
	(3, 8, '<p>Olah raga yang dimainkan dengan kok dan raket, kemungkinan berkembang di Mesir kuno sekitar 2000 tahun lalu tetapi juga disebut-sebut di India dan Republik Rakyat Tiongkok.</p>\r\n<p>Nenek moyang terdirinya diperkirakan ialah sebuah permainan Tionghoa, <span class="mw-redirect">Jianzi</span> yang melibatkan penggunaan kok tetapi tanpa raket. Alih-alih, objeknya dimanipulasi dengan kaki. Objek/misi permainan ini adalah untuk menjaga kok agar tidak menyentuh tanah selama mungkin tanpa menggunakan tangan.</p>\r\n<p>Di Inggris sejak zaman pertengahan permainan anak-anak yang disebut <em>Battledores</em> dan <em>Shuttlecocks</em> sangat populer. Anak-anak pada waktu itu biasanya akan memakai dayung/tongkat (Battledores) dan bersiasat bersama untuk menjaga kok tetap di udara dan mencegahnya dari menyentuh tanah. Ini cukup populer untuk menjadi nuansa harian di jalan-jalan London pada tahun 1854 ketika majalah <em><span class="new">Punch</span></em> mempublikasikan kartun untuk ini.</p>\r\n<p>Penduduk Inggris membawa permainan ini ke Jepang, Republik Rakyat Tiongkok, dan Siam (sekarang Thailand) selagi mereka mengolonisasi Asia. Ini kemudian dengan segera menjadi permainan anak-anak di wilayah setempat mereka.</p>\r\n<p>Olah raga kompetitif bulu tangkis diciptakan oleh petugas Tentara Britania di Pune, India pada <span class="mw-redirect">abad ke-19</span> saat mereka menambahkan jaring dan memainkannya secara bersaingan. Oleh sebab kota Pune dikenal sebelumnya sebagai Poona, permainan tersebut juga dikenali sebagai Poona pada masa itu.</p>\r\n<p>Para tentara membawa permainan itu kembali ke Inggris pada 1850-an. Olah raga ini mendapatkan namanya yang sekarang pada 1860 dalam sebuah pamflet oleh <span class="new">Isaac Spratt</span>, seorang penyalur mainan Inggris, berjudul "<em>Badminton Battledore - a new game</em>" ("Battledore bulu tangkis - sebuah permainan baru"). Ini melukiskan permainan tersebut dimainkan di <span class="new">Gedung Badminton</span> (<em>Badminton House</em>), estat <em><span class="new">Duke of Beaufort\'s</span></em> di Gloucestershire, Inggris.</p>\r\n<p>Rancangan peraturan yang pertama ditulis oleh <span class="new">Klub Badminton Bath</span> pada 1877. <span class="new">Asosiasi bulu tangkis Inggris</span> dibentuk pada 1893 dan kejuaraan internasional pertamanya berunjuk-gigi pertama kali pada 1899 dengan Kejuaraan <em><span class="mw-redirect">All England</span></em>.</p>\r\n<p>Bulu tangkis menjadi sebuah olah raga populer di dunia, terutama di wilayah Asia Timur dan Tenggara, yang saat ini mendominasi olah raga ini, dan di negara-negara Skandinavia.</p>', 'class'),
	(4, 3, '<p>TIK dalam pembelajaran olahraga</p>', 'class'),
	(5, 4, '<p>Jenis-jenis Media Pembelajaran</p>', 'class');
/*!40000 ALTER TABLE `kontenmateri` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.login
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.login: ~7 rows (approximately)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`username`, `password`, `user_id`, `level`, `status`) VALUES
	('ibnu1993', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 1, 1, 1),
	('luqmanppmh', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 1, 2, 1),
	('superadmin', 'b0e818d9d46ef26177190ef128130e026484bd28', 2, 9, 1),
	('mhandharbeni', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 3, 1, 1),
	('faizalqurni', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 4, 1, 1),
	('virdana', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 2, 2, 1),
	('maulidi', '28222eb36cbc5290d83d03b80569e3e6b6cefc48', 3, 2, 1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.mata_pelajaran
CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.mata_pelajaran: ~7 rows (approximately)
DELETE FROM `mata_pelajaran`;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` (`id`, `nama`) VALUES
	(1, 'Media Pembelajaran dan TIK Olahraga'),
	(2, 'Psikologi Pendidikan'),
	(3, 'Sejarah dan Filosofi Olahraga'),
	(4, 'Medis Olahraga'),
	(5, 'Pelatihan Olahraga Tenis'),
	(6, 'Pelatihan Olahraga Bulutangkis'),
	(7, 'Manajemen Kepelatihan Olahraga Sepak Bola');
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.materi
CREATE TABLE IF NOT EXISTS `materi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.materi: ~5 rows (approximately)
DELETE FROM `materi`;
/*!40000 ALTER TABLE `materi` DISABLE KEYS */;
INSERT INTO `materi` (`id`, `nama`) VALUES
	(1, 'Pengenalan Media Pembelajaran dan TIK Olahraga'),
	(3, 'Pemilihan Media Sebagai Alat Bantu Pembelajaran'),
	(4, 'Pengembangan Media Pembelajaran'),
	(5, 'Pengenalan dan Sejarah Tenis'),
	(6, 'Pengenalan dan Sejarah Bulu Tangkis');
/*!40000 ALTER TABLE `materi` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `submateri_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `nilai_class` int(11) DEFAULT NULL,
  `nilai_lab` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.nilai: ~3 rows (approximately)
DELETE FROM `nilai`;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`id`, `siswa_id`, `submateri_id`, `class_id`, `lab_id`, `nilai_class`, `nilai_lab`) VALUES
	(1, 1, 1, NULL, NULL, 80, 0),
	(2, 3, 1, NULL, NULL, 80, 75),
	(3, 2, 1, NULL, NULL, 80, 90);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.nilai_materi
CREATE TABLE IF NOT EXISTS `nilai_materi` (
  `id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `lab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.nilai_materi: ~0 rows (approximately)
DELETE FROM `nilai_materi`;
/*!40000 ALTER TABLE `nilai_materi` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_materi` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.nilai_submateri
CREATE TABLE IF NOT EXISTS `nilai_submateri` (
  `id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `submateri_id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `lab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table illiyin_elearn.nilai_submateri: ~0 rows (approximately)
DELETE FROM `nilai_submateri`;
/*!40000 ALTER TABLE `nilai_submateri` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_submateri` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.progress
CREATE TABLE IF NOT EXISTS `progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `submateri_id` int(11) NOT NULL,
  `tugas_class` text NOT NULL,
  `tugas_lab` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.progress: ~5 rows (approximately)
DELETE FROM `progress`;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
INSERT INTO `progress` (`id`, `siswa_id`, `submateri_id`, `tugas_class`, `tugas_lab`, `status`) VALUES
	(1, 1, 1, '', '', 0),
	(2, 3, 1, '', '', 1),
	(3, 3, 3, '', '', 0),
	(4, 3, 8, '', '', 0),
	(5, 2, 1, '', '', 0);
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.progress_belajar
CREATE TABLE IF NOT EXISTS `progress_belajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `submateri_id` int(11) NOT NULL,
  `tugas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.progress_belajar: ~0 rows (approximately)
DELETE FROM `progress_belajar`;
/*!40000 ALTER TABLE `progress_belajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `progress_belajar` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.submateri
CREATE TABLE IF NOT EXISTS `submateri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materi_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.submateri: ~7 rows (approximately)
DELETE FROM `submateri`;
/*!40000 ALTER TABLE `submateri` DISABLE KEYS */;
INSERT INTO `submateri` (`id`, `materi_id`, `nama`) VALUES
	(1, 1, 'Dasar-Dasar Media Pembelajaran'),
	(3, 1, 'TIK dalam Pembelajaran Olahraga'),
	(4, 3, 'Jenis-Jenis Media Pembelajaran'),
	(5, 4, 'Pemakaian dan pembuatan media grafis sebagai media'),
	(6, 4, 'Pembiayaan Media Pembelajaran'),
	(7, 5, 'Sejarah Tenis'),
	(8, 6, 'Sejarah Bulu Tangkis');
/*!40000 ALTER TABLE `submateri` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.tugas
CREATE TABLE IF NOT EXISTS `tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text,
  `siswa_id` int(11) DEFAULT NULL,
  `kontenmateri_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.tugas: ~0 rows (approximately)
DELETE FROM `tugas`;
/*!40000 ALTER TABLE `tugas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugas` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.t_jadwal
CREATE TABLE IF NOT EXISTS `t_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) DEFAULT NULL,
  `t_mapel_id` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jam` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.t_jadwal: ~3 rows (approximately)
DELETE FROM `t_jadwal`;
/*!40000 ALTER TABLE `t_jadwal` DISABLE KEYS */;
INSERT INTO `t_jadwal` (`id`, `kelas_id`, `t_mapel_id`, `tahun`, `jam`) VALUES
	(1, 1, 3, '2017', '0000-00-00 00:00:00'),
	(2, 1, 5, '2017', '0000-00-00 00:00:00'),
	(3, 2, 1, '2017', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `t_jadwal` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.t_mapel
CREATE TABLE IF NOT EXISTS `t_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.t_mapel: ~5 rows (approximately)
DELETE FROM `t_mapel`;
/*!40000 ALTER TABLE `t_mapel` DISABLE KEYS */;
INSERT INTO `t_mapel` (`id`, `mapel_id`, `dosen_id`) VALUES
	(1, 1, 1),
	(3, 1, 3),
	(4, 5, 1),
	(5, 3, 4),
	(6, 7, 4);
/*!40000 ALTER TABLE `t_mapel` ENABLE KEYS */;

-- Dumping structure for table illiyin_elearn.t_prioritas
CREATE TABLE IF NOT EXISTS `t_prioritas` (
  `id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `materi_id` int(11) DEFAULT NULL,
  `prioritas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table illiyin_elearn.t_prioritas: ~0 rows (approximately)
DELETE FROM `t_prioritas`;
/*!40000 ALTER TABLE `t_prioritas` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_prioritas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
