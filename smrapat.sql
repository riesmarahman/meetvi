-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 10.32
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smrapat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(2225) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `Prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nik`, `nip`, `jabatan`, `Prodi`) VALUES
(1, 'Prof. Wayan Firdaus Mahmudy, S.Si., MT., Ph.D.', '', '197209191997021001', 1, 1),
(2, 'Achmad Basuki, S.T., MMG., Ph.D.', '', '197109011997021001', 2, 2),
(3, 'Bayu Priyambadha, S.Kom., M.Kom.', '', '198209092008121000', 9, 1),
(4, 'Andi Reza Perdanakusuma, S.Kom., M.MT.', '', '197408232000121001', 9, 3),
(5, 'Bayu Rahayudi, S.T., M.M.', '', '197407122006041001', 9, 4),
(6, 'Dany Primanita Kartikasari, S.T., M.Kom', '', '197711162005012003', 9, 4),
(7, 'Adam Hendra Brata, S.Kom., M.T., M.Sc.', '', '199001052019031009', 9, 1),
(8, 'Adhitya Bhawiyuga, S.Kom., M.Sc.', '', '2014058907201001', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_rapat`
--

CREATE TABLE `hasil_rapat` (
  `id_hasil` int(11) NOT NULL,
  `rapat_undangan_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `Notula` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_rapat`
--

INSERT INTO `hasil_rapat` (`id_hasil`, `rapat_undangan_id`, `dosen_id`, `Notula`) VALUES
(1, 2, 3, 'coba'),
(2, 2, 3, 'coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Dekan FILKOM'),
(2, 'Ketua Jurusan Teknik Informatika'),
(3, 'Ketua Jurusan Sistem Informasi'),
(4, 'Ketua Program Studi Magister Ilmu Komputer'),
(5, 'Ketua Program Studi Sarjana Teknik Informatika'),
(6, 'Ketua Badan Penerbitan Jurnal (BPJ)'),
(7, 'sekertaris dekanat'),
(8, 'sekertaris jurusan'),
(9, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dosen`
--

CREATE TABLE `jadwal_dosen` (
  `id` int(11) NOT NULL,
  `dosen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dosen`
--

INSERT INTO `jadwal_dosen` (`id`, `dosen`, `tanggal`, `keterangan`) VALUES
(1, 2, '2022-07-18', 'Rapat Jurusan kerja'),
(3, 3, '2022-07-28', 'Rapat Fakultas ABC'),
(4, 6, '2022-07-19', 'Rapat Program Studi'),
(5, 6, '2022-07-20', 'Rapat Kepanitiaan'),
(6, 3, '2022-07-19', 'Rapat Fakultas1'),
(7, 3, '2022-07-20', 'Rapat jurusan'),
(8, 7, '2022-07-19', 'Rapat Jurusan'),
(9, 7, '2022-07-20', 'Rapat Fakultas'),
(10, 7, '2022-07-21', 'Rapat bersama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_rapat`
--

CREATE TABLE `jadwal_rapat` (
  `id` int(11) NOT NULL,
  `id_undangan_rapat` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_rapat` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_rapat`
--

INSERT INTO `jadwal_rapat` (`id`, `id_undangan_rapat`, `id_dosen`, `id_rapat`, `id_ruang`) VALUES
(1, 2, 3, 0, 0),
(2, 3, 6, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Jurusan Teknik Informatika (JTIF)'),
(2, 'Jurusan Sistem Informasi (JSI)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kjfd`
--

CREATE TABLE `kjfd` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kjfd`
--

INSERT INTO `kjfd` (`id`, `nama`, `jurusan`) VALUES
(1, 'KJFD Ilmu Kependidikan dan Teknologi Pembelajaran', 0),
(2, 'KJFD Komputasi Berbasis Jaringan', 0),
(3, 'KJFD Komputasi Cerdas', 0),
(4, 'KJFD Manajemen Data dan Sistem Informasi', 0),
(5, 'KJFD Multimedia, Game dan Piranti Bergerak', 0),
(6, 'KJFD Pengembangan Sistem Informasi', 0),
(7, 'KJFD Rekayasa Perangkat Cerdas', 0),
(8, 'KJFD Rekayasa Perangkat Lunak', 0),
(9, 'KJFD Rekayasa Sistem Komputer', 0),
(10, 'KJFD Sistem Informasi Geografis', 0),
(11, 'KJFD Tata Kelola dan Manajemen Sistem Informasi', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peran`
--

CREATE TABLE `peran` (
  `id` int(11) NOT NULL,
  `peran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peran`
--

INSERT INTO `peran` (`id`, `peran`) VALUES
(1, 'pimpinan rapat'),
(2, 'sekertaris'),
(3, 'peserta rapat'),
(4, 'notulis'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program-studi`
--

CREATE TABLE `program-studi` (
  `id_program_studi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program-studi`
--

INSERT INTO `program-studi` (`id_program_studi`, `nama_prodi`, `jurusan_id`) VALUES
(1, 'S1 Teknik Informatika', 1),
(2, 'S1 Teknik Komputer', 1),
(3, 'S1 Sistem Informasi', 2),
(4, 'S1 Teknologi Informasi', 2),
(5, 'S1 Pendidikan Teknologi Informasi', 2),
(6, 'S2 Magister Ilmu Komputer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat`
--

CREATE TABLE `rapat` (
  `id` int(11) NOT NULL,
  `topik` varchar(225) NOT NULL,
  `pimpinan` int(11) NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `id_jur` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapat`
--

INSERT INTO `rapat` (`id`, `topik`, `pimpinan`, `tgl_pelaksanaan`, `waktu`, `id_jur`, `id_prodi`, `status`) VALUES
(31, 'Bahasan 1', 1, '2022-07-15', '09:49 PM', 1, 2, 0),
(32, 'Bahasan penting', 1, '2022-07-21', '05:03 PM', 2, 4, 0),
(33, 'Menambahkan', 1, '2022-07-20', '05:24 PM', 1, 6, 0),
(34, 'Pembahasan 1', 8, '2022-07-21', '01:57 PM', 1, 2, 0),
(35, 'Bahasan coba', 8, '2022-07-21', '02:09 PM', 2, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kapasitas` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `nama`, `kapasitas`, `status`) VALUES
(1, 'Ruang 1.1', '30', 1),
(3, 'ruang 2.2', '30', 1),
(5, 'ruang 2.2', '300', 0),
(6, 'ruang 9.1', '15', 0),
(7, 'Ruang 7.1', '40', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf`
--

CREATE TABLE `staf` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staf`
--

INSERT INTO `staf` (`id`, `nama`, `email`, `jabatan`) VALUES
(1, 'Dewi Wijayanti, S.T', 'Dewiw@gmail.com', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_rapat`
--

CREATE TABLE `undangan_rapat` (
  `id_undangan` int(11) NOT NULL,
  `id_rapat` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `undangan_rapat`
--

INSERT INTO `undangan_rapat` (`id_undangan`, `id_rapat`, `id_ruang`) VALUES
(1, 31, 3),
(2, 31, 3),
(3, 31, 1),
(4, 34, 1),
(5, 31, 1),
(6, 31, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user-login`
--

CREATE TABLE `user-login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `peran` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_staf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user-login`
--

INSERT INTO `user-login` (`id`, `username`, `password`, `peran`, `id_dosen`, `id_staf`) VALUES
(1, 'pimpinan', 'pimpinan1', 1, 1, NULL),
(4, 'wayan1972', 'wayan123', 1, 1, NULL),
(5, '198209092008121000', 'bp123', 3, 3, NULL),
(6, 'Dewiw@gmail.com', 'dewi123', 2, NULL, 1),
(7, '197711162005012003', 'dany123', 3, 6, NULL),
(8, '199001052019031009', 'adam1', 3, 7, NULL),
(9, '2014058907201001', 'adit1', 1, 8, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jabatan` (`jabatan`),
  ADD KEY `fk_prodi` (`Prodi`);

--
-- Indeks untuk tabel `hasil_rapat`
--
ALTER TABLE `hasil_rapat`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dosen` (`dosen`);

--
-- Indeks untuk tabel `jadwal_rapat`
--
ALTER TABLE `jadwal_rapat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kjfd`
--
ALTER TABLE `kjfd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program-studi`
--
ALTER TABLE `program-studi`
  ADD PRIMARY KEY (`id_program_studi`);

--
-- Indeks untuk tabel `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jabatan_staf` (`jabatan`);

--
-- Indeks untuk tabel `undangan_rapat`
--
ALTER TABLE `undangan_rapat`
  ADD PRIMARY KEY (`id_undangan`);

--
-- Indeks untuk tabel `user-login`
--
ALTER TABLE `user-login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peran_user` (`peran`),
  ADD KEY `fk_id_dosen` (`id_dosen`),
  ADD KEY `fk_id_staf` (`id_staf`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `hasil_rapat`
--
ALTER TABLE `hasil_rapat`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jadwal_rapat`
--
ALTER TABLE `jadwal_rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kjfd`
--
ALTER TABLE `kjfd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peran`
--
ALTER TABLE `peran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `program-studi`
--
ALTER TABLE `program-studi`
  MODIFY `id_program_studi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `staf`
--
ALTER TABLE `staf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `undangan_rapat`
--
ALTER TABLE `undangan_rapat`
  MODIFY `id_undangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user-login`
--
ALTER TABLE `user-login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_prodi` FOREIGN KEY (`Prodi`) REFERENCES `program-studi` (`id_program_studi`);

--
-- Ketidakleluasaan untuk tabel `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD CONSTRAINT `fk_dosen` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`id`);

--
-- Ketidakleluasaan untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD CONSTRAINT `fk_jabatan_staf` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `user-login`
--
ALTER TABLE `user-login`
  ADD CONSTRAINT `fk_id_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `fk_id_staf` FOREIGN KEY (`id_staf`) REFERENCES `staf` (`id`),
  ADD CONSTRAINT `fk_peran_user` FOREIGN KEY (`peran`) REFERENCES `peran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
