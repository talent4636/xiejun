<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Date: 2015/5/11
 * Time: 10:33
 */
require_once 'config.php';
require_once 'redis.php';

$redis = new redisInit();
$redisConfig = array(
    'server'=>REDIS_HOST,
    'port'=>REDIS_PORT,
);
$redis->init($redisConfig);

for($i=0; $i<100000; $i++){
    $redis->set('redis-'.$i,'redis-value-'.$i.rand(1,$i));
}

exit('succ');

?>