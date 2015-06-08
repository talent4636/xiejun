<?php

//static clonms define;
$fileDir = "/Users/xiejun/Desktop/file.txt";
$mark = is_writeable($fileDir);
if (!$mark){
    exit('文件“'.$fileDir."”\r\n<br/>不存在或者不可写，请检查先！");
}else{
    $fp = fopen($fileDir,'w');
    $msg = 'write succ'."\n".'this should be the second line.';
    //this way means clean old file content and write
    fwrite($fp,$msg);
    fclose($fp);
}

?>

