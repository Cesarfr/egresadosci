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
//	public function get_egre(){
//		if(!isset($_SESSION["id_u"])){
//			redirect("/");
//		}else{
//			$res = $this->admin_model->get_egresados();
//			$data = array();
//			$no = $_POST['start'];
//			foreach ($res as $person) {
//				$no++;
//				$row = array();
//				$row[] = $person->id;
//				$row[] = $person->egresado;
//				$row[] = $person->matricula;
//				$row[] = $person->nombre;
//				$row[] = $person->apat;
//				$row[] = $person->amat;
//
//				//add html for action
//	//            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
//	//                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
//
//				$data[] = $row;
//			}
//
//			$output = array(
//							"draw" => $_POST['draw'],
//							"recordsTotal" => $this->admin_model->count_all(),
//							"recordsFiltered" => $this->admin_model->count_filtered(),
//							"data" => $data
//					);
//			//output to json format
//			echo json_encode($output);
//		}
//	}
}