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

}