<?php
class Admin_model extends CI_Model{

	public function __construct(){

		parent::__construct();

	}

	public function getGroups($role){

		$this->db->where('role',$role);
		$this->db->where('active',0);
		$query = $this->db->get('personal_details');

		if ($query->num_rows > 0) {
			
			return $query->result();	

		}
		
	}

	public function getGroup($id){

		$this->db->from('personal_details as A');
		$this->db->join('zones as B', 'B.zone_id = A.zone_id');
		$this->db->where('personal_id',$id);
		$query = $this->db->get();

		if ($query->num_rows > 0) {
			
			$group = array();

			foreach ($query->result() as $row) {
				
				$group = $row;

			}

			return $group;

		}

	}

	public function getAddress($id){

		$this->db->from('address_basket as A');
		$this->db->join('address_details as B','B.address_id = A.address_id');
		$this->db->where('A.personal_id', $id);
		$query = $this->db->get();

		if($query->num_rows > 0){

			$address = array(); 
			foreach($query->result() as $row){

				$address[] = $row;	

			}

		} else {

			$address = null;
		}

		return $address;

	}

	public function getActivities($id){

		$this->db->where('personal_id', $id);
		$query = $this->db->get('activity_data');

		if($query->num_rows > 0){

			$activities = array();

			foreach($query->result() as $row){

				if($row->primary_activity == 'yes'){

					if(is_numeric($row->activity_id)){
						$activity_name = $this->getActivity($row->activity_id);
					} else {
						$activity_name = $row->activity_id;
					}

					$activities['primary'] = $activity_name;

				} else{

					if(is_numeric($row->activity_id)){
						$activity_name = $this->getActivity($row->activity_id);
					} else {
						$activity_name = $row->activity_id;
					}

					$activities['other'][] = $activity_name;

				}

			}

		}

		return $activities;

	}

	public function getActivity($id){

		$this->db->select('activity_name');
		$this->db->where('activity_id',$id);
		$query2 = $this->db->get('agricultural_activity');

		foreach($query2->row_array() as $value){
			return $value;
		}

	}

	public function getStocks($id){

		$this->db->select('stock_name,stock_number');
		$this->db->from('stock_data as A');
		$this->db->join('stocks as B', 'B.stock_id = A.stock_id');
		$this->db->where('personal_id',$id);
		$this->db->order_by('A.stock_id', 'asc');
		$query = $this->db->get();

		$stocks = array();

		if($query->num_rows() > 0 ){

			foreach ($query->result() as $value) {
				
				$stocks[] = array(
						'stock_name'	=> $value->stock_name,
						'stock_value'	=> $value->stock_number
					);

			}

			return $stocks;

		} 

	}

	public function getHectares($id){

		$this->db->select('hectare_name,hectare_value');
		$this->db->from('hectare_data as A');
		$this->db->join('total_hectares as B','B.hectare_id = A.hectare_id');
		$this->db->where('personal_id',$id);
		$this->db->order_by('A.hectare_id','asc');
		$query = $this->db->get();

		$hectares = array();

		if($query->num_rows() > 0){

			foreach ($query->result() as $value) {
				
				$hectares[] = array(
						'hectare_name'	=> $value->hectare_name,
						'hectare_value'	=> $value->hectare_value
					);

			}

			return $hectares;

		}

	}

	public function getUsages($id){

		$this->db->select('product_usage_name,usage_value');
		$this->db->from('usage_data as A');
		$this->db->join('product_usage as B', 'B.usage_id = A.usage_id');
		$this->db->where('personal_id',$id);
		$this->db->order_by('A.usage_id', 'asc');
		$query = $this->db->get();

		$usages = array();

		if($query->num_rows() > 0){

			foreach($query->result() as $value){

				$usages[] = array(
						'usage_name'	=> $value->product_usage_name,
						'usage_value'	=> $value->usage_value
					);

			}

			return $usages;

		}
	}

	public function getVendors($id){

		$this->db->select('rural_reseller,stockfeed_provider,fertiliser_provider,fuel_supplier,agro_chemical_provider');
		$this->db->where('personal_id',$id);
		$query = $this->db->get('vendor_data');

		if($query->num_rows() > 0){

			$vendor = array();

			foreach($query->result() as $value){

				$vendor['rural_reseller'] 			= ( is_numeric($value->rural_reseller) ? $this->getVendor($value->rural_reseller) : $value->rural_reseller );
				$vendor['stockfeed_provider'] 		= ( is_numeric($value->stockfeed_provider) ? $this->getVendor($value->stockfeed_provider) : $value->stockfeed_provider );
				$vendor['fertiliser_provider'] 		= ( is_numeric($value->fertiliser_provider) ? $this->getVendor($value->fertiliser_provider) : $value->fertiliser_provider );
				$vendor['fuel_supplier'] 			= ( is_numeric($value->fuel_supplier) ? $this->getVendor($value->fuel_supplier) : $value->fuel_supplier );
				$vendor['agro_chemical_provider'] 	= ( is_numeric($value->agro_chemical_provider) ? $this->getVendor($value->agro_chemical_provider) : $value->agro_chemical_provider );
			}

			return $vendor;

		}
	}

	public function getVendor($id){

		$this->db->select('sp_name');
		$this->db->where('sp_id',$id);
		$query = $this->db->get('supplier_provider');

		foreach($query->row_array() as $value){
			return $value;
		}

	}

	public function getAccounts($id){

		$this->db->select('fertiliser_account_handler,reseller_account,stockfeed_account');
		$this->db->where('personal_id',$id);
		$query = $this->db->get('vendor_data');

		if($query->num_rows > 0){

			$account = array();
			foreach($query->result() as $value){

				$account['fertiliser_account_handler'] 	= $this->getAccountName($value->fertiliser_account_handler);
				$account['reseller_account'] 			= $this->getAccountName($value->reseller_account);
				$account['stockfeed_account'] 			= $this->getAccountName($value->stockfeed_account);

			}
		}

		return $account;
	}

	public function getAccountName($accounts){

		$details = explode(',',$accounts);

		$newDetails = array();

		foreach($details as $detail){

			if($detail != 5){
				if(is_numeric($detail) && $detail != 5){
					$this->db->select('sp_name');
					$this->db->where('sp_id',$detail);
					$query = $this->db->get('supplier_provider');	

					foreach($query->row_array() as $sp_name){

						$newDetails[] = $sp_name;

					}

				} else{
					$newDetails[] = $detail;

				}
			}

		}

		return $newDetails;
		
	}

	public function getServices($id){

		$this->db->where('personal_id',$id);
		$query = $this->db->get('professional_services');

		$services = array();

		if($query->num_rows() > 0){

			foreach ($query->result() as $value) {
				
				$services['independent_nutritionist']	= $value->independent_nutritionist;
				$services['independent_agronomist']		= $value->independent_agronomist;

			}

		}

		return $services;

	}

	public function getOthers($id){

		$this->db->select('how_hear,receive_free_text');
		$this->db->where('personal_id',$id);
		$query = $this->db->get('other');

		if($query->num_rows > 0){

			$others = array();

			foreach($query->result() as $row){

				if(is_numeric($row->how_hear)){
					$medium_name = $this->getMedium($row->how_hear);
				} else {
					$medium_name = $row->how_hear;
				}

				$others['how_hear'] 			= $medium_name;
				$others['receive_free_text'] 	= $row->receive_free_text;

			}

			return $others;
		} 

	}

	public function getMedium($id){

		$this->db->select('medium_name');
		$this->db->where('medium_id',$id);
		$query = $this->db->get('hear_medium');

		foreach($query->row_array() as $value){
			return $value;
		}

	}

	public function getPriorities($id){

		$this->db->where('personal_id',$id);
		$query = $this->db->get('priorities');

		$row = $query->row_array();
		
		$return = array();

		asort($row);

		foreach($row as $key => $val){
			if($key != 'personal_id'){

				$return[] = $key;
			}
		}

		return $return;
	}


	public function updatePersonalData($id, $data){

		$this->db->where('personal_id',$id);
		$query = $this->db->update('personal_details',$data);

	}

	public function deletePersonalData($id,$data){

		$this->db->where('personal_id',$id);
		$query = $this->db->update('personal_details',$data);

	}

	public function getContents($pageUrl){

		$this->db->select('*');
		$this->db->from('pages as A');
		$this->db->join('page_data as B','B.parent_id = A.page_id');
		$this->db->join('subpages as C','C.sub_id = B.sub_id');
		$this->db->where('page_url',$pageUrl);
		$query = $this->db->get();

		return $query->result();
	}

	public function getContent($sub_url){

		$this->db->select('C.page_url, A.*');
		$this->db->from('subpages as A');
		$this->db->join('page_data as B','B.sub_id = A.sub_id');
		$this->db->join('pages as C','C.page_id = B.parent_id');
		$this->db->where('sub_url',$sub_url);
		$query = $this->db->get();

		return $query->row();

	}

	public function updatePageContent($id,$data){

		$this->db->where('sub_id',$id);
		$query = $this->db->update('subpages',$data);

	}

	public function getPages(){

		$query = $this->db->get('pages');
		return $query->result();

	}

	public function getCategories(){

		$query = $this->db->get('categories');
		return $query->result();

	}

	public function insertSubpage($data){

		$this->db->insert('subpages',$data);

		return $this->db->insert_id();

	}

	public function insertPageData($data){

		$this->db->insert('page_data',$data);

	}

	public function getPageId($page){

		$this->db->where('page_url',$page);
		$this->db->limit(1);
		$query = $this->db->get('pages');

		foreach ($query->result() as $row) {
			return $row;
		}

	}

	public function getParentTitle($id){

		$this->db->select('page_title');
		$this->db->where('page_id',$id);
		$this->db->limit(1);
		$query = $this->db->get('pages');

		foreach ($query->result() as $row) {
			return $row;
		}

	}

	public function deleteContent($id){

		$this->db->where('sub_id', $id);
		$this->db->delete('subpages');

		$this->db->where('sub_id',$id);
		$this->db->delete('page_data');

	}

	public function getMedias(){

		$this->db->from('media as A');
		$this->db->join('subpages as B', 'B.sub_id = A.media_content_id', 'left');
		$this->db->where('A.active', 0);
		$this->db->order_by('A.media_type', 'ASC');
		$this->db->order_by('B.sub_title', 'ASC'); 
		$query = $this->db->get();

		return $query->result();

	}

	public function getMediaParent(){

		$this->db->select('B.sub_id, sub_title');
		$this->db->from('page_data as A');
		$this->db->join('subpages as B', ('B.sub_id = A.sub_id'));
		$this->db->where_in('parent_id', array(2,3,7));
		$query = $this->db->get();

		return $query->result();

	}

	public function addMedia($data){

		$this->db->insert('media',$data);

	}

	public function deleteMedia($id,$data){

		$this->db->where('media_id',$id);
		$query = $this->db->update('media',$data);

	}

}