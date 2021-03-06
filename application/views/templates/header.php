<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/ut.ico');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<?php if(isset($_SESSION["id_u"])){ ?>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/morris.css');?>">
	<?php } ?>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css');?>">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(''); ?>">Egresados</a>
            </div>
			  <?php
			  $ln1 = "";
			  $ln2 = "";
			  $ln3 = "";
			  $ln4 = "";
			  $ln5 = "";
			  $lnd = "";
			  switch($this->uri->segment(2)){
				  case "rep_comp": $ln1 = "class='active'"; break;
				  case "login": $ln2 = "class='active'"; break;
				  case "consultar": $ln3 = "class='active'"; break;
				  case "graficas": $ln4 = "class='active'"; break;
				  case "panel": $ln5 = "class='active'"; break;
				  default: $lnd = "class='active'"; break;
			  }
			  ?>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li <?php echo $lnd; ?>><a href="<?php echo site_url(''); ?>">Inicio</a></li>
                    <li <?php echo $ln1; ?>><a href="<?php echo site_url('home/rep_comp');?>">Comprobante</a></li>
                    <?php if(!isset($_SESSION["id_u"])){ ?>
                    <li <?php echo $ln2; ?>><a href="<?php echo site_url('admin/login'); ?>">Login</a></li>
                    <?php }else{ ?>
                    <li <?php echo $ln3; ?>><a href="<?php echo site_url('admin/consultar'); ?>">Consultar</a></li>
                    <li <?php echo $ln4; ?>><a href="<?php echo site_url('admin/graficas'); ?>">Gráficas</a></li>
                    <li <?php echo $ln5; ?>><a href="<?php echo site_url('admin/panel'); ?>">Panel</a></li>
                    <?php } ?>
                </ul>
                <?php if(isset($_SESSION["id_u"])){ ?>
                <ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text">Hola, <?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apat")." ".$this->session->userdata("amat");?></p></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Opciones <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo site_url('admin/logout'); ?>"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
           		<?php }?>
            </div>
          </div>
        </nav>
      </div>
    </div>
    
    <div class="container">
        <!-- BODY -->
		<div class="row">
			<div class="col-xs-6 col-md-6"><img src="<?php echo base_url('assets/img/Logo_UTTEC.png');?>" alt="LOGO_UTTEC" class="logo"></div>
			<div class="col-xs-6 col-md-6 text-right"><p>SECRETARÍA DE VINCULACIÓN</p><p>DEPARTAMENTO DE SEGUIMIENTO A EGRESADOS</p></div>
		</div>
		
		<!-- Content -->
		<div id="content">