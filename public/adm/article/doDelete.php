<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$article = ArticleService::getArticleById($_REQUEST['id']);

if ( empty($article)){
    jsAlert("존재하지 않는 게시물 입니다");
    jsHistoryBack();
}

ArticleService::deleteArticle($_REQUEST['id']);

jsAlert("{$_REQUEST['id']}번 게시판이 삭제되었습니다");
jsLocationReplace("/adm/board/list.php");