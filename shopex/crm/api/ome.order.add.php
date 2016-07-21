<?php
$api_name = '订单增加';

//应用级输入参数
$api_params = array (
  'order_bn' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
  'createtime' => array('value'=>'1439953632','label'=>'订单创建时间','desc'=>'','type'=>'timestamp','required'=>true),
  'modified' => array('value'=>'1439953632','label'=>'订单最后修改时间','desc'=>'','type'=>'timestamp','required'=>true),
  'status' => array('value'=>'active','label'=>'订单状态','desc'=>'active 活动订单,finish 完成订单,dead 关闭订单','type'=>'string','required'=>true),
  'pay_status' => array('value'=>'0','label'=>'付款状态','desc'=>'0为未付款，1为已付款','type'=>'number','required'=>true),
  'ship_status' => array('value'=>'0','label'=>'发货状态','desc'=>'0为未发货，1为已发货','type'=>'number','required'=>true),
  'payed' => array('value'=>'0.00','label'=>'付款金额','desc'=>'','type'=>'money','required'=>true),
  'total_amount' => array('value'=>'351.60','label'=>'订单总金额','desc'=>'包含邮费的优惠前金额','type'=>'money','required'=>true),
  'delivery_time' => array('value'=>'1439953632','label'=>'发货时间','desc'=>'','type'=>'timestamp','required'=>false),
  'finish_time' => array('value'=>'1439953632','label'=>'订单完成时间','desc'=>'','type'=>'timestamp','required'=>false),
  'is_cod' => array('value'=>'false','label'=>'是否货到付款','desc'=>'','type'=>'true / false','required'=>true),
  'weight' => array('value'=>'0.00','label'=>'商品重量','desc'=>'','type'=>'number'),
  'member_info' => array('value'=>'{"tel": "", "uname": "abcde123", "area_district": "", "area_state": "", "addr": "", "name": "abcde123", "zip": "", "mobile": "", "area_city": "", "alipay_no": "abcde123@yahoo.com.tw", "email": "abcde123@yahoo.com.tw"}','label'=>'会员信息','desc'=>'转化成jsonArray存入','type'=>'json'),
  'consignee' => array('value'=>'{"email": "", "name": "\\u738b\\u7693\\u7fbd", "zip": "510000", "area_state": "\\u5e7f\\u4e1c\\u7701", "telephone": "13434130992", "mobile": "13434130992", "area_district": "\\u6d77\\u73e0\\u533a", "area_city": "\\u5e7f\\u5dde\\u5e02", "addr": "\\u5e7f\\u4e1c\\u7701\\u5e7f\\u5dde\\u5e02\\u6d77\\u73e0\\u533a\\u73e0\\u6c5f\\u5e1d\\u666f\\u60a6\\u6d9b\\u8f69A\\u5ea716\\u697cD\\u623f"}','label'=>'收货人信息','desc'=>'转化成jsonArray存入','type'=>'json','required'=>true),
  'order_objects' => array('value'=>'[{"logistics_company": "", "obj_type": "goods", "name": "\\u300aMen\'sHealth\\u7537\\u58eb\\u5065\\u5eb7\\u300b9\\u6708\\u53f7 \\u5c01\\u9762\\uff1a\\u5b81\\u6cfd\\u6d9b \\u72ec\\u5bb6\\u8d60\\u9001\\u5b81\\u6cfd\\u6d9b\\u7b7e\\u540d\\u6d77\\u62a5", "weight": "", "pmt_price": 0.0, "bn": "nsjk201509nzthb", "oid": "111528143", "logistics_code": "", "order_items": [{"status": "active", "name": "\\u300aMen\'sHealth\\u7537\\u58eb\\u5065\\u5eb7\\u300b9\\u6708\\u53f7 \\u5c01\\u9762\\uff1a\\u5b81\\u6cfd\\u6d9b \\u72ec\\u5bb6\\u8d60\\u9001\\u5b81\\u6cfd\\u6d9b\\u7b7e\\u540d\\u6d77\\u62a5", "pmt_price": 0.0, "sale_price": 20.0, "bn": "nsjk201509nzthb", "sale_amount": 20.0, "product_attr": [], "item_type": "product", "amount": 20.0, "cost": 20.0, "shop_goods_id": "111528143", "original_str": "", "sendnum": "0", "score": "", "quantity": 1, "price": 20.0, "shop_product_id": 0}], "amount": 20.0, "score": "", "shop_goods_id": "111528143", "obj_alias": "\\u5546\\u54c1", "sale_price": 20.0, "price": 20.0, "quantity": 1}]','label'=>'订单商品明细','desc'=>'转化成jsonArray存入','type'=>'json','required'=>true),
  'has_invoice' => array('value'=>'false','label'=>'是否需要发票','desc'=>'true / false','type'=>'string'),
  'invoice_title' => array('value'=>'','label'=>'发票抬头','desc'=>'','type'=>'string'),
  'invoice_fee' => array('value'=>'0.00','label'=>'发票费用','desc'=>'','type'=>'money'),
  'custom_mark' => array('value'=>'','label'=>'买家备注','desc'=>'','type'=>'string'),
  'payments' => array('value'=>'[{"account": "abcde123@trends.com.cn", "pay_time": "2015-08-07 10:05:11", "pay_account": "abcde123@yahoo.com.tw", "paymethod": "\\u652f\\u4ed8\\u5b9d", "money": "42.00", "memo": "", "pay_bn": "alipay", "paycost": "", "bank": ""}]','label'=>'付款单明细','desc'=>'','type'=>'json'),
  'source' => array('value'=>'manual','label'=>'订单来源','desc'=>'如果source为manual，订单会实时处理。否则进入订单处理队列。','type'=>'string'),
  'logistics_no' => array('value'=>'','label'=>'物流单号','desc'=>'','type'=>'string'),
);

//返回结果
$api_response = array (
  'tid' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
);
?>