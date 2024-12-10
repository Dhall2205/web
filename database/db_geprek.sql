-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 06:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokolaptopdk`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `produk_id`, `qty`, `pesanan_id`) VALUES
(52, 1, 1, 46),
(53, 1, 1, 47),
(54, 2, 1, 48);

-- --------------------------------------------------------

--
-- Table structure for table `info_pembayaran`
--

CREATE TABLE `info_pembayaran` (
  `id` int(11) NOT NULL,
  `info` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `info_pembayaran`
--

INSERT INTO `info_pembayaran` (`id`, `info`) VALUES
(1, 'Silahkan lakukan pembayaran DP 50% terlebih dahulu sebelum hari H.\r\nJika tidak maka transaksi akan di batalkan.\r\n\r\nPembayaran Bisa Melalui Rekening Di Bawah Ini :\r\nNama Bank  : Bank Syariah Indonesia (BSI)\r\nNo. Rek    : 7261282857\r\nNama       : Gebrina Rizki\r\nKode Bank  : 451\r\nKode Swift : ADMBSS \r\n\r\nKemudian lakukan konfirmasi di menu konfirmasi pembayaran.\r\n\r\nKirim Bukti Transfer ke :\r\nWhatsApp   : 082276429672\r\nEmail      : Gebrina293@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `deskripsi`) VALUES
(6, 'LAPTOP TERBARU', 'Tersedia berbagai macam spesifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(98, '', 'Afdhalmbo683@gmail.com', '', ''),
(99, '', 'cut@gmail.com', '', ''),
(102, '', 'cut@gmail.com', '', ''),
(103, '', 'cut@gmail.com', '', ''),
(104, '', 'cut@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `ongkir`) VALUES
(1, 'John pahlawan', 10000),
(2, 'Samatiga', 15000),
(3, 'Woyla', 20000),
(4, 'Meurubo', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_pengeluaran` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `Tanggal_pengeluaran` date NOT NULL,
  `harga` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_pengeluaran`, `nama_barang`, `Tanggal_pengeluaran`, `harga`, `jumlah`, `total`) VALUES
(46, 'Charger', '2024-11-28', '250000', 2, 500000),
(47, 'Tas Laptop', '2024-11-28', '100000', 5, 500000),
(48, 'Handset Bluetooth', '2024-11-28', '120000', 4, 480000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('pending','verified','','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pesanan`, `id_user`, `file`, `total`, `status`, `keterangan`, `created_at`) VALUES
(23, 46, 24, 'bukti pembayaranBukti pembayaran.jpg', 2147483647, 'verified', 'SUDAH BAYAR', '2024-11-28 12:16:34'),
(24, 47, 24, 'bukti pembayaranBukti pembayaran.jpg', 15514000, 'verified', 'LUNAS', '2024-11-28 15:03:44'),
(25, 48, 15, 'bukti pembayaranbukti pembayaranBukti pembayaran.jpg', 20000000, 'verified', 'blm lunas', '2024-12-01 12:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(5) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_digunakan` datetime NOT NULL,
  `user_id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `read` enum('0','1') NOT NULL,
  `status` enum('lunas','belum lunas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal_pesan`, `tanggal_digunakan`, `user_id`, `nama`, `alamat`, `kota`, `ongkir`, `telephone`, `read`, `status`) VALUES
(46, '2024-11-28 06:15:35', '2024-11-26 00:00:00', 24, 'Nurul Afdhal', 'Desa Cot Darat, Kec. Samatiga, Kab. Aceh Barat', 'Samatiga', 15000, '0898765432', '1', 'lunas'),
(47, '2024-11-28 09:03:02', '2024-11-25 00:00:00', 24, 'Nurul Afdhal', 'Desa Cot Darat, Kec. Samatiga, Kab. Aceh Barat', 'Samatiga', 15000, '085360177840', '1', 'lunas'),
(48, '2024-12-01 06:47:56', '2024-11-29 00:00:00', 15, 'Cut handriyani', 'woyla', 'Woyla', 20000, '082265432891', '1', 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(100) NOT NULL,
  `kategori_produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `gambar`, `harga`, `kategori_produk_id`) VALUES
(1, 'Acer Nitro 5(AN515-57)', 'Memiliki warna hitam dengan\r\nRAM 16GB DDR4', '49eb6a44db57cba8d66b3404fa9f0ad4Acer Nitro Baru.png', 15499000, 6),
(2, 'DELL XPS 17 9720 (2022)', 'Memiliki warna Black dan Silver\r\ndengan RAM 16GB ', '49eb6a44db57cba8d66b3404fa9f0ad4Dell XPS Baru.png', 27999000, 6),
(3, 'LENOVO YOGA 7I GEN 7', 'Memiliki warna Silver dan Gold\r\ndengan RAM 8GB LPDDL4X', '49eb6a44db57cba8d66b3404fa9f0ad4Yoga 7i Baru.png', 15689000, 6),
(4, 'HUAWEI MATEBOOK D 16 2022', 'Memiliki warna Silver dan Gray\r\ndengan RAM 16GB ', '49eb6a44db57cba8d66b3404fa9f0ad4Huawei Baru.png', 17999000, 6),
(5, 'APPLE MATEBOOK PRO (2021)', 'Memiliki warna Black, Silver dan Gray\r\ndengan RAM 16GB', '49eb6a44db57cba8d66b3404fa9f0ad4Apple MateBook Baru.png', 18000000, 6),
(6, 'HP ELITBOOK 845 G9/h5 Serie Terbaru', 'Memiliki warna Silver \r\ndengan RAM 8GB 4800 MHz DDR5', '49eb6a44db57cba8d66b3404fa9f0ad4Hp Elite Baru.png', 30150000, 6),
(7, 'LENOVO YOGA 9i 14 (GEN 7)', 'Memiliki warna Gray\r\ndengan RAM 8GB 5200 MHz LPDDR5', '49eb6a44db57cba8d66b3404fa9f0ad4Levovo Yoga 9i Baru.png', 151999000, 6),
(8, 'ASUS VIVOBOOK PRO 16X OLED(K6604)', 'Memiliki warna Black, Silver dan Gray\r\ndengan RAM 8GB 3200 MHz DDR4', '49eb6a44db57cba8d66b3404fa9f0ad4Asus Vivibook 16x Baru.png', 31999000, 6),
(9, 'ASUS VIVOBOOK S 14X (S5402)', 'Memiliki warna Black, Silver dan Gray\r\ndengan RAM 4GB DDR4', '49eb6a44db57cba8d66b3404fa9f0ad414 Baru.png', 11999000, 6),
(10, 'DELL ALIENWARE X17 R2 TERBARU', 'Memiliki warna White\r\ndengan RAM 32GB 4800 MHz DDR5', '49eb6a44db57cba8d66b3404fa9f0ad4Dell Alienware Baru.png', 28499000, 6),
(11, 'APPLE MACBOOK AIR (M1, 2020)', 'Memiliki warna Silver, Gold dan Gray\r\ndengan RAM 8GB LPDDR4X', '49eb6a44db57cba8d66b3404fa9f0ad4Apple MateBook Air Baru.png', 10699000, 6),
(12, 'MICROSOFT SURFACE PRO 8', 'Memiliki warna Black dan Silver\r\ndengan RAM 8GB 4266 MHz LPDDR4X', '49eb6a44db57cba8d66b3404fa9f0ad4Microsoft Baru.png', 10899000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `telephone`, `alamat`, `password`, `status`) VALUES
(1, 'Gebrina rizki', 'geby@gmail.com', '082276429672', 'Peunaga', 'geby', 'admin'),
(9, 'Pemilik', 'admin@gmail.com', '085324131954', 'Peunaga', 'admin', 'admin'),
(15, 'Cut handriyani', 'cut@gmail.com', '082265432891', 'woyla', 'cut', 'user'),
(20, 'Abelia husna', 'abel@gmail.com', '082276425432', 'samatiga', 'abel', 'user'),
(24, 'Nurul Afdhal', 'Afdhalmbo683@gmail.com', '0898765432', 'Desa Cot Darat, Kec. Samatiga, Kab. Aceh Barat', 'dhall', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`,`produk_id`,`pesanan_id`),
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`,`kategori_produk_id`),
  ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
