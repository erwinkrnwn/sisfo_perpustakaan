<?php

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Administrator_model');
		$this->load->model('Employee_model');
		$this->load->model('Member_model');
	}

	public function index(){
		$data['title'] = 'Login';
		$this->load->view('templates/header', $data);
		$this->load->view('login/index');
		$this->load->view('templates/footer');
	}

	public function validate(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger"><center>Username or Password doesnt match</center></div>');
			redirect(base_url('Login'));
		}else if($this->Administrator_model->validate($this->input->post('username'), $this->input->post('password')) == TRUE){
			$userdata = array(
				'id' => $this->Administrator_model->id_of_session($this->input->post('username')),
				'username' => $this->input->post('username')
			);
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('pesan', '<script> alert("You are logged in as Administrator") </script>');
			redirect(base_url('Administrator'));
		}else if($this->Employee_model->validate($this->input->post('username'), $this->input->post('password')) == TRUE){
			$userdata = array(
				'id' => $this->Employee_model->id_of_session($this->input->post('username')),
				'username' => $this->input->post('username')
			);
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('pesan', '<script> alert("You are logged in as Employee") </script>');
			redirect(base_url('Employee/index/1'));
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger"><center>Username or Password doesnt match</center></div>');
			redirect(base_url('Login'));
		}

	}

	public function validate_member(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<script> alert("Username or Password doesnt match!") </script>');
			redirect(base_url('Member'));
		}else if($this->Member_model->validate($this->input->post('username'), $this->input->post('password')) == TRUE){
			$userdata = array(
				'id' => $this->Member_model->id_of_session($this->input->post('username')),
				'username' => $this->input->post('username')
			);
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('pesan', '<script> alert("Login Success!") </script>');
			redirect(base_url('Member'));
		}else{
			$this->session->set_flashdata('pesan', '<script> alert("Username or Password doesnt match!") </script>');
			redirect(base_url('Member'));
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('landingPage'));
	}

}

?>
