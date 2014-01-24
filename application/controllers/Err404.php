<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Err404 extends CI_Controller{

	function index(){
		$this->load->view('err404');   
	}
}