<?php

$menu4 = 'hover';
$api = 'taocrm.point.get';
if($_GET['api']) $api = $_GET['api'];

include('api_java/'.$api.'.php');
include('sys_params_java.php');
include('inc_api_java.php');

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

$api_dir="./api_java/";
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
            <dt>返回示例</dt>
            <dd>
<pre>
$api_response = array (
    {"taocrm.stored.get":
        {
            "member_id":123,
            "stored_value":111
        },
        "errcode":0
    }
);
</pre>
            </dd>
        </dl>
        
    </div>
</div>
<script src="js/jquery.min.js"></script>
</body>
</html>