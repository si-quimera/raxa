<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimiento extends CI_Controller {
	
	public function ActSIM(){	
        $config['base_url'] = base_url() . 'Seguimiento/ActSIM/';
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
        $this->load->view('seguimiento/activacion.php', $data);
        $this->load->view('templates/footer.php');			
		
	}
	
	public function ActSIMBeneficio(){	
        $config['base_url'] = base_url() . 'Seguimiento/ActSIMBeneficio/';
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
        $this->load->view('seguimiento/beneficio.php', $data);
        $this->load->view('templates/footer.php');			
		
	}	
	
	public function Log($id){	
        $config['base_url'] = base_url() . 'Seguimiento/Log/';
        $config['total_rows'] = $this->SeguimientoModel->countLog($id);
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
        $result = $this->SeguimientoModel->getAllLog($config['per_page'], $id); 
        
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();
		$data['colaborador'] = $this->SeguimientoModel->SelectColaborador();
		$data['portabilidad'] = $this->AsignacionChipModel->SelectMaestro(14);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);
		$data['errores'] = $this->AsignacionChipModel->SelectMaestro(383);
		$data['status'] = $this->AsignacionChipModel->SelectMaestro(7);
		
        $this->load->view('templates/header.php');  
        $this->load->view('seguimiento/log.php', $data);
        $this->load->view('templates/footer.php');			
		
	}		
	
	
	public function editLog($id = NULL){				
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
                    redirect(base_url(). 'Catalogos/Estado/');
                }else{
                    $this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Error al registrar el Estado!</div>');
                }				

			}
		}		
		$data['edicion'] = $this->SeguimientoModel->getByIdLog($id);
		$data['status'] = $this->AsignacionChipModel->SelectMaestro(7);
		$data['error'] = $this->AsignacionChipModel->SelectMaestro(383);
        $this->load->view('seguimiento/editLog.php', $data);
        $this->load->view('templates/footer.php');			
	}	
	
	
	public function OnBloqueo(){
		if ($this->input->method() == 'post'){
			$Num_Cliente = $this->input->post('Num_Cliente');
			$ICCDID = $this->input->post('ICCDID');		
			
			$error = $this->SeguimientoModel->onBloqueo($ICCDID, $Num_Cliente);
			if ($error['code'] === 0){
				$data = array('Status' => 'ON');
			}else{
				$data = array('Status' => 'OFF');
			}			
		}else{
			$data = array('Error' => 'Unauthorized');			
		}		
		echo json_encode($data);		
	}
	
	public function OffBloqueo(){
		if ($this->input->method() == 'post'){
			$Num_Cliente = $this->input->post('Num_Cliente');
			$ICCDID = $this->input->post('ICCDID');		
			
			$error = $this->SeguimientoModel->offBloqueo($ICCDID, $Num_Cliente);
			if ($error['code'] === 0){
				$data = array('Status' => 'ON');
			}else{
				$data = array('Status' => 'OFF');
			}			
		}else{
			$data = array('Error' => 'Unauthorized');			
		}		
		echo json_encode($data);		
	}	
	
	public function CheckBloqueo(){
		if ($this->input->method() == 'post'){
			$Num_Cliente = $this->input->post('Num_Cliente');
			$ICCDID = $this->input->post('ICCDID');					
			$data = $this->SeguimientoModel->CheckBloqueo($ICCDID, $Num_Cliente);						
		}else{
			$data = array('Error' => 'Unauthorized');			
		}		
		echo json_encode($data);		
	}	
	
	public function UpdateBloqueo(){
		if ($this->input->method() == 'post'){
			$Id_Cat_Fase_Portabilidad = $this->input->post('Id_Cat_Fase_Portabilidad');
			$Id_Cat_Error_Portabilidad = $this->input->post('Id_Cat_Error_Portabilidad');
			$Num_Cliente_item = $this->input->post('Num_Cliente_item');
			$ICCDID_item = $this->input->post('ICCDID_item');
			
			$datos = array(
				'Id_Cat_Fase_Portabilidad' => $Id_Cat_Fase_Portabilidad,
				'Id_Cat_Error_Portabilidad' => $Id_Cat_Error_Portabilidad
			);							
			
			$error = $this->SeguimientoModel->updateBloqueo($ICCDID_item, $Num_Cliente_item, $datos);	
			
			
			
			if (@$error['code'] === 0){
				$data = array('Update' => 'OK');
			}else{
				$data = array('Update' => 'FAIL');
			}			
		}else{
			$data = array('Error' => 'Unauthorized');			
		}		
		echo json_encode($data);					
	}
}