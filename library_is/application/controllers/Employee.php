<?php

class Employee extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Book_model');
		$this->load->model('Borrow_model');
	}

	public function index(){
		$data['title'] = 'Home';

		$data['book'] = $this->Book_model->getAll();

		if($this->input->post('search')){
			$data['book'] = $this->Book_model->search($this->input->post('search'));
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/default_navbar');
		$this->load->view('employee/index', $data);
		$this->load->view('templates/footer');
	}

	public function return_book_manage(){
		$data['title'] = 'Home';

		$data['borrow'] = $this->Borrow_model->getAll();

		if($this->input->post('search')){
			$data['borrow'] = $this->Borrow_model->search($this->input->post('search'));
		}

		$this->load->view('templates/header', $data);
		$this->load->view('employee/return_book_manage', $data);
		$this->load->view('templates/footer');
	}

	public function return_book($borrow_id){
		$this->Book_model->return_book($this->Book_model->search_by_id($this->Borrow_model->search_by_id($borrow_id)->book_id));
		$this->Borrow_model->return_book($this->Borrow_model->search_by_id($borrow_id));
		redirect(base_url('Employee/return_book_manage'));
	}

	public function insert(){

		$this->form_validation->set_rules('isbn', 'isbn', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');
		$this->form_validation->set_rules('edition', 'edition', 'required');
		$this->form_validation->set_rules('stock', 'stock', 'required');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<script> alert("Error") </script>');
			redirect(base_url('Employee'));
		}else{
			$data = [
				"ISBN" =>$this->input->post('isbn', TRUE),
				"name" =>$this->input->post('name', TRUE),
				"author" =>$this->input->post('author', TRUE),
				"edition" =>$this->input->post('edition', TRUE),
				"stock" =>$this->input->post('stock', TRUE)
			];

			$this->Book_model->insert($data);
			$this->session->set_flashdata('pesan', '<script> alert("Success!") </script>');
			redirect(base_url('Employee'));
		}
	}

	public function delete($id){
		$this->Book_model->delete($id);
		$this->session->set_flashdata('pesan', '<script> alert("Deleted") </script>');
		redirect(base_url('Employee'));
	}

	public function update(){

		$this->form_validation->set_rules('isbn', 'isbn', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');
		$this->form_validation->set_rules('edition', 'edition', 'required');
		$this->form_validation->set_rules('stock', 'stock', 'required');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('pesan', '<script> alert("Error") </script>');
			redirect(base_url('Employee'));
		}else{
			$data = [
				"id" => $this->input->post('id', TRUE),
				"ISBN" =>$this->input->post('isbn', TRUE),
				"name" =>$this->input->post('name', TRUE),
				"author" =>$this->input->post('author', TRUE),
				"edition" =>$this->input->post('edition', TRUE),
				"stock" =>$this->input->post('stock', TRUE)
			];

			$this->Book_model->update($data);
			$this->session->set_flashdata('pesan', '<script> alert("Updated") </script>');
			redirect(base_url('Employee'));
		}

	}

}

?>
