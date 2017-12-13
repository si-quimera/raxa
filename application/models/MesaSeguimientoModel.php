<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesaSeguimientoModel extends CI_Model{

	public function getGrupos(){
		return $this->db->get('cat_grupo');
	}

	public function getColaboradores(){
		return $this->db->get('cat_colaboradores');
	}

	public function validarMesaSeguimiento($id_colaborador){
		$this->db->where("Id_Colaborador",$id_colaborador);
		$query = $this->db->get('grupos_mesa_seguimiento');
		return $query->result_array();
	}

	public function delConfigMesaSeguimiento($id){
		return $this->db->delete('grupos_mesa_seguimiento', array('Id_Colaborador'=>$id));
	}

	public function saveConfigMesaSeguimiento($data){
		return $this->db->insert_batch('grupos_mesa_seguimiento', $data); 
	}

}
?>