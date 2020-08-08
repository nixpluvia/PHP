<?php
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


    public static function getForPrintArticlesCount($args) : int{
        $sql = "
        SELECT COUNT(*) AS cnt
        FROM article
        WHERE displayStatus = 1
        ";

        if ( isE($args, 'boardId') ) {
            $sql .= "
            AND boardId = '{$args['boardId']}'
            ";
        }

        if ( isE($args, 'title') ) {
            $sql .= "
            AND title LIKE CONCAT('%', '{$args['title']}', '%')
            ";
        }

        if ( isE($args, 'body') ) {
            $sql .= "
            AND body LIKE CONCAT('%', '{$args['body']}', '%')
            ";
        }

        return DB__getDBRowIntValue($sql, 0);
    }

    public static function getForPrintListArticles($args){
        $sql = "
        SELECT A.*, B.name AS boardName
        FROM article AS A
        INNER JOIN board AS B
        ON A.boardId = B.id
        WHERE displayStatus = 1
        ";

        if ( isE($args, 'boardId') ) {
            $sql .= "
            AND boardId = '{$args['boardId']}'
            ";
        }

        if ( isE($args, 'title') ) {
            $sql .= "
            AND title LIKE CONCAT('%', '{$args['title']}', '%')
            ";
        }

        if ( isE($args, 'body') ) {
            $sql .= "
            AND body LIKE CONCAT('%', '{$args['body']}', '%')
            ";
        }

        $sql .="
        ORDER BY A.id DESC
        LIMIT {$args['limitFrom']}, {$args['limitTake']}
        ";

        return DB__getDBRows($sql);
    }
}