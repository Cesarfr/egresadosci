<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading text-center"><h4>Satisfacción de egresados</h4></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="panel panel-info">
						<div class="panel-heading text-center"><h5>Total de encuestas realizadas</h5></div>
							<div class="panel-body">
								<ul>
									<li><strong>Técnico Superior Universitario:</strong> <?php echo $polls_tsu;?></li>
									<li><strong>Ingeniería:</strong> <?php echo $polls_ing;?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-info">
						<div class="panel-heading text-center"><h5>Tabla satisafacción de egresados</h5></div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 text-center">
										<form action="#" id="frmTabla" class="form-inline">
										<div class="form-group">
											<strong>Tipo: </strong><br>
											<input type="radio" name="tipo" id="tipoTSU" value="TSU" data-validation="required" data-sanitize="trim escape">
											<label for="tipoTSU">TSU</label>&nbsp;
											<input type="radio" name="tipo" id="tipoING" value="ING">
											<label for="tipoING">ING</label>
										</div>
											<div class="form-group">
												<label for="carrera"></label>
												<select name="carrera" id="carrera" class="form-control"></select>
											</div>
											<input type="button" id="btnTabla" value="Obtener tabla" class="btn btn-primary">
										</form>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div id="tabla"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><br>
<?php } ?>
