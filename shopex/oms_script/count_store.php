<?php
error_reporting(0);

$dir = realpath(dirname(__FILE__));
include $dir."/../../config/config.php";
include $dir."/../../app/base/kernel.php";
include $dir."/../../app/base/autoload.php";
include(APP_DIR.'/base/defined.php');

#遍历仓库，得到总库存，插入总库存列表中 （冻结库存不处理，因为要考虑未审核的订单）
$mdlProducts = app::get('ome')->model('products');
$mdlBranchProduct = app::get('ome')->model('branch_product');
$productList = $mdlProducts->getList('product_id,store,bn',array());
foreach($productList as $key=>$v){
    $total = 0;
    $freez_total = 0;
    $branchStoreList = $mdlBranchProduct->getList('store,store_freeze',array('product_id'=>$v['product_id']));
    if(count($branchStoreList)>0){
        foreach($branchStoreList as $vv){
            $total += $vv['store'];
            $freez_total += $vv['store_freeze'];
        }
    }
    $data = array(
        'store' => $total,
    );
    $fil = array(
        'product_id' => $v['product_id'],
    );
    #$result = false;
    $result = $mdlProducts->update($data,$fil);
    if($result){
        $flag = '成功';
    }else{
        $flag = '失败';
    }
    $msg = "\n------------------\n修改商品（product_id = ".$v['product_id'].", bn = ".$v['bn']." ）的总库存：".
        $v['store']." => ".$total." 【".$flag."】";
    error_log($msg,3,'/tmp/stock.log');
}
?>