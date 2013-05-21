<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){

		parent::__construct();

	}

	public function member()
	{

		$this->load->library('form_validation');
		$this->load->model('register_model');

		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('surname','Surname','trim|required');
		$this->form_validation->set_rules('property_name','Property Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('landline','Landline','trim|required|numeric');
		$this->form_validation->set_rules('mobile','Mobile','trim|numeric');
		$this->form_validation->set_rules('fax','Fax','trim|numeric');

		$this->form_validation->set_rules('billing_suburb','Suburb','trim|required');
		$this->form_validation->set_rules('billing_state','State','trim|required');
		$this->form_validation->set_rules('billing_postcode','Postcode','trim|required');
		$this->form_validation->set_rules('billing_country','Country','trim|required');

		if ($this->form_validation->run() !== FALSE) {

			if ($this->register_model->checkUserExists($this->input->post('first_name'), $this->input->post('surname'), $this->input->post('email')) == 'valid') {
				
				$temp_pass = $this->rand_string(8);

				$personal_data = array(
						'first_name'	=> $this->input->post('first_name'),
						'surname'		=> $this->input->post('surname'),
						'property_name'	=> $this->input->post('property_name'),
						'trading_name'	=> $this->input->post('trading_name'),
						'email'			=> $this->input->post('email'),
						'password'		=> sha1(md5($temp_pass.".robey")),
						'landline'		=> $this->input->post('landline'),
						'mobile'		=> $this->input->post('mobile'),
						'fax'			=> $this->input->post('fax'),
						'zone_id'		=> $this->input->post('zone'),
						'role'			=> 2,
						'date_joined'	=> date('U')
					);

				$billing_data = array(
						'address_1' 	=> $this->input->post('billing_address_1'), 
						'address_2'		=> $this->input->post('billing_address_2'),
						'suburb'		=> $this->input->post('billing_suburb'),
						'state'			=> $this->input->post('billing_state'),
						'postcode'		=> $this->input->post('billing_postcode'),
						'country'		=> $this->input->post('billing_country')

					);

				$personal_id				= $this->register_model->insertPersonalData($personal_data);
				$address_id					= $this->register_model->insertAddressData($billing_data);

				$same_for_postal			= isset($_POST['same_postal']) ? 'yes' : 'no' ;

				$address_basket	= array(
						'personal_id'		=> $personal_id,
						'address_id'		=> $address_id,
						'same_for_postal'	=> $same_for_postal
					);

				$this->register_model->insertData('address_basket',$address_basket);

				if ($same_for_postal == 'no') {
					
					$postal_data = array(
							'address_1' 	=> $this->input->post('postal_address_1'), 
							'address_2'		=> $this->input->post('postal_address_2'),
							'suburb'		=> $this->input->post('postal_suburb'),
							'state'			=> $this->input->post('postal_state'),
							'postcode'		=> $this->input->post('postal_postcode'),
							'country'		=> $this->input->post('postal_country')
						);

					$address_id = $this->register_model->insertAddressData($postal_data);

					$address_basket	= array(
							'personal_id'		=> $personal_id,
							'address_id'		=> $address_id,
							'same_for_postal'	=> $same_for_postal
						);					

					
					$this->register_model->insertData('address_basket',$address_basket);

				}
				// $personal_id = 1;

				$primary_data = array(
						'personal_id'		=> $personal_id, 
						'activity_id'		=> ($this->input->post('primary_activity') == 5 ? $this->input->post('primary_activity_other') : $this->input->post('primary_activity')),
						'primary_activity'	=> 'yes'
					);

				$this->register_model->insertData('activity_data',$primary_data);

				$arr_activity = $this->input->post('activity');

				if (is_array($arr_activity) && $this->input->post('primary_activity') != 5) {
					$activity = array_diff( $this->input->post('activity'), array( $this->input->post('primary_activity') ) );
				} else {
					$activity = $this->input->post('activity');
				}

				foreach ($activity as $activity_key => $activity_value) {				

					if($activity_value == 5){

						$activity_value = $this->input->post('other_activity_other');

					}
					
					$activity_data = array(
							'personal_id'		=> $personal_id,
							'activity_id'		=> $activity_value,
							'primary_activity'	=> 'no'
						);

					$this->register_model->insertData('activity_data',$activity_data);

				}

				foreach ($this->input->post('stocks') as $stock_key => $stock_value) {
					
					$stock_data = array(
							'personal_id'	=> $personal_id, 
							'stock_id'		=> $stock_key,
							'stock_number'	=> $stock_value
						);

					$this->register_model->insertData('stock_data',$stock_data);

				}

				foreach ($this->input->post('hectares') as $hectare_key => $hectare_value) {
					
					$hectare_data = array(
							'personal_id'	=> $personal_id, 
							'hectare_id'	=> $hectare_key,
							'hectare_value'	=> $hectare_value
						);

					$this->register_model->insertData('hectare_data',$hectare_data);

				}

				foreach ($this->input->post('usages') as $usage_key => $usage_value) {
					
					$usage_data = array(
							'personal_id'	=> $personal_id,
							'usage_id'		=> $usage_key,
							'usage_value'	=> $usage_value
						);

					$this->register_model->insertData('usage_data',$usage_data);

				}

				$arr_fertiliser	= ($this->input->post('fertiliser_account_handler') ? $this->input->post('fertiliser_account_handler') : array(0) );
				$arr_reseller 	= ($this->input->post('resellers') ? $this->input->post('resellers') : array(0) );
				$arr_stockfeed 	= ($this->input->post('stockfeeds') ? $this->input->post('stockfeeds') : array(0) );

				if($this->input->post('fertiliser_account_handler_other')){
					array_push($arr_fertiliser, $this->input->post('fertiliser_account_handler_other'));
				} 

				if($this->input->post('resellers_other')){
					array_push($arr_reseller, $this->input->post('resellers_other'));
				} 

				if($this->input->post('stockfeeds_other')){
					array_push($arr_stockfeed, $this->input->post('stockfeeds_other'));
				} 

				$vendor_data = array(
						'personal_id'				=> $personal_id, 
						'rural_reseller'			=> ($this->input->post('rural_reseller') == 5 ? $this->input->post('rural_reseller_other') : $this->input->post('rural_reseller')) ,
						'stockfeed_provider'		=> ($this->input->post('stockfeed_provider') == 5 ? $this->input->post('stockfeed_provider_other') : $this->input->post('stockfeed_provider')),
						'fertiliser_provider'		=> ($this->input->post('fertiliser_provider') == 5 ? $this->input->post('fertiliser_provider_other') : $this->input->post('fertiliser_provider') ),
						'fuel_supplier'				=> ($this->input->post('fuel_supplier') == 5 ? $this->input->post('fuel_supplier_other') : $this->input->post('fuel_supplier')),
						'agro_chemical_provider'	=> ($this->input->post('agro_chemical_provider') == 5 ? $this->input->post('agro_chemical_provider_other') : $this->input->post('agro_chemical_provider')),
						'fertiliser_account_handler'=> implode(',',$arr_fertiliser),
						'reseller_account'			=> implode(',',$arr_reseller),
						'stockfeed_account'			=> implode(',',$arr_stockfeed)
					);

				$this->register_model->insertData('vendor_data',$vendor_data);	

				$professional_data = array(
						'personal_id'				=> $personal_id,
						'independent_nutritionist'	=> $this->input->post('nutritionist'),
						'independent_agronomist'	=> $this->input->post('agronomist'),
				);		

				$this->register_model->insertData('professional_services',$professional_data);	

				$priority_data = array(
						'personal_id'			=> $personal_id,
						'product'				=> $this->input->post('product_priority'),
						'price'					=> $this->input->post('price_priority'),
						'payment_terms'			=> $this->input->post('payment_priority'),
						'service'				=> $this->input->post('service_priority')
					);

				$this->register_model->insertData('priorities',$priority_data);

				$other_data = array(
						'personal_id'			=> $personal_id,
						'how_hear'				=> ($this->input->post('how_hear') == 4 ? $this->input->post('how_hear_other') : $this->input->post('how_hear')),
						'receive_free_text'		=> $this->input->post('free_text'),
						'terms_and_conditions'	=> $this->input->post('terms_and_conditions')
					);

				$this->register_model->insertData('other',$other_data);

				$emailStatus 			= $this->sendEmail($this->input->post('email'), $temp_pass);
				$name 					= $this->input->post('first_name') .' '.$this->input->post('surname');

				$this->sendToAdmin($name);

				if($emailStatus){

					redirect('register/confirmation/success');					

				} else {

					redirect('register/confirmation/error');	

				}

			} else {

				redirect('register/confirmation/exists');

			}
			
		}

		$page['regulations']				= $this->register_model->getContent('membership-regulations');
		$page['zones']						= $this->register_model->getZones();
		$page['primaryActivity']			= $this->register_model->getPrimaryActivity();
		$page['stocks']						= $this->register_model->getStocks();
		$page['hectares']					= $this->register_model->getHectares();
		$page['usages']						= $this->register_model->getUsages();
		$page['ruralResellers']				= $this->register_model->getRuralResellers();
		$page['stockfeedProviders']			= $this->register_model->getStockfeedProviders();
		$page['fertiliserProviders']		= $this->register_model->getFertiliserProviders();
		$page['fuelSuppliers']				= $this->register_model->getFuelSuppliers();
		$page['fertiliserAccountHandlers']	= $this->register_model->getFertiliserAccountHandlers();
		$page['agroChemicalProviders']		= $this->register_model->getAgroChemicalProviders();
		$page['resellerAccounts']			= $this->register_model->getResellerAccounts();
		$page['stockfeedAccounts']			= $this->register_model->getStockfeedAccounts();
		$page['hearMediums']				= $this->register_model->getMediums();

		$data['headerContent']				= (isset($header) ? $header : null);
		$data['pageContent'] 				= (isset($page) ? $page : null);
		$data['pageFile'] 					= 'login/signup.php';

		$this->load->view('siteview',$data);
	}

	public function supplier(){

		$this->load->library('form_validation');
		$this->load->model('register_model');

		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('surname','Surname','trim|required');
		$this->form_validation->set_rules('property_name','Property Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('landline','Landline','trim|required|numeric');
		$this->form_validation->set_rules('mobile','Mobile','trim|numeric');
		$this->form_validation->set_rules('fax','Fax','trim|numeric');

		$this->form_validation->set_rules('billing_suburb','Suburb','trim|required');
		$this->form_validation->set_rules('billing_state','State','trim|required');
		$this->form_validation->set_rules('billing_postcode','Postcode','trim|required');
		$this->form_validation->set_rules('billing_country','Country','trim|required');


		if ($this->form_validation->run() !== FALSE) {

			$checkUserExists = $this->register_model->checkUserExists($this->input->post('first_name'), $this->input->post('surname'),$this->input->post('email'));

			if($checkUserExists == 'valid'){

				$temp_pass = $this->rand_string(8);

				$personal_data = array(
						'first_name'	=> ucwords($this->input->post('first_name')),
						'surname'		=> ucwords($this->input->post('surname')),
						'property_name'	=> ucwords($this->input->post('property_name')),
						'trading_name'	=> ucwords($this->input->post('trading_name')),
						'email'			=> $this->input->post('email'),
						'password'		=> sha1(md5($temp_pass.".robey")),
						'landline'		=> $this->input->post('landline'),
						'mobile'		=> $this->input->post('mobile'),
						'fax'			=> $this->input->post('fax'),
						'role'			=> 1,
						'date_joined'	=> date('U')
					);

				$billing_data = array(
						'address_1' 	=> $this->input->post('billing_address_1'), 
						'address_2'		=> $this->input->post('billing_address_2'),
						'suburb'		=> $this->input->post('billing_suburb'),
						'state'			=> $this->input->post('billing_state'),
						'postcode'		=> $this->input->post('billing_postcode'),
						'country'		=> $this->input->post('billing_country')

					);

				$personal_id			= $this->register_model->insertPersonalData($personal_data);
				$address_id				= $this->register_model->insertAddressData($billing_data);

				$page['temp_pass']		= $temp_pass;
				$page['message']		= 'A new account has been added';

			} else {

				$page['message'] = 'Account already exists in the db';

			}
			
		}

		$data['pageContent']		= (isset($page) ? $page : null);
		$data['pageFile']			= 'login/signup.php';

		$this->load->view('mainview',$data);
	}

	public function confirmation($status){

		if($status == 'success'){

			$page['message']		= 'We thank you for registering with us, Please check your login details. At the moment we are still working on our membership page, rest assured that we will inform once we are settled down. Again Thank You!';

		} elseif($status == 'exists') {

			$page['message']		= 'Account already exists in the db';

		} else {

			$page['message']		= 'There was an error registering your account, please try again later';

		}

		$data['headerContent']		= (isset($header) ? $header : null);
		$data['pageContent']		= (isset($page) ? $page : null);
		$data['pageFile']			= 'site/confirmation.php';

		$this->load->view('siteview', $data);

	}

	public function rand_string($length){

		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-=_+<>?:{}";
		return substr(str_shuffle($chars), 0, $length);

	}

	public function sendEmail($email, $tempPass){

		$this->load->library('email');

		$this->email->from('admin@agribsg.com.au', 'AgriBSG Web Admin');
		$this->email->to($email); 

		$this->email->subject('Membership Confirmation');

		$message = 'We thank you for the interest you have in becoming our member, we wish to welcome you. The password for your account is '.$tempPass;
		$this->email->message($message);	

		if($this->email->send()){
			return true;
		} else {
			return false;
		}

	}

	public function sendToAdmin($name){

		$this->load->library('email');

		$this->email->from('admin@agribsg.com.au', 'AgriBSG Web Notification');
		$this->email->to('jack@agribsg.com.au'); 

		$this->email->subject('Admin Sign Up Notification');

		$message = $name . ' has registered and account please view the details using your admin account';

		$this->email->message($message);	

		$this->email->send();

	}

}