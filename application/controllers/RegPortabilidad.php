<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegPortabilidad extends CI_Controller {
	public function index(){
		$usuario = $this->session->userdata('usuario');
        $this->load->view('templates/header.php');  		

        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Fecha_Registro_Porta', 'Fecha de Registro', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Vigencia_NIP', 'Vigencia NIP', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Num_Cliente', 'Numero del Cliente', 'required|max_length[10]|min_length[10]|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'max_length'     => '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere 10 digitos.',
					'min_length'     => '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere 10 digitos.'				
			)
		);	
        $this->form_validation->set_rules('Nom_Persona_Porta', 'Nombre del Cliente', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('NIP_Portar', 'NIP', 'required|max_length[4]|min_length[4]|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'max_length'     => '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere 4 digitos.',
					'min_length'     => '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere 4 digitos.'					
			)
		);	
        $this->form_validation->set_rules('Id_Carrier', 'Carrier', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('Tel_Fijo_Alterno', 'Telefono Fijo Alterno', 'required|max_length[10]|min_length[10]|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'max_length'     => '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere 10 digitos.',
					'min_length'     => '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere 10 digitos.'
			)
		);	
        $this->form_validation->set_rules('email', 'Correo Electronico', 'required|valid_email',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'valid_email'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe contener una dirección de correo electrónico válida.'
			)
		);
        $this->form_validation->set_rules('ICCDID', 'ICCDID', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Cat_Tipo_Producto', 'Tipo Producto', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
		

						
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
				
				if ($_FILES['ife']['name'][0] != ""){
					$file = $this->doupload();    
					$nombre_file = $file[0];
					$status = array('error' => $this->upload->display_errors());  
					if(!empty($status['error'])){
						$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> '.strip_tags($status['error']).'</div>');             
					}				
				}else{
					$nombre_file = NULL;
				}
				$data = array(
					'Num_Cliente'	=>  $this->input->post('Num_Cliente'),
					'Id_Colaborador' => $usuario['Id_Colaborador'],
					'Nom_Persona_Porta' => $this->input->post('Nom_Persona_Porta'),
					'NIP_Portar' => $this->input->post('NIP_Portar'),
					'Vigencia_NIP' => $this->input->post('Vigencia_NIP'),
					'Id_Carrier' => $this->input->post('Id_Carrier'),
					'ICCDID' => $this->input->post('ICCDID'),
					'Fecha_Registro_Porta' => $this->input->post('Fecha_Registro_Porta'),
					'Id_Cat_Fase_Portabilidad' => $this->input->post('Id_Cat_Fase_Portabilidad'),
					'Tel_Fijo_Alterno' => $this->input->post('Tel_Fijo_Alterno'),
					'email' => $this->input->post('email'),
					'Id_Cat_Tipo_Producto' => $this->input->post('Id_Cat_Tipo_Producto'),
					'Foto_Credencial_ICCDID' => $nombre_file,				
				);		
				
				$log = array(
					'Fecha_Actividad' => $this->input->post('Fecha_Registro_Porta'),
					'Num_Cliente'	=>  $this->input->post('Num_Cliente'),
					'Id_Colaborador' => $usuario['Id_Colaborador'],
					'Descripcion' => 'REGISTRO INICIAL',
				);

				$error_update = $this->RegPortabilidadModel->updateVendidoICCDID($this->input->post('ICCDID'));
				$error_log = $this->RegPortabilidadModel->newLogPortabilidad($log);		
				
				$error = $this->RegPortabilidadModel->newPortabilidad($data);		
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Portalidad registrada correctamente!</div>');
                    redirect(base_url(). 'RegPortabilidad/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Portabilidad!</div>');
                }				
			}
		}

		$fase = $this->RegPortabilidadModel->getIdByName('Fase Portabilidad');		
		$data['fase'] = $this->RegPortabilidadModel->getDataMaster($fase->Id_Cat_Prim);
		$data['carrier'] = $this->RegPortabilidadModel->getCarrier();
		$data['ICCDID'] = $this->RegPortabilidadModel->getStatusICCDID($usuario['Id_Colaborador']);		
		$tipo = $this->RegPortabilidadModel->getIdByName('Catalogo Tipo Producto');		
		$data['tipo'] = $this->RegPortabilidadModel->getDataMaster($tipo->Id_Cat_Prim);
		$error = $this->RegPortabilidadModel->getIdByName('Error de Portabilidad');		
		$data['error'] = $this->RegPortabilidadModel->getDataMaster($error->Id_Cat_Prim);		
        $this->load->view('regportabilidad/home.php',$data);
        $this->load->view('templates/footer.php');		
		
	}

    function doupload() {
        $name_array = array();
        $count = count($_FILES['ife']['size']);
        foreach ($_FILES as $key => $value) {
            for ($s = 0; $s <= $count - 1; $s++) {
                $_FILES['userfile']['name'] = $value['name'][$s];
                $_FILES['userfile']['type'] = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error'] = $value['error'][$s];
                $_FILES['userfile']['size'] = $value['size'][$s];
                $config['upload_path']          = './webroot/ife/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 50000;
                $config['overwrite']            = FALSE;
                $config['max_width']            = 1900;
                $config['max_height']           = 9999;  
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $data = $this->upload->data();
                $name_array[] = $data['file_name'];
            }
        }
        arsort($name_array, 2);
        return $name_array;
    }













	
}

