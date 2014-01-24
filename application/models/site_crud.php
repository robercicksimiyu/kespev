<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Site_CRUD extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	function l_events($location=null){
		if(!empty($location)){
			$this->db->like('venue',$location);
		}
		$this->db->order_by('time_posted','desc');
		$this->db->limit(5);
		$results=$this->db->get('events');
		if($results->num_rows>0){
			foreach($results->result() as $dat){
				$data[]=$dat;
			}

			return $data;
		}else{
			return $data=array();
		}
				
	}

	function set_events($data){
		$this->db->insert('events',$data);
		return;

	}

	function select_sport($sport){
		$this->db->order_by('time_posted','desc');
		$this->db->limit(5);
		$this->db->like('sports',$sport);
		$results=$this->db->get('events');

		if($results->num_rows>0){
			foreach($results->result() as $dat){
				$data[]=$dat;
			}

			return $data;
		}else{
			return $data=array();
		}


	}

	function posted_on($game){
		$this->db->like('sports',$game);
		$this->db->order_by('time_posted',"desc");
		$results=$this->db->get('events');

		return $results->num_rows;
	}

	function match_profile($game,$location){
		$this->db->like('sports',$game);
		$this->db->order_by('time_posted',"desc");
		$this->db->or_like('venue',$location);
		$results=$this->db->get('events');

		if($results->num_rows>0){
			foreach($results->result() as $dat){
				$data[]=$dat;
			}

			return $data;
		}else{
			return array();
		}

		
	}

	public function event_one($title,$id){
		$this->db->where('evt_name',$title)->where('id',$id)->order_by('time_posted','desc')->limit(5);
		$results=$this->db->get('events');
		if($results->num_rows>0){
			foreach($results->result() as $dat){
				$data[]=$dat;
			}

			return $data;
		}else{
			return $data=array();
		}
	}

	public function all_events($limit,$start){
		$this->db->limit($limit,$start);
		$this->db->order_by('time_posted','desc');
		$results=$this->db->get('events');
		if($results->num_rows>0){
			foreach($results->result() as $dat){
				$data[]=$dat;
			}

			return $data;
		}else{
			return $data=array();
		}
	}

	public function count_all(){
		$this->db->from('events');
		$results=$this->db->count_all_results();
		return $results;
	}


	
}