<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalidaInvModel extends CI_Model{
	
    public function countSalidaInv(){
        $number = $this->db->count_all('Salida_Inv_Central');
        return intval($number);
    }    
    
    public function getAllSalidaInv($number_per_page){
        if (empty($_GET['page'])) {
            $pageNo = 0;
        }else{
			$pageNo = $_GET['page'];
		}
        if (empty($_GET['order'])) {
            $order = 'ICCDID';
        }else{
			$order = $_GET['order'];
		}		
		
		$this->db->order_by($order, 'DESC');  	
        return $this->db->get('Salida_Inv_Central', $number_per_page, $pageNo);
    } 
	
    public function addSalidaInv($data){
        $this->db->insert('Salida_Inv_Central', $data);        
        return $error = $this->db->error();
    } 	
}