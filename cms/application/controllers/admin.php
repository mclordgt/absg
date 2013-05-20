<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct(){

	parent::__construct();

	$sess_login_data = $this->session->userdata('login_data');

	if($sess_login_data == FALSE){

		redirect('/');

	} elseif ($sess_login_data['role']!=0) {

		redirect('errors/unauthorised');

	} else {

		if ( !is_object( $this->auth_model->checkSession($sess_login_data['session']) ) ) {

			redirect('/');

		}

	}

	
	$this->load->model('admin_model');

}

public function index()
{
	$data['pageFile'] = 'admin/home';

	$this->load->view('mainview',$data);
}

public function members(){

	$page['members']		= $this->admin_model->getGroups(2);
	$page['all']			= TRUE;

	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/table';

	$this->load->view('mainview',$data);

}

public function suppliers(){

	$page['suppliers']		= $this->admin_model->getGroups(1);
	$page['all']			= TRUE;

	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/table';

	$this->load->view('mainview',$data);

}

public function view(){

	$this->load->library('form_validation'); 

	$personal_id 			= $this->uri->segment(3);

	$this->form_validation->set_rules('first_name','First Name','trim|required');
	$this->form_validation->set_rules('surname','Surname','trim|required');
	$this->form_validation->set_rules('property_name','Property Name','trim|required');
	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	$this->form_validation->set_rules('landline','Landline','trim|required|numeric');
	$this->form_validation->set_rules('mobile','Mobile','trim|numeric');
	$this->form_validation->set_rules('fax','Fax','trim|numeric');

	if ($this->form_validation->run() !== FALSE) {
		
		$personal_data = array(
				'first_name'	=> $this->input->post('first_name'),
				'surname'		=> $this->input->post('surname'),
				'property_name'	=> $this->input->post('property_name'),
				'trading_name'	=> $this->input->post('trading_name'),
				'email'			=> $this->input->post('email'),
				'landline'		=> $this->input->post('landline'),
				'mobile'		=> $this->input->post('mobile'),
				'fax'			=> $this->input->post('fax')
			);	

		$this->admin_model->updatePersonalData($personal_id,$personal_data);	

	}
	
	$page['group']			= $this->admin_model->getGroup($personal_id);
	$page['address']		= $this->admin_model->getAddress($personal_id);
	$page['activities']		= $this->admin_model->getActivities($personal_id);
	$page['stocks']			= $this->admin_model->getStocks($personal_id);
	$page['hectares']		= $this->admin_model->getHectares($personal_id);
	$page['usages']			= $this->admin_model->getUsages($personal_id);
	$page['vendors']		= $this->admin_model->getVendors($personal_id);
	$page['accounts']		= $this->admin_model->getAccounts($personal_id);
	$page['services']		= $this->admin_model->getServices($personal_id);
	$page['other']			= $this->admin_model->getOthers($personal_id);
	$page['priorities']		= $this->admin_model->getPriorities($personal_id);
	$page['all']			= FALSE;

	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/table';

	$this->load->view('mainview',$data);

}

public function delete(){

	$id				= $this->uri->segment(3);
	$parent_page	= $this->uri->segment(4);

	if($parent_page == 'members' || $parent_page == 'suppliers'){

		$delete_data = array(
				'active'	=> 1
			);

		$this->admin_model->deletePersonalData($id,$delete_data);

		redirect('admin/'.$parent_page);

	} elseif($parent_page == 'media') {

		$delete_data = array(
				'active'	=> 1
			);

		$this->admin_model->deleteMedia($id,$delete_data);

		redirect('admin/'.$parent_page);

	} else {

		$this->admin_model->deleteContent( $id );

		redirect('admin/'.$parent_page.'/'.$this->uri->segment(5).'/deleted');

	}

}

public function page(){


	// get parent_page
	$pageUrl				= $this->uri->segment(3);

	$page['all']			= TRUE;
	$page['contents']		= $this->admin_model->getContents($pageUrl);
	
	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/pages';

	$this->load->view('mainview',$data);

}

public function edit(){

	$sub_url = $this->uri->segment(3);

	if(isset($_POST['submit']) && $_POST['submit'] == 'Save'){

		$page_edit = array(
				'sub_title'		=> $this->input->post('sub_title'),
				'sub_url'		=> url_title($this->input->post('sub_title'), '-', TRUE),
				'sub_content'	=> $this->input->post('editor'.$this->input->post('sub_id'))
			);

		$this->admin_model->updatePageContent($this->input->post('sub_id'),$page_edit);

		redirect('admin/edit/'.url_title($this->input->post('sub_title'), '-', TRUE));

	} 

	$page['all']			= FALSE;
	$page['content']		= $this->admin_model->getContent($sub_url);
	
	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/pages';

	$this->load->view('mainview',$data);

}

public function add(){

	if (isset($_POST['submit'])) {

		$add_data = array(
				'sub_title'		=> $this->input->post('sub_title'),
				'sub_url'		=> url_title($this->input->post('sub_title'), '-', TRUE),
				'sub_content'	=> $this->input->post('sub_content'),
				'last_edited'	=> date('U')
			);

		$subpage_id 	= $this->admin_model->insertSubpage($add_data);
		$page_details 	= $this->admin_model->getPageId($this->uri->segment(3));

		$page_data = array(
				'parent_id'		=> $page_details ->page_id,
				'sub_id'		=> $subpage_id,
			);

		$this->admin_model->insertPageData($page_data);

		$page['message']	= 'You have added a new content under '.$page_details->page_title;

	}

	$page['pages']			= $this->admin_model->getPages();
	$page['categories']		= $this->admin_model->getCategories();

	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/add';

	$this->load->view('mainview',$data);

}

public function media(){

	if (isset($_POST['submit'])) {

		$image = base_url().'../..'.$this->input->post('media_url');

		list($width,$height) = getimagesize($image);

		if ($_POST['media_type'] == 0) {

			$media_data = array(
				'media_url'		=> $this->input->post('media_url'),
				'media_type'	=> $this->input->post('media_type'),
				'media_size'	=> $width.'x'.$height
			);

		 } else {

			$media_data = array(
					'media_url'			=> $this->input->post('media_url'),
					'media_type'		=> $this->input->post('media_type'),
					'media_content_id'	=> $this->input->post('media_content_id'),
					'media_size'		=> $width.'x'.$height
				);
		 }

		$this->admin_model->addMedia($media_data);

		$page['message']	= 'A media has been added!';

	}

	$page['media_parents']	= $this->admin_model->getMediaParent();
	$page['medias']			= $this->admin_model->getMedias();

	$data['pageContent']	= ( isset($page) ? $page : null );
	$data['pageFile']		= 'admin/media';

	$this->load->view('mainview',$data);

}

}