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
        //if ($this->input->method() == 'get'){
            $result = $this->RestAPIModel->GetAllActSim();

            //Return result to jTable
            $jTableResult = array();
            $jTableResult['Result'] = "OK";
            $jTableResult['Records'] = $result;
            print json_encode($jTableResult);
        //}



    }

}