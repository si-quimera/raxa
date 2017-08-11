<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilesModel extends CI_Model{
	
    public function countPerfil(){
        $number = $this->db->count_all('Cat_Perfiles');
        return intval($number);
    }  	
		
    public function getAllPerfil($number_per_page){
		$this->db->order_by('Id_Perfil', 'DESC');  
        return $this->db->get('Cat_Perfiles', $number_per_page, $this->uri->segment(3));
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
		$this->db->where('String1', 1);
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
	
    public function getMenuPerfil(){
		$menu = array();
        $query = $this->db->get('Menu_Perfiles');            
        foreach ($query->result() as $row){
            $menu[$row->Id_Menu_Perfil] = $row->Descripcion;    
        }      
        return $menu;        
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
           "SELECT m.Id_Cat_Prim, 0 as nivel, 0 AS submenu , m.Nombre, m.String1, m.String2, m.String3, m.String4, m.String5
            FROM Cat_Maestro  m
            JOIN Menu_Perfiles mp ON m.Id_Cat_Prim = mp.Id_Cat_Menu
            join Colaborador_Perfil p ON p.Id_Menu_Perfil = mp.Id_Menu_Perfil 
            WHERE String1 = 1 AND Id_Colaborador = '".$user."';";

        $menu = $this->db->query($qry_menu_inicial)->result();
		$this->cargaSubMenu($menu, 1);
		

        return $menu;
    }

    private function cargaSubMenu( $menu, $nivel) {
		
		$qry_menu_hijos = 
           "SELECT m.Id_Cat_Prim, 0 as nivel, NULL as submenu, m.Nombre, m.String1, m.String2, m.String3, m.String4, m.String5
            FROM Cat_Maestro m WHERE Id_Cat_Sec =? ;";		
		
		
        foreach ($menu as $key => $value) {
            $menu_interno = $this->db->query($qry_menu_hijos, array($value->Id_Cat_Prim));
            if ($menu_interno->num_rows() > 0) {
                $value->submenu = $this->cargaSubMenu($menu_interno->result(), $nivel+1);
                $value->nivel = $nivel;
            } else {
                $value->nivel = $nivel;
            }
			
			
			
        }
        $nivel++;
		

		
        return $menu;

    }  









	
	
	
	
	
	
	
	
	
	
	
	
}