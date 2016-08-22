<?php

$func = $_GET['function'];
echo "函数源码<hr>";
show_source($func);
echo "执行结果<hr>";
require_once $func;

?>
