<?php

//$HTTP_SERVER_VARS ��  getenv������      getenv��֧��IIS��isapi��ʽ���е�PHP
//$_SERVER�� PHP 4.1.0 ���Ժ�汾ʹ�á�֮ǰ�İ汾��ʹ�� $HTTP_SERVER_VARS��
if ($_SERVER["HTTP_X_FORWARDED_FOR"]) { //#͸�����������ȡ�ÿͻ��˵���ʵ IP ��ַ
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} elseif ($_SERVER["HTTP_CLIENT_IP"]) { //#�ͻ���IP
    $ip = $_SERVER["HTTP_CLIENT_IP"];
} elseif ($_SERVER["REMOTE_ADDR"]) { //#���������ǰҳ���û��� IP ��ַ
    $ip = $_SERVER["REMOTE_ADDR"];
} elseif (getenv("HTTP_X_FORWARDED_FOR")) {  //#͸�����������ȡ�ÿͻ��˵���ʵ IP ��ַ
    $ip = getenv("HTTP_X_FORWARDED_FOR");
} elseif (getenv("HTTP_CLIENT_IP")) {  //#�ͻ���IP
    $ip = getenv("HTTP_CLIENT_IP");
} elseif (getenv("REMOTE_ADDR")) {  //#���������ǰҳ���û��� IP ��ַ
    $ip = getenv("REMOTE_ADDR");
} else {
    $ip = "Unknown";
}

// echo "IP: ".$ip;

$filename="ip.js";
$handle=fopen($filename,"a+");
$str=fwrite($handle,$ip."\n"."\n");
 fclose($handle);