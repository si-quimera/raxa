<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfiles extends CI_Controller {

	public function index(){
        
        $config['base_url'] = base_url() . 'Perfiles/index/';
        $config['total_rows'] = $this->PerfilesModel->countPerfil();
        $config['per_page'] = 10;   
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;        
		$config['reuse_query_string'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';		
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
        $result = $this->PerfilesModel->getAllPerfil($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		
		$empresa_id = $this->PerfilesModel->getIDMaestro('Empresas');
		$depto_id = $this->PerfilesModel->getIDMaestro('Departamentos');
		$data['depto'] = $this->PerfilesModel->getDepto($depto_id['Id_Cat_Prim']);
		$data['empresa'] = $this->PerfilesModel->getEmpresa($empresa_id['Id_Cat_Prim']);				
		
        $this->load->view('templates/header.php');  
        $this->load->view('perfiles/perfiles.php', $data);
        $this->load->view('templates/footer.php');		
	}

	public function newPerfil(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
		
		
        $this->form_validation->set_rules('Id_Cat_Empresa', 'Empresa', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Cat_Departamento', 'Departamento', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
					'Descripcion'	=>  $this->input->post('Descripcion'),
					'Id_Cat_Departamento'	=>  $this->input->post('Id_Cat_Departamento'),
					'Id_Cat_Empresa'	=>  $this->input->post('Id_Cat_Empresa')
                );            
                $error = $this->PerfilesModel->addPerfil($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Perfil registrado correctamente!</div>');
                    redirect(base_url(). 'Perfiles/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Perfil!</div>');
                }																							
			}
		}
		
		
		$empresa_id = $this->PerfilesModel->getIDMaestro('Empresas');
		$depto_id = $this->PerfilesModel->getIDMaestro('Departamentos');
		$data['depto'] = $this->PerfilesModel->getDepto($depto_id['Id_Cat_Prim']);
		$data['empresa'] = $this->PerfilesModel->getEmpresa($empresa_id['Id_Cat_Prim']);
		
				
		$this->load->view('perfiles/newPerfil.php', $data);
        $this->load->view('templates/footer.php');			
	}

	public function editPerfil($id){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
		
        $this->form_validation->set_rules('Id_Cat_Empresa', 'Empresa', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Cat_Departamento', 'Departamento', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
		
	
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
					'Descripcion'	=>  $this->input->post('Descripcion'),
					'Id_Cat_Departamento'	=>  $this->input->post('Id_Cat_Departamento'),
					'Id_Cat_Empresa'	=>  $this->input->post('Id_Cat_Empresa')
                );            
                $error = $this->PerfilesModel->updatePerfil($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Perfil registrado correctamente!</div>');
                    redirect(base_url(). 'Perfiles/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Perfil!</div>');
                }																							
			}
		}
	
		$empresa_id = $this->PerfilesModel->getIDMaestro('Empresas');
		$depto_id = $this->PerfilesModel->getIDMaestro('Departamentos');
		$data['depto'] = $this->PerfilesModel->getDepto($depto_id['Id_Cat_Prim']);
		$data['empresa'] = $this->PerfilesModel->getEmpresa($empresa_id['Id_Cat_Prim']);
		
		$data['edicion'] = $this->PerfilesModel->getByIdPerfil($id);
				
		$this->load->view('perfiles/editPerfil.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	
	public function delPerfil($id = NULL){        
        $this->PerfilesModel->deletePerfil($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Perfil borrado correctamente!</div>');
        redirect(base_url(). 'Perfiles/');  
    }
	
	public function MenuPerfil(){
        $config['base_url'] = base_url() . 'Perfiles/MenuPerfil/';
        $config['total_rows'] = $this->PerfilesModel->countMenuPerfil();
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
        $result = $this->PerfilesModel->getAllMenuPerfil($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['perfiles'] = $this->PerfilesModel->getPerfiles();
		$data['menus'] = $this->PerfilesModel->getMenusName();				
		
        $this->load->view('templates/header.php');  
        $this->load->view('perfiles/menuPerfil.php', $data);
        $this->load->view('templates/footer.php');		
	}
	
	public function newMenuPerfil(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Id_Perfil', 'Perfil', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Cat_Menu', 'Menu', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Descripcion', 'Descripción', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
					'Id_Perfil'	=>  $this->input->post('Id_Perfil'),
                    'Id_Cat_Menu'	=>  $this->input->post('Id_Cat_Menu'),
					'Descripcion'	=>  $this->input->post('Descripcion')
                );            
                $error = $this->PerfilesModel->addMenuPerfil($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i>Asignacion Menu > Perfil registrado correctamente!</div>');
                    redirect(base_url(). 'Perfiles/MenuPerfil');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Asignacion Menu > Perfil!</div>');
                }																							
			}
		}
		$data['perfiles'] = $this->PerfilesModel->getPerfiles();
		$data['menus'] = $this->PerfilesModel->getMenus();
		$this->load->view('perfiles/newMenuPerfil.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function editMenuPerfil($id){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Id_Perfil', 'Perfil', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Cat_Menu', 'Menu', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('Descripcion', 'Descripción', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
					'Id_Perfil'	=>  $this->input->post('Id_Perfil'),
                    'Id_Cat_Menu'	=>  $this->input->post('Id_Cat_Menu'),
					'Descripcion'	=>  $this->input->post('Descripcion')					
                );            
                $error = $this->PerfilesModel->updateMenuPerfil($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Edicion de Asignación Menu > Perfil registrado correctamente!</div>');
                    redirect(base_url(). 'Perfiles/MenuPerfil');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error en la Edicion Asignacion Menu > Perfil!</div>');
                }																							
			}
		}
		$data['perfiles'] = $this->PerfilesModel->getPerfiles();
		$data['menus'] = $this->PerfilesModel->getMenus();
		$data['edicion'] = $this->PerfilesModel->getByIdMenuPerfil($id);
		$this->load->view('perfiles/editMenuPerfil.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	
	public function delMenuPerfil($id = NULL){        
        $this->PerfilesModel->deleteMenuPerfil($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Asignacion Menu > Perfil borrado correctamente!</div>');
        redirect(base_url(). 'Perfiles/MenuPerfil');  
    }	
	
	public function ColaboradorPerfil(){
        $config['base_url'] = base_url() . 'Perfiles/ColaboradorPerfil/';
        $config['total_rows'] = $this->PerfilesModel->countColaboradorPerfil();
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
        $result = $this->PerfilesModel->getAllColaboradorPerfil($config['per_page']);   
		 
		$data['perfiles'] = $this->PerfilesModel->getPerfil();
		$data['colaborador'] = $this->PerfilesModel->getColaborador();		
		$data['pagination'] = $this->pagination->create_links();
        $data['consulta'] = $result;			
		
        $this->load->view('templates/header.php');  
        $this->load->view('perfiles/colaboradorPerfil.php', $data);
        $this->load->view('templates/footer.php');		
	}	
	
	public function newColaboradorPerfil(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Id_Colaborador', 'Colaborador', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Perfil', 'Perfil', 'required',
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
                    'Id_Perfil'	=>  $this->input->post('Id_Perfil'),
					'Activo'	=>  $this->input->post('Activo')
                );            
                $error = $this->PerfilesModel->addColaboradorPerfil($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i>Asignacion Colaborador > Perfil registrado correctamente!</div>');
                    redirect(base_url(). 'Perfiles/ColaboradorPerfil');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Asignacion Colaborador > Perfil!</div>');
                }																							
			}
		}
		$data['perfiles'] = $this->PerfilesModel->getPerfil();
		$data['colaborador'] = $this->PerfilesModel->getColaborador();
		$this->load->view('perfiles/newColaboradorPerfil.php', $data);
        $this->load->view('templates/footer.php');			
	}	
		
	public function editColaboradorPerfil($id){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Id_Colaborador', 'Colaborador', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Perfil', 'Perfil', 'required',
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
                    'Id_Perfil'	=>  $this->input->post('Id_Perfil'),
					'Activo'	=>  $this->input->post('Activo')
                );            
                $error = $this->PerfilesModel->updateColaboradorPerfil($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i>Editar Colaborador > Perfil registrado correctamente!</div>');
                    redirect(base_url(). 'Perfiles/ColaboradorPerfil');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Editar Colaborador > Perfil!</div>');
                }																							
			}
		}
		$data['perfiles'] = $this->PerfilesModel->getPerfil();
		$data['colaborador'] = $this->PerfilesModel->getColaborador();
		$data['edicion'] = $this->PerfilesModel->getByIdColaboradorPerfil($id);
		
		$this->load->view('perfiles/editColaboradorPerfil.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	
	public function delColaboradorPerfil($id = NULL){        
        $this->PerfilesModel->deleteColaboradorPerfil($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Eliminar Colaborador > Perfil borrado correctamente!</div>');
        redirect(base_url(). 'Perfiles/ColaboradorPerfil');  
    }		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}