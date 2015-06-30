<?php

/**
 * Class AddressManager
 * 抽象类
 */
abstract class ShopProductWriter{
    protected $products = array();

    public function addProduct( ShopProduct $shopProduct){
        $this->products[] = $shopProduct;
    }

    abstract public function write();

}

class ErroredWriter extends ShopProductWriter{
    function write(){
        //如果子类没有实现父类的抽象方法，会报致命错误
        /**
         * Fatal error: Class ErroredWriter contains 1 abstract method and must therefore
         * be declared abstract or implement the remaining methods (ShopProductWriter::write)
         * in /data/www/xiejun/php/advanced/3.php on line 23
         */
    }
}

/**
 * 实例化抽象类，报 fatal error  如下：
 * Fatal error: Cannot instantiate abstract class ShopProductWriter
 * in /data/www/xiejun/php/advanced/3.php on line 16
 */
//$writer = new ShopProductWriter();