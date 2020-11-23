<?php
	class Admin_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function listChildren()
		{
			$sql = $this->db->order_by('id', 'DESC');
			//$sql = $this->db->get('children');
			$sql = $this->db->get_where('children', array('approved' => 1));
			$aChildren = $sql->result_array();

			return $aChildren;
		}
		
		public function approveChildren()
		{
			$sql = $this->db->order_by('id', 'DESC');
			$sql = $this->db->where('approved IS NULL');
			$sql = $this->db->get('children');	
			$aChildren = $sql->result_array();

			return $aChildren;
		}

		public function getChild($iChildID, $IDNum)
		{
			if(isset($iChildID) && $iChildID != '')
				$sql = $this->db->get_where('children', array('id' => $iChildID));
			elseif(isset($IDNum) && $IDNum != '')
				$sql = $this->db->get_where('children', array('id_num' => $IDNum));
			else
				return 'No Child record was found';


			$aChild = $sql->row_array();

			return $aChild;
		}

		public function getParent($iParentID)
		{
			if(isset($iParentID) && $iParentID != '')
			{
				$sql = $this->db->select('p.*, u.*')
				     ->from('parents as p')
				     ->where('p.id', $iParentID)
				     ->join('users as u', 'p.user_id = u.id', 'LEFT')
				     ->get();
			}
			else
				return 'No user record was found';

			return $sql->row_array();			 
		}

		public function getUser($iUserID)
		{
			$sql = $this->db->get_where('users', array('id' => $iUserID));
			$aUser = $sql->row_array();

			return $aUser;
		}

		public function listFosterParent()
		{
			$sql = $this->db->order_by('id', 'DESC');
			$sql = $this->db->get_where('parents', array('is_adoptive' => 1));
			$aForsterParents = $sql->result_array();

			return $aForsterParents;
		}

		public function getFosterParent($iParentID)
		{
			$sql = $this->db->get_where('parents', array('id' => $iParentID));
			$aFosParents = $sql->result_row();

			return $aFosParents;
		}

		public function listBioParent()
		{
			$sql = $this->db->order_by('id', 'DESC');
			$sql = $this->db->get_where('parents', array('is_adoptive' => null));
			$aBioParents = $sql->result_array();

			return $aBioParents;
		}

		public function getBioParent($iParentID, $iChildID)
		{
			if(isset($iParentID) && $iParentID > 0 )
				$sql = $this->db->get_where('parents', array('id' => $iParentID));
			else if(isset($iChildID) && $iChildID > 0 )
			{
				//$aChild = $this->getChild($iChildID, null);
				$sql = $this->db->get_where('parents', array('child_id' => $iChildID));
			}
			else
				return '';

			$aBioParents = $sql->row_array();

			return $aBioParents;
		}

		public function getApplications($iUserID, $iAppID=null)
		{
			$sql = $this->db->order_by('id', 'DESC');

			if(isset($iUserID) && $iUserID != '')
				$sql = $this->db->get_where('agency', array('applicantID' => $iUserID));
			else if(isset($iAppID) && $iAppID != '')
			{
				$sql = $this->db->get_where('agency', array('id' => $iAppID));

				$aApplications = $sql->row_array();
				return $aApplications;
			}
			else
				$sql = $this->db->get('agency');

			$aApplications = $sql->result_array();

			return $aApplications;
		}

		public function listApplications($param)
		{
			$sql = $this->db->order_by('id', 'DESC');

			if(isset($param) && $param == 'declined')
				$sql = $this->db->get_where('agency', array('is_approve' => -1));
			else if(isset($param) && $param == 'approved')
				$sql = $this->db->get_where('agency', array('is_approve' => 1));
			else if(isset($param) && $param == 'new')
				$sql = $this->db->get_where('agency', array('is_approve' => 0));
			else
				$sql = $this->db->get('agency');

			$aApplications = $sql->result_array();

			return $aApplications;
		}

		public function generateReport($aPost)
		{
			#Tomorrow morning find a way to condition like variable with table

			if(isset($aPost['type']) && $aPost['type'] == 'children')
			{
				$sql = "SELECT * FROM children WHERE 1=1";
				if(isset($aPost['first_name']) && $aPost['first_name'] != '')
				{	
					$name = strtolower($aPost['first_name']);
					$sql .= " AND LOWER(name) LIKE '%$name%'";
				}
				
				if(isset($aPost['last_name']) && $aPost['last_name'] != '')
				{
					$surname = strtolower($aPost['last_name']);
					$sql .= " AND LOWER(surname) LIKE '%$surname%'";
				}
				
				if(isset($aPost['gender']) && $aPost['gender'] != '')
				{
					$gender = strtolower($aPost['gender']);
					$sql .= " AND LOWER(gender) = '$gender'";
				}

				if(isset($aPost['race']) && $aPost['race'] != '')
				{
					$race = strtolower($aPost['race']);
					$sql .= " AND LOWER(race) = '$race'";
				}
			}

			if(isset($aPost['type']) && $aPost['type'] == 'foster')
			{
				$sql = "SELECT * FROM parents WHERE is_adoptive = 1";
				if(isset($aPost['first_name']) && $aPost['first_name'] != '')
				{
					$name = strtolower($aPost['first_name']);
					$sql .= " AND LOWER(name) LIKE '%$name%'";
				}
				
				if(isset($aPost['last_name']) && $aPost['last_name'] != '')
				{
					$surname = strtolower($aPost['last_name']);
					$sql .= " AND LOWER(surname) LIKE '%$surname%'";
				}
					
			}

			if(isset($aPost['type']) && $aPost['type'] == 'biological')
			{
				$sql = "SELECT * FROM parents WHERE is_adoptive is NULL";
				if(isset($aPost['first_name']) && $aPost['first_name'] != '')
				{
					$name = strtolower($aPost['first_name']);
					$sql .= " AND LOWER(name) LIKE '%$name%'";
				}
				
				if(isset($aPost['last_name']) && $aPost['last_name'] != '')
				{
					$surname = strtolower($aPost['last_name']);
					$sql .= " AND LOWER(surname) LIKE '%$surname%'";
				}
			}	

			$aResults = $this->db->query($sql)->result('array');
			return $aResults;
		}

		public function getFile($id)
		{
			$sql = $this->db->get_where('agency', array('id' => $id));
			$aApplications = $sql->row_array();

			return $aApplications;
		}

		public function approveApp($aPost)
		{
			$data['is_approve'] = $aPost['is_approve'];
			$this->db->update('agency', $data, array('id' => $aPost['appId']));
		}

		public function updateProfilePic($iUserID, $post_image)
		{
		//	echo $iUserID; die;
			$this->db->update('users', array('profile_pic' => $post_image), array('id' => $iUserID));	
		}

		public function deleteParent($iParentID)
		{
			$aParent = $this->getParent($iParentID);

			$this->db->where('user_id', $iParentID);
			$this->db->delete('parents');

			if($aParent['is_adoptive'] == 1)
				return 'foster';
			else 
				return 'biological';
		}	
	}