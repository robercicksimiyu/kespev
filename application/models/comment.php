<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Comment extends CI_Model{

	function set_comment($data){
		$this->db->insert('event_comments',$data);
		
		return;
	}

	function count_comment($event_id){
		$this->db->where('event_id',$event_id);
		$this->db->from('event_comments');
		$results=$this->db->count_all_results();

		if(!empty($results)){
			return $results;
		}else{
			return 0;
		}
		

	}

	public function display($event_id){
		$this->db->where('event_id',$event_id);
		$this->db->limit(3)->order_by('time_commented',"asc");
		$results=$this->db->get('event_comments');

		foreach($results->result() as $dat){
			$data[]=$dat;
		}

		if(!empty($results)){
			return $data;
		}else{
			return array();
		}
	}

	public function months($month){
		switch ($month){
			case 1:
			return "Jan";
			case 2:
			return "Feb";	
			case 3:
			return "Mar";
			case 4:
			return "Apr";
			case 5:
			return "May";
			case 6:
			return "June";
			case 7:
			return "Jul";
			case 8:
			return "Aug";	
			case 9:
			return "Sept";
			case 10:
			return "Oct";
			case 11:
			return "Nov";
			case 12:
			return "Dec";
		}
		
	
	}

	public function display_all($event_id){
		$this->db->where('event_id',$event_id);
		$this->db->order_by('time_commented',"asc");
		$results=$this->db->get('event_comments');

		foreach($results->result() as $dat){
			$data[]=$dat;
		}

		if(!empty($results)){
			return $data;
		}else{
			return array();
		}
	}
	
	function timing($time){
		$time=strtotime($time);
		$diff=time()-$time;
				
		echo $this->get_timing($diff);
	}

	
	function get_timing($ts){
		$s=0;$m=0;$hr=0;$d=0;$mth=0;$yr=0;$td="just now";
		print $ts;
		
		if($ts>59){
			$m=(int)($ts/60);
			$td="{$m} minutes ago";

			if($m>59){
				$hr=(int) ($m/60);
				$td="{$hr} hours ago";
				if($hr>23){
					$d=(int) ($hr/24);
					if($d<1){
						$td="{$d} day ago";
					}else{
						$td="{$d} days ago";
					}
					if($d>29){
						$mth=(int)($d/30);
						$td="about {$mth} months ago";
						if($d>364){
							$yr=(int) ($d/365);
							$td="about {$yr} years ago";
						}
					}
					
				}
			}

		}
		
		
		
		
		
		
		
		
		return $td;
	}

	
}