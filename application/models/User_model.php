<?php

	class User_model extends CI_model {

		function create($formArray= null)
		{
			print_r($formArray);
			return $this->db->insert('users',$formArray);
		}

		function all()	
		{
			return $users = $this->db->get('users')->result_array();
		}

		// function getUser($userId=null)
		// {
		// 	$this->db->where('userid',$userId);
		// 	return $user = $this->db->get('users')->row_array();
		// }


	    function getUser($userId= null) {

	    	    if($userId) {
			        $this->db->where('userId', $userId);
			    }
			return $users = $this->db->get('users')->result_array();
	    }

		function updateUser($userId= null, $formArray= null) 
		{	
				if($userId) {
				        $this->db->where('userId', $userId);
				}
			$this->db->where('userId',$userId);
			$this->db->where('userId',$userId);
			$this->db->update('users',$formArray);
		}

		function deleteUser($userId= null)
		{
			$this->db->where('userId',$userId);
			$this->db->delete('users'); 
		}

	}

?>