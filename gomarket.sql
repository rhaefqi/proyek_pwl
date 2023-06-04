-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 05:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gomarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_23_040210_create_products_table', 1),
(4, '2023_05_23_233221_create_keranjangs_table', 1),
(5, '2023_05_24_110932_create_pembelians_table', 1),
(6, '2023_05_24_111944_create_pembelian_produks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id_pembelian` varchar(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` varchar(100) NOT NULL,
  `e_money` varchar(20) NOT NULL,
  `e_money_number` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id_pembelian`, `user_id`, `nama_pembeli`, `tanggal_pembelian`, `total_pembelian`, `e_money`, `e_money_number`, `status_pembayaran`, `status_pembelian`, `created_at`, `updated_at`) VALUES
('ff68d', 4, 'Ibra Rizqy Siregar', '2023-05-26', '285000', 'OVO', '088262450134', 'PAID', 'SENT', '2023-05-26 16:25:42', '2023-05-26 16:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produks`
--

CREATE TABLE `pembelian_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembelian_id` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_produks`
--

INSERT INTO `pembelian_produks` (`id`, `pembelian_id`, `image`, `product_id`, `nama`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'ff68d', 'assets/img/OCcPy2NxzLtOxi3OUA5Id0K155RPknKnTdxZGBhk.jpg', 2, 'Indomie Goreng', 2, '120000', NULL, NULL),
(2, 'ff68d', 'assets/img/SY7WwDvreFoBaCufCeGzzz4mTCUkAclrGPofpZRG.jpg', 6, 'Saori Saus Tiram 135ml', 5, '9000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` varchar(30) NOT NULL,
  `kategori_produk` varchar(30) NOT NULL,
  `merek_produk` varchar(30) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `harga_produk`, `kategori_produk`, `merek_produk`, `deskripsi_produk`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mie Oven', '64000', 'makanan', 'Toko Dua Putra', 'Mie oven toko Dua Putra memiliki mie yang tebal dan lebar, yang memberikan rasa yang khas. Selain mie, hidangan ini juga dilengkapi dengan berbagai bahan tambahan seperti daging ayam, sayuran, telur, dan bumbu yang kaya akan cita rasa.\r\n\r\nProses pembuatannya dimulai dengan merebus mie hingga matang, kemudian mie tersebut diletakkan di dalam oven untuk dikeringkan dan memberikan tekstur yang renyah. Selanjutnya, mie yang telah dikeringkan tersebut dicampur dengan bumbu khusus dan bahan tambahan sesuai dengan pilihan pelanggan.', 'assets/img/K9dacOECLvL4tKsj6axoF1jINcETAIZ3KIPsxAm6.jpg', '2023-05-26 16:12:30', '2023-05-26 16:12:30'),
(2, 'Indomie Goreng', '120000', 'makanan', 'Indomie', 'Indomie Goreng Spesial 1 Dus / Karton isi 40 Pcs Mie Instant. Racikan bumbu pilihan dan rasanya yang nikmat membuat Indomie Goreng jadi pilihan praktis saat rasa lapar melanda. Terbuat dari tepung terigu berkualitas dengan paduan rempah-rempah pilihan terbaik, Indomie Goreng diproses dengan higienis menggunakan standar internasional dan teknologi berkualitas tinggi. Juga dilengkapi tambahan fortifikasi mineral dan vitamin A, B1, B6, B12, Niasin, Asam Folat, Mineral Zat Besi yang dibutuhkan tubuh. Nikmati Indomie Goreng lezat berpadu dengan bawang goreng renyah dan saus cabe.', 'assets/img/OCcPy2NxzLtOxi3OUA5Id0K155RPknKnTdxZGBhk.jpg', '2023-05-26 16:15:20', '2023-05-26 16:15:20'),
(3, 'Beras Premium Kebun Melon', '74000', 'sembako', 'Kebun Melon', 'BERAS KEBUN MELON\r\nTERSEDIA : 5KG\r\nSekali Nyoba, Minta Nambah\r\nBeras kualitas tinggi.\r\nButiran lebih utuh.\r\nAroma segar dan khas.\r\nRasa pulen dan nikmat.', 'assets/img/yK9kufIFOfBbryC2BVY6Ox66QyiLz05OmoQI7FVQ.jpg', '2023-05-26 16:16:27', '2023-05-26 16:16:27'),
(4, 'Beras Setra Ramos 25Kg', '263000', 'sembako', 'Setra Ramos', 'Beras setra ramos kembali hadir memenuhi kebutuhan beras anda. Beras ini merupakan jenis beras medium bulir panjang. Memiliki harga yg lebih murah dibandingkan yang lainnya.buktikan!', 'assets/img/mWbzsfLxr7BBw67upxCVpAevSVqsMvvfaGvFa9OM.jpg', '2023-05-26 16:18:16', '2023-05-26 16:18:16'),
(5, 'Beras Sumo Merah Premium 5kg', '73000', 'sembako', 'Sumo Merah', 'Beras Sumo Merah memiliki tekstur yang kenyal dan butiran yang agak lebih besar dibandingkan dengan beras putih biasa. Rasanya pun memiliki karakteristik yang khas, dengan aroma yang sedap dan rasa yang lebih gurih. Karena itulah, beras ini sering menjadi pilihan bagi mereka yang menginginkan nasi yang lebih beraroma dan memiliki cita rasa yang lebih kuat.\r\n\r\nSelain itu, beras Sumo Merah juga diketahui memiliki nilai gizi yang baik. Kandungan seratnya yang tinggi membantu memperbaiki pencernaan dan menjaga kesehatan saluran pencernaan. Selain itu, beras merah juga mengandung antioksidan dan nutrisi penting lainnya seperti vitamin B, zat besi, dan magnesium.', 'assets/img/wnLDr0Vk18FHjfoi2gbBfqUtZSgKRV9BBWZdXUtK.jpg', '2023-05-26 16:20:16', '2023-05-26 16:20:16'),
(6, 'Saori Saus Tiram 135ml', '9000', 'bumbu dapur', 'Saori', 'Saori Saos Tiram memiliki rasa yang khas, yaitu kombinasi antara manis dan asin dengan sentuhan aroma tiram. Saus ini memberikan citarasa yang lezat dan sedikit berumami pada hidangan yang diolah. Dengan menggunakan Saori Saos Tiram, Anda dapat meningkatkan rasa dan kelezatan hidangan, baik itu tumis sayuran, mie, nasi goreng, atau berbagai hidangan lainnya.\r\n\r\nSelain rasa yang lezat, keunggulan Saori Saos Tiram juga terletak pada kemudahan penggunaannya. Saos tiram ini tersedia dalam kemasan siap pakai, sehingga Anda tidak perlu repot mengolah atau mencampur bahan-bahan lain untuk mendapatkan cita rasa saos tiram yang autentik.', 'assets/img/SY7WwDvreFoBaCufCeGzzz4mTCUkAclrGPofpZRG.jpg', '2023-05-26 16:22:26', '2023-05-26 16:22:26'),
(8, 'Tepung Ketan 500gram', '12000', 'bahan dapur', 'Rose Brand', 'Tepung ketan putih rose brand mawar kemasan 500gram.\r\nTepung ketan kerap digunakan untuk membuat kue tradisional, misalnya saja gemblong. Penggunaan tepung ketan dapat membuat kue menjadi liat dan kenyal. Selain itu, tepung ketan pun dapat membantu menjaga kelembapan adonannya. Tepung ketan adalah tepung yang terbuat dari beras ketan hitam atau putih yang diolah dengan cara digiling, ditumbuk atau dihaluskan. Teksturnya mirip dengan tepung beras, namun jika diraba, tepung ketan akan terasa lebih lengket. Hal ini karena tepung ketan lebih banyak mengandung pati yang beperekat.', 'assets/img/B7NX7muSKDh7vL5SQHlOycPvw9Tw5IVWhxDNzUYe.jpg', '2023-05-26 16:45:50', '2023-05-26 16:45:50'),
(9, 'Minyak Goreng 1 Liter', '24000', 'sembako', 'bimoli', 'Dibuat dari kelapa sawit pilihan terbaik dan diproses di bawah pengawasan tenaga ahli berpengalamanMemiliki warna keemasan karena berasal dari Beta Karoten alami dan mengandung Omega-9Lebih bersih, memanas lebih cepat, dan tahan panas.', 'assets/img/Rw3Wd5ERu2PE2R3FdiiFM3LhVONAGpBI6M8obvSp.jpg', '2023-05-26 16:47:12', '2023-05-26 16:47:12'),
(10, 'Minyak Kanola', '77000', 'sembako', 'Tropicana Slim', 'Tropicana Slim Canola Oil adalah salah satu merek minyak kanola yang populer. Minyak kanola diproduksi dari biji tanaman kanola yang kaya akan asam lemak tak jenuh tunggal dan rendah lemak jenuh.', 'assets/img/1EOTGHYCTK2d52ZKYnXUlLYcHPxrI7bHmqHrkj9D.jpg', '2023-05-26 16:50:24', '2023-05-26 16:50:24'),
(11, 'Royco', '20000', 'bumbu dapur', 'Royco', 'Royco merupakan merek terkenal yang dikenal karena produk bumbu masak instan mereka. Mereka menawarkan berbagai jenis bumbu masak instan yang dapat digunakan untuk memperkaya rasa hidangan Anda', 'assets/img/GRgLIidWfYBdbqdRRmLjwXzwcJ8Wjt8mtxpy9yUs.jpg', '2023-05-26 16:52:16', '2023-05-26 16:52:16'),
(12, 'LADAKU Merica Bubuk 3gr', '11000', 'bumbu dapur', 'Ladaku', 'Ladaku Merica Bubuk adalah merek yang menyediakan produk merica bubuk berkualitas tinggi. Merica bubuk, juga dikenal sebagai lada bubuk, merupakan hasil penggilingan biji lada yang telah dikeringkan. Merica bubuk digunakan secara luas sebagai bumbu dalam memasak untuk memberikan rasa pedas dan aroma yang khas pada hidangan.', 'assets/img/myJ1sAZZLYBzrHNYrUuEFYz5LLc84Ba8KT5ZN2Mx.jpg', '2023-05-26 16:53:55', '2023-05-26 16:53:55'),
(13, 'Cabe Bubuk', '10000', 'bumbu dapur', 'Bon Cabe', 'Cabe bubuk atau serbuk halus yang terbuat dari cabai kering yang dihaluskan.\r\nCabe bubuk biasanya digunakan sebagai bumbu atau penyedap dalam berbagai hidangan.\r\nPenting untuk diingat bahwa cabe bubuk memiliki tingkat kepedasan yang tinggi, jadi gunakan dengan hati-hati sesuai dengan preferensi rasa Anda.', 'assets/img/KAYmvfu78wZjFjMj8cSb3VL1Mgb78wbqIS1VeHXo.jpg', '2023-05-26 16:55:05', '2023-05-26 17:11:18'),
(14, 'Garam Segitiga Bintang', '10000', 'sembako', 'Segitiga Bintang', 'Garam yg diproses demgan teknologi modern, terhindar dari Rasa pahit, terhindar dari semua kotoran, terhindar dari bahan kimia serta dapat mencegah penyakit gondok kemasan kurang lebih 200gram', 'assets/img/h1GMHUkCq78buUDBSWsGeYHk8yuX9nKo0PtUMwMH.jpg', '2023-05-26 16:56:09', '2023-05-26 16:56:09'),
(15, 'Sasa Santan', '8000', 'bumbu dapur', 'Sasa', 'Sasa Santan adalah merek santan instan yang terkenal. Santan, juga dikenal sebagai susu kelapa, adalah bahan penting dalam masakan Asia Tenggara dan menyediakan cita rasa kaya serta tekstur lembut pada hidangan.', 'assets/img/0vH0KsYNT6peVnvP3KakB1tWZtplYHpIMLTaqPnK.jpg', '2023-05-26 16:57:26', '2023-05-26 16:57:26'),
(16, 'Saringan Santan', '11000', 'alat dapur', '-', 'Saringan Santan aluminium biasa digunakan untuk menyaring santan dll,bisa juga digunakan sebagai ayakan tepung, berbahan aluminium', 'assets/img/LXBUPmXBH7igStuxeMoNn8oj3gHB6eDsrr9d6sWN.jpg', '2023-05-26 16:59:04', '2023-05-26 16:59:04'),
(17, 'Gulaku', '13000', 'sembako', 'Gulaku', 'Gulaku adalah merek gula pasir yang cukup terkenal di Indonesia. Gulaku menyediakan gula pasir berkualitas tinggi yang sering digunakan dalam proses memasak dan pembuatan makanan manis.', 'assets/img/Z7L1ZWhGPFmT2ERIr6Vwg6bz9negKZ7EtqgAO22M.jpg', '2023-05-26 17:00:50', '2023-05-26 17:00:50'),
(18, 'Gula', '12000', 'sembako', 'Rose Brand', 'Gula Rose Brand adalah merek gula pasir yang terkenal dan populer. Merek ini telah dikenal luas dan digunakan secara luas di berbagai negara. Gula Rose Brand dikenal karena kualitas gula pasir yang tinggi. Mereka menggunakan bahan baku yang berkualitas untuk memastikan gula pasir yang dihasilkan memiliki tekstur yang halus, rasa yang manis, dan kemurnian yang baik.', 'assets/img/jnF2PDAg9L88zSJUyPdZtmGKrvPPRTpEJSrMfpAP.jpg', '2023-05-26 17:03:22', '2023-05-26 17:03:22'),
(19, 'Teh Poci', '8000', 'minuman', 'PT Mayora Indah tbk,', 'Teh Poci dikenal karena kemasan kertasnya yang khas dan praktis. Teh Poci umumnya hadir dalam bentuk teh celup dengan kemasan individual yang terbuat dari kertas. Setiap kemasan teh Poci biasanya berisi satu sachet teh celup.', 'assets/img/PP0z0BoHfbuoUYx0DxA81xPkk9C24GpxnDy99u6n.jpg', '2023-05-26 17:06:27', '2023-05-26 17:06:27'),
(20, 'Alat Pel Putar', '59000', 'alat bersih-bersih', 'Top Tornado', 'Alat pel putar adalah sebuah perangkat pembersih lantai yang dirancang untuk membantu dalam membersihkan dan menyapu lantai dengan efisiensi yang tinggi. Alat pel putar umumnya memiliki desain yang ergonomis, yang membuatnya nyaman digunakan oleh pengguna. Pegangan yang nyaman dan panjang memungkinkan pengguna untuk mengendalikan perangkat dengan mudah dan mengelilingi area yang luas tanpa perlu banyak usaha.', 'assets/img/zGfQhK7vQEjjFdZHrhKMfQ58hKpTHdBKTkq1IDN6.webp', '2023-05-26 17:09:36', '2023-05-26 17:09:36'),
(21, 'Sabun Lifebuoy', '6000', 'alat mandi', 'Lifebuoy', 'Sabun Lifebuoy adalah salah satu merek sabun mandi yang terkenal di seluruh dunia. Lifebuoy dikenal karena formulanya yang efektif dalam membersihkan dan melindungi kulit. Sabun Lifebuoy memiliki formula yang efektif dalam membersihkan kulit. Busa yang dihasilkan dari sabun ini membantu mengangkat kotoran, minyak berlebih, dan sisa-sisa lainnya dari kulit, sehingga meninggalkan rasa kesegaran setelah mandi.', 'assets/img/DrzIYx4LIpLmGh1KicrM5GAONtiPYm0Oifh8Od6q.webp', '2023-05-26 17:15:51', '2023-05-26 17:15:51'),
(22, 'Kopi Kapal Api', '9000', 'minuman', 'Kapal api', 'Kopi Kapal Api adalah merek kopi yang terkenal dan populer di Indonesia. Merek ini telah menjadi ikon dalam industri kopi di negara ini. Kopi Kapal Api dikenal karena kualitas biji kopi pilihan yang digunakan. Mereka menggunakan biji kopi yang berkualitas tinggi, dipilih dengan teliti dari berbagai daerah penghasil kopi di Indonesia. Hal ini memastikan bahwa kopi Kapal Api memberikan cita rasa yang khas dan kenikmatan yang tinggi.', 'assets/img/r82lCh5hrKsU3LKlFevTT5JO2TKarBzCfUmTMlfF.jpg', '2023-05-26 17:18:37', '2023-05-26 17:18:37'),
(23, 'Susu UHT', '14000', 'sembako', 'Ultra Milk', 'Susu Ultra Milk adalah merek susu yang terkenal dan populer di Indonesia. Susu ini dikenal karena kualitasnya yang baik dan manfaat gizinya. Susu Ultra Milk mengandung gizi yang penting bagi pertumbuhan dan perkembangan tubuh. Susu ini mengandung protein, kalsium, vitamin D, dan berbagai vitamin dan mineral esensial lainnya yang dibutuhkan untuk menjaga kesehatan tulang, gigi, dan sistem kekebalan tubuh.', 'assets/img/6tTbQpDmpvre5xZ2Sn12Y2FHRLU62Y6itgIrOr3d.jpg', '2023-05-26 17:22:05', '2023-05-26 17:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(40) NOT NULL,
  `provinsi` varchar(40) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `image`, `gender`, `alamat`, `kota`, `provinsi`, `kode_pos`, `no_hp`, `level`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Luthfi', 'ZeeroXc', 'luthfim904@gmail.com', 'assets/img/x-chan.jpg', 'Pria', 'Jalan Makmur Gang Bakti No. 16 B', 'Medan', 'Sumatera Utara', '20114', '088262450134', 1, '$2y$10$6u.bdztsKwXqtZL2W8e7W..wevthLjnpVU3M471v1Gc9Jbin3Nv1u', '2023-05-26 08:19:53', '2023-05-26 08:19:53'),
(2, 'admin', 'admin', 'admin@gmail.com', 'assets/img/no_photo.png', 'Pria', 'admin', 'admin', 'admin', 'admin', 'admin', 1, '$2y$10$6gOYDomQoRs2tCK/kCo/3eCv.8O3orAj3DAMjunFxjeJwv1hx/szi', '2023-05-26 08:19:53', '2023-05-26 08:19:53'),
(3, 'Serafim Sitorus', 'serser', 'serafim@gmail.com', 'assets/img/no_photo.png', 'Pria', 'Jalan Berdikari', 'Medan', 'Sumatera Utara', '20114', '088262450134', 0, '$2y$10$.uwjpapOcsuQyfKNlaxqZ.mBhNona8l8rKORNCoq1cB.OnYloOzYu', '2023-05-26 08:19:53', '2023-05-26 08:19:53'),
(4, 'Ibra Rizqy Siregar', 'hyohoyh', 'rizqyibra@gmail.com', 'assets/img/tmSwepl51YYnBpQQqgZOU3G32OnSAZrwf7J97tx9.jpg', 'Pria', 'Jalan Pondok Surya', 'Medan', 'Sumatera Utara', '20114', '088262450134', 0, '$2y$10$6kfevYBY/mXU3PYAowUJfevLxV7pYnYPW.jqslc.tASd2LA/PSxUm', '2023-05-26 08:19:53', '2023-05-26 08:19:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD UNIQUE KEY `keranjangs_id_produk_unique` (`id_produk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produks`
--
ALTER TABLE `pembelian_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_produks_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian_produks`
--
ALTER TABLE `pembelian_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian_produks`
--
ALTER TABLE `pembelian_produks`
  ADD CONSTRAINT `pembelian_produks_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelians` (`id_pembelian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
