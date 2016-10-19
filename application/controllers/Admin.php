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
}