<?php 

$str = 'a:9:{s:10:"_export_mb";s:1:"1";s:13:"export_fields";s:156:"order_bn,shop_id,total_amount,column_print_status,process_status,is_cod,pay_status,ship_status,payment,shipping,logi_id,logi_no,createtime,paytime,mark_type";s:11:"need_detail";s:1:"1";s:8:"_io_type";s:3:"csv";s:8:"order_id";a:1:{i:0;s:1:"1";}s:8:"disabled";s:5:"false";s:7:"is_fail";s:5:"false";s:7:"archive";i:0;s:10:"filter_sql";s:29:"( process_status != \'cancel\')";}';

echo "<pre>";
print_r(unserialize($str));
exit;

