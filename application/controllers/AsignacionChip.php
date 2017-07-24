<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChip extends CI_Controller {
	public function index(){
		
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('ICCDID-del', 'ICCDID Del', 'required|max_length[20]|min_length[20]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'max_length'     => '* Se requiere 20 caracteres.',
					'min_length'     => '* Se requiere 20 caracteres.'
			)
		);		
        $this->form_validation->set_rules('ICCDID-al', 'ICCDID Al', 'required|max_length[20]|min_length[20]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'max_length'     => '* Se requiere 20 caracteres.',
					'min_length'     => '* Se requiere 20 caracteres.'
			)
		);		
        $this->form_validation->set_rules('Id_Colaborador', 'Colaborador', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Id_Almacen', 'Almacen', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Id_Cat_Sts_Asig_Chip', 'Estatus Asignación Chip', 'required',
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
				
				
			}
		}		
				
		$data['colaborador'] = $this->RolesModel->SelectColaborador();
		$data['almacen'] = $this->RolesModel->SelectAlmacen();
		$data['estatus'] = $this->RolesModel->SelectMaestro(2);
		$data['producto'] = $this->RolesModel->SelectMaestro(345);
		
		
        $this->load->view('templates/header.php');  
        $this->load->view('asignacionchip/home.php', $data);
        $this->load->view('templates/footer.php');			
		
		
		
		
	}
		
	public function validar(){
		if ($this->input->method() == 'post'){
			$ICCDID_del = $this->input->post('ICCDID_del');
			$ICCDID_al = $this->input->post('ICCDID_al');
			
			$del = substr($ICCDID_del, 0,19);
			$al = substr($ICCDID_al, 0,19);
			
			echo $this->AsignacionChipModel->getNumRangoICCDID($del, $al);			
		}		
	}	
		
	
	
}