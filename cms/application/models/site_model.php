<?php
class Site_model extends CI_Model{

	public function __construct(){

		parent::__construct();

	}

	public function getContent($url,$homepage=null){

		$this->db->from('subpages as A');
		$this->db->join('media as B','B.media_content_id = A.sub_id', 'left');
		$this->db->where('sub_url',$url);

		if($homepage!=null){
			$this->db->where('B.active', 0);	
		}
		
		$query = $this->db->get();

		return $query->row();

	}

	public function getLatestNews(){

		$this->db->from('page_data as A');
		$this->db->join('subpages as B','B.sub_id = A.sub_id');
		$this->db->join('media as C', 'C.media_content_id = A.sub_id', 'left');
		$this->db->where('parent_id',7);
		$this->db->where('C.active', 0);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->row();
	}

	public function getMedias(){

		$this->db->where('A.active', 0);
		$this->db->where('media_type', 0);
		$query = $this->db->get('media as A');

		return $query->result();

	}
	

}