<?php
/**
 * Created by PhpStorm.
 * User: Meraz
 * Date: 20/10/17
 * Time: 09:05
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RestAPI extends CI_Controller{

    public function ActSim()
    {
        if ($this->input->method() == 'post') {
            $result = $this->RestAPIModel->GetAllActSim();

            //Return result to jTable
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            $jTableResult['Records'] = $result;
            $jTableResult['TotalRecordCount'] = $this->db->count_all_results('Lineas_RAXA');
            echo json_encode($jTableResult);
        }
    }

    public function ActSimBen()
    {
        if ($this->input->method() == 'post') {
            $result = $this->RestAPIModel->GetAllActSimBen();

            //Return result to jTable
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            $jTableResult['Records'] = $result;
            $jTableResult['TotalRecordCount'] = $this->db->count_all_results('Lineas_RAXA');
            echo json_encode($jTableResult);
        }
    }

    public function EditActSim()
    {
        if ($this->input->method() == 'post') {
            $data = array(
                'Id_Colaborador'	=>  $this->input->post('Id_Colaborador'),
                'Nom_Persona_Porta'	=>  $this->input->post('Nom_Persona_Porta'),
                'NIP_Portar'	    =>  $this->input->post('NIP_Portar'),
                'Vigencia_NIP'	    =>  $this->input->post('Vigencia_NIP'),
                'Id_Carrier'	    =>  $this->input->post('Id_Carrier'),
                'ICCDID'	        =>  $this->input->post('ICCDID'),
                'Id_Cat_Fase_Portabilidad'	=>  $this->input->post('Id_Cat_Fase_Portabilidad'),
                'Tel_Fijo_Alterno'	=>  $this->input->post('Tel_Fijo_Alterno'),
                'email'	            =>  $this->input->post('email'),
                'Id_Cat_Tipo_Producto'	=>  $this->input->post('Id_Cat_Tipo_Producto'),
                'Id_Cat_Error_Portabilidad'	=>  $this->input->post('Id_Cat_Error_Portabilidad'),
            );

            $result = $this->RestAPIModel->UpdateActSim($this->input->post('Num_Cliente'), $data);
            $jTableResult['Result'] = "OK";
            echo json_encode($jTableResult);
        }
    }

    public function DelActSim()
    {
        if ($this->input->method() == 'post') {
            $result = $this->RestAPIModel->DeleteActSim($this->input->post('Num_Cliente'));
            $jTableResult['Result'] = "OK";
            echo json_encode($jTableResult);
        }
    }

    public  function Colaborador()
    {
        $result = $this->RestAPIModel->GetColaborador();

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $result;
        echo json_encode($jTableResult);
    }

    public  function Carrier()
    {
        $result = $this->RestAPIModel->GetCarrier();

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $result;
        echo json_encode($jTableResult);
    }

    public  function FasePorta()
    {
        $result = $this->RestAPIModel->GetFasePorta();

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $result;
        echo json_encode($jTableResult);
    }

    public  function Producto()
    {
        $result = $this->RestAPIModel->GetProducto();

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $result;
        echo json_encode($jTableResult);
    }

    public  function Error()
    {
        $result = $this->RestAPIModel->GetError();

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $result;
        echo json_encode($jTableResult);
    }

}