<?php
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