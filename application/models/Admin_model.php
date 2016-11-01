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
	
	var $table = 'EGRESADO';
    var $column_order = array(null, 'egresado','carrera','matricula','nombre','apat','amat');
    var $column_search = array('egresado','carrera','matricula','nombre','apat','amat');
    var $order = array('id' => 'asc');
	
	private function _get_datatables_query(){
		$this->db->select('id, egresado, carrera, matricula, nombre, apat, amat')->from($this->table);
        $i = 0;
     
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                 
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
				} //last loop
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1){
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
		}
        return $query->result();
    }
 
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all() {
        $this->db->query("SELECT id FROM EGRESADO");
        return $this->db->count_all_results();
	}
	
	public function get_poll(){
		$data = array(
			"carrera" => $this->input->post("carrera")
		);
		$query = $this->db->query("SELECT SATISFACCION.* FROM SATISFACCION INNER JOIN EGRESADO ON EGRESADO.id=SATISFACCION.id_e WHERE carrera='".$this->db->escape_str($data["carrera"])."'");
		return $query->result();
	}
	
	public function get_egre_id($id){
		$query = $this->db->query("SELECT * FROM EGRESADO WHERE id=".$this->db->escape($id));
		return $query->row_array();
	}
	
	public function update_egre(){
		$data = array(
			"egresado" => strtoupper($this->input->post("egresado")),
			"obser" => strtoupper($this->input->post("obser")),
			"carrera" => strtoupper($this->input->post("carrera")),
			"matricula" => $this->input->post("matric"),
			"fecha" => $this->input->post("fecha"),
			"fechaupdate" => $this->input->post("fechaupdate"),
			"apat" => strtoupper($this->input->post("apat")),
			"amat" => strtoupper($this->input->post("amat")),
			"nombre" => strtoupper($this->input->post("nombre")),
			"sexo" => strtoupper($this->input->post("sexo")),
			"curp" => strtoupper($this->input->post("curp")),
			"ecivil" => strtoupper($this->input->post("ecivil")),
			"status_e" => strtoupper($this->input->post("status")),
			"calle" => strtoupper($this->input->post("calle")),
			"colonia" => strtoupper($this->input->post("colonia")),
			"municipio" => strtoupper($this->input->post("municipio")),
			"estado" => strtoupper($this->input->post("estado")),
			"cp" => $this->input->post("cp"),
			"tcasa" => $this->input->post("tcasa"),
			"trecados" => $this->input->post("trecados"),
			"fechanac" => $this->input->post("fechanac"),
			"mailperso" => strtolower($this->input->post("mailperso")),
			"maillaboral" => strtolower($this->input->post("maillaboral")),
			"facebook" => strtolower($this->input->post("facebook")),
			"twitter" => strtolower($this->input->post("twitter")),
			"etitTSU" => strtoupper($this->input->post("etitTSU")),
			"etitING" => strtoupper($this->input->post("etitING")),
			"npersonal" => strtoupper($this->input->post("npersonal")),
			"tpersonal" => $this->input->post("tpersonal"),
			"cpersonal" => strtolower($this->input->post("cpersonal")),
			"nescolar" => strtoupper($this->input->post("nescolar")),
			"tescolar" => $this->input->post("tescolar"),
			"cescolar" => strtolower($this->input->post("cescolar")),
			"nlaboral" => strtoupper($this->input->post("nlaboral")),
			"tlaboral" => $this->input->post("tlaboral"),
			"claboral" => strtolower($this->input->post("claboral")),
			"empresa" => strtoupper($this->input->post("empresa")),
			"dirempresa" => strtoupper($this->input->post("dirempresa")),
			"puesto" => strtoupper($this->input->post("puesto")),
			"nomjefe" => strtoupper($this->input->post("nomjefe")),
			"telempresa" => $this->input->post("telempresa"),
			"tlaborando" => strtoupper($this->input->post("tlaborando")),
			"explaboral" => strtoupper($this->input->post("explaboral")),
			"sueldo" => $this->input->post("sueldo"),
			"nivocupacion" => strtoupper($this->input->post("nivocupacion")),
			"otronc" => strtoupper($this->input->post("otronc")),
			"tiempoempleo" => strtoupper($this->input->post("tiempoempleo")),
			"loctrabajo" => strtoupper($this->input->post("loctrabajo")),
			"torganizacion" => strtoupper($this->input->post("torganizacion")),
			"tipoorga" => strtoupper($this->input->post("tipoorga")),
			"trel" => $this->input->post("trel"),
			"tcol" => $this->input->post("fcol"),
			"cest" => $this->input->post("cest"),
			"cestque" => strtoupper($this->input->post("cestque"))
		);
		$where = array("id" => $this->input->post("id"));
		return $this->db->update('EGRESADO', $data, $where);
	}
	public function delete_egre($id){
		$this->db->where("id", $id);
		return $this->db->delete('EGRESADO');
	}
	public function count_graph($carr){
		$query = $this->db->query("SELECT count(id_s) AS value, carrera AS label FROM SATISFACCION INNER JOIN EGRESADO ON EGRESADO.id=SATISFACCION.id_e WHERE egresado='".$carr."' GROUP BY carrera");
		return $query->result();
	}
}