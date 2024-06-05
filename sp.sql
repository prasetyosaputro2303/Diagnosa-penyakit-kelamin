-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
(1, '(pria) Munculnya nanah atau cairan kental berwarna putih kuning, atau kehijauan dari penis '),
(2, '(pria) Testis terasa nyeri dan membengkak'),
(3, '(pria) Meningkatnya frekuensi buang air kecil'),
(8, '(wanita) Meningkatnya volume cairan yang keluar saat keputihan'),
(10, '(wanita) Munculnya nanah atau cairan kental berwarna kuning atau hijau dari vagina'),
(11, '(wanita) Terjadi perdarahan pada vagina walaupun bukan dalam masa menstruasi'),
(12, '(Wanita) Vagina terasa nyeri ketika sedang berhubungan seksual.'),
(13, 'Terasa nyeri saat buang air kecil'),
(14, 'Kelenjar getah bening di leher, selangkangan, atau ketiak membengkak'),
(15, 'Gatal di area dubur'),
(16, '(pria) Keluar cairan dari organ kemaluan.'),
(17, '(pria) Rasa nyeri dan bengkak pada salah satu atau kedua skrotum (buah zakar).'),
(18, '(pria) Terdapat luka pada organ kemaluan yang terasa gatal dan seperti terbakar.'),
(19, '(wanita) Keputihan yang menimbulkan bau abnormal.'),
(20, '(wanita) Merasakan nyeri saat berhubungan intim, bahkan perdarahan pada vagina.'),
(21, '(wanita) Rasa mual, demam, dan sakit pada perut bagian bawah jika infeksi telah menyebar.'),
(22, '(kutil kelamin) adanya benjolan-benjolan kecil yang lama-kelamaan semakin banyak dan membentuk tonjolan seperti jengger ayam Benjolan tersebut disebut dengan kutil. Kutil ini dapat tumbuh di organ seksual, mulut rahim (pada perempuan), atau anus. Kutil ya'),
(23, '(kutil kulit) munculnya tonjolan-tonjolan kecil pada kulit. Kutil ini sering kali tumbuh pada area kulit tangan, siku, dan jari. Apabila sering terkena tekanan atau trauma, dapat menimbulkan rasa nyeri bahkan berdarah.'),
(24, '(kanker serviks) keputihan berbau, pendarahan setelah menopause, dan pendarahan setelah berhubungan seksual.'),
(25, '(kanker serviks tingkat parah) mengalami lemas, penurunan berat badan, nyeri tulang, gangguan saat buang air kecil hingga penyebaran sel kanker.'),
(27, 'Demam'),
(28, 'Sakit tenggorokan'),
(29, 'Timbul ruam'),
(30, 'Nyeri otot dan sendi'),
(31, 'Demam yang berkepanjangan, bahkan bisa sampai lebih dari 10 hari.'),
(32, 'Tubuh selalu merasa lemas dan tidak berdaya.'),
(36, 'Kesulitan untuk bernapas.'),
(38, 'Mengalami gangguan diare kronis dan terjadi dalam kurun waktu lama.'),
(39, 'Mudah terserang infeksi jamur pada mulut, tenggorokan, dan alat kelamin.'),
(41, 'munculnya luka pada alat kelamin, dubur, bibir, maupun mulut'),
(42, 'ruam di beberapa bagian tubuh, seperti telapak tangan atau kaki.'),
(43, 'Flu '),
(44, 'Sakit kepala.'),
(48, 'Merasa cepat lelah'),
(49, 'Pembesaran kelenjar getah bening.'),
(50, 'Rambut rontok.'),
(51, 'Penurunan berat badan.'),
(52, 'munculnya gumma atau tumor kecil pada bagian tubuh tertentu.'),
(53, 'Urine berwarna pekat dan gelap'),
(54, 'Perubahan warna feses menjadi pucat'),
(55, 'Mengalami penurunan kemampuan kognitif, seperti mudah lupa dan sulit fokus'),
(56, 'Mengalami penyakit kuning, yaitu kondisi ketika kulit dan mata menguning'),
(57, 'Nyeri pada bagian atas perut'),
(58, 'Mual, muntah, dan tidak nafsu makan.'),
(59, 'Rasa tidak nyaman di area sekitar hati.'),
(60, 'Perut membuncit berisi cairan dan bengkak di kaki.'),
(61, 'munculnya vesikel atau bintil putih berisi air serta berkelompok.'),
(62, 'Muncul jerawat atau nanah di sekitar area genital (di area vagina seperti kelamin bagian luar, dan serviks).'),
(63, 'Gatal, rasa terbakar atau nyeri pada area genital.'),
(64, 'Mengalami kesulitan buang air kecil.');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`, `deskripsi`) VALUES
(1, 'Gonore', 'Gonore adalah penyakit yang dapat ditularkan melalui berhubungan intim. Penyebab gonore adalah infeksi bakteri, dan apabila tidak ditangani dapat menjadi cukup berbahaya. Mengingat infeksi bakteri tersebut dapat menyebar ke organ tubuh lain, seperti dubur, uretra pada pria, serviks pada wanita, tenggorokan, hingga mata. Selain itu, penyakit seksual ini juga dapat ditularkan dari ibu pengidap gonore ke bayi yang baru lahir.'),
(2, 'Klamidia', 'Klamidia adalah salah satu penyakit menular seksual yang disebabkan oleh infeksi bakteri Chlamydia trachomatis. Penyakit ini bisa menyerang pria maupun wanita dan ditularkan melalui hubungan intim. Bakteri ini dapat menginfeksi beberapa organ seperti mata, tenggorokan, leher rahim (serviks) dan saluran kencing. Klamidia adalah penyakit yang mudah disembuhkan jika mendapat penanganan lebih dini. Penyakit ini beresiko menyebabkan infertilitas jika tak kunjung mendapatkan penanganan dengan tepat. Penyakit klamidia adalah kondisi yang banyak dialami oleh orang-orang berusia 14-24 tahun.'),
(3, 'Hepatitis B', 'Hepatitis B adalah penyakit yang menimbulkan peradangan pada organ hati dan biasanya disebabkan oleh virus hepatitis B. Menurut World Health Organization (WHO), terdapat lebih dari 2 miliar orang di dunia yang telah terinfeksi hepatitis B. Dalam banyak kasus, infeksi hepatitis B juga dapat menetap dalam tubuh hingga menjadi kronis dan menjadi penyebab utama kanker hati. Maka itu, penting bagi masyarakat untuk tetap waspada akan bahaya hepatitis B.'),
(4, 'Herpes Genital', 'Herpes kelamin atau herpes genital adalah penyakit menular seksual yang disebabkan oleh herpes simplex virus (HSV). HSV dapat menular melalui kontak seksual dengan seseorang yang terinfeksi. Infeksi HSV dapat menyebabkan rasa nyeri, gatal, dan luka pada daerah genital penderitanya. Seseorang yang terkena infeksi herpes genital biasanya tidak menyadari gejala yang dialami. Pasalnya, herpes kelamin ini sering kali tidak bergejala. Jika muncul, akan tergolong ringan dan timbul setelah 2–12 hari seseorang terkena infeksi.'),
(5, 'Sifilis', 'Raja singa atau sifilis adalah salah satu penyakit menular seksual yang disebabkan oleh infeksi bakteri Treponema pallidum. Penyakit ini dapat memengaruhi berbagai organ tubuh dan memiliki beberapa tahap perburukan kondisi. Umumnya, sifilis adalah penyakit yang diawali dengan luka di sekitar alat kelamin, dubur, ataupun mulut. Awal kemunculan luka tersebut cenderung tidak disertai dengan rasa nyeri. Karena lukanya tidak terasa nyeri, sifilis kadang tidak langsung disadari oleh penderitanya. Walau begitu, penderita sifilis tersebut tetap bisa menularkan infeksinya ke orang lain. Apabila tidak ditangani dengan segera, sifilis berisiko menyebabkan komplikasi penyakit lain, seperti kerusakan jantung, tumor, infeksi HIV, dan gangguan kehamilan serta persalinan bagi ibu hamil.'),
(6, 'Human Papillomavirus (HPV)', 'Human papillomavirus atau HPV adalah jenis virus yang dapat menyebabkan infeksi pada permukaan kulit, umumnya berupa kutil di beberapa area tubuh, seperti bahu, wajah, kaki, hingga area kelamin. Selain itu, virus HPV adalah virus yang menjadi penyebab utama terjadinya kanker serviks pada perempuan. Meski begitu, infeksi virus HPV dapat menyerang siapa saja, baik pria (20-24 tahun) maupun wanita (16-19 tahun). HPV adalah jenis virus menular yang dapat ditularkan melalui aktivitas seksual. Meski terkadang tidak menimbulkan gejala pada awalnya, namun ketika virus ini berhasil bertahan lama dalam tubuh akan berisiko memunculkan kutil di permukaan kulit. Tak jarang penyakit ini juga dikaitkan dengan gonore dan sifilis.'),
(7, 'Human Immunodeficiency Virus (HIV)', 'Human Immunodeficiency Virus atau biasa disingkat dengan HIV adalah salah satu jenis virus menyerang salah satu sel di dalam sel darah putih, yaitu sel T atau CD4. Di mana, sel tersebut memiliki peran penting untuk menjaga imun tubuh dan memerangi infeksi yang masuk ke dalam tubuh. Apabila tidak ditangani sesegera mungkin, infeksi HIV ini dapat berkembang hingga mencapai stadium akhir.'),
(14, 'Hepatitis C', 'Hepatitis C adalah salah satu masalah kesehatan yang menyerang organ hati, yaitu infeksi dan inflamasi pada hati. Pada tahap awal, gejala hepatitis C cukup sulit untuk disadari, penderita hepatitis C umumnya tidak memiliki gejala selama bertahun-tahun. Sekalipun muncul gejala, mungkin hampir sama dengan demam pada umumnya seperti tidak nafsu makan, badan terasa pegal, dan mudah lelah. Hepatitis C adalah kondisi yang membutuhkan penanganan dengan segera. Karena apabila dibiarkan dalam jangka panjang, berisiko menyebabkan kerusakan pada hati, seperti sirosis dan kanker hati. Maka dari itu, deteksi dan penanganan dini hepatitis C adalah hal yang sangat penting.'),
(17, 'Acquired Immune Deficiency Syndrome (AIDS)', ' Stadium akhir dari HIV adalah AIDS. AIDS atau Acquired Immune Deficiency Syndrome merupakan kondisi ketika sistem kekebalan tubuh sudah tidak mampu lagi melawan infeksi yang masuk. penderita HIV/AIDS ini rentan untuk terkena penyakit tertentu, seperti TB atau tuberkulosis, infeksi saluran pernapasan akut atau ISPA, beberapa jenis kanker, dan lain sebagainya.');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`) VALUES
(52, 1, 1),
(53, 2, 1),
(55, 3, 1),
(56, 8, 1),
(57, 10, 1),
(59, 11, 1),
(60, 12, 1),
(61, 13, 1),
(62, 14, 1),
(63, 15, 1),
(64, 16, 2),
(65, 17, 2),
(66, 18, 2),
(67, 19, 2),
(68, 20, 2),
(69, 21, 2),
(70, 22, 6),
(71, 23, 6),
(72, 24, 6),
(73, 25, 6),
(74, 43, 7),
(75, 27, 7),
(76, 28, 7),
(77, 30, 7),
(78, 31, 17),
(79, 32, 17),
(80, 36, 17),
(81, 39, 17),
(82, 51, 17),
(83, 38, 17),
(85, 41, 5),
(86, 42, 5),
(87, 43, 5),
(88, 44, 5),
(89, 30, 5),
(90, 27, 5),
(91, 48, 5),
(92, 49, 5),
(93, 50, 5),
(94, 51, 5),
(95, 52, 5),
(96, 51, 14),
(97, 48, 14),
(98, 27, 14),
(99, 30, 14),
(100, 53, 14),
(101, 54, 14),
(102, 55, 14),
(103, 56, 14),
(104, 13, 14),
(105, 30, 3),
(106, 27, 3),
(107, 58, 3),
(108, 58, 14),
(109, 59, 3),
(110, 60, 3),
(111, 56, 3),
(112, 48, 3),
(113, 61, 4),
(114, 62, 4),
(115, 63, 4),
(116, 64, 4),
(117, 13, 4),
(118, 48, 4),
(119, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'soda', '12345'),
(2, 'zidan', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `relasi_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `relasi_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
