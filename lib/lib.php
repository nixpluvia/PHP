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

function DB__getDBRows($sql){
    $rs = DB__execute($sql);
    
    $rows = [];

    while ($row = mysqli_fetch_assoc($rs)) {
        $rows[] = $row;
    }

    return $rows;
}

function DB__getDBRow($sql){
    $rows = DB__getDBRows($sql);

    if (isset($rows[0])) {
        return $rows[0];
    }

    return [];
}

function filterSqlInjection(&$args){
    global $config;
    foreach ( $args as $key => $val ) {
        $args[$key] = mysqli_real_escape_string($config['dbConn'], $val);
    }
}