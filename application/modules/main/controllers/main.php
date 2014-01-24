<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller {

	protected $open_auth_config;

	public  function __construct(){
		parent::__construct();
		$this->open_auth_config=$this->config->item('opauth');
		//$this->load->library('opauth_lib',$this->open_auth_config);
		$this->form_validation->set_message('valid_email','Invalid email address');
		$this->form_validation->set_message('matches','Passwords do not match');
		$this->load->library('pagination');
		$this->load->library('ion_auth');
		$this->load->model('u');
		$this->load->model('site_crud');
	}

	public function index()
	{
	
		if($this->ion_auth->logged_in()==TRUE){
			redirect('site');
		}else{
			$data['sports_num']=array(
				'athletics'=>$this->site_crud->posted_on('Athletics'),
				'basketball'=>$this->site_crud->posted_on('Basketball'),
				'handball'=>$this->site_crud->posted_on('Handball'),
				'hockey'=>$this->site_crud->posted_on('Hockey'),
				'football'=>$this->site_crud->posted_on('Football'),
				'rugby'=>$this->site_crud->posted_on('Rugby'),
				'volleyball'=>$this->site_crud->posted_on('Volleyball')
				);
			$data['main_content']="users/home";
			$this->load->view('includes/template',$data);
		}
		
		
	}

	public function signup(){
		$data['main_content']="users/signup";
		$data['email']=$this->input->post('email');
		$this->load->view('includes/template',$data);
	}


	public function create_user(){
		//validating the form
		$this->form_validation->set_rules('fName', 'first name', 'trim|required');
		$this->form_validation->set_rules('lName', 'last name', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]|callback_check_user');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('c_password', 'confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('phone', 'phone number', 'trim|required|is_numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

		$firstname=$this->input->post('fName');
		$lastname=$this->input->post('lName');
		$username=strtolower($this->input->post('username'));
		$password=$this->input->post('password');
		$c_password=$this->input->post('c_password');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');

		if($this->form_validation->run()==TRUE){

			$addition_data=array(
				'first_name'=>$firstname,
				'last_name'=>$lastname,
				'phone'=>$phone
			);

			$this->ion_auth->register($username,$password,$email,$addition_data);
			$data['username']=$username;
			$data['main_content']="users/complete_registration";
			$this->load->view('includes/template',$data);
		}else{
			$data['message']=validation_errors();
			$data['email']=$email;
			$data['fname']=$firstname;
			$data['lname']=$lastname;
			$data['username']=$username;
			$data['password']=$password;
			$data['c_password']=$c_password;
			$data['phone']=$phone;
						
			$data['main_content']="users/signup";
			$this->load->view('includes/template',$data);
		}
		
		//assigning variables
		}
		
		function check_mail($str){
			if($this->u->mail_check($str)>0){
				$this->form_validation->set_message('check_user','username already exists');
				return FALSE;
			}else{
				return TRUE;
			}
						
		}

		function complete_registration(){
			$sport=$this->input->post('sport_name');
			$location=$this->input->post('location');
			$option=$this->input->post('option');
			$username=$this->input->post('username');
			
			

			$complete=array(
			'fav_sport'=>$sport,
			'location'=>$location,
			'option'=>$option);
			
			$this->u->complete_reg($complete,$username);

			$this->log_in();
			
			}



		function log_in(){
			$data['main_content']="users/login";
			$this->load->view('includes/template',$data);
		}

		function auth($strategy=""){
			if($strategy!=""){
				$this->openauth_lib->initialize();
			}else{
				foreach ($this->open_auth_config['strategy'] as $strategy=>$strategy_detail){
					echo "<p><a href='".$this->config->item('base_url')."index.php/main/login/".strtolower($strategy)."'>".$strategy."</a></p>";
				}
			}
		}


		function authenticate(){
			$this->form_validation->set_rules('l_email','Email','required|trim|valid_email');
			$this->form_validation->set_rules('l_password','Password','required|trim');

			if($this->form_validation->run()==TRUE){
				$email=$this->input->post('l_email');
				$password=$this->input->post('l_password');
				
				if($this->ion_auth->login($email,$password,1)){
					$results=$this->u->sess_data($email);

					foreach($results as $res){
						$this->session->set_userdata('first_name',$res->first_name);
						$this->session->set_userdata('last_name',$res->last_name);
						$this->session->set_userdata('location',$res->location);
						$this->session->set_userdata('phone',$res->phone);
						$this->session->set_userdata('fav_sport',$res->fav_sport);
						$this->session->set_userdata('option',$res->option);
					}
					redirect('site/index');
				}
				$data['lin_email']=$email;
				$data['message']="Wrong username or password";
				$data['main_content']="users/login";
				$this->load->view('includes/template',$data);



				//$userdata=$this->session->all_userdata();
				//echo '<h1>'.$userdata['session_id'].'</h1>';
			}else{
				$data['lin_email']=$this->input->post('l_email');

				$data['message']=validation_errors();
				$data['main_content']="users/login";
				$this->load->view('includes/template',$data);
			}


		}
		
		

		

		function is_admin(){

		}

		function logout(){
			$this->ion_auth->logout();
			redirect('/');
		}

		function contact(){
			$data['main_content']='Extras/contact';
			$this->load->view('includes/template',$data);
		}

		function update_user(){
			$this->form_validation->set_rules('fName', 'first name', 'trim|required');
			$this->form_validation->set_rules('lName', 'last name', 'trim|required');
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('phone', 'phone number', 'trim|required');
			$this->form_validation->set_rules('location', 'Residence', 'trim|required');
			$this->form_validation->set_rules('sport', 'Sport', 'trim|required');


			$firstname=$this->input->post('fName');
			$lastname=$this->input->post('lName');
			$username=$this->input->post('username');
			$phone=$this->input->post('phone');
			$location=$this->input->post('location');
			$sport=$this->input->post('sport');
			$id=$this->input->post('id');
			$option=$this->input->post('option');

			if($this->form_validation->run()==TRUE){

				$update_data=array(
					'username'=>$username,
					'first_name'=>$firstname,
					'last_name'=>$lastname,
					'phone'=>$phone,
					'location'=>$location,
					'fav_sport'=>$sport,
					'option'=>$option
				);

				$this->ion_auth->update($id,$update_data);

				$data="thank_you";
				redirect('site/confirming/'.$data);
				$this->index();
			}else{
				$data=validation_errors();
				redirect('site/confirming/'.$data);
				//redirect();
			}
			
		}


		public function contacting(){
			return;

		}

		public function profile($username){
			$data['owner_posts']=$this->u->personal_latest($username);
			$data['profile_data']=$this->u->profile_data($username);
			$data['main_content']='users/profile';
			$this->load->view('includes/template',$data);
		}
		
		public function help(){
			$data['main_content']='extras/help';
			$this->load->view('includes/template',$data);
		}

		/*public function one_event($title){
			
		}*/

		function mimi(){
			$ans=1+3;

			return $ans;
		}

		function unit_testing(){
			/*$this->load->library('unit_test');
			$this->unit->run($this->site_crud->l_events(),array(),'Testing latest events');

			echo $this->unit->result();*/
			$this->benchmark->mark('code_start');
			$this->mimi();
			$this->benchmark->mark('code_end');
			echo $this->benchmark->elapsed_time('code_start','code_end');


		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

