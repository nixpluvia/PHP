<?php

$config = [];
$config['needToLogin'] = false;



// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$member = MemberService::getMemberByLoginId($_REQUEST['loginId']);

if ( empty($member)){
    jsAlert("해당 회원은 존재하지 않습니다.");
    jsHistoryBack();
}

if ( $member['loginPw'] != $_REQUEST['loginPw']){
    jsAlert("비밀번호가 일치하지 않습니다.");
    jsHistoryBack();
}


$_SESSION['loginedMemberId'] = $member['id'];
$_SESSION['loginedMember'] = $member;

jsAlert("{$member['name']}님 안녕하세요.");
jsLocationReplace("/adm/home/main.php");