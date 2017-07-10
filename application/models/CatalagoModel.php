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
	
    public function deleteZona($id){
        $this->db->where('zona_id', $id);
        $this->db->delete('cat_zona');
    }   
	
    public function addZona($data){
        $this->db->insert('cat_zona', $data);        
        return $error = $this->db->error();
    } 	
	
	public function getByIdZona($id){
        $this->db->where('zona_id', $id);
        $query = $this->db->get('cat_zona');
        return $query->row();						
	}
	
    public function updateZona($id, $data){                
        $this->db->where('zona_id', $id);
        $this->db->update('cat_zona', $data);
        return $error = $this->db->error();                          
    }  	
	
	/* -- */
	
    public function countEdos(){
        $number = $this->db->count_all('cat_estado');
        return intval($number);
    }    
    
    public function getAllEdos($number_per_page){
		$this->db->order_by('estado_id', 'DESC');  
        return $this->db->get('cat_estado', $number_per_page, $this->uri->segment(3));
    }  

    public function getZona(){	
        $query = $this->db->get('cat_zona');            
        foreach ($query->result() as $row){
            $zona[$row->zona_id] = $row->nombre;    
        }      
        return @$zona;        
    }  	
	
    public function deleteEdos($id){
        $this->db->where('estado_id', $id);
        $this->db->delete('cat_estado');
    }   	
	
	public function addEdos($data){
		$this->db->insert('cat_estado', $data);        
		return $error = $this->db->error();
    } 
	
	public function getByIdEdos($id){
        $this->db->where('estado_id', $id);
        $query = $this->db->get('cat_estado');
        return $query->row();						
	}
	
    public function updateEdos($id, $data){                
        $this->db->where('estado_id', $id);
        $this->db->update('cat_estado', $data);
        return $error = $this->db->error();                          
    } 	
	
	/* -- */
	
    public function countCiudad(){
        $number = $this->db->count_all('cat_ciudad');
        return intval($number);
    }    
    
    public function getAllCiudad($number_per_page){
		$this->db->order_by('ciudad_id', 'DESC');  
        return $this->db->get('cat_ciudad', $number_per_page, $this->uri->segment(3));
    }  

    public function getEdos(){	
        $query = $this->db->get('cat_estado');            
        foreach ($query->result() as $row){
            $edos[$row->estado_id] = $row->nombre;    
        }      
        return @$edos;        
    }  		
	
    public function deleteCiudad($id){
        $this->db->where('ciudad_id', $id);
        $this->db->delete('cat_ciudad');
    }   	
	
	public function addCiudad($data){
		$this->db->insert('cat_ciudad', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdCiudad($id){
        $this->db->where('ciudad_id', $id);
        $query = $this->db->get('cat_ciudad');
        return $query->row();						
	}
	
    public function updateCiudad($id, $data){                
        $this->db->where('ciudad_id', $id);
        $this->db->update('cat_ciudad', $data);
        return $error = $this->db->error();                          
    } 	
	
	/* --- */
	
    public function countSuc(){
        $number = $this->db->count_all('cat_ciudad');
        return intval($number);
    }    
    
    public function getAllSuc($number_per_page){
		$this->db->order_by('sucursal_id', 'DESC');  
        return $this->db->get('cat_sucursal', $number_per_page, $this->uri->segment(3));
    }  

    public function getCiudad(){	
        $query = $this->db->get('cat_ciudad');            
        foreach ($query->result() as $row){
            $ciudad[$row->ciudad_id] = $row->nombre;    
        }      
        return @$ciudad;        
    }  	
	
    public function deleteSuc($id){
        $this->db->where('sucursal_id', $id);
        $this->db->delete('cat_sucursal');
    }   	
	
	public function addSuc($data){
		$this->db->insert('cat_sucursal', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdSuc($id){
        $this->db->where('sucursal_id', $id);
        $query = $this->db->get('cat_sucursal');
        return $query->row();						
	}
	
    public function updateSuc($id, $data){                
        $this->db->where('sucursal_id', $id);
        $this->db->update('cat_sucursal', $data);
        return $error = $this->db->error();                          
    } 	
	
	/* --- */
	
    public function countCarrier(){
        $number = $this->db->count_all('cat_carrier');
        return intval($number);
    }    
    
    public function getAllCarrier($number_per_page){
		$this->db->order_by('carrier_id', 'DESC');  
        return $this->db->get('cat_carrier', $number_per_page, $this->uri->segment(3));
    }  	
	
	public function deleteCarrier($id){
        $this->db->where('carrier_id', $id);
        $this->db->delete('cat_carrier');
    }   
	
    public function addCarrier($data){
        $this->db->insert('cat_carrier', $data);        
        return $error = $this->db->error();
    } 	
	
	public function getByIdCarrier($id){
        $this->db->where('carrier_id', $id);
        $query = $this->db->get('cat_carrier');
        return $query->row();						
	}
	
    public function updateCarrier($id, $data){                
        $this->db->where('carrier_id', $id);
        $this->db->update('cat_carrier', $data);
        return $error = $this->db->error();                          
    }  		
	
	/* --- */
	
    public function countGrupo(){
        $number = $this->db->count_all('cat_grupo');
        return intval($number);
    }    
    
    public function getAllGrupo($number_per_page){
		$this->db->order_by('grupo_id', 'DESC');  
        return $this->db->get('cat_grupo', $number_per_page, $this->uri->segment(3));
    } 	
	
	public function deleteGrupo($id){
        $this->db->where('grupo_id', $id);
        $this->db->delete('cat_grupo');
    }   	
	
	public function addGrupo($data){
		$this->db->insert('cat_grupo', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdGrupo($id){
        $this->db->where('grupo_id', $id);
        $query = $this->db->get('cat_grupo');
        return $query->row();						
	}
	
    public function updateGrupo($id, $data){                
        $this->db->where('grupo_id', $id);
        $this->db->update('cat_grupo', $data);
        return $error = $this->db->error();                          
    }			
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}