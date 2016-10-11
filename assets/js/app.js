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
	
});
