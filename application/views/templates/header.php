<?php
if(!$this->session->userdata('usuario') ){
    $pagina_login = base_url() . 'Login/';
    redirect($pagina_login);
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>RAXA</title>
        <meta name="author" content="Quimera Soft">
        
        <!-- ##### -->
        <!-- Fonts -->
        <!-- ##### -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <!-- ################## -->
        <!-- Global stylesheets -->
        <!-- ################## -->
        <link href="<?= base_url(); ?>webroot/bower_components/Materialize/dist/css/materialize.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/bower_components/code-prettify/src/prettify.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/admin.css" rel="stylesheet" type="text/css" />
        <!-- ################# -->
        <!-- Theme stylesheets -->
        <!-- ################# -->
        <link href="<?= base_url(); ?>webroot/css/themes/light.css" id="ssThemeColor" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/themes/main/blue.css" id="ssMainColor" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/themes/alternative/blue.css" id="ssAlternativeColor" rel="stylesheet" type="text/css" />
        <!-- ################ -->
        <!-- Util stylesheets -->
        <!-- ################ -->
        <link href="<?= base_url(); ?>webroot/css/theme-switcher.css" rel="stylesheet" type="text/css" />
        <!-- ################ -->
        <!-- Page stylesheets -->
        <!-- ################ -->
        <link href="<?= base_url(); ?>webroot/css/pages/dashboard.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>webroot/css/extra.css" rel="stylesheet" type="text/css" />
        <!-- ##### -->
        <!-- Icons -->
        <!-- ##### -->
        <link rel="shortcut icon" href="<?= base_url(); ?>webroot/img/favicon.ico" type="image/x-icon">		
    </head>

    <body>
		<?php
		$this->load->view('templates/menu.php');
		?>