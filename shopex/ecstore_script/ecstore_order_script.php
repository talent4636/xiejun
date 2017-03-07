<?php

/**
 * @desc:       ECStore 加入数据脚本。测试脚本，仅做参考
 * @auth:       xiejun@shopex.cn 2016-12-8 13:28:54
 * @warning:    危险，谨慎使用！！！
 */

error_reporting(0);
set_time_limit(0);

$script_dir = realpath(dirname(__FILE__).'/script');
require_once($script_dir."/lib/runtime.php");

define('ORDER_COUNT',8000);//订单

###########################
#########测试数据插入########
###########################
if(defined('ORDER_COUNT') && ORDER_COUNT>0){
    //获取到一个用户
    $mdlMember = app::get('b2c')->model('members');
    $memInfo = $mdlMember->getRow('*');
    if(count($memInfo)<1){
        exit('没有用户，请添加测试用户');
    }else{
        $member_id = $memInfo['member_id'];
    }
    //获取到一个商品
    $mdlProduct = app::get('b2c')->model('products');
    $productInfo = $mdlProduct->getRow('*');
    if(count($productInfo)<1){
        exit('没有商品，请添加一个测试商品');
    }else{
        $product_id = $productInfo['product_id'];
        $goods_id = $productInfo['goods_id'];
        $goods_name = $productInfo['name'];
        $bn = $productInfo['bn'];
        $price = $productInfo['price'];
    }
    $mdlOrder = app::get('b2c')->model('orders');
    $mdlOrderItems = app::get('b2c')->model('order_items');
    $mdlOrderObj = app::get('b2c')->model('order_objects');
    for($order_i=0; $order_i<ORDER_COUNT; $order_i++){
        $order_id = date('ymdhis').str_pad($order_i+1,8,'0',STR_PAD_LEFT);
        $orderData = array(
            'order_id' => $order_id,
            'total_amount' => $price,
            'final_amount' => $price,
            'pay_status' => '1',
            'createtime' => time(),
            'last_modified' => time(),
            'payment' => 'offline',
            'member_id' => $member_id,
            'shipping_id' => '1',
            'shipping' => '快递',
            'ship_area' => 'mainland:上海/上海市/徐汇区:25',
            'ship_name' => '测试收货人',
            'itemnum' => '1',
            'ship_addr' => '测试收货地址',
            'ship_zip' => '123456',
            'cost_item' => $price,
            'currency' => 'CNY',
            'payed' => $price,
        );
        $result = $mdlOrder->save($orderData);
        $orderObjData = array(
            'order_id' => $order_id,
            'obj_type' => 'goods',
            'obj_alias' => '商品区块',
            'goods_id' => $goods_id,
            'name' => $goods_name,
            'price' => $price,
            'amount' => $price,
            'quantity' => '1',
        );
        $resultObj = $mdlOrderObj->save($orderObjData);
        $obj_id = $mdlOrderObj->getRow('obj_id',array('order_id'=>$order_id));
        $orderItemData = array(
            'order_id' => $order_id,
            'obj_id' => $obj_id['obj_id'],
            'goods_id' => $goods_id,
            'product_id' => $product_id,
            'name' => $goods_name,
            'bn' => $bn,
            'price' => $price,
            'g_price' => $price,
            'amount' => $price,
            'nums' => '1',
        );
        $resultItem = $mdlOrderItems->save($orderItemData);
        echo "current: ".($order_i)."  (total ".ORDER_COUNT.")\n";
    }
}
