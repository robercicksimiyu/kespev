<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('site_crud');
		
		$this->load->library('pagination');
		$this->load->library('table');
		if(!$this->ion_auth->logged_in()){
			redirect('main');
		}
		

		echo $this->pagination->create_links();
		

	}

	public function index()
	{	
		$this->all_events();
	}

	public function post_event($new=null){
		if(!empty($new)){
			$data['message']=$new;
		}
		$data['main_content']='main/create_event';
		$this->load->view('includes/template',$data);
	}

	public function sport($sport){

		//Checking the games input
		if($sport=="athletics"){
			$data['content']=$this->site_crud->select_sport($sport);
			$data['pic']="athletics.jpg";
			$data['game']="Athletics";
		}else 
		if($sport=="basketball"){
			$data['content']=$this->site_crud->select_sport($sport);;
			$data['pic']="basketball.png";
			$data['game']="Basketball";
		}else 
		if($sport=="football"){
			$data['content']=$this->site_crud->select_sport($sport);
			$data['pic']="football.jpg";
			$data['game']="Football";
		}else 
		if($sport=="handball"){
			$data['content']=$this->site_crud->select_sport($sport);
			$data['pic']="handball.jpg";
			$data['game']="Handball";
		}else 
		if($sport=="hockey"){
			$data['content']=$this->site_crud->select_sport($sport);
			$data['pic']="hockey.jpg";
			$data['game']="Hockey";
		}else 
		if ($sport=="volleyball"){
			$data['content']=$this->site_crud->select_sport($sport);
			$data['pic']="volleyball.jpg";
			$data['game']="Volleyball";
		}else 
			if ($sport=="rugby"){
				$data['content']=$this->site_crud->select_sport($sport);
				$data['pic']="rugby.jpg";
				$data['game']="Rugby";
		}else{
			$this->index();
		}
		
		$data['main_content']='main/games';
		$this->load->view('includes/template',$data);
	}

	public function submit_event(){
		$this->form_validation->set_rules('name', 'Event Name', 'trim|required');
		$this->form_validation->set_rules('from', 'From', 'trim|required');
		$this->form_validation->set_rules('to', 'To', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('venue', 'Venue', 'trim|required');
		$this->form_validation->set_rules('partc', 'Sports', 'trim|required');
		$this->form_validation->set_rules('sponsors', 'Sponsors', 'trim|required');

		if($this->form_validation->run()==TRUE){
			$name=$this->input->post('name');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$description=$this->input->post('description');
			$venue=$this->input->post('venue');
			$partc=ucwords(strtolower(($this->input->post('partc'))));
			$sponsors=$this->input->post('sponsors');
			$posted_by=ucwords(strtolower($this->input->post('username')));
			
			$event_data=array(
				'evt_name'=>$name,
				'from'=>$from,
				'to'=>$to,
				'description'=>$description,
				'venue'=>$venue,
				'owner'=>$posted_by,
				'sports'=>$partc,
				'sponsors'=>$sponsors);

			$this->site_crud->set_events($event_data);
			redirect('site/confirming/thank_you');

		}else{

			$this->post_event(validation_errors());

		}
		



	}

	public function confirming($message){
			/*if($message="update_err"){
				$data['confirming_err']="Sorry</br> <p>There was an error while updating.<by> <strong>Please try again</strong></p>";
				$data['val_err']=$data;
			}*/
		if($message!="thank_you"){
			$message=preg_replace("/\%20/", " ", $message);
			$message=preg_replace("/\%3C/", "", $message);
			$message=preg_replace("/p\%3E/", "", $message);
			$data['confirming_err']=$message;
		}else{
			$message="<h6>Thank you</h6>";
			$data['thank_you']=$message;
		}
		$data['sports_num']=array(
			'athletics'=>$this->site_crud->posted_on('Athletics'),
			'basketball'=>$this->site_crud->posted_on('Basketball'),
			'handball'=>$this->site_crud->posted_on('Handball'),
			'hockey'=>$this->site_crud->posted_on('Hockey'),
			'football'=>$this->site_crud->posted_on('Football'),
			'volleyball'=>$this->site_crud->posted_on('Volleyball'),
			'rugby'=>$this->site_crud->posted_on('Rugby')
			);	
		$data['content']=$this->site_crud->l_events();
		$data['content']=$this->events();
		$data['main_content']='main/welcome';
		$this->load->view('includes/template',$data);

		}

	public function events(){
		$data=$this->site_crud->l_events();
		return $data; 
	}

	public function sport_events($sport){
		$data=$this->site_crud->select_sport($sport);
		return $data;
	}

	public function matching_profile($sports,$location){
		$data['content']=$this->site_crud->match_profile($sports,$location);
		$data['pic']="rugby.jpg";
		$data['game']="Rugby";
		$data['main_content']='main/profile_match';
		$this->load->view('includes/template',$data);
	}

	public function comment(){
		$this->load->model('comment');
		$comment=$this->input->post('comment');
		$event_id=$this->input->post('event_id');
		$username=$this->input->post('username');

		$comment_data=array(
			'event_id'=>$event_id,
			'posted_by'=>$username,
			'comment'=>$comment);

			$this->comment->set_comment($comment_data);
			$this->confirming('thank_you');
	}

	public function this_event($title,$id){
		$title=preg_replace("/\%20/", " ", $title);
		$data['content']=$this->site_crud->event_one($title,$id);
		$data['main_content']='main/this_event';
		
		$this->load->view('includes/template',$data);

	}


	public function all_events(){
		   $rows=$this->site_crud->count_all();
		   $config['base_url']=site_url('site/all_events');
           $config['total_rows']=$rows;
           $config['per_page']=5;
           $config['num_links']=($rows/5);
           $config['uri_segment']=3;
           $config['full_tag_open']="<ul>";
           $config['full_tag_close']="</ul>";
           $config['cur_tag_open']="<li class='active'><a href='#'>";
           $config['cur_tag_close']="</a></li>";
           $config['num_tag_open']="<li>";
           $config['num_tag_close']="</li>";
           $config['last_tag_open']="<li class='next'>";
           $config['last_tag_close']="</li>";
           $config['next_link']=" Older &rarr;";
           $config['next_tag_open']="<li>";
           $config['next_tag_close']="</li>";
           $config['prev_link']="&larr; newer";
           $config['prev_tag_open']="<li>";
           $config['prev_tag_close']="</li>";
		   
           
          $this->pagination->initialize($config);

          $page=($this->uri->segment(3))?$this->uri->segment(3):0;
          $data['sports_num']=array(
			'athletics'=>$this->site_crud->posted_on('Athletics'),
			'basketball'=>$this->site_crud->posted_on('Basketball'),
			'handball'=>$this->site_crud->posted_on('Handball'),
			'hockey'=>$this->site_crud->posted_on('Hockey'),
			'football'=>$this->site_crud->posted_on('Football'),
			'rugby'=>$this->site_crud->posted_on('Rugby'),
			'volleyball'=>$this->site_crud->posted_on('Volleyball')
			);
          $data['content']=$this->site_crud->all_events($config["per_page"],$page);
          
          $data['main_content']='main/welcome';
          $this->load->view('includes/template',$data);
          
	}

		
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */