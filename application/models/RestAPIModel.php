<?php
/**
 * Created by PhpStorm.
 * User: Meraz
 * Date: 20/10/17
 * Time: 09:12
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RestAPIModel extends CI_Model{

    public function GetAllActSim(){
        $query = $this->db->get('Lineas_RAXA');
        return $query->result();
    }

    public function GetColaborador(){
        $colabora = array();
        $query = $this->db->get('Cat_Colaboradores');
        foreach ($query->result() as $row){
            $x['Value'] = $row->Id_Colaborador;
            $x['DisplayText'] = $row->Nombre . " " . $row->Ap_Pat . " " . $row->Ap_Mat;
            $colabora[] = $x;

        }
        return $colabora;
    }

}