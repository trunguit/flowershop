-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 03:35 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_flower`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `publish_at` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `category_id`, `name`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `publish_at`, `type`) VALUES
(4, 2, 'Liverpool chỉ được nâng Cup phiên bản nếu vô địch hôm nay', '<p>Đội b&oacute;ng th&agrave;nh phố cảng sẽ kh&ocirc;ng n&acirc;ng Cup nguy&ecirc;n bản nếu vượt mặt Man City ở v&ograve;ng cuối Ngoại hạng Anh.</p>\r\n\r\n<p>Liverpool k&eacute;m Man City một điểm trước khi tiếp Wolverhampton tr&ecirc;n s&acirc;n nh&agrave; Anfield v&agrave;o ng&agrave;y Chủ Nhật. Ở trận đấu c&ugrave;ng giờ, Man City sẽ l&agrave;m kh&aacute;ch tới s&acirc;n Brighton v&agrave; biết một chiến thắng sẽ gi&uacute;p họ bảo vệ th&agrave;nh c&ocirc;ng ng&ocirc;i v&ocirc; địch. Kể từ khi c&aacute;c trận v&ograve;ng cuối Ngoại hạng Anh sẽ chơi đồng loạt c&ugrave;ng l&uacute;c, ban tổ chức phải đặt một chiếc cup phi&ecirc;n bản giống thật tại Anfield ph&ograve;ng trường hợp Liverpool v&ocirc; địch. Chiếc cup giả n&agrave;y thường được d&ugrave;ng trong c&aacute;c sự kiện quảng b&aacute; của Ngoại hạng Anh.&nbsp;</p>', 'active', 'L3Yuzln8II.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-04-29', 'featured'),
(5, 2, 'Bottas giành pole chặng thứ ba liên tiếp', '<p>Tay đua Phần Lan đ&aacute;nh bại đồng đội Lewis Hamilton ở v&ograve;ng ph&acirc;n hạng GP T&acirc;y Ban Nha h&ocirc;m 11/5.</p>\r\n\r\n<p>Valtteri Bottas nhanh hơn Hamilton 0,634 gi&acirc;y v&agrave; nhanh hơn người về thứ ba&nbsp;Sebastian Vettel 0,866 gi&acirc;y. Tay đua của Red Bull&nbsp;Max Verstappen nhanh thứ tư, trong khi&nbsp;Charles Leclerc về thứ năm.</p>', 'active', 'iQ1RXPioFZ.jpeg', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-04-28', 'featured'),
(6, 2, 'HLV Cardiff: \'Man Utd sẽ không vô địch trong 10 năm tới\'', '<p>Neil Warnock tỏ ra nghi ngờ về tương lai của Man Utd dưới thời HLV Solskjaer.</p>\r\n\r\n<p>&quot;Một số người nghĩ Man Utd cần từ hai đến ba kỳ chuyển nhượng nữa để gi&agrave;nh danh hiệu&quot;, HLV Neil Warnock chia sẻ. &quot;T&ocirc;i th&igrave; nghĩ c&oacute; thể l&agrave; 10 năm. T&ocirc;i kh&ocirc;ng thấy học&oacute; khả năng bắt kịp hai CLB h&agrave;ng đầu trong khoảng bốn hay năm năm tới&quot;.</p>\r\n\r\n<p>Lần cuối Man Utd v&ocirc; địch l&agrave; m&ugrave;a 2012-2013 dưới thời HLV Sir Alex Ferguson. Kể từ đ&oacute; đến nay, &quot;Quỷ đỏ&quot; kh&ocirc;ng c&ograve;n duy tr&igrave; được vị thế ứng cử vi&ecirc;n v&ocirc; địch h&agrave;ng đầu.&nbsp;</p>', 'active', 'ReChSfB95C.jpeg', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-30', 'featured'),
(7, 3, 'Đại học Anh đưa khóa học hạnh phúc vào chương trình giảng dạy', '<p>Kh&oacute;a học diễn ra trong 12 tuần, sinh vi&ecirc;n năm nhất Đại học Bristol sẽ được kh&aacute;m ph&aacute; hạnh ph&uacute;c l&agrave; g&igrave; v&agrave; l&agrave;m thế n&agrave;o để đạt được n&oacute;.</p>\r\n\r\n<p>Đại học Bristol (Anh) quyết định đưa kh&oacute;a học hạnh ph&uacute;c v&agrave;o giảng dạy từ th&aacute;ng 9 năm nay nhằm giảm thiểu t&igrave;nh trạng tự tử ở sinh vi&ecirc;n, sau khi 12 sinh vi&ecirc;n ở một trường kh&aacute;c quy&ecirc;n sinh trong ba năm qua. Gi&aacute;o sư Bruce Hood, nh&agrave; t&acirc;m l&yacute; học chuy&ecirc;n nghi&ecirc;n cứu về c&aacute;ch thức hoạt động của bộ n&atilde;o v&agrave; con người, sẽ giảng dạy m&ocirc;n học mới n&agrave;y.</p>', 'active', 'hoyOyXJrzx.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-05', 'featured'),
(8, 6, '11 cách đơn giản dạy trẻ quản lý thời gian', '<p>Phụ huynh h&atilde;y tạo cảm gi&aacute;c vui vẻ, hướng dẫn trẻ thiết lập những ưu ti&ecirc;n h&agrave;ng ng&agrave;y để ch&uacute;ng c&oacute; thể tự quản l&yacute; thời gian hiệu quả.</p>\r\n\r\n<p>&quot;Nhanh l&ecirc;n&quot;, &quot;Con c&oacute; biết mấy giờ rồi kh&ocirc;ng&quot;, &quot;Điều g&igrave; l&agrave;m con mất nhiều thời gian như vậy&quot;..., l&agrave; những c&acirc;u n&oacute;i quen thuộc của phụ huynh để nhắc nhở con về kh&aacute;i niệm thời gian. Thay v&igrave; n&oacute;i những c&acirc;u tr&ecirc;n, phụ huynh c&oacute; thể dạy con c&aacute;ch quản l&yacute; giờ giấc ngay từ khi ch&uacute;ng c&ograve;n nhỏ.</p>', 'active', 'Phe2pSOC5Q.jpeg', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-07-30', 'normal'),
(9, 4, 'Vì sao không hút thuốc vẫn bị ung thư phổi?', '<p>D&ugrave; kh&ocirc;ng h&uacute;t thuốc, bạn vẫn c&oacute; nguy cơ ung thư phổi do h&iacute;t phải kh&oacute;i thuốc, tiếp x&uacute;c với kh&iacute; radon hoặc sống trong m&ocirc;i trường &ocirc; nhiễm.&nbsp;</p>\r\n\r\n<p>Người kh&ocirc;ng h&uacute;t thuốc vẫn c&oacute; thể bị ung thư phổi.&nbsp;Tr&ecirc;n&nbsp;<em>Journal of the Royal Society of Medicine</em>,&nbsp;c&aacute;c nh&agrave; khoa học từ&nbsp;Hiệp hội Ung thư Mỹ cho biết 20% bệnh nh&acirc;n ung thư phổi kh&ocirc;ng bao giờ h&uacute;t thuốc.&nbsp;Nghi&ecirc;n cứu 30 năm tr&ecirc;n 1,2 triệu người của tổ chức n&agrave;y cũng chỉ ra số người kh&ocirc;ng h&uacute;t thuốc bị ung thư phổi đang gia tăng. Hầu hết bệnh nh&acirc;n chỉ được chẩn đo&aacute;n khi đ&atilde; bước sang giai đoạn nghi&ecirc;m trọng kh&ocirc;ng thể điều trị.&nbsp;</p>', 'active', 'tPa7bgOesm.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-08-30', 'normal'),
(10, 5, '10 hãng hàng không  tốt nhất thế giới năm 2019', '<p>Qatar l&agrave; quốc gia duy nhất tr&ecirc;n thế giới c&oacute; h&atilde;ng h&agrave;ng kh&ocirc;ng v&agrave; s&acirc;n bay tốt nhất năm 2019.</p>\r\n\r\n<p>C&aacute;c s&acirc;n bay được đ&aacute;nh gi&aacute; dựa tr&ecirc;n 3 yếu tố: hiệu suất đ&uacute;ng giờ, chất lượng dịch vụ, thực phẩm v&agrave; lựa chọn mua sắm. Yếu tố đầu ti&ecirc;n chiếm 60% số điểm, hai ti&ecirc;u ch&iacute; c&ograve;n lại chiếm 20%. Dữ liệu của AirHelp được dựa tr&ecirc;n thống k&ecirc; từ nhiều nh&agrave; cung cấp thương mại, c&ugrave;ng cơ sở dữ liệu đ&aacute;nh gi&aacute; ri&ecirc;ng v&agrave; 40.000 khảo s&aacute;t h&agrave;nh kh&aacute;ch được thu thập từ hơn 40 quốc gia trong năm 2018.</p>', 'active', '8GlYE3KYtZ.png', '2019-05-04 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-09-30', 'normal'),
(11, 6, 'Phát hiện bụt mọc cổ thụ hơn 2.600 tuổi ở Mỹ', '<p>Ph&aacute;t hiện mới gi&uacute;p bụt mọc trở th&agrave;nh một trong những c&acirc;y sinh sản hữu t&iacute;nh gi&agrave; nhất thế giới, vượt xa ước t&iacute;nh trước đ&acirc;y của c&aacute;c chuy&ecirc;n gia.</p>\r\n\r\n<p>C&aacute;c nh&agrave; khoa học ph&aacute;t hiện một c&acirc;y bụt mọc &iacute;t nhất đ&atilde; 2.624 tuổi ở v&ugrave;ng đầm lầy s&ocirc;ng Black, bang Bắc Carolina, Mỹ, theo nghi&ecirc;n cứu đăng tr&ecirc;n tạp ch&iacute;&nbsp;<em>Environmental Research Communications</em>&nbsp;h&ocirc;m 9/5.&nbsp;</p>\r\n\r\n<p>Nh&oacute;m nghi&ecirc;n cứu bắt gặp bụt mọc cổ thụ n&agrave;y trong l&uacute;c nghi&ecirc;n cứu v&ograve;ng tuổi của c&acirc;y để t&igrave;m hiểu về lịch sử kh&iacute; hậu tại miền đ&ocirc;ng nước Mỹ. Ngo&agrave;i thể hiện tuổi thọ, độ rộng v&agrave; m&agrave;u sắc của v&ograve;ng tuổi tr&ecirc;n th&acirc;n c&acirc;y c&ograve;n cho biết mức độ ẩm ướt hay kh&ocirc; hạn của năm tương ứng.</p>', 'active', 'a09zB7BiwV.jpeg', '2019-05-12 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-12', 'normal'),
(12, 7, 'Apple có thể không nâng cấp iOS 13 cho iPhone SE, 6', '<p>Những mẫu iPhone ra mắt từ 2014 v&agrave; iPhone SE c&oacute; thể kh&ocirc;ng được l&ecirc;n đời hệ điều h&agrave;nh iOS 13 ra mắt th&aacute;ng 6 tới.</p>\r\n\r\n<p>Theo&nbsp;<em>Phone Arena</em>, hệ điều h&agrave;nh iOS 13 sắp tr&igrave;nh l&agrave;ng tại hội nghị WWDC 2019 sẽ kh&ocirc;ng hỗ trợ một loạt iPhone đời cũ của Apple. Trong đ&oacute;, đ&aacute;ng ch&uacute; &yacute; l&agrave; c&aacute;c mẫu iPhone vẫn c&ograve;n được nhiều người d&ugrave;ng sử dụng như iPhone 6, 6s Plus hay SE.&nbsp;</p>', 'active', '9jOZGc7BJK.png', '2019-05-12 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'normal'),
(13, 8, 'Hình dung về Honda Jazz thế hệ mới', '<p>Thế hệ thứ tư của mẫu hatchback Honda tiết chế bớt những đường n&eacute;t g&acirc;n guốc, thể thao để thay bằng n&eacute;t trung t&iacute;nh, hợp mắt người d&ugrave;ng hơn.&nbsp;</p>\r\n\r\n<p>Những h&igrave;nh ảnh đầu ti&ecirc;n về Honda Jazz (Fit tại Nhật Bản) thế hệ mới bắt đầu xuất hiện tr&ecirc;n đường thử. D&ugrave; chưa phải thiết kế ho&agrave;n chỉnh, thay đổi của mẫu hatchback cỡ B cho thấy những đường n&eacute;t trung t&iacute;nh m&agrave; xe sắp sở hữu. Điều n&agrave;y tr&aacute;i ngược với tạo h&igrave;nh g&acirc;n guốc, thể thao ở thế hệ thứ ba hiện tại của Jazz.&nbsp;</p>', 'active', 'g2c7mYXBPW.png', '2019-05-12 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-12', 'normal'),
(14, 2, 'Hà Nội vào vòng knock-out AFC Cup', '<p>ĐKVĐ V-League đ&aacute;nh bại&nbsp;Tampines Rovers 2-0 v&agrave;o chiều 15/5 để đứng đầu bảng F.</p>\r\n\r\n<p>Tiếp đối thủ đến từ Singapore trong t&igrave;nh thế buộc phải thắng để tự quyết v&eacute; đi tiếp, H&agrave; Nội đ&atilde; c&oacute; trận đấu dễ d&agrave;ng. C&oacute; thể n&oacute;i, kết quả của trận đấu được định đoạt trong hiệp một khi Oseni v&agrave; Th&agrave;nh Chung lần lượt ghi b&agrave;n cho đội chủ nh&agrave;. Trong khi đ&oacute;, Tampines Rovers phải trả gi&aacute; cho lối chơi th&ocirc; bạo khi Yasir Hanapi nhận thẻ v&agrave;ng thứ hai rời s&acirc;n. Tiền vệ n&agrave;y bị trừng phạt bởi pha đ&aacute;nh nguội với Th&agrave;nh Chung ở đầu trận, sau đ&oacute; l&agrave; t&igrave;nh huống phạm lỗi &aacute;c &yacute; với Đ&igrave;nh Trọng.</p>', 'active', 'e7YyFZJCc8.jpeg', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'featured'),
(15, 2, 'Man City vẫn dự Champions League mùa 2019-2020', '<p>Việc điều tra vi phạm luật c&ocirc;ng bằng t&agrave;i ch&iacute;nh của chủ s&acirc;n Etihad chưa thể ho&agrave;n th&agrave;nh trong v&ograve;ng một năm tới.</p>\r\n\r\n<p><em>Sports Mail</em>&nbsp;(Anh)&nbsp;cho biết, &aacute;n phạt cấm tham dự Champions League một m&ugrave;a với Man City, do vi phạm luật c&ocirc;ng bằng t&agrave;i ch&iacute;nh (FFP), chỉ được đưa ra sớm nhất v&agrave;o m&ugrave;a 2020-2021.</p>\r\n\r\n<p>Trong bức thư ngỏ gửi tới truyền th&ocirc;ng Anh, Man City viết: &quot;Ch&uacute;ng t&ocirc;i hợp t&aacute;c một c&aacute;ch thiện ch&iacute; với Tiểu ban kiểm so&aacute;t t&agrave;i ch&iacute;nh c&aacute;c CLB của UEFA (CFCB). CLB tin tưởng v&agrave;o sự độc lập v&agrave; cam kết của CFCB h&ocirc;m 7/3, rằng sẽ kh&ocirc;ng kết luận g&igrave; trong thời gian điều tra&quot;.</p>', 'active', 'exzJEG4WDU.jpeg', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'featured'),
(16, 2, 'Những câu đố giúp rèn luyện trí não', '<p>Bạn cần quan s&aacute;t, suy luận logic v&agrave; c&oacute; vốn từ vựng tiếng Anh để giải quyết những c&acirc;u đố dưới đ&acirc;y.</p>\r\n\r\n<p>C&acirc;u 1:&nbsp;Mike đến một buổi phỏng vấn xin việc. Anh đ&atilde; g&acirc;y ấn tượng với gi&aacute;m đốc về những kỹ năng v&agrave; kinh nghiệm của m&igrave;nh. Tuy nhi&ecirc;n, để quyết định c&oacute; nhận Mike hay kh&ocirc;ng, nữ gi&aacute;m đốc đưa ra một c&acirc;u đố h&oacute;c b&uacute;a v&agrave; y&ecirc;u cầu Mike trả lời trong 30 gi&acirc;y.</p>\r\n\r\n<p>Nội dung c&acirc;u đố: H&atilde;y đưa ra 30 từ tiếng Anh kh&ocirc;ng c&oacute; chữ &quot;a&quot; xuất hiện trong đ&oacute;?&nbsp;</p>\r\n\r\n<p>Mike dễ d&agrave;ng giải quyết c&acirc;u đố. Theo bạn anh ấy n&oacute;i những từ tiếng Anh n&agrave;o để kịp trả lời trong 30 gi&acirc;y?</p>', 'active', 'TpcocqUjob.png', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'featured'),
(17, 4, 'Cách nhận biết mật ong nguyên chất và pha trộn', '<p>Mật ong nguy&ecirc;n chất sẽ kh&ocirc;ng thấm qua tờ giấy, lắng xuống đ&aacute;y ly nước v&agrave; bị kiến ăn, kh&aacute;c với mật ong bị pha trộn tạp chất.</p>\r\n\r\n<p>Dược sĩ V&otilde; H&ugrave;ng Mạnh, Trưởng khoa Dược Bệnh viện Y học d&acirc;n tộc cổ truyền B&igrave;nh Định, cho biết thị trường c&oacute; nhiều loại mật ong bị pha trộn, chỉ nh&igrave;n bề ngo&agrave;i hay ngửi m&ugrave;i chưa chắc ph&acirc;n biệt được.</p>\r\n\r\n<p>Theo dược sĩ H&ugrave;ng, một c&aacute;ch ph&acirc;n biệt thật giả l&agrave; lấy cọng h&agrave;nh tươi nh&uacute;ng v&agrave;o lọ mật ong, lấy ra chừng v&agrave;i ph&uacute;t. Cọng l&aacute; h&agrave;nh sẽ chuyển từ m&agrave;u xanh l&aacute; sang sậm nếu mật ong thật. Ngo&agrave;i ra, c&oacute; thể nhỏ giọt mật v&agrave;o nơi c&oacute; kiến, nếu kiến kh&ocirc;ng bu giọt mật th&igrave; cũng l&agrave; mật ong thật.</p>\r\n\r\n<p>Ng&agrave;y nay, nhiều người đặt mật ong v&agrave;o ngăn đ&aacute; tủ lạnh, sau 24 giờ m&agrave; kh&ocirc;ng c&oacute; hiện tượng đ&ocirc;ng đ&aacute; th&igrave; l&agrave; mật thật.</p>', 'active', 'xvEqmF5uyJ.png', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'normal'),
(18, 5, 'Nhiều tour mùa hè giảm giá hàng chục triệu đồng', '<p>C&aacute;c tour trong v&agrave; ngo&agrave;i nước đều được giảm gi&aacute; mạnh để k&iacute;ch cầu du lịch trong dịp h&egrave;, nhiều chương tr&igrave;nh khuyến m&atilde;i l&ecirc;n đến h&agrave;ng chục triệu đồng.</p>\r\n\r\n<p>Sau khi so s&aacute;nh tiền v&eacute; m&aacute;y bay, ph&ograve;ng kh&aacute;ch sạn ở Bali để chuẩn bị cho kỳ nghỉ h&egrave; của gia đ&igrave;nh, anh Sơn (ngụ quận 2, TP HCM) quyết định chuyển sang mua tour trọn g&oacute;i v&igrave; tiết kiệm hơn.</p>', 'active', 'd2ABCeBzoR.jpeg', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-15', 'featured'),
(19, 8, 'BMW i8 Roadster - xe mui trần dẫn đường ở Formula E', '<p>Dịp cuối tuần qua, BMW giới thiệu chiếc xe dẫn đường, l&agrave;m nhiệm vụ đảm bảo an to&agrave;n tại giải đua xe Formula E. Giải đua tương tự giải F1, nhưng to&agrave;n bộ xe đua sử dụng động cơ điện.</p>\r\n\r\n<p>i8 Roadster Safety Car dựa tr&ecirc;n chiếc i8 Roadster ti&ecirc;u chuẩn, nhưng c&oacute; những thay đổi để trở th&agrave;nh chiếc xe dẫn đường chuy&ecirc;n dụng. Ngoại h&igrave;nh c&oacute; một số đặc điểm ấn tượng hơn so với nguy&ecirc;n bản. K&iacute;nh chắn gi&oacute; kiểu d&agrave;nh cho xe đua, trọng t&acirc;m hạ thấp 15 mm.</p>', 'active', '9fbeUKTBpU.png', '2019-05-15 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-10', 'normal'),
(20, 4, 'Tia cực tím tại Hà Nội ở mức \'nguy hiểm\'', '<p>Chỉ số tia UV tại H&agrave; Nội ng&agrave;y 18-19/5 l&ecirc;n tới 11, mức được đ&aacute;nh gi&aacute; l&agrave; &quot;nguy hiểm&quot; dễ khiến da, mắt bị bỏng nhiệt.</p>\r\n\r\n<p>H&agrave; Nội đang trải qua đợt nắng n&oacute;ng gay gắt. Theo Trung t&acirc;m Dự b&aacute;o Kh&iacute; tượng Thủy văn Quốc gia, nhiệt độ cao nhất ở H&agrave; Nội ng&agrave;y 18/5 dao động trong khoảng 37 đến 39 độ C, c&oacute; nơi tr&ecirc;n 39 độ.&nbsp;Trang&nbsp;<em>World Weather Online</em>&nbsp;của Anh dự b&aacute;o chỉ số tia cực t&iacute;m tại H&agrave; Nội hai ng&agrave;y 18-19/5 đạt mức 11.&nbsp;</p>', 'active', 'C4DtP4ico8.png', '2019-05-17 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-16', 'normal'),
(21, 3, 'Blockchain và trí tuệ nhân tạo AI làm thay đổi giáo dục trực tuyến', '<p>Blockchain khiến dữ liệu trở n&ecirc;n c&ocirc;ng khai, minh bạch với người học, AI gi&uacute;p cải thiện khả năng tương t&aacute;c v&agrave; giảng dạy với từng c&aacute; nh&acirc;n.</p>\r\n\r\n<p>Sự b&ugrave;ng nổ của Internet v&agrave; những c&ocirc;ng nghệ mới như chuỗi khối (Blockchain) v&agrave; tr&iacute; tuệ nh&acirc;n tạo (AI) đ&atilde; g&oacute;p phần l&agrave;m thay đổi nền gi&aacute;o dục tr&ecirc;n to&agrave;n thế giới, h&igrave;nh th&agrave;nh những nền tảng Online Learning với nhiều ưu thế.</p>\r\n\r\n<p><strong>Mobile Learning dự b&aacute;o l&agrave; &quot;Cuộc c&aacute;ch mạng tiếp theo&quot; của gi&aacute;o dục trực tuyến</strong></p>\r\n\r\n<p>Theo nghi&ecirc;n cứu của Global Market Insights, thị trường gi&aacute;o dục trực tuyến to&agrave;n cầu đang c&oacute; tốc độ ph&aacute;t triển nhanh chưa từng thấy khi nền tảng hạ tầng Internet ng&agrave;y c&agrave;ng ho&agrave;n thiện v&agrave; phủ s&oacute;ng rộng khắp. Gi&aacute; trị c&aacute;c start-up về EdTech (C&ocirc;ng ty c&ocirc;ng nghệ chuy&ecirc;n về gi&aacute;o dục) to&agrave;n cầu được ước t&iacute;nh hơn 190 tỷ USD v&agrave;o năm 2018 v&agrave; dự kiến vượt hơn 300 tỷ USD v&agrave;o năm 2025.</p>', 'active', 'gCPGos7mhY.png', '2019-05-17 00:00:00', 'hailan', '2019-05-17 00:00:00', 'hailan', '2019-05-16', 'featured'),
(22, 7, 'Huawei nói lệnh cấm sẽ khiến Mỹ tụt hậu về 5G', '<p>Huawei khẳng định sắc lệnh mới của Mỹ sẽ chỉ c&agrave;ng khiến qu&aacute; tr&igrave;nh triển khai c&ocirc;ng nghệ 5G ở nước n&agrave;y th&ecirc;m chậm chạp v&agrave; đắt đỏ.</p>\r\n\r\n<p>H&atilde;ng c&ocirc;ng nghệ Trung Quốc tự nhận l&agrave; &quot;người dẫn đầu kh&ocirc;ng ai s&aacute;nh kịp về c&ocirc;ng nghệ 5G&quot;, n&ecirc;n việc bị hạn chế kinh doanh ở Mỹ chỉ dẫn đến kết cục l&agrave; Mỹ sẽ bị &quot;tụt lại ph&iacute;a sau&quot; trong việc triển khai c&ocirc;ng nghệ kết nối di động thế hệ mới</p>', 'active', 'nt1QxhKUXM.jpeg', '2019-05-17 00:00:00', 'hailan', NULL, NULL, '2019-05-16', 'value_new'),
(23, 7, 'Asus ra mắt Zenfone 6 với camera lật tự động', '<p>Với thiết kế m&agrave;n h&igrave;nh tr&agrave;n viền ho&agrave;n to&agrave;n kh&ocirc;ng tai thỏ, camera ch&iacute;nh 48 megapixel tr&ecirc;n Zenfone 6 c&oacute; thể lật từ sau ra trước biến th&agrave;nh camera selfie.</p>\r\n\r\n<p>Zenfone 6 l&agrave; một trong những smartphone c&oacute; viền m&agrave;n h&igrave;nh mỏng nhất tr&ecirc;n thị trường với tỷ lệ m&agrave;n h&igrave;nh hiển thị chiếm tới 92% diện t&iacute;ch mặt trước. M&aacute;y c&oacute; m&agrave;n h&igrave;nh 6,4 inch tr&agrave;n viền ra cả bốn cạnh, kh&ocirc;ng tai thỏ như một số mẫu Zenfone trước v&agrave; cũng kh&ocirc;ng d&ugrave;ng thiết kế đục lỗ như Galaxy S10, S10+</p>', 'active', 'aiC6j6fWZY.png', '2019-05-17 00:00:00', 'hailan', '2021-01-21 06:55:53', 'admin', '2019-05-16', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE `article_comment` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_comment`
--

INSERT INTO `article_comment` (`id`, `article_id`, `name`, `email`, `content`, `status`, `time`, `ip_address`, `modified`, `modified_by`, `created`, `created_by`) VALUES
(1, 21, 'nobita1', 'ola1995.01@gmail.com', '11111', 'active', '2021-03-29 15:27:11', '127.0.0.1', NULL, NULL, NULL, NULL),
(2, 21, 'nobita1', 'ola1995.01@gmail.com', 'hay', 'active', '2021-03-29 15:27:44', '127.0.0.1', NULL, NULL, NULL, NULL),
(3, 21, 'nobita1', 'ola1995.01@gmail.com', 'nội dung hay', 'inactive', '2021-03-29 15:37:27', '127.0.0.1', '2021-03-29 00:00:00', 'hailan', NULL, NULL),
(4, 23, 'trung', 'ola1995.09@gmail.com', 'bài viết hay', 'active', '2021-03-29 16:14:58', '127.0.0.1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'radio,select,checkbox',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `name`, `status`, `sort`, `type`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(3, 'test', 'inactive', 0, 'radio', '2021-03-31 00:00:00', 'hailan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `products` text DEFAULT NULL,
  `prices` text DEFAULT NULL,
  `quantities` text DEFAULT NULL,
  `names` text DEFAULT NULL,
  `pictures` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `check_out` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `products`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`, `check_out`, `modified`, `modified_by`) VALUES
('7mXfiYv', NULL, '[19]', '[700000]', '[\"1\"]', '[\"YÊU THƯƠNG DỊU NGỌT\"]', '[\"\\/images\\/product\\/b0266123flower.jpg\"]', 'inactive', '2021-04-05 00:00:00', '{\"name\":\"nobita1\",\"email\":\"ola1995.01@gmail.com\",\"phone\":\"0000000\",\"address\":\"aaa 2\",\"price_ship\":\"\",\"note\":\"aa\"}', NULL, NULL),
('5XMgcoK', NULL, '[19,20]', '[700000,890000]', '[\"2\",\"2\"]', '[\"YÊU THƯƠNG DỊU NGỌT\",\"Kệ chúc mừng 1\"]', '[\"\\/images\\/product\\/b0266123flower.jpg\",\"\\/images\\/product\\/CM0146123flower.jpg\"]', 'inactive', '2021-04-05 00:00:00', '{\"name\":\"created\",\"email\":\"ola1995.09@gmail.com\",\"phone\":\"336775456\",\"address\":\"aaaaaaaaa 1\",\"price_ship\":\"\",\"note\":\"aaa\"}', NULL, NULL),
('ljGkeZY', NULL, '[19]', '[700000]', '[\"3\"]', '[\"YÊU THƯƠNG DỊU NGỌT\"]', '[\"\\/images\\/product\\/b0266123flower.jpg\"]', 'inactive', '2021-04-05 00:00:00', '{\"name\":\"nobita1\",\"email\":\"ola1995.01@gmail.com\",\"phone\":\"0000000\",\"address\":\"69\\/8 đường 120 phường tân phú Quận 2\",\"price_ship\":null,\"note\":\"k có j\"}', NULL, NULL),
('0CUtwgK', NULL, '[19]', '[700000]', '[\"3\"]', '[\"YÊU THƯƠNG DỊU NGỌT\"]', '[\"\\/images\\/product\\/b0266123flower.jpg\"]', 'inactive', '2021-04-05 00:00:00', '{\"name\":\"nobita1\",\"email\":\"ola1995.01@gmail.com\",\"phone\":\"123456\",\"address\":\"69\\/8 đường 120 phường tân phú Quận 2\",\"price_ship\":25000,\"note\":\"aa\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` mediumtext NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `is_home` varchar(45) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `_lft` int(11) DEFAULT NULL,
  `_rgt` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`, `is_home`, `display`, `parent_id`, `_lft`, `_rgt`) VALUES
(2, 'Thể thao', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'yes', 'list', 3, 3, 4),
(3, 'Giáo dục', 'active', '2019-05-04 00:00:00', 'admin', '2021-01-21 06:51:41', 'admin', 'yes', 'grid', 1, 2, 5),
(4, 'Sức khỏe', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:33', 'admin', 'no', 'list', 1, 6, 13),
(5, 'Du lịch', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:30', 'hailan', 'no', 'grid', 4, 7, 10),
(6, 'Khoa học', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'no', 'list', 4, 11, 12),
(7, 'Số hóa', 'active', '2019-05-04 00:00:00', 'admin', '2020-10-18 00:00:00', 'hailan', 'yes', 'list', 5, 8, 9),
(8, 'Xe - Ô tô', 'active', '2019-05-04 00:00:00', 'admin', '2020-10-18 04:21:24', 'hailan', 'yes', 'list', 1, 16, 17),
(9, 'Kinh doanh', 'active', '2019-05-12 00:00:00', 'hailan', '2020-11-23 07:10:00', 'admin', 'yes', 'list', 1, 14, 15),
(1, 'Root', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `cate_product`
--

CREATE TABLE `cate_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `is_home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cate_product`
--

INSERT INTO `cate_product` (`id`, `name`, `thumb`, `slug`, `_lft`, `_rgt`, `parent_id`, `is_home`, `status`, `created`, `created_by`, `modified`, `modified_by`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(36, 'root', NULL, 'root', 1, 78, NULL, 'inactive', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Hoa đám cưới', 't0oePbPmjV.jpeg', 'hoa-dam-cuoi', 72, 73, 36, 'yes', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Hoa sinh nhật', 'IF9jXgZ0TF.jpeg', 'hoa-sinh-nhat', 74, 75, 36, 'yes', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Hoa chúc mừng', 'ZkytbLociw.jpeg', 'hoa-chuc-mung', 76, 77, 36, 'yes', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'inactive',
  `time` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `status`, `time`, `ip_address`) VALUES
(12, 'Nguyễn Văn A', 'nvlinh174test01@gmail.com', '0336405077', 'Đăng ký khóa học', 'inactive', '2020-11-24 04:21:19', '127.0.0.1'),
(13, 'Nguyễn Văn Linh', 'Cwalker.yugo@gmail.com', '0128 802 9048', 'fsdfsdfsd', 'inactive', '2020-11-24 04:24:20', '127.0.0.1'),
(14, 'Nguyễn Văn Linh', 'nvlinh174test01@gmail.com', '0336405077', 'Đăng ký khóa học Laravel', 'inactive', '2020-11-24 06:25:23', '127.0.0.1'),
(15, 'Nguyễn Văn B', 'nvlinh174test01@gmail.com', '0163 640 5077', 'Đăng ký khóa học offline', 'inactive', '2020-11-24 06:26:32', '127.0.0.1'),
(16, 'Nguyễn Văn Linh', 'nvlinh174test01@gmail.com', '123456789', 'Đăng ký khóa Laravel Offline', 'active', '2020-11-24 06:28:14', '127.0.0.1'),
(17, 'Nguyễn Văn A', 'nvlinh174test01@gmail.com', '123456789', 'Đăng ký khóa học Laravel từ xa', 'inactive', '2020-11-24 08:33:41', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `ordering` int(11) DEFAULT 1,
  `link` varchar(255) DEFAULT NULL,
  `type_menu` varchar(255) DEFAULT NULL,
  `type_link` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `status`, `ordering`, `link`, `type_menu`, `type_link`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'Trang chủ', 'active', 1, 'http://proj_flower.com', 'link', 'current', '2020-10-21 00:00:00', 'admin', '2020-11-01 08:57:33', 'admin'),
(3, 'Ảnh đẹp', 'active', 4, 'http://proj_flower.com/thu-vien-hinh-anh', 'link', 'current', '2020-10-21 00:00:00', 'hailan', '2020-11-01 08:57:31', 'admin'),
(4, 'Bài viết', 'active', 2, '/', 'category_article', 'current', '2020-10-21 00:00:00', 'hailan', '2020-11-01 08:57:18', 'admin'),
(5, 'Tin tức tổng hợp', 'inactive', 3, 'http://code-lar-zendvn.test/tin-tuc-tong-hop', 'link', 'new_tab', '2020-10-27 00:00:00', 'hailan', '2020-11-01 08:58:23', 'admin'),
(6, 'Liên hệ', 'active', 5, 'http://proj_flower.com/lien-he', 'link', 'current', NULL, NULL, NULL, NULL),
(7, 'Q&A', 'active', 1, 'http://proj_flower.com/cau-hoi-thuong-gap', 'link', 'current', NULL, NULL, NULL, NULL),
(8, 'Sản phẩm', 'active', 1, '/', 'category_product', 'current', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_rss`
--

CREATE TABLE `news_rss` (
  `id` int(11) NOT NULL,
  `thumb` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pub_date` datetime DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `config` text DEFAULT NULL,
  `sort` int(6) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `image_main` varchar(255) DEFAULT NULL,
  `image_extra` varchar(2000) DEFAULT NULL,
  `price_default` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `status`, `config`, `sort`, `category_id`, `image_main`, `image_extra`, `price_default`, `price_sale`, `content`, `description`, `created`, `created_by`, `modified`, `modified_by`, `date_start`, `date_end`) VALUES
(19, 'YÊU THƯƠNG DỊU NGỌT', 'b0266-yeu-thuong-diu-ngot', 'active', '{\"2\":\"1\"}', 2, 37, '{\"src\":\"\\/images\\/product\\/b0266123flower.jpg\",\"alt\":\"hoa c\\u01b0\\u1edbi 1\"}', '[{\"src\":\"\\/upload\\/1\\/product\\/\\/6065d3caae4f5_b0266123flower.jpg\",\"alt\":\"hoa c\\u01b0\\u1edbi 2\"},{\"src\":\"\\/upload\\/1\\/product\\/6067cb6101001_tinh-yeu-nong-nan350.jpg\",\"alt\":null},{\"src\":\"\\/upload\\/1\\/product\\/6067cb6101001_b0266123flowera.jpg\",\"alt\":null}]', 980000, 700000, '<p>Thiết kế sở hữu sắc hồng nhẹ nh&agrave;ng mang lại cảm gi&aacute;c ngọt ng&agrave;o dịu nhẹ đến người nhận. &nbsp;</p>\r\n\r\n<p>Thiết kế tượng trưng cho những người Phụ Nữ nhẹ nh&agrave;ng, thanh lịch v&agrave; trong s&aacute;ng cũng như t&igrave;nh cảm ngọt ng&agrave;o m&agrave; người gửi muốn trao. 8/3 n&agrave;y, h&atilde;y c&ugrave;ng tạo n&ecirc;n những kỉ niệm ngọt ng&agrave;o với người phụ nữ bạn thương với thiết kế &quot;Y&ecirc;u Thương Dịu Ngọt&quot; của Shop Hoa&nbsp;nh&eacute;!</p>\r\n\r\n<p>​</p>\r\n\r\n<p>B&oacute; hoa 266 bao gồm:</p>\r\n\r\n<ul>\r\n	<li>16 b&ocirc;ng Hồng Ohara hồng</li>\r\n	<li>Baby hồng</li>\r\n</ul>\r\n\r\n<p>Size: 40cm-50cm (ngang-d&agrave;i)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lưu &yacute;: Sản phẩm hoa mẫu chỉ mang t&iacute;nh chất tham khảo.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bởi v&igrave;: một số loại hoa trong mẫu theo m&ugrave;a sẽ kh&ocirc;ng c&oacute; hoặc chất lượng kh&ocirc;ng đảm bảo, do đ&oacute; ch&uacute;ng t&ocirc;i sẽ d&ugrave;ng c&aacute;c loại hoa kh&aacute;c thay thế. Nhưng Shop Hoa đảm bảo định lượng, tone m&agrave;u, kiểu d&aacute;ng cũng như chất lượng hoa tươi đẹp v&agrave; đầy đặn nhất. Bạn sẽ nhận được ảnh ho&agrave;n thiện trước khi ch&uacute;ng t&ocirc;i giao hoa.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'Có khoảng khắc nào hạnh phúc hơn giấy phút chàng nói tiếng tỏ tình? Nếu có chỉ có thể là lúc chàng nói lời cầu hôn, là hạnh phúc vỡ òa. Cảm xúc của cô gái đón nhận tình yêu trong khoảng khắc cầu hôn là cảm ứng cho thiết kế hoa \"Chân Tình\", nồng nàn dịu dàng nghẹn ngào rất riêng , rất đỗi con gái.', '2021-04-01 14:04:31', 'admin', '2021-04-03 01:04:03', 'admin', NULL, NULL),
(20, 'Kệ chúc mừng 1', 'ke-chuc-mung-1', 'active', '{\"2\":\"1\",\"3\":\"1\"}', 1, 39, '{\"src\":\"\\/images\\/product\\/CM0146123flower.jpg\",\"alt\":\"k\\u1ec7 hoa 1\"}', '[{\"src\":\"\\/upload\\/1\\/product\\/\\/6067d3bc7e079_CM0146123flowergg.jpg\",\"alt\":null}]', 1000000, 890000, '<p>Kệ ch&uacute;c mừng 146 bao gồm:</p>\r\n\r\n<ul>\r\n	<li>32 b&ocirc;ng Hồng Ohara hồng giống nhập</li>\r\n	<li>Địa lan v&agrave;ng</li>\r\n	<li>Hồng trứng g&agrave;</li>\r\n	<li>Hồng cam giống nhập</li>\r\n	<li>C&aacute;t tường</li>\r\n	<li>Đồng tiền</li>\r\n	<li>Hồng s&acirc;m xanh</li>\r\n	<li>Lan l&uacute;a</li>\r\n	<li>L&aacute; chanh</li>\r\n	<li>Hồng m&ocirc;n</li>\r\n	<li>T&ugrave;ng nho</li>\r\n	<li>L&aacute; bạc</li>\r\n	<li>V&agrave; một số loại hoa l&aacute; phụ kh&aacute;c</li>\r\n</ul>\r\n\r\n<p>Size: ~ 85cm-165cm</p>\r\n\r\n<p><strong>Lưu &yacute;: Sản phẩm hoa mẫu chỉ mang t&iacute;nh chất tham khảo. V&agrave; nếu qu&yacute; kh&aacute;ch c&oacute; nhu cầu đặt h&agrave;ng như mẫu sản phẩm n&agrave;y vui l&ograve;ng li&ecirc;n hệ &iacute;t nhất trước 5 tiếng nh&eacute;~</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bởi v&igrave;: một số loại hoa trong mẫu theo m&ugrave;a sẽ kh&ocirc;ng c&oacute; hoặc chất lượng kh&ocirc;ng đảm bảo, do đ&oacute; ch&uacute;ng t&ocirc;i sẽ d&ugrave;ng c&aacute;c loại hoa kh&aacute;c thay thế. Nhưng 123Flower Florist đảm bảo định lượng, tone m&agrave;u, kiểu d&aacute;ng cũng như chất lượng hoa tươi đẹp v&agrave; đầy đặn nhất. Bạn sẽ nhận được ảnh ho&agrave;n thiện trước khi ch&uacute;ng t&ocirc;i giao hoa.&nbsp;</p>', 'Hoa là một trong những món quà tặng không thể thiếu trong mỗi dịp đặc biệt. Dù là những bữa tiệc nhỏ hay đến những bữa tiệc sang trọng thì những bông hoa luôn góp phần làm tăng lên sự sang trọng của bữa tiệc đó. Khi đến với  Điện hoa Toàn Quốc và Quốc Tế Sj bạn sẽ được phục vụ một cách chuyên nghiệp. Chúng tôi sẽ giúp bạn gửi lời chúc mừng hay chia buồn chân thành nhất đến với người thân của bạn bằng những bó hoa, lẵng hoa đẹp nhất', '2021-04-03 02:04:32', 'admin', '2021-04-03 02:04:41', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_group_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `add_price` int(11) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `name`, `attribute_group_id`, `product_id`, `add_price`, `sort`, `status`) VALUES
(5, 'Blue', 1, 10, 150, 0, 1),
(6, 'Red', 1, 10, 0, 0, 1),
(7, 'S', 2, 10, 0, 0, 1),
(8, 'M', 2, 10, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`id`, `question`, `answer`, `created`, `modified`, `modified_by`, `status`, `ordering`, `created_by`) VALUES
(1, '8/3 mua gì tặng mẹ', '<p>Ng&agrave;y quốc tế phụ nữ&nbsp;l&agrave; dịp th&iacute;ch hợp để bạn gửi tặng những b&ocirc;ng hoa tươi thắm tới người mẹ k&iacute;nh y&ecirc;u của m&igrave;nh. Bạn n&ecirc;n lựa chọn những lo&agrave;i hoa ph&ugrave; hợp nhất để tặng mẹ</p>\r\n\r\n<p>- Hoa cẩm chướng hồng: Lo&agrave;i hoa n&agrave;y thay lời bạn thể hiện l&ograve;ng tri &acirc;n, niềm k&iacute;nh y&ecirc;u v&ocirc; bờ bến d&agrave;nh cho mẹ. Đ&acirc;y l&agrave; lo&agrave;i hoa th&iacute;ch hợp nhất để tặng mẹ ng&agrave;y 8/3.</p>\r\n\r\n<p>- Hoa cẩm t&uacute; cầu: Lựa chọn lo&agrave;i hoa n&agrave;y để tặng, bạn như gửi gắm l&ograve;ng biết ơn v&agrave; t&igrave;nh cảm ch&acirc;n th&agrave;nh của m&igrave;nh tới mẹ.</p>', '2021-03-26 00:00:00', '2021-03-26 00:00:00', 'admin', 'active', 1, 'admin'),
(2, '14/2 nên mua hoa gì tặng người yêu', '<p>V&agrave;o&nbsp;<strong>ng&agrave;y lễ Valentine 14/2</strong>, ngo&agrave;i socola, th&igrave; hoa tươi ch&iacute;nh l&agrave; m&oacute;n qu&agrave; tặng cho ng&agrave;y Valentine cũng như những dịp kh&aacute;c, Với ng&agrave;y Valentine th&igrave; ch&uacute;ng ta sẽ chọn hoa g&igrave; trong ng&agrave;y 14/2.&nbsp;Những đ&oacute;a hoa với m&agrave;u sắc nhẹ nh&agrave;ng tinh tế gi&uacute;p bạn truyền tải nhiều th&ocirc;ng điệp y&ecirc;u thương tuyệt vời cho ng&agrave;y valentine th&ecirc;m &yacute; nghĩa.</p>\r\n\r\n<p>1<strong> Hoa hồng</strong></p>\r\n\r\n<p>Nhắc đến lo&agrave;i hoa &yacute; nghĩa tặng n&agrave;ng trong ng&agrave;y lễ t&igrave;nh nh&acirc;n kh&ocirc;ng thể bỏ qua hoa hồng trong danh s&aacute;ch đầu ti&ecirc;n. Từ mu&ocirc;n thuở hoa hồng đ&atilde; được gọi l&agrave; lo&agrave;i hoa của t&igrave;nh y&ecirc;u, l&agrave; m&oacute;n qu&agrave; tặng của t&igrave;nh y&ecirc;u r&otilde; r&agrave;ng v&agrave; &yacute; nghĩa nhất.<br />\r\nHoa hồng gồm c&oacute; hoa hồng nhung, hồng v&agrave;ng, hồng đỏ, hồng xanh, hồng t&iacute;m, hồng cam l&agrave; c&aacute;c m&agrave;u sắc được ưa chuộng nhiều trong t&igrave;nh y&ecirc;u. Một b&oacute; hoa hồng l&agrave; cầu nối nồng n&agrave;n, l&atilde;ng mạn nhất cho t&igrave;nh y&ecirc;u.</p>\r\n\r\n<p><strong>2&nbsp;Hoa cẩm t&uacute; cầu</strong></p>\r\n\r\n<p>Gắn liền với c&ocirc; g&aacute;i tung quả t&uacute; cầu l&ecirc;n trời giữa biển người m&ecirc;nh m&ocirc;ng để chọn cho m&igrave;nh một t&acirc;n lang xứng đ&aacute;ng, cẩm t&uacute; cầu l&agrave; lo&agrave;i hoa của truyền thuyết đ&oacute;. Ch&iacute;nh v&igrave; vậy cẩm t&uacute; cầu thường l&agrave; hoa của t&igrave;nh y&ecirc;u để d&agrave;nh tặng nhau v&agrave;o ng&agrave;y lễ t&igrave;nh y&ecirc;u 14.2.<br />\r\nCẩm t&uacute; cầu c&oacute; sắc trắng, xanh v&agrave; t&iacute;m dịu d&agrave;ng v&agrave; thanh tao tượng trưng cho một t&igrave;nh y&ecirc;u k&iacute;n đ&aacute;o, tao nh&atilde; v&agrave; l&atilde;ng mạn. T&igrave;nh y&ecirc;u n&agrave;y đang c&ograve;n e ấp chất chứa v&agrave; muốn b&agrave;y tỏ c&ugrave;ng người thương chỉ tr&ocirc;ng chờ qua một b&oacute; cẩm t&uacute; cầu đẹp đẽ.</p>\r\n\r\n<p><strong>3&nbsp;Hoa oải hương</strong></p>\r\n\r\n<p>Hoa oải hương tuy rất hiếm ở v&ugrave;ng nhiệt đới nhưng phổ biến ở Ch&acirc;u &Acirc;u. V&agrave; kh&ocirc;ng ai c&oacute; thể phủ nhận được &yacute; nghĩa của lo&agrave;i hoa với t&igrave;nh y&ecirc;u. M&agrave;u t&iacute;m mơ mộng v&agrave; chung thủy thay lời th&ocirc;ng điệp m&agrave; ch&agrave;ng gửi tặng đến người y&ecirc;u. Đảm bảo c&aacute;c n&agrave;ng sẽ đổ gục v&agrave; xao xuyến trước sự tinh tế v&agrave; nhạy cảm của ch&agrave;ng v&agrave; t&igrave;nh y&ecirc;u m&agrave; người trao gửi.</p>', '2021-03-26 00:00:00', NULL, NULL, 'active', 2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `quoste`
--

CREATE TABLE `quoste` (
  `quoste1` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `quoste2` text DEFAULT NULL,
  `quoste3` text DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quoste`
--

INSERT INTO `quoste` (`quoste1`, `id`, `quoste2`, `quoste3`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
('<p>Hoa lu&ocirc;n l&agrave;m cho mọi người tốt hơn, hạnh ph&uacute;c hơn, v&agrave; hữu &iacute;ch hơn.</p>\r\n\r\n<p>&nbsp;Ch&uacute;ng l&agrave; &aacute;nh nắng mặt trời, thức ăn v&agrave; thuốc cho t&acirc;m hồn.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Admin</p>', 1, '<p>Hương thơm của hoa chỉ lan theo hướng gió<br>Nhưng lòng tốt của một người lan tỏa theo mọi hướng.<br>Cảm ơn đã chọn sản phẩm của chúng tôi </p>\r\n\r\n                        <h4>Admin</h4>', '<p>Nếu là phụ nữ, hãy như là bông hoa<br>Luôn biết cách tỏa hương thơm ngào ngạt, cũng biết cách xinh đẹp đúng nơi và rút lui đúng lúc.<br>Cảm ơn đã chọn sản phẩm của chúng tôi </p>\r\n\r\n                        <h4>Admin</h4>', '3LinQVGiIX.jpeg', '2021-03-29 00:00:00', 'hailan', '2021-03-29 00:00:00', 'hailan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE `rss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `name`, `status`, `link`, `ordering`, `source`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Vnexpress - Trang chủ', 'active', 'https://vnexpress.net/rss/tin-moi-nhat.rss', 1, 'vnexpress', NULL, NULL, '2020-10-26 01:07:29', 'admin'),
(2, 'Tuổi trẻ - Trang chủ', 'inactive', 'https://tuoitre.vn/rss/tin-moi-nhat.rss', 2, 'tuoitre', '2020-10-26 00:00:00', 'hailan', '2020-10-27 07:00:04', 'admin'),
(3, 'vnexpress.net-the-gioi', 'active', 'https://vnexpress.net/rss/the-gioi.rss', 3, 'vnexpress', '2020-10-27 00:00:00', 'hailan', '2020-10-27 00:00:00', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key_value` varchar(255) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_value`, `value`) VALUES
(1, 'setting-general', '{\"logo\":\"\\/images\\/upload\\/log-zendvn.png\",\"hotline\":\"090 5744 470\",\"working_time\":\"Từ 8h đến 20h tất cả các ngày trong tuần\",\"copyright\":\"© 2020 - Bản quyền của Công Ty Cổ Phần Lập Trình Zend Việt Nam\",\"address\":\"Tầng 5, Tòa nhà Songdo, 62A Phạm Ngọc Thạch, Phường 6, Quận 3, TP. Hồ Chí Minh\",\"introduce\":\"<p>C&ocirc;ng Ty Cổ Phần Lập Tr&igrave;nh Zend Việt Nam&nbsp;<\\/p>\\r\\n\\r\\n<p>M&atilde; số thuế: 0314390745<\\/p>\\r\\n\\r\\n<p>Tầng 5, T&ograve;a nh&agrave; Songdo, 62A Phạm Ngọc Thạch, Phường 6, Quận 3, TP. Hồ Ch&iacute; Minh<\\/p>\\r\\n\\r\\n<p>Giấy ph&eacute;p đăng k&yacute; kinh doanh số 0314390745 do Sở Kế hoạch v&agrave; Đầu tư Th&agrave;nh phố Hồ Ch&iacute; Minh cấp ng&agrave;y 09\\/05\\/2017<\\/p>\",\"maps\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m14!1m8!1m3!1d3919.3258374505854!2d106.69256!3d10.786337!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5781806fe59379f4!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gTOG6rXAgVHLDrG5oIFplbmQgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1606120145525!5m2!1svi!2sus\\\" width=\\\"600\\\" height=\\\"450\\\" frameborder=\\\"0\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" aria-hidden=\\\"false\\\" tabindex=\\\"0\\\"><\\/iframe>\"}'),
(2, 'setting-email', '{\"username\":\"nvlinh17041992@gmail.com\",\"password\":\"vdbpfpyyhrxnnttx\"}'),
(3, 'setting-bcc', 'nvlinh17041992@gmail.com,nvlinh174test01@gmail.com'),
(4, 'setting-social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/groups\\/ZendVN.Group,sdffsdlfksdjfl\",\"youtube\":\"https:\\/\\/www.youtube.com\\/user\\/luutruonghailan\",\"google\":\"https:\\/\\/www.youtube.com\\/user\\/zendvn123\"}');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `name`, `price`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Quận 1', 30000, 'active', '2021-04-04 11:58:18', 'admin', NULL, NULL),
(2, 'Quận 2', 25000, 'active', '2021-04-04 00:00:00', 'admin', '2021-04-04 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `description_sale` text DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `thumb` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `description`, `description_sale`, `link`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `status`, `sort`) VALUES
(1, 'Khóa học lập trình Frontend Master', 'Khóa học sẽ giúp bạn trở thành một chuyên gia Frontend với đầy đủ các kiến thức về HTML, CSS, JavaScript, Bootstrap, jQuery, chuyển PSD thành HTML ...', '', 'https://zendvn.com/khoa-hoc-lap-trinh-frontend-master/', 'rEpDUQCxe4.jpeg', '2019-04-15 00:00:00', 'hailan', '2019-04-24 13:28:03', 'hailan', 'inactive', 1),
(2, 'Học lập trình trực tuyến', 'Học trực tuyến giúp bạn tiết kiệm chi phí, thời gian, cập nhật được nhiều kiến thức mới nhanh nhất và hiệu quả nhất', '', 'https://zendvn.com/', 'K6B1O6UNCb.jpeg', '2019-04-18 00:00:00', 'hailan', '2019-04-24 13:28:06', 'hailan', 'inactive', 2),
(3, 'Ưu đãi học phí', 'Tổng hợp các trương trình ưu đãi học phí hàng tuần, hàng tháng đến tất các các bạn với các mức giảm đặc biệt 50%, 70%,..', '', 'https://zendvn.com/uu-dai-hoc-phi-tai-zendvn/', 'LWi6hINpXz.jpeg', '2019-04-24 00:00:00', 'hailan', '2020-10-18 00:00:00', 'admin', 'inactive', 3),
(4, 'Tặng hoa cho nửa kia vào ngày 14/2', 'Niềm hạnh phúc duy nhất của cuộc sống chính là yêu và được yêu.', 'Giảm ngay 10% trong tuần này', '#', 'KVcKK5QMRO.jpeg', '2021-03-29 00:00:00', 'hailan', '2021-03-29 00:00:00', 'hailan', 'active', NULL),
(5, '8.3 Tặng hoa cho những người phụ nữ yêu thương của bạn', 'Phụ nữ sinh ra để được yêu , không phải để được hiểu', 'Giảm ngay 15% trong tuần này', '#', 'yOzpbDoXbK.jpeg', '2021-03-29 00:00:00', 'hailan', NULL, NULL, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `avatar`, `level`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123456', 'e10adc3949ba59abbe56e057f20f883e', '1ctW8mj8vq.png', 'admin', '2014-12-10 08:55:35', 'admin', '2019-05-04 14:47:14', 'hailan', 'active'),
(2, 'hailan', 'hailan@gmail.com', 'hailan', '7c6f3ef49405d8a330aaa19ca0d0f6af', '1eSGmvZ3gM.jpeg', 'admin', '2014-12-13 07:20:03', 'admin', '2019-05-04 08:47:04', 'hailan', 'active'),
(3, 'user123', 'test@gmail.com', 'user123', 'e10adc3949ba59abbe56e057f20f883e', 'Hb1QSn1CL8.png', 'member', '2019-05-04 00:00:00', 'admin', '2019-05-04 08:47:07', 'hailan', 'active'),
(4, 'user456', 'user456@gmail.com', 'user456', 'e10adc3949ba59abbe56e057f20f883e', 'J1uknUz0T6.png', 'member', '2019-05-04 00:00:00', 'admin', '2020-10-18 00:00:00', 'hailan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `link`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'https://www.youtube.com/playlist?list=PL_AxFqtimj8Jd82Ic5fj-qV7B3DJ0-Gql', 'active', NULL, NULL, '2021-04-05 00:00:00', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `article_comment`
--
ALTER TABLE `article_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cate_product`
--
ALTER TABLE `cate_product`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menu_models__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`) USING BTREE;

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_rss`
--
ALTER TABLE `news_rss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_product_attribute_product_id_attribute_group_id_index` (`product_id`,`attribute_group_id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quoste`
--
ALTER TABLE `quoste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss`
--
ALTER TABLE `rss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `article_comment`
--
ALTER TABLE `article_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cate_product`
--
ALTER TABLE `cate_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_rss`
--
ALTER TABLE `news_rss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quoste`
--
ALTER TABLE `quoste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rss`
--
ALTER TABLE `rss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
