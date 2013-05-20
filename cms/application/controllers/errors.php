<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function __construct(){

		parent::__construct();

	}

	public function unauthorised(){

		$sess_login_data = $this->session->userdata('login_data');

		switch ($sess_login_data['access']) {
			case 0:
				
				$page['link'] = '/admin';

				break;
			
			case 1:

				$page['link'] = '/suppliers';

				break;

			default:

				$page['link'] = '/members';

				break;
		}

		$data['pageContent'] = $page; 

		$data['pageFile'] = 'errors/unauthorised';

		$this->load->view('mainview',$data);

	}

}