<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$sess_login_data = $this->session->userdata('login_data');

		if($sess_login_data == FALSE){

			redirect('/');

		} elseif ($sess_login_data['role']!=2 && $sess_login_data['role']!=0) {

			redirect('errors/unauthorised');

		}  else {

			$this->load->model('auth_model');

			if ( !is_object( $this->auth_model->checkSession($sess_login_data['session']) ) ) {

				redirect('/');

			}

		}

	}

	public function index()
	{
		$data['pageFile'] = 'members/home';

		$this->load->view('mainview',$data);
	}

}