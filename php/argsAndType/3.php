<?php

class ShopProduct{

//    public $numPages;
//    public $playLength;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct( $title,$firstName,$mainName,$price ){
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
    }

    function getProducer(){
        return "{$this->producerFirstName}"." {$this->producerMainName}";
    }

    function getSummaryLine(){
        $base = "$this->title ( {$this->producerMainName}, ";
        $base .= " {$this->producerFirstName} )";
        return $base;
    }
}

class CdProduct extends ShopProduct{
    public $playLength;

    function __construct( $title, $firstName, $mainName, $price, $playLength ){
        parent::__construct($title,$firstName,$mainName,$price);
        $this->playLength = $playLength;
    }

    function getPlayLength(){
        return $this->playLength;
    }

    function getSummaryLine(){
        $base = " {$this->title} ( {$this->producerMainName}, ";
        $base .= " {$this->producerFirstName} )";
        $base .= ": playing time -  {$this->playLength} ";
        return $base;
    }
}

class BookProduct extends ShopProduct{
    public $numPages;

    function __construct( $title, $firstName, $mainName, $price, $numPages ){
        parent::__construct($title,$firstName,$mainName,$price);
        $this->numPages = $numPages;
    }

    function getNumberOfPages(){
        return $this->numPages;
    }

    function getSummaryLine(){
        $base = parent::getSummaryLine();//用parent关键字，调用被复写的父类方法
        $base .= ": page count - {$this->numPages}";
        return $base;
    }
}

$product1 = new BookProduct( "My Antonia", "Willa", "Cather", 5.99, 25 );
$info1 = $product1->getSummaryLine();
print "artist: { $info1 }";

echo "<hr/>";
$product2 = new CdProduct( "Exile on Coldharbour Lane", "The", "Alabama 3", 10.99,  60.33 );
$info2 = $product2->getSummaryLine();
print "artist: { $info2 }";


