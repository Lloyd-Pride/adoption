<?php 
	class Admin extends CI_Controller
	{

		public function children()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$oAdmin = new Admin_model();
			$oAdopt = new Adopt_model();
			$iChildID = $this->uri->segment('4');
			$aPost = $this->input->post();

			if( !empty($aPost) && $aPost['command'] == 'delete' )
			{
				$oAdopt->deleteChild($iChildID);
			}
			else if( !empty($aPost) && $aPost['command'] == 'approve' )
			{
				$oAdopt->approveChild($iChildID);
			}

			$data['aChildren'] = $oAdmin->listChildren();

			$this->load->view('layout/layout');
			$this->load->view('admin/children', $data);
			$this->load->view('layout/footer');
		}
		
		public function approve()
		{
			$oAdmin = new Admin_model();
			
			$data['aChildren'] = $oAdmin->approveChildren();
			
			$this->load->view('layout/layout');
			$this->load->view('admin/approve', $data);
			$this->load->view('layout/footer');
		}
		public function foster_parents()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Foster Parents';
			$oAdmin = new Admin_model();
			$data['aAdoptors'] = $oAdmin->listFosterParent();

			$this->load->view('layout/layout');
			$this->load->view('admin/foster_parents', $data);
			$this->load->view('layout/footer');
		}

		public function biological_parents()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'biological Parents';
			$oAdmin = new Admin_model();
			$data['aBiologicals'] = $oAdmin->listBioParent();

			$this->load->view('layout/layout');
			$this->load->view('admin/biological_parents', $data);
			$this->load->view('layout/footer');
		}

		public function orphanage()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'biological Parents';
			$oAdmin = new Admin_model();

			$this->load->view('layout/layout');
			$this->load->view('admin/orphanage', $data);
			$this->load->view('layout/footer');
		}

		public function childProfile()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}
			
			$data['title'] = 'biological Parents';
			$oAdmin = new Admin_model();
			$iChildID = $this->uri->segment('4');
			$data['aChild'] = $oAdmin->getChild($iChildID, null);


			//find a way to get url values;
			$this->load->view('layout/layout');
			$this->load->view('admin/childprofile', $data);
			$this->load->view('layout/footer');			
		}

		public function userprofile()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'biological Parents';
			$oAdmin = new Admin_model();
			$iUserID =  $this->session->userdata('user_id');//$this->uri->segment('4');
			$data['aUser'] = $oAdmin->getUser($iUserID);
			$data['aApplications'] = $oAdmin->getApplications($iUserID, null);
			$aPost = $this->input->post();

			//echo '<pre>'; print_r($aPost); die;
			if(!empty($aPost))
			{
				// Upload Image
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] =  $this->session->userdata('username').'_'.$_FILES['userfile']['name'];
				$config['upload_path'] = './assets/imgs';
				$config['max_size'] = 5024;
				$config['max_width'] = 2000;
				$config['max_height'] = 2000;

				$this->load->library('upload', $config);
				
				if( !$this->upload->do_upload('userfile') )
				{
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} 
				else 
				{
					$data = array('upload_data' => $this->upload->data());
					$post_image = $this->session->userdata('username').'_'.$_FILES['userfile']['name'];
				}
				//echo '<pre>'; print_r($aPost); die;
				$oAdmin->updateProfilePic($iUserID, $post_image);
				redirect('admin/userprofile/id/'. $this->session->userdata('user_id'));
			}
			
			if(isset($aPost['command']) && $aPost['command'] == "Remove DP")
				$oAdmin->updateProfilePic($iUserID, 'noimage.jpg');

			$this->load->view('layout/layout');
			$this->load->view('admin/userprofile', $data);
			$this->load->view('layout/footer');	

		}	

		public function download($id)
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login'); 
			}

			$oAdmin = new Admin_model();
			$param = $this->uri->segment('6');
			$iUserID = $this->uri->segment('5');
			$data['aUser'] = $oAdmin->getUser($iUserID);
			$data['aApplications'] = $oAdmin->getApplications($iUserID);

			$this->load->helper('download');
			$fileInfo = $oAdmin->getFile($id);

			if($param = 'id')
				$file = 'assets/documents/'.$fileInfo['applicantIdDoc'];
			else if($param = 'slip')
				$file = 'assets/documents/'.$fileInfo['applicantPayslip'];
			else
				$file = 'assets/documents/'.$fileInfo['applicantRes'];
			
			force_download($file, NULL);

			$this->load->view('layout/layout');
			$this->load->view('admin/userprofile', $data);
			$this->load->view('layout/footer');
		}


		public function downloadChild($id)
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login'); 
			}

			$oAdmin = new Admin_model();
			$iChildID = $this->uri->segment('3');

			$this->load->helper('download');
			$data['aChild'] = $fileInfo = $oAdmin->getChild($id, null);

			$file = 'assets/documents/'.$fileInfo['certificate'];
			
			force_download($file, NULL);

			redirect('admin/childprofile/id/'.$iChildID);
		}

		public function report()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Generate Reports';
			$oAdmin = new Admin_model();
			$aPost = $this->input->post();

			if(isset($aPost['command']) && $aPost['command'] == 'Search')
			{
				$data['aData'] = $oAdmin->generateReport($aPost);

				//echo '<pre>'; print_r($data['aData']); die;
				$this->load->library('fpdf_gen');
				// header
				$this->fpdf_gen->viewTable($data['aData'], $aPost);
			}

			$this->load->view('layout/layout');
			$this->load->view('admin/report', $data);
			$this->load->view('layout/footer');
		}

		public function foster_report()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Foster Reports';

			$this->load->view('layout/layout');
			$this->load->view('admin/foster_report', $data);
			$this->load->view('layout/footer');
		}

		public function biological_report()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Biological Reports';

			$this->load->view('layout/layout');
			$this->load->view('admin/biological_report', $data);
			$this->load->view('layout/footer');
		}

		public function applications()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}
			$data['title'] = 'Biological Reports';
			$oAdmin = new Admin_model();
			$data['param'] = $param = $this->uri->segment('3');
			 
			if($param == 'approved')
				$data['aApplications'] = $oAdmin->listApplications($param);
			else if($param == 'declined')
				$data['aApplications'] = $oAdmin->listApplications($param);
			else 
				$data['aApplications'] = $oAdmin->listApplications($param);

			
			$this->load->view('layout/layout');
			$this->load->view('admin/applications', $data);
			$this->load->view('layout/footer');
		}

		public function viewapplication()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Biological Reports';
			$oAdmin = new Admin_model();
			$iAppID = $this->uri->segment('4');
			$data['aApplication'] = $oAdmin->getApplications(null, $iAppID);
			$data['aUser'] = $oAdmin->getUser($data['aApplication']['applicantID']);
			//echo '<pre>'.$iAppID; print_r($data); die;

			$this->load->view('layout/layout');
			$this->load->view('admin/viewapplication', $data);
			$this->load->view('layout/footer');
		}

		public function applicationReview()
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Biological Reports';
			$oAdmin = new Admin_model();
			$iAppID = $this->uri->segment('4');
			$aPost = $this->input->post();

			$data['aApplications'] = $oAdmin->getApplications(null, null);			
			$aPost['appId'] = $iAppID;
			if( !empty($aPost) && isset($aPost['command']) && $aPost['command'] == 'Reject' )
			{
				$aPost['is_approve'] = -1;
				$oAdmin->approveApp($aPost);
				$data['class'] = 'warning';
				$data['aApplications'] = $oAdmin->listApplications('declined');
			}
			else
			{
				$aPost['is_approve'] = 1;
				$sResults = $oAdmin->approveApp($aPost);
				$data['class'] = 'success';
				$data['aApplications'] = $oAdmin->listApplications('approved');
			}
			
			$this->load->view('layout/layout');
			$this->load->view('admin/applications', $data);
			$this->load->view('layout/footer');
		}	

		public function view()
		{	
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}
			
			$data['title'] = 'biological Parents';
			$oAdmin = new Admin_model();
			$iParentID = $this->uri->segment('4');
			$data['parent'] = $oAdmin->getParent($iParentID);
			$aPost = $this->input->post();
		
			if( !empty($aPost) && $aPost['command'] == 'delete' )
			{
				$type = $oAdmin->deleteParent($iParentID);
				
				if($type == 'foster')
					redirect('admin/foster_parents');
				else
					redirect('admin/biological_parents');
			}

			//find a way to get url values;
			$this->load->view('layout/layout');
			$this->load->view('admin/view', $data);
			$this->load->view('layout/footer');	
		}

	}