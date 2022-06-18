-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 11:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thu Dữ Mễ Dữ Lư', NULL, '2022-05-31 02:49:41', '2022-05-31 02:49:41'),
(2, 'Nhâm Ngã Tiếu', NULL, '2022-05-31 02:50:01', '2022-05-31 02:50:01'),
(3, 'Phi Thiên Ngư', NULL, '2022-05-31 02:50:10', '2022-05-31 02:50:10'),
(4, 'Oa Ngưu Cuồng Bôn', NULL, '2022-05-31 02:50:20', '2022-05-31 02:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `deleted_at`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Thể Loại', NULL, 0, '2022-05-31 02:50:57', '2022-05-31 02:50:57'),
(2, 'Tiên Hiệp', NULL, 1, '2022-05-31 02:52:56', '2022-05-31 09:04:26'),
(4, 'Huyền Huyễn', NULL, 1, '2022-05-31 02:57:04', '2022-05-31 02:57:04'),
(5, 'Khoa Huyễn', NULL, 1, '2022-05-31 02:59:40', '2022-05-31 02:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(11, 5, 11, NULL, NULL),
(30, 2, 32, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,0) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `deleted_at`, `content`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(15, 'Chương 1: Lắc xúc xắc mười một năm, một sớm khí vận đỉnh cấp', NULL, '<p>&laquo; t&iacute;nh danh: H&agrave;n Tuyệt &raquo;<br />\r\n<br />\r\n&laquo; tuổi thọ: 11/65 &raquo;<br />\r\n<br />\r\n&laquo; chủng tộc: Ph&agrave;m nh&acirc;n &raquo;<br />\r\n<br />\r\n&laquo; tu vi: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; c&ocirc;ng ph&aacute;p: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; ph&aacute;p thuật: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; thần th&ocirc;ng: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; ph&aacute;p kh&iacute;: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; linh căn tư chất: Cực k&eacute;m ( click đổ x&uacute;c xắc ) &raquo;<br />\r\n<br />\r\n&laquo; Ti&ecirc;n Thi&ecirc;n kh&iacute; vận như sau ( click đổ x&uacute;c xắc ) &raquo;<br />\r\n<br />\r\n&laquo; Thổ Mộc song linh: Thổ, Mộc linh căn tư chất tăng cường &raquo;<br />\r\n<br />\r\n&laquo; Thương Đạo Linh Đồng: Thương Đạo tư chất tăng cường, thể ph&aacute;ch tăng cường &raquo;<br />\r\n<br />\r\n&laquo; click mở bắt đầu du h&iacute; cuộc đời &raquo;<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nNh&igrave;n qua trước mắt thuộc t&iacute;nh liệt biểu, 11 tuổi H&agrave;n Tuyệt nhanh tuyệt vọng.<br />\r\n<br />\r\nLinh căn tư chất, Ti&ecirc;n Thi&ecirc;n kh&iacute; vận mỗi ng&agrave;y đều c&oacute; thể đổ x&uacute;c xắc ngẫu nhi&ecirc;n cải biến, nhưng chỉ có th&ecirc;̉ lắc một lần, mỗi ng&agrave;y bảy giờ s&aacute;ng c&oacute; thể đổi mới.<br />\r\n<br />\r\nH&agrave;n Tuyệt từ xuất sinh l&ecirc;n liền bắt đầu lắc.<br />\r\n<br />\r\nMười một năm, đều kh&ocirc;ng c&oacute; lắc ra khỏi cực phẩm tư chất c&ugrave;ng tr&aacute;c tuyệt Ti&ecirc;n Thi&ecirc;n kh&iacute; vận.<br />\r\n<br />\r\n&quot;Nếu kh&ocirc;ng cứ như vậy?&quot;<br />\r\n<br />\r\nMột c&aacute;i &yacute; niệm trong đầu từ H&agrave;n Tuyệt trong l&ograve;ng to&aacute;t ra.<br />\r\n<br />\r\nKh&ocirc;ng được!<br />\r\n<br />\r\nThật vất vả đi v&agrave;o thần ti&ecirc;n quỷ qu&aacute;i thế giới, h&aacute; c&oacute; thể ph&agrave;m nh&acirc;n tu ti&ecirc;n?<br />\r\n<br />\r\nH&agrave;n Tuyệt muốn l&agrave;m sảng văn nam ch&iacute;nh!<br />\r\n<br />\r\nLại lắc!<br />\r\n<br />\r\nH&agrave;n Tuyệt đưa tay, hướng về ph&iacute;a trước mặt thuộc t&iacute;nh liệt biểu một ch&uacute;t.<br />\r\n<br />\r\nLinh căn tư chất cải biến!<br />\r\n<br />\r\n&laquo; linh căn tư chất: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt tấm kia non nớt mặt thiếu ni&ecirc;n trong nh&aacute;y mắt đen lại.<br />\r\n<br />\r\nLại điểm!<br />\r\n<br />\r\n&laquo; Thi&ecirc;n Mệnh C&ocirc; Tinh: Khắc th&acirc;n khắc lữ khắc bạn, c&ocirc; độc cả đời, tuổi thọ gia tăng trăm năm &raquo;<br />\r\n<br />\r\nMẹ n&oacute;!<br />\r\n<br />\r\nThi&ecirc;n Mệnh C&ocirc; Tinh đều đi ra!</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nAi muốn c&ocirc; độc cả đời!<br />\r\n<br />\r\nH&agrave;n Tuyệt tức giận đến nằm xuống, ở tr&ecirc;n đồng cỏ lăn lộn chết thẳng cẳng.<br />\r\n<br />\r\nR&ograve;ng r&atilde; mười một năm đều lắc kh&ocirc;ng ra x&acirc;u tạc thi&ecirc;n linh căn tư chất, Ti&ecirc;n Thi&ecirc;n kh&iacute; vận!<br />\r\n<br />\r\nKh&ocirc;ng được!<br />\r\n<br />\r\nTiếp tục lắc!<br />\r\n<br />\r\nLão tử kh&ocirc;ng tin!<br />\r\n<br />\r\nH&agrave;n Tuyệt tức run người.<br />\r\n<br />\r\nGiày vò nửa giờ, hắn mới đứng dậy.<br />\r\n<br />\r\nH&agrave;n Tuyệt l&agrave; tr&ugrave;ng sinh nh&acirc;n sĩ, kiếp trước đến từ Địa Cầu thế kỷ 21, tuổi c&ograve;n trẻ liền bị tra ra ung thư thời kỳ cuối, hắn kh&ocirc;ng muốn thống khổ trị liệu, về nh&agrave; chờ chết, v&agrave;o l&uacute;c ban đ&ecirc;m v&igrave; t&ecirc; liệt ch&iacute;nh m&igrave;nh, hắn t&igrave;m một c&aacute;i ho&agrave;i cựu tu ti&ecirc;n tr&ograve; chơi chơi.<br />\r\n<br />\r\nChơi một c&aacute;i suốt đ&ecirc;m, rất n&agrave;y, hừng đ&ocirc;ng l&uacute;c buồn ngủ, sau đ&oacute; kh&ocirc;ng c&oacute; người.<br />\r\n<br />\r\nLần nữa mở mắt, hắn liền đầu thai đi v&agrave;o c&aacute;i n&agrave;y c&ugrave;ng loại cổ đại thế giới, hắn sinh ra ở một chi tu ti&ecirc;n m&ocirc;n ph&aacute;i b&ecirc;n trong.<br />\r\n<br />\r\nNgọc Thanh t&ocirc;ng, Đại Yến vương triều ch&iacute;nh đạo tu ti&ecirc;n m&ocirc;n ph&aacute;i.<br />\r\n<br />\r\nTại bị tra ra ung thư thời kỳ cuối ng&agrave;y đ&oacute;, H&agrave;n Tuyệt kh&ocirc;ng g&igrave; s&aacute;nh được sợ h&atilde;i, lần đầu biết sinh mệnh trọng yếu như vậy.<br />\r\n<br />\r\nMột thế n&agrave;y v&acirc;̣y mà c&oacute; thể tu ti&ecirc;n!<br />\r\n<br />\r\nHắn kinh hỉ qu&aacute; đỗi!<br />\r\n<br />\r\nHắn nhất định phải tu ti&ecirc;n!<br />\r\n<br />\r\nHắn muốn sống đ&ecirc;́n so với ai kh&aacute;c đều l&acirc;u!<br />\r\n<br />\r\nNhưng hắn kh&ocirc;ng c&oacute; khả năng ph&agrave;m nh&acirc;n tu ti&ecirc;n!<br />\r\n<br />\r\nTừ khi ra đời về sau, H&agrave;n Tuyệt liền sống được kh&ocirc;ng c&oacute; &aacute;p lực, cha mẹ của hắn l&agrave; Ngọc Thanh t&ocirc;ng ngoại m&ocirc;n Luyện Đan sư Thiết l&atilde;o n&ocirc; bộc, ng&agrave;y b&igrave;nh thường l&agrave; Thiết l&atilde;o trồng trọt dược thảo.<br />\r\n<br />\r\nLuyện Đan sư địa vị đặc th&ugrave;, ở ngoại m&ocirc;n, kh&ocirc;ng người n&agrave;o d&aacute;m đắc tội Thiết l&atilde;o, Thiết l&atilde;o thủ hạ c&oacute; hơn mười vị n&ocirc; bộc, tất cả đều l&agrave; ph&agrave;m nh&acirc;n.<br />\r\n<br />\r\nMặc d&ugrave; c&oacute; linh căn, Thiết l&atilde;o cũng kh&ocirc;ng cho ph&eacute;p n&ocirc; bộc tu luyện, đo&aacute;n chừng l&agrave; sợ đ&aacute;nh cắp hắn thảo dược.<br />\r\n<br />\r\nHắn thảo dược đối với tu ti&ecirc;n giả m&agrave; n&oacute;i tr&agrave;n ngập c&oacute; &iacute;ch, nhưng đối với ph&agrave;m nh&acirc;n m&agrave; n&oacute;i l&agrave; tuyệt đối độc dược.<br />\r\n<br />\r\nBất qu&aacute; 6 tuổi năm đ&oacute;, cha mẹ của hắn chạy tr&ocirc;́n, lưu lại tuổi nhỏ H&agrave;n Tuyệt tại Thiết l&atilde;o trong vườn dược thảo.<br />\r\n<br />\r\nH&agrave;n Tuyệt cũng c&oacute; thể l&yacute; giải, mang theo một t&ecirc;n h&agrave;i đồng chạy trốn, khẳng định c&oacute; nhiều bất tiện.<br />\r\n<br />\r\nThiết l&atilde;o cũng kh&ocirc;ng c&oacute; so đo, ngược lại để cho người ta dẫn đầu H&agrave;n Tuyệt bắt đầu hỗ trợ trồng trọt thảo dược.<br />\r\n<br />\r\nThời gian l&acirc;u d&agrave;i, H&agrave;n Tuyệt cũng đem trong vườn dược thảo tất cả hoa hoa thảo thảo biết r&otilde;.<br />\r\n<br />\r\nThiết l&atilde;o kh&ocirc;ng c&oacute; l&agrave;m kh&oacute; dễ H&agrave;n Tuyệt, H&agrave;n Tuyệt liền tiếp theo lắc Ti&ecirc;n Thi&ecirc;n kh&iacute; vận.<br />\r\n<br />\r\nD&ugrave; sao hắn hiện tại l&agrave; ph&agrave;m nh&acirc;n, kh&ocirc;ng bằng chờ một ch&uacute;t.<br />\r\n<br />\r\n&quot;Ai, tiếp tục lắc đi, nếu l&agrave; 30 tuổi trước lắc kh&ocirc;ng ra nghịch thi&ecirc;n kh&iacute; vận, qu&ecirc;n đi, ph&agrave;m nh&acirc;n tu ti&ecirc;n liền ph&agrave;m nh&acirc;n tu ti&ecirc;n.&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt y&ecirc;n lặng nghĩ đến.</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nTrong vườn dược thảo nhất tuổi gi&agrave; n&ocirc; bộc đ&atilde; hơn 70 tuổi, t&ecirc;n l&agrave; Vương l&atilde;o đầu, hắn mười mấy tuổi l&uacute;c liền bị Thiết l&atilde;o chọn tr&uacute;ng, b&acirc;y giờ đ&atilde; l&agrave; n&ocirc; bộc l&atilde;nh tụ, bọn n&ocirc; bộc đều lấy hắn như thi&ecirc;n l&ocirc;i sai đ&acirc;u đ&aacute;nh đ&oacute;.<br />\r\n<br />\r\nH&agrave;n Tuyệt đứng dậy, trở lại vườn dược thảo, bắt đầu vẩy nước, thu thập l&aacute; kh&ocirc;.<br />\r\n<br />\r\nVườn dược thảo rất lớn, chừng một c&aacute;i s&acirc;n b&oacute;ng đ&aacute; lớn như vậy, mỗi một vị n&ocirc; bộc đang bận rộn l&uacute;c đều cẩn thận, nếu l&agrave; kh&ocirc;ng cẩn thận ph&aacute; hủy hoa cỏ, Thiết l&atilde;o nhất định tức giận, c&oacute; một &iacute;t dược thảo thậm ch&iacute; tr&agrave;n ngập kịch độc.<br />\r\n<br />\r\nThiết l&atilde;o th&aacute;ng trước mới ra ngo&agrave;i, đo&aacute;n chừng muốn hai ba năm mới c&oacute; thể trở về.<br />\r\n<br />\r\nĐối với tu ti&ecirc;n giả m&agrave; n&oacute;i, hai ba năm căn bản t&iacute;nh kh&ocirc;ng được c&aacute;i g&igrave;.<br />\r\n<br />\r\nTại vườn dược thảo b&ecirc;n trong, H&agrave;n Tuyệt trầm mặc &iacute;t n&oacute;i, cũng kh&ocirc;ng c&oacute; bằng hữu n&agrave;o, cũng liền c&ugrave;ng Vương l&atilde;o đầu giao lưu nhi&ecirc;̀u.<br />\r\n<br />\r\nL&agrave;m xong về sau, hắn liền trở về ph&ograve;ng, bắt đầu tập chống đẩy - h&iacute;t đất, r&egrave;n luyện thể ph&aacute;ch.<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nH&ocirc;m sau trời vừa s&aacute;ng, H&agrave;n Tuyệt rửa mặt xong.<br />\r\n<br />\r\nHắn ngồi tại tr&ecirc;n giường c&acirc;y chờ đợi.<br />\r\n<br />\r\nMột mực đợi đến thuộc t&iacute;nh liệt biểu đổi mới điểm thời gian, H&agrave;n Tuyệt mới tinh thần phấn chấn.<br />\r\n<br />\r\nC&oacute; loại rút thưởng cảm gi&aacute;c.<br />\r\n<br />\r\nĐ&acirc;y l&agrave; hắn mỗi ng&agrave;y mong đợi nhất sự t&igrave;nh.<br />\r\n<br />\r\nHắn xoa xoa đ&ocirc;i b&agrave;n tay.<br />\r\n<br />\r\nTrước lắc linh căn tư chất.<br />\r\n<br />\r\n&laquo; linh căn tư chất: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\nThảo!<br />\r\n<br />\r\nĐ&acirc;y cũng qu&aacute; đen đi!<br />\r\n<br />\r\nH&agrave;n Tuyệt k&eacute;m ch&uacute;t tức chết.<br />\r\n<br />\r\nTay của hắn cũng bắt đầu run rẩy, tiếp tục r&uacute;t Ti&ecirc;n Thi&ecirc;n kh&iacute; vận!<br />\r\n<br />\r\nX&uacute;c xắc lay động!<br />\r\n<br />\r\n&laquo; Ti&ecirc;n Thi&ecirc;n kh&iacute; vận như sau &raquo;<br />\r\n<br />\r\n&laquo; tuyệt thế v&ocirc; song: Ti&ecirc;n tư, mị lực đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; Thi&ecirc;n Mệnh Kiếm Si: Kiếm Đạo tư chất đỉnh cấp, Kiếm Đạo ngộ t&iacute;nh đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; th&acirc;n ph&aacute;p tuyệt trần: Th&acirc;n ph&aacute;p tư chất đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; Ti&ecirc;n Đế hậu duệ: Du h&iacute; cuộc đời bắt đầu về sau, thu hoạch được một bộ tuyệt thế c&ocirc;ng ph&aacute;p tu ti&ecirc;n, 1000 khối linh thạch thượng phẩm &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt ngẩn người.<br />\r\n<br />\r\nHắn trừng to mắt, lập tức kinh hỉ.<br />\r\n<br />\r\nBốn c&aacute;i Ti&ecirc;n Thi&ecirc;n kh&iacute; vận!<br />\r\n<br />\r\nĐ&acirc;y l&agrave; lần đầu đổi mới ra bốn c&aacute;i Ti&ecirc;n Thi&ecirc;n kh&iacute; vận, hơn nữa thoạt nh&igrave;n đều rất ngưu ph&ecirc;.<br />\r\n<br />\r\nH&agrave;n Tuyệt c&agrave;ng xem c&agrave;ng hưng phấn.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nCh&iacute;nh l&agrave; n&oacute;!<br />\r\n<br />\r\nKh&ocirc;ng!<br />\r\n<br />\r\nBọn ch&uacute;ng!<br />\r\n<br />\r\nBốn c&aacute;i đỉnh cấp, một c&aacute;i tuyệt thế!<br />\r\n<br />\r\nXem x&eacute;t liền v&ocirc; c&ugrave;ng gh&ecirc; gớm.<br />\r\n<br />\r\nRung mười một năm, ng&agrave;y qua ng&agrave;y, Ho&agrave;ng Thi&ecirc;n rốt cục kh&ocirc;ng phụ người khổ t&acirc;m!<br />\r\n<br />\r\nH&agrave;n Tuyệt cố gắng b&igrave;nh phục t&acirc;m t&igrave;nh.<br />\r\n<br />\r\nLinh căn tư chất kh&ocirc;ng c&oacute;, hắn tạm thời c&ograve;n kh&ocirc;ng thể click mở bắt đầu du h&iacute; cuộc đời.<br />\r\n<br />\r\nC&ograve;n phải lại lung lay linh căn.<br />\r\n<br />\r\n&quot;Rốt cục khổ tận cam lai, c&oacute; c&aacute;i n&agrave;y bốn c&aacute;i cực phẩm Ti&ecirc;n Thi&ecirc;n kh&iacute; vận, ta cho d&ugrave; 40 tuổi tu luyện, cũng được, ta c&oacute; thể an t&acirc;m lắc linh căn tư chất.&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt nghĩ tới đ&acirc;y, t&acirc;m t&igrave;nh đắc &yacute;.<br />\r\n<br />\r\nĐều đ&atilde; lắc mười một năm, lại lắc mười một năm th&igrave; như thế n&agrave;o?<br />\r\n<br />\r\nH&agrave;n Tuyệt thở d&agrave;i ra một hơi, sau đ&oacute; đứng dậy ra khỏi ph&ograve;ng bắt đầu h&ocirc;m nay lao động.<br />\r\n<br />\r\nHắn chỗ ph&ograve;ng ốc c&oacute; s&aacute;u người ở, một người một c&aacute;i giường, những người kh&aacute;c s&aacute;ng sớm liền rời giường.<br />\r\n<br />\r\nMỗi người đều c&oacute; ch&iacute;nh m&igrave;nh phụ tr&aacute;ch một v&ugrave;ng khu vực, kh&ocirc;ng d&aacute;m c&oacute; sơ xuất.<br />\r\n<br />\r\nH&agrave;n Tuyệt c&ograve;n tuổi nhỏ, chỉ cần l&agrave;m đơn giản một ch&uacute;t c&ocirc;ng việc, Thiết l&atilde;o cũng kh&ocirc;ng d&aacute;m để hắn phụ tr&aacute;ch một v&ugrave;ng khu vực.<br />\r\n<br />\r\nH&ocirc;m nay &aacute;nh nắng đặc biệt tươi đẹp.<br />\r\n<br />\r\nC&oacute; lẽ c&ugrave;ng t&acirc;m t&igrave;nh c&oacute; quan hệ.<br />\r\n<br />\r\nMặt kh&aacute;c n&ocirc; bộc kh&ocirc;ng c&oacute; cảm nhận được H&agrave;n Tuyệt biến h&oacute;a, c&ograve;n chưa bắt đầu du h&iacute; cuộc đời, bốn c&aacute;i Ti&ecirc;n Thi&ecirc;n kh&iacute; vận tăng th&ecirc;m tự nhi&ecirc;n c&ograve;n chưa xuất hiện.<br />\r\n<br />\r\nGiữa trưa.<br />\r\n<br />\r\nC&oacute; hai t&ecirc;n tu sĩ đến.<br />\r\n<br />\r\nNgọc Thanh t&ocirc;ng rất lớn, vườn dược thảo chung quanh đều l&agrave; d&atilde;y n&uacute;i, c&aacute;c tu sĩ kh&ocirc;ng được ph&eacute;p tới nơi đ&acirc;y, đại đa số thời điểm đều l&agrave; ngoại m&ocirc;n chấp sự đến đ&acirc;y y&ecirc;u cầu đan dược, hai t&ecirc;n tu sĩ n&agrave;y kh&iacute; chất cực giai, một nam một nữ, tựa như thần ti&ecirc;n quyến lữ, hấp dẫn tất cả n&ocirc; bộc quay đầu nh&igrave;n lại.<br />\r\n<br />\r\nH&agrave;n Tuyệt cũng quay đầu nh&igrave;n về ph&iacute;a vườn dược thảo cửa ch&iacute;nh.<br />\r\n<br />\r\n&quot;Thật sự l&agrave; ngăn nắp xinh đẹp.&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt thở d&agrave;i.<br />\r\n<br />\r\nBọn hắn những n&ocirc; bộc n&agrave;y quần &aacute;o đều r&aacute;ch tung to&eacute;, m&agrave; hai vị kia tu sĩ &aacute;o b&agrave;o sạch sẽ hoa lệ, như l&agrave; tu ti&ecirc;n v&otilde;ng du b&ecirc;n trong đi ra tới NPC.<br />\r\n<br />\r\nH&agrave;n Tuyệt chỉ l&agrave; t&ugrave;y tiện cảm kh&aacute;i, hắn kh&ocirc;ng ch&uacute;t n&agrave;o h&acirc;m mộ.<br />\r\n<br />\r\nHắn đ&atilde; lắc ra khỏi bốn c&aacute;i Ti&ecirc;n Thi&ecirc;n kh&iacute; vận, sau n&agrave;y th&agrave;nh tựu tuyệt kh&ocirc;ng phải Ngọc Thanh t&ocirc;ng đệ tử ngoại m&ocirc;n c&oacute; thể so s&aacute;nh.<br />\r\n<br />\r\n&quot;Kể từ h&ocirc;m nay, hai người ch&uacute;ng ta phụ tr&aacute;ch thủ hộ Thiết l&atilde;o vườn dược thảo, c&aacute;c ngươi kh&ocirc;ng cần để &yacute; tới ch&uacute;ng ta, cũng kh&ocirc;ng thể đ&atilde; quấy rầy ch&uacute;ng ta tu luyện.&quot; Nam tu sĩ đối với Vương l&atilde;o đầu mặt kh&ocirc;ng thay đổi n&oacute;i ra.</p>', NULL, 2, '2022-06-01 01:30:54', '2022-06-01 01:30:54'),
(16, 'Chương 2: Lục Đạo Linh Thể, đỉnh cấp linh căn', NULL, '<p>&quot;Thiết l&atilde;o xảy ra chuyện rồi?&quot; Vương l&atilde;o đầu cẩn thận từng li từng t&iacute; hỏi.<br />\r\n<br />\r\nMặc d&ugrave; Thiết l&atilde;o hỉ nộ v&ocirc; thường, nhưng Vương l&atilde;o đầu l&agrave;m bạn hắn mấy chục năm, tự nhi&ecirc;n kh&ocirc;ng hy vọng Thiết l&atilde;o xảy ra chuyện.<br />\r\n<br />\r\nNữ tu sĩ lắc đầu n&oacute;i: &quot;Ngọc Thanh t&ocirc;ng gần nhất tiềm nhập ma tu, ngoại m&ocirc;n đặc biệt để cho ch&uacute;ng ta hai người đến bảo hộ, c&aacute;c ngươi kh&ocirc;ng cần lo lắng.&quot;<br />\r\n<br />\r\nVương l&atilde;o đầu nghe ch&uacute;t, kh&ocirc;ng khỏi thở d&agrave;i một hơi.<br />\r\n<br />\r\nHắn chắp tay h&agrave;nh lễ, sau đ&oacute; quay người rời đi.<br />\r\n<br />\r\nHai t&ecirc;n tu sĩ ri&ecirc;ng ph&acirc;̀n mình đi ra, tại vườn dược thảo đại m&ocirc;n hai b&ecirc;n dưới c&acirc;y ngồi xuống tu luyện.<br />\r\n<br />\r\nTheo bọn hắn bắt đầu thổ nạp, bọn hắn quanh th&acirc;n xuất hiện mắt trần c&oacute; thể thấy gi&oacute; lốc.<br />\r\n<br />\r\nĐ&oacute; ch&iacute;nh l&agrave; linh kh&iacute; đi.<br />\r\n<br />\r\nH&agrave;n Tuyệt y&ecirc;n lặng nghĩ đến, sau đ&oacute; tiếp tục vẩy nước.<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nNg&agrave;y thứ hai.<br />\r\n<br />\r\nH&agrave;n Tuyệt tiếp tục lắc x&uacute;c xắc.<br />\r\n<br />\r\n&laquo; linh căn tư chất: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt trợn trắng mắt.<br />\r\n<br />\r\nHắn v&acirc;̣y mà kh&ocirc;ng c&oacute; cảm thấy kỳ qu&aacute;i.<br />\r\n<br />\r\nHắn cũng kh&ocirc;ng hoảng hốt, d&ugrave; sao đều lắc ra khỏi bốn c&aacute;i đỉnh cấp Ti&ecirc;n Thi&ecirc;n kh&iacute; vận, linh căn tư chất c&oacute; thể từ từ lắc.<br />\r\n<br />\r\nHai vị tu sĩ gia nhập cũng kh&ocirc;ng c&oacute; cải biến vườn dược thảo bọn n&ocirc; bộc sinh hoạt.<br />\r\n<br />\r\nKh&ocirc; khan sinh hoạt c&ograve;n đang tiếp tục.<br />\r\n<br />\r\nH&agrave;n Tuyệt mỗi ng&agrave;y trừ lao động b&ecirc;n ngo&agrave;i, ch&iacute;nh l&agrave; r&egrave;n luyện th&acirc;n thể, đổ x&uacute;c xắc.<br />\r\n<br />\r\nNg&agrave;y thứ ba.<br />\r\n<br />\r\nX&uacute;c xắc lay động!<br />\r\n<br />\r\n&laquo; linh căn tư chất: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\nC&oacute; thể!<br />\r\n<br />\r\nTr&ecirc;n c&aacute;n ta!<br />\r\n<br />\r\nH&agrave;n Tuyệt trong l&ograve;ng thầm mắng.<br />\r\n<br />\r\nNg&agrave;y thứ tư.<br />\r\n<br />\r\n&laquo; linh căn tư chất: Ngũ H&agrave;nh Tạp linh căn, th&agrave;nh tựu kh&oacute; si&ecirc;u Tr&uacute;c Cơ &raquo;<br />\r\n<br />\r\n&Acirc;n, ph&agrave;m nh&acirc;n tu ti&ecirc;n ph&ugrave; hợp.<br />\r\n<br />\r\nH&agrave;n Tuyệt lắc đầu.<br />\r\n<br />\r\nHắn c&ograve;n muốn tiếp tục lắc, đ&aacute;nh chết cũng kh&ocirc;ng thể ph&agrave;m nh&acirc;n tu ti&ecirc;n.<br />\r\n<br />\r\nCứ như vậy, H&agrave;n Tuyệt mỗi ng&agrave;y r&egrave;n luyện, mỗi ng&agrave;y lắc x&uacute;c xắc.<br />\r\n<br />\r\nĐại đa số thời điểm đều l&agrave; Tạp linh căn.<br />\r\n<br />\r\nHắn kh&ocirc;ng c&oacute; nhụt ch&iacute;, tin tưởng lu&ocirc;n c&oacute; thể lắc đến nghịch thi&ecirc;n linh căn tư chất.<br />\r\n<br />\r\nMuộn một ch&uacute;t tu ti&ecirc;n cũng kh&ocirc;ng c&oacute; việc g&igrave;.<br />\r\n<br />\r\nD&ugrave; sao hắn kh&ocirc;ng c&oacute; cừu gia.<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nHai năm sau.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nThiết l&atilde;o trở về, hai vị kia tu sĩ h&agrave;nh lễ c&aacute;o từ.<br />\r\n<br />\r\nTất cả n&ocirc; bộc to&agrave;n bộ tụ tập tới, quỳ lạy Thiết l&atilde;o.<br />\r\n<br />\r\nThiết l&atilde;o người mặc &aacute;o b&agrave;o đen, b&ecirc;n h&ocirc;ng c&agrave;i lấy hai c&aacute;i hồ l&ocirc;, t&oacute;c trắng đen xen kẽ, khu&ocirc;n mặt &acirc;m lệ, cho người ta một loại t&iacute;nh t&igrave;nh thật kh&ocirc;ng tốt ấn tượng.<br />\r\n<br />\r\n&quot;Cũng kh&ocirc;ng tệ lắm, chưa từng xu&acirc;́t hi&ecirc;̣n sai lầm.&quot;<br />\r\n<br />\r\nThiết l&atilde;o nh&igrave;n chung quanh một v&ograve;ng, h&agrave;i l&ograve;ng cười n&oacute;i.<br />\r\n<br />\r\nBọn n&ocirc; bộc thở d&agrave;i một hơi, đều lộ ra d&aacute;ng tươi cười.<br />\r\n<br />\r\nThiết l&atilde;o nh&igrave;n về ph&iacute;a H&agrave;n Tuyệt c&ugrave;ng b&ecirc;n cạnh hắn thiếu ni&ecirc;n kh&aacute;c.<br />\r\n<br />\r\n&quot;C&aacute;c ngươi bốn người đi theo ta.&quot;<br />\r\n<br />\r\nThiết l&atilde;o chỉ một ch&uacute;t, liền đi hướng ch&iacute;nh m&igrave;nh lầu c&aacute;c.<br />\r\n<br />\r\nH&agrave;n Tuyệt ch&iacute;nh l&agrave; bốn người một trong.<br />\r\n<br />\r\nBọn hắn lập tức đuổi theo kịp đi.<br />\r\n<br />\r\n&quot;L&agrave; muốn an b&agrave;i ch&uacute;ng ta phụ tr&aacute;ch một bộ phận khu vườn?&quot; H&agrave;n Tuyệt y&ecirc;n lặng nghĩ đến.<br />\r\n<br />\r\nHắn bỗng nhi&ecirc;n ch&uacute; &yacute; tới Thiết l&atilde;o trong tay &aacute;o tay phải đang rỉ m&aacute;u.<br />\r\n<br />\r\nH&agrave;n Tuyệt lập tức kinh dị.<br />\r\n<br />\r\nHẳn l&agrave; Thiết l&atilde;o thụ thương, muốn bắt bọn hắn luyện chế kh&ocirc;i lỗi hoặc l&agrave; đan dược?<br />\r\n<br />\r\nH&agrave;n Tuyệt kiếp trước thế nhưng l&agrave; nh&igrave;n qua kh&ocirc;ng &iacute;t tu ti&ecirc;n tiểu thuyết, hắn ấn tượng s&acirc;u nhất một c&acirc;u ch&iacute;nh l&agrave; tử đạo hữu bất tử bần đạo.<br />\r\n<br />\r\nĐối với tu sĩ m&agrave; n&oacute;i, kh&ocirc;ng c&oacute; c&aacute;i g&igrave; so với ch&iacute;nh m&igrave;nh t&iacute;nh mệnh quan trọng hơn.<br />\r\n<br />\r\nH&agrave;n Tuyệt c&agrave;ng nghĩ c&agrave;ng hoảng, hắn lại kh&ocirc;ng d&aacute;m trốn, chỉ c&oacute; thể cố gắng khắc chế.<br />\r\n<br />\r\nNhập sau ph&ograve;ng, một t&ecirc;n thiếu ni&ecirc;n đ&oacute;ng cửa ph&ograve;ng lại.<br />\r\n<br />\r\nThiết l&atilde;o ngồi tại tr&ecirc;n thủ tọa, d&ograve; x&eacute;t H&agrave;n Tuyệt bốn người.<br />\r\n<br />\r\n&quot;C&aacute;c ngươi đưa tay qua đ&acirc;y.&quot; Thiết l&atilde;o mở miệng ph&acirc;n ph&oacute; n&oacute;i.<br />\r\n<br />\r\nH&agrave;n Tuyệt bốn người nhao nhao n&acirc;ng tay phải l&ecirc;n.<br />\r\n<br />\r\nThiết l&atilde;o từng c&aacute;i sờ soạng một ch&uacute;t.<br />\r\n<br />\r\nH&agrave;n Tuyệt nổi da g&agrave; đều nhanh đi l&ecirc;n.<br />\r\n<br />\r\n&quot;Liền ngươi c&oacute; linh căn, những người kh&aacute;c trở về đi.&quot;<br />\r\n<br />\r\nThiết l&atilde;o đối với một t&ecirc;n cao cao tr&aacute;ng tr&aacute;ng thiếu ni&ecirc;n n&oacute;i ra.<br />\r\n<br />\r\nH&agrave;n Tuyệt thở d&agrave;i một hơi.<br />\r\n<br />\r\nH&ocirc;m nay trước kia, hắn hơi lung lay một ch&uacute;t linh căn tư chất, h&ocirc;m qua hay l&agrave; tứ linh căn, h&ocirc;m nay trực tiếp lắc kh&ocirc;ng c&oacute;.<br />\r\n<br />\r\nKh&ocirc;ng nghĩ tới nh&acirc;n họa đắc ph&uacute;c.<br />\r\n<br />\r\nH&agrave;n Tuyệt đồng t&igrave;nh nh&igrave;n tho&aacute;ng qua cao tr&aacute;ng thiếu ni&ecirc;n.<br />\r\n<br />\r\nTrương C&aacute;p, một t&ecirc;n ưa th&iacute;ch bồ c&acirc;u nhiệt t&igrave;nh H&agrave;i Tử Vương.<br />\r\n<br />\r\nHai vị kh&aacute;c thiếu ni&ecirc;n th&igrave; h&acirc;m mộ nh&igrave;n về ph&iacute;a Trương C&aacute;p.<br />\r\n<br />\r\nTrương C&aacute;p đ&atilde; chờ mong, lại t&acirc;m th&acirc;̀n b&acirc;́t định.<br />\r\n<br />\r\nThiết l&atilde;o kh&ocirc;ng cho ph&eacute;p n&ocirc; bộc tu luyện, nhưng đ&acirc;y cũng l&agrave; lần thứ nhất l&agrave;m n&ocirc; t&agrave;i bọn họ kiểm tra linh căn.<br />\r\n<br />\r\nRời đi lầu c&aacute;c về sau, H&agrave;n Tuyệt kh&ocirc;ng để &yacute; tới hai vị kh&aacute;c thiếu ni&ecirc;n thảo luận, trở về tiếp tục l&agrave;m việc.</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nTừ nay về sau, Trương C&aacute;p liền kh&ocirc;ng tham dự nữa lao động.<br />\r\n<br />\r\nNguy&ecirc;n lai hắn bị Thiết l&atilde;o thu l&agrave;m đồ đệ, c&aacute;i n&agrave;y khiến mặt kh&aacute;c n&ocirc; bộc c&agrave;ng th&ecirc;m ước ao ghen tị.<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng ch&uacute;t n&agrave;o h&acirc;m mộ.<br />\r\n<br />\r\nKhẳng định c&oacute; lừa dối!<br />\r\n<br />\r\nTrước dưỡng thục lại giết!<br />\r\n<br />\r\nH&agrave;n Tuyệt rất may mắn ch&iacute;nh m&igrave;nh kh&ocirc;ng c&oacute; bị chọn tr&uacute;ng.<br />\r\n<br />\r\nHắn c&oacute; hệ thống, kh&ocirc;ng cần b&aacute;i sư.<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nTho&aacute;ng chớp mắt, lại l&agrave; thời gian hai năm.<br />\r\n<br />\r\nThiết l&atilde;o nửa năm trước lại rời đi vườn dược thảo, hắn sau khi đi, trước đ&oacute; đến đ&acirc;y thủ hộ vườn dược thảo hai vị tu sĩ lại tới.<br />\r\n<br />\r\nTrương C&aacute;p b&acirc;y giờ đ&atilde; l&agrave; Luyện Kh&iacute; tu sĩ, c&ograve;n c&ugrave;ng hai vị kia tu sĩ bắt chuyện.<br />\r\n<br />\r\nTất cả n&ocirc; bộc hiện tại cũng đ&ecirc;́n ngửa hắn hơi thở.<br />\r\n<br />\r\nCũng may Trương C&aacute;p ng&agrave;y b&igrave;nh thường vội v&agrave;ng tu luyện, cũng kh&ocirc;ng c&oacute; khi dễ mặt kh&aacute;c n&ocirc; bộc.<br />\r\n<br />\r\nBọn hắn những n&ocirc; bộc n&agrave;y cuối c&ugrave;ng cả đời đều l&agrave; n&ocirc; bộc, Thiết l&atilde;o thường xuy&ecirc;n ra ngo&agrave;i, bọn hắn lại kh&ocirc;ng được rời đi vườn dược thảo, kh&ocirc;ng c&oacute; lợi &iacute;ch tranh chấp, cho n&ecirc;n c&oacute; rất &iacute;t m&acirc;u thuẫn.<br />\r\n<br />\r\nH&agrave;n Tuyệt đ&atilde; 15 tuổi, vẫn như cũ điệu thấp.<br />\r\n<br />\r\nTrong bốn năm, hắn lắc qua tốt nhất tư chất l&agrave; tam linh căn, thể luyện đến Kim Đan cảnh.<br />\r\n<br />\r\nKim Đan cảnh t&iacute;nh l&agrave; c&aacute;i rắm g&igrave;!<br />\r\n<br />\r\nH&agrave;n Tuyệt mục ti&ecirc;u l&agrave; trường sinh bất tử, th&agrave;nh ti&ecirc;n th&agrave;nh thần.<br />\r\n<br />\r\nMột ng&agrave;y n&agrave;y s&aacute;ng sớm.<br />\r\n<br />\r\nH&agrave;n Tuyệt hững hờ lắc x&uacute;c xắc, kh&ocirc;ng c&oacute; &ocirc;m chờ mong, liền c&ugrave;ng mỗi ng&agrave;y đứng l&ecirc;n s&uacute;c miệng một dạng.<br />\r\n<br />\r\n&laquo; linh căn tư chất: Thủy, Mộc song linh căn, tư chất tr&aacute;c tuyệt, c&oacute; hi vọng tu luyện tới Nguy&ecirc;n Anh cảnh &raquo;<br />\r\n<br />\r\nSong linh căn?<br />\r\n<br />\r\nNguy&ecirc;n Anh cảnh?<br />\r\n<br />\r\nChỉ l&agrave; c&oacute; hi vọng?<br />\r\n<br />\r\nH&agrave;n Tuyệt cắt một tiếng, ho&agrave;n to&agrave;n kh&ocirc;ng động t&acirc;m.<br />\r\n<br />\r\nHắn mới 15 tuổi, c&ograve;n c&oacute; thể lại lắc mười lăm năm.<br />\r\n<br />\r\nTiếp tục lắc!<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nXu&acirc;n đi thu tới.<br />\r\n<br />\r\nLại l&agrave; một năm qua đi.<br />\r\n<br />\r\nH&agrave;n Tuyệt mỗi ng&agrave;y s&aacute;ng sớm ho&agrave;n to&agrave;n như trước đ&acirc;y đổ x&uacute;c xắc.<br />\r\n<br />\r\n&laquo; linh căn tư chất: Lục Đạo Linh Thể, ẩn chứa đỉnh cấp Phong, Hỏa, Thủy, Thổ, Mộc, L&ocirc;i linh căn, gia tăng nhất định kh&iacute; vận &raquo;<br />\r\n<br />\r\nLiền c&aacute;i n&agrave;y?<br />\r\n<br />\r\nH&agrave;n Tuyệt v&ocirc; &yacute; thức cắt một tiếng.<br />\r\n<br />\r\nChờ ch&uacute;t!<br />\r\n<br />\r\nLiền c&aacute;i n&agrave;y!</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nH&agrave;n Tuyệt trừng to mắt, h&ocirc; hấp đều dồn dập l&ecirc;n.<br />\r\n<br />\r\nĐến rồi!<br />\r\n<br />\r\nR&ograve;ng r&atilde; mười s&aacute;u năm!<br />\r\n<br />\r\nRốt cục lắc ra khỏi sảng văn nam ch&iacute;nh hẳn l&agrave; c&oacute; linh căn tư chất!<br />\r\n<br />\r\nH&agrave;n Tuyệt dụi dụi con mắt, cẩn thận x&aacute;c nhận.<br />\r\n<br />\r\nĐỉnh cấp linh căn!<br />\r\n<br />\r\nHay l&agrave; s&aacute;u loại thuộc t&iacute;nh đỉnh cấp linh căn!<br />\r\n<br />\r\n&quot;H&ocirc;. . .&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt cố gắng b&igrave;nh phục t&acirc;m t&igrave;nh.<br />\r\n<br />\r\nRốt cuộc đ&atilde; đến!<br />\r\n<br />\r\nCh&iacute;nh l&agrave; c&aacute;i n&agrave;y!<br />\r\n<br />\r\nĐ&acirc;y mới l&agrave; hắn hẳn l&agrave; c&oacute; linh căn tư chất!<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng c&oacute; lập tức click mở bắt đầu du h&iacute; cuộc đời, hắn sợ động tĩnh qu&aacute; lớn, d&ugrave; sao cửa ra v&agrave;o c&ograve;n c&oacute; hai vị tu sĩ tại trấn giữ.<br />\r\n<br />\r\n&quot;Vấn đề tới, ta phải chờ tới lúc nào?&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt xoắn xu&yacute;t nghĩ đến.<br />\r\n<br />\r\nTrước mắt hắn bỗng nhi&ecirc;n to&aacute;t ra một h&agrave;ng chữ:<br />\r\n<br />\r\n&laquo; c&oacute; thể lựa chọn một c&aacute;i địa phương nhỏ, hệ thống hỗ trợ s&aacute;ng tạo kết giới, b&ecirc;n ngo&agrave;i kết giới tu sĩ kh&ocirc;ng thể nhận ra đến trong kết giới biến h&oacute;a &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt kinh hỉ, hắn lập tức đi tới cửa trước, x&aacute;c định tất cả n&ocirc; bộc đều đi vườn dược thảo về sau, hắn đ&oacute;ng cửa ph&ograve;ng.<br />\r\n<br />\r\nHắn đứng trong ph&ograve;ng, điều ra thuộc t&iacute;nh liệt biểu, ng&oacute;n tay run run rẩy rẩy điểm hướng ph&iacute;a dưới c&ugrave;ng nhất &laquo; click mở bắt đầu du h&iacute; cuộc đời &raquo;.<br />\r\n<br />\r\nClick th&agrave;nh c&ocirc;ng!<br />\r\n<br />\r\nThuộc t&iacute;nh liệt biểu biến đổi.<br />\r\n<br />\r\nTừng h&agrave;ng chữ xuất hiện tại H&agrave;n Tuyệt trước mắt:<br />\r\n<br />\r\n&laquo; bắt đầu du h&iacute; cuộc đời &raquo;<br />\r\n<br />\r\n&laquo; xem nh&acirc;n sinh kinh lịch &raquo;<br />\r\n<br />\r\n&laquo; H&agrave;n Uy&ecirc;n, ngươi sinh ra ở thế gian một tu ti&ecirc;n trong t&ocirc;ng m&ocirc;n, từ nhỏ đến lớn, dung nhan tuyệt thế, bị người y&ecirc;u th&iacute;ch, cha mẹ của ngươi tại ngươi tuổi nhỏ l&uacute;c vứt bỏ ngươi m&agrave; đi, từ nơi s&acirc;u xa, tựa hồ c&oacute; c&aacute;i g&igrave; vận mệnh c&acirc;̀n ngươi c&otilde;ng phụ, ngươi tr&ecirc;n Kiếm Đạo c&oacute; loại si&ecirc;u việt thế nh&acirc;n tuyệt đỉnh thi&ecirc;n ph&uacute;, ngươi thường xuy&ecirc;n c&oacute; thể cảm nhận được giữa thi&ecirc;n địa ẩn chứa s&aacute;u loại đo&aacute;n kh&ocirc;ng được, nh&igrave;n kh&ocirc;ng thấy lực lượng thần b&iacute;. . . &raquo;<br />\r\n<br />\r\n&laquo; cho đến h&ocirc;m nay, ngươi ngo&agrave;i &yacute; muốn thức tỉnh Ti&ecirc;n Đế truyền thừa, thu hoạch được tuyệt thế c&ocirc;ng ph&aacute;p &laquo; Lục Đạo Lu&acirc;n Hồi C&ocirc;ng &raquo;, ngươi bởi vậy bước l&ecirc;n con đường tu hành. &raquo;<br />\r\n<br />\r\n&laquo; xin mời lựa chọn ngươi chủ yếu tu h&agrave;nh lộ tuyến &raquo;<br />\r\n<br />\r\n&laquo; một, kiếm tu &raquo;<br />\r\n<br />\r\n&laquo; hai, l&ocirc;i tu &raquo;<br />\r\n<br />\r\n&laquo; ba, thổ tu &raquo;<br />\r\n<br />\r\n&laquo; bốn, hỏa tu &raquo;<br />\r\n<br />\r\n&laquo; năm, thủy tu &raquo;<br />\r\n<br />\r\n&laquo; s&aacute;u, mộc tu &raquo;<br />\r\n<br />\r\n&laquo; bảy, phong tu &raquo;</p>', NULL, 2, '2022-06-01 00:29:31', '2022-06-01 00:29:31'),
(19, 'Chương 1: Sư muội, cái này Thiên Nguyên Đan vẫn là lưu cho ngươi đi!', NULL, '<p>Đ&ocirc;ng Ch&acirc;u, Đạo Vực.<br />\r\n<br />\r\nĐ&ocirc;ng L&acirc;m T&ocirc;ng.<br />\r\n<br />\r\n&mdash;&mdash;<br />\r\n<br />\r\nKho&aacute;ng đạt trong đại điện, bốn ph&iacute;a rường cột chạm trổ, &acirc;m u dưới &aacute;nh nến.<br />\r\n<br />\r\nMột vị cả người toả ra hủ hủ chi kh&iacute; &aacute;o x&aacute;m l&atilde;o giả, đang khoanh ch&acirc;n ngồi tr&ecirc;n tr&ecirc;n bồ đo&agrave;n.<br />\r\n<br />\r\nCh&iacute;nh l&agrave; Đ&ocirc;ng L&acirc;m T&ocirc;ng đương nhiệm t&ocirc;ng chủ!<br />\r\n<br />\r\nỞ trước mặt hắn, đứng ở một đ&ocirc;i nam nữ, khu&ocirc;n mặt đều l&agrave; thập phần thanh t&uacute;.<br />\r\n<br />\r\nChỉ bất qu&aacute; nữ ni&ecirc;n kỷ muốn nhỏ b&eacute; trẻ hơn một ch&uacute;t, ước chừng mười lăm mười s&aacute;u tuổi d&aacute;ng vẻ.<br />\r\n<br />\r\n&quot;Dao Ca, tuy l&agrave; ngươi tư chất rất tốt, ch&iacute;nh l&agrave; &iacute;t c&oacute; t&ocirc;́i thượng đẳng, dựa theo lẽ thường, n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan n&ecirc;n cho ngươi.&quot;<br />\r\n<br />\r\n&quot;Nhưng chuyện thế gian, một số thời khắc kh&ocirc;ng thể ho&agrave;n to&agrave;n d&ugrave;ng tư chất để c&acirc;n nhắc.&quot;<br />\r\n<br />\r\n&quot;Đại sư huynh của ngươi Lục Huyền tư chất x&aacute;c thực kh&ocirc;ng kịp ngươi, nhưng những năm gần đ&acirc;y, v&igrave; t&ocirc;ng m&ocirc;n cũng coi như chịu mệt nhọc, hơn nữa ở rất nhiều năm trước, vi sư cũng đ&atilde; đem n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan hứa hẹn cho hắn.&quot;<br />\r\n<br />\r\n&quot;Sở dĩ rất xin lỗi, n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan vi sư kh&ocirc;ng thể cấp ngươi.&quot;<br />\r\n<br />\r\nL&atilde;o giả chậm r&atilde;i nh&igrave;n về ph&iacute;a thiếu nữ.<br />\r\n<br />\r\nNghe vậy, thiếu nữ như nước m&acirc;u quang hơi tối sầm lại.<br />\r\n<br />\r\nThi&ecirc;n Nguy&ecirc;n Đan ch&iacute;nh l&agrave; cao tới lục phẩm đan dược, m&igrave;nh nếu l&agrave; c&oacute; thể d&ugrave;ng, &iacute;t nhất c&oacute; thể r&uacute;t ngắn hai ba năm thời gian tu luyện!<br />\r\n<br />\r\nNhưng sư t&ocirc;n nếu n&oacute;i như vậy, n&agrave;ng cũng v&ocirc; ph&aacute;p n&oacute;i c&aacute;i g&igrave; nữa.<br />\r\n<br />\r\nLập tức n&agrave;ng hơi nghi&ecirc;ng đầu, nh&igrave;n về ph&iacute;a b&ecirc;n người &aacute;o b&agrave;o trắng thanh ni&ecirc;n.<br />\r\n<br />\r\nThanh ni&ecirc;n v&oacute;c người cao to, da dẻ Như Ngọc, nh&igrave;n qua thập phần nho nh&atilde;.<br />\r\n<br />\r\nCh&iacute;nh l&agrave; t&ocirc;ng m&ocirc;n đại sư huynh.<br />\r\n<br />\r\nLục Huyền.<br />\r\n<br />\r\nSo với n&agrave;ng v&agrave;o t&ocirc;ng sớm mười năm c&oacute; thừa.<br />\r\n<br />\r\n&quot;H&ocirc;!&quot;<br />\r\n<br />\r\nLục Huyền trong l&ograve;ng bu&ocirc;ng lỏng.<br />\r\n<br />\r\nN&oacute;i thật, hắn vốn tưởng rằng n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan c&ugrave;ng ch&iacute;nh m&igrave;nh kh&ocirc;ng đ&ugrave;a.<br />\r\n<br />\r\nD&ugrave; sao tiểu sư muội Khương Dao Ca tư chất tốt hơn hắn ra rất nhiều, ch&iacute;nh l&agrave; t&ocirc;́i thượng đẳng, lại tiến l&ecirc;n một bước, liền thế gian hiếm thấy thi&ecirc;n nh&acirc;n phong th&aacute;i, tương lai nhất định c&oacute; thể đi tới Vương Cảnh!<br />\r\n<br />\r\nSở dĩ ở tiểu sư muội v&agrave;o t&ocirc;ng thời điểm, hắn liền dự liệu được sau n&agrave;y thứ tốt kh&ocirc;ng c&oacute; phần của m&igrave;nh.<br />\r\n<br />\r\nAi nghĩ được sư t&ocirc;n thế m&agrave; c&ograve;n l&agrave; đem n&agrave;y c&aacute;i cực kỳ tr&acirc;n qu&yacute; Thi&ecirc;n Nguy&ecirc;n Đan cho hắn!<br />\r\n<br />\r\nTheo s&aacute;ch a!</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nTrước đ&acirc;y kh&ocirc;ng c&oacute; b&aacute;i sai!<br />\r\n<br />\r\nNhận thấy được b&ecirc;n cạnh hơi &aacute;nh mắt u o&aacute;n, Lục Huyền trong l&ograve;ng than nhẹ.<br />\r\n<br />\r\nQuả thật, từ tư chất đi l&ecirc;n n&oacute;i, n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan ho&agrave;n to&agrave;n ch&iacute;nh x&aacute;c n&ecirc;n cho tiểu sư muội Khương Dao Ca, nhưng tư chất tầm thường hắn c&agrave;ng cần nữa a!<br />\r\n<br />\r\nNếu như kh&ocirc;ng c&oacute; n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan, hắn nhớ đột ph&aacute; hiện hữu cảnh giới, &iacute;t nhất phải lại m&agrave;i nước c&aacute;i thời gian mười mấy năm!<br />\r\n<br />\r\nM&agrave; nh&acirc;n sinh lại c&oacute; mấy c&aacute;i v&agrave;i chục năm đ&acirc;u.<br />\r\n<br />\r\nGiữa l&uacute;c Lục Huyền trầm tư trong l&uacute;c đ&oacute;, l&atilde;o giả đ&atilde; từ trong l&ograve;ng ngực lấy ra một c&aacute;i Bạch Ngọc b&igrave;nh.<br />\r\n<br />\r\nCho d&ugrave; đ&atilde; phong tốt, nhưng như trước c&oacute; m&ugrave;i thuốc nồng nặc lan tr&agrave;n ra, trong nh&aacute;y mắt tr&agrave;n đầy to&agrave;n bộ đại điện.<br />\r\n<br />\r\nVẻn vẹn chỉ l&agrave; h&uacute;t một hớp nhỏ, Lục Huyền liền cảm gi&aacute;c trong cơ thể kh&iacute; huyết tăng trưởng kh&ocirc;ng &iacute;t.<br />\r\n<br />\r\n&quot;Cầm ah.&quot;<br />\r\n<br />\r\nL&atilde;o giả nh&igrave;n lấy Lục Huyền, mỉm cười.<br />\r\n<br />\r\nT&ecirc;n đệ tử n&agrave;y tuy l&agrave; thi&ecirc;n ph&uacute; một dạng, nhưng cẩn trọng, chịu khổ nhọc, kh&ocirc;ng khơi ra một điểm tỳ vết n&agrave;o.<br />\r\n<br />\r\nNếu như tư chất cho d&ugrave; tốt điểm l&agrave; được, c&aacute;i n&agrave;y dạng mặc d&ugrave; ch&iacute;nh m&igrave;nh chết rồi, t&ocirc;ng m&ocirc;n cũng coi như c&oacute; người kế tục, kh&ocirc;ng đến mức kh&ocirc;ng c&ograve;n mặt mũi đối với tổ ti&ecirc;n.<br />\r\n<br />\r\n&quot;Đa tạ sư t&ocirc;n!&quot;<br />\r\n<br />\r\nLục Huyền đưa tay tiếp nhận.<br />\r\n<br />\r\nỞ b&igrave;nh thuốc chạm tới l&ograve;ng b&agrave;n tay thời điểm, d&ograve;ng suy nghĩ của hắn cũng l&agrave; nhịn kh&ocirc;ng được k&iacute;ch động dưới.<br />\r\n<br />\r\nLục Phẩm Thi&ecirc;n Nguy&ecirc;n Đan, đ&acirc;y đối với ai tới n&oacute;i, đều l&agrave; một c&aacute;i kh&ocirc;ng c&aacute;ch n&agrave;o cự tuyệt đại cơ duy&ecirc;n!<br />\r\n<br />\r\nNhưng m&agrave; đ&uacute;ng v&agrave;o l&uacute;c n&agrave;y, trong đầu cũng l&agrave; vang l&ecirc;n một đạo băng l&atilde;nh thanh &acirc;m.<br />\r\n<br />\r\n&quot;Keng!&quot;<br />\r\n<br />\r\n&quot;Cơ duy&ecirc;n bồi thường hệ thống đ&atilde; login!&quot;<br />\r\n<br />\r\n&quot;Bắt đầu tr&oacute;i chặt!&quot;<br />\r\n<br />\r\n&quot;Tr&oacute;i chặt th&agrave;nh c&ocirc;ng!&quot;<br />\r\n<br />\r\n&quot;Hệ. . . Hệ thống ?&quot;<br />\r\n<br />\r\nLục Huyền đồng tử hơi co lại.<br />\r\n<br />\r\nĐi tới c&aacute;i n&agrave;y thế giới thời gian, hắn từng v&ocirc; số lần k&ecirc;u qua hệ thống, nhưng từ kh&ocirc;ng c&oacute; được qu&aacute; đ&aacute;p lại.<br />\r\n<br />\r\nL&acirc;u ng&agrave;y, hắn sớm đ&atilde; bu&ocirc;ng tha, kh&ocirc;ng nghĩ tới l&uacute;c n&agrave;y hệ thống cũng l&agrave; thượng tuyến ? !<br />\r\n<br />\r\nS&acirc;u hấp một khẩu kh&iacute;, Lục Huyền để cho m&igrave;nh b&igrave;nh tĩnh trở lại.<br />\r\n<br />\r\nNội t&acirc;m hỏi &quot;Hệ thống, ngươi c&oacute; c&aacute;i g&igrave; c&ocirc;ng năng ?&quot;</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n&quot;Bổn hệ thống trước mặt c&ocirc;ng năng thập phần đơn giản!&quot;<br />\r\n<br />\r\n&quot;Chỉ cần k&iacute; chủ đem cơ duy&ecirc;n biếu tặng người kh&aacute;c, c&oacute; thể c&oacute; được bạo k&iacute;ch bồi thường!&quot;<br />\r\n<br />\r\n&quot;Biếu tặng cơ duy&ecirc;n ? Bạo k&iacute;ch bồi thường ?&quot;<br />\r\n<br />\r\nLục Huyền hơi thất thần.<br />\r\n<br />\r\nKh&aacute; lắm, hệ thống n&agrave;y ho&agrave;n to&agrave;n kh&ocirc;ng theo lẽ thường xuất b&agrave;i.<br />\r\n<br />\r\nCơ duy&ecirc;n đồ chơi n&agrave;y, ai ước g&igrave; c&agrave;ng nhiều c&agrave;ng tốt.<br />\r\n<br />\r\nNhưng hệ thống cũng l&agrave; muốn hắn đem cơ duy&ecirc;n đưa cho người kh&aacute;c!<br />\r\n<br />\r\nBất qu&aacute; c&oacute; bạo k&iacute;ch bồi thường ở, ngược lại cũng kh&ocirc;ng phải l&agrave; kh&ocirc;ng thể được!<br />\r\n<br />\r\nNhưng c&aacute;i n&agrave;y bồi thường đến tột c&ugrave;ng l&agrave; c&aacute;i g&igrave;, c&ograve;n chưa biết được.<br />\r\n<br />\r\n&quot;Mời k&iacute; chủ đem trước mắt cơ duy&ecirc;n biếu tặng người kh&aacute;c, sẽ được bạo k&iacute;ch bồi thường!&quot;<br />\r\n<br />\r\nHệ thống n&oacute;i lần nữa.<br />\r\n<br />\r\n&quot;Trước mắt cơ duy&ecirc;n ?&quot;<br />\r\n<br />\r\nLục Huyền liếc nh&igrave;n trong tay Bạch Ngọc b&igrave;nh, kh&oacute;e mắt nhỏ b&eacute; quất.<br />\r\n<br />\r\nĐ&acirc;y ch&iacute;nh l&agrave; cực kỳ tr&acirc;n qu&yacute; Thi&ecirc;n Nguy&ecirc;n Đan a!<br />\r\n<br />\r\nLớn như vậy Đạo Vực, chỉ c&oacute; b&ecirc;n tr&ecirc;n tứ t&ocirc;ng một trong Dược Thần T&ocirc;ng (t&agrave;i năng)mới c&oacute; thể luyện chế được!<br />\r\n<br />\r\nCh&iacute;nh m&igrave;nh đợi nhiều năm như vậy mới(chỉ c&oacute;) đợi đến!<br />\r\n<br />\r\n&quot;T&iacute;nh rồi, tặng người sẽ đưa người ah.&quot;<br />\r\n<br />\r\nLục Huyền trong l&ograve;ng gi&atilde;y dụa một hồi, tuyển trạch tin tưởng hệ thống c&aacute;i gọi l&agrave; bồi thường.<br />\r\n<br />\r\nLập tức hắn điều chỉnh t&acirc;m t&iacute;nh, nghĩ kỹ t&igrave;m từ, nh&igrave;n về ph&iacute;a Khương Dao Ca.<br />\r\n<br />\r\nĐối mặt đột nhi&ecirc;n nh&igrave;n tới Lục Huyền, Khương Dao Ca tiếu mỹ tr&ecirc;n mặt lộ ra vẻ nghi ngờ.<br />\r\n<br />\r\nĐại sư huynh v&igrave; sao phải nh&igrave;n ta đ&acirc;u ?<br />\r\n<br />\r\nGiữa l&uacute;c n&agrave;ng nghi hoặc trong l&uacute;c đ&oacute;, Lục Huyền cầm l&ecirc;n Khương Dao Ca mềm mại tay, đem Bạch Ngọc b&igrave;nh bỏ v&agrave;o l&ograve;ng b&agrave;n tay của n&agrave;ng trung.<br />\r\n<br />\r\n&quot;Đại sư huynh, ngươi đ&acirc;y l&agrave; ?&quot;<br />\r\n<br />\r\nKhương Dao Ca trong nh&aacute;y mắt bối rối, thập phần kh&ocirc;ng hiểu.<br />\r\n<br />\r\nBao qu&aacute;t l&atilde;o giả ở b&ecirc;n trong, cũng giống như vậy.<br />\r\n<br />\r\n&quot;Huyền Nhi, ngươi đang l&agrave;m c&aacute;i g&igrave; ?&quot;<br />\r\n<br />\r\nL&atilde;o giả hỏi.<br />\r\n<br />\r\n&quot;Sư t&ocirc;n, vừa rồi ta hảo hảo nghĩ nghĩ, c&aacute;i n&agrave;y Thi&ecirc;n Nguy&ecirc;n Đan hay l&agrave; cho tiểu sư muội ah.&quot;</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nLục Huyền ho nhẹ một tiếng, nghi&ecirc;m mặt n&oacute;i, &quot;Tiểu sư muội tư chất so với ta tốt ra nhiều lắm, c&oacute; thể ho&agrave;n mỹ hấp thu hết n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan, nếu l&agrave; ta d&ugrave;ng, tối đa bất qu&aacute; năm phần mười, qu&aacute; l&atilde;ng ph&iacute;.&quot;<br />\r\n<br />\r\n&quot;Mặc d&ugrave; l&agrave; năm phần mười, đối với ngươi m&agrave; n&oacute;i, cũng l&agrave; kh&oacute; c&oacute; thể tưởng tượng trợ gi&uacute;p.&quot;<br />\r\n<br />\r\nL&atilde;o giả cau m&agrave;y, khuy&ecirc;n.<br />\r\n<br />\r\n&quot;Sư t&ocirc;n, ta bi&ecirc;́t &yacute; tứ của ngươi, nhưng ta tiềm lực hữu hạn, d&ugrave;ng cũng liền như vậy, nhưng sư muội bất đồng, tương lai của n&agrave;ng muốn so ta quang minh, &quot;<br />\r\n<br />\r\nLục Huyền mỉm cười, &quot;T&ocirc;ng m&ocirc;n cũng c&agrave;ng cần n&agrave;ng.&quot;<br />\r\n<br />\r\n&quot;Tốt. . . Ah.&quot;<br />\r\n<br />\r\nThấy vậy, l&atilde;o giả do dự một ch&uacute;t, cũng liền kh&ocirc;ng cần phải nhiều lời nữa.<br />\r\n<br />\r\nNh&igrave;n lấy trong tay Bạch Ngọc b&igrave;nh, Khương Dao Ca trong mắt tr&agrave;n đầy kinh ngạc c&ugrave;ng kh&oacute; c&oacute; thể tin.<br />\r\n<br />\r\nN&agrave;ng kh&ocirc;ng thể tin được ở nơi n&agrave;y nh&acirc;n t&igrave;nh lạnh l&ugrave;ng tr&ecirc;n đời lại c&ograve;n c&oacute; nguyện &yacute; đem Thi&ecirc;n Nguy&ecirc;n Đan chắp tay tương nhượng người!<br />\r\n<br />\r\nĐiều n&agrave;y sao c&oacute; thể chứ ?<br />\r\n<br />\r\nĐ&acirc;y ch&iacute;nh l&agrave; Thi&ecirc;n Nguy&ecirc;n Đan a!<br />\r\n<br />\r\nNếu l&agrave; ở b&ecirc;n ngoài t&ocirc;ng, n&agrave;ng thậm ch&iacute; sẽ v&igrave; n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan đao kiếm tương hướng!<br />\r\n<br />\r\nNhưng b&acirc;y giờ đại sư huynh cũng l&agrave; bỏ qua đột ph&aacute; của m&igrave;nh, đem Thi&ecirc;n Nguy&ecirc;n Đan kh&ocirc;ng c&oacute; bất kỳ điều kiện cho n&agrave;ng.<br />\r\n<br />\r\nLoại chuyện như vậy l&agrave;m cho Khương Dao Ca cảm nhận được một cỗ trước nay chưa c&oacute; chấn động.<br />\r\n<br />\r\n&quot;Lo lắng l&agrave;m c&aacute;i g&igrave;, cầm chắc.&quot;<br />\r\n<br />\r\nLục Huyền vỗ vỗ Khương Dao Ca bả vai.<br />\r\n<br />\r\n&quot;Nhiều. . . Đa tạ sư huynh.&quot;<br />\r\n<br />\r\nKhương Dao Ca kh&ocirc;ng d&aacute;m nh&igrave;n Lục Huyền, hai m&aacute; ửng đỏ.<br />\r\n<br />\r\nĐ&acirc;y cũng kh&ocirc;ng phải l&agrave; thẹn th&ugrave;ng, m&agrave; l&agrave; tao.<br />\r\n<br />\r\nVừa rồi bởi v&igrave; kh&ocirc;ng c&oacute; được n&agrave;y c&aacute;i Thi&ecirc;n Nguy&ecirc;n Đan, n&agrave;ng trong l&ograve;ng vẫn l&agrave; c&oacute; một tia sợi kh&ocirc;ng thoải m&aacute;i, cảm gi&aacute;c m&igrave;nh mới l&agrave; th&iacute;ch hợp nhất người sử dụng n&oacute;.<br />\r\n<br />\r\nNhưng b&acirc;y giờ đại sư huynh cũng l&agrave; chủ động đem Thi&ecirc;n Nguy&ecirc;n Đan cho n&agrave;ng, điều n&agrave;y l&agrave;m cho n&agrave;ng đối với m&igrave;nh cảm gi&aacute;c c&oacute; ch&uacute;t xấu hổ v&ocirc; c&ugrave;ng.<br />\r\n<br />\r\n&quot;Keng!&quot;<br />\r\n<br />\r\n&quot;Biếu tặng cơ duy&ecirc;n th&agrave;nh c&ocirc;ng!&quot;<br />\r\n<br />\r\n&quot;G&acirc;y ra gấp mười lần bạo k&iacute;ch bồi thường!&quot;<br />\r\n<br />\r\n&quot;Thu được: Thi&ecirc;n Nguy&ecirc;n Đan 10 &quot;</p>', NULL, 11, '2022-06-01 08:01:22', '2022-06-01 08:01:22');
INSERT INTO `chapters` (`id`, `title`, `deleted_at`, `content`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(20, 'Chương 1: Tám trăm năm sau', NULL, '<p>1. Chương 01: 800 năm sau<br />\r\n<br />\r\n&quot;Tr&igrave; Dao, ta đối với ngươi như t&igrave;nh cảm ch&acirc;n th&agrave;nh, ngươi v&igrave; sao muốn giết ta?&quot;<br />\r\n<br />\r\nTrương Nhược Trần h&eacute;t lớn một tiếng, nghĩ trước bổ nh&agrave;o về ph&iacute;a trước, &eacute;p tới mạ v&agrave;ng chế tạo giường &quot;Kẽo kẹt&quot; một tiếng, đột nhi&ecirc;n ngồi dậy.<br />\r\n<br />\r\nPh&aacute;t hiện chỉ l&agrave; một giấc mộng, Trương Nhược Trần mới thở ra một hơi thật d&agrave;i, d&ugrave;ng ống tay &aacute;o đem mồ h&ocirc;i tr&ecirc;n tr&aacute;n lau kh&ocirc;.<br />\r\n<br />\r\nKh&ocirc;ng!<br />\r\n<br />\r\nĐ&acirc;y kh&ocirc;ng phải l&agrave; một giấc mộng!<br />\r\n<br />\r\nHắn c&ugrave;ng Tr&igrave; Dao c&ocirc;ng ch&uacute;a ph&aacute;t sinh hết thảy, lại thế n&agrave;o c&oacute; thể l&agrave; một giấc mộng?<br />\r\n<br />\r\nTrương Nhược Trần vốn l&agrave; C&ocirc;n L&ocirc;n Giới ch&iacute;n đại Đế Qu&acirc;n một trong &quot;Minh Đế&quot; con trai độc nhất, năm gần 16 tuổi, lợi dụng nghịch thi&ecirc;n thể chất, tu luyện tới Thi&ecirc;n Cực Cảnh đại vi&ecirc;n m&atilde;n.<br />\r\n<br />\r\nNhưng l&agrave;, ngay tại hắn trở th&agrave;nh C&ocirc;n L&ocirc;n Giới thế hệ tuổi trẻ đệ nhất nh&acirc;n thời điểm, lại chết tại m&igrave;nh thanh mai tr&uacute;c m&atilde; vị h&ocirc;n th&ecirc; Tr&igrave; Dao c&ocirc;ng ch&uacute;a trong tay.<br />\r\n<br />\r\nTr&igrave; Dao c&ocirc;ng ch&uacute;a, l&agrave; ch&iacute;n đại Đế Qu&acirc;n một trong &quot;Thanh Đế&quot; nữ nhi.<br />\r\n<br />\r\nMinh Đế c&ugrave;ng Thanh Đế l&agrave; tốt nhất bạn tri kỉ, Trương Nhược Trần c&ugrave;ng Tr&igrave; Dao c&ocirc;ng ch&uacute;a c&agrave;ng l&agrave; chỉ ph&uacute;c vi h&ocirc;n, từ nhỏ c&ugrave;ng nhau lớn l&ecirc;n, c&ugrave;ng một chỗ tu luyện. Một c&aacute;i tư th&ecirc;́ hi&ecirc;n ngang, một c&aacute;i mỹ mạo tuyệt lu&acirc;n, c&oacute; thể xưng Kim Đồng Ngọc Nữ, l&uacute;c đầu c&oacute; thể trở th&agrave;nh tu luyện giới một đoạn giai thoại.<br />\r\n<br />\r\nTrương Nhược Trần l&agrave;m sao cũng kh&ocirc;ng ngờ được, Tr&igrave; Dao c&ocirc;ng ch&uacute;a thế m&agrave; lại ra tay với hắn!<br />\r\n<br />\r\nChết tại Tr&igrave; Dao c&ocirc;ng ch&uacute;a trong tay về sau, khi Trương Nhược Trần lần nữa tỉnh lại, lại ph&aacute;t hiện m&igrave;nh đ&atilde; tại 800 năm về sau.<br />\r\n<br />\r\nĐ&atilde; từng Tr&igrave; Dao c&ocirc;ng ch&uacute;a, b&igrave;nh định Cửu Đế chi loạn, thống nhất cửu quốc, th&agrave;nh lập thứ nhất Trung Ương Đế Quốc, trở th&agrave;nh to&agrave;n bộ C&ocirc;n L&ocirc;n Giới Ch&uacute;a Tể &mdash;&mdash; Tr&igrave; Dao Nữ Ho&agrave;ng.<br />\r\n<br />\r\n800 năm trước, xưng h&ugrave;ng C&ocirc;n L&ocirc;n Giới Cửu Đế, triệt để trở th&agrave;nh qu&aacute; khứ, biến mất tại lịch sử trường h&agrave; b&ecirc;n trong.<br />\r\n<br />\r\nCửu Đế đ&atilde; chết, Nữ Ho&agrave;ng đương lập.<br />\r\n<br />\r\nThời đại n&agrave;y, chỉ c&oacute; một vị Ho&agrave;ng giả, c&aacute;i kia ch&iacute;nh l&agrave; Tr&igrave; Dao Nữ Ho&agrave;ng, thống ngự thi&ecirc;n hạ, uy l&acirc;m b&aacute;t phương.<br />\r\n<br />\r\n&quot;N&agrave;ng v&igrave; sao muốn giết ta? L&ograve;ng của n&agrave;ng tại sao c&oacute; thể &aacute;c như vậy, hay l&agrave; n&oacute;i l&ograve;ng của phụ nữ đều như thế hung &aacute;c?&quot;<br />\r\n<br />\r\nTrương Nhược Trần &aacute;nh mắt sắc b&eacute;n, t&acirc;m ch&igrave;m như sắt, đầy bụng nghi vấn. Nhưng l&agrave;, nhưng kh&ocirc;ng ai c&oacute; thể gi&uacute;p hắn giải đ&aacute;p.<br />\r\n<br />\r\n800 năm đi qua, sớm đ&atilde; thương hải tang điền, cảnh c&ograve;n người mất, ngoại trừ tu vi tuyệt thế Tr&igrave; Dao Nữ Ho&agrave;ng, thanh xu&acirc;n vẫn như cũ, bất l&atilde;o bất tử. Đ&atilde; từng những cố nh&acirc;n kia, to&agrave;n bộ đều đ&atilde; ho&aacute; th&agrave;nh c&aacute;t v&agrave;ng, biến th&agrave;nh bạch cốt.<br />\r\n<br />\r\nCho d&ugrave; l&agrave; năm đ&oacute; uy phong b&aacute;t diện Cửu Đế, cũng đều to&agrave;n bộ ở nh&acirc;n gian tuyệt t&iacute;ch, chỉ để lại từng đoạn để hậu nh&acirc;n k&eacute;o d&agrave;i truyền tụng huy ho&agrave;ng cố sự.<br />\r\n<br />\r\n&quot;Kẹt kẹt!&quot;<br />\r\n<br />\r\nMột c&aacute;i th&acirc;n thể nhu nhược cung trang mỹ phụ nh&acirc;n, từ b&ecirc;n ngo&agrave;i đẩy cửa đi tới, nh&igrave;n xem ngồi tại tr&ecirc;n giường Trương Nhược Trần, mang theo mắt &acirc;n cần thần, &quot;Trần Nhi, ngươi lại thấy &aacute;c mộng?&quot;</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nTrước mắt người mỹ phụ n&agrave;y, l&agrave; V&acirc;n V&otilde; Quận Vương Vương phi, cũng l&agrave; Trương Nhược Trần mẫu th&acirc;n, L&acirc;m Phi.<br />\r\n<br />\r\nC&aacute;i n&agrave;y một th&acirc;n thể nguy&ecirc;n chủ nh&acirc;n, bởi v&igrave; người yếu nhiều bệnh, ba ng&agrave;y trước liền bệnh chết tại tr&ecirc;n giường.<br />\r\n<br />\r\nTrương Nhược Trần bị Tr&igrave; Dao c&ocirc;ng ch&uacute;a giết chết về sau, lần nữa tỉnh lại, liền xuất hiện tại c&aacute;i n&agrave;y một th&acirc;n thể b&ecirc;n trong, để nguy&ecirc;n bản bệnh chết thiếu ni&ecirc;n khởi tử hồi sinh. C&agrave;ng th&ecirc;m tr&ugrave;ng hợp ch&iacute;nh l&agrave;, c&aacute;i n&agrave;y một th&acirc;n thể nguy&ecirc;n chủ nh&acirc;n, cũng gọi Trương Nhược Trần.<br />\r\n<br />\r\nTrương Nhược Trần vừa mới l&uacute;c tỉnh lại, c&ograve;n rất b&agrave;i x&iacute;ch L&acirc;m Phi. D&ugrave; sao ở trong mắt Trương Nhược Trần, L&acirc;m Phi, chỉ l&agrave; một người xa lạ.<br />\r\n<br />\r\nNhưng l&agrave;, đi qua ba ng&agrave;y tiếp x&uacute;c, Trương Nhược Trần dần dần ph&aacute;t hiện, L&acirc;m Phi thật hết sức quan t&acirc;m hắn, đơn giản cẩn thận, nh&igrave;n thấy Trương Nhược Trần l&agrave;m &aacute;c mộng bị l&agrave;m tỉnh lại, c&agrave;ng kh&ocirc;ng để &yacute; trời đ&ocirc;ng gi&aacute; r&eacute;t, lập tức chạy đến Trương Nhược Trần gian ph&ograve;ng.<br />\r\n<br />\r\nỞ kiếp trước, Trương Nhược Trần chưa bao giờ thấy qua m&igrave;nh mẹ đẻ. Nghe n&oacute;i, tại m&igrave;nh ra đời thời điểm, n&agrave;ng liền đi thế! Kh&ocirc;ng nghĩ tới, bị Tr&igrave; Dao c&ocirc;ng ch&uacute;a giết chết về sau, tr&ugrave;ng sinh tại c&aacute;i n&agrave;y một th&acirc;n thể b&ecirc;n trong, v&acirc;̣y mà để hắn nhiều một vị mẫu th&acirc;n, cảm nhận được t&igrave;nh thương của mẹ ấm &aacute;p.<br />\r\n<br />\r\n&quot;C&oacute; lẽ n&agrave;ng c&ograve;n kh&ocirc;ng biết, m&igrave;nh Trần Nhi, tại ba ng&agrave;y trước, liền bệnh chết!&quot;<br />\r\n<br />\r\nNếu l&agrave; n&oacute;i cho n&agrave;ng ch&acirc;n tướng, n&agrave;ng chưa hẳn chịu được tin dữ n&agrave;y đả k&iacute;ch.<br />\r\n<br />\r\nTrương Nhược Trần nh&igrave;n trước mắt người mỹ phụ n&agrave;y, nh&atilde;n thần trở n&ecirc;n nhu h&ograve;a, mỉm cười: &quot;Mẫu th&acirc;n, kh&ocirc;ng cần lo lắng cho ta, chỉ l&agrave; một giấc mộng m&agrave; th&ocirc;i.&quot;<br />\r\n<br />\r\nL&acirc;m Phi đơn bạc tr&ecirc;n th&acirc;n hất l&ecirc;n một kiện đỏ thẫm sắc ngay cả mũ l&ocirc;ng chồn, ngồi tại Trương Nhược Trần b&ecirc;n giường, vuốt ve Trương Nhược Trần c&aacute;i tr&aacute;n, lo lắng n&oacute;i: &quot;Đ&atilde; ba ng&agrave;y buổi tối, ngươi lu&ocirc;n lu&ocirc;n bị &aacute;c mộng l&agrave;m tỉnh lại, mỗi lần đều gọi &#39;Tr&igrave; Dao&#39; danh tự. N&agrave;ng đến c&ugrave;ng l&agrave; ai a?&quot;<br />\r\n<br />\r\nL&acirc;m Phi tự nhi&ecirc;n kh&ocirc;ng c&oacute; khả năng đem &quot;Tr&igrave; Dao&quot; c&aacute;i t&ecirc;n n&agrave;y, li&ecirc;n tưởng đến thứ nhất Trung Ương Đế Quốc Nữ Ho&agrave;ng.<br />\r\n<br />\r\nHuống hồ, Tr&igrave; Dao Nữ Ho&agrave;ng thống nhất C&ocirc;n L&ocirc;n Giới, th&agrave;nh lập thứ nhất Trung Ương Đế Quốc về sau, liền danh xưng &quot;Đại Uy Đại Đức Nữ Th&aacute;nh Ho&agrave;ng&quot;, b&igrave;nh thường căn bản kh&ocirc;ng c&oacute; người d&aacute;m nhắc tới &quot;Tr&igrave; Dao&quot; hai chữ. Sẽ phạm ki&ecirc;ng kị.<br />\r\n<br />\r\nTrương Nhược Trần n&oacute;i: &quot;Kh&ocirc;ng c&oacute; g&igrave;, mẫu th&acirc;n, ngươi nghe lầm!&quot;<br />\r\n<br />\r\nL&acirc;m Phi thở d&agrave;i một c&aacute;i, n&oacute;i: &quot;Sau n&agrave;y tuyệt đối kh&ocirc;ng n&ecirc;n lại gọi thẳng &#39;Tr&igrave; Dao&#39; hai chữ, cho d&ugrave; l&agrave; trong mộng cũng kh&ocirc;ng được, đ&acirc;y ch&iacute;nh l&agrave; Nữ Ho&agrave;ng tục danh. Gọi thẳng Nữ Ho&agrave;ng tục danh l&agrave; đại bất k&iacute;nh, một khi bị người hữu t&acirc;m nghe được, sẽ bị xử tử.&quot;<br />\r\n<br />\r\nTrương Nhược Trần nhẹ gật đầu, thật chặt nh&eacute;o nh&eacute;o ng&oacute;n tay, c&oacute; phần ngậm th&acirc;m &yacute; n&oacute;i: &quot;Tuyệt đối sẽ kh&ocirc;ng! Sau n&agrave;y...&quot;<br />\r\n<br />\r\nSau n&agrave;y, ta ch&iacute;nh l&agrave; n&agrave;ng &aacute;c mộng.<br />\r\n<br />\r\nL&acirc;m Phi nh&igrave;n xem d&aacute;ng người gầy yếu, sắc mặt t&aacute;i nhợt Trương Nhược Trần, nhẹ nh&agrave;ng thở d&agrave;i một hơi, trong l&ograve;ng v&ocirc; c&ugrave;ng chua x&oacute;t.<br />\r\n<br />\r\nMặc d&ugrave; sinh ở Quận Vương nh&agrave;, nhưng l&agrave;, hắn lại từ nhỏ người yếu nhiều bệnh, đ&atilde; 16 tuổi, vẫn như cũ chỉ c&oacute; thể l&acirc;u d&agrave;i nằm ở tr&ecirc;n giường, chỉ sợ đời n&agrave;y cũng chỉ c&oacute; thể bộ d&aacute;ng n&agrave;y!<br />\r\n<br />\r\nB&ecirc;n ngo&agrave;i, vang l&ecirc;n một trận xốc xếch tiếng bước ch&acirc;n.<br />\r\n<br />\r\n&quot;C&aacute;c ngươi chơi c&aacute;i g&igrave;? Nơi n&agrave;y ch&iacute;nh l&agrave; Ngọc Sấu Cung, ai cho c&aacute;c ngươi l&aacute; gan, d&aacute;m t&ugrave;y &yacute; x&ocirc;ng loạn tiến đến?&quot; Một c&aacute;i dung mạo xinh đẹp thị nữ, muốn ngăn lại x&ocirc;ng v&agrave;o B&aacute;t vương tử, lại bị B&aacute;t vương tử nhẹ nh&agrave;ng đẩy, n&eacute;m tới hơn mười m&eacute;t b&ecirc;n ngo&agrave;i.<br />\r\n<br />\r\nB&aacute;t vương tử thế nhưng l&agrave; một vị v&otilde; giả, tu vi đạt tới Ho&agrave;ng Cực Cảnh hậu kỳ, một chưởng đ&aacute;nh ra, đủ để đem nặng ba trăm c&acirc;n bàn đá đ&aacute;nh ra xa mười trượng, huống chi chỉ l&agrave; một c&aacute;i tr&ecirc;n dưới một trăm c&acirc;n nặng thị nữ?</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nNg&oacute;n tay b&uacute;ng một c&aacute;i, liền c&oacute; thể đưa n&agrave;ng bắn bay ra ngo&agrave;i.<br />\r\n<br />\r\nMột c&aacute;i kia thị nữ k&ecirc;u thảm một tiếng, tr&ugrave;ng điệp ng&atilde; xuống đất, tay tr&aacute;i c&aacute;nh tay bị ng&atilde; đoạn.<br />\r\n<br />\r\nB&aacute;t vương tử mặc một th&acirc;n kim sợi &aacute;o, tr&ecirc;n lưng quấn lấy một c&acirc;y ngọc thạch mang, th&acirc;n thể tr&aacute;ng kiện, c&aacute;nh tay thon d&agrave;i, b&ocirc;̣ pháp trầm ổn, đi v&agrave;o Ngọc Sấu Cung, lặng lẽ nh&igrave;n chằm chằm người thị nữ kia một ch&uacute;t, &quot;Một c&aacute;i n&ocirc; tỳ cũng d&aacute;m cản bản vương tử con đường, thật sự l&agrave; muốn chết.&quot;<br />\r\n<br />\r\nB&aacute;t vương tử sau lưng, đi theo s&aacute;u vị người mặc l&acirc;n gi&aacute;p da gi&aacute;p thị vệ, th&acirc;n thể cao lớn, lưng h&ugrave;m vai gấu, hiển nhi&ecirc;n đều l&agrave; chiến lực cường đại tu sĩ V&otilde; Đạo, thuộc về ho&agrave;ng cung cấm vệ.<br />\r\n<br />\r\nL&acirc;m Phi nghe ph&iacute;a b&ecirc;n ngo&agrave;i động tĩnh, trấn an Trương Nhược Trần cảm x&uacute;c về sau, liền đ&oacute;ng cửa lại, đi ra ngo&agrave;i.<br />\r\n<br />\r\nN&agrave;ng nh&igrave;n chằm chằm đứng ở b&ecirc;n ngo&agrave;i B&aacute;t vương tử, c&oacute; ch&uacute;t cau lại l&ocirc;ng m&agrave;y, n&oacute;i: &quot;B&aacute;t vương tử điện hạ, nơi n&agrave;y ch&iacute;nh l&agrave; Ngọc Sấu Cung, coi như ngươi l&agrave; Vương tử, cũng kh&ocirc;ng thể x&ocirc;ng loạn đi!&quot;<br />\r\n<br />\r\nB&aacute;t vương tử Trương Tế ngẩng đầu nh&igrave;n chằm chằm L&acirc;m Phi, cất cao giọng n&oacute;i: &quot;Vương hậu c&oacute; lệnh, L&acirc;m Phi nương nương c&ugrave;ng Cửu đệ tẩm cung, đổi đến &#39;Tử Di Thi&ecirc;n Điện&#39; . Sau n&agrave;y Ngọc Sấu Cung chủ nh&acirc;n, ch&iacute;nh l&agrave; bản vương tử mẹ đẻ Ti&ecirc;u Phi nương nương.&quot;<br />\r\n<br />\r\nL&acirc;m Phi sắc mặt hơi đổi, n&agrave;ng đ&atilde; sớm ngờ tới một ng&agrave;y n&agrave;y sẽ đến, nhưng l&agrave;, nhưng kh&ocirc;ng c&oacute; nghĩ đến sẽ đến đ&ecirc;́n nhanh như vậy.<br />\r\n<br />\r\nL&acirc;m Phi đau thương cười một tiếng, n&oacute;i: &quot;Vương hậu nhanh như vậy liền muốn đuổi ch&uacute;ng ta mẹ con rời đi Ngọc Sấu Cung sao? Tốt a! Ng&agrave;y mai, ta liền c&ugrave;ng Trần Nhi dọn đi Thi&ecirc;n Điện.&quot;<br />\r\n<br />\r\nB&aacute;t vương tử n&oacute;i: &quot;Thật xin lỗi! Mẫu th&acirc;n n&oacute;i, n&agrave;ng đ&ecirc;m nay liền muốn v&agrave;o ở Ngọc Sấu Cung. Xin L&acirc;m Phi nương nương hiện tại liền dọn đi Thi&ecirc;n Điện!&quot;<br />\r\n<br />\r\nL&acirc;m Phi biết Trương Nhược Trần người yếu nhiều bệnh, chịu kh&ocirc;ng được giày vò, mang theo v&agrave;i phần cầu khẩn ngữ kh&iacute;, n&oacute;i: &quot;B&aacute;t vương tử điện hạ, ngươi cũng biết ngươi Cửu đệ người yếu nhiều bệnh, đ&ecirc;m đ&atilde; khuya, thời tiết r&eacute;t lạnh, vạn nhất...&quot;<br />\r\n<br />\r\nB&aacute;t vương tử cười lạnh, mảy may đều kh&ocirc;ng kh&aacute;ch kh&iacute; n&oacute;i: &quot;L&acirc;m Phi nương nương, tr&ecirc;n đời n&agrave;y người đ&aacute;ng thương nhiều đến đi, nhưng l&agrave;, kh&ocirc;ng phải mỗi người đều đ&aacute;ng gi&aacute; đ&aacute;ng thương. Tất nhi&ecirc;n Cửu đệ người yếu nhiều bệnh, c&aacute;i kia c&ograve;n sống tr&ecirc;n đời l&agrave;m g&igrave;?&quot;<br />\r\n<br />\r\n&quot;Hắn nhưng l&agrave; ngươi Cửu đệ!&quot;<br />\r\n<br />\r\nL&acirc;m Phi c&ograve;n muốn n&oacute;i tiếp c&aacute;i g&igrave;, đột nhi&ecirc;n, cửa ph&iacute;a sau bị đẩy ra.<br />\r\n<br />\r\nTrương Nhược Trần th&acirc;n thể suy yếu, lấy tay chống đỡ cột cửa mới c&oacute; thể miễn cưỡng đứng thẳng, nh&igrave;n chằm chằm c&aacute;ch đ&oacute; kh&ocirc;ng xa B&aacute;t vương tử. Hắn nh&igrave;n như yếu kh&ocirc;ng trải qua gi&oacute; th&acirc;n thể, giống như l&agrave; ẩn chứa &yacute; ch&iacute; bất khuất, n&oacute;i: &quot;Kh&ocirc;ng cần cầu bọn hắn, ch&uacute;ng ta b&acirc;y giờ liền dọn đi.&quot;<br />\r\n<br />\r\n&quot;Trần Nhi, ngươi l&agrave;m sao xuống giường? Kh&iacute; trời b&ecirc;n ngo&agrave;i r&eacute;t lạnh, c&ograve;n kh&ocirc;ng mau trở về.&quot; L&acirc;m Phi liền vội v&agrave;ng tiến l&ecirc;n đỡ Trương Nhược Trần, sợ hắn nhiễm l&ecirc;n phong h&agrave;n.<br />\r\n<br />\r\nTrương Nhược Trần cố chấp lắc đầu, n&oacute;i: &quot;Mẫu th&acirc;n, ch&uacute;ng ta kh&ocirc;ng cần cầu bất luận kẻ n&agrave;o, sớm muộn c&oacute; một ng&agrave;y... Ch&uacute;ng ta sẽ một lần nữa về tới đ&acirc;y!&quot;<br />\r\n<br />\r\nL&acirc;m Phi nh&igrave;n xem Trương Nhược Trần &aacute;nh mắt ki&ecirc;n định, tựa hồ cũng bị t&acirc;m t&igrave;nh của hắn cảm nhiễm, nước mắt lượn quanh nhẹ gật đầu.<br />\r\n<br />\r\nL&acirc;m Phi c&ugrave;ng tham gia vịn Trương Nhược Trần, từng bước một đi ra Ngọc Sấu Cung, ngoại trừ một c&aacute;i kia bị B&aacute;t vương tử một chưởng đẩy đi ra quẳng tay g&atilde;y c&aacute;nh tay thị nữ. Kh&aacute;c những người hầu kia, to&agrave;n bộ đều kh&ocirc;ng c&oacute; đi theo đ&aacute;m bọn hắn rời đi Ngọc Sấu Cung.<br />\r\n<br />\r\nTất cả mọi người nh&igrave;n ra được, L&acirc;m Phi c&ugrave;ng Cửu vương tử đ&atilde; triệt để thất thế, tại Quận Vương trong phủ, lại kh&oacute; c&oacute; bọn hắn nơi sống y&ecirc;n ổn.<br />\r\n<br />\r\nL&uacute;c đầu bọn hắn liền l&agrave; Ngọc Sấu Cung người hầu, hiện tại tự nhi&ecirc;n lựa chọn s&aacute;ng suốt lưu tại Ngọc Sấu Cung, to&agrave;n bộ đều đi nịnh nọt B&aacute;t vương tử vị n&agrave;y chủ nh&acirc;n mới.<br />\r\n<br />\r\nTử Di Thi&ecirc;n Điện, b&igrave;nh thường đều l&agrave; thất sủng Vương phi chỗ ở, mười phần vắng vẻ, đầy đất l&aacute; rụng, tựa hồ đ&atilde; thật l&acirc;u kh&ocirc;ng c&oacute; người ở.<br />\r\n<br />\r\nĐ&ecirc;m lấy s&acirc;u, h&agrave;n phong đ&igrave;u hiu.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nNgồi tại băng l&atilde;nh tr&ecirc;n mặt ghế đ&aacute;, Trương Nhược Trần gầy yếu tr&ecirc;n th&acirc;n bọc lấy một kiện &aacute;o ngo&agrave;i, nhưng như cũ cảm gi&aacute;c được r&eacute;t lạnh.<br />\r\n<br />\r\n&quot;C&aacute;i n&agrave;y một bộ nhục th&acirc;n qu&aacute; yếu ớt, chỉ c&oacute; tu luyện V&otilde; Đạo, mới c&oacute; thể để cho th&acirc;n thể dần dần cường tr&aacute;ng. Nếu kh&ocirc;ng, coi như ta hiện tại l&agrave; Quận Vương chi tử, vẫn như cũ chỉ c&oacute; thể bị người b&agrave;i bố.&quot; Trương Nhược Trần trong l&ograve;ng thầm nghĩ.<br />\r\n<br />\r\n800 năm đi qua, Trương Nhược Trần cũng kh&ocirc;ng biết m&igrave;nh b&acirc;y giờ có th&ecirc;̉ đi nơi n&agrave;o? Tất nhi&ecirc;n thượng thi&ecirc;n an b&agrave;i hắn tr&ugrave;ng sinh tại c&aacute;i n&agrave;y một th&acirc;n thể b&ecirc;n trong, v&ocirc; luận l&agrave; v&igrave; tương lai hướng Tr&igrave; Dao Nữ Ho&agrave;ng b&aacute;o th&ugrave;, vẫn l&agrave; v&igrave; vị kia cẩn thận chiếu cố mẹ ruột của m&igrave;nh, hắn đều nhất định muốn cường đại l&ecirc;n.<br />\r\n<br />\r\nH&ocirc;m nay gặp khuất nhục c&ugrave;ng lạnh nhạt, ho&agrave;n to&agrave;n đều l&agrave; bởi v&igrave; ch&iacute;nh m&igrave;nh qu&aacute; yếu ớt, kh&ocirc;ng c&aacute;ch n&agrave;o phản kh&aacute;ng, kh&ocirc;ng c&aacute;ch n&agrave;o nắm giữ vận mệnh của m&igrave;nh, thậm ch&iacute; ngay cả m&igrave;nh chỗ ở đều bị người kh&aacute;c cưỡng chiếm.<br />\r\n<br />\r\nMuốn c&oacute; được người kh&aacute;c t&ocirc;n trọng, muốn thu hoạch được ấm &aacute;p thoải m&aacute;i dễ chịu ở lại ho&agrave;n cảnh, nhất định phải trở th&agrave;nh một t&ecirc;n v&otilde; giả, chứng minh năng lực của m&igrave;nh.<br />\r\n<br />\r\nTại C&ocirc;n L&ocirc;n Giới, muốn trở th&agrave;nh một t&ecirc;n v&otilde; giả, nhất định phải trước mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot; .<br />\r\n<br />\r\nC&aacute;i gọi l&agrave; &quot;Thần V&otilde; Ấn K&yacute;&quot;, liền l&agrave; Thần Linh ban cho nh&acirc;n loại tu luyện V&otilde; Đạo tư c&aacute;ch. Kh&ocirc;ng c&oacute; mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot; người, liền vĩnh viễn cũng tu luyện kh&ocirc;ng ra ch&acirc;n kh&iacute;, kh&ocirc;ng c&aacute;ch n&agrave;o trở th&agrave;nh giữa thi&ecirc;n địa cường giả.<br />\r\n<br />\r\nTrương Nhược Trần đ&atilde; 16 tuổi, vẫn kh&ocirc;ng c&oacute; mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot; .<br />\r\n<br />\r\nQua 16 tuổi, liền bỏ lỡ tu v&otilde; tốt nhất tuổi t&aacute;c, coi như mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot;, cũng kh&ocirc;ng c&oacute; khả năng lớn bao nhi&ecirc;u th&agrave;nh tựu.<br />\r\n<br />\r\nĐồng dạng đều l&agrave; V&acirc;n V&otilde; Quận Vương nhi tử, v&igrave; sao B&aacute;t vương tử liền c&oacute; thể t&agrave;i tr&iacute; hơn người? C&oacute; thể đem Trương Nhược Trần c&ugrave;ng L&acirc;m Phi đuổi ra Ngọc Sấu Cung?<br />\r\n<br />\r\nCũng l&agrave; bởi v&igrave;, B&aacute;t vương tử tại 10 tuổi thời điểm, liền mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot;, hiện tại đ&atilde; l&agrave; Ho&agrave;ng Cực Cảnh hậu kỳ tuổi trẻ v&otilde; giả.<br />\r\n<br />\r\n&quot;Chỉ cần để cho ta mở ra &#39;Thần V&otilde; Ấn K&yacute;&#39;, ta liền c&oacute; thể tu luyện &laquo; Cửu Thi&ecirc;n Minh Đế Kinh &raquo;. Lấy &laquo; Cửu Thi&ecirc;n Minh Đế Kinh &raquo; huyền diệu, coi như ta đ&atilde; bỏ lỡ tốt nhất tu luyện ni&ecirc;n kỷ, vẫn như cũ có khả năng đuổi kịp kh&aacute;c thi&ecirc;n t&agrave;i, một lần nữa trở th&agrave;nh một t&ecirc;n V&otilde; Đạo cường giả.&quot;<br />\r\n<br />\r\n&laquo; Cửu Thi&ecirc;n Minh Đế Kinh &raquo; l&agrave; Minh Đế tu luyện ch&iacute; cao bảo điển, ngoại trừ Minh Đế b&ecirc;n ngo&agrave;i, liền chỉ c&oacute; Trương Nhược Trần biết &laquo; Cửu Thi&ecirc;n Minh Đế Kinh &raquo; ho&agrave;n chỉnh tu luyện ph&aacute;p quyết.<br />\r\n<br />\r\n&quot;Ng&agrave;y mai sẽ l&agrave; tế tự đại điển, hy vọng c&oacute; thể đạt được Thần Linh t&aacute;n th&agrave;nh, đem &#39;Thần V&otilde; Ấn K&yacute;&#39; mở ra.&quot; Trương Nhược Trần nắm thật chặt nắm đấm, đối mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot; tr&agrave;n ngập kh&aacute;t vọng.<br />\r\n<br />\r\nL&acirc;m Phi đem gian ph&ograve;ng thu thập chỉnh l&yacute; tốt về sau, liền tới n&acirc;ng Trương Nhược Trần, &quot;Trần Nhi, ngươi nhanh sớm nghỉ ngơi một ch&uacute;t đi! Ng&agrave;y mai, c&ograve;n muốn đi tham gia tế tự đại điển.&quot;<br />\r\n<br />\r\n&quot;Mẫu th&acirc;n y&ecirc;n t&acirc;m, ta ng&agrave;y mai khẳng định c&oacute; thể mở ra &#39;Thần V&otilde; Ấn K&yacute;&#39; !&quot; Trương Nhược Trần nói.<br />\r\n<br />\r\n&quot;Ừm! Mẫu th&acirc;n tin tưởng ngươi!&quot;<br />\r\n<br />\r\nL&acirc;m Phi nh&igrave;n thật s&acirc;u Trương Nhược Trần một ch&uacute;t, trong l&ograve;ng nhẹ nh&agrave;ng thở d&agrave;i.<br />\r\n<br />\r\nKỳ thật, n&agrave;ng đối Trương Nhược Trần mở ra &quot;Thần V&otilde; Ấn K&yacute;&quot; căn bản kh&ocirc;ng b&aacute;o bất cứ hy vọng n&agrave;o, d&ugrave; sao Trương Nhược Trần đ&atilde; 16 tuổi, qua 16 tuổi, liền gần như kh&ocirc;ng c&oacute; khả năng c&ograve;n c&oacute; thể mở ra Thần V&otilde; Ấn K&yacute;.<br />\r\n<br />\r\nNhưng l&agrave;, l&agrave;m một vị mẫu th&acirc;n, n&agrave;ng lại nhất định phải cổ vũ con của m&igrave;nh, cho hắn l&ograve;ng tin.</p>', NULL, 32, '2022-06-01 08:02:38', '2022-06-01 08:02:38'),
(21, 'Chương 1: Gã quét rác sai vặt', NULL, '<p>Converter: traitim_phale<br />\r\nChương 01: G&atilde; qu&eacute;t r&aacute;c sai vặt<br />\r\n<br />\r\n<br />\r\nCập nhật l&uacute;c 2012-10-17 15:15:56 số lượng từ: 3378<br />\r\n<br />\r\nTrời tờ mờ s&aacute;ng, Dương Khai tựu tỉnh, hơi ch&uacute;t rửa mặt một phen liền cầm cạnh g&oacute;c tường c&aacute;i chổi đi ra sống một m&igrave;nh ph&ograve;ng nhỏ.<br />\r\n<br />\r\nĐứng tại cửa ra v&agrave;o duỗi lưng một c&aacute;i, nh&igrave;n tho&aacute;ng qua đường ch&acirc;n trời hiển hiện một v&ograve;ng ng&acirc;n bạch sắc, nhắm mắt t&acirc;̣p trung tư tưởng suy nghĩ hưởng thụ lấy một l&aacute;t an b&igrave;nh, lập tức mở mắt ra mảnh vải vũ động thủ b&ecirc;n tr&ecirc;n c&aacute;i chổi, v&ugrave;i đầu thanh l&yacute; chạm mặt đất tro bụi c&ugrave;ng l&aacute; rụng.<br />\r\n<br />\r\nMột bộ Thanh y, mộc mạc sạch sẽ, l&atilde;o th&agrave;nh y sắc kh&ocirc;ng duy&ecirc;n cớ đem thiếu ni&ecirc;n phụ trợ hư trường mấy tuổi. Dương Khai c&aacute;i eo như n&eacute;m lao thẳng tắp, mặc d&ugrave; l&agrave; tại l&agrave;m lấy tầng dưới ch&oacute;t nhất sống, tr&ecirc;n mặt thần sắc cũng cẩn thận tỉ mỉ. Động t&aacute;c rất trọng ổn, nắm bắt c&acirc;y chổi hai tay cũng kh&ocirc;ng d&ugrave;ng bao nhi&ecirc;u lực, th&acirc;n thể thậm ch&iacute; đều kh&ocirc;ng nhiều lắm đong đưa, chỉ bằng bắt tay v&agrave;o l&agrave;m cổ tay chuyển động, c&aacute;i kia c&acirc;y chổi liền dễ sai khiến, du đến hồ đi, theo hắn b&ocirc;̣ pháp di động, tr&ecirc;n mặt đất t&iacute;ch g&oacute;p từng t&iacute; một tro bụi c&ugrave;ng vật lẫn lộn thần kỳ theo s&aacute;t động , phảng phất kh&ocirc;ng duy&ecirc;n cớ trường hai c&aacute;i đ&ugrave;i.<br />\r\n<br />\r\nDương Khai l&agrave; Lăng Ti&ecirc;u C&aacute;c Th&iacute; Luyện đệ tử, ba năm trước đ&acirc;y tiến t&ocirc;ng m&ocirc;n khai thủy tu luyện, có th&ecirc;̉ cho tới h&ocirc;m nay cũng chỉ tu luyện tới T&ocirc;i Thể tầng ba cảnh giới. C&ugrave;ng hắn c&ugrave;ng nhau Nhập M&ocirc;n c&aacute;c sư huynh đệ đ&atilde; sớm vượt xa giai đoạn n&agrave;y, tất cả được cơ duy&ecirc;n b&aacute;i nhập trong m&ocirc;n cao nh&acirc;n tọa hạ thăng chức rất nhanh đi, hắn lại chỉ có th&ecirc;̉ lực bất t&ograve;ng t&acirc;m.<br />\r\n<br />\r\nBa năm T&ocirc;i Thể tầng ba, bực n&agrave;y tư chất đ&atilde; kh&ocirc;ng phải l&agrave; d&ugrave;ng b&igrave;nh thường hai chữ c&oacute; thể h&igrave;nh dung được rồi, quả thực c&oacute; thể n&oacute;i l&agrave; b&igrave;nh thường đến cực điểm.<br />\r\n<br />\r\nKh&ocirc;ng l&agrave;m sao được, Dương Khai chỉ c&oacute; thể ở trong t&ocirc;ng m&ocirc;n tiếp c&aacute;i qu&eacute;t r&aacute;c sống, một b&ecirc;n duy tr&igrave; sinh kế một b&ecirc;n đau khổ tu luyện.<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c l&agrave; c&aacute;i so s&aacute;nh đặc th&ugrave; m&ocirc;n ph&aacute;i, c&aacute;i n&agrave;y đặc th&ugrave; thể hiện m&ocirc;n hạ đệ tử cạnh tranh t&agrave;n khốc l&ecirc;n, tại m&ocirc;n ph&aacute;i n&agrave;y nội, người c&oacute; năng lực thượng vị, kh&ocirc;ng c&oacute; năng lực người đ&agrave;o thải, mạnh được yếu thua c&aacute;i n&agrave;y luật th&eacute;p tại Lăng Ti&ecirc;u C&aacute;c nội bị diễn dịch ph&aacute;t huy v&ocirc; c&ugrave;ng tinh tế.<br />\r\n<br />\r\nNhững thứ kh&aacute;c t&ocirc;ng m&ocirc;n c&oacute; lẽ c&ograve;n c&oacute; ch&uacute;t đồng m&ocirc;n t&igrave;nh bạn tay ch&acirc;n t&igrave;nh nghĩa, nhưng l&agrave; tại Lăng Ti&ecirc;u C&aacute;c nội kh&ocirc;ng c&oacute;! Muốn đi b&ecirc;n tr&ecirc;n b&ograve;, chỉ c&oacute; giẫm phải những c&aacute;i kia c&aacute;i gọi l&agrave; c&aacute;c sư huynh đệ bả vai, bước qua m&aacute;u tươi của bọn hắn, như thế mới c&oacute; tư c&aacute;ch.<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c m&ocirc;n hạ chế nghi&ecirc;m, tại cả c&aacute;i Đại H&aacute;n triều đều l&agrave; tiếng tăm lừng lẫy, mặc d&ugrave; kh&ocirc;ng coi l&agrave; c&aacute;i g&igrave; si&ecirc;u cấp đại ph&aacute;i, có th&ecirc;̉ m&ocirc;n hạ đệ tử tranh đấu chi t&agrave;n khốc nhưng lại số một đấy! Cũng đang bởi v&igrave; như thế, c&aacute;c đệ tử mỗi người v&otilde; phong bưu h&atilde;n, ra ngo&agrave;i h&agrave;nh tẩu giang hồ thời đi&ecirc;̉m chưa c&oacute; người d&aacute;m tr&ecirc;u chọc.<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c c&oacute; một quy củ, 14 tuổi ph&iacute;a dưới đệ tử, v&ocirc; luận l&agrave; ai, theo Nhập M&ocirc;n l&ecirc;n, trong ba năm xem như Th&iacute; Luyện kỳ. Ba năm n&agrave;y thời gian, ăn ở gh&eacute; qua đều do t&ocirc;ng m&ocirc;n phụ tr&aacute;ch, đệ tử chỉ để &yacute; tu luyện l&agrave; được. Ba năm thời gian nội nếu c&oacute; thể đột ph&aacute; T&ocirc;i Thể Kỳ, liền c&oacute; tư c&aacute;ch b&aacute;i nhập trong t&ocirc;ng cao thủ m&ocirc;n hạ l&agrave;m đồ đệ, lại để cho những cao thủ n&agrave;y dạy bảo tu luyện, đương nhi&ecirc;n, cũng c&oacute; thể kh&ocirc;ng b&aacute;i sư ch&iacute;nh m&igrave;nh tu luyện, nhưng l&agrave; con đường tu luyện, c&oacute; lương sư dạy bảo c&ugrave;ng ch&iacute;nh m&igrave;nh lục lọi đ&oacute; l&agrave; ho&agrave;n to&agrave;n bất đồng đấy. Tới một mức độ n&agrave;o đ&oacute; m&agrave; n&oacute;i, Lăng Ti&ecirc;u C&aacute;c c&aacute;i quy củ n&agrave;y cũng c&oacute; ch&uacute;t &iacute;t tự do.<br />\r\n<br />\r\nM&agrave; những c&aacute;i kia trong ba năm kh&ocirc;ng c&oacute; đột ph&aacute; T&ocirc;i Thể Kỳ người, hoặc l&agrave; ly khai t&ocirc;ng m&ocirc;n, hoặc l&agrave; bị gi&aacute;ng chức vi Th&iacute; Luyện đệ tử.<br />\r\n<br />\r\nTh&iacute; Luyện đệ tử, l&agrave; Dương Khai hiện tại th&acirc;n phận! Cũng l&agrave; Lăng Ti&ecirc;u C&aacute;c nội sỉ nhục!<br />\r\n<br />\r\nC&ugrave;ng b&igrave;nh thường đệ tử bất đồng, Th&iacute; Luyện đệ tử sinh tồn ho&agrave;n cảnh c&agrave;ng th&ecirc;m h&agrave; khắc, bởi v&igrave; đi đến một bước n&agrave;y, ăn mặc ngủ nghỉ đều muốn ch&iacute;nh m&igrave;nh quản l&yacute;, t&ocirc;ng m&ocirc;n sẽ kh&ocirc;ng xa hơn tr&ecirc;n người của ngươi l&atilde;ng ph&iacute; bất luận c&aacute;i g&igrave; một phần tu luyện t&agrave;i nguy&ecirc;n. M&agrave; một khi bị gi&aacute;ng chức vi Th&iacute; Luyện đệ tử, tr&ecirc;n cơ bản cuộc đời n&agrave;y tựu vĩnh viễn kh&ocirc;ng ng&agrave;y nổi danh r&ocirc;̀i, trừ phi tại trong thời gian ngắn thực lực mức độ lớn d&acirc;ng l&ecirc;n, kh&aacute;c t&ocirc;ng m&ocirc;n cảm thấy ngươi c&oacute; thể d&ugrave;ng đầu nhập vốn liếng.<br />\r\n<br />\r\nTo&agrave;n bộ Lăng Ti&ecirc;u C&aacute;c 3000 đệ tử, m&agrave; Th&iacute; Luyện đệ tử c&oacute; mấy người? Bất qu&aacute; mười ng&oacute;n số lượng! Dương Khai may mắn trở th&agrave;nh một người trong đ&oacute;!<br />\r\n<br />\r\nTh&iacute; Luyện đệ tử muốn tại Lăng Ti&ecirc;u C&aacute;c nội sống s&oacute;t, quả thực kh&oacute; như l&ecirc;n trời, cũng tỷ như n&oacute;i Dương Khai hiện tại ở lại ph&ograve;ng nhỏ, c&aacute;i kia l&agrave; ch&iacute;nh bản th&acirc;n hắn một căn Mộc Đầu một căn Mộc Đầu dựng , tr&ecirc;n n&oacute;c nh&agrave; nhỏ ph&aacute; mấy c&aacute;i động đều kh&ocirc;ng c&oacute; thời gian quản l&yacute;, vừa đến trời mưa xuống trong ph&ograve;ng liền giọt nước kh&oacute; sắp xếp. Y phục của hắn l&agrave; ch&iacute;nh m&igrave;nh mua , hắn ăn đồ vật l&agrave; m&igrave;nh l&agrave;m cho , hết thảy tất cả đều l&agrave; m&igrave;nh phụ tr&aacute;ch.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nM&agrave; ngay cả ph&ograve;ng nhỏ vị tr&iacute;, đ&atilde; ở Lăng Ti&ecirc;u C&aacute;c hẻo l&aacute;nh nhất kh&ocirc;ng người hỏi thăm địa phương nhất.<br />\r\n<br />\r\nNhư thế kh&ocirc;ng xong đ&atilde;i ngộ, người b&igrave;nh thường rất kh&oacute; nhịn thụ xuống dưới, đ&acirc;y cũng l&agrave; Lăng Ti&ecirc;u C&aacute;c Th&iacute; Luyện đệ tử số lượng rất &iacute;t nguy&ecirc;n nh&acirc;n, tr&ecirc;n cơ bản đ&atilde; qua Th&iacute; Luyện kỳ kh&ocirc;ng c&oacute; đột ph&aacute; T&ocirc;i Thể Cảnh giới đệ tử, đều chọn ly khai Lăng Ti&ecirc;u C&aacute;c c&aacute;i n&agrave;y một con đường, thế nhưng m&agrave; Dương Khai lưu lại.<br />\r\n<br />\r\nĐ&atilde; bị người đuổi ra khỏi cửa qua một lần, l&uacute;c n&agrave;y đ&acirc;y lại c&oacute; thể n&agrave;o như thế?<br />\r\n<br />\r\nMấy th&aacute;ng trước bị gi&aacute;ng chức vi Th&iacute; Luyện đệ tử về sau, Dương Khai liền tại trong t&ocirc;ng m&ocirc;n tiếp c&aacute;i qu&eacute;t r&aacute;c sống duy tr&igrave; ch&iacute;nh m&igrave;nh sinh kế.<br />\r\n<br />\r\nC&oacute; thể n&oacute;i Dương Khai hiện tại đ&atilde; Lăng Ti&ecirc;u C&aacute;c Th&iacute; Luyện đệ tử, cũng l&agrave; Lăng Ti&ecirc;u C&aacute;c qu&eacute;t r&aacute;c g&atilde; sai vặt. Nhưng c&aacute;i n&agrave;y qu&eacute;t r&aacute;c sống, c&oacute; đ&ocirc;i khi cũng kh&ocirc;ng c&aacute;ch n&agrave;o duy tr&igrave; Dương Khai ấm no, thỉnh thoảng địa cơ m&ocirc;̣t ch&acirc;̀u no bụng m&ocirc;̣t ch&acirc;̀u, phong h&agrave;n kh&ocirc;ng người hỏi đến, thời gian qua đau khổ linh đinh. Mặc d&ugrave; như thế, Dương Khai cũng kh&ocirc;ng c&oacute; đ&aacute;nh qua muốn lui lại, nh&acirc;n sinh tr&ecirc;n đời, mấy chục năm hoa, m&igrave;nh lựa chọn con đường n&agrave;y, muốn đi thẳng xuống dưới, bỏ dở nửa chừng cũng kh&ocirc;ng phải l&agrave; nam nh&acirc;n g&acirc;y n&ecirc;n.<br />\r\n<br />\r\nDương Khai c&oacute; một cổ t&iacute;nh bền dẻo, kh&ocirc;ng đụng nam tường kh&ocirc;ng quay đầu lại t&iacute;nh bền dẻo!<br />\r\n<br />\r\nTrời dần dần s&aacute;ng , Dương Khai qu&eacute;t một hồi đấy, những nơi đi qua sạch sẽ, tạp bụi qu&eacute;t sạch kh&ocirc;ng c&ograve;n.<br />\r\n<br />\r\nQu&eacute;t r&aacute;c tuy nhi&ecirc;n kh&ocirc;ng phế kh&iacute; lực g&igrave;, có th&ecirc;̉ s&aacute;ng sớm kh&ocirc;ng ăn kh&ocirc;ng uống tựu động l&acirc;u như vậy, Dương Khai cũng l&agrave; to&agrave;n th&acirc;n mạo hiểm đổ mồ h&ocirc;i, c&aacute;i n&agrave;y c&ugrave;ng thực lực kh&ocirc;ng quan hệ, ho&agrave;n to&agrave;n l&agrave; v&igrave; thể chất qu&aacute; k&eacute;m.<br />\r\n<br />\r\nBa bữa cơm trong c&oacute; lưỡng món ăn cơ, mặc cho ai ở v&agrave;o Dương Khai c&aacute;i n&agrave;y sinh hoạt trong ho&agrave;n cảnh, thể chất cũng sẽ kh&ocirc;ng tốt.<br />\r\n<br />\r\nB&ecirc;n người dần dần x&uacute;m lại đi một t&iacute; Lăng Ti&ecirc;u C&aacute;c đệ tử, những n&agrave;y đệ tử mỗi người đều dậy thật sớm, kh&ocirc;ng đi tu luyện lại v&acirc;y quanh ở Dương Khai b&ecirc;n người, rất nhiều người đều c&oacute; ch&uacute;t hăng h&aacute;i địa đ&aacute;nh gi&aacute; Dương Khai, c&agrave;ng c&oacute; &aacute;nh mắt của người thật l&agrave; tham lam, tựu phảng phất Dương Khai b&acirc;y giờ l&agrave; c&aacute;i kh&ocirc;ng mảnh vải che th&acirc;n đại mỹ nữ, hương kh&iacute; bức người b&aacute;nh tr&aacute;i thơm ngon.<br />\r\n<br />\r\nM&agrave; những n&agrave;y v&acirc;y tụ tại Dương Khai b&ecirc;n người Lăng Ti&ecirc;u C&aacute;c đệ tử tầm đ&oacute;, cũng c&oacute; một cổ khẩn trương cạnh tranh h&agrave;o kh&iacute; tại lan tr&agrave;n, cảnh gi&aacute;c địa đ&aacute;nh gi&aacute; b&ecirc;n người c&aacute;c sư huynh đệ, nguy&ecirc;n một đ&aacute;m sắc mặt bất thiện.<br />\r\n<br />\r\nTrong đ&aacute;m người c&oacute; mặt người lộ kh&ocirc;ng đ&agrave;nh l&ograve;ng, n&oacute;i khẽ: &quot;Nhiều người như vậy, c&oacute; ch&uacute;t qu&aacute; mức ah.&quot;<br />\r\n<br />\r\nLập tức liền c&oacute; người trả lời: &quot;Ngươi cảm thấy nhiều người cũng c&oacute; thể đi ah, kh&ocirc;ng ai muốn ngươi lưu lại.&quot;<br />\r\n<br />\r\nMột c&acirc;u liền lại để cho người nọ ngượng ng&ugrave;ng kh&ocirc;ng n&oacute;i, mọi người đều biết v&igrave; c&aacute;i g&igrave; tụ tập ở chỗ n&agrave;y, cũng biết tại sao phải chằm chằm v&agrave;o Dương Khai, hiện tại tựu l&agrave; đang đợi một khắc n&agrave;y đến. Thời hạn lập tức tựu đ&atilde; tới rồi, hiện tại rời đi chẳng phải l&agrave; qu&aacute; đ&aacute;ng tiếc? Nếu c&oacute; thể đ&atilde; đoạt thứ nhất, h&ocirc;m nay tựu lại l&agrave; một số thu hoạch nha.<br />\r\n<br />\r\nKhắp nơi động tĩnh Dương Khai tự nhi&ecirc;n l&agrave; biết r&otilde; , chỉ bất qu&aacute; hắn thần sắc một mực chưa từng biến qua. Như vậy trận chiến ch&iacute;nh m&igrave;nh mỗi năm ng&agrave;y liền trải qua một lần, một th&aacute;ng s&aacute;u lần, thật sự kh&ocirc;ng c&oacute; g&igrave; hay ngạc nhi&ecirc;n , hơn nữa nh&igrave;n trước mắt người n&agrave;y mấy cũng hơi thiểu đi một t&iacute;, hẳn l&agrave; c&ograve;n kh&ocirc;ng c&oacute; đến đầy đủ nguy&ecirc;n nh&acirc;n.<br />\r\n<br />\r\nCho n&ecirc;n hắn một mực tại qu&eacute;t r&aacute;c, đối với khắp nơi chi nh&acirc;n mặc kệ kh&ocirc;ng hỏi, một đường đi một đường qu&eacute;t.<br />\r\n<br />\r\nTheo thời gian tr&ocirc;i qua, tụ tập tại Dương Khai người b&ecirc;n cạnh c&agrave;ng ng&agrave;y c&agrave;ng nhiều, th&ocirc; sơ giản lược đo&aacute;n chừng &iacute;t nhất cũng c&oacute; ba bốn mươi người nhiều.</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nDương Khai đột nhi&ecirc;n ngừng lại, cứ như vậy ngồi ở giữa đường, chậm r&atilde;i h&iacute;t một hơi, kh&ocirc;i phục lấy ch&iacute;nh m&igrave;nh s&aacute;ng sớm ti&ecirc;u hao thể lực.<br />\r\n<br />\r\nXem x&eacute;t c&aacute;i n&agrave;y động tĩnh, v&acirc;y tụ tại Dương Khai b&ecirc;n người tất cả mọi người lập tức tản ra, bao quanh đưa hắn bao v&acirc;y v&agrave;o giữa, khẩn trương cạnh tranh h&agrave;o kh&iacute; rồi đột nhi&ecirc;n bay vụt đến một c&aacute;i cảnh giới mới, phảng phất liền kh&ocirc;ng kh&iacute; đều kh&ocirc;ng hề lưu động r&ocirc;̀i.<br />\r\n<br />\r\nAi cũng xem ai kh&ocirc;ng vừa mắt, tuy nhi&ecirc;n cũng chờ mong v&ocirc; c&ugrave;ng nh&igrave;n qua Dương Khai.<br />\r\n<br />\r\nNếu để cho kh&ocirc;ng r&otilde; ch&acirc;n tướng người chứng kiến cảnh nầy, chỉ sợ sẽ cho rằng bị v&acirc;y quanh trong đ&aacute;m người ch&iacute;nh l&agrave; c&aacute;i tuyệt đỉnh cao thủ, bằng kh&ocirc;ng như thế n&agrave;o xuất động nhiều như vậy nh&acirc;n số để đối ph&oacute; hắn? Nhưng tr&ecirc;n thực tế, Dương Khai chỉ l&agrave; T&ocirc;i Thể Cảnh tầng ba Th&iacute; Luyện đệ tử m&agrave; th&ocirc;i, ở đ&acirc;y bất cứ người n&agrave;o đều nếu so với Dương Khai lợi hại.<br />\r\n<br />\r\n&quot;Dương Khai, ngươi cũng đừng hao t&acirc;m tổn tr&iacute; tư r&ocirc;̀i, đợi l&aacute;t nữa ngoan ngo&atilde;n gọi ch&uacute;ng ta đ&aacute;nh gục xuống, mọi người cũng tỉnh thời gian kh&ocirc;ng phải tốt sao?&quot; C&oacute; người xem Dương Khai bộ dạng như vậy, lập tức c&oacute; ch&uacute;t khinh thường r&ocirc;̀i.<br />\r\n<br />\r\nCh&iacute;nh l&agrave; một c&aacute;i T&ocirc;i Thể tầng ba c&ograve;n kh&ocirc;i phục l&agrave;m c&aacute;i g&igrave;? D&ugrave; sao cũng l&agrave; muốn thua, chẳng dứt kho&aacute;t một &iacute;t, l&agrave;m g&igrave; như thế k&eacute;o d&agrave;i hơi t&agrave;n?<br />\r\n<br />\r\n&quot;Đúng v&acirc;̣y a đ&uacute;ng vậy a, Dương Khai ngươi tốt xấu cũng th&ocirc;ng cảm tho&aacute;ng một ph&aacute;t chư vị sư huynh đệ t&acirc;m t&igrave;nh ah, mọi người với ngươi có th&ecirc;̉ kh&ocirc;ng giống với, đ&aacute;nh xong trận n&agrave;y ch&uacute;ng ta c&ograve;n muốn đi tu luyện.&quot;<br />\r\n<br />\r\nLời n&agrave;y n&oacute;i , coi như Dương Khai n&ecirc;n bị bọn hắn rất nhanh đ&aacute;nh bại, như vậy Dương Khai hiện tại kh&ocirc;i phục thể lực cũng giống l&agrave; đối với bọn họ bất k&iacute;nh r&ocirc;̀i.<br />\r\n<br />\r\nDương Khai ngoảnh mặt l&agrave;m ngơ, vẫn c&ograve;n như l&atilde;o tăng nhập định.<br />\r\n<br />\r\nThời gian tiếp tục tr&ocirc;i qua, bỗng nhi&ecirc;n, một tiếng du dương trống trải chung tiếng vang l&ecirc;n, đ&oacute; l&agrave; Lăng Ti&ecirc;u C&aacute;c Tiếng Chu&ocirc;ng Buổi S&aacute;ng, tiếng chu&ocirc;ng truyền v&agrave;o tất cả mọi người trong tai, v&acirc;y tụ tại Dương Khai b&ecirc;n người c&aacute;c đệ tử ngay ngắn hướng tinh thần chấn động.<br />\r\n<br />\r\nChung tiếng nổ ch&iacute;n thanh &acirc;m, phương đ&ocirc;ng mặt trời mới mọc bay l&ecirc;n, lại l&agrave; một ng&agrave;y mới!<br />\r\n<br />\r\nMọi người h&ocirc; hấp rồi đột nhi&ecirc;n ch&igrave;m xuống, đ&ocirc;i mắt tr&ocirc;ng mong địa nhìn th&acirc;́y bị v&acirc;y v&agrave;o giữa Dương Khai, Dương Khai chậm r&atilde;i đứng dậy, dẫn theo tr&ecirc;n tay c&acirc;y chổi, nh&agrave;n nhạt địa nh&igrave;n lướt qua b&ecirc;n người một v&ograve;ng người.<br />\r\n<br />\r\n&quot;Tuyển ta &agrave; Dương sư huynh!&quot; C&oacute; người cao giọng h&ocirc;, &quot;Ta ra tay rất nhẹ , cam đoan đ&aacute;nh ch&iacute;nh l&agrave; ngươi kh&ocirc;ng đau!&quot;<br />\r\n<br />\r\n&quot;N&oacute;i l&aacute;o! Tuyển ta, ta sẽ cho ngươi thống kho&aacute;i, một quyền tựu chấm dứt, tuyệt đối kh&ocirc;ng l&atilde;ng ph&iacute; mọi người thời gian.&quot;<br />\r\n<br />\r\n&quot;Tuyển ta...&quot;<br />\r\n&quot;Tuyển ta...&quot;<br />\r\n<br />\r\n<br />\r\nTrong tr&agrave;ng một mảnh ầm ầm , tựu như tr&ecirc;n thị trường đồ ăn bu&ocirc;n b&aacute;n tại chào hàng ch&iacute;nh m&igrave;nh ruộng đồng ở b&ecirc;n trong rau quả, vẫn c&ograve;n so s&aacute;nh liều mạng ai đổi mới ti&ecirc;n.<br />\r\n<br />\r\n&quot;Dương Khai, ngươi có th&ecirc;̉ kh&ocirc;ng ai hư mất ch&iacute;nh m&igrave;nh định ra quy củ!&quot; C&oacute; người nhắc nhở l&ecirc;n tiếng.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nDương Khai cười khẽ, tiện tay cầm đến lấy c&acirc;y chổi hướng bầu trời n&eacute;m đi, hơn mười &aacute;nh mắt ngay ngắn hướng hướng b&ecirc;n tr&ecirc;n nh&igrave;n lại, tr&agrave;n đầy chờ mong địa chờ đợi c&acirc;y chổi rơi xuống đất lập tức, t&acirc;m một người trong k&iacute;nh địa cầu nguyện lấy: &quot;Tuyển ta, tuyển ta!&quot;<br />\r\n<br />\r\nThời gian phảng phất biến tr&igrave; ho&atilde;n, c&acirc;y chổi ở giữa kh&ocirc;ng trung đ&aacute;nh cho mấy c&aacute;i chuyển, chợt rơi xuống, tr&ecirc;n mặt đất g&otilde; g&otilde;, định dạng bất động.<br />\r\n<br />\r\nC&acirc;y chổi đằng trước, chỉ hướng trong đ&aacute;m người một vị th&acirc;n h&igrave;nh kh&ocirc;i ng&ocirc; thiếu ni&ecirc;n.<br />\r\n<br />\r\nMột mảnh tiếc hận tiếng vang l&ecirc;n, tr&agrave;n đầy u o&aacute;n c&ugrave;ng kh&ocirc;ng cam l&ograve;ng. Ngược lại l&agrave; c&aacute;i kia kh&ocirc;i ng&ocirc; thiếu ni&ecirc;n, ha ha cười cười trong đ&aacute;m người đi ra, &ocirc;m quyền x&ocirc;ng mọi người cười n&oacute;i: &quot;Chư vị sư huynh đệ, h&ocirc;m nay một trận chiến n&agrave;y tiểu đệ cầm xuống r&ocirc;̀i, mong rằng chư vị sư huynh đệ chớ tr&aacute;ch.&quot;<br />\r\n<br />\r\n&quot;Thao, vận khí cứt ch&oacute;!&quot; C&oacute; người đố kỵ kh&ocirc;ng th&ocirc;i.<br />\r\n<br />\r\n&quot;L&agrave;m sao lại tuyển kh&ocirc;ng đến ta đ&acirc;u r&ocirc;̀i, lão tử mỗi năm ng&agrave;y đều tới một lần, đ&atilde; đến trọn vẹn một th&aacute;ng, Dương Khai ngươi cố &yacute; a?&quot;<br />\r\n<br />\r\n&quot;Đừng n&oacute;i nữa, ta đ&atilde; đến ba th&aacute;ng, một lần đều kh&ocirc;ng c&oacute; bị tuyển đến qua!&quot;<br />\r\n<br />\r\n&quot;Sư huynh, ngươi so với ta thảm ah.&quot;<br />\r\n<br />\r\n&quot;Kh&ocirc;ng c&oacute; thảm hay kh&ocirc;ng, xem kịch vui l&agrave;.&quot; Lưỡng sư huynh đệ liếc nhau, ngầm hiểu địa nở nụ cười.<br />\r\n<br />\r\nTrong tr&agrave;ng, những người kh&aacute;c đ&atilde; tản ra, chỉ để lại Dương Khai c&ugrave;ng kh&ocirc;i ng&ocirc; thiếu ni&ecirc;n c&ugrave;ng nh&igrave;n nhau.<br />\r\n<br />\r\n&quot;Th&iacute; Luyện đệ tử Dương Khai, T&ocirc;i Thể tầng ba!&quot; Dương Khai nh&igrave;n qua đối phương nói.<br />\r\n<br />\r\n&quot;B&igrave;nh thường đệ tử Chu Định Qu&acirc;n, T&ocirc;i Thể tầng năm!&quot; Kh&ocirc;i ng&ocirc; thiếu ni&ecirc;n tự giới thiệu.<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c đệ tử cũng ph&acirc;n l&agrave; đẳng cấp cấp độ , theo dưới l&ecirc;n tr&ecirc;n l&agrave; Th&iacute; Luyện đệ tử, b&igrave;nh thường đệ tử, tọa hạ đệ tử, tinh anh đệ tử, đệ tử hạch t&acirc;m năm đại đẳng cấp. Chu Định Qu&acirc;n n&oacute;i m&igrave;nh l&agrave; b&igrave;nh thường đệ tử, đ&oacute; ch&iacute;nh l&agrave; c&ograve;n chưa b&aacute;i nhập trong t&ocirc;ng cao thủ m&ocirc;n hạ, kh&ocirc;ng được lương sư chỉ điểm. Nếu l&agrave; đột ph&aacute; T&ocirc;i Thể Kỳ b&aacute;i nhập trong t&ocirc;ng cao thủ m&ocirc;n hạ, l&agrave; rất cao một cấp tọa hạ đệ tử r&ocirc;̀i. Lại cao một cấp tinh anh đệ tử, mỗi người đều l&agrave; nổi tiếng, l&agrave; từ tọa hạ đệ tử tr&uacute;ng tuyển nh&ocirc;̉ đi l&ecirc;n đấy.<br />\r\n<br />\r\nM&agrave; đệ tử hạch t&acirc;m, th&igrave; l&agrave; Lăng Ti&ecirc;u C&aacute;c đời sau hi vọng, trong t&ocirc;ng thế nhưng m&agrave; đem những người n&agrave;y trở th&agrave;nh tương lai người nối nghiệp đến bồi dưỡng.<br />\r\n<br />\r\nL&agrave;nh lạnh đệ tử đẳng cấp chế độ, nh&igrave;n như bất cận nh&acirc;n t&igrave;nh, nhưng lại có th&ecirc;̉ tốt lắm k&iacute;ch ph&aacute;t người trẻ tuổi t&acirc;m huyết c&ugrave;ng cạnh tranh &yacute; thức, đ&acirc;y cũng l&agrave; Lăng Ti&ecirc;u C&aacute;c t&agrave;n khốc chế độ căn cơ.<br />\r\n<br />\r\nM&agrave; lại để cho Dương Khai bị v&ocirc; số người tranh đoạt cục diện nguy&ecirc;n nh&acirc;n căn bản, th&igrave; l&agrave; Lăng Ti&ecirc;u C&aacute;c một c&aacute;i kh&aacute;c quy củ, khi&ecirc;u chiến quy củ.</p>', '400', 1, '2022-06-01 08:03:45', '2022-06-01 08:03:45');
INSERT INTO `chapters` (`id`, `title`, `deleted_at`, `content`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(22, 'Chương 2: Đánh vỡ nam tường không quay đầu lại', NULL, '<p>Converter: traitim_phale<br />\r\n<br />\r\n<br />\r\nChương 02: Đ&aacute;nh vỡ nam tường kh&ocirc;ng quay đầu lại<br />\r\n<br />\r\nCập nhật l&uacute;c 2012-10-17 19:01:33 số lượng từ: 2268<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c t&ocirc;ng quy thứ nhất: Lăng Ti&ecirc;u C&aacute;c đệ tử, mỗi một ng&agrave;y c&oacute; được khi&ecirc;u chiến cơ hội một lần, mỗi năm ng&agrave;y c&oacute; được bị khi&ecirc;u chiến cơ hội một lần! Chiến đấu song phương thực lực kh&ocirc;ng được k&eacute;m ba cấp độ, kh&ocirc;ng được tr&aacute;nh chiến, kh&ocirc;ng được e sợ chiến, vi chi đuổi ra khỏi m&ocirc;n tường. B&ecirc;n thắng căn cứ đối thủ đệ tử đẳng cấp ban thưởng tương ứng số điểm cống hiến, b&ecirc;n bại căn cứ bản th&acirc;n đệ tử đẳng cấp khấu trừ tương ứng số điểm cống hiến.<br />\r\n<br />\r\nSố điểm cống hiến, cũng được xưng l&agrave; t&ocirc;ng m&ocirc;n điểm cống hiến!<br />\r\n<br />\r\nĐ&acirc;y l&agrave; Lăng Ti&ecirc;u C&aacute;c đặc sắc, đơn giản điểm tới n&oacute;i, số điểm cống hiến tại Lăng Ti&ecirc;u C&aacute;c tựu tương đương với tiền t&agrave;i, chỉ cần c&oacute; đầy đủ điểm cống hiến, c&aacute;i kia liền c&oacute; thể tại t&ocirc;ng m&ocirc;n hậu cần chỗ hối đo&aacute;i bất luận c&aacute;i g&igrave; ngươi muốn đồ vật, đan dược, b&iacute; tịch, binh kh&iacute;, bảo gi&aacute;p, ph&agrave;m l&agrave; c&ugrave;ng tu luyện c&oacute; quan hệ , tất cả đều c&oacute; thể hối đo&aacute;i, đương nhi&ecirc;n cũng c&oacute; thể hối đo&aacute;i Ho&agrave;ng Kim bạch ng&acirc;n chi vật, nhưng phổ biến m&agrave; n&oacute;i, t&ocirc;ng m&ocirc;n điểm cống hiến đến từ kh&ocirc;ng dễ, đệ tử l&agrave; kh&ocirc;ng nỡ đổi lấy v&agrave;ng bạc đấy.<br />\r\n<br />\r\nM&agrave; t&ocirc;ng m&ocirc;n điểm cống hiến thu hoạch c&aacute;ch cũng c&oacute; hứa nhiều c&aacute;ch, hướng t&ocirc;ng m&ocirc;n nộp l&ecirc;n tr&ecirc;n ch&iacute;nh m&igrave;nh tầm bảo đoạt được, hoặc l&agrave; ho&agrave;n th&agrave;nh t&ocirc;ng m&ocirc;n cho nhiệm vụ v&acirc;n v&acirc;n, cũng c&oacute; thể đạt được nhất định được điểm cống hiến.<br />\r\n<br />\r\nB&igrave;nh thường nhất đơn giản nhất thu hoạch điểm cống hiến phương thức một trong, l&agrave; khi&ecirc;u chiến! Khi&ecirc;u chiến c&ugrave;ng thực lực của ch&iacute;nh m&igrave;nh k&eacute;m kh&ocirc;ng đến ba tầng đồng m&ocirc;n đệ tử, thắng chi liền c&oacute; thể đạt được điểm cống hiến.<br />\r\n<br />\r\nCho n&ecirc;n c&aacute;i n&agrave;y s&aacute;ng sớm mới c&oacute; nhiều như vậy người đến v&acirc;y quanh Dương Khai, l&agrave; người cũng biết chằm chằm v&agrave;o quả hồng mềm niết ah.<br />\r\n<br />\r\nDương Khai danh tiếng, tại Lăng Ti&ecirc;u C&aacute;c nội coi như l&agrave; nổi tiếng xa gần, kh&ocirc;ng chỉ l&agrave; v&igrave; hắn g&aacute;nh v&aacute;c lấy rất thưa thớt Th&iacute; Luyện đệ tử th&acirc;n phận, cũng bởi v&igrave; l&agrave; hắn theo tiến Lăng Ti&ecirc;u C&aacute;c bắt đầu đến b&acirc;y giờ, cơ bản kh&oacute; một thắng! Mỗi lần bị người khi&ecirc;u chiến đều l&agrave; đ&aacute;nh thua kết quả.<br />\r\n<br />\r\nNgười c&oacute; &yacute; ch&iacute; tự nhi&ecirc;n nhớ r&otilde; Dương Khai trước đ&oacute; lần thứ nhất bị khi&ecirc;u chiến l&agrave; l&uacute;c n&agrave;o, h&ocirc;m nay khoảng c&aacute;ch trước đ&oacute; lần thứ nhất l&agrave; ng&agrave;y thứ năm, theo như t&ocirc;ng quy m&agrave; n&oacute;i lại c&oacute; thể lần nữa khi&ecirc;u chiến hắn, đối với c&aacute;i n&agrave;y tiện tay n&ecirc;n điểm cống hiến, ai thấy kh&ocirc;ng th&egrave;m, tuy nhi&ecirc;n đ&aacute;nh thắng Dương Khai cũng kh&ocirc;ng c&oacute; nhiều điểm cống hiến, có th&ecirc;̉ thịt muỗi cũng l&agrave; thịt ah. Huống chi, hội khi&ecirc;u chiến Dương Khai đệ tử, cũng kh&ocirc;ng phải c&aacute;i g&igrave; gi&agrave;u c&oacute; cao qu&yacute; thế hệ, c&aacute;i kia ch&iacute;nh l&agrave; một ch&uacute;t điểm cống hiến bọn hắn tự nhi&ecirc;n sẽ kh&ocirc;ng ngại &iacute;t.<br />\r\n<br />\r\nTrong tr&agrave;ng, Dương Khai c&ugrave;ng Chu Định Qu&acirc;n đ&atilde; k&eacute;o ra tư thế, c&ugrave;ng k&ecirc;u l&ecirc;n n&oacute;i: &quot;Xin chỉ gi&aacute;o!&quot;</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nTuy l&agrave; n&oacute;i như vậy, có th&ecirc;̉ mặc cho ai cũng biết, Dương Khai h&ocirc;m nay lại kh&ocirc;ng tr&aacute;nh khỏi cũng bị dừng lại:m&ocirc;̣t ch&acirc;̀u no bụng đ&aacute;nh!<br />\r\n<br />\r\nTiếng n&oacute;i rơi, Dương Khai liền vượt l&ecirc;n trước c&ocirc;ng tới, đơn bạc gầy yếu th&acirc;n h&igrave;nh bộc ph&aacute;t ra kinh người sức chiến đấu, vừa sải bước ra, nắm tay đảo hướng Chu Định Qu&acirc;n lồng ngực, c&ocirc;ng k&iacute;ch đơn giản trực tiếp, nắm đấm uy vũ sinh phong, phảng phất một th&acirc;n kh&iacute; lực đều bị r&oacute;t v&agrave;o trong đ&oacute;.<br />\r\n<br />\r\nMột quyền n&agrave;y đ&uacute;ng l&agrave; Lăng Ti&ecirc;u C&aacute;c tầng dưới ch&oacute;t đệ tử mỗi người đều tu luyện qua trường quyền, bộ quyền ph&aacute;p n&agrave;y cũng kh&ocirc;ng s&acirc;u &aacute;o, chỉ l&agrave; d&ugrave;ng để cho c&aacute;c đệ tử cường th&acirc;n kiện thể sở dụng, chi&ecirc;u thức tự nhi&ecirc;n đơn giản.<br />\r\n<br />\r\nChu Định Qu&acirc;n kh&ocirc;ng hoảng hốt, mặt h&agrave;m mỉm cười, thật sự l&agrave; bởi v&igrave; cảnh giới của hắn so Dương Khai cao hơn ra lưỡng cấp độ, trận chiến đấu n&agrave;y vốn l&agrave; kh&ocirc;ng c&oacute; g&igrave; huyền nghi. Đem l&agrave;m Dương Khai nắm đấm sắp đ&atilde; đến thời đi&ecirc;̉m, hắn mới giống như nh&agrave;n nh&atilde; dạo chơi địa uốn &eacute;o th&acirc;n, th&acirc;n thể kh&ocirc;i ng&ocirc; giờ ph&uacute;t n&agrave;y lại lộ ra c&oacute; ch&uacute;t Linh Động.<br />\r\n<br />\r\nNắm đấm lau quần &aacute;o đ&aacute;nh ra, kh&ocirc;ng thương Chu Định Qu&acirc;n mảy may. Kh&ocirc;ng đ&ecirc;̀u Dương Khai thu quyền, Chu Định Qu&acirc;n đ&atilde; một khuỷu tay c&uacute;i tại Dương Khai cẳng tay l&ecirc;n, đồng thời đầu gối c&oacute; ch&uacute;t hướng b&ecirc;n tr&ecirc;n vừa nhấc, ở giữa Dương Khai phần bụng.<br />\r\n<br />\r\nDương Khai k&ecirc;u r&ecirc;n, cố n&eacute;n to&agrave;n t&acirc;m đau đớn, bước ch&acirc;n x&ecirc; dịch, vội v&agrave;ng triệt tho&aacute;i ph&iacute;a sau, hiểm lại c&agrave;ng hiểm địa tr&aacute;nh được Chu Định Qu&acirc;n theo s&aacute;t m&agrave; đến đệ tam k&iacute;ch.<br />\r\n<br />\r\n&quot;&Acirc;n?&quot; Chu Định Qu&acirc;n kinh ngạc, hắn kh&ocirc;ng c&oacute; nghĩ đến c&aacute;i n&agrave;y chỉ c&oacute; T&ocirc;i Thể tầng ba sư huynh lại liệu địch ti&ecirc;n cơ, biết r&otilde; ch&iacute;nh m&igrave;nh kế tiếp hội như thế n&agrave;o đối ph&oacute; hắn, cũng l&agrave;m cho ch&iacute;nh m&igrave;nh một lần h&agrave;nh động đ&aacute;nh tan kế hoạch của hắn bị đ&aacute;nh loạn.<br />\r\n<br />\r\nNhưng c&aacute;i n&agrave;y nho nhỏ sai lầm cũng kh&ocirc;ng ảnh hưởng đại cục, Chu Định Qu&acirc;n &yacute; niệm trong đầu một chuyến, tựa như ảnh tương theo, muốn thừa dịp Dương Khai thở dốc chi tế triệt để chấm dứt trận chiến đấu n&agrave;y.<br />\r\n<br />\r\nN&agrave;o biết hắn ch&acirc;n trước vừa động, lui về ph&iacute;a sau Dương Khai rồi lại mạnh m&agrave; đ&aacute;nh tới, hai đạo nh&acirc;n ảnh nhanh ch&oacute;ng tiếp cận, Chu Định Qu&acirc;n thấy được Dương Khai trong mắt bất khuất c&ugrave;ng ngẩng cao chiến &yacute;, Dương Khai nắm đấm nắm chặt, lại l&agrave; một c&aacute;i trường quyền.<br />\r\n<br />\r\nNguy rồi! Chu Định Qu&acirc;n trong l&ograve;ng tim đập mạnh một c&uacute;, biết r&otilde; tr&uacute;ng quỷ kế của đối phương, thực lực của m&igrave;nh tuy nhi&ecirc;n so c&aacute;i n&agrave;y sư huynh cao hơn hai tầng, có th&ecirc;̉ luận kinh nghiệm chiến đấu lại c&oacute; vẻ kh&ocirc;ng bằng.<br />\r\n<br />\r\nNhưng, mặc d&ugrave; tr&uacute;ng kế th&igrave; như thế n&agrave;o? Chu Định Qu&acirc;n dồn kh&iacute; Nhược Uy&ecirc;n, kh&ocirc;ng hề trốn tr&aacute;nh, đồng dạng d&ugrave;ng trường quyền ho&agrave;n lại nhan sắc.</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nĐụng đụng hai tiếng nhẹ vang l&ecirc;n, Dương Khai bay ra, Chu Định Qu&acirc;n th&acirc;n h&igrave;nh nho&aacute;ng một c&aacute;i, y nguy&ecirc;n đứng lại, sắc mặt c&oacute; ch&uacute;t ngưng trọng. Vừa rồi lần n&agrave;y nếu như l&agrave; ngang cấp đối thủ thi triển đi ra , c&aacute;i kia bay ra ngo&agrave;i tuyệt đối l&agrave; ch&iacute;nh m&igrave;nh.<br />\r\n<br />\r\nNgười kh&aacute;c c&oacute; lẽ kh&ocirc;ng biết c&aacute;i n&agrave;y hai quyền huyền b&iacute;, nhưng m&igrave;nh nhưng lại cảm thụ thanh thanh sở sở. C&aacute;i n&agrave;y sư huynh nắm đấm v&acirc;̣y mà so với ch&iacute;nh m&igrave;nh nhanh hơn hơn mấy hứa, n&oacute;i c&aacute;ch kh&aacute;c, l&agrave; hắn đ&aacute;nh trước tr&uacute;ng ch&iacute;nh m&igrave;nh, m&igrave;nh mới đ&aacute;nh tr&uacute;ng hắn đấy.<br />\r\n<br />\r\nChỉ bất qu&aacute; hắn nắm đấm xa kh&ocirc;ng bằng ch&iacute;nh m&igrave;nh hữu lực kh&iacute;, hơn nữa ch&iacute;nh m&igrave;nh lại th&acirc;n cường thể cường tráng , tr&aacute;i lại đối phương gầy c&ograve;m như củi, th&acirc;n h&igrave;nh mỏng, sắc mặt như xanh xao, r&otilde; r&agrave;ng dinh dưỡng kh&ocirc;ng đầy đủ, kh&aacute;ng đ&ograve;n năng lực vốn l&agrave; kh&ocirc;ng tại một c&aacute;i trục ho&agrave;nh l&ecirc;n, cho n&ecirc;n mới phải xuất hiện trước mắt loại kết quả n&agrave;y.<br />\r\n<br />\r\n&quot;Diệp sư huynh, đa tạ rồi!&quot; Chu Định Qu&acirc;n trong nội t&acirc;m rất kh&ocirc;ng phải tư vị, so rớt lại ph&iacute;a sau ch&iacute;nh m&igrave;nh hai tầng đối thủ trước đ&aacute;nh tr&uacute;ng, thật sự kh&ocirc;ng phải c&aacute;i g&igrave; tốt ki&ecirc;u ngạo sự t&igrave;nh, tuy nhi&ecirc;n trận chiến đấu n&agrave;y ch&iacute;nh m&igrave;nh thắng, có th&ecirc;̉ cảm gi&aacute;c, cảm thấy c&oacute; ch&uacute;t thắng được kh&ocirc;ng phải hương vị.<br />\r\n<br />\r\nB&ecirc;n cạnh c&oacute; x&igrave; x&agrave;o b&agrave;n t&aacute;n thanh &acirc;m truyền đến: &quot;Người n&agrave;y cho l&agrave; m&igrave;nh thắng?&quot;<br />\r\n<br />\r\n&quot;Ha ha, chẳng lẽ lại hắn chưa nghe n&oacute;i qua Dương Khai đại danh bỏ chạy tới khi&ecirc;u chiến?&quot;<br />\r\n<br />\r\n&quot;C&aacute;i n&agrave;y thật đ&uacute;ng l&agrave; c&oacute; &yacute; tứ.&quot;<br />\r\n<br />\r\nChu Định Qu&acirc;n l&ocirc;ng m&agrave;y nh&iacute;u lại, hắn x&aacute;c thực kh&ocirc;ng phải rất hi&ecirc;̉u rõ Dương Khai, chỉ l&agrave; thường thường nghe người ta nhắc tới c&aacute;i n&agrave;y sư huynh, h&ocirc;m nay đi ngang qua gặp rất nhiều người v&acirc;y quanh, liền tham dự tiến đến, lại kh&ocirc;ng nghĩ rằng vận kh&iacute; si&ecirc;u tốt, trực tiếp bị Dương Khai tuyển l&agrave;m đối thủ.<br />\r\n<br />\r\nCó th&ecirc;̉ c&aacute;i n&agrave;y chẳng lẽ kh&ocirc;ng phải thắng sao? Một quyền của m&igrave;nh đem c&aacute;i n&agrave;y sư huynh đ&aacute;nh bay, đ&atilde; c&oacute; ưu thế &aacute;p đảo r&ocirc;̀i, theo như t&ocirc;ng m&ocirc;n quy củ đến xử l&yacute;, đối phương cũng n&ecirc;n nhận thua mới được l&agrave;, bởi v&igrave; đ&atilde; kh&ocirc;ng c&oacute; tiếp tục đ&aacute;nh xuống tất yếu r&ocirc;̀i.<br />\r\n<br />\r\n&quot;Lại đến!&quot; Đang nghĩ ngợi thời điểm, bay ra ngo&agrave;i ng&atilde; nh&agrave;o tr&ecirc;n đất Dương Khai v&acirc;̣y mà đ&atilde; đứng , trong mắt chẳng những kh&ocirc;ng c&oacute; ch&uacute;t n&agrave;o nhụt ch&iacute;, chiến &yacute; ngược lại c&agrave;ng đậm &uacute;c đi một t&iacute;, chỉ l&agrave; bị đ&aacute;nh một quyền về sau, c&aacute;i kia tr&agrave;n đầy xanh xao mặt đ&atilde; c&oacute; một ch&uacute;t t&aacute;i nhợt.<br />\r\n<br />\r\nKh&ocirc;ng đ&ecirc;̀u Chu Định Qu&acirc;n trả lời, Dương Khai kh&ocirc;ng ngờ lao đến, tại khoảng c&aacute;ch Chu Định Qu&acirc;n chưa đủ ba thước địa phương th&acirc;n thể đột nhi&ecirc;n c&oacute; ch&uacute;t bắn ra, hai ch&acirc;n như Trường Ti&ecirc;n đồng dạng qu&eacute;t đi qua, đ&aacute;nh &uacute;p về ph&iacute;a Chu Định Qu&acirc;n hạ b&agrave;n.<br />\r\n<br />\r\nĐ&aacute; ngang! Đồng dạng l&agrave; Lăng Ti&ecirc;u C&aacute;c tầng dưới ch&oacute;t đệ tử mỗi người đều tu luyện qua trụ cột c&ocirc;ng phu, chỉ l&agrave; giờ ph&uacute;t n&agrave;y đi qua Dương Khai thi triển đi ra, lại lại để cho rất nhiều cấp độ xa cao hơn đồng m&ocirc;n của hắn đều nếu c&oacute; điều được.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nNguy&ecirc;n lai c&aacute;i n&agrave;y đ&aacute; ngang c&ograve;n c&oacute; thể như vậy đ&aacute; đấy.<br />\r\n<br />\r\nKh&ocirc;ng đợi mọi người cảm kh&aacute;i, một tiếng đụng địa nhẹ vang l&ecirc;n truyền ra, Dương Khai lần nữa bay l&ecirc;n.<br />\r\n<br />\r\nLưỡng cấp độ cảnh giới ch&ecirc;nh lệch, th&acirc;n thể tố chất ch&ecirc;nh lệch, lại để cho Dương Khai căn bản kh&ocirc;ng c&aacute;ch n&agrave;o c&ugrave;ng Chu Định Qu&acirc;n muốn kh&aacute;ng. Chu Định Qu&acirc;n một quyền n&agrave;y l&agrave; đ&aacute;nh v&agrave;o Dương Khai xương bắp ch&acirc;n l&ecirc;n, chờ Dương Khai lại đứng l&ecirc;n thời điểm, b&ocirc;̣ pháp lại hơi c&oacute; ch&uacute;t tập tễnh, hiển nhi&ecirc;n l&agrave; xương cốt bị đả thương.<br />\r\n<br />\r\n&quot;Lại đến!&quot; Dương Khai cắn răng, trong mắt h&igrave;nh như c&oacute; hừng hực Liệt Diễm thi&ecirc;u đốt.<br />\r\n<br />\r\n&quot;Đụng...&quot; Dương Khai bay ra.<br />\r\n&quot;Lại đến!&quot;<br />\r\n&quot;Đụng...&quot; Dương Khai lại bay ra.<br />\r\n<br />\r\n<br />\r\nĐ&atilde; kh&ocirc;ng hề nhẫn người quan kh&aacute;n sớm rời đi, c&agrave;ng c&oacute; người thổn thức kh&ocirc;ng th&ocirc;i: &quot;C&aacute;i n&agrave;y Dương Khai c&aacute;i n&agrave;y cổ t&iacute;nh bền dẻo thật sự l&agrave; kh&ocirc;ng thể ch&ecirc;, c&aacute;i đ&oacute; một lần khi&ecirc;u chiến kh&ocirc;ng đem hắn đ&aacute;nh ngất xỉu, hắn tuyệt đối sẽ kh&ocirc;ng từ bỏ &yacute; đồ!&quot;<br />\r\n<br />\r\nLời n&agrave;y truyền v&agrave;o Chu Định Qu&acirc;n trong tai, hắn kh&ocirc;ng khỏi trong l&ograve;ng đắng chát kh&ocirc;ng th&ocirc;i, kh&ocirc;ng nghĩ tới ch&iacute;nh m&igrave;nh lần khi&ecirc;u chiến l&agrave; như thế n&agrave;y một c&aacute;i đi&ecirc;n cuồng đối thủ.<br />\r\n<br />\r\nDương Khai trọn vẹn bị đ&aacute;nh bay ra ngo&agrave;i bảy t&aacute;m lần, đ&ocirc;i má cao sưng, m&agrave; ngay cả hốc mắt đều bị đ&aacute;nh đen một v&ograve;ng, b&ocirc;̣ pháp lảo đảo, nh&igrave;n như gi&oacute; thổi tức ngược lại, tuy nhi&ecirc;n ngoan cố như b&agrave;n thạch, từ nơi n&agrave;y t&eacute; ng&atilde;, liền từ nơi n&agrave;y b&ograve; l&ecirc;n, h&ocirc; một tiếng tiếp tục x&ocirc;ng về ph&iacute;a trước.<br />\r\n<br />\r\nNhư thế nhiều lần, Chu Định Qu&acirc;n rốt cục biến sắc: &quot;Ngươi đi&ecirc;n rồi? Lại kh&ocirc;ng nhận thua gặp người chết đấy!&quot;</p>', NULL, 1, '2022-06-01 08:15:39', '2022-06-01 08:15:39'),
(23, 'Chương 3: Liên tiếp bị đánh bại 147 tràng nam nhân', NULL, '<p>Converter: traitim_phale<br />\r\n<br />\r\n<br />\r\nChương 03: Li&ecirc;n tiếp bị đ&aacute;nh bại 147 tr&agrave;ng nam nh&acirc;n<br />\r\n<br />\r\nCập nhật l&uacute;c 2012-10-18 9<br />\r\n56 số lượng từ: 2365<br />\r\n<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c trong h&agrave;ng đệ tử đấu, h&agrave;ng năm chết mất người cũng c&oacute; kh&ocirc;ng &iacute;t, nhưng l&agrave; Chu Định Qu&acirc;n nh&igrave;n qua l&ecirc;n trước mắt c&aacute;i n&agrave;y dũng cảm tiến tới h&agrave;o kh&ocirc;ng l&ugrave;i bước sư huynh, trong nội t&acirc;m cũng kh&ocirc;ng khỏi hơi c&oacute; ch&uacute;t kinh động.<br />\r\n<br />\r\nDễ d&agrave;ng th&acirc;n ở chi, Chu Định Qu&acirc;n tự giao l&agrave;m kh&ocirc;ng được loại tr&igrave;nh độ n&agrave;y, chỉ sợ ph&aacute;t gi&aacute;c kh&ocirc;ng địch lại sẽ gặp nhận thua.<br />\r\n<br />\r\nLưu được Thanh Sơn tại kh&ocirc;ng sợ kh&ocirc;ng c&oacute; củi đốt, đ&acirc;y l&agrave; xử thế chi đạo. Kh&ocirc;ng đụng nam tường kh&ocirc;ng quay đầu lại, đ&acirc;y l&agrave; một loại ki&ecirc;n tr&igrave;!<br />\r\n<br />\r\nMắt thấy Dương Khai th&acirc;n h&igrave;nh chật vật, có th&ecirc;̉ trong mắt chiến &yacute; c&agrave;ng ng&agrave;y c&agrave;ng mạnh, Chu Định Qu&acirc;n biết r&otilde; kh&ocirc;ng đem hắn đ&aacute;nh ngất đi, h&ocirc;m nay việc n&agrave;y xem như kh&ocirc;ng để y&ecirc;n r&ocirc;̀i.<br />\r\n<br />\r\nNhất niệm đến tận đ&acirc;y, Chu Định Qu&acirc;n phất tay một chưởng đao ch&eacute;m v&agrave;o x&ocirc;ng lại Dương Khai cổ tr&ecirc;n, Dương Khai hung m&atilde;nh kh&iacute; thế lập tức dật t&aacute;n, hai mắt thất thần, to&agrave;n th&acirc;n mềm nhũn địa t&eacute; xuống.<br />\r\n<br />\r\nNh&igrave;n thấy cảnh nầy, hơn mười trượng b&ecirc;n ngo&agrave;i một c&acirc;y đại thụ t&aacute;n c&acirc;y b&ecirc;n tr&ecirc;n đứng đấy người m&oacute;c ra một quyển s&aacute;ch nhỏ, tiện tay mở ra một tờ, l&ecirc;n lớp giảng b&agrave;i: Th&iacute; Luyện đệ tử Dương Khai đối chiến b&igrave;nh thường đệ tử Chu Định Qu&acirc;n, Chu Định Qu&acirc;n thắng.<br />\r\n<br />\r\nC&aacute;i n&agrave;y đứng tại t&aacute;n c&acirc;y b&ecirc;n tr&ecirc;n th&acirc;n người đoạn thướt tha, hiển nhi&ecirc;n l&agrave; nữ tử, chỉ c&oacute; điều lụa đen che mặt gọi người thấy kh&ocirc;ng r&otilde; ch&acirc;n dung, nhưng n&agrave;y thanh t&uacute; ch&acirc;n m&agrave;y lại cho thấy người n&agrave;y tuổi kh&ocirc;ng lớn lắm, m&agrave; người n&agrave;y c&aacute;nh tay b&ecirc;n tr&ecirc;n đeo một mảnh l&aacute; rụng ph&ugrave; hiệu đeo tay băng tay lại biểu lộ n&agrave;ng n&agrave;y th&acirc;n phận: Lăng Ti&ecirc;u C&aacute;c &Aacute;m Đường đệ tử!<br />\r\n<br />\r\nLăng Ti&ecirc;u C&aacute;c &Aacute;m Đường l&agrave; c&aacute;i đặc th&ugrave; cơ cấu, thuộc sở hữu trong t&ocirc;ng Tam trưởng l&atilde;o phụ tr&aacute;ch quản hạt, trong nội đường đệ tử phụ tr&aacute;ch ghi ch&eacute;p trong t&ocirc;ng lớn nhỏ c&ocirc;ng việc, kể cả đệ tử ở giữa quyết đấu thắng bại.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nCho n&ecirc;n tại Lăng Ti&ecirc;u C&aacute;c nội khi&ecirc;u chiến, kh&ocirc;ng cần lo lắng ch&iacute;nh m&igrave;nh thắng c&ograve;n kh&ocirc;ng chiếm được điểm cống hiến, ẩn n&uacute;p trong b&oacute;ng tối &Aacute;m Đường đệ tử chắc chắn đem chiến t&iacute;ch ghi ch&eacute;p lại, mỗi th&aacute;ng tập hợp tr&ugrave; t&iacute;nh chung.<br />\r\n<br />\r\nC&aacute;i n&agrave;y &Aacute;m Đường nữ tử ghi ch&eacute;p hết một trận chiến n&agrave;y thắng bại về sau, lại từ b&ecirc;n h&ocirc;ng lấy ra mặt kh&aacute;c một bản nhỏ hơn tập đến, mở ra xem liếc, l&ecirc;n lớp giảng b&agrave;i: Kỷ H&ograve;a 14 năm ng&agrave;y 7 th&aacute;ng 5, Dương Khai đệ 147 chiến, bại!<br />\r\n<br />\r\nBỏ một chuyến n&agrave;y mới th&ecirc;m chữ viết, thượng diện rậm rạp chằng chịt ghi ch&eacute;p sở hữu t&acirc;́t cả Dương Khai đối chiến kết quả, hết thảy đều l&agrave; từ l&uacute;c n&agrave;o đệ nhiều &iacute;t hơn nhiều chiến, kết quả đơn giản một chữ: bại!<br />\r\n<br />\r\nLi&ecirc;n tiếp đ&aacute;nh 147 tr&agrave;ng kh&ocirc;ng một thắng t&iacute;ch, đ&acirc;y quả thực c&oacute; thể n&oacute;i l&agrave; tự Lăng Ti&ecirc;u C&aacute;c khai t&ocirc;ng lập ph&aacute;i đến nay đi&ecirc;n cuồng một phần chiến t&iacute;ch r&ocirc;̀i, phần n&agrave;y chiến t&iacute;ch đủ để kinh Thi&ecirc;n Địa quỷ thần khiếp, chưa từng c&oacute; ai hậu v&ocirc; lai giả, m&agrave; c&aacute;i n&agrave;y chiến t&iacute;ch người s&aacute;ng lập giờ ph&uacute;t n&agrave;y đang lẳng lặng địa nằm tr&ecirc;n mặt đất kh&ocirc;ng biết sinh tử.<br />\r\n<br />\r\nDương Khai chưa bao giờ đi khi&ecirc;u chiến qua người kh&aacute;c, c&aacute;i n&agrave;y 147 tr&agrave;ng tất cả đều l&agrave; người kh&aacute;c tới khi&ecirc;u chiến hắn , n&oacute;i c&aacute;ch kh&aacute;c, mỗi năm ng&agrave;y bị khi&ecirc;u chiến một lần, loại ng&agrave;y n&agrave;y đ&atilde; giằng co hơn hai năm r&ocirc;̀i.<br />\r\n<br />\r\nNh&igrave;n qua dưới đ&aacute;y Dương Khai, Hạ Ngưng Thường đ&ocirc;i mi thanh t&uacute; hơi nh&iacute;u, n&agrave;ng c&oacute; ch&uacute;t kh&ocirc;ng r&otilde; Dương Khai tại sao lại ki&ecirc;n tr&igrave; đến loại tr&igrave;nh độ n&agrave;y, đ&atilde; bị c&aacute;ch chức l&agrave;m Lăng Ti&ecirc;u C&aacute;c Th&iacute; Luyện đệ tử, ngay cả m&igrave;nh sinh tồn ấm no đều th&agrave;nh vấn đề, hắn v&igrave; sao c&ograve;n ở lại Lăng Ti&ecirc;u C&aacute;c? Nếu như ly khai tại đ&acirc;y cuộc sống của hắn nhất định sẽ tốt hơn rất nhiều, c&aacute;i n&agrave;y th&acirc;n h&igrave;nh đơn bạc thiếu ni&ecirc;n trong nội t&acirc;m đến c&ugrave;ng c&oacute; như thế n&agrave;o một phần chấp nhất? Lại để cho hắn có th&ecirc;̉ li&ecirc;n tiếp đ&aacute;nh bại 147 tr&agrave;ng cũng y nguy&ecirc;n kh&ocirc;ng tức giận ch&uacute;t n&agrave;o.<br />\r\n<br />\r\nC&oacute; lẽ, c&aacute;i n&agrave;y l&agrave; nam nh&acirc;n ngu xuẩn? Ch&uacute; &yacute; tới Dương Khai cũng l&agrave; ngẫu nhi&ecirc;n tr&ugrave;ng hợp, Hạ Ngưng Thường th&acirc;n l&agrave; &Aacute;m Đường đệ tử, được an b&agrave;i phụ tr&aacute;ch gi&aacute;m s&aacute;t c&aacute;i n&agrave;y một khu vực, Dương Khai mỗi một lần bị khi&ecirc;u chiến, mỗi một lần bị đ&aacute;nh ngất xỉu n&agrave;ng đều thấy r&otilde;, lần một lần hai c&ograve;n kh&ocirc;ng c&oacute; g&igrave;, lần số nhiều, Hạ Ngưng Thường liền bắt đầu ch&uacute; &yacute; khởi c&aacute;i n&agrave;y chỉ c&oacute; T&ocirc;i Thể tầng ba thiếu ni&ecirc;n r&ocirc;̀i.<br />\r\n<br />\r\nN&agrave;ng rất muốn biết, d&ugrave;ng hắn nghị lực, đến c&ugrave;ng hội ki&ecirc;n tr&igrave; tới khi n&agrave;o mới ly khai Lăng Ti&ecirc;u C&aacute;c. Như vậy tư chất, như vậy tốc độ tu luyện, căn bản kh&ocirc;ng th&iacute;ch hợp ở lại đ&acirc;y c&aacute;i giang hồ, người b&igrave;nh thường thế giới mới được l&agrave; hắn quy t&uacute;c.<br />\r\n<br />\r\nDưới đ&aacute;y đ&atilde; kh&uacute;c t&aacute;n nh&acirc;n tận, chỉ c&ograve;n lại c&oacute; Dương Khai một người t&eacute; xỉu tr&ecirc;n đất, người đến người đi, thời gian tr&ocirc;i qua.<br />\r\n<br />\r\nHạ Ngưng Thường th&acirc;n h&igrave;nh nho&aacute;ng một c&aacute;i, đ&atilde; biến mất tại t&aacute;n c&acirc;y ph&iacute;a tr&ecirc;n.<br />\r\n<br />\r\nĐem l&agrave;m Dương Khai lần nữa tỉnh lại, đ&atilde; mặt trời l&ecirc;n cao. To&agrave;n th&acirc;n kh&ocirc;ng c&oacute; một chỗ kh&ocirc;ng đau đau nhức, b&ocirc;̣ pháp tập tễnh đứng dậy, Dương Khai nh&igrave;n chung quanh liếc, ph&aacute;t hiện m&igrave;nh vị tr&iacute; địa phương kh&ocirc;ng ngờ kh&ocirc;ng phải t&eacute; xỉu vị tr&iacute;, m&agrave; l&agrave; đang phụ cận một c&acirc;y đại thụ m&aacute;t mẻ dưới đ&aacute;y.<br />\r\n<br />\r\nC&aacute;i n&agrave;y thật đ&uacute;ng l&agrave; kỳ r&ocirc;̀i, chẳng lẽ h&ocirc;m nay c&oacute; vị nào sư huynh đệ thiện t&acirc;m đại ph&aacute;t, đem m&igrave;nh c&otilde;ng đ&atilde; tới? C&aacute;i n&agrave;y tại trước kia thế nhưng m&agrave; chưa bao giờ c&oacute; sự t&igrave;nh, Dương Khai nh&iacute;u m&agrave;y v&ograve; đầu, mơ hồ nhớ r&otilde; để &yacute; thức mơ hồ ở giữa, c&oacute; một m&ocirc;ng lung th&acirc;n ảnh tại trước mắt l&uacute;c ẩn l&uacute;c hiện đấy. Nhưng c&aacute;i n&agrave;y tr&iacute; nhớ thật sự qu&aacute; mơ hồ, nghĩ như thế n&agrave;o cũng muốn kh&ocirc;ng r&otilde; r&agrave;ng lắm.</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nNhưng l&agrave; tại m&igrave;nh b&acirc;y giờ dừng ch&acirc;n chỗ c&ugrave;ng h&ocirc;n m&ecirc; vị tr&iacute; tầm đ&oacute;, c&oacute; một đạo rất r&otilde; r&agrave;ng k&eacute;o động dấu vết, m&agrave; c&aacute;i n&agrave;y dấu vết r&otilde; r&agrave;ng tựu l&agrave; k&eacute;o động một người tr&ecirc;n mặt đất ma s&aacute;t đi ra đấy.<br />\r\n<br />\r\nLại vừa cảm thụ hạ ph&iacute;a sau lưng của m&igrave;nh, lập tức một mảnh lửa cháy liệu đau đớn truyền đến.<br />\r\n<br />\r\nDương Khai sửng sốt một ch&uacute;t, chợt giận dữ! Đối với c&aacute;i n&agrave;y l&agrave;m chuyện tốt kh&ocirc;ng lưu danh &acirc;n nh&acirc;n trong l&ograve;ng c&ograve;n c&oacute; một tia hảo cảm lập tức biến mất. Người n&agrave;y đ&iacute;ch thị l&agrave; trực tiếp đem m&igrave;nh từ nơi &acirc;́y k&eacute;o tới , nếu kh&ocirc;ng ph&iacute;a sau lưng của m&igrave;nh như thế n&agrave;o bị m&agrave;i ph&aacute; t&iacute; m&aacute;u.<br />\r\n<br />\r\nC&ograve;n kh&ocirc;ng bằng đem m&igrave;nh n&eacute;m tại đ&acirc;u đ&oacute; mặc kệ kh&ocirc;ng hỏi! Dương Khai nghĩ thầm.<br />\r\n<br />\r\nĐang l&uacute;c buồn bực, Dương Khai đột nhi&ecirc;n ph&aacute;t hiện tay phải của m&igrave;nh c&ograve;n giống như nắm chặt c&aacute;i g&igrave; đ&oacute;, sau khi nghi hoặc c&uacute;i đầu nh&igrave;n lại, đ&atilde; thấy một c&aacute;i ch&ecirc;́ tác tinh tế b&igrave;nh sứ nhỏ ch&iacute;nh nắm tại tr&ecirc;n tay m&igrave;nh.<br />\r\n<br />\r\nĐ&acirc;y l&agrave; c&aacute;i g&igrave;? C&aacute;i n&agrave;y b&igrave;nh sứ tuyệt đối kh&ocirc;ng phải m&igrave;nh , Dương Khai th&acirc;n kh&ocirc;ng của nả n&ecirc;n hồn, ngoại trừ một th&acirc;n quần &aacute;o tựu l&agrave; qu&eacute;t r&aacute;c c&aacute;i chổi r&ocirc;̀i, nơi n&agrave;o sẽ c&oacute; c&aacute;i n&agrave;y?<br />\r\n<br />\r\nB&igrave;nh sứ nhỏ b&ecirc;n tr&ecirc;n d&aacute;n c&aacute;i nh&atilde;n hi&ecirc;̣u, nh&atilde;n hi&ecirc;̣u b&ecirc;n tr&ecirc;n c&oacute; chữ viết, Dương Khai định mắt nh&igrave;n đi, ngo&agrave;i miệng th&igrave; th&agrave;o l&ecirc;n tiếng: &quot;Ngưng Huyết Khư Ứ Cao!&quot;<br />\r\n<br />\r\nNgưng Huyết Khư Ứ Cao, Dương Khai n&ecirc;n cũng biết.<br />\r\n<br />\r\nĐ&acirc;y l&agrave; Lăng Ti&ecirc;u C&aacute;c trị liệu ngoại thương thuốc d&aacute;n, mặc d&ugrave; kh&ocirc;ng coi l&agrave; c&aacute;i g&igrave; tuyệt thế thuốc hay, nhưng đối với ngoại thương đ&atilde; c&oacute; r&otilde; rệt hiệu quả trị liệu, đệ tử mỗi người đều t&ugrave;y th&acirc;n mang theo một lọ để ph&ograve;ng bất trắc. M&agrave; như vậy dạng một lọ thuốc d&aacute;n, tại Lăng Ti&ecirc;u C&aacute;c hậu cần chỗ gi&aacute; b&aacute;n cũng xa xỉ.<br />\r\n<br />\r\nMười điểm t&ocirc;ng m&ocirc;n điểm cống hiến một lọ!<br />\r\n<br />\r\nDương Khai qu&eacute;t r&aacute;c một th&aacute;ng c&oacute; thể được đến bao nhi&ecirc;u cống hiến? Đ&uacute;ng l&agrave; ch&iacute;nh l&agrave; mười điểm, n&oacute;i c&aacute;ch kh&aacute;c, tr&ecirc;n tay c&aacute;i n&agrave;y một lọ thuốc d&aacute;n gi&aacute; trị, đồng đẳng với Dương Khai qu&eacute;t một th&aacute;ng địa!<br />\r\n<br />\r\nL&agrave; ai? Giờ n&agrave;y khắc n&agrave;y, Dương Khai trong l&ograve;ng kh&ocirc;ng khỏi một hồi hung m&atilde;nh cảm động tu&ocirc;n ra qua, sau lưng đau đớn cũng bỗng nhi&ecirc;n giảm bớt rất nhiều. Đi v&agrave;o Lăng Ti&ecirc;u C&aacute;c đ&atilde; ba năm r&ocirc;̀i, ba năm thời gian, Dương Khai nh&igrave;n quen c&aacute;i n&agrave;y t&ocirc;ng m&ocirc;n đệ tử ở giữa bạc t&igrave;nh bạc nghĩa phụ nghĩa, nh&igrave;n quen l&ograve;ng người dễ thay đổi, nhưng l&agrave; tại giờ n&agrave;y ng&agrave;y n&agrave;y, lại c&oacute; người hội tại ch&iacute;nh m&igrave;nh sau khi bị thương lưu lại một b&igrave;nh Ngưng Huyết Khư Ứ Cao, loại l&agrave;m n&agrave;y thật s&acirc;u x&uacute;c động Dương Khai.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nNguy&ecirc;n lai, c&aacute;i n&agrave;y t&ocirc;ng m&ocirc;n đệ tử cũng kh&ocirc;ng ho&agrave;n to&agrave;n l&agrave; lương bạc chi nh&acirc;n.<br />\r\n<br />\r\nC&oacute; lẽ, như vậy một lọ ngoại thương thuốc d&aacute;n đối với người nọ m&agrave; n&oacute;i cũng kh&ocirc;ng coi v&agrave;o đ&acirc;u, nhưng l&agrave; đối với Dương Khai m&agrave; n&oacute;i, nhưng lại dưới mắt cần c&oacute; nhất đồ vật.<br />\r\n<br />\r\nC&oacute; một c&acirc;u gọi t&iacute;ch thủy chi &acirc;n, suốt đời kh&oacute; qu&ecirc;n, ng&agrave;y kh&aacute;c l&ecirc;n cao, suối tu&ocirc;n b&aacute;o chi!<br />\r\n<br />\r\nDương Khai một b&ecirc;n cảm động một b&ecirc;n d&ugrave;ng sức hồi tưởng đến th&acirc;n ảnh kia, nhưng lại c&agrave;ng ng&agrave;y c&agrave;ng mơ hồ. Ngược lại l&agrave; từng sợi nh&agrave;n nhạt m&ugrave;i thơm ng&aacute;t quanh quẩn tại ch&oacute;p mũi, thật l&acirc;u kh&ocirc;ng ti&ecirc;u tan.<br />\r\n<br />\r\n&quot;C&aacute;i n&agrave;y dược nguy&ecirc;n lai l&agrave; hương hay sao?&quot; Dương Khai lập tức trường kiến thức.<br />\r\n<br />\r\nB&igrave;nh phục quyết t&acirc;m t&igrave;nh, sửa sang lại quần &aacute;o, tr&acirc;n trọng địa đem c&aacute;i n&agrave;y một lọ Ngưng Huyết Khư Ứ Cao nh&eacute;t v&agrave;o trong ngực, Dương Khai dẫn theo tr&ecirc;n tay c&acirc;y chổi, tiếp tục ch&iacute;nh m&igrave;nh qu&eacute;t r&aacute;c c&ocirc;ng t&aacute;c đi.<br />\r\n<br />\r\nTrong trong ngo&agrave;i ngo&agrave;i đều đảo qua, một mực bận việc đ&atilde; đến thưởng giữa trưa, h&ocirc;m nay c&ocirc;ng t&aacute;c mới t&iacute;nh to&aacute;n ho&agrave;n tất. K&eacute;o lấy mệt mỏi đ&oacute;i kh&aacute;t th&acirc;n h&igrave;nh, Dương Khai về tới ch&iacute;nh m&igrave;nh ph&ograve;ng nhỏ.<br />\r\n<br />\r\nBuổi s&aacute;ng đ&aacute;nh một trận thương thế c&ograve;n kh&ocirc;ng c&oacute; xử l&yacute;, Dương Khai tuy nhi&ecirc;n đ&oacute;i kh&aacute;t lại cũng chỉ c&oacute; thể chịu lấy, trước xử l&yacute; thương thế n&oacute;i sau.<br />\r\n<br />\r\nBỏ đi tr&ecirc;n người Thanh y, Dương Khai bưng tới một chậu nước trong giặt rửa lấy th&acirc;n thể. Nếu l&agrave; c&oacute; người ở một b&ecirc;n chứng kiến Dương Khai th&acirc;n thể t&igrave;nh huống, chắc chắn chấn động.<br />\r\n<br />\r\nDương Khai thể cốt rất yếu, gầy trơ xương linh đinh, bụng ở giữa xương sườn đều r&otilde; r&agrave;ng c&oacute; thể thấy được, to&agrave;n th&acirc;n phảng phất đều kh&ocirc;ng c&oacute; nhiều thịt, nhưng ch&iacute;nh l&agrave; c&aacute;i n&agrave;y dinh dưỡng kh&ocirc;ng đầy đủ tr&ecirc;n th&acirc;n thể, nhưng lại khắp nơi m&aacute;u ứ đọng, khắp nơi vết thương, cơ hồ kh&ocirc;ng c&oacute; c&aacute;i đ&oacute; một khối địa phương l&agrave; ho&agrave;n hảo đấy.<br />\r\n<br />\r\nMỗi năm ng&agrave;y bị người khi&ecirc;u chiến một lần, mỗi lần đều l&agrave; chiến bại, mỗi lần đều l&agrave; bị đ&aacute;nh ngất xỉu, vết thương cũ chưa khỏi, đ&atilde; th&ecirc;m mới thương. Đổi lại bất cứ người n&agrave;o, chỉ sợ đều kh&ocirc;ng thể chịu đựng được như vậy đau đớn, nhưng l&agrave; Dương Khai nhịn được, chẳng những nhịn được, c&ograve;n mỗi ng&agrave;y tu luyện qu&eacute;t r&aacute;c, căn bản kh&ocirc;ng bị những thương thế n&agrave;y ảnh hưởng.</p>', NULL, 32, '2022-06-01 08:23:57', '2022-06-01 08:23:57'),
(31, 'Chương 3: Luyện Khí cảnh tầng bảy, đáng chết mị lực', NULL, '<p>Tu h&agrave;nh phương hướng?<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng c&oacute; qu&aacute; do dự.<br />\r\n<br />\r\nHắn ch&uacute; &yacute; tới m&igrave;nh thu được Lục Đạo Lu&acirc;n Hồi C&ocirc;ng, chắc hẳn c&ugrave;ng Lục Đạo Linh Thể tương quan, s&aacute;u loại tuyệt đỉnh linh căn tư chất, tất nhi&ecirc;n muốn c&ugrave;ng một chỗ ph&aacute;t triển, kh&ocirc;ng c&oacute; khả năng lệch khoa.<br />\r\n<br />\r\nĐồng thời, hắn c&oacute; được tuyệt đỉnh Kiếm Đạo tư chất, tự nhi&ecirc;n đ&ecirc;́n lựa chọn kiếm tu!<br />\r\n<br />\r\nH&agrave;n Tuyệt sau khi suy nghĩ cẩn thận, lập tức click kiếm tu.<br />\r\n<br />\r\nTrong chốc l&aacute;t, một cỗ kỳ dị nguồn nhiệt ở trong cơ thể hắn phun tr&agrave;o.<br />\r\n<br />\r\nCả người hắn hoảng hốt một ch&uacute;t.<br />\r\n<br />\r\nPhảng phất l&agrave;m một giấc mộng, rất d&agrave;i, nhưng hắn lại nhớ kh&ocirc;ng r&otilde; trong mộng xảy ra chuyện g&igrave;.<br />\r\n<br />\r\nLần nữa mở mắt, H&agrave;n Tuyệt to&agrave;n th&acirc;n l&agrave; mồ h&ocirc;i.<br />\r\n<br />\r\nTrước mắt hắn màn ánh sáng đ&atilde; biến th&agrave;nh thuộc t&iacute;nh liệt biểu:<br />\r\n<br />\r\n&laquo; t&iacute;nh danh: H&agrave;n Tuyệt &raquo;<br />\r\n<br />\r\n&laquo; tuổi thọ: 16/65 &raquo;<br />\r\n<br />\r\n&laquo; chủng tộc: Ph&agrave;m nh&acirc;n &raquo;<br />\r\n<br />\r\n&laquo; tu vi: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; c&ocirc;ng ph&aacute;p: Lục Đạo Lu&acirc;n Hồi C&ocirc;ng ( có th&ecirc;̉ truyền thừa ) &raquo;<br />\r\n<br />\r\n&laquo; ph&aacute;p thuật: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; thần th&ocirc;ng: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; ph&aacute;p kh&iacute;: Kh&ocirc;ng &raquo;<br />\r\n<br />\r\n&laquo; linh căn tư chất: Lục Đạo Linh Thể, ẩn chứa đỉnh cấp Phong, Hỏa, Thủy, Thổ, Mộc, L&ocirc;i linh căn, gia tăng nhất định kh&iacute; vận &raquo;<br />\r\n<br />\r\n&laquo; Ti&ecirc;n Thi&ecirc;n kh&iacute; vận như sau &raquo;<br />\r\n<br />\r\n&laquo; tuyệt thế v&ocirc; song: Ti&ecirc;n tư, mị lực đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; Thi&ecirc;n Mệnh Kiếm Si: Kiếm Đạo tư chất đỉnh cấp, Kiếm Đạo ngộ t&iacute;nh đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; th&acirc;n ph&aacute;p tuyệt trần: Th&acirc;n ph&aacute;p tư chất đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; Ti&ecirc;n Đế hậu duệ: Thu hoạch được một bộ tuyệt thế c&ocirc;ng ph&aacute;p tu ti&ecirc;n, 1000 khối linh thạch thượng phẩm &raquo;<br />\r\n<br />\r\n&laquo; xem x&eacute;t quan hệ nh&acirc;n mạch &raquo;<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng c&oacute; vội v&atilde; truyền thừa Lục Đạo Lu&acirc;n Hồi C&ocirc;ng, m&agrave; l&agrave; click ph&iacute;a dưới c&ugrave;ng nhất quan hệ nh&acirc;n mạch.<br />\r\n<br />\r\nM&agrave;n s&aacute;ng biến đổi, xuất hiện một ảnh ch&acirc;n dung, l&agrave; ch&acirc;n nh&acirc;n ảnh chụp.<br />\r\n<br />\r\nThiết l&atilde;o ảnh chụp, c&ugrave;ng ch&acirc;n nh&acirc;n giống nhau như đ&uacute;c.<br />\r\n<br />\r\n&laquo; Thiết l&atilde;o: Luyện Kh&iacute; cảnh tầng bảy, đối với ngươi tr&agrave;n ngập ch&aacute;n gh&eacute;t, nếu l&agrave; ngươi c&oacute; tu ti&ecirc;n linh căn, nhất định t&iacute;nh to&aacute;n ngươi, cừu hận độ l&agrave; 1 tinh &raquo;<br />\r\n<br />\r\n&quot;Ta s&aacute;t, lão tử t&acirc;n t&acirc;n khổ khổ v&igrave; ngươi lao động, ngươi c&ograve;n cừu hận ta?&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt trong l&ograve;ng chửi ầm l&ecirc;n.<br />\r\n<br />\r\nChợt hắn lại b&igrave;nh tĩnh xuống tới.<br />\r\n<br />\r\nĐ&acirc;y l&agrave; b&agrave;n tay v&agrave;ng a!<br />\r\n<br />\r\nC&oacute; thể xem x&eacute;t đến người kh&aacute;c đối với ngươi ấn tượng.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nBất qu&aacute; v&igrave; sao kh&ocirc;ng c&oacute; những người kh&aacute;c?<br />\r\n<br />\r\nPh&agrave;m nh&acirc;n kh&ocirc;ng đang suy nghĩ phạm vi?<br />\r\n<br />\r\nTrương C&aacute;p đối với hắn kh&ocirc;ng c&oacute; cảm gi&aacute;c?<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng nghĩ ra, cũng kh&ocirc;ng c&oacute; suy nghĩ nhiều, hắn trước đẩy cửa ph&ograve;ng ra, ph&aacute;t hiện thời gian đ&atilde; nhanh đến trưa rồi, kh&ocirc;ng c&oacute; khả năng lại lười biếng, sẽ bị ph&aacute;t gi&aacute;c được.<br />\r\n<br />\r\nHắn lập tức chạy hướng vườn dược thảo.<br />\r\n<br />\r\n&quot;H&agrave;n Tuyệt, tiểu tử ngươi c&oacute; phải hay kh&ocirc;ng ngủ nướng?&quot;<br />\r\n<br />\r\nMột người trung ni&ecirc;n n&ocirc; bộc cười mắng, H&agrave;n Tuyệt ngượng ng&ugrave;ng v&ograve; đầu, dẫn tới những người kh&aacute;c cười ha ha.<br />\r\n<br />\r\nBọn hắn kh&ocirc;ng c&oacute; suy nghĩ nhiều, cũng kh&ocirc;ng c&oacute; quở tr&aacute;ch, H&agrave;n Tuyệt rất &iacute;t thất tr&aacute;ch, ngẫu nhi&ecirc;n một lần cũng kh&ocirc;ng t&iacute;nh l&agrave; g&igrave;.<br />\r\n<br />\r\nVườn dược thảo cửa ra v&agrave;o t&ecirc;n nữ tu kia sĩ bỗng nhi&ecirc;n mở mắt nh&igrave;n về ph&iacute;a H&agrave;n Tuyệt.<br />\r\n<br />\r\nN&agrave;ng c&oacute; ch&uacute;t nh&iacute;u m&agrave;y.<br />\r\n<br />\r\n&quot;Thiếu ni&ecirc;n n&agrave;y. . . Tốt tuấn a!&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt trước mắt đi theo hiện ra một h&agrave;ng chữ:<br />\r\n<br />\r\n&laquo; H&igrave;nh Hồng Tuyền đối với ngươi c&oacute; ấn tượng tốt, trước mắt độ thiện cảm l&agrave; 1 tinh &raquo;<br />\r\n<br />\r\nC&aacute;i quỷ g&igrave;?<br />\r\n<br />\r\nH&igrave;nh Hồng Tuyền l&agrave; ai?<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng hiểu thấu, v&ocirc; &yacute; thức quay đầu nh&igrave;n lại.<br />\r\n<br />\r\nChẳng lẽ l&agrave; vị nữ tu kia?<br />\r\n<br />\r\nQuả nhi&ecirc;n, nữ tu kia v&acirc;̣y mà theo d&otilde;i hắn.<br />\r\n<br />\r\nBốn mắt nh&igrave;n nhau, H&igrave;nh Hồng Tuyền hướng hắn nh&agrave;n nhạt cười một tiếng.<br />\r\n<br />\r\nH&agrave;n Tuyệt vội v&agrave;ng nghi&ecirc;ng đầu đi.<br />\r\n<br />\r\nHỏng b&eacute;t.<br />\r\n<br />\r\nĐỉnh cấp mị lực bị để mắt tới.<br />\r\n<br />\r\nTa l&agrave; ph&agrave;m nh&acirc;n, n&agrave;ng l&agrave; tu sĩ, kh&ocirc;ng c&oacute; khả năng y&ecirc;u nhau.<br />\r\n<br />\r\nHẳn l&agrave; n&agrave;ng muốn lấy ta l&agrave;m l&ocirc; đỉnh?<br />\r\n<br />\r\nKh&ocirc;ng được!<br />\r\n<br />\r\nPhải nghĩ biện ph&aacute;p n&eacute; tr&aacute;nh!<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nV&agrave;o đ&ecirc;m.<br />\r\n<br />\r\nTrong ph&ograve;ng mặt kh&aacute;c năm vị n&ocirc; bộc biết r&otilde; hơn ngủ về sau, H&agrave;n Tuyệt nằm ở tr&ecirc;n giường, bắt đầu truyền thừa Lục Đạo Lu&acirc;n Hồi C&ocirc;ng.<br />\r\n<br />\r\nKhổng lồ k&yacute; ức tr&agrave;n v&agrave;o trong &oacute;c của hắn.<br />\r\n<br />\r\nThật l&acirc;u.<br />\r\n<br />\r\nHắn mở to mắt.<br />\r\n<br />\r\n&quot;Đ&acirc;y ch&iacute;nh l&agrave; c&ocirc;ng ph&aacute;p tu ti&ecirc;n sao, thật sự l&agrave; rườm r&agrave;. . .&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt y&ecirc;n lặng nghĩ đến, hắn chỉ truyền nhận đến tầng thứ nhất c&ocirc;ng ph&aacute;p, có th&ecirc;̉ tu luyện tới Luyện Kh&iacute; cảnh chín tầng.</p>\r\n\r\n<p>Quảng C&aacute;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nLục Đạo Lu&acirc;n Hồi C&ocirc;ng, ch&uacute; trọng s&aacute;u hệ linh căn c&acirc;n đối ph&aacute;t triển, thể nội đ&ecirc;́n bồi dưỡng được s&aacute;u loại thuộc t&iacute;nh linh lực, mặc d&ugrave; qu&aacute; tr&igrave;nh tu luyện so đơn thuộc t&iacute;nh c&ocirc;ng ph&aacute;p muốn rườm r&agrave;, nhưng H&agrave;n Tuyệt tư chất tuyệt đỉnh, c&oacute; thể đền b&ugrave; sự ch&ecirc;nh lệch n&agrave;y.<br />\r\n<br />\r\nS&aacute;u loại linh kh&iacute; đạt tới tr&igrave;nh độ nhất định, mới c&oacute; thể Tr&uacute;c Cơ!<br />\r\n<br />\r\nH&agrave;n Tuyệt tinh thần phấn chấn, lặng lẽ ngồi xuống, hắn để hệ thống lấy ch&iacute;nh m&igrave;nh c&aacute;i giường n&agrave;y l&agrave; phạm vi mở ra kết giới, tr&aacute;nh cho bị ph&iacute;a ngo&agrave;i ba vị tu sĩ ph&aacute;t gi&aacute;c được.<br />\r\n<br />\r\nMặt kh&aacute;c năm vị n&ocirc; bộc ngủ rất say, kh&ograve; kh&egrave; rung trời, d&ugrave; sao mệt mỏi một ng&agrave;y.<br />\r\n<br />\r\nH&agrave;n Tuyệt bắt đầu dựa theo tầng t&acirc;m ph&aacute;p thứ nhất thổ nạp.<br />\r\n<br />\r\nThổ nạp, ch&iacute;nh l&agrave; một loại phương ph&aacute;p h&ocirc; hấp.<br />\r\n<br />\r\nTại thổ nạp trong qu&aacute; tr&igrave;nh, ki&ecirc;n nhẫn cảm thụ thi&ecirc;n địa linh kh&iacute;.<br />\r\n<br />\r\nKh&ocirc;ng đến mười gi&acirc;y, H&agrave;n Tuyệt liền cảm nhận được trong kh&ocirc;ng kh&iacute; tr&agrave;n ngập Phong linh kh&iacute;, Thổ linh kh&iacute;, Mộc linh kh&iacute;, Thủy linh kh&iacute;.<br />\r\n<br />\r\nVề phần Hỏa linh kh&iacute;, L&ocirc;i linh kh&iacute;, tạm thời bắt kh&ocirc;ng đến.<br />\r\n<br />\r\nH&agrave;n Tuyệt bắt đầu hấp thu c&aacute;i n&agrave;y bốn cỗ linh kh&iacute;.<br />\r\n<br />\r\nTrước mắt hắn bỗng nhi&ecirc;n hiện ra từng h&agrave;ng chữ.<br />\r\n<br />\r\nHắn r&otilde; r&agrave;ng nhắm mắt lại, lại có th&ecirc;̉ nh&igrave;n thấy những chữ n&agrave;y, quả thực thần kỳ.<br />\r\n<br />\r\n&laquo; ngươi bắt đầu lần thứ nhất tu luyện, tu luyện của ngươi ph&aacute;t triển c&oacute; ph&iacute;a dưới lựa chọn &raquo;<br />\r\n<br />\r\n&laquo; một, cao điệu tuyệt thế thi&ecirc;n ki&ecirc;u, có th&ecirc;̉ đạt được một thanh Luyện Kh&iacute; cảnh ph&aacute;p kh&iacute; &raquo;<br />\r\n<br />\r\n&laquo; hai, điệu thấp tu luyện, có th&ecirc;̉ mở ra ẩn giấu tu vi, linh căn c&ocirc;ng năng &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng ch&uacute;t do dự lựa chọn đầu thứ hai.<br />\r\n<br />\r\nĐầu thứ hai c&ocirc;ng năng xem x&eacute;t ch&iacute;nh l&agrave; thần kỹ.<br />\r\n<br />\r\nDạng n&agrave;y hắn về sau liền c&oacute; thể an t&acirc;m tu luyện, kh&ocirc;ng sợ bị ph&aacute;t gi&aacute;c!<br />\r\n<br />\r\n&laquo; ngươi c&oacute; thể t&ugrave;y thời mở ra ẩn t&agrave;ng c&ocirc;ng năng &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt lộ ra d&aacute;ng tươi cười, ổn.<br />\r\n<br />\r\nThiết l&atilde;o c&ograve;n chưa trở về, hắn phải nắm chắc thời gian mạnh l&ecirc;n.<br />\r\n<br />\r\n. . .<br />\r\n<br />\r\nTho&aacute;ng chớp mắt.<br />\r\n<br />\r\nThời gian hai năm cấp tốc đi qua.<br />\r\n<br />\r\n18 tuổi H&agrave;n Tuyệt đ&atilde; Luyện Kh&iacute; cảnh tầng bảy, Phong, Thổ, Mộc, Thủy tứ hệ linh căn tất cả đều tu luyện tới Luyện Kh&iacute; cảnh tầng bảy.<br />\r\n<br />\r\nTh&ocirc;ng qua quan hệ nh&acirc;n mạch liệt biểu, H&agrave;n Tuyệt biết H&igrave;nh Hồng Tuyền cũng mới Luyện Kh&iacute; cảnh tầng bảy tu vi.<br />\r\n<br />\r\nHai năm n&agrave;y, Thiết l&atilde;o một mực chưa c&oacute; trở về.<br />\r\n<br />\r\nĐ&aacute;ng nhắc tới ch&iacute;nh l&agrave;, H&igrave;nh Hồng Tuyền đối với hắn độ thiện cảm đ&atilde; d&acirc;ng l&ecirc;n đến 2 tinh.<br />\r\n<br />\r\nHai người đều kh&ocirc;ng c&oacute; giao lưu.<br />\r\n<br />\r\nBất qu&aacute; H&agrave;n Tuyệt có th&ecirc;̉ ph&aacute;t gi&aacute;c được H&igrave;nh Hồng Tuyền thường xuy&ecirc;n nh&igrave;n hắn chằm chằm, để hắn rất kh&ocirc;ng th&iacute;ch ứng.<br />\r\n<br />\r\nQu&aacute; đẹp trai cũng c&oacute; phiền phức.<br />\r\n<br />\r\nAi.<br />\r\n<br />\r\nTa chỉ muốn tu ti&ecirc;n.<br />\r\n<br />\r\nH&agrave;n Tuyệt trong l&ograve;ng thở d&agrave;i.<br />\r\n<br />\r\nH&igrave;nh Hồng Tuyền d&aacute;ng dấp mỹ lệ, nhưng c&ograve;n chưa tới khuynh quốc khuynh th&agrave;nh d&aacute;ng vẻ, H&agrave;n Tuyệt kh&ocirc;ng muốn c&ugrave;ng n&agrave;ng sinh ra t&igrave;nh cảm.</p>\r\n\r\n<p>&mdash; QUẢNG C&Aacute;O &mdash;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nMột khi c&oacute; t&igrave;nh y&ecirc;u, hắn liền c&oacute; nhược điểm.<br />\r\n<br />\r\nHắn muốn trường sinh bất tử, cũng kh&ocirc;ng thể chết ở tr&ecirc;n nửa đường.<br />\r\n<br />\r\nChờ hắn vĩnh sinh bất tử, suy nghĩ th&ecirc;m t&igrave;nh y&ecirc;u.<br />\r\n<br />\r\nChỉ cần v&ocirc; địch, đến l&uacute;c đ&oacute; muốn bao nhi&ecirc;u nữ nh&acirc;n liền c&oacute; bấy nhi&ecirc;u nữ nh&acirc;n, cũng kh&ocirc;ng sợ cừu gia t&igrave;m phiền to&aacute;i!<br />\r\n<br />\r\nH&agrave;n Tuyệt một b&ecirc;n lao động, một b&ecirc;n ki&ecirc;n định nghĩ đến, xem H&igrave;nh Hồng Tuyền l&agrave; y&ecirc;u ma quỷ qu&aacute;i.<br />\r\n<br />\r\nĐ&uacute;ng l&uacute;c n&agrave;y.<br />\r\n<br />\r\nH&igrave;nh Hồng Tuyền bỗng nhi&ecirc;n đứng dậy.<br />\r\n<br />\r\nN&agrave;ng chậm r&atilde;i đi tới, dẫn tới mặt kh&aacute;c n&ocirc; bộc gh&eacute; mắt.<br />\r\n<br />\r\nN&agrave;ng trực tiếp đi v&agrave;o H&agrave;n Tuyệt trước mặt, cười n&oacute;i: &quot;Ngươi c&ugrave;ng ta tới một chuyến.&quot;<br />\r\n<br />\r\nH&agrave;n Tuyệt mộng.<br />\r\n<br />\r\nMặt kh&aacute;c n&ocirc; bộc đều h&acirc;m mộ ghen tỵ nh&igrave;n về ph&iacute;a hắn.<br />\r\n<br />\r\nCó th&ecirc;̉ bị như vậy ti&ecirc;n tử để mắt tới, hẳn l&agrave; c&oacute; chỗ tốt.<br />\r\n<br />\r\nĐổi lại l&agrave; bọn hắn, cho d&ugrave; chỉ l&agrave; đơn độc ở chung, đời n&agrave;y cũng đủ rồi.<br />\r\n<br />\r\nH&agrave;n Tuyệt kh&ocirc;ng d&aacute;m cự tuyệt, chỉ c&oacute; thể gật đầu.<br />\r\n<br />\r\nHai người đi ra vườn dược thảo.<br />\r\n<br />\r\nT&ecirc;n nam tu kia sĩ mở mắt hỏi: &quot;H&igrave;nh sư muội, ngươi đ&acirc;y l&agrave;?&quot;<br />\r\n<br />\r\nHắn d&ograve; x&eacute;t H&agrave;n Tuyệt, kh&ocirc;ng khỏi nh&iacute;u m&agrave;y.<br />\r\n<br />\r\nKẻ n&agrave;y cực kỳ tuấn mỹ!<br />\r\n<br />\r\nVườn dược thảo bọn n&ocirc; bộc cả một đời kh&ocirc;ng hề rời đi qua vườn dược thảo, kh&ocirc;ng c&oacute; thẩm mỹ, lại th&ecirc;m tư duy theo qu&aacute;n t&iacute;nh, kh&ocirc;ng c&oacute; l&agrave;m sao quan s&aacute;t H&agrave;n Tuyệt.<br />\r\n<br />\r\nKh&aacute;c ph&aacute;i h&uacute;t nhau, H&igrave;nh Hồng Tuyền dẫn đầu ph&aacute;t hiện H&agrave;n Tuyệt chỗ kh&aacute;c biệt.<br />\r\n<br />\r\nNam tu sĩ bởi v&igrave; H&igrave;nh Hồng Tuyền mới cẩn thận quan s&aacute;t H&agrave;n Tuyệt.<br />\r\n<br />\r\nH&agrave;n Tuyệt h&igrave;nh tượng để hắn bản năng kh&oacute; chịu.<br />\r\n<br />\r\n&quot;Kh&ocirc;ng c&oacute; việc g&igrave;, sư ca tiếp tục tu luyện đi, ta muốn c&ugrave;ng vị tiểu ca n&agrave;y đơn độc t&acirc;m sự.&quot; H&igrave;nh Hồng Tuyền che miệng cười n&oacute;i.<br />\r\n<br />\r\nH&agrave;n Tuyệt hướng nam tu sĩ xấu hổ cười một tiếng, lộ ra rất khẩn trương.<br />\r\n<br />\r\nNam tu sĩ nh&iacute;u m&agrave;y, thật kh&ocirc;ng c&oacute; n&oacute;i c&aacute;i g&igrave;.<br />\r\n<br />\r\nH&agrave;n Tuyệt đi theo H&igrave;nh Hồng Tuyền đi hướng rừng c&acirc;y.<br />\r\n<br />\r\nTrong l&ograve;ng của hắn l&acirc;m v&agrave;o đấu tranh b&ecirc;n trong.<br />\r\n<br />\r\nTa c&aacute;i n&agrave;y đ&aacute;ng chết mị lực!<br />\r\n<br />\r\nSau đ&oacute; ta n&ecirc;n l&agrave;m c&aacute;i g&igrave;?<br />\r\n<br />\r\nPhản kh&aacute;ng?<br />\r\n<br />\r\nHay l&agrave;. . . Thuận theo?<br />\r\n<br />\r\nTiếu Ngự: Ta l&agrave; tới coi mắt.<br />\r\nNgự tỷ: Coi mắt ?<br />\r\nTiếu Ngự: &quot;Kh&ocirc;ng cần nhiều lời, nh&igrave;n ngươi c&oacute; v&agrave;i phần tư sắc, ta động l&ograve;ng, ngươi tự nghĩ biện ph&aacute;p th&iacute;ch ta, 14 ức người b&ecirc;n trong ta chỉ cho ngươi cơ hội!&quot;</p>', '300', 2, '2022-06-04 02:55:25', '2022-06-04 02:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_sell`
--

CREATE TABLE `chapter_sell` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_sell`
--

INSERT INTO `chapter_sell` (`id`, `chapter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 21, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 3, 2, '2022-06-01 01:06:43', '2022-06-01 01:06:43'),
(2, 'sa', 3, 2, '2022-06-01 01:09:40', '2022-06-01 01:09:40'),
(3, 'asd', 3, 2, '2022-06-01 01:18:31', '2022-06-01 01:18:31'),
(24, 'asdas', 3, 32, '2022-06-07 04:12:28', '2022-06-07 04:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 3, 2, '2022-06-01 01:06:08', '2022-06-01 01:06:08'),
(3, 3, 1, '2022-06-01 01:06:34', '2022-06-01 01:06:34'),
(4, 3, 1, '2022-06-01 01:06:34', '2022-06-01 01:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_04_08_023239_create_authors_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2022_03_28_121306_create_roles_table', 2),
(7, '2022_03_28_121324_create_permissions_table', 2),
(8, '2022_03_28_121349_user_role', 2),
(9, '2022_03_28_121417_permission_role', 2),
(10, '2022_03_31_150927_add_column_user', 2),
(11, '2022_04_08_020413_create_products_table', 2),
(12, '2022_04_08_020534_create_categorys_table', 2),
(13, '2022_04_08_023036_create_category_product', 2),
(14, '2022_04_08_024220_create_chapters', 2),
(15, '2022_04_08_035418_create_product_post', 2),
(16, '2022_04_25_073845_create_favourites_table', 2),
(17, '2022_04_25_074656_create_comments_table', 2),
(18, '2022_05_30_154441_create_chapter_price_table', 2),
(19, '2022_06_01_093942_create_chapter_sell_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(18, 'mainguyenphuocminh2002@gmail.com', '$2y$10$dw5T1AA71aZqqP2AFOw7d.KXe4lE6ENwt2o73QZIwBw7et5nDL9lm', '2022-05-30 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `key_code`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Roles', NULL, 'Roles', NULL, NULL, NULL, '2022-06-01 00:48:39'),
(2, 'CreateRoles', NULL, 'CreateRoles', 1, NULL, NULL, NULL),
(3, 'UpdateRoles', NULL, 'UpdateRoles', 1, NULL, NULL, NULL),
(4, 'DeleteRoles', NULL, 'DeleteRoles', 1, NULL, NULL, NULL),
(5, 'ViewRoles', NULL, 'ViewRoles', 1, NULL, NULL, NULL),
(6, 'Permissions', NULL, 'Permissions', NULL, NULL, NULL, NULL),
(7, 'CreatePermissions', NULL, 'CreatePermissions', 6, NULL, NULL, NULL),
(8, 'UpdatePermissions', NULL, 'UpdatePermissions', 6, NULL, NULL, NULL),
(9, 'DeletePermissions', NULL, 'DeletePermissions', 6, NULL, NULL, NULL),
(10, 'ViewPermissions', NULL, 'ViewPermissions', 6, NULL, NULL, NULL),
(11, 'Users', NULL, 'Users', NULL, NULL, NULL, NULL),
(12, 'ViewUsers', NULL, 'ViewUsers', 11, NULL, NULL, NULL),
(13, 'UpdateUsers', NULL, 'UpdateUsers', 11, NULL, NULL, NULL),
(14, 'DeleteUsers', NULL, 'DeleteUsers', 11, NULL, NULL, NULL),
(15, 'CreateUsers', NULL, 'CreateUsers', 11, NULL, NULL, NULL),
(16, 'Products', NULL, 'Products', NULL, NULL, NULL, NULL),
(17, 'ViewProducts', NULL, 'ViewProducts', 16, NULL, NULL, NULL),
(18, 'UpdateProducts', NULL, 'UpdateProducts', 16, NULL, NULL, NULL),
(19, 'DeleteProducts', NULL, 'DeleteProducts', 16, NULL, '0000-00-00 00:00:00', NULL),
(20, 'CreateProducts', NULL, 'CreateProducts', 16, NULL, NULL, NULL),
(21, 'Themes', NULL, 'Themes', NULL, NULL, NULL, NULL),
(22, 'ViewThemes', NULL, 'ViewThemes', 21, NULL, NULL, NULL),
(23, 'UpdateThemes', NULL, 'UpdateThemes', 21, NULL, NULL, NULL),
(24, 'DeleteThemes', NULL, 'DeleteThemes', 21, NULL, NULL, NULL),
(25, 'CreateThemes', NULL, 'CreateThemes', 21, NULL, NULL, NULL),
(26, 'Categorys', NULL, 'Categorys', NULL, NULL, NULL, NULL),
(27, 'ViewCategorys', NULL, 'ViewCategorys', 26, NULL, NULL, NULL),
(28, 'UpdateCategorys', NULL, 'UpdateCategorys', 26, NULL, NULL, NULL),
(29, 'DeleteCategorys', NULL, 'DeleteCategorys', 26, NULL, NULL, NULL),
(30, 'CreateCategorys', NULL, 'CreateCategorys', 26, NULL, NULL, NULL),
(31, 'Comments', NULL, 'Comments', NULL, NULL, NULL, NULL),
(32, 'ViewComments', NULL, 'ViewComments', 31, NULL, NULL, NULL),
(33, 'UpdateComments', NULL, 'UpdateComments', 31, NULL, NULL, NULL),
(34, 'DeleteComments', NULL, 'DeleteComments', 31, NULL, NULL, NULL),
(35, 'CreateComments', NULL, 'CreateComments', 31, NULL, NULL, NULL),
(36, 'Authors', NULL, 'Authors', NULL, NULL, NULL, NULL),
(37, 'ViewAuthors', NULL, 'ViewAuthors', 36, NULL, NULL, NULL),
(38, 'UpdateAuthors', NULL, 'UpdateAuthors', 36, NULL, NULL, NULL),
(39, 'DeleteAuthors', NULL, 'DeleteAuthors', 36, NULL, NULL, NULL),
(40, 'CreateAuthors', NULL, 'CreateAuthors', 36, NULL, NULL, NULL),
(41, 'Chapters', NULL, 'Chapters', NULL, NULL, NULL, NULL),
(42, 'CreateChapters', 'Mô Tả Quyền', 'CreateChapters', 41, NULL, '2022-05-31 03:57:19', '2022-05-31 03:57:19'),
(43, 'UpdateChapters', 'Mô Tả Quyền', 'UpdateChapters', 41, NULL, '2022-05-31 03:57:34', '2022-05-31 03:57:34'),
(44, 'ViewChapters', 'Mô Tả Quyền', 'ViewChapters', 41, NULL, '2022-05-31 03:57:50', '2022-05-31 03:57:50'),
(45, 'DeleteChapters', 'Mô Tả Quyền', 'DeleteChapters', 41, NULL, '2022-05-31 03:58:04', '2022-05-31 03:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(128, 2, 1, NULL, NULL),
(129, 3, 1, NULL, NULL),
(130, 4, 1, NULL, NULL),
(131, 5, 1, NULL, NULL),
(132, 7, 1, NULL, NULL),
(133, 8, 1, NULL, NULL),
(134, 9, 1, NULL, NULL),
(135, 10, 1, NULL, NULL),
(136, 12, 1, NULL, NULL),
(137, 13, 1, NULL, NULL),
(138, 14, 1, NULL, NULL),
(139, 15, 1, NULL, NULL),
(140, 17, 1, NULL, NULL),
(141, 18, 1, NULL, NULL),
(142, 19, 1, NULL, NULL),
(143, 20, 1, NULL, NULL),
(144, 22, 1, NULL, NULL),
(145, 23, 1, NULL, NULL),
(146, 24, 1, NULL, NULL),
(147, 25, 1, NULL, NULL),
(148, 27, 1, NULL, NULL),
(149, 28, 1, NULL, NULL),
(150, 29, 1, NULL, NULL),
(151, 30, 1, NULL, NULL),
(152, 32, 1, NULL, NULL),
(153, 33, 1, NULL, NULL),
(154, 34, 1, NULL, NULL),
(155, 35, 1, NULL, NULL),
(156, 37, 1, NULL, NULL),
(157, 38, 1, NULL, NULL),
(158, 39, 1, NULL, NULL),
(159, 40, 1, NULL, NULL),
(160, 42, 1, NULL, NULL),
(161, 43, 1, NULL, NULL),
(162, 44, 1, NULL, NULL),
(163, 45, 1, NULL, NULL),
(164, 42, 2, NULL, NULL),
(165, 43, 2, NULL, NULL),
(166, 44, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) DEFAULT NULL,
  `chapters` int(11) NOT NULL DEFAULT 0,
  `favorites` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `alias`, `author_id`, `thumbnail`, `views`, `chapters`, `favorites`, `comments`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thỉnh Công Tử Yêu', '<p>Lồng lộng nh&acirc;n gian, cửu thi&ecirc;n thập địa.<br />\r\n<br />\r\nThế gian phồn hoa, vui sướng tu ti&ecirc;n.<br />\r\n<br />\r\nL&agrave;m Sở Lương mở mắt ra ph&aacute;t hiện m&igrave;nh trở th&agrave;nh một t&ecirc;n ph&aacute;i Thục Sơn đệ tử, cũng người mang một t&ocirc;n kỳ dị bảo th&aacute;p... Từ đ&oacute; liền bước l&ecirc;n một đầu chưa từng thiết tưởng con đường.<br />\r\n<br />\r\nTam thập lục phong thần y&ecirc;n khởi, b&aacute;t thi&ecirc;n l&yacute; ngoại trảm long ho&agrave;n!<br />\r\n<br />\r\n...<br />\r\n<br />\r\n&quot;Thỉnh c&ocirc;ng tử ch&eacute;m y&ecirc;u!&quot;<br />\r\n<br />\r\nCảnh giới: Đo&aacute;n Thể, Ngưng Kh&iacute;, Thần &Yacute;, Kim Đan, Ngũ H&agrave;nh, Ph&aacute;p Thể, Vấn Đạo, Thi&ecirc;n Nguy&ecirc;n, Th&ocirc;ng Huyền.</p>', 'thinh-cong-tu-yeu', 1, 'imgProducts/admin/300_1654600802.jpg', 15000, 2, 20000, 0, NULL, '2022-05-31 03:17:41', '2022-06-07 04:20:02'),
(2, 'Đỉnh Cấp Khí Vận, Lặng Lẽ Tu Luyện Ngàn Năm', '<p>Chuyển thế đi v&agrave;o tu ti&ecirc;n thế giới, H&agrave;n Tuyệt ph&aacute;t hiện ch&iacute;nh m&igrave;nh mang theo tr&ograve; chơi thuộc t&iacute;nh, v&acirc;̣y mà c&oacute; thể đổ x&uacute;c xắc đổi mới linh căn tư chất c&ugrave;ng Ti&ecirc;n Thi&ecirc;n kh&iacute; vận.<br />\r\n<br />\r\nKết quả l&agrave;, hắn bỏ ra mười một năm lắc Ti&ecirc;n Thi&ecirc;n kh&iacute; vận.<br />\r\n<br />\r\n&laquo; tuyệt thế v&ocirc; song: Ti&ecirc;n tư, mị lực đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; Thi&ecirc;n Mệnh Kiếm Si: Kiếm Đạo tư chất đỉnh cấp, Kiếm Đạo ngộ t&iacute;nh đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; th&acirc;n ph&aacute;p tuyệt trần: Th&acirc;n ph&aacute;p tư chất đỉnh cấp &raquo;<br />\r\n<br />\r\n&laquo; Ti&ecirc;n Đế hậu duệ: Thu hoạch được một bộ tuyệt thế c&ocirc;ng ph&aacute;p tu ti&ecirc;n, 1000 khối linh thạch thượng phẩm &raquo;<br />\r\n<br />\r\nH&agrave;n Tuyệt v&igrave; trường sinh, quyết định lặng lẽ tu luyện, kh&ocirc;ng ra đầu ngọn gi&oacute;.<br />\r\n<br />\r\nNg&agrave;n năm sau, tu ch&acirc;n giới một đời đ&ocirc;̉i một đời.<br />\r\n<br />\r\nKhi Ti&ecirc;n giới thanh l&yacute; thế gian l&uacute;c, H&agrave;n Tuyệt kh&ocirc;ng thể kh&ocirc;ng ra tay.<br />\r\n<br />\r\nHắn l&uacute;c n&agrave;y mới ph&aacute;t hiện, giống như Ti&ecirc;n Thần bất qu&aacute; cũng như vậy!</p>', 'dinh-cap-khi-van-lang-le-tu-luyen-ngan-nam', 2, 'imgProducts/admin/300 (1)_1654600810.jpg', 100000, 3, 15000, 3, NULL, '2022-05-31 09:36:27', '2022-06-07 04:20:10'),
(11, 'Biếu Tặng Cơ Duyên, Bạo Kích Bồi Thường', '<p>&laquo; B.faloo mạng tiểu thuyết độc nhất v&ocirc; nhị k&yacute; hợp đồng tiểu thuyết: Huyền Huyễn: Biếu tặng cơ duy&ecirc;n, bạo k&iacute;ch bồi thường! &raquo;<br />\r\n<br />\r\nQuyển s&aacute;ch lại danh &laquo; sư huynh, xin ngươi đừng lại cho ta cơ duy&ecirc;n! &raquo;<br />\r\n<br />\r\nXuy&ecirc;n việt Huyền Huyễn thế giới, Lục Huyền thu được cơ duy&ecirc;n bồi thường hệ thống.<br />\r\n<br />\r\nChỉ cần đem ch&iacute;nh m&igrave;nh gặp phải cơ duy&ecirc;n đưa cho người kh&aacute;c, l&agrave; c&oacute; thể thu được bạo k&iacute;ch gấp bội bồi thường, vừa mới bắt đầu hắn c&ograve;n c&oacute; ch&uacute;t buồn bực, nhưng rất nhanh th&igrave; thật l&agrave; thơm!<br />\r\n<br />\r\n&quot;Ng&agrave;i tặng cho m&ocirc;̣t vi&ecirc;n Thi&ecirc;n Nguy&ecirc;n Đan, g&acirc;y ra gấp mười lần bạo k&iacute;ch bồi thường, thu được: Thi&ecirc;n Nguy&ecirc;n Đan * 10 &quot;<br />\r\n<br />\r\n&quot;Ng&agrave;i tặng cho một bản Huyền Cấp b&iacute; thuật, g&acirc;y ra gấp trăm lần bạo k&iacute;ch bồi thường, thu được: Địa cấp b&iacute; thuật * 1 &quot;<br />\r\n<br />\r\n&quot;Ng&agrave;i tặng cho m&ocirc;̣t vi&ecirc;n Giao Long trứng, g&acirc;y ra ngh&igrave;n lần bạo k&iacute;ch bồi thường, thu được: Ch&acirc;n Long trứng * 1 &quot;<br />\r\n<br />\r\nSư muội: Đại sư huynh, ngươi cho cơ duy&ecirc;n của ta thật sự l&agrave; nhiều lắm, ngoại trừ lấy th&acirc;n b&aacute;o đ&aacute;p, ta muốn kh&ocirc;ng đến những thứ kh&aacute;c b&aacute;o đ&aacute;p phương thức!<br />\r\n<br />\r\nĐạo vực đệ tử: Ngoại trừ Lục sư huynh, ai cũng kh&ocirc;ng xứng l&agrave;m c&aacute;i n&agrave;y một nhậm Đạo Qu&acirc;n, ch&uacute;ng ta chỉ phục hắn!<br />\r\n<br />\r\nMa Triều Nữ Đế: Liền thế gian phần độc nhất Bổn Nguy&ecirc;n Đế Kh&iacute; ngươi cũng nguyện &yacute; cho ta, ngươi c&ograve;n n&oacute;i trong l&ograve;ng ngươi kh&ocirc;ng c&oacute; ta ? !<br />\r\n<br />\r\nLục Huyền: . . .<br />\r\n<br />\r\nCảnh giới chia l&agrave;m: Dẫn Kh&iacute; Cảnh, Nhục Th&acirc;n Cảnh, Linh Hải Cảnh, Tạo H&oacute;a Cảnh, Hồn Cung Cảnh, Sinh Tử Cảnh, Đạo Thai Cảnh, Động Thi&ecirc;n Cảnh, c&ugrave;ng với Vương Đạo Cảnh<br />\r\n<br />\r\nCăn cốt chia l&agrave;m: Phổ th&ocirc;ng, hạ đẳng, trung hạ, trung đẳng, tr&ecirc;n trung b&igrave;nh, thượng đẳng, t&ocirc;́i thượng đẳng, c&ugrave;ng với thi&ecirc;n nh&acirc;n phong th&aacute;i</p>', 'bieu-tang-co-duyen-bao-kich-boi-thuong', 4, 'imgProducts/admin/300_1654600823.jpg', 300000, 1, 5000, 0, NULL, '2022-06-01 03:31:38', '2022-06-07 04:20:23'),
(32, 'Vô Thượng Thần Đế', '<p>&nbsp;</p>\r\n\r\n<p>H&agrave;ng vạn h&agrave;ng ngh&igrave;n đại thế giới, cường giả như rừng . Nhất đại Ti&ecirc;n Vương Mục V&acirc;n, trọng sinh đến một c&aacute;i phải chịu khi dễ con tư sinh th&acirc;n l&ecirc;n, thề phải khuấy động phong v&acirc;n, trở lại đỉnh phong . Bao la thi&ecirc;n vực, ai c&ugrave;ng so t&agrave;i ? Chư thi&ecirc;n vạn giới, ta chủ ch&igrave;m nổi!<br />\r\n<br />\r\nĐ&acirc;y l&agrave; c&acirc;u truyện phần 1 về người cha của Tần Trần trong Thần Đạo Đế T&ocirc;n. C&acirc;u chuyện của 2 cha con diễn ra song song v&agrave; rất c&oacute; mối tương quan với nhau n&ecirc;n theo y&ecirc;u cầu của nhiều bạn m&igrave;nh l&agrave;m lại lu&ocirc;n bộ V&ocirc; Thượng Thần Đế n&agrave;y. Mong mọi người ủng hộ nhiệt t&igrave;nh. M&igrave;nh cảm ơn.<br />\r\n<br />\r\n︵✰Cảnh giới tu luyện:<br />\r\n✍✍ Ba ng&agrave;n tiểu thế giới:<br />\r\n<br />\r\n- Nhục Th&acirc;n - Linh Huyệt - Th&ocirc;ng Thần - Niết B&agrave;n - Tam Chuyển Chi cảnh - Vũ Ti&ecirc;n cảnh - Sinh Tử cảnh.<br />\r\n<br />\r\n✍✍ Ti&ecirc;n giới :<br />\r\n<br />\r\n- Nh&acirc;n Ti&ecirc;n - Địa Ti&ecirc;n - Thi&ecirc;n Ti&ecirc;n - Huyền Ti&ecirc;n - Ch&acirc;n Ti&ecirc;n - Kim Ti&ecirc;n - Đại La Kim Ti&ecirc;n - Ti&ecirc;n Vương - Ti&ecirc;n Đế.<br />\r\n<br />\r\n✍✍ Thần giới:<br />\r\n<br />\r\n- Hư Thần - Ch&acirc;n Thần - Địa Thần - Thi&ecirc;n Thần - Thần Qu&acirc;n - Thần Vương - Thần Ho&agrave;ng - Thần Chủ - Tổ Thần - Hư Th&aacute;nh - B&aacute;n Th&aacute;nh - H&oacute;a Th&aacute;nh.<br />\r\n<br />\r\n✍✍ Thương Lan giới:<br />\r\n<br />\r\n- Th&aacute;nh vị : Th&aacute;nh Nh&acirc;n - Đại Th&aacute;nh - Cổ Th&aacute;nh - Th&aacute;nh Vương - Th&aacute;nh Ho&agrave;ng - Th&aacute;nh Đế - Thi&ecirc;n Th&aacute;nh Đế - Cổ Th&aacute;nh Đế.<br />\r\n<br />\r\n- Qu&acirc;n vị : Nh&acirc;n Qu&acirc;n - Địa Qu&acirc;n - Thi&ecirc;n Qu&acirc;n - Qu&acirc;n Vương - Th&aacute;nh Qu&acirc;n - Đế Qu&acirc;n.<br />\r\n<br />\r\n- T&ocirc;n vị : Ch&iacute; T&ocirc;n - Địa T&ocirc;n - Thi&ecirc;n T&ocirc;n - Thần T&ocirc;n.<br />\r\n<br />\r\n- Giới vị : Giới Vương - Giới Ho&agrave;ng - Giới Th&aacute;nh - Giới T&ocirc;n - Giới Thần - Giới Chủ.<br />\r\n<br />\r\n- Ch&uacute;a Tể - Nửa bước H&oacute;a Đế - Chuẩn Đế - xưng h&agrave;o thần (xưng h&agrave;o đế)<br />\r\n<br />\r\n✍✍ C&agrave;n Kh&ocirc;n đại thế giới:<br />\r\n<br />\r\n- Đại Đạo thần cảnh ( Đạo Trụ - Đạo Đ&agrave;i - Đạo Hải - Đạo Vấn - Đạo Phủ Thi&ecirc;n Qu&acirc;n ( mở hơn trăm t&ograve;a động phủ l&agrave; Đạo Vương) - Đạo Ho&agrave;ng - Đạo Đế - Đạo Thần - Đạo Chủ ) - V&ocirc; Ph&aacute;p - V&ocirc; Thi&ecirc;n - Thần Đế.<br />\r\n<br />\r\n︵✰Danh s&aacute;ch 9 vị nương tử của main:<br />\r\n1, Mạnh Tử Mặc<br />\r\n2, Tần Mộng Dao<br />\r\n3, Diệp Tuyết Kỳ<br />\r\n4, Ti&ecirc;u Do&atilde;n Nhi<br />\r\n5, Vương T&acirc;m Nh&atilde;<br />\r\n6, Cửu Nhi<br />\r\n7, Diệu Ti&ecirc;n Ngữ<br />\r\n8, Minh Nguyệt T&acirc;m<br />\r\n9, B&iacute;ch Thanh Ngọc</p>', 'vo-thuong-than-de', 3, 'imgProducts/admin/300 (1)_1654600906.jpg', 250000, 2, 30000, 1, NULL, '2022-06-01 03:50:41', '2022-06-07 04:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_post`
--

CREATE TABLE `product_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_post`
--

INSERT INTO `product_post` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 3, NULL, NULL),
(3, 32, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quyền Admin', NULL, NULL, NULL),
(2, 'guest', 'Quyền Guest', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locked` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `ticket`, `phone`, `gender`, `avatar`, `locked`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ukBF7J6Yszmihachsysjx.Q8K/sVjupZi6gcCWVggSHQzHEqURO/2', NULL, NULL, NULL, NULL, NULL, 0, NULL, 0),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$nqkgqbAFgZhhGQM6hp4TpetPD9fe0E3WXSPuom0RDM88YCoU5nB4u', NULL, NULL, NULL, NULL, NULL, 0, NULL, 0),
(3, 'minh', 'mainguyenphuocminh2002@gmail.com', NULL, '$2y$10$8pFRSHgpaZaM.zYTAC1LOOuphuZXfmIXcjNcxhSt6ZpFYwxhWjgka', NULL, '2022-05-30 09:49:29', '2022-06-07 04:01:59', 100, '12344235', 0, 'imgProducts/minh/avatar/123_1654599719.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 3, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `chapters_product_id_foreign` (`product_id`);

--
-- Indexes for table `chapter_sell`
--
ALTER TABLE `chapter_sell`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chapter_id` (`chapter_id`),
  ADD KEY `chapter_sell_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_author_id_foreign` (`author_id`);

--
-- Indexes for table `product_post`
--
ALTER TABLE `product_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_post_product_id_foreign` (`product_id`),
  ADD KEY `product_post_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chapter_sell`
--
ALTER TABLE `chapter_sell`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_post`
--
ALTER TABLE `product_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `chapter_sell`
--
ALTER TABLE `chapter_sell`
  ADD CONSTRAINT `chapter_sell_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chapter_sell_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_post`
--
ALTER TABLE `product_post`
  ADD CONSTRAINT `product_post_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
