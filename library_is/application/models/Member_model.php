<?php

class Member_model extends CI_model{

	public function getAll(){
		return $this->db->get('member')->result_array();
	}

	public function validate($username, $password){
		$valid = FALSE;

		foreach ($this->getAll() as $member) {
			if(strcmp($member['username'], $username) == 0 && strcmp($member['password'], $password) == 0){
				$valid = TRUE;
				break;
			}
		}

		return $valid;
	}

	public function id_of_session($username){
		$this->db->where('username', $username);
		return $this->db->get('member')->row()->id;
	}

	public function insert($data){
		$this->db->insert('member', $data);
	}

}

?>