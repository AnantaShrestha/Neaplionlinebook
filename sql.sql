-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 05:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_admins`
--

CREATE TABLE `nepalionlinebook_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_admins`
--

INSERT INTO `nepalionlinebook_admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nepali Online Book', 'nepalionlinebook@gmail.com', NULL, '$2y$10$pbhPLo.qnBkOEUDYHk4vvuMCRynXXft2d5q7N2QQ9SMRzputNdNTW', NULL, NULL, '2020-05-03 11:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_advertisements`
--

CREATE TABLE `nepalionlinebook_advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_advertisements`
--

INSERT INTO `nepalionlinebook_advertisements` (`id`, `title`, `image`, `page`, `sort_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NIC  Asia', '1505340522.gif', 'Home', 1, 1, '2020-05-04 23:48:48', '2020-05-05 00:08:21'),
(2, 'Bajaj', '929936729.gif', 'Home', 2, 1, '2020-05-04 23:50:48', '2020-05-05 00:08:05'),
(3, 'Ads Century', '903507681.gif', 'Home', 3, 1, '2020-05-05 00:09:12', '2020-05-05 00:09:12'),
(4, 'Marvel', '838438817.gif', 'Home', 4, 1, '2020-05-05 00:10:28', '2020-05-05 00:10:28'),
(5, '70% Off', '1178410778.png', 'Book', 5, 1, '2020-05-05 00:33:19', '2020-05-05 00:33:19'),
(6, 'Advetisement', '2071774762.gif', 'Book', 6, 1, '2020-05-05 00:36:24', '2020-05-05 00:36:24'),
(7, 'Advertise', '1747663387.png', 'Book', 7, 1, '2020-05-05 00:44:17', '2020-05-05 00:44:17'),
(8, 'Century', '1032015483.gif', 'Book', 8, 1, '2020-05-05 00:45:22', '2020-05-05 00:45:22'),
(10, 'Advetisement', '376257883.gif', 'News', 9, 1, '2020-05-05 01:09:58', '2020-05-05 01:09:58'),
(11, 'Advetisement', '1815411335.png', 'News', 10, 1, '2020-05-05 01:13:58', '2020-05-05 01:13:58'),
(12, 'Advertisement', '1606034121.gif', 'News', 11, 1, '2020-05-05 01:16:29', '2020-05-05 01:16:29'),
(13, 'Advetisement', '1843868578.gif', 'News', 12, 1, '2020-05-05 01:17:48', '2020-05-05 01:17:48'),
(14, 'Advetisement', '1311948863.png', 'Blog', 13, 1, '2020-05-05 01:30:37', '2020-05-05 01:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_audio`
--

CREATE TABLE `nepalionlinebook_audio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audiocategory_id` bigint(20) UNSIGNED NOT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_audio`
--

INSERT INTO `nepalionlinebook_audio` (`id`, `title`, `audiocategory_id`, `audio`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Summer Lok', 1, '1582515202.mp3', 1, '2020-05-02 01:04:25', '2020-05-02 01:04:25'),
(2, 'Summer Pop', 2, '670449773.mp3', 1, '2020-05-02 01:05:21', '2020-05-02 01:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_audiocategories`
--

CREATE TABLE `nepalionlinebook_audiocategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_audiocategories`
--

INSERT INTO `nepalionlinebook_audiocategories` (`id`, `name`, `slug`, `status`, `sort_id`, `created_at`, `updated_at`) VALUES
(1, 'Lok Audio', 'Lok_Audio', 1, 1, '2020-05-02 01:03:07', '2020-05-02 01:03:07'),
(2, 'Pop Audio', 'Pop_Audio', 1, 2, '2020-05-02 01:03:21', '2020-05-02 01:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_billings`
--

CREATE TABLE `nepalionlinebook_billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `hub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_price` int(11) DEFAULT NULL,
  `vat_price` int(11) DEFAULT NULL,
  `e_d_charge` int(11) DEFAULT NULL,
  `service_charge` int(11) DEFAULT NULL,
  `gross_total` int(11) DEFAULT NULL,
  `delivery_charge` int(11) DEFAULT NULL,
  `taxable_amount` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_billings`
--

INSERT INTO `nepalionlinebook_billings` (`id`, `bill_no`, `ref_id`, `hub`, `net_price`, `vat_price`, `e_d_charge`, `service_charge`, `gross_total`, `delivery_charge`, `taxable_amount`, `status`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2020-08-13-239769306-1', 125540, 'cellpay', 2475, 0, 0, 0, 2475, 0, 0, 'SUCCESS', 2500, 1, '2020-08-13 09:45:05', '2020-08-13 09:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_blogs`
--

CREATE TABLE `nepalionlinebook_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_blogs`
--

INSERT INTO `nepalionlinebook_blogs` (`id`, `title`, `image`, `author`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'First Blog', '541526989.jpeg', 'Bishal Rai', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-05-05 00:23:08', '2020-05-05 00:23:08'),
(2, 'Second Blog', '1084354397.jpg', 'Bishal Rai', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-05-05 00:23:28', '2020-05-05 00:23:28'),
(3, 'Third Blog', '1964896225.jpg', 'Bishal Rai', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-05-05 00:23:45', '2020-05-05 00:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_breakingnews`
--

CREATE TABLE `nepalionlinebook_breakingnews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_breakingnews`
--

INSERT INTO `nepalionlinebook_breakingnews` (`id`, `news`, `created_at`, `updated_at`) VALUES
(1, 'तपाइको कुनै पनि सल्लाह, सूझाव तथा समाचार बन्न योग्य कुनै पनि सूचना तथा जानकारी छन् भने तुरून्तै खबर गर्नुहोस। हाम्रो फोन:123456789 वा इमेल:neplalionlinebook@gmail.com\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_carts`
--

CREATE TABLE `nepalionlinebook_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_carts`
--

INSERT INTO `nepalionlinebook_carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 2, 4, '2020-05-08 04:13:34', '2020-05-08 04:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_categories`
--

CREATE TABLE `nepalionlinebook_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_categories`
--

INSERT INTO `nepalionlinebook_categories` (`id`, `name`, `slug`, `status`, `sort_id`, `created_at`, `updated_at`) VALUES
(1, 'साहित्य', 'साहित्य', 1, 1, '2020-05-02 00:59:56', '2020-05-02 00:59:56'),
(2, 'धर्मिक', 'धर्मिक', 1, 2, '2020-05-02 01:00:22', '2020-05-02 01:00:22'),
(3, 'कक्षागत', 'कक्षागत', 1, 0, '2020-05-02 01:01:33', '2020-05-02 01:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_failed_jobs`
--

CREATE TABLE `nepalionlinebook_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_migrations`
--

CREATE TABLE `nepalionlinebook_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_migrations`
--

INSERT INTO `nepalionlinebook_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_15_081014_create_categories_table', 1),
(5, '2020_04_15_121452_create_products_table', 1),
(6, '2020_04_23_181934_create_sliders_table', 1),
(7, '2020_04_24_092140_create_newscategories_table', 1),
(8, '2020_04_24_101136_create_news_table', 1),
(9, '2020_04_24_174315_create_blogs_table', 1),
(10, '2020_04_25_173058_create_sitesettings_table', 1),
(11, '2020_04_26_190345_create_audiocategories_table', 1),
(12, '2020_04_26_205931_create_audio_table', 1),
(13, '2020_04_27_224418_create_carts_table', 1),
(14, '2020_04_28_125141_create_breakingnews_table', 1),
(15, '2020_04_30_101015_create_admins_table', 1),
(16, '2020_04_30_153510_create_orders_table', 1),
(17, '2020_04_30_155006_create_orderdetails_table', 1),
(20, '2020_05_04_135058_create_advertisements_table', 2),
(21, '2020_05_27_170841_create_uniquevisitors_table', 3),
(34, '2020_08_11_154104_create_payments_table', 4),
(35, '2020_08_13_060808_create_billings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_news`
--

CREATE TABLE `nepalionlinebook_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newscategory_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `hotnews` tinyint(1) NOT NULL DEFAULT 0,
  `breaking` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_news`
--

INSERT INTO `nepalionlinebook_news` (`id`, `title`, `newscategory_id`, `date`, `image`, `status`, `hotnews`, `breaking`, `description`, `created_at`, `updated_at`) VALUES
(1, 'सनसिटी अपार्टमेन्टमा बस्ने २ जनामा कोरोना पुष्टि', 2, '2020-04-14', '1150360840.jpg', 1, 0, 0, 'र्‍यापिड डायग्नोस्टिक टेस्ट (आरडीटी) किटबाट कोभिड–१९ परीक्षण गर्दा पोजिटिभ रिपोर्ट आएपछि पाटन अस्पतालको आइसोलेसन वार्डमा भर्ना गरिएका एकैपरिवारका तीनजना मध्ये दुईजनामा कोभिड-१९ को संक्रमण रहेको पुष्टि भएको छ ।\r\n\r\nपाटन अस्पताल भर्ना गरिएकामध्ये दुईजनामा कोरोना पुष्टि भएको स्वास्थ्य मन्त्रालयस्थित स्रोतले जानकारी दिएको छ। एकजनाको भने पीसीआर परीक्षण पुन: दोहोर्‍याइएको जानकारी पनि प्राप्त भएको छ। उनीहरू पेप्सीकोला टाउनप्लानिङस्थित सनसिटी अपार्टमेन्टको ब्लक ‘ए’ को १५ औं तलामा बस्दै आएका थिए। ८१ वर्षीया आमा, ५८ वर्षीय छोरा र ५२ वर्षीया बुहारीलाई सोमबार पाटन अस्पताल भर्ना गरिएको थियो ।\r\n\r\nकागेश्वरी मनोहरा नगरपालिकाले सोमबार मूलपानीस्थित नगर अस्पतालमा विदेशबाट आएका ३६ जनाको परीक्षण गर्दा उनीहरूको रिपोर्ट पोजिटिभ आएको हो। चैत ४ गते राति १ बजे बेलायतबाट दोहा हुँदै काठमाडौं आएर क्वारेन्टाइनमा बसेका तीन जनाको आरडीटी किटबाट गरिएको परीक्षणको नतिजा पोजिटिभ आएको हो।\r\n\r\nपाटन अस्पताल भर्ना गरिएका तीनै जनाको स्वास्थ्य सामान्य छ, संक्रमणको कुनै लक्षण देखिएको छैन।\r\n\r\nसुरक्षा उच्च स्रोतका अनुसार उनीहरू चैत ४ मा कतार एयरलाइन्सको फ्लाइट नम्बर क्यूआर ६४४ बाट काठमाडौं अवतरण गरेका थिए। त्यही बिल्डिङमा बस्ने एक व्यक्तिका अनुसार उनीहरू तीन साता बेलायत बसेर फर्किएका हुन्।\r\n\r\nयो संगै हाल सम्म नेपालमा कोरोना भाइरस (कोभिड-१९) बाट संक्रमित हुनेको संख्या १६ पुगेको छ।', '2020-05-02 01:15:20', '2020-05-02 01:15:20'),
(2, '२०७६ मा कोरोनाको छायामा विश्‍व महत्त्वपूर्ण घटना', 2, '2020-04-13', '1334269097.jpg', 1, 0, 0, 'अंग्रेजी नयाँ वर्ष २०२० का सुरुवाति ३ महिना र विक्रम संवत् २०७६ का अन्तिम ३ महिना विश्वका लागि सुखद् रहेन । विश्वव्यापी महामारीको रुप लिएको कोरोना भाइरस (कोभिड–१९) को संक्रमण विश्वका कैयौं शक्तिराष्ट्र कहलिएका देशलाई पनि हायलकायल बनाइरहेको छ ।\r\n\r\nकोरोना भाइरसको संक्रमणका कारण न त चिनियाँ नयाँ वर्ष मनाउन पाइयो, न त अंग्रेजी नयाँ वर्ष नै। कोरोना त्रासका बीच नेपाली नयाँ वर्ष २०७७ पनि कुनै औपचारिक कार्यक्रमबिना जो जहाँ जस्तो अवस्थामा छ, त्यसरी नै मनाउन पर्ने बाध्यता छ। व्यापार, स्वास्थ्य, अन्तर्राष्ट्रिय सम्बन्धलगायतका हिसाबले २०७६ सुखद रहेन।\r\n\r\n२०७६ सालका महत्वपूर्ण विश्‍वघटना\r\nकोरोना महामारीले आक्रान्त विश्‍व समुदाय\r\n\r\nडिसेम्बर ३१, २०१९ – चीनले हुबेई प्रान्तको वुहानमा असामान्य खालको निमोनिया देखिएको भन्दै विश्व स्वास्थ्य संगठन डब्लूएचओलाई जानकारी गरायो। केही कामदारमा अज्ञात भाइरसको संक्रमण भएपछि वुहानको हुवानान सिफुड होलसेल मार्केट अंग्रेजी नयाँ वर्ष २०२० सँगै बन्द गरियो। जनवरीमा ५ मा चिनियाँ अधिकारीले सिभियर एक्युट रेस्पिरेटरी सिन्ड्रोम(सार्स) नै दोहोरिएको सम्भावना रहेको जानकारी दिए।\r\n\r\nजनवरी ११ मा सिफुड मार्केटबाट सामान किन्ने एक जना ६१ वर्षीय पुरुषको मृत्यु भयो। भाइरसको संक्रमणपछि अस्पताल भर्ना भएका ती व्यक्तिको जनवरी ९ मा मृत्यु भएको थियो। त्यस्तै जनवरी ७ मा डब्लूएचओको अनुसार चिनियाँ अधिकारीले नयाँ भाइरस भएको पत्ता लगाए। कोरोना भाइरस परिवारकै भाइरस भएकाले यसलाई २०१९ नोवल कोरोना भाइरसको नाम दिइयो।', '2020-05-02 01:16:33', '2020-05-02 01:16:33'),
(3, 'कोरोना जाँच गर्ने पिसिआर मेसिन प्रयोगविहीन', 2, '2020-04-08', '1932028684.jpg', 1, 1, 0, 'चैत २६, २०७६ बुधबार ।  राष्ट्रिय जनस्वास्थ्य प्रयोगशाला टेकुमा भएकोजस्तै कोरोना भाइरस परीक्षण गर्ने पिसिआर मेसिन देशभर २९ छन् । तर, पाँचवटा मात्रै सञ्चालनमा छन् । कोरोना संक्रमण बढ्दै जाँदा पनि सरकारले बाँकी २४ मेसिन प्रयोगमा ल्याउन चासो देखाएको छैन ।\r\n\r\nवीर, पाटन र ठिमीको अस्पतालमा मात्र होइन, त्रिभुवन विश्वविद्यालय र विभिन्न अनुसन्धान केन्द्रमा भएका पिसिआर मेसिनले एकैपटक ९७ नमुना परीक्षण गर्छन्, तर सरकारले तिनलाई प्रयोग गर्न सकेको छैन, चीनबाट ल्याइएका मेसिनले भने एकपटकमा १५ नमुना मात्र परीक्षण गर्छन्।\r\n\r\nत्रिभुवन विश्वविद्यालयका आनुवंशिक वैज्ञानिक प्रा.डा. गिरिराज त्रिपाठीका अनुसार सरकारी र गैरसरकारी निकायमा रहेका ती मेसिन प्रयोगमा ल्याउन सके दैनिक पाँच हजारभन्दा बढीको कोरोना परीक्षण गर्न सकिन्छ । एउटा मेसिनले एक लटमा ९७ वटा नमुना परीक्षण गर्न सकिन्छ । जब कि चीनबाट हालै ल्याइएका पोर्टेबल पिसिआर मेसिनले एकपटकमा १५ वटा नमुना मात्रै परीक्षण गर्न मिल्छ ।\r\n\r\nकेन्द्रीय पशुपक्षी रोग अन्वेषण प्रयोगशालामा मात्रै तीनवटा पिसिआर मेसिन प्रयोगविहीन अवस्थामा छन् । त्यस्तै, वीर अस्पताल, पाटन अस्पताल, लेलेको आनन्दवन अस्पताल, भैंसेपाटीस्थित मेडिसिटी अस्पतालमा पनि यस्ता मेसिन छन् । त्यस्तै त्रिभुवन विश्वविद्यालयका केन्द्रीय माइक्रोलोजी विभाग, केन्द्रीय बायोटेक्नोलोजी विभाग र ल्याबोरोटोरी अफ द एग्रो एन्ड बायोमेट्रिक रिसर्च सेन्टर, राष्ट्रिय आयुर्वेद अनुसन्धान तथा तालिम केन्द्रमा एक–एक मेसिन छन् । नयाँ बजारस्थित नेसनल कलेज, वाल्टर रिड एएफआरआइएमएस रिसर्च युनिट नेपाल, फरेन्सिक ल्याब खुमलटार, रिसर्च इन्स्टिच्युट फर बायोसाइन्स एन्ड बायोटेक्नोलोजी, सिनामंगलस्थित डिकोट जेनोमिक एन्ड रिसर्च सेन्टरमा मेसिन छन् ।\r\n\r\nत्यस्तै, बिउबिजन गुणस्तर नियन्त्रण केन्द्र पुल्चोक, सेन्टर भेटेनरी ल्याब्रोटरी टेकु, राष्ट्रिय क्षयरोग केन्द्र ठिमी, नयाँ बानेश्वरस्थित नेसनल रिफ्रेन्स ल्याब्रोटरी, नेपाल एग्रिकल्चर रिसर्च काउन्सिल खुमलटार, काठमाडौं सेन्टर फर जेनोमिक्स एन्ड रिसर्च ग्वार्को, सेन्टर फर मोलिकुलर डाइनामिक नेपाल (सिएमडिएन) र सेन्टर डाइग्नोस्टिक रिसर्च लेब्रोटरी कमलपोखरीमा भएका पिसिआर मेसिन पनि प्रयोगविहीन छन् ।\r\n\r\nसंक्रमण बढ्दै जाँदा राष्ट्रिय जनस्वास्थ्य प्रयोगशालाले मात्र माग धान्न नसक्ने भन्दै सरकारले अघिल्लो शनिबार चीनबाट पाँचवटा पोर्टेबल पिसिआर मेसिन ल्याएको छ । ओम्नी बिजनेस कर्पोरेट इन्टरनेसनल प्रालि (ओबिसिआई)मार्फत खरिद गरिएका ती मेसिनबाट पोखरा, बुटवल, सुर्खेत, धनगढी र जनकपुरमा पनि परीक्षण सुरु गरिएको छ ।\r\n\r\nयीसहित अहिले देशका १० ठाउँबाट कोरोना भाइरसको परीक्षण भइरहेको छ । राष्ट्रिय जनस्वास्थ्य प्रयोगशाला टेकु, बिपी कोइराला स्वास्थ्य विज्ञान प्रतिष्ठान धरान, धुलिखेल अस्पताल, कृषि तथा वन विश्वविद्यालय भरतपुर र कीटजन्य रोग नियन्त्रण केन्द्र, हेटौँडामा पिएसआर मेसिनबाट कोरोना परीक्षण भइरहेको छ ।\r\n\r\nस्वास्थ्य मन्त्रालयले कोरोना परीक्षणको दर बढ्दै गएकाले थन्किएका पिसिआर मेसिन पनि प्रयोगमा ल्याउने तयारी भएको बताएको छ  ।\r\n\r\nविश्वमा रियलटाइम पिसिआर मेसिन बनाउने तीन कम्पनी लाइकटेक, बायो र्‍याड र कायोजिन हुन् । नेपालमा भएका अधिकांश मेसिन बायो र्‍याड कम्पनीले बनाएका हुन् । यी प्रत्येक मेसिनलाई अहिले करिब २५ लाख पर्छ ।', '2020-05-05 01:01:03', '2020-05-05 01:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_newscategories`
--

CREATE TABLE `nepalionlinebook_newscategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_newscategories`
--

INSERT INTO `nepalionlinebook_newscategories` (`id`, `name`, `slug`, `status`, `sort_id`, `created_at`, `updated_at`) VALUES
(1, 'खेलकुद', 'खेलकुद', 1, 1, '2020-05-02 01:11:16', '2020-05-02 09:11:51'),
(2, 'सूचना-प्रविधि', 'सूचना-प्रविधि', 1, 0, '2020-05-02 01:11:53', '2020-05-02 09:11:50'),
(3, 'जीवनशैली', 'जीवनशैली', 1, 2, '2020-05-02 01:12:38', '2020-05-02 09:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_password_resets`
--

CREATE TABLE `nepalionlinebook_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_payments`
--

CREATE TABLE `nepalionlinebook_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_payments`
--

INSERT INTO `nepalionlinebook_payments` (`id`, `product_id`, `bill_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1,4', 1, 1, 'SUCCESS', '2020-08-13 09:45:05', '2020-08-13 09:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_products`
--

CREATE TABLE `nepalionlinebook_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_page` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free` tinyint(1) NOT NULL DEFAULT 0,
  `upcoming` tinyint(1) NOT NULL DEFAULT 0,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_products`
--

INSERT INTO `nepalionlinebook_products` (`id`, `name`, `category_id`, `author`, `language`, `total_page`, `price`, `status`, `image`, `pdf`, `published_date`, `description`, `free`, `upcoming`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Java Reference', 3, 'Ananta Shrestha', 'English', 2500, 1500.00, 1, '571788042.png', '502246670.pdf', '2015', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 5, '2020-05-02 01:08:54', '2020-05-08 01:09:37'),
(2, 'Sahitya Katha', 1, 'Hari Bahadur', 'Nepali', 500, 500.00, 1, '236952921.jpg', '679535088.pdf', '2019', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, 0, 4, '2020-05-05 00:26:59', '2020-05-08 01:10:03'),
(3, 'Dhamic Katha', 2, 'Ram Khadkas', 'Nepali', 600, 600.00, 1, '1084523540.jpg', '1187832665.pdf', '2015', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, 0, 5, '2020-05-05 00:28:20', '2020-05-08 01:09:11'),
(4, 'Php Reference', 3, 'Hari Bahadur', 'English', 1500, 1000.00, 1, '1401423243.jpg', '994114824.pdf', '2016', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, 0, 4, '2020-05-05 00:29:13', '2020-05-08 01:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_sitesettings`
--

CREATE TABLE `nepalionlinebook_sitesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `what` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visioni` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_sitesettings`
--

INSERT INTO `nepalionlinebook_sitesettings` (`id`, `contact`, `email`, `address`, `logo`, `about`, `what`, `mission`, `visioni`, `created_at`, `updated_at`) VALUES
(1, '9865991947, 9851000047', 'nepalionlinebook@gmail.com', ' anamnagar काठमाडौं, नेपाल', '592628001.png', '\r\nनेपाली अनलाईन बुक शिक्षाकेन्द्रित पुस्तकालय हो। यसमा दस्तावेज, किताब, पत्रपत्रिका, अडियो, भिडियो ,fm radio सभा, सेमिनार, गोष्ठी,सम्मेलन आदि क्रियाकलाप समेत समावेस गरिएका छन् | लगायत ई-पाठ क्रियाकलाप समेत समावेस गरिएका छन्। प्रयोगकर्ताहरूले नेपाली अनलाईन बुकमा रहेका सामग्रीहरूलाई आन्तरिक-नेट (intra-net) अथवा ईन्टरनेटको माध्यमबाट खोलेर अध्ययन गर्न, भिडियो हेर्न र अडियो पुस्तकहरू सुन्न सक्दछन्। हाल नेपाली अनलाईन बुक मा नेपाली र अङ्ग्रेजी भाषाका सङ्ग्रहहरूका साथै नेपालभित्र बोलिने अन्य राष्ट्रिय भाषाका सामग्रीहरू समेत राखिएका छन्। प्रचलित ऐन नियमको अधिनमा रही पुस्तकहरु लगायत अरु सामग्रीहरु अनलाईनको माध्यमबाट निशुल्क वा कुनै खरिद गरी प्राप्त गर्ने सेवा प्रदान गरीनेछ . खरिद गरी हेर्न पर्ने बुक लगायत अरु सामग्रीहरु Prabhu Pay, IME Pay, CellPay, ESEWA ,Khalti ,mastercard जस्ता माध्यम बाट खरिद गरि माथि दिएका payment sites मार्फतआफुलाई मनपर्ने, आफुले खोजेको कुनै पनि किताबहरु लगायत अन्य सामग्रीहरु आनन्दका साथ आफ्नो समयानुकुल अध्ययन गर्न, भिडियो हेर्न र अडियो पुस्तकहरू सुन्न सकीनेछ। सामान्य भौतिक पुस्तकालयमा जस्तै देखिने नेपाली अनलाईन बुक विभिन्न कक्षहरूमा प्रवेश गरेर प्रयोगकर्ताले आफ्नो रूची अनुसारका सामग्रीहरूमा पहुँच राख्न सक्दछन्। ब्राउजिङ, सर्चिङ, र लिङ्‍किङ जस्ता सुविधाहरू भएको नेपाली अनलाईन बुक प्रयोगकर्ताले आफूलाई चाहिएको सामग्रीको शिर्षक, लेखक वा सम्बन्धित शब्दावली अनुसार खोज गर्न सकिने हुँदा अन्वेषणकर्ताहरूका लागि समेत उपयोगी छ। नेपाली अनलाईन बुक मुख्य उद्देश्य बिद्यार्थी हरूमा पढ्ने संस्कृतिको विकास गरी स्वअध्ययन, स्वतन्त्र चिन्तन र स्वतन्त्र अन्वेषणको परिपाटीलाई प्रोत्साहित गर्नु हो। यसले स्रष्टा हरूलाई बढीभन्दा बढी पाठकसम्म पुर्यावएर र पाठकहरुलाई बढीभन्दा बढी सामग्रीहरुमा पहुँच दिलाएर पढ्ने संस्कृतिको विकास गर्न मद्दत गर्छ। नेपाली अनलाईन बुक मा भएका सामग्रीहरू शैक्षिक प्रयोजनका लागि इन्टरनेटको पहुँच हुने जोसुकैले पनि निशुल्क अथवा खरिद गरी पढ्न, हेर्न र सुन्न सक्छन्। नेपाली अनलाईन बुक नेपालले सूचना तथा सञ्चार प्रविधिको प्रयोग गरि गुणस्तरीय शिक्षा र समान पहुँचका निमित्त शैक्षिक प्रणाली सुधारको क्षेत्रमा कार्य गर्दै आएको छ पुस्तकालयमा रहेका पुस्तकहरू यसको एन्ड्रोइड एप प्रयोग गरेर पनि पहुँच प्राप्त गर्न सकिन्छ। हाल नेपाली अनलाईन बुक लागि सामग्रीहरू सङ्कलन गर्ने क्रममा नेपाली अनलाईन बुक विभिन्न लेखक, प्रकाशक तथा संघ-संस्थाहरूसित औपचारिक साझेदारी गरी नेपाली अनलाईन बुक मार्फत प्रकाशनहरू उपलब्ध गराउँदै आएको छ। यसैगरी धेरै भन्दा धेरै प्रकाशनहरूलाई नेपाली अनलाईन बुक मार्फत पाठकहरू समक्ष पुर्याउन सकेमा बालबालिकाहरूको सर्वाङ्गीण विकास गर्न र समाजमा पठनपाठन संस्कृतिको विकास गर्न उल्लेखनीय योगदान पुग्ने विश्वास लिइएको छ। आफ्ना सिर्जनाहरु नेपाली अनलाईन बुक मार्फत पाठकहरु सम्म पुर्याउन चाहनुहुने लेखक स्रष्टाहरूले नेपाली अनलाईन बुकको कार्यलयमा पुस्तकको सफ्ट वा हार्ड कपी प्रदान गर्न सक्नुहुनेछ। यदी तपाई बुक लेखक हुनु हुन्छ भने, तपाईका पुस्तकहरु बिक्रीको लागी वा फ्री मा नेपाली अनलाईन बुक मार्फत पाठकहरू समक्ष पुर्याउन चाहनु हुन्छ भने हामी तपाई को बुक webside मा राख्न्ने छौ र औपचारिक साझेदारी( agrement)गरेर तपाईलाई बिक्री भयको पुस्तकको संग्ख्या को आधारमा उक्त रकमको नीस्चीत प्रतीसत प्रदान गरीने छ |\r\n\r\nWhyWe do?', 'Huis nostrud exerci tation ullamcorper suscipites lobortis nisl ut aliquip ex ea commodo consequat. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius claritas.', 'Huis nostrud exerci tation ullamcorper suscipites lobortis nisl ut aliquip ex ea commodo consequat. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius claritas.', 'Huis nostrud exerci tation ullamcorper suscipites lobortis nisl ut aliquip ex ea commodo consequat. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius claritas.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_sliders`
--

CREATE TABLE `nepalionlinebook_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_sliders`
--

INSERT INTO `nepalionlinebook_sliders` (`id`, `title`, `status`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Huge Sale Online Book', 1, '1076089337.jpg', 'Nepali Online Book', '2020-05-02 00:57:08', '2020-05-02 00:57:08'),
(2, 'Huge Sale Online Book', 1, '365769130.jpg', 'Nepali Online Book', '2020-05-02 00:57:53', '2020-05-02 00:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_uniquevisitors`
--

CREATE TABLE `nepalionlinebook_uniquevisitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_uniquevisitors`
--

INSERT INTO `nepalionlinebook_uniquevisitors` (`id`, `ip`, `os`, `browser`, `device`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Windows 8.1', 'Chrome', 'Computer', '2020-05-27 11:46:38', '2020-05-27 11:46:38'),
(2, '127.0.0.1', 'Windows 8.1', 'Firefox', 'Computer', '2020-08-13 02:13:21', '2020-08-13 02:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `nepalionlinebook_users`
--

CREATE TABLE `nepalionlinebook_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nepalionlinebook_users`
--

INSERT INTO `nepalionlinebook_users` (`id`, `name`, `email`, `email_verified_at`, `phone_no`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ananta Shrestha', 'anantashrestha01@gmail.com', NULL, '9861898667', 'Jadibuti,KTM', '$2y$10$UJwgq29Nql6IXWeIrNMw.ucA37Xqwx2wNdonMXqnPXxtpJelCLLlK', NULL, '2020-05-01 23:53:26', '2020-05-01 23:53:26'),
(2, 'team1', 'kapil.tandukar@gmail.com', NULL, 'aldfj', 'kathmandu', '$2y$10$XvV.7dkt20/rs5AWEu9x8eC/N8dq7C9fBzQgr7f2PWCIw7ONkZ2x6', NULL, '2020-05-08 04:02:34', '2020-05-08 04:02:34'),
(3, 'John Mcclain', 'kewoxec@mailinator.net', NULL, '+1 (981) 521-1349', 'Eveniet qui dolore', '$2y$10$QhgCUje7CJL6d0VzP5o1h.1eJBfHaxWL9DJyr0c6fl2GEsiA0i9L2', NULL, '2020-05-15 04:39:26', '2020-05-15 04:39:26'),
(4, 'santoshacharya', 'santoshacharya2468@gmail.com', NULL, '1234577880', 'ktm', '$2y$10$xC8BXXj1BJQ11IpugzDdeuHxXk88NMzqmFnaFNa9VzPSKumG8sHVu', NULL, '2020-05-18 07:22:42', '2020-05-18 07:22:42'),
(5, 'Ram', 'lokendra.rijal12@gmail.com', NULL, '9849718629', 'Chabahil', '$2y$10$BuoQde6H1vgEsQ2rrYPSR.zmfAMv73TdnQw2LYG5uaNfQ3CwcMvny', NULL, '2020-05-18 07:22:46', '2020-05-18 07:22:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nepalionlinebook_admins`
--
ALTER TABLE `nepalionlinebook_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nepalionlinebook_admins_email_unique` (`email`);

--
-- Indexes for table `nepalionlinebook_advertisements`
--
ALTER TABLE `nepalionlinebook_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_audio`
--
ALTER TABLE `nepalionlinebook_audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nepalionlinebook_audio_audiocategory_id_foreign` (`audiocategory_id`);

--
-- Indexes for table `nepalionlinebook_audiocategories`
--
ALTER TABLE `nepalionlinebook_audiocategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_billings`
--
ALTER TABLE `nepalionlinebook_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_blogs`
--
ALTER TABLE `nepalionlinebook_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_breakingnews`
--
ALTER TABLE `nepalionlinebook_breakingnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_carts`
--
ALTER TABLE `nepalionlinebook_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nepalionlinebook_carts_user_id_foreign` (`user_id`),
  ADD KEY `nepalionlinebook_carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `nepalionlinebook_categories`
--
ALTER TABLE `nepalionlinebook_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_failed_jobs`
--
ALTER TABLE `nepalionlinebook_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_migrations`
--
ALTER TABLE `nepalionlinebook_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_news`
--
ALTER TABLE `nepalionlinebook_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nepalionlinebook_news_newscategory_id_foreign` (`newscategory_id`);

--
-- Indexes for table `nepalionlinebook_newscategories`
--
ALTER TABLE `nepalionlinebook_newscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_password_resets`
--
ALTER TABLE `nepalionlinebook_password_resets`
  ADD KEY `nepalionlinebook_password_resets_email_index` (`email`);

--
-- Indexes for table `nepalionlinebook_payments`
--
ALTER TABLE `nepalionlinebook_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_products`
--
ALTER TABLE `nepalionlinebook_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nepalionlinebook_products_category_id_foreign` (`category_id`);

--
-- Indexes for table `nepalionlinebook_sitesettings`
--
ALTER TABLE `nepalionlinebook_sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_sliders`
--
ALTER TABLE `nepalionlinebook_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_uniquevisitors`
--
ALTER TABLE `nepalionlinebook_uniquevisitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nepalionlinebook_users`
--
ALTER TABLE `nepalionlinebook_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nepalionlinebook_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nepalionlinebook_admins`
--
ALTER TABLE `nepalionlinebook_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nepalionlinebook_advertisements`
--
ALTER TABLE `nepalionlinebook_advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nepalionlinebook_audio`
--
ALTER TABLE `nepalionlinebook_audio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nepalionlinebook_audiocategories`
--
ALTER TABLE `nepalionlinebook_audiocategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nepalionlinebook_billings`
--
ALTER TABLE `nepalionlinebook_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nepalionlinebook_blogs`
--
ALTER TABLE `nepalionlinebook_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nepalionlinebook_breakingnews`
--
ALTER TABLE `nepalionlinebook_breakingnews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nepalionlinebook_carts`
--
ALTER TABLE `nepalionlinebook_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nepalionlinebook_categories`
--
ALTER TABLE `nepalionlinebook_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nepalionlinebook_failed_jobs`
--
ALTER TABLE `nepalionlinebook_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nepalionlinebook_migrations`
--
ALTER TABLE `nepalionlinebook_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `nepalionlinebook_news`
--
ALTER TABLE `nepalionlinebook_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nepalionlinebook_newscategories`
--
ALTER TABLE `nepalionlinebook_newscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nepalionlinebook_payments`
--
ALTER TABLE `nepalionlinebook_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nepalionlinebook_products`
--
ALTER TABLE `nepalionlinebook_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nepalionlinebook_sitesettings`
--
ALTER TABLE `nepalionlinebook_sitesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nepalionlinebook_sliders`
--
ALTER TABLE `nepalionlinebook_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nepalionlinebook_uniquevisitors`
--
ALTER TABLE `nepalionlinebook_uniquevisitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nepalionlinebook_users`
--
ALTER TABLE `nepalionlinebook_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nepalionlinebook_audio`
--
ALTER TABLE `nepalionlinebook_audio`
  ADD CONSTRAINT `nepalionlinebook_audio_audiocategory_id_foreign` FOREIGN KEY (`audiocategory_id`) REFERENCES `nepalionlinebook_audiocategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nepalionlinebook_carts`
--
ALTER TABLE `nepalionlinebook_carts`
  ADD CONSTRAINT `nepalionlinebook_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `nepalionlinebook_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nepalionlinebook_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `nepalionlinebook_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nepalionlinebook_news`
--
ALTER TABLE `nepalionlinebook_news`
  ADD CONSTRAINT `nepalionlinebook_news_newscategory_id_foreign` FOREIGN KEY (`newscategory_id`) REFERENCES `nepalionlinebook_newscategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nepalionlinebook_products`
--
ALTER TABLE `nepalionlinebook_products`
  ADD CONSTRAINT `nepalionlinebook_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `nepalionlinebook_categories` (`id`) ON DELETE CASCADE;
COMMIT;
