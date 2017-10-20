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
        $query = $this->db->get('Seg_Lineas_RAXA');
        return $query->result();
    }

    public function GetColaborador(){
        
    }

}