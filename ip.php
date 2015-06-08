<?php

echo  ceil(floatval('283.60') * 100);
exit;
$ip1 = '127.0.0.1';
$ip2 = '192.168.1.152';
$ip3 = '10.14.21.1';
$ip4 = '121.15.12.1';
echo decbin(168);echo "<br/>";
echo decbin(31);echo "<br/>";
echo decbin(255>>2); echo "<br/>";

echo decbin(ip2long($ip2)); echo "<hr/>";
var_dump(ip2long($ip1));echo "<br/>";
var_dump(ip2long($ip2));echo "<br/>";
var_dump(ip2long($ip3));echo "<br/>";
var_dump(ip2long($ip4));
?>