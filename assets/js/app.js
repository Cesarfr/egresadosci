var table;
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
