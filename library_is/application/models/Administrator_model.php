<?php

class Administrator_model extends CI_model{

	public function getAll(){
		return $this->db->get('administrator')->result_array();
	}

	public function validate($username, $password){
		$valid = FALSE;

		foreach ($this->getAll() as $administrator) {
			if(strcmp($administrator['username'], $username) == 0 && strcmp($administrator['password'], $password) == 0){
				$valid = TRUE;
				break;
			}
		}

		return $valid;
	}

	public function id_of_session($username){
		$this->db->where('username', $username);
		return $this->db->get('administrator')->row()->id;
	}
	
}

?>