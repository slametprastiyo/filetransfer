-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2025 at 06:59 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u701671941_smpq`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hd` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1,
  `mobile` varchar(255) NOT NULL,
  `desktop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `hd`, `thumb`, `timestamp`, `priority`, `mobile`, `desktop`) VALUES
(88135, '', '', '', 1735446494, 1, '1735446492-mobile.webp', '1735446492-desktop.webp');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `hd` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `isTahfidz` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `hd`, `thumb`, `caption`, `timestamp`, `dimension`, `isTahfidz`) VALUES
(12, '1729921845.jpg', 'thumb1729921845.jpg', '', 1729921846, 'square', 0),
(35, '1730177658.jpeg', 'thumb1730177658.jpeg', 'Upacara peringatan Hari Sumpah Pemuda', 1730177658, 'square', 0),
(36, '1730872205.JPG', 'thumb1730872205.JPG', '', 1730872205, 'square', 0),
(38, '1730872314.JPG', 'thumb1730872314.JPG', '', 1730872314, 'square', 0),
(42, '1731381907.JPG', 'thumb1731381907.JPG', '', 1731381907, 'portrait', 0),
(43, '1731382188.jpeg', 'thumb1731382188.jpeg', '', 1731382188, 'landscape', 0),
(44, '1731384670.jpeg', 'thumb1731384670.jpeg', '', 1731384670, 'landscape', 0),
(46, '1732101235.jpeg', 'thumb1732101235.jpeg', 'Visitasi akreditasi BAN-PDM 2024', 1732101235, 'square', 0),
(47, '1732101254.jpeg', 'thumb1732101254.jpeg', 'Visitasi akreditasi BAN-PDM 2024', 1732101254, 'landscape', 0),
(48, '1732151313.jpeg', 'thumb1732151313.jpeg', 'Visitasi akreditasi BAN-PDM 2024 hari ke-1', 1732151313, 'square', 0),
(49, '1732151648.jpeg', 'thumb1732151648.jpeg', 'Visitasi akreditasi BAN-PDM 2024 hari ke-2', 1732151648, 'landscape', 0),
(51, '1732761487.webp', 'thumb1732761487.webp', '', 1732761488, 'square', 0),
(52, '1735455943.webp', 'thumb1735455943.webp', '', 1735455943, 'square', 1),
(53, '1735456100.webp', 'thumb1735456100.webp', '', 1735456100, 'square', 1),
(54, '1735456129.webp', 'thumb1735456129.webp', '', 1735456130, 'square', 1),
(55, '1735456144.webp', 'thumb1735456144.webp', '', 1735456144, 'square', 1),
(56, '1735456178.webp', 'thumb1735456178.webp', '', 1735456178, 'square', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` varchar(255) NOT NULL,
  `valid_until` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(100) NOT NULL,
  `hd` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `isi` longtext NOT NULL,
  `view` int(11) DEFAULT NULL,
  `category` int(3) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `excerpt`, `hd`, `thumb`, `created_at`, `isi`, `view`, `category`, `tags`) VALUES
(24, 'Berlangsung khidmat, SMPQ Al-Muanawiyah laksanakan upacara bendera peringati hari sumpah pemuda', '|Upacara peringatan Hari Sumpah Pemuda pada 28 Okt', '1730167217.jpeg', 'thumb1730167217.jpeg', 1730341771, '|Upacara peringatan Hari Sumpah Pemuda pada 28 Oktober 2024 di SMP Quran Al-Muanawiyah berlangsung khidmat. Upacara dilakukan di pagi hari sebelum KBM(Kegiatan Belajar Mengajar) dimulai seperti upacara bendera pada umumnya dengan tambahan pembacaan teks sumpah pemuda. Seluruh peserta terlihat antusias mengikuti serangkaian tahapan upacara.\r|\r|Dalam kesempatan ini, ditekankan tentang pentingnya Sumpah Pemuda bagi bangsa Indonesia sebagaimana disampaikan oleh Ustadzah Izza Amalia Noor selaku pembina upacara.\r|\r|Pembina upacara menyampaikan bahwa Hari Sumpah Pemuda menjadi momen penting untuk mengingat peran strategis pemuda-pemudi Indonesia. Dalam sejarah, para pemuda adalah penggerak utama dalam perjuangan kemerdekaan dan pencetus semangat persatuan. Sumpah Pemuda yang diikrarkan pada 28 Oktober 1928, menggambarkan keberanian dan tekad para pemuda untuk mempersatukan bangsa yang majemuk. Pemuda masa kini, dengan semangat yang sama, perlu terus berinovasi dan berkontribusi dalam pembangunan negara.\r|\r|Ustadzah Izza mengimbuhkan bahwa Sumpah Pemuda mengajarkan kita bahwa perbedaan bukanlah penghalang, melainkan kekuatan yang menyatukan. Dengan beragam suku, budaya, dan agama, Indonesia memiliki kekayaan yang luar biasa. Perbedaan ini seharusnya menjadi modal sosial untuk membangun keharmonisan dan kebersamaan. Kita semua adalah bagian dari satu bangsa yang besar dan beragam, yang menjadikan Indonesia unik di mata dunia.\r|\r|SMP Quran Al-Muanawiyah bernaungan dalam lingkungan pesantren sehingga seluruh siswi juga merupakan santri. Pembina upacara mengingatkan bahwa santri sebagai generasi penerus bangsa memiliki peran penting dalam menjaga kerukunan. Dengan pendidikan yang baik, mereka dapat menjadi agen perubahan yang positif di masyarakat. Menghormati perbedaan dan mengedepankan toleransi adalah nilai-nilai yang harus ditanamkan sejak dini. Sekolah dan lembaga pendidikan memiliki tugas untuk mendidik siswa agar dapat hidup berdampingan dengan damai, meskipun dalam keberagaman.\r|\r|Tidak bisa dipungkiri, bahwa kita saat ini hidup dalam era digital. Semua warga sekolah kemungkinan sudah pernah atau bahkan sering menggunakan internet terutaman media sosial sebagai sarana komunikasi sehari-hari. Dengan perkembangan teknologi yang begitu pesat ini Ustadzah Izza menyampaikan bahwa era digital membawa tantangan baru dalam menjaga keutuhan NKRI. Informasi yang tersebar dengan cepat melalui media sosial dapat menjadi alat penyebar hoaks dan fitnah yang berpotensi memecah belah. Oleh karena itu, penting bagi kita semua, terutama pemuda, untuk bijak dalam menggunakan teknologi. Literasi digital menjadi kunci untuk memastikan bahwa informasi yang kita terima dan sebarkan adalah benar dan bermanfaat. Melalui pemanfaatan teknologi yang positif, kita dapat memperkuat persatuan dan menjaga keutuhan bangsa.\r|\r|\r||', 78, 0, 'upacara bendera,kegiatan,sumpah pemuda,peringatan hari besar'),
(27, 'Selamat Hari Pahlawan Nasional 10 November 2024', '|Hari Pahlawan diperingati setiap tahun pada tangg', '1731381125.png', 'thumb1731381125.png', 1731381125, '|Hari Pahlawan diperingati setiap tahun pada tanggal 10 November di Indonesia. Tanggal ini dipilih untuk mengenang pertempuran besar yang terjadi di Surabaya pada tahun 1945, di mana para pejuang Indonesia mempertaruhkan nyawa mereka untuk mempertahankan kemerdekaan bangsa.\r|\r|Latar Belakang Sejarah\r|Pada 10 November 1945, terjadi pertempuran sengit di Surabaya antara pasukan Indonesia dan tentara Sekutu. Pertempuran ini dipicu oleh ultimatum yang dikeluarkan oleh pasukan Sekutu yang memerintahkan para pejuang Indonesia untuk menyerahkan senjata mereka. Namun, para pejuang yang dipimpin oleh Bung Tomo menolak ultimatum tersebut dan memilih untuk bertempur demi mempertahankan kemerdekaan yang baru saja diraih. Pertempuran ini kemudian dikenal sebagai salah satu simbol perjuangan bangsa Indonesia.\r|\r|Makna dan Pentingnya Hari Pahlawan\r|Hari Pahlawan merupakan momen penting untuk menghormati dan mengenang jasa para pahlawan yang telah berjuang demi kemerdekaan Indonesia. Peringatan ini juga mengingatkan kita akan semangat dan pengorbanan para pejuang yang berani melawan penjajah demi mempertahankan tanah air.\r|\r|Kegiatan Peringatan Hari Pahlawan\r|Upacara Bendera: Di berbagai instansi pemerintah, sekolah, dan organisasi, upacara bendera dilaksanakan untuk mengenang jasa para pahlawan. Pada upacara ini, biasanya juga dilakukan pembacaan teks Proklamasi dan mengheningkan cipta.\r|\r|Ziarah ke Makam Pahlawan: Kegiatan ziarah ke Taman Makam Pahlawan dilakukan untuk menghormati para pahlawan yang telah gugur. Peletakan karangan bunga dan doa bersama menjadi bagian dari kegiatan ini.\r|\r|Seminar dan Diskusi: Berbagai seminar dan diskusi diadakan untuk membahas perjuangan para pahlawan dan relevansinya dengan kondisi saat ini. Hal ini dilakukan untuk menumbuhkan semangat nasionalisme dan cinta tanah air di kalangan generasi muda.\r|\r|Penerapan Nilai-Nilai Kepahlawanan\r|Peringatan Hari Pahlawan tidak hanya sebatas seremonial, tetapi juga sebagai ajang refleksi untuk menanamkan nilai-nilai kepahlawanan dalam kehidupan sehari-hari. Semangat kerja keras, pengorbanan, dan cinta tanah air yang ditunjukkan oleh para pahlawan diharapkan dapat menjadi teladan bagi seluruh rakyat Indonesia.\r|\r|Kesimpulan\r|Hari Pahlawan adalah momen penting untuk mengenang jasa para pejuang yang telah berkorban demi kemerdekaan Indonesia. Melalui berbagai kegiatan peringatan, kita diingatkan akan pentingnya semangat kepahlawanan dalam membangun bangsa yang lebih baik. Dengan menerapkan nilai-nilai kepahlawanan dalam kehidupan sehari-hari, kita dapat menghormati perjuangan para pahlawan dan melanjutkan semangat mereka untuk mencapai kemajuan dan keadilan bagi seluruh rakyat Indonesia.|', 9, 0, ''),
(29, 'SMP QURAN AL-MUANAWIYAH SUKSES LAKSANAKAN PERSESA (PERKEMAHAN SENIN-SELASA) DI LEMBAH GIRI, WONOSALAM', '|Alhamdulillahi rabbil&#039;alamin, SMP Quran Almu', '1736650764.webp', 'thumb1736650764.webp', 1733389200, '|Alhamdulillahi rabbil&#039;alamin, SMP Quran Almuanawiyah telah sukses melaksanakan PERSESA (Perkemahan Senin Selasa) pada 2 hingga 3 Desember 2024 bertempat di Lembah Giri, Wonosalam. Kegiatan ini diikuti oleh seluruh peserta didik dan guru pendamping. Para peserta dengan penuh semangat mengikuti serangkaian kegiatan dari awal hingga akhir.\r|\r|Kegiatan ini dilaksanakan dalam upaya untuk mencapai tujuan gerakan pramuka, yakni menanamkan dan menumbuhkan budi pekerti luhur dengan cara menetapkan mental, moral, fisik, pengetahuan, keterampilan dan pengalaman melalui berbagai macam kegiatan. Berkaitan dengan hal tersebut dan sesuai dengan program kegiatan, SMP Quran Al-Muanawiyah mengadakan Perkemahan Senin dan Selasa (Persesa) bagi seluruh peserta didik dengan tema “MENCETAK PEMIMPIN MUDA YANG DISIPLIN, MANDIRI, DAN TANGGUH”.\r|\r|Dalam perkemahan ini para peserta dibagi menjadi beberapa regu dimana masing-masing regu bersaing untuk menjadi regu yang terbaik. Setiap anggota harus dapat bekerja sama sehingga regu dapat melalui tantangan dengan baik. Kedisiplinan merupakan salah satu kuncinya. Dalam kegiatan perkemahan ini rangkaian acaranya cukup padat. Sehingga ketidakdisiplinan seorang anggota regu akan mengganggu jalannya acara dan memengaruhi kekompakan regu tersebut.\r|\r|Meskipun peserta dibagi dalam regu masing-masing peserta tetap harus mandiri secara individu. Hal ini dikarenakan masing-masing peserta mungkin memiliki kebutuhan yang berbeda. Ditahap inilah peserta akan belajar mandiri dan pentingnya bekerja sama.\r|\r|Ketangguhan juga menjadi nilai yang ditanamkan dalam kegiatan ini. Mengingat kegiatan ini dilaksanakan di alam bebas yang jauh dari kenyamanan yang selama ini para peserta rasakan sehingga para peserta dituntut untuk beradaptasi.\r|\r|Lebih lanjut, berikut adalah manfaat yang dapat diperoleh dari kegiatan ini:\r|1. Peningkatan Kemandirian. Selama perkemahan, siswa belajar untuk mandiri dalam mengurus kebutuhan sehari-hari seperti memasak, mendirikan tenda, dan menjaga kebersihan diri. Hal ini membantu mereka untuk lebih percaya diri dan mandiri dalam kehidupan sehari-hari.\r|\r|2. Kerja Sama Tim. Kegiatan perkemahan sering kali melibatkan kerja sama tim dalam berbagai kegiatan seperti permainan kelompok, penjelajahan, dan tugas bersama. Ini membantu siswa untuk belajar bekerja sama, memahami peran masing-masing, dan menghargai kontribusi setiap anggota tim.\r|\r|3. Pengembangan Keterampilan Sosial. Berinteraksi dengan teman-teman dan bekerja sama dalam kelompok membantu siswa untuk mengembangkan keterampilan sosial mereka. Mereka belajar untuk berkomunikasi dengan baik, menyelesaikan konflik, dan membangun hubungan yang positif.\r|\r|4. Pembelajaran Lingkungan. Perkemahan sering dilakukan di alam terbuka, yang memberikan kesempatan bagi siswa untuk belajar tentang lingkungan dan pentingnya menjaga kelestariannya. Mereka bisa mengenal flora dan fauna, serta memahami ekosistem yang ada di sekitar mereka.\r|\r|5. Pengembangan Kepemimpinan. Siswa diberi kesempatan untuk memimpin kelompok dalam berbagai kegiatan perkemahan. Ini membantu mereka untuk mengembangkan keterampilan kepemimpinan, seperti pengambilan keputusan, tanggung jawab, dan kemampuan mengarahkan kelompok.\r|\r|6. Pengembangan Fisik dan Mental. Kegiatan fisik seperti penjelajahan, mendirikan tenda, dan permainan luar ruangan membantu siswa untuk meningkatkan kebugaran fisik mereka. Selain itu, tantangan-tantangan yang dihadapi selama perkemahan juga membantu mengembangkan ketahanan mental dan kemampuan menyelesaikan masalah.\r|\r|7. Pembelajaran tentang kesederhanaan. Selama perkemahan, siswa belajar untuk hidup dengan fasilitas yang terbatas. Hal ini membantu mereka menghargai hal-hal sederhana dalam hidup dan memahami pentingnya bersyukur.\r|\r|Kegiatan perkemahan bukan hanya sekadar rekreasi, tetapi juga menjadi sarana pendidikan yang komprehensif. Dengan berbagai manfaatnya, kegiatan ini sangat penting untuk pengembangan diri para peserta.|', 5, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `name` varchar(255) NOT NULL,
  `used` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`name`, `used`) VALUES
('upacara bendera', 1),
('kegiatan', 1),
('sumpah pemuda', 1),
('peringatan hari besar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `role`) VALUES
(1, 'admin', '$2y$10$QWcrl0iMhskJW/z8HW5oyO.RNJV.dEhNK/z.kfgh8CGqBayVfVEQi', 1728700892, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88136;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
