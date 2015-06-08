<?php

$host = '127.0.0.1';
$dbuser = 'root';
$dbpasswd = 'passw0rd';
$dbname = 'test';

//mysql_connect(servername,username,password);
$connect = @mysql_connect($host,$dbuser,$dbpasswd);
// var_dump($connect);exit;
if (!$connect) {
    die('connect mysql fail, please check config params.');
}else {
    echo 'connect mysql succesful. <hr>';
}

mysql_query("SET NAMES UTF8");
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8");

//执行mysql
$sql = 'select * from ecstore.sdb_b2c_members';
// $sql = 'select email,addon from ecstore.sdb_b2c_members';
$query = @mysql_query($sql, $connect);
// $fetch = @mysql_fetch_array($query);
$j = 0;
while ($row = @mysql_fetch_array($query)) {
    $i = 0;
    foreach ($row as $key => $value) {
        $i++;
        if ($i%2 == 0) {
            $data[$j][$key] = $value;
        }
    }
    $j = $j+1;
    unset($row);
}
echo "<pre>";
print_r($data);

//关闭mysql连接
mysql_close($connect);
?>