<?php
define("DB_HOST", "127.0.0.1");
define("DB_ID","sbsst");
define("DB_PW","sbs123414");
define("DB_NAME","phpSiteTemplate");


if ( isset($config) == false ) {
    $config = [];
}


$config['dbConn'] = mysqli_connect(DB_HOST,DB_ID,DB_PW,DB_NAME) or die ("DB CONNECTION ERROR");


$config['siteName'] = '피부과';
?>