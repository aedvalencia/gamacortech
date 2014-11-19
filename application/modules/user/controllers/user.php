<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author JP Lataquin
 */
class User extends System_user{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
           'User_model' 
        ));
    }
    
    public function index()
    {
        $data = $this->User_model->get_info($this->user_id);
       
        if(!$data)
        {
            show_404();
        }
        
        $this->load->view('me',$data);
    }
}

