<div class="row">
	<div class="col-md-12 text-center"><h4>CÉDULA DE EGRESO</h4></div>
</div>
<?php echo validation_errors(); ?>

<?php echo form_open('home/save_egresado', array('id' => 'frmEgre')); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<span class="negrita">Egresado: </span><br>
								<input type="radio" name="egresado" id="egresadoTSU" value="TSU" data-validation="required" data-sanitize="trim escape">
								<label for="egresadoTSU">TSU</label>
								<input type="radio" name="egresado" id="egresadoING" value="ING">
								<label for="egresadoING">ING</label>
							</div>
						</div>
						<div class="col-sm-8 col-md-8">
							<div class="form-group">
								<label for="obser">Observaciones:</label>
								<input type="text" name="obser" id="obser" placeholder="Observaciones" class="form-control" data-sanitize="trim escape">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="carrera">Carrera:</label>
								<select name="carrera" id="carrera" class="form-control" data-validation="required" data-sanitize="trim escape" min="0">
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="matric">Matrícula:</label>
								<input type="number" class="form-control" id="matric" name="matric" data-validation="number" data-validation-error-msg="El valor proporcionado no es una matrícula válida">
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="fecha">Fecha:</label>
								<input type="date" class="form-control" id="fecha" name="fecha" data-validation="date" data-sanitize="trim escape">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">PERSONALES</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="apat">Apellido Paterno:</label>
								<input type="text" id="apat" name="apat" placeholder="Apellido Paterno" class="form-control" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="amat">Apellido Materno:</label>
								<input type="text" id="amat" name="amat" placeholder="Apellido Materno" class="form-control" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="nombre">Nombre:</label>
								<input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<span class="negrita">Sexo: </span><br>
								<input type="radio" name="sexo" id="H" value="H" data-validation="required">
								<label for="H">Hombre</label>
								<input type="radio" name="sexo" id="M" value="M">
								<label for="M">Mujer</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="curp">CURP:</label>
								<input type="text" id="curp" name="curp" placeholder="CURP" class="form-control" data-validation="alphanumeric" maxlength="18">
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4">
							<div class="form-group">
								<label for="ecivil">Estado Civil:</label>
								<select name="ecivil" id="ecivil" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Soltero">Soltero</option>
									<option value="Casado">Casado</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Unión Libre">Unión Libre</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4">
							<div class="form-group">
								<label for="status">Status:</label>
								<select name="status" id="status" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Estudias">Estudias</option>
									<option value="Trabajas">Trabajas</option>
									<option value="Trabajas y Estudias">Trabajas y Estudias</option>
									<option value="No Trabajas">No Trabajas</option>
									<option value="Hogar">Hogar</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="calle">Calle y Número:</label>
								<input type="text" class="form-control" id="calle" name="calle" placeholder="Calle y Número" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="colonia">Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="municipio">Municipio:</label>
								<input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="estado">Estado</label>
								<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="cp">C.P.</label>
								<input type="number" class="form-control" id="cp" name="cp" data-validation="number">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="tcasa">Teléfono de casa:</label>
								<input type="text" class="form-control" id="tcasa" name="tcasa" placeholder="Teléfono de casa" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="trecados">Teléfono para recados y Nombre de la persona:</label>
								<input type="text" class="form-control" id="trecados" name="trecados" placeholder="Teléfono para recados y Nombre de la persona" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="fechanac">Fecha de nacimiento:</label>
								<input type="date" class="form-control" id="fechanac" name="fechanac" data-validation="date" data-sanitize="trim escape">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="mailperso">Correo electrónico personal:</label>
								<input type="text" class="form-control" id="mailperso" name="mailperso"  data-validation="email" placeholder="Correo electrónico personal">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="maillaboral">Correo electrónico laboral:</label>
								<input type="text" class="form-control" id="maillaboral" name="maillaboral"  data-validation="email" placeholder="Correo electrónico laboral">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="form-group">
								<label for="facebook">Facebook:</label>
								<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="form-group">
								<label for="twitter">Twitter:</label>
								<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter" data-sanitize="trim escape">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-xs-6 col-md-8">
									<span class="negrita">Estado titulación</span>
								</div>
								<div class="col-xs-3 col-md-2">
									<span class="negrita">TSU</span>
								</div>
								<div class="col-xs-3 col-md-2">
									<span class="negrita">ING</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-md-8">
									Cuentas ya con tu título y cédula profesional.
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitTSU" id="realizadoTSU" value="realizado" data-validation="required">
									</div>
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitING" id="realizadoING" value="realizado" data-validation="required">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-md-8">
									Estás en espera de recibir los documentos.
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitTSU" id="esperaTSU" value="espera">
									</div>
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitING" id="esperaING" value="espera">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-md-8">
									No has comenzado a tramitar tu título y cédula profesional.
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitTSU" id="noTSU" value="no">
									</div>
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitING" id="noING" value="no">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-center">REFERENCIAS:</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-sm-3 col-md-3">&nbsp;</div>
								<div class="col-sm-3 col-md-3"><span class="negrita">Nombre:</span></div>
								<div class="col-sm-3 col-md-3"><span class="negrita">Teléfono:</span></div>
								<div class="col-sm-3 col-md-3"><span class="negrita">Correo:</span></div>
							</div>
							<div class="row">
								<div class="col-sm-3 col-md-3"><span class="negrita">Personal:</span></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="npersonal" name="npersonal" placeholder="Nombre" data-sanitize="trim escape"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="tpersonal" name="tpersonal" placeholder="Teléfono" data-sanitize="trim escape"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="cpersonal" name="cpersonal" placeholder="Correo" data-validation-optional="true" data-validation="email"></div>
							</div>
							<div class="row">
								<div class="col-sm-3 col-md-3"><span class="negrita">Escolar:</span></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="nescolar" name="nescolar" placeholder="Nombre" data-sanitize="trim escape"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="tescolar" name="tescolar" placeholder="Teléfono" data-sanitize="trim escape"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="cescolar" name="cescolar" placeholder="Correo" data-validation-optional="true" data-validation="email"></div>
							</div>
							<div class="row">
								<div class="col-sm-3 col-md-3"><span class="negrita">Laboral:</span></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="nlaboral" name="nlaboral" placeholder="Nombre" data-sanitize="trim escape"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="tlaboral" name="tlaboral" placeholder="Teléfono" data-sanitize="trim escape"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="claboral" name="claboral" placeholder="Correo" data-validation-optional="true" data-validation="email"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">DATOS DEL EMPLEO ACTUAL O DEL ÚLTIMO EN EL QUE LABORASTE:</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="empresa">Empresa:</label>
								<input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nombre de la empresa" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dirempresa">Domicilio: (completo)</label>
								<input type="text" class="form-control" id="dirempresa" name="dirempresa" placeholder="Domicilio de la empresa" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="puesto">Puesto:</label>
								<input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="nomjefe">Nombre de tu jefe:</label>
								<input type="text" class="form-control" id="nomjefe" name="nomjefe" placeholder="Nombre de tu jefe" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="telempresa">Teléfono:</label>
								<input type="text" class="form-control" placeholder="Teléfono" id="telempresa" name="telempresa" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="tlaborando">Tiempo laborando:</label>
								<input type="text" class="form-control" id="tlaborando" name="tlaborando" placeholder="Tiempo laborando" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="explaboral">Experiencia laboral: (área de desarrollo y tiempo)</label>
								<input type="text" class="form-control" id="explaboral" name="explaboral" placeholder="Experiencia laboral" data-validation="required" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="sueldo">Sueldo mensual:</label>
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="sueldo" name="sueldo" data-validation="required" data-validation="number" min="0">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="nivocupacion">Nivel de ocupación:</label>
								<select name="nivocupacion" id="nivocupacion" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Operario">Operario</option>
									<option value="Técnico General">Técnico General</option>
									<option value="Técnico Especializado">Técnico Especializado</option>
									<option value="Administrativo">Administrativo</option>
									<option value="Supervisor">Supervisor</option>
									<option value="Gerente">Gerente</option>
									<option value="Director">Director</option>
									<option value="Auto empleo">Auto empleo</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
							<div class="form-group hidden" id="espotrono">
								<label for="otronc">Especifique</label>
								<input type="text" class="form-control" id="otronc" name="otronc" placeholder="Especifique" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="tiempoempleo">Tiempo en conseguir tu primer empleo</label>
								<select name="tiempoempleo" id="tiempoempleo" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Por Estadía">Por Estadía</option>
									<option value="3 meses">3 meses</option>
									<option value="6 meses">6 meses</option>
									<option value="1 año">1 año</option>
									<option value="Más de 1 año">Más de 1 año</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="loctrabajo">Localidad de Trabajo</label>
								<select name="loctrabajo" id="loctrabajo" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Zona Influencia UT">Zona Influencia UT</option>
									<option value="Interior del Estado">Interior del Estado</option>
									<option value="Fuera del Estado">Fuera del Estado</option>
									<option value="En el Extranjero">En el Extranjero</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="torganizacion">Tamaño de la Organización</label>
								<select name="torganizacion" id="torganizacion" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Micro">Micro</option>
									<option value="Paqueña">Paqueña</option>
									<option value="Mediana">Mediana</option>
									<option value="Macro">Macro</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="tipoorga">Tipo de Organización</label>
								<select name="tipoorga" id="tipoorga" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="Pública">Pública</option>
									<option value="Privada">Privada</option>
									<option value="Propia">Propia</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row text-center">
						<div class="col-sm-4 col-ms-4">
							<div class="form-group">
								<span class="negritas">¿Trabajas en algo relacionado a tu carrera?</span><br>
								<input type="radio" value="Sí" name="trel" id="trSI" data-validation="required">
								<label for="trSI">Sí</label>
								<input type="radio" value="No" name="trel" id="trNO">
								<label for="trNO">No</label>
							</div>
						</div>
						<div class="col-sm-4 col-ms-4">
							<div class="form-group">
								<span class="negritas">¿Fuiste colocado por la UT?</span><br>
								<input type="radio" value="Sí" name="fcol" id="fcSI" data-validation="required">
								<label for="fcSI">Sí</label>
								<input type="radio" value="No" name="fcol" id="fcNO">
								<label for="fcNO">No</label>
							</div>
						</div>
						<div class="col-sm-4 col-ms-4">
							<div class="form-group">
								<span class="negritas">¿Continuarás estudiando?</span><br>
								<input type="radio" value="Sí" name="cest" id="cestSI" data-validation="required">
								<label for="cestSI">Sí</label>
								<input type="radio" value="No" name="cest" id="cestNO">
								<label for="cestNO">No</label>
							</div>
							<div class="form-group hidden" id="contest">
								<label for="cestque">¿Qué?</label>
								<input type="text" class="form-control" id="cestque" name="cestque" placeholder="Especifique" data-sanitize="trim escape">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-center">
							<input type="submit" class="btn btn-success" value="Guardar">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php echo form_close(); ?><br>