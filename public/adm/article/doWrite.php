<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$board = ArticleService::getBoardById($_REQUEST['boardId']);

if ( empty($board) ){
    jsAlert("존재하지 않는 게시판 입니다.");
    jsHistoryBack();
}


$_REQUEST['memberId'] = $_SESSION['loginedMemberId'];
$id = ArticleService::writeArticle($_REQUEST);

jsAlert("{$id}번 게시물이 작성되었습니다.");
jsLocationReplace("/adm/article/list.php");