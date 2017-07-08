<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalagoModel extends CI_Model{
	
    public function countZona(){
        $number = $this->db->count_all('cat_zona');
        return intval($number);
    }    
    
    public function getAllZona($number_per_page){
		$this->db->order_by('zona_id', 'DESC');  
        return $this->db->get('cat_zona', $number_per_page, $this->uri->segment(3));
    }  	
	
    public function deleteZona($zona_id){
        $this->db->where('zona_id', $zona_id);
        $this->db->delete('cat_zona');
    }   
	
    public function addEmpresa($data){
        $this->db->insert('cat_zona', $data);        
        return $error = $this->db->error();
    } 	
	
	public function getByIdZona($zona_id){
		
	}
	
	
}