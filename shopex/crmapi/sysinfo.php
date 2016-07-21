<?php

$act = $_POST['act'];
if($act == 'save_refund'){
	save_refund();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="http://lib.sinaapp.com/js/jquery/1.6/jquery.min.js"></script>
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
	
	$.ajax({
		type:'POST',
		url:'sysinfo.php',
		data:_data.join('&'),
		cache:false,
	    success: function(msg){
			alert( msg );
	    }
	
	});
	
	return false;
}
</script>
</head>

<body>
<?php require('inc_menu.php');?>
<form id="form1" name="form1" method="post" action="" onsubmit="return ajax_submit();">


<?php require('inc_token.php');?>

<br />node_id <input name="node_id" type="text" id="node_id" value="1957921136" />

数据(json格式)：<br />
<textarea name="api_data" id="api_data" cols="80" rows="5">$params = array();</textarea>

<br />
<br />act <input name="act" type="text" id="act" value="save_refund" />
<br />
<br />
</form>


</body>
</html>
<?php
//串联需要POST的值+ 密钥
//进行Md5(编码为32位位长)编码构成了相应的校验码，记入POST['sign]中和相应的POST值一起传送到服务器.

function save_refund(){

    $_POST['api_data'] = stripslashes($_POST['api_data']);
    eval($_POST['api_data']);
    
	$token = $_POST['token'];
	if(substr($_POST['crm_url'], -1) != '/') $_POST['crm_url'] .= '/';
	$crm_url = $_POST['crm_url'].'index.php/api';
	unset($params['act'],$params['token'],$params['crm_url']);
	
	$params['node_id'] = trim($_POST['node_id']);//店铺节点，绑定店铺时CRM返回
	
	//系统参数
	$params['method'] = 'taocrm.sysinfo.version';
	$params['v'] = '1.0';
	$params['date'] = date('Y-m-d H:i:s');
	$params['format'] = 'json';

	
	//签名
	$params['sign'] = strtoupper(md5(strtoupper(md5(assemble($params))).$token));
	
	$resp = curl($crm_url, $params);
	
	var_dump($params);
	var_dump($resp);
	
	die();
}

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