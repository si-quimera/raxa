(function ($) {
	var origen = 'raxa/';
	//var origen = '';
	
	var path = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/selectSubs/';	
	var path_table = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/drawTabla/';
	var path_table_order = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/drawTablaOrder/';	
	var path_add = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/newString/';
	var path_del = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/delString/';
	var path_update = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/updateString/';
	var path_ICCDID_almacen = 'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/ValidarAlmacen/';
	var path_ICCDID = 'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/Validar/';
	var path_username = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/genUsername/';
	var path_password = 'http://' + $(location).attr('host') + '/'+ origen +'Catalogos/randomPassword/';
	var path_perfil = 'http://' + $(location).attr('host') + '/'+ origen +'Perfiles/getConfigPerfil/';
	var path_mesa_seguimiento = 'http://' + $(location).attr('host') + '/'+ origen +'MesaSeguimiento/getConfigMesaSeguimiento/';
	var path_perfil_save = 'http://' + $(location).attr('host') + '/'+ origen +'Perfiles/savePerfil/';
	var path_mesa_seguimiento_save = 'http://' + $(location).attr('host') + '/'+ origen +'MesaSeguimiento/saveMesaSeguimiento/';
	var path_perfil_select = 'http://' + $(location).attr('host') + '/'+ origen +'Perfiles/loadSelectPerfil/';
	var path_mesa_seguimiento_select = 'http://' + $(location).attr('host') + '/'+ origen +'MesaSeguimiento/loadSelectMesaSeguimiento/';
	var path_ICCDID_colaborador = 'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/ValidarColaborador/';
	var path_on_bloqueo = 'http://' + $(location).attr('host') + '/'+ origen +'Seguimiento/OnBloqueo/';
	var path_off_bloqueo = 'http://' + $(location).attr('host') + '/'+ origen +'Seguimiento/OffBloqueo/';	
	var path_check_bloqueo = 'http://' + $(location).attr('host') + '/'+ origen +'Seguimiento/CheckBloqueo/';	
	var path_update_bloqueo = 'http://' + $(location).attr('host') + '/'+ origen +'Seguimiento/UpdateBloqueo/';

	$('#Id_MesaSeguimiento').on('change', function(event) {		
		event.preventDefault(); 
		
		$('#search_to option').each(function(index, option) {
			$(option).remove();
		});		
						
		$("#preload").show();				
		reDrawMesaSeguimientoSelect();		
	});	

	// Recarga contenido de la tabla
	function reDrawMesaSeguimientoSelect(){ 
		
		$.ajax({
			url:   path_mesa_seguimiento_select,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response){                     
			  $("#search").html(response);			  
				var parametros = {                    
					'Id_MesaSeguimiento' : $("#Id_MesaSeguimiento").val()
				};				
			  
				$.ajax({
					data:  parametros,
					url:   path_mesa_seguimiento,
					type:  'post',
					beforeSend: function () {				
					},
					success:  function (code) {
						if (code!=undefined && code!="" && code.length!=0 && code.bandera != '0'){
						   lugares = JSON.parse(code);
							$.each(lugares, function (i, item) {
								$("#search option[value='"+item.id_grupo+"']").remove();
								$('#search_to').append($('<option>', {
									value: item.id_grupo, text: item.Grupo
								}));                                  						
									
							});                               
						}	
						//hide load
						$("#preload").hide();
					}
				}); 			  		  
			}
		});						
	}

	$('#mesaseguimiento_save').click(function(event) {         
		event.preventDefault();                       

		$('#search_to option').prop('selected', true); // Select All  
		
		var parametros = {                    
			'Id_MesaSeguimiento' : $("#Id_MesaSeguimiento").val(),
			'grupo' : $("select#search_to").val()
		};		
		
		if($("#Id_MesaSeguimiento").val() === "") {
			var $toastContent = $('<span><i class="material-icons tiny">warning</i> Es necesario seleccionar un Colaborador. </span>');
			Materialize.toast($toastContent, 5000, 'red');
		}else{                            
			$.ajax({
				url:        path_mesa_seguimiento_save,
				type:       'post',
				data:       parametros,
				success:    function(code){                                
				   if(code == 'ok' ){                                   					   
						var $toastContent = $('<span><i class="material-icons">mode_edit</i> Se guardo la configuración de la Mesa de Seguimiento con exito! </span>');
						Materialize.toast($toastContent, 7000, 'green');
				   }else{
						var $toastContent = $('<span><i class="material-icons tiny">warning</i> Error al guardar las configuracón de la Mesa de Seguimiento. </span>');
						Materialize.toast($toastContent, 5000, 'red');  					
				   }
				}
			}); 
		}                                                                                                       
	});			
	
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 100, // Creates a dropdown of 15 years to control year
		format: 'yyyy-mm-dd' ,
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Aceptar'		
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
	
	// Recarga contenido de la tabla con un orden dado por el usuario
	function reDrawTableOrder(identifica, order, by){ 
		var parametros = {                    
			'id' : identifica,
			'order' : order,
			'by' : by
		};		
		
		$.ajax({
			data:  parametros,
			url:   path_table_order,
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
			  $("#select_order").val('#raiz');
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
			  $("#select_order").val('#sub1');
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
			  $("#select_order").val('#sub2');
			  reDrawTable(identifica);
			}
		}); 
	});		
	
	$('#sub3').on('change', function() {
		reDrawTable(0);
		var identifica = $("#sub3").val();	
		$("#select_order").val('#sub3');
		reDrawTable(identifica);
	});	

	//Activar Modal de otra manera no funciona
	$('.modal').modal();
	
	
	//$('#modal1').on('click', function() {
    //});
	
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


	$('#button-almacen').on('click', function() {	
		
		var ICCDID_del = $("#ICCDID_del").val();
		var ICCDID_al = $("#ICCDID_al").val();
		var Id_Almacen_From = $("#Id_Almacen_From").val();
				
		if(Id_Almacen_From == 0){
			path = path_ICCDID_almacen;
		}else{
			path = path_ICCDID;
		}
		
		$("#msg-validar").html('');
		$("#list-ICCDID").html('');
		
		if(ICCDID_al == "" || ICCDID_del == ""){
			var number_del = "";
			var number_al =  "";								
		}else{									
			var number_del = ICCDID_del.substring(0, 18);
			var number_al = ICCDID_al.substring(0, 18);
		}		
			
		if(Id_Almacen_From == ""){
			var $toastContent = $('<span><i class="material-icons">warning</i> Es necesario seleccionar un Almacen de Origen</span>');
			Materialize.toast($toastContent, 5000, 'yellow darken-3');	
			$("#msg-validar").html('');
			$("#list-ICCDID").html('');					
		}else{						
			var parametros = {       
				'ICCDID_al' : ICCDID_al,
				'ICCDID_del' : ICCDID_del,
				'Id_Almacen_From' : Id_Almacen_From
			};							
			$.ajax({
				data:  parametros,
				url:   path,
				type:  'post',
				beforeSend: function() {
				},
				success:  function (response) { 					
					$("#table").html(response);
					$('html, body').animate({scrollTop:1000},'500');
					$("#table").show();
				}
			}); 			
		}				
	});

	$('#button-reset').on('click', function() {	
		$("#table").html('');
	});

	$('#Id_Ascendente').on('change', function() {
		$("#Id_Almacen").val('');
		$("#Id_Adjuntos").val('');
		$("#Id_Desendentes").val('');
		if ($('#Id_Ascendente').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Ascendente').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			$('#Id_Adjuntos').prop('disabled', 'disabled');						
			$('#Id_Adjuntos').addClass('blue-grey lighten-4');
			$('#Id_Desendentes').prop('disabled', 'disabled');						
			$('#Id_Desendentes').addClass('blue-grey lighten-4');			
		}else{
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
			$('#Id_Desendentes').prop('disabled', 'disabled');						
			$('#Id_Desendentes').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Ascendente').prop('disabled', false);
			$('#Id_Ascendente').removeClass('blue-grey lighten-4');	
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
			$('#Id_Adjuntos').prop('disabled', 'disabled');						
			$('#Id_Adjuntos').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Ascendente').prop('disabled', false);
			$('#Id_Ascendente').removeClass('blue-grey lighten-4');
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
	
	
	$(document).on('click', '.nombre_desc', function() {		
		//reDrawTableOrder(0);	
		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});
	
	$(document).on('click', '.nombre_asc', function() {		
		//reDrawTableOrder(0);		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});	
	
	$(document).on('click', '.string1_desc', function() {		
		//reDrawTableOrder(0);	
		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});
	
	$(document).on('click', '.string1_asc', function() {		
		//reDrawTableOrder(0);		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});	
		
	$(document).on('click', '.string2_desc', function() {		
		//reDrawTableOrder(0);	
		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});
	
	$(document).on('click', '.string2_asc', function() {		
		//reDrawTableOrder(0);		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});	


	$(document).on('click', '.string3_desc', function() {		
		//reDrawTableOrder(0);	
		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});
	
	$(document).on('click', '.string3_asc', function() {		
		//reDrawTableOrder(0);		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});	


	$(document).on('click', '.string4_desc', function() {		
		//reDrawTableOrder(0);	
		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});
	
	$(document).on('click', '.string4_asc', function() {		
		//reDrawTableOrder(0);		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});	


	$(document).on('click', '.string5_desc', function() {		
		//reDrawTableOrder(0);	
		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});
	
	$(document).on('click', '.string5_asc', function() {		
		//reDrawTableOrder(0);		
		var select = $("#select_order").val();
		var identifica = $(select).val();		
		var order = $(this).data("order");
		var by = $(this).data("by");
                   
		reDrawTableOrder(identifica, order, by);	   
	});	

	
	$('#Id_Perfil').on('change', function(event) {		
		event.preventDefault(); 
		
		$('#search_to option').each(function(index, option) {
			$(option).remove();
		});		
						
		$("#preload").show();				
		reDrawMenusSelect();		
	});	
	

	// Recarga contenido de la tabla
	function reDrawMenusSelect(){ 
		
		$.ajax({
			url:   path_perfil_select,
			type:  'post',
			beforeSend: function () {
			},
			success:  function (response){                     
			  $("#search").html(response);			  
				var parametros = {                    
					'Id_Perfil' : $("#Id_Perfil").val()
				};				
			  
				$.ajax({
					data:  parametros,
					url:   path_perfil,
					type:  'post',
					beforeSend: function () {				
					},
					success:  function (code) {     				
						if (code!=undefined && code!="" && code.length!=0){
						   lugares = JSON.parse(code);
							$.each(lugares, function (i, item) {
								$("#search option[value='"+item.Id_Cat_Prim+"']").remove();
								$('#search_to').append($('<option>', {
									value: item.Id_Cat_Prim, text: item.Perfil
								}));                                  						
									
							});                               
						}	
						//hide load
						$("#preload").hide();
					}
				}); 			  
			  
			  
			  
			}
		});						
	}



	$('#perfil_save').click(function(event) {         
		event.preventDefault();                       

		$('#search_to option').prop('selected', true); // Select All  
		
		var parametros = {                    
			'Id_Perfil' : $("#Id_Perfil").val(),
			'perfil' : $("select#search_to").val()
		};		
		
		if($("#Id_Perfil").val() === "") {
			var $toastContent = $('<span><i class="material-icons tiny">warning</i> Es necesario seleccionar un Perfil. </span>');
			Materialize.toast($toastContent, 5000, 'red');
		}else{                            
			$.ajax({
				url:        path_perfil_save,
				type:       'post',
				data:       parametros,
				success:    function(code){                                
				   if(code == 'ok' ){                                   					   
						var $toastContent = $('<span><i class="material-icons">mode_edit</i> Se guardo la configuración del Perfil con exito! </span>');
						Materialize.toast($toastContent, 7000, 'green');
				   }else{
						var $toastContent = $('<span><i class="material-icons tiny">warning</i> Error al guardar las configuracón del Perfil. </span>');
						Materialize.toast($toastContent, 5000, 'red');  					
				   }
				}
			}); 
		}                                                                                                       
	});


	$('#Id_Colaboradores').on('change', function() {
		$("#Id_Almacen_To").val('');
		if ($('#Id_Colaboradores').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Colaboradores').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			$('#Id_Almacen_To').prop('disabled', 'disabled');						
			$('#Id_Almacen_To').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Almacen_To').prop('disabled', false);
			$('#Id_Almacen_To').removeClass('blue-grey lighten-4');
			$('#Id_Colaboradores').prop('disabled', false);
			$('#Id_Colaboradores').removeClass('blue-grey lighten-4');			
		}				
	});
	
	$('#Id_Almacen_To').on('change', function() {
		$("#Id_Colaboradores").val('');
		if ($('#Id_Almacen_To').val() !== ""){
			//Activamos por si esta desactivado
			$('#Id_Almacen_To').prop('disabled', false);
			//Desactivamos todos y cambiamos de color
			$('#Id_Colaboradores').prop('disabled', 'disabled');						
			$('#Id_Colaboradores').addClass('blue-grey lighten-4');			
		}else{
			$('#Id_Almacen_To').prop('disabled', false);
			$('#Id_Almacen_To').removeClass('blue-grey lighten-4');
			$('#Id_Colaboradores').prop('disabled', false);
			$('#Id_Colaboradores').removeClass('blue-grey lighten-4');			
		}				
	});	

	$('#button-validar').on('click', function() {	
		
		var ICCDID_del = $("#ICCDID_del").val();
		var ICCDID_al = $("#ICCDID_al").val();
		var Id_Colaborador = $("#Id_Colabora").val();
						
		$("#msg-validar").html('');
		$("#list-ICCDID").html('');
		
		if(ICCDID_al == "" || ICCDID_del == ""){
			var number_del = "";
			var number_al =  "";								
		}else{									
			var number_del = ICCDID_del.substring(0, 18);
			var number_al = ICCDID_al.substring(0, 18);
		}

		var parametros = {       
			'ICCDID_al' : ICCDID_al,
			'ICCDID_del' : ICCDID_del,
			'Id_Colaborador' : Id_Colaborador
		};							
		$.ajax({
			data:  parametros,
			url:   path_ICCDID_colaborador,
			type:  'post',
			beforeSend: function() {
			},
			success:  function (response) { 					
				$("#table").html(response);
				$('html, body').animate({scrollTop:500},'500');
				$("#table").show();
			}
		}); 		
	
						
	});

	//Autocomplete	
	$(function() {
		
		//Autocompletar Colaborador
		if($("#Id_Colabora").val() !== undefined){			
			$.ajax({
				type: 'GET',
				url:  'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/AutoColaborador/?Id_Colaborador=' + $("#Id_Colabora").val(),
				success: function(response) {
					var countryArray = JSON.parse(response);
					var dataCountry = {};
					for (var i = 0; i < countryArray.length; i++) {
						//console.log(countryArray[i].name);
						dataCountry[countryArray[i].name] = countryArray[i].flag; //countryArray[i].flag or null
					}
					$('.autocomplete').autocomplete({
						data: dataCountry,
						limit: 10, // The max amount of results that can be shown at once. Default: Infinity.
					});
				}
			});		
		}
	
	
	
	
	
	});	
	
	//Autocompletar Almacen
	$('#Id_Almacen_From').on('change', function() {
		$.ajax({
			type: 'GET',
			url:  'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/AutoAlmacen/?Id_Almacen=' + $("#Id_Almacen_From").val(),
			success: function(response) {
			
				var countryArray = JSON.parse(response);
				var dataCountry = {};
				for (var i = 0; i < countryArray.length; i++) {
					//console.log(countryArray[i].name);
					dataCountry[countryArray[i].name] = countryArray[i].flag; //countryArray[i].flag or null
				}
				$('.autocomplete').autocomplete({
					data: dataCountry,
					limit: 10, // The max amount of results that can be shown at once. Default: Infinity.
				});
			}
		});			
	});
	
	
	//change status
	$(document).on('click', '.edit_status', function() {	
			
		var Num_Cliente = $(this).attr('id');
		var ICCDID = $(this).attr('data-iccdid');
		var error = $(this).attr('data-error');
		var fase = $(this).attr('data-fase');

		$("#Num_Cliente_item").val(Num_Cliente);		
		$("#ICCDID_item").val(ICCDID);	
		
		var parametros = {       
			'Num_Cliente' : Num_Cliente,
			'ICCDID' : ICCDID,
		};			
		
		$.ajax({
			data:  parametros,
			url:   path_check_bloqueo,
			type:  'post',
			beforeSend: function() {
			},
			success:  function (response) { 
				var porta = JSON.parse(response);
				if(porta.bloqueo == 1){
					var $toastContent = $('<span><i class="material-icons">warning</i> El registro Num de Cliente '+ porta.Num_Cliente +' se encuentra bloqueado por otro usuario.</span>');
					Materialize.toast($toastContent, 5000, 'red');	
					$('#status-'+Num_Cliente).html('<div class="led-red"></div>');
				}else{					
					$.ajax({
						data:  parametros,
						url:   path_on_bloqueo,
						type:  'post',
						beforeSend: function() {
							$('#status-'+Num_Cliente).html('<div class="led-red"></div>');
						},
						success:  function (response) { 		
							var Bloqueo = JSON.parse(response);
							if(Bloqueo.Status == 'ON'){
								//configuracion de parametros
								$('#modal2').modal({
									ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
										//console.log(modal, trigger);
									},
									complete: function() { 
										console.log('Closed Modal'); 	
										// Se cierra el modal regresa el status se libera.
										$.ajax({
											data:  parametros,
											url:   path_off_bloqueo,
											type:  'post',
											beforeSend: function() {	
											},
											success:  function (response) { 		
												var Bloqueo = JSON.parse(response);
												if(Bloqueo.Status == 'ON'){
													$('#status-'+Num_Cliente).html('<div class="led-green"></div>');
												}else{
													var $toastContent = $('<span><i class="material-icons">warning</i> Ocurrio un error al momento de Bloquear el registro</span>');
													Materialize.toast($toastContent, 5000, 'red');									
												}
											}
										});										  

									} // Callback for Modal close
								});
      							//Abre el modal	
								$('#Id_Cat_Fase_Portabilidad').val(fase);
								
								$('#modal2').modal('open');							
							}else{
								var $toastContent = $('<span><i class="material-icons">warning</i> Ocurrio un error al momento de Bloquear el registro</span>');
								Materialize.toast($toastContent, 5000, 'red');									
							}
						}
					});
				}
			}
		}); 				   
	});




	$('#activacion-sim').click(function(event) {         
		event.preventDefault();                       
		
		var Id_Cat_Fase_Portabilidad =  $("#Id_Cat_Fase_Portabilidad").val();
		var Id_Cat_Error_Portabilidad =  $("#Id_Cat_Error_Portabilidad").val();
		var Num_Cliente_item =  $("#Num_Cliente_item").val();
		var ICCDID_item =  $("#ICCDID_item").val();
		
		var parametros = {                    
			'Id_Cat_Fase_Portabilidad' : Id_Cat_Fase_Portabilidad,
			'Id_Cat_Error_Portabilidad' : Id_Cat_Error_Portabilidad,
			'Num_Cliente_item' : Num_Cliente_item,
			'ICCDID_item' : ICCDID_item
		};				
                          
						  
		if(Id_Cat_Fase_Portabilidad !== ""){						  
			$.ajax({
				url:        path_update_bloqueo,
				type:       'post',
				data:       parametros,
				success:    function(response){                                
					var Update = JSON.parse(response);
					console.log(Update);
					$('#porta-' + Num_Cliente_item).html($("#Id_Cat_Fase_Portabilidad option:selected").text());
					
					if ($('#Id_Cat_Error_Portabilidad').prop('selectedIndex') == 0){
						$('#error-' + Num_Cliente_item).html("");
					}else{
						$('#error-' + Num_Cliente_item).html($("#Id_Cat_Error_Portabilidad option:selected").text());						
					}

					var $toastContent = $('<span><i class="material-icons">mode_edit</i> Se actualizo con exito el registro. </span>');
					Materialize.toast($toastContent, 5000, 'green');					
					
					$('#modal2').modal('close');
					
				}
			}); 		
		}else{
			var $toastContent = $('<span><i class="material-icons">warning</i> Es necesario selecionar un Fase de Portabilidad</span>');
			Materialize.toast($toastContent, 5000, 'red');				
			
			
		}
		                                                                                                     
	});























}(jQuery));


