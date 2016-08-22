<?php

$time_start = time();
for($i=0;$i<10000;$i++){
    echo str_pad($i,3,'0',STR_PAD_LEFT).": ".uniqid()."\n";
}
$time_stop = time();
echo ($time_stop-$time_start).'s';



?>

