<?php 

$pwd = '123456';
$username = 'test';
#$time = '1464687580';
$time = '1449847008';//本地 test 注册时间

function extends_md5($source_str,$username,$createtime)
{
    $string_md5 = md5(md5($source_str).$username.$createtime);
    $front_string = substr($string_md5,0,31);
    $end_string = 's'.$front_string;
    return $end_string;
}

echo "username:$username\n";
echo "pwd:$pwd\n";
echo "time:".$time."\n";
echo extends_md5($pwd,$username,$time);


