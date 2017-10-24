    
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


                };



                //Prepare jTable
                $('#PeopleTableContainer').jtable({
                    messages: spanishMessages, //Lozalize
                    paging: true, //Enable paging
                    pageSize: 100, //Set page size (default: 10)
                    sorting: true, //Enable sorting
                    defaultSorting: 'Num_Cliente DESC', //Set default sorting
                    addRecordButton: false,
                    pageList: 'minimal',
                    columnResizable: true,
                    actions: {
                        listAction: 'http://localhost:8888/raxa/RestAPI/ActSim',
                        createAction: '',
                        updateAction: 'PersonActions.php?action=update',
                        deleteAction: 'PersonActions.php?action=delete'
                    },
                    fields: {
                        Num_Cliente: {
                            title: '# Cliente',
                            width: '12%'
                        },
                        Id_Colaborador: {
                            title: 'Colaborador',
                            width: '30%',
                            options: 'http://localhost:8888/raxa/RestAPI/Colaborador',
                            edit: true
                        },
                        Nom_Persona_Porta: {
                            title: 'Nombre',
                            width: '30%'
                        },
                        NIP_Portar: {
                            title: ' NIP ',
                            width: '10%'
                        },
                        Vigencia_NIP: {
                            title: 'Vigencia NIP',
                            width: '12%',
                            type: 'date'
                        },
                        Id_Carrier: {
                            title: 'CARRIER',
                            width: '30%',
                            options: 'http://localhost:8888/raxa/RestAPI/Carrier',
                            edit: true
                        },
                        ICCDID : {
                            title: ' ICCDID ',
                            width: '5%'
                        },
                        Fecha_Registro_Porta : {
                            title: ' Fecha Registro ',
                            width: '5%',
                            type: 'date',
                            displayFormat: 'yy-mm-dd'
                        },
                        Id_Cat_Fase_Portabilidad : {
                            title: ' Fase Portabilidad ',
                            width: '5%',
                            options: 'http://localhost:8888/raxa/RestAPI/FasePorta',
                            edit: true
                        },
                        Tel_Fijo_Alterno : {
                            title: ' Telefono ',
                            width: '5%'
                        },
                        email : {
                            title: ' Email ',
                            width: '5%'
                        },
                        Id_Cat_Tipo_Producto : {
                            title: ' Tipo Producto ',
                            width: '5%',
                            options: 'http://localhost:8888/raxa/RestAPI/Producto',
                            edit: true
                        },
                        Id_Cat_Error_Portabilidad : {
                            title: ' Error ',
                            width: '5%',
                            options: 'http://localhost:8888/raxa/RestAPI/Error',
                            edit: true
                        }
                    }
                });

                //Load person list from server
                $('#PeopleTableContainer').jtable('load');

			});	  					
		</script>
		
		

		
		
    </body>
</html>