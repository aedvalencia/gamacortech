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
    
    public function index(){
        echo 'This is a sample dashboard area';
    }
    
    public function set_password($token)
    {
        if($this->input->post()) return $this->_set_password($token);
        
        $this->load->view('set_password');
    }
    
    private function _set_password($token)
    {
        extract(post(array(
            'password',
            'repassword'
        )));
                
        $test = $this->User_model->setPassword($token,$password,$repassword,$error);
       
        if(!$test)
        {
            set_success('Password set failed');
            echo $this->_reply(0, $error);
            return false;
        }
        
        set_success('Password set successful');
        echo $this->_reply(1,'Password change success');
    }
}

