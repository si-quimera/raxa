<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChip extends CI_Controller {
	public function index(){				
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
			
		$this->form_validation->set_rules('listar_simms[]', 'ICCDID', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Es necesario seleccionar uno o mas de un %s de la lista de abajo.'
			)								
		);		
		
        $this->form_validation->set_rules('Id_Ascendente', 'Ascendente', 'callback_selects_check',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);			
        $this->form_validation->set_rules('Id_Adjuntos', 'Adjuntos', 'callback_selects_check',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Desendentes', 'Desendentes', 'callback_selects_check',
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
				$Id_Ascendente = $this->input->post('Id_Ascendente');
				$Id_Adjuntos = $this->input->post('Id_Adjuntos');
				$Id_Desendentes = $this->input->post('Id_Desendentes');
				$Id_Cat_Sts_Asig_Chip = $this->input->post('Id_Cat_Sts_Asig_Chip');
				$Id_Cat_Tipo_Producto = $this->input->post('Id_Cat_Tipo_Producto');		
				$listar_simms = $this->input->post('listar_simms');
				$Id_Colaborador = $this->input->post('Id_Colabora');
				
								
				$ICCDID_del = $this->input->post('ICCDID_del');
				$ICCDID_al = $this->input->post('ICCDID_al');			
				
				$count = 0;
				$ok = 0;				
			
				if(count($listar_simms) > 0){	
					foreach ($listar_simms as $ICCDID) {					
						if($Id_Ascendente > 0){
							$Colaborador = $Id_Ascendente;
						}
						if($Id_Adjuntos > 0){
							$Colaborador = $Id_Adjuntos;							
						}
						if($Id_Desendentes > 0){
							$Colaborador = $Id_Desendentes;						
						}						
						$data = array(
							'ICCDID'	=>  $ICCDID,
							'Fec_Asignacion' => date("Y-m-d H:i:s"),
							'Id_Colaborador' => $Colaborador,
							'Id_Almacen' => NULL,
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
							$error = $this->AsignacionChipModel->updateDateInvCentral($ICCDID, $info);	
							$this->AsignacionChipModel->updateDateInvCentralStatus($ICCDID, $Id_Colaborador);
						}					
						unset($data);
					}
				}
				
				
				if($count > 0){
					$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Se produjo un error al asignar los SIM(s) ['.$msg_error.']</div>');
				}else{
					$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Se asignaron un total de '.$ok.' SIM(s)!</div>');
					redirect(base_url(). 'AsignacionChip/');					
				}				

			}
		}		
		#Datos Usuario			
		$user = $this->session->userdata('usuario');
				
		$data['almacen'] = $this->AsignacionChipModel->SelectAlmacen();		
		$data['estatus'] = $this->AsignacionChipModel->SelectMaestro(2);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);
						
		$data['adjunto'] = $this->AsignacionChipModel->SelectAdjunto($user['Id_Colaborador'], $user['Id_Cat_Puesto'], $user['Jefe_Inmediato']);
		$data['ascendente'] = $this->AsignacionChipModel->getSuperiorColaborador($user['Jefe_Inmediato']);
		
        $this->load->view('templates/header.php');  
        $this->load->view('asignacionchip/home.php', $data);
        $this->load->view('templates/footer.php');											
	}		

	
	public function selects_check(){
		$ascendente = $this->input->post('Id_Ascendente');
		$adjuntos = $this->input->post('Id_Adjuntos');
		$desendentes = $this->input->post('Id_Desendentes');
		
		if($ascendente == "" &&  $adjuntos == "" &&  $desendentes == ""){
			$this->form_validation->set_message('selects_check', '<i class="material-icons tiny">do_not_disturb_on</i> Es necesario selecionar un destino.');
			return FALSE;
		}else{
			return TRUE;
		}				
		
	}		
			
	public function Validar(){
		if ($this->input->method() == 'post'){
			$ICCDID_del = $this->input->post('ICCDID_del');
			$ICCDID_al = $this->input->post('ICCDID_al');			
			$del = substr($ICCDID_del, 0,18);
			$al = substr($ICCDID_al, 0,18);
			$Id_Almacen_From = $this->input->post('Id_Almacen_From');
			
			if($ICCDID_del == "" || $ICCDID_al == ""){				
				$resutl = $this->AsignacionChipModel->getNumAllICCDID($Id_Almacen_From);			
			}else{
				$resutl = $this->AsignacionChipModel->getNumRangoICCDID($del, $al, $Id_Almacen_From);		
			}
			
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
			$table .=	'			<input type="checkbox" class="filled-in" name="listar_simms[]" value="'.$row->ICCDID.'" id="'.$row->ICCDID.'"  />';
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
	
	public function ValidarAlmacen(){
		if ($this->input->method() == 'post'){
			$ICCDID_del = $this->input->post('ICCDID_del');
			$ICCDID_al = $this->input->post('ICCDID_al');	
			$Id_Almacen_From = $this->input->post('Id_Almacen_From');
			$del = substr($ICCDID_del, 0,18);
			$al = substr($ICCDID_al, 0,18);
						
			if($ICCDID_del == "" || $ICCDID_al == ""){					
				$resutl = $this->AsignacionChipModel->getNumAllAlmacenICCDID($Id_Almacen_From);
			}else{				
				$resutl = $this->AsignacionChipModel->getNumRangoAlmacenICCDID($del, $al, $Id_Almacen_From);	
			}					
			
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
			$table .=	'			<input type="checkbox" class="filled-in" name="listar_simms[]" value="'.$row->ICCDID.'" id="'.$row->ICCDID.'"  />';
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
		
	public function Almacen() {			
        $this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');	
		$this->form_validation->set_rules('listar_simms[]', 'ICCDID', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Es necesario seleccionar uno o mas de un %s de la lista de abajo.'
			)				
				
		);					
        $this->form_validation->set_rules('Id_Almacen_From', 'Almacen Origen', 'required',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Almacen_To', 'Almacen Destino', 'callback_selects_almacen',
			array(
					'required'	=> '<i class="material-icons tiny">do_not_disturb_on</i> Se requiere %s.'
			)
		);	
        $this->form_validation->set_rules('Id_Colaboradores', 'Colaborador Destino', 'callback_selects_almacen',
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
				$Id_Almacen_From = $this->input->post('Id_Almacen_From');
				$Id_Almacen_To = $this->input->post('Id_Almacen_To');
				$Id_Cat_Sts_Asig_Chip = $this->input->post('Id_Cat_Sts_Asig_Chip');
				$Id_Cat_Tipo_Producto = $this->input->post('Id_Cat_Tipo_Producto');
				$Id_Colaboradores = $this->input->post('Id_Colaboradores');
				$listar_simms = $this->input->post('listar_simms');
								
				$ICCDID_del = $this->input->post('ICCDID_del');
				$ICCDID_al = $this->input->post('ICCDID_al');			
				
				$count = 0;
				$ok = 0;				
				
				if($Id_Colaboradores == ""){
					$Id_Colaborador = NULL;
					$Id_Almacen = $Id_Almacen_To;
					
				}else if($Id_Almacen_To == ""){
					$Id_Colaborador = $Id_Colaboradores;
					$Id_Almacen = NULL;					
				}
				
				if(count($listar_simms) > 0){
					foreach ($listar_simms as $ICCDID) {

						$data = array(
							'ICCDID'	=>  $ICCDID,
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
							$error = $this->AsignacionChipModel->updateDateInvCentral($ICCDID, $info);	

							$this->AsignacionChipModel->updateAlmacenInvCentralStatus($ICCDID, $Id_Almacen_From);
							
							
						}					
						unset($data);
					}
				}
				
				
				if($count > 0){
					$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Se produjo un error al asignar los SIM(s) ['.$msg_error.']</div>');
				}else{
					$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Se asignaron un total de '.$ok.' SIM(s)!</div>');
					redirect(base_url(). 'AsignacionChip/Almacen/');					
				}				

			}
		}		
		#Datos Usuario			
		//$user = $this->session->userdata('usuario');
				
		$data['almacen'] = $this->AsignacionChipModel->SelectAlmacen();	
		$data['estatus'] = $this->AsignacionChipModel->SelectMaestro(2);
		$data['producto'] = $this->AsignacionChipModel->SelectMaestro(377);
		$data['admins'] = $this->AsignacionChipModel->getColaboradorAdmin();
		
        $this->load->view('templates/header.php');  
        $this->load->view('asignacionchip/almacen.php', $data);
        $this->load->view('templates/footer.php');							
	}
	
	
	public function selects_almacen(){
		$Id_Almacen_To = $this->input->post('Id_Almacen_To');	
		$Id_Colaboradores = $this->input->post('Id_Colaboradores');
				
		if($Id_Almacen_To != "" && $Id_Colaboradores == ""){
			return TRUE;
		}
		
		if($Id_Almacen_To == "" && $Id_Colaboradores != ""){
			return TRUE;
		}				

		if($Id_Almacen_To == "" && $Id_Colaboradores == ""){
			$this->form_validation->set_message('selects_almacen', '<i class="material-icons tiny">do_not_disturb_on</i> Es necesario selecionar un destino.');
			return FALSE;
		}
		
	}		
	
	public function ValidarColaborador(){
		if ($this->input->method() == 'post'){
			$ICCDID_del = $this->input->post('ICCDID_del');
			$ICCDID_al = $this->input->post('ICCDID_al');			
			$del = substr($ICCDID_del, 0,18);
			$al = substr($ICCDID_al, 0,18);
			$Id_Colaborador = $this->input->post('Id_Colaborador');
			
			if($ICCDID_del == "" || $ICCDID_al == ""){
				$resutl = $this->AsignacionChipModel->getNumAllColaboradorICCDID($Id_Colaborador);						
			}else{				
				$resutl = $this->AsignacionChipModel->getNumRangoColaboradorICCDID($del, $al, $Id_Colaborador);	
			}	
			
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
			$table .=	'			<input type="checkbox" class="filled-in" name="listar_simms[]" value="'.$row->ICCDID.'" id="'.$row->ICCDID.'"  />';
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
	
	public function AutoColaborador() {		
		$Id_Colaborador = $this->input->get('Id_Colaborador');
		$result = $this->AsignacionChipModel->getAutoColaborador($Id_Colaborador);		
		json_encode($result);		
	}
	
	
	
	
	
}