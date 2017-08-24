<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegPortabilidadModel extends CI_Model{
	public function getCarrier(){
		$carrier = array();
		$this->db->order_by('Nombre', 'ASC');
        $query = $this->db->get('Cat_Carrier');            
        foreach ($query->result() as $row){
            $carrier[$row->Id_Carrier] = $row->Nombre;    
        }      
        return $carrier;        		
	}
	
    public function getIdByName($name){	
		$this->db->where('Nombre', $name);
        $query = $this->db->get('Cat_Maestro');  
		return $query->row();
    }	
	
	public function getDataMaster($id){
		$master = array();
		$this->db->where('Id_Cat_Sec', $id);
		$this->db->order_by('Nombre', 'ASC');
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $master[$row->Id_Cat_Prim] = $row->Nombre;    
        }      
        return $master;        		
	}	
	
	public function getStatusICCDID($id){
		$ICCDID = array();
		$this->db->where('Id_Colaborador', $id);
		$this->db->where('status', '0');
		$this->db->where('Vendido', '0');
		$this->db->order_by('ICCDID', 'ASC');
        $query = $this->db->get('Asignacion_Chip');            
        foreach ($query->result() as $row){
            $ICCDID[$row->ICCDID] = $row->ICCDID;    
        }      
        return $ICCDID;  		
	}
	
	public function newPortabilidad($data) {
        $this->db->insert('Lineas_RAXA', $data);        
        return $error = $this->db->error();
	}
	
	public function newLogPortabilidad($data) {
        $this->db->insert('Seg_Lineas_RAXA', $data);        
        return $error = $this->db->error();
	}	
	
	public function updateVendidoICCDID($id){
		$data = array(
			'Vendido' => 1
		);
		
        $this->db->where('ICCDID', $id);
        $this->db->update('Asignacion_Chip', $data);
        return $error = $this->db->error();  						
	}			
		
	







	
	
}