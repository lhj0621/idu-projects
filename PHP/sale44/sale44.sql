-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 19-01-21 08:10
-- 서버 버전: 10.2.19-MariaDB
-- PHP 버전: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `sale44`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `book`
--

CREATE TABLE `book` (
  `no44` int(11) NOT NULL,
  `category_no44` int(11) NOT NULL,
  `title44` varchar(50) NOT NULL,
  `author44` varchar(20) NOT NULL,
  `publisher44` varchar(25) NOT NULL,
  `price44` int(11) NOT NULL,
  `pic44` varchar(255) DEFAULT NULL,
  `status44` tinyint(11) NOT NULL COMMENT '0:대여 가능 1: 대여 불가'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `book`
--

INSERT INTO `book` (`no44`, `category_no44`, `title44`, `author44`, `publisher44`, `price44`, `pic44`, `status44`) VALUES
(2, 47, '작별', '한강  , 이승우, 정이현, 권여선', '은행나무', 12000, '소설_작별.jpg', 1),
(3, 49, '우리가 보낸 가장 긴 밤', '이석원', '달', 13000, '우리가_보낸_가장_긴_밤.PNG', 0),
(4, 51, '150년 하버드 글쓰기 비법', '송숙희', '유노북스', 14500, '150년_하버드_글쓰기_비법.jpg', 0),
(5, 50, '트렌드 코리아 2019', '김난도', '미래의창', 17000, '트렌드_코리아_2019.jpg', 0),
(6, 24, '조선 시대 회화: 오늘 만나는 우리 옛 그림', '윤철규', '마로니에북스', 18000, '조선_시대_회화.jpg', 1),
(7, 21, '원숭이 신의 잃어버린 도시', '더글러스 프레스턴', '나무의철학', 16800, '원숭이_신의_잃어버린_도시.jpg', 0),
(8, 48, '4차 산업혁명과 그리스도인의 삶', '이윤석', '기독교문서선교회', 10000, '4차_산업혁명과_그리스도인의_삶.jpg', 0),
(9, 47, '보기왕이 온다', '사와무라 이치', '아르테(arte)', 14000, '보기왕이_온다.jpg', 0),
(10, 47, '단 하나의 문장', '구병모', '문학동네', 13500, '단_하나의_문장.jpg', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `no44` int(11) NOT NULL,
  `name44` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`no44`, `name44`) VALUES
(21, '역사/문화'),
(24, '예술/대중문화'),
(47, '소설'),
(48, '종교'),
(49, '시/에세이'),
(51, '자기계발');

-- --------------------------------------------------------

--
-- 테이블 구조 `food`
--

CREATE TABLE `food` (
  `food_Id` int(11) NOT NULL,
  `food_Name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '치악산 복숭아 당도 최고',
  `food_Date` date DEFAULT NULL,
  `food_Quality` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '1=최고 2=좋음 3=보통 4=나쁨 5=폐급',
  `food_EA` int(255) DEFAULT NULL,
  `food_From` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_Comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 테이블의 덤프 데이터 `food`
--

INSERT INTO `food` (`food_Id`, `food_Name`, `food_Date`, `food_Quality`, `food_EA`, `food_From`, `food_Comment`) VALUES
(1, '사과', '2018-09-06', '보통', 1000, '경상북도 청송', '유기농 제품');

-- --------------------------------------------------------

--
-- 테이블 구조 `gubun`
--

CREATE TABLE `gubun` (
  `no44` int(11) NOT NULL,
  `name44` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `gubun`
--

INSERT INTO `gubun` (`no44`, `name44`) VALUES
(10, '운동화'),
(11, '구두'),
(12, '부추'),
(13, '33'),
(14, '13212'),
(15, '33'),
(19, '22');

-- --------------------------------------------------------

--
-- 테이블 구조 `jangbu`
--

CREATE TABLE `jangbu` (
  `no44` int(11) NOT NULL,
  `io44` tinyint(4) DEFAULT NULL,
  `writeday44` date DEFAULT NULL,
  `product_no44` int(11) DEFAULT NULL,
  `price44` int(11) DEFAULT NULL,
  `numi44` int(11) DEFAULT NULL,
  `numo44` int(11) DEFAULT NULL,
  `prices44` int(11) DEFAULT NULL,
  `bigo44` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `jangbu`
--

INSERT INTO `jangbu` (`no44`, `io44`, `writeday44`, `product_no44`, `price44`, `numi44`, `numo44`, `prices44`, `bigo44`) VALUES
(18, 0, '2018-10-04', 20, 49000, 3, 0, 147000, ''),
(19, 0, '2018-10-04', 24, 120000, 30, 0, 3600000, ''),
(20, 1, '2018-10-04', 22, 39000, 0, 50, 1950000, ''),
(21, 1, '2018-10-04', 25, 70000, 0, 25, 1750000, ''),
(24, 0, '2017-07-10', 20, 49000, 1, 0, 49000, ''),
(25, 0, '2018-10-11', 24, 120000, 10000, 0, 1200000000, ''),
(26, 1, '2018-10-11', 24, 120000, 0, 500, 60000000, ''),
(27, 0, '2018-10-11', 22, 39000, 1000, 0, 39000000, ''),
(28, 0, '2018-11-01', 20, 49000, 2, 0, 98000, ''),
(29, 0, '2018-11-01', 25, 70000, 1, 0, 70000, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `no44` int(11) NOT NULL,
  `uid44` varchar(20) NOT NULL,
  `pwd44` varchar(20) NOT NULL,
  `name44` varchar(20) NOT NULL,
  `tel44` varchar(11) DEFAULT NULL,
  `rank44` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`no44`, `uid44`, `pwd44`, `name44`, `tel44`, `rank44`) VALUES
(1, 'admin', '1234', '관리자', '01012341234', 1),
(2, 'id2', '1234', '노기효', '01094818426', 0),
(3, 'id3', '1234', '배안수', '01096029758', 0),
(4, 'id4', '1234', '윤상기', '01091834099', 0),
(5, 'id5', '1234', '남윤주', '01099745951', 0),
(6, 'id6', '1234', '고은이', '01066752295', 0),
(7, 'id7', '1234', '이창기', '01094867737', 0),
(8, 'id8', '1234', '강주석', '01097175378', 0),
(9, 'id9', '1234', '김상준', '01073282001', 0),
(10, 'id10', '123455', '김강현', '01090696074', 0),
(11, 'id11', '1234', '양구민', '01089906973', 0),
(12, 'id12', '1234', '박철완', '01064517732', 0),
(13, 'id13', '1234', '이조규', '01064725207', 0),
(14, 'id14', '1234', '김안기', '01047835553', 0),
(15, 'id15', '1234', '황전하', '01098549069', 0),
(16, 'id16', '1234', '원정현', '01097953309', 0),
(17, 'id17', '1234', '김성현', '01071564586', 0),
(18, 'id18', '1234', '윤고영', '01046674402', 0),
(19, 'id19', '1234', '손양진', '01093091586', 0),
(20, 'id20', '1234', '서천범', '01029609537', 0),
(21, 'id21', '1234', '최미은', '01095919293', 0),
(22, 'id22', '1234', '현자석', '01045525203', 0),
(24, 'id24', '1234', '임양진', '01047441735', 0),
(25, 'id25', '1234', '김진형', '01029752059', 0),
(27, 'id27', '1234', '김동진', '01032374556', 0),
(28, 'id28', '1234', '박지영', '01032583779', 0),
(29, 'id29', '1234', '이양성', '01022293628', 0),
(30, 'id30', '1234', '박자형', '01035604903', 0),
(31, 'id31', '1234', '김다우', '01029114044', 0),
(32, 'id32', '1234', '임전철', '01030126920', 0),
(33, 'id33', '1234', '최구선', '01023734840', 0),
(34, 'id34', '1234', '정도솔', '01098643720', 0),
(35, 'id35', '1234', '이영석', '01065956653', 0),
(36, 'id36', '1234', '조경현', '01072265535', 0),
(37, 'id37', '1234', '김만석', '01034670483', 0),
(38, 'id38', '1234', '박만석', '01044184218', 0),
(39, 'id39', '1234', '김현진', '01024095317', 0),
(40, 'id40', '1234', '박솔희', '01075709030', 0),
(41, 'id41', '1234', '권하미', '01024517990', 0),
(42, 'id42', '1234', '이성민', '01036524847', 0),
(43, 'id43', '1234', '장도운', '01035337719', 0),
(44, 'id44', '1234', '고일남', '01096943617', 0),
(45, 'id45', '1234', '황지우', '01091057558', 0),
(46, 'id46', '1234', '정기근', '01025764748', 0),
(47, 'id47', '1234', '양자승', '01080972732', 0),
(48, 'id48', '1234', '윤성현', '01030685978', 0),
(49, 'id49', '1234', '최기문', '01027595634', 0),
(50, 'id50', '1234', '오시헌', '01020203572', 0),
(51, '가231123', '22', '가2', '2  2   2   ', 1),
(53, '1', '1', 'ab1', '1  1   3   ', 0),
(54, '2', '2', '2', '2  2   2   ', 1),
(55, '1234', '1234', '1234', '123123 123 ', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `person`
--

CREATE TABLE `person` (
  `no44` int(11) NOT NULL,
  `uid44` varchar(20) NOT NULL,
  `pwd44` varchar(20) NOT NULL,
  `name44` varchar(20) NOT NULL,
  `tel44` varchar(11) NOT NULL,
  `rank44` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `person`
--

INSERT INTO `person` (`no44`, `uid44`, `pwd44`, `name44`, `tel44`, `rank44`) VALUES
(1, '1', '1', '홍길동', '01012341234', 1),
(2, '2', '2', '김철수', '01011111111', 0),
(3, 'qwer', 'qwer', '김철수', '01022222222', 0),
(4, 'asdf', 'asdf', '박철수', '01033333333', 0),
(5, 'zxcv', 'zxcv', '홍철수', '01044444444', 0),
(6, 'wert', 'wert', '이철수', '01012541234', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `product`
--

CREATE TABLE `product` (
  `no44` int(11) NOT NULL COMMENT '번호',
  `gubun_no44` int(11) DEFAULT NULL COMMENT '구분_번호',
  `name44` varchar(50) DEFAULT NULL COMMENT '제품명',
  `price44` int(11) DEFAULT NULL COMMENT '단가',
  `jaego44` int(11) DEFAULT NULL COMMENT '재고량',
  `pic44` varchar(255) DEFAULT NULL COMMENT '사진'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `product`
--

INSERT INTO `product` (`no44`, `gubun_no44`, `name44`, `price44`, `jaego44`, `pic44`) VALUES
(20, 10, '나이키', 49000, 6, '나이키.PNG'),
(22, 10, '반스', 39000, 950, '반스.PNG'),
(23, 12, '대너', 80000, 0, '대너.PNG'),
(24, 11, '호킨스', 120000, 9530, '호킨스.PNG'),
(25, 11, '누오보', 70000, -24, '누오보.PNG');

-- --------------------------------------------------------

--
-- 테이블 구조 `status`
--

CREATE TABLE `status` (
  `no44` int(11) NOT NULL,
  `lr44` tinyint(4) NOT NULL COMMENT '0=lend 1=return',
  `book_no44` int(11) NOT NULL,
  `person_no44` int(11) NOT NULL,
  `writeday44` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `status`
--

INSERT INTO `status` (`no44`, `lr44`, `book_no44`, `person_no44`, `writeday44`) VALUES
(10, 0, 2, 2, '2018-11-15'),
(11, 1, 9, 5, '2018-11-19'),
(12, 0, 6, 5, '2018-11-19');

-- --------------------------------------------------------

--
-- 테이블 구조 `temp`
--

CREATE TABLE `temp` (
  `no` int(11) NOT NULL,
  `book_no` int(11) DEFAULT NULL,
  `jaego` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `test`
--

CREATE TABLE `test` (
  `no44` int(11) NOT NULL,
  `coname44` char(50) DEFAULT NULL,
  `phone44` char(11) DEFAULT NULL,
  `gubun44` tinyint(4) DEFAULT NULL COMMENT '소매=0, 도매=1',
  `startday44` date DEFAULT NULL,
  `address44` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `test`
--

INSERT INTO `test` (`no44`, `coname44`, `phone44`, `gubun44`, `startday44`, `address44`) VALUES
(1, '민수주식회사', '016275 6251', 0, '1990-01-01', '서울 노원구 월계4동 산76 인덕대학 1'),
(2, '준효주식회사', '011948 8422', 1, '1990-01-02', '서울 노원구 월계4동 산76 인덕대학 2'),
(3, '인수주식회사', '010960 9753', 0, '1990-01-03', '서울 노원구 월계4동 산76 인덕대학 3'),
(4, '수민주식회사', '010918 4094', 0, '1990-01-04', '서울 노원구 월계4동 산76 인덕대학 4'),
(5, '윤주주식회사', '010997 5955', 1, '1990-01-05', '서울 노원구 월계4동 산76 인덕대학 5'),
(6, '향은주식회사', '011667 2296', 0, '1990-01-06', '서울 노원구 월계4동 산76 인덕대학 6'),
(7, '창재주식회사', '010948 7737', 0, '1990-01-07', '서울 노원구 월계4동 산76 인덕대학 7'),
(8, '범석주식회사', '011971 5378', 0, '1990-01-08', '서울 노원구 월계4동 산76 인덕대학 8'),
(9, '상준주식회사', '010732 2009', 1, '1990-01-09', '서울 노원구 월계4동 산76 인덕대학 9'),
(12, '철완주식회사', '010645 7732', 0, '1990-01-12', '서울 노원구 월계4동 산76 인덕대학 12'),
(13, '재규주식회사', '010647 5203', 0, '1990-01-13', '서울 노원구 월계4동 산76 인덕대학 13'),
(14, '인곤주식회사', '010478 5554', 1, '1990-01-14', '서울 노원구 월계4동 산76 인덕대학 14'),
(15, '정하주식회사', '010985 9065', 0, '1990-01-15', '서울 노원구 월계4동 산76 인덕대학 15'),
(16, '종현주식회사', '016979 3306', 0, '1990-01-16', '서울 노원구 월계4동 산76 인덕대학 16'),
(17, '상현주식회사', '010715 4587', 0, '1990-01-17', '서울 노원구 월계4동 산76 인덕대학 17'),
(18, '태영주식회사', '010466 4408', 0, '1990-01-18', '서울 노원구 월계4동 산76 인덕대학 18'),
(19, '영진주식회사', '010930 1589', 1, '1990-01-19', '서울 노원구 월계4동 산76 인덕대학 19'),
(20, '찬범주식회사', '010296 5430', 0, '1990-01-20', '서울 노원구 월계4동 산76 인덕대학 20'),
(21, '지은주식회사', '010959 9291', 0, '1990-01-21', '서울 노원구 월계4동 산76 인덕대학 21'),
(22, '준석주식회사', '010455 5202', 0, '1990-01-22', '서울 노원구 월계4동 산76 인덕대학 22'),
(23, '윤진주식회사', '010390 9563', 0, '1990-01-23', '서울 노원구 월계4동 산76 인덕대학 23'),
(24, '영진주식회사', '010474 1734', 0, '1990-01-24', '서울 노원구 월계4동 산76 인덕대학 24'),
(25, '진형주식회사', '010297 2055', 0, '1990-01-25', '서울 노원구 월계4동 산76 인덕대학 25'),
(26, '명한주식회사', '011173 1346', 1, '1990-01-26', '서울 노원구 월계4동 산76 인덕대학 26'),
(27, '동진주식회사', '010323 4657', 0, '1990-01-27', '서울 노원구 월계4동 산76 인덕대학 27'),
(28, '신영주식회사', '010325 3478', 0, '1990-01-28', '서울 노원구 월계4동 산76 인덕대학 28'),
(29, '윤성주식회사', '010222 3029', 0, '1990-01-29', '서울 노원구 월계4동 산76 인덕대학 29'),
(30, '재형주식회사', '010356 4500', 0, '1990-01-30', '서울 노원구 월계4동 산76 인덕대학 30'),
(31, '동우주식회사', '011291 4841', 0, '1990-01-31', '서울 노원구 월계4동 산76 인덕대학 31'),
(32, '진철주식회사', '010301 6722', 0, '1990-02-01', '서울 노원구 월계4동 산76 인덕대학 32'),
(35, '용석주식회사', '010659 6855', 0, '1990-02-04', '서울 노원구 월계4동 산76 인덕대학 35'),
(37, '민석주식회사', '019346 0587', 0, '1990-02-06', '서울 노원구 월계4동 산76 인덕대학 37'),
(38, '민식주식회사', '016441 4818', 0, '1990-02-07', '서울 노원구 월계4동 산76 인덕대학 38'),
(39, '호진주식회사', '010240 5919', 0, '1990-02-08', '서울 노원구 월계4동 산76 인덕대학 39'),
(40, '설희주식회사', '010757 9431', 0, '1990-02-09', '서울 노원구 월계4동 산76 인덕대학 40'),
(41, '혜미주식회사', '010245 7192', 0, '1990-02-10', '서울 노원구 월계4동 산76 인덕대학 41'),
(42, '상민주식회사', '010365 4343', 0, '1990-02-11', '서울 노원구 월계4동 산76 인덕대학 42'),
(43, '다운주식회사', '010353 7014', 1, '1990-02-12', '서울 노원구 월계4동 산76 인덕대학 43'),
(44, '일남주식회사', '010969 3915', 0, '1990-02-13', '서울 노원구 월계4동 산76 인덕대학 44'),
(45, '지우주식회사', '011910 7556', 0, '1990-02-14', '서울 노원구 월계4동 산76 인덕대학 45'),
(46, '승근주식회사', '010257 4787', 0, '1990-02-15', '서울 노원구 월계4동 산76 인덕대학 46'),
(47, '재승주식회사', '010809 2798', 0, '1990-02-16', '서울 노원구 월계4동 산76 인덕대학 47'),
(48, '승현주식회사', '010306 5979', 0, '1990-02-17', '서울 노원구 월계4동 산76 인덕대학 48'),
(49, '문현주식회사', '010275 5630', 0, '1990-02-18', '서울 노원구 월계4동 산76 인덕대학 49'),
(50, '헌시주식회사', '010202 3571', 0, '1990-02-19', '서울 노원구 월계4동 산76 인덕대학 50');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_Id`);

--
-- 테이블의 인덱스 `gubun`
--
ALTER TABLE `gubun`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `jangbu`
--
ALTER TABLE `jangbu`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`no44`);

--
-- 테이블의 인덱스 `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`no44`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 테이블의 AUTO_INCREMENT `food`
--
ALTER TABLE `food`
  MODIFY `food_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `gubun`
--
ALTER TABLE `gubun`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 테이블의 AUTO_INCREMENT `jangbu`
--
ALTER TABLE `jangbu`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 테이블의 AUTO_INCREMENT `person`
--
ALTER TABLE `person`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호', AUTO_INCREMENT=30;

--
-- 테이블의 AUTO_INCREMENT `status`
--
ALTER TABLE `status`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 테이블의 AUTO_INCREMENT `temp`
--
ALTER TABLE `temp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `no44` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
