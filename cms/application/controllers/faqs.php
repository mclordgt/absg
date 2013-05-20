<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('site_model');

	}

	public function index()
	{

		$page['content']		= $this->site_model->getContent('faqs');

		$data['headerContent']	= (isset($header) ? $header : null );
		$data['pageContent']	= ( isset($page) ? $page : null );
		$data['pageFile'] 		= 'site/faqs';

		$this->load->view('siteview',$data);

	}

}