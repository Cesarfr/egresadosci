<?php
if(!isset($_SESSION["id_u"])){
	redirect("/admin/login/");
}else{?>
<br><div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading text-center"><h4>Consultar egresados</h4></div>
			<div class="panel-body">
				<table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Folio</th>
							<th>Egresado</th>
							<th>Carrera</th>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
					</tbody>

					<tfoot>
					<tr>
						<th>Folio</th>
						<th>Egresado</th>
						<th>Carrera</th>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Acción</th>
					</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div><br>
<?php } ?>