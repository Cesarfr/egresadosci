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
			"egresado" => strtoupper($this->input->post("egresado")),
			"obser" => strtoupper($this->input->post("obser")),
			"carrera" => strtoupper($this->input->post("carrera")),
			"matricula" => $this->input->post("matric"),
			"fecha" => $this->input->post("fecha"),
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