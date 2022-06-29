-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 07.36
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askunla`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `cont_id` int(11) NOT NULL,
  `cont_type` varchar(25) NOT NULL,
  `cont_nama` varchar(50) NOT NULL,
  `cont_jobdesk` varchar(50) NOT NULL,
  `cont_prodi` varchar(50) NOT NULL,
  `cont_fakultas` varchar(50) NOT NULL,
  `cont_telp1` varchar(20) NOT NULL,
  `cont_telp2` varchar(20) NOT NULL,
  `cont_fax` varchar(20) NOT NULL,
  `cont_email` varchar(150) NOT NULL,
  `cont_wa` varchar(25) NOT NULL,
  `cont_sosmed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`cont_id`, `cont_type`, `cont_nama`, `cont_jobdesk`, `cont_prodi`, `cont_fakultas`, `cont_telp1`, `cont_telp2`, `cont_fax`, `cont_email`, `cont_wa`, `cont_sosmed`) VALUES
(20, 'General', 'Universitas Langlangbuana', 'General Information', '-', '-', '0224218084', '0228347934', '0224237144', 'mail@unla.ac.id  &  info@unla.ac.id', '08523379234', 'Instagram : @universitaslanglangbuana'),
(21, 'General', 'Fakultas Teknik Universitas Langlangbuana', 'General Information', '-', 'Teknik', '0224218086', '0224218086', '02258335973', 'fakultasteknik.unla.bdg@gmail.com', '0854218086', 'Instagram:@ftunla'),
(22, 'Private', 'Jemi Yohana', 'Dosen', 'Informatika', 'Teknik', '085222938703', '086219426292', '022824924869', 'rifkydzalbarry25@gmail.com', '085222938703', 'Instagram : @jems_'),
(23, 'Private', 'Farrel Anggara Permana', 'Dosen', 'Arsitektur', 'Teknik', '085862975391', '08532492432', '022549553', 'farelanggara14@gmail.com', '085862975391', 'Instagram: @farelanggara'),
(24, 'Private', 'Deni Suparhan', 'Dosen', 'Industri', 'Teknik', '0835927532', '0894324922', '02238422529', 'dotblack09@gmail.com', '0835927532', 'Instagram:@denisu_'),
(25, 'General', 'Teknik Industri', 'General Information', 'Industri', 'Teknik', '0224218086', '02243296424', '0224218086', 'info @ teknik-industri-unla.id', '085329242234', 'Instagram : @ftindustri_unla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `req_id` int(11) NOT NULL,
  `req_tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(11) NOT NULL,
  `id_cont` varchar(250) NOT NULL,
  `specify` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `req_status` varchar(25) NOT NULL DEFAULT 'Requested',
  `req_result` text NOT NULL DEFAULT 'Waiting Respons from Administrator',
  `sendmail` smallint(6) NOT NULL DEFAULT 0,
  `respons` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`req_id`, `req_tgl`, `userid`, `id_cont`, `specify`, `reason`, `req_status`, `req_result`, `sendmail`, `respons`) VALUES
(2, '2021-06-18 16:42:23', 29, '16', 'All Contact', 'Karena ada keperluan mengenai perkuliahan', 'Accepted', '                    Accepted[2021-06-18 11:42:14pm]\r\n          Telp. : 231641561 / 2131564646          Fax. : 54564          Email : richie.pay26@gmail.com          Whatsapp : 0546456          Social Media : gddsdfsfdhg                    ', 1, 1),
(3, '2021-06-21 15:03:54', 31, '16', 'All Contact', 'Untuk Keperluan Perkuliahan', 'Accepted', 'Accepted [2021-06-21 10:03:47pm]\r\nTelp. : 231641561 / 2131564646\r\nFax. : 54564\r\nEmail : richie.pay26@gmail.com\r\nWhatsapp : 0546456\r\nSocial Media : gddsdfsfdhg\r\n									  ', 1, 1),
(5, '2021-06-22 03:20:02', 34, '19', 'WhatsApp', 'Kebutuhan Perkuliahan', 'Accepted', 'Accepted [2021-06-22 10:19:54am]\r\n\r\nWhatsapp : 089678500033\r\n									  ', 1, 1),
(6, '2021-06-22 03:15:02', 34, '16', 'All Contact', 'Perkuliahan', 'Accepted', 'Accepted [2021-06-22 10:14:41am]\r\nTelp. : 089692830633 / 089692830633\r\nFax. : 54564\r\nEmail : richie.pay26@gmail.com\r\nWhatsapp : 089692830633\r\nSocial Media : gddsdfsfdhg\r\n									  ', 1, 1),
(9, '2021-06-28 07:00:12', 32, '17', 'All Contact', 'for ask Taopik!', 'Accepted', 'Accepted [2021-06-28 02:00:07pm]\r\nTelp. : 085811173233 / 085811173233\r\nFax. : 0234565\r\nEmail : mochammad.taopik10@gmail.com\r\nWhatsapp : 0254697\r\nSocial Media : @mhd.haryanto\r\n									  ', 1, 1),
(10, '2021-06-29 02:17:52', 40, '16', 'WhatsApp', 'Perkuliahan', 'Accepted', 'Accepted [2021-06-29 09:17:48am]\r\n\r\nWhatsapp : 089692830633\r\n									  ', 1, 1),
(11, '2021-07-11 04:16:55', 47, '24', 'All Contact', 'Test', 'Accepted', 'Accepted [2021-07-11 11:16:52am] by [admin2]\r\nTelp. : 0835927532 / 0894324922\r\nFax. : 02238422529\r\nEmail : dotblack09@gmail.com\r\nWhatsapp : 0835927532\r\nSocial Media : Instagram:@denisu_\r\n									  ', 1, 1),
(12, '2021-07-26 02:42:45', 47, '24', 'All Contact', 'TESTING', 'Rejected', 'Please Try Again Later! Your request was rejected', 1, 1),
(13, '2021-07-26 02:49:37', 47, '24', 'WhatsApp', 'wa boy', 'Accepted', 'Accepted [2021-07-26 09:49:29am]\r\n\r\nWhatsapp : 0835927532\r\n                  ', 1, 1),
(14, '2021-07-26 03:58:35', 47, '22', 'All Contact', 'test 2', 'Requested', 'Waiting Respons from Administrator', 0, 0),
(15, '2022-04-07 02:45:27', 43, '23', 'All Contact', 'test', 'Requested', 'Waiting Respons from Administrator', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` varchar(25) NOT NULL DEFAULT 'Mahasiswa',
  `fullname` varchar(50) NOT NULL,
  `no_identitas` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tmpt_tgl_lahir` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `photo` varchar(25) NOT NULL DEFAULT 'default.png',
  `verifikasi` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `type`, `fullname`, `no_identitas`, `alamat`, `jenis_kelamin`, `tmpt_tgl_lahir`, `no_telp`, `email`, `photo`, `verifikasi`) VALUES
(21, 'admin1', '$2y$10$CqPlIeFmZetmURVPQMNedOtQmopzN2L6H10T3GuixbDUai5AwjfC2', 'Administrator', 'Rochman Setiono', '41155050190035', 'Komp. Cibo Indah', 'Laki-laki', 'Bandung, 26 Oktober 1998', '089622162615', 'rochmansetiono26@gmail.com', 'Pas_Foto.JPG', '1'),
(36, 'SP-Admin1', '$2y$10$MexiVjE1fID1iTRUWuK.EOBbhARN.wzLYgN6X9Uwv.CdWvYlRkWsC', 'Super Administrator', 'Rochman Setiono', '411255050190001', 'Komp. Cibogo Indah', 'Laki-laki', 'Bandung, 26 Oktober 1998', '089622162615', 'unlaaslab@gmail.com', 'default.png', '1'),
(41, 'admin2', '$2y$10$QOLV4PjjcPbsllW6jUgXkurvrWxwwwk4/fmgPthONebnX9jO3zcLq', 'Administrator', 'Moch Syahril Anas', '41155050190008', 'Panyaungan, RT02 / RW01, Ds. Nagrak, Kec. Cangkuang, Kab. Bandung', 'Laki-laki', 'Bandung, 12 April 2001', '089678500033', 'syahrilanas09@gmail.com', 'default.png', '1'),
(42, '41155050190034', 'GVHeF4lLpI', 'Mahasiswa', 'Rifky Dzalbarry', '41155050190034', 'Kp. Babakan No. 66 RT.02 / RW.09 Ds. Rancamanyar Kec.Baleendah Kab. Bandung', 'Laki-laki', 'Bandung, 25 Juli 1999', '089692830633', 'dzalbarry25@gmail.com', 'default.png', '1'),
(43, '41155050190010', '$2y$10$pllUEtRQapfW2UHp6uxuhuldL9IefVz5vYawaAfdPVjO2ZFLkDVXC', 'Mahasiswa', 'Mochamad Taopik Haryanto', '41155050190010', 'Majalaya', 'Laki-laki', 'Majalaya, 10 November 2000', '087722088402', 'mochammad.taopik10@gmail.com', 'jack3.png', '1'),
(44, '41155050190005', '$2y$10$xarsdZAi.8in9ipDLrq6geIJ5w0Ndvi42a0DYzicZqDrc.dsKTDOe', 'Mahasiswa', 'Oktavia Eka Pratiwi', '41155050190005', 'Kota Lampung', 'Perempuan', 'Lampung, 10 Oktober 1999', '085669953707', 'ajaoktavia129@gmail.com', 'default.png', '1'),
(45, '41155050190036', '$2y$10$1vVIdBisLVsYWXy/.o8ibuvv5wioy2lgjj4cQ5nXOaSVsMLrsdby6', 'Mahasiswa', 'Latifudin Ma\'arif', '41155050190036', 'Majalengka', 'Laki-laki', 'Majalengka, 25 Agustus 2000', '082240601218', 'latifshiunick@gmail.com', 'jack6.png', '1'),
(46, '41155050190019', '$2y$10$XMO/2kwCjE9hRg.fGvAM0.fNfSz22NpmHn3Sxd5g7g3JnKcg6LEjm', 'Mahasiswa', 'Diki Sugandi', '41155050190019', 'Indramayu', 'Laki-laki', 'Indramayu, 7 Juli 2000', '082321761707', 'dikisugandi74@gmail.com', 'default.png', '1'),
(49, '123', '$2y$10$7Q71FEUU.w93q2IafHomCO6B9M8MBOWqOS4vO1Q04.lYLLx.Uoldi', 'Mahasiswa', 'testing', '123', NULL, NULL, NULL, '0123456789', 'bluegames0909@gmail.com', 'default.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
