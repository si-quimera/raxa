<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalagos extends CI_Controller {
	public function zona(){
        
        $config['base_url'] = base_url() . 'catalagos/zona/';
        $config['total_rows'] = $this->CatalagoModel->countZona();
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
        $result = $this->CatalagoModel->getAllZona($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/zona.php', $data);
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
                $error = $this->CatalagoModel->addZona($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Zona registrado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/zona/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Zona!</div>');
                }				

			}
		}		
				
        $this->load->view('catalago/newZona.php');
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
                $error = $this->CatalagoModel->updateZona($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Zona actualizada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/zona/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Zona!</div>');
                }				

			}
		}		
		
		$data['edicion'] = $this->CatalagoModel->getByIdZona($id);		
        $this->load->view('catalago/editZona.php', $data);		
        $this->load->view('templates/footer.php');			
	}	
	

	public function delZona($id = NULL){        
        $this->CatalagoModel->deleteZona($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Zona borrada correctamente!</div>');
        redirect(base_url(). 'Catalagos/zona/');  
    }   	
	
	/* -- */
	
	public function estado(){
        
        $config['base_url'] = base_url() . 'catalagos/estado/';
        $config['total_rows'] = $this->CatalagoModel->countEdos();
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
        $result = $this->CatalagoModel->getAllEdos($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['zona'] = $this->CatalagoModel->getZona();
		
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/estado.php', $data);
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
                $error = $this->CatalagoModel->addEdos($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Estado registrado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/estado/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Estado!</div>');
                }				

			}
		}		
		$data['zona'] = $this->CatalagoModel->getZona();
        $this->load->view('catalago/newEstado.php', $data);
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
                $error = $this->CatalagoModel->updateEdos($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Estado actualizado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/estado/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Estado!</div>');
                }				

			}
		}		
		$data['zona'] = $this->CatalagoModel->getZona();
		$data['edicion'] = $this->CatalagoModel->getByIdEdos($id);
        $this->load->view('catalago/editEstado.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delEstado($id = NULL){        
        $this->CatalagoModel->deleteEdos($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Estado borrado correctamente!</div>');
        redirect(base_url(). 'Catalagos/estado/');  
    } 	
	
	/* --- */
	
	public function ciudad(){
        
        $config['base_url'] = base_url() . 'catalagos/zona/';
        $config['total_rows'] = $this->CatalagoModel->countCiudad();
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
        $result = $this->CatalagoModel->getAllCiudad($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['estados'] = $this->CatalagoModel->getEdos();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/ciudad.php', $data);
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
                $error = $this->CatalagoModel->addCiudad($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Ciudad registrada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/ciudad/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Ciudad!</div>');
                }				

			}
		}		
		$data['estado'] = $this->CatalagoModel->getEdos();
        $this->load->view('catalago/newCiudad.php', $data);
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
                $error = $this->CatalagoModel->updateCiudad($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Ciudad actualizada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/ciudad/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Ciudad!</div>');
                }				

			}
		}		
		$data['estados'] = $this->CatalagoModel->getEdos();
		$data['edicion'] = $this->CatalagoModel->getByIdCiudad($id);
        $this->load->view('catalago/editCiudad.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delCiudad($id = NULL){        
        $this->CatalagoModel->deleteCiudad($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Ciudad borrada correctamente!</div>');
        redirect(base_url(). 'Catalagos/ciudad/');  
    } 		
	
	/* --- */
	
	public function sucursal(){
        
        $config['base_url'] = base_url() . 'catalagos/sucursal/';
        $config['total_rows'] = $this->CatalagoModel->countSuc();
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
        $result = $this->CatalagoModel->getAllSuc($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['ciudad'] = $this->CatalagoModel->getCiudad();
				
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/sucursal.php', $data);
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
                $error = $this->CatalagoModel->addSuc($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Sucursal registrada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/sucursal/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Sucursal!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalagoModel->getCiudad();
        $this->load->view('catalago/newSucursal.php', $data);
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
                $error = $this->CatalagoModel->updateSuc($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Sucursal actualizada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/sucursal/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar la Sucursal!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalagoModel->getCiudad();
		$data['edicion'] = $this->CatalagoModel->getByIdSuc($id);
        $this->load->view('catalago/editSucursal.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delSucursal($id = NULL){        
        $this->CatalagoModel->deleteSuc($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Sucursal borrada correctamente!</div>');
        redirect(base_url(). 'Catalagos/sucursal/');  
    } 		
	
	/* ---- */
	
	public function carrier(){
        
        $config['base_url'] = base_url() . 'catalagos/zona/';
        $config['total_rows'] = $this->CatalagoModel->countCarrier();
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
        $result = $this->CatalagoModel->getAllCarrier($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/carrier.php', $data);
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
                $error = $this->CatalagoModel->addCarrier($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Carrier registrado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/carrier/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Carrier!</div>');
                }				

			}
		}		
				
        $this->load->view('catalago/newCarrier.php');
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
                $error = $this->CatalagoModel->updateCarrier($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Carrier actualizado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/carrier/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Carrier!</div>');
                }				

			}
		}		
		
		$data['edicion'] = $this->CatalagoModel->getByIdCarrier($id);		
        $this->load->view('catalago/editCarrier.php', $data);		
        $this->load->view('templates/footer.php');			
	}	
	
	public function delCarrier($id = NULL){        
        $this->CatalagoModel->deleteCarrier($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Carrier borrado correctamente!</div>');
        redirect(base_url(). 'Catalagos/carrier/');  
    }   	
	
	/* --- */
	
	public function grupo(){
        
        $config['base_url'] = base_url() . 'catalagos/sucursal/';
        $config['total_rows'] = $this->CatalagoModel->countGrupo();
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
        $result = $this->CatalagoModel->getAllGrupo($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['ciudad'] = $this->CatalagoModel->getCiudad();
				
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/grupo.php', $data);
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
                $error = $this->CatalagoModel->addGrupo($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Grupo registrado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/grupo/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Grupo!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalagoModel->getCiudad();
        $this->load->view('catalago/newGrupo.php', $data);
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
                $error = $this->CatalagoModel->updateGrupo($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Grupo actualizado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/grupo/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Grupo!</div>');
                }				

			}
		}		
		$data['ciudad'] = $this->CatalagoModel->getCiudad();
		$data['edicion'] = $this->CatalagoModel->getByIdGrupo($id);
        $this->load->view('catalago/editGrupo.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delGrupo($id = NULL){        
        $this->CatalagoModel->deleteGrupo($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Grupo borrado correctamente!</div>');
        redirect(base_url(). 'Catalagos/grupo/');  
    }	
	
	public function maestro(){
		
        
        $config['base_url'] = base_url() . 'catalagos/maestro/';
        $config['total_rows'] = $this->CatalagoModel->countMaestro();
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
        $result = $this->CatalagoModel->getAllMaestro($config['per_page']); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['nombres'] = $this->CatalagoModel->getPathMaestro();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/maestro.php', $data);
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
			          
			$error = $this->CatalagoModel->addMaestro($data);
			if ($error['code'] === 0){
				$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Item Maestro registrado correctamente!</div>');
				redirect(base_url(). 'Catalagos/maestro/');
			}else{
				$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Item Maestro!</div>');
			}				

		}
		
		$data['master'] = $this->CatalagoModel->getMaestro();
        $this->load->view('catalago/newMaestro.php', $data);
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
			          
			$error = $this->CatalagoModel->updateMaestro($id, $data);
			if ($error['code'] === 0){
				$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Item Maestro editado correctamente!</div>');
				redirect(base_url(). 'Catalagos/maestro/');
			}else{
				$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Item Maestro!</div>');
			}				

		}
		
		$data['edicion'] = $this->CatalagoModel->getByIdMaestro($id);
		$data['master'] = $this->CatalagoModel->getMaestro();
        $this->load->view('catalago/editMaestro.php', $data);
        $this->load->view('templates/footer.php');			
	}

	public function delMaestro($id = NULL){        
        $this->CatalagoModel->deleteMaestro($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Item Maestro borrado correctamente!</div>');
        redirect(base_url(). 'Catalagos/maestro/');  
    }	

	public function almacen(){        
        $config['base_url'] = base_url() . 'catalagos/almacen/';
        $config['total_rows'] = $this->CatalagoModel->countAlmacen();
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
        $result = $this->CatalagoModel->getAllAlmacen($config['per_page']); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['sucursal'] = $this->CatalagoModel->getSucursal();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/almacen.php', $data);
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
                $error = $this->CatalagoModel->addAlmacen($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Almacen registrada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/almacen/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Almacen!</div>');
                }				

			}
		}		
		$data['sucursal'] = $this->CatalagoModel->getSucursal();
        $this->load->view('catalago/newAlmacen.php', $data);
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
                $error = $this->CatalagoModel->updateAlmacen($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Almacen editado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/almacen/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al editar el Almacen!</div>');
                }				
			}
		}		
		$data['sucursal'] = $this->CatalagoModel->getSucursal();
		$data['edicion'] = $this->CatalagoModel->getByIdAlmacen($id);
        $this->load->view('catalago/editAlmacen.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	public function delAlmacen($id = NULL){        
        $this->CatalagoModel->deleteAlmacen($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Alamacen borrado correctamente!</div>');
        redirect(base_url(). 'Catalagos/almacen/');  
    }	

	public function colaborador(){        
        $config['base_url'] = base_url() . 'catalagos/colaborador/';
        $config['total_rows'] = $this->CatalagoModel->countColaborador();
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
        $result = $this->CatalagoModel->getAllColaborador($config['per_page']); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['grupo'] = $this->CatalagoModel->getGrupo();
		
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/colaborador.php', $data);
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
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
				
				$Password = $this->encryption->encrypt($this->input->post('Password'));	
				
                $data = array(
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
					'email'	=>  $this->input->post('email'),
					'Id_Grupo'	=>  $this->input->post('Id_Grupo'),
					'Password'	=>  $Password,
					'User'	=>  $this->input->post('User'),
					
					
					
                );            
                $error = $this->CatalagoModel->addColaborador($data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Colaborador registrada correctamente!</div>');
                    redirect(base_url(). 'Catalagos/colaborador/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Colaborador!</div>');
                }				

			}
		}		
		$data['grupo'] = $this->CatalagoModel->getGrupo();
		$data['sucursal'] = $this->CatalagoModel->getSucursal();
        $this->load->view('catalago/newColaborador.php', $data);
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
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
				
				$Password = $this->encryption->encrypt($this->input->post('Password'));	
				
                $data = array(
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
					'email'	=>  $this->input->post('email'),
					'Id_Grupo'	=>  $this->input->post('Id_Grupo'),
					'Password'	=>  $Password,
					'User'	=>  $this->input->post('User'),															
                );            
                $error = $this->CatalagoModel->updateColaborador($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Colaborador editado correctamente!</div>');
                    redirect(base_url(). 'Catalagos/colaborador/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al editar el Colaborador!</div>');
                }				

			}
		}		
		$data['grupo'] = $this->CatalagoModel->getGrupo();
		$data['sucursal'] = $this->CatalagoModel->getSucursal();
		$data['edicion'] = $this->CatalagoModel->getByIdColaborador($id);
        $this->load->view('catalago/editColaborador.php', $data);
        $this->load->view('templates/footer.php');			
	}

	public function delColaborador($id = NULL){        
        $this->CatalagoModel->deleteColaborador($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Colaborador borrado correctamente!</div>');
        redirect(base_url(). 'Catalagos/colaborador/');  
    }	



	public function Cadenas(){	
		$data['raiz'] = $this->CatalagoModel->getByRaizMaestro();

        $this->load->view('templates/header.php');  
        $this->load->view('catalago/cadenas.php', $data);
        $this->load->view('templates/footer.php');
	}


	public function selectSubs(){
		$id = $this->input->post('id');
    
		$query = $this->CatalagoModel->getSubMenu($id);
				
		echo "<option value=\"\" disabled selected>Elija su opción</option>";
        foreach ($query->result() as $row){
            echo "<option value='".$row->Id_Cat_Prim."'>".$row->Nombre."</option>";    
        }          				
	}	
	
	public function drawTabla(){
		$id = $this->input->post('id');
		$query = $this->CatalagoModel->getDataByIdMaestro($id);
		
		$table = '<table class="highlight" id="tabla_cadenas">';
		$table .=	'<thead>';
		$table .=	'	<tr>';
		$table .=	'		<th>Nombre</th>';		
		$table .=	'		<th>String 1</th>';
		$table .=	'		<th>String 2</th>';
		$table .=	'		<th>String 3</th>';
		$table .=	'		<th>String 4</th>';
		$table .=	'		<th>String 5</th>';
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
			$error = $this->CatalagoModel->addString($data);
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
			$this->CatalagoModel->deleteString($id);
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
			$error = $this->CatalagoModel->updateString($id, $data);
			if ($error['code'] === 0){
				echo "ok";
			}else{
				echo "fail";
			}				
		}		
	}


















	
	
	
	



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
