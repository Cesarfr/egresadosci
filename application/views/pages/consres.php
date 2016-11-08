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
														Total de respuestas de los alumnos muy satisfechos<hr>Total de las respuestas de las preguntas de las preguntas aplicadas
													</div>
													<div class="col-xs-4 col-md-4">
														<p>* 100 = MB</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														o sea, 
													</div>
													<div class="col-xs-6 col-md-6">
														2,090<hr>9878
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>* 100 =</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>8798</p>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos satisfechos<hr>Total de las respuestas de las preguntas de las preguntas aplicadas
													</div>
													<div class="col-xs-4 col-md-4">
														<p>* 100 = B</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														o sea, 
													</div>
													<div class="col-xs-6 col-md-6">
														2,090<hr>9878
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>* 100 =</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>8798</p>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos regularmente satisfechos<hr>Total de las respuestas de las preguntas de las preguntas aplicadas
													</div>
													<div class="col-xs-4 col-md-4">
														<p>* 100 = R</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														o sea, 
													</div>
													<div class="col-xs-6 col-md-6">
														2,090<hr>9878
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>* 100 =</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>8798</p>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos poco satisfechos<hr>Total de las respuestas de las preguntas de las preguntas aplicadas
													</div>
													<div class="col-xs-4 col-md-4">
														<p>* 100 = P</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														o sea, 
													</div>
													<div class="col-xs-6 col-md-6">
														2,090<hr>9878
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>* 100 =</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>8798</p>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
														Total de respuestas de los alumnos no aplica<hr>Total de las respuestas de las preguntas de las preguntas aplicadas
													</div>
													<div class="col-xs-4 col-md-4">
														<p>* 100 = N/A</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														o sea, 
													</div>
													<div class="col-xs-6 col-md-6">
														2,090<hr>9878
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>* 100 =</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>8798</p>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row text-center">
											<div class="col-md-12">Nota: La suma de todos los resultados relativos siempre deberá ser el 100%</div>
										</div><br>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-12 col-md-12">
														Aplicando prorrateo al número de encuestas aplicadas tenemos que:
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-12 col-md-12">
														489
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>75.16</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>362</p>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row text-center">
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-8 col-md-8">
													<p>Fórmula del indicador:</p>br
														Total de egresados muy satisfechos y satisfechos<hr>Total de egresados de TSU
													</div>
													<div class="col-xs-4 col-md-4">
														<p>* 100 = TES</p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														o sea, 
													</div>
													<div class="col-xs-6 col-md-6">
														372<hr>489
													</div>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="row">
													<div class="col-xs-6 col-md-6">
														<p>* 100 =</p>
													</div>
													<div class="col-xs-6 col-md-6">
														<p>76.15</p>
													</div>
												</div>
											</div>
										</div><br><br>
										<div class="row text-center">
											<div class="col-xs-12 col-md-12">
												<table class="table table-bordered" width='100%'>
												<caption class="text-center">CUADRO NO. 4.2 <br>"TABLA DE EQUIVALENCIA EN DIFERENTES ESCALAS"</caption>
													<thead>
														<tr>
															<th rowspan="2">NO.</th>
															<th colspan="2">ESCALA ORDINAL</th>
															<th>ESCALA DISCRETA O DISCONTINUA</th>
															<th>ESCALA CONTINUA</th>
														</tr>
														<tr>
															<th>CLAVE</th>
															<th>DESCRIPCIÓN</th>
															<th>VALOR</th>
															<th>VALOR</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>MS</td>
															<td>MUY SATISFECHO</td>
															<td>5</td>
															<td>9.0 - 10.0</td>
														</tr>
														<tr>
															<td>2</td>
															<td>S</td>
															<td>SATISFECHO</td>
															<td>4</td>
															<td>7.5 - 8.9</td>
														</tr>
														<tr>
															<td>3</td>
															<td>RS</td>
															<td>REGULARMENTE SATISFECHO</td>
															<td>3</td>
															<td>6.0 - 7.4</td>
														</tr>
														<tr>
															<td>4</td>
															<td>PS</td>
															<td>POCO SATISFECHO</td>
															<td>2</td>
															<td>4.0 - 5.9</td>
														</tr>
														<tr>
															<td>5</td>
															<td>NS</td>
															<td>NO SATISFECHO</td>
															<td>1</td>
															<td>0 - 3.9</td>
														</tr>
														<tr>
															<td>6</td>
															<td>NA</td>
															<td>NO APLICA</td>
															<td>0</td>
															<td>0</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div><br><br>
										<div class="row text-center">
											<div class="col-xs-12 col-md-12">
												<table class="table table-bordered" width='100%'>
												<caption class="text-center">GRADO DE SATISFACCIÓN GENERAL</caption>
													<thead>
														<tr>
															<th>MS</th>
															<th>S</th>
															<th>RS</th>
															<th>PS</th>
															<th>NS</th>
															<th></th>
															<th>TOTAL</th>
															<th>SATISFACCIÓN</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>dsf</td>
															<td class="borinf">dsf</td>
															<td class="borinf">dsf</td>
															<td class="borinf">dsf</td>
															<td class="borinf">dsf</td>
															<td rowspan="2">=</td>
															<td class="borinf">dsf</td>
															<td rowspan="2"></td>
														</tr>
														<tr>
															<td colspan="5">987</td>
															<td>98798</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div><br>
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
