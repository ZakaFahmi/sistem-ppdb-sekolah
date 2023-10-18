-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2019 at 10:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penr9442_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(9) NOT NULL COMMENT 'Tahun Akademik',
  `semester` enum('odd','even') NOT NULL DEFAULT 'odd' COMMENT 'odd = Ganjil, even = Genap',
  `is_active` enum('true','false') NOT NULL DEFAULT 'false',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `academic_year`, `semester`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, '2019-2020', 'odd', 'true', '2018-06-22 11:27:19', '2019-03-27 04:20:29', NULL, NULL, 1, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `type` bigint(20) NOT NULL DEFAULT '0',
  `level` smallint(6) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL DEFAULT '0000',
  `organizer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `quote_by` varchar(255) DEFAULT NULL,
  `tanggal` varchar(2) DEFAULT NULL,
  `bulan` varchar(3) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `waktu` varchar(18) DEFAULT NULL,
  `tempat` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `quote`, `quote_by`, `tanggal`, `bulan`, `tahun`, `waktu`, `tempat`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Mulai tanggal 1 April 2019 SMK Media Utama akan mengadakan UKK.', 'Ujian Kompetensi Kejuruan (UKK)', '1', 'Apr', '2019', '07:00 - 16:00 WIB', 'Sekolah', '2018-06-21 22:57:27', '2019-04-24 15:50:18', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(2, 'Tanggal 4-9 April 2019 Media Utama akan melaksanakan MID Semester untuk kelas X & XI', 'MID Semester', '1', 'Apr', '2019', '07:15 - 16:00 WIB', 'Sekolah', '2018-06-21 22:58:05', '2019-04-24 15:50:28', NULL, NULL, 1, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_title` varchar(255) NOT NULL,
  `album_description` varchar(255) DEFAULT NULL,
  `album_slug` varchar(255) DEFAULT NULL,
  `album_cover` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_title`, `album_description`, `album_slug`, `album_cover`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Paskibra', 'SMK Media Utama  memiliki anggota Paskibra', 'paskibra', 'dd2c40322c3c0505c1d3ea56459c9406.JPG', '2019-03-27 05:25:29', '2019-04-24 16:00:03', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(2, 'Pramuka SMK Media Utama', 'Ekskul Pramuka dengan segudang kegiatan bermanfaat', 'pramuka-smk-media-utama', NULL, '2019-03-27 05:29:17', '2019-04-24 15:52:55', '2019-03-27 06:36:14', NULL, 7, 7, 7, NULL, 'true'),
(5, 'Pramuka', 'Berbagai kegiatan Pramuka di SMK Media Utama', 'pramuka', 'e4896b7a06f1388be7b66c63dd7ec595.JPG', '2019-03-27 06:37:05', '2019-04-24 15:53:05', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(6, 'Drum Band', 'Kegiatan Drum Band SMK Media Utama', 'drum-band', 'ae5f80d1c7a516eaef53c20b3ecbe6e0.JPG', '2019-03-27 07:54:02', '2019-04-24 15:59:57', NULL, NULL, 7, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) DEFAULT '0',
  `answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('_blank','_self','_parent','_top') DEFAULT '_blank',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `url`, `target`, `image`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Alfamidi', 'https://alfamidiku.com/', '_blank', '6da411a1e137b0a8a86ad4b99ebd4123.jpg', '2018-04-02 01:52:02', '2019-03-27 05:02:21', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(2, 'Mediacomi', 'http://www.mediacomi.com/', '_blank', '017a9e97906122fce875354b56060393.jpg', '2018-04-02 01:52:02', '2019-04-24 16:13:37', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(3, 'Alfa Scorpii', 'https://www.alfascorpii.co.id/', '_blank', 'd2afd92a3341abc095962b88ef3ced33.jpg', '2018-06-22 01:54:12', '2019-03-27 05:08:53', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(6, 'Extend Indonesia', 'http://www.xtendindonesia.co.id/', '_blank', '6be25d6a9eed2ec0875fda90e81f6875.jpg', '2018-06-22 01:54:45', '2019-03-27 05:11:13', NULL, NULL, 1, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_nilai`
--

CREATE TABLE `cbt_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `XNomerUjian` varchar(20) CHARACTER SET latin1 NOT NULL,
  `XNik` varchar(20) CHARACTER SET latin1 NOT NULL,
  `XKodeUjian` varchar(10) CHARACTER SET latin1 NOT NULL,
  `XTokenUjian` varchar(5) CHARACTER SET latin1 NOT NULL,
  `XTgl` date NOT NULL,
  `XJumSoal` int(11) NOT NULL,
  `XBenar` int(11) NOT NULL,
  `XSalah` int(11) NOT NULL,
  `XNilai` int(11) NOT NULL,
  `XPersenPil` float NOT NULL,
  `XPersenEsai` float NOT NULL,
  `XEsai` float NOT NULL,
  `XTotalNilai` float NOT NULL,
  `XKodeMapel` varchar(10) CHARACTER SET latin1 NOT NULL,
  `XKodeKelas` varchar(10) CHARACTER SET latin1 NOT NULL,
  `XKodeSoal` varchar(50) CHARACTER SET latin1 NOT NULL,
  `XSetId` varchar(10) CHARACTER SET latin1 NOT NULL,
  `XSemester` int(11) NOT NULL,
  `XNamaKelas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `XPilGanda` int(11) NOT NULL,
  `XStatus` enum('0','1','9') CHARACTER SET latin1 NOT NULL,
  `type` bigint(20) NOT NULL DEFAULT '0',
  `level` smallint(6) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL DEFAULT '0000',
  `organizer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cbt_nilai`
--

INSERT INTO `cbt_nilai` (`id`, `XNomerUjian`, `XNik`, `XKodeUjian`, `XTokenUjian`, `XTgl`, `XJumSoal`, `XBenar`, `XSalah`, `XNilai`, `XPersenPil`, `XPersenEsai`, `XEsai`, `XTotalNilai`, `XKodeMapel`, `XKodeKelas`, `XKodeSoal`, `XSetId`, `XSemester`, `XNamaKelas`, `XPilGanda`, `XStatus`, `type`, `level`, `year`, `organizer`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, '12345', 'yes', 'UH', '123', '0000-00-00', 50, 0, 0, 0, 0, 0, 0, 100, 'Fisika', '', '', '2017/2018', 1, 'X MIA 1', 0, '0', 1, 1, 0000, 'Pemerintah', '2018-06-30 23:02:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '12345', 'nama prestasi', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, '', 0, '0', 1, 1, 2018, 'Penyelenggara', '2018-06-30 23:07:01', NULL, NULL, NULL, 2, NULL, NULL, NULL, 'false'),
(3, '12345', '123', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, '', 0, '0', 3, 3, 2018, 'test', '2018-07-01 00:40:21', NULL, NULL, NULL, 2, NULL, NULL, NULL, 'false'),
(4, '12345', 'NIK', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, '', 0, '0', 1, 1, 2018, 'Pemerintah', '2018-07-01 00:46:37', NULL, NULL, NULL, 2, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `class_groups`
--

CREATE TABLE `class_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(100) DEFAULT NULL,
  `sub_class` varchar(100) DEFAULT NULL,
  `major_id` bigint(20) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_groups`
--

INSERT INTO `class_groups` (`id`, `class`, `sub_class`, `major_id`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'X', '', 2, '2019-04-03 07:50:02', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `class_group_settings`
--

CREATE TABLE `class_group_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) NOT NULL DEFAULT '0',
  `class_group_id` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Kelas',
  `student_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_post_id` bigint(20) NOT NULL DEFAULT '0',
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_url` varchar(255) DEFAULT NULL,
  `comment_ip` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_subject` varchar(255) DEFAULT NULL,
  `comment_reply` text,
  `comment_status` enum('approved','unapproved','spam') DEFAULT 'approved',
  `comment_agent` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `comment_type` enum('post','message') DEFAULT 'post',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_letter_number` varchar(255) DEFAULT NULL COMMENT 'Nomor Surat Tugas',
  `assignment_letter_date` date DEFAULT NULL COMMENT 'Tanggal Surat Tugas',
  `assignment_start_date` date DEFAULT NULL COMMENT 'TMT Tugas',
  `parent_school_status` enum('true','false') NOT NULL DEFAULT 'true' COMMENT 'Status Sekolah Induk',
  `full_name` varchar(150) NOT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `nik` varchar(50) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL COMMENT 'Alamat Jalan',
  `rt` varchar(10) DEFAULT NULL COMMENT 'Rukun Tetangga',
  `rw` varchar(10) DEFAULT NULL COMMENT 'Rukun Warga',
  `sub_village` varchar(255) DEFAULT NULL COMMENT 'Nama Dusun',
  `village` varchar(255) DEFAULT NULL COMMENT 'Nama Kelurahan/ Desa',
  `sub_district` varchar(255) DEFAULT NULL COMMENT 'Kecamatan',
  `district` varchar(255) DEFAULT NULL COMMENT 'Kabupaten',
  `postal_code` varchar(20) DEFAULT NULL COMMENT 'Kode POS',
  `religion` bigint(20) NOT NULL DEFAULT '0',
  `marital_status` bigint(20) NOT NULL DEFAULT '0',
  `spouse_name` varchar(255) DEFAULT NULL COMMENT 'Nama Pasangan : Suami / Istri',
  `spouse_employment` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Pekerjaan Pasangan : Suami / Istri',
  `citizenship` enum('WNI','WNA') NOT NULL DEFAULT 'WNI' COMMENT 'Kewarganegaraan',
  `country` varchar(255) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `employment_status` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Status Kepegawaian',
  `nip` varchar(100) DEFAULT NULL,
  `niy` varchar(100) DEFAULT NULL COMMENT 'NIY/NIGK',
  `nuptk` varchar(100) DEFAULT NULL,
  `employment_type` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Jenis Guru dan Tenaga Kependidikan (GTK)',
  `decree_appointment` varchar(255) DEFAULT NULL COMMENT 'SK Pengangkatan',
  `appointment_start_date` date DEFAULT NULL COMMENT 'TMT Pengangkatan',
  `institutions_lifter` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Lembaga Pengangkat',
  `decree_cpns` varchar(100) DEFAULT NULL COMMENT 'SK CPNS',
  `pns_start_date` date DEFAULT NULL COMMENT 'TMT CPNS',
  `rank` bigint(20) DEFAULT '0' COMMENT 'Pangkat / Golongan',
  `salary_source` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Sumber Gaji',
  `headmaster_license` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Punya Lisensi Kepala Sekolah ?',
  `skills_laboratory` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Keahlian Lab oratorium',
  `handle_special_needs` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Mampu Menangani Kebutuhan Khusus',
  `braille_skills` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Keahlian Braile ?',
  `sign_language_skills` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Keahlian Bahasa Isyarat ?',
  `phone` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_title` varchar(255) DEFAULT NULL,
  `file_description` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_category_id` bigint(20) NOT NULL DEFAULT '0',
  `file_path` varchar(255) DEFAULT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_visibility` enum('public','private') DEFAULT 'public',
  `file_counter` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `file_categories`
--

CREATE TABLE `file_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_categories`
--

INSERT INTO `file_categories` (`id`, `category`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Berita', 'berita', 'Uncategorized', '2018-04-02 01:52:00', '2019-04-03 07:53:03', NULL, NULL, NULL, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `headmaster`
--

CREATE TABLE `headmaster` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) NOT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `headmaster`
--

INSERT INTO `headmaster` (`id`, `caption`, `deskripsi`, `email`, `facebook`, `instagram`, `twitter`, `image`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Kepala Sekolah', 'Drs. H. Syafrizal S.Pd', 'rizalsyafriza8@gmail.com', 'https://www.facebook.com/drs', '', '', 'a9bcf25187ca617bbf95949e9b6ac775.jpg', '2018-06-22 07:14:33', '2019-04-24 16:00:47', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(2, 'Wakil Bidang Kurikulum', 'Dra. Nurminta Ginting, M.Pd.T', 'nurminta.gintin@gmail.com', 'https://www.facebook.com/nurm', '', '', '3d96273d44bab529de2ed57f96e39c24.jpg', '2018-06-22 07:51:36', '2019-04-24 16:00:57', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(3, 'Wakil Bidang Sapras', 'Sofyan Zuhri Nasution, ST', 'ccc@gmail.com', 'https://www.facebook.com/sofya', '', '', '00364a8fde97fa53c611ee89bbfadcaa.jpg', '2019-03-27 04:04:56', '2019-04-24 16:01:19', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(4, 'Wakil Bidang Kesiswaan', 'Milyh Effendy, S.Pd', 'milyhp@gmail.com', 'https://www.facebook.com/mil', '', '', 'd2143c48ccefa9d4d9e2fc4468b38a6a.jpg', '2019-03-27 04:08:01', '2019-04-24 16:01:27', NULL, NULL, 7, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `image_sliders`
--

CREATE TABLE `image_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) NOT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_sliders`
--

INSERT INTO `image_sliders` (`id`, `caption`, `deskripsi`, `image`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'SMK MEDIA UTAMA', 'Selamat Datang di SMK Putra Anda. SMK Putra Anda adalah SMK yang letaknya di Kota Binjai di Jl. W.R Mongonsidi No 22 Binjai. <br>SMK Putra Anda adalah sekolah dengan siswa terbanyak di Kota Binjai dan juga dengan Segudang Pre', 'd667f21588bdb63228b4921d00addb45.jpg', '2018-04-02 01:52:03', '2019-04-24 15:51:06', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(2, 'SMK Media Utama Berkarakter', 'SMK Media Utama sejak tahun 2014 sudah menerapkan Kurikulum 2013', 'e56aab4be79c7f573a380a1cd9563118.jpg', '2018-04-02 01:52:03', '2019-04-24 15:51:25', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(3, 'SMK Media Utama Jumlah Siswa Terbanyak', 'SMK Media Utama  setiap tahun menerima siswa/i baru setidaknya 600 siswa. Dan telah menamatkan 1 Juta lebih siswa sejak berdiri tahun 1994', '784de94ee58d7e254a0450fd5934fab8.jpg', '2018-06-22 02:07:20', '2019-04-24 15:51:57', NULL, NULL, 1, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('_blank','_self','_parent','_top') DEFAULT '_blank',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `target`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'UNBK - Kementerian Pendidikan dan Kebudayaan', 'https://unbk.kemdikbud.go.id/', '_blank', '2018-04-02 01:52:02', '2019-03-27 03:51:10', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(2, 'Direktorat Pembinaan SMK', 'https://psmk.kemdikbud.go.id/', '_blank', '2018-06-22 03:08:52', '2019-03-27 03:51:42', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(3, 'Cari NISN - Nomer Induk Siswa Nasional (NISN)', 'http://nisn.data.kemdikbud.go.id/page/data', '_blank', '2019-03-27 03:52:59', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `counter` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `datetime` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `counter`, `datetime`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, '125.165.49.94', 3, '2019-03-26 23:21:19', '2019-03-26 16:20:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(2, '180.251.57.77', 1, '2019-04-03 14:40:43', '2019-04-03 07:40:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, '180.251.54.79', 1, '2019-04-07 22:28:14', '2019-04-07 15:28:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, '125.162.11.195', 1, '2019-04-24 22:58:32', '2019-04-24 15:58:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major` varchar(255) DEFAULT NULL COMMENT 'Program Keahlian / Jurusan',
  `short_name` varchar(255) DEFAULT NULL COMMENT 'Nama Singkat',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `major`, `short_name`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Teknik Komputer & Jaringan', 'TKJ', '2019-03-27 03:10:47', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(2, 'Rekayasa Perangkat Lunak', 'RPL', '2019-03-27 03:11:18', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(3, 'Tata Boga', 'JB', '2019-03-27 04:22:11', '2019-03-27 04:22:57', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(4, 'Tata Busana', 'TB', '2019-03-27 04:22:36', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(5, 'Bisnis Daring & Pemasaran', 'BDP', '2019-03-27 04:23:26', '2019-03-27 04:23:46', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(6, 'Otomatisasi & Tata Kelola Perkantoran', 'OTKP', '2019-03-27 04:24:23', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(7, 'Akuntansi & Keuangan Lembaga', 'AK', '2019-03-27 04:24:51', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(8, 'Bisnis Konstruksi & Properti', 'BKP', '2019-03-27 04:26:14', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(9, 'Teknik Instalasi Tenaga Listrik', 'TITL', '2019-03-27 04:27:16', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(10, 'Teknik Kendaraan Ringan Otomotif', 'TKRO', '2019-03-27 04:27:54', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(11, 'Teknik & Bisnis Sepeda Motor', 'TBSM', '2019-03-27 04:30:40', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(12, 'Teknik Body Otomotif', 'TBO', '2019-03-27 04:31:37', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(13, 'Teknik Audio Video', 'TAV', '2019-03-27 04:32:55', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(14, 'Teknik Pemesinan', 'TP', '2019-03-27 04:33:27', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_title` varchar(150) NOT NULL,
  `menu_url` varchar(150) NOT NULL,
  `menu_target` enum('_blank','_self','_parent','_top') DEFAULT '_self',
  `menu_type` varchar(100) NOT NULL DEFAULT 'pages',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `position` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_title`, `menu_url`, `menu_target`, `menu_type`, `parent_id`, `position`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Hubungi Kami', 'hubungi-kami', '', 'modules', 0, 6, '2018-04-01 18:52:04', '2018-07-11 12:05:56', '2018-07-11 11:52:38', '2018-07-11 12:05:56', NULL, 1, 1, 1, 'false'),
(2, 'Gallery Photo', 'gallery-photo', '_self', 'modules', 9, 1, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, 'Gallery Video', 'gallery-video', '_self', 'modules', 9, 2, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, 'Formulir PPDB', 'formulir-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 1, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(5, 'Hasil Seleksi', 'hasil-seleksi-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 2, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(6, 'Cetak Formulir', 'cetak-formulir-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 3, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(7, 'Download Formulir', 'download-formulir-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 4, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(8, 'PPDB 2019', '#', '', 'links', 0, 4, '2018-04-01 18:52:04', '2019-04-03 08:04:03', NULL, '2019-04-03 08:04:03', NULL, 7, NULL, 7, 'false'),
(9, 'Gallery', '#', '_self', 'links', 0, 5, '2018-04-01 18:52:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(10, 'Berita', '#', '', 'links', 0, 3, '2018-04-01 18:52:04', '2018-06-22 22:18:48', NULL, '2018-06-22 22:18:48', NULL, 1, NULL, 1, 'false'),
(12, 'Direktori Peserta Didik', 'student-directory', '_self', 'modules', 16, 1, '2018-07-11 11:43:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(13, 'Direktori Guru dan Tenaga Kependidikan', 'employee-directory', '_self', 'modules', 16, 2, '2018-07-11 11:43:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(14, 'Direktori Alumni', 'alumni-directory', '_self', 'modules', 16, 3, '2018-07-11 11:43:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(16, 'Kesiswaan', '#', '_parent', 'links', 0, 2, '2018-07-11 11:43:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(17, 'Jurusan', '#', '_top', 'links', 0, 1, '2019-04-03 08:23:54', '2019-04-03 09:16:01', NULL, '2019-04-03 09:16:01', NULL, 7, NULL, 7, 'false'),
(24, 'Teknik Komputer & Jaringan', 'read/14/tkj', '', 'pages', 17, 1, '2019-04-03 09:28:07', '2019-04-03 09:45:23', NULL, '2019-04-03 09:45:23', NULL, 7, NULL, 7, 'false'),
(25, 'Rekayasa Perangkat Lunak', 'read/15/rekayasa-perangkat-lunak', '_self', 'pages', 17, 2, '2019-04-03 09:55:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(26, 'Tata Boga', 'read/16/tata-boga', '_self', 'pages', 17, 3, '2019-04-03 10:16:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(27, 'Tata Busana', 'read/17/tata-busana', '_self', 'pages', 17, 4, '2019-04-03 10:26:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(28, 'Bisnis Daring & Pemasaran', 'read/18/bisnis-daring--pemasaran', '_self', 'pages', 17, 5, '2019-04-03 10:49:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(29, 'Otomatisasi & Tata Kelola Perkantoran', 'read/19/otomatisasi--tata-kelola-perkantoran', '_self', 'pages', 17, 6, '2019-04-03 10:49:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(30, 'Akuntasi & Keuangan Lembaga', 'read/20/akuntasi--keuangan-lembaga', '_self', 'pages', 17, 7, '2019-04-03 10:49:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(31, 'Bisnis Konstruksi & Properti', 'read/21/bisnis-konstruksi--properti', '_self', 'pages', 17, 8, '2019-04-03 10:49:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(32, 'Teknik Instalasi Tenaga Listrik', 'read/22/teknik-instalasi-tenaga-listrik', '_self', 'pages', 17, 9, '2019-04-03 10:49:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(33, 'Teknik Kendaraan Ringan Otomotif', 'read/23/teknik-kendaraan-ringan-otomotif', '_self', 'pages', 17, 10, '2019-04-03 10:49:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(34, 'Kegiatan Sekolah', 'category/kegiatan-sekolah', '_self', 'post_categories', 10, 1, '2019-04-24 14:59:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(36, 'Berita', 'category/berita', '_self', 'post_categories', 10, 3, '2019-04-24 15:00:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(37, 'Dunia SMK', 'category/dunia-smk', '_self', 'post_categories', 10, 2, '2019-04-24 15:00:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_description` varchar(255) DEFAULT NULL,
  `module_url` varchar(255) DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'true',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_description`, `module_url`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Pengguna', 'Pengguna', 'acl', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(2, 'PPDB / PMB', 'PPDB / PMB', 'admission', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, 'Tampilan', 'Tampilan', 'appearance', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, 'Blog', 'Blog', 'blog', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(5, 'GTK / Staff / Guru', 'GTK / Staff / Guru', 'employees', 'true', '2018-04-02 01:51:57', '2019-04-03 08:05:53', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(6, 'Media', 'Media', 'media', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(7, 'Plugins', 'Plugins', 'plugins', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(8, 'Data Referensi', 'Data Referensi', 'reference', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(9, 'Pengaturan', 'Pengaturan', 'settings', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(10, 'Peserta Didik / Mahasiswa', 'Peserta Didik / Mahasiswa', 'students', 'true', '2018-04-02 01:51:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(100) NOT NULL,
  `option` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `group`, `option`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'student_status', 'Aktif', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(2, 'student_status', 'Lulus', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, 'student_status', 'Mutasi', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, 'student_status', 'Dikeluarkan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(5, 'student_status', 'Mengundurkan Diri', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(6, 'student_status', 'Putus Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(7, 'student_status', 'Meninggal', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(8, 'student_status', 'Hilang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(9, 'student_status', 'Lainnya', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(10, 'employment', 'Tidak bekerja', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(11, 'employment', 'Nelayan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(12, 'employment', 'Petani', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(13, 'employment', 'Peternak', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(14, 'employment', 'PNS/TNI/POLRI', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(15, 'employment', 'Karyawan Swasta', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(16, 'employment', 'Pedagang Kecil', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(17, 'employment', 'Pedagang Besar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(18, 'employment', 'Wiraswasta', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(19, 'employment', 'Wirausaha', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(20, 'employment', 'Buruh', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(21, 'employment', 'Pensiunan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(22, 'employment', 'Lain-lain', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(23, 'special_needs', 'Tidak', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(24, 'special_needs', 'Tuna Netra', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(25, 'special_needs', 'Tuna Rungu', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(26, 'special_needs', 'Tuna Grahita ringan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(27, 'special_needs', 'Tuna Grahita Sedang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(28, 'special_needs', 'Tuna Daksa Ringan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(29, 'special_needs', 'Tuna Daksa Sedang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(30, 'special_needs', 'Tuna Laras', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(31, 'special_needs', 'Tuna Wicara', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(32, 'special_needs', 'Tuna ganda', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(33, 'special_needs', 'Hiper aktif', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(34, 'special_needs', 'Cerdas Istimewa', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(35, 'special_needs', 'Bakat Istimewa', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(36, 'special_needs', 'Kesulitan Belajar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(37, 'special_needs', 'Narkoba', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(38, 'special_needs', 'Indigo', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(39, 'special_needs', 'Down Sindrome', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(40, 'special_needs', 'Autis', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(41, 'special_needs', 'Lainnya', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(42, 'education', 'Tidak sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(43, 'education', 'Putus SD', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(44, 'education', 'SD Sederajat', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(45, 'education', 'SMP Sederajat', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(46, 'education', 'SMA Sederajat', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(47, 'education', 'D1', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(48, 'education', 'D2', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(49, 'education', 'D3', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(50, 'education', 'D4/S1', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(51, 'education', 'S2', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(52, 'education', 'S3', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(53, 'scholarship', 'Anak berprestasi', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(54, 'scholarship', 'Anak Miskin', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(55, 'scholarship', 'Pendidikan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(56, 'scholarship', 'Unggulan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(57, 'scholarship', 'Lain-lain', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(58, 'achievement_type', 'Sains', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(59, 'achievement_type', 'Seni', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(60, 'achievement_type', 'Olahraga', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(61, 'achievement_type', 'Lain-lain', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(62, 'achievement_level', 'Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(63, 'achievement_level', 'Kecamatan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(64, 'achievement_level', 'Kabupaten', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(65, 'achievement_level', 'Provinsi', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(66, 'achievement_level', 'Nasional', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(67, 'achievement_level', 'Internasional', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(68, 'monthly_income', 'Kurang dari 500,000', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(69, 'monthly_income', '500.000 - 999.9999', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(70, 'monthly_income', '1 Juta - 1.999.999', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(71, 'monthly_income', '2 Juta - 4.999.999', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(72, 'monthly_income', '5 Juta - 20 Juta', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(73, 'monthly_income', 'Lebih dari 20 Juta', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(74, 'residence', 'Bersama orang tua', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(75, 'residence', 'Wali', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(76, 'residence', 'Kos', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(77, 'residence', 'Asrama', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(78, 'residence', 'Panti Asuhan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(79, 'residence', 'Lainnya', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(80, 'transportation', 'Jalan kaki', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(81, 'transportation', 'Kendaraan pribadi', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(82, 'transportation', 'Kendaraan Umum / angkot / Pete-pete', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(83, 'transportation', 'Jemputan Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(84, 'transportation', 'Kereta Api', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(85, 'transportation', 'Ojek', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(86, 'transportation', 'Andong / Bendi / Sado / Dokar / Delman / Beca', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(87, 'transportation', 'Perahu penyebrangan / Rakit / Getek', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(88, 'transportation', 'Lainnya', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(89, 'religion', 'Islam', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(90, 'religion', 'kristen / protestan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(91, 'religion', 'Katholik', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(92, 'religion', 'Hindu', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(93, 'religion', 'Budha', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(94, 'religion', 'Khong Hu Chu', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(95, 'religion', 'Lainnya', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(96, 'school_level', '1 - Sekolah Dasar (SD)/ Sederajat', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(97, 'school_level', '2 - Sekolah Menengah Pertama (SMP)/ Sederajat', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(98, 'school_level', '3 - Sekolah Menengah Atas (SMA) / Aliyah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(99, 'school_level', '4 - Sekolah Menengah Kejuruan (SMK)', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(100, 'school_level', '5 - Universitas', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(101, 'school_level', '6 - Sekolah Tinggi', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(102, 'school_level', '7 - Politeknik', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(103, 'marital_status', 'Kawin', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(104, 'marital_status', 'Belum Kawin', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(105, 'marital_status', 'Berpisah', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(106, 'institutions_lifter', 'Pemerintah Pusat', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(107, 'institutions_lifter', 'Pemerintah Provinsi', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(108, 'institutions_lifter', 'Pemerintah Kab/Kota', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(109, 'institutions_lifter', 'Ketua yaysan', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(110, 'institutions_lifter', 'Kepala Sekolah', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(111, 'institutions_lifter', 'Komite Sekolah', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(112, 'institutions_lifter', 'Lainnya', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(113, 'employment_status', 'PNS ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(114, 'employment_status', 'PNS Diperbantukan ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(115, 'employment_status', 'PNS DEPAG ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(116, 'employment_status', 'GTY/PTY ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(117, 'employment_status', 'GTT/PTT Provinsi ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(118, 'employment_status', 'GTT/PTT Kabupaten/Kota', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(119, 'employment_status', 'Guru Bantu Pusat ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(120, 'employment_status', 'Guru Honor Sekolah ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(121, 'employment_status', 'Tenaga Honor Sekolah ', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(122, 'employment_status', 'CPNS', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(123, 'employment_status', 'Lainnya', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(124, 'employment_type', 'Guru Kelas', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(125, 'employment_type', 'Guru Mata Pelajaran', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(126, 'employment_type', 'Guru BK', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(127, 'employment_type', 'Guru Inklusi', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(128, 'employment_type', 'Tenaga Administrasi Sekola', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(129, 'employment_type', 'Gurtu Pendamping', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(130, 'employment_type', 'Guru Magang', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(131, 'employment_type', 'Guru TIK', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(132, 'employment_type', 'Laboran', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(133, 'employment_type', 'Pustakawan', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(134, 'employment_type', 'Lainnya', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(135, 'rank', 'I/A', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(136, 'rank', 'I/B', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(137, 'rank', 'I/C', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(138, 'rank', 'I/D', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(139, 'rank', 'II/A', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(140, 'rank', 'II/B', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(141, 'rank', 'II/C', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(142, 'rank', 'II/D', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(143, 'rank', 'III/A', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(144, 'rank', 'III/B', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(145, 'rank', 'III/C', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(146, 'rank', 'III/D', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(147, 'rank', 'IV/A', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(148, 'rank', 'IV/B', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(149, 'rank', 'IV/C', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(150, 'rank', 'IV/D', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(151, 'rank', 'IV/E', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(152, 'salary_source', 'APBN', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(153, 'salary_source', 'APBD Provinsi', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(154, 'salary_source', 'APBD Kab/Kota', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(155, 'salary_source', 'Yaysan', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(156, 'salary_source', 'Sekolah', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(157, 'salary_source', 'Lembaga Donor', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(158, 'salary_source', 'Lainnya', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(159, 'skills_laboratory', 'Lab IPA', '2018-04-02 01:51:59', NULL, '2019-03-27 04:43:31', NULL, NULL, NULL, 7, NULL, 'true'),
(160, 'skills_laboratory', 'Lab Fisika', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(161, 'skills_laboratory', 'Lab Biologi', '2018-04-02 01:51:59', NULL, '2019-03-27 04:43:31', NULL, NULL, NULL, 7, NULL, 'true'),
(162, 'skills_laboratory', 'Lab Kimia', '2018-04-02 01:51:59', NULL, '2019-03-27 04:43:31', NULL, NULL, NULL, 7, NULL, 'true'),
(163, 'skills_laboratory', 'Lab Bahasa', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(164, 'skills_laboratory', 'Lab Komputer', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(165, 'skills_laboratory', 'Teknik Bangunan', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(166, 'skills_laboratory', 'Teknik Serveai & Pemetaan', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(167, 'skills_laboratory', 'Teknik Ketenagakerjaan', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(168, 'skills_laboratory', 'Teknik Kendaraan Ringan Otomotif', '2018-04-02 01:51:59', '2019-03-27 04:44:16', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(169, 'skills_laboratory', 'Teknik Mesin', '2018-04-02 01:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_album_id` bigint(20) NOT NULL DEFAULT '0',
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_album_id`, `photo_name`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 1, '9c7214236fa38b40482d158bc5ec8ced.JPG', '2019-03-27 05:27:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(2, 2, '4525029aa4abf3eab70e7e35da4f32f2.jpg', '2019-03-27 06:32:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, 2, '8aeed8ffcf191d71f1114d66f61eaaf5.jpg', '2019-03-27 06:33:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, 2, 'a849c74eb91c5559bcf6c873ab1e1a8e.jpg', '2019-03-27 06:33:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(5, 2, 'dc6e886c63151b5d9afb9e15c1a8ef6e.jpg', '2019-03-27 06:34:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(6, 2, '5f6f97e947bf080d0b5893509b2ac1fb.jpg', '2019-03-27 06:35:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(7, 5, 'f4f534a794c0244e867baa10250916e5.jpg', '2019-03-27 06:37:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(8, 5, '5ebeb1a9859c4fa37064f3c198370685.JPG', '2019-03-27 06:38:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(9, 6, 'bf775573481ef7ef4ba3be0fdc9dea1f.JPG', '2019-03-27 07:55:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(10, 1, '5b4047a055e51d249eb29ab81d0bd1bf.JPG', '2019-04-24 15:54:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `pollings`
--

CREATE TABLE `pollings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) DEFAULT '0',
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `post_image` varchar(100) DEFAULT NULL,
  `post_author` bigint(20) DEFAULT '0',
  `post_categories` varchar(255) DEFAULT NULL,
  `post_type` varchar(50) NOT NULL DEFAULT 'post',
  `post_status` enum('publish','draft') DEFAULT 'publish',
  `post_visibility` enum('public','private') DEFAULT 'public',
  `post_comment_status` enum('open','close') DEFAULT 'open',
  `post_slug` varchar(255) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_counter` bigint(20) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_image`, `post_author`, `post_categories`, `post_type`, `post_status`, `post_visibility`, `post_comment_status`, `post_slug`, `post_tags`, `post_counter`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, '', '<p><strong><em>Asalamualikum warahmatullahi wabrakatuh</em></strong></p>\n<p><em>Era globalisasi dengan segala implikasinya menjadi salah satu pemicu cepatnya perubahan yang terjadi pada berbagai aspek kehidupan masyarakat, dan bila tidak ada upaya sungguh-sungguh untuk mengantisipasinya maka hal tersebut akan menjadi maslah yang sangat serius. Dalam hal ini dunia pendidikan mempunyai tanggung jawab yang besar, terutama dalam menyiapkan sumber daya manusia yang tangguh sehingga mampu hidup selaras didalam perubahan itu sendiri.</em></p>\n<p>Pendidikan merupakan investasi jangka panjang yang hasilnya tidak dapat dilihat dan dirasakan secara instan, sehingga sekolah sebagai ujung tombak dilapangan harus memiliki arah pengembangan jangka panjang dengan tahapan pencapaiannya yang jelas dan tetap mengakomodir tuntutan permasalahan faktual&nbsp; yang ada di masyarakat.</p>\n<p>Akhirnya, semoga website ini memberikan manfaat bagi kita sebagai umat manusia.</p>\n<p><em><strong>Wassalamualaikum Wr. Wb.</strong></em></p>', 'headmaster_photo.png', 0, '', 'welcome', 'publish', 'public', 'open', '', '', 0, '2018-04-01 18:52:03', '2019-03-27 03:50:02', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(2, 'Pendidikan Karakter', '<p style=\"text-align: justify;\"><strong>Pendidikan Karakter</strong>&nbsp;merupakan bentuk kegiatan manusia yang di dalamnya terdapat suatu tindakan yang mendidik diperuntukkan bagi generasi selanjutnya.<sup id=\"cite_ref-Kusuma_A_1-0\" class=\"reference\"></sup>&nbsp;Tujuan pendidikan karakter adalah untuk membentuk penyempurnaan diri individu secara terus-menerus dan melatih kemampuan diri demi menuju kearah hidup yang lebih baik</p>', NULL, 1, '1', 'page', 'publish', 'public', 'open', 'pendidikan-karakter', 'berita, pengumuman, sekilas-info', 19, '2018-04-01 18:52:03', '2019-03-27 02:52:25', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(3, 'TENTANG UNBK', '<p>Ujian Nasional Berbasis Komputer (UNBK) disebut juga Computer Based Test (CBT) adalah sistem pelaksanaan ujian nasional dengan menggunakan komputer sebagai media ujiannya. Dalam pelaksanaannya, UNBK berbeda dengan sistem ujian nasional berbasis kertas atau Paper Based Test (PBT) yang selama ini sudah berjalan.<br /><br />Penyelenggaraan UNBK pertama kali dilaksanakan pada tahun 2014 secara online dan terbatas di SMP Indonesia Singapura dan SMP Indonesia Kuala Lumpur (SIKL). Hasil penyelenggaraan UNBK pada kedua sekolah tersebut cukup menggembirakan dan semakin mendorong untuk meningkatkan literasi siswa terhadap TIK (Teknologi Informasi dan Komunikasi). Selanjutnya secara bertahap pada tahun 2015 dilaksanakan rintisan UNBK dengan mengikutsertakan sebanyak 556 sekolah yang terdiri dari 42 SMP/MTs, 135 SMA/MA, dan 379 SMK di 29 Provinsi dan Luar Negeri. Pada tahun 2016 dilaksanakan UNBK dengan mengikutsertakan sebanyak 4382 sekolah yang tediri dari 984 SMP/MTs, 1298 SMA/MA, dan 2100 SMK. Jumlah sekolah yang mengikuti UNBK tahun 2017 melonjak tajam menjadi 30.577 sekolah yang terdiri dari 11.096 SMP/MTs, 9.652 SMA/MA dan 9.829 SMK. Meningkatnya jumlah sekolah UNBK pada tahun 2017 ini seiring dengan kebijakan resources sharing yang dikeluarkan oleh Kemendikbud yaitu memperkenankan sekolah yang sarana komputernya masih terbatas melaksanakan UNBK di sekolah lain yang sarana komputernya sudah memadai.<br /><br />Penyelenggaraan UNBK saat ini menggunakan sistem semi-online yaitu soal dikirim dari server pusat secara online melalui jaringan (sinkronisasi) ke server lokal (sekolah), kemudian ujian siswa dilayani oleh server lokal (sekolah) secara offline. Selanjutnya hasil ujian dikirim kembali dari server lokal (sekolah) ke server pusat secara online (upload).</p>', 'f11bd8285419ee049b7b85957a95b5b5.jpg', 1, '2', 'post', 'publish', 'public', 'open', 'tentang-unbk', 'berita, pengumuman, sekilas-info', 12, '2018-04-01 18:52:03', '2019-04-07 15:46:51', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(4, 'Industri 4.0, Mendikbud: Pendidikan Vokasi Masa Depan Indonesia', '<div class=\"content\">\n<p><strong>JAKARTA</strong>&nbsp;- Pendidikan vokasi adalah masa depan Indonesia di tengah arus gelombang revolusi industri 4.0. Sebab, era digital menjanjikan peluang besar bagi generasi milenial Indonesia yang berjiwa dinamis dan kreatif. Untuk itu, generasi depan bangsa harus kreatif dan produktif agar bisa bersaing secara global. Dan, koperasi Sekolah Menengah Kejuruan (SMK) adalah salah satu jembatan efektif dalam mencetak pengusaha-pengusaha muda.</p>\n<p>Hal itu dikatakan Menteri Pendidikan dan Kebudayaan Muhadjir Effendy dalam sambutannya saat membuka kegiatan Young Technopreneur Expo (YTE) 2019 di Hotel Sahid, Jakarta, Jumat (22/2/2019). Kegiatan dengan tagline #optimismeindonesia itu diikuti puluhan SMK dan sejumlah bisnis&nbsp;<em>start up</em>&nbsp;anak-anak muda.</p>\n<p>&ldquo;Revolusi Industri 4.0 adalah peluang besar bagi generasi milenial karena jiwa mereka yang dinamis dan kreatif. Era digital membuka banyak ruang bagi generasi milenial untuk menciptakan produk-produk kreatif yang unik. Karena digitalisasi ekonomi terbukti mendorong semakin banyak orang suka dengan produk-produk yang unik. Dan, di situlah peluang bisnis bagi generasi milenial untuk terus menciptakan produks-produk kreatif,&rdquo; kata Muhadjir.</p>\n<p>Muhadjir pun menyatakan sangat senang dan mengapresiasi inisiatif generasi muda menularkan sikap dan semangat optimistis melalui kegiatan YTE 2019 dengan&nbsp;<em>tagline</em>&nbsp;#OptimismeIndonesia. Mendikbud mengakui sempat kaget ketika mendapat informasi bahwa kegiatan YTE 2019 mendadak pindah dari kawasan Kuningan ke hotel Sahid.</p>\n<p>&ldquo;Saya sempat kaget, tetapi sekaligus salut. Begini, kita tumbuh dari kegagalan. Tidak ada cerita sukses terus. Generasi muda harus pernah mengalami kegagalan untuk bisa meraih kesuksesan. Kita belajar dari kegagalan. Inilah pesan pokok dari kegiatan Young Technopreneur Expo 2019 ini. Bahwa generasi muda tidak cukup hanya kreatif dan inovatif, tetapi juga harus berani mengambil inisiatif, berani mengambil risiko, dan berani memikul tanggungjawab,&rdquo; ujar Muhadjir.</p>\n<p>Kegiatan YTE 2019 diikuti sejumlah SMK di Pulau Jawa yang memproduksi berbagai produk dan sudah menjalin kerjasama dengan industri lokal. Selain SMK, YTE 2019 juga diikuti bisnis start up anak-anak muda. Selama tiga hari, 22-24 Februari, YTE 2019 menggelar eksibisi dan&nbsp;<em>talkshow</em>&nbsp;dengan narasumber seperti CEO Bitpascal Arkdemy dan Amoeba Telkom Digimy. &ldquo;Saya sangat senang dan mengapresiasi kegiatan ini yang menampilkan ide-ide kreatif dan karya-karya nyata generasi muda,\" kata Muhadjir.&nbsp;</p>\n<p>Tema #OptimismeIndonesia, lanjutnya, sangat cocok untuk generasi milenial yang sangat dinamis. \"Mari kita dorong anak-anak muda membangun mimpi-mimpi besar dalam melihat masa depan dengan sikap optimis lewat produk-produk inovatif yang dibutuhkan pasar. Saya sangat mendukung Dekopin untuk menggelar kegiatan ini secara rutin setiap tahun.&rdquo;&nbsp;</p>\n<p>Lebih jauh, Muhadjir menjelaskan bahwa Presiden Joko Widodo sangat peduli dengan pendidikan vokasi untuk menciptakan generasi muda yang kreatif dan produktif. Karena itu, pemerintah melakukan program revitalisasi kurikulum dan kelembagaan SMK untuk mengangkat mutu tamatan dan link dengan dunia industri. Dalam empat tahun terakhir, pemerintah sudah melakukan revitalisasi terhadap lebih dari 3.000 dari total 13.000 SMK di seluruh Indonesia.</p>\n<p>Mendikbud menjelaskan, sebanyak 60% materi kurikulum SMK sekarang ini berasal dari dunia industri dan 40% dari sekolah. SMK juga sudah menjalin kerjasama dengan industri lokal baik untuk pelatihan maupun pasar bagi produk-produk SMK. Pembiayaan untuk produksi siswa-siswa SMK juga sudah mulai disalurkan melalui Badan Layanan Umum Daerah (BLUD) di daerah-daerah.&nbsp;</p>\n<p>Para siswa SMK memiliki kemampuan menciptakan berbagai produk. Namun, kendala mereka ialah belum memiliki pemahaman dan mental kewirausahaan. \"Saya berharap koperasi masuk di situ, melatih para siswa SMK soal manajemen dan mental entrepreneur sehingga begitu mereka tamat langsung bisa berkarya sebagai entrepreneur yang produktif dan mandiri. Karena itu, saya akan mendukung penuh jika Dekopin memelopori pembentukan koperasi bagi SMK-SMK kita,&rdquo; ujar Muhadjir.Hadir mendampingi Mendikbud, ketua Panitia YTE Ilham Nasai, Presiden Koperasi ASEAN yang juga Presiden Koperasi Malaysia &lsquo;Angkasa&rsquo;, Dato Abdul Fattah, dan Ketua Harian Dekopin, Agung Sujatmoko. Dalam sambutannya, Ketua Panitia YTE 2019 Ilham Nasai menyebutkan, tagline #OptimismeIndonesia berangkat dari hasil diskusi anak-anak muda di Koperasi Pemuda Indonesia (Kopindo), Dekopin, dan KNPI tentang potret pergumulan generasi muda bangsa menyongsong bonus demografi di tengah gelombang arus revolusi industri 4.0.</p>\n<p><br />Dia menilai, #OptimismeIndonesia merupakan energi positif yang memandang Indonesia dengan berbagai kelebihan. #OptimismeIndonesia juga merupakan rangkaian karya generasi muda di SMK-SMK untuk masa depan industri nasional. \"Tema YTE 2019 memotret pentingnya relasi pendidikan, dunia industri, dan ekosistem anak-anak muda masa kini. Dengan menampilkan karya-karya kreatif inovatif anak-anak SMK, kami ingin menyemburkan spirit optimisme kepada segenap elemen bangsa bahwa generasi muda kita kreatif dan produktif menyongsong demografi ekonomi di era digital ,&rdquo; kata Ilham.&nbsp;</p>\n<p>Ketua Harian Dekopin Agung Sujatmoko menyambut antusias gagasan Mendikbud tersebut. &ldquo;Kami menyambut baik dorongan Pak Menteri untuk memelopori berdirinya koperasi-koperasi SMK. Selain melatih jiwa kewirausahaan, berkoperasi bagi para siswa sangat strategis untuk melatih siswa berorganisasi dan menanamkan nilai-nilai kebersamaan sesuai falsafah negara kita Pancasila,&rdquo; ujar Agung Sujatmoko dalam sambutannya mewakili Ketua Umum Dekopin Nurdin Halid yang berhalangan hadir.</p>\n<p>Sejauh ini, Dekopin sudah tiga kali menggelar SMK Expo, yaitu pada tahun 2012 di Bandung, tahun 2016 di Yogyakarta, dan tahun 2019 ini di Jakarta. Kegiatan YTE 2019 adalah hasil kerjasama Kopinado, Pusat Informasi Perkoperasian (PIP) Dekopin, KNPI dengan Kemendikbud, Kementerian Koperasi dan UKM, serta Tanoto Foundation. Kegiatan YTE 2019 juga didukung oleh beberapa lembaga seperti; PT POS Indonesia, PGN, LPDB, Kemenperin dan Kominfo.<br />(don)</p>\n<p>&nbsp;</p>\n<p>Sumber: Sindonews.com</p>\n</div>\n<div class=\"rating\">&nbsp;</div>', '4335d1d8d10d453ea9f44dc471f0f592.png', 1, '2,3', 'post', 'publish', 'public', 'open', 'industri-40-mendikbud-pendidikan-vokasi-masa-depan-indonesia', 'berita, pengumuman, sekilas-info', 2, '2018-04-01 18:52:03', '2019-04-24 15:22:57', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(5, 'Sample Post 3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '1', 'post', 'publish', 'public', 'open', 'sample-post-3', 'berita, pengumuman, sekilas-info', 10, '2018-04-01 18:52:03', NULL, '2019-03-27 03:03:25', NULL, NULL, NULL, 7, NULL, 'true'),
(6, 'Sample Post 4', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '1', 'post', 'publish', 'public', 'open', 'sample-post-4', 'berita, pengumuman, sekilas-info', 2, '2018-04-01 18:52:03', NULL, '2019-03-27 03:03:25', NULL, NULL, NULL, 7, NULL, 'true'),
(7, 'Sample Post 5', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '1', 'post', 'publish', 'public', 'open', 'sample-post-5', 'berita, pengumuman, sekilas-info', 1, '2018-04-01 18:52:03', NULL, '2019-03-27 03:03:25', NULL, NULL, NULL, 7, NULL, 'true'),
(8, 'Profil SMK dari Kemendikbud', 'https://www.youtube.com/embed/nKDBL7Vau-s', NULL, 0, NULL, 'video', 'publish', 'public', 'open', NULL, NULL, 0, '2018-07-10 05:17:08', '2019-04-03 07:58:38', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(9, 'Profil SMK Media Utama', 'https://www.youtube.com/embed/vA5coaCXy9w', NULL, 0, NULL, 'video', 'publish', 'public', 'open', NULL, NULL, 0, '2018-07-11 11:47:36', '2019-04-24 16:08:55', '2019-04-24 16:07:40', '2019-04-24 16:08:46', 1, 7, 7, 7, 'false'),
(10, '1,53 Juta Siswa SMK Ikut Ujian Nasional', '<p><strong>Yogyakarta--</strong>Ujian Nasional (UN) untuk jenjang Sekolah Menengah Kejuruan (SMK) digelar mulai hari ini hingga Kamis, 28 Maret 2019. UN tingkat SMK diikuti sekitar 1,53 juta siswa dari 13.513 sekolah di seluruh Tanah Air.<br />&nbsp;<br />Kepala Pusat Penilaian Pendidikan (Kapuspendik) Kementerian Pendidikan dan Kebudayaan, Mohammad Abduh menjelaskan, UN SMK mengujikan materi pelajaran Bahasa Indonesia, Matematika, Bahasa Inggris, dan teori kejuruan. Sebanyak 99,5% pelaksanaan UN SMK sudah menggunakan ujian nasional berbasis komputer (UNBK), sisanya menggunakan ujian nasional berbasis kertas dan pensil (UNKP).<br />&nbsp;<br />\"Ada sejumlah SMK di sembilan provinsi masih menggunakan UNKP, yakni di Sumatra Utara, Sumatra Barat, Kepulauan Riau, Kalimantan Timur, NTT, Maluku, Maluku Utara, Papua, dan Papua Barat,\" sebut Abduh.&nbsp;</p>\n<p>Terkait dengan antisipasi kemungkinan listrik mati saat berlangsungnya UN, menurut Abduh, Kemendikbud bersama PLN telah berkomitmen menjaga pasokan listrik selama UN.</p>\n<p>Direktur Pembinaan SMK Kemendikbud, Muhammad Bakrun berpesan, agar seluruh SMK dan peserta UN fokus melaksanakan dan mengikuti UN. \"Selamat menempuh UN. Jangan lupa berdoa dan percaya dengan kemampuan sendiri,\" kata Bakrun.<br />&nbsp;<br />Sementara itu, sejumlah sekolah menyatakan siap menggelar UN. Kepala SMK Negeri 1 Depok, Sleman, Yogyakarta, Suprapto, mengatakan, sekolahnya siap menggelar UNBK dengan diikuti 280 siswa. \"Semuanya sudah siap, sebelumnya juga sudah dilakukan simulasi-simulasi,\" katanya.<br />&nbsp;<br />Menurut dia, sekolahnya menyediakan tiga ruangan. Tiap ruangan berisi 32 unit komputer atau totalnya ada 96 unit komputer. Dengan demikian, UNBK akan diselenggarakan dalam tiga sesi. \"Genset juga disiapkan, tapi harapannya jangan sampai digunakan,\" imbuhnya.<br />&nbsp;<br />Di Provinsi Bengkulu, sebanyak 8.086 siswa SMK di 10 kabupaten/kota akan mengikuti UNBK. \"Soal UN seluruhnya dibuat oleh Kemendikbud. Tapi kelulusan siswa bukan ditentukan nilai UN,\" kata Kepala Dinas Pendidikan dan Kebudayaan Provinsi Bengkulu, Budiman Ismaun.<br />&nbsp;<br />Hal senada disampaikan Kepala Dinas Pendidikan Provinsi Bangka Belitung, Muhammad Soleh. Ia menjelaskan, kelulusan siswa ditentukan berdasarkan hasil ujian akhir sekolah berbasis nasional (UASBN), uji kompetensi, dan ujian praktik.<br />&nbsp;<br />\"UN memang tak menentukan kelulusan, tapi kami tetap menyiapkannya secara matang karena UN untuk memetakan mutu pendidikan,\" ucapnya.</p>\n<p><strong>Sumber :&nbsp;medcom</strong></p>', 'c816a960f00a11f9c336c1a1fb0a58bc.jpg', 7, '2,3', 'post', 'publish', 'public', 'open', '153-juta-siswa-smk-ikut-ujian-nasional', '', 0, '2019-03-27 03:02:33', '2019-04-24 15:25:05', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(11, 'Computer Base Test', '<p>SMK Putra Anda telah melakukan CBT sejak tahun 2017 hingga sekarang dengan jumlah peserta sebanyak 2000 siswa</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'computer-base-test', NULL, 7, '2019-03-27 06:42:50', '2019-04-03 08:58:54', '2019-03-28 14:40:48', '2019-04-03 08:26:30', 7, 7, 7, 7, 'false'),
(12, 'SMK Siap Menyokong Industri Pariwisata', 'https://www.youtube.com/embed/CAsvlAgNz4U?list=PLtZ-vbjf3DMCCOZQ2TTUxNZq6JzKis4tn', NULL, 0, NULL, 'video', 'publish', 'public', 'open', NULL, NULL, 0, '2019-04-03 08:01:09', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(13, 'E-Learning', '<p>Dengan sistem E-Learning memudahkan siswa dalam mengakses materi pelajaran yang sudah disiapkan oleh guru bidang studi</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'e-learning', NULL, 4, '2019-04-03 09:03:11', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(14, 'Teknik Komputer & Jaringan', '<p><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554285061978.png\" alt=\"\" width=\"714\" height=\"254\" /></p>\n<p><span class=\"_Tgc\"><strong>Pengertian</strong>&nbsp;Tentang Jurusan Teknik Komputer dan Jaringan. Teknik Komputer dan Jaringan atau yang biasa disebut&nbsp;<strong>TKJ</strong>&nbsp;adalah teknik yang mempelajari tentang cara instalasi PC, instalasi LAN, memperbaiki PC dan mempelajari program-program PC.</span>Sekarang ini jurusan TKJ merupakan jurusan yang sangat populer/banyak peminatnya, meskipun banyak sekali saingan dari jurusan TKJ yaitu jurusan RPL&nbsp;(Rekayasa Perangkat Lunak), jurusan Multimedia, dan lain-lain. Jurusan TKJ sangatlah mudah untuk dipelajari hanya modal kemauan untuk belajar dan belajar. Saya juga dulu tidak tahu apa itu TKJ, tapi setelah sekolah di jurusan ini saya jadi banyak tahu mengenai bagaimana memperbaiki PC, menginstalasi&nbsp;&nbsp;LAN maupun yang lainnya.</p>\n<p><img class=\"alignnone \" src=\"http://www.tkj.smkn1cileungsi.sch.id/wp-content/uploads/2015/02/tkj.jpg\" alt=\"\" width=\"684\" height=\"513\" /></p>\n<div>\n<p><strong>&nbsp;Modul TKJ &ndash; teknik komputer jaringan</strong>&nbsp;adalah modul yang di khususkan untuk mendukung proses belajar mengajar siswa di tingkat sekolah menengah kejuruan teknik komputer jaringan (SMK TKJ). Pada&nbsp;<strong>modul TKJ&nbsp;</strong>ini terdapat materi pokok yang mempelajari dasar awal hardware maupun software komputer serta jaringan komputer. Jaringan komputer yang meliputi LAN, MAN dan WAN juga di pelajari oleh siswa TKJ. TKJ adalah singkatan dari Teknik Komputer dan Jaringan&nbsp;,&nbsp; jurusan TKJ adalah jurusan yang terdapat di SMK.</p>\n<div>siswa TKJ inilah yang mempelajari&nbsp;<em>Modul teknik komputer jaringan&nbsp;</em>selain mempelajari teori awal dari komputer dan jaringan mereka juga di bekali dengan praktik merakit komputer, merakit laptop. Disamping itu siswa TKJ juga mempelajari sofware seperti Sistem</div>\n<div>Operasi Windows, Sistem Operasi Linux, cara menginsal sistem operasi dan masih banyak software yang lainnya</div>\n<div>&nbsp;</div>\n<div><strong><em>Jurusan Teknik Komputer Jaringan</em></strong>&nbsp;ini selain mempelajari itu semua mereka juga dibekali dengan trobleshoting komputer, perawatan komputer, perawatan peritnter dan perawatan hardware lainnya.</div>\n<div>&nbsp;</div>\n<div><img class=\"alignnone \" src=\"http://indravengeance.hol.es/wp-content/uploads/2014/03/cropped-tkj-logo.jpg\" alt=\"\" width=\"316\" height=\"79\" /></div>\n</div>\n<div>&nbsp;</div>\n<p>Dan berikut dari&nbsp;modul teknik komputer dan jaringan&nbsp;yang biasa di pelajari dalam jurusan ini :</p>\n<ul>\n<li>Menginstal Pc</li>\n<li>Melakukan perawatan Pc</li>\n<li>Melakukan perbaikan Periperal</li>\n<li>Melakukan perawatan Periperal</li>\n<li>Alat &ndash; alat perbaikan Periperal Komputer</li>\n<li>Instalasi Perangkat Jaringan Lokal (LAN)</li>\n<li>Instalasi Perangkat Jaringan berbasis Luas (WAN)</li>\n<li>Instalasi Perangkat Jaringan</li>\n<li>Instalasi Sistem Operasi berbasis GUI</li>\n<li>Dan lain &ndash; lainnya</li>\n</ul>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'teknik-komputer--jaringan', NULL, 17, '2019-04-03 09:27:42', '2019-04-03 10:18:39', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(15, 'Rekayasa Perangkat Lunak', '<p style=\"text-align: justify;\"><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554285652624.jpg\" alt=\"\" width=\"700\" height=\"350\" /></p>\n<p style=\"text-align: justify;\"><strong>RPL adalah singkatan dari Rekayasa Perangkat Lunak</strong>&nbsp;dan merupakan sebuah jurusan yang ada di Sekolah Menengah Kejuruan (SMK). RPL adalah sebuah jurusan yang mempelajari dan mendalami&nbsp; semua cara-cara pengembangan perangkat lunak&nbsp;termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas. Bukan hanya itu RPL juga &nbsp;berkaitan dengan software computer mulai dari pembuatan website, aplikasi, game dan semua yang berkaitan dengan pemrograman dengan menguasai bahasa pemrograman tersebut. Intinya RPL tidak akan jauh-jauh dari tiga hal yaitu Coding, Desain dan Algoritma yang akan menjadi kunci keberhasilan rekayasa perangkat lunak tersebut.</p>\n<p style=\"text-align: justify;\">Sejauh ini sangat banyak orang yang menyesal mengambil jurusan RPL dengan berbagai alasan mulai dari alasan &lsquo;ngoding itu terlalu sulit&rsquo; &lsquo;RPL itu sangat membingungkan&rsquo; &lsquo;tidak bisa mengerti bahasa pemrograman&rsquo; &lsquo;tidak bisa ngoding&rsquo; padahal sebenarnya usaha itu yang kurang. Pikir aja semudah apapun jurusan yang kalian ambil jika tidak dipelajari dengan sungguh-sungguh pasti tidak akan bisa bukan? Jadi intinya haya satu yaitu mau bekerja keras, tidak pantang menyerah, selalu berinovasi, banyak mencoba, gigih, banyak berdoa dan tekun belajar adalah kunci utama untuk sukses mempelajari codingan dalam jurusan RPL.</p>\n<p style=\"text-align: justify;\">Mungkin kamu masih bingung kenapa RPL sesusah itu? dibalik itu semua ada banyak manfaat yang dapat kita rasakan dalam mempelajari berbagai macam pelajaran yang ada dalam jurusan rekayasa perangkat lunak tersebut contohnya saja seperti :</p>\n<ul style=\"text-align: justify;\">\n<li><strong>Dapat mengerti cara membuat aplikasi bukan hanya menggunakan</strong></li>\n</ul>\n<p style=\"text-align: justify;\">&nbsp;Jika kamu ingin membuat aplikasi dan kamu lebih memilih belajar secara otodidak dengan cara searching di google atau di youtube pasti akan sangat sulit karena kamu tidak memiliki dasar seperti yang diajarakan di sekolah. Ingatlah ngoding itu tidak semudah yang kamu kira karena karena saat membuat aplikasi kamu akan menemui banyak kendala seperti program error, syntak&rdquo; yang tidak jelas, codingan yang tidak dimengerti dan masih banyak lagi.</p>\n<ul style=\"text-align: justify;\">\n<li><strong>Bisa belajar dimana saja</strong></li>\n</ul>\n<p style=\"text-align: justify;\">Ini maksud nya kamu tidak harus pergi ke tempat-tempat tertentu jika ingin belajar kamu cukup punya 1 buah laptop yang jaringan internet maka kamu sudah bisa belajar. Bahkan melalui smartphone pun kamu juga bisa belajar jadi kamu bisa memanfaatkan waktu jika berada dalam perjalanan dengan belajar program.</p>\n<ul style=\"text-align: justify;\">\n<li><strong>Mendapatkan ilmu yang tak ternilai harganya</strong></li>\n</ul>\n<p style=\"text-align: justify;\">Mahal? Kenapa? Tapi memang inilah keistimewaan jurusan RPL karena memang teknologi adalah segalanya di zaman sekarang ini. Bayangkan saja jika kamu membuka kursus bahasa pemrograman dengan bandrol 500 ribu hanya dalam 2-3 kali pertemuan untuk satu orang, pasti sudah besar banget gaji kamu perbulan nya.</p>\n<ul style=\"text-align: justify;\">\n<li><strong>Cukup lancar satu keahlian</strong></li>\n</ul>\n<p style=\"text-align: justify;\">Maksudnya bukan melarang kamu mempelajari banyak hal tapi di jurusan RPL ini kamu cukup memahami dan menguasai satu bidang keahlian saja misalnya satu bahasa pemrograman atau web desain yang benar-benar kamu pahami maka kemampuan itu akan menjamin kamu dapat pekerjaan. Toh di perusahaan terkenal seperti facebook, google, adobe dan lain-lainnya kita hanya bekerja menurut kemampuan kita masing-masing.</p>\n<ul style=\"text-align: justify;\">\n<li><strong>Banyak pekerjaan dimana-mana</strong></li>\n</ul>\n<p style=\"text-align: justify;\">Sekarang ini sangat banyak dibutuhkan tenaga kerja yang berada di bidang RPL, bagaimana tidak perusahaan startup saja sudah banyak berdiri dimana mana dan pastinya membutuhkan karyawan dengan kinerja yang berkualitas dan tentunya harus maniak computer atau mengerti computer dan software. Apalagi beberapa tahun ke depan nya pasti akan lebih banyak lagi karena setiap harinya teknologi yang ada akan terus berkembang pesat.</p>\n<p style=\"text-align: justify;\">Bagaimana ? tertarik masuk kedalam dunia RPL? Jika kamu menyukai teknologi pasti nya kamu akan sangat tertarik bukan? Apalagi jurusan ini masih baru di Indonesia jadi pastinya akan banyak orang berlomba lomba masuk ke jurusan tersebut. Tapi ingat syarat yang harus kamu siapkan untuk masuk ke jurusan RPL adalah :</p>\n<ul style=\"text-align: justify;\">\n<li>Mental yang kuat</li>\n<li>Logika yang jalan dan kuat</li>\n<li>Giat dan mau belajar dengan keras</li>\n<li>Rajin mencoba dan pantang menyerah</li>\n<li>Laptop dengan spesifikasi yang lumayan tentunya untuk mensupport aplikasi-aplikasi yang akan digunakan</li>\n</ul>\n<p style=\"text-align: justify;\">Sekian informasi tentang apa itu Rekayasa Perangkat Lunak yang dapat saya berikan semoga bermanfaat bagi kalian yang ingin mengambil jurusan ini.</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'rekayasa-perangkat-lunak', NULL, 5, '2019-04-03 09:54:22', '2019-04-03 10:01:25', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(16, 'Tata Boga', '<p><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554286000435.jpg\" alt=\"\" width=\"721\" height=\"404\" /></p>\n<p><strong>Apa itu Tata Boga?</strong></p>\n<p>Program studi Tata Boga mempelajari teknik penyajian makanan dengan memperhatikan kualitas, rasa, estetika, dan kebutuhan gizi. Kamu akan belajar mengolah berbagai hidangan dari daerah dan negara. Misalnya masakan barat, masakan Cina, masakan timur tengah, masakan italia, dan masakan nusantara. Tidak hanya belajar mengolah makanan, tapi kamu juga akan belajar bagaimana meracik minuman dan mempelajari cara menghidangkannya. Tentu saja kamu juga aspek sanitasi dan hygiene, gizi, dan pelayanan adalah ilmu yang juga harus kamu pelajari di prodi Tata Boga.</p>\n<p>&nbsp;</p>\n<p><strong>Kenapa Kamu Memilih Jurusan Ini?</strong></p>\n<p>Masih banyak yang beranggapan kalau prodi Tata Boga identik dengan perempuan. Padahal banyak laki-laki yang sukses berkecimpung di dunia Tata Boga. Selain itu, masih banyak juga yang beranggapan masak-memasak itu mudah. Faktanya di prodi ini kamu tidak hanya belajar memasak dalam prakteknya, namun banyak juga teori yang harus di perhatikan dalam pengolahan, penyajian, dan penhidangan makanan dalam industri kuliner</p>\n<p>&nbsp;</p>\n<p><strong>Prospek Kerja Jurusan Tata Boga</strong></p>\n<p>Kuliner tidak akan pernah ada matinya. Perkembangan di sektor pariwisata juga ikut serta meningkatkan antusiasme di bidang kuliner. Lulusan Tata Boga dapat berkarir di industri kuliner sendiri, maupun di industri pariwisata. Lulusannya dapat berkarir sebagai koki atau chef, baker, barista, atau bartender di berbagai hotel, restoran, dan kafe. Selain itu, lulusan Tata Boga juga memiliki kesempatan untuk mengembangkan usaha kuliner sendiri.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'tata-boga', NULL, 2, '2019-04-03 10:16:43', '2019-04-03 10:18:04', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(17, 'Tata Busana', '<p style=\"text-align: justify;\"><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554286879671.jpg\" alt=\"\" width=\"718\" height=\"404\" /></p>\n<p style=\"text-align: justify;\">Secara umum, jurusan fashion design mempelajari ilmu merancang busana. Ada banyak spesialisasi yang bisa dipilih dalam jurusan fashion design, misalnya pakaian olahraga, pakaian anak, alas kaki, aksesori dan bidang fashion lainnya.</p>\n<p style=\"text-align: justify;\">Jurusan fashion design tidak hanya mempelajari cara merancang produk fashion, tetapi juga mempelajari bagaimana cara memasarkan produk, cara melihat tren fashion, menciptakan tren fashion, hingga menggunakan teknologi untuk menyelesaikan hasil karya mereka.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">SKILL YANG DIPELAJARI DI JURUSAN FASHION DESIGN</p>\n<p style=\"text-align: justify;\">Berikut adalah beberapa keahlian utama yang akan dipelajari mahasiswa jurusan fashion design:</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong><em>Artistik</em></strong></p>\n<p style=\"text-align: justify;\">Membuat sketsa produk desain dari nol, kemudian membuat prototype (contoh produk). Mahasiswa fashion design dituntut untuk dapat menuangkan ide mereka menjadi gambar.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong><em>Komunikasi</em></strong></p>\n<p style=\"text-align: justify;\">Pekerjaan seorang lulusan jurusan fashion design biasanya melibatkan tim/kelompok, sehingga sejak kuliah mereka diajarkan teknik untuk berkomunikasi dan bekerjasama dengan orang lain. Baik itu menjadi anggota tim, ataupun menjadi pemimpin.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong><em>Komputer</em></strong></p>\n<p style=\"text-align: justify;\">Perancang busana menggunakan teknologi untuk membuat rancangan. Program CAD dan software pengeditan gambar wajib untuk dikuasai mahasiswa fashion design.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong><em>Kreativitas</em></strong></p>\n<p style=\"text-align: justify;\">Kreativitas adalah keahlian yang mutlak dimiliki oleh mahasiswa jurusan fashion design. Mahasiswa akan belajar untuk menggunakan beragam jenis bahan, tekstil, warna dan bentuk untuk menciptakan rancangan yang unik, bagus dan fungsional.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong><em>Membuat Keputusan</em></strong></p>\n<p style=\"text-align: justify;\">Karena harus bekerja dalam kelompok, tentunya akan muncul banyak ide dari masing-masing anggota. Sebagai suatu kelompok, mereka harus dapat membuat keputusan yang sesuai dengan permintaan klien atau proyek.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong><em>Memperhatikan Detail</em></strong></p>\n<p style=\"text-align: justify;\">Sebagai mahasiswa fashion design harus jeli terhadap segala jenis detail, mulai dari bahan, warna hingga tekstur produk fashion.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">&nbsp;</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'tata-busana', NULL, 3, '2019-04-03 10:25:45', '2019-04-03 10:27:00', NULL, NULL, 7, 7, NULL, NULL, 'false'),
(18, 'Bisnis Daring & Pemasaran', '<p><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554287656409.jpg\" alt=\"\" width=\"721\" height=\"405\" /></p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'bisnis-daring--pemasaran', NULL, 1, '2019-04-03 10:37:47', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(19, 'Otomatisasi & Tata Kelola Perkantoran', '<p><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554287936918.jpg\" alt=\"\" width=\"708\" height=\"471\" /></p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'otomatisasi--tata-kelola-perkantoran', NULL, 3, '2019-04-03 10:39:11', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(20, 'Akuntasi & Keuangan Lembaga', '<p style=\"text-align: justify;\"><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554288008437.jpg\" alt=\"\" width=\"711\" height=\"453\" /></p>\n<h2 style=\"text-align: justify;\">Pengertian Akuntansi Keuangan</h2>\n<p style=\"text-align: justify;\">Akuntansi Keuangan adalah cabang dari&nbsp;ilmu akuntansiyang berkaitan dengan cara pelaporan perusahaan kepada pelaku ekonomi baik internal maupun eksternal yang berbentuk laporan neraca, rugi laba, perubahan modal dan arus kas. Pihak eksternal seperti pemegang saham, kreditor, investor. Semakin bagus pelaporan keuangan akan berimbas kepada baiknya kredibilitas perusahaan. Akuntansi keuangan memiliki peran sangat penting dan vital dalam menyajikan kondisi terkini perusahan sebagai acuan dalam pengambilan keputusan oleh manajemen.</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'akuntasi--keuangan-lembaga', NULL, 0, '2019-04-03 10:41:10', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(21, 'Bisnis Konstruksi & Properti', '<p style=\"text-align: justify;\"><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554288136556.jpg\" alt=\"\" width=\"722\" height=\"406\" /></p>\n<p style=\"text-align: justify;\">Konstruksi adalah proses merakit sebuat infrastruktur, yang pada umumnya berupa bangunan untuk menunjang kehidupan manusia. Konstruksi tidak hanya membahas tentang pekerjaan fisik dalam membangun, tetapi juga membahas tentang pengaturan dan pengadaan bahan baku, perencanaan keuangan dan keselamatan dalam proses membangun. Pada umumnya ada 4 jenis konstruksi, yaitu: konstruksi residen, industri, komersial dan sipil.</p>\n<p style=\"text-align: justify;\">Dengan bertambahnya populasi manusia yang selalu membutuhkan tempat tinggal dan infrastruktur, industri konstruksi selalu berkembang. Oleh karena itu, para lulusan jurusan Konstruksi tidak perlu khawatir dalam hal mencari kerja.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong>Prospek Kerja</strong></p>\n<p style=\"text-align: justify;\">Ada banyak bidang kerja yang tersedia untuk lulusan konstruksi. Banyak para lulusan yang mencari kerjaan di Bidang Arsitektur. Gaji rata-rata per tahun untuk seorang Arsitek adalah &pound;15,000 - &pound;20,000 di Inggris. Banyak juga yang mengejar karir sebagai Insinyur Sipil.</p>\n<p style=\"text-align: justify;\">Banyak para lulusan yang melamar sebagai surveyor kuantitas, di mana perannya adalah meminimalkan biaya konstruksi. Gaji rata-rata di Inggris untuk profesi Surveyor adalah &pound;19,000 - &pound;25,000 per tahun. Selain menghemat biaya produksi, ada juga Surveyor yang berperan sebagai Surveyor Bangunan, dimana tugasnya adalah mengawasi proses konstruksi agar bangunan yang dihasilkan gampang untuk dirawat dan kokoh. Gaji untuk profesi di bidang ini pada umumnya sekitar &pound;18,000 - &pound;26,000 per tahun di Inggris.</p>\n<p style=\"text-align: justify;\">Semasa kuliah, para mahasiswa tidak hanya dibekali dengan keahlian di bidang praktek, tetapi juga dibekali dengan pengertian di bidang industri secara keseluruhan sehingga memungkinkan para lulusan untuk bekerja di bagian konstruksi yang menyangkut keuangan, sumber daya manusia dan hukum kontrak.</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'bisnis-konstruksi--properti', NULL, 1, '2019-04-03 10:43:25', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(22, 'Teknik Instalasi Tenaga Listrik', '<p style=\"text-align: justify;\"><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554288339173.jpg\" alt=\"\" width=\"719\" height=\"404\" /></p>\n<p style=\"text-align: justify;\">Teknik Listrik (Teknik Elektro) adalah salah satu bidang ilmu teknik mengenai aplikasi listrik untuk memenuhi kebutuhan daya listrik dalam skala besar seperti pada industri dan mesin-mesin. Teknik Listrik berhadapan langsung dengan ketersediaan sumber daya energi , transmisi energi dan dampak dari energi terhadap sistem operasi permesinan secara keseluruhaan. Teknik listrik bekerja sama dengan insinyur dari area lain seperti teknik kimia, teknik mesin, dan teknik sipil untuk merancang, mengembangkan, dan membantu produksi berbagai macam produk dan jasa seperti sistem distribusi energi, komputer pribadi, sistem satelit, radio genggam, sistem radar, mobil listrik, jantung buatan, dan lain-lain yang melibatkan komponen listrik dan elektronik.</p>\n<p style=\"text-align: justify;\">Jurusan ini dikenal pada pertengahan abad ke-19 setelah ekspansi telepon dan telegram.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><strong>Prospek Kerja</strong></p>\n<p style=\"text-align: justify;\">Mayoritas mahasiswa mengambil jurusan ini dengan tujuan untuk menjadi insinyur teknik. Selain itu, para lulusan juga bisa bekerja di bidang pengembangan sistem, manajemen kualitas dan penjualan. Ini dikarenakan keahlian menganalisa yang mereka pelajari selama kuliah bisa diterapkan di bidang-bidang tersebut.</p>\n<p style=\"text-align: justify;\">Keahlian di bidang logika, penyelesaian masalah dan berhitung dari para lulusan Jurusan Teknik Listrik juga bisa dialihkan ke bidang keuangan, perbankan dan sektor-sektor bisnis lainnya.</p>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'teknik-instalasi-tenaga-listrik', NULL, 0, '2019-04-03 10:46:21', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(23, 'Teknik Kendaraan Ringan Otomotif', '<p style=\"text-align: justify;\"><img src=\"https://ppdb.putraandabinjai.sch.id/media_library/posts/page-image-1554288519546.jpg\" alt=\"\" width=\"704\" height=\"469\" /></p>\n<h4 style=\"text-align: justify;\"><strong>PROFIL TEKNIK PEMESINAN</strong></h4>\n<h4 style=\"text-align: justify;\"><strong>Tujuan Kompetensi&nbsp;Keahlian Teknik Pemesinan</strong></h4>\n<p style=\"text-align: justify;\">Tujuan Program Keahlian Teknik Pemesinan secara umum mengacu pada isi Undang Undang Sistem Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional dan penjelasan pasal 15 yang menyebutkan bahwa pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik terutama untuk bekerja dalam bidang tertentu. Secara khusus tujuan Program Keahlian Teknik Pemesinan adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap agar kompeten:</p>\n<ol style=\"text-align: justify;\">\n<li>bekerja baik secara mandiri atau mengisi lowongan pekerjaan yang ada didunia usaha dan dunia industri sebagai tenaga kerja tingkat menengahdalam bidang Teknik Pemesinan;</li>\n<li>memilih karir, berkompetisi, dan mengembangkan sikap profesional dalambidang Teknik Pemesinan</li>\n</ol>\n<h4 style=\"text-align: justify;\"><strong>Kompetensi Keahlian Teknik Pemesinan</strong></h4>\n<p style=\"text-align: justify;\">Standar kompetensi yang digunakan sebagai acuan pengembangan kurikulum Program Keahlian Teknik Pemesinan adalah Standar Kompetensi Kerja NasionalIndonesia (SKKNI) pada Bidang Industri Logam dan Mesin. Standar kompetensi dan level kualifikasi keahlian Teknik Pemesinan dapat digambarkan sebagai berikut :&nbsp;</p>\n<ol>\n<li style=\"text-align: justify;\">Memahami dasar kekuatan bahan dan komponen mesin</li>\n<li style=\"text-align: justify;\">Memahami prinsip dasar kelistrikan dan konversi energi</li>\n<li style=\"text-align: justify;\">Memahami proses dasar perlakuan logam</li>\n<li style=\"text-align: justify;\">Memahami proses dasar teknik mesin</li>\n<li style=\"text-align: justify;\">Menerapkan keselamatan dan kesehatan kerja (K3)</li>\n<li style=\"text-align: justify;\">Menggunakan peralatan pembandingan dan/atau alat ukur dasar</li>\n<li style=\"text-align: justify;\">Mengukur dengan alat ukur mekanik presisi</li>\n<li style=\"text-align: justify;\">Menggunakan perkakas bertenaga/operasi digenggam</li>\n<li style=\"text-align: justify;\">Menggunakan perkakas tangan</li>\n<li style=\"text-align: justify;\">Menginterpretasikan sketsa</li>\n<li style=\"text-align: justify;\">Melaksanakan penanganan material secara manual</li>\n<li style=\"text-align: justify;\">Menggunakan mesin untuk operasi dasar</li>\n<li style=\"text-align: justify;\">Membaca gambar teknik</li>\n<li style=\"text-align: justify;\">Melakukan pekerjaan dengan mesin bubut</li>\n<li style=\"text-align: justify;\">Melakukan pekerjaan dengan mesin frais</li>\n<li style=\"text-align: justify;\">Melakukan pekerjaan dengan mesin gerinda</li>\n<li style=\"text-align: justify;\">Mengeset mesin dan program mesin NC/CNC (dasar)</li>\n<li style=\"text-align: justify;\">Memprogram mesin NC/CNC (dasar)</li>\n<li style=\"text-align: justify;\">Menggunakan mesin bubut (kompleks)</li>\n<li style=\"text-align: justify;\">Memfrais (kompleks)</li>\n<li style=\"text-align: justify;\">Menggerinda pahat dan alat potong</li>\n<li style=\"text-align: justify;\">Mengoperasikan mesin NC/CNC (Dasar)</li>\n<li style=\"text-align: justify;\">Mengelas dengan proses las busur metal manual</li>\n<li style=\"text-align: justify;\">Mengelas dengan proses las oksi-asetilen</li>\n<li style=\"text-align: justify;\">Kerja Plat Dasar</li>\n<li style=\"text-align: justify;\">Menggambar 2 D dengan sistem CAD</li>\n<li style=\"text-align: justify;\">Menggambar 3D dengan sistem CAD</li>\n</ol>', NULL, 7, NULL, 'page', 'publish', 'public', 'open', 'teknik-kendaraan-ringan-otomotif', NULL, 0, '2019-04-03 10:48:56', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(24, 'Jadwal MID Semester Kelas X & XII', '<p>Diberitahukan Kepada Seluruh Siswa/i SMK Medai Utama bahwa Mid Semester TA. 2018/2019 akan dilaksanakan pada tanggal 4-9 April 2019.</p>', '5c3c83559ddae38d67ad51d4eaaf7256.jpg', 7, '1', 'post', 'publish', 'public', 'open', 'jadwal-mid-semester-kelas-x-xii', '', 0, '2019-04-24 15:19:02', '2019-04-24 15:49:17', NULL, NULL, 7, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Kegiatan Sekolah', 'kegiatan-sekolah', 'Penting', '2018-04-02 01:52:00', '2019-04-24 14:58:55', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(2, 'Berita', 'berita', NULL, '2019-03-27 02:56:05', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false'),
(3, 'Dunia SMK', 'dunia-smk', NULL, '2019-03-27 02:58:04', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'false',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `quote_by` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `url` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `quote_by`, `status`, `url`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'SMK Putra Anda melaksanakan Pendidikan Berkarakter', 'Pendidikan Karakter', 'graduation-cap', 'read/2/pendidikan-karakter', '2018-06-22 01:23:34', '2019-03-27 03:43:57', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(2, 'Ujian CBT sudah diterapkan sejak Tahun 2018', 'Computer Based Test', 'desktop', 'read/11/computer-base-test', '2018-06-22 01:32:26', '2019-04-03 08:30:21', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(3, 'E-Lerning dengan sistem online yang lebih mudah diakses.', 'E-Learning', 'book', 'read/13/e-learning', '2018-06-25 23:23:11', '2019-04-03 09:07:14', NULL, NULL, 1, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `registration_phases`
--

CREATE TABLE `registration_phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL DEFAULT '0000' COMMENT 'Tahun PPDB',
  `phase` varchar(255) NOT NULL COMMENT 'Gelombang / Fase Pendaftaran',
  `start_date` date DEFAULT NULL COMMENT 'Tanggal Mulai',
  `end_date` date DEFAULT NULL COMMENT 'Tanggal Selesai',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration_phases`
--

INSERT INTO `registration_phases` (`id`, `year`, `phase`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 2019, 'Gelombang 1', '2019-03-27', '2019-07-31', '2019-03-27 04:47:37', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `registration_quotas`
--

CREATE TABLE `registration_quotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL DEFAULT '0000' COMMENT 'Tahun PPDB',
  `major_id` bigint(20) DEFAULT '0' COMMENT 'Program Keahlian',
  `quota` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Kuota yang diterima secara keseluruhan',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration_quotas`
--

INSERT INTO `registration_quotas` (`id`, `year`, `major_id`, `quota`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 2019, 1, 150, '2018-06-22 22:17:47', '2019-03-27 04:48:41', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(2, 2019, 2, 90, '2018-06-22 22:17:59', '2019-03-27 04:49:08', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(3, 2019, 3, 90, '2019-03-27 04:49:36', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL DEFAULT '0',
  `type` bigint(20) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `start_year` year(4) NOT NULL DEFAULT '0000',
  `end_year` year(4) NOT NULL DEFAULT '0000',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `student_id`, `type`, `description`, `start_year`, `end_year`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 2, 1, 'Nama beasiswa', 2018, 2019, '2018-06-30 23:04:32', NULL, NULL, NULL, 2, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(100) NOT NULL,
  `variable` varchar(255) DEFAULT NULL,
  `value` text,
  `default` text,
  `group_access` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `variable`, `value`, `default`, `group_access`, `description`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'general', 'site_maintenance', 'false', 'false', 'public, student, employee, administrator, super_user', 'Pemeliharaan situs', '2018-04-02 01:51:58', '2018-06-22 11:30:54', NULL, NULL, NULL, 1, NULL, NULL, 'false'),
(2, 'general', 'site_maintenance_end_date', '2019-03-28', '2017-01-01', 'public, student, employee, administrator, super_user', 'Tanggal Berakhir Pemeliharaan Situs', '2018-04-02 01:51:58', '2019-03-28 15:10:04', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(3, 'general', 'site_cache', NULL, 'false', 'public, student, employee, administrator, super_user', 'Cache situs', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, 'general', 'site_cache_time', NULL, '10', 'public, student, employee, administrator, super_user', 'Lama Cache Situs', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(5, 'general', 'meta_description', 'Content Management System dan PPDB Online untuk SMK', 'CMS Sekolahku adalah Content Management System dan PPDB Online gratis untuk SD SMP/Sederajat SMA/Sederajat', 'public, student, employee, administrator, super_user', 'Deskripsi Meta', '2018-04-02 01:51:58', '2019-03-28 15:07:52', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(6, 'general', 'meta_keywords', NULL, 'CMS, Website Sekolah Gratis, Cara Membuat Website Sekolah, membuat web sekolah, contoh website sekolah, fitur website sekolah, Sekolah, Website, Internet,Situs, CMS Sekolah, Web Sekolah, Website Sekolah Gratis, Website Sekolah, Aplikasi Sekolah, PPDB Online, PSB Online, PSB Online Gratis, Penerimaan Siswa Baru Online, Raport Online, Kurikulum 2013, SD, SMP, SMA, Aliyah, MTs, SMK', 'public, student, employee, administrator, super_user', 'Kata Kunci Meta', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(7, 'general', 'google_map_api_key', NULL, 'AIzaSyDmiycFxzYZ37FOwA4wqSbL3z2YvIYIArw', 'public, student, employee, administrator, super_user', 'API Key Google Map', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(8, 'general', 'latitude', NULL, '-6.2407311', 'public, student, employee, administrator, super_user', 'Latitude', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(9, 'general', 'longitude', NULL, '106.9972892', 'public, student, employee, administrator, super_user', 'Longitude', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(10, 'general', 'favicon', '8d86511d5172faf2eaca62c1a4f8ac7c.png', 'favicon.png', 'public, student, employee, administrator, super_user', 'Favicon', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(11, 'general', 'header', NULL, 'header.png', 'public, student, employee, administrator, super_user', 'Gambar Header', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(12, 'general', 'recaptcha_site_key', '6LcItpwUAAAAAOPoLaCQ9wqfKjTUmCnaiqRfFwN2', '6LeNCTAUAAAAAADTbL1rDw8GT1DF2DUjVtEXzdMu', 'public', 'Recaptcha Site Key', '2018-04-02 01:51:58', '2019-04-07 15:38:24', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(13, 'general', 'recaptcha_secret_key', '6LcItpwUAAAAAGT7Yu5ngKD04zwzdYlpQ2VL1j8w', '6LeNCTAUAAAAAGq8O0ItkzG8fsA9KeJ7mFMMFF1s', '', 'Recaptcha Secret Key', '2018-04-02 01:51:58', '2019-04-07 15:38:36', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(14, 'general', 'timezone', NULL, 'Asia/Jakarta', 'public, student, employee, administrator, super_user', 'Time Zone', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(15, 'media', 'file_allowed_types', NULL, 'jpg, jpeg, png, gif', 'public, student, employee, administrator, super_user', 'Tipe file yang diizinkan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(16, 'media', 'upload_max_filesize', NULL, '0', 'public, student, employee, administrator, super_user', 'Maksimal Ukuran File yang Diupload', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(17, 'media', 'thumbnail_size_height', NULL, '100', 'administrator, super_user', 'Tinggi Gambar Thumbnail', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(18, 'media', 'thumbnail_size_width', NULL, '150', 'administrator, super_user', 'Lebar Gambar Thumbnail', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(19, 'media', 'medium_size_height', NULL, '308', 'administrator, super_user', 'Tinggi Gambar Sedang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(20, 'media', 'medium_size_width', NULL, '460', 'administrator, super_user', 'Lebar Gambar Sedang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(21, 'media', 'large_size_height', NULL, '600', 'administrator, super_user', 'Tinggi Gambar Besar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(22, 'media', 'large_size_width', NULL, '800', 'administrator, super_user', 'Lebar Gambar Besar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(23, 'media', 'album_cover_height', NULL, '250', 'administrator, super_user', 'Tinggi Cover Album Photo', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(24, 'media', 'album_cover_width', NULL, '400', 'administrator, super_user', 'Lebar Cover Album Photo', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(25, 'media', 'banner_height', NULL, '81', 'administrator, super_user', 'Tinggi Iklan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(26, 'media', 'banner_width', NULL, '245', 'administrator, super_user', 'Lebar Iklan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(27, 'media', 'image_slider_height', NULL, '790', 'administrator, super_user', 'Tinggi Gambar Slide', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(28, 'media', 'image_slider_width', NULL, '1920', 'administrator, super_user', 'Lebar Gambar Slide', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(29, 'media', 'student_photo_height', NULL, '170', 'public, student, employee, administrator, super_user', 'Tinggi Photo Peserta Didik', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(30, 'media', 'student_photo_width', NULL, '113', 'public, student, employee, administrator, super_user', 'Lebar Photo Peserta Didik', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(31, 'media', 'employee_photo_height', NULL, '170', 'employee, administrator, super_user', 'Tinggi Photo Guru dan Tenaga Kependidikan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(32, 'media', 'employee_photo_width', NULL, '113', 'employee, administrator, super_user', 'Lebar Photo Guru dan Tenaga Kependidikan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(33, 'media', 'headmaster_photo_height', NULL, '170', 'administrator, super_user', 'Tinggi Photo Kepala Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(34, 'media', 'headmaster_photo_width', NULL, '113', 'administrator, super_user', 'Lebar Photo Kepala Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(35, 'media', 'header_height', NULL, '80', 'administrator, super_user', 'Tinggi Gambar Header', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(36, 'media', 'header_width', NULL, '200', 'administrator, super_user', 'Lebar Gambar Header', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(37, 'media', 'logo_height', NULL, '120', 'administrator, super_user', 'Tinggi Logo Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(38, 'media', 'logo_width', NULL, '120', 'administrator, super_user', 'Lebar Logo Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(39, 'writing', 'default_post_category', NULL, '1', 'student, employee, administrator, super_user', 'Default Kategori Tulisan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(40, 'writing', 'default_post_status', NULL, 'publish', 'student, employee, administrator, super_user', 'Default Status Tulisan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(41, 'writing', 'default_post_visibility', NULL, 'public', 'student, employee, administrator, super_user', 'Default Akses Tulisan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(42, 'writing', 'default_post_discussion', NULL, 'open', 'student, employee, administrator, super_user', 'Default Komentar Tulisan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(43, 'writing', 'post_image_thumbnail_height', NULL, '100', 'student, employee, administrator, super_user', 'Tinggi Gambar Kecil', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(44, 'writing', 'post_image_thumbnail_width', NULL, '150', 'student, employee, administrator, super_user', 'Lebar Gambar Kecil', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(45, 'writing', 'post_image_medium_height', NULL, '250', 'student, employee, administrator, super_user', 'Tinggi Gambar Sedang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(46, 'writing', 'post_image_medium_width', NULL, '400', 'student, employee, administrator, super_user', 'Lebar Gambar Sedang', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(47, 'writing', 'post_image_large_height', NULL, '450', 'student, employee, administrator, super_user', 'Tinggi Gambar Besar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(48, 'writing', 'post_image_large_width', NULL, '840', 'student, employee, administrator, super_user', 'Lebar Gambar Besar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(49, 'reading', 'post_per_page', NULL, '10', 'public, student, employee, administrator, super_user', 'Tulisan per halaman', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(50, 'reading', 'post_rss_count', NULL, '10', 'public, student, employee, administrator, super_user', 'Jumlah RSS', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(51, 'reading', 'post_related_count', NULL, '10', 'public, student, employee, administrator, super_user', 'Jumlah Tulisan Terkait', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(52, 'reading', 'comment_per_page', NULL, '10', 'public, student, employee, administrator, super_user', 'Komentar per halaman', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(53, 'discussion', 'comment_moderation', NULL, 'false', 'administrator, super_user', 'Komentar harus disetujui secara manual', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(54, 'discussion', 'comment_registration', NULL, 'false', 'public, student, employee, administrator, super_user', 'Pengguna harus terdaftar dan login untuk komentar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(55, 'discussion', 'comment_blacklist', NULL, 'kampret', 'public, student, employee, administrator, super_user', 'Komentar disaring', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(56, 'discussion', 'comment_order', NULL, 'asc', 'public, student, employee, administrator, super_user', 'Urutan Komentar', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(57, 'social_account', 'facebook', 'https://www.facebook.com/', '', 'public, student, employee, administrator, super_user', 'Facebook', '2018-04-02 01:51:58', '2019-04-24 16:04:31', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(58, 'social_account', 'twitter', NULL, '', 'public, student, employee, administrator, super_user', 'Twitter', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(59, 'social_account', 'google_plus', NULL, '', 'public, student, employee, administrator, super_user', 'Google Plus', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(60, 'social_account', 'linked_in', NULL, '', 'public, student, employee, administrator, super_user', 'Linked In', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(61, 'social_account', 'youtube', NULL, '', 'public, student, employee, administrator, super_user', 'Youtube', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(62, 'social_account', 'instagram', 'https://www.instagram.', '', 'public, student, employee, administrator, super_user', 'Instagram', '2018-04-02 01:51:58', '2019-04-24 16:04:36', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(66, 'school_profile', 'npsn', NULL, '123', 'public, student, employee, administrator, super_user', 'NPSN', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(67, 'school_profile', 'school_name', 'SMK Media Utama', 'SMA Negeri 9 Kuningan', 'public, student, employee, administrator, super_user', 'Nama Sekolah', '2018-04-02 01:51:58', '2019-04-24 16:05:25', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(68, 'school_profile', 'headmaster', 'Drs. H. Syafrizal, S.Pd', 'Anton Sofyan', 'public, student, employee, administrator, super_user', 'Kepala Sekolah', '2018-04-02 01:51:58', '2019-03-27 02:21:53', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(69, 'school_profile', 'headmaster_photo', '60534a74dd249ccfec329b6a2989be04.jpg', 'headmaster_photo.png', 'public, student, employee, administrator, super_user', 'Photo Kepala Sekolah', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(70, 'school_profile', 'school_level', NULL, '3', 'public, student, employee, administrator, super_user', 'Bentuk Pendidikan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(71, 'school_profile', 'school_status', '2', '1', 'public, student, employee, administrator, super_user', 'Status Sekolah', '2018-04-02 01:51:58', '2019-03-27 02:24:09', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(72, 'school_profile', 'ownership_status', NULL, '1', 'administrator, super_user', 'Status Kepemilikan', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(73, 'school_profile', 'decree_operating_permit', NULL, '-', 'administrator, super_user', 'SK Izin Operasional', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(74, 'school_profile', 'decree_operating_permit_date', NULL, '2018-04-02', 'administrator, super_user', 'Tanggal SK Izin Operasional', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(75, 'school_profile', 'tagline', 'Kami mengucapkan terimakasih atas kunjungan anda di website kami. Website ini berisi informasi profil sekolah, penerimaan peserta didik baru, kehidupan sekolah, informasi alumni dan berita terkini di SMK Media Utama', 'Where Tomorrow\'s Leaders Come Together', 'public, student, employee, administrator, super_user', 'Slogan', '2018-04-02 01:51:58', '2019-04-24 16:05:51', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(76, 'school_profile', 'rt', '-', '12', 'public, student, employee, administrator, super_user', 'RT', '2018-04-02 01:51:58', '2019-03-27 02:40:34', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(77, 'school_profile', 'rw', '-', '06', 'public, student, employee, administrator, super_user', 'RW', '2018-04-02 01:51:58', '2019-03-27 02:40:39', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(78, 'school_profile', 'sub_village', '-', 'Wage', 'public, student, employee, administrator, super_user', 'Dusun', '2018-04-02 01:51:58', '2019-03-27 02:40:51', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(79, 'school_profile', 'village', 'Satria', 'Kadugede', 'public, student, employee, administrator, super_user', 'Kelurahan / Desa', '2018-04-02 01:51:58', '2019-03-27 02:41:04', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(80, 'school_profile', 'sub_district', '-', 'Kadugede', 'public, student, employee, administrator, super_user', 'Kecamatan', '2018-04-02 01:51:58', '2019-03-27 02:40:46', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(81, 'school_profile', 'district', 'Kota', 'Kuningan', 'public, student, employee, administrator, super_user', 'Kabupaten', '2018-04-02 01:51:58', '2019-04-24 16:04:52', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(82, 'school_profile', 'postal_code', '90714', '45561', 'public, student, employee, administrator, super_user', 'Kode Pos', '2018-04-02 01:51:58', '2019-04-24 16:05:19', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(83, 'school_profile', 'street_address', 'Jl. W.R Mongonsidi', 'Jalan Raya Kadugede No. 11', 'public, student, employee, administrator, super_user', 'Alamat Jalan', '2018-04-02 01:51:58', '2019-04-24 16:05:36', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(84, 'school_profile', 'phone', '081182747111', '0232123456', 'public, student, employee, administrator, super_user', 'Telepon', '2018-04-02 01:51:58', '2019-04-24 16:05:13', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(85, 'school_profile', 'fax', '(061)8827666', '0232123456', 'public, student, employee, administrator, super_user', 'Fax', '2018-04-02 01:51:58', '2019-03-27 02:42:13', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(86, 'school_profile', 'email', 'info@putri.sch.id', 'info@sman9kuningan.sch.id', 'public, student, employee, administrator, super_user', 'Email', '2018-04-02 01:51:58', '2019-04-24 16:04:59', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(87, 'school_profile', 'website', 'https://mediautama.sch.id', 'http://www.sman9kuningan.sch.id', 'public, student, employee, administrator, super_user', 'Website', '2018-04-02 01:51:58', '2019-04-24 16:06:14', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(88, 'school_profile', 'logo', NULL, 'logo.png', 'public, student, employee, administrator, super_user', 'Logo', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(89, 'admission', 'admission_status', NULL, 'open', 'public, student, employee, administrator, super_user', 'Status Penerimaan Peserta Didik Baru', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(90, 'admission', 'admission_year', '2019', '2018', 'public, student, employee, administrator, super_user', 'Tahun Penerimaan Peserta Didik Baru', '2018-04-02 01:51:58', '2019-03-27 02:42:45', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(91, 'admission', 'admission_start_date', '2019-03-27', '2017-01-01', 'public, student, employee, administrator, super_user', 'Tanggal Mulai PPDB', '2018-04-02 01:51:58', '2019-03-27 02:43:42', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(92, 'admission', 'admission_end_date', '2019-07-31', '2017-12-31', 'public, student, employee, administrator, super_user', 'Tanggal Selesai PPDB', '2018-04-02 01:51:58', '2019-03-27 02:43:26', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(93, 'admission', 'announcement_start_date', '2019-03-27', '2017-01-01', 'public, student, employee, administrator, super_user', 'Tanggal Mulai Pengumuman Hasil Seleksi PPDB', '2018-04-02 01:51:58', '2019-03-27 02:44:10', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(94, 'admission', 'announcement_end_date', '2019-06-30', '2017-12-31', 'public, student, employee, administrator, super_user', 'Tanggal Selesai Pengumuman Hasil Seleksi PPDB', '2018-04-02 01:51:58', '2019-03-27 02:43:59', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(95, 'mail_server', 'sendgrid_username', 'smkputraanda', '', 'administrator, super_user', 'Sendgrid Username', '2018-06-21 12:11:52', '2019-04-07 15:36:26', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(96, 'mail_server', 'sendgrid_password', 'SMKBISA123', '', 'administrator, super_user', 'Sendgrid Password', '2018-06-21 12:11:52', '2019-04-07 15:35:59', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(97, 'mail_server', 'sendgrid_api_key', 'PdA0qY9LRIGSz0v296-yWQ', '', 'administrator, super_user', 'Sendgrid API Key', '2018-06-21 12:11:52', '2019-04-07 15:35:30', NULL, NULL, NULL, 7, NULL, NULL, 'false'),
(98, 'media', 'image_headmaster_height', NULL, '280', 'administrator, super_user', 'Tinggi Gambar Headmaster', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(99, 'media', 'image_headmaster_width', NULL, '270', 'administrator, super_user', 'Lebar Gambar Headmaster', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(100, 'media', 'image_testimoni_height', NULL, '92', 'administrator, super_user', 'Tinggi Gambar Testimoni', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(101, 'media', 'image_testimoni_width', NULL, '92', 'administrator, super_user', 'Lebar Gambar Testimoni', '2018-04-02 01:51:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major_id` bigint(20) DEFAULT NULL COMMENT 'Jurusan / Program Keahlian',
  `first_choice` bigint(20) DEFAULT '0' COMMENT 'Pilihan Pertama PPDB',
  `second_choice` bigint(20) DEFAULT '0' COMMENT 'Pilihan Kedua PPDB',
  `registration_number` varchar(10) DEFAULT NULL COMMENT 'Nomor Pendaftaran',
  `selection_result` varchar(100) DEFAULT NULL COMMENT 'Hasil Seleksi PPDB',
  `admission_phase_id` bigint(20) DEFAULT '0' COMMENT 'Gelombang Pendaftaran',
  `photo` varchar(100) DEFAULT NULL,
  `is_transfer` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Jenis Pendaftaran : Baru / Pindahan ?',
  `is_prospective_student` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Calon Siswa Baru ?',
  `re_registration` enum('true','false') DEFAULT NULL COMMENT 'Konfirmasi Pendaftaran Ulang Calon Siswa Baru',
  `is_alumni` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Alumni ?',
  `is_student` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Student Aktif ?',
  `start_date` date DEFAULT NULL COMMENT 'Tanggal Masuk Sekolah',
  `nim` varchar(50) DEFAULT NULL COMMENT 'Nomor Induk Mahasiswa',
  `nis` varchar(50) DEFAULT NULL COMMENT 'Nomor Induk Siswa',
  `nisn` varchar(50) DEFAULT NULL COMMENT 'Nomor Induk Siswa Nasional',
  `nik` varchar(50) DEFAULT NULL COMMENT 'Nomor Induk Kependudukan / KTP',
  `prev_exam_number` varchar(50) DEFAULT NULL COMMENT 'Nomor Peserta Ujian Sebelumnya',
  `paud` enum('true','false') DEFAULT NULL COMMENT 'Apakah pernah PAUD',
  `tk` enum('true','false') DEFAULT NULL COMMENT 'Apakah pernah TK',
  `skhun` varchar(50) DEFAULT NULL COMMENT 'No. Seri Surat Keterangan Hasil Ujian Nasional Sebelumnya',
  `diploma_number` varchar(50) DEFAULT NULL COMMENT 'No. Seri Ijazah Sebelumnya',
  `hobby` varchar(255) DEFAULT NULL,
  `ambition` varchar(255) DEFAULT NULL COMMENT 'Cita-cita',
  `full_name` varchar(150) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `religion` bigint(20) DEFAULT NULL,
  `special_needs` bigint(20) DEFAULT NULL COMMENT 'Berkeburuhan Khusus',
  `street_address` varchar(255) DEFAULT NULL COMMENT 'Alamat Jalan',
  `rt` varchar(10) DEFAULT NULL COMMENT 'Alamat Jalan',
  `rw` varchar(10) DEFAULT NULL COMMENT 'Alamat Jalan',
  `sub_village` varchar(255) DEFAULT NULL COMMENT 'Nama Dusun',
  `village` varchar(255) DEFAULT NULL COMMENT 'Nama Kelurahan/ Desa',
  `sub_district` varchar(255) DEFAULT NULL COMMENT 'Kecamatan',
  `district` varchar(255) DEFAULT NULL COMMENT 'Kabupaten',
  `postal_code` varchar(20) DEFAULT NULL COMMENT 'Kode POS',
  `residence` bigint(20) DEFAULT NULL COMMENT 'Tempat Tinggal',
  `transportation` bigint(20) DEFAULT NULL COMMENT 'Moda Transportasi',
  `phone` varchar(50) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sktm` varchar(100) DEFAULT NULL COMMENT 'Surat Keterangan Tidak Mampu (SKTM)',
  `kks` varchar(100) DEFAULT NULL COMMENT 'Kartu Keluarga Sejahtera (KKS)',
  `kps` varchar(100) DEFAULT NULL COMMENT 'Kartu Pra Sejahtera (KPS)',
  `kip` varchar(100) DEFAULT NULL COMMENT 'Kartu Indonesia Pintar (KIP)',
  `kis` varchar(100) DEFAULT NULL COMMENT 'Kartu Indonesia Sehat (KIS)',
  `citizenship` enum('WNI','WNA') NOT NULL DEFAULT 'WNI' COMMENT 'Kewarganegaraan',
  `country` varchar(255) DEFAULT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `father_birth_year` year(4) DEFAULT NULL,
  `father_education` bigint(20) DEFAULT '0',
  `father_employment` bigint(20) DEFAULT '0',
  `father_monthly_income` bigint(20) DEFAULT '0',
  `father_special_needs` bigint(20) DEFAULT '0',
  `mother_name` varchar(150) DEFAULT NULL,
  `mother_birth_year` year(4) DEFAULT NULL,
  `mother_education` bigint(20) DEFAULT NULL,
  `mother_employment` bigint(20) DEFAULT NULL,
  `mother_monthly_income` bigint(20) DEFAULT NULL,
  `mother_special_needs` bigint(20) DEFAULT NULL,
  `guardian_name` varchar(150) DEFAULT NULL,
  `guardian_birth_year` year(4) DEFAULT NULL,
  `guardian_education` bigint(20) DEFAULT NULL,
  `guardian_employment` bigint(6) DEFAULT NULL,
  `guardian_monthly_income` bigint(20) DEFAULT NULL,
  `mileage` smallint(6) DEFAULT NULL COMMENT 'Jarak tempat tinggal ke sekolah',
  `traveling_time` smallint(6) DEFAULT NULL COMMENT 'Waktu Tempuh',
  `height` smallint(3) DEFAULT NULL COMMENT 'Tinggi Badan',
  `weight` smallint(3) DEFAULT NULL COMMENT 'Berat Badan',
  `sibling_number` smallint(2) DEFAULT '0' COMMENT 'Jumlah Saudara Kandng',
  `student_status` bigint(20) DEFAULT NULL COMMENT 'Status siswa',
  `end_date` date DEFAULT NULL COMMENT 'Tanggal Keluar',
  `reason` varchar(255) DEFAULT NULL COMMENT 'Diisi jika peserta didik sudah keluar',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `major_id`, `first_choice`, `second_choice`, `registration_number`, `selection_result`, `admission_phase_id`, `photo`, `is_transfer`, `is_prospective_student`, `re_registration`, `is_alumni`, `is_student`, `start_date`, `nim`, `nis`, `nisn`, `nik`, `prev_exam_number`, `paud`, `tk`, `skhun`, `diploma_number`, `hobby`, `ambition`, `full_name`, `gender`, `birth_place`, `birth_date`, `religion`, `special_needs`, `street_address`, `rt`, `rw`, `sub_village`, `village`, `sub_district`, `district`, `postal_code`, `residence`, `transportation`, `phone`, `mobile_phone`, `email`, `sktm`, `kks`, `kps`, `kip`, `kis`, `citizenship`, `country`, `father_name`, `father_birth_year`, `father_education`, `father_employment`, `father_monthly_income`, `father_special_needs`, `mother_name`, `mother_birth_year`, `mother_education`, `mother_employment`, `mother_monthly_income`, `mother_special_needs`, `guardian_name`, `guardian_birth_year`, `guardian_education`, `guardian_employment`, `guardian_monthly_income`, `mileage`, `traveling_time`, `height`, `weight`, `sibling_number`, `student_status`, `end_date`, `reason`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, NULL, 0, 0, NULL, NULL, 0, NULL, 'true', 'false', NULL, 'true', 'false', '2018-07-01', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, '', '', 'Niko Saputra', 'M', '1', '2018-07-01', 89, 23, '', '', '', '', '', '', '', '', 74, 80, '', '', 'ernairawati@sma-karyabudi.sch.id', '', '', '', '', '', 'WNI', '', '', 0000, 42, 10, 68, 23, '', 0000, 42, 10, 68, 23, '', 0000, 42, 10, 68, 0, 0, 0, 0, 0, 1, '0000-00-00', '', '2018-06-30 22:59:50', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'false'),
(2, NULL, 0, 0, NULL, NULL, 0, NULL, 'false', 'false', NULL, 'false', 'true', NULL, NULL, '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Niko Saputra', 'M', 'Bandung', '1990-01-01', NULL, NULL, 'Cibiru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345@sman9kuningan.sch.id', NULL, NULL, NULL, NULL, NULL, 'WNI', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2018-06-30 23:01:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, NULL, 1, 2, '2019000001', NULL, 1, '7cd7e3cc035b1a01f1889076d28cf221.jpg', 'false', 'true', 'false', 'false', 'false', NULL, NULL, NULL, '1234', '123456', '123', '', '', '1234', '12345', 'we', 'qw', 'wawan', 'M', 'desa', '2006-02-07', 89, 23, 'stabat', '23', '12', '12', '3', 'dede', 'dwdw', '3423', 74, 80, '0616762736', '08117652767', 'syaiful_bahri28@ymail.com', '12', '12', '12', '12', '12', 'WNI', '', 'rere', 0000, 42, 10, 69, 24, 'qw', 0000, 42, 10, 68, 24, 'yuyu', 0000, 42, 11, 72, 34, 34, 123, 90, 3, NULL, NULL, NULL, '2019-04-07 15:41:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'false',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `slug`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Berita', 'berita', '2018-04-02 01:52:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(2, 'Pengumuman', 'pengumuman', '2018-04-02 01:52:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(3, 'Sekilas Info', 'sekilas-info', '2018-04-02 01:52:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(4, 'sekilas-info', 'sekilas-info', '2019-03-27 02:56:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) NOT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `caption`, `deskripsi`, `status`, `image`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Dimas Asmawi', 'SMK Media Utama  guru-gurunya baik-baik. Tidak menyesal pernah bersekolah di SMK Media Utama', 'Alumni RPL 2015', 'e974f2e7b520c59c666ca1b35af24aa7.jpg', '2018-06-25 22:27:07', '2019-04-24 16:02:27', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(2, 'Agung', 'SMK Media Utama  sangat menjunjung tinggi ilmu Agama Islam yang saya peroleh dari Ekskul SRIPA (Study Remaja Islam). Terima Kasih SMK Media Utama , Jaya Selalu', 'Alumni TKJ 2015', 'c5b4b75d566a003f4b81445272ee9c73.jpg', '2018-06-25 23:07:08', '2019-04-24 16:02:52', NULL, NULL, 1, 7, NULL, NULL, 'false'),
(3, 'Fatma', 'Terima Kasih SMK Media Utama  telah membimbing saya selama 3 tahun dan membimbing saya hingga juara 1 LKS tahun 2019. SMK Bisa. Media Utama  Jaya.', 'Alumni TKJ 2015', NULL, '2019-03-28 15:02:43', '2019-04-24 16:03:04', NULL, NULL, 7, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_name` varchar(255) NOT NULL,
  `theme_folder` varchar(255) DEFAULT NULL,
  `theme_author` varchar(255) DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'false',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_name`, `theme_folder`, `theme_author`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(5, 'Academics', 'academics', 'Syaiful Bahri', 'true', '2018-06-21 22:28:50', '2019-03-27 07:52:27', NULL, NULL, 1, 7, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_full_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_url` varchar(100) DEFAULT NULL,
  `biography` text,
  `user_registered` datetime DEFAULT NULL,
  `user_group_id` bigint(20) NOT NULL DEFAULT '0',
  `user_type` enum('super_user','administrator','employee','student') NOT NULL DEFAULT 'administrator',
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'student_id OR employee_id',
  `forgot_password_key` varchar(100) DEFAULT NULL,
  `forgot_password_request_date` date DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'true',
  `is_logged_in` enum('true','false') DEFAULT 'false',
  `last_logged_in` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_full_name`, `user_email`, `user_url`, `biography`, `user_registered`, `user_group_id`, `user_type`, `profile_id`, `forgot_password_key`, `forgot_password_request_date`, `is_active`, `is_logged_in`, `last_logged_in`, `ip_address`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'administrator', '$2y$10$qYoLTZ7xu/a8aolHh59NouP3Eaq1ESEtqiC3HWYi0/WzGEq9plzFa', 'Administrator', 'syaifulpb13@gmail.com', 'www.sekolah.penelitianku.com', NULL, '2018-04-02 08:51:59', 0, 'super_user', NULL, '543161942e3fecc9d269cd594dbd08f73207ec58', NULL, 'true', 'true', '2018-07-11 17:58:22', '::1', '2018-04-01 18:51:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false'),
(2, '12345', '$2y$10$5x1rEaFKbafQ8fgQsFmWGOx1it6jVHRSeFdMjEotNhm972F4lMxHC', 'Niko Saputra', 'syaifulpb11@gmail.com', NULL, NULL, '2018-07-01 06:01:26', 0, 'student', 2, NULL, NULL, 'true', 'false', '2019-03-27 09:14:30', '150.107.137.28', '2018-06-30 23:01:26', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'false'),
(7, 'Admin', '$2y$10$5x1rEaFKbafQ8fgQsFmWGOx1it6jVHRSeFdMjEotNhm972F4lMxHC', 'mediautama', 'syaifulpb14@gmail.com', NULL, NULL, '2018-07-01 06:01:26', 0, 'super_user', 2, NULL, NULL, 'true', 'true', '2019-05-02 10:44:46', '203.130.195.18', '2018-06-30 23:01:26', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) NOT NULL,
  `module_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `restored_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `restored_by` bigint(20) DEFAULT NULL,
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `_sessions`
--

CREATE TABLE `_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_sessions`
--

INSERT INTO `_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('bfpdu7t09sbbnbdf6rlrfgiepiti13pp', '203.130.195.18', 1556768689, 0x6d4c417058634672314841674a6f2d61684f5776616434366b7a466c383177377346474146674a5a32555a4534384b51755069637932566a67367641447955364e5650775a57344676744866696f776f7a765f4a33746a4f69736d726e366e5a5a685a4533735839644248425a36686a2d4553737558466e5a464d6d3256773547767752386b50356f4b734a5448736636655f51376c4f6f623676367a697a72577a735477647a354161634974696c6e796d7048335a784467705862686d77446b656931546d5574357366717163324b475f48556b4850305a677730684e3355624e374a4b39534b6d32595067525551495a5054573044333662392d7a5831756477476b4c7876615373655056493873546c447a44736a48464d7933306a517a323965617148486930514a54414167666a44613435516737716d367a6d3647746a755543737144654d59624a484b7a3154424b4b48723679726247494f5754516b5f4b6e62765651685447376a752d67547266755a7a67547a67332d46524c715131686c62756a76554c4f4f5838624d7a38744d37363877376c4e61464d326747376e3472466466536a50697a6633717572566337764577326259367933354576753573664f5566306f56344a484a68534d70766e4972317551356a41666171624e6232464473572d61764d554a41395a4f4b47627474633944316258564a2d556457644f474269744b766546596869463634496a734c6167655331647235344d6d4c63514d5747724e356d466b49426e595f356c704b504936513661796b4262743033616971646b6163752d746751525a486f6a636f684f49577931763552717a4c7847557362457a7464782d554e51716154497250464b30746e7763616544554864726f3738617a5750743350635030724946413057316e444b5f3053396434485976526b52797a5a63344f564d7a744861666f55635045477263334f3879666b39395f59312d3262532d6b714c4e4435527776757656584b69415a354976793754414c716e4367344974724352786e5a6a344b557567514a375873434c5f4535544a7150734f477a2d75356b5f304b674b74373147467a674c7458364b386161644479542d4c4f327145464143575045554354514c704a346e56684c433854704d79677745355f4777554a643866514d4143377039414343424b6a32664436436247556f687a57382d7a53643455795f57656f514b6a7171794663414341786c762d516e464c62755f615130353752303446513952584144525f646435476a55546d523547654452416852466e63525462466a57356f4a353533414c48577173566d5a4a4635354647656777454e6d55443179375042784a36666e417134515348785072383037486b493057332d5754356d736b6266696e6a5265353537456f694e46772d71385551705678357931564431615a32752d426c7a386f5835384e756e31526771363166725f5a3544537672504a5a71427239554964314f5956555f6e5a326f6630716c75596a71435839755669486e54746670774b7a6b5a785a5035795173513745587a6d4b5a59385132732d78662d4e79384f5a317354456938324f48397461754e714b6c7a315833666d6835443746704b43586275324944564d41735a5046764f4e71766e4e31627943615170426f4b7a596d56674e6256304e532d54692d62524d516338683930724c516848334d5973475233394a557a6b522d634d474c396d5a76324c6a674e67596264766d6c73543363754e7365795262415a74475a52494279776a6c6165655677355864514c64593473456474484470475653756a55694d6c326d6e6e374d5546764335746b73703348506372623949664464624134366637323245474b7648456c3172594b4f6a46454661502d4a6d7a6c66506b597946774135584e6a4f6752355a4c4371746c626b3675354157747878435039663348513479776365414e50413547666a54477a446678796970524a63704763446a346f5872774944717446364445397333757736385162484b68754a6f79365742332d775158487965684d6f636b47316e54494b6d7a5459586b4132704166734d35324b676a34686b79616f413476436c5a65357349546b6e336d4a63544c3741744f366f33335a4c6b424a4e6f43534d7937666835667367346a437869524155485875654b67495356706f7a6172745f55334d78427675674235326650674966703659483069786c774c466646765933326a4577776c5342397972634e37424a696d64324d55654b746634415658585150644a72394441644e646470394a436e4f477272765879595976447878676e33346a6e3158632d3046487a384a74334f41617a625064616b47625441724a7a374e33506348476444355673426c2d72666230346d585a61493771687366353175302d78726438635f4255564a7748745f436770737756684a32486b337a4233426c364452414638794b5a2d70554e4b4376666e41757564424633424c43764b7139324b6c45694f6d6c30547852784b38667272755f446d4a4b575a594b744d61416e324436477476537873566a627a385974624d313630394a426f526741545f473778466865587338756941485452663532476f51727058717a38775530516d626c6f3743314b39795a314255667a55684b30724236745469773653446958323032774e79474f672d4c567051316376506b4f566d63316f425561636e30793775616f32336a6a34675f59544a6b306e346d63445a6e6d6d73485331467972516b4f4e4270736f575a396b665f6d46517232437a6b353036655a76724a5759432d4b766971775832436d513068435162375552517a676146685f69675f6959564778374b6f71616846634d68306f6d7834674e4575697365794746696b57334b3075677335794e48535962732d48486253456c61424d373535314e727643475251704c4467552d5042676c6443455548415534653178516e483230586b2d4c352d773861554d41646b4d4f4335645733476d6b6661793237415a6b6a4a68466a796f697351714b4c354c66636e7373746a62784c4a4d37376f715a594668543350715f795838792d4a6271486d77697a30327455657a64696a2d5544542d6156354b6168325375545a2d484a5f654a4c5855417634465231483545577544707752455f4345646366366a77566c54742d39377a4f7348413741457641706333444e6b727255545f52685a78755766465563654a67414568437744577770366653564b45645a716250764b336c35496872306c7766544735315072387a73306c69734f51576f687734455738764a4c7a66424264764e42674d676c464e313069456a776c5f68763639593470563544543337367564694d554a71446a45357176386659646e5f5f6143304a323277374e4e4b4145346952516878554556346c5364786b4d424b596645614c4c392d51686a46704b72506b4937596935725141394439305846566c553551356e2d4d644e714e715745585772622d426b504e50394175674b7369655137413453786a49614a41766268744e33593072562d49365871324c43615a7545434348616b433948487434437a456176456c4874717a4f30696d794861387367755a2d5a4c5746587650436f365946345f643136564336386b64353866356e47306b7570365178636972786456467a30744767305a4a4c4d5a656471672d6e68434668504d707876505f58752d5079754e2d65547a537a6e30662d47367153354b684e5138795651744b66535a7675456b50707a4d6a546d387450777630554a64426f5f695868575a643047694674664d4d5146613063456c425f685a3365753543447154746f5a775267546e5262594d753247786768776461734831576b3653414c784d32764b507447506e4635466b6932766634657065746650723453346651374e49533152794446696b4f355f566f564d7241444978793836364243396236732d7a674b54416c765747714a4333797a70762d6d37624f4934332d35767755534e544469783373667632544d526c38744e3255584f4e6d7145786f444b6e5278646c614f42666d424f566c6148306d515446564a486b39547a557963616a55725461494a734b7631324c4d48434b3131494c34437634394c716a47784562707475575749717048674a33786d3355787a5943525a6a304270575f6347704e306868785750774731706341385332334a43387964564730775132776479556977423041684679483836316d4c614972744c5f48506c63636e70564874475235753142387a6c6e5f415445303765527a654d6b76694532654531553172763154535057423157434258764a415f572d474e4e35796179746771497468306c68684c574c4666696f664631376b594a59344f6d665332364c396a734c6a726a35334136666d316b4c792d6f4d6749742d6b687042496c4547617443506b7374353665687a5958414839434c2d77434d6f4f6b6c6f79655f4c5535447846306e377243774e4270385145477457364872514868473563747a6c476d546352557956515255747375754c786b4d685a6d615a5a766e71417a46336b6f317a4a7a676d63617134694c5f4a64304a6a6546496b6f30416a736d38414d6f546c7753377a5257527171356e65414b5448506e76765245333961506b4c65526d6966676449444d6571666c4f316a4f4630686149444e34704b7341446e6b6d77323565526e76365f3957572d5f4b747941664f52734a44766b63353172766a4d5778412d5538546f3333517543505643644e75686c2d754b3371724e42466a542d66647534357662785f777143574e4648555168487034347a6f554d345057455552696c5f6232696933557870683830697447454655505f49327a464f5f3272454a554f6d5f52764b53744e6f6647436b635132597a6677356b416f6d724939576f77524a7a72486e786e473236546b792d444d686f387749436c7653474a356173776c506e444b436b4f4d42515f3839576e784a747a697668303748452d464f727a71484f7456644a6661755855474b6d78513869417a5947416b6650486b5a4968744a4e486e3238457055494245444e6f5563465276326e4e6b5831554b6b476f614c4553576f334f45346a796133754b456c514f2d573444716934736d674537314179436266794a4b5566614e3179574b71597376466b5869506a4856444850626c377944343971305f484a5269334b456d51437367384f69596c6d6a32466a5171457466566357585a513938585752736252706f797247757669544e7a594b6253797133476264785173777a376b32683163695738546a374f7a6d76786c325672696b425a6f635354516953306b3267376567343979666b304e555f68694c584750503954475730495f67755730436757444d35546f463648334b6c743535356e69503261393841315769764b56725257524b784f4e414c6d594e48615f714f3565374443322d594d626b436f304e4a4154456c5a32376d6d645755372d5a726d46724451584f78395752646a4e526e634b366747566f6e6a6c5369326c6b59776a4a332d5a3443566b5f547a3452506e6c4965364a484e77717a4a55306857383231762d554c4d393155444876534631644b422d5249637135505f6d376a306644354756313561764e305f3434546a73534d7739366f53592d6357383862374d464c4b4f715875337332794e34484c5758345033744245366878314e6b71417144696a376f344a3051645451506439307036595f674f34355353506b6d63536c327046315f4b686f5348377147454a586633667a5f494144735a592d4764733761757265555a73783236736a686f4e75744a4d65686139646e7847664c544f63765a53616970664d376e42754d6e576b4f76654a5559356157696441474134713369304d65756137315f6c5f346c785f596b4b637675455a42386b716b465f7032514d74756b3259724c78307669334a75545155454b5f6935384257664c31675a575f413670683735543475614471334e727333474f6b4b37306f4130395266507237466230315f39474972574d737537626a7343556174544e5a7148733030424d797543682d78386e71772d524535746d714551317a30793267624539314a4474765a7343354c4378664763355450706e6771586663794167335039614a76566e415033337867775332545a4d4f6577344b2d574d6663344664484d6d72505743494f4562306730664d446d662d635344526a496661364b5f6c47663932355862704b7049416656434a486556576a4359613232536246513876506a6374516e6b664d466e6633766b5537634f3471634a4134462d394e547453704a31774269516b57626a5858356e486c515232714e69644f7a335466364d6d54476a75452d316c545572445a474559494b664230646e6a6d7970456f7759775861744e5a424b4379366652597746425f697535456e676934764b366d616b2d66426d754d386d4353796474436a684b543768526d386d6152456d74716666536c34532d4b38712d48305477514374345a4a48594d6854424648464d474f6147704a46584442584d65707a7335626748614c3754586772543051734e33484d7a4a634f5166653638667231644e31694375526a666d4d5761426b78554b316b624b4476527451694b70496b7839586177304d6c33426e68484e5a6d45505a573737655f4e554535627938476d6f6e42784e3256556557617a695a5243796f347053473837464d716d5575525131434c5243356e4e33586d38526d55716b337176466a6866665041637930527732375f7546694a5531502d6639543156335164754e5555465466494f6f4c58324d4361636b39634a636b6a59755679396d7957736131625a764b524d7a612d59375f4161767247706d446a4f6b644b764e6338546a325a6c6765694f30364448666c33776131337a386a3072426e5843417238646558414a755a4f4e4330674e6b5f355a5671794f4b58557a6d4a7a2d5763554b5a7a4f30444738767231524f6a7649466255793232634d61414f524c4154787131445755684c702d5f652d6f7057346b3537776b466f6d3430776c67706f6b32355776464b556c4c78573152704333634278543845716266783448384d5535507451533868614571533635324b5646457137426b333179457975553676554950796155476371596e6541326748496a6b7338654e635a6b335a754f702d59396937714d344971364d364a3165306c366d635a3557504d6333595667337949457473677a51496d4a6358644e48307576497350316a505057784b43344b56784d76796d505942344d3136643456676d7a30526a346350564b464856344c744b50664848366931456670526d7a79794d7a35724476686a6e385632757734473149774c636f47494250674d7542776b587549387a616b61785762746b336942714369444e44486972387a565463635a4773593074633156395935484a787a51306c49364973774c6f554c6b63654b574f6c3078316b747641437876393842656e6934386c6334507a686d74336d3864536e4a4d7a6c6163356a4c627a5931696a6d664f4256724a744f705368456f4b394a4a426b7a484e3741727a4a346b61696243544634483565484f726e776b673259714d66466255315656386562564c304c69534641334f685f31513330615846495144587a632d79467342627a43304f5734496a747157745154636d723732684e49336e614d5743637750563134564b55544265306b5f6d415f7a547175324943385a43764e4534696b534d586464717330364c6f6559476b69667353414a424355446b427141443443485261646c744a7358654547363178546a3063705846346d6f4f79795f374e672e2e);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_year` (`academic_year`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achievements_student_id__idx` (`student_id`) USING BTREE;

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`quote`,`quote_by`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_title` (`album_title`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`question_id`,`answer`),
  ADD KEY `answers_question_id__idx` (`question_id`) USING BTREE;

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achievements_student_id__idx` (`XNomerUjian`) USING BTREE;

--
-- Indexes for table `class_groups`
--
ALTER TABLE `class_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`class`,`sub_class`,`major_id`),
  ADD KEY `class_groups_major_id__idx` (`major_id`) USING BTREE;

--
-- Indexes for table `class_group_settings`
--
ALTER TABLE `class_group_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`academic_year_id`,`student_id`),
  ADD KEY `class_group_settings_academic_year_id__idx` (`academic_year_id`) USING BTREE,
  ADD KEY `class_group_settings_class_group_id__idx` (`class_group_id`) USING BTREE,
  ADD KEY `class_group_settings_student_id__idx` (`student_id`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_comment_post_id__idx` (`comment_post_id`) USING BTREE;

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `npwp` (`npwp`),
  ADD UNIQUE KEY `niy` (`niy`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `employees_spouse_employment__idx` (`spouse_employment`) USING BTREE,
  ADD KEY `employees_employment_status__idx` (`employment_status`) USING BTREE,
  ADD KEY `employees_employment_type__idx` (`employment_type`) USING BTREE,
  ADD KEY `employees_institutions_lifter__idx` (`institutions_lifter`) USING BTREE,
  ADD KEY `employees_rank__idx` (`rank`) USING BTREE,
  ADD KEY `employees_salary_source__idx` (`salary_source`) USING BTREE,
  ADD KEY `employees_skills_laboratory__idx` (`skills_laboratory`) USING BTREE;

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_file_category_id__idx` (`file_category_id`) USING BTREE;

--
-- Indexes for table `file_categories`
--
ALTER TABLE `file_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `headmaster`
--
ALTER TABLE `headmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_sliders`
--
ALTER TABLE `image_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `major` (`major`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module_name` (`module_name`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`group`,`option`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_photo_album_id__idx` (`photo_album_id`) USING BTREE;

--
-- Indexes for table `pollings`
--
ALTER TABLE `pollings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pollings_answer_id__idx` (`answer_id`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_post_author__idx` (`post_author`) USING BTREE;

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`category`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`quote`,`quote_by`);

--
-- Indexes for table `registration_phases`
--
ALTER TABLE `registration_phases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`year`,`phase`);

--
-- Indexes for table `registration_quotas`
--
ALTER TABLE `registration_quotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`year`,`major_id`,`quota`),
  ADD KEY `registration_student_id__idx` (`major_id`) USING BTREE;

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scholarships_student_id__idx` (`student_id`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`group`,`variable`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `students_registration_number__idx` (`registration_number`) USING BTREE,
  ADD KEY `students_full_name__idx` (`full_name`) USING BTREE,
  ADD KEY `students_first_choice__idx` (`first_choice`) USING BTREE,
  ADD KEY `students_second_choice__idx` (`second_choice`) USING BTREE,
  ADD KEY `students_major_id__idx` (`major_id`) USING BTREE,
  ADD KEY `students_admission_phase_id__idx` (`admission_phase_id`) USING BTREE;

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theme_name` (`theme_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_url` (`user_url`),
  ADD KEY `users_user_group_id__idx` (`user_group_id`) USING BTREE,
  ADD KEY `users_profile_id__idx` (`profile_id`) USING BTREE;

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group` (`group`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`user_group_id`,`module_id`),
  ADD KEY `user_privileges_user_group_id__idx` (`user_group_id`) USING BTREE,
  ADD KEY `user_privileges_module_id__idx` (`module_id`) USING BTREE;

--
-- Indexes for table `_sessions`
--
ALTER TABLE `_sessions`
  ADD KEY `ci_sessions_TIMESTAMP` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_groups`
--
ALTER TABLE `class_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_group_settings`
--
ALTER TABLE `class_group_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_categories`
--
ALTER TABLE `file_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `headmaster`
--
ALTER TABLE `headmaster`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image_sliders`
--
ALTER TABLE `image_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pollings`
--
ALTER TABLE `pollings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_phases`
--
ALTER TABLE `registration_phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration_quotas`
--
ALTER TABLE `registration_quotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
