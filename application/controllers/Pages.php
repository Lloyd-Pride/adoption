<?php 

	class Pages extends CI_Controller
	{
		public function view($page = 'home')
		{
			// Check login
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
			}
			$oAdopt = new Adopt_model();
			$oAdmin = new Admin_model();
			$aData['sTitle'] = ucfirst($page);

			$aData['aChildren'] = $oAdmin->listChildren();

			//echo '<pre>'; print_r($aData['aChildren']); //die;
			$this->load->view('layout/layout');
			$this->load->view('pages/'.$page, $aData);
			$this->load->view('layout/footer');
		}

	} 

