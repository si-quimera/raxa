<?php
/**
 * Created by PhpStorm.
 * User: Meraz
 * Date: 20/10/17
 * Time: 09:12
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RestAPIModel extends CI_Model{

    public function GetAllActSim()
    {
        $jtSorting = explode( " ", $this->input->get('jtSorting'));
        $jtStartIndex = $this->input->get('jtStartIndex');
        $jtPageSize = $this->input->get('jtPageSize');

        $buscar = $this->input->post('buscar');
        $en = $this->input->post('en');

        $this->db->order_by($jtSorting[0] , $jtSorting[1]);
        $this->db->limit($jtPageSize, $jtStartIndex);
        $this->db->where('Id_Cat_Tipo_Producto', 378);

        if($buscar != "" && $en != ""){
            $this->db->like($en, $buscar);
        }
        $query = $this->db->get('Lineas_RAXA');
        return $query->result();
    }

    public function GetAllActSimBen()
    {
        $jtSorting = explode( " ", $this->input->get('jtSorting'));
        $jtStartIndex = $this->input->get('jtStartIndex');
        $jtPageSize = $this->input->get('jtPageSize');

        $buscar = $this->input->post('buscar');
        $en = $this->input->post('en');

        $this->db->order_by($jtSorting[0] , $jtSorting[1]);
        $this->db->limit($jtPageSize, $jtStartIndex);
        $this->db->where('Id_Cat_Tipo_Producto', 379);

        if($buscar != "" && $en != ""){
            $this->db->like($en, $buscar);
        }
        $query = $this->db->get('Lineas_RAXA');
        return $query->result();
    }

    public function UpdateActSim($id, $data)
    {
        $this->db->where('Num_Cliente', $id);
        $this->db->update('Lineas_RAXA', $data);
        return $error = $this->db->error();
    }

    public function DeleteActSim($id)
    {
        $this->db->where('Num_Cliente', $id);
        $this->db->delete('Lineas_RAXA');
        return $error = $this->db->error();
    }

    public function GetColaborador()
    {
        $colabora = array();
        $query = $this->db->get('Cat_Colaboradores');
        foreach ($query->result() as $row){
            $x['Value'] = $row->Id_Colaborador;
            $x['DisplayText'] = $row->Nombre . " " . $row->Ap_Pat . " " . $row->Ap_Mat;
            $colabora[] = $x;
        }
        return $colabora;
    }

    public function GetCarrier()
    {
        $carrier = array();
        $query = $this->db->get('Cat_Carrier');
        foreach ($query->result() as $row){
            $x['Value'] = $row->Id_Carrier;
            $x['DisplayText'] = $row->Nombre;
            $carrier[] = $x;
        }
        return $carrier;
    }

    public function GetFasePorta()
    {
        $fase = array();
        $this->db->where('Id_Cat_Sec', 14);
        $query = $this->db->get('Cat_Maestro');
        foreach ($query->result() as $row){
            $x['Value'] = $row->Id_Cat_Prim;
            $x['DisplayText'] = $row->Nombre;
            $fase[] = $x;
        }
        return $fase;
    }

    public function GetProducto()
    {
        $producto = array();
        $this->db->where('Id_Cat_Sec', 377);
        $query = $this->db->get('Cat_Maestro');
        foreach ($query->result() as $row){
            $x['Value'] = $row->Id_Cat_Prim;
            $x['DisplayText'] = $row->Nombre;
            $producto[] = $x;
        }
        return $producto;
    }

    public function GetError()
    {
        $error = array();
        $this->db->where('Id_Cat_Sec', 383);
        $query = $this->db->get('Cat_Maestro');
        foreach ($query->result() as $row){
            $x['Value'] = $row->Id_Cat_Prim;
            $x['DisplayText'] = $row->Nombre;
            $error[] = $x;
        }
        return $error;
    }

}