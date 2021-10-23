-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jan 2019 pada 03.06
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin2`
--

CREATE TABLE `t_admin2` (
  `idAdmin` varchar(10) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin2`
--

INSERT INTO `t_admin2` (`idAdmin`, `Nama`, `Alamat`, `Email`, `Username`, `Password`) VALUES
('ADM001', 'Abdurraghib Segaf', 'Jalan Kelapa Tiga no 23, Mataram', 'abdurraghib@gmail.com', 'raghibss', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota`
--

CREATE TABLE `t_anggota` (
  `idAnggota` varchar(10) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_anggota`
--

INSERT INTO `t_anggota` (`idAnggota`, `Nama`, `Alamat`, `Email`, `Username`, `Password`) VALUES
('ANG001', 'Donny Kurniawan', 'Mataram', 'donyacm25@gmail.com', 'donny', '12345'),
('ANG002', 'Lilik Nurhayati', 'Narmada, Lombok Barat', 'lilik_nurhayati@yaho', 'lilik', '123456789'),
('ANG003', 'Abdurraghib', 'Jalan Kelapa 3', 'abdurraghib@gmail.co', 'raghib', 'kelapa323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku`
--

CREATE TABLE `t_buku` (
  `idBuku` varchar(10) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Penerbit` varchar(30) NOT NULL,
  `Tahun_terbit` year(4) NOT NULL,
  `Jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_buku`
--

INSERT INTO `t_buku` (`idBuku`, `Judul`, `Penerbit`, `Tahun_terbit`, `Jumlah`) VALUES
('BK001', 'Pemrograman Web', 'Erlangga', 2015, 19),
('BK002', 'Analisa Algoritma', 'Gramedia', 2016, 19),
('BK003', 'Pemrograman Linear', 'Erlangga', 2016, 19),
('BK004', 'Testing dan Implementasi Peran', 'Gramedia', 2014, 19),
('BK005', 'Sistem Informasi Geografis ', 'Erlangga', 2017, 8),
('BK006', 'Data Mining', 'Grameida', 2015, 26),
('BK007', 'Teknologi Multimedia', 'Erlangga', 2005, 22),
('BK008', 'Mengenal Angka', '123 Production', 2016, 19),
('BK009', 'Statistika dan Probabilitas', 'Erlangga', 2005, 50),
('BK010', 'sadjiq', 'wdjwq', 2002, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komentar_anggota`
--

CREATE TABLE `t_komentar_anggota` (
  `Nama` varchar(30) NOT NULL,
  `No_HandPhone` varchar(30) NOT NULL,
  `Pesan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_komentar_anggota`
--

INSERT INTO `t_komentar_anggota` (`Nama`, `No_HandPhone`, `Pesan`) VALUES
('DONNY', '0818118181818', 'tolong tambahin buku matematika dong'),
('Bhintang', '138', 'Ngewa Ke?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_login`
--

CREATE TABLE `t_login` (
  `idAdmin` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_login`
--

INSERT INTO `t_login` (`idAdmin`, `username`, `password`, `status`) VALUES
('ADM001', 'raghibss', '12345', 'admin'),
('ANG001', 'donny', '1610530123', 'user'),
('ANG002', 'lilik', '123456789', 'user'),
('ANG003', 'raghib', 'kelapa323', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `NoPinjam` varchar(10) NOT NULL,
  `User_Peminjam` varchar(10) NOT NULL,
  `Idbuku_Pinjam` varchar(10) NOT NULL,
  `Jumlah_Pinjam` int(1) NOT NULL,
  `Tgl_Pinjam` date NOT NULL,
  `Tgl_Kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `t_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `t_peminjaman` FOR EACH ROW BEGIN
 UPDATE t_buku
 SET Jumlah = Jumlah - NEW.Jumlah_Pinjam
 WHERE
idBuku = NEW.Idbuku_Pinjam;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengembalian`
--

CREATE TABLE `t_pengembalian` (
  `id_Pengembalian` varchar(10) NOT NULL,
  `Peminjam` varchar(10) NOT NULL,
  `id_Bukupinjam` varchar(10) NOT NULL,
  `Jumlah_K` int(11) NOT NULL,
  `Tgl_kembaliawal` date NOT NULL,
  `Tgl_kembalibuku` date NOT NULL,
  `Denda` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengembalian`
--

INSERT INTO `t_pengembalian` (`id_Pengembalian`, `Peminjam`, `id_Bukupinjam`, `Jumlah_K`, `Tgl_kembaliawal`, `Tgl_kembalibuku`, `Denda`) VALUES
('KEM001', 'donny', 'BK006', 1, '2019-01-25', '2019-01-19', 5000),
('KEM002', 'raghib', 'BK006', 1, '2019-01-29', '2019-01-19', 5000);

--
-- Trigger `t_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `kembali` AFTER INSERT ON `t_pengembalian` FOR EACH ROW BEGIN
 UPDATE t_buku
 SET Jumlah = Jumlah + NEW.Jumlah_K
 WHERE
idBuku = NEW.id_Bukupinjam;
 END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin2`
--
ALTER TABLE `t_admin2`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`idBuku`);

--
-- Indexes for table `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`NoPinjam`),
  ADD KEY `User_Peminjam` (`User_Peminjam`),
  ADD KEY `User_Peminjam_2` (`User_Peminjam`),
  ADD KEY `Idbuku_Pinjam` (`Idbuku_Pinjam`);

--
-- Indexes for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  ADD PRIMARY KEY (`id_Pengembalian`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`User_Peminjam`) REFERENCES `t_anggota` (`Username`),
  ADD CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`Idbuku_Pinjam`) REFERENCES `t_buku` (`idBuku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
