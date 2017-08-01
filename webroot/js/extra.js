(function ($) {		
	var origen = 'raxa/';
	$("#table").hide();
	//var origen = '';
	
	var path = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/selectSubs/';	
	var path_table = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/drawTabla/';
	var path_add = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/newString/';
	var path_del = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/delString/';
	var path_update = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/updateString/';
	var path_ICCDID = 'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/validar/';
	var path_username = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/genUsername/';
	var path_password = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/randomPassword/';	
	
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 100, // Creates a dropdown of 15 years to control year
		format: 'yyyy-mm-dd' ,
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Aceptar',		
	});

	$('.dropdown-button2').dropdown({
		  inDuration: 300,
		  outDuration: 225,
		  constrain_width: false, // Does not change width of dropdown to that of the activator
		  hover: true, // Activate on hover
		  gutter: ($('.dropdown-content').width()*3)/3.9, // Spacing from edge
		  belowOrigin: false, // Displays dropdown below the button
		  alignment: 'left' // Displays dropdown with edge aligned to the left of button
		}
	);
	// Recarga contenido de la tabla
	function reDrawTable(identifica){ 
		var parametros = {                    
			'id' : identifica
		};		
		
		$.ajax({
			data:  parametros,
			url:   path_table,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) {                     
			  $("#table").html(response);
			  $('#new_item').removeAttr('disabled');
			  $('#new_item').addClass('pulse');
			}
		});						
	}	
	
	$('#raiz').on('change', function() {		
		reDrawTable(0);		
		var identifica = $("#raiz").val();		
		var parametros = {                    
			'id' : $("#raiz").val()
		};				

		$.ajax({
			data:  parametros,
			url:   path,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) {                     
			  $("#sub1").html(response);
			  reDrawTable(identifica);
			  $("#sub2").html("");
			  $("#sub3").html("");
			}
		}); 
	});	
	
	$('#sub1').on('change', function() {
		reDrawTable(0);
		var identifica = $("#sub1").val();		
		var parametros = {                    
			'id' : $("#sub1").val()
		};				

		$.ajax({
			data:  parametros,
			url:   path,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) {                     
			  $("#sub2").html(response);
			  reDrawTable(identifica);
			}
		}); 
	});	
	
	$('#sub2').on('change', function() {
		reDrawTable(0);
		var identifica = $("#sub2").val();		
		var parametros = {                    
			'id' : $("#sub2").val()
		};				

		$.ajax({
			data:  parametros,
			url:   path,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) {                     
			  $("#sub3").html(response);
			  reDrawTable(identifica);
			}
		}); 
	});		
	
	$('#sub3').on('change', function() {
		reDrawTable(0);
		var identifica = $("#sub3").val();		
		reDrawTable(identifica);
	});	

	//Activar Modal de otra manera no funciona
	$('.modal').modal();
		$('#modal1').on('click', function() {
    });
	
	//Activar Modal de otra manera no funciona
	$('#new_item').on('click', function() {
		$("#Nombre").val('');
		$("#String1").val('');
		$("#String2").val('');
		$("#String3").val('');
		$("#String4").val('');
		$("#String5").val('');	
		
		$('#modal1').modal('open');
		$('#botton-new').show();
		$('#botton-edit').hide();
    });	
	
	// Nuevo String
	$('#botton-new').on('click', function() {			
		var identifica= $("#id_prim").val();		
		var parametros = {       
			'Id_Cat_Sec' : $("#id_prim").val(),
			'Nombre' : $("#Nombre").val(),
			'String1' : $("#String1").val(),
			'String2' : $("#String2").val(),
			'String3' : $("#String3").val(),
			'String4' : $("#String4").val(),
			'String5' : $("#String5").val()
		};				

		$.ajax({
			data:  parametros,
			url:   path_add,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) {   
				$("#Nombre").val('');
				$("#String1").val('');
				$("#String2").val('');
				$("#String3").val('');
				$("#String4").val('');
				$("#String5").val('');
				reDrawTable(identifica);
				
				var $toastContent = $('<span><i class="material-icons">mode_edit</i> Item agregado con exito </span>');
				Materialize.toast($toastContent, 5000, 'green');				
				
			}
		}); 
	});
	// Eliminar String
	$(document).on('click', '.delete_class', function() {		
		var identifica= $("#id_prim").val();
		var parametros = {       
			'id' : $(this).attr('id')
		};		
   
		$.ajax({
			data:  parametros,
			url:   path_del,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) {                     
				var $toastContent = $('<span><i class="material-icons">delete</i> Item eliminado con exito</span>');
				Materialize.toast($toastContent, 5000, 'red');	
				reDrawTable(identifica);
			}
		});    
   
	});
	// Sacamos info a editar y lo metemos al formulario
	$(document).on('click', '.edit_class', function() {	
			
		var update_id = $(this).attr('id');
		
		var row0 = $("#tabla_cadenas #row0"+update_id).text();
		var row1 = $("#tabla_cadenas #row1"+update_id).text();
		var row2 = $("#tabla_cadenas #row2"+update_id).text();
		var row3 = $("#tabla_cadenas #row3"+update_id).text();
		var row4 = $("#tabla_cadenas #row4"+update_id).text();
		var row5 = $("#tabla_cadenas #row5"+update_id).text();
		
		$("#Nombre").val(row0);
		$("#String1").val(row1);
		$("#String2").val(row2);
		$("#String3").val(row3);
		$("#String4").val(row4);
		$("#String5").val(row5);
		$("#update_id").val(update_id);
		
		$('#botton-new').hide();
		$('#botton-edit').show();
		
		$('#modal1').modal('open');
   
	});
	// Editar String
	$('#botton-edit').on('click', function() {
				
		var identifica = $("#id_prim").val();
		var id = $("#update_id").val();
		
		var parametros = {       
			'update_id' : $("#update_id").val(),
			'Nombre' : $("#Nombre").val(),
			'String1' : $("#String1").val(),
			'String2' : $("#String2").val(),
			'String3' : $("#String3").val(),
			'String4' : $("#String4").val(),
			'String5' : $("#String5").val()
		};				

		$.ajax({
			data:  parametros,
			url:   path_update,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response) { 
				$("#Nombre").val('');
				$("#String1").val('');
				$("#String2").val('');
				$("#String3").val('');
				$("#String4").val('');
				$("#String5").val('');
				reDrawTable(identifica);
				$('#modal1').modal('close');
				var $toastContent = $('<span><i class="material-icons">mode_edit</i> Item editado con exito </span>');
				Materialize.toast($toastContent, 5000, 'green');		
				
				
			}
		}); 
	});


	$('#button-validar').on('click', function() {						
		var ICCDID_del = $("#ICCDID_del").val();
		var ICCDID_al = $("#ICCDID_al").val();
		
		$("#msg-validar").html('');
		$("#list-ICCDID").html('');
		
		if(ICCDID_al.length < 20 || ICCDID_del.length < 20){			
			var $toastContent = $('<span><i class="material-icons">warning</i> ICCDID incompleto para hacer la validación. </span>');
			Materialize.toast($toastContent, 5000, 'yellow darken-3');	
			$("#msg-validar").html('');
			$("#list-ICCDID").html('');			
		}else{						
			var number_del = ICCDID_del.substring(0, 18);
			var number_al = ICCDID_al.substring(0, 18);
			
			if(number_del <= number_al){
				var parametros = {       
					'ICCDID_al' : ICCDID_al,
					'ICCDID_del' : ICCDID_del
				};							
				$.ajax({
					data:  parametros,
					url:   path_ICCDID,
					type:  'post',
					beforeSend: function() {
					},
					success:  function (response) { 					
						$("#table").html(response);
						$('html, body').animate({scrollTop:1000},'500');
						$("#table").show();
					}
				}); 		
			}else{
				var $toastContent = $('<span><i class="material-icons tiny">warning</i> ICCDID Del debe ser menor que ICCDID Al . </span>');
				Materialize.toast($toastContent, 5000, 'yellow darken-3');					
			}	
		}				
	});

	$('#button-reset').on('click', function() {	
		$("#table").html('');
	});

	$('#Id_Almacen').on('change', function() {
		$("#Id_Ascendente").val('');
		$("#Id_Adjuntos").val('');
		$("#Id_Desendentes").val('');
		if ($('#Id_Almacen').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Almacen').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			$('#Id_Ascendente').prop('disabled', 'disabled');						
			$('#Id_Ascendente').addClass('blue-grey lighten-4');
			$('#Id_Adjuntos').prop('disabled', 'disabled');						
			$('#Id_Adjuntos').addClass('blue-grey lighten-4');
			$('#Id_Desendentes').prop('disabled', 'disabled');						
			$('#Id_Desendentes').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Ascendente').prop('disabled', false);
			$('#Id_Ascendente').removeClass('blue-grey lighten-4');
			$('#Id_Adjuntos').prop('disabled', false);
			$('#Id_Adjuntos').removeClass('blue-grey lighten-4');
			$('#Id_Desendentes').prop('disabled', false);
			$('#Id_Desendentes').removeClass('blue-grey lighten-4');			
		}				
	});	

	$('#Id_Ascendente').on('change', function() {
		$("#Id_Almacen").val('');
		$("#Id_Adjuntos").val('');
		$("#Id_Desendentes").val('');
		if ($('#Id_Ascendente').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Ascendente').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			if($("#isGZ").val() == 1){
				$('#Id_Almacen').prop('disabled', 'disabled');						
				$('#Id_Almacen').addClass('blue-grey lighten-4');
			}
			$('#Id_Adjuntos').prop('disabled', 'disabled');						
			$('#Id_Adjuntos').addClass('blue-grey lighten-4');
			$('#Id_Desendentes').prop('disabled', 'disabled');						
			$('#Id_Desendentes').addClass('blue-grey lighten-4');			
		}else{
			if($("#isGZ").val() == 1){
				$('#Id_Almacen').prop('disabled', false);
				$('#Id_Almacen').removeClass('blue-grey lighten-4');
			}
			$('#Id_Adjuntos').prop('disabled', false);
			$('#Id_Adjuntos').removeClass('blue-grey lighten-4');
			$('#Id_Desendentes').prop('disabled', false);
			$('#Id_Desendentes').removeClass('blue-grey lighten-4');			
		}				
	});	

	$('#Id_Adjuntos').on('change', function() {
		$("#Id_Almacen").val('');
		$("#Id_Ascendente").val('');
		$("#Id_Desendentes").val('');
		if ($('#Id_Adjuntos').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Adjuntos').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			$('#Id_Ascendente').prop('disabled', 'disabled');						
			$('#Id_Ascendente').addClass('blue-grey lighten-4');
			if($("#isGZ").val() == 1){
				$('#Id_Almacen').prop('disabled', 'disabled');						
				$('#Id_Almacen').addClass('blue-grey lighten-4');
			}
			$('#Id_Desendentes').prop('disabled', 'disabled');						
			$('#Id_Desendentes').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Ascendente').prop('disabled', false);
			$('#Id_Ascendente').removeClass('blue-grey lighten-4');
			if($("#isGZ").val() == 1){
				$('#Id_Almacen').prop('disabled', false);
				$('#Id_Almacen').removeClass('blue-grey lighten-4');
			}	
			$('#Id_Desendentes').prop('disabled', false);
			$('#Id_Desendentes').removeClass('blue-grey lighten-4');			
		}				
	});

	$('#Id_Desendentes').on('change', function() {
		$("#Id_Almacen").val('');
		$("#Id_Ascendente").val('');
		$("#Id_Adjuntos").val('');
		if ($('#Id_Desendentes').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Desendentes').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			$('#Id_Ascendente').prop('disabled', 'disabled');						
			$('#Id_Ascendente').addClass('blue-grey lighten-4');
			if($("#isGZ").val() == 1){
				$('#Id_Almacen').prop('disabled', 'disabled');						
				$('#Id_Almacen').addClass('blue-grey lighten-4');
			}
			$('#Id_Adjuntos').prop('disabled', 'disabled');						
			$('#Id_Adjuntos').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Ascendente').prop('disabled', false);
			$('#Id_Ascendente').removeClass('blue-grey lighten-4');
			if($("#isGZ").val() == 1){
				$('#Id_Almacen').prop('disabled', false);
				$('#Id_Almacen').removeClass('blue-grey lighten-4');
			}
			$('#Id_Adjuntos').prop('disabled', false);
			$('#Id_Adjuntos').removeClass('blue-grey lighten-4');			
		}				
	});

	$("#checkAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
	
	$("#checkAll").change(function () {
		$('input:checkbox').not(this).prop('', this.checked);
	});


	$('#btn-usuario').on('click', function() {			
		var Nombre = $("#Nombre").val();
		var Ap_Pat = $("#Ap_Pat").val();		
		
		if(Nombre !== "" && Ap_Pat !== ""){
			var parametros = {       
				'name' : $("#Nombre").val(),
				'apepat' : $("#Ap_Pat").val()
			};			

			$.ajax({
				data:  parametros,
				url:   path_username,
				type:  'post',
				beforeSend: function() {
				},
				success:  function (response) { 
					$("#User").val(response);
				}
			});         		
		}else{
			var $toastContent = $('<span><i class="material-icons tiny">warning</i> Es necesario introducir el Nombre y Apellido para generar el Usuario. </span>');
			Materialize.toast($toastContent, 5000, 'red');						
		}
    });
	
	
	$('#btn-password').on('click', function() {				
		$.ajax({
			url:   path_password,
			type:  'post',
			beforeSend: function() {
			},
			success:  function (response) { 
				$("#Password").val(response);
			}
		});         		

    });	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	




























}(jQuery));


