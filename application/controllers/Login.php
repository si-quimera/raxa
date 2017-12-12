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
	
	public function PasswordChange(){
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('PasswordNew1', 'Contraseña Nueva', 'required|callback_PasswordValid|max_length[5]|min_length[5]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 caracteres.',				
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 caracteres.'					
			)
		);	
        $this->form_validation->set_rules('PasswordNew2', 'Repetir Contraseña', 'required|callback_PasswordValid|max_length[5]|min_length[5]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 caracteres.',				
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 caracteres.'					
			)
		);			
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
				
				$id = $this->input->post('PasswordNew1');				
				$password = $this->encryption->encrypt($this->input->post('PasswordNew1'));
				
				$data = array(
					'Password'	=>  $password,											
				);		

				$error = $this->LoginModel->ChangePassword($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> La Contraseña se cambio con exito!</div>');
                    redirect(base_url(). 'Login/PasswordChange/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al cambiar la Contraseña!</div>');
                }				

			}
		}									
        $this->load->view('templates/header.php');  
        $this->load->view('login/password.php');
        $this->load->view('templates/footer.php');		
	}
	
	public function PasswordValid(){
		$PasswordNew1 = $this->input->post('PasswordNew1');
		$PasswordNew2 = $this->input->post('PasswordNew2');
		
		if($PasswordNew1 !=  $PasswordNew2){
			$this->form_validation->set_message('PasswordValid', '<i class="material-icons tiny">do_not_disturb_on</i> Las contraseñas no coinciden, por favor vuelva a escribirlas.');
			return FALSE;
		}else{
			return TRUE;
		}						
	}		
	
	
	
	
}
