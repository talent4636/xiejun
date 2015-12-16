<?php
set_time_limit(0);        
function _rand() {       
    $length=26;       
    $chars = "0123456789abcdefghijklmnopqrstuvwxyz";       
    $max = strlen($chars) - 1;       
    mt_srand((double)microtime() * 1000000);       
    $string = '';       
    for($i = 0; $i < $length; $i++) {       
        $string .= $chars[mt_rand(0, $max)];       
    }       
    return $string;       
}       
$HTTP_SESSION=_rand();       
echo $HTTP_SESSION;       
$HTTP_Server="www.baidu.com";       
$HTTP_URL="/";       
$ch = curl_init();       
curl_setopt ($ch,CURLOPT_URL,"http://".$HTTP_Server.$HTTP_URL);       
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);       
curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)");       
//curl_setopt($ch,CURLOPT_COOKIE,$HTTP_SESSION);       
$res = curl_exec($ch);       
curl_close ($ch);       
print_r($res); 

?>