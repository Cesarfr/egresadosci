$(document).ready(function(){	
    $("#nivocupacion").click(function(){
        if($("#nivocupacion").val() == "Otro"){
			$("#espotrono").removeClass("hidden");
			$("#otronc").attr("data-validation", "required");
		}else {
			$("#espotrono").addClass("hidden");
			$("#otronc").removeAttr("data-validation");
		}
    });
	$("input[name='cest']").click(function(){
        if($(this).val() == "Sí"){
			$("#contest").removeClass("hidden");
			$("#cestque").attr("data-validation", "required");
		}else {
			$("#contest").addClass("hidden");
			$("#cestque").removeAttr("data-validation");
		}
    });
	
	$("input[name='discapacidad']").click(function(){
        if($(this).val() == "Sí"){
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
			$("#carrera").html("<option value='Administración, Área Administración y Evaluación de Proyectos'>Administración, Área Administración y Evaluación de Proyectos</option><option value='Administración, Área Recursos Humanos'>Administración, Área Recursos Humanos</option><option value='Desarrollo de Negocios, Área Mercadotecnia'>Desarrollo de Negocios, Área Mercadotecnia</option><option value='Mantenimiento, Área Industrial'>Mantenimiento, Área Industrial</option><option value='Mecatrónica, Área Automatización'>Mecatrónica, Área Automatización</option><option value='Nanotecnología, Área Materiales'>Nanotecnología, Área Materiales</option><option value='Procesos Industriales, Área Manufactura'>Procesos Industriales, Área Manufactura</option><option value='Química, Área Biotecnología'>Química, Área Biotecnología</option><option value='Tecnologías de la Información y Comunicación, Área Sistemas Informáticos'>Tecnologías de la Información y Comunicación, Área Sistemas Informáticos</option><option value='Energías Renovables, Área Calidad y Ahorro de Energía'>Energías Renovables, Área Calidad y Ahorro de Energía</option>");
		}else {
			$("input[name='etitING']").removeAttr("disabled");
			$("input[name='etitTSU']").removeAttr("checked");
			$("input[name='etitTSU']").attr('disabled', 'disabled');
			$("#carrera").html("<option value='Biotecnología'>Biotecnología</option><option value='Gestión de Proyectos'>Gestión de Proyectos</option><option value='Mantenimiento Industrial'>Mantenimiento Industrial</option><option value='Mecatrónica'>Mecatrónica</option><option value='Nanotecnología'>Nanotecnología</option><option value='Negocios y Gestión Empresarial'>Negocios y Gestión Empresarial</option><option value='Procesos y Operaciones Industriales'>Procesos y Operaciones Industriales</option><option value='Tecnologías de la Información y Comunicación'>Tecnologías de la Información y Comunicación</option>");
		}
    });
	
	$.validate({
		form : '#frmEgre',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(){
			var datos = $("#frmEgre").serialize();
			$.ajax({
				method: "POST",
				url: "index.php?T=saveForm",
				data: datos,
				success: function(dat){
					console.log(typeof(dat));
					console.log("Guardado con éxito " + dat);
					if(dat != '0') {
						$("#frmEgre")[0].reset();
						$("#mensaje").html("<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡Información guardada con éxito!</div>");
						$("#mensaje").focus();
						setTimeout("redir('index.php?T=satisfaccion')", 1500);
					}else {
						$("#mensaje").html("<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡Ocurrió un error al guardar la información!</div>");
						$("#mensaje").focus();
					}
                }
			});
			return false;
		}
	});
	
	$.validate({
		form : '#frmSatis',
		lang: 'es',
		modules : 'sanitize',
		onSuccess: function(){
			var datos = $("#frmSatis").serialize();
			$.ajax({
				method: "POST",
				url: "index.php?T=saveSatis",
				data: datos,
				success: function(dat){
					if(dat == 1) {
						$("#frmSatis")[0].reset();
						$("#mensajesat").html("<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡Información guardada con éxito!</div>");
						$("#mensajesat").focus();
						$("#subSat").attr("disabled","disabled");
						$("#comp").removeClass("hidden");
//						setTimeout("redir('index.php')", 2500);
					}else {
						$("#mensajesat").html("<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ¡Ocurrió un error al guardar la información!</div>");
						$("#mensajesat").focus();
					}
                }
			});
			return false;
		}
	});
	
});
function redir(dir) {
	location.href = dir;
}