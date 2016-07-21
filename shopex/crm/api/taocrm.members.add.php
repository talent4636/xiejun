<?php
$api_name = '客户信息新增';

//应用级输入参数
$api_params = array (
  'uid' => array('value'=>'123','label'=>'外部客户ID','desc'=>'','type'=>'int'),
  'uname' => array('value'=>'jacky_chen','label'=>'客户帐号或昵称','desc'=>'','type'=>'string','required'=>true),
  'real_name' => array('value'=>'张学勇','label'=>'客户真实姓名','desc'=>'','type'=>'string'),
  'source_terminal' => array('value'=>'POS-112','label'=>'来源终端','desc'=>'终端识别码','type'=>'string'),
  'zip' => array('value'=>'200123','label'=>'邮编','desc'=>'','type'=>'string'),
  'state' => array('value'=>'上海','label'=>'省份','desc'=>'','type'=>'string'),
  'city' => array('value'=>'上海市','label'=>'城市','desc'=>'','type'=>'string'),
  'district' => array('value'=>'徐汇区','label'=>'地区','desc'=>'','type'=>'string'),
  'address' => array('value'=>'桂林路396号3号楼','label'=>'详细地址','desc'=>'','type'=>'string'),
  'mobile' => array('value'=>'13812345678','label'=>'手机','desc'=>'','type'=>'string'),
  'tel' => array('value'=>'021-21283138','label'=>'电话','desc'=>'','type'=>'string'),
  'email' => array('value'=>'jacky@qq.com','label'=>'电子邮件','desc'=>'','type'=>'string'),
  'birthday' => array('value'=>'1990-09-09','label'=>'生日','desc'=>'','type'=>'date'),
  'sex' => array('value'=>'0','label'=>'性别','desc'=>'0为未知，1为male，2为female','type'=>'enum'),
  //'LevelCode' => array('value'=>'','label'=>'等级代码','desc'=>'','type'=>'string','required'=>true),
  //'LevelName' => array('value'=>'','label'=>'等级名称','desc'=>'','type'=>'string','required'=>true),
  'is_vip' => array('value'=>'0','label'=>'是否贵宾','desc'=>'1或者0','type'=>'boolean'),
  'is_sms_black' => array('value'=>'0','label'=>'短信黑名单','desc'=>'1或者0','type'=>'boolean'),
  'is_email_black' => array('value'=>'0','label'=>'邮件黑名单','desc'=>'1或者0','type'=>'boolean'),
  'alipay' => array('value'=>'jacky@alipay.com','label'=>'支付宝账号','desc'=>'','type'=>'string'),
  'remark' => array('value'=>'','label'=>'客户备注','desc'=>'','type'=>'string'),
  //'qq' => array('value'=>'','label'=>'qq账号','desc'=>'','type'=>'string'),
  //'weibo' => array('value'=>'','label'=>'微博账号','desc'=>'','type'=>'string'),
  //'weixin' => array('value'=>'','label'=>'微信账号','desc'=>'','type'=>'string'),
  //'wangwang' => array('value'=>'','label'=>'旺旺账号','desc'=>'','type'=>'string'),
  //'reg_time' => array('value'=>'','label'=>'注册时间','desc'=>'','type'=>'datetime'),
  'parent_code' => array('value'=>'1000000001','label'=>'推荐人推荐码','desc'=>'','type'=>'int'),
);

//返回结果
$api_response = array (
  'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'number','required'=>true),
  'self_code' => array('value'=>'10001','label'=>'推荐码','desc'=>'','type'=>'number','required'=>false),
);
?>