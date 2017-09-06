<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeguimientoModel extends CI_Model{

    public function countActivacionSIM($id){
		$this->db->where('Id_Cat_Tipo_Producto', $id);	
		$number = $this->db->count_all_results('Lineas_RAXA');		
        return intval($number);
    }    
    
    public function getAllActivacionSIM($number_per_page, $id){
        if (empty($_GET['page'])) {
            $pageNo = 0;
        }else{
			$pageNo = $_GET['page'];
		}
        if (empty($_GET['order'])) {
            $order = 'Fecha_Registro_Porta';
        }else{
			$order = $_GET['order'];
		}
        if (empty($_GET['by'])) {
            $by = 'DESC';
        }else{
			$by = $_GET['by'];
		}		
		$this->db->where('Id_Cat_Tipo_Producto', $id);	
		$this->db->order_by($order, $by); 		
        return $this->db->get('Lineas_RAXA', $number_per_page, $pageNo);
    }  	
	
	
    public function SelectColaborador(){
		$colaborador = array();
        $query = $this->db->get('Cat_Colaboradores');            
        foreach ($query->result() as $row){
            $colaborador[$row->Id_Colaborador] = $row->Nombre . ' ' . $row->Ap_Pat . ' ' . $row->Ap_Mat;    
        }      
        return $colaborador; 
    } 

    public function SelectCarrier(){
		$carrier = array();
        $query = $this->db->get('Cat_Carrier');            
        foreach ($query->result() as $row){
            $carrier[$row->Id_Carrier] = $row->Nombre;    
        }      
        return $carrier; 
    } 	
	
	
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