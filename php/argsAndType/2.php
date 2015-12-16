<?php

class ShopProduct{

    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price = 0;

    function __construct( $title, $firstName, $mainName, $price ){
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
    }

    function getProducer(){
        return "{$this->producerFirstName}"." {$this->producerMainName}";
    }
}

class ShopProductWriter{

    function write( ShopProduct $shopProduct ){//限制只接受包含 ShopProduct 对象的 $ShopProduct 参数
        $str = "{$shopProduct->title}: ".
        $shopProduct->getProducer().
        " ({$shopProduct->price})\n ";
        print_r($str);
    }
}

//$product1 = new ShopProduct( "My Antonia", "Willa", "Cather", 5.99 );
//$writer = new ShopProductWriter();
//$writer->write( $product1 );

//尝试用错误对象来调用 write ，会报错
/* 错误如下
 * Catchable fatal error: Argument 1 passed to ShopProductWriter::write() must be an instance of ShopProduct,
 * instance of wrong given, called in /data/www/xiejun/php/argsAndType/2.php on line 39
 * and defined in /data/www/xiejun/php/argsAndType/2.php on line 24
 */
class wrong{}
$writer = new ShopProductWriter();
$writer->write( new wrong() );

