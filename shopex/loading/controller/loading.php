<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Time: 16/1/7 16:53
 */

class loading_ctl_loading extends desktop_controller{

    var $name = "Loading";
    var $workground = 'loading_lalala';

    public function index(){
        $this->page('loading.html');
    }

    public function ajaxData(){
        set_time_limit(0);
//        sleep(1);
        $count = (int)$_POST['count'];
        exit(json_encode(array('count'=>($count+1))));
    }

}