<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChip extends CI_Controller {
	public function index(){				
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
        $this->form_validation->set_rules('ICCDID_del', 'ICCDID Del', 'required|max_length[20]|min_length[20]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'max_length'     => '* Se requiere 20 caracteres.',
					'min_length'     => '* Se requiere 20 caracteres.'
			)
		);		
        $this->form_validation->set_rules('ICCDID_al', 'ICCDID Al', 'required|max_length[20]|min_length[20]',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.',
					'max_length'     => '* Se requiere 20 caracteres.',
					'min_length'     => '* Se requiere 20 caracteres.'
			)
		);		
		
        $this->form_validation->set_rules('Id_Colaborador', 'Colaborador', 'callback_selects_check',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);		
        $this->form_validation->set_rules('Id_Almacen', 'Almacen', 'callback_selects_check',
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
				$Id_Almacen = $this->input->post('Id_Almacen');
				$Id_Colaborador = $this->input->post('Id_Colaborador');				
				$Id_Cat_Sts_Asig_Chip = $this->input->post('Id_Cat_Sts_Asig_Chip');
				$Id_Cat_Tipo_Producto = $this->input->post('Id_Cat_Tipo_Producto');		
				
				$ICCDID_del = $this->input->post('ICCDID_del');
				$ICCDID_al = $this->input->post('ICCDID_al');			
				$del = substr($ICCDID_del, 0,19);
				$al = substr($ICCDID_al, 0,19);				
				
				$count = 0;
				$ok = 0;			
				
				$ICCDID_data = $this->AsignacionChipModel->getDataRangoICCDID($del, $al);	
				foreach ($ICCDID_data as $row) { 

					if($Id_Almacen == ""){
						$Id_Almacen = NULL;
					}

					if($Id_Colaborador == ""){
						$Id_Colaborador = NULL;
					}					
					
					$data = array(
						'ICCDID'	=>  $row->ICCDID,
						'Fec_Asignacion' => date("Y-m-d H:i:s"),
						'Id_Colaborador' => $Id_Colaborador,
						'Id_Almacen' => $Id_Almacen,
						'Id_Cat_Sts_Asig_Chip' => $Id_Cat_Sts_Asig_Chip,
						'Id_Cat_Tipo_Producto' => $Id_Cat_Tipo_Producto												
					);
					$error = $this->AsignacionChipModel->asignarChip($data);
					
					if ($error['code'] !== 0){
						$count = $count + 1;
						$msg_error = $error['code'] . ' / ' . $error['message'];
						break;
					}else{
						$ok = $ok + 1;
						
						$info = array(
							'Fecha_Salida_RAXA_Ctrl' => date("Y-m-d H:i:s")
						);
						$error = $this->AsignacionChipModel->updateDateInvCentral($row->ICCDID, $info);																								
					}															
					unset($data);																									
				}

				if($count > 0){
					$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Se produjo un error al importar el archivo ['.$msg_error.']</div>');
				}else{
					$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Se asignaron un total de '.$ok.' Chip(s)!</div>');
					redirect(base_url(). 'AsignacionChip/');					
				}	
				
				
			}
		}		
		#Datos Usuario			
		$user = $this->session->userdata('usuario');
				
		$data['almacen'] = $this->AsignacionChipModel->SelectAlmacen();
		$data['estatus'] = $this->AsignacionChipModel->SelectMaestro(2);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(346);
		$data['adjunto'] = $this->AsignacionChipModel->SelectAdjunto($user['Id_Colaborador'], $user['Id_Cat_Puesto'], $user['Jefe_Inmediato']);
		$data['ascendente'] = $this->AsignacionChipModel->getSuperiorColaborador($user['Jefe_Inmediato']);

		
        $this->load->view('templates/header.php');  
        $this->load->view('asignacionchip/home.php', $data);
        $this->load->view('templates/footer.php');											
	}
	
	public function selects_check(){
		$almacen = $this->input->post('Id_Almacen');	
		$colaborador = $this->input->post('Id_Colaborador');
		
		if($almacen > 0 &&  $colaborador > 0){
			$this->form_validation->set_message('selects_check', '<i class="material-icons tiny">do_not_disturb_on</i> Es necesario selecionar un Almacen o un Colaborador');
			return FALSE;
		}else if($almacen == "" &&  $colaborador == ""){
			$this->form_validation->set_message('selects_check', '<i class="material-icons tiny">do_not_disturb_on</i> Es necesario selecionar un Almacen o un Colaborador');
			return FALSE;
		}else{
			return TRUE;
		}				
	}	
	
	
	
		
	public function validar(){
		if ($this->input->method() == 'post'){
			$ICCDID_del = $this->input->post('ICCDID_del');
			$ICCDID_al = $this->input->post('ICCDID_al');			
			$del = substr($ICCDID_del, 0,19);
			$al = substr($ICCDID_al, 0,19);
			
			$resutl = $this->AsignacionChipModel->getNumRangoICCDID($del, $al);			
			
			$table = '<br><br>';
			$table .= '<table class="striped" id="tabla_ICCDID">';
			$table .=	'<thead>';
			$table .=	'	<tr>';
			$table .=	'		<th class="teal lighten-2 white-text"></th>';				
			$table .=	'		<th class="teal lighten-2 white-text">Cons.</th>';			
			$table .=	'		<th class="teal lighten-2 white-text">ICCDID</th>';		
			$table .=	'		<th class="teal lighten-2 white-text">Asignado a:</th>';
			$table .=	'	</tr>';
			$table .=	'</thead>';
			$table .=	'<tbody>';
			$count = 1;
			foreach ($resutl as $key => $row) { 
				//echo $row->Fecha_Salida_RAXA_Ctrl;
				if(!is_null($row->Fecha_Salida_RAXA_Ctrl)){
					$data = $this->AsignacionChipModel->getDataAsignadoChip($row->ICCDID);				
					if(!is_null($data->Id_Colaborador)){
						$nombre = $this->AsignacionChipModel->getNameColaboradorChip($data->Id_Colaborador);
					}else if(!is_null($data->Id_Almacen)){
						$nombre = $this->AsignacionChipModel->getNameAlmacenChip($data->Id_Almacen);
					}		
				}else{
					$nombre = "-";
				}
			$table .=	'	<tr>';	
			$table .=	'		<td>';
			$table .=	'			<input type="checkbox" class="filled-in" id="'.$row->ICCDID.'"  />';
			$table .=	'			<label for="'.$row->ICCDID.'"></label>';
			$table .=	'		</td>';			
			$table .=	'		<td>'.$count.'</td>';			
			$table .=	'		<td>'.$row->ICCDID.'</td>';		
			$table .=	'		<td class="orange-text text-darken-4">'.$nombre.'</td>';
			$table .=	'	</tr>';		
				$nombre = "";
				$count ++;
			}
			$table .=	'</tbody>';
			$table .=	'</table>';			
			$table .=	'<br><br><br><br><br>';
			echo $table;									
		}		
	}	
		
	
	
}