<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalidaInv extends CI_Controller {
	public function index(){
		
		if ($this->input->method() == 'post'){
			
			$nombre = $this->doupload();    
			$status = array('error' => $this->upload->display_errors());     			
			$path =  FCPATH . 'webroot/uploads/';
			$count = 0;
			$ok = 0;
			if(!empty($status['error'])){
				$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> '.strip_tags($status['error']).'</div>');             
			}else{		
				if (($gestor = fopen($path .$nombre[0], "r")) !== FALSE) {
					while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
						$data = array(
							'ICCDID'	=>  $datos[0],
							'Fecha_Salida_Inv_Central'	=>  date('Y-m-d'),
							'Fecha_Entrada_RAXA_Ctrl'	=>  date('Y-m-d'),
							'Fecha_Salida_RAXA_Ctrl'	=>  $datos[3]	
						);
						$error = $this->SalidaInvModel->addSalidaInv($data);
						if ($error['code'] !== 0){
							$count = $count + 1;
							$msg_error = $error['code'] . ' / ' . $error['message'];
							break;
						}else{
							$ok = $ok + 1;
						}												
					}
					fclose($gestor);
				}
				if($count > 0){
					$this->session->set_flashdata('msg', '<div class="card-panel red accent-4"><i class="material-icons tiny">do_not_disturb_on</i> Se produjo un error al importar el archivo ['.$msg_error.']</div>');

				}else{
					$this->session->set_flashdata('msg', '<div class="card-panel green darken-3"><i class="material-icons tiny">done_all</i> Se importo '.$ok.' elementos del archivo!</div>');
				}				
			}							
		}		
		
        $config['base_url'] = base_url() . 'SalidaInv/index/';
        $config['total_rows'] = $this->SalidaInvModel->countSalidaInv();
        $config['per_page'] = 10;   
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;        
        $config['prev_link'] = '<i class="material-icons">chevron_left</i></a>';
        $config['prev_tag_open'] = '<li class="waves-effect">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';          
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';   
        $config['cur_tag_open'] = '<li class="active"><a href="#!">';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $result = $this->SalidaInvModel->getAllSalidaInv($config['per_page']); 
                    
        $data['consulta'] = $result;
        $data['pagination'] = $this->pagination->create_links();		
								
        $this->load->view('templates/header.php');  
        $this->load->view('salidainv/home.php', $data);
        $this->load->view('templates/footer.php');		
		
		
	}
	
    function doupload() {
        $name_array = array();
        $count = count($_FILES['userfile']['size']);
        foreach ($_FILES as $key => $value) {
            for ($s = 0; $s <= $count - 1; $s++) {
                $_FILES['userfile']['name'] = $value['name'][$s];
                $_FILES['userfile']['type'] = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error'] = $value['error'][$s];
                $_FILES['userfile']['size'] = $value['size'][$s];
                $config['upload_path']          = './webroot/uploads/';
                $config['allowed_types']        = 'csv';
                $config['max_size']             = 50000;
                $config['overwrite']            = FALSE;
                $config['max_width']            = 1900;
                $config['max_height']           = 9999;  
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $data = $this->upload->data();
                $name_array[] = $data['file_name'];
            }
        }
        arsort($name_array, 2);
        return $name_array;
    }	
}