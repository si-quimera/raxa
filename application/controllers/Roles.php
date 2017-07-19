<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
	public function index(){
        $config['base_url'] = base_url() . 'catalagos/zona/';
        $config['total_rows'] = $this->RolesModel->countRoles();
        $config['per_page'] = 10;   
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;        
        $config['prev_link'] = '<i class="material-icons">chevron_left</i></a>';
        $config['prev_tag_open'] = '<li class="waves-effect">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';          
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';   
        $config['cur_tag_open'] = '<li class="active"><a href="#!">';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $result = $this->RolesModel->getAllRoles($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();		
		$data['colaborador'] = $this->RolesModel->SelectColaborador();
		$data['sucursal'] = $this->RolesModel->SelectSucursal();
		$data['ciudad'] = $this->RolesModel->SelectCiudad();
		$data['estado'] = $this->RolesModel->SelectEstado();
		$data['zona'] = $this->RolesModel->SelectZona();		
		
        $this->load->view('templates/header.php');  
        $this->load->view('roles/home.php', $data);
        $this->load->view('templates/footer.php');				
	}
	
	public function newRol(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Id_Colaborador', 'Colaborador', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
      /*
		$this->form_validation->set_rules('Id_Jefe_Inmediato', 'Jefe Inmediato', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
	   * */
	   
        $this->form_validation->set_rules('Id_Sucursal', 'Sucursal', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Ciudad', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Estado', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Id_Zona', 'Zona', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Activo', 'Activo', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);				
		
		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Id_Colaborador'	=>  $this->input->post('Id_Colaborador'),
					'Id_Jefe_Inmediato'	=>  $this->input->post('Id_Jefe_Inmediato'),
					'Activo'	=>  $this->input->post('Activo'),
					'Id_Sucursal'	=>  $this->input->post('Id_Sucursal'),
					'Id_Ciudad'	=>  $this->input->post('Id_Ciudad'),	
					'Id_Estado'	=>  $this->input->post('Id_Estado'),	
					'Id_Zona'	=>  $this->input->post('Id_Zona')		
                );            
                $error = $this->RolesModel->addRol($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Rol registrado correctamente!</div>');
                    redirect(base_url(). 'Roles/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el rol!</div>');
                }				

			}
		}		
				
		$data['colaborador'] = $this->RolesModel->SelectColaborador();
		$data['sucursal'] = $this->RolesModel->SelectSucursal();
		$data['ciudad'] = $this->RolesModel->SelectCiudad();
		$data['estado'] = $this->RolesModel->SelectEstado();
		$data['zona'] = $this->RolesModel->SelectZona();
        $this->load->view('roles/newRol.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delRol($id = NULL){        
        $this->RolesModel->deleteRol($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Rol borrado correctamente!</div>');
        redirect(base_url(). 'Roles/');  
    } 	
	
	
	
	
	
}