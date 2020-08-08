<?php
class MemberService {
    public static function getMemberByLoginId(string $loginId): array {
        return MemberDao::getMemberByLoginId($loginId);
    }
}