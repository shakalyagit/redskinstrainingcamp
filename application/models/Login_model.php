<?php
Class login_model extends CI_Model {

	function login($userName, $password)
		{
			$this -> db -> select('*');
			$this -> db -> from('users');
			$this -> db -> where('userName = ' . "'" . $userName . "'"); 
			$this -> db -> where('password = ' . "'" . $password . "'"); 
			$this -> db -> limit(1);

			$query = $this -> db -> get();

			if($query -> num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}

		}


}