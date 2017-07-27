<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolesModel extends CI_Model{
    public function countRoles(){
        $number = $this->db->count_all('Roles_Sistema');
        return intval($number);
    }    
    
    public function getAllRoles($number_per_page){
		$this->db->order_by('Id_Cat_Rol', 'DESC');  
        return $this->db->get('Roles_Sistema', $number_per_page, $this->uri->segment(3));
    }  		
	
    public function SelectColaborador($id){
		$colaborador = array();
		$this->db->where('Jefe_Inmediato', $id);
        $query = $this->db->get('Cat_Colaboradores');            
        foreach ($query->result() as $row){
            $colaborador[$row->Id_Colaborador] = $row->Nombre . ' ' . $row->Ap_Pat . ' ' . $row->Ap_Mat;    
        }      
        return $colaborador; 
    } 
	
    public function SelectSucursal(){
		$sucursal = array();
        $query = $this->db->get('Cat_Sucursal');            
        foreach ($query->result() as $row){
            $sucursal[$row->Id_Sucursal] = $row->Nombre;    
        }      
        return $sucursal; 
    } 

    public function SelectCiudad(){
		$ciudad = array();
        $query = $this->db->get('Cat_Ciudad');            
        foreach ($query->result() as $row){
            $ciudad[$row->Id_Ciudad] = $row->Nombre;    
        }      
        return $ciudad; 
    } 	
	
    public function SelectEstado(){
		$estado = array();
        $query = $this->db->get('Cat_Estado');            
        foreach ($query->result() as $row){
            $estado[$row->Id_Estado] = $row->Nombre;    
        }      
        return $estado; 
    } 
	
    public function SelectZona(){
		$zona = array();
        $query = $this->db->get('Cat_Zona');            
        foreach ($query->result() as $row){
            $zona[$row->Id_Zona] = $row->Nombre;    
        }      
        return $zona; 
    } 	
	
    public function addRol($data){
        $this->db->insert('Roles_Sistema', $data);        
        return $error = $this->db->error();
    } 	
	
    public function deleteRol($id){
        $this->db->where('Id_Cat_Rol', $id);
        $this->db->delete('Roles_Sistema');
    }  	
	
}