<?php

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
echo "Connection to server success.\n";
echo "Server is running: ".$redis->ping();


?>
