<?php
$api_name = 'POS订单';

//应用级输入参数
$api_params = array (
  'order_bn' => array('value'=>'123123','label'=>'订单号','desc'=>'','type'=>'string', 'required'=>true),
    'shop_node_id' => array('value'=>'5940','label'=>'店铺节点ID','desc'=>'','type'=>'int', 'required'=>true),
    'uname' => array('value'=>'59A40','label'=>'客户名/昵称','desc'=>'','type'=>'string', 'required'=>true),
    'buy_time' => array('value'=>'2015-8-20 17:35:18','label'=>'购买时间','desc'=>'','type'=>'string', 'required'=>true),
    'is_refund' => array('value'=>'2015-8-20 17:35:21','label'=>'是否冲红销售','desc'=>'0：否 1：是','type'=>'int', 'required'=>true),
    'refund_order_bn' => array('value'=>'59AA','label'=>'冲红订单号','desc'=>'','type'=>'string'),
    'order_amount' => array('value'=>'59.40','label'=>'订单金额','desc'=>'','type'=>'double', 'required'=>true),
    'order_status' => array('value'=>'active','label'=>'订单状态','desc'=>'active:正常，dead：废单，finish：完成','type'=>'string', 'required'=>true),
    'pay_status' => array('value'=>'1','label'=>'支付状态','desc'=>'0:未支付，1：已支付，2：处理中3：部分付款4：部分退款5：全额退款','type'=>'int', 'required'=>true),
    'ship_status' => array('value'=>'1','label'=>'发货状态','desc'=>'0:未发货，1：已发货，2：部分发货3：部分退货4：已退货','type'=>'int', 'required'=>true),
    'payment' => array('value'=>'1','label'=>'支付方式','desc'=>'','type'=>'string', 'required'=>true),
    'shipping' => array('value'=>'1','label'=>'配送方式','desc'=>'','type'=>'string', 'required'=>true),
    'item_amount' => array('value'=>'59.40','label'=>'商品金额','desc'=>'','type'=>'double', 'required'=>true),
    'shipping_fee' => array('value'=>'59.40','label'=>'退款金额','desc'=>'','type'=>'double', 'required'=>true),
    'consignee' => array('value'=>'59.40','label'=>'运费金额','desc'=>'','type'=>'string', 'required'=>true),
    'consignee_state' => array('value'=>'AAA','label'=>'收货人','desc'=>'','type'=>'string', 'required'=>true),
    'consignee_city' => array('value'=>'AA','label'=>'收货省市','desc'=>'','type'=>'string', 'required'=>true),
    'consignee_area' => array('value'=>'AA','label'=>'城市','desc'=>'','type'=>'string', 'required'=>true),
    'consignee_address' => array('value'=>'AA','label'=>'地区','desc'=>'','type'=>'string', 'required'=>true),
    'consignee_zip' => array('value'=>'AA','label'=>'详细地址','desc'=>'','type'=>'string'),
    'consignee_mobile' => array('value'=>'594022','label'=>'邮编','desc'=>'','type'=>'string', 'required'=>true),
    'consignee_telephone' => array('value'=>'18818222222','label'=>'手机','desc'=>'','type'=>'string'),
    'pay_money' => array('value'=>'0212222222','label'=>'电话','desc'=>'','type'=>'double'),
    'contact' => array('value'=>'59.40','label'=>'付款金额','desc'=>'','type'=>'string', 'required'=>true),
    'pay_time' => array('value'=>'撒啊','label'=>'联系人','desc'=>'','type'=>'string', 'required'=>true),
    'delivery_time' => array('value'=>'2015-8-20 17:36:29','label'=>'付款时间','desc'=>'','type'=>'string', 'required'=>true),
    'finish_time' => array('value'=>'2015-8-20 17:36:33','label'=>'收货时间','desc'=>'','type'=>'string', 'required'=>true),
    'soure_shop' => array('value'=>'2015-8-20 17:36:36','label'=>'完成时间','desc'=>'','type'=>'string', 'required'=>true),
    'consumer_terminal' => array('value'=>'d222asdas','label'=>'来源店铺','desc'=>'','type'=>'string', 'required'=>true),
    'op_name' => array('value'=>'admin','label'=>'操作人','desc'=>'','type'=>'string', 'required'=>true),
    'buy_msg' => array('value'=>'59.4ssss0','label'=>'买家留言','desc'=>'','type'=>'string', 'required'=>true),
    'buy_remark' => array('value'=>'59.4ssss0','label'=>'买家备注','desc'=>'','type'=>'string', 'required'=>true),
    'order_items' => array('value'=>'[{"goods_bn":"123123","name":"曼秀雷敦","nums":"1","price":"22.3","total_price":"22.3","bn":"312321s"}]','label'=>'订单商品明细','desc'=>'','type'=>'json', 'required'=>true),
 );

//返回结果
$api_response = array (
  'tid' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
    'member_id' => array('value'=>'da312312sda','label'=>'客户ID','desc'=>'','type'=>'string','required'=>true),
);
?>