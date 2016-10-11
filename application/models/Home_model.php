<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	
	public function get_inserted_id(){
		return $this->db->insert_id();
	}
	
	public function save_form(){
		$data = array(
			"id" => null,
			"egresado" => $this->input->post("egresado"),
			"obser" => $this->input->post("obser"),
			"carrera" => $this->input->post("carrera"),
			"matricula" => $this->input->post("matric"),
			"fecha" => $this->input->post("fecha"),
			"apat" => $this->input->post("apat"),
			"amat" => $this->input->post("amat"),
			"nombre" => $this->input->post("nombre"),
			"sexo" => $this->input->post("sexo"),
			"curp" => $this->input->post("curp"),
			"ecivil" => $this->input->post("ecivil"),
			"status_e" => $this->input->post("status"),
			"calle" => $this->input->post("calle"),
			"colonia" => $this->input->post("colonia"),
			"municipio" => $this->input->post("municipio"),
			"estado" => $this->input->post("estado"),
			"cp" => $this->input->post("cp"),
			"tcasa" => $this->input->post("tcasa"),
			"trecados" => $this->input->post("trecados"),
			"fechanac" => $this->input->post("fechanac"),
			"mailperso" => $this->input->post("mailperso"),
			"maillaboral" => $this->input->post("maillaboral"),
			"facebook" => $this->input->post("facebook"),
			"twitter" => $this->input->post("twitter"),
			"etitTSU" => $this->input->post("etitTSU"),
			"etitING" => $this->input->post("etitING"),
			"npersonal" => $this->input->post("npersonal"),
			"tpersonal" => $this->input->post("tpersonal"),
			"cpersonal" => $this->input->post("cpersonal"),
			"nescolar" => $this->input->post("nescolar"),
			"tescolar" => $this->input->post("tescolar"),
			"cescolar" => $this->input->post("cescolar"),
			"nlaboral" => $this->input->post("nlaboral"),
			"tlaboral" => $this->input->post("tlaboral"),
			"claboral" => $this->input->post("claboral"),
			"empresa" => $this->input->post("empresa"),
			"dirempresa" => $this->input->post("dirempresa"),
			"puesto" => $this->input->post("puesto"),
			"nomjefe" => $this->input->post("nomjefe"),
			"telempresa" => $this->input->post("telempresa"),
			"tlaborando" => $this->input->post("tlaborando"),
			"explaboral" => $this->input->post("explaboral"),
			"sueldo" => $this->input->post("sueldo"),
			"nivocupacion" => $this->input->post("nivocupacion"),
			"otronc" => $this->input->post("otronc"),
			"tiempoempleo" => $this->input->post("tiempoempleo"),
			"loctrabajo" => $this->input->post("loctrabajo"),
			"torganizacion" => $this->input->post("torganizacion"),
			"tipoorga" => $this->input->post("tipoorga"),
			"trel" => $this->input->post("trel"),
			"tcol" => $this->input->post("fcol"),
			"cest" => $this->input->post("cest"),
			"cestque" => $this->input->post("cestque")
		);
		$this->db->insert('EGRESADO', $data);
		$last_id = $this->db->insert_id();
		$this->session->set_userdata("id_e", $last_id);
	}
	public function save_satisf(){
		$data = array(
			"id_s" => null,
			"id_e" => $this->session->userdata("id_e"),
			"infraestructura" => $this->input->post("infraestructura"),
			"eqlab" => $this->input->post("eqlab"),
			"servicios" => $this->input->post("servicios"),
			"tutoria" => $this->input->post("tutoria"),
			"bolsa_trabajo" => $this->input->post("bolsa_trabajo"),
			"con_prof" => $this->input->post("con_prof"),
			"con_prof_pract" => $this->input->post("con_prof_pract"),
			"con_mercado" => $this->input->post("con_mercado"),
			"exp_pract" => $this->input->post("exp_pract"),
			"estadia" => $this->input->post("estadia"),
			"apl_con" => $this->input->post("apl_con"),
			"niv_con" => $this->input->post("niv_con"),
			"competencia" => $this->input->post("competencia"),
			"niv_coloc" => $this->input->post("niv_coloc"),
			"con_adqu" => $this->input->post("con_adqu"),
			"modelo_tsu" => $this->input->post("modelo_tsu"),
			"opinion_fam" => $this->input->post("opinion_fam"),
			"con_titulo_tsu" => $this->input->post("con_titulo_tsu"),
			"ingenieria" => $this->input->post("ingenieria"),
			"discapacidad" => $this->input->post("discapacidad"),
			"nomdisc" => $this->input->post("nomdisc"),
			"sabias" => $this->input->post("servinc")
		);
		$this->db->insert('SATISFACCION', $data);
	}
	public function get_egre($id){
        $query = $this->db->query("SELECT id, egresado, carrera, matricula, fecha, apat, amat, nombre FROM EGRESADO WHERE id=".$this->db->escape($id));
		return $query->row_array();
	}
}