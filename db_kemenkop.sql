-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: db_kemenkop
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mt_profil`
--

DROP TABLE IF EXISTS `mt_profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_profil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `popup` char(1) DEFAULT 'N',
  `durasi` int DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mt_profil`
--

LOCK TABLES `mt_profil` WRITE;
/*!40000 ALTER TABLE `mt_profil` DISABLE KEYS */;
INSERT INTO `mt_profil` VALUES (1,'gambar_20230201135204.jpeg','Y',10000,1,'2023-02-01 13:52:04');
/*!40000 ALTER TABLE `mt_profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mt_user`
--

DROP TABLE IF EXISTS `mt_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mt_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `peran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mt_user`
--

LOCK TABLES `mt_user` WRITE;
/*!40000 ALTER TABLE `mt_user` DISABLE KEYS */;
INSERT INTO `mt_user` VALUES (1,'Administrator','sa','63a9f0ea7bb98050796b649e85481845','Super Admin');
/*!40000 ALTER TABLE `mt_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reloadtvwall`
--

DROP TABLE IF EXISTS `reloadtvwall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reloadtvwall` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reload_status` int DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reloadtvwall`
--

LOCK TABLES `reloadtvwall` WRITE;
/*!40000 ALTER TABLE `reloadtvwall` DISABLE KEYS */;
INSERT INTO `reloadtvwall` VALUES (1,1,'127.0.0.1'),(2,1,'::1'),(3,1,'172.20.0.1'),(4,0,'172.19.0.1');
/*!40000 ALTER TABLE `reloadtvwall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_berita`
--

DROP TABLE IF EXISTS `tr_berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `uraian` text,
  `qrcode` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_berita`
--

LOCK TABLES `tr_berita` WRITE;
/*!40000 ALTER TABLE `tr_berita` DISABLE KEYS */;
INSERT INTO `tr_berita` VALUES (4,'Kementerian Koperasi dan UKM Berikan Ruang kepada Usaha Mikro untuk Bisa Berkembang','','“KeMenKopUKM saat ini secara konsisten mendorong usaha mikro untuk mendapatkan legalitas formal disusul dengan menfasilitasi usaha mikro dengan pendaftaran hak merek atau sertifikat halal dan mengarahkannya agar bisa masuk dalam rantai pasok” ungkap Sekretaris Kementerian Koperasi dan UKM. Lanjutnya saat ini KemenKopUKM sudah menyesuaikan struktur yang ada untuk membesarkan usaha mikro ini dengan membentuk Deputi Usaha Mikro sehingga bisa lebih fokus dalam menangani usaha mikro.','630084d2a4df1.png',1,1,'2021-04-14 06:29:29');
/*!40000 ALTER TABLE `tr_berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_jadwal_kegiatan`
--

DROP TABLE IF EXISTS `tr_jadwal_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_jadwal_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) DEFAULT NULL,
  `ruang` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_jadwal_kegiatan`
--

LOCK TABLES `tr_jadwal_kegiatan` WRITE;
/*!40000 ALTER TABLE `tr_jadwal_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_jadwal_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_konten`
--

DROP TABLE IF EXISTS `tr_konten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_konten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_menu` int DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `uraian` text,
  `link` varchar(255) DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_konten`
--

LOCK TABLES `tr_konten` WRITE;
/*!40000 ALTER TABLE `tr_konten` DISABLE KEYS */;
INSERT INTO `tr_konten` VALUES (1,10,'gambar_20190904023740.png',NULL,NULL,1,'2019-09-04 09:37:40'),(2,10,'gambar_20190904023753.png',NULL,NULL,1,'2019-09-04 09:37:53'),(3,10,'gambar_20190904023801.png',NULL,NULL,1,'2019-09-04 09:38:01'),(4,10,'gambar_20190904023811.png',NULL,NULL,1,'2019-09-04 09:38:11'),(5,10,'gambar_20190904023821.png',NULL,NULL,1,'2019-09-04 09:38:21'),(6,10,'gambar_20190904023844.png',NULL,NULL,1,'2019-09-04 09:38:44'),(7,11,'gambar_20190904023917.png',NULL,NULL,1,'2019-09-04 09:39:17'),(8,11,'gambar_20190904023926.png',NULL,NULL,1,'2019-09-04 09:39:26'),(9,11,'gambar_20190904023936.png',NULL,NULL,1,'2019-09-04 09:39:36'),(10,11,'gambar_20190904023946.png',NULL,NULL,1,'2019-09-04 09:39:46'),(11,11,'gambar_20190904023957.png',NULL,NULL,1,'2019-09-04 09:39:57'),(12,11,'gambar_20190904024009.png',NULL,NULL,1,'2019-09-04 09:40:09'),(13,16,'gambar_20190904024526.png',NULL,NULL,1,'2019-09-04 09:45:26'),(14,17,'gambar_20190904024608.png',NULL,NULL,1,'2019-09-04 09:46:08'),(16,14,'gambar_20190904024649.png',NULL,NULL,1,'2019-09-04 09:46:49'),(17,15,'gambar_20190904024726.png',NULL,NULL,1,'2019-09-04 09:47:26'),(18,16,'gambar_20190904024533.png',NULL,NULL,1,'2019-09-04 09:45:33'),(19,16,'gambar_20190904024538.png',NULL,NULL,1,'2019-09-04 09:45:38'),(20,14,'gambar_20190904024656.png',NULL,NULL,1,'2019-09-04 09:46:56'),(21,14,'gambar_20190904024705.png',NULL,NULL,1,'2019-09-04 09:47:05'),(22,15,'gambar_20190904024732.png',NULL,NULL,1,'2019-09-04 09:47:32'),(23,15,'gambar_20190904024737.png',NULL,NULL,1,'2019-09-04 09:47:37'),(24,15,'gambar_20190904024742.png',NULL,NULL,1,'2019-09-04 09:47:42'),(25,15,'gambar_20190904024746.png',NULL,NULL,1,'2019-09-04 09:47:46'),(26,15,'gambar_20190904024754.png',NULL,NULL,1,'2019-09-04 09:47:54'),(27,15,'gambar_20190904024800.png',NULL,NULL,1,'2019-09-04 09:48:00'),(28,15,'gambar_20190904024806.png',NULL,NULL,1,'2019-09-04 09:48:06'),(29,15,'gambar_20190904024811.png',NULL,NULL,1,'2019-09-04 09:48:11'),(30,6,'gambar_20190912084031.png',NULL,NULL,1,'2019-09-12 08:40:31'),(31,6,'gambar_20190912084036.png',NULL,NULL,1,'2019-09-12 08:40:36'),(33,26,'',NULL,'http://nik.depkop.go.id',1,'2019-09-25 05:26:03'),(34,31,'','<p>Visi dan Misi Kementerian Koperasi dan UKM mengacu pada Visi dan Misi Presiden Joko Widodo dan Wakil Presiden M. Jusuf Kalla.</p>\n\n<p>Visi:&nbsp;</p>\n\n<p>Terwujudnya&nbsp;<em>Indonesia</em>&nbsp;yang Berdaulat, Mandiri dan Berkepribadian Berlandaskan Gotong Royong</p>\n\n<p>Misi:</p>\n\n<ol>\n	<li>Mewujudkan keamanan nasional yang mampu menjaga kedaulatan wilayah, menopang kemandirian ekonomi dengan mengamanan sumberdaya maritim, dan mencerminkan kepribadian Indonesia sebagai negara kepulauan.</li>\n	<li>Mewujudkan masyarakat maju, berkesinambungan dan demokratis berlandaskan negara hukum</li>\n	<li>Mewujudkan politik luar negeri bebas aktif dan memperkuat jati diri sebagai negara maritim</li>\n	<li>Mewujudkan kualitas hidup manusia Indonesia yang tinggi, maju dan sejahtera</li>\n	<li>Mewujudkan bangsa yang berdaya saing</li>\n	<li>Mewujudkan Indonesia menjadi negara maritim yang mandiri, maju, kuat dan berbasiskan kepentingan nasional</li>\n	<li>Mewujudkan masyarakat yang berkepribadian dalam kebudayaan.</li>\n</ol>\n\n<p>Berdasarkan Visi dan Misi Presiden, Norma dan Dimensi Pembangunan, serta Nawa Cita, maka disusun Tujuan Kementerian Koperasi dan UKM yaitu:</p>\n\n<p>Mewujudkan Koperasi dan UMKM yang berdaya saing dan berkontribusi pada peningkatan perekonomian nasional dan kesejahteraan rakyat berlandaskan semangat wirausaha, kemandirian koperasi dan keterpaduan.</p>\n\n<p>Tujuan tersebut menjadi landasan bagi penetapan Sasaran-sasaran</p>\n\n<p>Strategis Kementerian Koperasi dan UKM pada tahun 2015-2019. Pencapaian</p>\n\n<p>tujuan tersebut dilaksanakan melalui upaya-upaya antara lain:</p>\n\n<ol>\n	<li>Peningkatan kompetensi UMKM dalam kewirausahaan dan inovasi, teknik produksi dan pengelolaan usaha, serta pemasaran di dalam dan luar negeri;</li>\n	<li>Peningkatan kemandirian koperasi melalui penguatan jati dirinya;</li>\n	<li>Peningkatan jangkauan, skema dan kualitas layanan sistem pendukung koperasi dan UMKM terkait diklat, pembiayaan, pendampingan usaha, layanan teknologi dan informasi, intermediasi pasar, dan kemitraan;</li>\n	<li>Penguatan koperasi dalam pemanfaatan sumber daya lokal di berbagai sektor perekonomian dan lapisan sosial dan ekonomi masyarakat;</li>\n	<li>Penguatan kaderisasi koperasi terutama di kalangan generasi muda dan kelompok produktif lainnya;</li>\n	<li>Peningkatan iklim usaha yang kondusif melalui penetapan dan perbaikan peraturan dan kebijakan, kemudahan perizinan, serta peningkatan kesempatan, kepastian dan perlindungan usaha; dan</li>\n	<li>Peningkatan keterpaduan kebijakan lintas instansi dan pusat-daerah yang didukung peran dan partisipasi pemangku kepentingan lainnya.</li>\n</ol>\n','',1,'2019-09-25 05:34:49'),(35,27,'','<p><strong>PERIODE SEBELUM KEMERDEKAAN</strong></p>\n\n<p>Koperasi adalah institusi (lembaga) yang tumbuh atas dasar solidaritas tradisional dan kerjasama antar individu, yang pernah berkembang sejak awal sejarah manusia sampai pada awal Revolusi Industrial di Eropa pada akhir abad 18 dan selama abad 19, sering disebut sebagai Koperasi Historis atau Koperasi Pra-Industri. Koperasi Modern didirikan pada akhir abad 18, terutama sebagai jawaban atas masalah-masalah sosial yang timbul selama tahap awal Revolusi Industri.</p>\n\n<p>Di Indonesia, ide-ide perkoperasian diperkenalkan pertama kali oleh Patih di Purwokerto, Jawa Tengah, R. Aria Wiraatmadja yang pada tahun 1896 mendirikan sebuah Bank untuk Pegawai Negeri. Cita-cita semangat tersebut selanjutnya diteruskan oleh De Wolffvan Westerrode.</p>\n\n<p>&nbsp;</p>\n\n<p>Pada tahun 1908, Budi Utomo yang didirikan oleh Dr. Sutomo memberikan peranan bagi gerakan koperasi untuk memperbaiki kehidupan rakyat. Pada tahun 1915 dibuat peraturan Verordening op de Cooperatieve Vereeniging, dan pada tahun 1927 Regeling Inlandschhe Cooperatiev.</p>\n\n<p>Pada tahun 1927 dibentuk Serikat Dagang Islam, yang bertujuan untuk memperjuangkan kedudukan ekonomi pengusah-pengusaha pribumi. Kemudian pada tahun 1929, berdiri Partai Nasional Indonesia yang memperjuangkan penyebarluasan semangat koperasi. Hingga saat ini kepedulian pemerintah terhadap keberadaan koperasi nampak jelas dengan membentuk lembaga yang secara khusus menangani pembinaan dan pengembangan koperasi.</p>\n\n<p><strong>Kronologis lembaga yang menangani pembinaan koperasi pada saat itu adalah sebagai berikut:</strong></p>\n\n<p><strong>Tahun 1930</strong></p>\n\n<p>Pemerintah Hindia Belanda membentuk Jawatan Koperasi yang keberadaannya dibawah Departemen Dalam Negeri, dan diberi tugas untuk melakukan pendaftaran dan pengesahan koperasi, tugas ini sebelumnya dilakukan oleh Notaris.</p>\n\n<p><strong>Tahun 1935</strong></p>\n\n<p>Jawatan Koperasi dipindahkan ke Departemen Economische Zaken, dimasukkan dalam usaha hukum (Bafdeeling Algemeene Economische Aanglegenheden). Pimpinan Jawatan Koperasi diangkat menjadi Penasehat.</p>\n\n<p><strong>Tahun 1939</strong></p>\n\n<p>Jawatan Koperasi dipisahkan dari Afdeeling Algemeene Aanglegenheden ke Departemen Perdagangan Dalam Negeri menjadi Afdeeling Coperatie en Binnenlandsche Handel. Tugasnya tidak hanya memberi bimbingan dan penerangan tentang koperasi tetapi meliputi perdagangan untuk Bumi Putra.</p>\n\n<p><strong>Tahun 1942</strong></p>\n\n<p>Pendudukan Jepang berpengaruh pula terhadap keberadaan jawatan koperasi. Saat ini jawatan koperasi dirubah menjadi SYOMIN KUMIAI TYUO DJIMUSYO dan Kantor di daerah diberi nama SYOMIN KUMIAI DJIMUSYO.</p>\n\n<p><strong>Tahun 1944</strong></p>\n\n<p>Didirikan JUMIN KEIZAIKYO (Kantor Perekonomian Rakyat) Urusan Koperasi menjadi bagiannya dengan nama KUMAIKA, tugasnya adalah mengurus segala aspek yang bersangkutan dengan Koperasi.</p>\n\n<p><strong>PERIODE SETELAH KEMERDEKAAN</strong></p>\n\n<p><strong>Tahun 1945</strong></p>\n\n<p>Koperasi masuk dalam tugas Jawatan Koperasi serta Perdagangan Dalam Negeri dibawah Kementerian Kemakmuran.</p>\n\n<p><strong>Tahun 1946</strong></p>\n\n<p>Urusan Perdagangan Dalam Negeri dimasukkan pada Jawatan Perdagangan, sedangkan Jawatan Koperasi berdiri sendiri mengurus soal koperasi.</p>\n\n<p><strong>Tahun 1947 - 1948</strong></p>\n\n<p>Jawatan Koperasi dibawah pimpinan R. Suria Atmadja, pada masa ini ada suatu peristiwa yang cukup penting yaitu tanggal 12 Juli 1947, Gerakan Koperasi mengadakan Kongres di Tasikmalaya dan hasil Kongres menetapkan bahwa tanggal 12 Juli dinyatakan sebagai Hari Koperasi.</p>\n\n<p><strong>Tahun 1949</strong></p>\n\n<p>Pusat Jawatan Koperasi RIS berada di Yogyakarta, tugasnya adalah mengadakan kontak dengan jawatan koperasi di beberapa daerah lainnya. Tugas pokok yang dihasilkan telah melebur Bank dan Lumbung Desa dialihkan kepada Koperasi. Pada tahun yang sama yang diundangkan dengan Regeling Cooperatieve 1949 Ordinasi 7 Juli 1949 (SBT. No. 179).</p>\n\n<p><strong>Tahun 1950</strong></p>\n\n<p>Jawatan Koperasi RI yang berkedudukan di Yogyakarta digabungkan dengan Jawatan Koperasi RIS, bekedudukan di Jakarta.</p>\n\n<p><strong>Tahun 1954</strong></p>\n\n<p>Pembina Koperasi masih tetap diperlukan oleh Jawatan Koperasi dibawah pimpinan oleh Rusli Rahim.</p>\n\n<p><strong>Tahun 1958</strong></p>\n\n<p>Jawatan Koperasi menjadi bagian dari Kementerian Kemakmuran.</p>\n\n<p><strong>Tahun 1960</strong></p>\n\n<p>Perkoperasian dikelola oleh Menteri Transmigrasi Koperasi dan Pembangunan Masyarakat Desa (TRANSKOPEMADA), dibawah pimpinan seorang Menteri yang dijabat oleh Achmadi.</p>\n\n<p><strong>Tahun 1963</strong></p>\n\n<p>Transkopemada diubah menjadi Departemen Koperasi dan tetap dibawah pimpinan Menteri Achmadi.</p>\n\n<p><strong>Tahun 1964</strong></p>\n\n<p>Departemen Koperasi diubah menjadi Departemen Transmigrasi dan Koperasi dibawah pimpinan Menteri ACHMADI kemudian diganti oleh Drs. Achadi, dan Direktur Koperasi dibawah pimpinan seorang Direktur Jenderal yang bernama Chodewi Amin.</p>\n\n<p><strong>PERIODE TAHUN 1966 - 2004</strong></p>\n\n<p><strong>Tahun 1966</strong></p>\n\n<p>Dalam tahun 1966 Departemen Koperasi kembali berdiri sendiri, dan dipimpin oleh Pang Suparto. Pada tahun yang sama, Departemen Koperasi dirubah menjadi Kementerian Perdagangan dan Koperasi dibawah pimpinan Prof. Dr. Sumitro Djojohadikusumo, sedangkan Direktur Jenderal Koperasi dijabat oleh Ir. Ibnoe Soedjono (dari tahun 1960 s/d 1966).</p>\n\n<p><strong>Tahun 1967</strong></p>\n\n<p>Pada tahun 1967 diberlakukan Undang-undang Nomor 12 Tahun 1967 tentang Pokok-pokok Perkoperasian tanggal 18 Desember 1967. Koperasi masuk dalam jajaran Departemen Dalam Negeri dengan status Direktorat Jenderal. Mendagri dijabat oleh Basuki Rachmad, dan menjabat sebagai Dirjen Koperasi adalah Ir. Ibnoe Soedjono.</p>\n\n<p><strong>Tahun 1968</strong></p>\n\n<p>Kedudukan Direktorat Jenderal Koperasi dilepas dari Departemen Dalam Negeri, digabungkan kedalam jajaran Departemen Transmigrasi dan Koperasi, ditetapkan berdasarkan :</p>\n\n<ol>\n	<li>Keputusan Presiden Nomor 183 Tahun 1968 tentang Susunan Organisasi Departemen.</li>\n	<li>Keputusan Menteri Transmigrasi dan Koperasi Nomor 120/KTS/ Mentranskop/1969 tentang Kedudukan Tugas Pokok dan Fungsi Susunan Organisasi berserta Tata Kerja Direktorat Jenderal Koperasi.</li>\n</ol>\n\n<p>Menjabat sebagai Menteri Transkop adalah M. Sarbini, sedangkan Dirjen Koperasi tetap Ir. Ibnoe Soedjono.</p>\n\n<p><strong>Tahun 1974</strong></p>\n\n<p>Direktorat Jenderal Koperasi kembali mengalami perubahan yaitu digabung kedalam jajaran Departemen Tenaga Kerja, Transmigrasi dan Koperasi, yang ditetapkan berdasarkan :</p>\n\n<ol>\n	<li>Keputusan Presiden Nomor 45 Tahun 1974 tentang Susunan Organisasi Departemen Tenaga Kerja, Transmigrasi dan Koperasi.</li>\n	<li>Instruksi Menteri Tenaga Kerja, Transmigrasi dan Koperasi Nomor : INS-19/MEN/1974, tentang Susunan Organisasi Direktorat Jenderal Koperasi tidak ada perubahan (tetap memberlakukan Keputusan Menteri Transmigrasi Nomor : 120/KPTS/Mentranskop/1969) yang berisi penetapan tentang Susunan Organisasi Direktorat Jenderal Koperasi.</li>\n</ol>\n\n<p>Menjabat sebagai Menteri adalah Prof. DR. Subroto, adapun Dirjen Koperasi tetap Ir. Ibnoe Soedjono.</p>\n\n<p><strong>Tahun 1978</strong></p>\n\n<p>Direktorat Jenderal Koperasi masuk dalam Departemen Perdagangan dan Koperasi, dengan Drs. Radius Prawiro sebagai Menterinya. Untuk memperkuat kedudukan koperasi dibentuk puia Menteri Muda Urusan Koperasi, yang dipimpin oleh Bustanil Arifin, SH. Sedangkan Dirjen Koperasi dijabat oleh Prof. DR. Ir. Soedjanadi Ronodiwiryo.</p>\n\n<p><strong>Tahun 1983</strong></p>\n\n<p>Dengan berkembangnya usaha koperasi dan kompleksnya masalah yang dihadapi dan ditanggulangi, koperasi melangkah maju di berbagai bidang dengan memperkuat kedudukan dalam pembangunan, maka pada Kabinet Pembangunan IV Direktorat Jenderal Koperasi ditetapkan menjadi Departemen Koperasi, melalui Keputusan Presiden Nomor 20 Tahun 1983, tanggal 23 April 1983.</p>\n\n<p><strong>Tahun 1991</strong></p>\n\n<p>Melalui Keputusan Presiden Nomor 42 Tahun 1991, tanggal 10 September 1991 terjadi perubahan susunan organisasi Departemen Koperasi yang disesuaikan keadaan dan kebutuhan.</p>\n\n<p><strong>Tahun 1992</strong></p>\n\n<p>Diberlakukan Undang-undang Nomor : 25 Tahun 1992 tentang Perkoperasian, selanjutnya mancabut dan tidak berlakunya lagi Undang-undang Nomor: 12 Tahun 1967 tentang Pokok-pokok Perkoperasian.</p>\n\n<p><strong>Tahun 1993</strong></p>\n\n<p>Berdasarkan Keputusan Presiden Nomor : 96 Tahun 1993, tentang Kabinet Pembangunan VI dan Keppres Nomor 58 Tahun 1993, telah terjadi perubahan nama Departemen Koperasi menjadi Departemen Koperasi dan Pembinaan Pengusaha Kecil. Tugas Departemen Koperasi menjadi bertambah dengan membina Pengusaha Kecil. Hal ini merupakan perubahan yang strategis dan mendasar, karena secara fundamental golongan ekonomi kecil sebagai suatu kesatuan dan keseluruhan dan harus ditangani secara mendasar mengingat yang perekonomian tidak terbatas hanya pada pembinaan perkoperasian saja.</p>\n\n<p><strong>Tahun 1996</strong></p>\n\n<p>Dengan adanya perkembangan dan tuntutan di lapangan, maka diadakan peninjauan kembali susunan organisasi Departemen Koperasi dan Pembinaan Pengusaha Kecil, khususnya pada unit operasional, yaitu Ditjen Pembinaan Koperasi Perkotaan, Ditjen Pembinaan Koperasi Pedesaan, Ditjen Pembinaan Pengusaha Kecil. Untuk mengantisipasi hal tersebut telah diadakan perubahan dan penyempurnaan susunan organisasi serta menomenklaturkannya, agar secara optimal dapat menampung seluruh kegiatan dan tugas yang belum tertampung.</p>\n\n<p><strong>Tahun 1998</strong></p>\n\n<p>Dengan terbentuknya Kabinet Pembangunan VII berdasarkan Keputusan Presiden Republik Indonesia Nomor : 62 Tahun 1998, tanggal 14 Maret 1998, dan Keppres Nomor 102 Thun 1998 telah terjadi penyempurnaan nama Departemen Koperasi dan Pembinaan Pengusaha Kecil menjadi Departemen Koperasi dan Pengusaha Kecil, hal ini merupakan penyempurnaan yang kritis dan strategis karena kesiapan untuk melaksanakan reformasi ekonomi dan keuangan dalam mengatasi masa krisis saat itu serta menyiapkan landasan yang kokoh, kuat bagi Koperasi dan Pengusaha Kecil dalam memasuki persaingan bebas/era globalisasi yang penuh tantangan.</p>\n\n<p><strong>Tahun 1999</strong></p>\n\n<p>Melalui Keppres Nomor 134 Tahun 1999 tanggal 10 November 1999 tentang Kedudukan, Tugas, Fungsi, Susunan Organisasi dan Tata Kerja Menteri Negara, maka Departemen Koperasi dan PK diubah menjadi Menteri Negara Koperasi dan Pengusaha Kecil dan Menengah.</p>\n\n<p><strong>Tahun 2000</strong></p>\n\n<ol>\n	<li>Berdasarkan Keppres Nomor 51 Tahun 2000 tanggal 7 April 2000, maka ditetapkan Badan Pengembangan Sumber&nbsp;Daya Koperasi dan Pengusaha Kecil Menengah.</li>\n	<li>Melalui Keppres Nomor 166 Tahun 2000 tanggal 23 November 2000 tentang Kedudukan, Tugas, Fungsi, Kewenangan,&nbsp;Susunan Organisasi dan Tata Kerja Lembaga Pemerintah Non Departemen. maka dibentuk&nbsp; Badan Pengembangan Sumber Daya Koperasi dan Pegusaha Kecil dan Menengah (BPS-KPKM).</li>\n	<li>Berdasarkan Keppres Nomor 163 Tahun 2000 tanggal 23 November 2000 tentang Kedudukan, Tugas, Fungsi, Kewenangan,&nbsp;Susunan Organisasi dan Tata Kerja Menteri Negara, maka Menteri Negara Koperasi dan PKM diubah menjadi Menteri Negara Urusan Koperasi dan Usaha Kecil dan Menengah.</li>\n	<li>Melalui Keppres Nomor 175 Tahun 2000 tanggal 15 Desember 2000 tentang Susunan Organisasi dan Tugas Menteri Negara,&nbsp;maka Menteri Negara Urusan Koperasi dan UKM diubah menjadi Menteri Negara Koperasi dan Usaha Kecil dan Menengah.</li>\n</ol>\n\n<p><strong>Tahun 2001</strong></p>\n\n<ol>\n	<li>Melalui Keppres Nomor 101 Tahun 2001 tanggal 13 September 2001 tentang Kedudukan, Tugas, Fungsi, Kewenangan, Susunan Organisasi dan Tata Kerja Menteri Negara, maka dikukuhkan kembali Menteri Negara Koperasi dan Usaha Kecil dan Menengah.</li>\n	<li>Berdasarkan Keppres Nomor 103 Tahun 2001 tanggal 13 September 2001 tentang Kedudukan, Tugas, Fungsi, Kewenangan, usunan Organisasi dan Tata Kerja Lembaga Non Pemerintah, maka Badan Pengembangan Sumber Daya Koperasi dan Pengusaha&nbsp; Kecil Menengah dibubarkan.</li>\n	<li>Melalui Keppres Nomor 108 Tahun 2001 tanggal 10 Oktober 2001 tentang Unit Organisasi dan Tugas Eselon I Menteri Negara, maka Menteri Negara Koperasi dan UKM ditetapkan membawahi Setmeneg, Tujuh Deputi, dan Lima Staf Ahli. Susunan ini berlaku hingga tahun 2004 sekarang ini.</li>\n</ol>\n\n<p><strong>Tahun 2015</strong></p>\n\n<ol>\n	<li>Melalui Keppres Nomor 62 Tahun 2015 tanggal 18 Mei 2015 tentang Kementerian Koperasi dan Usaha Kecil dan Menengah.</li>\n</ol>\n','',1,'2019-09-25 05:44:15'),(36,29,'','<h3 style=\"text-align:center\"><strong>CURRICULUM VITAE</strong></h3>\n\n<p><img alt=\"\" src=\"http://adityarama-dc.com/kemenkop/uploads/konten/ketua%20koperasi.jpeg\" style=\"width:100%\" /><br /><br />\nNama : Drs. Teten Masduki<br />\nTempat dan Tanggal Lahir : Garut, Jawa Barat, 6 Mei 1963<br />\nAlamat : Jalan Kalimantan II/8, Pasar Rebo, Jakarta Timur<br />\nEmail : tmasduki@yahoo.com</p>\n\n<p><strong>Profil Singkat</strong><br />\nTerlahir dari keluarga petani, masa kecil Teten dihabiskan di Kecamatan Balubur Limbangan, Garut, Jawa Barat. Setamat dari SMAN 1 Garut ia kuliah di IKIP Bandung, mengambil jurusan kimia. Kesadaran terhadap masalah-masalah sosial sudah tumbuh sejak SMA. Saat kuliah ia sering ikut kelompok diskus dan ikut mendampingi petani di Garut. Berkat kegigihannya melakukan kerja-kerja sosial, Teten Masduki dianugerahi Suardi Tasrif Award 1999.</p>\n\n<p><strong>Pendidikan</strong><br />\n1. Kimia, Universitas Pendidikan Indonesia (UPI) Bandung<br />\n2. Kursus selama tiga bulan tentang kepemimpinan LSM di El Taller, Tunisa(1989)</p>\n\n<p><strong>Penghargaan</strong><br />\n1. Suardi Tasrif Award 1999<br />\n2. Alumni Berprestasi IKIP Bandung 2000<br />\n3. Penghargaan Ramon Magsaysay, 2005</p>\n\n<p><strong>Karir di Pemerintahan</strong><br />\n1. Menteri Koperasi dan UMKM RI Periode 2019 - 2024<br />\n2. Koordinator Staf Khusus Presiden (2018-2019)<br />\n3. Kepala Staf Presiden (2015-2018)<br />\n4. Staf Khusus Menseskab 2014-2015<br />\n5. Ketua Dewan Pengawas Badan Urusan Logistik (Bulog) (2018-Marer 2019)<br />\n6. Komisioner Ombudsman RI pada periode pertama</p>\n\n<p><strong>Pengalaman Kerja Lain</strong><br />\n1. Sekjen Transpransi Internasional Indonesia (TII)<br />\n2. Koordinator &nbsp;Indonesia Corruption Watch (ICW)<br />\n3. Kepala Divisi Perburuhan Yayasan Lembaga Bantuan Hukum Indonesia (YLBHI)<br />\n4. Institut Studi dan Informasi Hak Asasi Manusia (1978-1989</p>\n\n<p><strong>Moto</strong><br />\nJadilah manusia biasa yang bisa berbuat hal &ndash; hal yang luar biasa</p>\n\n<p><strong>Hobi</strong><br />\n1. Memelihara dan mengembang-biakan hewan ( Domba, ayam, burung, ikan,dll )<br />\n2. Bernyanyi dan main gitar<br />\n3. Memanggang (roasting) kopi</p>\n\n<p><strong>Makanan Favorit</strong><br />\n1. Nasi goreng &amp; sop kambing<br />\n2. Ikan bandeng<br />\n3. Ayam goreng kampung<br />\n4. Lalap &ndash; lalapan / Sayuran mentah<br />\n5. Buah &ndash; buahan ( alpukat, pisang, durian, dll )</p>\n','',1,'2019-10-30 03:38:21'),(37,25,'','<img alt=\"\" src=\"http://adityarama-dc.com/kemenkop/uploads/konten/struktur%20org%20kemenkop.png\" style=\"width:100%\" />\n','',1,'2019-09-25 05:57:49'),(38,28,'','','http://umkm.depkop.go.id',1,'2019-10-02 08:17:02'),(40,12,'gambar_20191004021018.png','','',1,'2019-10-04 02:10:18'),(41,12,'gambar_20191004021026.png','','',1,'2019-10-04 02:10:26'),(42,12,'gambar_20191004021034.png','','',1,'2019-10-04 02:10:34'),(43,12,'gambar_20191004021040.png','','',1,'2019-10-04 02:10:40'),(44,12,'gambar_20191004021047.png','','',1,'2019-10-04 02:10:47'),(45,12,'gambar_20191004021058.png','','',1,'2019-10-04 02:10:58'),(46,12,'gambar_20191004021105.png','','',1,'2019-10-04 02:11:05'),(47,12,'gambar_20191004021112.png','','',1,'2019-10-04 02:11:12'),(48,12,'gambar_20191004021120.png','','',1,'2019-10-04 02:11:20'),(49,12,'gambar_20191004021129.png','','',1,'2019-10-04 02:11:29'),(50,13,'gambar_20191004021152.png','','',1,'2019-10-04 02:11:52'),(51,13,'gambar_20191004021157.png','','',1,'2019-10-04 02:11:57'),(52,13,'gambar_20191004021202.png','','',1,'2019-10-04 02:12:02'),(53,13,'gambar_20191004021208.png','','',1,'2019-10-04 02:12:08'),(54,13,'gambar_20191004021214.png','','',1,'2019-10-04 02:12:14'),(55,18,'gambar_20191009025620.jpg','','',1,'2019-10-09 02:56:20'),(56,19,'gambar_20191010050929.jpeg','','',1,'2019-10-10 05:09:29'),(57,20,'gambar_20191010024134.jpeg','','',1,'2019-10-10 02:41:34'),(58,21,'gambar_20191010040947.jpg','','',1,'2019-10-10 04:09:47'),(59,22,'gambar_20191010041457.jpg','','',1,'2019-10-10 04:14:57'),(60,22,'gambar_20191010041521.jpg','','',1,'2019-10-10 04:15:21'),(61,22,'gambar_20191010041545.jpg','','',1,'2019-10-10 04:15:45'),(62,22,'gambar_20191010041613.jpg','','',1,'2019-10-10 04:16:13'),(63,22,'gambar_20191010041632.jpg','','',1,'2019-10-10 04:16:32'),(64,23,'gambar_20191010065211.jpeg','','',1,'2019-10-10 06:52:11'),(65,23,'gambar_20191010041934.jpg','','',1,'2019-10-10 04:19:34'),(66,23,'gambar_20191010041948.jpg','','',1,'2019-10-10 04:19:48'),(67,23,'gambar_20191010042005.jpg','','',1,'2019-10-10 04:20:05'),(71,24,'gambar_20191010042043.jpg','','',1,'2019-10-10 04:20:43'),(72,24,'gambar_20191010042417.jpg','','',1,'2019-10-10 04:24:17'),(73,24,'gambar_20191010042433.jpg','','',1,'2019-10-10 04:24:33'),(74,24,'gambar_20191009032532.jpg','','',1,'2019-10-09 03:25:32'),(75,32,'gambar_20191010042513.jpg','','',1,'2019-10-10 04:25:13'),(76,33,'gambar_20191009034802.jpg','','',1,'2019-10-09 03:48:02'),(77,34,'gambar_20191010042557.jpg','','',1,'2019-10-10 04:25:57'),(78,30,'gambar_20191031072631.png','','',1,'2019-10-31 07:26:31');
/*!40000 ALTER TABLE `tr_konten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_masukan`
--

DROP TABLE IF EXISTS `tr_masukan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_masukan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `masukan` varchar(255) DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_masukan`
--

LOCK TABLES `tr_masukan` WRITE;
/*!40000 ALTER TABLE `tr_masukan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_masukan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_menu`
--

DROP TABLE IF EXISTS `tr_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_parent` int DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_menu`
--

LOCK TABLES `tr_menu` WRITE;
/*!40000 ALTER TABLE `tr_menu` DISABLE KEYS */;
INSERT INTO `tr_menu` VALUES (1,0,'Sekretariat',NULL,1,'2019-07-31 16:06:18'),(2,0,'Bidang Pembiayaan',NULL,1,'2019-08-09 15:10:28'),(3,0,'Produksi dan Pemasaran',NULL,1,'2019-07-31 16:06:18'),(4,0,'Restrukturisasi Usaha',NULL,1,'2019-07-31 16:06:18'),(5,0,'Bidang SDM',NULL,1,'2019-07-31 16:06:18'),(6,0,'Bidang Pengawasan',NULL,1,'2019-09-12 08:37:19'),(7,0,'Bidang Kelembagaan',NULL,1,'2019-07-31 16:06:18'),(8,0,'BLU',NULL,1,'2019-07-31 16:06:18'),(9,0,'Lain-Lain',NULL,1,'2019-07-31 16:06:18'),(10,2,'Tata Cara Memperoleh KUR','Konten',1,'2019-07-31 16:06:18'),(11,2,'Tata Cara Memperoleh Bantuan Pemerintah Bagi Wirausaha Pemula (WP)','Konten',1,'2019-07-31 16:06:18'),(12,3,'Tata Cara Pendaftaran HAKI','Konten',1,'2019-07-31 16:13:32'),(13,3,'Revitalisasi Pasar','Konten',1,'2019-07-31 16:13:32'),(14,4,'Prosedur Penerbitan IUMK','Konten',1,'2019-07-31 16:13:32'),(15,4,'Tentang PLUT KUMKM','Konten',1,'2019-07-31 16:13:32'),(16,5,'LAMIKRO','Konten',1,'2019-07-31 16:13:32'),(17,5,'Mekanisme Permohonan Pelatihan','Konten',1,'2019-07-31 16:13:32'),(18,7,'Narasi Deputi','Konten',1,'2019-07-31 16:13:32'),(19,7,'Penggabungan Koperasi','Konten',1,'2019-07-31 16:13:32'),(20,7,'Koperasi Simpan Pinjam (KSP)','Konten',1,'2019-07-31 16:13:32'),(21,7,'Spin Off Koperasi','Konten',1,'2019-07-31 16:13:32'),(22,7,'NIK (Nomor Induk Koperasi)','Konten',1,'2019-07-31 16:13:32'),(23,7,'PPKL','Konten',1,'2019-07-31 16:13:32'),(24,7,'Cara Pendirian Koperasi','Konten',1,'2019-07-31 16:13:32'),(25,1,'Struktur Organisasi','KontenWebView',1,'2019-09-25 03:18:03'),(26,1,'ODS Koperasi','KontenWebView',1,'2019-09-25 03:18:12'),(27,9,'Sejarah Kementrian','KontenWebView',1,'2019-09-25 03:19:45'),(28,1,'ODS UMKM','KontenWebView',1,'2019-09-25 03:19:56'),(29,9,'Profil Menteri','KontenWebView',1,'2019-09-25 03:20:09'),(30,9,'Daftar Menteri','Konten',1,'2019-09-25 03:20:19'),(31,9,'Visi & Misi','KontenWebView',1,'2019-09-25 03:20:34'),(32,8,'Alur Pinjaman','Konten',1,'2019-10-09 03:46:45'),(33,8,'Pengajuan Pinjaman','Konten',1,'2019-10-09 03:46:53'),(34,8,'Pemberian Pinjaman','Konten',1,'2019-10-09 03:47:04');
/*!40000 ALTER TABLE `tr_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_pengumuman`
--

DROP TABLE IF EXISTS `tr_pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_pengumuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` text,
  `isi` text,
  `status` int NOT NULL DEFAULT '0',
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_pengumuman`
--

LOCK TABLES `tr_pengumuman` WRITE;
/*!40000 ALTER TABLE `tr_pengumuman` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_slide`
--

DROP TABLE IF EXISTS `tr_slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_slide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `font_size` int DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_slide`
--

LOCK TABLES `tr_slide` WRITE;
/*!40000 ALTER TABLE `tr_slide` DISABLE KEYS */;
INSERT INTO `tr_slide` VALUES (1,'Deputi Bidang Perkoperasian KemenKopUKM memberikan penghargaan bagi Anggota Koperasi Teladan pada acara Rapat Anggota Tahunan ke 47 Koperasi Simpan Pinjam Jasa di Pekalongan','tvwall20210327101246.jpg',1,'tvwall',NULL,1,'2021-04-18 07:53:37'),(3,'Penandatanganan Nota Kesepahaman Bersama (MoU) Antara Kementerian Koperasi dan UKM dengan Badan Pengelola Masjid Istiqlal (BPMI)','tvwall20210327101333.jpg',1,'tvwall',NULL,1,'2021-04-07 20:30:25');
/*!40000 ALTER TABLE `tr_slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_text_berjalan`
--

DROP TABLE IF EXISTS `tr_text_berjalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_text_berjalan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text_berjalan` text,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_text_berjalan`
--

LOCK TABLES `tr_text_berjalan` WRITE;
/*!40000 ALTER TABLE `tr_text_berjalan` DISABLE KEYS */;
INSERT INTO `tr_text_berjalan` VALUES (1,'Membantu Presiden dalam merumuskan kebijakan dan koordinasi kebijakan di bidang Koperasi dan Usaha Kecil dan Menengah.',1,'2019-10-02 13:31:42'),(2,'Untuk meningkatkan pemasaran kopi di kancah domestik dan internasional, Lembaga Layanan Pemasaran Koperasi Usaha Kecil dan Menengah (LLP-KUKM)',1,'2019-10-02 13:32:19');
/*!40000 ALTER TABLE `tr_text_berjalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_video`
--

DROP TABLE IF EXISTS `tr_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tr_video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `log_user` int DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_video`
--

LOCK TABLES `tr_video` WRITE;
/*!40000 ALTER TABLE `tr_video` DISABLE KEYS */;
INSERT INTO `tr_video` VALUES (2,'20210405094030.mp4','mp4',1,1,'2021-04-05 19:41:53'),(3,'20210414094030.mp4','mp4',1,1,'2021-04-14 06:37:16');
/*!40000 ALTER TABLE `tr_video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-29 14:23:13
