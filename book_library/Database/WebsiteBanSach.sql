-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for websitebansach
CREATE DATABASE IF NOT EXISTS `websitebansach` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `websitebansach`;

-- Dumping structure for table websitebansach.chitietgh
CREATE TABLE IF NOT EXISTS `chitietgh` (
  `GH_ID` int(11) NOT NULL,
  `CTSP_ID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`GH_ID`,`CTSP_ID`),
  KEY `FK_CTGH_GH` (`GH_ID`) USING BTREE,
  KEY `FK_CTGH_CTSP` (`CTSP_ID`),
  CONSTRAINT `FK_CTGH_CTSP` FOREIGN KEY (`CTSP_ID`) REFERENCES `chitietsp` (`CTSP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CTGH_GH` FOREIGN KEY (`GH_ID`) REFERENCES `giohang` (`GH_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.chitietgh: ~6 rows (approximately)
INSERT INTO `chitietgh` (`GH_ID`, `CTSP_ID`, `SoLuong`) VALUES
	(1, 1, 1),
	(1, 5, 1),
	(2, 3, 1),
	(2, 4, 1),
	(3, 6, 1),
	(3, 10, 1);

-- Dumping structure for table websitebansach.chitiethdb
CREATE TABLE IF NOT EXISTS `chitiethdb` (
  `HDB_ID` int(11) NOT NULL,
  `CTSP_ID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`HDB_ID`,`CTSP_ID`),
  KEY `FK_CTHDB_HDB` (`HDB_ID`) USING BTREE,
  KEY `FK_CTHDB_CTSP` (`CTSP_ID`),
  CONSTRAINT `FK_CTHDB_CTSP` FOREIGN KEY (`CTSP_ID`) REFERENCES `chitietsp` (`CTSP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CTHDB_HDB` FOREIGN KEY (`HDB_ID`) REFERENCES `hoadonban` (`HDB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.chitiethdb: ~5 rows (approximately)
INSERT INTO `chitiethdb` (`HDB_ID`, `CTSP_ID`, `SoLuong`) VALUES
	(1, 2, 1),
	(1, 6, 1),
	(2, 3, 1),
	(2, 5, 1),
	(3, 8, 1);

-- Dumping structure for table websitebansach.chitiethdn
CREATE TABLE IF NOT EXISTS `chitiethdn` (
  `HDN_ID` int(11) NOT NULL,
  `CTSP_ID` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  PRIMARY KEY (`HDN_ID`,`CTSP_ID`),
  KEY `FK_CTHDN_HDN` (`HDN_ID`) USING BTREE,
  KEY `FK_CTHDN_CTSP` (`CTSP_ID`),
  CONSTRAINT `FK_CTHDN_CTSP` FOREIGN KEY (`CTSP_ID`) REFERENCES `chitietsp` (`CTSP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CTHDN_HDN` FOREIGN KEY (`HDN_ID`) REFERENCES `hoadonnhap` (`HDN_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.chitiethdn: ~7 rows (approximately)
INSERT INTO `chitiethdn` (`HDN_ID`, `CTSP_ID`, `SoLuong`) VALUES
	(1, 1, 10),
	(1, 2, 15),
	(2, 5, 10),
	(3, 3, 20),
	(3, 7, 30),
	(4, 6, 25),
	(4, 8, 10);

-- Dumping structure for table websitebansach.chitietsp
CREATE TABLE IF NOT EXISTS `chitietsp` (
  `CTSP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TapSo` int(11) NOT NULL DEFAULT 1,
  `SoLuong` int(11) DEFAULT 1,
  `SoTrang` int(11) DEFAULT 1,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `NamXB` varchar(4) DEFAULT NULL,
  `SP_ID` int(11) NOT NULL,
  `GiaNhap` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  PRIMARY KEY (`CTSP_ID`,`SP_ID`),
  KEY `FK_CTSP_SP` (`SP_ID`),
  CONSTRAINT `FK_CTSP_SP` FOREIGN KEY (`SP_ID`) REFERENCES `sanpham` (`SP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.chitietsp: ~10 rows (approximately)
INSERT INTO `chitietsp` (`CTSP_ID`, `TapSo`, `SoLuong`, `SoTrang`, `HinhAnh`, `NamXB`, `SP_ID`, `GiaNhap`, `GiaBan`) VALUES
	(1, 1, 30, 1500, 'nhung_nguoi_khon_kho.jpg', '1862', 1, 70000, 170000),
	(2, 1, 50, 560, 'hai_so_phan.jpg', '1979', 2, 34000, 100000),
	(3, 1, 32, 150, 'ong_gia_va_bien_ca.jpg', '1952', 3, 15000, 50000),
	(4, 1, 46, 285, 'tuoi_tre_dang_gia_bao_nhieu.jpg', '2016', 4, 20000, 79000),
	(5, 1, 27, 450, 'nguoi_truyen_cam_hung.jpg', '2018', 5, 26000, 85000),
	(6, 1, 39, 420, 'thien_tai_ben_trai_ke_dien_ben_phai.jpg', '2019', 6, 24000, 76000),
	(7, 1, 15, 155, 'ky_uc_dong_duong.jpg', '1967', 7, 17000, 48000),
	(8, 1, 29, 950, 'tieng_chim_hot_trong_bui_man_gai.jpg', '1977', 8, 43000, 148000),
	(9, 1, 52, 1037, 'cuon_theo_chieu_gio.jpg', '1936', 9, 65000, 162000),
	(10, 1, 24, 302, 'tam_the.jpg', '2008', 10, 18000, 68000);

-- Dumping structure for table websitebansach.giohang
CREATE TABLE IF NOT EXISTS `giohang` (
  `GH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KH_ID` int(11) NOT NULL,
  PRIMARY KEY (`GH_ID`),
  KEY `FK_GH_KH` (`KH_ID`),
  CONSTRAINT `FK_GH_KH` FOREIGN KEY (`KH_ID`) REFERENCES `khachhang` (`KH_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.giohang: ~3 rows (approximately)
INSERT INTO `giohang` (`GH_ID`, `KH_ID`) VALUES
	(1, 1),
	(2, 2),
	(3, 3);

-- Dumping structure for table websitebansach.hoadonban
CREATE TABLE IF NOT EXISTS `hoadonban` (
  `HDB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NgayBan` datetime DEFAULT NULL,
  `TongTien` int(11) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `KH_ID` int(11) NOT NULL,
  `NV_ID` int(11) NOT NULL,
  `TT_ID` int(11) NOT NULL,
  PRIMARY KEY (`HDB_ID`),
  KEY `FK_HDB_KH` (`KH_ID`),
  KEY `FK_HDB_NV` (`NV_ID`),
  KEY `FK_HDB_TT` (`TT_ID`),
  CONSTRAINT `FK_HDB_KH` FOREIGN KEY (`KH_ID`) REFERENCES `khachhang` (`KH_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_HDB_NV` FOREIGN KEY (`NV_ID`) REFERENCES `nhanvien` (`NV_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_HDB_TT` FOREIGN KEY (`TT_ID`) REFERENCES `thanhtoan` (`TT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.hoadonban: ~3 rows (approximately)
INSERT INTO `hoadonban` (`HDB_ID`, `NgayBan`, `TongTien`, `GhiChu`, `KH_ID`, `NV_ID`, `TT_ID`) VALUES
	(1, '2023-01-14 09:25:11', NULL, NULL, 1, 2, 4),
	(2, '2023-02-03 18:26:16', NULL, NULL, 2, 1, 2),
	(3, '2023-02-14 14:02:48', NULL, NULL, 3, 1, 4);

-- Dumping structure for table websitebansach.hoadonnhap
CREATE TABLE IF NOT EXISTS `hoadonnhap` (
  `HDN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime DEFAULT NULL,
  `TongTien` int(11) DEFAULT NULL,
  `GhiChu` varchar(50) DEFAULT NULL,
  `NV_ID` int(11) NOT NULL,
  PRIMARY KEY (`HDN_ID`),
  KEY `FK_HDN_NV` (`NV_ID`),
  CONSTRAINT `FK_HDN_NV` FOREIGN KEY (`NV_ID`) REFERENCES `nhanvien` (`NV_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.hoadonnhap: ~4 rows (approximately)
INSERT INTO `hoadonnhap` (`HDN_ID`, `NgayNhap`, `TongTien`, `GhiChu`, `NV_ID`) VALUES
	(1, '2023-01-14 17:56:43', NULL, NULL, 1),
	(2, '2023-03-18 10:10:09', NULL, NULL, 1),
	(3, '2023-06-23 07:25:51', NULL, NULL, 2),
	(4, '2023-11-01 08:59:23', NULL, NULL, 2);

-- Dumping structure for table websitebansach.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `KH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(50) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `Username` varchar(20) NOT NULL,
  PRIMARY KEY (`KH_ID`),
  KEY `FK_KH_USER` (`Username`),
  CONSTRAINT `FK_KH_USER` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.khachhang: ~2 rows (approximately)
INSERT INTO `khachhang` (`KH_ID`, `TenKH`, `NgaySinh`, `SDT`, `DiaChi`, `Username`) VALUES
	(1, 'Nguyễn Quang Huy', '2002-02-03', '0333597711', NULL, 'NguyenQuangHuy'),
	(2, 'Đinh Thu Hương', '2002-09-24', '0331234561', NULL, 'DinhThuHuong'),
	(3, 'Trịnh Anh Quân', '2002-10-04', '0432156789', NULL, 'TrinhAnhQuan');

-- Dumping structure for table websitebansach.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `NV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenNV` varchar(50) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `Username` varchar(20) NOT NULL,
  PRIMARY KEY (`NV_ID`),
  KEY `FK_NV_USER` (`Username`),
  CONSTRAINT `FK_NV_USER` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.nhanvien: ~2 rows (approximately)
INSERT INTO `nhanvien` (`NV_ID`, `TenNV`, `NgaySinh`, `SDT`, `DiaChi`, `Username`) VALUES
	(1, 'Cao Hùng Anh', '2002-10-15', '0123456789', NULL, 'CaoHungAnh'),
	(2, 'Phạm Duy Nghĩa', '2002-10-14', '0987654312', NULL, 'PhamDuyNghia');

-- Dumping structure for table websitebansach.nhaxuatban
CREATE TABLE IF NOT EXISTS `nhaxuatban` (
  `NXB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenNXB` varchar(50) NOT NULL,
  PRIMARY KEY (`NXB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.nhaxuatban: ~4 rows (approximately)
INSERT INTO `nhaxuatban` (`NXB_ID`, `TenNXB`) VALUES
	(1, 'Oem'),
	(2, 'Kim Đồng'),
	(3, 'Văn Học'),
	(4, 'HarperCollins'),
	(5, 'Hachette Livre');

-- Dumping structure for table websitebansach.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `SP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `NXB_ID` int(11) NOT NULL,
  `TG_ID` int(11) NOT NULL,
  `TL_ID` int(11) NOT NULL,
  PRIMARY KEY (`SP_ID`),
  KEY `FK_SP_NXB` (`NXB_ID`),
  KEY `FK_SP_TG` (`TG_ID`),
  KEY `FK_SP_TL` (`TL_ID`),
  CONSTRAINT `FK_SP_NXB` FOREIGN KEY (`NXB_ID`) REFERENCES `nhaxuatban` (`NXB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_SP_TG` FOREIGN KEY (`TG_ID`) REFERENCES `tacgia` (`TG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_SP_TL` FOREIGN KEY (`TL_ID`) REFERENCES `theloai` (`TL_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.sanpham: ~10 rows (approximately)
INSERT INTO `sanpham` (`SP_ID`, `TenSach`, `HinhAnh`, `MoTa`, `NXB_ID`, `TG_ID`, `TL_ID`) VALUES
	(1, 'Những người khốn khổ', 'nhung_nguoi_khon_kho.jpg', 'Những người khốn khổ là tiểu thuyết của văn hào Pháp Victor Hugo, được xuất bản năm 1862. Tác phẩm được đánh giá là một trong những tiểu thuyết nổi tiếng nhất của nền văn học thế giới thế kỷ 19.', 4, 1, 1),
	(2, 'Hai số phận', 'hai_so_phan.jpg', 'Hai số phận là một cuốn tiểu thuyết được sáng tác vào năm 1979 bởi nhà văn người Anh Jeffrey Archer. Tựa đề Kane and Abel dựa theo câu chuyện của anh em: Cain và Abel trong Kinh Thánh Cựu Ước.', 4, 2, 1),
	(3, 'Ông già và biển cả', 'ong_gia_va_bien_ca.jpg', 'Ông già và Biển cả là một tiểu thuyết ngắn được Ernest Hemingway viết ở Cuba năm 1951 và xuất bản năm 1952. Nó là truyện ngắn dạng viễn tưởng cuối cùng được Hemingway viết và được xuất bản khi ông còn sống. Đây cũng là tác phẩm nổi tiếng và là một trong những tác phẩm đỉnh cao trong sự nghiệp sáng tác của nhà văn.', 5, 3, 1),
	(4, 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 'tuoi_tre_dang_gia_bao_nhieu.jpg', 'Tuổi Trẻ Đáng Giá Bao Nhiêu là cuốn sách về kỹ năng sống của tác giả Rosie Nguyễn. Cuốn sách thôi thúc bạn hãy sống thật ý nghĩa, làm những gì trái tim mách bảo.', 1, 4, 5),
	(5, 'Người truyền cảm hứng', 'nguoi_truyen_cam_hung.jpg', 'Tiến sĩ Lê Thẩm Dương – Người truyền cảm hứng có sự tương tác rất cao với bạn đọc: Tên cuốn sách, tên các phần của cuốn sách, hình thức của cuốn sách được lựa chọn sau khi đã tham khảo ý kiến của bạn đọc trên mạng xã hội.', 3, 5, 5),
	(6, 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải', 'thien_tai_ben_trai_ke_dien_ben_phai.jpg', 'NẾU MỘT NGÀY ANH THẤY TÔI ĐIÊN, THỰC RA CHÍNH LÀ ANH ĐIÊN ĐẤY!Hỡi những con người đang oằn mình trong cuộc sống, bạn biết gì về thế giới của mình? Là vô vàn thứ lý thuyết được các bậc vĩ nhân kiểm chứng, là luật lệ, là cả nghìn thứ sự thật bọc trong cái lốt hiển nhiên, hay những triết lý cứng nhắc của cuộc đời?', 2, 6, 6),
	(7, 'Ký Ức Đông Dương', 'ky_uc_dong_duong.jpg', 'Ký ức Đông Dương là một trong hai tập bút ký đặc biệt của nhà văn Tô Hoài. Đó là những trang viết thấm đẫm tình hữu nghị sâu sắc với những quốc gia và vùng lãnh thổ trên thế giới mà tác giả đã có dịp đặt chân đến.', 2, 7, 4),
	(8, 'Tiếng chim hót trong bụi mận gai', 'tieng_chim_hot_trong_bui_man_gai.jpg', 'Tiếng chim hót trong bụi mận gai là tiểu thuyết nổi tiếng nhất của nữ văn sĩ người Úc Colleen McCullough, được xuất bản năm 1977.', 5, 8, 3),
	(9, 'Cuốn theo chiều gió', 'cuon_theo_chieu_gio.jpg', 'Cuốn theo chiều gió, xuất bản lần đầu năm 1936, là một cuốn tiểu thuyết tình cảm của Margaret Mitchell, người đã giành giải Pulitzer với tác phẩm này năm 1937. Câu chuyện được đặt bối cảnh tại Georgia và Atlanta, miền Nam Hoa Kỳ trong suốt thời kì nội chiến và thời tái thiết.', 4, 9, 3),
	(10, 'Tam thể', 'tam_the.jpg', 'Tam Thể là quyển tiểu thuyết khoa học viễn tưởng của nhà văn người Trung Quốc Lưu Từ Hân. Tên sách phỏng theo Bài toán ba vật thể trong Cơ học. Tuy đây chỉ là cuốn đầu tiên trong bộ ba Chuyện cũ Trái Đất, nhưng người đọc Trung Quốc thường gọi cả bộ sách là Tam Thể.', 1, 10, 2);

-- Dumping structure for table websitebansach.tacgia
CREATE TABLE IF NOT EXISTS `tacgia` (
  `TG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenTG` varchar(50) NOT NULL,
  PRIMARY KEY (`TG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.tacgia: ~8 rows (approximately)
INSERT INTO `tacgia` (`TG_ID`, `TenTG`) VALUES
	(1, 'Victor Hugo'),
	(2, 'Jeffrey Archer'),
	(3, 'Ernest Hemingway'),
	(4, 'Rosie Nguyễn'),
	(5, 'Lê Thẩm Dương'),
	(6, 'Cao Minh'),
	(7, 'Tô Hoài'),
	(8, 'Colleen McCullough'),
	(9, 'Margaret Mitchell'),
	(10, 'Lưu Từ Hân');

-- Dumping structure for table websitebansach.thanhtoan
CREATE TABLE IF NOT EXISTS `thanhtoan` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PhuongThuc` varchar(15) NOT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.thanhtoan: ~4 rows (approximately)
INSERT INTO `thanhtoan` (`TT_ID`, `PhuongThuc`) VALUES
	(1, 'Thanh toán khi '),
	(2, 'Chuyển khoản'),
	(3, 'Vnpay'),
	(4, 'Momo'),
	(5, 'Zalopay');

-- Dumping structure for table websitebansach.theloai
CREATE TABLE IF NOT EXISTS `theloai` (
  `TL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenTL` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`TL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.theloai: ~4 rows (approximately)
INSERT INTO `theloai` (`TL_ID`, `TenTL`) VALUES
	(1, 'Tiểu thuyết'),
	(2, 'Khoa học viễn tưởng'),
	(3, 'Tình cảm'),
	(4, 'Bút ký'),
	(5, 'Truyền cảm hứng'),
	(6, 'Sách tự lực');

-- Dumping structure for table websitebansach.user
CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Roles` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table websitebansach.user: ~4 rows (approximately)
INSERT INTO `user` (`Username`, `Pass`, `Roles`) VALUES
	('CaoHungAnh', '123', 0),
	('DinhThuHuong', '123', 1),
	('NguyenQuangHuy', '123', 1),
	('PhamDuyNghia', '123', 0),
	('TrinhAnhQuan', '123', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
