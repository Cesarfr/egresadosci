<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><div class="pull-left"><a href="<?php echo site_url('admin/panel'); ?>" class="btn btn-primary">Regresar al panel</a></div><h4>Satisfacción de egresados</h4></div>
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
										<strong>Tipo de resultados:</strong><br>
										<input type="radio" id="general" name="ttb" value="gen">
										<label for="general">General</label>&nbsp;
										<input type="radio" id="especifico" name="ttb" value="esp">
										<label for="especifico">Específico</label><br>
										<div id="fg" class="hidden">
											<form action="#" id="frmGen" class="form-inline">
												<div class="form-group">
													<strong>Tipo: </strong><br>
													<input type="radio" name="tg" id="tgTSU" value="TSU" data-validation="required" data-sanitize="trim escape">
													<label for="tgTSU">TSU</label>&nbsp;
													<input type="radio" name="tg" id="tgING" value="ING">
													<label for="tgING">ING</label>
												</div>
												&nbsp;<input type="button" id="btnGen" value="Obtener tabla" class="btn btn-primary">
											</form>
										</div>
										<div id="fe" class="hidden">
											<form action="#" id="frmTabla" class="form-inline">
												<div class="form-group">
													<strong>Tipo: </strong><br>
													<input type="radio" name="tipo" id="tipoTSU" value="TSU" data-validation="required" data-sanitize="trim escape">
													<label for="tipoTSU">TSU</label>&nbsp;
													<input type="radio" name="tipo" id="tipoING" value="ING">
													<label for="tipoING">ING</label>
												</div>&nbsp;
												<div class="form-group">
													<label for="carrera"></label>
													<select name="carrera" id="carrera" class="form-control"></select>
												</div>&nbsp;
												<input type="button" id="btnTabla" value="Obtener tabla" class="btn btn-primary">
											</form>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12">
										<div id="tabla"></div>
									</div>
									<div class="col-md-12">
										<h4>Ahora para obtener la distribución porcentual del comportamiento de las respuestas tenemos:</h4>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos muy satisfechos<hr>tt
													</div>
													<div class="col-xs-4 col-md-4">
														<p>*100=MB</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row text-center">
											<div class="col-md-12"><h4>Nota: La suma de todos los resultados relativos siempre deberá ser el 100%</h4></div>
										</div>
										<div id="tabla2"></div>
									</div>
									<div class="col-md-12">
										<div id="grafica"></div>
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
