<?php

class AddressManager{

    private $addresses = array(
        '209.131.36.159',
        '74.125.19.106',
        '8.8.8.8',
    );

    function outputAddresses( $resolve ){
        //第一种方式，匹配然后重新赋值
//        if( is_string( $resolve )){
//            $resolve = (preg_match("/false|no|off/i",$resolve)) ?false:true;
//        }
        //审查 $resolve 的类型
//        if( ! is_bool($resolve)){
//            die( "outputAddress() requires a Boolean argument \n" );
//        }
        foreach( $this->addresses as $address){
            print "<br/>".$address;
            if( $resolve ){
                print "(".gethostbyaddr( $address ).")";
            }
        }
    }
}

$settings = simplexml_load_file('settings.xml');
$manager = new AddressManager();
$manager->outputAddresses((string)$settings->resolvedomains );

