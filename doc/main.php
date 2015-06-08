<?php
require_once 'statics.php';
require_once 'html.php';


class main{
    
    //私有常量
    private $stitics;
    private $typeList;
    private $titleList;
    
    //类的构造函数，默认得到以下常亮
    function __construct(){
//         $statics = new statics();
//         $this->typeList = $statics->typeList();
//         $this->titleList = $statics->titleList();
    }
    
    //分析url，得到  key word   并返回
    static function router(){
        $path = '';
        if (isset($_SERVER['PATH_INFO'])){
            $path = $_SERVER['PATH_INFO'];
        }elseif(isset($_SERVER['ORIG_PATH_INFO'])){
            $path = $_SERVER['ORIG_PATH_INFO'];
            if (isset($_SERVER['SCRIPT_NAME'])){
                $script_name = $_SERVER['SCRIPT_NAME'];
            }else{
                if (isset($_SERVER['ORIG_SCRIPT_NAME'])){
                    $script_name = $_SERVER['ORIG_SCRIPT_NAME'];
                }else {
                    $script_name = '';
                }
            }
            if (substr($script_name, -1, 1) == '/'){
                $path = $path . '/';
            }
        }
        
        if ($path) $path = "/".ltrim($path, "/");
        
        if (isset($path{1})){
            if ($p = strpos($path, '/', 2)){
                $part = substr($path, 0, $p);
            }else {
                $part = $path;
            }
        }else {
            $part = '/';
        }
        
        return $part;
    }
    
    //主程序选择 入口
    public function mainFnc($str){
//         var_dump($str);exit;
        //默认情况处理
        if ($str == '/' || $str == ''){
            $str = '/getTypeList-0';
        }
        if($p = strpos($str,'-')){
            $method = substr($str, 1, $p-1);
            $params = substr($str, $p+1);
        }else {
            $method = substr($str, 1);
        }
        //过滤非法参数
        if (!method_exists($this,$method)){
            $this->somethingWrong();
            exit;
        }
        $r = $this->$method($params);
        $this->output($params);
    }
    
    /*******************************************/
    
    //获取文章列表  如果有参数，则返回请求的文章列表？
    function getTitleList($params){
        $statics = new statics();
        return $statics->titleList($params);
    }
    
    function getTypeList($params){
        $statics = new statics();
        return $statics->typeList($params);
    }
    
    //获取所有文章列表
    function getList(){
        
    }
    
    //获取单一文章
    function getOne($id){
        
    }
    
    //搜索，得到结果。  稍复杂
    function search(){
        $contex = $_GET;
        if (!trim($contex)){
            $this->somethingWrong();
        }else{
            //TODO
        }
    }
    
    /*******************************************/
    
    //整理信息打印
    function output($params){
//         if (empty($params)){
//             exit('soory, something wrong ~ ');
//         }
        
        $html = new html();
        echo $html->out($params);
    }
    
    function somethingWrong(){
        $params = array();
        //TODO
        exit('错啦~');
    }
    
}











