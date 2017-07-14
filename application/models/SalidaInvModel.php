<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalidaInvModel extends CI_Model{
	
    public function countSalidaInv(){
        $number = $this->db->count_all('Salida_Inv_Central');
        return intval($number);
    }    
    
    public function getAllSalidaInv($number_per_page){
		$this->db->order_by('ICCDID', 'DESC');  
        return $this->db->get('Salida_Inv_Central', $number_per_page, $this->uri->segment(3));
    } 
	
    public function addSalidaInv($data){
        $this->db->insert('Salida_Inv_Central', $data);        
        return $error = $this->db->error();
    } 	
}