<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('msg_model');
		
	}
	
	function send_message(){
		$msg_content=$this->input->post('msg_content');
		$msg_from=$this->input->post('msg_from');
		$msg_to=$this->input->post('msg_to');
		
		$msg_data=array(
		'msg_from'=>$msg_from,
		'msg_to'=>$msg_to,
		'msg_content'=>$msg_content);
		
		$this->msg_model->send_message($msg_data);
		
		redirect('main/profile/'.$msg_to);
	}
	
	
	
	
	
	
} 