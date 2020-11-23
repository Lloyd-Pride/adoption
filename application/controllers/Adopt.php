<?php 
	class Adopt extends CI_Controller
	{
		//is for displaying individual children without creating a page for them! 
		public function view($page = 'home')
		{
			
			$aData['sTitle'] = ucfirst($page);

			$this->load->view('layout/layout');
			$this->load->view('adopt/'.$page, $aData);
			$this->load->view('layout/footer');
		}

		public function index()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Sign In';
			$oAdmin = new Admin_model();

			$data['aChildren'] = $oAdmin->listChildren();

			$this->load->view('layout/layout');
			$this->load->view('adopt/index', $data);
			$this->load->view('layout/footer');
		}

		public function addchild()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}
				
			$oAdopt = new Adopt_model();
			$oAdmin = new Admin_model();
			$aPost = $this->input->post();
			

			$iChildID = $this->uri->segment('4');
			$aPost['child_id'] = $iChildID;
			$data['aChild'] = $oAdmin->getChild($iChildID, null);

			$data['aParent'] = $oAdmin->getBioParent(null, $iChildID);
			//echo '<pre>'; print_r($data['aParent']); die;

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('surname', 'Surname', 'required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('layout/layout');
				$this->load->view('adopt/add-child', $data);
				$this->load->view('layout/footer');
			}
			else 
			{
//				echo '<pre>'; print_r($aPost); die;
				// Upload Image
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] =  $aPost['name'].'_'.$_FILES['userfile']['name'];
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
					$post_image = $aPost['name'].'_'.$_FILES['userfile']['name'];
				}

				# ============= Begining of document Handling =============================
				$fileName = strtolower($aPost['name']).'_'.$this->session->userdata('user_id');
				if(isset($_FILES['id_doc']) && $_FILES['id_doc']['name'] != '')
				{
					$ext = explode(".", $_FILES["id_doc"]["name"]);
					$IDext = strtolower(end($ext));
					$configure['file_name'] =  $fileName.'id';
				}
				
				$configure['allowed_types'] = '*';//'doc|docx|pdf';
				$configure['upload_path'] = './assets/documents';
				$configure['max_size'] = 902350;
				$configure['max_width'] = 2000;
				$configure['max_height'] = 2000;
				
				$this->load->library('upload');
				$this->upload->initialize($configure);
				
				if( !$this->upload->do_upload('id_doc') )
				{
					$errors = array('error_id' => $this->upload->display_errors());
					//echo '<pre>'; print_r($errors); print_r($_FILES); die;
					$ID = 'blank.docx';
				} 
				else 
				{
					$data = array('upload_id' => $this->upload->data());
					$ID = $fileName.'_id.'.$IDext; 
				}

				# ===================== End of Document handling ========================
				//echo '<pre>'; print_r($aPost); die;
				$sResults = $oAdopt->addChild($aPost, $post_image, $ID);
				if(strpos($sResults, 'successfully'))
					$aData = array('class' => 'success', 'message' => $sResults);
				else
					$aData = array('class' => 'warning', 'message' => $sResults);

				// Set message
				//$this->session->set_flashdata('post_created', 'Your post has been created');
				/*
				if($iChildID > 0)
				{
					redirect('users/login');
				}
				else 
				*/
			//	redirect('admin/userprofile/id/'. $this->session->userdata('user_id'));
				$this->load->view('layout/layout');
				$this->load->view('adopt/add-child', $aData);
				$this->load->view('layout/footer');
			}
		}

		public function adopter()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Sign In';
			$oAdopt = new Adopt_model();
			$oAdmin = new Admin_model();
			$aPost = $this->input->post();
			//echo '<pre>'; print_r($this->session->userdata()); die;
			if(!empty($aPost))
			{
				// Upload Image
				$fileName = strtolower($this->session->userdata('username')).'_'.$this->session->userdata('user_id');
				
				$config['allowed_types'] = 'doc|docx|pdf';
				if(isset($_FILES['id_doc']) && $_FILES['id_doc']['name'] != '')
				{
					$ext = explode(".", $_FILES["id_doc"]["name"]);
					$IDext = strtolower(end($ext));
					$config['file_name'] =  $fileName.'_id';
				}

				if(isset($_FILES['payment']) && $_FILES['payment']['name'] != '')
				{
					$ext = explode(".", $_FILES["payment"]["name"]);
					$Slipext = strtolower(end($ext));
					$config['file_name'] =  $fileName.'_payslip';
				}

				if(isset($_FILES['residence']) && $_FILES['residence']['name'] != '')
				{
					$ext = explode(".", $_FILES["residence"]["name"]);
					$Resext = strtolower(end($ext));
					$config['file_name'] =  $fileName.'_residence';
				}
				
				$config['upload_path'] = './assets/documents';
				$config['max_size'] = 5024;
				$config['max_width'] = 2000;
				$config['max_height'] = 2000;
				
				$this->load->library('upload', $config);
				
				if( !$this->upload->do_upload('id_doc') )
				{
					$errors = array('error_id' => $this->upload->display_errors());
					$ID = 'blank.docx';
				} 
				else 
				{
					$data = array('upload_id' => $this->upload->data());
					$ID = $fileName.'_id.'.$IDext; 
				}

				if( !$this->upload->do_upload('payment') )
				{
					$errors = array('error_slip' => $this->upload->display_errors());
					$payslip = 'blank.docx';
				} 
				else 
				{
					$data = array('upload_slip' => $this->upload->data());
					$payslip = $fileName.'_payslip.'.$Slipext;
				}
				
				if( !$this->upload->do_upload('residence') )
				{
					$errors = array('error_res' => $this->upload->display_errors());
					$res = 'blank.docx';
				} 
				else 
				{
					$data = array('upload_res' => $this->upload->data());
					$res = $fileName.'_residence.'.$Resext;
				}

				$aResults = $oAdopt->adoptionApplication($aPost, $ID, $payslip, $res); 
				$data['class']= 'success';

				redirect('admin/userprofile/id/'. $this->session->userdata('user_id').'#pills-review');
			}	
			// echo '<pre>'; print_r($aResults ); die;

			$this->load->view('layout/layout');
			$this->load->view('adopt/adopter', $data);
			$this->load->view('layout/footer');
		}

		public function foster()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Sign In';
			$oAdopt = new Adopt_model();
			
			
			$this->load->view('layout/layout');
			$this->load->view('adopt/foster', $data);
			$this->load->view('layout/footer');			
		}

		public function timeline()
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Sign In';
			$oAdopt = new Adopt_model();
			$oAdmin = new Admin_model();
			
			$data['applications'] = $oAdmin->getApplications($this->session->userdata('user_id'), null);
			
			$this->load->view('layout/layout');
			$this->load->view('adopt/timeline', $data);
			$this->load->view('layout/footer');			
		}		
	}