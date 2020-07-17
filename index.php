<?php
require_once __DIR__ . '/src/functions.php';
$link = $_SERVER['REDIRECT_URL'];
$query = $_SERVER['QUERY_STRING'];
$path = str_replace("/user-management/", "", $link);
if(file_exists($path . ".php" )){
    require_once __DIR__ .'/'.$path . '.php' ;
}
else{
    http_response_code(404);
    include('404-not-found.php');
    die();
}


?>