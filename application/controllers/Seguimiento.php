<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

    public function ValSIM(){
        $this->load->view('templates/header.php');
        $this->load->view('seguimiento/validacion.php');
        $this->load->view('templates/footer.php');

    }

	public function ActSIM(){
        $this->load->view('templates/header.php');  
        $this->load->view('seguimiento/activacion.php');
        $this->load->view('templates/footer.php');			
		
	}
	
	public function ActSIMBeneficio(){
        $this->load->view('templates/header.php');  
        $this->load->view('seguimiento/beneficio.php');
        $this->load->view('templates/footer.php');			
		
	}

    public function GenPorta(){
        $this->load->view('templates/header.php');
        $this->load->view('seguimiento/generacion.php');
        $this->load->view('templates/footer.php');

    }

    public function Cuarentena(){
        $this->load->view('templates/header.php');
        $this->load->view('seguimiento/cuarentena.php');
        $this->load->view('templates/footer.php');

    }

}