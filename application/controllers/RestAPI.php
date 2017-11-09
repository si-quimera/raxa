<?php
/**
 * Created by PhpStorm.
 * User: Meraz
 * Date: 20/10/17
 * Time: 09:05
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RestAPI extends CI_Controller{

    public function ValCal()
    {
        if ($this->input->method() == 'post') {
            $result = $this->RestAPIModel->GetValCal();

            //Return result to jTable
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            $jTableResult['Records'] = $result;
            $jTableResult['TotalRecordCount'] = count($result);
            echo json_encode($jTableResult);
        }
    }

    public function GenPorta()
    {
        if ($this->input->method() == 'post') {
            $result = $this->RestAPIModel->GetGenPorta();

            //Return result to jTable
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            $jTableResult['Records'] = $result;
            $jTableResult['TotalRecordCount'] = count($result);
            echo json_encode($jTableResult);
        }
    }

    public function ActSim()
    {
        if ($this->input->method() == 'post') {
            $result = $this->RestAPIModel->GetAllActSim();

            //Return result to jTable
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            $jTableResult['Records'] = $result;
            $jTableResult['TotalRecordCount'] = count($result);
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
            $jTableResult['TotalRecordCount'] = count($result);
            echo json_encode($jTableResult);
        }
    }

    public function EditActSim()
    {
        if ($this->input->method() == 'post') {
            $data = array(
                'NIP_Portar'	    =>  $this->input->post('NIP_Portar'),
                'Vigencia_NIP'	    =>  $this->input->post('Vigencia_NIP'),
                'ICCDID'	        =>  $this->input->post('ICCDID'),
                'Num_Tel_Temporal'	=>  $this->input->post('Num_Tel_Temporal'),
                'Id_Cat_Error_Portabilidad'	=>  $this->input->post('Id_Cat_Error_Portabilidad'),
            );

            $result = $this->RestAPIModel->UpdateActSim($this->input->post('Num_Cliente'), $data);
            $jTableResult['Result'] = "OK";
            echo json_encode($jTableResult);
        }
    }

    public function EditValCal()
    {
        if ($this->input->method() == 'post') {
            $data = array(
                'Id_Cat_Fase_Portabilidad'	=>  $this->input->post('Id_Cat_Fase_Portabilidad'),
                'Id_Cat_Validacion'	=>  $this->input->post('Id_Cat_Validacion'),
                'Id_Cat_Error_Portabilidad'	=>  $this->input->post('Id_Cat_Error_Portabilidad'),
            );

            $result = $this->RestAPIModel->UpdateActSim($this->input->post('Num_Cliente'), $data);
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

    public  function StatusPorta()
    {
        $result = $this->RestAPIModel->GetStatusPorta();

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $result;
        echo json_encode($jTableResult);
    }

}