<form action="robote.php" method="post">
<input type='text' value='' name='ask' />
<input type='submit' value='go'>
</form>

<?php
if($_POST){
    $ch = curl_init();
    #$url = 'http://apis.baidu.com/apistore/weatherservice/citylist?cityname=%E6%9C%9D%E9%98%B3';
    $info = urlencode($_POST['ask']);
    $key = '0d8b8b1451f6ad5537eef9a0ad5ba170';
    $userid = 'test';
    $url = 'http://apis.baidu.com/turing/turing/turing?key='.$key.'&info='.$info.'&userid='.$userid;
    $header = array(
            'apikey:5c3602f8376fce34c4ac25382454200f',
            );
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    $res = json_decode($res,1);
    echo "\n".$res['text']."\n";
}
?>

