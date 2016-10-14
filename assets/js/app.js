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
			$("#carrera").html("<option value='AEP'>Administración, Área Administración y Evaluación de Proyectos</option><option value='ARH'>Administración, Área Recursos Humanos</option><option value='DNM'>Desarrollo de Negocios, Área Mercadotecnia</option><option value='MIN'>Mantenimiento, Área Industrial</option><option value='MAT'>Mecatrónica, Área Automatización</option><option value='NAT'>Nanotecnología, Área Materiales</option><option value='PIM'>Procesos Industriales, Área Manufactura</option><option value='QBT'>Química, Área Biotecnología</option><option value='TIC'>Tecnologías de la Información y Comunicación, Área Sistemas Informáticos</option><option value='ERC'>Energías Renovables, Área Calidad y Ahorro de Energía</option>");
		}else {
			$("input[name='etitING']").removeAttr("disabled");
			$("input[name='etitTSU']").removeAttr("checked");
			$("input[name='etitTSU']").attr('disabled', 'disabled');
			$("#carrera").html("<option value='IBT'>Biotecnología</option><option value='IER'>Energías Renovables</option><option value='IGP'>Gestión de Proyectos</option><option value='IMI'>Mantenimiento Industrial</option><option value='IMT'>Mecatrónica</option><option value='INT'>Nanotecnología</option><option value='IGE'>Negocios y Gestión Empresarial</option><option value='IPO'>Procesos y Operaciones Industriales</option><option value='ITI'>Tecnologías de la Información y Comunicación</option>");
		}
    });
	
	$("input[name='tipo']").click(function(){
        if($(this).val() == "TSU"){
			$("#carrera").html("<option value='AEP'>Administración, Área Administración y Evaluación de Proyectos</option><option value='ARH'>Administración, Área Recursos Humanos</option><option value='DNM'>Desarrollo de Negocios, Área Mercadotecnia</option><option value='MIN'>Mantenimiento, Área Industrial</option><option value='MAT'>Mecatrónica, Área Automatización</option><option value='NAT'>Nanotecnología, Área Materiales</option><option value='PIM'>Procesos Industriales, Área Manufactura</option><option value='QBT'>Química, Área Biotecnología</option><option value='TIC'>Tecnologías de la Información y Comunicación, Área Sistemas Informáticos</option><option value='ERC'>Energías Renovables, Área Calidad y Ahorro de Energía</option>");
		}else {
			$("#carrera").html("<option value='IBT'>Biotecnología</option><option value='IER'>Energías Renovables</option><option value='IGP'>Gestión de Proyectos</option><option value='IMI'>Mantenimiento Industrial</option><option value='IMT'>Mecatrónica</option><option value='INT'>Nanotecnología</option><option value='IGE'>Negocios y Gestión Empresarial</option><option value='IPO'>Procesos y Operaciones Industriales</option><option value='ITI'>Tecnologías de la Información y Comunicación</option>");
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
	
//	$('#table').DataTable({ 
// 
//        "processing": true, //Feature control the processing indicator.
//        "serverSide": true, //Feature control DataTables' server-side processing mode.
//        "order": [], //Initial no order.
// 
//        // Load data for the table's content from an Ajax source
//        "ajax": {
//            "url": baseurl+"index.php/admin/get_egre",
//            "type": "POST"
//        },
// 
//        //Set column definition initialisation properties.
//        "columnDefs": [
//        { 
//            "targets": [ -1 ], //last column
//            "orderable": false, //set not orderable
//        },
//        ],
// 
//    });
	
});