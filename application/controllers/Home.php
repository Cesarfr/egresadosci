<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("home_model");
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
	}
	public function index(){
		$data['title'] = "Egresados";
		$this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
	}
	public function aviso(){
		$data['title'] = "Aviso de Privacidad";
		$this->load->view('templates/header', $data);
        $this->load->view('pages/aviso');
        $this->load->view('templates/footer');
	}
	
	public function save_egresado(){
		$this->form_validation->set_rules('egresado', 'Egresado', 'required');
    	$this->form_validation->set_rules('carrera', 'Carrera', 'required');
		if ($this->form_validation->run() === FALSE){
			$data['title'] = "Aviso de Privacidad";
			$this->load->view('templates/header', $data);
        	$this->load->view('pages/aviso');
        	$this->load->view('templates/footer');
		}else{
			$this->home_model->save_form();
		}
	}
}