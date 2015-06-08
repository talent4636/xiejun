<!DOCTYPE html>
<html>
<head>
    <title>二维码生成器</title>
</head>
<body style="">
    <div style="width:850px;margin:auto;background-color:#ddd;padding:10px;border:1px dashed #000;border-radius: 5px;" style="">
        <h2>生成二维码</h2>
        <form action="code.php?<?php echo time()?>" method="POST" >
            <table>
                <tr><td>转换的字符</td><td><input name="text" style="width:600px;" value="http://www.baidu.com" placeholder="输入请求url地址"></td></tr>
                <tr>
                    <td>容错率</td>
                    <td>
                        <select name="level">
                            <option value="QR_ECLEVEL_L">7%</option>
                            <option value="QR_ECLEVEL_M">15%</option>
                            <option value="QR_ECLEVEL_Q">25%</option>
                            <option value="QR_ECLEVEL_H">30%</option>
                        </select>
                    </td>
                </tr>
                <tr><td>图片大小</td><td><input type="text" name="size" value="8" placeholder="请输入数字"></td></tr>
                <tr><td>周围留白大小</td><td><input type="text" name="margin" value="0" placeholder="请输入数字"></td></tr>
                <tr>
                    <td>保存并显示</td>
                    <td>true</td>
                </tr>
                <tr><td></td><td><input type="submit" value="生成" ></td></tr>
            </table>
        </form>

    </div>


</body>
</html>

<?php

include 'phpqrcode/phpqrcode.php';
if(@$_POST){
    QRcode::png($_POST['text'],'code.png',$_POST['level'],$_POST['size'],$_POST['margin']);
    exit('<div style="width:860px;margin:0 auto;padding:30px;"><img style="border:1px solid #000;" src="code.png?"'.time().'></div>');
}

/*
include 'phpqrcode.php';   
QRcode::png('http://baidu.com','test.png');
exit('<img src="test.png" >');
*/

/*
// 代码如下:

include 'phpqrcode.php';    
$value = 'http://www.baidu.com'; //二维码内容   
$errorCorrectionLevel = 'L';//容错级别   
$matrixPointSize = 6;//生成图片大小   
//生成二维码图片   
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);   
$logo = 'logo.png';//准备好的logo图片   
$QR = 'qrcode.png';//已经生成的原始二维码图   

if ($logo !== FALSE) {   
    $QR = imagecreatefromstring(file_get_contents($QR));   
    $logo = imagecreatefromstring(file_get_contents($logo));   
    $QR_width = imagesx($QR);//二维码图片宽度   
    $QR_height = imagesy($QR);//二维码图片高度   
    $logo_width = imagesx($logo);//logo图片宽度   
    $logo_height = imagesy($logo);//logo图片高度   
    $logo_qr_width = $QR_width / 5;   
    $scale = $logo_width/$logo_qr_width;   
    $logo_qr_height = $logo_height/$scale;   
    $from_width = ($QR_width - $logo_qr_width) / 2;   
    //重新组合图片并调整大小   
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,    
    $logo_qr_height, $logo_width, $logo_height);   
}   
//输出图片   
imagepng($QR, 'helloweba.png');   
echo '<img src="helloweba.png">';   
*/

?>
