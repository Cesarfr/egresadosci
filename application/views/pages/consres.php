<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><div class="hidden-print pull-left"><a href="<?php echo site_url('admin/panel'); ?>" class="btn btn-primary">Regresar al panel</a></div><h4>Satisfacción de egresados</h4></div>
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
                                                &nbsp;<div class="form-group">
													<label for="periodo">Periodo:</label>
                                                    <select name="periodo" id="periodo" class="form-control" data-validation="required" data-sanitize="trim escape">
													    <option value="ENERO-ABRIL">ENERO-ABRIL</option>
													    <option value="MAYO-AGOSTO">MAYO-AGOSTO</option>
													    <option value="SEPTIEMBRE-DICIEMBRE">SEPTIEMBRE-DICIEMBRE</option>
													</select>
												</div>
                                                &nbsp;<div class="form-group">
                                                    <label for="anio">AÑO:</label>
                                                    <select name="anio" id="anio" class="form-control" data-validation="required" data-sanitize="trim escape">
                                                        <?php
                                                            $anio = intval(date("Y"));
                                                            for($i = $anio; $i>1990; $i--){
                                                                echo "<option value='".$i."'>".$i."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
												&nbsp;<input type="submit" id="btnGen" value="Obtener tabla" class="hidden-print btn btn-primary">
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
													<select name="carrera" id="carrera" class="hidden-print form-control" data-validation="required" data-sanitize="trim escape"></select>
												</div>&nbsp;
                                                <div class="form-group">
													<label for="periodo">Periodo:</label>
                                                    <select name="periodo" id="periodo" class="form-control" data-validation="required" data-sanitize="trim escape">
													    <option value="ENERO-ABRIL">ENERO-ABRIL</option>
													    <option value="MAYO-AGOSTO">MAYO-AGOSTO</option>
													    <option value="SEPTIEMBRE-DICIEMBRE">SEPTIEMBRE-DICIEMBRE</option>
													</select>
												</div>
                                                &nbsp;<div class="form-group">
                                                    <label for="anio">AÑO:</label>
                                                    <select name="anio" id="anio" class="form-control" data-validation="required" data-sanitize="trim escape">
                                                        <?php
                                                            $anio = intval(date("Y"));
                                                            for($i = $anio; $i>1990; $i--){
                                                                echo "<option value='".$i."'>".$i."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
												<input type="submit" id="btnTabla" value="Obtener tabla" class="hidden-print btn btn-primary">
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
										<div id="tabla2"></div>
									</div>
								</div><br>
								<div class="row hidden-print">
									<div class="col-md-12"><div class="text-center"><button class="btn btn-primary" onclick="window.print();">Imprimir</button></div></div>
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
