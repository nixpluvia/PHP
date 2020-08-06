<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = "관리자 메인";
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

?>

<div class="con">
    <a href="/adm/member/doLogout.php">로그아웃</a>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
?>