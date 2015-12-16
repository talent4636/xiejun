<?php

/**
 * Class AddressManager
 * 延迟静态绑定： static关键字
 */

abstract class DomainObject{
    private $group;

    public function __construct(){
        $this->group = static::getGroup();
    }

    public static function create(){
        return new static();
    }

    static function getGroup(){
        return "default";
    }
}

class User extends DomainObject{

}

class Document extends DomainObject{
    static function getGroup(){
        return "document";
    }
}

class SpreadSheet extends Document{

}

print_r(User::create());
echo "<br/>";
print_r(SpreadSheet::create());
/**
 * User Object ( [group:DomainObject:private] => default )
 * <br/>
 * SpreadSheet Object ( [group:DomainObject:private] => document )
 */




