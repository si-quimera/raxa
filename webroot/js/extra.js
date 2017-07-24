(function ($) {
	
	var origen = 'raxa/';
	//var origen = '';
	
	var path = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/selectSubs/';	
	var path_table = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/drawTabla/';
	var path_add = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/newString/';
	var path_del = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/delString/';
	var path_update = 'http://' + $(location).attr('host') + '/'+ origen +'Catalagos/updateString/';
	var path_ICCDID = 'http://' + $(location).attr('host') + '/'+ origen +'AsignacionChip/validar/';
	
	
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 100, // Creates a dropdown of 15 years to control year
		format: 'yyyy-mm-dd' 
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
		
		var ICCDID_del = $("#ICCDID-del").val();
		var ICCDID_al = $("#ICCDID-al").val();
		
		if(ICCDID_al.length < 20 || ICCDID_del.length < 20){
			
			var $toastContent = $('<span><i class="material-icons">warning</i> ICCDID incompleto para hacer la validación. </span>');
			Materialize.toast($toastContent, 5000, 'yellow darken-3');	
		}else{			
			var parametros = {       
				'ICCDID_al' : ICCDID_al,
				'ICCDID_del' : ICCDID_del
			};							
			$.ajax({
				data:  parametros,
				url:   path_ICCDID,
				type:  'post',
				beforeSend: function () {
				},
				success:  function (response) { 
					
					var items_ICCDID = JSON.parse(response);
					var list_ICCDID = "";
					
					$("#msg-validar").html('<div class="card-panel teal lighten-2">Total de ICCDID encontrados en este rango son de: '+items_ICCDID.length+'</div>');					
														
					$.each(items_ICCDID, function(key, value){
						list_ICCDID = list_ICCDID + value.ICCDID + '<br>';
					});					
					
					$("#list-ICCDID").html(list_ICCDID);
				}
			}); 						
		}
		
		
	});






















}(jQuery));


