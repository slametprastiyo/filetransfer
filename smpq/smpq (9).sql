-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 09:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpq`
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
  `desktop` varchar(255) NOT NULL,
  `desktop_hd` varchar(255) NOT NULL,
  `mobile_hd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `hd`, `thumb`, `timestamp`, `priority`, `mobile`, `desktop`, `desktop_hd`, `mobile_hd`) VALUES
(88140, '', '', '', 1748326702, 1, '1748326697-mobile.webp', '1748326697-desktop.webp', '', '');

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
  `isTahfidz` int(11) NOT NULL
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
  `category` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `excerpt`, `hd`, `thumb`, `created_at`, `isi`, `view`, `category`, `tags`) VALUES
(24, 'Berlangsung khidmat, SMPQ Al-Muanawiyah laksanakan upacara bendera peringati hari sumpah pemuda', '|Upacara peringatan Hari Sumpah Pemuda pada 28 Okt', '1730167217.jpeg', 'thumb1730167217.jpeg', 1730341771, '|Upacara peringatan Hari Sumpah Pemuda pada 28 Oktober 2024 di SMP Quran Al-Muanawiyah berlangsung khidmat. Upacara dilakukan di pagi hari sebelum KBM(Kegiatan Belajar Mengajar) dimulai seperti upacara bendera pada umumnya dengan tambahan pembacaan teks sumpah pemuda. Seluruh peserta terlihat antusias mengikuti serangkaian tahapan upacara.\r|\r|Dalam kesempatan ini, ditekankan tentang pentingnya Sumpah Pemuda bagi bangsa Indonesia sebagaimana disampaikan oleh Ustadzah Izza Amalia Noor selaku pembina upacara.\r|\r|Pembina upacara menyampaikan bahwa Hari Sumpah Pemuda menjadi momen penting untuk mengingat peran strategis pemuda-pemudi Indonesia. Dalam sejarah, para pemuda adalah penggerak utama dalam perjuangan kemerdekaan dan pencetus semangat persatuan. Sumpah Pemuda yang diikrarkan pada 28 Oktober 1928, menggambarkan keberanian dan tekad para pemuda untuk mempersatukan bangsa yang majemuk. Pemuda masa kini, dengan semangat yang sama, perlu terus berinovasi dan berkontribusi dalam pembangunan negara.\r|\r|Ustadzah Izza mengimbuhkan bahwa Sumpah Pemuda mengajarkan kita bahwa perbedaan bukanlah penghalang, melainkan kekuatan yang menyatukan. Dengan beragam suku, budaya, dan agama, Indonesia memiliki kekayaan yang luar biasa. Perbedaan ini seharusnya menjadi modal sosial untuk membangun keharmonisan dan kebersamaan. Kita semua adalah bagian dari satu bangsa yang besar dan beragam, yang menjadikan Indonesia unik di mata dunia.\r|\r|SMP Quran Al-Muanawiyah bernaungan dalam lingkungan pesantren sehingga seluruh siswi juga merupakan santri. Pembina upacara mengingatkan bahwa santri sebagai generasi penerus bangsa memiliki peran penting dalam menjaga kerukunan. Dengan pendidikan yang baik, mereka dapat menjadi agen perubahan yang positif di masyarakat. Menghormati perbedaan dan mengedepankan toleransi adalah nilai-nilai yang harus ditanamkan sejak dini. Sekolah dan lembaga pendidikan memiliki tugas untuk mendidik siswa agar dapat hidup berdampingan dengan damai, meskipun dalam keberagaman.\r|\r|Tidak bisa dipungkiri, bahwa kita saat ini hidup dalam era digital. Semua warga sekolah kemungkinan sudah pernah atau bahkan sering menggunakan internet terutaman media sosial sebagai sarana komunikasi sehari-hari. Dengan perkembangan teknologi yang begitu pesat ini Ustadzah Izza menyampaikan bahwa era digital membawa tantangan baru dalam menjaga keutuhan NKRI. Informasi yang tersebar dengan cepat melalui media sosial dapat menjadi alat penyebar hoaks dan fitnah yang berpotensi memecah belah. Oleh karena itu, penting bagi kita semua, terutama pemuda, untuk bijak dalam menggunakan teknologi. Literasi digital menjadi kunci untuk memastikan bahwa informasi yang kita terima dan sebarkan adalah benar dan bermanfaat. Melalui pemanfaatan teknologi yang positif, kita dapat memperkuat persatuan dan menjaga keutuhan bangsa.\r|\r|\r||', 78, 0, 'upacara bendera,kegiatan,sumpah pemuda,peringatan hari besar'),
(27, 'Selamat Hari Pahlawan Nasional 10 November 2024', '|Hari Pahlawan diperingati setiap tahun pada tangg', '1731381125.png', 'thumb1731381125.png', 1731381125, '|Hari Pahlawan diperingati setiap tahun pada tanggal 10 November di Indonesia. Tanggal ini dipilih untuk mengenang pertempuran besar yang terjadi di Surabaya pada tahun 1945, di mana para pejuang Indonesia mempertaruhkan nyawa mereka untuk mempertahankan kemerdekaan bangsa.\r|\r|Latar Belakang Sejarah\r|Pada 10 November 1945, terjadi pertempuran sengit di Surabaya antara pasukan Indonesia dan tentara Sekutu. Pertempuran ini dipicu oleh ultimatum yang dikeluarkan oleh pasukan Sekutu yang memerintahkan para pejuang Indonesia untuk menyerahkan senjata mereka. Namun, para pejuang yang dipimpin oleh Bung Tomo menolak ultimatum tersebut dan memilih untuk bertempur demi mempertahankan kemerdekaan yang baru saja diraih. Pertempuran ini kemudian dikenal sebagai salah satu simbol perjuangan bangsa Indonesia.\r|\r|Makna dan Pentingnya Hari Pahlawan\r|Hari Pahlawan merupakan momen penting untuk menghormati dan mengenang jasa para pahlawan yang telah berjuang demi kemerdekaan Indonesia. Peringatan ini juga mengingatkan kita akan semangat dan pengorbanan para pejuang yang berani melawan penjajah demi mempertahankan tanah air.\r|\r|Kegiatan Peringatan Hari Pahlawan\r|Upacara Bendera: Di berbagai instansi pemerintah, sekolah, dan organisasi, upacara bendera dilaksanakan untuk mengenang jasa para pahlawan. Pada upacara ini, biasanya juga dilakukan pembacaan teks Proklamasi dan mengheningkan cipta.\r|\r|Ziarah ke Makam Pahlawan: Kegiatan ziarah ke Taman Makam Pahlawan dilakukan untuk menghormati para pahlawan yang telah gugur. Peletakan karangan bunga dan doa bersama menjadi bagian dari kegiatan ini.\r|\r|Seminar dan Diskusi: Berbagai seminar dan diskusi diadakan untuk membahas perjuangan para pahlawan dan relevansinya dengan kondisi saat ini. Hal ini dilakukan untuk menumbuhkan semangat nasionalisme dan cinta tanah air di kalangan generasi muda.\r|\r|Penerapan Nilai-Nilai Kepahlawanan\r|Peringatan Hari Pahlawan tidak hanya sebatas seremonial, tetapi juga sebagai ajang refleksi untuk menanamkan nilai-nilai kepahlawanan dalam kehidupan sehari-hari. Semangat kerja keras, pengorbanan, dan cinta tanah air yang ditunjukkan oleh para pahlawan diharapkan dapat menjadi teladan bagi seluruh rakyat Indonesia.\r|\r|Kesimpulan\r|Hari Pahlawan adalah momen penting untuk mengenang jasa para pejuang yang telah berkorban demi kemerdekaan Indonesia. Melalui berbagai kegiatan peringatan, kita diingatkan akan pentingnya semangat kepahlawanan dalam membangun bangsa yang lebih baik. Dengan menerapkan nilai-nilai kepahlawanan dalam kehidupan sehari-hari, kita dapat menghormati perjuangan para pahlawan dan melanjutkan semangat mereka untuk mencapai kemajuan dan keadilan bagi seluruh rakyat Indonesia.|', 10, 0, ''),
(29, 'SMP QURAN AL-MUANAWIYAH SUKSES LAKSANAKAN PERSESA (PERKEMAHAN SENIN-SELASA) DI LEMBAH GIRI, WONOSALAM', '|Alhamdulillahi rabbil&#039;alamin, SMP Quran Almu', '1736650764.webp', 'thumb1736650764.webp', 1733389200, '|Alhamdulillahi rabbil&#039;alamin, SMP Quran Almuanawiyah telah sukses melaksanakan PERSESA (Perkemahan Senin Selasa) pada 2 hingga 3 Desember 2024 bertempat di Lembah Giri, Wonosalam. Kegiatan ini diikuti oleh seluruh peserta didik dan guru pendamping. Para peserta dengan penuh semangat mengikuti serangkaian kegiatan dari awal hingga akhir.\r|\r|Kegiatan ini dilaksanakan dalam upaya untuk mencapai tujuan gerakan pramuka, yakni menanamkan dan menumbuhkan budi pekerti luhur dengan cara menetapkan mental, moral, fisik, pengetahuan, keterampilan dan pengalaman melalui berbagai macam kegiatan. Berkaitan dengan hal tersebut dan sesuai dengan program kegiatan, SMP Quran Al-Muanawiyah mengadakan Perkemahan Senin dan Selasa (Persesa) bagi seluruh peserta didik dengan tema “MENCETAK PEMIMPIN MUDA YANG DISIPLIN, MANDIRI, DAN TANGGUH”.\r|\r|Dalam perkemahan ini para peserta dibagi menjadi beberapa regu dimana masing-masing regu bersaing untuk menjadi regu yang terbaik. Setiap anggota harus dapat bekerja sama sehingga regu dapat melalui tantangan dengan baik. Kedisiplinan merupakan salah satu kuncinya. Dalam kegiatan perkemahan ini rangkaian acaranya cukup padat. Sehingga ketidakdisiplinan seorang anggota regu akan mengganggu jalannya acara dan memengaruhi kekompakan regu tersebut.\r|\r|Meskipun peserta dibagi dalam regu masing-masing peserta tetap harus mandiri secara individu. Hal ini dikarenakan masing-masing peserta mungkin memiliki kebutuhan yang berbeda. Ditahap inilah peserta akan belajar mandiri dan pentingnya bekerja sama.\r|\r|Ketangguhan juga menjadi nilai yang ditanamkan dalam kegiatan ini. Mengingat kegiatan ini dilaksanakan di alam bebas yang jauh dari kenyamanan yang selama ini para peserta rasakan sehingga para peserta dituntut untuk beradaptasi.\r|\r|Lebih lanjut, berikut adalah manfaat yang dapat diperoleh dari kegiatan ini:\r|1. Peningkatan Kemandirian. Selama perkemahan, siswa belajar untuk mandiri dalam mengurus kebutuhan sehari-hari seperti memasak, mendirikan tenda, dan menjaga kebersihan diri. Hal ini membantu mereka untuk lebih percaya diri dan mandiri dalam kehidupan sehari-hari.\r|\r|2. Kerja Sama Tim. Kegiatan perkemahan sering kali melibatkan kerja sama tim dalam berbagai kegiatan seperti permainan kelompok, penjelajahan, dan tugas bersama. Ini membantu siswa untuk belajar bekerja sama, memahami peran masing-masing, dan menghargai kontribusi setiap anggota tim.\r|\r|3. Pengembangan Keterampilan Sosial. Berinteraksi dengan teman-teman dan bekerja sama dalam kelompok membantu siswa untuk mengembangkan keterampilan sosial mereka. Mereka belajar untuk berkomunikasi dengan baik, menyelesaikan konflik, dan membangun hubungan yang positif.\r|\r|4. Pembelajaran Lingkungan. Perkemahan sering dilakukan di alam terbuka, yang memberikan kesempatan bagi siswa untuk belajar tentang lingkungan dan pentingnya menjaga kelestariannya. Mereka bisa mengenal flora dan fauna, serta memahami ekosistem yang ada di sekitar mereka.\r|\r|5. Pengembangan Kepemimpinan. Siswa diberi kesempatan untuk memimpin kelompok dalam berbagai kegiatan perkemahan. Ini membantu mereka untuk mengembangkan keterampilan kepemimpinan, seperti pengambilan keputusan, tanggung jawab, dan kemampuan mengarahkan kelompok.\r|\r|6. Pengembangan Fisik dan Mental. Kegiatan fisik seperti penjelajahan, mendirikan tenda, dan permainan luar ruangan membantu siswa untuk meningkatkan kebugaran fisik mereka. Selain itu, tantangan-tantangan yang dihadapi selama perkemahan juga membantu mengembangkan ketahanan mental dan kemampuan menyelesaikan masalah.\r|\r|7. Pembelajaran tentang kesederhanaan. Selama perkemahan, siswa belajar untuk hidup dengan fasilitas yang terbatas. Hal ini membantu mereka menghargai hal-hal sederhana dalam hidup dan memahami pentingnya bersyukur.\r|\r|Kegiatan perkemahan bukan hanya sekadar rekreasi, tetapi juga menjadi sarana pendidikan yang komprehensif. Dengan berbagai manfaatnya, kegiatan ini sangat penting untuk pengembangan diri para peserta.|', 6, 0, ''),
(34, 'KEGIATAN DAUR ULANG SAMPAH MENJADI ECOBRICK DI SMP QURAN AL-MUANAWIYAH DALAM RANGKA MENINGKATKAN KEPEDULIAN PESERTA DIDIK PADA KELESTARIAN LINGKUNGAN HIDUP', '|Dalam upaya menumbuhkan kesadaran akan pentingnya', '1748245350.webp', 'thumb1748245350.png', 1721926800, '|Dalam upaya menumbuhkan kesadaran akan pentingnya menjaga lingkungan, SMP Quran Al-Muanawiyah telah menyelenggarakan kegiatan daur ulang sampah dan pembuatan ecobrick. Kegiatan ini diikuti oleh seluruh siswa, guru, dan staf sekolah sebagai bentuk kontribusi nyata dalam mengurangi dampak sampah plastik terhadap bumi.\r|\r|\r|Sampah, terutama plastik, menjadi masalah serius bagi lingkungan karena membutuhkan waktu puluhan hingga ratusan tahun untuk terurai. Jika tidak dikelola dengan baik, sampah dapat mencemari tanah, air, bahkan mengancam ekosistem laut. Daur ulang adalah solusi efektif untuk mengurangi timbunan sampah sekaligus mengubahnya menjadi barang bernilai.\r|\r|\r|Beberapa manfaat daur ulang sampah antara lain:\r|1. Mengurangi Pencemaran Lingkungan – Dengan mendaur ulang, kita meminimalkan sampah yang berakhir di tempat pembuangan akhir (TPA) atau bahkan terbuang ke alam.\r|2. Menghemat Sumber Daya Alam – Daur ulang kertas, plastik, dan logam mengurangi kebutuhan bahan baku baru, sehingga menjaga kelestarian hutan dan tambang.\r|3. Menciptakan Nilai Ekonomi – Sampah daur ulang bisa diolah menjadi kerajinan tangan atau produk baru yang memiliki nilai jual.\r|4. Mendidik Generasi Peduli Lingkungan – Kegiatan ini mengajarkan siswa tentang tanggung jawab menjaga bumi sejak dini.\r|\r|\r|Dalam kegiatan ini para peserta didik mengumpulkan sampah plastik di lingkungan sekolah lalu mengolahnya menjadi ecobrick. Ecobrick adalah botol plastik yang diisi padat dengan sampah plastik non-organik hingga membentuk bahan bangunan yang kuat dan tahan lama. Ecobrick dapat digunakan untuk membuat meja, kursi, bahkan dinding bangunan ramah lingkungan. Selain sebagai solusi pengelolaan sampah, ecobrick juga mengajarkan kita untuk lebih bijak dalam menggunakan plastik sekali pakai.\r|\r|\r|Kegiatan daur ulang dan pembuatan ecobrick di SMP Quran Al-Muanawiyah bukan hanya seru, tetapi juga membawa dampak positif bagi lingkungan. Kami berharap, langkah kecil ini dapat menginspirasi seluruh warga sekolah untuk terus menerapkan gaya hidup ramah lingkungan. Mari jadikan bumi lebih hijau, dimulai dari hal sederhana!\r|\r||', 76, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `pilketos_dpt`
--

CREATE TABLE `pilketos_dpt` (
  `nis` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelas` varchar(3) DEFAULT NULL,
  `is_vote` int(11) DEFAULT 0,
  `password` varchar(255) DEFAULT NULL,
  `kandidat_dipilih` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pilketos_dpt`
--

INSERT INTO `pilketos_dpt` (`nis`, `nama`, `kelas`, `is_vote`, `password`, `kandidat_dipilih`) VALUES
(1, 'Alfiyah Rahmah', '0', 0, 'WK36', NULL),
(2, 'Izza Amalia Noor', '0', 0, 'FA49', NULL),
(3, 'Lia Amirotus Zakiyah', '0', 0, 'FU78', NULL),
(4, 'Liya Ni\'maturrohmah', '0', 0, 'IP41', NULL),
(5, 'M. Garda Pambela', '0', 0, 'QH21', NULL),
(6, 'M. Muhlas S.N.', '0', 0, 'CG81', NULL),
(7, 'Norma Yunita', '0', 0, 'ZH38', NULL),
(8, 'Noviyanti Finisa Nirmala', '0', 0, 'LL31', NULL),
(9, 'Nur Faidah', '0', 0, 'KL81', NULL),
(10, 'Slamet Prastiyo', '0', 1, 'BZ35', '23018'),
(11, 'Tayev Dedayev', '0', 0, 'HL30', NULL),
(12, 'Ummi Lutfia Ilfah', '0', 0, 'JS90', NULL),
(22001, 'Ainul Mudzakkriroh', '9', 0, 'YN67', NULL),
(22002, 'Arini Rizqi Nadhifah', '9', 0, 'UQ39', NULL),
(22003, 'Durrotul hikmah', '9', 0, 'QP38', NULL),
(22004, 'Inaayah Qurrotul aini', '9', 0, 'VJ89', NULL),
(22005, 'Kamilllya Qurrotu Ainii', '9', 0, 'NK33', NULL),
(22006, 'Khansa Hanifah Pinath', '9', 0, 'SO10', NULL),
(22007, 'Munawarotul Nisa', '9', 0, 'FS47', NULL),
(22008, 'Neysa Amira Mahya', '9', 0, 'DT97', NULL),
(22009, 'Sherin nur aulia', '9', 0, 'CB15', NULL),
(22011, 'Siena akoshi maghfira sarwono', '9', 0, 'BE18', NULL),
(22012, 'Talia Mumtazah', '9', 0, 'GA48', NULL),
(22015, 'Aisyah Ladeokta Gunawan', '9', 0, 'XV40', NULL),
(23016, 'Ailena Azka Ashfya', '8', 0, 'FH67', NULL),
(23017, 'Azkiya Zahra Imannia Rabbani', '8', 0, 'SF57', NULL),
(23018, 'Faaza Rahmah Az-Zahra', '8', 0, 'BY29', NULL),
(23019, 'Fatimatuzzahroh', '8', 0, 'VR41', NULL),
(23020, 'Hanna Fairuz Maulida', '8', 0, 'UD86', NULL),
(23021, 'Meida Safira Fakhrina', '8', 0, 'XX77', NULL),
(23023, 'Nada Alfa Farih', '8', 0, 'EV13', NULL),
(23024, 'Nayala Dina Camelia', '8', 0, 'QK21', NULL),
(23025, 'Nazila Apriana Zahira Zulfa', '8', 0, 'FP72', NULL),
(23027, 'Sania Auliya Nuraini', '8', 0, 'PJ78', NULL),
(23028, 'Sita Aulia Dewi Sa\'adah', '8', 0, 'JM61', NULL),
(23029, 'Syafa\'ah Putri Rahmawan', '8', 0, 'ZZ91', NULL),
(23032, 'Alung putri enggarsit', '9', 0, 'HG83', NULL),
(24035, 'Ni\'ma Hijria', '8', 0, 'FO73', NULL),
(24036, 'Asyafa Robiatul Adawiyah', '7', 0, 'DW90', NULL),
(24037, 'Chanjuan Zahwa Nabila Risa', '7', 0, 'ZR72', NULL),
(24038, 'Dhita Kayla Nur Ananta', '7', 0, 'DM85', NULL),
(24039, 'Haura Ayatul Husna', '7', 0, 'WN20', NULL),
(24040, 'Janeeta Khalishah Ramadhani', '7', 0, 'GE26', NULL),
(24041, 'Kurnia Az-Zahra', '7', 0, 'RS88', NULL),
(24042, 'Lathifatus Shafa Jalilah', '7', 0, 'NE88', NULL),
(24043, 'Nabilah Nur Aini', '7', 0, 'JL27', NULL),
(24044, 'Nadia Fathiyya Tauhida', '7', 0, 'CJ87', NULL),
(24045, 'Nayla Qalesya Zafarani', '7', 0, 'RG98', NULL),
(24046, 'Nichlah Tazkiyatul Badi\'ah', '7', 0, 'DJ73', NULL),
(24047, 'Selfi Desi Ernasari', '7', 0, 'CU55', NULL),
(24048, 'Sheiling Gisselle Hendrawanto', '7', 0, 'EB16', NULL),
(24049, 'Siti Ayu Nur Aini', '7', 0, 'LQ97', NULL),
(24051, 'Tsamara Azka Fadhilah', '7', 0, 'LM76', NULL),
(24052, 'Zahwa Afrina Afifa Najwa', '7', 0, 'RU10', NULL),
(24053, 'Nazwa Zhilall Al-Mumtazah', '8', 0, 'IB45', NULL),
(24055, 'Rasya devina amelia', '9', 0, 'CF30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pilketos_kandidat`
--

CREATE TABLE `pilketos_kandidat` (
  `nis` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `visi_misi` longtext DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `total_vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pilketos_kandidat`
--

INSERT INTO `pilketos_kandidat` (`nis`, `nama`, `visi_misi`, `gambar`, `no_urut`, `total_vote`) VALUES
(23018, 'Faaza', '{\"visi\":\"Terwujudnya OSIS yang bertanggung jawab, saling menyayangi dan taat aturan.\",\"misi\":[\"Membuat program yang memotivasi dan membangun nilai tanggung jawab\",\"menanamkan sifat disiplin\",\"membuat pengurus OSIS menjadi teladang yang baik untuk semua orang\",\"menjalin hubungan yang baik dengan semua\",\"menjadikan siswi yang memiliki sifat empati\"]}', 'detail-kandidat-1.webp', 1, 0),
(23025, 'Nazila', '{\"visi\":\"Mewujudkan SMPQ AL MUANAWIYAH yang aktif, kreatif, inovatif, dan profesional. Menjadikan OSIS sebagai wadah yang menampung segala bakat, potensi, dan keahlian yang dimiliki siswa.\",\"misi\":[\"Berpartisipasi aktif dalam ajang perlombaan akademik maupun non akademik di lingkungan sekolah dan masyarakat umum.\",\"Meningkatkan kedisiplinan siswa-siswi melalui peraturan yang tegas dan tanggung jawab.\",\"Menyelenggarakan suatu kegiatan ekstrakurikuler yang unik, kreatif, dan menarik bagi siswa-siswi.\"]}', 'detail-kandidat-2.webp', 2, 0),
(23027, 'Sania', '{\"visi\":\"Mewujudkan sekolah kreatif, berkualitas, dan berprestasi dengan menciptakan lingkungan yang mendukung perkembangan semua siswa melalui kegiatan inspiratif dan beragam.\",\"misi\":[\"Meningkatkan kegiatan ekstrakurikuler. Menyediakan lebih banyak opsi kegiatan yang menarik dan bermanfaat untuk semua siswa.\",\"Meningkatkan komunikasi. Membuka saluran komunikasi yang lebih efektif antara siswa dan pihak sekolah.\",\"Memperkuat kebersamaan. Menciptakan berbagai acara yang memperat hubungan antar siswa dan membangun semangat tim.\"]}', 'detail-kandidat-3.webp', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `name` varchar(255) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `role` int(11) NOT NULL
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
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pilketos_dpt`
--
ALTER TABLE `pilketos_dpt`
  ADD PRIMARY KEY (`nis`) USING BTREE;

--
-- Indexes for table `pilketos_kandidat`
--
ALTER TABLE `pilketos_kandidat`
  ADD PRIMARY KEY (`nis`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88141;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
