<?php


class canvas{

    public $canvas;
    
    public function init(){
        $array = [];
        for($i=0;$i<20;$i++){
            for($j=0;$j<20;$j++){
                $array[$i][$j] = '*';
            }
        }
        $this->canvas = $array; 
    }

    public function draw($width,$height,$x,$y){
        for($i=$x;$i<$width;$i++){
            exit($i);
            for($j=$y;$j<$height;$j++){
                $this->canvas[$i][$j] = '@';
            }
        }
        echo "<pre>";
        print_r($this->canvas);exit;
        $this->defaultDraw();
    }
    
    public function defaultDraw(){
        foreach($this->canvas as $canv){
            foreach($canv as $v){
                echo ' '.$v;
            }
            echo "\n";
        }
    }

}

$canvas = new canvas();
$canvas->init();
$canvas->draw(3,5,5,5);


?>
