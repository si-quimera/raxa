<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegPortabilidad extends CI_Controller {
	public function index(){
        $this->load->view('templates/header.php');  
		$data['estatus'] = $this->AsignacionChipModel->SelectMaestro(2);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);		
        $this->load->view('regportabilidad/home.php',$data);
        $this->load->view('templates/footer.php');		
		
	}
}