<?php

/**
 * Class AddressManager
 * 错误处理
 */

class Conf{
    private $file;
    private $xml;
    private $lastmatch;

    function __construct($file){
        $this->file = $file;
        $this->xml = simplexml_load_file($file);
    }

    function write(){
        file_put_contents( $this->file, $this->xml->asXML() );
    }

    function get( $str ){
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if(count($matches)){
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    function set($key,$value){
        if( !is_null( $this->get($key) ) ){
            $this->lastmatch[0] = $value;
            return ;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item',$value)->addAttribute('name',$key);
    }

}

$objConf = new Conf('exception.xml');
$result = $objConf->get('pass');
$objConf->set('test','test_value');
$write = $objConf->write();
print_r($result);
var_dump($write);//写入成功，不返回
