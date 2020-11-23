<?php
	class User_model extends CI_Model
	{
		public function register($enc_password, $aPost)
		{
			// User data array
			$data = array(
				//'first_name' => $aPost['first_name'],
				//'last_name' => $aPost['last_name'],
				'email' => $aPost['email'],
				//'id_num' => $aPost['id_num'],
				//'contact_num' => $aPost['contact_num'],
				//'alt_contact_num' => $aPost['contact_num2'],
				'username' => $aPost['username'],
				'password' => $enc_password,
			 //   'zipcode' => $aPost['zipcode']
			);
			//echo '<pre>'; print_r($aPost); die;
			$this->db->insert('users', $data);
			$lastID = $this->db->insert_id(); // look for it on internet
	
			/*if($aPost['relationship'] == 'Married' && $aPost['married'] == 1)
			{
				//Spouses info
				$data = array(
					'first_name' => $aPost['spouse_first_name'],
					'last_name' => $aPost['spouse_last_name'],
					'email' => $aPost['spouse_email'],
					'id_num' => $aPost['spouse_id_num'],
					'contact_num' => $aPost['spouse_contact_num'],
					'alt_contact_num' => $aPost['spouse_contact_num2'],
					'username' => $aPost['spouse_email'],
					'password' => $enc_password,
					'married_to' => $lastID, //setting the id of the spouse
				);
				$this->db->insert('users', $data);
				$SpouseID = $this->db->insert_id();
				
				$this->db->update('users', array('married_to' => $SpouseID), array('id' => $lastID)); //setting id of a spouse
			}*/			
		}

		// Get user
		public function getUser($iUserId)
		{
			$query = $this->db->get_where('users', array('id' => $iUserId));

			$result = $query->row_array();
			return $result;
		}

		// update user
		public function updateUser($aPost)
		{
			$data = array(
				'first_name' => $aPost['first_name'],
				'last_name' => $aPost['last_name']);

			$query = $this->db->get_where('users', array('id' => $aPost['user_id']));
			$exist = $query->row_array();

			if($exist['id'] > 0)
			{
				$data['contact_num'] = $aPost['contact_num'];  	 	
				$this->db->update('users', $data, array('id' => $exist['id']));
			}

			if(isset($aPost['child_id']) && $aPost['child_id'] > 0)
			{
				$query = $this->db->get_where('parents', array('child_id' => $aPost['child_id']));
				$exist = $query->row_array();

				if($exist['id'] > 0)
				{
					$data = array(
					'name' => $aPost['first_name'],
					'surname' => $aPost['last_name'],
					'contact' => $aPost['contact_num']);

					$this->db->update('parents', $data, array('user_id' => $exist['id']));
				}
			}
		}

		// Log user in
		public function login($username, $password)
		{
			// Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1)
			{
				return $result->row(0)->id;
			} 
			else
			{
				return false;
			}
		}

		// Check username exists
		public function check_username_exists($username)
		{
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array()))
			{
				return true;
			} 
			else 
			{
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email)
		{
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array()))
			{
				return true;
			} 
			else 
			{
				return false;
			}
		}
	}