<?php

function jsAlert(string $msg){
    echo "<script>alert('{$msg}')</script>" ;
}

function jsLocationReplace(string $url){
    echo "<script> location.replace('{$url}'); </script>" ;
    exit;
}

function jsHistoryBack(){
    echo "<script> history.back(); </script>" ;
    exit;
}







function DB__execute($sql){
    global $config;
    return mysqli_query($config['dbConn'], $sql);
}

function DB__insert($sql){
    global $config;
    DB__execute($sql);
    return mysqli_insert_id($config['dbConn']);
}

function DB__update($sql){
    DB__execute($sql);
}

function DB__delete($sql){
    DB__execute($sql);
}

// 값 여러개 출력
function DB__getDBRows($sql){
    $rs = DB__execute($sql);
    
    $rows = [];

    while ($row = mysqli_fetch_assoc($rs)) {
        $rows[] = $row;
    }

    return $rows;
}

// 단일 값 출력
function DB__getDBRow($sql){
    $rows = DB__getDBRows($sql);

    if (isset($rows[0])) {
        return $rows[0];
    }

    return [];
}

function DB__getDBRowIntValue($sql, $default) : int{
    $row = DB__getDBRow($sql);

    if ( empty($row) ) {
        return $default;
    }
    
    foreach ( $row as $val ) {
        return $val;
    }
}

function DB__getDBRowStringValue($sql, $default) : string{
    $row = DB__getDBRow($sql);

    if ( empty($row) ) {
        return $default;
    }
    
    foreach ( $row as $val ) {
        return $val;
    }
}

function filterSqlInjection(&$args){
    global $config;
    foreach ( $args as $key => $val ) {
        $args[$key] = mysqli_real_escape_string($config['dbConn'], $val);
    }
}

function getArrValue(&$arr, $key, $default) {
    if ( isset($arr[$key]) ) {
        return $arr[$key];
    }

    return $default;
}




function getNewUrI(string $url, string $paramKey, string $paramValue){
    $urlInfo = getUrlInfo($url);

    $urlInfo['queryParams'][$paramKey] = $paramValue;

    return $urlInfo['url'] . '?' . getQueryStringFromParam( $urlInfo['queryParams'] );
}

function getQueryStringFromParam($params) : string {
    $queryStr = '';
    
    foreach( $params as $key => $val) {
        if ($queryStr) {
            $queryStr .= '&';
        }
        $queryStr .= $key . '=' . $val;
    }

    return $queryStr;
}

function getUrlInfo(string $url) {
    if (strpos($url, '?') === false ) {
        $url .= "?";
    }
    
    list($url, $queryStr) = explode('?', $url);

    $queryStrBtis = explode('&', $queryStr);

    $queryParams = [];
    foreach ( $queryStrBtis as $paramStr) {
        $paramStrBits = explode('=', $paramStr);

        $key = $paramStrBits[0];
        if( $key ) {
            $value = '';
            if ( isset($paramStrBits[1]) ) {
                $value = $paramStrBits[1];
            }
            $queryParams[$key] = $value;
        }
    }


    $info = [];
    $info['url'] = $url;
    $info['queryStr'] = $queryStr;
    $info['queryParams'] = $queryParams;

    return $info;
}

function isE(&$arr, $key) {
    if ( !isset($arr[$key]) ) {
        return false;
    }

    if ( $arr[$key] === '' ) {
        return false;
    }

    return true;
}