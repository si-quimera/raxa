<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesaSeguimientoModel extends CI_Model{

	public function getGrupos(){
		return $this->db->get('Cat_Grupo');
	}

	public function getColaboradores(){
		return $this->db->get('Cat_Colaboradores');
	}

	public function validarMesaSeguimiento($id_colaborador){
		$this->db->where("Id_Colaborador",$id_colaborador);
		$query = $this->db->get('Grupos_Mesa_Seguimiento');
		return $query->result_array();
	}

	public function delConfigMesaSeguimiento($id){
		return $this->db->delete('Grupos_Mesa_Seguimiento', array('Id_Colaborador'=>$id));
	}

	public function saveConfigMesaSeguimiento($data){
		return $this->db->insert_batch('Grupos_Mesa_Seguimiento', $data); 
	}

}
?>