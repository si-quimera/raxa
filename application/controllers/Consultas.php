<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {
	
	public function ActSIM(){	
        $config['base_url'] = base_url() . 'Consultas/ActSIM/';
        $config['total_rows'] = $this->SeguimientoModel->countActivacionSIM(378);
        $config['per_page'] = 50;   
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
        $result = $this->SeguimientoModel->getAllActivacionSIM($config['per_page'], 378); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['colaborador'] = $this->SeguimientoModel->SelectColaborador();
		$data['carrier'] = $this->SeguimientoModel->SelectCarrier();
		$data['portabilidad'] = $this->AsignacionChipModel->SelectMaestro(14);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);
		$data['errores'] = $this->AsignacionChipModel->SelectMaestro(383);
		
        $this->load->view('templates/header.php');  
        $this->load->view('consultas/activacion.php', $data);
        $this->load->view('templates/footer.php');			
		
	}
	
	public function ActSIMBeneficio(){	
        $config['base_url'] = base_url() . 'Consultas/ActSIMBeneficio/';
        $config['total_rows'] = $this->SeguimientoModel->countActivacionSIM(379);
        $config['per_page'] = 50;   
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
        $result = $this->SeguimientoModel->getAllActivacionSIM($config['per_page'], 379); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['colaborador'] = $this->SeguimientoModel->SelectColaborador();
		$data['carrier'] = $this->SeguimientoModel->SelectCarrier();
		$data['portabilidad'] = $this->AsignacionChipModel->SelectMaestro(14);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);
		
        $this->load->view('templates/header.php');  
        $this->load->view('consultas/beneficio.php', $data);
        $this->load->view('templates/footer.php');			
		
	}	
	
	public function Log($id){	
        $config['base_url'] = base_url() . 'Consultas/Log/';
        $config['total_rows'] = $this->ConsultasModel->countLog($id);
        $config['per_page'] = 50;   
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
        $result = $this->ConsultasModel->getAllLog($config['per_page'], $id); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['colaborador'] = $this->SeguimientoModel->SelectColaborador();
		$data['portabilidad'] = $this->AsignacionChipModel->SelectMaestro(14);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);
		$data['errores'] = $this->AsignacionChipModel->SelectMaestro(383);
		$data['status'] = $this->AsignacionChipModel->SelectMaestro(7);
		
        $this->load->view('templates/header.php');  
        $this->load->view('consultas/log.php', $data);
        $this->load->view('templates/footer.php');			
		
	}		
	
	
	public function editLog($id = NULL){				
        $this->load->view('templates/header.php');  
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('Id_Cat_Status', 'Status Portabilidad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Cat_Error_Portabilidad', 'Error de Portabilidad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);
        $this->form_validation->set_rules('Num_Llamadas_Entrantes', 'Num Llamadas Entrantes', 'required|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere un numero.',
			)
		);	
        $this->form_validation->set_rules('Num_Llamadas_Salientes', 'Num Llamadas Salientes', 'required|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere un numero.',
			)
		);	
        $this->form_validation->set_rules('Num_SMS', 'Num SMS', 'required|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere un numero.',
			)
		);
        $this->form_validation->set_rules('Num_Datos', 'Num Datos', 'required|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere un numero.',
			)
		);	
        $this->form_validation->set_rules('Num_Actv_Total', 'Num Actv Total', 'required|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere un numero.',
			)
		);	
        $this->form_validation->set_rules('Fecha_Recarga', 'Fecha Recarga', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('Monto_Recarga', 'Monto Recarga', 'required|numeric',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'numeric'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere un numero.',
			)
		);			
        $this->form_validation->set_rules('Fecha_Val_Actividad', 'Fecha Val Actividad', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
		
        if ($this->form_validation->run() == TRUE) {         
            if ($this->input->method() == 'post'){
                $data = array(
                    'Id_Cat_Status'	=>  $this->input->post('Id_Cat_Status'),
					'Id_Cat_Error_Portabilidad'	=>  $this->input->post('Id_Cat_Error_Portabilidad'),
					'Num_Llamadas_Entrantes'	=>  $this->input->post('Num_Llamadas_Entrantes'),
					'Num_Llamadas_Salientes'	=>  $this->input->post('Num_Llamadas_Salientes'),
					'Num_SMS'	=>  $this->input->post('Num_SMS'),
					'Num_Datos'	=>  $this->input->post('Num_Datos'),
					'Num_Actv_Total'	=>  $this->input->post('Num_Actv_Total'),
					'Fecha_Recarga'	=>  $this->input->post('Fecha_Recarga'),
					'Monto_Recarga'	=>  $this->input->post('Monto_Recarga'),
					'Fecha_Val_Actividad'	=>  $this->input->post('Fecha_Val_Actividad')
                );            
                $error = $this->ConsultasModel->updateEdos($id, $data);
                if ($error['code'] === 0){
                    $this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Estado actualizado correctamente!</div>');
                    redirect(base_url(). 'Consultas/Log/' . $id);
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al actualizar el registro!</div>');
                }				

			}
		}		
		$data['edicion'] = $this->ConsultasModel->getByIdLog($id);
		$data['status'] = $this->AsignacionChipModel->SelectMaestro(7);
		$data['error'] = $this->AsignacionChipModel->SelectMaestro(383);
        $this->load->view('consultas/editLog.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
}