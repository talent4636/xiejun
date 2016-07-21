<?php

$act = $_POST['act'];
if($act == 'save_order'){
	save_order();
}

$test_order_params = array (
  'tid' => '20131205115680',
  'trade_valid_time' => 0,
  'out_time' => 0,
  'created' => '2013-12-05 11:02:34',
  'modified' => '2013-12-05 11:02:34',
  'lastmodify' => '2013-12-05 11:02:34',
  'status' => 'TRADE_ACTIVE',
  'pay_status' => 'PAY_NO',
  'ship_status' => 'SHIP_NO',
  'payed_fee' => '0.000',
  'total_goods_fee' => 1,
  'total_trade_fee' => '16.000',
  'currency' => 'CNY',
  'currency_rate' => '1.0000',
  'buyer_obtain_point_fee' => '0.000',
  'is_protect' => 'false',
  'protect_fee' => '0.000',
  'discount_fee' => '0.000',
  'pmt_order' => '0.00',
  'pmt_goods' => '0.00',
  'is_cod' => 'false',
  'promotion_details' => '[{"promotion_name":null,"promotion_fee":"0.00"}]',
  'orders_discount_fee' => 0,
  'payment_tid' => '1',
  'payment_type' => '预存款支付',
  'orders_number' => '1',
  'total_weight' => '0.000',
  'buyer_uname' => '111',
  'buyer_name' => '',
  'buyer_phone' => '',
  'buyer_mobile' => '13585680734',
  'buyer_email' => '252453549@qq.com',
  'buyer_zip' => '',
  'buyer_address' => '',
  'buyer_state' => '',
  'buyer_city' => NULL,
  'buyer_district' => NULL,
  'receiver_name' => '123123',
  'receiver_phone' => '1231231231',
  'receiver_mobile' => '',
  'receiver_state' => '天津',
  'receiver_city' => '天津市',
  'receiver_district' => '河东区',
  'receiver_address' => '天津天津市河东区12312',
  'receiver_zip' => '12312',
  'receiver_time' => '任意日期 任意时间段',
  'orders' => '{"order":[{"iid":"56","title":"\u6dd8\u7ba1","weight":"0.000","bn":"G529EEF2FB4F4B","orders_bn":"G529EEF2FB4F4B","items_num":1,"total_order_fee":1,"oid":"20131205115680","status":"TRADE_ACTIVE","type":"goods","order_items":{"item":[{"iid":"56","bn":"z009","price":"1.000","name":"\u6dd8\u7ba1","weight":"0.000","num":"1","total_item_fee":1,"sku_properties":"","sendnum":0,"item_type":"product","sale_price":1,"discount_fee":0,"score":null,"item_status":"normal"}]}}]}',
  'goods_discount_fee' => 0,
  'shipping_tid' => '2',
  'shipping_type' => '申通',
  'shipping_fee' => '15.000',
  'has_invoice' => 'false',
  'invoice_title' => '',
  'invoice_fee' => '0.000',
  'pay_cost' => '0.000',
  'buyer_memo' => '',
  'trade_memo' => '',
  'seller_name' => NULL,
  'seller_phone' => NULL,
  'seller_mobile' => NULL,
  'seller_address' => NULL,
  'seller_zip' => NULL,
  'seller_email' => '',
  'seller_state' => '',
  'seller_city' => NULL,
  'seller_district' => NULL,
  'payment_lists' => '[]',
  'order_source' => 'local',
  'logistics_no' => '',
  'method' => 'store.trade.add',
  'callback_type' => 'CREATEORDER',
  'callback_type_id' => '20131205115680',
  'app_id' => 'shopex_b2b',
  'certi_id' => '1625795336',
  'from_node_id' => '1530353732',
  'date' => 1386212555,
  'timestamp' => '2013-12-05 11:02:35',
  'format' => 'json',
  'v' => '1',
  'from_api_v' => '3.2',
  'node_type' => 'ecos.taocrm',
  'to_node_id' => '1134373532',
  'task' => '13862125561711',
  'real_time' => 'false',
  'callback_url' => 'http://192.168.41.14/b2b_ecae/index.php?ctl=matrix&act=update_callback_status&type=TAOCRM_CREATEORDER&type_id=20131205115680',
);
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
		url:'exchange_order.php',
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

<br />node_id <input name="node_id" type="text" id="node_id" value="1530758638" />
<br />shop_type <input name="shop_type" type="text" id="shop_type" value="taobao" />
<br />source <input name="source" type="text" id="source" value="manual" />

订单数据(json格式)：<br />
<textarea name="order_data" id="order_data" cols="80" rows="5">$params = array();</textarea>
<br />act <input name="act" type="text" id="act" value="save_order" />
<br />
<br />
</form>


</body>
</html>
<?php
//串联需要POST的值+ 密钥
//进行Md5(编码为32位位长)编码构成了相应的校验码，记入POST['sign]中和相应的POST值一起传送到服务器.

function save_order(){
	$_POST['order_data'] = stripslashes($_POST['order_data']);
	eval($_POST['order_data']);
	$token = $_POST['token'];
	if(substr($_POST['crm_url'], -1) != '/') $_POST['crm_url'] .= '/';
	$crm_url = $_POST['crm_url'].'index.php/api';
	unset($params['act'],$params['token'],$params['crm_url']);
	
	$params['node_id'] = trim($_POST['node_id']);//店铺节点，绑定店铺时CRM返回
    $params['shop_type'] = trim($_POST['shop_type']);	
    $params['source'] = trim($_POST['source']);	
	
	//系统参数
	$params['method'] = 'ome.exchange.order.add';
	$params['v'] = '1.0';
	$params['date'] = date('Y-m-d H:i:s');
	$params['format'] = 'json';
	
	//签名
	$params['sign'] = strtoupper(md5(strtoupper(md5(assemble($params))).$token));
	
	$resp = curl($crm_url, $params);
	
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