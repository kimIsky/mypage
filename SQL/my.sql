-- --------------------------------------------------------
-- 호스트:                          pager.kr
-- 서버 버전:                        10.1.44-MariaDB-0ubuntu0.18.04.1 - Ubuntu 18.04
-- 서버 OS:                        debian-linux-gnu
-- HeidiSQL 버전:                  11.2.0.6262
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 테이블 데이터 c12st13.mypage:~7 rows (대략적) 내보내기
DELETE FROM `mypage`;
/*!40000 ALTER TABLE `mypage` DISABLE KEYS */;
INSERT INTO `mypage` (`number`, `id`, `pw`, `kt`, `title`, `url`, `date`, `info`, `checknum`) VALUES
	(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', 1),
	(1000, 'pp1', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '구글', 'http://www.google.com', '2021-04-01', '내가 자주 사용하는 검색 포털', 0),
	(1001, 'pp2', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', 0),
	(1002, 'pp3', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', 0),
	(1003, 'pp4', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', 0),
	(1004, 'pp5', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', 0),
	(1005, 'admin', '674f3c2c1a8a6f90461e8a66fb5550ba', '쇼핑', '11번가', 'http://11st.co.kr', '2021-04-19', '자주 사용하는 쇼핑', 0);
/*!40000 ALTER TABLE `mypage` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
