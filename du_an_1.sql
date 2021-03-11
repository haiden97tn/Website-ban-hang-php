-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 04:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_banner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `images`, `name_banner`, `link`, `location`) VALUES
(2, '637350328978976361_H5_1200x200.jpg', 'Anh 1', 'https://www.thegioididong.com/', 'vitri1'),
(3, '637359793287085349_A21s-H5-2x.jpg', 'Anh 2', 'https://www.thegioididong.com/', 'vitri2'),
(5, '637353340097268703_Vsmart-DocQuyen-C3-2X.jpg', 'Anh 4', 'https://www.thegioididong.com/', 'vitri4'),
(6, '637350860486886895_A53-C3-2x.jpg', 'Anh 3', 'https://www.thegioididong.com/', 'vitri3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `careate_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `images`, `careate_at`) VALUES
(13, 'Laptop', 'laptop.png', '2020-10-03 00:50:10'),
(18, 'Điện Thoại', 'dien-thoai.png', '2020-10-03 00:50:31'),
(24, 'Tablet', 'tablet.png', '2020-10-03 00:52:21'),
(25, 'Đồng Hồ', 'smart-watch.png', '2020-10-03 00:52:38'),
(28, 'Phụ Kiện', 'op-lung.png', '2020-10-05 09:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_products` int(11) NOT NULL,
  `user` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comments`, `content`, `id_products`, `user`, `create_at`) VALUES
(7, 'làm sao', 11, 'anhvinh', '2020-10-16 10:50:32'),
(8, 'sản phẩm này còn không ạ', 11, 'anhvinh', '2020-10-16 10:50:51'),
(10, 'mình muốn mua sp này ', 12, 'anhvinh', '2020-10-16 12:09:12'),
(11, 'xin lỗi', 11, 'anhvinh', '2020-10-17 00:46:00'),
(12, 'gooog', 8, 'haha', '2020-10-17 00:50:59'),
(13, 'alo', 11, 'anhvinh', '2020-11-25 13:45:54'),
(14, 'tỵykuy', 20, 'khach1', '2020-12-03 08:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `logo`, `address`, `email`, `phone`) VALUES
(2, 'Logo.png', 'Số 20-Đường Lê Đức Thọ-Mỹ Đình 2-Hà Nôi', 'vinhtqph10231@fpt.edu.vn', '0368666407');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `images`, `create_at`) VALUES
(6, 'Lý do vì sao chip Apple có hiệu năng cực kỳ mạnh mẽ', 'Hôm nay, Apple đã công bố SoC M1 hoàn toàn mới. Đây là chipset đầu tiên do “Táo khuyết” ...', '637406558119719890_macbook-air-cover.jpg', '2020-11-19 15:16:08'),
(7, 'Realme 15 công bố giá bán tại Việt Nam', 'Hôm nay Realme chính thức ra mắt Realme  C15. Ngoài ra, CEO Realme Việt Nam cũng  có mặt để gặp gỡ, giao lưu....', '637407937276587177_thumb.jpg', '2020-11-20 13:35:33'),
(8, 'Thiết kế phụ kiên  AirTag sắp được  ra mắt.', 'Hôm nay, Apple đã công bố SoC M1  hoàn toàn mới. Đây là chipset đầu tiên do  “Táo khuyết” ...', '637406144705879245_airtags-cover.jpeg', '2020-11-20 13:59:05'),
(10, 'Đánh giá Samsung Galaxy A51: Chỉ là chiếc smartphone đầy đủ chức năng', '<h2>M&agrave;n h&igrave;nh Galaxy A51</h2>\r\n\r\n<p>Samsung Galaxy A51 c&oacute; m&agrave;n h&igrave;nh 6.5 inch Super AMOLED, điểm ảnh 405 ppi, chiếm 87.4 tỷ lệ m&aacute;y v&agrave; c&oacute; khung h&igrave;nh 20:9. M&agrave;n h&igrave;nh s&aacute;ng v&agrave; cho m&agrave;u sắc hiển thị sống động, điều n&agrave;y c&oacute; nghĩa A51 sử dụng thoải m&aacute;i ngo&agrave;i trời, dưới điều kiện &aacute;nh s&aacute;ng lớn. Tuy nhi&ecirc;n, chế độ tự động chỉnh độ s&aacute;ng tr&ecirc;n Galaxy A51 hoạt động kh&ocirc;ng được trơn tru lắm. Đ&ocirc;i khi &aacute;nh s&aacute;ng cứ tự động chỉnh m&agrave; kh&ocirc;ng li&ecirc;n quan đến điều kiện b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p><img alt=\"Màn hình hiển thị tốt của Galaxy A51\" src=\"https://st.quantrimang.com/photos/image/2020/07/09/danh-gia-samsung-galaxy-a51-1.jpg\" style=\"height:400px; width:600px\" /></p>\r\n\r\n<p>M&agrave;n h&igrave;nh hiển thị tốt của Galaxy A51</p>\r\n\r\n<h2>Thiết kế v&agrave; khối lượng của Galaxy A51</h2>\r\n\r\n<p>Thiết kế của Galaxy A51 kh&ocirc;ng hẳn nổi bật. Tuy nhi&ecirc;n, nếu cầm tr&ecirc;n tay chiếc m&aacute;y lần đầu ti&ecirc;n, chắc chắn bạn sẽ cảm thấy được điều kh&aacute;c biệt. Chiếc m&aacute;y chỉ nặng 172g, m&agrave; trong đ&oacute; đ&atilde; t&iacute;nh cả vi&ecirc;n pin 4000 mAh.</p>\r\n\r\n<p><img alt=\"Máy có thiết kế nhẹ và khá bắt mắt \" src=\"https://st.quantrimang.com/photos/image/2020/07/09/danh-gia-samsung-galaxy-a51-2.jpg\" style=\"height:338px; width:600px\" /></p>\r\n\r\n<p>M&aacute;y c&oacute; thiết kế nhẹ v&agrave; kh&aacute; bắt mắt</p>\r\n\r\n<p>Mặt sau của thiết bị được tr&aacute;ng b&oacute;ng. Phần viền m&aacute;y nh&igrave;n thấy giống k&iacute;nh nhưng sờ v&agrave;o lại c&oacute; cảm gi&aacute;c như nhựa (tất nhi&ecirc;n kh&ocirc;ng phải loại nhựa rẻ tiền). Chất liệu n&agrave;y được Samsung gọi l&agrave; &ldquo;glasstic&rdquo;. Tuy được tr&aacute;ng b&oacute;ng nhưng Galaxy A51 chống xước kh&aacute; tốt.</p>\r\n\r\n<h2>Camera của Galaxy A51</h2>\r\n\r\n<p>Samsung Galaxy A51 được trang bị một camera ch&iacute;nh 48MP, khẩu f/2.0, đi c&ugrave;ng với một ống k&iacute;nh g&oacute;c si&ecirc;u rộng 12MP khẩu f2.2, một lens g&oacute;c rộng f/2.4 v&agrave; một cảm biến s&acirc;u để chụp ch&acirc;n dung 5MP f/2.2. Camera selfie 32MP, chụp ổn nếu tắt chế độ beauty đi.</p>\r\n\r\n<p>Nếu chụp ảnh ban ng&agrave;y, thiết bị cho chất lượng ảnh tốt, c&acirc;n bằng m&agrave;u sắc ổn. Ảnh giữ được kh&aacute; nhiều chi tiết tự nhi&ecirc;n. Chế độ chụp ch&acirc;n dung tr&ecirc;n m&aacute;y cũng cho chất lượng tốt, phần viền v&agrave; phần bị l&agrave;m mờ đi ch&iacute;nh x&aacute;c, tr&ocirc;ng bức ảnh kh&aacute; tự nhi&ecirc;n.</p>\r\n\r\n<p><img alt=\"Cụm camera cho chất lượng ảnh chụp ban ngày khá tốt \" src=\"https://st.quantrimang.com/photos/image/2020/07/09/danh-gia-samsung-galaxy-a51-3.jpg\" style=\"height:338px; width:600px\" /></p>\r\n\r\n<p>Cụm camera cho chất lượng ảnh chụp ban ng&agrave;y kh&aacute; tốt</p>\r\n\r\n<p>Galaxy A51 c&oacute; thể quay video chất lượng 2160p ở tốc độ 30fps v&agrave; 1080p ở tốc độ l&ecirc;n đến 120fps. Chất lượng video v&agrave; m&agrave;u sắc ổn, khả năng ổn định ảnh cũng tương đối tốt.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, camera A51 gặp kh&oacute; khăn khi chụp ảnh ở điều kiện &aacute;nh s&aacute;ng yếu (chẳng hạn như khi chụp trời tối). Ảnh chụp bằng cam trước rất nhiễu v&agrave; &iacute;t m&agrave;u sắc. Cụm cam sau chụp ổn hơn nhưng vẫn kh&ocirc;ng phải qu&aacute; xuất sắc.</p>\r\n\r\n<h2>Phần cứng v&agrave; hiệu năng của Galaxy A51</h2>\r\n\r\n<p>Samsung Galaxy A51 được trang bị bộ vi xử l&yacute; Exynos 9611 10 nm, RAM 6GB v&agrave; dung lượng 128GB.</p>\r\n\r\n<p>Hiệu năng n&agrave;y đủ sử dụng cho c&aacute;c t&aacute;c vụ th&ocirc;ng thường như d&ugrave;ng mạng x&atilde; hội, xem video hoặc gửi email. Nếu muốn chơi game, h&atilde;y sử dụng c&agrave;i đặt m&aacute;y tầm trung. Với một số tựa game nặng như Asphalt 9, thiết bị c&oacute; hiện tượng bị giật lag kh&aacute; nhiều.</p>\r\n\r\n<h2>Phần mềm v&agrave; thời lượng pin của Galaxy A51</h2>\r\n\r\n<p>Galaxy A51 sở hữu vi&ecirc;n pin 4000 mAh. Trong hộp, bạn sẽ được tặng k&egrave;m củ sạc nhanh 15W, gi&uacute;p sạc m&aacute;y của bạn từ 0 đến 45% chỉ trong 40 ph&uacute;t.</p>\r\n\r\n<p>Nếu sạc đầy, thiết bị c&oacute; thể sử dụng được xấp xỉ 2 ng&agrave;y với những t&aacute;c vụ đơn giản.</p>\r\n\r\n<p>Galaxy A51 chạy hệ điều h&agrave;nh&nbsp;<a href=\"https://quantrimang.com/one-ui-cho-android-170464\">One UI</a>&nbsp;2.0 dựa tr&ecirc;n Android 10, c&oacute; c&ocirc;ng nghệ bảo mật Samsung Knox. Thiết bị cũng được hỗ trợ Samsung Pay, cho ph&eacute;p bạn li&ecirc;n kết thẻ ng&acirc;n h&agrave;ng, ấn v&agrave; trả tiền ở những nơi c&oacute; cho ph&eacute;p phương thức thanh to&aacute;n n&agrave;y.</p>\r\n\r\n<h2>Tổng kết</h2>\r\n\r\n<p>Samsung Galaxy A51 c&oacute; thiết kế ổn, đặc biệt l&agrave; m&agrave;u xanh. Camera chụp ban ng&agrave;y cho chất lượng tốt. Thời lượng pin ấn tượng v&agrave; c&oacute; khả năng sạc nhanh.</p>\r\n\r\n<p>Hiệu năng của A51 vừa đủ, cho ph&eacute;p l&agrave;m việc ổn v&agrave; trải nghiệm chơi game ở mức trung b&igrave;nh. Phần mềm UI tr&ecirc;n A51 chạy mượt m&agrave;.</p>\r\n\r\n<p>Gi&aacute; b&aacute;n của sản phẩm: 6.6 triệu đồng&nbsp;</p>\r\n', 'danh-gia-samsung-galaxy-a51-1.jpg', '2020-11-30 14:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `user` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `date_set` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `user`, `amount`, `total`, `date_set`) VALUES
(119, 'khach1', 2, 21890000, '2020-12-04 00:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_details` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_details`, `id_products`, `id_order`, `price`, `quantity`) VALUES
(148, 10, 119, 21900000, 1),
(149, 12, 119, 3900000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name_products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `detal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `introduce` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `name_products`, `images`, `price`, `sale`, `detal`, `view`, `id_category`, `create_at`, `introduce`) VALUES
(8, 'Samsung Galaxy Note 20 Ultra', 'anh2.jpg', 29990000, 0, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 89, 18, '2020-12-03 15:20:51', ''),
(9, 'OPPO Reno4', '637341201120370331_oppo-reno4-tim-dd-st.jpg', 8490000, 8190000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 35, 18, '2020-12-03 15:21:21', ''),
(10, 'iPhone 11 64GB', 'anh4.jpg', 21900000, 17990000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 301, 18, '2020-12-04 00:30:20', ''),
(11, 'iPhone 11 Pro 512GB', 'anh3.jpg', 40000000, 35590000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 319, 18, '2020-12-03 15:26:40', ''),
(12, 'Vsmart Live 4GB-64GB', '637338628162509015_vsmart-live-4gb-dq.jpg', 3900000, 0, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 128, 18, '2020-12-04 00:29:55', ''),
(13, 'Samsung Galaxy A21s', '637267175905189165_SaS-A21s-den-dd.jpg', 3990000, 0, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 6, 18, '2020-12-03 15:02:43', ''),
(14, 'Vivo Y91 6GB-128GB', '637076224208985186_vivo-y19-dd.jpg', 4990000, 4790000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 4, 18, '2020-12-03 14:02:12', ''),
(15, 'Samsung Galaxy A51', '637315469884239128_ss-a51-inoxbac-dd.jpg', 7900000, 6900000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 2, 18, '2020-12-03 14:02:24', ''),
(16, 'MacBook Air 13', '636688207026520043_mabookair-1o.jpg', 19990000, 0, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 14, 13, '2020-12-03 15:02:53', ''),
(17, 'HP 15s-fq1107TU i3 <br>1005G1/4GB/256GB SSD/WIN10', '637221317214614959_lenovo-ideapad-s145-bac-dd.jpg', 11990000, 11340000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 13, 13, '2020-12-03 14:02:51', ''),
(18, 'Lenovo IdeaPad S145-15API R5 3500U/8GB/512GB SSD/WIN10', '637266923419786995_hp-15s-fq-bac-dd.jpg', 10690000, 10140000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 4, 13, '2020-12-03 14:03:06', ''),
(20, 'Asus VivoBook M413IA-EK480T R5-4500U/8GB/512GB <br> SSD/Win10', '637287832326544795_asus-vivobook-m413-bac-dd.jpg', 15590000, 14990000, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-amoled-la-gi-905766\" target=\"_blank\">AMOLED</a>, 6.43&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd\" target=\"_blank\">Full HD+</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224\" target=\"_blank\">Android 10</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera sau:</td>\r\n			<td>Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 2 MP, 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera trước:</td>\r\n			<td>Ch&iacute;nh 16 MP &amp; Phụ 2 MP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU:</td>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-di-dong-mediatek-helio-p95-8-nhan-1252877\" target=\"_blank\">MediaTek Helio P95 8 nh&acirc;n</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a></td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong:</td>\r\n			<td>128 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thẻ nhớ:</td>\r\n			<td><a href=\"https://www.thegioididong.com/the-nho-dien-thoai\" target=\"_blank\">MicroSD, hỗ trợ tối đa 256 GB</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng pin:</td>\r\n			<td>4000 mAh, c&oacute; sạc nhanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 25, 13, '2020-12-03 14:03:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_slide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `images`, `name_slide`, `link`, `stt`, `create_at`) VALUES
(1, 'blackfriday-banner-1920.jpg', 'banner_fpt1', 'http://teamorepoly.vnn.mn/', 3, '2020-10-05 10:40:35'),
(2, 'slider3.jpg', 'banner_caodang_fpt', 'https://fpt.vn/vi', 1, '2020-10-02 14:34:35'),
(3, 'slider.png', 'banner_fpt202', 'http://teamorepoly.vnn.mn/', 2, '2020-10-03 00:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id_support` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id_support`, `title`, `content`, `full_name`, `email`, `phone`, `create_at`) VALUES
(1, 'lOI DIEN THOAI', 'ABC', 'NGUYEN HAI', 'HAI@GMAIL.COM', '0123123123', '2020-12-03 07:22:33'),
(3, 'Đánh giá Samsung Galaxy A51: Chỉ là chiếc smartphone đầy đủ chức năng', 'ABC', 'aaaa', 'honghaigttn123@gmail.com', '0562515645', '2020-12-03 07:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permission` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `passwd`, `ho_ten`, `email`, `create_at`, `permission`, `active`, `user_address`, `user_phone`) VALUES
('anhvinh', '1d562f43b16b744f1b8d066bb28c45e4', '', 'vinhtqpg10231@gmail.com', '2020-11-26 02:26:44', 0, 1, 'Ninh Bình', 123456789),
('haha', '4e4d6c332b6fe62a63afe56171fd3725', '', 'anhvinh@gmail.com', '2020-10-10 01:19:00', 1, 1, '', 0),
('khach1', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hồng Sơn', 'haiden97tn@gmail.com', '2020-12-01 08:52:32', 1, 1, 'Hà Nội', 123456789),
('khach2', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hồng Sơn', 'honghaigttn123@gmail.com', '2020-12-01 05:20:49', 1, 1, 'Đà Nẵng', 989012312);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `fk_cm_pd` (`id_products`),
  ADD KEY `fk_cm_user` (`user`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_user_order` (`user`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_details`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `fk_pd_order` (`id_products`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `fk_pd_cg` (`id_category`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id_support`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id_support` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_cm_pd` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  ADD CONSTRAINT `fk_cm_user` FOREIGN KEY (`user`) REFERENCES `user` (`user`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user`) REFERENCES `user` (`user`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_pd_order` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  ADD CONSTRAINT `id_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_pd_cg` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
