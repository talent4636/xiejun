<?php
class statics{
    private $comment_dir;
    public $base_dir;
    
    function __construct(){
        $base_dir = dirname(__FILE__);
        $this->base_dir = $base_dir;
        $this->comment_dir = $base_dir.'/comment';
    }

    function typeList($id=null){
        //static doc type list
        $typeList = array(
            0=>'说明文档',
            1=>'系统安装与部署',
            2=>'系统联通',
            3=>'常见问题汇总',
            4=>'其他',
        );
        
        if (!$id){
            return $typeList;
        }else{
            return $typeList[$id];
        }
        
    }
    
    //获取所有文档的标题
    function titleList($type_id){
        $type_dir = $this->comment_dir.'/'.$type_id;
        $file_names = scandir($type_dir);
        unset($file_names[0],$file_names[1]);//. ..  what the fuck?
//         sort($file_names);
        $title_arr = array();
        foreach ($file_names as $v){
            $handle = fopen($type_dir.'/'.$v,'r');
            $title_arr[substr($v,0,(strpos($v,'.txt')))] = str_replace("\n",'<br/>',fread($handle, filesize($type_dir.'/'.$v)));
            fclose($handle);
            unset($handle);
        }
//         var_dump($title_arr);exit;
// var_dump($title_arr);exit;
        return $title_arr;
    }
    
    //获取文档详情
    function comment($id){
        
    }
    
    
    
    
}







