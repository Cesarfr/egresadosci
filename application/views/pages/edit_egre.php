<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<?php echo validation_errors(); ?>

<?php echo form_open('admin/edit_frm_egre', array('id' => 'frmEditEgre')); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-1 col-md-1">
							<div class="form-group">
								<span class="negrita">Folio: </span><br>
								<input type="input" value="<?php echo $datos["id"];?>" class="form-control" disabled>
								<input type="hidden" name="id" id="id" value="<?php echo $datos["id"];?>" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<span class="negrita">Egresado: </span><br>
								<?php if($datos["egresado"] == "ING"){?>
								<input type="radio" name="egresado" id="egresadoTSU" value="TSU" data-validation="required" data-sanitize="trim escape" disabled>
								<label for="egresadoTSU">TSU</label>
								<input type="radio" name="egresado" id="egresadoING" value="ING" checked="checked" disabled>
								<label for="egresadoING">ING</label>
								<input type="hidden" name="egresado" id="egresado" value="<?php echo $datos["egresado"];?>" data-sanitize="trim escape">
								<?php }else{?>
								<input type="radio" name="egresado" id="egresadoTSU" value="TSU" data-validation="required" data-sanitize="trim escape" checked="checked" disabled>
								<label for="egresadoTSU">TSU</label>
								<input type="radio" name="egresado" id="egresadoING" value="ING" disabled>
								<label for="egresadoING">ING</label>
								<input type="hidden" name="egresado" id="egresado" value="<?php echo $datos["egresado"];?>" data-sanitize="trim escape">
								<?php }?>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="obser">Observaciones:</label>
								<input type="text" name="obser" id="obser" placeholder="Observaciones" class="form-control" data-sanitize="trim escape" value="<?php echo $datos["obser"];?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="carrera">Carrera:</label>
								<select name="carrera" id="carrera" class="form-control" data-validation="required" data-sanitize="trim escape" disabled>
								<?php echo "<option value='".$datos["carrera"]."'>".$datos["descarr"]."</option>"; ?>
								</select>
								<input type="hidden" name="carrera" id="carrera" value="<?php echo $datos["carrera"];?>" data-sanitize="trim escape">
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="matric">Matrícula:</label>
								<input type="number" class="form-control" id="matric" name="matric" data-validation="number" data-validation-error-msg="El valor proporcionado no es una matrícula válida" min="0" value="<?php echo $datos["matricula"];?>" readonly>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="fecha">Fecha:</label>
								<input type="date" class="form-control" id="fecha" name="fecha" data-validation="date" data-sanitize="trim escape" value="<?php echo $datos["fecha"];?>" readonly>
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
								<input type="text" id="apat" name="apat" placeholder="Apellido Paterno" class="form-control" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["apat"];?>" readonly>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="amat">Apellido Materno:</label>
								<input type="text" id="amat" name="amat" placeholder="Apellido Materno" class="form-control" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["amat"];?>" readonly>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label for="nombre">Nombre:</label>
								<input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["nombre"];?>" readonly>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<?php if($datos["sexo"]=="H"){?>
								<span class="negrita">Sexo: </span><br>
								<input type="radio" name="sexo" id="H" value="H" data-validation="required" checked="checked" readonly>
								<label for="H">Hombre</label>
								<input type="radio" name="sexo" id="M" value="M" readonly>
								<label for="M">Mujer</label>
								<?php }else{ ?>
								<span class="negrita">Sexo: </span><br>
								<input type="radio" name="sexo" id="H" value="H" data-validation="required" readonly>
								<label for="H">Hombre</label>
								<input type="radio" name="sexo" id="M" value="M" checked="checked" readonly>
								<label for="M">Mujer</label>
								<?php }?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="curp">CURP:</label>
								<input type="text" id="curp" name="curp" placeholder="CURP" class="form-control" data-validation="alphanumeric" maxlength="18" value="<?php echo $datos["curp"];?>" readonly>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4">
							<div class="form-group">
								<label for="ecivil">Estado Civil:</label>
								<select name="ecivil" id="ecivil" class="form-control" data-validation="required" data-sanitize="trim escape">
									<?php switch($datos["ecivil"]){
									 		case "SOLTERO": echo "<option value='SOLTERO' selected>Soltero</option>
									<option value='CASADO'>Casado</option>
									<option value='DIVORCIADO'>Divorciado</option>
									<option value='UNIÓN LIBRE'>Unión Libre</option>
									<option value='OTRO'>Otro</option>"; break;
											case "CASADO": echo "<option value='SOLTERO'>SOLTERO</option>
									<option value='CASADO' selected>CASADO</option>
									<option value='DIVORCIADO'>DIVORCIADO</option>
									<option value='UNIÓN LIBRE'>UNIÓN LIBRE</option>
									<option value='OTRO'>OTRO</option>"; break;
											case "DIVORCIADO": echo "<option value='SOLTERO'>SOLTERO</option>
									<option value='CASADO'>CASADO</option>
									<option value='DIVORCIADO' selected>DIVORCIADO</option>
									<option value='UNIÓN LIBRE'>UNIÓN LIBRE</option>
									<option value='OTRO'>Otro</option>"; break;
											case "UNIÓN LIBRE": echo "<option value='SOLTERO'>SOLTERO</option>
									<option value='CASADO'>CASADO</option>
									<option value='DIVORCIADO'>DIVORCIADO</option>
									<option value='UNIÓN LIBRE' selected>UNIÓN LIBRE</option>
									<option value='OTRO'>OTRO</option>"; break;
											case "OTRO": echo "<option value='SOLTERO'>SOLTERO</option>
									<option value='CASADO'>CASADO</option>
									<option value='DIVORCIADO'>DIVORCIADO</option>
									<option value='UNIÓN LIBRE'>UNIÓN LIBRE</option>
									<option value='OTRO' selected>OTRO</option>"; break;
									}?>
								</select>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4">
							<div class="form-group">
								<label for="status">Status:</label>
								<select name="status" id="status" class="form-control" data-validation="required" data-sanitize="trim escape">
									<?php switch($datos["status_e"]){ 
										case "ESTUDIAS": echo "<option value='ESTUDIAS' selected>ESTUDIAS</option>
									<option value='TRABAJAS'>TRABAJAS</option>
									<option value='TRABAJAS Y ESTUDIAS'>TRABAJAS Y ESTUDIAS</option>
									<option value='NO TRABAJAS'>NO TRABAJAS</option>
									<option value='HOGAR'>HOGAR</option>"; break;
										case "TRABAJAS": echo "<option value='ESTUDIAS'>ESTUDIAS</option>
									<option value='TRABAJAS' selected>TRABAJAS</option>
									<option value='TRABAJAS Y ESTUDIAS'>TRABAJAS Y ESTUDIAS</option>
									<option value='NO TRABAJAS'>NO TRABAJAS</option>
									<option value='HOGAR'>HOGAR</option>"; break;
										case "TRABAJAS Y ESTUDIAS": echo "<option value='ESTUDIAS'>ESTUDIAS</option>
									<option value='TRABAJAS'>TRABAJAS</option>
									<option value='TRABAJAS Y ESTUDIAS' selected>TRABAJAS Y ESTUDIAS</option>
									<option value='NO TRABAJAS'>NO TRABAJAS</option>
									<option value='HOGAR'>HOGAR</option>"; break;
										case "NO TRABAJAS": echo "<option value='ESTUDIAS'>ESTUDIAS</option>
									<option value='TRABAJAS'>TRABAJAS</option>
									<option value='TRABAJAS Y ESTUDIAS'>TRABAJAS Y ESTUDIAS</option>
									<option value='NO TRABAJAS' selected>NO TRABAJAS</option>
									<option value='HOGAR'>HOGAR</option>"; break;
										case "HOGAR": echo "<option value='ESTUDIAS'>ESTUDIAS</option>
									<option value='TRABAJAS'>TRABAJAS</option>
									<option value='TRABAJAS Y ESTUDIAS'>TRABAJAS Y ESTUDIAS</option>
									<option value='NO TRABAJAS'>NO TRABAJAS</option>
									<option value='HOGAR' selected>HOGAR</option>"; break;
									}?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="calle">Calle y Número:</label>
								<input type="text" class="form-control" id="calle" name="calle" placeholder="Calle y Número" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["calle"];?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="form-group">
								<label for="colonia">Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["colonia"];?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="municipio">Municipio:</label>
								<input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["municipio"];?>">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="estado">Estado</label>
								<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["estado"];?>">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="cp">C.P.</label>
								<input type="number" class="form-control" id="cp" name="cp" data-validation="number" value="<?php echo $datos["cp"];?>" min=0>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="tcasa">Teléfono de casa:</label>
								<input type="text" class="form-control" id="tcasa" name="tcasa" placeholder="Teléfono de casa" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["tcasa"];?>">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="trecados">Teléfono para recados y Nombre de la persona:</label>
								<input type="text" class="form-control" id="trecados" name="trecados" placeholder="Teléfono para recados y Nombre de la persona" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["trecados"];?>">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="fechanac">Fecha de nacimiento:</label>
								<input type="date" class="form-control" id="fechanac" name="fechanac" data-validation="date" data-sanitize="trim escape" value="<?php echo $datos["fechanac"];?>" min="1950-01-01" max="1999-12-31">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="mailperso">Correo electrónico personal:</label>
								<input type="text" class="form-control" id="mailperso" name="mailperso"  data-validation="email" placeholder="Correo electrónico personal" value="<?php echo $datos["mailperso"];?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label for="maillaboral">Correo electrónico laboral:</label>
								<input type="text" class="form-control" id="maillaboral" name="maillaboral"  data-validation="email" placeholder="Correo electrónico laboral" value="<?php echo $datos["maillaboral"];?>">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="form-group">
								<label for="facebook">Facebook:</label>
								<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" data-sanitize="trim escape" value="<?php echo $datos["facebook"];?>">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="form-group">
								<label for="twitter">Twitter:</label>
								<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter" data-sanitize="trim escape" value="<?php echo $datos["twitter"];?>">
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
								<?php 
	  								$t1="";
	  								$t2="";
	  								$t3="";
	  								$i1="";
	  								$i2="";
	  								$i3="";
	  								if($datos["etitTSU"] != NULL){ 
										$tsureq = "";
										$ingreq = "disabled";
										switch($datos["etitTSU"]){
											case "REALIZADO": $t1="checked"; $t2=""; $t3=""; break;
											case "ESPERA": $t1=""; $t2="checked"; $t3=""; break;
											case "NO": $t1=""; $t2=""; $t3="checked"; break;
										}
									} else {
										$tsureq = "disabled";
										$ingreq = "";
										switch($datos["etitING"]){
											case "REALIZADO": $i1="checked"; $i2=""; $i3=""; break;
											case "ESPERA": $i1=""; $i2="checked"; $i3=""; break;
											case "NO": $i1=""; $i2=""; $i3="checked"; break;
										}
									}
								?>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitTSU" id="realizadoTSU" value="REALIZADO" data-validation="required" <?php echo $tsureq." ".$t1;?> >
									</div>
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitING" id="realizadoING" value="REALIZADO" data-validation="required" <?php echo $ingreq." ".$i1;?> >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-md-8">
									Estás en espera de recibir los documentos.
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitTSU" id="esperaTSU" value="ESPERA" <?php echo $tsureq." ".$t2;?> >
									</div>
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitING" id="esperaING" value="ESPERA" <?php echo $ingreq." ".$i2;?> >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-md-8">
									No has comenzado a tramitar tu título y cédula profesional.
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitTSU" id="noTSU" value="NO" <?php echo $tsureq." ".$t3;?> >
									</div>
								</div>
								<div class="col-xs-3 col-md-2">
									<div class="form-group">
										<input type="radio" name="etitING" id="noING" value="NO" <?php echo $ingreq." ".$i3;?> >
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
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="npersonal" name="npersonal" placeholder="Nombre" data-sanitize="trim escape" value="<?php echo $datos["npersonal"];?>"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="tpersonal" name="tpersonal" placeholder="Teléfono" data-sanitize="trim escape" value="<?php echo $datos["tpersonal"];?>"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="cpersonal" name="cpersonal" placeholder="Correo" data-validation-optional="true" data-validation="email" value="<?php echo $datos["cpersonal"];?>"></div>
							</div>
							<div class="row">
								<div class="col-sm-3 col-md-3"><span class="negrita">Escolar:</span></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="nescolar" name="nescolar" placeholder="Nombre" data-sanitize="trim escape" value="<?php echo $datos["nescolar"];?>"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="tescolar" name="tescolar" placeholder="Teléfono" data-sanitize="trim escape" value="<?php echo $datos["tescolar"];?>"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="cescolar" name="cescolar" placeholder="Correo" data-validation-optional="true" data-validation="email" value="<?php echo $datos["cescolar"];?>"></div>
							</div>
							<div class="row">
								<div class="col-sm-3 col-md-3"><span class="negrita">Laboral:</span></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="nlaboral" name="nlaboral" placeholder="Nombre" data-sanitize="trim escape" value="<?php echo $datos["nlaboral"];?>"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="tlaboral" name="tlaboral" placeholder="Teléfono" data-sanitize="trim escape" value="<?php echo $datos["tlaboral"];?>"></div>
								<div class="col-sm-3 col-md-3"><input type="text" class="form-control" id="claboral" name="claboral" placeholder="Correo" data-validation-optional="true" data-validation="email" value="<?php echo $datos["claboral"];?>"></div>
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
								<input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nombre de la empresa" data-validation="required" data-sanitize="trim upper escape" value="<?php echo $datos["empresa"];?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dirempresa">Domicilio: (completo)</label>
								<input type="text" class="form-control" id="dirempresa" name="dirempresa" placeholder="Domicilio de la empresa" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["dirempresa"];?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="puesto">Puesto:</label>
								<input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["puesto"];?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="nomjefe">Nombre de tu jefe:</label>
								<input type="text" class="form-control" id="nomjefe" name="nomjefe" placeholder="Nombre de tu jefe" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["nomjefe"];?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="telempresa">Teléfono:</label>
								<input type="text" class="form-control" placeholder="Teléfono" id="telempresa" name="telempresa" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["telempresa"];?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="tlaborando">Tiempo laborando:</label>
								<input type="text" class="form-control" id="tlaborando" name="tlaborando" placeholder="Tiempo laborando" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["tlaborando"];?>">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="explaboral">Experiencia laboral: (área de desarrollo y tiempo)</label>
								<input type="text" class="form-control" id="explaboral" name="explaboral" placeholder="Experiencia laboral" data-validation="required" data-sanitize="trim escape" value="<?php echo $datos["explaboral"];?>">
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="sueldo">Sueldo mensual:</label>
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="sueldo" name="sueldo" data-validation="required" data-validation="number" min="0" value="<?php echo $datos["sueldo"];?>">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="nivocupacion">Nivel de ocupación:</label>
								<?php
									$noc1="";
									$noc2="";
									$noc3="";
									$noc4="";
									$noc5="";
									$noc6="";
									$noc7="";
									$noc8="";
									$noc9="";
									$hid="";
									switch($datos["nivocupacion"]){
										case "OPERARIO": $noc1="selected"; $noc2=""; $noc3=""; $noc4=""; $noc5=""; $noc6=""; $noc7=""; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "TÉCNICO GENERAL": $noc1=""; $noc2="selected"; $noc3=""; $noc4="";	$noc5=""; $noc6=""; $noc7=""; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "TÉCNICO ESPECIALIZADO": $noc1=""; $noc2=""; $noc3="selected"; $noc4=""; $noc5=""; $noc6=""; $noc7=""; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "ADMINISTRATIVO": $noc1=""; $noc2=""; $noc3=""; $noc4="selected";	$noc5=""; $noc6=""; $noc7=""; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "SUPERVISOR": $noc1=""; $noc2=""; $noc3=""; $noc4=""; $noc5="selected"; $noc6=""; $noc7=""; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "GERENnoc": $noc1=""; $noc2=""; $noc3=""; $noc4=""; $noc5=""; $noc6="selected"; $noc7=""; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "DIRECTOR": $noc1=""; $noc2=""; $noc3=""; $noc4=""; $noc5=""; $noc6=""; $noc7="selected"; $noc8=""; $noc9=""; $hid="hidden"; break;
										case "AUTO EMPLEO": $noc1=""; $noc2=""; $noc3=""; $noc4="";	$noc5=""; $noc6=""; $noc7=""; $noc8="selected"; $noc9=""; $hid="hidden"; break;
										case "OTRO": $noc1=""; $noc2=""; $noc3=""; $noc4=""; $noc5=""; $noc6=""; $noc7=""; $noc8=""; $noc9="selected"; $hid=""; break;
									}
								?>
								<select name="nivocupacion" id="nivocupacion" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="OPERARIO" <?php echo $noc1;?> >OPERARIO</option>
									<option value="TÉCNICO GENERAL" <?php echo $noc2;?> >TÉCNICO GENERAL</option>
									<option value="TÉCNICO ESPECIALIZADO" <?php echo $noc3;?> >TÉCNICO ESPECIALIZADO</option>
									<option value="ADMINISTRATIVO" <?php echo $noc4;?> >ADMINISTRATIVO</option>
									<option value="SUPERVISOR" <?php echo $noc5;?> >SUPERVISOR</option>
									<option value="GERENTE" <?php echo $noc6;?> >GERENTE</option>
									<option value="DIRECTOR" <?php echo $noc7;?> >DIRECTOR</option>
									<option value="AUTO EMPLEO" <?php echo $noc8;?> >AUTO EMPLEO</option>
									<option value="OTRO" <?php echo $noc9;?> >OTRO</option>
								</select>
							</div>
							<div class="form-group  <?php echo $hid;?> " id="espotrono">
								<label for="otronc">Especifique</label>
								<input type="text" class="form-control" id="otronc" name="otronc" placeholder="Especifique" data-sanitize="trim escape" value="<?php echo $datos["otronc"];?>">
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="tiempoempleo">Tiempo en conseguir tu primer empleo</label>
								<?php
	  								$te1="";
	  								$te2="";
	  								$te3="";
	  								$te4="";
	  								$te5="";
	  								switch($datos["tiempoempleo"]){
										case "POR ESTADÍA": $te1="selected"; $te2=""; $te3=""; $te4="";	$te5=""; break;
										case "3 MESES": $te1=""; $te2="selected"; $te3=""; $te4="";	$te5=""; break;
										case "6 MESES": $te1=""; $te2=""; $te3="selected"; $te4="";	$te5=""; break;
										case "1 AÑO": $te1=""; $te2=""; $te3=""; $te4="selected"; $te5=""; break;
										case "MÁS DE 1 AÑO": $te1=""; $te2=""; $te3=""; $te4=""; $te5="selected"; break;
									}
								?>
								<select name="tiempoempleo" id="tiempoempleo" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="POR ESTADÍA" <?php echo $te1; ?> >POR ESTADÍA</option>
									<option value="3 MESES" <?php echo $te2; ?> >3 MESES</option>
									<option value="6 MESES" <?php echo $te3; ?> >6 MESES</option>
									<option value="1 AÑO" <?php echo $te4; ?> >1 AÑO</option>
									<option value="MÁS DE 1 AÑO" <?php echo $te5; ?> >MÁS DE 1 AÑO</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="loctrabajo">Localidad de Trabajo</label>
								<?php
	  								$lt1="";
	  								$lt2="";
	  								$lt3="";
	  								$lt4="";
	  								switch($datos["loctrabajo"]){
										case "ZONA INFLUENCIA UT": $lt1="selected"; $lt2=""; $lt3=""; $lt4=""; break;
										case "INTERIOR DEL ESTADO": $lt1=""; $lt2="selected"; $lt3=""; $lt4="";	break;
										case "FUERA DEL ESTADO": $lt1=""; $lt2=""; $lt3="selected"; $lt4="";	break;
										case "EN EL EXTRANJERO": $lt1=""; $lt2=""; $lt3=""; $lt4="selected"; break;
									}
								?>
								<select name="loctrabajo" id="loctrabajo" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="ZONA INFLUENCIA UT" <?php echo $lt1; ?> >ZONA INFLUENCIA UT</option>
									<option value="INTERIOR DEL ESTADO" <?php echo $lt2; ?> >INTERIOR DEL ESTADO</option>
									<option value="FUERA DEL ESTADO" <?php echo $lt3; ?> >FUERA DEL ESTADO</option>
									<option value="EN EL EXTRANJERO" <?php echo $lt4; ?> >EN EL EXTRANJERO</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="torganizacion">Tamaño de la Organización</label>
								<?php
	  								$to1="";
	  								$to2="";
	  								$to3="";
	  								$to4="";
	  								switch($datos["torganizacion"]){
										case "MICRO": $to1="selected"; $to2=""; $to3=""; $to4=""; break;
										case "PEQUEÑA": $to1=""; $to2="selected"; $to3=""; $to4="";	break;
										case "MEDIANA": $to1=""; $to2=""; $to3="selected"; $to4="";	break;
										case "MACRO": $to1=""; $to2=""; $to3=""; $to4="selected"; break;
									}
								?>
								<select name="torganizacion" id="torganizacion" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="MICRO" <?php echo $to1; ?> >MICRO</option>
									<option value="PEQUEÑA" <?php echo $to2; ?> >PEQUEÑA</option>
									<option value="MEDIANA" <?php echo $to3; ?> >MEDIANA</option>
									<option value="MACRO" <?php echo $to4; ?> >MACRO</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group">
								<label for="tipoorga">Tipo de Organización</label>
								<?php
	  								$tor1="";
	  								$tor2="";
	  								$tor3="";
	  								switch($datos["tipoorga"]){
										case "PÚBLICA": $tor1="selected"; $tor2=""; $tor3=""; break;
										case "PRIVADA": $tor1=""; $tor2="selected"; $tor3=""; break;
										case "PROPIA": $tor1=""; $tor2=""; $tor3="selected"; break;
									}
								?>
								<select name="tipoorga" id="tipoorga" class="form-control" data-validation="required" data-sanitize="trim escape">
									<option value="PÚBLICA" <?php echo $tor1; ?> >PÚBLICA</option>
									<option value="PRIVADA" <?php echo $tor2; ?> >PRIVADA</option>
									<option value="PROPIA" <?php echo $tor3; ?> >PROPIA</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row text-center">
						<div class="col-sm-4 col-ms-4">
							<div class="form-group">
								<span class="negritas">¿Trabajas en algo relacionado a tu carrera?</span><br>
								<?php if($datos["trel"] == "SI"){ ?>
								<input type="radio" value="SI" name="trel" id="trSI" data-validation="required" checked="checked">
								<label for="trSI">Sí</label>
								<input type="radio" value="NO" name="trel" id="trNO">
								<label for="trNO">No</label>
								<?php }else{ ?>
								<input type="radio" value="SI" name="trel" id="trSI" data-validation="required">
								<label for="trSI">Sí</label>
								<input type="radio" value="NO" name="trel" id="trNO" checked="checked">
								<label for="trNO">No</label>
								<?php } ?>
							</div>
						</div>
						<div class="col-sm-4 col-ms-4">
							<div class="form-group">
								<span class="negritas">¿Fuiste colocado por la UT?</span><br>
								<?php if($datos["tcol"] == "SI"){ ?>
								<input type="radio" value="SI" name="fcol" id="fcSI" data-validation="required" checked="checked">
								<label for="fcSI">Sí</label>
								<input type="radio" value="NO" name="fcol" id="fcNO">
								<label for="fcNO">No</label>
								<?php }else{ ?>
								<input type="radio" value="SI" name="fcol" id="fcSI" data-validation="required">
								<label for="fcSI">Sí</label>
								<input type="radio" value="NO" name="fcol" id="fcNO" checked="checked">
								<label for="fcNO">No</label>
								<?php } ?>
							</div>
						</div>
						<div class="col-sm-4 col-ms-4">
							<?php if($datos["cest"] == "SI"){ ?>
							<div class="form-group">
								<span class="negritas">¿Continuarás estudiando?</span><br>
								<input type="radio" value="SI" name="cest" id="cestSI" data-validation="required" checked="checked">
								<label for="cestSI">Sí</label>
								<input type="radio" value="NO" name="cest" id="cestNO">
								<label for="cestNO">No</label>
							</div>
							<div class="form-group" id="contest">
								<label for="cestque">¿Qué?</label>
								<input type="text" class="form-control" id="cestque" name="cestque" placeholder="Especifique" data-sanitize="trim escape" value="<?php echo $datos["cestque"];?>">
							</div>
							<?php }else{ ?>
							<div class="form-group">
								<span class="negritas">¿Continuarás estudiando?</span><br>
								<input type="radio" value="SI" name="cest" id="cestSI" data-validation="required">
								<label for="cestSI">Sí</label>
								<input type="radio" value="NO" name="cest" id="cestNO" checked="checked">
								<label for="cestNO">No</label>
							</div>
							<div class="form-group hidden" id="contest">
								<label for="cestque">¿Qué?</label>
								<input type="text" class="form-control" id="cestque" name="cestque" placeholder="Especifique" data-sanitize="trim escape" value="<?php echo $datos["cestque"];?>">
							</div>
							<?php } ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-center">
							<input type="submit" class="btn btn-warning" value="Modificar egresado">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php echo form_close(); ?><br>
<?php } ?>
