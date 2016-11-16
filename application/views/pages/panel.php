<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading text-center"><h4>Panel de Administración</h4></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="panel panel-info">
						<div class="panel-heading text-center"><h5>Satisfacción de egresados</h5></div>
							<div class="panel-body">
								Encuestas realizadas: <?php echo $npolls;?><br><br>
								<div class="hidden-print text-center"><a href="<?php echo site_url('admin/consres'); ?>" class="btn btn-primary">Ver resultados</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-info">
						<div class="panel-heading text-center"><h5>Gráficas de encuestas realizadas</h5></div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12"><div class="hidden-print text-center"><a href="<?php echo site_url('admin/graficas'); ?>" class="btn btn-primary">Ir a las gráficas de satisfacción</a></div></div>
								</div>
                                <div class="row">
									<div class="col-md-6"><h4 class="text-center">TSU</h4><div id="graphTSU" style="width:100%;"></div></div>
									<div class="col-md-6"><h4 class="text-center">ING</h4><div id="graphING" style="width:100%;"></div></div>
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
