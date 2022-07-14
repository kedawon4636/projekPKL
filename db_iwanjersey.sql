-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 06.55
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `tb_pembayaran`
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
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(4, 55, 'afika talita', 'Mandiri', 320000, '2022-06-12', '220612111107iwan spanduk.jpg'),
(5, 58, 'def', 'sdf', 213, '2022-06-12', '220612224905foto1.jpg'),
(6, 61, 'dsfg', 'dsf', 2112341, '2022-06-14', '220614164314foto1.jpg'),
(7, 63, 'iwan', 'Mandiri', 205000, '2022-06-20', '220620054836035f2bc3-0ff7-4632-8665-b593aecd7604.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pembeli` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `provinsi` varchar(300) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pembeli`, `nama`, `nomer`, `provinsi`, `jalan`, `tanggal_pembelian`, `jumlah_pembelian`, `ongkir`, `status_pembelian`, `resi_pengiriman`) VALUES
(55, '65', 'afika talita', '08562991782', 'jateng, kab.brebes, kec.larangan, desa kedawon rt 3 rw 06, kode pos 52262', 'gang 1 kh mustamidiyah', '2022-06-12', 320000, 30000, 'Sudah kirim pembayaran', ''),
(56, '65', 'afika', '08567264728', 'jateng jln sitanggal rengaspendawa rt 03 rw 06 ', 'gang 1 mustamidiyah', '2022-06-12', 120000, 30000, 'pending', ''),
(57, '66', 'afika', '08212324612748', 'jateng', 'gang 1', '2022-06-12', 430000, 30000, 'pending', ''),
(58, '67', 'khamid efendi', '09862372354', 'Jawa tengah, kec.larangan, kab,brebes, rt 03 rw 06 kode pos 52262', 'gang 1 mustamidiyah', '2022-06-12', 375000, 30000, 'Sudah kirim pembayaran', ''),
(59, '67', 'as', '34', 'sd', 'sd', '2022-06-12', 480000, 30000, 'pending', ''),
(60, '67', 's', '34', 'd', 'd', '2022-06-12', 135000, 30000, 'pending', ''),
(61, '62', 's', '23', 's', 'das', '2022-06-14', 115000, 30000, 'Sudah kirim pembayaran', ''),
(62, '67', 'abdur rasyad', '085774186746', 'Jawa Tengah, Kab.Brebes, Kec.Larangan, Desa Kedawon, Kode pos : 52262', 'Gang 1 Sriwedari', '2022-06-15', 250000, 30000, 'pending', ''),
(63, '69', 'kampus', '08675412378', 'Jawa Barat, Cirebon', ' jln mundu no 12', '2022-06-20', 205000, 30000, 'Barang dikirim', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian_produk`
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
-- Dumping data untuk tabel `tb_pembelian_produk`
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
(121, '63', 41, 1, 'jersey mancing', 85000, 800, 800, 85000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `kondisi_produk` varchar(20) NOT NULL DEFAULT 'Baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `stok_produk`, `foto_produk`, `deskripsi_produk`, `kondisi_produk`) VALUES
(36, 'jersey dara', 100000, 800, 4, 'produk1.jpg', 'bahan benzema, ukuran L lengan panjang', 'Baru'),
(40, 'jersey dara', 90000, 800, 9, 'produk1.jpg', 'bahan benzema, ukuran L lengan panjang', 'Baru'),
(41, 'jersey mancing', 85000, 800, 7, 'produk1.jpg', 'bahan benzema, ukuran L lengan pendek', 'Baru'),
(42, 'jersey mancing2', 120000, 800, 5, 'produk1.jpg', 'bahan benzema, ukuran L lengan pendek', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(62, 'khamid', '$2y$10$1BhW.7DZS4iT0GFhcPKmDu8.N0gUjXx9ajk4RJyXmLnzJ1yzBjiOW'),
(63, 'sarip', '$2y$10$Edb18cu81MNAWw9pBSwdLeoGsNeQjfyM66465q/KUTPVoutpgz6H.'),
(64, 'abdul kholik', '$2y$10$StmHFEXKSroiVMSYRiXqd.fkBZpfmo8GA0Lj5KG6UKuUqLzFQ/QUW'),
(65, 'afika', '$2y$10$vwiY5TfdmL3HY3F9PJg3CeDIfI0Bwck.GfWRrWdb8EkPMJO7LW2Hi'),
(66, 'ambil', '$2y$10$TK3akpG96pZc5k5RcccyH.z4fI0dSbA/1..lWF1z8GdrPRzu4hU9W'),
(67, 'tes', '$2y$10$MZNFXS5G4FL3P6TKiGumle73w7KjEsU7UUGWL3clLYBlnLB5.QmmK'),
(68, 'kodir', '$2y$10$fJySF8kFVmgYC3V/yyGl9.fh/s4DD8DBtUEf291GFdtR7/Ct0rz6u'),
(69, 'kampus1', '$2y$10$v.YougB.nX6WpmiIsdK/pOfguzRrXSF3FbCQuTVWFbAETCIJm5dE.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
