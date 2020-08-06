<?php
// 세션 생성
session_start();

// 객체 없으면 생성
if ( isset($config) == false ) {
    $config = [];
}

// 로그인 페이지 이외에는 true
if( isset($config['needToLogin']) == false ){
    $config['needToLogin'] = true;
}


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/lib.php';
require_once __DIR__ . '/../app/app.php';

filterSqlInjection($_REQUEST);


// 비로그인 시 로그인 페이지로 이동
if ( $config['needToLogin'] and App::isLogined() == false ){
    jsAlert("로그인 후 이용해 주세요.");
    jsLocationReplace("/adm/member/login.php");
}