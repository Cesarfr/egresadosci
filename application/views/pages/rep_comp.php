<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><div class="pull-left"><a href="<?php echo site_url('/'); ?>" class="btn btn-primary">Regresar a inicio</a></div><h4>Reposición de comprobante</h4></div>
			<div class="panel-body">
				<h4>Puedes obtener tu comprobante a partir de tu matrícula</h4>
				<p>Recuerda que este documento es importante para los trámites de titulación.</p>
				<?php echo validation_errors(); ?>
				<?php echo form_open('#', array('id' => 'frmComp', 'class' => 'form-inline')); ?>
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="form-group">
							<label for="matricula">Matrícula:</label>
							<input type="number" id="matricula" name="matricula" min="0" data-validation="number" data-validation-error-msg="El valor proporcionado no es una matrícula válida" class="form-control" placeholder="Matrícula" data-sanitize="trim escape">
						</div>
						<input type="submit" class="btn btn-success" id="btnGetComp" value="Buscar comprobante">
					</div>
				</div><br>
				<?php echo form_close(); ?>
				<div class="row">
					<div class="col-md-12">
						<div id="msg_comp"></div>
					</div>
				</div>
				<div class="text-center" id="comp"></div>
			</div>
		</div>
	</div>
</div><br>