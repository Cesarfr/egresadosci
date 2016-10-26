<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("home_model");
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
	public function satisfaccion(){
		$data['title'] = "Encuesta de satisfacción";
		$data['res'] = "<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡Información guardada con éxito!</div>";
		$data["id"] = $this->session->userdata("id_e");
		$this->load->view('templates/header', $data);
		$this->load->view('pages/satisfaccion');
		$this->load->view('templates/footer');
	}
	public function save_egresado(){
		$this->form_validation->set_rules('egresado', 'Egresado', 'required|trim');
		$this->form_validation->set_rules('obser', 'Observaciones', 'trim');
		$this->form_validation->set_rules('periodo', 'Periodo', 'required|trim');
		$this->form_validation->set_rules('carrera', 'Carrera', 'required|trim');
		$this->form_validation->set_rules('matric', 'Matricula', 'required|trim');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required|trim');
		$this->form_validation->set_rules('apat', 'Apellido Paterno', 'required|trim');
		$this->form_validation->set_rules('amat', 'Apellido Materno', 'required|trim');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('sexo', 'Sexo', 'required|trim');
		$this->form_validation->set_rules('curp', 'CURP', 'required|trim');
		$this->form_validation->set_rules('ecivil', 'Estado civil', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('calle', 'Calle y número', 'required|trim');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim');
		$this->form_validation->set_rules('municipio', 'Municipio', 'required|trim');
		$this->form_validation->set_rules('estado', 'Estado', 'required|trim');
		$this->form_validation->set_rules('cp', 'CP', 'required|trim');
		$this->form_validation->set_rules('tcasa', 'Teléfono de casa', 'required|trim');
		$this->form_validation->set_rules('trecados', 'Teléfono para recados y Nombre de la persona', 'required|trim');
		$this->form_validation->set_rules('fechanac', 'Fecha de nacimiento', 'required|trim');
		$this->form_validation->set_rules('mailperso', 'Correo electrónico personal', 'required|trim|valid_email');
		$this->form_validation->set_rules('maillaboral', 'Correo electrónico laboral', 'required|trim|valid_email');
		$this->form_validation->set_rules('facebook', '', 'trim');
		$this->form_validation->set_rules('twitter', '', 'trim');
		$this->form_validation->set_rules('etitTSU', 'Estado titulación TSU', 'trim');
		$this->form_validation->set_rules('etitING', 'Estado titulación ING', 'trim');
		$this->form_validation->set_rules('npersonal', 'Referencia nombre personal', 'trim');
		$this->form_validation->set_rules('tpersonal', 'Referencia teléfono personal', 'trim');
		$this->form_validation->set_rules('cpersonal', 'Referencia correo personal', 'trim|valid_email');
		$this->form_validation->set_rules('nescolar', 'Referencia nombre escolar', 'trim');
		$this->form_validation->set_rules('tescolar', 'Referencia teléfono escolar', 'trim');
		$this->form_validation->set_rules('cescolar', 'Referencia correo escolar', 'trim|valid_email');
		$this->form_validation->set_rules('nlaboral', 'Referencia nombre laboral', 'trim');
		$this->form_validation->set_rules('tlaboral', 'Referencia teléfono laboral', 'trim');
		$this->form_validation->set_rules('claboral', 'Referencia correo laboral', 'trim|valid_email');
		$this->form_validation->set_rules('empresa', 'Empresa', 'trim');
		$this->form_validation->set_rules('dirempresa', 'Domicilio empresa', 'trim');
		$this->form_validation->set_rules('puesto', 'Puesto', 'trim');
		$this->form_validation->set_rules('nomjefe', 'Nombre de tu jefe', 'trim');
		$this->form_validation->set_rules('telempresa', 'Teléfono empresa', 'trim');
		$this->form_validation->set_rules('tlaborando', 'Tiempo laborando', 'trim');
		$this->form_validation->set_rules('explaboral', 'Experiencia laboral', 'trim');
		$this->form_validation->set_rules('sueldo', 'Sueldo mensual', 'trim');
		$this->form_validation->set_rules('nivocupacion', 'Nivel de ocupación', 'trim');
		$this->form_validation->set_rules('otronc', 'Otra ocupación', 'trim');
		$this->form_validation->set_rules('tiempoempleo', 'Tiempo en conseguir tu primer empleo', 'trim');
		$this->form_validation->set_rules('loctrabajo', 'Localidad de Trabajo', 'trim');
		$this->form_validation->set_rules('torganizacion', 'Tamaño de la Organización', 'trim');
		$this->form_validation->set_rules('tipoorga', 'Tipo de Organización', 'trim');
		$this->form_validation->set_rules('trel', '¿Trabajas en algo relacionado a tu carrera?', 'required|trim');
		$this->form_validation->set_rules('fcol', '¿Fuiste colocado por la UT?', 'required|trim');
		$this->form_validation->set_rules('cest', '¿Continuarás estudiando?', 'required|trim');
		$this->form_validation->set_rules('cestque', 'Continuación de estudios', 'trim');
		if ($this->form_validation->run() === FALSE){
			$data['title'] = "Egresados";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$res = $this->home_model->save_form();
			redirect('/home/satisfaccion/');
		}
	}
	public function save_satis(){
		$this->form_validation->set_rules('infraestructura', 'Pregunta 1', 'required');
		$this->form_validation->set_rules('eqlab', 'Pregunta 2', 'required');
		$this->form_validation->set_rules('servicios', 'Pregunta 3', 'required');
		$this->form_validation->set_rules('tutoria', 'Pregunta 4', 'required');
		$this->form_validation->set_rules('bolsa_trabajo', 'Pregunta 5', 'required');
		$this->form_validation->set_rules('con_prof', 'Pregunta 6', 'required');
		$this->form_validation->set_rules('con_prof_pract', 'Pregunta 7', 'required');
		$this->form_validation->set_rules('con_mercado', 'Pregunta 8', 'required');
		$this->form_validation->set_rules('exp_pract', 'Pregunta 9', 'required');
		$this->form_validation->set_rules('estadia', 'Pregunta 10', 'required');
		$this->form_validation->set_rules('apl_con', 'Pregunta 11', 'required');
		$this->form_validation->set_rules('niv_con', 'Pregunta 12', 'required');
		$this->form_validation->set_rules('competencia', 'Pregunta 13', 'required');
		$this->form_validation->set_rules('niv_coloc', 'Pregunta 14', 'required');
		$this->form_validation->set_rules('con_adqu', 'Pregunta 15', 'required');
		$this->form_validation->set_rules('modelo_tsu', 'Pregunta 16', 'required');
		$this->form_validation->set_rules('opinion_fam', 'Pregunta 17', 'required');
		$this->form_validation->set_rules('con_titulo_tsu', 'Pregunta 18', 'required');
		$this->form_validation->set_rules('ingenieria', 'Pregunta 19', 'required');
		if ($this->form_validation->run() === FALSE){
			$data['title'] = "Encuesta de satisfacción";
			$data['res'] = "";
			$data["id"] = $this->session->userdata("id_e");
			$this->load->view('templates/header', $data);
			$this->load->view('pages/satisfaccion');
			$this->load->view('templates/footer');
		}else{
			$res = $this->home_model->save_satisf();
			redirect('/home/comprobante/');
		}
	}
	public function comprobante(){
		$data["title"] = "Impresión de comprobante";
		$data['res'] = "<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡Información guardada con éxito!</div>";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/comprobante');
		$this->load->view('templates/footer');
	}
	public function get_comp(){
		require_once(APPPATH.'../pdf/vendor/autoload.php');
		$res = $this->home_model->get_egre($this->session->userdata("id_e"));
		$html = "<style>
		<!--
		.header{width: 100%;padding: 10px;margin-bottom: 90px;}
		.header img {width: 50%;}
		.header td {width: 50%;}
		.body{width: 100%;padding: 10px; margin-top: 30px;}
		.td1 {width: 30%;}
		.td2 {width: 80%;}
		.text{text-align: right;}
		.footer {padding-top:5px 0; border-top: 2px solid #46d; width:100%;}
		.footer .fila td {text-align:center; width:100%;}
		.footer .fila td span {font-size: 10px; color: #000;}
		-->
		</style>
		<page backtop='20mm' backbottom='20mm' backleft='20mm' backright='20mm'>
			<page_header>
				<table class='header'>
					<tr>
						<td><img src='".base_url("assets/img/Logo_UTTEC.png")."' alt='logo'></td>
						<td class='text'><p>SECRETARÍA DE VINCULACIÓN</p><p>DEPARTAMENTO DE SEGUIMIENTO A EGRESADOS</p></td>
					</tr>
				</table>
			</page_header>

			<page_footer>
				<table class='footer'><tr class='fila'><td><span>Universidad Tecnológica de Tecámac</span></td></tr></table>
			</page_footer>

		   <table class='body'>
				<tr><td colspan='2' style='text-align:center;'><h4>COMPROBANTE CÉDULA DE EGRESO</h4></td></tr>
				<tr>
					<td class='td1'><strong>Folio:</strong></td>
					<td class='td2'>".$res["id"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Fecha:</strong></td>
					<td class='td2'>".$res["fecha"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Matrícula:</strong></td>
					<td class='td2'>".$res["matricula"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Egresado:</strong></td>
					<td class='td2'>".$res["egresado"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Carrera:</strong></td>
					<td class='td2'>".$res["carrera"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Nombre:</strong></td>
					<td class='td2'>".$res["nombre"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Apellido Paterno:</strong></td>
					<td class='td2'>".$res["apat"]."</td>
				</tr>
				<tr>
					<td class='td1'><strong>Apellido Materno:</strong></td>
					<td class='td2'>".$res["amat"]."</td>
				</tr>
				<tr>
					<td class='text' colspan='2'><qrcode value='Folio: ".$res["id"]."\nMatricula:".$res["matricula"]."\nNombre:".$res["nombre"]." ".$res["apat"]." ".$res["amat"]."' ec='H' style='margin-top: 20px; width: 50mm; background-color: white; color: black;'></qrcode></td>
				</tr>
			</table>
		</page>";
		$mipdf=new HTML2PDF('P','LETTER','es','true','UTF-8', 20);
		$mipdf->writeHTML($html);
		$mipdf->Output($res["matricula"]."-".$res["nombre"]."_".$res["apat"]."_".$res["amat"].".pdf", 'I');
	}
	public function rep_comp(){
		$data["title"] = "Reposición de comprobante";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/rep_comp');
		$this->load->view('templates/footer');
	}
	public function frm_comp(){
		$res = $this->home_model->get_egre_mat();
		echo json_encode($res);
	}
	public function get_rep_comp($id){
		if(is_numeric($id)){
			require_once(APPPATH.'../pdf/vendor/autoload.php');
			$res = $this->home_model->get_egre($id);
			if(isset($res['id'])){
				$html = "<style>
				<!--
				.header{width: 100%;padding: 10px;margin-bottom: 90px;}
				.header img {width: 50%;}
				.header td {width: 50%;}
				.body{width: 100%;padding: 10px; margin-top: 30px;}
				.td1 {width: 30%;}
				.td2 {width: 80%;}
				.text{text-align: right;}
				.footer {padding-top:5px 0; border-top: 2px solid #46d; width:100%;}
				.footer .fila td {text-align:center; width:100%;}
				.footer .fila td span {font-size: 10px; color: #000;}
				-->
				</style>
				<page backtop='20mm' backbottom='20mm' backleft='20mm' backright='20mm'>
					<page_header>
						<table class='header'>
							<tr>
								<td><img src='".base_url("assets/img/Logo_UTTEC.png")."' alt='logo'></td>
								<td class='text'><p>SECRETARÍA DE VINCULACIÓN</p><p>DEPARTAMENTO DE SEGUIMIENTO A EGRESADOS</p></td>
							</tr>
						</table>
					</page_header>

					<page_footer>
						<table class='footer'><tr class='fila'><td><span>Universidad Tecnológica de Tecámac</span></td></tr></table>
					</page_footer>

				   <table class='body'>
						<tr><td colspan='2' style='text-align:center;'><h4>COMPROBANTE CÉDULA DE EGRESO</h4></td></tr>
						<tr>
							<td class='td1'><strong>Folio:</strong></td>
							<td class='td2'>".$res["id"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Fecha:</strong></td>
							<td class='td2'>".$res["fecha"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Matrícula:</strong></td>
							<td class='td2'>".$res["matricula"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Egresado:</strong></td>
							<td class='td2'>".$res["egresado"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Carrera:</strong></td>
							<td class='td2'>".$res["carrera"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Nombre:</strong></td>
							<td class='td2'>".$res["nombre"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Apellido Paterno:</strong></td>
							<td class='td2'>".$res["apat"]."</td>
						</tr>
						<tr>
							<td class='td1'><strong>Apellido Materno:</strong></td>
							<td class='td2'>".$res["amat"]."</td>
						</tr>
						<tr>
							<td class='text' colspan='2'><qrcode value='Folio: ".$res["id"]."\nMatricula:".$res["matricula"]."\nNombre:".$res["nombre"]." ".$res["apat"]." ".$res["amat"]."' ec='H' style='margin-top: 20px; width: 50mm; background-color: white; color: black;'></qrcode></td>
						</tr>
					</table>
				</page>";
				$mipdf=new HTML2PDF('P','LETTER','es','true','UTF-8', 20);
				$mipdf->writeHTML($html);
				$mipdf->Output($res["matricula"]."-".$res["nombre"]."_".$res["apat"]."_".$res["amat"].".pdf", 'D');
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
}