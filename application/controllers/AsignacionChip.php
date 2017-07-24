<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChip extends CI_Controller {
	public function index(){
        $this->load->view('templates/header.php');  
        $this->load->view('asignacionchip/home.php');
        $this->load->view('templates/footer.php');			
		
		
	}
	
	
	
	
	
}