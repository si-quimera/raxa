<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){	 
        $this->load->view('login/login.php');
		if ($this->input->method() == 'post'){
			$result = $this->LoginModel->checkUser($this->input->post('Usuario'), $this->input->post('Password'));
			$data['usuario'] = $result; 
            if (!is_array($result) && strpos($result,"Error:") >= 0){
                $this->session->set_flashdata('msg', '<div class="card-panel red darken-4">'.$result.'</div>');
                redirect(base_url(). 'Login/'); 
            } else {
                #Datos Usuario				
				$id_user = $data['usuario']['Id_Colaborador'];
				$data['usuario']['raxa_menu'] = $this->PerfilesModel->loadMenu($id_user);								
				$data['usuario']['perfil'] = $this->LoginModel->getPerfilData($id_user);
                $this->session->set_userdata($data);                    				
                redirect(base_url()); 
            }									
		}
	}
	
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    } 	
	
	
	
	
	
	
}
