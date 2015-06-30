<?php

/**
 * Class AddressManager
 * 接口
 */

interface Chargeable{
    public function getPrice();
}

interface Second{
    public function hello();
}

class Hi{}

class ShopProduct implements Chargeable{
    public function getPrice(){
        return ($this->price - $this->discount);
    }
}

//只能继承一个，但是可以实现多个接口， 如下：
class test extends Hi implements Chargeable,Second{
    public function hello(){}
    public function getPrice(){}
}




