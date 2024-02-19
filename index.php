<?php
$string = file_get_contents('http://ipinfo.io/8.8.8.8/geo');
var_dump($string);
$ipaddress = $_SERVER["REMOTE_ADDR"];
var_dump($ipaddress); 
$string2 = file_get_contents('http://ipinfo.io/'.$ipaddress.'/geo');
var_dump($string2);
?>