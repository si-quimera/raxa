<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionChipModel extends CI_Model{
	
    public function SelectAlmacen(){
		$almacen = array();
        $query = $this->db->get('Cat_Almacen');            
        foreach ($query->result() as $row){
            $almacen[$row->Id_Almacen] = $row->Nombre;    
        }      
        return $almacen; 
    } 

    public function SelectMaestro($id){
		$maestro = array();
		$this->db->where('Id_Cat_Sec', $id);
        $query = $this->db->get('Cat_Maestro');            
        foreach ($query->result() as $row){
            $maestro[$row->Id_Cat_Prim] = $row->Nombre;				
        }      
        return $maestro; 
    } 	

    public function SelectAdjunto($id, $id_puesto, $id_jefe){
		$adjunto = array();
		$this->db->where('Id_Colaborador !=', $id);
		$this->db->where('Id_Cat_Puesto', $id_puesto);
		$this->db->where('Jefe_Inmediato', $id_jefe);
        $query = $this->db->get('Cat_Colaboradores');            
        foreach ($query->result() as $row){
            $adjunto[$row->Id_Colaborador] = $row->Nombre . ' ' . $row->Ap_Pat . ' ' . $row->Ap_Mat;				
        }      
        return $adjunto; 
    } 	
	
	public function getNumRangoICCDID($del, $al, $almacen){				
		$query = $this->db->query("SELECT ICCDID, 0 as Fecha_Salida_RAXA_Ctrl FROM `Asignacion_Chip` WHERE (SUBSTRING(ICCDID,1,18) BETWEEN '".$del."' AND '".$al."') AND Id_Almacen = '".$almacen."';");
		return $query->result();		
		//return json_encode($data);				
	}

	public function getNumRangoAlmacenICCDID($del, $al){					
		$query = $this->db->query("SELECT ICCDID, Fecha_Salida_RAXA_Ctrl FROM `Salida_Inv_Central` WHERE (SUBSTRING(ICCDID,1,18) BETWEEN '".$del."' AND '".$al."') AND Fecha_Salida_RAXA_Ctrl IS NULL;");
		return $query->result();		
		//return json_encode($data);				
	}	

	public function getNumRangoColaboradorICCDID($del, $al, $colaborador){				
		$query = $this->db->query("SELECT ICCDID, 0 as Fecha_Salida_RAXA_Ctrl FROM `Asignacion_Chip` WHERE (SUBSTRING(ICCDID,1,18) BETWEEN '".$del."' AND '".$al."') AND Id_Colaborador = '".$colaborador."' AND status = 0;");
		return $query->result();		
		//return json_encode($data);				
	}	
	
	
	public function getDataRangoICCDID($del, $al){		
		$query = $this->db->query("SELECT * FROM `Salida_Inv_Central` WHERE SUBSTRING(ICCDID,1,18) BETWEEN '".$del."' AND '".$al."';");
		return $query->result();								
	}	
	
	public function asignarChip($data){
		$this->db->insert('Asignacion_Chip', $data);        
		return $error = $this->db->error();
    } 	
	
	public function updateDateInvCentral($id, $data){
        $this->db->where('ICCDID', $id);
        $this->db->update('Salida_Inv_Central', $data);
        return $error = $this->db->error();  						
	}
	
	public function updateDateInvCentralStatus($id, $Id_Colaborador){
		$data = array(
			'status' => 1
		);
		
        $this->db->where('ICCDID', $id);
		$this->db->where('Id_Colaborador', $Id_Colaborador);
        $this->db->update('Asignacion_Chip', $data);
        return $error = $this->db->error();  						
	}	
	
	public function getDataAsignadoChip($id){
		$this->db->order_by('Fec_Asignacion', 'DESC'); 
        $this->db->where('ICCDID', $id);
        $query = $this->db->get('Asignacion_Chip');
		return $query->row();         						
	}

	public function getNameAlmacenChip($id){
        $this->db->where('Id_Almacen', $id);
        $query = $this->db->get('Cat_Almacen');
		$data = $query->result_array();      
		return $data[0]['Nombre'];
	}	
	
	public function getNameColaboradorChip($id){
        $this->db->where('Id_Colaborador', $id);
        $query = $this->db->get('Cat_Colaboradores');
		$data = $query->result_array();        
		return $data[0]['Ap_Pat'] . ' ' . $data[0]['Ap_Mat'] . ' ' . $data[0]['Nombre'];
	}	
	
	public function getDataColaborador($id){
		$this->db->where('Jefe_Inmediato', $id);
        return $this->db->get('Cat_Colaboradores');   
	}
	
	public function getPuestoColaborador($id){
		$this->db->where('Nombre', $id);
        $query = $this->db->get('Cat_Maestro');   
		return $query->row();
	}	
	
	public function getSuperiorColaborador($id){
		$superior = array();
		$this->db->where('Id_Colaborador', $id);
        $query = $this->db->get('Cat_Colaboradores');   	
        foreach ($query->result() as $row){
            $superior[$row->Id_Colaborador] = $row->Nombre . ' ' . $row->Ap_Pat . ' ' . $row->Ap_Mat;				
        }      
        return $superior; 		
	}
	
	public function getAllICCDID(){
        $query = $this->db->get('Salida_Inv_Central');   
		return $query->result();		
	}

	public function getPerfilAccess($perfil){
		if($perfil == 'ADMINISTRADOR' || $perfil == 'CONTROL DE CHIPS' || $perfil == 'DIRECTOR OPERATIVO' || $perfil == 'GERENTE COMERCIAL' || $perfil == 'DIRECTOR COMERCIAL'){
			$result = $this->getIdPerfilAcces();
			$data = array(
				'Id_Perfil'	=>  $result->Id_Perfil,
				'Descripcion'	=>  $result->Descripcion,
				'Error'	=>  0	
			);
		}else{
			$data = array("Error" => 1);		
		}
		return $data;
	}		

	
	public function getIdPerfilAcces(){
		$this->db->where('UPPER(Descripcion)', 'DIRECTOR COMERCIAL');
        $query = $this->db->get('Cat_Perfiles');   
		return $query->row(); 				
	}	
	
	public function getColaboradorPerfil($id){
		$this->db->where('Id_Perfil', $id);
        $query = $this->db->get('Colaborador_Perfil');   
		return $query->row(); 		
	}
	
	public function getColaboradorAdmin(){
		$query = $this->db->query("SELECT c.`Nombre`, c.`Ap_Mat`, c.`Ap_Pat`, c.`Id_Colaborador` FROM Cat_Perfiles AS per JOIN Colaborador_Perfil AS col ON per.`Id_Perfil` = col.`Id_Perfil` JOIN Cat_Colaboradores AS c ON col.`Id_Colaborador` = c.`Id_Colaborador` WHERE UPPER(per.`Descripcion`) = 'ADMINISTRADOR' OR  UPPER(per.`Descripcion`) = 'DIRECTOR OPERATIVO' OR UPPER(per.`Descripcion`) = 'CONTROL DE CHIPS' OR UPPER(per.`Descripcion`) = 'GERENTE COMERCIAL' OR UPPER(per.`Descripcion`) = 'DIRECTOR COMERCIAL';");	
        foreach ($query->result() as $row){
            $almacen[$row->Id_Colaborador] = $row->Nombre . ' ' . $row->Ap_Pat . ' ' . $row->Ap_Mat;	
        }      
        return $almacen; 

		
	}
	
	
	
	
	
	
	
}