<?php

class Borrow_model extends CI_model{

	public function getAll(){
		$data = $this->db->get('borrow')->result_array();
		foreach($data as $borrow => $dummy){
			if($data[$borrow]['date_returned'] == NULL){
				$data[$borrow]['charge'] = date_create_from_format('Y-m-d', $data[$borrow]['date_borrowed'])->diff(date_create_from_format('Y-m-d', date('Y-m-d')))->days*1000;
			}else{
			$data[$borrow]['charge'] = date_create_from_format('Y-m-d', $data[$borrow]['date_borrowed'])->diff(date_create_from_format('Y-m-d', $data[$borrow]['date_returned']))->days*1000;
			}
		}
		return $data;
	}


	public function insert($data){
		$this->db->insert('borrow', $data);
	}

	public function search_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get('borrow')->row();
	}

	public function return_book($data){
		$data->date_returned = date('Y-m-d');
		$this->db->where('id', $data->id);
		$this->db->update('borrow', $data);
	}

}

?>