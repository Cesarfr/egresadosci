<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
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
}