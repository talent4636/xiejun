<?php
session_start();

error_reporting(0);

$menu2 = 'hover';
$api = 'ome.order.add';

include('sys_params.php');

if(isset($_COOKIE['sys_params'])){
    $sys_params = json_decode(stripslashes($_COOKIE['sys_params']), true);
    $api = $sys_params['method'];
}

if($_GET['api']) $api = $_GET['api'];
include('api/'.$api.'.php');

if($_POST['act'] == 'save'){
    $params = $_POST;
    foreach($params as $k=>$v){
        $params[$k] = stripslashes($v);
    }
    
    //将系统参数缓存到cookies
    $cache = array(
        'crm_url'=>$params['crm_url'],
        'node_id'=>$params['node_id'],
        'format'=>$params['format'],
        'v'=>$params['v'],
        'token'=>$params['token'],
        'method'=>$params['method'],
    );
    setcookie('sys_params', json_encode($cache), time()+86400*30);
    
    $token = $params['token'];
    if(substr($params['crm_url'], -1) != '/') $params['crm_url'] .= '/';
    $crm_url = $params['crm_url'].'index.php/api';
    unset($params['act'],$params['token'],$params['crm_url']); 

    //系统参数
    /*
    $params['node_id'] = trim($params['node_id']);//店铺节点，绑定店铺时CRM返回
    $params['method'] = 'store.gift.rule.get';
    $params['v'] = '1.0';
    $params['format'] = 'json';
    */

    //签名
    $params['sign'] = strtoupper(md5(strtoupper(md5(assemble($params))).$token));

    $resp = curl($crm_url, $params);
    
    $request_params = &$params;
    $response_str = &$resp;

    /*
    echo("原始结果：\n <p style='padding:0 0 0 2em;word-break:break-all;color:blue;'>");
    var_dump($resp);
    echo('</p> ');

    echo("\n格式化后：\n <p style='padding:0 0 0 2em;color:green;'>");
    print_r(json_decode($resp, true));
    echo('</p> ');

    die();
    */
}

if(isset($_COOKIE['sys_params'])){
    $sys_params = json_decode(stripslashes($_COOKIE['sys_params']), true);
    $api = $sys_params['method'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>API测试</title>
<script>
function ajax_submit(){

    var _data = [];
    $('#form1 textarea').each(function(){
        _data.push($(this).attr('name')+'='+encodeURIComponent($(this).val()));	
    });	

    $('#form1 input').each(function(){
        _data.push($(this).attr('name')+'='+encodeURIComponent($(this).val()));	
    });

    //alert(_data.join('&'));
    
    $('#api_resp').html('发起请求中...');
	
	$.ajax({
		type:'POST',
		url:'gift.php',
		data:_data.join('&'),
		cache:false,
	    success: function(msg){
			//alert( msg );
            $('#api_resp').html(msg);
	    }
	
	});
	
	return false;
}
</script>
<style>
label {float:left;display:block;width:120px;text-align:right;}
.form_ul li{padding:0 0 5px 0;}
</style>
</head>

<body>
<?php require('inc_menu.php');

$api_dir="./api/";
$api_list = scandir($api_dir);
?>

<div style="width:1000px;margin:0 auto;">

    <div style="width:50%;float:left;">
    
        <form method="post" action="">
            <input type="hidden" name="act" value="save" />
            <ul class="form_ul">
                <li>
                <label>API名称：</label>
                <select name="method" onchange="window.location.href='test.php?api='+this.value;">
                    <?php 
                    foreach($api_list as $v):
                        if(!stristr($v, '.php')) continue;
                        $v = str_replace('.php','',$v);
                    ?>
                        <option value="<?php echo($v);?>" <?php if($v==$api) echo("selected");?>><?php echo($v);?></option>
                    <?php 
                    endforeach;
                    ?>
                </select></li>
                
                <li>系统级别输入参数</li>
                
                <li>
                    <label style="color:#F60;">* CRM访问地址： </label> 
                    <input size=40 name="crm_url" value="<?php echo($sys_params['crm_url']);?>" />
                   </li>
                
                <?php 
                foreach($sys_params as $k=>$v):
                    if($k=='sign') continue;
                    if($k=='method') continue;
                    if($k=='token') continue;
                    if($k=='crm_url') continue;
                    if(!is_array($v)) $v = array('value'=>$v);
                ?><li>
                    <label <?php if($v['required'] === true) echo('style="color:#F60;"');?>><?php if($v['required'] === true) echo('*');?>
                
                   <?php echo(substr($k,0,15));?>： </label> 
                    <input size=40 name="<?php echo($k);?>" value="<?php echo($v['value']);?>" />
                   </li>
                <?php 
                endforeach;
                ?>
                    <li>
                    <label style="color:#F60;">* token： </label> 
                    <input size=40 name="token" value="<?php echo($sys_params['token']);?>" />
                   </li>
                
                <li>应用级输入参数 </li>

                <?php 
                foreach($api_params as $k=>$v):
                    if(!is_array($v)) $v = array('value'=>$v);
                ?><li>
                    <label <?php if($v['required'] === true) echo('style="color:#F60;"');?>><?php if($v['required'] === true) echo('*');?>
                
                   <?php echo(substr($k,0,15));?>： </label> 
                   
                   <?php 
                   if(strlen($v['value'])>100):?>
                    <textarea name="<?php echo($k);?>" style="width:70%;height:100px;margin:0 0 0 120px;"><?php echo($v['value']);?></textarea>
                   <?php else:?>
                    <input size=40 name="<?php echo($k);?>" value="<?php echo($v['value']);?>" />
                   <?php endif;?>
                   </li>
                <?php 
                endforeach;
                ?>
            </ul>
            
            <div style="padding:0 0 0 120px;">
                <button type="submit">提交测试</button>
            </div>
        </form>
    </div>

    <div style="width:50%;float:right;">
    API请求参数：<br/> 
    <textarea id="request_params" style="width:80%;height:200px;"><?php var_export($request_params, false);?></textarea><br/>
     
    API返回结果： <br/>
    <textarea id="response_str" style="width:80%;height:200px;"><?php if(json_decode($response_str, true)){
        var_export(json_decode($response_str, true), false);
    }else{
        echo($response_str);
    }
    ?></textarea><br/>
    </div>
</div>
<script src="js/jquery.min.js"></script>
</body>
</html>
<?php
function assemble($params) 
{
    if(!is_array($params))  return null;
    ksort($params, SORT_STRING);
    $sign = '';
    foreach($params AS $key=>$val){
        if(is_null($val))   continue;
        if(is_bool($val))   $val = ($val) ? 1 : 0;
        $sign .= $key . (is_array($val) ? assemble($val) : $val);
    }
    return $sign;
}  

function curl($url, $postFields = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (is_array($postFields) && 0 < count($postFields))
    {
        $postBodyString = "";
        $postMultipart = false;
        foreach ($postFields as $k => $v)
        {
            if(1==1 or "@" != substr($v, 0, 1))//判断是不是文件上传
            {
                $postBodyString .= "$k=" . urlencode($v) . "&"; 
            }
            else//文件上传用multipart/form-data，否则用www-form-urlencoded
            {
                $postMultipart = true;
            }
        }
        unset($k, $v);
        curl_setopt($ch, CURLOPT_POST, true);
        if ($postMultipart)
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        }
        else
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
        }
    }
    
    //elog(substr($postBodyString,0,-1));
    
    $reponse = curl_exec($ch);
    
    if (curl_errno($ch))
    {
        throw new Exception(curl_error($ch),0);
    }
    else
    {
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (200 !== $httpStatusCode)
        {
            throw new Exception($reponse,$httpStatusCode);
        }
    }
    curl_close($ch);
    return $reponse;
}

?>