<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading text-center"><div class="pull-left"><a href="<?php echo site_url('admin/panel'); ?>" class="btn btn-primary">Regresar al panel</a></div><h4>Gráfica de satisfacción</h4></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 text-center">
						<form action="#" id="frmGraf" class="form-inline">
							<div class="form-group">
								<strong>Tipo: </strong><br>
								<input type="radio" name="tg" id="tgTSU" value="TSU" data-validation="required" data-sanitize="trim escape">
								<label for="tgTSU">TSU</label>&nbsp;
								<input type="radio" name="tg" id="tgING" value="ING">
								<label for="tgING">ING</label>
							</div>
							&nbsp;<input type="submit" id="btnGen" value="Obtener tabla" class="btn btn-primary">
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th>CARRERA</th>
									<th>ENCUESTAS APLICADAS</th>
									<th>% SATISFACCIÓN DEL EGRESADO</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Administración Área Evaluación de Proyectos</td>
									<td>1</td>
									<td>1</td>
								</tr>
								<tr>
									<td>Administración Área Recursos Humanos</td>
									<td>2</td>
									<td>2</td>
								</tr>
								<tr>
									<td>Desarrollo de Negocios Área Mercadotecnia</td>
									<td>3</td>
									<td>3</td>
								</tr>
								<tr>
									<td>Energías Renovables Área Calidad y Ahorro de Energía</td>
									<td>4</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Mantenimiento Área Industrial</td>
									<td>5</td>
									<td>5</td>
								</tr>
								<tr>
									<td>Mecatrónica Área Automatización</td>
									<td>6</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Nanotecnología</td>
									<td>7</td>
									<td>7</td>
								</tr>
								<tr>
									<td>Procesos Industriales Área Manufactura</td>
									<td>8</td>
									<td>8</td>
								</tr>
								<tr>
									<td>Química Área Biotecnología</td>
									<td>9</td>
									<td>9</td>
								</tr>
								<tr>
									<td>Tecnologías de la Información y la Comunicación Área Sistemas Informáticos</td>
									<td>10</td>
									<td>10</td>
								</tr>
								<tr>
									<td>GENERAL</td>
									<td>43</td>
									<td>435</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th>CARRERA</th>
									<th>ENCUESTAS APLICADAS</th>
									<th>% SATISFACCIÓN DEL EGRESADO</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Biotecnología</td>
									<td>1</td>
									<td>1</td>
								</tr>
								<tr>
									<td>Energías Renovables</td>
									<td>2</td>
									<td>2</td>
								</tr>
								<tr>
									<td>Negocios y Gestión Empresarial</td>
									<td>3</td>
									<td>3</td>
								</tr>
								<tr>
									<td>Gestión de Proyectos</td>
									<td>4</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Mantenimiento Industrial</td>
									<td>5</td>
									<td>5</td>
								</tr>
								<tr>
									<td>Mecatrónica</td>
									<td>6</td>
									<td>6</td>
								</tr>
								<tr>
									<td>Nanotecnología</td>
									<td>7</td>
									<td>7</td>
								</tr>
								<tr>
									<td>Procesos y Operaciones Industriales</td>
									<td>8</td>
									<td>8</td>
								</tr>
								<tr>
									<td>Tecnologías de la Información y la Comunicación</td>
									<td>9</td>
									<td>9</td>
								</tr>
								<tr>
									<td>GENERAL</td>
									<td>43</td>
									<td>435</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><br>
<?php } ?>
