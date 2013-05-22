<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

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

		
		$this->load->model('prod_model');

	}

	public function index()
	{
		$page['products']		= $this->prod_model->getProducts();
		$page['form']			= FALSE;

		$data['pageContent']	= (isset($page) ? $page : null);
		$data['pageFile']		= 'products/products';

		$this->load->view('mainview',$data);
	}

	public function categories(){

		$page['categories']		= $this->prod_model->getCategories();
		$page['subocat']		= 'cat';

		$data['pageContent']	= (isset($page) ? $page : null);
		$data['pageFile']		= 'products/table';

		$this->load->view('mainview',$data);

	}

	public function add(){

		switch($this->uri->segment(3)){

			case 'category':
				$this->add_category();
			break;

			case 'sub-category':
				$this->add_sub_category();
			break;

			case 'product':
				$this->add_products();
			break;
		}

	}

	public function view(){

		switch($this->uri->segment(3)){

			case 'sub-category':
				$this->view_sub_category();
			break;

			case 'product':
				$this->view_product();
			break;

		}

	}

	public function view_sub_category(){

		$prod_cat_id = $this->uri->segment(4);

		$page['subCategories']	= $this->prod_model->getSubCategories($prod_cat_id);
		$page['subocat']		= 'sub';

		$data['pageContent']	= (isset($page) ? $page : null);
		$data['pageFile']		= 'products/table';

		$this->load->view('mainview',$data);

	}

	public function view_product(){

		$prod_id 				= $this->uri->segment(4);
		$page['product']		= $this->prod_model->getProduct($prod_id);

		$data['pageContent']	= (isset($page) ? $page : null);
		$data['pageFile']		= 'products/table';

		$this->load->view('mainview',$data);		

	}

	public function add_category(){

		if(isset($_POST['submit']) && $_POST['submit'] == 'Save Category'){
			
			$catExists = $this->prod_model->checkCategoryExists( ucwords($this->input->post('prod_cat')) );

			if($catExists){

				$cat_data = array(
						'prod_cat'			=> ucwords($this->input->post('prod_cat')),
						'prod_cat_desc'		=> $this->input->post('prod_cat_desc'),
						'date_added'		=> date('U')
					);


				$cat_id = $this->prod_model->insertData('prod_categories',$cat_data);

				$data['message']	= 'A new category has been added'; 

			} else {

				$data['message']	= "Category Already Exists on db"; 				

			}

		}

		$data['pageFile']		= 'products/add';

		$this->load->view('mainview',$data);

	}

	public function add_sub_category(){

		if(isset($_POST['submit']) && $_POST['submit'] == 'Save Sub Category'){

			$subExists = $this->prod_model->checkSubCatExists($this->input->post('prod_cat_id'), ucwords($this->input->post('sub_cat'))); 

			if($subExists){

				$sub_cat_data = array(
						'prod_cat_id'	=> $this->input->post('prod_cat_id'),
						'sub_cat'		=> $this->input->post('sub_cat'),
						'date_added'	=> date('U')
					);

				$this->prod_model->insertData('sub_categories',$sub_cat_data);

				$data['message']	= 'A new sub category has been added'; 

			} else {
				
				$data['message']	= "Sub Category Already Exists on db"; 								

			}

		}

		$data['pageFile']		= 'products/add';

		$this->load->view('mainview',$data);

	}

	public function add_products(){

		if(isset($_POST['submit']) && $this->input->post('submit') == 'Add Product'){

			if( $this->prod_model->checkProductExists($this->input->post('prod_name'), $this->input->post('absg_code')) ){

				$prod_data = array(
						'prod_name'		=> $this->input->post('prod_name'),
						'absg_code'		=> $this->input->post('absg_code'),
						'grade'			=> $this->input->post('grade'),
						'ind_code'		=> $this->input->post('ind_code'),
						'unit_id'		=> $this->input->post('unit_id'),
						'min_unit_size'	=> $this->input->post('min_unit_size'),
						'unit_req'		=> $this->input->post('unit_req'),
						'date_added'	=> date('U')
					);

				$prod_id = $this->prod_model->insertProduct('products',$prod_data);

				$main_prod_data = array(
						'personal_id'	=> $this->input->post('personal_id'),
						'prod_id'		=> $prod_id,
						'prod_cat_id'	=> $this->input->post('prod_cat_id'),
						'sub_cat_id'	=> $this->input->post('sub_cat_id')
					);

				$this->prod_model->insertProduct('main_prods',$main_prod_data);

				$data['message'] 	= 'A new product has been added';

			} else {

				$data['message'] 	= 'The Product already exists on the db';

			}

		}

		$page['categories']		= $this->prod_model->getCategories();
		$page['units']			= $this->prod_model->getUnits();
		$page['form']			= TRUE;

		$data['pageContent']	= (isset($page) ? $page : null);
		$data['pageFile']		= 'products/products';

		$this->load->view('mainview',$data);		
	}

	public function ajxCall(){
		
		$subCategories = $this->prod_model->getSubCategories($this->input->post('prod_cat_id'));
		echo json_encode($subCategories);

	}

}