<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-类函数和和对象函数-了解对象或类
 */

require "../argsAndType/4.php";

function getProduct(){
    return new CdProduct("Exile on Coldharbour Lane", 'The', 'Alabama 3', 10.99, 60.33);
}

$product = getProduct();
if($product instanceof ShopProduct){
    print "\$prodct is a ShopProduct object <br/>";
}
