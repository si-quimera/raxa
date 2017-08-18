<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilesModel extends CI_Model{
	
    public function countPerfil(){
        $number = $this->db->count_all('Cat_Perfiles');
        return intval($number);
    }  	
		
    public function getAllPerfil($number_per_page){
        if (empty($_GET['page'])) {
            $pageNo = 0;
        }else{
			$pageNo = $_GET['page'];
		}
        if (empty($_GET['order'])) {
            $order = 'Id_Perfil';
        }else{
			$order = $_GET['order'];
		}
        if (empty($_GET['by'])) {
            $by = 'DESC';
        }else{
			$by = $_GET['by'];
		}			
		
		$this->db->order_by($order, $by);  
        return $this->db->get('Cat_Perfiles', $number_per_page, $pageNo);
    } 	
				
	public function addPerfil($data){
		$this->db->insert('Cat_Perfiles', $data);        
		return $error = $this->db->error();
    } 		
	
	public function deletePerfil($id){
        $this->db->where('Id_Perfil', $id);
        $this->db->delete('Cat_Perfiles');
    }  	
	
	public function getByIdPerfil($id){
        $this->db->where('Id_Perfil', $id);
        $query = $this->db->get('Cat_Perfiles');
        return $query->row();						
	}		
	
    public function updatePerfil($id, $data){                
        $this->db->where('Id_Perfil', $id);
        $this->db->update('Cat_Perfiles', $data);
        return $error = $this->db->error();                          
    }	
	
    public function countMenuPerfil(){
        $number = $this->db->count_all('Menu_Perfiles');
        return intval($number);
    }  		
	
    public function getAllMenuPerfil($number_per_page){
		$this->db->order_by('Id_Menu_Perfil', 'DESC');  
        return $this->db->get('Menu_Perfiles', $number_per_page, $this->uri->segment(3));
    } 	
	
    public function getPerfiles(){
		$perfil = array();
        $query = $this->db->get('Cat_Perfiles');            
        foreach ($query->result() as $row){
            $perfil[$row->Id_Perfil] = $row->Descripcion;    
        }      
        return $perfil;        
    }  

    public function getMenus(){
		$menu = array();
		$this->db->where('Id_Cat_Sec', 1);
		$this->db->where('Nombre', 'Menu');
        $query = $this->db->get('Cat_Maestro');            
        return $query->row();       
    }  	
	
    public function getMenusName(){
		$menu = array();

        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $menu[$row->Id_Cat_Prim] = $row->Nombre;    
        }      
        return $menu;        
    } 	
	
    public function getColaborador(){
		$colaborador = array();
        $query = $this->db->get('Cat_Colaboradores');            
        foreach ($query->result() as $row){
            $colaborador[$row->Id_Colaborador] = $row->Ap_Pat . ' ' . $row->Ap_Mat . ' ' . $row->Nombre;    
        }      
        return $colaborador;        
    }  	
	
	public function addMenuPerfil($data){
		$this->db->insert('Menu_Perfiles', $data);        
		return $error = $this->db->error();
    } 	
	
	public function deleteMenuPerfil($id){
        $this->db->where('Id_Menu_Perfil', $id);
        $this->db->delete('Menu_Perfiles');
    }  	
	
	public function getByIdMenuPerfil($id){
        $this->db->where('Id_Menu_Perfil', $id);
        $query = $this->db->get('Menu_Perfiles');
        return $query->row();						
	}	
	
    public function updateMenuPerfil($id, $data){                
        $this->db->where('Id_Menu_Perfil', $id);
        $this->db->update('Menu_Perfiles', $data);
        return $error = $this->db->error();                          
    }	
	
    public function countColaboradorPerfil(){
        $number = $this->db->count_all('Colaborador_Perfil');
        return intval($number);
    }  		
	
    public function getAllColaboradorPerfil($number_per_page){
		$this->db->order_by('Id_Colaborador', 'DESC');  
        return $this->db->get('Colaborador_Perfil', $number_per_page, $this->uri->segment(3));
    } 	
	
	public function addColaboradorPerfil($data){
		$this->db->insert('Colaborador_Perfil', $data);        
		return $error = $this->db->error();
    } 	
	
    public function getPerfil(){
		$perfil = array();
        $query = $this->db->get('Cat_Perfiles');            
        foreach ($query->result() as $row){
            $perfil[$row->Id_Perfil] = $row->Descripcion;    
        }      
        return $perfil;        
    } 	
	
	public function setSelect($field, $select){
        if($field == $select){
            return "selected";
        }
    }
	
	public function getByIdColaboradorPerfil($id){
        $this->db->where('Id_Colaborador_Perfil', $id);
        $query = $this->db->get('Colaborador_Perfil');
        return $query->row();						
	}	
	
    public function updateColaboradorPerfil($id, $data){                
        $this->db->where('Id_Colaborador_Perfil', $id);
        $this->db->update('Colaborador_Perfil', $data);
        return $error = $this->db->error();                          
    }		
	
	public function deleteColaboradorPerfil($id){
        $this->db->where('Id_Colaborador_Perfil', $id);
        $this->db->delete('Colaborador_Perfil');
    }  		

    public function loadMenu($user) {
        $qry_menu_inicial = 
           "SELECT DISTINCT m.Id_Cat_Prim, m.Id_Cat_Sec, 0 as nivel, 0 AS submenu , m.Nombre, m.String1, m.String2, m.String3, m.String4, m.String5 FROM Cat_Maestro m "
				. "	JOIN Menu_Perfiles mp ON m.Id_Cat_Prim = mp.Id_Cat_Menu "
				. " JOIN Colaborador_Perfil p ON p.Id_Perfil = mp.Id_Perfil "
				. "WHERE Id_Colaborador = '".$user."' AND m.String1 = 1 AND p.activo = 1;";

        $menu = $this->db->query($qry_menu_inicial)->result();
		sort($menu);
		foreach ($menu as $key => $value) {
			$value->submenu = $this->cargaSubMenu($value->Id_Cat_Prim, 2);
			foreach ($value->submenu as $key => $value) {
				$value->submenu = $this->cargaSubMenu($value->Id_Cat_Prim, 3);
			}
		}
		
        return $menu;	
    }
	
    private function cargaSubMenu($Id_Cat_Sec, $nivel) {		
		$qry_menu_hijos = 
           "SELECT DISTINCT m.Id_Cat_Prim,m.Id_Cat_Sec, 0 as nivel, NULL as submenu, m.Nombre, m.String1, m.String2, m.String3, m.String4, m.String5
            FROM Cat_Maestro m JOIN Menu_Perfiles mp ON m.Id_Cat_Prim = mp.Id_Cat_Menu WHERE Id_Cat_Sec = ".$Id_Cat_Sec." AND m.String1 = ".$nivel." ORDER BY 1;";		
				
        $submenu = $this->db->query($qry_menu_hijos)->result();			
        return $submenu;
    } 	

	
	
	public function getIDMaestro($item){	
		$this->db->where('Nombre', $item);
        $query = $this->db->get('Cat_Maestro');            
        return $result = $query->row_array();        		
    } 

    public function getDepto($id){
		$depto = array();
		$this->db->where('Id_Cat_Sec', $id);
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $depto[$row->Id_Cat_Prim] = $row->Nombre;    
        }      
        return $depto;        
    } 

    public function getEmpresa($id){
		$empresa = array();
		$this->db->where('Id_Cat_Sec', $id);
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $empresa[$row->Id_Cat_Prim] = $row->Nombre;    
        }      
        return $empresa;        
    } 

	public function getSubMenus($id){
		$this->db->where('Id_Cat_Sec', $id);
        return $this->db->get('Cat_Maestro');  
	}

    public function getMenusPerfiles(){
		$this->db->where('String4', 'menu');
		$this->db->order_by('String1', 'DESC');
        $query = $this->db->get('Cat_Maestro');                      
        return $query;        
    } 	

    public function getMenusSavePerfiles($id){
		$this->db->where('Id_Perfil', $id);
        $query = $this->db->get('Menu_Perfiles');                      
        return $query;        
    } 
	
    public function delConfigPerfil($id){
        $this->db->where('Id_Perfil', $id);
        $this->db->delete('Menu_Perfiles');
    }  	
	
	
    public function saveConfigPerfil($data){
        $this->db->insert_batch('Menu_Perfiles',$data);        
        return $error = $this->db->error();                           
    }  	
	
	
	
	
	
	
	
	
	
	
	
	
	
}