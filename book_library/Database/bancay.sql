-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2023 lúc 06:46 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bancay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cay`
--

CREATE TABLE `cay` (
  `Cay_ID` int(11) NOT NULL,
  `TenCay` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `SoLuong` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cay`
--

INSERT INTO `cay` (`Cay_ID`, `TenCay`, `HinhAnh`, `MoTa`, `SoLuong`) VALUES
(18, 'Hoa Xương Rồng', 'product-1.jpg', 'Hoa Xương Rồng', 100),
(19, 'Cây Bàng Nhật', 'product-2.jpg', 'Cây Bàng Nhật', 100),
(20, 'Sen Đá', 'product-3.jpg', 'Sen Đá', 100),
(21, 'Xương Rồng Nhỏ', 'product-5.jpg', 'Xương Rồng Nhỏ', 100),
(22, 'Cây Đó', 'product-4.jpg', NULL, 100),
(23, 'Cây cảnh', '44.png', 'Cây gì đó', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cay_dactinh`
--

CREATE TABLE `cay_dactinh` (
  `Cay_id` int(11) NOT NULL,
  `DT_id` int(11) NOT NULL,
  `GiaTri` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cay_dactinh`
--

INSERT INTO `cay_dactinh` (`Cay_id`, `DT_id`, `GiaTri`) VALUES
(18, 1, '0,25m'),
(18, 2, 'Để bàn,Văn phòng '),
(18, 5, 'Chậm'),
(19, 1, '1,5m'),
(19, 2, 'Sân vườn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethdb`
--

CREATE TABLE `chitiethdb` (
  `HDB_ID` int(11) NOT NULL,
  `CTSP_ID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethdb`
--

INSERT INTO `chitiethdb` (`HDB_ID`, `CTSP_ID`, `SoLuong`) VALUES
(9, 18, 10),
(18, 18, 1),
(19, 21, 2),
(19, 22, 1),
(20, 18, 1),
(20, 19, 1),
(21, 19, 1),
(22, 19, 1),
(23, 19, 1),
(24, 22, 3),
(25, 22, 3),
(26, 19, 1),
(27, 19, 1),
(28, 23, 1),
(29, 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethdn`
--

CREATE TABLE `chitiethdn` (
  `HDN_ID` int(11) NOT NULL,
  `CTSP_ID` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsp`
--

CREATE TABLE `chitietsp` (
  `Cay_ID` int(11) NOT NULL,
  `ChiTietThu` int(11) NOT NULL,
  `Tem` int(11) DEFAULT NULL,
  `TrangThai` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `GiaNhap` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsp`
--

INSERT INTO `chitietsp` (`Cay_ID`, `ChiTietThu`, `Tem`, `TrangThai`, `HinhAnh`, `GiaNhap`, `GiaBan`) VALUES
(18, 18, 1, 'Còn', 'product-1.jpg', 50000, 100000),
(18, 19, 2, 'Còn', 'product-1.jpg', 50000, 100000),
(19, 20, 1, 'Còn', 'product-2.jpg', 60000, 900000),
(19, 21, 2, 'Còn', 'product-2.jpg', 60000, 900000),
(19, 22, 3, 'Còn', 'product-2.jpg', 60000, 100000),
(20, 23, 1, 'Còn', 'product-3.jpg', 50000, 110000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dactinh`
--

CREATE TABLE `dactinh` (
  `DT_id` int(11) NOT NULL,
  `DT_name` varchar(255) NOT NULL,
  `id_loai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dactinh`
--

INSERT INTO `dactinh` (`DT_id`, `DT_name`, `id_loai`) VALUES
(1, 'Chiều cao', NULL),
(2, 'Mục đích sử dụng', NULL),
(3, 'Đường kính thân', NULL),
(4, 'Nguồn gốc', NULL),
(5, 'Chu kỳ phát triển', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadondat`
--

CREATE TABLE `hoadondat` (
  `HDB_ID` int(11) NOT NULL,
  `NgayDat` datetime DEFAULT current_timestamp(),
  `TongTien` int(11) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `KH_ID` int(11) NOT NULL,
  `NV_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadondat`
--

INSERT INTO `hoadondat` (`HDB_ID`, `NgayDat`, `TongTien`, `GhiChu`, `KH_ID`, `NV_ID`) VALUES
(1, '2023-01-14 17:56:43', NULL, NULL, 1, 2),
(2, '2023-03-18 10:10:09', NULL, NULL, 3, 2),
(3, '2023-06-23 07:25:51', NULL, NULL, 2, 1),
(4, NULL, NULL, NULL, 2, 1),
(9, NULL, NULL, NULL, 2, 1),
(10, '2023-12-16 16:07:40', NULL, NULL, 1, 2),
(11, '2023-12-17 15:51:28', 0, 'bán', 3, 1),
(12, '2023-12-17 15:51:28', 0, 'bán', 3, 1),
(13, '2023-12-17 15:57:51', 0, '1', 1, 2),
(14, '2023-12-17 15:57:51', 0, '1', 1, 2),
(15, '2023-12-17 16:00:51', 0, '2', 1, 1),
(16, '2023-12-17 16:00:51', 0, '2', 1, 1),
(17, '2023-12-17 16:06:08', 0, '3', 1, 1),
(18, '2023-12-17 16:06:08', 0, '3', 1, 1),
(19, '2023-12-17 16:29:35', 0, '4', 3, 2),
(20, '2023-12-17 16:30:57', 200000, '5', 1, 1),
(21, '2023-12-17 16:34:23', 100000, '6', 1, 1),
(22, '2023-12-17 16:40:30', 100000, '6', 1, 1),
(23, '2023-12-17 16:40:46', 100000, '7', 2, 1),
(24, '2023-12-17 16:41:33', 300000, '8', 3, 1),
(25, '2023-12-17 16:42:25', 300000, '8', 3, 1),
(26, '2023-12-17 16:42:53', 100000, '9', 1, 1),
(27, '2023-12-17 16:45:54', 100000, '10', 3, 1),
(28, '2023-12-17 16:47:41', 110000, '11', 1, 2),
(29, '2023-12-17 16:51:11', 100000, '13', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `HDN_ID` int(11) NOT NULL,
  `NgayNhap` datetime DEFAULT current_timestamp(),
  `TongTien` int(11) DEFAULT NULL,
  `GhiChu` varchar(50) DEFAULT NULL,
  `NV_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`HDN_ID`, `NgayNhap`, `TongTien`, `GhiChu`, `NV_ID`) VALUES
(1, '2023-01-14 17:56:43', NULL, NULL, 1),
(2, '2023-03-18 10:10:09', NULL, NULL, 1),
(3, '2023-06-23 07:25:51', NULL, NULL, 2),
(4, '2023-11-01 08:59:23', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_ID` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_ID`, `TenKH`, `NgaySinh`, `SDT`, `DiaChi`, `Username`) VALUES
(1, 'Nguyễn Quang Huy', '2002-02-03', '0333597711', NULL, 'NguyenQuangHuy'),
(2, 'Đinh Thu Hương', '2002-09-24', '0331234561', NULL, 'DinhThuHuong'),
(3, 'Trịnh Anh Quân', '2002-10-04', '0432156789', NULL, 'TrinhAnhQuan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_dac_tinh`
--

CREATE TABLE `loai_dac_tinh` (
  `id_loai_DT` int(11) NOT NULL,
  `ten_loai_DT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` int(11) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `TenNV`, `NgaySinh`, `SDT`, `DiaChi`, `Username`) VALUES
(1, 'Cao Hùng Anh', '2002-10-15', '0123456789', NULL, 'CaoHungAnh'),
(2, 'Phạm Duy Nghĩa', '2002-10-14', '0987654312', NULL, 'PhamDuyNghia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Username` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Roles` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Username`, `Pass`, `Roles`) VALUES
('CaoHungAnh', '123', 0),
('DinhThuHuong', '123', 1),
('NguyenQuangHuy', '123', 1),
('PhamDuyNghia', '123', 0),
('TrinhAnhQuan', '123', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cay`
--
ALTER TABLE `cay`
  ADD PRIMARY KEY (`Cay_ID`);

--
-- Chỉ mục cho bảng `cay_dactinh`
--
ALTER TABLE `cay_dactinh`
  ADD PRIMARY KEY (`Cay_id`,`DT_id`),
  ADD KEY `DT_id` (`DT_id`);

--
-- Chỉ mục cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  ADD PRIMARY KEY (`HDB_ID`,`CTSP_ID`),
  ADD KEY `FK_CTHDB_HDB` (`HDB_ID`) USING BTREE,
  ADD KEY `FK_CTHDB_CTSP` (`CTSP_ID`);

--
-- Chỉ mục cho bảng `chitiethdn`
--
ALTER TABLE `chitiethdn`
  ADD PRIMARY KEY (`HDN_ID`,`CTSP_ID`),
  ADD KEY `FK_CTHDN_HDN` (`HDN_ID`) USING BTREE,
  ADD KEY `FK_CTHDN_CTSP` (`CTSP_ID`);

--
-- Chỉ mục cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD PRIMARY KEY (`ChiTietThu`,`Cay_ID`),
  ADD KEY `FK_CTSP_SP` (`Cay_ID`);

--
-- Chỉ mục cho bảng `dactinh`
--
ALTER TABLE `dactinh`
  ADD PRIMARY KEY (`DT_id`),
  ADD KEY `FK_Loai_DT` (`id_loai`);

--
-- Chỉ mục cho bảng `hoadondat`
--
ALTER TABLE `hoadondat`
  ADD PRIMARY KEY (`HDB_ID`),
  ADD KEY `FK_HDB_KH` (`KH_ID`),
  ADD KEY `FK_HDB_NV` (`NV_ID`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`HDN_ID`),
  ADD KEY `FK_HDN_NV` (`NV_ID`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_ID`),
  ADD KEY `FK_KH_USER` (`Username`);

--
-- Chỉ mục cho bảng `loai_dac_tinh`
--
ALTER TABLE `loai_dac_tinh`
  ADD PRIMARY KEY (`id_loai_DT`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_ID`),
  ADD KEY `FK_NV_USER` (`Username`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cay`
--
ALTER TABLE `cay`
  MODIFY `Cay_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  MODIFY `ChiTietThu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `dactinh`
--
ALTER TABLE `dactinh`
  MODIFY `DT_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadondat`
--
ALTER TABLE `hoadondat`
  MODIFY `HDB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `HDN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loai_dac_tinh`
--
ALTER TABLE `loai_dac_tinh`
  MODIFY `id_loai_DT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `NV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cay_dactinh`
--
ALTER TABLE `cay_dactinh`
  ADD CONSTRAINT `cay_dactinh_ibfk_1` FOREIGN KEY (`Cay_id`) REFERENCES `cay` (`Cay_ID`),
  ADD CONSTRAINT `cay_dactinh_ibfk_2` FOREIGN KEY (`DT_id`) REFERENCES `dactinh` (`DT_id`);

--
-- Các ràng buộc cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  ADD CONSTRAINT `FK_CTHDB_CTSP` FOREIGN KEY (`CTSP_ID`) REFERENCES `chitietsp` (`ChiTietThu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CTHDB_HDB` FOREIGN KEY (`HDB_ID`) REFERENCES `hoadondat` (`HDB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiethdn`
--
ALTER TABLE `chitiethdn`
  ADD CONSTRAINT `FK_CTHDN_CTSP` FOREIGN KEY (`CTSP_ID`) REFERENCES `chitietsp` (`ChiTietThu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CTHDN_HDN` FOREIGN KEY (`HDN_ID`) REFERENCES `hoadonnhap` (`HDN_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD CONSTRAINT `FK_CTSP_SP` FOREIGN KEY (`Cay_ID`) REFERENCES `cay` (`Cay_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `dactinh`
--
ALTER TABLE `dactinh`
  ADD CONSTRAINT `FK_Loai_DT` FOREIGN KEY (`id_loai`) REFERENCES `loai_dac_tinh` (`id_loai_DT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoadondat`
--
ALTER TABLE `hoadondat`
  ADD CONSTRAINT `FK_HDB_KH` FOREIGN KEY (`KH_ID`) REFERENCES `khachhang` (`KH_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_HDB_NV` FOREIGN KEY (`NV_ID`) REFERENCES `nhanvien` (`NV_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `FK_HDN_NV` FOREIGN KEY (`NV_ID`) REFERENCES `nhanvien` (`NV_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_KH_USER` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NV_USER` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
