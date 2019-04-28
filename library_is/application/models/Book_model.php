<?php

class Book_model extends CI_model{

	public function getAll(){
		return $this->db->get('book')->result_array();
	}

	public function search($search){
		$this->db->where('ISBN', $search);
		$this->db->or_where('name', $search);
		$this->db->or_where('author', $search);
		$this->db->or_where('edition', $search);

		return $this->db->get('book')->result_array();
	}

	public function search_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get('book')->row();
	}

	public function insert($data){
		$this->db->insert('book', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('book');
	}

	public function update($data){
		$this->db->where('id', $data['id']);
		$this->db->update('book', $data);
	}

	public function available($id){
		if($this->search_by_id($id)->stock > 0){
			
			$data = [
				"stock" =>$this->search_by_id($id)->stock-1
			];

			$this->db->where('id', $id);
			$this->db->update('book', $data);
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function return_book($data){
		$data->stock = $data->stock+1;
		$this->db->where('id', $data->id);
		$this->db->update('book', $data);
	}

}

?>