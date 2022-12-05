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

-- 테이블 데이터 c12st13.student:18 rows 내보내기
DELETE FROM `student`;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `name`, `address`, `department`, `introduction`, `number`) VALUES
	(1, '이숙경', '청주', '컴퓨터공학과', '저는 컴퓨터 공학과에 다닙니다. computer', '0212031'),
	(2, '박재숙', '서울', '영문과', '저는 영문과에 다닙니다.', '0512321'),
	(3, '백태호', '경주', '컴퓨터공학과', '저는 컴퓨터 공학과에 다니고 경주에서 왔습니다.', '0913134'),
	(4, '김경훈', '제천', '국문과', '제천이 고향이고 국문과에 다닙니다.', '9813413'),
	(6, '김경진', '제주', '국문과', '이번에 국문과에 입학한 김경진이라고 합니다. 제주에서 왔어요.', '0534543'),
	(7, '박경호', '제주', '국문과', '박경호입니다. 잘 부탁드립니다.', '0134511'),
	(8, '김정인', '대전', '영문과', '김정인입니다. 대전에서 왔고, 영문과에 다닙니다.', '0034543'),
	(9, '김하늘', '안산', '컴퓨터공학과', '안녕', '111111'),
	(10, '권슬기', '시흥', '전자공학과', '안녕', '1111111'),
	(11, '조대룡', '서울', '국문과', '하이자드', '5555'),
	(12, '김장현', '안산', '영문과', '안녕 장연이야', '111111111'),
	(13, '김은진', '안산', '전자공학과', '안녕 은진이야', '5565656'),
	(16, '김하나', '수원', '컴퓨터공학과', '안녕 김하나야', '22222222'),
	(15, '양시숙', '안산', '국문과', '안녕 시숙이야', '12323'),
	(19, '은진', '국문', '', '1234', '2323'),
	(18, '채시윤', '수원', '국문과', '안녕 시윤이야', '21212'),
	(20, '김은진', '휴', '', '휴', '휴'),
	(21, '', '', '', '', '');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
