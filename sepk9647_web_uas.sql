-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Des 2022 pada 21.07
-- Versi server: 10.5.18-MariaDB-cll-lve
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepk9647_web_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `foto_barang` varchar(255) DEFAULT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `id_size` bigint(20) UNSIGNED DEFAULT NULL,
  `id_warna` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kategori_barang` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('ready','soldout') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `rating`, `foto_barang`, `harga_satuan`, `jumlah_barang`, `deskripsi_barang`, `id_size`, `id_warna`, `id_kategori_barang`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CONVERSE FFSSBCONA', NULL, 'barang/mHxWbkmXVbu7wHwJAm2dwuU2d7DNHpcOUsK4pSiZ.jpg', 500000, 18, 'CONVERSE-FFSSBCONA-CONA01324C-Blue', 2, 2, 5, 'ready', '2022-12-20 06:07:28', '2022-12-20 23:53:22'),
(3, 'CON166800C', NULL, 'barang/SJehVrdZR7SEpfRXNHw7bZoJGq9jRMk7tdR64n8A.jpg', 250000, 96, 'CON166800C', 5, 4, 7, 'ready', '2022-12-20 06:08:55', '2022-12-20 06:08:55'),
(4, 'VN000D5IB8C-HERO', NULL, 'barang/rpOipLE8mCKQbzU2mDvqr0XgjoAkaGbNjo5EUH33.webp', 150000, 12, 'VN000D5IB8C-HERO', 4, 4, 4, 'ready', '2022-12-20 06:10:27', '2022-12-20 06:10:27'),
(5, 'CONA02424C-1', NULL, 'barang/TaqBlhVYSHaXUjpF6Y53TjhOK5Q1Jv8mQLbmzFfd.webp', 250000, 15, 'CONA02424C-1', 3, 2, 6, 'ready', '2022-12-20 06:12:07', '2022-12-20 06:12:07'),
(8, 'Sepatu Super', NULL, 'barang/0gkRDpA9b9Lc44hE9NnlGdJqq8h5H22UfuxJiMPz.jpg', 1000000000, 1, 'Sepatu super limited edition, bisa terbang kalo pake sepatu ini.', 5, 5, 5, 'ready', '2022-12-20 23:56:10', '2022-12-20 23:56:23'),
(9, 'Aerostreet', NULL, 'barang/TJwlvuQ1ydXEikNjwOkABOjEeIgIGJ86xXzs8UXp.jpg', 178000, 30, 'Aerostret SVFAN-563', 5, 1, 5, 'ready', '2022-12-21 00:34:33', '2022-12-21 00:34:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int(11) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_pengguna`, `tgl_transaksi`, `total_transaksi`, `id_user`, `id_keranjang`, `id_barang`, `id_transaksi`, `created_at`, `updated_at`) VALUES
(1, 'MaD0MAXy', '2022-12-20', 1, 1, 1, 3, 1, NULL, NULL),
(2, 'fbTQwea1', '2022-12-21', 1, 6, 2, 2, 2, NULL, NULL),
(3, 'mxaVRz5m', '2022-12-21', 1, 7, 4, 3, 3, NULL, NULL),
(4, 'PAnrjn5w', '2022-12-21', 1, 10, 6, 2, 4, NULL, NULL),
(5, 'PAnrjn5w', '2022-12-21', 1, 10, 11, 3, 5, NULL, NULL);

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
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori_barang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `nama_kategori_barang`, `created_at`, `updated_at`) VALUES
(4, 'Oxford', '2022-12-20 06:01:42', '2022-12-20 06:01:42'),
(5, 'Sneakers', '2022-12-20 06:01:56', '2022-12-20 06:01:56'),
(6, 'Boat Shoes', '2022-12-20 06:02:14', '2022-12-20 06:02:14'),
(7, 'Derby', '2022-12-20 06:02:27', '2022-12-20 06:02:27'),
(9, 'Sepatu Super', '2022-12-20 23:57:33', '2022-12-20 23:57:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_barang`
--

CREATE TABLE `keranjang_barang` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` enum('belum','acc') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjang_barang`
--

INSERT INTO `keranjang_barang` (`id_keranjang`, `id_barang`, `id_user`, `id_pengguna`, `jumlah_barang`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'MaD0MAXy', 2, 500000, 'acc', NULL, NULL),
(2, 2, 6, 'fbTQwea1', 1, 500000, 'acc', NULL, NULL),
(3, 3, 6, 'fbTQwea1', 1, 250000, 'belum', NULL, NULL),
(4, 3, 7, 'mxaVRz5m', 1, 250000, 'acc', NULL, NULL),
(6, 2, 10, 'PAnrjn5w', 1, 500000, 'acc', NULL, NULL),
(10, 2, 7, 'mxaVRz5m', 1, 500000, 'belum', NULL, NULL),
(11, 3, 10, 'PAnrjn5w', 1, 250000, 'acc', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_23_174241_create_size_table', 1),
(6, '2022_11_23_174402_create_warna_table', 1),
(7, '2022_11_23_174519_create_barang_table', 1),
(8, '2022_11_23_175824_create_transaksi_table', 1),
(9, '2022_11_23_182646_create_kategori_barang_table', 1),
(10, '2022_11_23_184935_create_detail_transaksi_table', 1);

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
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id_size` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id_size`, `size`, `created_at`, `updated_at`) VALUES
(2, 34, '2022-12-19 23:15:03', '2022-12-19 23:15:03'),
(3, 27, '2022-12-20 06:04:28', '2022-12-20 06:04:28'),
(4, 32, '2022-12-20 06:04:57', '2022-12-20 06:04:57'),
(5, 35, '2022-12-20 06:05:48', '2022-12-20 06:05:48'),
(8, 31, '2022-12-20 23:58:43', '2022-12-20 23:58:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int(11) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `status` enum('menunggu','dibayar','diproses','dikirim','diterima','selesai','dikembalikan','kadaluwarsa','dibatalkan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `tgl_transaksi`, `total_transaksi`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MaD0MAXy', '2022-12-20', 1, 1, 'menunggu', NULL, NULL),
(2, 'fbTQwea1', '2022-12-21', 1, 6, 'menunggu', NULL, NULL),
(3, 'mxaVRz5m', '2022-12-21', 1, 7, 'menunggu', NULL, NULL),
(4, 'PAnrjn5w', '2022-12-21', 1, 10, 'menunggu', NULL, NULL),
(5, 'PAnrjn5w', '2022-12-21', 1, 10, 'menunggu', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `foto_user` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin','toko') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_user`, `name`, `username`, `foto_user`, `alamat`, `telepon`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MaD0MAXy', 'bengbeng', 'bengbeng', 'user/5w2Dcl0iLcc85zXUMl1XCuXYthzMdtUMAIGZFwMN.jpg', 'jl. samping perumahan', '08124565164', 'bengbeng@gmail.com', 'user', NULL, '$2y$10$4VN6fNs4Y383B/tZU99REeKx3hwrS5Q3sLpsd64i/.yVlBazdothG', NULL, '2022-12-19 23:09:04', '2022-12-19 23:09:04'),
(2, 'OIVnfxtg', 'admin', 'admin', 'user/hDckajDyjI50iCW7mrbrVrLN54tvu1aurqrIj14M.png', 'jl. samping perumahan', '087654252453', 'admin@gmail.com', 'admin', NULL, '$2y$10$hsxJtjeNhsmz6WSJKakIE..MzkaQLzyyTWca/xvhdDSl6B7X01Muy', NULL, '2022-12-19 23:10:30', '2022-12-19 23:10:30'),
(3, 'JuXh0RrZ', 'jametkhuldi', 'jametkhuldi', 'user/zS8Xb3tqbOi27cwT6ZPIiewFZXpwNZ7qWg0P49Xm.png', 'Jl. Melati', '08676526537', 'jametkhuldi@gmail.com', 'user', NULL, '$2y$10$f6p4iZk6TjySGoZBKT2fC.k9QFElf8r.Wh182jl5Q/6h8RWpcR73W', NULL, '2022-12-20 09:10:42', '2022-12-20 09:10:42'),
(4, 'JMBz83jT', 'makansiang', 'makansiang', 'user/XW76xjQlchZYYJti5OauEbPKst68gwTauot6LAsd.png', 'jl. koding bola bali error', '098752675233', 'makansiang@gmail.com', 'user', NULL, '$2y$10$GKciPe9VND3JlYi6tI8ip./NHBtgkj20eabEnWzujWiIgkd/3Ok7K', NULL, '2022-12-20 09:19:26', '2022-12-20 09:19:26'),
(5, 'VtMhjsQn', 'Up to You', 'terserah', 'user/Cm75znyjlPSWa3xsrMLZ4aqUAp7jS5VQevpwAzCx.jpg', 'jl. samping perumahan', '08124565164', 'terserah@gmail.com', 'user', NULL, '$2y$10$yxtDwQeE2TFrirKcvyvkgutJBKjZSWLNNWZ7D.tpUXGtrK0b8EFVS', NULL, '2022-12-20 10:01:02', '2022-12-20 10:01:02'),
(6, 'fbTQwea1', 'Rifqy', 'Rifqy', 'user/QNWujA3llNo08KOvgEkWhysbnmYcvwpWzsPYcQtr.jpg', 'asdfg', '081155588', 'andiraja@gmail.com', 'user', NULL, '$2y$10$BIql/B/gw.YDr53d7LRdfexStOeDoYEJ30DhTHqzO/RB16dmql/w2', NULL, '2022-12-20 22:42:11', '2022-12-20 22:42:11'),
(7, 'mxaVRz5m', 'Rifqy', 'Rifqy', 'user/kKLuMOB4QqsS2SIkKJCfhrXlq2tifwWCuH4F9VyS.jpg', 'Jl. Manggis No. 45, Kota Malang', '0811444555', 'andiraja1@gmail.com', 'user', NULL, '$2y$10$X7X6KXN/.l2/GSU9CS1sa.WCrgrCVHwiCjYi8e10c9gWX5vstlGGO', NULL, '2022-12-20 22:51:44', '2022-12-20 22:51:44'),
(9, 'dKS824lD', 'Dana Purnomo', 'durno', 'user/ynVnQGvAD8D3vhS0ylWGX21JQ0K1psuvgjkolRlB.jpg', 'Jl. Melati No. 11', '0812345678922', 'durnomo@gmail.com', 'user', NULL, '$2y$10$ZSbwC1wzY7zldNIXwnAiReOiDBll5P6IyYtG9858Z0opL65PQhlk2', NULL, '2022-12-20 23:45:56', '2022-12-20 23:45:56'),
(10, 'PAnrjn5w', 'Doni Purnomo', 'domo', 'user/EsG6909ZAg1XupwDZaG15SBqSXqnhTQZMp1XIHwy.jpg', 'Jl. Mawar Indah No. 5', '0812456778945', 'minadomo@gmail.com', 'user', NULL, '$2y$10$a53qb7911RLCtdY8SmMpOuSojo34kdDv6Adpa/s.MtiKZeF0YKJIS', NULL, '2022-12-20 23:48:04', '2022-12-20 23:48:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id_warna` bigint(20) UNSIGNED NOT NULL,
  `warna` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`, `created_at`, `updated_at`) VALUES
(1, 'Putih', '2022-12-19 23:13:34', '2022-12-19 23:13:34'),
(2, 'Biru', '2022-12-19 23:13:44', '2022-12-19 23:13:44'),
(3, 'Pink', '2022-12-19 23:13:52', '2022-12-19 23:13:52'),
(4, 'Hitam', '2022-12-20 06:04:10', '2022-12-20 06:04:10'),
(5, 'Merah', '2022-12-20 06:04:21', '2022-12-20 06:04:21'),
(7, 'Emas', '2022-12-20 23:57:57', '2022-12-20 23:57:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_id_size_foreign` (`id_size`),
  ADD KEY `barang_id_warna_foreign` (`id_warna`),
  ADD KEY `barang_id_kategori_barang_foreign` (`id_kategori_barang`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `detail_transaksi_id_barang_foreign` (`id_barang`),
  ADD KEY `detail_transaksi_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `detail_transaksi_id_keranjang_foreign` (`id_keranjang`),
  ADD KEY `detail_transaksi_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indeks untuk tabel `keranjang_barang`
--
ALTER TABLE `keranjang_barang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `keranjang_barang_id_barang_foreign` (`id_barang`),
  ADD KEY `keranjang_barang_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `keranjang_barang`
--
ALTER TABLE `keranjang_barang`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id_size` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_kategori_barang_foreign` FOREIGN KEY (`id_kategori_barang`) REFERENCES `kategori_barang` (`id_kategori_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_id_warna_foreign` FOREIGN KEY (`id_warna`) REFERENCES `warna` (`id_warna`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_id_keranjang_foreign` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang_barang` (`id_keranjang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang_barang`
--
ALTER TABLE `keranjang_barang`
  ADD CONSTRAINT `keranjang_barang_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_barang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
