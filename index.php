<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="icon.png" rel="shortcut icon" type="image/x-icon" />
		<link href="css.css" rel="stylesheet"/>
    </head>
    <body>
    	<div class="body">
            <div class="header">
        		<span class="huge">谢俊的个人电脑</span>
				<a href="otherphp/version.php"><p class="middle">关于各种版本的说明</p></a>
        		<br/>
        		<span class="middle">在这里可以下载：</span>
        	</div>
        	<div class="main" id="main">
<?php 
    //获取到download下的所有文件及下载链接，直接打印   有点挫  2014/9/24 11:59:45
    $hostdir=dirname(__FILE__).'/download';
    $a_link = '/download';
    $filesnames = scandir($hostdir);
    foreach ($filesnames as $key => $value) {
        if (in_array($value, array('.','..'))) {
            continue;
        }
        $value = iconv('GB2312','UTF-8',$value);
        echo '<a href="'.$a_link.'/'.$value.'">'.$value.'</a><br/>';
        unset($value);
    }
?>
        	</div>
        	<div class="footer"></div>
        </div>
    </body>
</html>