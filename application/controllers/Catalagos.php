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
                $error = $this->CatalagoModel->addEmpresa($data);
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


	public function delZona($id = NULL){        
        $this->CatalagoModel->deleteZona($id);
        $this->session->set_flashdata('msg', '<div class="card-panel red darken-2"><i class="material-icons tiny">done_all</i> Zona borrada correctamente!</div>');
        redirect(base_url(). 'Catalagos/zona/');  
    }   	
}
