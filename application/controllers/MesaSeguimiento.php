<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesaSeguimiento extends CI_Controller {

	public function index(){
		$this->load->model('MesaSeguimientoModel');
		$data['grupos'] = $this->MesaSeguimientoModel->getGrupos();
		$data['colaboradores'] = $this->MesaSeguimientoModel->getColaboradores();			
        $this->load->view('templates/header.php');  
        $this->load->view('mesaseguimiento/home.php', $data);
        $this->load->view('templates/footer.php');	
	}

	public function loadSelectMesaSeguimiento(){
		$this->load->model('MesaSeguimientoModel');
		$grupos = $this->MesaSeguimientoModel->getGrupos();
		foreach ($grupos->result() as $key) {
			echo "<option value=".$key->Id_Grupo.">".$key->Nombre."</option>";
		}
	}

	public function getConfigMesaSeguimiento(){
		if ($this->input->method() == 'post'){
			$this->load->model('MesaSeguimientoModel');
			$grupos = $this->MesaSeguimientoModel->getGrupos();
			$array_grupos = array();
			foreach ($grupos->result() as $key) {
				$array_grupos[$key->Id_Grupo] = $key->Nombre;
			}

			$Id_Colaborador = $this->input->post("Id_MesaSeguimiento");
			$datos_guardados = $this->MesaSeguimientoModel->validarMesaSeguimiento($Id_Colaborador);
			if (count($datos_guardados) == 0) {
				 $select[] = array('bandera' => '0');  
			} else {
				foreach ($datos_guardados as $key) {
					$select[] = array('bandera' => '1', 'id_grupo' => $key["Id_Grupo"], 'Grupo' => $array_grupos[$key["Id_Grupo"]]);
				}
			}
			echo json_encode($select);
		}
	}

	public function saveMesaSeguimiento(){
		if ($this->input->method() == 'post'){
			$this->load->model('MesaSeguimientoModel');
			$grupo = $this->input->post('grupo');
            $Id_MesaSeguimiento = $this->input->post('Id_MesaSeguimiento');       
			
            #Borramos todo lo que existe
            $this->MesaSeguimientoModel->delConfigMesaSeguimiento($Id_MesaSeguimiento); 
            
			if(count($grupo) > 0){
				foreach ($grupo as $valor) {
					if ($valor == 0) {
					} else {
						$data[] = array(
							'Id_Grupo'   =>  $valor, 
							'Id_Colaborador'  =>  $Id_MesaSeguimiento
						);
					}
				}     
            #Guardamos todo lo nuevo
            $this->MesaSeguimientoModel->saveConfigMesaSeguimiento($data);       
			} 
            echo "ok";
		}
	}
}
?>