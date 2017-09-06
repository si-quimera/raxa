    
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
				
		<!--
		<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>webroot/bower_components/jsgrid/jsgrid.min.css" />
		<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>webroot/bower_components/jsgrid/jsgrid-theme.min.css" />
		<script type="text/javascript" src="<?= base_url(); ?>webroot/bower_components/jsgrid/jsgrid.min.js"></script>
		-->
  
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
			});	  					
		</script>
		
		

		
		
    </body>
</html>