<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Date: 15/6/14
 * Time: 下午6:46
 */

if($_POST){
    //html
    $html = "<div class='comment'><h6>"
        .$_POST['username'].":</h6><p class='para'>"
        .$_POST['content']."</p></div>";
    exit($html);
}