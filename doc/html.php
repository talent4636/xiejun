<?php
require_once 'statics.php';


class html{
    
    /**
     * @param type_id,sub_type_id,comment_id
     * @return string
     */
    public function out($type_id){
        $html = $this->_getHead().$this->_getMainLeft($type_id).$this->_getMainRight($type_id).$this->_getFoot();
        return $html;
    }
    
    private function _getHead(){
        $dcmt_uri =  $_SERVER['DOCUMENT_URI'];
        $pre_dir = substr($dcmt_uri,0,(strpos($dcmt_uri,'index.php')));
//         exit($pre_dir);
        $html = <<<EOF
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ShopEx资料库[by PMO of ShopEx]</title>
<link href="{$pre_dir}html/main.css" rel="stylesheet" />
<script src="{$pre_dir}html/hide.js"></script>
</head>
<body>
	<div class="body">
		<div class="head">
			<div class="logo">
				<img src="{$pre_dir}html/logo.png">
			</div>
			<div class="title">
				<span class="title">ShopEx资料库&nbsp;&nbsp;&nbsp;&nbsp;[by ShopEx资源中心]</span>
			</div>
			<div class="search">
				<span>
					站内搜索：
					<input type="text" value="" placeholder="暂不可用">
					<input type="submit" value="搜索">
				</span>
			</div>
		</div>
EOF;
        return $html;
    }
    
    private function _getMainLeft($params){
        $typeList = $this->_typeList($params);
//         var_dump($typeList);exit;
        $html = <<<EOF
<div class="main">
			<div class="left-main">
				<div class="type-list">
					<ul>
						{$typeList}
					</ul>
				</div>
			</div>
EOF;
        return $html;
    }
    
    private function _getMainRight($type_id='0'){
        $statics = new statics();
        $typeArr = $statics->titleList($type_id);
        if (!$typeArr || empty($typeArr)){
            $notitle = <<<EOF
    <div class="right-main">
        <div class="desc-main">
            <div class="desc-block">
                <h3>出错啦</h3>
                <p>本类型下暂无无资料</p>
            </div>
        </div>
    </div>
</div>
EOF;
            return $notitle;
        }
        $title_html = '';
        $class = 0;
        foreach ($typeArr as $key => $title){
            $title_html .= '<div class="desc-block" style="height: 100px;" status="close" id="comment-'.$class.'"><div id="inside-div-'.$class.'"><h3 class="focus" onclick="change_fun(this,\''.$class.'\')">'.$key.'</h3><p>'.$title.'</p></div></div>';
            $class++;
        }
        $html = <<<EOF
    <div class="right-main">
		<div class="desc-main">
            {$title_html}
		</div>
	</div>
</div>
EOF;
        return $html;
    }
    
    private function _getFoot(){
        $html = <<<EOF
        <div class="foot">
            <span class="cpyrt">Powered by PMO of ShopEx</span>
        </div>
	</div>
</body>
</html>
EOF;
        return $html;
    }
    
    //CTM，千疮百孔的方法...
    private function _typeList($active_id=''){
        $dcmt_uri =  $_SERVER['DOCUMENT_URI'];
        $full_url = strpos($dcmt_uri,'index.php/');
        $statics = new statics();
        $typeArr = $statics->typeList();
        $html = '';
        if (!$active_id){
            $active_id = 0;
        }
        foreach ($typeArr as $key => $value){
            $html .= '<a href="'.($full_url?'':'index.php/').'getTypeList-'.$key.'">'.'<li'.($key==$active_id?' class="active" >':'>').$value.'<li/>'.'</a>';
        }
        return $html;
    }
    
}











