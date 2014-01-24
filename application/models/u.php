<?php defined('BASEPATH') OR exit('No direct script access allowed');

class U extends CI_Model{

	function complete_reg($complete,$username){
		$this->db->where('username',$username);
		$this->db->update('users',$complete);
		return;
	}

	function sess_data($email){
		$results=$this->db->get_where('users',array('email'=>$email));

		if($results->num_rows>0){

			foreach($results->result() as $dat){

				$data[]=$dat;

			}

			return $data;

		}

		return;
	}

	function profile_data($username){
		$results=$this->db->get_where('users',array('username'=>$username));

		if($results->num_rows>0){

			foreach($results->result() as $dat){

				$data[]=$dat;

			}

			return $data;

		}

		return $data=array();
	}

	function personal_latest($username){
		$this->db->order_by('time_posted',"desc");
		$this->db->limit(2);
		$results=$this->db->get_where('events',array('owner'=>$username));

		if($results->num_rows>0){

			foreach($results->result() as $dat){

				$data[]=$dat;

			}

			return $data;

		}

		return $data=array();
	}
	
	public function mail_check($check){
		$this->db->where('username',$check);
		$this->db->from('users');
		$results=$this->db->count_all_results();
		
		return $esults;
		
		
		
	}

}