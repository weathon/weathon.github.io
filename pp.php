<?php

//$HTTP_SERVER_VARS 与  getenv的区别      getenv不支持IIS的isapi方式运行的PHP
//$_SERVER在 PHP 4.1.0 及以后版本使用。之前的版本，使用 $HTTP_SERVER_VARS。
if ($_SERVER["HTTP_X_FORWARDED_FOR"]) { //#透过代理服务器取得客户端的真实 IP 地址
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} elseif ($_SERVER["HTTP_CLIENT_IP"]) { //#客户端IP
    $ip = $_SERVER["HTTP_CLIENT_IP"];
} elseif ($_SERVER["REMOTE_ADDR"]) { //#正在浏览当前页面用户的 IP 地址
    $ip = $_SERVER["REMOTE_ADDR"];
} elseif (getenv("HTTP_X_FORWARDED_FOR")) {  //#透过代理服务器取得客户端的真实 IP 地址
    $ip = getenv("HTTP_X_FORWARDED_FOR");
} elseif (getenv("HTTP_CLIENT_IP")) {  //#客户端IP
    $ip = getenv("HTTP_CLIENT_IP");
} elseif (getenv("REMOTE_ADDR")) {  //#正在浏览当前页面用户的 IP 地址
    $ip = getenv("REMOTE_ADDR");
} else {
    $ip = "Unknown";
}

// echo "IP: ".$ip;

$filename="ip.js";
$handle=fopen($filename,"a+");
$str=fwrite($handle,$ip."\n"."\n");
 fclose($handle);