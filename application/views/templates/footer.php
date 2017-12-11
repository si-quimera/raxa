    
		<!-- ###### -->
        <!-- Footer -->
        <!-- ###### -->
        <footer class="page-footer">		
            <div class="container">
                <div class="row">
					<div><br><br></div>
					<div><br><br></div>
				</div>					
			</div>

            <div class="footer-copyright">
                <div class="container">
                    © <?= date("Y") ?> RAXA, All rights reserved.
                </div>
            </div>
        </footer>


        <!-- ################## -->
        <!-- Global javascripts -->
        <!-- ################## -->
        <script src="<?= base_url(); ?>webroot/bower_components/jquery/dist/jquery.js" type="text/javascript"></script>

        <script src="<?= base_url(); ?>webroot/bower_components/Materialize/js/materialize.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/code-prettify/src/prettify.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/js/admin.js" type="text/javascript"></script>
        <!-- ################ -->
        <!-- Util javascripts -->
        <!-- ################ -->
        <script src="<?= base_url(); ?>webroot/js/utils.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/js/colors.js" type="text/javascript"></script>
		<script src="<?= base_url(); ?>webroot/js/extra.js" type="text/javascript"></script>
		<script src="<?= base_url(); ?>webroot/js/multiselect.min.js" type="text/javascript"></script>
        <!--<script src="<?= base_url(); ?>webroot/js/theme-switcher.js" type="text/javascript"></script> -->
        <!-- ################ -->
        <!-- Page javascripts -->
        <!-- ################ -->
        <script src="<?= base_url(); ?>webroot/bower_components/amcharts3/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/amcharts3/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/amcharts3/amcharts/gauge.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/amcharts3/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/slimscroll/jquery.slimscroll.js" type="text/javascript"></script>		
        <script src="<?= base_url(); ?>webroot/js/pages/dashboard.js" type="text/javascript"></script>	
        <!-- ################ -->
        <!-- Extra javascripts -->
        <!-- ################ -->
		<link href="<?= base_url(); ?>webroot/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
		<script src="<?= base_url(); ?>webroot/bower_components/select2/dist/js/select2.full.min.js"></script>



        <!-- Include jTable script file. -->
        <script src="<?= base_url(); ?>webroot/bower_components/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/jtable.2.4.0/jquery.jtable.min.js" type="text/javascript"></script>


  
		<script type="text/javascript">
			$( document ).ready(function() {

                //var origen = 'raxa/';
                var origen = '';
				
				//Select con busqueda
				$('#Id_Cat_Sec').select2();			
				$('#Jefe_Inmediato').select2();
				$('#Id_Cat_Puesto').select2();
				$('#Id_Perfil').select2();
				$('#Id_Colaborador').select2();
				$('#Id_Cat_Menu').select2();
				$('#ICCDID').select2();	
				
				// Select para asignacion de perfiles
				$('#search').multiselect();


				//Llenado Tabla Dinamica
                var spanishMessages = {
                    save: 'Guardar',
                    saving: 'Guardando',
                    cancel: 'Cancelar',
                    close: 'Cerrar',
                    editRecord: 'Editar Registro',
                    deleteText: 'Eliminar',
                    areYouSure: '¿Estás seguro?',
                    deleteConfirmation: 'Este registro será eliminado. ¿Estás seguro?'

                };

                //Act SIM ---------
                $('#PortaTableContainer').jtable({
                    messages: spanishMessages, //Localize
                    paging: true, //Enable paging
                    pageSize: 100, //Set page size (default: 10)
                    sorting: true, //Enable sorting
                    defaultSorting: 'Num_Cliente DESC', //Set default sorting
                    addRecordButton: false,
                    pageList: 'minimal',
                    columnResizable: true,
                    recordUpdated: function (event, data) { $('#PortaCuaTableContainer').jtable('reload'); },
                    actions: {
                        listAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/ActSim',
                        updateAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/EditActSim'
                    },
                    fields: {
                        Num_Cliente: {
                            title: '# Cliente',
                            width: '12%',
                            key: true,
                            create: false,
                            edit: false
                        },
                        Id_Colaborador: {
                            title: 'Ejecutivo',
                            width: '20%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Colaborador',
                            edit: false
                        },
                        Nom_Persona_Porta: {
                            title: 'Cliente',
                            width: '20%',
                            edit: false
                        },
                        NIP_Portar: {
                            title: ' NIP ',
                            width: '10%',
                            edit: true
                        },
                        Vigencia_NIP: {
                            title: 'Vigencia NIP',
                            width: '12%',
                            type: 'date',
                            edit: true
                        },
                        Id_Carrier: {
                            title: 'CARRIER',
                            width: '20%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Carrier',
                            edit: false
                        },
                        ICCDID : {
                            title: ' ICCDID ',
                            width: '5%',
                            edit: true
                        },
                        Fecha_Registro_Porta : {
                            title: ' Fecha Reg Porta',
                            width: '5%',
                            edit : false,
                            display:function(data){
                                return data.record.Fecha_Registro_Porta;

                            }
                        },
                        Id_Cat_Fase_Portabilidad : {
                            title: ' Fase Portabilidad ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/FasePorta',
                            edit: false
                        },
                        Tel_Fijo_Alterno : {
                            title: ' Telefono Fijo',
                            width: '5%',
                            edit: false
                        },
                        email : {
                            title: ' Email ',
                            width: '5%',
                            edit: false
                        },
                        Num_Tel_Temporal : {
                            title: ' Num Provisional ',
                            width: '5%',
                            edit: true
                        },
                        Id_Cat_Tipo_Producto : {
                            title: ' Tipo Producto ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Producto',
                            edit: false
                        },
                        Id_Cat_Validacion : {
                            title: ' Status Validación ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/StatusPorta',
                            edit: false
                        },
                        Id_Cat_Error_Portabilidad : {
                            title: ' Error ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Error',
                            edit: true
                        }
                    }
                });

                //Re-load records when user click 'load records' button.
                $('#LoadRecordsButton').click(function (e) {
                    e.preventDefault();
                    $('#PortaTableContainer').jtable('load', {
                        en: $('#en').val(),
                        buscar: $('#buscar').val()
                    });
                });

                //Load all records when page is first shown
                $('#LoadRecordsButton').click();
                //Act SIM ---------

                //Act SIM Ben ---------
                $('#PortaBenTableContainer').jtable({
                    messages: spanishMessages, //Localize
                    paging: true, //Enable paging
                    pageSize: 100, //Set page size (default: 10)
                    sorting: true, //Enable sorting
                    defaultSorting: 'Num_Cliente DESC', //Set default sorting
                    addRecordButton: false,
                    pageList: 'minimal',
                    columnResizable: true,
                    recordUpdated: function (event, data) { $('#PortaCuaTableContainer').jtable('reload'); },
                    actions: {
                        listAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/ActSimBen',
                        updateAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/EditActSim'
                    },
                    fields: {
                        Num_Cliente: {
                            title: '# Cliente',
                            width: '12%',
                            key: true,
                            create: false,
                            edit: false
                        },
                        Id_Colaborador: {
                            title: 'Colaborador',
                            width: '30%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Colaborador',
                            edit: true
                        },
                        Nom_Persona_Porta: {
                            title: 'Nombre',
                            width: '30%',
                            edit: true
                        },
                        NIP_Portar: {
                            title: ' NIP ',
                            width: '10%',
                            edit: true
                        },
                        Vigencia_NIP: {
                            title: 'Vigencia NIP',
                            width: '12%',
                            type: 'date',
                            edit: true
                        },
                        Id_Carrier: {
                            title: 'CARRIER',
                            width: '30%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Carrier',
                            edit: true
                        },
                        ICCDID : {
                            title: ' ICCDID ',
                            width: '5%'
                        },
                        Fecha_Registro_Porta : {
                            title: ' Fecha Registro ',
                            width: '5%',
                            edit : false,
                            display:function(data){
                                return data.record.Fecha_Registro_Porta;

                            }
                        },
                        Id_Cat_Fase_Portabilidad : {
                            title: ' Fase Portabilidad ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/FasePorta',
                            edit: true
                        },
                        Tel_Fijo_Alterno : {
                            title: ' Telefono ',
                            width: '5%',
                            edit: true
                        },
                        email : {
                            title: ' Email ',
                            width: '5%',
                            edit: true
                        },
                        Id_Cat_Tipo_Producto : {
                            title: ' Tipo Producto ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Producto',
                            edit: true
                        },
                        Id_Cat_Error_Portabilidad : {
                            title: ' Error ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Error',
                            edit: true
                        }
                    }
                });

                //Re-load records when user click 'load records' button.
                $('#LoadRecordsBenButton').click(function (e) {
                    e.preventDefault();
                    $('#PortaBenTableContainer').jtable('load', {
                        en: $('#en').val(),
                        buscar: $('#buscar').val()
                    });
                });

                //Load all records when page is first shown
                $('#LoadRecordsBenButton').click();
                //Act SIM Ben ---------

                //Val Cal ---------
                $('#PortaValTableContainer').jtable({
                    messages: spanishMessages, //Localize
                    paging: true, //Enable paging
                    pageSize: 100, //Set page size (default: 10)
                    sorting: true, //Enable sorting
                    defaultSorting: 'Num_Cliente DESC', //Set default sorting
                    addRecordButton: false,
                    pageList: 'minimal',
                    columnResizable: true,
                    recordUpdated: function (event, data) { $('#PortaCuaTableContainer').jtable('reload'); },
                    actions: {
                        listAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/ValCal',
                        updateAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/EditValCal'
                    },
                    fields: {
                        Num_Cliente: {
                            title: '# Cliente',
                            width: '12%',
                            key: true,
                            create: false,
                            edit: true,
                            input: function (data) {
                                if (data.record) {
                                    return '<input type="text" name="Num_Cliente" class="input-reset" readonly style="width:120px" value="' + data.record.Num_Cliente + '" />';
                                } else {
                                    return '<input type="text" name="Num_Cliente" class="input-reset"  readonly style="width:120px" value="" />';
                                }
                            }
                        },
                        Id_Colaborador: {
                            title: 'Ejecutivo',
                            width: '20%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Colaborador',
                            edit: true
                        },
                        Nom_Persona_Porta: {
                            title: 'Cliente',
                            width: '20%',
                            edit: true,
                            input: function (data) {
                                if (data.record) {
                                    return '<input type="text" name="Nom_Persona_Porta" class="input-reset" readonly style="width:200px" value="' + data.record.Nom_Persona_Porta + '" />';
                                } else {
                                    return '<input type="text" name="Nom_Persona_Porta" class="input-reset"  readonly style="width:200px" value="" />';
                                }
                            }
                        },
                        NIP_Portar: {
                            title: ' NIP ',
                            width: '5%',
                            edit: false
                        },
                        Vigencia_NIP: {
                            title: 'Vigencia NIP',
                            width: '12%',
                            type: 'date',
                            edit: false
                        },
                        Id_Carrier: {
                            title: 'CARRIER',
                            width: '10%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Carrier',
                            edit: false
                        },
                        ICCDID : {
                            title: ' ICCDID ',
                            width: '5%',
                            edit: false
                        },
                        Fecha_Registro_Porta : {
                            title: ' Fecha Reg Porta',
                            width: '5%',
                            edit : false,
                            display:function(data){
                                return data.record.Fecha_Registro_Porta;

                            }
                        },
                        Id_Cat_Fase_Portabilidad : {
                            title: ' Fase Porta ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/FasePorta',
                            edit: true
                        },
                        Tel_Fijo_Alterno : {
                            title: ' Telefono Fijo',
                            width: '5%',
                            edit: false
                        },
                        email : {
                            title: ' Email ',
                            width: '5%',
                            edit: false
                        },
                        Num_Tel_Temporal : {
                            title: ' Num Provisional ',
                            width: '5%',
                            edit: false
                        },
                        Id_Cat_Tipo_Producto : {
                            title: ' Tipo Producto ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Producto',
                            edit: false
                        },
                        Id_Cat_Validacion : {
                            title: ' Status Validación ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/StatusPorta',
                            edit: true
                        },
                        Id_Cat_Error_Portabilidad : {
                            title: ' Error ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Error',
                            edit: true
                        }
                    }
                });

                //Re-load records when user click 'load records' button.
                $('#LoadRecordsVenButton').click(function (e) {
                    e.preventDefault();
                    $('#PortaValTableContainer').jtable('load', {
                        en: $('#en').val(),
                        buscar: $('#buscar').val()
                    });
                });

                //Load all records when page is first shown
                $('#LoadRecordsVenButton').click();


                //Gen Porta ---------
                $('#GenPortaTableContainer').jtable({
                    messages: spanishMessages, //Localize
                    paging: true, //Enable paging
                    pageSize: 100, //Set page size (default: 10)
                    sorting: true, //Enable sorting
                    defaultSorting: 'Num_Cliente DESC', //Set default sorting
                    addRecordButton: false,
                    pageList: 'minimal',
                    columnResizable: true,
                    recordUpdated: function (event, data) { $('#PortaCuaTableContainer').jtable('reload'); },
                    actions: {
                        listAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/GenPorta',
                        updateAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/EditGenPorta'
                    },
                    fields: {
                        Num_Cliente: {
                            title: '# Cliente',
                            width: '12%',
                            key: true,
                            create: false,
                            edit: false
                        },
                        Id_Colaborador: {
                            title: 'Ejecutivo',
                            width: '20%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Colaborador',
                            edit: false
                        },
                        Nom_Persona_Porta: {
                            title: 'Cliente',
                            width: '20%',
                            edit: false
                        },
                        NIP_Portar: {
                            title: ' NIP ',
                            width: '10%',
                            edit: true
                        },
                        Vigencia_NIP: {
                            title: 'Vigencia NIP',
                            width: '12%',
                            type: 'date',
                            edit: true
                        },
                        Id_Carrier: {
                            title: 'CARRIER',
                            width: '20%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Carrier',
                            edit: false
                        },
                        ICCDID : {
                            title: ' ICCDID ',
                            width: '5%',
                            edit: true
                        },
                        Fecha_Registro_Porta : {
                            title: ' Fecha Reg Porta',
                            width: '5%',
                            edit : false,
                            display:function(data){
                                return data.record.Fecha_Registro_Porta;

                            }
                        },
                        Id_Cat_Fase_Portabilidad : {
                            title: ' Fase Portabilidad ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/FasePorta',
                            edit: false
                        },
                        Tel_Fijo_Alterno : {
                            title: ' Telefono Fijo',
                            width: '5%',
                            edit: false
                        },
                        email : {
                            title: ' Email ',
                            width: '5%',
                            edit: false
                        },
                        Num_Tel_Temporal : {
                            title: ' Num Provisional ',
                            width: '5%',
                            edit: false
                        },
                        Id_Cat_Tipo_Producto : {
                            title: ' Tipo Producto ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Producto',
                            edit: false
                        },
                        Id_Cat_Validacion : {
                            title: ' Status Validación ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/StatusPorta',
                            edit: false
                        },
                        Id_Cat_Error_Portabilidad : {
                            title: ' Error ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Error',
                            edit: true
                        }
                    }
                });

                //Re-load records when user click 'load records' button.
                $('#LoadRecordsGenButton').click(function (e) {
                    e.preventDefault();
                    $('#GenPortaTableContainer').jtable('load', {
                        en: $('#en').val(),
                        buscar: $('#buscar').val()
                    });
                });

                //Load all records when page is first shown
                $('#LoadRecordsGenButton').click();
                //Gen Porta ---------


                //Cuarentena Cal ---------
                $('#PortaCuaTableContainer').jtable({
                    messages: spanishMessages, //Localize
                    paging: true, //Enable paging
                    pageSize: 100, //Set page size (default: 10)
                    sorting: true, //Enable sorting
                    defaultSorting: 'Num_Cliente DESC', //Set default sorting
                    addRecordButton: false,
                    pageList: 'minimal',
                    columnResizable: true,
                    recordUpdated: function (event, data) { $('#PortaCuaTableContainer').jtable('reload'); },
                    actions: {
                        listAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/CuaSIM',
                        updateAction: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/EditValCal'
                    },
                    fields: {
                        Num_Cliente: {
                            title: '# Cliente',
                            width: '12%',
                            key: true,
                            create: false,
                            edit: true,
                            input: function (data) {
                                if (data.record) {
                                    return '<input type="text" name="Num_Cliente" class="input-reset" readonly style="width:120px" value="' + data.record.Num_Cliente + '" />';
                                } else {
                                    return '<input type="text" name="Num_Cliente" class="input-reset"  readonly style="width:120px" value="" />';
                                }
                            }
                        },
                        Id_Colaborador: {
                            title: 'Ejecutivo',
                            width: '20%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Colaborador',
                            edit: true
                        },
                        Nom_Persona_Porta: {
                            title: 'Cliente',
                            width: '20%',
                            edit: true,
                            input: function (data) {
                                if (data.record) {
                                    return '<input type="text" name="Nom_Persona_Porta" class="input-reset" readonly style="width:200px" value="' + data.record.Nom_Persona_Porta + '" />';
                                } else {
                                    return '<input type="text" name="Nom_Persona_Porta" class="input-reset"  readonly style="width:200px" value="" />';
                                }
                            }
                        },
                        NIP_Portar: {
                            title: ' NIP ',
                            width: '5%',
                            edit: false
                        },
                        Vigencia_NIP: {
                            title: 'Vigencia NIP',
                            width: '12%',
                            type: 'date',
                            edit: false
                        },
                        Id_Carrier: {
                            title: 'CARRIER',
                            width: '10%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Carrier',
                            edit: false
                        },
                        ICCDID : {
                            title: ' ICCDID ',
                            width: '5%',
                            edit: false
                        },
                        Fecha_Registro_Porta : {
                            title: ' Fecha Reg Porta',
                            width: '5%',
                            edit : false,
                            display:function(data){
                                return data.record.Fecha_Registro_Porta;

                            }
                        },
                        Id_Cat_Fase_Portabilidad : {
                            title: ' Fase Porta ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/FasePorta',
                            edit: true
                        },
                        Tel_Fijo_Alterno : {
                            title: ' Telefono Fijo',
                            width: '5%',
                            edit: false
                        },
                        email : {
                            title: ' Email ',
                            width: '5%',
                            edit: false
                        },
                        Num_Tel_Temporal : {
                            title: ' Num Provisional ',
                            width: '5%',
                            edit: false
                        },
                        Id_Cat_Tipo_Producto : {
                            title: ' Tipo Producto ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Producto',
                            edit: false
                        },
                        Id_Cat_Validacion : {
                            title: ' Status Validación ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/StatusPorta',
                            edit: true
                        },
                        Id_Cat_Error_Portabilidad : {
                            title: ' Error ',
                            width: '5%',
                            options: 'http://' + $(location).attr('host') + '/'+ origen + 'RestAPI/Error',
                            edit: true
                        }
                    }
                });

                //Re-load records when user click 'load records' button.
                $('#LoadRecordsCuaButton').click(function (e) {
                    e.preventDefault();
                    $('#PortaCuaTableContainer').jtable('load', {
                        en: $('#en').val(),
                        buscar: $('#buscar').val()
                    });
                });

                //Load all records when page is first shown
                $('#LoadRecordsCuaButton').click();

                //Cuarentena Cal ---------
                
                $("#buscar_perfil").click(function(){
                    var parametros = {
                        "descripcion" : $("#descripcion").val()
                    };
                    $.ajax({
                                data:  parametros,
                                url:   '<?php echo base_url(); ?>Perfiles/contenido_busqueda_perfiles',
                                type:  'post',
                                beforeSend: function () {
                                $(".preloader-wrapper").attr("class","preloader-wrapper active");
                                },
                                success:  function (response) {              
                                  $("#contenido_perfiles").html(response);
                                  $(".preloader-wrapper").attr("class","preloader-wrapper");
                                }
                        });
                });


			});	  					
		</script>
		
		

		
		
    </body>
</html>