<?php
	class Adopt_model extends CI_Model
	{
		public function addChild($aPost, $post_image, $ID)
		{
			// Before entering a child, check if she/he isn't registered 1st
			$oAdmin = new Admin_model();
			$oUser = new User_model();
			$aChild = $oAdmin->getChild($aPost['child_id'], $aPost['id_num']);

			$idNum = $aPost['id_num'];
			if (substr($idNum, 6, 1)  >= 5)
			{
	    		$aPost['gender'] = "Male";
			}
			else {
	    		$aPost['gender'] = "Female";
			}


			$date = substr($idNum, 0, 6);
    		// use built-in DateTime object to work with dates
	    	$date = \DateTime::createFromFormat('ymd', $date)->format('Y-m-d');
	    	$now  = new \DateTime();
	 
	    	// compare birth date with current date: 
	    	// if it's bigger bd was in previous century
	    	if ($date > $now) {
	        	$date->modify('-100 years');
	    	}
	    	$aPost['dob'] = $date;

			$data = array(
					'name' => $aPost['name'],
  					'surname' => $aPost['surname'],
  					'id_num' => $aPost['id_num'],
  					'dob' => strtotime($aPost['dob']),
  					'bio' => $aPost['bio'],
  					'race' => $aPost['race'],
  					'gender' => $aPost['gender'],
  					'image' => $post_image,
  					'parent_id' => ($aChild['parent_id'] && $aChild['parent_id'] > 0) ? $aChild['parent_id'] : $this->session->userdata('user_id'),
  					'certificate' => $ID
					);

			$aPost['user_id'] = ($aChild['parent_id'] && $aChild['parent_id'] > 0) ? $aChild['parent_id'] : $this->session->userdata('user_id');
			$oUser->updateUser($aPost);
			$aUser = $oAdmin->getUser($this->session->userdata('user_id'));
			if(isset($aChild) && is_array($aChild) )
			{
				//update the child
				$this->db->update('children', $data, array('id_num' => $aPost['id_num']));
				$aResults = 'A child record already exists, it was updated with recent entry.';
			}
			else
			{
				//insert new record
				$this->db->insert('children', $data);
				$aResults = 'A child\'s record was successfully captured.';
				$aUser['child_id'] = $this->db->insert_id();
				$this->addBiological($aUser);
			}


			return $aResults;
		}

		public function deleteChild($iChildID)
		{
			$this->db->where('id', $iChildID);
			$this->db->delete('children');
			return true;
		}
		
		public function approveChild($iChildID)
		{
			$this->db->update('children', array('approved'=> 1), array('id' => $iChildID));
			return true;
		}

		public function addFoster($aPost)
		{
			//echo '<pre>'; print_r($aPost); die;
 			$data = array(
					'name' => $aPost['first_name'],
					'surname' => $aPost['last_name'],
					'user_id' => $this->session->userdata('user_id'),
  					'email' => $aPost['email'],
  					'contact' => $aPost['contact_num'],
  					'application_id' => $aPost['application_id'],
  					'is_adoptive' => $aPost['is_adoptive'],
					);

 			$this->db->insert('parents', $data);
		}

		public function addBiological($aPost)
		{
			$data = array(
					'name' => $aPost['first_name'],
  					'surname' => $aPost['last_name'],
  					'user_id' => $this->session->userdata('user_id'),
  					'email' => $aPost['email'],
  					'contact' => $aPost['contact_num'],
  					'child_id' => $aPost['child_id'],

					);

			//echo '<pre>'; print_r($data); die;
			$this->db->insert('parents', $data);
		}
		
		public function adoptionApplication($aPost, $ID, $payslip, $res)
		{
			$oAdmin = new Admin_model();
			$aUser = $oAdmin->getUser($this->session->userdata('user_id'));
			$oUser = new User_model();

			$data = array(
				'applicantID' => $this->session->userdata('user_id'),
				'applicantName' => $aPost['first_name'],
				'applicantSurname' => $aPost['last_name'],
				'applicantEmail' => $aPost['email'],
				'applicantContact' => $aPost['contact_num'],
				'babyRace' => $aPost['race'],
				'babyGender' => $aPost['gender'],
				'babyAge' => $aPost['age'],
				'applicantIdDoc' => $ID,
				'applicantPayslip' => $payslip, 
				'applicantRes' => $res,
				'is_approve' => 0
				);

			$this->db->insert('agency', $data);
			$aUser['application_id'] = $this->db->insert_id(); #
			$aUser['first_name'] = $aPost['first_name'];
			$aUser['last_name'] = $aPost['last_name'];
			$aUser['email'] = $aPost['email'];
			$aUser['contact_num'] = $aPost['contact_num'];
			$aUser['is_adoptive'] = 1;
			$aUser['user_id'] = $this->session->userdata('user_id');

			$this->addFoster($aUser);
			$oUser->updateUser($aUser);
			return true;
		}

	}