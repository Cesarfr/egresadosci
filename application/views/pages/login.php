<br>
<div class="row">
	<div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h4>Iniciar sesión</h4></div>
			<div class="panel-body">
				<?php
					if (isset($errmes)) {
						echo $errmes;
					}
				?>
				<?php echo validation_errors(); ?>
				<?php echo form_open('admin/signin', array('id' => 'frmLogin', 'class' => 'pd')); ?>
					<div class="form-group">
						<label for="usuario">Usuario:</label>
						<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" data-validation="required" data-sanitize="trim escape">
					</div>
					<div class="form-group">
						<label for="passwd">Contraseña:</label>
						<input type="password" id="passwd" name="passwd" class="form-control" placeholder="Contraseña" data-validation="required" data-sanitize="trim escape">
					</div><br>
					<div class="text-center"><input class="btn btn-primary" type="submit" value="Ingresar"></div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<br>