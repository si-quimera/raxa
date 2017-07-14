(function ($) {
		
	var path = 'http://' + $(location).attr('host') + '/raxa/Catalagos/selectSubs/';	
	var path_table = 'http://' + $(location).attr('host') + '/raxa/Catalagos/drawTabla/';
	var path_add = 'http://' + $(location).attr('host') + '/raxa/Catalagos/newString/';
	var path_del = 'http://' + $(location).attr('host') + '/raxa/Catalagos/delString/';
	
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15, // Creates a dropdown of 15 years to control year
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
			  //reDrawTable(identifica);
			}
		}); 
	});	
	
	$('#sub1').on('change', function() {
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
		var identifica = $("#sub3").val();		
		reDrawTable(identifica);

	});	

	//Activar Modal de otra manera no funciona
	$('.modal').modal();
		$('#modal1').on('click', function() {
    });
	// Nuevo String
	$('#botton-new').on('click', function() {
		var identifica= $("#id_prim").val();
		
		var parametros = {       
			'Id_Cat_Sec' : $("#id_prim").val(),
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
	$(document).on('click', '.delete_class', function(e) {	
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










}(jQuery));