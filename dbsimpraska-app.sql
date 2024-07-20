-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2024 pada 00.11
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
-- Database: `dbsimpraska-app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` enum('aktif','tidak aktif','','') NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_arsipan_data`
--

CREATE TABLE `tb_arsipan_data` (
  `id_data` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `kategori` enum('SK','Surat-surat','dll','') NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `upload_file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_kabagracana`
--

CREATE TABLE `tb_barang_kabagracana` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `kondisi` enum('Baik','Sedang','Rusak','') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_pengecekan` date NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kdr`
--

CREATE TABLE `tb_kdr` (
  `id_kdr` int(11) NOT NULL,
  `nar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` enum('KDR Putra','KDR Putri','','') NOT NULL,
  `periode` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lpj`
--

CREATE TABLE `tb_lpj` (
  `id_lpj` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `kategori` enum('LPJ_Kegiatan','LPJ_pengurus','','') NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `upload_file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembina`
--

CREATE TABLE `tb_pembina` (
  `id_pembina` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` enum('Majelis Pembimbing Gugusdepan','Pembina Gugusdepan Putera','Pembina Gugusdepan Puteri','') NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penanggungjawab`
--

CREATE TABLE `tb_penanggungjawab` (
  `id_pj` int(11) NOT NULL,
  `nar/nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Admin','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `status`) VALUES
(1, 'Iva Nur Arifah', 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `ukm` varchar(100) NOT NULL,
  `racana` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proker`
--

CREATE TABLE `tb_proker` (
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(100) NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `upload_rab` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_arsipan_data`
--
ALTER TABLE `tb_arsipan_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `tb_barang_kabagracana`
--
ALTER TABLE `tb_barang_kabagracana`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_kdr`
--
ALTER TABLE `tb_kdr`
  ADD PRIMARY KEY (`id_kdr`);

--
-- Indeks untuk tabel `tb_lpj`
--
ALTER TABLE `tb_lpj`
  ADD PRIMARY KEY (`id_lpj`);

--
-- Indeks untuk tabel `tb_pembina`
--
ALTER TABLE `tb_pembina`
  ADD PRIMARY KEY (`id_pembina`);

--
-- Indeks untuk tabel `tb_penanggungjawab`
--
ALTER TABLE `tb_penanggungjawab`
  ADD PRIMARY KEY (`id_pj`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_arsipan_data`
--
ALTER TABLE `tb_arsipan_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_kabagracana`
--
ALTER TABLE `tb_barang_kabagracana`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kdr`
--
ALTER TABLE `tb_kdr`
  MODIFY `id_kdr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_lpj`
--
ALTER TABLE `tb_lpj`
  MODIFY `id_lpj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pembina`
--
ALTER TABLE `tb_pembina`
  MODIFY `id_pembina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penanggungjawab`
--
ALTER TABLE `tb_penanggungjawab`
  MODIFY `id_pj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
