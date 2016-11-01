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
					<div class="col-md-6">
						<div class="panel panel-info">
						<div class="panel-heading text-center"><h5>Satisfacción de egresados</h5></div>
							<div class="panel-body">
								Encuestas realizadas: <?php echo $npolls;?><br><br>
								<div class="text-center"><a href="<?php echo site_url('admin/consres'); ?>" class="btn btn-primary">Ver resultados</a></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">
						<div class="panel-heading text-center"><h5>Gráfica de satisfacción</h5></div>
							<div class="panel-body">
								<div id="graph" style="width:100%;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><br>
<?php } ?>
