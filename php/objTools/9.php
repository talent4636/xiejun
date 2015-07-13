<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-类函数和和对象函数-方法调用 call_user_func_array
 */

class test{

    function __call($method, $args){
        if(method_exists( $this->thirdpartyShop, $method)){
            return call_user_func_array( array($this->thirdpartyShop, $method), $args );
        }
    }

}
