-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 05:20 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.17-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_penjurusan_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL COMMENT 'password admin',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'adminn'),
('admix', 'admix');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` char(50) NOT NULL COMMENT 'judul berita',
  `isi_berita` text NOT NULL COMMENT 'isi berita',
  `nip` varchar(20) NOT NULL COMMENT 'nip guru',
  `tgl_input` datetime NOT NULL COMMENT 'tanggal penginputan',
  PRIMARY KEY (`id_berita`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `nip`, `tgl_input`) VALUES
(1, 'kakak dan dede', '<p>kakak kenapa..</p>\r\n\r\n<p>kok dede&#39; di anggurin.. dede&#39; sudah siap ni kak..</p>\r\n', '197609282003121009', '2015-12-04 17:42:00'),
(3, 'SEJARAH SINGKAT', '<div><strong>1. &nbsp;Sejarah Singkat</strong></div>\r\n\r\n<p style="text-align: justify;">SMA Negeri 9 Pontianak berdiri sesuai dengan surat Keputusan Walikota Pontianak Nomor : 279A Tahun 2003 tentang operasional SMA Negeri 9 Pontianak tertanggal 2 Juli 2003 yang ditandatangani oleh Walikota Pontianak dr. H. Buchary Abdurrachman.</p>\r\n\r\n<p style="text-align: justify;">Pada saat gedung SMA Negeri 9 Pontianak belum selesai dibangun para siswanya melaksanakan proses pembelajaran di gedung SMA Negeri 6 Pontianak dan masuk belajar pada siang hari yang dimulai pukul 12.30 sampai dengan 17.30 WIB.</p>\r\n\r\n<p style="text-align: justify;">Sesuai dengan Surat Keputusan Walikota Pontianak tersebut Nama Sekolah : SMA Negeri 9 Pontianak beralamat di jalan Tanjung Raya II Kelurahan Saigon Kecamatan Pontianak Timur, Kota Pontianak Provinsi Kalimantan Barat.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>2. Kepala Sekolah</strong></p>\r\n\r\n<p style="text-align: justify;">SMA Negeri 9 Pontianak dapat maju dan berkembang seperti sekarang ini tidak terlepas dan peranan Kepala Sekolah terdahulu yang penuh dedikasi dan tulus ikhlas menjalankan tugas-tugas yang diembannya sehingga sampai saat ini sekolah tetap berdiri kokoh dan dapat memberikan pelayanan pendidikan secara maksimal kepada masyarakat dalam mendidik dan membimbing para peserta didik khususnya di Pontianak Timur dan secara umu para siswa di Kota Pontianak .</p>\r\n\r\n<p style="text-align: justify;">Berikut daftar nama Kepala Sekolah :</p>\r\n\r\n<ol>\r\n	<li style="text-align: justify;">Eriyadi, SE. Sejak berdiri ( 2003 sampai dengan 8 April 2004 sebagai PLT )</li>\r\n	<li style="text-align: justify;">Eriyadi, SE. Sejak 8 April 2004 sampai dengan 29 Juni 2009 (Definitif)</li>\r\n	<li style="text-align: justify;">Karjana, SE. Sejak 30 Juni 2009 sampai dengan 2014</li>\r\n	<li style="text-align: justify;">Dede Hidayat, S.Pd. Sejak 2014 sampai dengan sekarang</li>\r\n</ol>\r\n', '196402121989021002', '2015-12-05 18:28:00'),
(4, 'VISI & MISI', '<h1 style="text-align:center"><span style="color:#0000ff"><strong>VISI</strong></span></h1>\r\n\r\n<h1 style="text-align:center"><span style="color:#ef05f9; font-family:comic sans ms,sans-serif; font-size:large"><strong>Taqwa, Cerdas, dan Berbudaya serta Berwawasan Lingkungan</strong></span></h1>\r\n\r\n<h1 style="text-align:center"><span style="color:#0000ff; font-family:comic sans ms,sans-serif"><strong>MISI</strong></span></h1>\r\n\r\n<ul>\r\n	<li style="text-align: justify;"><span style="color:#ef05f9; font-family:andale mono,times; font-size:large">Membentuk pribadi yang bertaqwa melalui pembelajaran dan kegiatan keagamaan.</span></li>\r\n	<li style="text-align: justify;"><span style="color:#ef05f9; font-family:andale mono,times; font-size:large">Melaksanakan pembelajaran, pelatihan, dan pembinaan yang bermutu sesuai denagan perkembangan IPTEK.</span></li>\r\n	<li style="text-align: justify;"><span style="color:#ef05f9; font-size:large"><span style="font-family:andale mono,times">Membentuk pribadi yang disiplin, cerdas dan santun untuk mempersiapkan generasi yang mampu berkompetisi </span><span style="font-family:andale mono,times">dalam </span><span style="font-family:andale mono,times">memasuki perguruan tinggi maupun dunia kerja.</span></span></li>\r\n	<li style="text-align: justify;"><span style="color:#ef05f9; font-family:andale mono,times; font-size:large">Membentuk pribadi yang peduli terhadap lingkungan dan sosial masyarakat.</span></li>\r\n	<li style="text-align: justify;"><span style="color:#ef05f9; font-family:andale mono,times; font-size:large">Membentuk pribadi yang menghayati, melestarikan dan mengembangkan budaya.</span></li>\r\n	<li style="text-align: justify;"><span style="color:#ef05f9; font-family:andale mono,times; font-size:large">Mewujudkan lingkungan yang bersih, nyaman, aman, sejukk dan damai.</span></li>\r\n</ul>\r\n', '197609302005012008', '2015-12-05 18:31:00'),
(5, 'SISTEM PENDUKUNG KEPUTUSAN', '<p style="text-align: justify;">Menurut Simon dalam Turban, dkk (2005), Sistem pendukung keputusan merupakan proses pemilihan alternatif tindakan untuk mencapai tujuan atau sasaran tertentu. Pengambilan keputusan dilakukan dengan pendekatan alternatif terhadap permasalahan melalui proses pengumpulan data menjadi informasi serta di tambah dengan faktor-faktor yang perlu di pertimbangkan dalam pengambilan keputusan.</p>\r\n\r\n<p style="text-align: justify;">Ada tiga tahap yang harus di lalui dalam proses pengambilan keputusan:</p>\r\n\r\n<ol>\r\n	<li>Tahap <em>Identifikasi </em></li>\r\n	<li>Tahap Pengembangan</li>\r\n	<li>Tahap Seleksi</li>\r\n</ol>\r\n', '198707262009022002', '2015-12-05 18:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL COMMENT 'password guru',
  `nama` varchar(35) NOT NULL COMMENT 'nama guru',
  `alamat` text NOT NULL COMMENT 'alamat guru',
  `agama` char(10) NOT NULL COMMENT 'agama guru',
  `email` varchar(30) NOT NULL COMMENT 'email guru',
  `jns_kelamin` enum('L','P') NOT NULL COMMENT 'jenis kelamin guru',
  `tempat_lahir` char(20) NOT NULL COMMENT 'tempat lahir guru',
  `tgl_lahir` date NOT NULL COMMENT 'tanggal lahir guru',
  `no_telp` varchar(15) NOT NULL COMMENT 'nomor telepon guru',
  `foto` varchar(50) DEFAULT NULL COMMENT 'foto guru',
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama`, `alamat`, `agama`, `email`, `jns_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `foto`) VALUES
('196402121989021002', 'dulma', 'DULMAJID, S.Pd', 'Jalan Kebangkitan Nasional Gg. Padat Karya Parit Bugis Pontianak Utara', 'islam', 'dul@gmail.com', 'L', 'Kuala Mempawah', '1970-01-01', '08115611865', ''),
('196410281999032003', 'enda', 'ENDANG SUKAPTI, S.Pd', 'Jalan Danau Sentarum Gg. A.Majid 2 No. 11 Sei. Bangkong', 'islam', 'endang@gmail.com', 'P', 'Kulon Progo', '1964-10-28', '081347638762', ''),
('197101222005012008', 'elly', 'ELLY DZULAICHA, S.Pd', 'Jalan Yam Sabran Komp. Villa Elektrik Permai D2/24 Pontianak Timur', 'islam', 'elly@gmail.com', 'P', 'Pontianak', '1971-01-22', '0897563278', ''),
('197509272003121003', 'suik', 'SUI KIUN, S.Hut, M.M', 'Jalan Parit H. Husin Gg. Perwira No. 3A', 'khatolik', 'sui@gmail.com', 'L', 'Ketapang', '1975-09-27', '08124560188', ''),
('197511012003122008', 'wiya', 'WIYANTI PURWANINGSIH, ST', 'Jalan H.R.A. Rahman Gg. Bukit Raya 1 No. 53 Pontianak Barat', 'islam', 'wiya@gmail.com', 'P', 'Jakarta', '1975-11-01', '08562321478', ''),
('197609282003121009', 'edib', 'Edi Budiardi, S.Pd', 'Jalan Tanjung Raya 2 Pontianak Timur', 'islam', 'edi@gmail.com', 'L', 'Marabuan', '1976-06-28', '08215105199', 'QzP0viEFKHBJpn4L2KJzoTkmPBNn9M5o.jpg'),
('197609302005012008', 'fitri', 'FITRI SULISTIYANINGRUM, S.Pd', 'Perumnas 3 Jalan Bintangor No. 67 RT 04 RW 09 Tanjung Hulu Pontianak Timur', 'islam', 'fitri@gmail.com', 'P', 'Demak', '1976-09-30', '081356286528', ''),
('197702022000122006', 'susi', 'SUSILAWATI, S.Pd', 'Jalan Tanjung Raya 1 Kecamatan Pontianak Timur', 'islam', 'susi@gmail.com', 'P', 'Pontianak', '1977-02-02', '08134576233', '6Rk28I4TCn6tTc0GPK--YUXOahDMhvvq.jpg'),
('197805092006041009', 'meidi', 'MEIDI FANI, S.Pd', 'Jalan Tanjung Raya 2 Komp. Bali Lestari Blok K 12', 'islam', 'meidi@gmail.com', 'L', 'Pontianak', '1978-05-09', '085245788221', ''),
('198205102009022002', 'erna', 'ERNA FATMAWATI. MS, S.Pd.I', 'Perumnas V Ambawang No.172 Trans Kalimantan Kabupaten Kubu Raya', 'islam', 'erna@gmail.com', 'P', 'Singkawang', '1982-05-10', '081287365498', ''),
('198707262009022002', 'kurn', 'KURNIAWATI, S.Pd', 'Jalan Parit Bugis Gg Lanjut', 'islam', 'Kurnia@gmail.com', 'P', 'Gunung Rejo', '1987-07-26', '085762514392', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(3) NOT NULL,
  `jurusan` varchar(6) NOT NULL COMMENT 'jurusan',
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(101, 'IPA'),
(102, 'IPS'),
(103, 'BAHASA');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(3) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(2) NOT NULL COMMENT 'kelas',
  `sub_kls` varchar(4) NOT NULL COMMENT 'sub kelas siswa',
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `sub_kls`) VALUES
(1, 'X', 'A'),
(2, 'X', 'B'),
(3, 'X', 'C'),
(4, 'X', 'D'),
(7, 'X', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(3) NOT NULL AUTO_INCREMENT,
  `prioritas` varchar(10) NOT NULL COMMENT 'prioritas',
  `id_jurusan` int(3) NOT NULL COMMENT 'id_jurusan',
  `bobot` float NOT NULL COMMENT 'bobot kriteria',
  `prioritas_sub` float NOT NULL,
  PRIMARY KEY (`id_kriteria`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `prioritas`, `id_jurusan`, `bobot`, `prioritas_sub`) VALUES
(1, 'NILAI', 101, 0.62, 1),
(2, 'NILAI', 102, 0.28, 0.45),
(3, 'NILAI', 103, 0.1, 0.16),
(5, 'MINAT', 101, 0.64, 1),
(6, 'MINAT', 102, 0.28, 0.44),
(7, 'MINAT', 103, 0.07, 0.11),
(8, 'PSIKOTES', 101, 0.57, 1),
(10, 'PSIKOTES', 102, 0.33, 0.58),
(11, 'PSIKOTES', 103, 0.1, 0.18);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_prioritas`
--

CREATE TABLE IF NOT EXISTS `kriteria_prioritas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  `kriteria` varchar(30) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `minat` int(11) DEFAULT NULL,
  `psikotes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kriteria_prioritas`
--

INSERT INTO `kriteria_prioritas` (`id`, `kategori`, `kriteria`, `nilai`, `minat`, `psikotes`) VALUES
(1, 'prioritas', 'nilai', 1, 2, 3),
(2, 'prioritas', 'minat', NULL, 1, 2),
(3, 'prioritas', 'psikotes', NULL, NULL, 1),
(4, 'nilai', 'IPA', 1, 3, 5),
(9, 'nilai', 'IPS', NULL, 1, 4),
(10, 'nilai', 'BAHASA', NULL, NULL, 1),
(12, 'minat', 'IPA', 1, 3, 7),
(13, 'minat', 'IPS', NULL, 1, 5),
(14, 'minat', 'BAHASA', NULL, NULL, 1),
(15, 'psikotes', 'IPA', 1, 2, 5),
(16, 'psikotes', 'IPS', NULL, 1, 4),
(17, 'psikotes', 'BAHASA', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE IF NOT EXISTS `matapelajaran` (
  `id_matapelajaran` int(5) NOT NULL,
  `id_jurusan` int(3) NOT NULL COMMENT 'id_jurusan',
  `matapelajaran` varchar(15) NOT NULL COMMENT 'matapelajaran',
  PRIMARY KEY (`id_matapelajaran`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_matapelajaran`, `id_jurusan`, `matapelajaran`) VALUES
(201, 101, 'Matematika'),
(202, 101, 'Fisika'),
(203, 101, 'Kimia'),
(204, 101, 'Biologi'),
(301, 102, 'Ekonomi'),
(302, 102, 'Sosiologi'),
(303, 102, 'Geografi'),
(304, 102, 'Sejarah'),
(401, 103, 'Bhs Indonesia'),
(402, 103, 'Bhs Inggris'),
(403, 103, 'Bhs Arab');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran_guru`
--

CREATE TABLE IF NOT EXISTS `matapelajaran_guru` (
  `id_matapelajaran_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL COMMENT 'nip guru',
  `id_matapelajaran` int(5) NOT NULL COMMENT 'id matapelajaran',
  `id_kelas` int(3) NOT NULL COMMENT 'kelas',
  `sub_kls1` char(1) DEFAULT NULL COMMENT 'sub kelas 1',
  `sub_kls2` char(1) DEFAULT NULL COMMENT 'sub kelas 2',
  `sub_kls3` char(1) DEFAULT NULL COMMENT 'sub kelas 3',
  `sub_kls4` char(1) DEFAULT NULL COMMENT 'sub kelas 4',
  `sub_kls5` char(1) DEFAULT NULL COMMENT 'sub kelas 5',
  `sub_kls6` char(1) DEFAULT NULL COMMENT 'sub kelas 6',
  PRIMARY KEY (`id_matapelajaran_guru`),
  KEY `matapelajaran_guru_ibfk_1` (`id_matapelajaran`),
  KEY `id_kelas` (`id_kelas`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `matapelajaran_guru`
--

INSERT INTO `matapelajaran_guru` (`id_matapelajaran_guru`, `nip`, `id_matapelajaran`, `id_kelas`, `sub_kls1`, `sub_kls2`, `sub_kls3`, `sub_kls4`, `sub_kls5`, `sub_kls6`) VALUES
(9, '197609282003121009', 402, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(10, '197509272003121003', 203, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(11, '197702022000122006', 201, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(13, '197101222005012008', 204, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(14, '197805092006041009', 301, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(15, '196410281999032003', 302, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(16, '197609302005012008', 303, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(17, '198707262009022002', 304, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(18, '196402121989021002', 401, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(19, '198205102009022002', 403, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(20, '197511012003122008', 202, 1, 'A', 'B', 'C', 'D', 'E', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1447086563),
('m130524_201442_init', 1447086575);

-- --------------------------------------------------------

--
-- Table structure for table `minat_psikotes`
--

CREATE TABLE IF NOT EXISTS `minat_psikotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL COMMENT 'nis siswa',
  `minat` varchar(6) NOT NULL COMMENT 'minat siswa',
  `psikotes` varchar(6) NOT NULL COMMENT 'psikotes siswa',
  PRIMARY KEY (`id`),
  KEY `nis` (`nis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `minat_psikotes`
--

INSERT INTO `minat_psikotes` (`id`, `nis`, `minat`, `psikotes`) VALUES
(1, '006', 'IPS', 'IPA'),
(2, '120002', 'BAHASA', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(5) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL COMMENT 'nis siswa',
  `id_matapelajaran` int(11) NOT NULL COMMENT 'id matapelajaran',
  `nilai` float DEFAULT NULL COMMENT 'nilai siswa',
  `tahun_ajaran` char(12) DEFAULT NULL COMMENT 'tahun ajaran',
  PRIMARY KEY (`id_nilai`),
  KEY `nis` (`nis`),
  KEY `id_matapelajaran` (`id_matapelajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `id_matapelajaran`, `nilai`, `tahun_ajaran`) VALUES
(48, '006', 9, 8, '2015/2016'),
(49, '006', 10, 8, '2015/2016'),
(50, '006', 11, 8.5, '2015/2016'),
(52, '006', 13, 8, '2015/2016'),
(53, '006', 14, 8, '2015/2016'),
(54, '006', 15, 7, '2015/2016'),
(55, '006', 16, 8, '2015/2016'),
(56, '006', 17, 7, '2015/2016'),
(57, '006', 18, 8, '2015/2016'),
(58, '006', 19, 0, '2015/2016'),
(70, '006', 20, 9, '2015/2016'),
(72, '120002', 18, 7, '2015/2016'),
(73, '120002', 9, 7, '2015/2016'),
(74, '120002', 13, 7, '2015/2016'),
(75, '120002', 16, 8, '2015/2016'),
(76, '120002', 17, 7, '2015/2016'),
(77, '120002', 14, 9, '2015/2016'),
(78, '120002', 20, 7, '2015/2016'),
(79, '120002', 15, 8, '2015/2016'),
(80, '120002', 19, 3, '2015/2016'),
(81, '120002', 10, 8, '2015/2016'),
(82, '120002', 11, 7, '2015/2016'),
(83, '120002', 18, 4, '2015/2016');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nilai_pembobotan_kriteria`
--
CREATE TABLE IF NOT EXISTS `nilai_pembobotan_kriteria` (
`nis` varchar(10)
,`nama` varchar(35)
,`kelas` varchar(6)
,`penjurusan` varchar(6)
,`nilai` double(19,2)
,`minat` varchar(6)
,`psikotes` varchar(6)
,`bobot_nilai` double(19,2)
,`bobot_minat` double(19,2)
,`bobot_psikotes` double(19,2)
);
-- --------------------------------------------------------

--
-- Table structure for table `prioritas`
--

CREATE TABLE IF NOT EXISTS `prioritas` (
  `kode` varchar(50) NOT NULL,
  `bobot` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prioritas`
--

INSERT INTO `prioritas` (`kode`, `bobot`) VALUES
('MINAT', 0.3),
('NILAI', 0.54),
('PSIKOTES', 0.16);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL COMMENT 'nama siswa',
  `id_kelas` int(3) DEFAULT NULL COMMENT 'id kelas siswa',
  `password` varchar(15) NOT NULL COMMENT 'password siswa',
  `email` varchar(20) NOT NULL COMMENT 'email siswa',
  `tempat_lahir` varchar(20) NOT NULL COMMENT 'tempat lahir siswa',
  `tgl_lahir` date NOT NULL COMMENT 'tanggal lahir siswa',
  `no_telp` varchar(15) NOT NULL COMMENT 'nomor telepon siswa',
  `jns_kelamin` enum('L','P') NOT NULL COMMENT 'jenis kelamin siswa',
  `alamat` text NOT NULL COMMENT 'alamat siswa',
  `foto` varchar(50) DEFAULT NULL COMMENT 'foto siswa',
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `id_kelas`, `password`, `email`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `jns_kelamin`, `alamat`, `foto`) VALUES
('006', 'mama', 3, 'asmnm', 'mnas@gmn.cj', 'kaka', '1998-05-03', '09534', 'L', 'qety', ''),
('120001', 'Ahmad Hakim Rinanda', 2, '123456', 'ahmad@gmail.com', 'Pontianak', '1998-07-19', '08523457623', 'L', 'Jalan Tabrani Akhmad No. 263', '6.jpg'),
('120002', 'Anie Sukmawati', 2, '123456', 'anie@gmail.com', 'Pontianak', '1999-10-05', '081378384026', 'P', 'Jalan Senopati', '6.jpg'),
('120003', 'Maya Utami', 2, '123456', 'maya@gmail.com', 'Pontianak', '1998-11-13', '085738476292', 'P', 'Jalan Panglima Aim', ''),
('120004', 'Rudi Suryanto ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120005', 'Sandra ', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120006', 'Asiv Wasil Fathoni ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120007', 'Indra Mahendra', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120008', 'Rengganis Indri ', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120009', 'Sudarmawan', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120010', 'Tri Undari ', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120011', 'Andry Darmawan ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120012', 'Az-Zahra ', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120013', 'Daffa Salsabila', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120014', 'Rico Saputra ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120015', 'Yohannes ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120016', 'Astra Pegama ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120017', 'Eka Putra', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120018', 'Eva Monica ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120019', 'Ferry Adrian ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120020', 'Rahmat Madyo ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120021', 'Aditya Subekti ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120022', 'Dendi Dwi Aditya', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120023', 'Devia Dewi', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120024', 'Tan Fadli Yandi ', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120025', 'Rachmawati', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('120026', 'Ari Agung Firmansyah', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120027', 'Muhammad Kurniawan', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120028', 'Nanda Patria Akbar', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120029', 'Nova Suryana', NULL, '123456', '', '', '0000-00-00', '', 'L', '', ''),
('120030', 'Sally Mustika', NULL, '123456', '', '', '0000-00-00', '', 'P', '', ''),
('12121212', 'asdddd', 3, 'qwer', 'asd@fr.vf', 'sedan', '2001-03-11', '675432987654', 'P', 'fghgkj', 'zp29meWaYd2UBylPTuxE9tew9kuXHH2a.jpg'),
('2321434343', 'yugjhgjh', 1, '5555', 'youporn@xxx.com', 'rrrr', '1999-03-02', '99898', 'L', 'seeellll', 'S6DWlEpJEhhDT1EGw2bgJm2nDIavOY7h.jpg'),
('3434343', 'saf xx', 3, '45678', 'teen@youporn.com', 'ss', '1997-01-01', '12345678901213', 'L', 'fff', 'NeecuYd3KFL4ggqpZGqzbi8ydHcz406q.jpg'),
('44', '444', 2, 'rewrw', 'wr@ff.com', 'fsd;lffh', '2000-12-02', 'fdfndkjfhkh', 'L', 'fffs', 'I4JNzeSOh-DsQh9FYqmp07q1o5KrLRf1.jpeg'),
('44444444', 'yugjhgjh', 1, '5555', 'youporn@xxx.com', 'rrrr', '1999-03-02', '99898', 'L', 'seeellll', 'MHdyKq9wDCywGPnBteJ8jn3Tw8iRYq1n.jpg'),
('564', 'dgfhjsdgf', 2, '777', 'ffff@gg.com', 'rtyui', '1998-01-01', '09812982', 'L', 'ythuijkm', 'm1iVhKqiNy_uq70pn5VpA326Yx9QiQzu.jpeg'),
('6578987098', 'saf xx', 3, '45678', 'teen@youporn.com', 'ss', '1997-01-01', '12345678901213', 'L', 'fff', 'Emoo89j9UxVM7D6OeOlAwbq1m4wpyVmW.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `level` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `level`) VALUES
(1, '5456778786', 'yBdWZNjsDYsCc5y3edGo-GgjEqy_vx3K', '$2y$13$DAkL8EavdyToMwP4rF2K2uGCHHDt1RNsqf.aRX/VObzIgDBtBmp82', NULL, 'ddd@xx.com', 10, 1447087540, 1449347460, 'admin'),
(21, 'admix', 'e8WlvDsXqdyPkfCzH0wSQ4jwZsBbT9dl', '$2y$13$QBXPWuXdHswxod.SFuUbDONM9c1loo0DYe1MAD6dlqstzCDlq3MFq', NULL, 'admix@gmail.com', 10, 1449068283, 1449068283, 'admin'),
(26, 'edi@gmail.com', 'bwaZQkvpVvA0QkUTooB5ZLosaMhG_VBV', '$2y$13$vZNeovZcW89NnUoqXIWqtejTAwQ2kp/wvm5uIzC7rBCkhGYF68LHG', NULL, 'edi@gmail.com', 10, 1449246775, 1449246775, 'guru'),
(27, 'sui@gmail.com', 'pmXRu_CaOTOCKys46umQa1IzyZ3hs6v1', '$2y$13$UTezcGy3osC2ji4KowhJ5umTOeF7sV2y1oo9PHsk3hDKq9t3QcGa2', NULL, 'sui@gmail.com', 10, 1449249177, 1449249177, 'guru'),
(28, 'admin', 'I_FckcbduWQ74qVWWdvlvGo2CgTmFXZu', '$2y$13$P9W9CEzLHyVpe94CRcR0rOoN88V6D9IRNX6Gc7DbDOIgQNiOLrHGy', NULL, 'admin@gmail.com', 10, 1449249367, 1449249367, 'admin'),
(29, 'susi@gmail.com', 'jyrRXQUIq1t1JThevvNGlDBuI29AOhe1', '$2y$13$berJTp2jGaZxWaTbYvWJ7uQoJ.MfU1GakTH3EfYRxX145JKmYtuHG', NULL, 'susi@gmail.com', 10, 1449251960, 1449251960, 'guru'),
(30, 'wiya@gmail.com', 'u160SvHU-DpwUj7WddvKeyD3SSsFJGB7', '$2y$13$5WnW/mRTHkvoWL9ldPDXUuUBBqMuOy3GXFpyIAqqOYWxcvjEghxGa', NULL, 'wiya@gmail.com', 10, 1449252544, 1449252544, 'guru'),
(31, 'elly@gmail.com', 'Ik1DguKmeoFF-W_tUoSfvOcNbK-RO5tg', '$2y$13$8IsPKWokceQGy6UOSEOPp.bsJ60AUWjAKfsN/F4bvnd7rz7xz101C', NULL, 'elly@gmail.com', 10, 1449253140, 1449253140, 'guru'),
(32, 'meidi@gmail.com', 'DEmmRdUsassOGoG_7nJtHcKRbUa7siNH', '$2y$13$iBS0HNwM9U8jYIcIcxnJh.tNKTpdtq.XSnGXmNheXa2GWVieRJFTC', NULL, 'meidi@gmail.com', 10, 1449253507, 1449253507, 'guru'),
(33, 'endang@gmail.com', 'MYNo7n2mXMvCCnduiZaYz0lfFPjEVIC0', '$2y$13$1gdKO9nj2eDLYJpwGBis6ukgKbSMXAGdPhwGs44zmuoPuQdmKQy4y', NULL, 'endang@gmail.com', 10, 1449253844, 1449253844, 'guru'),
(34, 'fitri@gmail.com', 'oSC6IJDVBpb8JujmqRhs6fWjQpCWzJDz', '$2y$13$AMqfaa.S4Vxg4AUv/X/wnOdLQimK8A1g3X.0XAAczT35x7Dya/rZW', NULL, 'fitri@gmail.com', 10, 1449310911, 1449310911, 'guru'),
(35, 'Kurnia@gmail.com', 'g_eMXQEafo4Gz98hJYLy1AqZuc4pmtkU', '$2y$13$Jh6RDtzl3CqN4/pN1YEjK.iLlXz3pecKcDtcF8neuOjR4XNEtscOW', NULL, 'Kurnia@gmail.com', 10, 1449311226, 1449311226, 'guru'),
(36, 'dul@gmail.com', 'mYzWHcrqx8LeYB-JgMdiDxbf5YCBNpuu', '$2y$13$FiQcpkTEBSUsnGeCiygh7e.2Nivq9KhCEQ9c.JEQ5PudyNPctk9mi', NULL, 'dul@gmail.com', 10, 1449312288, 1449312288, 'guru'),
(37, 'erna@gmail.com', '-FTHYjEG-TPCeMIhf4EwsawcA7y_8VrK', '$2y$13$HpkJSh3reAIPtIJYBDLgCuXPzfu/rlBACQh0lvpXWRI91buZzdg/6', NULL, 'erna@gmail.com', 10, 1449312626, 1449312626, 'guru'),
(38, '1111111111', '_78oKRGij4QvwUoah7KoJv-uDHn0vhRK', '$2y$13$8s3gll.WdTveqUTFKkBbcOLnvEmadDC9A2vPl2/f6aaKduoCwuuk6', NULL, 'asd@ra.co', 10, 1449347859, 1449347859, 'siswa'),
(39, 'mama@minta.pulsa', 'NMV054LWqsfncWzFT902YBKN_-tSwfmi', '$2y$13$yfCuluKTvUzCfEoLKByrmedDuFDKJa7PA7p/aac.Ir.5XHbMlUVDG', NULL, 'mama@minta.pulsa', 10, 1449945311, 1449945311, 'guru'),
(40, 'bla@gmail.com', 'xDPS2lUDdq1M0WQypmJ7rE8Q-kIFEP5-', '$2y$13$T1KvFoF0A4UqBp6WFzvNoOTM71jRK6n2JNNMmWiNzw0k7fdepTD0K', NULL, 'bla@gmail.com', 10, 1449995652, 1449995652, 'guru'),
(41, '005', 'T4EHaX1mh2XyjZSPeDomK12ZARdxM-8w', '$2y$13$maw9zH/sDq3uvBQ9dZTAJOvG0sMY3zHL/cA8.2lJUqWvGv4thOjHu', NULL, 'jhas@jha.vo', 10, 1449997867, 1449998395, 'siswa'),
(42, '006', 'G4XFkwkJX3CrWD6iBKr0PRHo5CNYjaW-', '$2y$13$i4vuzV3AVDhlIGQmZzxNCuk0RRcd8p/c02WLgnU8J0KIbLBPZNggi', NULL, 'mnas@gmn.cj', 10, 1450001044, 1450001044, 'siswa'),
(43, '007', '0lbMQmlH1NtzP_Yjl5grGbSfS7Ksiqd-', '$2y$13$VWBcJBPZJ5u4IWJnwdBGiukaFg.vp/2iqmtXh30FNCPZvdkXtTo..', NULL, 'sasa@gy.ji', 10, 1450002895, 1450002895, 'siswa');

-- --------------------------------------------------------

--
-- Structure for view `nilai_pembobotan_kriteria`
--
DROP TABLE IF EXISTS `nilai_pembobotan_kriteria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nilai_pembobotan_kriteria` AS select `n`.`nis` AS `nis`,`s`.`nama` AS `nama`,concat(`k`.`kelas`,`k`.`sub_kls`) AS `kelas`,`j`.`jurusan` AS `penjurusan`,(case when (`j`.`jurusan` = 'IPA') then round((sum(`n`.`nilai`) / 100),2) when (`j`.`jurusan` = 'IPS') then round((sum(`n`.`nilai`) / 100),2) when (`j`.`jurusan` = 'BAHASA') then round(((sum(`n`.`nilai`) * 2) / 100),2) else 0 end) AS `nilai`,`mp`.`minat` AS `minat`,`mp`.`psikotes` AS `psikotes`,(case when ((`j`.`jurusan` = 'IPA') or (`j`.`jurusan` = 'IPS')) then round((round((sum(`n`.`nilai`) / 100),2) * (select round(`k`.`bobot`,2) from (`kriteria` `k` join `jurusan` `kj` on((`k`.`id_jurusan` = `kj`.`id_jurusan`))) where ((`k`.`prioritas` = 'NILAI') and (`kj`.`jurusan` = `j`.`jurusan`)))),2) when (`j`.`jurusan` = 'BAHASA') then round((round(((sum(`n`.`nilai`) * 2) / 100),2) * (select round(`k`.`bobot`,2) from (`kriteria` `k` join `jurusan` `kj` on((`k`.`id_jurusan` = `kj`.`id_jurusan`))) where ((`k`.`prioritas` = 'NILAI') and (`kj`.`jurusan` = `j`.`jurusan`)))),2) else 0 end) AS `bobot_nilai`,(select round(`k`.`bobot`,2) from (`kriteria` `k` join `jurusan` `kj` on((`k`.`id_jurusan` = `kj`.`id_jurusan`))) where ((`k`.`prioritas` = 'MINAT') and (`kj`.`jurusan` = `mp`.`minat`))) AS `bobot_minat`,(select round(`k`.`bobot`,2) from (`kriteria` `k` join `jurusan` `kj` on((`k`.`id_jurusan` = `kj`.`id_jurusan`))) where ((`k`.`prioritas` = 'PSIKOTES') and (`kj`.`jurusan` = `mp`.`minat`))) AS `bobot_psikotes` from ((((((`nilai` `n` join `matapelajaran_guru` `mg` on((`n`.`id_matapelajaran` = `mg`.`id_matapelajaran_guru`))) join `matapelajaran` `m` on((`m`.`id_matapelajaran` = `mg`.`id_matapelajaran`))) join `jurusan` `j` on((`j`.`id_jurusan` = `m`.`id_jurusan`))) join `siswa` `s` on((`s`.`nis` = `n`.`nis`))) join `kelas` `k` on((`k`.`id_kelas` = `s`.`id_kelas`))) join `minat_psikotes` `mp` on((`mp`.`nis` = `n`.`nis`))) group by `s`.`nis`,`j`.`id_jurusan`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD CONSTRAINT `matapelajaran_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matapelajaran_guru`
--
ALTER TABLE `matapelajaran_guru`
  ADD CONSTRAINT `matapelajaran_guru_ibfk_1` FOREIGN KEY (`id_matapelajaran`) REFERENCES `matapelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matapelajaran_guru_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matapelajaran_guru_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `minat_psikotes`
--
ALTER TABLE `minat_psikotes`
  ADD CONSTRAINT `minat_psikotes_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_matapelajaran`) REFERENCES `matapelajaran_guru` (`id_matapelajaran_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
