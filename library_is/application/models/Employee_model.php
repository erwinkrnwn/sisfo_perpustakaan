<?php

class Employee_model extends CI_model{

	public function getAll(){
		return $this->db->get('employee')->result_array();
	}

	public function validate($username, $password){
		$valid = FALSE;

		foreach ($this->getAll() as $employee) {
			if(strcmp($employee['username'], $username) == 0 && strcmp($employee['password'], $password) == 0){
				$valid = TRUE;
				break;
			}
		}

		return $valid;
	}

	public function id_of_session($username){
		$this->db->where('username', $username);
		return $this->db->get('employee')->row()->id;
	}

	
	public function search($search){
		$this->db->where('username', $search);
		$this->db->or_where('position', $search);
		$this->db->or_where('fullname', $search);
		$this->db->or_where('age', $search);
		$this->db->or_where('birthdate', $search);
		$this->db->or_where('address', $search);

		return $this->db->get('employee')->result_array();
	}

	public function insert($data){
		$this->db->insert('employee', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('employee');
	}

	public function update($data){
		$this->db->where('id', $data['id']);
		$this->db->update('employee', $data);
	}
}

?>