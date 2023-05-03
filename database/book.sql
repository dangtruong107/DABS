-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2023 lúc 05:38 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID_Donhang` int(10) NOT NULL,
  `ID_Sanpham` int(10) NOT NULL,
  `Dongia` int(11) NOT NULL,
  `Soluong` int(10) NOT NULL,
  `Thanhtien` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID_Donhang`, `ID_Sanpham`, `Dongia`, `Soluong`, `Thanhtien`) VALUES
(1, 1, 200000, 2, 400000),
(1, 4, 100000, 3, 300000),
(1, 5, 200000, 1, 200000),
(2, 10, 100000, 1, 100000),
(2, 11, 200000, 2, 400000),
(1, 4, 100000, 3, 300000),
(7, 17, 200000, 3, 600000);

--
-- Bẫy `chitietdonhang`
--
DELIMITER $$
CREATE TRIGGER `update_tongtien` AFTER INSERT ON `chitietdonhang` FOR EACH ROW UPDATE donhang
    SET Tongtien = (
        SELECT SUM(Thanhtien)
        FROM chitietdonhang
        WHERE chitietdonhang.ID_Donhang = donhang.ID_Donhang
        GROUP BY ID_Donhang
    )
    WHERE donhang.ID_Donhang = NEW.ID_Donhang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doitac`
--

CREATE TABLE `doitac` (
  `ID_Doitac` int(10) NOT NULL,
  `Tendoitac` varchar(100) NOT NULL,
  `Sdt` varchar(10) NOT NULL,
  `Diachi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `doitac`
--

INSERT INTO `doitac` (`ID_Doitac`, `Tendoitac`, `Sdt`, `Diachi`) VALUES
(1, 'Nhà xuất bản Kim Đồng', '11111111', '55 Quang Trung, Hà Nội, Việt Nam'),
(2, 'Nhà xuất bản Đại học Quốc Gia', '22222222', '16 P. Hàng Chuối, Phạm Đình Hổ, Hai Bà Trưng, Hà Nội'),
(3, 'NXB Hà Nội', '33333333', '4 P. Tống Duy Tân, Hàng Bông, Hoàn Kiếm, Hà Nội'),
(4, 'Nhà xuất bản Thanh niên', '4444444', 'D29 Khu đô thị mới Cầu Giấy, Phường Yên Hoà, Quận Cầu Giấy, Hà Nội'),
(5, 'Nhà xuất bản Trẻ', '55555555', 'Số 21, Dãy A11, Khu Đầm Trấu, Phường Bạch Đằng, Quận Hai Bà Trưng, Hà Nội '),
(6, 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh', '66666666', '62 Nguyễn Thị Minh Khai, Phường Đa Kao, Quận 1, TP. HCM'),
(7, 'Nhà xuất bản Lao Động ', '77777777', '175 Giảng Võ, Đống Đa, Hà Nội ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID_Donhang` int(11) NOT NULL,
  `ID_Nhanvien` int(10) NOT NULL,
  `Sdtkhach` varchar(10) NOT NULL,
  `Ngaymua` date NOT NULL,
  `Diachi` varchar(200) NOT NULL,
  `Tongtien` int(100) NOT NULL,
  `Trangthaidonhang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID_Donhang`, `ID_Nhanvien`, `Sdtkhach`, `Ngaymua`, `Diachi`, `Tongtien`, `Trangthaidonhang`) VALUES
(1, 0, '00001', '2023-04-11', '12345 Hà Nội', 1200000, 'Không giao được'),
(2, 1, '00004', '2023-04-09', '123 TP.Hồ Chí Minh', 500000, 'Đang giao'),
(7, 3, '00010', '2023-04-03', 'egư', 600000, 'ađ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Sdt` varchar(10) NOT NULL,
  `Matkhau` varchar(100) NOT NULL,
  `Tenkhach` varchar(100) NOT NULL,
  `Diachi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`Sdt`, `Matkhau`, `Tenkhach`, `Diachi`) VALUES
('00001', '123', 'Khách hàng 1', 'Hà Nội'),
('00002', '1', 'Khách hàng 2', 'Hà Nội'),
('00003', '1', 'Khách hàng 3', 'Hà Nội'),
('00004', '12', 'Khách hàng 4', 'Hà Nội'),
('00005', '1', 'Khách hàng 5', 'Hồ Chí Minh'),
('00010', '1212', 'Khách hàng 10', 'Ba Vì'),
('0006', '1', 'Khách hàng 6', 'Thái Nguyên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvienbanhang`
--

CREATE TABLE `nhanvienbanhang` (
  `ID_Nhanvienbanhang` int(10) NOT NULL,
  `Tennhanvien` varchar(100) NOT NULL,
  `Sdt` varchar(10) NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Tendangnhap` varchar(100) NOT NULL,
  `Matkhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvienbanhang`
--

INSERT INTO `nhanvienbanhang` (`ID_Nhanvienbanhang`, `Tennhanvien`, `Sdt`, `Diachi`, `Tendangnhap`, `Matkhau`) VALUES
(0, 'Irene', '000000', 'Seoul', 'Irene', '123'),
(1, 'Nguyễn Hồng Phong', '010101', 'Ba Vì', 'hongphong', 'hongphong'),
(2, 'Lê Quý Hiếu', '020202', 'Thái Bình ', 'quyhieu', 'quyhieu'),
(3, 'Nguyễn Bá Dưỡng', '030303', 'Thạch Thất', 'baduong', 'baduong'),
(4, 'Nguyễn Đăng Trường', '040404', 'Bắc Ninh ', 'dangtruong', 'dangtruong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `ID_Quanly` int(10) NOT NULL,
  `Tenquanly` varchar(100) NOT NULL,
  `Sdt` varchar(10) NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Tendangnhap` varchar(100) NOT NULL,
  `Matkhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`ID_Quanly`, `Tenquanly`, `Sdt`, `Diachi`, `Tendangnhap`, `Matkhau`) VALUES
(1, 'Quản trị viên', '09090090', '', 'admin', 'admin'),
(2, 'Trình Đức Hải', '01010101', '', 'duchai', 'duchai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_Sanpham` int(10) NOT NULL,
  `ID_Doitac` int(10) NOT NULL,
  `Tensanpham` varchar(100) NOT NULL,
  `Theloai` int(10) NOT NULL,
  `Anh` varchar(200) NOT NULL,
  `Tacgia` varchar(100) NOT NULL,
  `Gia` int(100) NOT NULL,
  `Mota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_Sanpham`, `ID_Doitac`,`Theloai`,`Tensanpham`, `Anh`, `Tacgia`, `Gia`, `Mota`) VALUES
(1, 3,2, 'Tiểu Thuyết Rừng NAUY', 'tieuthuyetrungnauy.jpg', 'Haruki Murakami', 200000, '<p>Rừng Na-Uy (tiếng Nhật: ノルウェイの森, Noruwei no mori) là tiểu thuyết của nhà văn Nhật Bản Murakami Haruki, được xuất bản lần đầu năm 1987.</p>\r\n'),
(4, 2,3, 'Những Con Đường Tơ Lụa', 'conduongtolua.png', 'Peter Frankopan', 100000, '<p>NHỮNG CON ĐƯỜNG TƠ LỤA–Một lịch sử mới về thế giới(Tựa gốc:The Silk Roads:A New History of the World) ngay từ lúc mới xuất bản vào năm 2015 đã nhanh chóng trở thành một hiện tượng phát hành.</p>\r\n'),
(5, 5,2, 'Giai Điệu Cho Trái Tim Tan Vỡ', 'giaidieuchotraitimtanvo.png', 'Cathy Hopkins', 200000, '<p>"...nếu cứ mãi khổ sở vì mọi chuyện không theo ý muốn của mình thì chỉ càng mất thời gian mà thôi. Nếu gặp khó khăn, hoặc là bạn sẽ bị nhấn chìm hoặc bạn phải tự bơi. "</p>\r\n'),
(51, 3,2, 'Cây Cam Ngọt Của Tôi', 'caycamngotcuatoi.png', 'José Mauro de Vasconcelos', 300000, '<p>Một cách nhìn cuộc sống gần như hoàn chỉnh từ con mắt trẻ thơ… có sức mạnh sưởi ấm và làm tan nát cõi lòng, dù người đọc ở lứa tuổi nào.- The National</p>\r\n'),
(6, 4,2, 'Cô Gái Năm Âý Chúng Ta Cùng Theo Đuổi', 'cogainamaychungtacungtheoduoi.png', 'Cửu Bả Đao', 150000, '<p>Tuổi thanh xuân giống như một cơn mưa rào. Dù cho bạn từng bị cảm lạnh vì tắm mưa, bạn vẫn muốn được đằm mình trong cơn mưa ấy lần nữa. Mỗi người đều từng có khoảng thời gian bồng bột đấy</p>\r\n'),
(7, 6,1, '21 Bài Học Cho Thế Kỷ 21', '21baihocchotheky21.jpg', 'Yuval Noah Harari', 250000, '<p>iều gì đang xảy ra ngay lúc này? Những thách thức lớn nhất và những lựa chọn quan trọng nhất của ngày nay là gì? Ta cần chú ý đến điều gì? Ta nên dạy con cái ta những gì?".</p>\r\n'),
(9, 3,1, 'Các Thế Giới Song Song', 'cacthegioisongsong.png', 'Michio Kaku', 400000, '<p>Dẫn chuyện lôi cuốn, kết hợp tường minh, sống động một lượng thông tin đồ sộ để khai mở những giới hạn tột cùng của trí  tưởng tượng, Kaku thực sự xứng đáng là " nhà truyền giáo" vĩ đại đã mang thế giới vật lý lý thuyết tới quảng đại quần chúng.</p>\r\n'),
(10, 4,2, 'Ai Biết Đâu Ngày Mai', 'aibietdaungaymai.png', 'Ann Brashares', 600000, '<p>Chúng tôi là những kẻ sống sót.Mảnh đất của chúng tôi đã bị hủy hoại bởi thiên tai, lũ lụt, đói kém và dịch bệnh. Chúng tôi đã sống, nhưng chúng tôi phải từ bỏ quê hương.</p>\r\n'),
(21, 6,2, 'Em Sẽ Đến Cùng Cơn Mưa', 'emsedencungconmua.png', 'Ichikawa Takuji', 220000, '<p>“Em sẽ đến cùng cơn mưa” câu chuyện của người đàn ông đánh mất hạnh phúc vào tay thần chết. Nhưng rồi rốt cục anh cũng tìm lại chính mình nhờ phép màu tưởng chừng chỉ có trong cổ tích</p>\r\n'),
(22, 1,2, 'Đừng Yêu Thầm Nữa Tỏ Tình Đi', 'dungyeuthamnuatotinhdi.jpg', 'Trần Minh Phương Thảo', 120000, '<p>Điều kỳ diệu nhất của tuổi trẻ là tình yêu, và điều kì diệu nhất của tình yêu chính là khả năng thay đổi một người.</p>\r\n'),
(23, 1,2, 'Bức Thư Bị Lãng Quên', 'bucthubilangquen.jpg', 'Cố Tây Tước', 120000, '<p>Mọi người thường hay lãng phí những năm tháng thanh xuân của mình khi còn trẻ, chỉ hy vọng rằng khi quay đầu nhìn lại, sẽ không thấy hối tiếc…</p>\r\n'),
(31, 7,6, 'Nhà Gỉa Kim', 'nhagiakim.jpg', 'Paulo Coelho', 240000, '<p>Nếu cậu hiểu rõ trái tim mình thì sẽ không xảy ra điều gì bất trắc đâu, vì cậu biết rõ nó mơ ước gì và biết phải ứng xử như thế nào.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `ID_Theloai` int(10) NOT NULL,
  `Tentheloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`ID_Theloai`,`Tentheloai`) VALUES
(1, 'Kỹ Năng - Self Help '),
(2, 'Truyện, Tiểu Thuyết'),
(3, 'Văn hóa xã hội – Lịch sử'),
(4, 'Tâm lý, tâm linh, tôn giáo'),
(5, 'Chính trị – pháp luật'),
(6, 'Văn học nghệ thuật'),
(7, 'Giáo trình');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`ID_Doitac`),
  ADD UNIQUE KEY `Sdt` (`Sdt`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_Donhang`),
  ADD KEY `foreign key` (`ID_Nhanvien`),
  ADD KEY `Sdtkhach` (`Sdtkhach`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Sdt`);

--
-- Chỉ mục cho bảng `nhanvienbanhang`
--
ALTER TABLE `nhanvienbanhang`
  ADD PRIMARY KEY (`ID_Nhanvienbanhang`),
  ADD UNIQUE KEY `Sdt` (`Sdt`),
  ADD UNIQUE KEY `Tendangnhap` (`Tendangnhap`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`ID_Quanly`),
  ADD UNIQUE KEY `Sdt` (`Sdt`),
  ADD UNIQUE KEY `Tendangnhap` (`Tendangnhap`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_Sanpham`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ID_Theloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID_Donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_Sanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ID_Theloai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`Sdtkhach`) REFERENCES `khachhang` (`Sdt`),
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`ID_Nhanvien`) REFERENCES `nhanvienbanhang` (`ID_Nhanvienbanhang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
