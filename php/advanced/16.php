<?php

/**
 * Class AddressManager
 * 回调、匿名函数和闭包
 */

class Product{

    public $name;
    public $price;

    function __construct($name,$price){
        $this->name = $name;
        $this->price = $price;
    }

}

class ProcessSale{

    private $callbacks;

    function registerCallBack($callback){
        if(!is_callable($callback)){
            throw new Exception("callback not callable");
        }
        $this->callbacks[] = $callback;
    }

    function sale($product){
        print "{$product->name}: processing \n";
        foreach($this->callbacks as $callback){
            call_user_func($callback, $product);
        }
    }
}

//下面创建的回调用来模拟记录过程：
$logger = create_function('$product', 'print "    logging ({$product->name})\n";');
$processor = new ProcessSale();
$processor->registerCallBack($logger);
$processor->sale( new Product("shoes", 6));
print "\n";
$processor->sale(new Product("coffee", 6));

echo "<hr/>";
//PHP5.3以后的新方式 create_function() 示例：
$logger2 = function($product){
    print "    logging ({$product->name})\n";
};
$processor = new ProcessSale();
$processor->registerCallBack($logger2);
$processor->sale( new Product("shoes", 6));
print "\n";
$processor->sale(new Product("coffee", 6));

echo "<hr/>";
//当然，回调不一定是匿名的，你可以使用函数名（甚至是对象应用和方法）作为回调。如下：
class Mailer{
    function doMail($product){
        print "   mailing ({$product->name})\n";
    }
}
$processor = new ProcessSale();
$processor->registerCallBack(array(new Mailer(), "doMail" ) );
$processor->sale(new Product("shoes",6));
print "\n";
$processor->sale(new Product("coffee",6));

echo "<hr/>";
//当然，你也可以让方法返回匿名函数，像下面这样：
class Totalizer{
    static function warnAmount(){
        return function($product){
            if($product->price > 5){
                print "    reached high price: {$product->price} \n";
            }
        };
    }
}
$processor = new ProcessSale();
$processor->registerCallBack(Totalizer::warnAmount());
$processor->sale(new Product("shoes",6));
print "\n";
$processor->sale(new Product("coffee",6));

echo "<hr/>";
//除了生成匿名函数之外，利用该结构还可以做更多的事情，比如利用闭包。
//这些新风格的匿名函数可以引用在其父作用域中声明的变量。
//这个概念有时候很难理解。打个比方来说，就好像匿名函数还记得它被创建时所在的作用域。
//假设我想要Totalizer::warnAmount()做两件事：
//首先是让他接受一个随机的目标金额；其次是记录售出产品的总结个。
//当总价格超出目标金额时，让该函数执行一项操作（输出一条信息）。
//利用use子句，就可以让匿名函数追踪来自父作用域的变量，如下：
#Totalizer2::warnAmount()返回的匿名函数在其子句中指定了两个变量：
#第一个变量是$amt，他是warnAmount()的实参；第二个闭包变量是$count。
#count在他是warnAmount()函数体中声明，初始值为0.
#在use子句中，在$count()变量前加了一个&，这意味着该变量可以用匿名函数中的引用而不是值来访问。
#在匿名函数的函数体中，我为$count增加了产品的价格（$product的值)，
#然后测试新的总计值是否超过$amt。如果已经达到目标值，就输出一个通知。
#说明：回调跟踪了两次调用之间的$count。$count和$amt仍然和函数相关，
#因为它们出现在声明时所在的作用域中，并且在use子句中指定。
class Totalizer2{
    static function warnAmount($amt){
        $count = 0;
        return function($product) use ($amt, &$count){
            $count += $product->price;
            print "   count:{$count} \n";
            if($count>$amt){
                print "    high price reached: {$count} \n";
            }
        };
    }
}
$processor = new ProcessSale();
$processor->registerCallBack(Totalizer2::warnAmount(8));
$processor->sale(new Product("shoes",6));
print "\n";
$processor->sale(new Product("coffee",6));



