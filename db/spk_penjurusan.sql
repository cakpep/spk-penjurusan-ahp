-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Des 2015 pada 19.51
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_penjurusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL COMMENT 'password admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'adminn'),
('admix', 'admix');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(5) NOT NULL,
  `judul` char(50) NOT NULL COMMENT 'judul berita',
  `isi_berita` text NOT NULL COMMENT 'isi berita',
  `nip` varchar(20) NOT NULL COMMENT 'nip guru',
  `tgl_input` datetime NOT NULL COMMENT 'tanggal penginputan'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `nip`, `tgl_input`) VALUES
(1, 'kakak dan dede', '<p>kakak kenapa..</p>\r\n\r\n<p>kok dede&#39; di anggurin.. dede&#39; sudah siap ni kak..</p>\r\n', '197609282003121009', '2015-12-04 17:42:00'),
(2, 'asdfghjkl', '<p>qwertyuiopxcvbnmlkjhgfdsa</p>\r\n', '197609282003121009', '2015-12-04 23:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
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
  `foto` varchar(50) DEFAULT NULL COMMENT 'foto guru'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama`, `alamat`, `agama`, `email`, `jns_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `foto`) VALUES
('196410281999032003', 'enda', 'ENDANG SUKAPTI, S.Pd', 'Jalan Danau Sentarum Gg. A.Majid 2 No. 11 Sei. Bangkong', 'islam', 'endang@gmail.com', 'P', 'Kulon Progo', '1976-05-19', '081347638762', ''),
('197101222005012008', 'elly', 'ELLY DZULAICHA, S.Pd', 'Jalan Yam Sabran Komp. Villa Elektrik Permai D2/24 Pontianak Timur', 'islam', 'elly@gmail.com', 'P', 'Pontianak', '1980-12-06', '0897563278', ''),
('197509272003121003', 'suik', 'SUI KIUN, S.Hut, M.M', 'Jalan Parit H. Husin Gg. Perwira No. 3A', 'khatolik', 'sui@gmail.com', 'L', 'Ketapang', '1974-06-07', '08124560188', ''),
('197511012003122008', 'wiya', 'WIYANTI PURWANINGSIH, ST', 'Jalan H.R.A. Rahman Gg. Bukit Raya 1 No. 53 Pontianak Barat', 'islam', 'wiya@gmail.com', 'P', 'Jakarta', '1982-02-25', '08562321478', ''),
('197609282003121009', 'edib', 'Edi Budiardi, S.Pd', 'Pontianak', 'islam', 'edi@gmail.com', 'L', 'Marabuan', '1976-09-28', '08215105199', 'QzP0viEFKHBJpn4L2KJzoTkmPBNn9M5o.jpg'),
('197702022000122006', 'susi', 'SUSILAWATI, S.Pd', 'Jalan Tanjung Raya 1 Kecamatan Pontianak Timur', 'islam', 'susi@gmail.com', 'P', 'Pontianak', '1984-10-17', '08134576233', '6Rk28I4TCn6tTc0GPK--YUXOahDMhvvq.jpg'),
('197805092006041009', 'meidi', 'MEIDI FANI, S.Pd', 'Jalan Tanjung Raya 2 Komp. Bali Lestari Blok K 12', 'islam', 'meidi@gmail.com', 'L', 'Pontianak', '1978-01-07', '085245788221', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(3) NOT NULL,
  `jurusan` varchar(6) NOT NULL COMMENT 'jurusan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(101, 'IPA'),
(102, 'IPS'),
(103, 'BAHASA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(3) NOT NULL,
  `kelas` varchar(2) NOT NULL COMMENT 'kelas',
  `sub_kls` varchar(4) NOT NULL COMMENT 'sub kelas siswa'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `sub_kls`) VALUES
(1, 'X', 'A'),
(2, 'X', 'B'),
(3, 'X', 'C'),
(4, 'X', 'D'),
(7, 'X', 'E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(3) NOT NULL,
  `prioritas` varchar(10) NOT NULL COMMENT 'prioritas',
  `id_jurusan` int(3) NOT NULL COMMENT 'id_jurusan',
  `bobot` float NOT NULL COMMENT 'bobot kriteria'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `prioritas`, `id_jurusan`, `bobot`) VALUES
(1, 'NILAI', 101, 0.73),
(2, 'NILAI', 102, 0.73),
(3, 'NILAI', 103, 0.73);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajaran`
--

CREATE TABLE IF NOT EXISTS `matapelajaran` (
  `id_matapelajaran` int(5) NOT NULL,
  `id_jurusan` int(3) NOT NULL COMMENT 'id_jurusan',
  `matapelajaran` varchar(15) NOT NULL COMMENT 'matapelajaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matapelajaran`
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
-- Struktur dari tabel `matapelajaran_guru`
--

CREATE TABLE IF NOT EXISTS `matapelajaran_guru` (
`id_matapelajaran_guru` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL COMMENT 'nip guru',
  `id_matapelajaran` int(5) NOT NULL COMMENT 'id matapelajaran',
  `id_kelas` int(3) NOT NULL COMMENT 'kelas',
  `sub_kls1` char(1) DEFAULT NULL COMMENT 'sub kelas 1',
  `sub_kls2` char(1) DEFAULT NULL COMMENT 'sub kelas 2',
  `sub_kls3` char(1) DEFAULT NULL COMMENT 'sub kelas 3',
  `sub_kls4` char(1) DEFAULT NULL COMMENT 'sub kelas 4',
  `sub_kls5` char(1) DEFAULT NULL COMMENT 'sub kelas 5',
  `sub_kls6` char(1) DEFAULT NULL COMMENT 'sub kelas 6'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `matapelajaran_guru`
--

INSERT INTO `matapelajaran_guru` (`id_matapelajaran_guru`, `nip`, `id_matapelajaran`, `id_kelas`, `sub_kls1`, `sub_kls2`, `sub_kls3`, `sub_kls4`, `sub_kls5`, `sub_kls6`) VALUES
(9, '197609282003121009', 402, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(10, '197509272003121003', 203, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(11, '197702022000122006', 201, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(12, '197702022000122006', 202, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(13, '197101222005012008', 204, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(14, '197805092006041009', 301, 1, 'A', 'B', 'C', 'D', 'E', NULL),
(15, '196410281999032003', 302, 1, 'A', 'B', 'C', 'D', 'E', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1447086563),
('m130524_201442_init', 1447086575);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minat_psikotes`
--

CREATE TABLE IF NOT EXISTS `minat_psikotes` (
`id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL COMMENT 'nis siswa',
  `minat` varchar(6) NOT NULL COMMENT 'minat siswa',
  `psikotes` varchar(6) NOT NULL COMMENT 'psikotes siswa'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `minat_psikotes`
--

INSERT INTO `minat_psikotes` (`id`, `nis`, `minat`, `psikotes`) VALUES
(1, '111', 'ips', 'ipa'),
(2, '213', '101', '102'),
(3, '3434343', '103', '101');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(5) NOT NULL,
  `nis` varchar(10) NOT NULL COMMENT 'nis siswa',
  `id_matapelajaran` int(11) NOT NULL COMMENT 'id matapelajaran',
  `nilai` float DEFAULT NULL COMMENT 'nilai siswa',
  `tahun_ajaran` char(12) DEFAULT NULL COMMENT 'tahun ajaran'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL COMMENT 'nama siswa',
  `id_kelas` int(3) NOT NULL COMMENT 'id kelas siswa',
  `password` varchar(15) NOT NULL COMMENT 'password siswa',
  `email` varchar(20) NOT NULL COMMENT 'email siswa',
  `tempat_lahir` varchar(20) NOT NULL COMMENT 'tempat lahir siswa',
  `tgl_lahir` date NOT NULL COMMENT 'tanggal lahir siswa',
  `no_telp` varchar(15) NOT NULL COMMENT 'nomor telepon siswa',
  `jns_kelamin` enum('L','P') NOT NULL COMMENT 'jenis kelamin siswa',
  `alamat` text NOT NULL COMMENT 'alamat siswa',
  `foto` varchar(50) DEFAULT NULL COMMENT 'foto siswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `id_kelas`, `password`, `email`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `jns_kelamin`, `alamat`, `foto`) VALUES
('0987654', 'lkjhgfdsamnbv', 3, 'xxxxx', 'poiuytrew', 'poiuytre', '1970-01-01', '1234569876', 'P', 'khgfdtrewbvcx', 'bVU4uxddbrAw70gBc-vXawHIbWLhITGE.jpg'),
('11', '111', 1, '34434343', 'feeef@ggg.vom', 'fefef', '1970-01-01', '333', 'L', 'fdsfs', 'gkuLLYUcW07PhOEzExhRUcCnDaCUsESG.jpg'),
('111', '11', 2, '111', '1', '1', '1998-02-02', '1111', 'L', '111', 'RopdpAvQBd6mtkxyYvmOWdGRJJEOlaQ4.jpg'),
('12121212', 'asdddd', 3, 'qwer', 'asd@fr.vf', 'sedan', '2001-03-11', '675432987654', 'P', 'fghgkj', 'zp29meWaYd2UBylPTuxE9tew9kuXHH2a.jpg'),
('13456', 'asssssssss', 3, 'adf', 'qwe@gt.ol', 'asderf', '2002-09-09', '1246789065', 'L', 'sfggdhdh', 'pbjr9q2Y8xP5Ow1_m8_PcFYah05xr08J.jpg'),
('213', '2dddd', 1, 'ddwdw', '2222@gg.com', 'ahaskjh', '1998-03-01', '44444', 'L', '44', 'vYiVTSWEKjckwxCi9SnTyQiJ_GUdMuX8.jpg'),
('22222222', '11', 2, '111', '1', '1', '1998-02-02', '1111', 'L', '111', 'Nd9nA6OOKKsFWFKj7K9CVPZf-QmVIp1i.jpg'),
('2321434343', 'yugjhgjh', 1, '5555', 'youporn@xxx.com', 'rrrr', '1999-03-02', '99898', 'L', 'seeellll', 'S6DWlEpJEhhDT1EGw2bgJm2nDIavOY7h.jpg'),
('2375', 'jygs', 3, 'qwert34', 'jhas@jha.vo', 'dfs', '1998-05-07', '8654352368', 'P', 'asdfasgsrthdhsf', 'TrjLYl7E8El_RdYtcErMQS1VIcUMM_0G.jpg'),
('3434343', 'saf xx', 3, '45678', 'teen@youporn.com', 'ss', '1997-01-01', '12345678901213', 'L', 'fff', 'NeecuYd3KFL4ggqpZGqzbi8ydHcz406q.jpg'),
('44', '444', 2, 'rewrw', 'wr@ff.com', 'fsd;lffh', '2000-12-02', 'fdfndkjfhkh', 'L', 'fffs', 'I4JNzeSOh-DsQh9FYqmp07q1o5KrLRf1.jpeg'),
('44444444', 'yugjhgjh', 1, '5555', 'youporn@xxx.com', 'rrrr', '1999-03-02', '99898', 'L', 'seeellll', 'MHdyKq9wDCywGPnBteJ8jn3Tw8iRYq1n.jpg'),
('5456778786', 'hkhkhk', 2, 'hh', 'ddd@xx.com', 'ddddd', '1997-01-01', '344', 'L', 'fsdffdf', ''),
('564', 'dgfhjsdgf', 2, '777', 'ffff@gg.com', 'rtyui', '1998-01-01', '09812982', 'L', 'ythuijkm', 'm1iVhKqiNy_uq70pn5VpA326Yx9QiQzu.jpeg'),
('6578987098', 'saf xx', 3, '45678', 'teen@youporn.com', 'ss', '1997-01-01', '12345678901213', 'L', 'fff', 'Emoo89j9UxVM7D6OeOlAwbq1m4wpyVmW.jpg'),
('6788', 'agsh', 3, 'ajhs', 'uiy@ha.vo', 'ngah', '1999-04-02', '12345679643', 'L', 'aaaaaaaaadfgertret', 'yf8YoOwUbxuENki_fnDj9k8q3OAi5nZ1.jpg'),
('7777777777', 'hkhkhk', 2, 'hh', 'ddd@xx.com', 'ddddd', '1997-01-01', '344', 'L', 'fsdffdf', ''),
('8888', 'yugjhgjh', 1, '5555', 'youporn@xxx.com', 'rrrr', '1999-03-02', '99898', 'L', 'seeellll', 'kc5A4sxQnMq3ZC3X5g5dhMKffW5ac0BN.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `level` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `level`) VALUES
(1, '0987654', 'yBdWZNjsDYsCc5y3edGo-GgjEqy_vx3K', '$2y$13$8rTp9OrvdJDsYd0jToLzAekezIXAJYponEvE1sJbOgwsLsyt9rFoK', NULL, 'poiuytrew', 10, 1447087540, 1449245044, 'admin'),
(21, 'admix', 'e8WlvDsXqdyPkfCzH0wSQ4jwZsBbT9dl', '$2y$13$QBXPWuXdHswxod.SFuUbDONM9c1loo0DYe1MAD6dlqstzCDlq3MFq', NULL, 'admix@gmail.com', 10, 1449068283, 1449068283, 'admin'),
(26, 'edi@gmail.com', 'bwaZQkvpVvA0QkUTooB5ZLosaMhG_VBV', '$2y$13$vZNeovZcW89NnUoqXIWqtejTAwQ2kp/wvm5uIzC7rBCkhGYF68LHG', NULL, 'edi@gmail.com', 10, 1449246775, 1449246775, 'guru'),
(27, 'sui@gmail.com', 'pmXRu_CaOTOCKys46umQa1IzyZ3hs6v1', '$2y$13$UTezcGy3osC2ji4KowhJ5umTOeF7sV2y1oo9PHsk3hDKq9t3QcGa2', NULL, 'sui@gmail.com', 10, 1449249177, 1449249177, 'guru'),
(28, 'admin', 'I_FckcbduWQ74qVWWdvlvGo2CgTmFXZu', '$2y$13$P9W9CEzLHyVpe94CRcR0rOoN88V6D9IRNX6Gc7DbDOIgQNiOLrHGy', NULL, 'admin@gmail.com', 10, 1449249367, 1449249367, 'admin'),
(29, 'susi@gmail.com', 'jyrRXQUIq1t1JThevvNGlDBuI29AOhe1', '$2y$13$berJTp2jGaZxWaTbYvWJ7uQoJ.MfU1GakTH3EfYRxX145JKmYtuHG', NULL, 'susi@gmail.com', 10, 1449251960, 1449251960, 'guru'),
(30, 'wiya@gmail.com', 'u160SvHU-DpwUj7WddvKeyD3SSsFJGB7', '$2y$13$5WnW/mRTHkvoWL9ldPDXUuUBBqMuOy3GXFpyIAqqOYWxcvjEghxGa', NULL, 'wiya@gmail.com', 10, 1449252544, 1449252544, 'guru'),
(31, 'elly@gmail.com', 'Ik1DguKmeoFF-W_tUoSfvOcNbK-RO5tg', '$2y$13$8IsPKWokceQGy6UOSEOPp.bsJ60AUWjAKfsN/F4bvnd7rz7xz101C', NULL, 'elly@gmail.com', 10, 1449253140, 1449253140, 'guru'),
(32, 'meidi@gmail.com', 'DEmmRdUsassOGoG_7nJtHcKRbUa7siNH', '$2y$13$iBS0HNwM9U8jYIcIcxnJh.tNKTpdtq.XSnGXmNheXa2GWVieRJFTC', NULL, 'meidi@gmail.com', 10, 1449253507, 1449253507, 'guru'),
(33, 'endang@gmail.com', 'MYNo7n2mXMvCCnduiZaYz0lfFPjEVIC0', '$2y$13$1gdKO9nj2eDLYJpwGBis6ukgKbSMXAGdPhwGs44zmuoPuQdmKQy4y', NULL, 'endang@gmail.com', 10, 1449253844, 1449253844, 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`), ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
 ADD PRIMARY KEY (`id_matapelajaran`), ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `matapelajaran_guru`
--
ALTER TABLE `matapelajaran_guru`
 ADD PRIMARY KEY (`id_matapelajaran_guru`), ADD KEY `matapelajaran_guru_ibfk_1` (`id_matapelajaran`), ADD KEY `id_kelas` (`id_kelas`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `minat_psikotes`
--
ALTER TABLE `minat_psikotes`
 ADD PRIMARY KEY (`id`), ADD KEY `nis` (`nis`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `nis` (`nis`), ADD KEY `id_matapelajaran` (`id_matapelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`), ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matapelajaran_guru`
--
ALTER TABLE `matapelajaran_guru`
MODIFY `id_matapelajaran_guru` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `minat_psikotes`
--
ALTER TABLE `minat_psikotes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
ADD CONSTRAINT `matapelajaran_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matapelajaran_guru`
--
ALTER TABLE `matapelajaran_guru`
ADD CONSTRAINT `matapelajaran_guru_ibfk_1` FOREIGN KEY (`id_matapelajaran`) REFERENCES `matapelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `matapelajaran_guru_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `matapelajaran_guru_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `minat_psikotes`
--
ALTER TABLE `minat_psikotes`
ADD CONSTRAINT `minat_psikotes_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_matapelajaran`) REFERENCES `matapelajaran_guru` (`id_matapelajaran_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
