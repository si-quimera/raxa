<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{
    public function checkUser($user, $pass){				
        $this->db->where('User', $user);
        $query = $this->db->get('Cat_Colaboradores');        		
		$usuario = $query->row_array();
		
		$Password = $this->encryption->decrypt($usuario['Password']);		
       
		if (!isset($usuario)) return "Error: Usuario no existe.";       
		if ($Password != $pass) return "Error: Contraseña incorrecta.";		
												
		return $usuario;					
    } 	
	
	
	
}