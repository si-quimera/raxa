<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		date_default_timezone_set("America/Mexico_City"); 
        $this->load->view('templates/header.php');  
        $this->load->view('home/home.php');
        $this->load->view('templates/footer.php');
	}
}
