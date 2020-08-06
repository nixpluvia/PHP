<?php

class App {
    public static function isLogined(): bool {
        if ( isset($_SESSION['loginedMemberId']) ){
            return ture;
        }
        return false;
    }
}

class MemberService {
    public static function getMemberByLoginId(string $loginId): array {
        return MemberDao::getMemberByLoginId($loginId);
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