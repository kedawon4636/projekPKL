-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 06:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iwanjersey`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_coupon`
--

CREATE TABLE `tb_coupon` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_coupon`
--

INSERT INTO `tb_coupon` (`id`, `nama`, `code`, `status`, `kredit`) VALUES
(1, 'Kemerdekaan Indonesia', 'MERDEKA45', 'Aktif', 10000),
(2, 'Gratis Ongkir', 'Ongkir45', 'Aktif', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(4, 55, 'afika talita', 'Mandiri', 320000, '2022-06-12', '220612111107iwan spanduk.jpg'),
(5, 58, 'def', 'sdf', 213, '2022-06-12', '220612224905foto1.jpg'),
(6, 61, 'dsfg', 'dsf', 2112341, '2022-06-14', '220614164314foto1.jpg'),
(7, 63, 'iwan', 'Mandiri', 205000, '2022-06-20', '220620054836035f2bc3-0ff7-4632-8665-b593aecd7604.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pembeli` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `provinsi` varchar(300) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pembeli`, `nama`, `nomer`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `jalan`, `tanggal_pembelian`, `jumlah_pembelian`, `ongkir`, `status_pembelian`, `resi_pengiriman`) VALUES
(55, '65', 'afika talita', '08562991782', 'jateng, kab.brebes, kec.larangan, desa kedawon rt 3 rw 06, kode pos 52262', '', '', 0, 'gang 1 kh mustamidiyah', '2022-06-12', 320000, 30000, 'Sudah kirim pembayaran', ''),
(56, '65', 'afika', '08567264728', 'jateng jln sitanggal rengaspendawa rt 03 rw 06 ', '', '', 0, 'gang 1 mustamidiyah', '2022-06-12', 120000, 30000, 'pending', ''),
(57, '66', 'afika', '08212324612748', 'jateng', '', '', 0, 'gang 1', '2022-06-12', 430000, 30000, 'pending', ''),
(58, '67', 'khamid efendi', '09862372354', 'Jawa tengah, kec.larangan, kab,brebes, rt 03 rw 06 kode pos 52262', '', '', 0, 'gang 1 mustamidiyah', '2022-06-12', 375000, 30000, 'Sudah kirim pembayaran', ''),
(59, '67', 'as', '34', 'sd', '', '', 0, 'sd', '2022-06-12', 480000, 30000, 'pending', ''),
(60, '67', 's', '34', 'd', '', '', 0, 'd', '2022-06-12', 135000, 30000, 'pending', ''),
(61, '62', 's', '23', 's', '', '', 0, 'das', '2022-06-14', 115000, 30000, 'Sudah kirim pembayaran', ''),
(62, '67', 'abdur rasyad', '085774186746', 'Jawa Tengah, Kab.Brebes, Kec.Larangan, Desa Kedawon, Kode pos : 52262', '', '', 0, 'Gang 1 Sriwedari', '2022-06-15', 250000, 30000, 'pending', ''),
(63, '69', 'kampus', '08675412378', 'Jawa Barat, Cirebon', '', '', 0, ' jln mundu no 12', '2022-06-20', 205000, 30000, 'Barang dikirim', '123'),
(64, '68', 'coba', '123', 'Jawa Tengah', 'Brebes', '', 52262, 'Kedawon rt03 rw 06', '2022-08-26', 228000, 30000, 'pending', ''),
(65, '68', 'hemm', '123', 'jawa  tengah', 'brebes', '', 123, 'kendaga', '2022-08-26', 84000, 30000, 'pending', ''),
(66, '68', 'sad', '123', 'jaw', 'dsf', '', 12344, 'sddfd', '2022-08-26', 75000, 30000, 'pending', ''),
(67, '68', 'yar', '123', 'jawatengah', 'sdf', 'angel', 123, 'adf', '2022-08-26', 75000, 30000, 'pending', ''),
(68, '68', 'sdf', '123', 'dfs', 'sdf', 'sfd', 123, 'zxc', '2022-08-26', 84000, 30000, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_produk`
--

CREATE TABLE `tb_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembeli` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`id_pembelian_produk`, `id_pembeli`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(106, '55', 36, 2, 'jersey dara', 100000, 800, 1600, 200000),
(107, '55', 40, 1, 'jersey dara', 90000, 800, 800, 90000),
(108, '56', 40, 1, 'jersey dara', 90000, 800, 800, 90000),
(109, '57', 40, 1, 'jersey dara', 90000, 800, 800, 90000),
(110, '57', 44, 1, 'tes', 105000, 1000, 1000, 105000),
(111, '57', 42, 1, 'jersey mancing2', 120000, 800, 800, 120000),
(112, '57', 41, 1, 'jersey mancing', 85000, 800, 800, 85000),
(113, '58', 40, 1, 'jersey dara', 90000, 800, 800, 90000),
(114, '58', 41, 3, 'jersey mancing', 85000, 800, 2400, 255000),
(115, '59', 40, 5, 'jersey dara', 90000, 800, 4000, 450000),
(116, '60', 44, 1, 'tes', 105000, 1000, 1000, 105000),
(117, '61', 41, 1, 'jersey mancing', 85000, 800, 800, 85000),
(118, '62', 42, 1, 'jersey mancing2', 120000, 800, 800, 120000),
(119, '62', 36, 1, 'jersey dara', 100000, 800, 800, 100000),
(120, '63', 40, 1, 'jersey dara', 90000, 800, 800, 90000),
(121, '63', 41, 1, 'jersey mancing', 85000, 800, 800, 85000),
(122, '64', 45, 2, 'Jersey Mancing Predator', 54000, 200, 400, 108000),
(123, '64', 46, 2, 'Jersey Mancing Strike', 45000, 230, 460, 90000),
(124, '65', 45, 1, 'Jersey Mancing Predator', 54000, 200, 200, 54000),
(125, '66', 43, 1, 'Jersey mancing strike', 45000, 170, 170, 45000),
(126, '67', 49, 1, 'Jersey Mancing Strike', 45000, 230, 230, 45000),
(127, '68', 45, 1, 'Jersey Mancing Predator', 54000, 200, 200, 54000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `foto_belakang` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `kondisi_produk` varchar(20) NOT NULL DEFAULT 'Baru',
  `size_M` int(11) NOT NULL,
  `size_L` int(11) NOT NULL,
  `size_XXL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `stok_produk`, `foto_produk`, `foto_belakang`, `deskripsi_produk`, `kondisi_produk`, `size_M`, `size_L`, `size_XXL`) VALUES
(43, 'Jersey mancing strike', 45000, 170, 4, '5c42a598a0d8ad528a772ce1021bfcb8.jpg', '', 'BAHAN HAYGET PREMIUM SANGAT ADEM DIPAKAI MUDAH MENYERAP KERINGAT SERTA DITAMBAHKAN PENUTUP KEPALA UNTUK MELINDUNGI KITA DARI TERIK MATAHARI ATAU PANAS DI SIANG HARI DETIL SIZE: SIZE:L 1. Lebar Dada 54 cm 2. Lingkar Dada 108 Cm 3. Lebar Bahu 48 cm 4. Panjang Depan 72 cm 5. Panjang Belakang 80 cm 6. Panjang Dari Ketiak ketangan 56 cm 7. Lingkar tangan 20cm Toleransi -+ 2cm', 'Baru', 1, 2, 2),
(44, 'Jersey Mancing Monster', 50000, 230, 8, '62ff3744c0706fd0769f591f83c76dca.jpg', '', 'BAHAN DRYFIT POLYMESH (BAHAN BERPORI) SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI   Spesifikasi; -Ukuran M  Lebar Dada 52cm / Lingkar Dada 104cm Lebar Bahu 46cm Panjang Depan 70cm Panjang Belakang 78cm  Panjang Dari Ketiak ketangan 54cm Lingkar tangan 20cm', 'Baru', 3, 3, 2),
(45, 'Jersey Mancing Predator', 54000, 200, 6, '214bdb316988d4bfd52b7b6e4907eb0d.jpg', '', 'BAHAN DRY FIT SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI JAHITAN RAPI DAN KUAT {standar pabrik} PRODUKSI LOKAL   spesifikasi : Size M L XL - M = panjang 72 cm X lebar 52 cm lingkar tangan 20cm - L = panjang 74 cm X lebar 53cm lingkar tangan 21 - XL = panjang 76 cm X lebar 58 cm lingkar tangan 22 (size toleransi + - 1 cm )', 'Baru', 2, 4, 4),
(46, 'Jersey Mancing Strike', 45000, 230, 8, '36320a0b5028914bae22763bb71f2fd0.jpg', '', 'BAHAN DRYFIT POLYMESH (BERPORI) SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI  Spesifikasi;ukuran L  Lebar Dada 52cm / Lingkar Dada 104cm Lebar Bahu 46cm Panjang Depan 70cm Panjang Belakang 78cm  Panjang Dari Ketiak ketangan 54cm Lingkar tangan 20cm', 'Baru', 4, 4, 2),
(47, 'Jersey Mancing Stinger', 55000, 250, 7, '260489adc2381b607bda7379af4c60a2.jpg', '', 'BAHAN HIGEN LICIN SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI TOPI TRUCKER JARING PRINTING  Spesifikasi;ukuran L  Lebar Dada 52cm / Lingkar Dada 104cm Lebar Bahu 46cm Panjang Depan 70cm Panjang Belakang 78cm  Panjang Dari Ketiak ketangan 54cm Lingkar tangan 20cm', 'Baru', 2, 2, 3),
(48, 'Jersey Mancing Strike', 47000, 300, 6, '540759bfa6a9d1ad401c6282d67f80d6.jpg', '', 'bahan higet printing super. warna cerah, awet, tdk luntur. tersedia hanya satu ukuran utk satu motif, seperti tertera di foto utama. L = panjang 68cm, lebar dada 50cm. utk berat badan 50-65kg', 'Baru', 2, 2, 2),
(49, 'Jersey Mancing Strike', 45000, 230, 4, 'a3636dae8a0f8c0dedd955d52c16f876.jpg', '', '                    BAHAN DRYFIT T (BERPORI) SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI  Spesifikasi;ukuran M  Lebar Dada 52cm / Lingkar Dada 104cm Lebar Bahu 46cm Panjang Depan 70cm Panjang Belakang 78cm  Panjang Dari Ketiak ketangan 54cm Lingkar tangan 20cm                ', 'Baru', 1, 2, 2),
(50, 'Jersey Mancing AA Fishing', 50000, 166, 4, 'bd9c791f0764b3e20b166072b3ef6b36.jpg', '', '                    BAHAN DRYFIT POLYMESH SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI                 \r\n\r\nUkuran : L\r\nLebar Dada 54 cm / Lingkar Dada 108 cm\r\nLebar Bahu 48 cm\r\nPanjang Depan 72 cm\r\nPanjang Belakang 80 cm\r\nPanjang Dari Ketiak ketangan 56 cm\r\nLingkar tangan 20cm\r\nToleransi -+ 2cm\r\n', 'Baru', 2, 1, 1),
(51, 'Jersey Mancing Original', 65000, 220, 8, 'd90ebfc575b79d949514223fcec7b828.jpg', '', '- Bahan = Full Dry Fit Benzema - Bahan Cetak = Print Sublimasi dengan Tinta EPSON Dimensi Ukuran (L x P x Lingkar Dada) L= 50cm x 72cm x 100cm', 'Baru', 3, 3, 2),
(52, 'Jersey Mancing Toman', 50000, 230, 4, 'e6b17b0f37f40835b1761f8982d7d095.jpg', '', 'BAHAN HIGEN LICIN SABLON PRINTING SUBLIMASI ANTI LUNTUR UKURAN ALL SIZE (SE UKURAN) MUAT SAMPAI L Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI   spesifikasi : Lebar Dada 52cm / Lingkar Dada 104cm Lebar Bahu 46cm Panjang Depan 70cm Panjang Belakang 78cm Panjang Dari Ketiak ketangan 54cm Lingkar tangan 20cm', 'Baru', 2, 1, 1),
(53, 'Jersey Mancing Fishing', 45000, 220, 5, 'f4825dc4dab361dfb095a68de696de7a.jpg', '', 'SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI JAHITAN RAPI DAN KUAT {standar pabrik} PRODUKSI LOKAL  spesifikasi : Size M L - M = panjang 72 cm X lebar 52 cm lingkar tangan 20cm', 'Baru', 3, 1, 1),
(54, 'Jersey Mancing Shimano', 60000, 200, 7, 'f1781258874834877e83a89628dca6b1.jpg', '', 'BAHAN DRY FIT SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI JAHITAN RAPI DAN KUAT {standar pabrik} PRODUKSI lokal Ada resleting di bagian depan Ada topinya   spesifikasi : Size M L XL - M = panjang 72 cm X lebar 52 cm lingkar tangan 20cm - L = panjang 74 cm X lebar 53cm lingkar tangan 21 - XL = panjang 76 cm X lebar 58 cm lingkar tangan 22 (size toleransi + - 1 cm )', 'Baru', 3, 2, 2),
(58, 'coba', 1, 1, 3, '62ff3744c0706fd0769f591f83c76dca.jpg', 'd90ebfc575b79d949514223fcec7b828.jpg', '                    BAHAN HIGEN LICIN SABLON PRINTING SUBLIMASI ANTI LUNTUR Quick Dry (Cepat Kering) DAN YANG PASTI HARGA MURAH POLA BAGUS NYAMAN DIPAKAI TOPI TRUCKER JARING PRINTING  Spesifikasi;ukuran L  Lebar Dada 52cm / Lingkar Dada 104cm Lebar Bahu 46cm Panjang Depan 70cm Panjang Belakang 78cm  Panjang Dari Ketiak ketangan 54cm Lingkar tangan 20cm                ', 'Baru', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(62, 'khamid', '$2y$10$1BhW.7DZS4iT0GFhcPKmDu8.N0gUjXx9ajk4RJyXmLnzJ1yzBjiOW'),
(63, 'sarip', '$2y$10$Edb18cu81MNAWw9pBSwdLeoGsNeQjfyM66465q/KUTPVoutpgz6H.'),
(64, 'abdul kholik', '$2y$10$StmHFEXKSroiVMSYRiXqd.fkBZpfmo8GA0Lj5KG6UKuUqLzFQ/QUW'),
(65, 'afika', '$2y$10$vwiY5TfdmL3HY3F9PJg3CeDIfI0Bwck.GfWRrWdb8EkPMJO7LW2Hi'),
(66, 'ambil', '$2y$10$TK3akpG96pZc5k5RcccyH.z4fI0dSbA/1..lWF1z8GdrPRzu4hU9W'),
(67, 'tes', '$2y$10$MZNFXS5G4FL3P6TKiGumle73w7KjEsU7UUGWL3clLYBlnLB5.QmmK'),
(68, 'kodir', '$2y$10$fJySF8kFVmgYC3V/yyGl9.fh/s4DD8DBtUEf291GFdtR7/Ct0rz6u'),
(69, 'kampus1', '$2y$10$v.YougB.nX6WpmiIsdK/pOfguzRrXSF3FbCQuTVWFbAETCIJm5dE.'),
(70, 'coba', '$2y$10$Cgjtz2xyQtYFYrLqtAhob.ypYcJR.CYW7sQzxRMmcJmqX7h3D.EV.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_coupon`
--
ALTER TABLE `tb_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_coupon`
--
ALTER TABLE `tb_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
