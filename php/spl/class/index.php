<?php
/**
 * author: talent4636@gmail.com
 *   date: 2016/5/23 14:52
 */
header("Content-type:text/html;charset=utf-8");
echo <<<EOF
<div>PHP sql(标准PHP类库中的标准类）有：
EOF;

echo "<pre>";
print_r(spl_classes());
echo "<pre>";
exit;
