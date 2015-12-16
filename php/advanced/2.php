<?php

/**
 * Class AddressManager
 * 静态方法和属性
 */
class ShopProduct{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;

    function __construct( $title,$firstName,$mainName,$price ){
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
    }

    function getProducerFirstName(){
        return $this->producerFirstName;
    }

    function getProducerMainName(){
        return $this->producerMainName;
    }

    function setDiscount($num){
        $this->discount = $num;
    }

    function getDiscount($num){
        return $this->discount;
    }

    function getTitle(){
        return $this->title;
    }

    function getPrice(){
        return $this->price;
    }

    function getProducer(){
        return "{$this->producerFirstName}"." {$this->producerMainName}";
    }

    function getSummaryLine(){
        $base = "$this->title ( {$this->producerMainName}, ";
        $base .= " {$this->producerFirstName} )";
        return $base;
    }

    private $id = 0;

    public function setID($id){
        $this->id = $id;
    }

    public static function getInstance($id,PDO $pdo){
        $stmt = $pdo->prepare("select * from products where id = ?");
        $result = $stmt->execute(array($id));
        $row = $stmt->fetch();

        if(empty($row)){return null;}

        if($row['type']=='book'){
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['numpages']
            );
        }elseif($row['type']=='cd'){
            $product = new CdProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['playlength']
            );
        }else{
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price']
            );
        }

        $product->setID($row['id']);
        $product->setDiscount($row['discount']);
        return $product;
    }

}

class CdProduct extends ShopProduct{
    private $playLength = 0;

    function __construct( $title, $firstName, $mainName, $price, $playLength ){
        parent::__construct($title,$firstName,$mainName,$price);
        $this->playLength = $playLength;
    }

    function getPlayLength(){
        return $this->playLength;
    }

    function getSummaryLine(){
        $base = parent::getSummaryLine();
        $base .= ": playing time -  {$this->playLength} ";
        return $base;
    }
}

class BookProduct extends ShopProduct{
    private $numPages;

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

    function getPrice(){
        return $this->price;
    }
}


//$dsn = "sqlite://home/bob/projects/products.db";
$dsn = "mysql:host=localhost;dbname=php";
$pdo = new PDO($dsn, 'root', 'passw0rd');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);
echo "<pre>";
print_r($obj);exit;
