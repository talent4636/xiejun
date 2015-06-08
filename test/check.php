<?php

/**
 * Shopex 系统检测
 */

@require_once("config/config.php");
class ShopexCheckEnv{
	public function __construct(){//
		echo DB_USER;
		$this->ckeckPHP();
		$this->ckeckServer();
		$this->ckeckMysql();
		$this->ckeckOther();
	}

	public function  ckeckPHP(){
		echo "php版本监测：";
		if(version_compare(phpversion(), '5', '<')){
			$this->colorEcho('版本小于5',2);
		}else {
			$this->colorEcho('通过');
		}
	}

	public function ckeckServer(){

	}

	public function ckeckMysql(){

	}

	public function ckeckOther(){

	}

	//red or green or 
	public function colorEcho($msg, $type=1){
		switch ($type) {
			case '1':
				echo "<font style=\"color:green;\"></font>";
				break;
			case '2'://#f4645f
				echo "<font style=\"color:#f4645f;\"></font>";
			default:
				echo $msg;
				break;
		}
	}

}


$ShopexCheckEnv = new ShopexCheckEnv();


?>