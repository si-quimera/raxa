<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{
    public function checkUser($user, $pass){				
        $this->db->where('User', $user);
        $query = $this->db->get('Cat_Colaboradores');        		
		$usuario = $query->row_array();		
		$Password = $this->encryption->decrypt($usuario['Password']);	
		$Activo = $usuario['Activo'];
       
		if (!isset($usuario)) return "Error: Usuario no existe.";       
		if ($Password != $pass) return "Error: Contraseña incorrecta.";		
		if ($Activo == 0) return "Error: Usuario desactivado, contacte a su Administrador";
		
		
		return $usuario;					
    } 	
	
	public function getPerfilData($id){
        $query = "SELECT cat.Id_Perfil, cat.Descripcion FROM "
				. "`Cat_Colaboradores` as c "
				. "JOIN Colaborador_Perfil as p on c.Id_Colaborador = p.Id_Colaborador "
				. "JOIN Cat_Perfiles as cat on p.Id_Perfil = "
				. "cat.Id_Perfil WHERE c.Id_Colaborador = '".$id."' ";

		return $this->db->query($query)->row();			 
	}
	

	public function ChangePassword($data){      		
		$user = $this->session->userdata('usuario');						
        $this->db->where('Id_Colaborador', $user['Id_Colaborador']);
        $this->db->update('Cat_Colaboradores', $data);
        return $error = $this->db->error();                             			
	}


	
	
}