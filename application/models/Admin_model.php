<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	
	public function get_user(){
		$data = array(
			"usuario" => $this->input->post("usuario"),
			"passwd" => $this->input->post("passwd")
		);
		$query = $this->db->query("SELECT * FROM LOGIN WHERE usuario='".$this->db->escape_str($data["usuario"])."' AND passwd='".$this->db->escape_str($data["passwd"])."'");
		return $query->row_array();
	}
	public function get_data_user($id){
		$query = $this->db->query("SELECT * FROM USUARIO WHERE id_u=".$this->db->escape($id));
		return $query->row_array();
	}
	public function count_polls(){
		$query = $this->db->query("SELECT COUNT(id_s) AS polls FROM SATISFACCION");
		return $query->row_array();
	}
}