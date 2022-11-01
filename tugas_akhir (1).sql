-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2020 pada 17.19
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
  
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `no_tlp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_user`, `nama_dosen`, `no_tlp`) VALUES
(1, 85, 'Dosen Thomas', '082286520090'),
(2, 86, 'Noviardi', '0823647837'),
(3, 87, 'Lilik Suhery', '082345678909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id_jadwal` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `jadwal_sidang_alat` datetime NOT NULL,
  `jadwal_sidang_kompre` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `judul_ta` varchar(255) NOT NULL,
  `bimbingan1` varchar(255) NOT NULL,
  `bimbingan2` varchar(255) NOT NULL,
  `status_mahasiswa` int(11) NOT NULL DEFAULT 0,
  `status_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_user`, `nama_mahasiswa`, `no_tlp`, `judul_ta`, `bimbingan1`, `bimbingan2`, `status_mahasiswa`, `status_update`) VALUES
(1, 83, 'Thomas Barone', '082286520090', 'Test Judul Thomas', '5c4e5157-3344-42e7-8efe-76a28cae707e2.png', 'bcaVa3.png', 2, '2020-08-17 14:32:30'),
(2, 89, 'Randi', '082283222067', 'mengulik one piece', '5c4e5157-3344-42e7-8efe-76a28cae707e2.png', 'bcaVa3.png', 2, '2022-08-17 14:32:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sidang_alat`
--

CREATE TABLE `nilai_sidang_alat` (
  `id_nilai_sidang_alat` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `penampilan_sa` int(11) NOT NULL,
  `presentasi_sa` int(11) NOT NULL,
  `hasil_program_sa` int(11) NOT NULL,
  `penguasaan_sa` int(11) NOT NULL,
  `penulisan_sa` int(11) NOT NULL,
  `total_nilai_sa` int(11) NOT NULL,
  `komentar_sa` text NOT NULL,
  `penguji` varchar(100) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_sidang_alat`
--

INSERT INTO `nilai_sidang_alat` (`id_nilai_sidang_alat`, `id_mahasiswa`, `id_dosen`, `penampilan_sa`, `presentasi_sa`, `hasil_program_sa`, `penguasaan_sa`, `penulisan_sa`, `total_nilai_sa`, `komentar_sa`, `penguji`, `update_at`) VALUES
(1, 1, 1, 9, 9, 49, 49, 9, 96, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'ketua', '2020-08-16 23:09:17'),
(2, 1, 2, 10, 9, 45, 45, 9, 91, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'sekretaris', '2020-08-16 23:16:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sidang_kompre`
--

CREATE TABLE `nilai_sidang_kompre` (
  `id_nilai_sidang_kompre` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `penampilan_kompre` int(11) NOT NULL,
  `presentasi_kompre` int(11) NOT NULL,
  `penguasaan_kompre` int(11) NOT NULL,
  `penulisan_kompre` int(11) NOT NULL,
  `wawasan_kompre` int(11) NOT NULL,
  `total_nilai_kompre` int(11) NOT NULL,
  `penguji` varchar(100) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_sidang_kompre`
--

INSERT INTO `nilai_sidang_kompre` (`id_nilai_sidang_kompre`, `id_mahasiswa`, `id_dosen`, `penampilan_kompre`, `presentasi_kompre`, `penguasaan_kompre`, `penulisan_kompre`, `wawasan_kompre`, `total_nilai_kompre`, `penguji`, `update_at`) VALUES
(1, 1, 2, 9, 10, 40, 14, 40, 98, 'ketua', '2020-08-17 21:32:30'),
(2, 1, 3, 9, 9, 35, 13, 35, 86, 'sekretaris', '2020-08-17 21:36:34'),
(3, 1, 1, 10, 10, 40, 14, 40, 97, 'anggota', '2020-08-17 21:37:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang_alat`
--

CREATE TABLE `sidang_alat` (
  `id_sidang_alat` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `ketua_sa` int(11) NOT NULL,
  `sekre_sa` int(11) NOT NULL,
  `anggota_sa` int(11) NOT NULL,
  `jadwal_sidang_alat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sidang_alat`
--

INSERT INTO `sidang_alat` (`id_sidang_alat`, `id_mahasiswa`, `ketua_sa`, `sekre_sa`, `anggota_sa`, `jadwal_sidang_alat`) VALUES
(1, 1, 1, 2, 3, '2020-08-16 20:47:00'),
(2, 2, 3, 1, 2, '2022-08-11 11:35:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang_kompre`
--

CREATE TABLE `sidang_kompre` (
  `id_sidang_kompre` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `ketua_kompre` int(11) NOT NULL,
  `sekre_kompre` int(11) NOT NULL,
  `anggota_kompre` int(11) NOT NULL,
  `jadwal_sidang_kompre` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sidang_kompre`
--

INSERT INTO `sidang_kompre` (`id_sidang_kompre`, `id_mahasiswa`, `ketua_kompre`, `sekre_kompre`, `anggota_kompre`, `jadwal_sidang_kompre`) VALUES
(1, 1, 2, 3, 1, '2020-08-17 22:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_induk` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses_level` varchar(100) NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `no_induk`, `password`, `akses_level`) VALUES
(1, 'prodiTkSttpyk@gmail.com', '161012018', '7c222fb2927d828af22f592134e8932480637c0d', 'prodi'),
(83, 'atompubg13@gmail.com', '161012020', '7c222fb2927d828af22f592134e8932480637c0d', 'mahasiswa'),
(85, 'atomcrvrsquad@gmail.com', '161012016', '7c222fb2927d828af22f592134e8932480637c0d', 'Dosen'),
(86, 'noviardi@gmail.com', '161012001', '7c222fb2927d828af22f592134e8932480637c0d', 'Dosen'),
(87, 'lilik@gmail.com', '161012002', '7c222fb2927d828af22f592134e8932480637c0d', 'Dosen'),
(88, 'riskirian@gmail.com', '161014512', '7c222fb2927d828af22f592134e8932480637c0d', 'prodi'),
(89, 'randi@gmail.com', '16700987', '7c222fb2927d828af22f592134e8932480637c0d', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indeks untuk tabel `nilai_sidang_alat`
--
ALTER TABLE `nilai_sidang_alat`
  ADD PRIMARY KEY (`id_nilai_sidang_alat`);

--
-- Indeks untuk tabel `nilai_sidang_kompre`
--
ALTER TABLE `nilai_sidang_kompre`
  ADD PRIMARY KEY (`id_nilai_sidang_kompre`);

--
-- Indeks untuk tabel `sidang_alat`
--
ALTER TABLE `sidang_alat`
  ADD PRIMARY KEY (`id_sidang_alat`);

--
-- Indeks untuk tabel `sidang_kompre`
--
ALTER TABLE `sidang_kompre`
  ADD PRIMARY KEY (`id_sidang_kompre`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai_sidang_alat`
--
ALTER TABLE `nilai_sidang_alat`
  MODIFY `id_nilai_sidang_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai_sidang_kompre`
--
ALTER TABLE `nilai_sidang_kompre`
  MODIFY `id_nilai_sidang_kompre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sidang_alat`
--
ALTER TABLE `sidang_alat`
  MODIFY `id_sidang_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sidang_kompre`
--
ALTER TABLE `sidang_kompre`
  MODIFY `id_sidang_kompre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
