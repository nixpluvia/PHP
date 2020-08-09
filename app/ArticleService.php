<?php
class ArticleService {
    // board 일괄 불러오기
    public static function getForPrintBoards(): array {
        return ArticleDao::getForPrintBoards();
    }

    // board id 불러오기
    public static function getBoardById(int $id) {
        return ArticleDao::getBoardById($id);
    }

    public static function getArticleById(int $id) {
        return ArticleDao::getArticleById($id);
    }

    // board code 선택
    public static function getBoardByCode(string $code) {
        return ArticleDao::getBoardByCode($code);
    }

    // board 삭제
    public static function deleteBoard(int $id) {
        ArticleDao::deleteBoard($id);
    }

    public static function deleteArticle(int $id) {
        ArticleDao::deleteArticle($id);
    }

    // board 생성
    public static function makeBoard($args) : int {
        return ArticleDao::makeBoard($args);
    }

    // board 수정
    public static function modifyBoard($args) {
        return ArticleDao::modifyBoard($args);
    }

    public static function modifyArticle($args) {
        return ArticleDao::modifyArticle($args);
    }

    public static function writeArticle($args) : int {
        return ArticleDao::writeArticle($args);
    }

    public static function getBoardName($boardId, &$boards) : string {
        foreach ( $boards as $board ){
            if( $boardId == $board['id'] ) {
                return $board['name'];
            }
        }

        return '';
    }

    public static function getDisplayStatusNames() {
        return [
            0 => '미노출',
            1 => '노출'
        ];
    }

    public static function getDisplayStatusName(int $displayStatus) : string {
        return static::getDisplayStatusNames()[$displayStatus];
    }

    public static function getForPrintListData($args) {
        if (isE($args, 'displayStatus') == false ) {
            $args['displayStatus'] = 1;
        }

        $totalCount = ArticleDao::getForPrintArticlesCount($args);
        $itemsInAPage = 5;

        $page = getArrValue($args, 'page', 1);

        $limitFrom = $itemsInAPage * ($page - 1);
        $limitTake = $itemsInAPage;

        $args['limitFrom'] = $limitFrom;
        $args['limitTake'] = $itemsInAPage;

        $articles = ArticleDao::getForPrintListArticles($args);

        $rsData = [];
        $rsData['articles'] = $articles;
        $rsData['Page'] = $page;
        $rsData['totalCount'] = $totalCount;
        $rsData['totalPage'] = ceil($rsData['totalCount'] / $itemsInAPage);
        
        return $rsData;
    }
}