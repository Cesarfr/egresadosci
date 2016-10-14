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
	public function count_polls_tsu(){
		$query = $this->db->query("SELECT COUNT(id_s) AS polls_tsu FROM SATISFACCION INNER JOIN EGRESADO ON EGRESADO.id=SATISFACCION.id_e WHERE egresado='TSU'");
		return $query->row_array();
	}
	public function count_polls_ing(){
		$query = $this->db->query("SELECT COUNT(id_s) AS polls_ing FROM SATISFACCION INNER JOIN EGRESADO ON EGRESADO.id=SATISFACCION.id_e WHERE egresado='ING'");
		return $query->row_array();
	}
	private function _get_datatables_query(){
         
        $this->db->query("SELECT id, egresado, carrera, matricula, nombre, apat, amat FROM EGRESADO");
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	public function get_egresados(){
		$this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
	}
	function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	public function get_poll(){
		$data = array(
			"carrera" => $this->input->post("carrera")
		);
		$query = $this->db->query("SELECT SATISFACCION.* FROM SATISFACCION INNER JOIN EGRESADO ON EGRESADO.id=SATISFACCION.id_e WHERE carrera='".$this->db->escape_str($data["carrera"])."'");
		return $query->result();
	}
}