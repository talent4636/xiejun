<?php

echo "<h3>函数列表：</h3>";
$dir = './';
$fileList = scandir($dir);
$href = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."show.php?function=%s";
foreach($fileList as $fileName){
    if(substr($fileName,0,1) != '.' && $fileName != 'index.php' && $fileName != 'show.php'){
        echo '<a href="'.sprintf($href,$fileName).'" target="_blank">'.$fileName." </a><br> ";
    }
}

?>
