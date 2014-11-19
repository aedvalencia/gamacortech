<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author JP Lataquin
 */
class Product extends System_user{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        
    }
    
    public function get_list()
    {
        
    }
    
    public function add()
    {
        if($this->input->post()) return $this->_submit();
        
        $this->load->view('form',$data);
    }
    
    private function _submit($id = '')
    {
        if($id)
        {
            
            $test       = $this->_update($id, $errors);
            $message    = 'Update Complete';
        }
        else
        {
            $test = $this->_add($errors);
            $message    = 'Create Success';
        }
        
        if($test)
        {
           set_success($message);
           echo $this->_reply(1, $message);
           return true;
        }
        
        $errors = implode("\n",$errors);

        echo $this->_reply(0,$errors);
        
    }
    
}

