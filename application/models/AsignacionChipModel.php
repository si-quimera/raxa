<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChipModel extends CI_Model{
	public function getNumRangoICCDID($del, $al){		
		$query = $this->db->query("SELECT ICCDID FROM `Salida_Inv_Central` WHERE SUBSTRING(ICCDID,1,19) BETWEEN '".$del."' AND '".$al."';");
		$data = $query->result_array();
		
		echo  json_encode($data);				
	}	
	
}