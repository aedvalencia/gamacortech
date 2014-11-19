<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of services
 *
 * @author JP Lataquin
 */
class Service extends Services{
   
    public function __construct() {
        parent::__construct();
        
        $this->load->model(array(
            'User_model'
        ));
    }
    
    public function get_data($id)
    {
        
        $data = $this->User_model->get_data($id);
        $data = json_decode(json_encode($data),true);
        
        echo $this->format->factory($data)->to_xml();
    }
}

