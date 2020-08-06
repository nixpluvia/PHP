<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$board = ArticleService::getBoardByid($_REQUEST['id']);

if ( empty($board) ){
    jsAlert("존재하지 않는 게시판 입니다.");
    jsHistoryBack();
}

ArticleService::modifyBoard($_REQUEST);

jsAlert("게시판이 수정되었습니다");
jsLocationReplace("/adm/board/list.php");