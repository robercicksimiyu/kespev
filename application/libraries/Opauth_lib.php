<?php

$opauth_lib_dir = dirname(__FILE__) . '\Opauth-lib\lib\Opauth';
require $opauth_lib_dir . '\Opauth.php';

class Opauth_Lib{

	protected $configurations;
	protected $opauth_obj;

	public function __construct($configurations){
		$this->configurations=$configurations;

	}

	public function authenticate(){
		$response=null;
		$response=unserialize(base64_decode($_POST['opauth']));
		echo "<pre>";print_r($response);exit;
	}

}




?>