<?php

class Member extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Book_model');
		$this->load->model('Borrow_model');
	}

	public function index(){
		$data['title'] = 'Home';


		if($this->input->post('search')){
			$data['book'] = $this->Book_model->search($this->input->post('search'));
		}else{
			$data['book'] = $this->Book_model->getAll();
		}

		$this->load->view('templates/header', $data);
		if($this->session->userdata('username') == NULL){
			$this->load->view('templates/before_login_navbar');
		}else{
			$this->load->view('templates/after_login_navbar');
		}
		$this->load->view('member/index', $data);
		$this->load->view('templates/footer');
	}

	public function borrow($book_id){
		if($this->session->has_userdata('id')){
			$data = [
				"member_id" =>$this->session->userdata('id'),
				"book_id" =>$book_id,
				"date_borrowed" =>date('Y-m-d'),
				"date_returned" =>NULL
			];

			if($this->Book_model->available($book_id) == TRUE){
				$this->Borrow_model->insert($data);
				$this->session->set_flashdata('pesan', '<script> alert("Success, book borrowed") </script>');
				redirect(base_url('Member'));
			}else{
				$this->session->set_flashdata('pesan', '<script> alert("Out of stock!") </script>');
				redirect(base_url('Member'));
			}
		}else{
			$this->session->set_flashdata('pesan', '<script> alert("Login first!") </script>');
			redirect(base_url('Member'));
		}
	}

	public function insert(){

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('fullname', 'fullname', 'required');
		$this->form_validation->set_rules('age', 'age', 'required');
		$this->form_validation->set_rules('birthdate', 'birthdate', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('username', 'username', 'is_unique[member.username]');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<script> alert("Error! All fields must be filled in or Data Duplicated!") </script>');
			redirect(base_url('Member'));
		}else{
			$data = [
				"username" =>$this->input->post('username', TRUE),
				"password" =>$this->input->post('password', TRUE),
				"fullname" =>$this->input->post('fullname', TRUE),
				"age" =>$this->input->post('age', TRUE),
				"birthdate" =>$this->input->post('birthdate', TRUE),
				"address" =>$this->input->post('address', TRUE)
			];

			$this->Member_model->insert($data);
			$this->session->set_flashdata('pesan', '<script> alert("Success! Please login!") </script>');
			redirect(base_url('Member'));
		}
	}

}

?>
