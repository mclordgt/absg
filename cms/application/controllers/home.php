<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('site_model');

	}

	public function index()
	{

		$header['banners']		= $this->site_model->getMedias();
		$page['membership']		= $this->site_model->getContent('benefits-of-being-a-member','1');
		$page['latest_news'] 	= $this->site_model->getLatestNews();
		$page['about']			= $this->site_model->getContent('us', '1');

		$data['headerContent']	= (isset($header) ? $header : null);
		$data['pageContent'] 	= (isset($page) ? $page : '');
		$data['pageFile'] 		= 'site/home';

		$this->load->view('siteview',$data);

	}

}