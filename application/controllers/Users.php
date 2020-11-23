<?php 
	class Users extends CI_Controller
	{
		public function register()
		{
			// Check login
			$data['title'] = 'Sign Up';
			//$this->form_validation->set_rules('first_name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('users/register');
			} 
			else
			{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$aPost = $this->input->post();
				$this->user_model->register($enc_password, $aPost);

				// Get and encrypt the password
				$username = $aPost['username'];
				$password = md5($aPost['password']);
				$user_id = $this->user_model->login($username, $password);
				if($user_id)
				{
					$aUser = $this->user_model->getUser($user_id);
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true,
						//'surname' => $aUser['last_name']
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
					redirect('/');
				}
			}
		}
		
		public function login()
		{
			$data['title'] = 'Sign In';
			$oUser = new User_model();
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('users/login', $data);
			} 
			else 
			{
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($username, $password);
				$aUser = $oUser->getUser($user_id);
				//echo '<pre>'; print_r($aUser); die;
				if($user_id)
				{
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true,
						'surname' => $aUser['last_name']
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in.');

					redirect('/');
				} 
				else 
				{
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid.');

					//redirect('users/login');
				}		
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out.');

			redirect('/users/login');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', '<div class="alert alert-danger" role="alert">That username is taken. Please choose a different one.</div>');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', '<div class="alert alert-danger" role="alert">That email is taken. Please choose a different one.</div>');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	

		public function userprofile()
		{
			$data['title'] = 'Sign In';

			$this->load->view('users/userprofile', $data);
		}
	}

	