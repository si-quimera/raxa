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
        $result = $this->RestAPIModel->GetAllActSim();

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $result;
        $jTableResult['TotalRecordCount'] = $this->db->count_all_results('Lineas_RAXA');
        echo json_encode($jTableResult);

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