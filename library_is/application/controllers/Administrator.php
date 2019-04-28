<?php

class Administrator extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Employee_model');
		$this->load->model('Borrow_model');
	}

	public function index(){
		$data['title'] = 'Home';

		$data['employee'] = $this->Employee_model->getAll();

		if($this->input->post('search')){
			$data['employee'] = $this->Employee_model->search($this->input->post('search'));
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/default_navbar');
		$this->load->view('administrator/index', $data);
		$this->load->view('templates/footer');
	}

	public function report(){
		$data['title'] = 'Home';

		$data['borrow'] = $this->Borrow_model->getAll();

		if($this->input->post('search')){
			$data['borrow'] = $this->Borrow_model->search($this->input->post('search'));
		}

		$this->load->view('templates/header', $data);
		$this->load->view('administrator/report', $data);
		$this->load->view('templates/footer');
	}

	public function insert(){

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		$this->form_validation->set_rules('fullname', 'fullname', 'required');
		$this->form_validation->set_rules('age', 'age', 'required');
		$this->form_validation->set_rules('birthdate', 'birthdate', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<script> alert("Error! All fields must be filled in or Data Duplicated!") </script>');
			redirect(base_url('Administrator'));
		}else{
			$data = [
				"username" =>$this->input->post('username', TRUE),
				"password" =>$this->input->post('password', TRUE),
				"position" =>$this->input->post('position', TRUE),
				"fullname" =>$this->input->post('fullname', TRUE),
				"age" =>$this->input->post('age', TRUE),
				"birthdate" =>$this->input->post('birthdate', TRUE),
				"address" =>$this->input->post('address', TRUE)
			];

			$this->Employee_model->insert($data);
			$this->session->set_flashdata('pesan', '<script> alert("Input success!") </script>');
			redirect(base_url('Administrator'));
		}
	}

	public function delete($id){
		$this->Employee_model->delete($id);
		$this->session->set_flashdata('pesan', '<script> alert("Delete success!") </script>');
		redirect(base_url('Administrator'));
	}

	public function update(){

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		$this->form_validation->set_rules('fullname', 'fullname', 'required');
		$this->form_validation->set_rules('age', 'age', 'required');
		$this->form_validation->set_rules('birthdate', 'birthdate', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('username', 'username', 'is_unique[employee.username]');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<script> alert("Error! Duplicated data!") </script>');
			redirect(base_url('Administrator'));
		}else{
			$data = [
				"id" =>$this->input->post('id', TRUE),
				"username" =>$this->input->post('username', TRUE),
				"password" =>$this->input->post('password', TRUE),
				"position" =>$this->input->post('position', TRUE),
				"fullname" =>$this->input->post('fullname', TRUE),
				"age" =>$this->input->post('age', TRUE),
				"birthdate" =>$this->input->post('birthdate', TRUE),
				"address" =>$this->input->post('address', TRUE)
			];

			$this->Employee_model->update($data);
			$this->session->set_flashdata('pesan', '<script> alert("Data updated!") </script>');
			redirect(base_url('Administrator'));
		}

	}

}

?>
