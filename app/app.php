<?php

class App {
    public static function isLogined(): bool {
        if ( isset($_SESSION['loginedMemberId']) ){
            return true;
        }
        return false;
    }
}

class ArticleService {
    // board 일괄 불러오기
    public static function getForPrintBoards(): array {
        return ArticleDao::getForPrintBoards();
    }

    // board id 불러오기
    public static function getBoardById(int $id) {
        return ArticleDao::getBoardById($id);
    }

    // board code 선택
    public static function getBoardByCode(string $code) {
        return ArticleDao::getBoardByCode($code);
    }

    // board 삭제
    public static function deleteBoard(int $id) {
        ArticleDao::deleteBoard($id);
    }

    // board 생성
    public static function makeBoard($args) : int {
        return ArticleDao::makeBoard($args);
    }

    // board 수정
    public static function modifyBoard($args) {
        return ArticleDao::modifyBoard($args);
    }
}

class MemberService {
    public static function getMemberByLoginId(string $loginId): array {
        return MemberDao::getMemberByLoginId($loginId);
    }
}


class ArticleDao {
    // board 일괄 불러오기
    public static function getForPrintBoards(): array {
        $sql = "
        SELECT *
        FROM board
        ORDER BY id DESC
        ";

        return DB__getDBRows($sql);
    }

    // board id 불러오기
    public static function getBoardById(int $id) {
        $sql = "
        SELECT *
        FROM board
        WHERE id = '{$id}'
        ";

        return DB__getDBRow($sql);
    }

    // board code 선택
    public static function getBoardByCode(string $code) {
        $sql = "
        SELECT *
        FROM board
        WHERE code = '{$code}'
        ";

        return DB__getDBRow($sql);
    }


    // board 삭제
    public static function deleteBoard(int $id) {
        $sql = "
        DELETE FROM board
        WHERE id = '{$id}'
        ";

        DB__delete($sql);
    }

    public static function makeBoard($args) : int {
        $sql = "
        INSERT INTO board
        SET regDate = NOW(),
        updateDate = NOW(),
        `name` = '${args['name']}',
        `code` = '${args['code']}'
        ";

        return DB__insert($sql);
    }

    public static function modifyBoard($args) {
        $sql = "
        UPDATE board
        SET updateDate = NOW(),
        `name` = '${args['name']}',
        `code` = '${args['code']}'
        WHERE id = '${args['id']}'
        ";

        DB__update($sql);
    }
}

class MemberDao {
    public static function getMemberByLoginId(string $loginId): array {
        $sql = "
        SELECT *
        FROM member
        WHERE loginId = '{$loginId}'
        ";

        return DB__getDBRow($sql);
    }
}

