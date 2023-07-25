-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2023 pada 21.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisis`
--

INSERT INTO `divisis` (`id`, `nama_divisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', NULL, NULL, '2023-07-09 09:40:49'),
(2, 'Sipil', NULL, '2023-07-09 09:41:18', '2023-07-09 09:41:18'),
(3, 'Electrical', NULL, '2023-07-09 09:42:13', '2023-07-09 09:42:13'),
(4, 'Maintenance', NULL, '2023-07-09 09:43:09', '2023-07-09 09:43:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_perbaikan`
--

CREATE TABLE `jadwal_perbaikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_03_24_012609_create_roles_table', 1),
(5, '2023_03_24_012941_create_divisis_table', 1),
(6, '2023_03_24_012950_create_users_table', 1),
(7, '2023_03_24_013002_create_peralatans_table', 1),
(8, '2023_03_24_013024_create_perawatan_rutins_table', 1),
(9, '2023_03_24_013059_create_pengajuan_perbaikans_table', 1),
(10, '2023_05_22_150051_create_notifications_table', 1),
(11, '2023_07_05_181112_create_jadwal_perbaikan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_perbaikans`
--

CREATE TABLE `pengajuan_perbaikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_peralatan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `prioritas` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tanggal_pekerjaan` date NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_teknisi` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan_perbaikans`
--

INSERT INTO `pengajuan_perbaikans` (`id`, `judul`, `id_peralatan`, `id_user`, `keterangan`, `prioritas`, `lokasi`, `tanggal_pekerjaan`, `status`, `id_teknisi`, `created_at`, `updated_at`) VALUES
(1, 'Mesin mati', 1, 6, 'Excavator tidak bisa nyala', 'critical', 'Pt. Chandra Asri proyek pipe line', '2023-07-11', 'Menunggu Approval', NULL, '2023-07-09 11:19:12', '2023-07-09 11:52:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatans`
--

CREATE TABLE `peralatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL,
  `jenis_peralatan` varchar(255) NOT NULL,
  `merk_peralatan` varchar(255) NOT NULL,
  `produsen` varchar(255) NOT NULL,
  `id_divisi` bigint(20) UNSIGNED NOT NULL,
  `tahun_pembuatan` date NOT NULL,
  `tahun_batas` date NOT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `kondisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peralatans`
--

INSERT INTO `peralatans` (`id`, `nama_peralatan`, `jenis_peralatan`, `merk_peralatan`, `produsen`, `id_divisi`, `tahun_pembuatan`, `tahun_batas`, `umur`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 'Excavator', 'Alat Berat', 'Caterpillar', 'Caterpillar Inc.', 2, '2023-05-02', '2023-07-09', '0 tahun 2 bulan 61 hari', 'Baru', '2023-07-09 10:16:28', '2023-07-09 11:08:56'),
(2, 'Bulldozer', 'Alat Berat', 'Komatsu', 'Komatsu Ltd.', 2, '2023-07-11', '2027-12-01', '4 tahun 4 bulan 123 hari', 'Baru', '2023-07-09 10:43:12', '2023-07-09 11:08:43'),
(3, 'Loader', 'Alat Berat', 'Volvo', 'Volvo Construction Equipment', 2, '2023-07-01', '2028-12-10', '0 tahun, 0 bulan, 0 hari', 'Baru', '2023-07-09 10:44:18', '2023-07-09 10:44:18'),
(4, 'Concrete Mixer', 'Alat Berat', 'Belle', 'Altrad Belle', 2, '2023-07-01', '2023-07-14', '0 tahun 0 bulan 0 hari', 'Bekas', '2023-07-09 10:47:15', '2023-07-09 11:09:10'),
(5, 'Vibratory Plate Compactor', 'Alat Berat', 'Wacker Neuson', 'Wacker Neuson SE', 2, '2023-07-14', '2028-06-28', '0 tahun 0 bulan 0 hari', 'Baru', '2023-07-09 10:49:29', '2023-07-09 10:49:29'),
(6, 'Power Trowel', 'Alat Berat', 'Multiquip', 'Multiquip Inc.', 2, '2023-07-13', '2028-02-08', '0 tahun 0 bulan 0 hari', 'Bekas', '2023-07-09 10:51:28', '2023-07-09 10:51:28'),
(7, 'Concrete Saw', 'Alat Berat', 'Husqvarna', 'Husqvarna Group', 2, '2023-07-13', '2027-11-22', '4 tahun 4 bulan 123 hari', 'Baru', '2023-07-09 10:54:28', '2023-07-09 10:54:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan_rutins`
--

CREATE TABLE `perawatan_rutins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_peralatan` bigint(20) UNSIGNED NOT NULL,
  `prioritas` varchar(255) NOT NULL,
  `tanggal_pekerjaan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_teknisi` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_divisi` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telpon`, `jabatan`, `id_divisi`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Sigit', 'Sigit Sugiharto', 'sigit@gmail.com', NULL, '$2y$10$bj74lQFr/4E3e.QxfWiq8e9JojF93V9zToUyPrj5T3yQZ.TKrlPTm', '1979-02-24', 'pria', 'Taman Cilegon C.1 No6', '081214805167', 'Manager Proyek Chandra', 3, 'User', NULL, '2023-07-09 09:49:41', '2023-07-09 09:49:41'),
(7, 'Nafesha', 'Nafesha', 'echa@gmail.com', NULL, '$2y$10$lfniZh7AkpvdYgRmrnhGpufnk5NpQVe5EPZcxLLCLJR3nRuKldMHi', '2023-07-01', 'wanita', 'Griya Serdang Indah Blok C.8 No.9', '081214805759', 'support', 1, 'ITSupport', NULL, '2023-07-09 12:09:46', '2023-07-09 12:09:46'),
(8, 'irfan', 'Irfan Fadillah', 'irfanfadillah123@gmail.com', NULL, '$2y$10$vgynmyysSkst3Hcjv/lCReBIrewJeQx8ueiHXD5sr2JF8ak6k12ma', '2000-01-12', 'pria', 'Griya Serdang Indah Blok C.8 No.9', '081214805759', 'IT Support', 1, 'ITSupport', NULL, '2023-07-09 12:12:30', '2023-07-09 12:12:30'),
(9, 'khairul', 'Khairul Anwar', 'khairul@gmail.com', NULL, '$2y$10$2PUbO8v/FnwKLMV2k1Gpmu3lS26tbx5MHWFrW9ZuOa1izIPsoAY3S', '1983-02-23', 'pria', 'Taman Krakatau', '081214805252', 'Manager Maintenance', 4, 'Manager', NULL, '2023-07-09 12:13:47', '2023-07-09 12:13:47'),
(10, 'Fariz', 'Fariz Fahrezi', 'fariz@gmail.com', NULL, '$2y$10$ZTJxhGL1IjzIC3zvJwf9J.9FCgtogU4/ekmT646HtJIYXaLxS8Pf.', '1991-04-09', 'pria', 'Griya Serdang Indah Blok C.8 No.9', '081214805759', 'Teknisi', 4, 'Teknisi', NULL, '2023-07-09 12:14:43', '2023-07-09 12:14:43'),
(11, 'Arya', 'Arya Pratama', 'arya21@gmail.com', NULL, '$2y$10$2hJ5Smd9X6FIJhpx4j.4eeZS7jSwkluUpwnJ0Rjktlcw0lX1VKlrq', '1987-07-22', 'pria', 'Taman Krakatau', '0812141205759', 'Manager Proyek Asahimas', 2, 'User', NULL, '2023-07-09 12:16:05', '2023-07-09 12:16:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_perbaikan`
--
ALTER TABLE `jadwal_perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengajuan_perbaikans`
--
ALTER TABLE `pengajuan_perbaikans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_perbaikans_id_peralatan_foreign` (`id_peralatan`),
  ADD KEY `pengajuan_perbaikans_id_user_foreign` (`id_user`),
  ADD KEY `pengajuan_perbaikans_id_teknisi_foreign` (`id_teknisi`);

--
-- Indeks untuk tabel `peralatans`
--
ALTER TABLE `peralatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peralatans_id_divisi_foreign` (`id_divisi`);

--
-- Indeks untuk tabel `perawatan_rutins`
--
ALTER TABLE `perawatan_rutins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perawatan_rutins_id_peralatan_foreign` (`id_peralatan`),
  ADD KEY `perawatan_rutins_id_teknisi_foreign` (`id_teknisi`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_divisi_foreign` (`id_divisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_perbaikan`
--
ALTER TABLE `jadwal_perbaikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_perbaikans`
--
ALTER TABLE `pengajuan_perbaikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peralatans`
--
ALTER TABLE `peralatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perawatan_rutins`
--
ALTER TABLE `perawatan_rutins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengajuan_perbaikans`
--
ALTER TABLE `pengajuan_perbaikans`
  ADD CONSTRAINT `pengajuan_perbaikans_id_peralatan_foreign` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_perbaikans_id_teknisi_foreign` FOREIGN KEY (`id_teknisi`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_perbaikans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peralatans`
--
ALTER TABLE `peralatans`
  ADD CONSTRAINT `peralatans_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `divisis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perawatan_rutins`
--
ALTER TABLE `perawatan_rutins`
  ADD CONSTRAINT `perawatan_rutins_id_peralatan_foreign` FOREIGN KEY (`id_peralatan`) REFERENCES `peralatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perawatan_rutins_id_teknisi_foreign` FOREIGN KEY (`id_teknisi`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `divisis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
