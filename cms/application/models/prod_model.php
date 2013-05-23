<?php
class Prod_model extends CI_Model{

	public function __construct(){

		parent::__construct();

	}

	public function checkCategoryExists($tempCat){

		$this->db->like('prod_cat',$tempCat);
		$this->db->where('active', 0);
		$query = $this->db->get('prod_categories');

		if($query->num_rows() > 0){

			return false;

		} else {
			return true;
		}

	}

	public function checkSubCatExists($id, $tempCat){

		$this->db->like('sub_cat',$tempCat);
		$this->db->where('prod_cat_id',$id);
		$this->db->where('active',0); 
		$query = $this->db->get('sub_categories');

		if($query->num_rows() > 0){

			return false;

		} else {

			return true;

		}

	}

	public function getCategories(){

		$this->db->where('active',0);
		$query = $this->db->get('prod_categories');

		$array = array(); 

		foreach($query->result() as $row){

			$array[] = array(
					'prod_cat_id'	=> $row->prod_cat_id,
					'prod_cat'		=> $row->prod_cat,
					'sub_cat_count'	=> $this->countSubs($row->prod_cat_id),
					'itemCount'		=> $this->countItems($row->prod_cat_id)
				);
		}

		return $array;

	}

	public function getSubCategories($id){

		$this->db->select('*');
		$this->db->from('sub_categories as A');
		$this->db->where('A.prod_cat_id',$id);
		$this->db->where('active',0);
		$query = $this->db->get();

		$array = array();

		foreach($query->result() as $row) {

			$array[] = array(
					'sub_cat_id'	=> $row->sub_cat_id,
					'sub_cat' 		=> $row->sub_cat,
					'count'			=> $this->countProds($row->sub_cat_id)
				);

		}

		return $array;
	}

	public function countSubs($id){

		$this->db->select('COUNT(*) as count');
		$this->db->where('prod_cat_id',$id);
		$query = $this->db->get('sub_categories');

		return $query->row('count');

	}

	public function countItems($id){

		$this->db->select('COUNT(*) as itemCount');
		$this->db->where('prod_cat_id',$id);
		$query = $this->db->get('main_prods');

		return $query->row('itemCount');
	}

	public function countProds($id){

		$this->db->select('COUNT(*) as count');
		$this->db->where('sub_cat_id',$id);
		$query = $this->db->get('main_prods');

		return $query->row('count');

	}

	public function insertData($table,$data){

		$this->db->insert($table,$data);

	}

	public function insertProduct($table, $data){

		$this->db->insert($table,$data);

		return $this->db->insert_id();

	}

	public function getUnits(){

		$query = $this->db->get('units');

		return $query->result();

	}

	public function checkProductExists($tempProd,$code){

		$this->db->from('products as A');
		$this->db->join('main_prods as B','B.prod_id = A.prod_id');
		$this->db->like('prod_name',$tempProd);
		$this->db->like('absg_code',$code);
		$query = $this->db->get();

		if($query->num_rows() >  0){

			return false;

		} else {

			return true;

		}

	}

	public function getProducts($start,$limit){

		$this->db->from('products as A');
		$this->db->join('main_prods as B', 'B.prod_id = A.prod_id');
		$this->db->join('prod_categories as C', 'C.prod_cat_id = B.prod_cat_id');
		$this->db->join('sub_categories as D', 'D.sub_cat_id = B.sub_cat_id');
		$this->db->join('units as E', 'E.unit_id = A.unit_id');
		$this->db->where('B.active', 0);
		// $this->db->order_by($sidx,$sord);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result();

	}

	public function countProducts(){

		$this->db->select('COUNT(*) as count');
		$this->db->where('active',0);
		$query = $this->db->get('main_prods');

		return $query->row('count');

	}

}