<?php
error_reporting(0);
$menu1 = 'hover';
$api = 'ome.order.add';
if($_GET['api']) $api = $_GET['api'];

include('api/'.$api.'.php');
include('sys_params.php');
include('inc_api.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>API文档</title>
<style>
dd{margin:0;}
dt {background:#D6E3F1;border-top:2px solid #6A9CC3;padding:5px;font-size:14px;}
.my_tbl {border:1px solid #D4E2F1;margin:10px 0;}
.my_tbl td{border-top:1px solid #D6E3F1;padding:3px;border-right:1px solid #D6E3F1;vertical-align:text-top;}
.my_tbl th{background:#D6E3F1;}

#left_api {line-height:1.5em;}
#left_api li{border-top:1px solid #EEE;padding:5px 0;}
#left_api a{color:#336797;display:block;}
#left_api a span{color:#999;}
#left_api a:hover,#left_api a.hover{color:#F30;background:#D4E2F1;}
#left_api a:hover span,#left_api a.hover span{color:#000;}
</style>
</head>

<body>
<?php require('inc_menu.php');

$api_dir="./api/";
$api_list = scandir($api_dir);
?>

<div style="width:1000px;margin:0 auto;">

    <div id="left_api" style="width:180px;float:left;text-align:right;">
    <h4>API名称：</h4>
        <ul>
        <?php 
        foreach($api_list as $v):
            if(!stristr($v, '.php')) continue;
            $v = str_replace('.php','',$v);
        ?>
            <li>
                <a <?php if($api==$v) echo('class="hover"');?> href="?api=<?php echo($v);?>"><?php echo(substr($v,0,26));?>
                <br/>
                <span><?php echo($api_names[$v]);?></span>
                </a>
            </li>
        <?php 
        endforeach;
        ?>
        </ul>
    </div>

    <div style="margin-left:200px;">

        <h3><?php echo($api);?> (<?php echo($api_name);?>)</h3>
        

        <dl>
            <dt>应用级输入参数 </dt>
            <dd>
                <table border="0" cellpadding="0" cellspacing="0" class="my_tbl" width="100%">
                    <col width="20%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="40%" />
                    <col width="20%" />
                    
                    <tr>
                    <th>名称</th>
                    <th>类型</th>
                    <th>是否必须</th>
                    <th>示例值</th>
                    <th>描述</th>
                    </tr>
                <?php 
                foreach($api_params as $k=>$v):
                
                    if(!is_array($v)) $v = array('value'=>$v);
                ?>
                    <tr>
                            <td><?php echo($k);?></td>
                            <td><?php echo($v['type']);?></td>
                            <td><?php echo($v['required'] ? '是' : '');?></td>
                            <td style="word-break:break-all;"><?php echo(htmlspecialchars($v['value']));?></td>
                            <td><?php echo($v['label']);?> <?php echo($v['desc']);?></td>
                  </tr>
                <?php 
                endforeach;
                ?></table>
            </dd>
        </dl>
        
        <dl>
            <dt>系统级别输入参数</dt>
            <dd>
                <table border="0" cellpadding="0" cellspacing="0" class="my_tbl" width="100%">
                    <col width="20%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="40%" />
                    <col width="20%" />
                    
                    <tr>
                    <th>名称</th>
                    <th>类型</th>
                    <th>是否必须</th>
                    <th>示例值</th>
                    <th>描述</th>
                    </tr>
                <?php 
                foreach($sys_params as $k=>$v):
                
                    if(!is_array($v)) $v = array('value'=>$v);
                ?>
                    <tr>
                            <td><?php echo($k);?></td>
                            <td><?php echo($v['type']);?></td>
                            <td><?php echo($v['required'] ? '是' : '');?></td>
                            <td style="word-break:break-all;"><?php echo(htmlspecialchars($v['value']));?></td>
                            <td><?php echo($v['label']);?> <?php echo($v['desc']);?></td>
                  </tr>
                <?php 
                endforeach;
                ?></table>
            </dd>
        </dl>

        <dl>
            <dt>返回结果 </dt>
            <dd>
                <table border="0" cellpadding="0" cellspacing="0" class="my_tbl" width="100%">
                    <col width="20%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="40%" />
                    <col width="20%" />
                    
                    <tr>
                    <th>名称</th>
                    <th>类型</th>
                    <th>是否必须</th>
                    <th>示例值</th>
                    <th>描述</th>
                    </tr>
                <?php 
                foreach($api_response as $k=>$v):
                
                    if(!is_array($v)) $v = array('value'=>$v);
                ?>
                    <tr>
                            <td><?php echo($k);?></td>
                            <td><?php echo($v['type']);?></td>
                            <td><?php echo($v['required'] ? '是' : '');?></td>
                            <td style="word-break:break-all;"><?php echo(htmlspecialchars($v['value']));?></td>
                            <td><?php echo($v['label']);?> <?php echo($v['desc']);?></td>
                  </tr>
                <?php 
                endforeach;
                ?></table>
            </dd>
        </dl>
        
        <dl>
            <dt>签名算法(PHP)</dt>
            <dd>
<pre><code class="PHP">function gen_sign($params, $token)
{
    return strtoupper(md5(strtoupper(md5(assemble($params))).$token));
}

function assemble($params) 
{
    if(!is_array($params))  return null;
    ksort($params, SORT_STRING);
    $sign = '';
    foreach($params AS $key=>$val){
        if(is_null($val)) continue;
        if(is_bool($val)) $val = ($val) ? 1 : 0;
        $sign .= $key . (is_array($val) ? assemble($val) : $val);
    }
    return $sign;
}
</code></pre>
              
            </dd>
        </dl>
        
    </div>
</div>
<script src="js/jquery.min.js"></script>
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
	$params['method'] = 'store.gift.rule.get';
	$params['v'] = '1.0';
	$params['date'] = date('Y-m-d H:i:s');
	$params['format'] = 'json';
	//$params['node_id'] = '201010';
	
	//签名
	$params['sign'] = strtoupper(md5(strtoupper(md5(assemble($params))).$token));
	
    elog($crm_url);
    
	$resp = curl($crm_url, $params);
	
    echo("原始结果：\n <p style='padding:0 0 0 2em;word-break:break-all;color:blue;'>");
	var_dump($resp);
    echo('</p> ');
    
    echo("\n格式化后：\n <p style='padding:0 0 0 2em;color:green;'>");
    print_r(json_decode($resp, true));
    echo('</p> ');
	
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
        
        elog(substr($postBodyString,0,-1));
        
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