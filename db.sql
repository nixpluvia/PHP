DROP DATABASE IF EXISTS phpSiteTemplate;
CREATE DATABASE phpSiteTemplate;
USE phpSiteTemplate;

SHOW TABLES;

CREATE TABLE `member` (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    loginId CHAR(50) NOT NULL UNIQUE, # 로그인 아이디
    loginPw CHAR(200) NOT NULL, # 로그인 비번
    `name` CHAR(100) NOT NULL, # 이름
    `nickname` CHAR(100) NOT NULL, # 닉네임
    `email` CHAR(100) NOT NULL, # 이메일
    `phone` CHAR(20) NOT NULL # 휴대전화번호
);

# 관리자 회원 생성
INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'admin',
loginPw = 'admin',
`name` = '관리자',
`nickname` = '관리자';


CREATE TABLE board (
    id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    `name` CHAR(100) NOT NULL, # 게시판 이름
    `code` CHAR(20) UNIQUE NOT NULL # 게시판 코드
);

# 게시판 생성
INSERT INTO `board`
SET regDate = NOW(),
updateDate = NOW(),
`name` = '공지사항',
`code` = 'notice';

# 게시판 생성
INSERT INTO `board`
SET regDate = NOW(),
updateDate = NOW(),
`name` = '자유게시판',
`code` = 'free';


CREATE TABLE article(
    id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    parentId INT(10) UNSIGNED NOT NULL,
    boardId INT(10) UNSIGNED NOT NULL, # 게시판 ID
    memberId INT(10) UNSIGNED NOT NULL, # 작성자 ID
    `title` CHAR(100) NOT NULL, # 제목
    `body` TEXT NOT NULL, # 내용
    displayStatus TINYINT(1) UNSIGNED NOT NULL, # 노출상태
    delStatus TINYINT(1) UNSIGNED NOT NULL, # 삭제상태
    delDate DATETIME NOT NULL, # 삭제날짜
    cateCode CHAR(20) NOT NULL, # 1차 카테고리
    cate2Code CHAR(20) NOT NULL, # 2차 카테고리
    readStatus TINYINT(1) UNSIGNED NOT NULL, # 수신자의 읽은 상태
    readDate DATETIME NOT NULL, # 수신자의 읽은 날짜
    completeStatus TINYINT(1) UNSIGNED NOT NULL, # 완료상태
    completeDate DATETIME NOT NULL, # 완료날짜
    writerName CHAR(20) NOT NULL, # 작성자 이름
    writerEmail CHAR(100) NOT NULL, # 작성자 이메일
    writerPhone CHAR(20) NOT NULL, # 작성자 휴대폰 번호
    writerSnsType CHAR(20) NOT NULL, # 작성자 SNS 타입
    writerSnsId CHAR(20) NOT NULL # 작성자 SNS ID
);

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 2,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 2,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 2,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 2,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 2,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 2,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '제목1',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '힘내',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '바이',
`body` = '내용1';

# 게시물 생성
INSERT INTO `article`
SET regDate = NOW(),
updateDate = NOW(),
boardId = 1,
memberId = 1,
displayStatus = 1,
`title` = '안녕',
`body` = '내용1';