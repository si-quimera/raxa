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
            $order = 'Lineas_RAXA.Fecha_Registro_Porta';
        }else{
			$order = $_GET['order'];
		}
        if (empty($_GET['by'])) {
            $by = 'DESC';
        }else{
			$by = $_GET['by'];
		}		
		$this->db->where('Lineas_RAXA.Id_Cat_Tipo_Producto', $id);	
		$this->db->join('Cat_Colaboradores', 'Cat_Colaboradores.Id_Colaborador = Lineas_RAXA.Id_Colaborador');
		$this->db->join('Cat_Carrier', 'Cat_Carrier.Id_Carrier = Lineas_RAXA.Id_Carrier');
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
	
	
	
	
	public function onBloqueo($ICCDID, $Num_Cliente){
		$data = array(
			'bloqueo' => 1
		);		
        $this->db->where('ICCDID', $ICCDID);
		$this->db->where('Num_Cliente', $Num_Cliente);
        $this->db->update('Lineas_RAXA', $data);
        return $error = $this->db->error();  						
	}	
	
	public function offBloqueo($ICCDID, $Num_Cliente){
		$data = array(
			'bloqueo' => 0
		);		
        $this->db->where('ICCDID', $ICCDID);
		$this->db->where('Num_Cliente', $Num_Cliente);
        $this->db->update('Lineas_RAXA', $data);
        return $error = $this->db->error();  						
	}		
	
	public function checkBloqueo($ICCDID, $Num_Cliente){	
        $this->db->where('ICCDID', $ICCDID);
		$this->db->where('Num_Cliente', $Num_Cliente);
        $query = $this->db->get('Lineas_RAXA');
		return $query->row(); 					
	}	
	
	public function updateBloqueo($ICCDID, $Num_Cliente, $data){
        $this->db->where('ICCDID', $ICCDID);
		$this->db->where('Num_Cliente', $Num_Cliente);
        $this->db->update('Lineas_RAXA', $data);
        return $error = $this->db->error();  						
	}		
	
	
	
	
}