-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 26, 2025 lúc 01:57 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlmh1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `subject_id`, `semester`) VALUES
(1, 1, '2021-2022'),
(2, 2, '2021-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `scores`
--

INSERT INTO `scores` (`id`, `course_id`, `student_id`, `score`) VALUES
(1, 1, 1, 8.50),
(2, 1, 2, 9.00),
(3, 2, 1, 7.50),
(4, 2, 2, 8.00),
(5, 1, 3, 7.50),
(6, 2, 3, 9.00),
(7, 2, 4, 8.00),
(8, 1, 5, 6.50),
(9, 2, 6, 7.00),
(10, 1, 7, 8.00),
(11, 2, 8, 8.50),
(12, 1, 9, 7.00),
(13, 2, 10, 9.50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `full_name`, `birth_date`, `email`, `gender`, `phone_number`, `password`) VALUES
(1, 'Nguyen Vo Phuong Tam', '2000-01-01', 'tam@example.com', 'Nu', '0123456789', 'password123'),
(2, 'Tran Thi B', '2001-02-02', 'b@gmail.com', 'Nu', '0987654321', 'password456'),
(3, 'Truong Thi Da Huong', '2004-01-29', 'huong@gmail.com', 'Nu', '1234567890', '123'),
(4, 'Nguyen Ngoc Chien', '2003-04-04', 'chien@gmail.com', 'Nam', '0987654322', 'password012'),
(5, 'Le Thi Thanh Thuy', '2000-05-05', 'thuy@gmail.com', 'Nu', '0123456783', 'password345'),
(6, 'Nguyen Thi F', '2001-06-06', 'nguyenthif@example.com', 'Nu', '0123456784', 'password678'),
(7, 'Bui Van G', '2002-07-07', 'buivang@example.com', 'Nam', '0123456785', 'password901'),
(8, 'Tran Thi H', '2003-08-08', 'tranthih@example.com', 'Nu', '0123456786', 'password234'),
(9, 'Le Thi I', '2000-09-09', 'lethii@example.com', 'Nu', '0123456787', 'password567'),
(10, 'Do Van J', '2001-10-10', 'dovanj@example.com', 'Nam', '0123456788', 'password890');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL,
  `cumulative_score` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `credits`, `cumulative_score`) VALUES
(1, 'Toan Cao Cap', 3, 1),
(2, 'Lap Trinh Co Ban', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `tk`
-- (See below for the actual view)
--
CREATE TABLE `tk` (
`id` bigint(21)
,`student_id` int(11)
,`full_name` varchar(100)
,`cumulative_score` decimal(41,6)
,`courses_taken` bigint(21)
,`courses_counted` decimal(25,0)
,`total_credits` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `tk`
--
DROP TABLE IF EXISTS `tk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tk`  AS SELECT row_number() over ( order by `s`.`id`) AS `id`, `s`.`id` AS `student_id`, `s`.`full_name` AS `full_name`, coalesce(sum(`sc`.`score` * `sub`.`credits`) / sum(`sub`.`credits`),0) AS `cumulative_score`, count(`sc`.`id`) AS `courses_taken`, sum(`sub`.`cumulative_score`) AS `courses_counted`, sum(`sub`.`credits`) AS `total_credits` FROM (((`students` `s` left join `scores` `sc` on(`s`.`id` = `sc`.`student_id`)) left join `courses` `c` on(`sc`.`course_id` = `c`.`id`)) left join `subjects` `sub` on(`c`.`subject_id` = `sub`.`id`)) GROUP BY `s`.`id`, `s`.`full_name` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Các ràng buộc cho bảng `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
