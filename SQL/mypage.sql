DROP TABLE IF EXISTS `mypage`;
CREATE TABLE `mypage`(
    `number` int(4) NOT NULL AUTO_INCREMENT,
    `id` char(10) NOT NULL,
    `pw` char(200) NOT NULL,
    `kt` enum('검색','학습','취미','금융','쇼핑','기타'),
    `title` char(20) NOT NULL,
    `url` char(100) NOT NULL,
    `date` DATE NOT NULL,
    `info` char(50) NOT NULL,
    `checknum` TINYINT(5) NOT NULL,
    PRIMARY KEY(`number`),
    KEY `idx_title` (`title`),
    KEY `idx_url` (`url`)
) AUTO_INCREMENT=1005;

INSERT INTO `mypage` value ('1', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', '1');
INSERT INTO `mypage` value ('1000', 'pp1', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', '0');
INSERT INTO `mypage` value ('1001', 'pp2', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', '0');
INSERT INTO `mypage` value ('1002', 'pp3', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', '0');
INSERT INTO `mypage` value ('1003', 'pp4', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', '0');
INSERT INTO `mypage` value ('1004', 'pp5', '674f3c2c1a8a6f90461e8a66fb5550ba', '검색', '네이버', 'http://www.naver.com', '2021-04-01', '내가 자주 사용하는 검색 포털', '0');