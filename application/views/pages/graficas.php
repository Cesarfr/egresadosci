<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading text-center"><div class="hidden-print pull-left"><a href="<?php echo site_url('admin/panel'); ?>" class="btn btn-primary">Regresar al panel</a></div><h4>Gráfica de satisfacción</h4></div>
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
							&nbsp;<input type="submit" id="btnGen" value="Obtener tabla" class="hidden-print btn btn-primary">
						</form>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12">
						<div id="tb"></div>
					</div>
                    <div class="col-md-12">
						<div id="grf" style="width:100%;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><br>
<?php } ?>
