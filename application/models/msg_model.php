<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msg_MODEL extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function send_message($data){
		$this->db->insert('message',$data);
		
	}
	public function conversation($user,$profile){
		$this->db->limit(4);
		$this->db->order_by('time_msg','desc');
		$this->db->where(array('msg_from'=>$user,'msg_to'=>$profile));
		$this->db->or_where(array('msg_to'=>$user,'msg_from'=>$profile));
		$results=$this->db->get('message');
		
		if(!empty($results)){
			foreach($results->result() as  $dat){
				$data[]=$dat;
			}
			if(!empty($data)){
				return $data;
			}else{
				return array();
			}
			
		}else{
			return array();
		}
	}
	
	function count_msgs($username){
		$this->db->where('msg_from',$username)->or_where('msg_to',$username)->from('message');
		$results=$this->db->count_all_results();
		
		return $results;
		
	}
}
