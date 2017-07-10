<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalagos extends CI_Controller {
	public function index()
	{	
        $this->load->view('templates/header.php');  
        $this->load->view('catalago/catalago.php');
        $this->load->view('templates/footer.php');
	}
	
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('zona_id', 'Zona', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'zona_id'	=>  $this->input->post('zona_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('zona_id', 'Zona', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'zona_id'	=>  $this->input->post('zona_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('estado_id', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'estado_id'	=>  $this->input->post('estado_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('estado_id', 'Estado', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'estado_id'	=>  $this->input->post('estado_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('ciudad_id', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'ciudad_id'	=>  $this->input->post('ciudad_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('ciudad_id', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'ciudad_id'	=>  $this->input->post('ciudad_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('ciudad_id', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'ciudad_id'	=>  $this->input->post('ciudad_id')
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
        $this->form_validation->set_rules('nombre', 'Nombre', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('ciudad_id', 'Ciudad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'nombre'	=>  $this->input->post('nombre'),
					'ciudad_id'	=>  $this->input->post('ciudad_id')
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
