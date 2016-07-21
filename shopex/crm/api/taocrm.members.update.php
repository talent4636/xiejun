<?php
$api_name = '客户信息更新';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'aaa','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
  'real_name' => array('value'=>'张学勇','label'=>'真实姓名','desc'=>'','type'=>'string'),
  'zip' => array('value'=>'200123','label'=>'邮编','desc'=>'','type'=>'string'),
  'state' => array('value'=>'上海','label'=>'省份','desc'=>'','type'=>'string'),
  'city' => array('value'=>'上海市','label'=>'城市','desc'=>'','type'=>'string' ),
  'district' => array('value'=>'徐汇区','label'=>'地区','desc'=>'','type'=>'string'),
  'address' => array('value'=>'桂林路396号','label'=>'详细地址','desc'=>'','type'=>'string'),
  'mobile' => array('value'=>'138386383838','label'=>'手机','desc'=>'','type'=>'string'),
  'email' => array('value'=>'jacky@qq.com','label'=>'email','desc'=>'','type'=>'string' ),
  'birthday' => array('value'=>'1994-05-19','label'=>'生日','desc'=>'','type'=>'date'),
    'sex' => array('value'=>'1','label'=>'性别','desc'=>'0：未知，1：男，2：女','type'=>'enum'),
    //'LevelCode' => array('value'=>'1212','label'=>'等级代码','desc'=>'','type'=>'string'),
    //'LevelName' => array('value'=>'AAA','label'=>'等级名称','desc'=>'','type'=>'string'),
    'is_vip' => array('value'=>'1','label'=>'是否贵宾','desc'=>'0：不是贵宾，1：是贵宾','type'=>'boolean'),
    'is_sms_black' => array('value'=>'1','label'=>'短信黑名单','desc'=>'0：不是短信黑名单，1：是短信黑名单','type'=>'boolean'),
    'is_email_black' => array('value'=>'1','label'=>'邮件黑名单','desc'=>'0：不是邮件黑名单1：是邮件黑名单','type'=>'boolean'),
    'alipay' => array('value'=>'18833434344','label'=>'支付宝账号','desc'=>'','type'=>'string'),
    //'props' => array('value'=>'{["name":"张三","age":18],["name":"李四","age":19]}','label'=>'用户自定义属性','desc'=>'','type'=>'json'),
    //'other_contact' => array('value'=>'funny886','label'=>'其他联系账号','desc'=>'','type'=>'string'),
    'remark' => array('value'=>'','label'=>'客户备注','desc'=>'','type'=>'string'),
    //'qq' => array('value'=>'1574580823','label'=>'qq账号','desc'=>'','type'=>'string'),
    //'weibo' => array('value'=>'dsadas@qq.com','label'=>'微博账号','desc'=>'','type'=>'string'),
    //'weixin' => array('value'=>'czxczxc','label'=>'微信账号','desc'=>'','type'=>'string'),
  //'wangwang' => array('value'=>'yoyo口口','label'=>'旺旺账号','desc'=>'','type'=>'string'),
 );

//返回结果
$api_response = array (
  'member_id' => array('value'=>'aaa','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
);
?>