<?php
if(!$this->session->userdata('usuario') ){
    $pagina_login = base_url() . 'Login/';
    redirect($pagina_login);
} 

$usuario = $this->session->userdata('usuario');

#Modulos Accesado
$con = $this->router->fetch_class();
$met = $this->router->fetch_method();
#Si es el index
if($met == 'index'){
	$acceso = $con."/";
}else{
	$acceso = $con."/".$met."/";
}

#Busca en el arreglo
$access = 'NO';

#Busca en arreglo si existe acceso
function recursiveSearch(&$array, $val, &$access){
	
    if(is_array($array)){
        foreach($array as $key => &$arrayElement){
			if($access != 'NO') return $access;			
			//echo $arrayElement->String5 . "= " . $val . "<br>";
			if(strtolower($arrayElement->String5) == strtolower($val)){
				$access = 'SI';		
				return $access;				
			}else{								
				recursiveSearch($arrayElement->submenu, $val, $access);
			}				
			
        }
    }
	return $access;
}

$datos = recursiveSearch($usuario['raxa_menu'], $acceso, $access);

if($datos == 'NO' && $con != 'home' && $con != 'Login'){
	redirect(base_url().'error401/');
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
        <link href="<?= base_url(); ?>webroot/bower_components/Materialize/css/materialize.css" rel="stylesheet" type="text/css" />
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

        <!-- Include one of jTable styles. -->
        <link href="<?= base_url(); ?>webroot/bower_components/jtable.2.4.0/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>webroot/bower_components/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
		<?php
		$this->load->view('templates/menu.php');
		?>