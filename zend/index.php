<?php
 /**
 *
 * @author 70 <http://www.qiling.org>
 * @version 1.0.0
 */
error_reporting(E_ALL);

header("Content-Type: text/html; charset=utf-8");
 if ($_REQUEST['action']=='bomp') {    
    
    
    if ($_FILES["file"]){
 //         print_r($_FILES);
        
        move_uploaded_file($_FILES["file"]["tmp_name"],"temp/" . $_FILES["file"]["name"]);
        $path = "temp/" . $_FILES["file"]["name"];
    }
    
    
    
    $decodingurl = $_REQUEST['decodingurl'];
    $captcha = $_REQUEST['captcha'];
    $cookies = $_REQUEST['cookies'];
    $query['MAX_FILE_SIZE'] = 2097152;
    $query['decodingurl'] = $decodingurl;
    $query['upload'] = '@'.dirname(__FILE__).'/'.$path;
    $query['captcha'] = $captcha;
 //     print_r($query);
    
 //     echo $data;
    
    $url = 'http://www.showmycode.com/';
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt(  $ch, CURLOPT_REFERER, "http://www.showmycode.com");
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $query );
    curl_setopt ( $ch, CURLOPT_COOKIE, $cookies );
    $result = curl_exec ( $ch ); // 
    curl_close ( $ch );
    
    $result = explode('<title>', $result);
    $result = explode('</title>', $result[1]);
    
    
    
    echo $result[0].', Here is the result:<br/>';
    
    
    
    
    
    
    
    
    $url = 'http://www.showmycode.com/?download';
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt(  $ch, CURLOPT_REFERER, "http://www.showmycode.com");
 //     curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_COOKIE, $cookies );
    $result = curl_exec ( $ch ); //
    curl_close ( $ch );
    echo "<textarea style='width:100%;height:80%;'>{$result}</textarea>";
    
    exit();
 }
$url = "http://www.showmycode.com/?c";
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_HEADER, 1 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt(  $ch, CURLOPT_REFERER, "http://www.showmycode.com");
curl_setopt ( $ch, CURLOPT_POST, 0 );
$result = curl_exec ( $ch ); // 
curl_close ( $ch );
 // echo $result;
list ( $header1, $body ) = explode ( "\r\n\r\n", $result );
preg_match_all ( '/set\-cookie:([^;]*)/i', $header1, $matches );
echo "<img src='data:image/jpeg;base64,".urlencode(base64_encode($body))."' />";
$cookies = trim($matches[1][1]);
echo "<form method='post' enctype='multipart/form-data'>";
echo "action:<input name='action' value='bomp' /><br/>";
echo "cookies:<input name='cookies' value='{$cookies}' /><br/>";
echo "file:<input type='file' name='file' /><br/>";
echo "decodingurl:<input name='decodingurl' value='' /><br/>";
echo "captcha:<input name='captcha' value='' /><br/>";
echo "<input type='submit' value='Start Bomp' />";
echo "<input type='reset' value='reset' />";
echo "</form>";
