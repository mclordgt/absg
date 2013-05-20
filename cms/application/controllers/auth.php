<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){

		parent::__construct();

	}

	public function index()
	{
		// load form validation library of CI
		$this->load->library('form_validation');

		// sets the rules for the form validation
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]');

		// run the validation 
		if ($this->form_validation->run() !== FALSE) {
			
			// load the authentication model
			$this->load->model('auth_model');

			// call the function checkuser in auth_model class
			// parameters email, password
			$checkUser = $this->auth_model->checkUser(
					$this->input->post('email'),
					$this->input->post('password')
				);

			// if return is an object continue process
			if (is_object($checkUser)) {

				$sess = sha1(".robey".$checkUser->email.date('U'));

				$this->auth_model->saveSession($checkUser->personal_id,$checkUser->role,$sess);
				
				switch ($checkUser->role) {

					case 0:

						redirect('/admin');

						break;

					case 1:

						redirect('/suppliers');

						break;
					
					default:
						
						redirect('members');

						break;
				}


			} else { // if checkUser return is not an object 

				echo 'Invalid User and Password';

			}

		}

		// $data['pageFile'] = 'login/login';

		$this->load->view('login/login');
	}

	public function logout(){

		$this->load->model('auth_model');
		$login_data = $this->session->userdata('login_data');

		$this->auth_model->removeSession($login_data['session']);

		$this->session->sess_destroy();

		redirect('/auth');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */