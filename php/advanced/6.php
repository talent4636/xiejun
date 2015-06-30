<?php

/**
 * Class AddressManager
 * 延迟静态绑定： static关键字
 */

//Fatal error: Cannot instantiate abstract class DomainObject in /data/www/xiejun/php/advanced/6.php on line 14
//abstract class DomainObject{
//    public static function create(){
//        return new self();
//    }
//}

abstract class DomainObject{
    public static function create(){
        return new static();
    }
}

class Document extends DomainObject{

}

print_r(Document::create());//这个时候是实例化一个Document而不是DomainObject类




