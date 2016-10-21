<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("admin_model");
	}
	public function login(){
		if(isset($_SESSION["id_u"])){
			redirect("/admin/panel/");
		}else{
			$data['title'] = "Login";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login');
			$this->load->view('templates/footer');
		}
	}
	public function signin(){
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required', array('required' => 'El campo %s es obligatorio.'));
    	$this->form_validation->set_rules('passwd', 'Contraseña', 'trim|required', array('required' => 'El campo %s es obligatorio.'));
		if ($this->form_validation->run() === FALSE){
			$data['title'] = "Login";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login');
			$this->load->view('templates/footer');
		}else{
			$res = $this->admin_model->get_user();
			if(isset($res["id_l"])){
				$user = $this->admin_model->get_data_user($res["id_u"]);
				$sessiondata = $user;
				$this->session->set_userdata($sessiondata);
				redirect("/admin/panel/");
			}else{
				$data['title'] = "Login";
				$data['errmes'] = "<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Usuario o contraseña inválidos</div>";
				$this->load->view('templates/header', $data);
				$this->load->view('pages/login');
				$this->load->view('templates/footer');
			}
		}
	}
	public function panel(){
		if(!isset($_SESSION["id_u"])){
			redirect("/admin/login/");
		}else{
			$data['title'] = "Panel";
			$res = $this->admin_model->count_polls();
			$data['npolls'] = $res["polls"];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/panel');
			$this->load->view('templates/footer');
		}
	}
	public function consres(){
		if(!isset($_SESSION["id_u"])){
			redirect("/admin/login/");
		}else{
			$data['title'] = "Consultar resultados";
			$restsu = $this->admin_model->count_polls_tsu();
			$resing = $this->admin_model->count_polls_ing();
			$data['polls_tsu'] = $restsu["polls_tsu"];
			$data['polls_ing'] = $resing["polls_ing"];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/consres');
			$this->load->view('templates/footer');
		}
	}
	public function logout(){
		$array_items = array('id_u', 'nombre', 'apat', 'amat');
		$this->session->unset_userdata($array_items);
		redirect("/admin/login/");
	}
	public function get_table(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$res = $this->admin_model->get_poll();
			echo json_encode($res);
		}
	}
	public function consultar(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$data['title'] = "Consultar egresados";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/consultar');
			$this->load->view('templates/footer');
		}
	}
	public function get_egre(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$list = $this->admin_model->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $egresado) {
				$no++;
				$row = array();
				$row[] = $egresado->id;
				$row[] = $egresado->egresado;
				$row[] = $egresado->carrera;
				$row[] = $egresado->matricula;
				$row[] = $egresado->nombre;
				$row[] = $egresado->apat;
				$row[] = $egresado->amat;
				$row[] = "<div class='text-center'><a class='btn btn-sm btn-warning' title='Modificar' href='".site_url('admin/edit_egre')."/".$egresado->id."'><i class='glyphicon glyphicon-pencil'></i> Modificar</a>&nbsp;<button class='btn btn-sm btn-danger' title='Borrar' onclick='delete_egre(\"".$egresado->id."\")'><i class='glyphicon glyphicon-trash'></i> Borrar</button>";
				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->admin_model->count_all(),
				"recordsFiltered" => $this->admin_model->count_filtered(),
				"data" => $data,
			);
			echo json_encode($output);
		}
	}
	public function edit_egre($id){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			if(is_numeric($id)){
				$datos_egre = $this->admin_model->get_egre_id($id);
				$data['title'] = "Modificar datos egresado";
				switch($datos_egre["carrera"]){
					case 'AEP': $datos_egre["descarr"]="Administración, Área Administración y Evaluación de Proyectos"; break;
					case 'ARH': $datos_egre["descarr"]="Administración, Área Recursos Humanos"; break;
					case 'DNM': $datos_egre["descarr"]="Desarrollo de Negocios, Área Mercadotecnia"; break;
					case 'MIN': $datos_egre["descarr"]="Mantenimiento, Área Industrial"; break;
					case 'MAT': $datos_egre["descarr"]="Mecatrónica, Área Automatización"; break;
					case 'NAT': $datos_egre["descarr"]="Nanotecnología, Área Materiales"; break;
					case 'PIM': $datos_egre["descarr"]="Procesos Industriales, Área Manufactura"; break;
					case 'QBT': $datos_egre["descarr"]="Química, Área Biotecnología"; break;
					case 'TIC': $datos_egre["descarr"]="Tecnologías de la Información y Comunicación, Área Sistemas Informáticos"; break;
					case 'ERC': $datos_egre["descarr"]="Energías Renovables, Área Calidad y Ahorro de Energía"; break;
					case 'IBT': $datos_egre["descarr"]="Biotecnología"; break;
					case 'IER': $datos_egre["descarr"]="Energías Renovables"; break;
					case 'IGP': $datos_egre["descarr"]="Gestión de Proyectos"; break;
					case 'IMI': $datos_egre["descarr"]="Mantenimiento Industrial"; break;
					case 'IMT': $datos_egre["descarr"]="Mecatrónica"; break;
					case 'INT': $datos_egre["descarr"]="Nanotecnología"; break;
					case 'IGE': $datos_egre["descarr"]="Negocios y Gestión Empresarial"; break;
					case 'IPO': $datos_egre["descarr"]="Procesos y Operaciones Industriales"; break;
					case 'ITI': $datos_egre["descarr"]="Tecnologías de la Información y Comunicación"; break;
				}
				$data['datos'] = $datos_egre;
				$this->load->view('templates/header', $data);
				$this->load->view('pages/edit_egre');
				$this->load->view('templates/footer');
			}else {
				show_404();
			}
		}
	}
}