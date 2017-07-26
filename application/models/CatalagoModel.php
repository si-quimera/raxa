<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalagoModel extends CI_Model{
	
    public function countZona(){
        $number = $this->db->count_all('Cat_Zona');
        return intval($number);
    }    
    
    public function getAllZona($number_per_page){
		$this->db->order_by('Id_Zona', 'DESC');  
        return $this->db->get('Cat_Zona', $number_per_page, $this->uri->segment(3));
    }  	
	
    public function deleteZona($id){
        $this->db->where('Id_Zona', $id);
        $this->db->delete('Cat_Zona');
    }   
	
    public function addZona($data){
        $this->db->insert('Cat_Zona', $data);        
        return $error = $this->db->error();
    } 	
	
	public function getByIdZona($id){
        $this->db->where('Id_Zona', $id);
        $query = $this->db->get('Cat_Zona');
        return $query->row();						
	}
	
    public function updateZona($id, $data){                
        $this->db->where('Id_Zona', $id);
        $this->db->update('Cat_Zona', $data);
        return $error = $this->db->error();                          
    }  	
	
	/* -- */
	
    public function countEdos(){
        $number = $this->db->count_all('Cat_Estado');
        return intval($number);
    }    
    
    public function getAllEdos($number_per_page){
		$this->db->order_by('Id_Estado', 'DESC');  
        return $this->db->get('Cat_Estado', $number_per_page, $this->uri->segment(3));
    }  

    public function getZona(){	
        $query = $this->db->get('Cat_Zona');            
        foreach ($query->result() as $row){
            $zona[$row->Id_Zona] = $row->Nombre;    
        }      
        return @$zona;        
    }  	
	
    public function deleteEdos($id){
        $this->db->where('Id_Estado', $id);
        $this->db->delete('Cat_Estado');
    }   	
	
	public function addEdos($data){
		$this->db->insert('Cat_Estado', $data);        
		return $error = $this->db->error();
    } 
	
	public function getByIdEdos($id){
        $this->db->where('Id_Estado', $id);
        $query = $this->db->get('Cat_Estado');
        return $query->row();						
	}
	
    public function updateEdos($id, $data){                
        $this->db->where('Id_Estado', $id);
        $this->db->update('Cat_Estado', $data);
        return $error = $this->db->error();                          
    } 	
	
	/* -- */
	
    public function countCiudad(){
        $number = $this->db->count_all('Cat_Ciudad');
        return intval($number);
    }    
    
    public function getAllCiudad($number_per_page){
		$this->db->order_by('Id_Ciudad', 'DESC');  
        return $this->db->get('Cat_Ciudad', $number_per_page, $this->uri->segment(3));
    }  

    public function getEdos(){	
        $query = $this->db->get('Cat_Estado');            
        foreach ($query->result() as $row){
            $edos[$row->Id_Estado] = $row->Nombre;    
        }      
        return @$edos;        
    }  		
	
    public function deleteCiudad($id){
        $this->db->where('Id_Ciudad', $id);
        $this->db->delete('Cat_Ciudad');
    }   	
	
	public function addCiudad($data){
		$this->db->insert('Cat_Ciudad', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdCiudad($id){
        $this->db->where('Id_Ciudad', $id);
        $query = $this->db->get('Cat_Ciudad');
        return $query->row();						
	}
	
    public function updateCiudad($id, $data){                
        $this->db->where('Id_Ciudad', $id);
        $this->db->update('Cat_Ciudad', $data);
        return $error = $this->db->error();                          
    } 	
	
	/* --- */
	
    public function countSuc(){
        $number = $this->db->count_all('Cat_Ciudad');
        return intval($number);
    }    
    
    public function getAllSuc($number_per_page){
		$this->db->order_by('Id_Sucursal', 'DESC');  
        return $this->db->get('Cat_Sucursal', $number_per_page, $this->uri->segment(3));
    }  

    public function getCiudad(){	
		$ciudad = array();
        $query = $this->db->get('Cat_Ciudad');            
        foreach ($query->result() as $row){
            $ciudad[$row->Id_Ciudad] = $row->Nombre;    
        }      
        return $ciudad;        
    }  	
	
    public function deleteSuc($id){
        $this->db->where('Id_Sucursal', $id);
        $this->db->delete('Cat_Sucursal');
    }   	
	
	public function addSuc($data){
		$this->db->insert('Cat_Sucursal', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdSuc($id){
        $this->db->where('Id_Sucursal', $id);
        $query = $this->db->get('Cat_Sucursal');
        return $query->row();						
	}
	
    public function updateSuc($id, $data){                
        $this->db->where('Id_Sucursal', $id);
        $this->db->update('Cat_Sucursal', $data);
        return $error = $this->db->error();                          
    } 	
	
	/* --- */
	
    public function countCarrier(){
        $number = $this->db->count_all('Cat_Carrier');
        return intval($number);
    }    
    
    public function getAllCarrier($number_per_page){
		$this->db->order_by('Id_Carrier', 'DESC');  
        return $this->db->get('Cat_Carrier', $number_per_page, $this->uri->segment(3));
    }  	
	
	public function deleteCarrier($id){
        $this->db->where('Id_Carrier', $id);
        $this->db->delete('Cat_Carrier');
    }   
	
    public function addCarrier($data){
        $this->db->insert('Cat_Carrier', $data);        
        return $error = $this->db->error();
    } 	
	
	public function getByIdCarrier($id){
        $this->db->where('Id_Carrier', $id);
        $query = $this->db->get('Cat_Carrier');
        return $query->row();						
	}
	
    public function updateCarrier($id, $data){                
        $this->db->where('Id_Carrier', $id);
        $this->db->update('Cat_Carrier', $data);
        return $error = $this->db->error();                          
    }  		
	
	/* --- */
	
    public function countGrupo(){
        $number = $this->db->count_all('Cat_Grupo');
        return intval($number);
    }    
    
    public function getAllGrupo($number_per_page){
		$this->db->order_by('Id_Grupo', 'DESC');  
        return $this->db->get('Cat_Grupo', $number_per_page, $this->uri->segment(4));
    } 	
	
	public function deleteGrupo($id){
        $this->db->where('Id_Grupo', $id);
        $this->db->delete('Cat_Grupo');
    }   	
	
	public function addGrupo($data){
		$this->db->insert('Cat_Grupo', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdGrupo($id){
        $this->db->where('Id_Grupo', $id);
        $query = $this->db->get('Cat_Grupo');
        return $query->row();						
	}
	
    public function updateGrupo($id, $data){                
        $this->db->where('Id_Grupo', $id);
        $this->db->update('Cat_Grupo', $data);
        return $error = $this->db->error();                          
    }			
	
	/* --- */	
	
    public function countMaestro(){
		$this->db->where('Id_Cat_Sec', NULL);
        $number = $this->db->count_all_results('Cat_Maestro');
        return intval($number);
    }    
    
    public function getAllMaestro($number_per_page){
		$this->db->where('Id_Cat_Sec', NULL);
		$this->db->order_by('Nombre', 'ASC');  
        return $this->db->get('Cat_Maestro', $number_per_page, $this->uri->segment(3));
    }  

    public function getMaestros($id){
		$this->db->where('Id_Cat_Sec', $id);
        return $this->db->get('Cat_Maestro');
    }  	
	
    public function getPathMaestro(){	
		$path = array();
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $path[$row->Id_Cat_Prim] = $row->Nombre;    
        }      
        return $path;        
    } 	
	
    public function getMaestro(){	
		//$nombres = $this->getPathMaestro();
						
		$master = array();
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
			if (is_null($row->Id_Cat_Sec)){
				$master[$row->Id_Cat_Prim] = $row->Nombre;   
			}	
        }      
        return $master;        
    } 	
	
	public function addMaestro($data){
		$this->db->insert('Cat_Maestro', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdMaestro($id){
        $this->db->where('Id_Cat_Prim', $id);
        $query = $this->db->get('Cat_Maestro');
        return $query->row();						
	}	
		
	public function deleteMaestro($id){
        $this->db->where('Id_Cat_Prim', $id);
        $this->db->delete('Cat_Maestro');
    }  	
	
    public function updateMaestro($id, $data){                
        $this->db->where('Id_Cat_Prim', $id);
        $this->db->update('Cat_Maestro', $data);
        return $error = $this->db->error();                          
    }	
	
	/* --- */
	
    public function countAlmacen(){
        $number = $this->db->count_all('Cat_Almacen');
        return intval($number);
    }    
    
    public function getAllAlmacen($number_per_page){
		$this->db->order_by('Id_Almacen', 'DESC');  
        return $this->db->get('Cat_Almacen', $number_per_page, $this->uri->segment(3));
    }  	
	
    public function getSucursal(){	
		$sucursal = array();
        $query = $this->db->get('Cat_Sucursal');            
        foreach ($query->result() as $row){
            $sucursal[$row->Id_Sucursal] = $row->Nombre;    
        }      
        return $sucursal;        
    }  	
	
	public function addAlmacen($data){
		$this->db->insert('Cat_Almacen', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdAlmacen($id){
        $this->db->where('Id_Almacen', $id);
        $query = $this->db->get('Cat_Almacen');
        return $query->row();						
	}	
		
	public function deleteAlmacen($id){
        $this->db->where('Id_Almacen', $id);
        $this->db->delete('Cat_Almacen');
    }  	
	
    public function updateAlmacen($id, $data){                
        $this->db->where('Id_Almacen', $id);
        $this->db->update('Cat_Almacen', $data);
        return $error = $this->db->error();                          
    }	
	
	/* --- */
	
    public function countColaborador(){
        $number = $this->db->count_all('Cat_Colaboradores');
        return intval($number);
    }    
    
    public function getAllColaborador($number_per_page){
		$this->db->order_by('Id_Colaborador', 'DESC');  
        return $this->db->get('Cat_Colaboradores', $number_per_page, $this->uri->segment(3));
    }  	
	
    public function getGrupo(){	
		$grupo = array();
        $query = $this->db->get('Cat_Grupo');            
        foreach ($query->result() as $row){
            $grupo[$row->Id_Grupo] = $row->Nombre;    
        }      
        return $grupo;        
    }	
	
    public function getJefes(){	
		$jefe= array();
		//Datos de cliente loggeado
		$user = $this->session->userdata('usuario');

		$this->db->where('Id_Colaborador !=',$user['Id_Colaborador']);
        $query = $this->db->get('Cat_Colaboradores');            
        foreach ($query->result() as $row){
            $jefe[$row->Id_Colaborador] = $row->Ap_Pat .' '.$row->Ap_Mat.' '.$row->Nombre;    
        }      
        return $jefe;        
    }		
	
	public function addColaborador($data){
		$this->db->insert('Cat_Colaboradores', $data);        
		return $error = $this->db->error();
    } 	
	
	public function getByIdColaborador($id){
        $this->db->where('Id_Colaborador', $id);
        $query = $this->db->get('Cat_Colaboradores');
        return $query->row();						
	}	
		
	public function deleteColaborador($id){
        $this->db->where('Id_Colaborador', $id);
        $this->db->delete('Cat_Colaboradores');
    }  	
	
    public function updateColaborador($id, $data){                
        $this->db->where('Id_Colaborador', $id);
        $this->db->update('Cat_Colaboradores', $data);
        return $error = $this->db->error();                          
    }	
	
	/* --- */
	
    public function getByRaizMaestro(){
		$raiz = array();
		$this->db->where('Id_Cat_Sec', 1);
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $raiz[$row->Id_Cat_Prim] = $row->Nombre;    
        }      
        return $raiz;        
    }	
	
    public function getSubMenu($id){
		$this->db->where('Id_Cat_Sec', $id);	
        return $this->db->get('Cat_Maestro');                   
	}
	
	public function getSubMenuPrim($id){
		$this->db->where('Id_Cat_Prim', $id);	
        return $this->db->get('Cat_Maestro');                   
	}	
	
	public function getSubMenuSec($id){
		$this->db->where('Id_Cat_Sec', $id);	
        return $this->db->get('Cat_Maestro');                   
	}	
	
	
	public function getDataByIdMaestro($id){
		$this->db->where('Id_Cat_Sec', $id);	
		$number = $this->db->count_all_results('Cat_Maestro');
		if($number == 0){
			return $this->getSubMenuPrim($id);
			//return $this->db->get('Cat_Maestro');	
		}else{
			return $this->getSubMenuSec($id);
		}
       
	
	}
	
	public function addString($data){
		$this->db->insert('Cat_Maestro', $data);        
		return $error = $this->db->error();
    }	
	
    public function deleteString($id){
		$data = array(
			'String1'	=>  "",
			'String2'	=>  "",
			'String3'	=>  "",
			'String4'	=>  "",
			'String5'	=>  ""
		); 		
				
        $this->db->where('Id_Cat_Prim', $id);
        $this->db->update('Cat_Maestro', $data);
        return $error = $this->db->error(); 
    } 	
	
    public function updateString($id, $data){                
        $this->db->where('Id_Cat_Prim', $id);
        $this->db->update('Cat_Maestro', $data);
        return $error = $this->db->error();                          
    }		
	
	
}