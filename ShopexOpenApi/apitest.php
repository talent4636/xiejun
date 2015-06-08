<!DOCTYPE html>
<html>
<head>
    <title>ShopexErp OpenApi test</title>
</head>
<body style="">
    <div style="width:850px;margin:auto;background-color:#DDE;padding:10px;border-radius: 5px;" style=""><!-- border:1px dashed #000; -->
        <h2>ShopexErp & ECStore OpenApi 测试脚本</h2><p style="text-align:right;color:#888;">---powered by ShopEx zyzx</p><hr/>
        <select onchange="changeView(this)">
            <option value="erp" hid="ecstore">测试ShopexErp的sales.getList接口</option>
            <option value="ecstore" hid="erp">测试ShopexECStore的getAllOrders接口</option>
        </select><br/><br/>
        <form action="apitest.php?type=erp" id="erp_form" method="POST" >
            <table>
                <tr><td>ErpApi链接地址(url)</td><td><input name="url" style="width:600px;" value="http://commercedemo.shopex123.com/erp/index.php/openapi/rpc/service/" placeholder="输入请求url地址"></td></tr>
                <tr><td>密文(token)</td><td><input name="token" value="vLcYuVtPKRWyowVtAavNGbNoxwmUVjGi" ></td></tr>
                <tr><td>标识(flag)</td><td><input name="flag" value="1600929432" ></td></tr>
                <tr><td>请求的接口方法(method)</td><td><input name="method" value="sales.getList" ></td></tr>
                <tr><td>接口返回数据格式(type)</td><td><input type="radio" name="type" value="json" checked="checked">json &nbsp;&nbsp; <input type="radio" name="type" value="xml">xml</td></tr>
                <tr><td>编码(charset)</td><td><input name="charset" value="utf-8" ></td></tr>
                <tr><td>接口版本(ver)</td><td><input name="ver" value="1" ></td></tr>
                <tr><td>页码(page_no)</td><td><input name="page_no" value="1" ></td></tr>
                <tr><td>每页条数(page_size)</td><td><input name="page_size" value="100" ></td></tr>
                <tr><td>起始时间(start_time)</td><td><input name="start_time" value="2012-12-08 18:50:30" ></td></tr>
                <tr><td>截止时间(end_time)</td><td><input name="end_time" value="2015-12-08 18:50:30" ></td></tr>
                <tr><td></td><td><input type="submit" value="提交测试"></td></tr>
            </table>
        </form>
       
        <form action="apitest.php?type=ecstore" id="ecstore_form" method="POST" style="display:none;">
            <table>
                <!-- <tr><td>选择ShopEx产品名称</td><td><input type="radio" name="system" value="erp" checked="checked">ShopexErp &nbsp;&nbsp; <input type="radio" name="system" value="ecstore">ShopexECStore</td></tr> -->
                <tr><td>ECStoreApi链接地址(url)</td><td><input name="url" style="width:600px;" value="http://www.ttmama.com" placeholder="输入请求url地址"></td></tr>
                <tr><td>接口关键字(openapi_key)</td><td><input name="openapi_key" value="openapi.ttmamachatapi" ></td></tr>
                <tr><td>请求的接口方法(openapi_method)</td><td><input name="openapi_method" value="getAllOrders" ></td></tr>
                <tr><td>会员编号(member_id)</td><td><input name="member_id" value="3" ></td></tr>
                <tr><td>产品编号(product_id)</td><td><input name="page_size" value="549" ></td></tr>
                <tr><td></td><td><input type="submit" value="提交测试"></td></tr>
            </table>
        </form>
    </div>
<script type="text/javascript">
    //隐藏和显示 切换 js  ---by xiejun@shopex.cn
    function changeView(_this){
        var dply = document.getElementById(_this.value+'_form');
        var h = document.getElementById((_this.value=="erp"?"ecstore":"erp")+"_form");
        dply.style.display = "block";
        h.style.display = "none";
    }
</script>
</body>
</html>


<?php
//ERP接口测试类
class testErp{
    function gen_matrix_sign($params){
        $token = $params['token'];
        return strtoupper(md5(strtoupper(md5($this->assemble($params))).$token));
    }
    
    function assemble($params){
        if(!is_array($params)){
            return null;
        }
        ksort($params,SORT_STRING);
        $sign = '';
        foreach($params AS $key=>$val){
            $sign .= $key . (is_array($val) ? assemble($val) : $val);
        }
        return $sign;
    }
    
    function gen_sign($params){
        $sign = $this->gen_matrix_sign($params);
        return $sign;
    }

    function result($params,$url){
        $sign = $this->gen_sign($params);
        $params['sign'] = $sign;
        $response = $this->send_post($params,$url);
        // echo $response;
        return $response;
    }
    
    function send_post($post_data,$url) {
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;

    }
}
//ECStore接口测试类
class testECStore{
    //生成签名算法
    function get_sign($params){
        return strtoupper(md5(strtoupper(md5($this->assemble($params)))));
    }

    function assemble($params){
        if(!is_array($params)){
            return null;
        }
        ksort($params,SORT_STRING);
        $sign = '';
        foreach($params AS $key=>$val){
            $sign .= $key . (is_array($val) ? assemble($val) : $val);
        }
        return $sign;
    }
    //END 生成签名算法

    //生成openapi的标准url
    function openapi_url($url,$openapi_service_name,$method='access',&$params=null){
        if(substr($openapi_service_name,0,8)!='openapi.'){
            return false;
        }
        $arg = array();
        foreach((array)$params as $k=>$v){
            $arg[] = urlencode($k);
            $arg[] = urlencode(str_replace('/','%2F',$v));
        }
        $url = $url.'/index.php/openapi/'.substr($openapi_service_name,8).'/'.$method.'/'.implode('/',$arg);
        return $url;
    }

    //post数据并返回结果
    function send_post($openapi_url, $post_data) {
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 5 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($openapi_url, false, $context);
        return $result;
    }

    //获取结果
    function result($params){
        $sign = $this->get_sign($params);
        $params_new = $params;
        unset($params_new['openapi_key'],$params_new['openapi_method'],$params_new['url']);
        $url = $this->openapi_url($params['url'],$params['openapi_key'],$params['openapi_method'],$params_new);
        $params['sign'] = $sign;
        if (!$sign){
            exit('签名（sign）是必须参数，请检查');
        }
        $response = $this->send_post($url,$params);
        return $response;
    }
}

if (@$_GET['type']) {
    $params_post = $_POST;
    if ($_GET['type'] == 'erp') {
        $testErp = new testErp;
        $url = $params_post['url'];
        unset($params_post['system']);
        unset($params_post['url']);
        $params_post['timestamp'] = time();
        $return = $testErp->result($params_post,$url);
        echo "<p>".$return."</p><hr/>";
        echo "json_decode之后如下：<pre>";
        print_r(json_decode($return));
        echo "</pre>";
    }else{
        $testECStore = new testECStore;
        $return = $testECStore->result($params_post);
        echo "<p>".$return."</p><hr/>";
        echo "json_decode之后如下：<pre>";
        print_r(json_decode($return));
        echo "</pre>";
    }
}

