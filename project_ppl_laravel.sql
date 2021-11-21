-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2021 pada 21.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ppl_laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(3) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `id_kecamatan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `desa`, `id_kecamatan`) VALUES
(8, 'Kandangan', 1),
(9, 'Pesanggaran', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_panen`
--

CREATE TABLE `hasil_panen` (
  `id_panen` int(10) NOT NULL,
  `id_lahan` int(10) NOT NULL,
  `panen_ke` int(4) NOT NULL,
  `tanggal_panen` date NOT NULL,
  `hasil_panen` int(5) NOT NULL,
  `biaya_panen` int(11) NOT NULL,
  `umur_petik` varchar(10) NOT NULL,
  `panjang_buah` varchar(10) NOT NULL,
  `diameter_buah` varchar(10) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `rendemen` varchar(8) NOT NULL,
  `kualitas_mutu` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_panen`
--

INSERT INTO `hasil_panen` (`id_panen`, `id_lahan`, `panen_ke`, `tanggal_panen`, `hasil_panen`, `biaya_panen`, `umur_petik`, `panjang_buah`, `diameter_buah`, `warna`, `rendemen`, `kualitas_mutu`, `created_at`, `updated_at`) VALUES
(8, 4, 1, '2021-12-02', 10, 10000000, '6-8', 'min 18', '>1', 'Kuning kecoklatan', '14-19', 'Grade I', '2021-11-21 13:18:16', '2021-11-21 13:18:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_pembayaran`
--

CREATE TABLE `hasil_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_panen` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `berat` int(5) NOT NULL,
  `harga_terjual` int(5) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `bagi_hasil_petani` bigint(10) NOT NULL,
  `bagi_hasil_mitra` bigint(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_pembayaran`
--

INSERT INTO `hasil_pembayaran` (`id_pembayaran`, `id_panen`, `tanggal_transaksi`, `pembeli`, `berat`, `harga_terjual`, `bukti_pembayaran`, `bagi_hasil_petani`, `bagi_hasil_mitra`, `created_at`, `updated_at`) VALUES
(6, 8, '2021-12-11', 'riris', 6, 5000000, 'assets/user/3/IMG_20190910_093816.jpg', 2000000, 3000000, '2021-11-21 13:20:15', '2021-11-21 13:20:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(2) NOT NULL,
  `kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Pesanggaran'),
(2, 'Siliragung'),
(3, 'Bangorejo'),
(4, 'Purwoharjo'),
(5, 'Tegaldlimo'),
(6, 'Muncar'),
(7, 'Cluring'),
(8, 'Gambiran'),
(9, 'Tegalsari'),
(10, 'Glenmore'),
(11, 'Kalibaru'),
(12, 'Genteng'),
(13, 'Srono'),
(14, 'Rogojampi'),
(15, 'Kabat'),
(16, 'Singojuruh'),
(17, 'Sempu'),
(18, 'Songgon'),
(19, 'Glagah'),
(20, 'Licin'),
(21, 'Banyuwangi'),
(22, 'Giri'),
(23, 'Kalipuro'),
(24, 'Wongsorejo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lahan`
--

CREATE TABLE `lahan` (
  `id_lahan` int(10) NOT NULL,
  `luas_lahan` int(5) NOT NULL,
  `lokasi_lahan` varchar(255) NOT NULL,
  `id_desa` int(3) NOT NULL,
  `id_petani` bigint(7) UNSIGNED NOT NULL,
  `foto_bukti_lahan` varchar(255) NOT NULL,
  `tanggal_tanam` date NOT NULL,
  `jumlah_bibit` int(10) NOT NULL,
  `dokumen_mou` varchar(255) NOT NULL,
  `id_verify_status` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lahan`
--

INSERT INTO `lahan` (`id_lahan`, `luas_lahan`, `lokasi_lahan`, `id_desa`, `id_petani`, `foto_bukti_lahan`, `tanggal_tanam`, `jumlah_bibit`, `dokumen_mou`, `id_verify_status`, `created_at`, `updated_at`) VALUES
(1, 100, 'asdadasd,9,asdad', 9, 1, 'assets/user/1/34696.jpg', '2000-10-10', 50, 'assets/user/1/Altaf.pdf', 2, '2021-10-19 05:57:10', '2021-10-24 10:15:51'),
(2, 100, 'maksmdads', 8, 2, 'assets/user/2/IMG_20190910_093823.jpg', '2021-10-24', 1, 'assets/user/2/Program 1.pdf', 2, '2021-10-24 09:53:32', '2021-10-25 09:04:59'),
(4, 150, 'Perum Villa Genteng', 8, 3, 'assets/user/3/5e22a0522d26e.jpg', '2021-11-29', 417, 'assets/user/3/Wow.pdf', 2, '2021-11-21 13:09:49', '2021-11-21 13:11:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_05_18_110503_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `email`, `password`, `nama`, `profile_photo`, `created_at`, `updated_at`) VALUES
(2, 'dika@ganteng.com', '$2y$10$L3JklHNESQsQXbOYi.4VTORKhwfpAtj76f.TekVch7ziEWPWORXBG', 'Dimas', 'images/kosong.png', '2021-10-18 20:41:03', '2021-10-28 10:38:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_verifikasi`
--

CREATE TABLE `status_verifikasi` (
  `id_verify_status` int(10) NOT NULL,
  `verify_status` enum('Belum diverifikasi','Ditolak','Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_verifikasi`
--

INSERT INTO `status_verifikasi` (`id_verify_status`, `verify_status`) VALUES
(0, 'Belum diverifikasi'),
(1, 'Ditolak'),
(2, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_verifikasi_akun`
--

CREATE TABLE `status_verifikasi_akun` (
  `id_account_verify` int(10) NOT NULL,
  `account_verify_status` enum('Disetujui','Ditolak','Belum diverifikasi','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_verifikasi_akun`
--

INSERT INTO `status_verifikasi_akun` (`id_account_verify`, `account_verify_status`) VALUES
(0, 'Belum diverifikasi'),
(1, 'Ditolak'),
(2, 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_mou`
--

CREATE TABLE `template_mou` (
  `id_mou` int(2) NOT NULL,
  `file_mou` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `template_mou`
--

INSERT INTO `template_mou` (`id_mou`, `file_mou`, `created_at`, `updated_at`) VALUES
(1, 'assets/mou/paperontableau_IJMRET.pdf', '2021-10-26 00:12:00', '2021-10-26 00:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(7) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_account_verify` int(11) NOT NULL,
  `account_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `nik`, `alamat`, `phone_number`, `profile_photo`, `id_account_verify`, `account_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahardika', 'mahardika.oktavian@gmail.com', '35102231239', 'Banyuwangi indah no.1,Sobo,Banyuwangi', '081911633004', 'images/kosong.png', 2, NULL, '$2y$10$GsKQjx26gcCfBN2uHsWB/.xiWYsWmYNdZ9b62iu1d8Yx/wkAjZouK', NULL, '2021-10-18 07:03:16', '2021-10-19 08:38:03'),
(2, 'masmdakdsm', 'bagus@gmail.com', 'asmkdasm', 'amskdamkd,asdmkasdmk,maskdmakd', '08191821298', 'images/kosong.png', 2, NULL, '$2y$10$f43tHkMXG9.tUE5PkguYguGntVArSNvgQRJojQ1jcO5xu2ykz.SUy', NULL, '2021-10-19 02:30:27', '2021-10-22 11:31:38'),
(3, 'Dimas', 'dimas@gmail.com', '35241231212', 'Perumahan Dimas,Pesanggaran,Pesanggaran', '08192328192', 'images/kosong.png', 2, NULL, '$2y$10$0Jv4TjOBRmGi.AH5ZVf14Od49NcV8PjfHDaa2YvJi28.hnpFvIBCm', NULL, '2021-10-25 08:37:19', '2021-10-25 09:09:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan_2` (`id_kecamatan`) USING BTREE;

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD PRIMARY KEY (`id_panen`),
  ADD KEY `id_lahan` (`id_lahan`);

--
-- Indeks untuk tabel `hasil_pembayaran`
--
ALTER TABLE `hasil_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_panen` (`id_panen`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id_lahan`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_petani` (`id_petani`),
  ADD KEY `id_verify_status` (`id_verify_status`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_verifikasi`
--
ALTER TABLE `status_verifikasi`
  ADD PRIMARY KEY (`id_verify_status`);

--
-- Indeks untuk tabel `status_verifikasi_akun`
--
ALTER TABLE `status_verifikasi_akun`
  ADD PRIMARY KEY (`id_account_verify`);

--
-- Indeks untuk tabel `template_mou`
--
ALTER TABLE `template_mou`
  ADD PRIMARY KEY (`id_mou`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `id_account_verify` (`id_account_verify`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_panen`
--
ALTER TABLE `hasil_panen`
  MODIFY `id_panen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `hasil_pembayaran`
--
ALTER TABLE `hasil_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id_lahan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `template_mou`
--
ALTER TABLE `template_mou`
  MODIFY `id_mou` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desadikecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD CONSTRAINT `pembagian_uang_lahan` FOREIGN KEY (`id_lahan`) REFERENCES `lahan` (`id_lahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_pembayaran`
--
ALTER TABLE `hasil_pembayaran`
  ADD CONSTRAINT `panen` FOREIGN KEY (`id_panen`) REFERENCES `hasil_panen` (`id_panen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lahan`
--
ALTER TABLE `lahan`
  ADD CONSTRAINT `lahandesa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milikpetani` FOREIGN KEY (`id_petani`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veriflahan` FOREIGN KEY (`id_verify_status`) REFERENCES `status_verifikasi` (`id_verify_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `idverifikasi` FOREIGN KEY (`id_account_verify`) REFERENCES `status_verifikasi_akun` (`id_account_verify`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
