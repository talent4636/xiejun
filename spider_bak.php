<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Time: 15/9/8 上午12:23
 */

include_once('simple_html_dom.php');
define('PATH_DOWNLOAD', './download_bak/');
define('START',63);
define('STEP',2);
if(!file_exists(PATH_DOWNLOAD)){
    mkdir(PATH_DOWNLOAD);
}

$time_start = time();
set_time_limit(0);
ob_end_clean();
echo str_pad('', 2048);
#$url = "http://wanimal1983.tumblr.com";
$url = "http://wanimal1983.org";

for($i=(int)START;$i<(int)(START+STEP);$i++){

    if($i==1){
        $target_url = $url;
    }else{
        $target_url = $url.'/page/'.$i;
    }

    //验证url合法性
    if(!preg_match('/^https?:\/\/[a-zA-Z0-9\-\.]+/i', $target_url)){
        echo '<p><font color="red">执行失败!URL不合法!</font></p>';
        exit();
    }

    $html = new simple_html_dom($target_url);
    $html->load($target_url);
    var_dump($html->find('img'));exit;
    #$html->load_file($target_url);
    if(!$html || empty($html)){continue;}
    unset($target_url);
    $time_load = time();

    /**
     * <img class="slide-item-img" style="height: 600px;"
     * src="http://shop.vivo.com.cn/public/images/22/14/78/cab9f4f57bba94d74dafff229f3ac159.jpg?1440638921#w"
     * title="">
     */

    // 查找图片
    $images = array();
    print_r($html->find('img'));exit;
    foreach($html->find('img') as $key => $post)
    {
        if(strpos($post->src,'media.tumblr.com')){
            $images[$key] = $post->src;//$domain.
        }
    }
    echo '<li><font color="black">第'.$i.'个页面共有：<font color="blue"><b> ' . count($images) . ' </b></font>张图片</font></li>';
    flush();

//    header('Content-type: text/html; charset=utf-8');

    @error_log("\n\n(".count($images).")\n",3,'./image_url.log');

    if(!empty($images)){
        foreach($images as $k => $v){
            saveImg($v,$i.'_'.($k));
            @error_log("[".$i.'-'.($k)."]".$v."\n",3,'./image_url.log');
            echo '<li><font color="black">第'.$i.'个页面的第'.$k.'张图片保存完成...</font></li>';
            flush();
        }
    }

    unset($html);

//    echo "<pre>";
//    print_r($images);
}

//保存图片
function saveImg($img_url,$filename){
    if(!$filename){return ;}
    $ext=strrchr($img_url,".");
    $filename = PATH_DOWNLOAD.$filename.$ext;
    ob_start();
    readfile($img_url);
    $img = ob_get_contents();
    ob_end_clean();
    $size = strlen($img);
    $fp2=@fopen($filename, "a");
    fwrite($fp2,$img);
    fclose($fp2);

    return $filename;

}
