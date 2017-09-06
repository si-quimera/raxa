<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Error 401 | Raxa</title>
        <meta name="author" content="Felippe Rodrigo Puhle">
        
        <!-- ##### -->
        <!-- Fonts -->
        <!-- ##### -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Oswald:400" rel="stylesheet" type="text/css"/>
        <!-- ################## -->
        <!-- Global stylesheets -->
        <!-- ################## -->
        <link href="<?= base_url(); ?>webroot/bower_components/Materialize/css/materialize.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/error.css" rel="stylesheet" type="text/css" />
        <!-- ################# -->
        <!-- Theme stylesheets -->
        <!-- ################# -->
        <link href="<?= base_url(); ?>webroot/css/themes/light.css" id="ssThemeColor" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/themes/main/materialize-blue.css" id="ssMainColor" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/themes/alternative/blue.css" id="ssAlternativeColor" rel="stylesheet" type="text/css" />
        <!-- ################ -->
        <!-- Util stylesheets -->
        <!-- ################ -->
        <!-- ##### -->
        <!-- Icons -->
        <!-- ##### -->
        <link rel="shortcut icon" href="<?= base_url(); ?>webroot/img/favicon.ico" type="image/x-icon">
    </head>

    <body>
        <div id="theme-gradient"></div>
        
        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <div class="error-wrapper">
			<div id="code">
				4<i class="fa fa-frown-o"></i>1
			</div>

			<h1>Unauthorized (No autorizado)</h1>
			<p>Perfil no autorizado para este contenido, por favor contacta a tu Administrador.</p>
			<br><br>
			<h8><a href="<?= base_url() . 'home' ?>"><i class="material-icons">home</i> <br>Regresar al Inicio </a></h8>
            </div>
        </main>


        <!-- ################## -->
        <!-- Global javascripts -->
        <!-- ################## -->
        <script src="<?= base_url(); ?>webroot/bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/Materialize/js/materialize.js" type="text/javascript"></script>
        <!-- ################ -->
        <!-- Util javascripts -->
        <!-- ################ -->
        <script src="<?= base_url(); ?>webroot/js/utils.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/js/colors.js" type="text/javascript"></script>
        
    </body>
</html>