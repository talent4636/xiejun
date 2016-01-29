<?php
/**
 * 清除erp证书和删除节点，重新注册
 * $domain(调用时候的参数)，应该是真正的域名，请注意
 */
error_reporting(E_ALL ^ E_NOTICE);

$domain     = $argv[1];

if (empty($domain) )
{
    die('No Params');
}

set_time_limit(0);
require_once(dirname(__FILE__) . '/../../lib/init.php');
cachemgr::init(false);

$sys_params = base_setup_config::deploy_info();
$code = md5(microtime());
base_kvstore::instance('ecos')->store('net.handshake',$code);
$app_exclusion = app::get('base')->getConf('system.main_app');
/** 得到框架的总版本号 **/
$obj_apps = app::get('base')->model('apps');
$tmp = $obj_apps->getList('*',array('app_id'=>'base'));
$app_xml = $tmp[0];
$app_xml['version'] = $app_xml['local_ver'];
$conf = base_setup_config::deploy_info();
$data = array(
        'certi_app'=>'open.reg',
        'app_id' => 'ecos.'.$app_exclusion['app_id'],
        // 'url' => kernel::base_url(1),
        'url' => $domain,
        'result' => $code,
        'version'=> $app_xml['version'],
        );

$http = kernel::single('base_httpclient');
$http->timeout = 60;
$result = $http->post(
        LICENSE_CENTER,
        $data);

$result = json_decode($result,1);

#生成证书的时候，返回结果
#var_dump($result);

if($result['res']=='succ'){
    if ($result['info'])
    {
        if ($result['info']['node_id'])
        {
            $arr_shop_node_id = array(
                    'node_id' => $result['info']['node_id'],
                    );
            base_shopnode::set_node_id($arr_shop_node_id,$app_exclusion['app_id']);
            unset($result['info']['node_id']);
        }
        $certificate = $result['info'];
        $flag = base_certificate::set_certificate($certificate);
        if( $flag ){
            return true;
        }else{
            return false;
        }
    }
}else{
    return false;
}
