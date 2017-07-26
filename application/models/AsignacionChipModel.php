<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChipModel extends CI_Model{
	public function getNumRangoICCDID($del, $al){		
		$query = $this->db->query("SELECT ICCDID FROM `Salida_Inv_Central` WHERE SUBSTRING(ICCDID,1,18) BETWEEN '".$del."' AND '".$al."';");
		return $query->result();		
		//return json_encode($data);				
	}	

	public function getDataRangoICCDID($del, $al){		
		$query = $this->db->query("SELECT * FROM `Salida_Inv_Central` WHERE SUBSTRING(ICCDID,1,18) BETWEEN '".$del."' AND '".$al."';");
		return $query->result();								
	}	
	
	public function asignarChip($data){
		$this->db->insert('Asignacion_Chip', $data);        
		return $error = $this->db->error();
    } 	
	
	public function updateDateInvCentral($id, $data){
        $this->db->where('ICCDID', $id);
        $this->db->update('Salida_Inv_Central', $data);
        return $error = $this->db->error();  						
	}
	
}