<?php
class Register_model extends CI_Model{

	public function __construct(){

		parent::__construct();

	}

	public function getZones(){

		$query = $this->db->get('zones');

		return $query->result();

	}

	public function getPrimaryActivity(){

		$query = $this->db->get('agricultural_activity');

		return $query->result();

	}

	public function getStocks(){

		$query = $this->db->get('stocks');

		return $query->result();

	}

	public function getHectares(){

		$query = $this->db->get('total_hectares');

		return $query->result();
	}

	public function getUsages(){

		$query = $this->db->get('product_usage');

		return $query->result();

	}

	public function getRuralResellers(){

		$this->db->where('rural_reseller', 1);
		$query = $this->db->get('supplier_provider');

		return $query->result();

	}

	public function getStockfeedProviders(){

		$this->db->where('stockfeed_provider',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();

	}

	public function getFertiliserProviders(){

		$this->db->where('fertiliser_provider',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();

	}

	public function getFuelSuppliers(){

		$this->db->where('fuel_supplier',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();

	}

	public function getFertiliserAccountHandlers(){

		$this->db->where('fertiliser_account_handler',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();

	}

	public function getAgroChemicalProviders(){

		$this->db->where('agro_chemical_provider',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();

	}

	public function getResellerAccounts(){

		$this->db->where('reseller_account',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();		
	}

	public function getStockfeedAccounts(){

		$this->db->where('stockfeed_account',1);
		$this->db->order_by('sp_name', 'ASC');
		$query = $this->db->get('supplier_provider');

		return $query->result();		

	}

	public function getMediums(){

		$query = $this->db->get('hear_medium');

		return $query->result();

	}

	public function insertPersonalData($data){

		$this->db->insert('personal_details',$data);

		return $this->db->insert_id();

	}

	public function insertAddressData($data){

		$this->db->insert('address_details',$data);

		return $this->db->insert_id();

	}

	public function insertData($table,$data){

		$this->db->insert($table,$data);

	}

	public function insertActivity($data){

		$this->db->insert('activity_data',$data);

	}

	public function insertStock($data){

		$this->db->insert('stock_data',$data);

	}

	public function checkUserExists($first_name, $surname, $email){

		$this->db->where('first_name',ucwords($first_name));
		$this->db->where('surname',ucwords($surname));
		$this->db->where('email',$email);
		$query = $this->db->get('personal_details');

		if ($query->num_rows() == 0) {
			
			return 'valid';

		} else {

			return 'invalid';

		}

	}

	public function getContent($sub_url){

		$this->db->where('sub_url',$sub_url);
		$query = $this->db->get('subpages');

		return $query->row();

	}

}