<?php
class Auth_model extends CI_Model{

	public function __construct(){

		parent::__construct();

	}

	public function checkUser($email,$password){

		// echo sha1($password.".robey");
		// die();

		$this->db->where('email',$email);
		$this->db->where('password', sha1(md5($password.".robey") ));
		$query = $this->db->get('personal_details');	

		if ($query->num_rows() > 0) {
			return $query->row();
		} else{
			return 'invalid';
		}
	}

	public function saveSession($id,$role,$session){

		$this->db->where('personal_id',$id);
		$query = $this->db->update('personal_details', array('session' => $session));

		$login_data = array(
				'role'	=> $role,
				'session'	=> $session
			);

		$this->session->set_userdata('login_data',$login_data);

	}

	public function checkSession($session){

		$this->db->where('session',$session);
		$query = $this->db->get('personal_details');

		if ($query->num_rows() > 0) {
			return $query->row();
		}

	}

	public function removeSession($session){

		$this->db->where('session',$session);
		$query = $this->db->update('personal_details',array('session' => ''));

	}
}