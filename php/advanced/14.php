<?php

/**
 * Class AddressManager
 * 使用__clone复制对象
 */

class Person{

    private $name;
    private $age;
    private $id;
    public $account;

    function __construct($name,$age, Account $account){
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    function setId($id){
        $this->id = $id;
    }

    function __clone(){
        $this->id = 0;
//        $this->account = clone $this->account;
    }
}

class Account{
    public $balance;
    function __construct($balance){
        $this->balance = $balance;
    }

}

$person = new Person("bob", 44, new Account(200));
$person->setId(343);
$person2 = clone $person;
print_r($person2);
echo "<br/>";
//给bob充值10块
$person->account->balance += 10;
//看看他的clone对象有多少钱？
//结果复制的对象也有210块了。这样不合理。
//解决这个问题，参考 line 27 的处理
print_r($person2);

