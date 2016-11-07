var table;
var datostb;
$(document).ready(function(){
	
	$('[data-toggle="tooltip"]').tooltip();
	
    $("#nivocupacion").click(function(){
        if($("#nivocupacion").val() == "OTRO"){
			$("#espotrono").removeClass("hidden");
			$("#otronc").attr("data-validation", "required");
		}else {
			$("#espotrono").addClass("hidden");
			$("#otronc").removeAttr("data-validation");
		}
    });
	$("input[name='cest']").click(function(){
        if($(this).val() == "SI"){
			$("#contest").removeClass("hidden");
			$("#cestque").attr("data-validation", "required");
		}else {
			$("#contest").addClass("hidden");
			$("#cestque").removeAttr("data-validation");
		}
    });
	
	$("input[name='discapacidad']").click(function(){
        if($(this).val() == "SI"){
			$("#disc").removeClass("hidden");
			$("#nomdisc").attr("data-validation", "required");
		}else {
			$("#disc").addClass("hidden");
			$("#nomdisc").removeAttr("data-validation");
		}
    });
	
	$("input[name='egresado']").click(function(){
        if($(this).val() == "TSU"){
			$("input[name='etitTSU']").removeAttr("disabled");
			$("input[name='etitING']").removeAttr("checked");
			$("input[name='etitING']").attr('disabled', 'disabled');
			$("#carrera").html("<option value='AEP'>ADMINISTRACIÓN, ÁREA ADMINISTRACIÓN Y EVALUACIÓN DE PROYECTOS</option><option value='ARH'>ADMINISTRACIÓN, ÁREA RECURSOS HUMANOS</option><option value='DNM'>DESARROLLO DE NEGOCIOS, ÁREA MERCADOTECNIA</option><option value='MIN'>MANTENIMIENTO, ÁREA INDUSTRIAL</option><option value='MAT'>MECATRÓNICA, ÁREA AUTOMATIZACIÓN</option><option value='NAT'>NANOTECNOLOGÍA, ÁREA MATERIALES</option><option value='PIM'>PROCESOS INDUSTRIALES, ÁREA MANUFACTURA</option><option value='QBT'>QUÍMICA, ÁREA BIOTECNOLOGÍA</option><option value='TIC'>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN, ÁREA SISTEMAS INFORMÁTICOS</option><option value='ERC'>ENERGÍAS RENOVABLES, ÁREA CALIDAD Y AHORRO DE ENERGÍA</option>");
		}else {
			$("input[name='etitING']").removeAttr("disabled");
			$("input[name='etitTSU']").removeAttr("checked");
			$("input[name='etitTSU']").attr('disabled', 'disabled');
			$("#carrera").html("<option value='IBT'>BIOTECNOLOGÍA</option><option value='IER'>ENERGÍAS RENOVABLES</option><option value='IGP'>GESTIÓN DE PROYECTOS</option><option value='IMI'>MANTENIMIENTO INDUSTRIAL</option><option value='IMT'>MECATRÓNICA</option><option value='INT'>NANOTECNOLOGÍA</option><option value='IGE'>NEGOCIOS Y GESTIÓN EMPRESARIAL</option><option value='IPO'>PROCESOS Y OPERACIONES INDUSTRIALES</option><option value='ITI'>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN</option>");
		}
    });
	
	$("input[name='tipo']").click(function(){
        if($(this).val() == "TSU"){
			$("#carrera").html("<option value='AEP'>ADMINISTRACIÓN, ÁREA ADMINISTRACIÓN Y EVALUACIÓN DE PROYECTOS</option><option value='ARH'>ADMINISTRACIÓN, ÁREA RECURSOS HUMANOS</option><option value='DNM'>DESARROLLO DE NEGOCIOS, ÁREA MERCADOTECNIA</option><option value='MIN'>MANTENIMIENTO, ÁREA INDUSTRIAL</option><option value='MAT'>MECATRÓNICA, ÁREA AUTOMATIZACIÓN</option><option value='NAT'>NANOTECNOLOGÍA, ÁREA MATERIALES</option><option value='PIM'>PROCESOS INDUSTRIALES, ÁREA MANUFACTURA</option><option value='QBT'>QUÍMICA, ÁREA BIOTECNOLOGÍA</option><option value='TIC'>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN, ÁREA SISTEMAS INFORMÁTICOS</option><option value='ERC'>ENERGÍAS RENOVABLES, ÁREA CALIDAD Y AHORRO DE ENERGÍA</option>");
		}else {
			$("#carrera").html("<option value='IBT'>BIOTECNOLOGÍA</option><option value='IER'>ENERGÍAS RENOVABLES</option><option value='IGP'>GESTIÓN DE PROYECTOS</option><option value='IMI'>MANTENIMIENTO INDUSTRIAL</option><option value='IMT'>MECATRÓNICA</option><option value='INT'>NANOTECNOLOGÍA</option><option value='IGE'>NEGOCIOS Y GESTIÓN EMPRESARIAL</option><option value='IPO'>PROCESOS Y OPERACIONES INDUSTRIALES</option><option value='ITI'>TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN</option>");
		}
    });
	
	$.validate({
		form : '#frmEgre',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(evt){
			return true;
		}
	});
	
	$.validate({
		form : '#frmSatis',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(evt){
			return true;
		}
	});
	
	$.validate({
		form : '#frmLogin',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(evt){
			return true;
		}
	});
	
	$("input[type='text']").keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});
	
	$.validate({
		form : '#frmEditEgre',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(evt){
			return true;
		}
	});
	
	$.validate({
		form : '#frmComp',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(evt){
			var datos = $("#frmComp").serialize();
			$.ajax({
				method: "POST",
				url: baseurl+"index.php/home/frm_comp",
				data: datos,
				dataType: "JSON",
				success: function(dat){
					if(dat == null){
						$("#comp").html("");
						$("#msg_comp").html("<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡ No hay ningún registro con la matrícula proporcionada !</div>");
					}else{
						$("#msg_comp").html("");
						$("#comp").html("<a href='"+baseurl+"index.php/home/get_rep_comp/"+dat.id+"' class='btn btn-primary' id='comp' target='_blank'>Obtener comprobante</a>");
					}
				}
			});
			return false;
		}
	});
	
	if($("#table").length){
		table = $('#table').DataTable({
			responsive: true,
			"processing": true,
			"serverSide": true,
			language: {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando del _START_ al _END_ de _TOTAL_ registros",
				"sInfoEmpty":      "0 registros encontrados",
				"sInfoFiltered":   "(filtrado de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},
			"ajax": {
				"url": baseurl+"index.php/admin/get_egre",
				"type": "POST"
			},
			"columnDefs": [{ 
				"targets": [ -1 ],
				"orderable": false,
			},
			],

		});
	}
	
	// Estadisticas
	
	$("input[name='ttb']").click(function(){
        if($(this).val() == "gen"){
			$("#fe").addClass("hidden");
			$("#fg").removeClass("hidden");
		}else {
			$("#fg").addClass("hidden");
			$("#fe").removeClass("hidden");
		}
    });
	
	$("#btnTabla").click(function(){
		var datos = $("#frmTabla").serialize();
		console.log(datos);
		$.ajax({
			method: "POST",
			url: baseurl+"index.php/admin/get_table",
			data: datos,
			success: function(dat){
				console.log(dat);
			}
		});
	});
	
	$("#btnGen").click(function(){
		var datos = $("#frmGen").serialize();
		console.log(datos);
		$.ajax({
			method: "POST",
			url: baseurl+"index.php/admin/get_table_gen",
			dataType: "JSON",
			data: datos,
			success: function(dat){
				datostb = dat;
				console.log(dat);
				fill_table(dat);
//				$.each(dat, function (i, fb) {
//					console.log(fb);
//					$.each(fb, function (i, fb1) {
//						console.log(fb1);
//					});
//				});
			},
			error: function (jqXHR, textStatus, errorThrown){
				console.log(jqXHR);
			}
		});
	});
	
	// Graficos
	if($("#graphTSU").length){
		$.ajax({
			url : baseurl+"index.php/admin/count_graph_TSU",
			type: "GET",
			dataType: "JSON",
			success: function(data){
				Morris.Donut({
					element: 'graphTSU',
					data: data,
					colors: ["#FF8000", "#FE9A2E", "#FAAC58", "#F7BE81", "#F7BE81", "#F5D0A9", "#F6E3CE"],
					resize: true
				});
			},
			error: function (jqXHR, textStatus, errorThrown){
				console.log(errorThrown);
			}
		});
	}
	if($("#graphING").length){
		$.ajax({
			url : baseurl+"index.php/admin/count_graph_ING",
			type: "GET",
			dataType: "JSON",
			success: function(data){
				Morris.Donut({
					element: 'graphING',
					data: data,
					colors: ["#33FF00", "#33FF33", "#33FF66", "#33FF99", "#33FFCC", "#33FFFF", "#33CCFF"],
					resize: true
				});
			},
			error: function (jqXHR, textStatus, errorThrown){
				console.log(errorThrown);
			}
		});
	}
});

function delete_egre(id){
	if(confirm('¿Esta seguro de borrar este egresado?')) {
		$.ajax({
			url : baseurl+"index.php/admin/delete_egre/"+id,
			type: "POST",
			dataType: "JSON",
			success: function(data){
				if(data == 1){
					$("#msg").html("<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Los datos han sido eliminados correctamente</div>");
					reload_datatable();
				}else{
					$("#msg").html("<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Ha ocurrido un error al eliminar el egresado.</div>");
				}
			},
			error: function (jqXHR, textStatus, errorThrown){
				$("#msg").html("<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Ha ocurrido un error al eliminar el egresado.</div>");
			}
		});

	}
}

function reload_datatable(){
	table.ajax.reload(null,false);
}

function fill_table(data){
	var tna = 0, tr = 0, tp = 0, tb = 0, tmb = 0, ttot = 0, tots = [];
	for(var i = 0; i < data.length; i++){
		var c = 0;
		tna += parseInt(data[i]["N/A"]);
		tr += parseInt(data[i]["R"]);
		tp += parseInt(data[i]["P"]);
		tb += parseInt(data[i]["B"]);
		tmb += parseInt(data[i]["MB"]);
		c = parseInt(data[i]["N/A"]) + parseInt(data[i]["R"]) + parseInt(data[i]["P"]) + parseInt(data[i]["B"]) + parseInt(data[i]["MB"]);
		tots.push(c);
	}
	ttot = tna+tr+tp+tb+tmb;
	var vtab = "<table class='table table-bordered' width='100%'><thead class='text-center'><tr><th>No.</th><th>Pregunta</th><th>N/A</th><th>P</th><th>R</th><th>B</th><th>MB</th><th>Total</th></tr></thead><tbody><tr><td></td><td></td><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td></td></tr>"
	+"<tr>"
	+"<td>1</td>"
	+"<td>¿La infraestructura física con que fue dotada la Universidad Tecnológica le pareció?</td>"
	+"<td><strong>"+data[0]['N/A']+"</strong></td>"
	+"<td><strong>"+data[0]['P']+"</strong></td>"
	+"<td><strong>"+data[0]['R']+"</strong></td>"
	+"<td><strong>"+data[0]['B']+"</strong></td>"
	+"<td><strong>"+data[0]['MB']+"</strong></td>"
	+"<td><strong>"+tots[0]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>2</td>"
	+"<td>¿El equipamiento de los laboratorios y talleres le pareció?</td>"
	+"<td><strong>"+data[1]['N/A']+"</strong></td>"
	+"<td><strong>"+data[1]['P']+"</strong></td>"
	+"<td><strong>"+data[1]['R']+"</strong></td>"
	+"<td><strong>"+data[1]['B']+"</strong></td>"
	+"<td><strong>"+data[1]['MB']+"</strong></td>"
	+"<td><strong>"+tots[1]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>3</td>"
	+"<td>¿Los servicios prestados (servicio médico, curso de inducción, actividades culturales y deportivas, entre otros) por la Universidad a lo largo de su estancia en la misma, los considera que estuvieron?</td>"
	+"<td><strong>"+data[2]['N/A']+"</strong></td>"
	+"<td><strong>"+data[2]['P']+"</strong></td>"
	+"<td><strong>"+data[2]['R']+"</strong></td>"
	+"<td><strong>"+data[2]['B']+"</strong></td>"
	+"<td><strong>"+data[2]['MB']+"</strong></td>"
	+"<td><strong>"+tots[2]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>4</td>"
	+"<td>¿Cómo califica usted en especial el servicio de Tutoría que le proporcionó la Universidad Tecnológica?</td>"
	+"<td><strong>"+data[3]['N/A']+"</strong></td>"
	+"<td><strong>"+data[3]['P']+"</strong></td>"
	+"<td><strong>"+data[3]['R']+"</strong></td>"
	+"<td><strong>"+data[3]['B']+"</strong></td>"
	+"<td><strong>"+data[3]['MB']+"</strong></td>"
	+"<td><strong>"+tots[3]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>5</td>"
	+"<td>¿Cuál es la oponión sobre el servicio que ofrece la Bolsa de Trabajo de la Universidad?</td>"
	+"<td><strong>"+data[4]['N/A']+"</strong></td>"
	+"<td><strong>"+data[4]['P']+"</strong></td>"
	+"<td><strong>"+data[4]['R']+"</strong></td>"
	+"<td><strong>"+data[4]['B']+"</strong></td>"
	+"<td><strong>"+data[4]['MB']+"</strong></td>"
	+"<td><strong>"+tots[4]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>6</td>"
	+"<td>¿El nivel de conocimiento y dominio de los temas mostrados por sus profesores al momento de impartirle la cátedra le pareció?</td>"
	+"<td><strong>"+data[5]['N/A']+"</strong></td>"
	+"<td><strong>"+data[5]['P']+"</strong></td>"
	+"<td><strong>"+data[5]['R']+"</strong></td>"
	+"<td><strong>"+data[5]['B']+"</strong></td>"
	+"<td><strong>"+data[5]['MB']+"</strong></td>"
	+"<td><strong>"+tots[5]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>7</td>"
	+"<td>¿El nivel de conocimiento y dominio por parte de los profesores en el manejo de los equipos que se encuentran en los laboratorios y talleres al momento de realizar las prácticas que su carrera requiere, las considera?</td>"
	+"<td><strong>"+data[6]['N/A']+"</strong></td>"
	+"<td><strong>"+data[6]['P']+"</strong></td>"
	+"<td><strong>"+data[6]['R']+"</strong></td>"
	+"<td><strong>"+data[6]['B']+"</strong></td>"
	+"<td><strong>"+data[6]['MB']+"</strong></td>"
	+"<td><strong>"+tots[6]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>8</td>"
	+"<td>¿El conocimiento del mercado laboral por parte de sus profesores le pareció?</td>"
	+"<td><strong>"+data[7]['N/A']+"</strong></td>"
	+"<td><strong>"+data[7]['P']+"</strong></td>"
	+"<td><strong>"+data[7]['R']+"</strong></td>"
	+"<td><strong>"+data[7]['B']+"</strong></td>"
	+"<td><strong>"+data[7]['MB']+"</strong></td>"
	+"<td><strong>"+tots[7]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>9</td>"
	+"<td>La experiencia práctica adquirida por parte suya, derivado de las visitas y prácticas en las empresas, las considera?</td>"
	+"<td><strong>"+data[8]['N/A']+"</strong></td>"
	+"<td><strong>"+data[8]['P']+"</strong></td>"
	+"<td><strong>"+data[8]['R']+"</strong></td>"
	+"<td><strong>"+data[8]['B']+"</strong></td>"
	+"<td><strong>"+data[8]['MB']+"</strong></td>"
	+"<td><strong>"+tots[8]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>10</td>"
	+"<td>¿Considera que la estadía le ayudó a prepararlo para el mercado laboral?</td>"
	+"<td><strong>"+data[9]['N/A']+"</strong></td>"
	+"<td><strong>"+data[9]['P']+"</strong></td>"
	+"<td><strong>"+data[9]['R']+"</strong></td>"
	+"<td><strong>"+data[9]['B']+"</strong></td>"
	+"<td><strong>"+data[9]['MB']+"</strong></td>"
	+"<td><strong>"+tots[9]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>11</td>"
	+"<td>Si usted se encuentra trabajando, ¿Cómo califica la aplicación de los conocimientos que adquirió en la Universidad, en relación con sus actividades laborales?</td>"
	+"<td><strong>"+data[10]['N/A']+"</strong></td>"
	+"<td><strong>"+data[10]['P']+"</strong></td>"
	+"<td><strong>"+data[10]['R']+"</strong></td>"
	+"<td><strong>"+data[10]['B']+"</strong></td>"
	+"<td><strong>"+data[10]['MB']+"</strong></td>"
	+"<td><strong>"+tots[10]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>12</td>"
	+"<td>¿Considera usted que el nivel de conocimientos que tiene son suficientes para el desempeño de su trabajo?</td>"
	+"<td><strong>"+data[11]['N/A']+"</strong></td>"
	+"<td><strong>"+data[11]['P']+"</strong></td>"
	+"<td><strong>"+data[11]['R']+"</strong></td>"
	+"<td><strong>"+data[11]['B']+"</strong></td>"
	+"<td><strong>"+data[11]['MB']+"</strong></td>"
	+"<td><strong>"+tots[11]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>13</td>"
	+"<td>Los conocimientos adquiridos en la Universidad, ¿En qué grado le han permitido competir con otros egresados a nivel Licenciatura?</td>"
	+"<td><strong>"+data[12]['N/A']+"</strong></td>"
	+"<td><strong>"+data[12]['P']+"</strong></td>"
	+"<td><strong>"+data[12]['R']+"</strong></td>"
	+"<td><strong>"+data[12]['B']+"</strong></td>"
	+"<td><strong>"+data[12]['MB']+"</strong></td>"
	+"<td><strong>"+tots[12]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>14</td>"
	+"<td>¿Qué opina sobre el nivel de colocación que actualmente tiene en la empresa donde labora?</td>"
	+"<td><strong>"+data[13]['N/A']+"</strong></td>"
	+"<td><strong>"+data[13]['P']+"</strong></td>"
	+"<td><strong>"+data[13]['R']+"</strong></td>"
	+"<td><strong>"+data[13]['B']+"</strong></td>"
	+"<td><strong>"+data[13]['MB']+"</strong></td>"
	+"<td><strong>"+tots[13]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>15</td>"
	+"<td>Si usted se encuentra estudiando, ¿Cómo califica los conocimientos que adquirió en la Universidad Tecnológica, en relación con sus estudios actuales?</td>"
	+"<td><strong>"+data[14]['N/A']+"</strong></td>"
	+"<td><strong>"+data[14]['P']+"</strong></td>"
	+"<td><strong>"+data[14]['R']+"</strong></td>"
	+"<td><strong>"+data[14]['B']+"</strong></td>"
	+"<td><strong>"+data[14]['MB']+"</strong></td>"
	+"<td><strong>"+tots[14]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>16</td>"
	+"<td>¿Cómo califica el Modelo Educativo de Técnico Superior Universitario?</td>"
	+"<td><strong>"+data[15]['N/A']+"</strong></td>"
	+"<td><strong>"+data[15]['P']+"</strong></td>"
	+"<td><strong>"+data[15]['R']+"</strong></td>"
	+"<td><strong>"+data[15]['B']+"</strong></td>"
	+"<td><strong>"+data[15]['MB']+"</strong></td>"
	+"<td><strong>"+tots[15]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>17</td>"
	+"<td>¿Cuál es la opinión que tienen sus familiares y amigos sobre su título profesional?</td>"
	+"<td><strong>"+data[16]['N/A']+"</strong></td>"
	+"<td><strong>"+data[16]['P']+"</strong></td>"
	+"<td><strong>"+data[16]['R']+"</strong></td>"
	+"<td><strong>"+data[16]['B']+"</strong></td>"
	+"<td><strong>"+data[16]['MB']+"</strong></td>"
	+"<td><strong>"+tots[16]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>18</td>"
	+"<td>¿Cómo califica el conocimiento que la sociedad de su localidad tiene sobre el Título de Técnico Superior Universitario?</td>"
	+"<td><strong>"+data[17]['N/A']+"</strong></td>"
	+"<td><strong>"+data[17]['P']+"</strong></td>"
	+"<td><strong>"+data[17]['R']+"</strong></td>"
	+"<td><strong>"+data[17]['B']+"</strong></td>"
	+"<td><strong>"+data[17]['MB']+"</strong></td>"
	+"<td><strong>"+tots[17]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td>19</td>"
	+"<td>¿Cómo califica la continuidad de estudios en el nivel de ingeniería?</td>"
	+"<td><strong>"+data[18]['N/A']+"</strong></td>"
	+"<td><strong>"+data[18]['P']+"</strong></td>"
	+"<td><strong>"+data[18]['R']+"</strong></td>"
	+"<td><strong>"+data[18]['B']+"</strong></td>"
	+"<td><strong>"+data[18]['MB']+"</strong></td>"
	+"<td><strong>"+tots[18]+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td colspan='2' class='text-center'>TOTAL DE RESPUESTAS</td>"
	+"<td><strong>"+tna+"</strong></td>"
	+"<td><strong>"+tp+"</strong></td>"
	+"<td><strong>"+tr+"</strong></td>"
	+"<td><strong>"+tb+"</strong></td>"
	+"<td><strong>"+tmb+"</strong></td>"
	+"<td><strong>"+ttot+"</strong></td>"
	+"</tr>"
	+"<tr>"
	+"<td colspan='2' class='text-center'>TOTAL DE ENCUESTAS APLICADAS</td>"
	+"<td colspan='6' class='text-center'><strong>"+tots[0]+"</strong></td>"
	+"</tr>"
	+"</tbody></table>";
	$("#tabla").html(vtab);
}
