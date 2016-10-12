<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/ut.ico');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
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
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo site_url(''); ?>">Inicio</a></li>
                    <li><a href="#consultar">Consultar</a></li>
                    <?php if(!isset($_SESSION["id_u"])){ ?>
                    <li><a href="<?php echo site_url('admin/login'); ?>">Login</a></li>
                    <?php } ?>
                </ul>
                <?php if(isset($_SESSION["id_u"])){ ?>
                <ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text">Hola, <?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apat")." ".$this->session->userdata("amat");?></p></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo site_url('admin/logout'); ?>">Cerrar sesión</a></li>
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