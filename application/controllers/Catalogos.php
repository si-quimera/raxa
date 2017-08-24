<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {
	public function zona(){
        
        $config['base_url'] = base_url() . 'catalogos/zona/';
        $config['total_rows'] = $this->CatalogoModel->countZona();
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
        $result = $this->CatalogoModel->getAllZona($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/zona.php', $data);
        $this->load->view('templates/footer.php');		
	}
	
	public function newZona(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre')
                );            
                $error = $this->CatalogoModel->addZona($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Zona registrado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/zona/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Zona!</div>');
                }				

			}
		}		
				
        $this->load->view('catalogo/newZona.php');
        $this->load->view('templates/footer.php');			
	}

	public function editZona($id = NULL){				
        $this->load->view('templates/header.php');  
						
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre')
                );            
                $error = $this->CatalogoModel->updateZona($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Zona actualizada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/zona/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Zona!</div>');
                }				

			}
		}		
		
		$data['edicion'] = $this->CatalogoModel->getByIdZona($id);		
        $this->load->view('catalogo/editZona.php', $data);		
        $this->load->view('templates/footer.php');			
	}	
	

	public function delZona($id = NULL){        
        $this->CatalogoModel->deleteZona($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Zona borrada correctamente!</div>');
        redirect(base_url(). 'Catalogos/zona/');  
    }   	
	
	/* -- */
	
	public function estado(){
        
        $config['base_url'] = base_url() . 'catalogos/estado/';
        $config['total_rows'] = $this->CatalogoModel->countEdos();
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
        $result = $this->CatalogoModel->getAllEdos($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['zona'] = $this->CatalogoModel->getZona();
		
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/estado.php', $data);
        $this->load->view('templates/footer.php');		
	}	
	
	public function newEstado(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Zona', 'Zona', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Zona'	=>  $this->input->post('Id_Zona')
                );            
                $error = $this->CatalogoModel->addEdos($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Estado registrado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/estado/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Estado!</div>');
                }				

			}
		}		
		$data['zona'] = $this->CatalogoModel->getZona();
        $this->load->view('catalogo/newEstado.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function editEstado($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Zona', 'Zona', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Zona'	=>  $this->input->post('Id_Zona')
                );            
                $error = $this->CatalogoModel->updateEdos($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Estado actualizado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/estado/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Estado!</div>');
                }				

			}
		}		
		$data['zona'] = $this->CatalogoModel->getZona();
		$data['edicion'] = $this->CatalogoModel->getByIdEdos($id);
        $this->load->view('catalogo/editEstado.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delEstado($id = NULL){        
        $this->CatalogoModel->deleteEdos($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Estado borrado correctamente!</div>');
        redirect(base_url(). 'Catalogos/estado/');  
    } 	
	
	/* --- */
	
	public function ciudad(){
        
        $config['base_url'] = base_url() . 'catalogos/zona/';
        $config['total_rows'] = $this->CatalogoModel->countCiudad();
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
        $result = $this->CatalogoModel->getAllCiudad($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['estados'] = $this->CatalogoModel->getEdos();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/ciudad.php', $data);
        $this->load->view('templates/footer.php');		
	}	
	
	public function newCiudad(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Estado', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Estado'	=>  $this->input->post('Id_Estado')
                );            
                $error = $this->CatalogoModel->addCiudad($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Ciudad registrada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/ciudad/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Ciudad!</div>');
                }				

			}
		}		
		$data['estado'] = $this->CatalogoModel->getEdos();
        $this->load->view('catalogo/newCiudad.php', $data);
        $this->load->view('templates/footer.php');			
	}		
	
	public function editCiudad($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Estado', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Estado'	=>  $this->input->post('Id_Estado')
                );            
                $error = $this->CatalogoModel->updateCiudad($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Ciudad actualizada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/ciudad/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Ciudad!</div>');
                }				

			}
		}		
		$data['estados'] = $this->CatalogoModel->getEdos();
		$data['edicion'] = $this->CatalogoModel->getByIdCiudad($id);
        $this->load->view('catalogo/editCiudad.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delCiudad($id = NULL){        
        $this->CatalogoModel->deleteCiudad($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Ciudad borrada correctamente!</div>');
        redirect(base_url(). 'Catalogos/ciudad/');  
    } 		
	
	/* --- */
	
	public function sucursal(){
        
        $config['base_url'] = base_url() . 'catalogos/sucursal/';
        $config['total_rows'] = $this->CatalogoModel->countSuc();
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
        $result = $this->CatalogoModel->getAllSuc($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['ciudad'] = $this->CatalogoModel->getCiudad();
				
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/sucursal.php', $data);
        $this->load->view('templates/footer.php');		
	}	
	
	public function newSucursal(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Ciudad', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Ciudad'	=>  $this->input->post('Id_Ciudad')
                );            
                $error = $this->CatalogoModel->addSuc($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Sucursal registrada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/sucursal/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Sucursal!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalogoModel->getCiudad();
        $this->load->view('catalogo/newSucursal.php', $data);
        $this->load->view('templates/footer.php');			
	}		
	
	
	public function editSucursal($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Ciudad', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Ciudad'	=>  $this->input->post('Id_Ciudad')
                );            
                $error = $this->CatalogoModel->updateSuc($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Sucursal actualizada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/sucursal/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Sucursal!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalogoModel->getCiudad();
		$data['edicion'] = $this->CatalogoModel->getByIdSuc($id);
        $this->load->view('catalogo/editSucursal.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delSucursal($id = NULL){        
        $this->CatalogoModel->deleteSuc($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Sucursal borrada correctamente!</div>');
        redirect(base_url(). 'Catalogos/sucursal/');  
    } 		
	
	/* ---- */
	
	public function carrier(){
        
        $config['base_url'] = base_url() . 'catalogos/zona/';
        $config['total_rows'] = $this->CatalogoModel->countCarrier();
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
        $result = $this->CatalogoModel->getAllCarrier($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/carrier.php', $data);
        $this->load->view('templates/footer.php');		
	}	
	
	public function newCarrier(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre')
                );            
                $error = $this->CatalogoModel->addCarrier($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Carrier registrado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/carrier/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Carrier!</div>');
                }				

			}
		}		
				
        $this->load->view('catalogo/newCarrier.php');
        $this->load->view('templates/footer.php');			
	}	
	
	public function editCarrier($id = NULL){				
        $this->load->view('templates/header.php');  
						
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre')
                );            
                $error = $this->CatalogoModel->updateCarrier($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Carrier actualizado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/carrier/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Carrier!</div>');
                }				

			}
		}		
		
		$data['edicion'] = $this->CatalogoModel->getByIdCarrier($id);		
        $this->load->view('catalogo/editCarrier.php', $data);		
        $this->load->view('templates/footer.php');			
	}	
	
	public function delCarrier($id = NULL){        
        $this->CatalogoModel->deleteCarrier($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Carrier borrado correctamente!</div>');
        redirect(base_url(). 'Catalogos/carrier/');  
    }   	
	
	/* --- */
	
	public function grupo(){
        
        $config['base_url'] = base_url() . 'catalogos/sucursal/';
        $config['total_rows'] = $this->CatalogoModel->countGrupo();
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
        $result = $this->CatalogoModel->getAllGrupo($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['ciudad'] = $this->CatalogoModel->getCiudad();
				
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/grupo.php', $data);
        $this->load->view('templates/footer.php');		
	}	
	
	
	public function newGrupo(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Ciudad', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Ciudad'	=>  $this->input->post('Id_Ciudad')
                );            
                $error = $this->CatalogoModel->addGrupo($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Grupo registrado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/grupo/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Grupo!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalogoModel->getCiudad();
        $this->load->view('catalogo/newGrupo.php', $data);
        $this->load->view('templates/footer.php');			
	}		
	
	
	public function editGrupo($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Ciudad', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Ciudad'	=>  $this->input->post('Id_Ciudad')
                );            
                $error = $this->CatalogoModel->updateGrupo($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Grupo actualizado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/grupo/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Grupo!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalogoModel->getCiudad();
		$data['edicion'] = $this->CatalogoModel->getByIdGrupo($id);
        $this->load->view('catalogo/editGrupo.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delGrupo($id = NULL){        
        $this->CatalogoModel->deleteGrupo($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Grupo borrado correctamente!</div>');
        redirect(base_url(). 'Catalogos/grupo/');  
    }	
	
	public function maestro(){
		
        
        $config['base_url'] = base_url() . 'catalogos/maestro/';
        $config['total_rows'] = $this->CatalogoModel->countMaestro();
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
        $result = $this->CatalogoModel->getAllMaestro($config['per_page']); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['nombres'] = $this->CatalogoModel->getPathMaestro();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/maestro.php', $data);
        $this->load->view('templates/footer.php');		
	}	

	public function newMaestro(){				
        $this->load->view('templates/header.php');  
				      
		if ($this->input->method() == 'post'){			
			if ($this->input->post('Id_Cat_Sec') === '') {
				$data = array(
					'Nombre'	=>  $this->input->post('Nombre'),
				);					
			}else{
				$data = array(
					'Id_Cat_Sec'	=> $this->input->post('Id_Cat_Sec'),
					'Nombre'	=>  $this->input->post('Nombre')
				); 				
			}			
			          
			$error = $this->CatalogoModel->addMaestro($data);
			if ($error['code'] === 0){
				$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Item Maestro registrado correctamente!</div>');
				redirect(base_url(). 'Catalogos/maestro/');
			}else{
				$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Item Maestro!</div>');
			}				

		}
		
		$data['master'] = $this->CatalogoModel->getMaestro();
        $this->load->view('catalogo/newMaestro.php', $data);
        $this->load->view('templates/footer.php');			
	}	

	public function editMaestro($id = NULL){				
        $this->load->view('templates/header.php');  
				      
		if ($this->input->method() == 'post'){			
			if ($this->input->post('Id_Cat_Sec') === '') {
				$data = array(
					'Nombre'	=>  $this->input->post('Nombre')
				);					
			}else{
				$data = array(
					'Id_Cat_Sec'	=> $this->input->post('Id_Cat_Sec'),
					'Nombre'	=>  $this->input->post('Nombre')
				); 				
			}			
			          
			$error = $this->CatalogoModel->updateMaestro($id, $data);
			if ($error['code'] === 0){
				$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Item Maestro editado correctamente!</div>');
				redirect(base_url(). 'Catalogos/maestro/');
			}else{
				$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Item Maestro!</div>');
			}				

		}
		
		$data['edicion'] = $this->CatalogoModel->getByIdMaestro($id);
		$data['master'] = $this->CatalogoModel->getMaestro();
        $this->load->view('catalogo/editMaestro.php', $data);
        $this->load->view('templates/footer.php');			
	}

	public function delMaestro($id = NULL){        
        $this->CatalogoModel->deleteMaestro($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Item Maestro borrado correctamente!</div>');
        redirect(base_url(). 'Catalogos/maestro/');  
    }	

	public function almacen(){        
        $config['base_url'] = base_url() . 'catalogos/almacen/';
        $config['total_rows'] = $this->CatalogoModel->countAlmacen();
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
        $result = $this->CatalogoModel->getAllAlmacen($config['per_page']); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['sucursal'] = $this->CatalogoModel->getSucursal();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/almacen.php', $data);
        $this->load->view('templates/footer.php');		
	}	

	public function newAlmacen(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Sucursal', 'Sucursal', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Sucursal'	=>  $this->input->post('Id_Sucursal'),
					'Direccion'	=>  $this->input->post('Direccion'),
					'Colonia'	=>  $this->input->post('Colonia'),
					'CP'	=>  $this->input->post('CP')
                );            
                $error = $this->CatalogoModel->addAlmacen($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Almacen registrada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/almacen/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Almacen!</div>');
                }				

			}
		}		
		$data['sucursal'] = $this->CatalogoModel->getSucursal();
        $this->load->view('catalogo/newAlmacen.php', $data);
        $this->load->view('templates/footer.php');			
	}

	public function editAlmacen($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Sucursal', 'Sucursal', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Id_Sucursal'	=>  $this->input->post('Id_Sucursal'),
					'Direccion'	=>  $this->input->post('Direccion'),
					'Colonia'	=>  $this->input->post('Colonia'),
					'CP'	=>  $this->input->post('CP')
                );            
                $error = $this->CatalogoModel->updateAlmacen($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Almacen editado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/almacen/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al editar el Almacen!</div>');
                }				
			}
		}		
		$data['sucursal'] = $this->CatalogoModel->getSucursal();
		$data['edicion'] = $this->CatalogoModel->getByIdAlmacen($id);
        $this->load->view('catalogo/editAlmacen.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delAlmacen($id = NULL){        
        $this->CatalogoModel->deleteAlmacen($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Alamacen borrado correctamente!</div>');
        redirect(base_url(). 'Catalogos/almacen/');  
    }	

	public function colaborador(){        
        $config['base_url'] = base_url() . 'catalogos/colaborador/';
        $config['total_rows'] = $this->CatalogoModel->countColaborador();
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
        $result = $this->CatalogoModel->getAllColaborador($config['per_page']); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['grupo'] = $this->CatalogoModel->getGrupo();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/colaborador.php', $data);
        $this->load->view('templates/footer.php');		
			
	}

	public function newColaborador(){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Password', 'Password', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('User', 'Usuario', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Ap_Pat', 'Apellido Paterno', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Ap_Mat', 'Apellido Materno', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Fec_Nac', 'Fecha de Nacimiento', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Calle', 'Calle', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Colonia', 'Colonia', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Municipio', 'Municipio', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('CP', 'CP', 'required|numeric|max_length[5]|min_length[5]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 digitos.',
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 digitos.'
			)
		);	
        $this->form_validation->set_rules('Estado', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Pais', 'Pais', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('Tel', 'Tel', 'required|numeric|max_length[10]|min_length[10]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.',				
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.'				
			)
		);	
        $this->form_validation->set_rules('Cel', 'Cel', 'required|numeric|max_length[10]|min_length[10]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.',				
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.'				
			)
		);			
        $this->form_validation->set_rules('email', 'Correo Electronico', 'required|valid_email',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'valid_email'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe contener una dirección de correo electrónico válida.'
			)
		);				
        $this->form_validation->set_rules('Id_Cat_Puesto', 'Puesto', 'required',
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
				$Password = $this->encryption->encrypt($this->input->post('Password'));					
                $data = array(
					'Jefe_Inmediato'	=>  $this->input->post('Jefe_Inmediato'),
					'Id_Cat_Puesto'	=>  $this->input->post('Id_Cat_Puesto'),
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Ap_Pat'	=>  $this->input->post('Ap_Pat'),
					'Ap_Mat'	=>  $this->input->post('Ap_Mat'),
					'Fec_Nac'	=>  $this->input->post('Fec_Nac'),
					'Calle'	=>  $this->input->post('Calle'),
					'Colonia'	=>  $this->input->post('Colonia'),
					'Municipio'	=>  $this->input->post('Municipio'),
					'CP'	=>  $this->input->post('CP'),
					'Estado'	=>  $this->input->post('Estado'),
					'Pais'	=>  $this->input->post('Pais'),
					'Tel'	=>  $this->input->post('Tel'),
					'Cel'	=>  $this->input->post('Cel'),
					'IMEI'	=>  $this->input->post('IMEI'),
					'Cel2'	=>  $this->input->post('Cel2'),
					'IMEI2'	=>  $this->input->post('IMEI2'),					
					'email'	=>  $this->input->post('email'),
					'Id_Grupo'	=>  $this->input->post('Id_Grupo'),
					'Password'	=>  $Password,
					'User'	=>  $this->input->post('User'),
					'Activo' =>  $this->input->post('Activo'),
                );            
                $error = $this->CatalogoModel->addColaborador($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Colaborador registrada correctamente!</div>');
                    redirect(base_url(). 'Catalogos/colaborador/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Colaborador!</div>');
                }				

			}
		}		
							
		$data['jefes'] = $this->CatalogoModel->getJefes();
		$data['grupo'] = $this->CatalogoModel->getGrupo();	
		$data['sucursal'] = $this->CatalogoModel->getSucursal();
        $this->load->view('catalogo/newColaborador.php', $data);
        $this->load->view('templates/footer.php');			

	}

	public function editColaborador($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Password', 'Password', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('User', 'Usuario', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Ap_Pat', 'Apellido Paterno', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Ap_Mat', 'Apellido Materno', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Fec_Nac', 'Fecha de Nacimiento', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Calle', 'Calle', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Colonia', 'Colonia', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Municipio', 'Municipio', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('CP', 'CP', 'required|numeric|max_length[5]|min_length[5]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 digitos.',
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 5 digitos.'
			)
		);	
        $this->form_validation->set_rules('Estado', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Pais', 'Pais', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('Tel', 'Tel', 'required|numeric|max_length[10]|min_length[10]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.',				
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.'				
			)
		);	
        $this->form_validation->set_rules('Cel', 'Cel', 'required|numeric|max_length[10]|min_length[10]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe ser numerico.',
					'min_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.',				
					'max_length' => '<i class="material-icons tiny">do_not_disturb_on</i>%s debe tener 10 digitos.'				
			)
		);			
        $this->form_validation->set_rules('email', 'email', 'required|valid_email',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'valid_email'	=> '<i class="material-icons tiny">do_not_disturb_on</i> %s debe contener una dirección de correo electrónico válida.'
			)
		);				
        $this->form_validation->set_rules('Id_Cat_Puesto', 'Puesto', 'required',
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
				
				$Password = $this->encryption->encrypt($this->input->post('Password'));	
				
                $data = array(
					'Jefe_Inmediato'	=>  $this->input->post('Jefe_Inmediato'),
					'Id_Cat_Puesto'	=>  $this->input->post('Id_Cat_Puesto'),
                    'Nombre'	=>  $this->input->post('Nombre'),
					'Ap_Pat'	=>  $this->input->post('Ap_Pat'),
					'Ap_Mat'	=>  $this->input->post('Ap_Mat'),
					'Fec_Nac'	=>  $this->input->post('Fec_Nac'),
					'Calle'	=>  $this->input->post('Calle'),
					'Colonia'	=>  $this->input->post('Colonia'),
					'Municipio'	=>  $this->input->post('Municipio'),
					'CP'	=>  $this->input->post('CP'),
					'Estado'	=>  $this->input->post('Estado'),
					'Pais'	=>  $this->input->post('Pais'),
					'Tel'	=>  $this->input->post('Tel'),
					'Cel'	=>  $this->input->post('Cel'),
					'IMEI'	=>  $this->input->post('IMEI'),
					'Cel2'	=>  $this->input->post('Cel2'),
					'IMEI2'	=>  $this->input->post('IMEI2'),
					'email'	=>  $this->input->post('email'),
					'Id_Grupo'	=>  $this->input->post('Id_Grupo'),
					'Password'	=>  $Password,
					'User'	=>  $this->input->post('User'),	
					'Activo' =>  $this->input->post('Activo'),
                );            
                $error = $this->CatalogoModel->updateColaborador($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Colaborador editado correctamente!</div>');
                    redirect(base_url(). 'Catalogos/colaborador/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al editar el Colaborador!</div>');
                }				

			}
		}		
		$data['grupo'] = $this->CatalogoModel->getGrupo();
		$data['jefes'] = $this->CatalogoModel->getJefes();
		$data['sucursal'] = $this->CatalogoModel->getSucursal();
		$data['edicion'] = $this->CatalogoModel->getByIdColaborador($id);
        $this->load->view('catalogo/editColaborador.php', $data);
        $this->load->view('templates/footer.php');			
	}

	public function delColaborador($id = NULL){        
        $this->CatalogoModel->deleteColaborador($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Colaborador borrado correctamente!</div>');
        redirect(base_url(). 'Catalogos/colaborador/');  
    }	



	public function Cadenas(){	
		$data['raiz'] = $this->CatalogoModel->getByRaizMaestro();

        $this->load->view('templates/header.php');  
        $this->load->view('catalogo/cadenas.php', $data);
        $this->load->view('templates/footer.php');
	}


	public function selectSubs(){
		$id = $this->input->post('id');
    
		$query = $this->CatalogoModel->getSubMenu($id);
				
		echo "<option value=\"\" disabled selected>Elija su opción</option>";
        foreach ($query->result() as $row){
            echo "<option value='".$row->Id_Cat_Prim."'>".$row->Nombre."</option>";    
        }          				
	}	
	
	public function drawTabla(){
		$id = $this->input->post('id');
		$query = $this->CatalogoModel->getDataByIdMaestro($id);
		
		$table = '<table class="highlight" id="tabla_cadenas">';
		$table .=	'<thead>';
		$table .=	'	<tr>';
		$table .=	'		<th><a href="#!" class="nombre_desc" data-order="Nombre" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> Nombre <a href="#!" class="nombre_asc" data-order="Nombre" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';		
		$table .=	'		<th><a href="#!" class="string1_desc" data-order="String1" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 1 <a href="#!" class="string1_asc" data-order="String1" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string2_desc" data-order="String2" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 2 <a href="#!" class="string2_asc" data-order="String2" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string3_desc" data-order="String3" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 3 <a href="#!" class="string3_asc" data-order="String3" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string4_desc" data-order="String4" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 4 <a href="#!" class="string4_asc" data-order="String4" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string5_desc" data-order="String5" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 5 <a href="#!" class="string5_asc" data-order="String5" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th class="center-align" data-searchable="false" data-orderable="false">Actions</th>';
		$table .=	'	</tr>';
		$table .=	'</thead>';
		$table .=	'<tbody>';
		foreach ($query->result() as $row){			
		$table .=	'	<tr>';	
		$table .=	'		<td id="row0'.$row->Id_Cat_Prim.'">'.$row->Nombre.'</td>';		
		$table .=	'		<td id="row1'.$row->Id_Cat_Prim.'">'.$row->String1.'</td>';
		$table .=	'		<td id="row2'.$row->Id_Cat_Prim.'">'.$row->String2.'</td>';
		$table .=	'		<td id="row3'.$row->Id_Cat_Prim.'">'.$row->String3.'</td>';
		$table .=	'		<td id="row4'.$row->Id_Cat_Prim.'">'.$row->String4.'</td>';
		$table .=	'		<td id="row5'.$row->Id_Cat_Prim.'">'.$row->String5.'</td>';
		$table .=	'		<td class="center-align">';
		$table .=	'			<div class="btn-group">';
		$table .=	'				<a href="#!" class="edit_class btn-flat btn-small waves-effect" id="'.$row->Id_Cat_Prim.'">';
		$table .=	'					<i class="material-icons">create</i>';
		$table .=	'				</a>';													
		$table .=	'				<a href="#!" class="delete_class btn-flat btn-small waves-effect" id="'.$row->Id_Cat_Prim.'">';
		$table .=	'					<i class="material-icons">delete</i>';
		$table .=	'				</a>';		
		$table .=	'			</div>';
		$table .=	'		</td>';
		$table .=	'	</tr>';		
				}
		$table .=	'</tbody>';
		$table .=	'</table>';			
		$table .=	'<input type="hidden" name="id_prim" id="id_prim" value="'.$id.'" />';
		$table .=	'<br><br><br><br><br>';
		echo $table;
		
	}
	
	public function drawTablaOrder(){
		$id = $this->input->post('id');
		$order = $this->input->post('order');
		$by = $this->input->post('by');
		
		$query = $this->CatalogoModel->getDataByIdOrderMaestro($id, $order, $by);
		
		$table = '<table class="highlight" id="tabla_cadenas">';
		$table .=	'<thead>';
		$table .=	'	<tr>';
		$table .=	'		<th><a href="#!" class="nombre_desc" data-order="Nombre" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> Nombre <a href="#!" class="nombre_asc" data-order="Nombre" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';		
		$table .=	'		<th><a href="#!" class="string1_desc" data-order="String1" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 1 <a href="#!" class="string1_asc" data-order="String1" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string2_desc" data-order="String2" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 2 <a href="#!" class="string2_asc" data-order="String2" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string3_desc" data-order="String3" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 3 <a href="#!" class="string3_asc" data-order="String3" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string4_desc" data-order="String4" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 4 <a href="#!" class="string4_asc" data-order="String4" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th><a href="#!" class="string5_desc" data-order="String5" data-by="DESC"><i class="material-icons">arrow_drop_down</i></a> String 5 <a href="#!" class="string5_asc" data-order="String5" data-by="ASC"><i class="material-icons">arrow_drop_up</i></a></th>';
		$table .=	'		<th class="center-align" data-searchable="false" data-orderable="false">Actions</th>';
		$table .=	'	</tr>';
		$table .=	'</thead>';
		$table .=	'<tbody>';
		foreach ($query->result() as $row){			
		$table .=	'	<tr>';	
		$table .=	'		<td id="row0'.$row->Id_Cat_Prim.'">'.$row->Nombre.'</td>';		
		$table .=	'		<td id="row1'.$row->Id_Cat_Prim.'">'.$row->String1.'</td>';
		$table .=	'		<td id="row2'.$row->Id_Cat_Prim.'">'.$row->String2.'</td>';
		$table .=	'		<td id="row3'.$row->Id_Cat_Prim.'">'.$row->String3.'</td>';
		$table .=	'		<td id="row4'.$row->Id_Cat_Prim.'">'.$row->String4.'</td>';
		$table .=	'		<td id="row5'.$row->Id_Cat_Prim.'">'.$row->String5.'</td>';
		$table .=	'		<td class="center-align">';
		$table .=	'			<div class="btn-group">';
		$table .=	'				<a href="#!" class="edit_class btn-flat btn-small waves-effect" id="'.$row->Id_Cat_Prim.'">';
		$table .=	'					<i class="material-icons">create</i>';
		$table .=	'				</a>';													
		$table .=	'				<a href="#!" class="delete_class btn-flat btn-small waves-effect" id="'.$row->Id_Cat_Prim.'">';
		$table .=	'					<i class="material-icons">delete</i>';
		$table .=	'				</a>';		
		$table .=	'			</div>';
		$table .=	'		</td>';
		$table .=	'	</tr>';		
				}
		$table .=	'</tbody>';
		$table .=	'</table>';			
		$table .=	'<input type="hidden" name="id_prim" id="id_prim" value="'.$id.'" />';
		$table .=	'<br><br><br><br><br>';
		echo $table;
		
	}	
	
	public function newString(){
		if ($this->input->method() == 'post'){
			$data = array(
				'Id_Cat_Sec'	=>  $this->input->post('Id_Cat_Sec'),
				'Nombre'	=>  $this->input->post('Nombre'),
				'String1'	=>  $this->input->post('String1'),
				'String2'	=>  $this->input->post('String2'),
				'String3'	=>  $this->input->post('String3'),
				'String4'	=>  $this->input->post('String4'),
				'String5'	=>  $this->input->post('String5')
			);            
			$error = $this->CatalogoModel->addString($data);
			if ($error['code'] === 0){
				echo "ok";
			}else{
				echo "fail";
			}    		
		}
	}

	
	public function delString(){
		if ($this->input->method() == 'post'){
			$id = $this->input->post('id');
			$this->CatalogoModel->deleteString($id);
		}	
	}

	public function updateString(){
		if ($this->input->method() == 'post'){
			
			$id = $this->input->post('update_id');
			$data = array(
				'Nombre'	=>  $this->input->post('Nombre'),
				'String1'	=>  $this->input->post('String1'),
				'String2'	=>  $this->input->post('String2'),
				'String3'	=>  $this->input->post('String3'),
				'String4'	=>  $this->input->post('String4'),
				'String5'	=>  $this->input->post('String5')
			);            
			$error = $this->CatalogoModel->updateString($id, $data);
			if ($error['code'] === 0){
				echo "ok";
			}else{
				echo "fail";
			}				
		}		
	}
	
	public function genUsername(){
		if ($this->input->method() == 'post'){
			$name = $this->input->post('name');	
			$apepat = $this->input->post('apepat');	
			if($name != "" && $apepat != ""){
				$usuario = $this->randomUsername($name . ' ' . $apepat);
				$busca = $this->CatalogoModel->searchUsername($usuario);
				if($busca > 0){
					$newUsuario = substr($usuario, 0, strlen($usuario)-1);
					$ultimo = substr($usuario, strlen($usuario)-1, strlen($usuario)-1);
					$ultimo = $ultimo  + 1;	
					echo $usuario = $newUsuario . $ultimo;
				}else{
					echo $usuario;
				}
			}
		}	
	}	
	
	function randomUsername($string) {
		$pattern = " ";
		$firstPart = strstr(strtolower($string), $pattern, true);
		$secondPart = substr(strstr(strtolower($string), $pattern, false), 0,3);
		$nrRand = rand(0, 100);
		$username = trim($firstPart).trim($secondPart).trim($nrRand);
		return $username;
	}

	public function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		echo implode($pass); //turn the array into a string
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	









	
	
	
	



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
