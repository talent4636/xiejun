<?php

//实时显示输出 
ob_end_flush();//关闭缓存 
//echo str_repeat("　",256); //ie下 需要先发送256个字节 
set_time_limit(0); 
for($i=0;$i<10;$i++){ 
echo "Now Index is :". $i."<br>"; 
flush(); 
sleep(1); 
}
?>