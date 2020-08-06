<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';


unset($_SESSION['loginedMemberId']);
unset($_SESSION['loginedMember']);

jsAlert("로그아웃 되었습니다.");
jsLocationReplace("/adm/member/login.php");