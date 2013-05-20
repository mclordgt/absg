<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('site_model');

	}

	public function page()
	{
		$subUrl = $this->uri->segment(3);

		$page['content']		= $this->site_model->getContent($subUrl);

		$data['headerContent']	= ( isset($header) ? $header : null );
		$data['pageContent']	= ( isset($page) ? $page : null );
		$data['pageFile'] 		= 'site/about';

		$this->load->view('siteview',$data);
	}

}