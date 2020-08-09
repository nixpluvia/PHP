<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$board = ArticleService::getBoardById($_REQUEST['boardId']);

if ( empty($board) ){
    jsAlert("존재하지 않는 게시판 입니다.");
    jsHistoryBack();
}

$article = ArticleService::getArticleById($_REQUEST['id']);

if ( empty($article) ){
    jsAlert("존재하지 않는 게시물 입니다.");
    jsHistoryBack();
}

ArticleService::modifyArticle($_REQUEST);

jsAlert("{$_REQUEST['id']}번 게시물이 수정되었습니다.");
jsLocationReplace("/adm/article/detail.php?id={$_REQUEST['id']}");