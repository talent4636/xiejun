<?php

/**
 * Class AddressManager
 * 异常--异常的子类化
 */

class Conf{
    private $file;
    private $xml;
    private $lastmatch;

    function __construct($file){
        $this->file = $file;
        if(!file_exists( $file )){
            throw new FileException( "file '$file' does not exist");//抛出自己定义的异常子类
        }
        //传递了一个可选的参数 LIBXML_NOERROR 给 simplexml_load_file，
        //用于抑制错误警告的直接输出，并在警告发生之后留给 XmlException 类来处理
        $this->xml = simplexml_load_file($file,null,LIBXML_NOERROR);
        if(!is_object( $this->xml )){
            throw new XmlException( libxml_get_last_error() );//libxml_get_last_error
        }
        print gettype( $this->xml );
        $matches = $this->xml->xpath("/conf");
        if(!count( $matches )){
            throw new ConfException("could not find root element: conf");
        }
    }

    function write(){
        if(!is_writable($this->file)){
            throw new FileException("file '{$this->file}' is not writeable");
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

/** 异常的子类 */
class XmlException extends Exception{
    private $error;
    function __construct(LibXMLError $error){
        $shortfile = basename( $error->file );
        $msg = "[{$shortfile}, line {$error->line},col {$error->column}]{$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }
    function getLibXmlError(){
        return $this->error;
    }
}
class FileException extends Exception{}
class ConfException extends Exception{}

try{//将调用的方法放到try子句中
    $objConf = new Conf('XmlException.xml');//不规范的xml，不能生成对象，会抛出 XmlException
}catch (XmlException $e){//捕获异常
//    echo "<pre>";print_r($e->getTrace());exit;
    /**
    Array(
        [0] => Array(
            [file] => /data/www/xiejun/php/advanced/10.php
            [line] => 74
            [function] => __construct
            [class] => Conf
            [type] => ->
            [args] => Array(
                [0] => XmlException.xml
            )
        )
    )*/

    die( $e->__toString() );//返回一个描述错误的字符串，die并打印
    /**
    exception 'XmlException' with message
    '[XmlException.xml, line 6,col 12]
    Opening and ending tag mismatch: confx line 2
    and conf ' in /data/www/xiejun/php/advanced/10.php:22 Stack trace: #0
    /data/www/xiejun/php/advanced/10.php(74): Conf->__construct('XmlException.xm...')
    #1 {main}
     */
}catch(FileException $e){
    //.....
}catch(ConfException $e){
    //.......
}catch(Exception $e){

}

