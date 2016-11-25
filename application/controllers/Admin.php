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
	public function get_table_gen(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$res = $this->admin_model->get_poll_gen();
			for($i = 0; $i < count($res); $i++){
				if(array_key_exists('N/A', $res[$i]) == FALSE){
					$res[$i]["N/A"] = "0";
				}
				if(array_key_exists('R', $res[$i]) == FALSE){
					$res[$i]["R"] = "0";
				}
				if(array_key_exists('P', $res[$i]) == FALSE){
					$res[$i]["P"] = "0";
				}
				if(array_key_exists('B', $res[$i]) == FALSE){
					$res[$i]["B"] = "0";
				}
				if(array_key_exists('MB', $res[$i]) == FALSE){
					$res[$i]["MB"] = "0";
				}
			}
			echo json_encode($res);
		}
	}
	public function get_table(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$res = $this->admin_model->get_poll_esp();
			for($i = 0; $i < count($res); $i++){
				if(array_key_exists('N/A', $res[$i]) == FALSE){
					$res[$i]["N/A"] = "0";
				}
				if(array_key_exists('R', $res[$i]) == FALSE){
					$res[$i]["R"] = "0";
				}
				if(array_key_exists('P', $res[$i]) == FALSE){
					$res[$i]["P"] = "0";
				}
				if(array_key_exists('B', $res[$i]) == FALSE){
					$res[$i]["B"] = "0";
				}
				if(array_key_exists('MB', $res[$i]) == FALSE){
					$res[$i]["MB"] = "0";
				}
			}
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
				if(isset($datos_egre['id'])){
					$data['title'] = "Modificar datos egresado";
                    $d1="";$d2="";$d3="";$d4="";$d5="";$d6="";$d7="";$d8="";$d9="";
                    $d10="";$d11="";$d12="";$d13="";$d14="";$d15="";$d16="";$d17="";$d18="";$d19="";
					switch($datos_egre["carrera"]){
						case 'AEP': $d1 = "selected"; break;
						case 'ARH': $d2 = "selected"; break;
						case 'DNM': $d3 = "selected"; break;
						case 'MIN': $d4 = "selected"; break;
						case 'MTA': $d5 = "selected"; break;
						case 'NTA': $d6 = "selected"; break;
						case 'PIM': $d7 = "selected"; break;
						case 'QBT': $d8 = "selected"; break;
						case 'TIC': $d9 = "selected"; break;
						case 'ERC': $d10 = "selected"; break;
						case 'IBT': $d11 = "selected"; break;
						case 'IER': $d12 = "selected"; break;
						case 'IGP': $d13 = "selected"; break;
						case 'IMI': $d14 = "selected"; break;
						case 'IMT': $d15 = "selected"; break;
						case 'INT': $d16 = "selected"; break;
						case 'IGE': $d17 = "selected"; break;
						case 'IPO': $d18 = "selected"; break;
						case 'ITI': $d19 = "selected"; break;
					}
                    if($datos_egre["egresado"] == "TSU"){
                        $datos_egre["carr"] = "<option value='AEP' $d1>ADMINISTRACIÓN, ÁREA ADMINISTRACIÓN Y EVALUACIÓN DE PROYECTOS</option><option value='ARH' $d2>ADMINISTRACIÓN, ÁREA RECURSOS HUMANOS</option><option value='DNM' $d3>DESARROLLO DE NEGOCIOS, ÁREA MERCADOTECNIA</option><option value='MIN' $d4>MANTENIMIENTO, ÁREA INDUSTRIAL</option><option value='MTA' $d5>MECATRÓNICA, ÁREA AUTOMATIZACIÓN</option><option value='NTA' $d6>NANOTECNOLOGÍA, ÁREA MATERIALES</option><option value='PIM' $d7>PROCESOS INDUSTRIALES, ÁREA MANUFACTURA</option><option value='QBT' $d8>QUÍMICA, ÁREA BIOTECNOLOGÍA</option><option value='TIC' $d9>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN, ÁREA SISTEMAS INFORMÁTICOS</option><option value='ERC' $d10>ENERGÍAS RENOVABLES, ÁREA CALIDAD Y AHORRO DE ENERGÍA</option>";
                    }else{
                        $datos_egre["carr"] = "<option value='IBT' $d11>BIOTECNOLOGÍA</option><option value='IER' $d12>ENERGÍAS RENOVABLES</option><option value='IGP' $d13>GESTIÓN DE PROYECTOS</option><option value='IMI' $d14>MANTENIMIENTO INDUSTRIAL</option><option value='IMT' $d15>MECATRÓNICA</option><option value='INT' $d16>NANOTECNOLOGÍA</option><option value='IGE' $d17>NEGOCIOS Y GESTIÓN EMPRESARIAL</option><option value='IPO' $d18>PROCESOS Y OPERACIONES INDUSTRIALES</option><option value='ITI' $d19>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN</option>";
                    }
					$data['datos'] = $datos_egre;
					$this->load->view('templates/header', $data);
					$this->load->view('pages/edit_egre');
					$this->load->view('templates/footer');
				}else{
					show_404();
				}
			}else {
				show_404();
			}
		}
	}
	public function edit_frm_egre(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$this->form_validation->set_rules('egresado', 'Egresado', 'required|trim');
			$this->form_validation->set_rules('obser', 'Observaciones', 'trim');
			$this->form_validation->set_rules('periodo', 'Periodo', 'required|trim');
			$this->form_validation->set_rules('carrera', 'Carrera', 'required|trim');
			$this->form_validation->set_rules('matric', 'Matricula', 'required|trim');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required|trim');
			$this->form_validation->set_rules('fechaupdate', 'Fecha de actualización', 'required|trim');
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
			$this->form_validation->set_rules('sueldo', 'Sueldo mensual', 'trim|decimal');
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
				$datos_egre = $this->admin_model->get_egre_id($this->input->post("id"));
				$data['title'] = "Modificar datos egresado";
				$data['title'] = "Modificar datos egresado";
                    $d1="";$d2="";$d3="";$d4="";$d5="";$d6="";$d7="";$d8="";$d9="";
                    $d10="";$d11="";$d12="";$d13="";$d14="";$d15="";$d16="";$d17="";$d18="";$d19="";
					switch($datos_egre["carrera"]){
						case 'AEP': $d1 = "selected"; break;
						case 'ARH': $d2 = "selected"; break;
						case 'DNM': $d3 = "selected"; break;
						case 'MIN': $d4 = "selected"; break;
						case 'MTA': $d5 = "selected"; break;
						case 'NTA': $d6 = "selected"; break;
						case 'PIM': $d7 = "selected"; break;
						case 'QBT': $d8 = "selected"; break;
						case 'TIC': $d9 = "selected"; break;
						case 'ERC': $d10 = "selected"; break;
						case 'IBT': $d11 = "selected"; break;
						case 'IER': $d12 = "selected"; break;
						case 'IGP': $d13 = "selected"; break;
						case 'IMI': $d14 = "selected"; break;
						case 'IMT': $d15 = "selected"; break;
						case 'INT': $d16 = "selected"; break;
						case 'IGE': $d17 = "selected"; break;
						case 'IPO': $d18 = "selected"; break;
						case 'ITI': $d19 = "selected"; break;
					}
                    if($datos_egre["egresado"] == "TSU"){
                        $datos_egre["carr"] = "<option value='AEP' $d1>ADMINISTRACIÓN, ÁREA ADMINISTRACIÓN Y EVALUACIÓN DE PROYECTOS</option><option value='ARH' $d2>ADMINISTRACIÓN, ÁREA RECURSOS HUMANOS</option><option value='DNM' $d3>DESARROLLO DE NEGOCIOS, ÁREA MERCADOTECNIA</option><option value='MIN' $d4>MANTENIMIENTO, ÁREA INDUSTRIAL</option><option value='MTA' $d5>MECATRÓNICA, ÁREA AUTOMATIZACIÓN</option><option value='NTA' $d6>NANOTECNOLOGÍA, ÁREA MATERIALES</option><option value='PIM' $d7>PROCESOS INDUSTRIALES, ÁREA MANUFACTURA</option><option value='QBT' $d8>QUÍMICA, ÁREA BIOTECNOLOGÍA</option><option value='TIC' $d9>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN, ÁREA SISTEMAS INFORMÁTICOS</option><option value='ERC' $d10>ENERGÍAS RENOVABLES, ÁREA CALIDAD Y AHORRO DE ENERGÍA</option>";
                    }else{
                        $datos_egre["carr"] = "<option value='IBT' $d11>BIOTECNOLOGÍA</option><option value='IER' $d12>ENERGÍAS RENOVABLES</option><option value='IGP' $d13>GESTIÓN DE PROYECTOS</option><option value='IMI' $d14>MANTENIMIENTO INDUSTRIAL</option><option value='IMT' $d15>MECATRÓNICA</option><option value='INT' $d16>NANOTECNOLOGÍA</option><option value='IGE' $d17>NEGOCIOS Y GESTIÓN EMPRESARIAL</option><option value='IPO' $d18>PROCESOS Y OPERACIONES INDUSTRIALES</option><option value='ITI' $d19>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN</option>";
                    }
				$data['datos'] = $datos_egre;
				$this->load->view('templates/header', $data);
				$this->load->view('pages/edit_egre');
				$this->load->view('templates/footer');
			}else{
				$res = $this->admin_model->update_egre();
				if($res){
					$_SESSION['mens'] = "<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Los datos se han actualizado correctamente</div>";
				}else{
					$_SESSION['mens'] = "<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Ocurrío un error al actualizar los datos :(</div>";
				}
				$this->session->mark_as_flash('mens');
				redirect("/admin/consultar/");
			}
		}
	}
	public function delete_egre($id){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			if(is_numeric($id)){
				$res = $this->admin_model->delete_egre($id);
				echo $res;
			}else{
				show_404();
			}
		}
	}
	public function count_graph_TSU(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$res = $this->admin_model->count_graph("TSU");
			echo json_encode($res);	
		}
	}
	public function count_graph_ING(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$res = $this->admin_model->count_graph("ING");
			echo json_encode($res);	
		}
	}
	public function graficas(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
			$data['title'] = "Gráficas de satisfacción";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/graficas');
			$this->load->view('templates/footer');
		}
	}
    public function get_tb_gra(){
		if(!isset($_SESSION["id_u"])){
			redirect("/");
		}else{
            if($this->input->post("tg") == "TSU"){
                $carr = array("AEP","ARH","DNM","ERC","MIN","MTA","NTA","PIM","QBT","TIC","GENERAL");
                $res = $this->admin_model->get_grf_tsu();
                $gen = $this->admin_model->count_polls_tsu_bp()["polls_tsu"];
                $cg = $this->admin_model->count_graph_c($this->db->escape_str($this->input->post("tg")));
                if(empty($cg)){
                    $cg[0]["TIC"] = 0;
                }
            }else{
                $carr = array("IBT","IER","IGP","IMI","IMT","INT","IGE","IPO","ITI","GENERAL");
                $res = $this->admin_model->get_grf_ing();
                $gen = $this->admin_model->count_polls_ing_bp()["polls_ing"];
                $cg = $this->admin_model->count_graph_c($this->db->escape_str($this->input->post("tg")));
                if(empty($cg)){
                    $cg[0]["ITI"] = 0;
                }
            }
            
            
            // Agregar valores por default
            $arrv = array();
            $arrsat = array();
            $arrcp = array();
            $iter = 0;
            $na = 0;
            $p = 0;
            $r = 0;
            $b = 0;
            $mb = 0;
            $total = 0;
            $total2 = 0;
            
            for($i = 0; $i < count($res); $i++){
                
                if(array_key_exists('N/A', $res[$i]) == FALSE){
                    $res[$i]["N/A"] = "0";
                }
                if(array_key_exists('P', $res[$i]) == FALSE){
                    $res[$i]["P"] = "0";
                }
                if(array_key_exists('R', $res[$i]) == FALSE){
                    $res[$i]["R"] = "0";
                }
                if(array_key_exists('B', $res[$i]) == FALSE){
                    $res[$i]["B"] = "0";
                }
                if(array_key_exists('MB', $res[$i]) == FALSE){
                    $res[$i]["MB"] = "0";
                }
                $mb += intval($res[$i]["MB"]);
                $b += intval($res[$i]["B"]);
                $r += intval($res[$i]["R"]);
                $p += intval($res[$i]["P"]);
                $na += intval($res[$i]["N/A"]);
                if($i == 18 || $i == 37 || $i == 56 || $i == 75 || $i == 94 || $i == 113 || $i == 132 || $i == 151 || $i == 170|| $i == 189 || ($this->input->post("tg") == "TSU" && $i == 208)){
                    $arrv[$carr[$iter]]["MB"] = $mb;
                    $arrv[$carr[$iter]]["B"] = $b;
                    $arrv[$carr[$iter]]["R"] = $r;
                    $arrv[$carr[$iter]]["P"] = $p;
                    $arrv[$carr[$iter]]["N/A"] = $na;
                    $na = 0;
                    $p = 0;
                    $r = 0;
                    $b = 0;
                    $mb = 0;
                    $iter++;
                }
            }
            
            if($this->input->post("tg") == "TSU"){
                for($i = 0; $i < count($cg); $i++){
                    if(array_key_exists('AEP', $cg[$i]) == FALSE){
                        $cg[$i]["AEP"] = "0";
                    }
                    if(array_key_exists('ARH', $cg[$i]) == FALSE){
                        $cg[$i]["ARH"] = "0";
                    }
                    if(array_key_exists('DNM', $cg[$i]) == FALSE){
                        $cg[$i]["DNM"] = "0";
                    }
                    if(array_key_exists('ERC', $cg[$i]) == FALSE){
                        $cg[$i]["ERC"] = "0";
                    }
                    if(array_key_exists('MIN', $cg[$i]) == FALSE){
                        $cg[$i]["MIN"] = "0";
                    }
                    if(array_key_exists('MTA', $cg[$i]) == FALSE){
                        $cg[$i]["MTA"] = "0";
                    }
                    if(array_key_exists('NTA', $cg[$i]) == FALSE){
                        $cg[$i]["NTA"] = "0";
                    }
                    if(array_key_exists('PIM', $cg[$i]) == FALSE){
                        $cg[$i]["PIM"] = "0";
                    }
                    if(array_key_exists('QBT', $cg[$i]) == FALSE){
                        $cg[$i]["QBT"] = "0";
                    }
                    if(array_key_exists('TIC', $cg[$i]) == FALSE){
                        $cg[$i]["TIC"] = "0";
                    }
                    if(array_key_exists('GENERAL', $cg[$i]) == FALSE){
                        $cg[$i]["GENERAL"] = "0";
                    }
                }
            }else{
                for($i = 0; $i < count($cg); $i++){
                    if(array_key_exists('IBT', $cg[$i]) == FALSE){
                        $cg[$i]["IBT"] = "0";
                    }
                    if(array_key_exists('IER', $cg[$i]) == FALSE){
                        $cg[$i]["IER"] = "0";
                    }
                    if(array_key_exists('IGE', $cg[$i]) == FALSE){
                        $cg[$i]["IGE"] = "0";
                    }
                    if(array_key_exists('IGP', $cg[$i]) == FALSE){
                        $cg[$i]["IGP"] = "0";
                    }
                    if(array_key_exists('IMI', $cg[$i]) == FALSE){
                        $cg[$i]["IMI"] = "0";
                    }
                    if(array_key_exists('IMT', $cg[$i]) == FALSE){
                        $cg[$i]["IMT"] = "0";
                    }
                    if(array_key_exists('INT', $cg[$i]) == FALSE){
                        $cg[$i]["INT"] = "0";
                    }
                    if(array_key_exists('IPO', $cg[$i]) == FALSE){
                        $cg[$i]["IPO"] = "0";
                    }
                    if(array_key_exists('ITI', $cg[$i]) == FALSE){
                        $cg[$i]["ITI"] = "0";
                    }
                    if(array_key_exists('GENERAL', $cg[$i]) == FALSE){
                        $cg[$i]["GENERAL"] = "0";
                    }
                }
            }
            $cg = $cg[0];
            ksort($cg);
            
            foreach ($arrv as $j => $v) {
                $total = intval($arrv[$j]["MB"])*5 + intval($arrv[$j]["B"])*4 + intval($arrv[$j]["R"])*3 + intval($arrv[$j]["P"])*2 + intval($arrv[$j]["N/A"])*1;
                $total2 = intval($arrv[$j]["MB"]) + intval($arrv[$j]["B"]) + intval($arrv[$j]["R"]) + intval($arrv[$j]["P"]) + intval($arrv[$j]["N/A"]);
                if($j == "GENERAL"){
                   $arrsat[$j]["tp"] = intval($gen); 
                }else{
                    $arrsat[$j]["tp"] = intval($cg[$j]);
                }
                if($total == 0 || $total2 == 0){
                    $arrsat[$j]["gs"] = 0;
                }else{
                    $arrsat[$j]["gs"] = round((($total/$total2)*2), 3)*10;
                }
            }
            echo json_encode($arrsat);
		}
	}
}