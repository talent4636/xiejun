<?php

/**
 * Class AddressManager
 * 异常--抛出异常
 */

class Conf{
    private $file;
    private $xml;
    private $lastmatch;

    function __construct($file){
        $this->file = $file;
        if(!file_exists( $file )){//文件不存在抛出错误
            throw new Exception( "file '$file' does not exist");
        }
        $this->xml = simplexml_load_file($file);
    }

    function write(){
        if(!is_writable($this->file)){
            throw new Exception("file '{$this->file}' is not writeable");
        }
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

try{//将调用的方法放到try子句中
    $objConf = new Conf('exception.xml');
    $result = $objConf->get('pass');
    $objConf->set('test','test_value');
    $write = $objConf->write();
    print_r($result);
    var_dump($write);
}catch (Exception $e){//捕获异常
    die( $e->__toString() );//返回一个描述错误的字符串，die并打印
}

