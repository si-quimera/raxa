<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Login | RAXA</title>
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
        <link href="<?= base_url(); ?>webroot/css/login.css" rel="stylesheet" type="text/css" />
        <!-- ################# -->
        <!-- Theme stylesheets -->
        <!-- ################# -->
        <link href="<?= base_url(); ?>webroot/css/themes/light.css" id="ssThemeColor" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/themes/main/blue.css" id="ssMainColor" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/css/themes/alternative/blue.css" id="ssAlternativeColor" rel="stylesheet" type="text/css" />

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
            <div class="login-wrapper">
				<?php
				$msg = $this->session->flashdata('msg');
				if ($msg){
					echo $msg;
				}
					echo form_open('Login/'); 
				?>  				
					<div class="panel panel-bordered z-depth-1">
						<div class="panel-header">
							<h5>
								Inicia sesión en <b class="main-text">raxa</b>
							</h5>
						</div>

						<div class="panel-body">
							<div class="row no-gutter margin-bottom-0">
								<div class="input-field col s12">
									<input type="text" name="Usuario" id="Usuario" value="" required>
									<label for="Usuario">Usuario</label>
								</div>
							</div>
							<div class="row no-gutter margin-bottom-0">
								<div class="input-field col s12">
									<input type="password" name="Password" id="Password" value="" required>
									<label for="Password">Password</label>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="right-align">
								<button type="submit" class="btn-flat waves-effect">
									ACCEDER
								</button>
							</div>
						</div>
					</div>
				</form>
            </div>
        </main>


        <!-- ################## -->
        <!-- Global javascripts -->
        <!-- ################## -->
        <script src="<?= base_url(); ?>webroot/bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/bower_components/Materialize/dist/js/materialize.js" type="text/javascript"></script>
        <!-- ################ -->
        <!-- Util javascripts -->
        <!-- ################ -->
        <script src="<?= base_url(); ?>webroot/js/utils.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>webroot/js/colors.js" type="text/javascript"></script>
        
    </body>
</html>