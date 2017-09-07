<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultasModel extends CI_Model{


    public function countLog($id){
		$this->db->where('Num_Cliente', $id);	
		$number = $this->db->count_all_results('Seg_Lineas_RAXA');		
        return intval($number);
    }    
    
    public function getAllLog($number_per_page, $id){
        if (empty($_GET['page'])) {
            $pageNo = 0;
        }else{
			$pageNo = $_GET['page'];
		}
        if (empty($_GET['order'])) {
            $order = 'Fecha_Actividad';
        }else{
			$order = $_GET['order'];
		}
        if (empty($_GET['by'])) {
            $by = 'DESC';
        }else{
			$by = $_GET['by'];
		}		
		$this->db->where('Num_Cliente', $id);	
		$this->db->order_by($order, $by); 		
        return $this->db->get('Seg_Lineas_RAXA', $number_per_page, $pageNo);
    } 	
	
	public function getByIdLog($id){
        $this->db->where('Num_Cliente', $id);
        $query = $this->db->get('Seg_Lineas_RAXA');
        return $query->row();						
	}
	
		
}