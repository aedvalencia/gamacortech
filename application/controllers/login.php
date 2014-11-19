<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author JP Lataquin
 */
class Login extends MY_Controller
{
    public function __construct() 
    {
       parent::__construct();
        
       if(session('usertype') == 'ADMIN')
       {
           redirect('user/admin');
       }
       
       if(in_array(session('usertype'),array('MNGR','SUPR','CSHR')))
       {
           redirect('dashboard');
       }
        
    }
    
    public function index()
    {
       if($this->input->post()) return $this->_user_submit();
       $this->load->view('user/login'); 
    }
    
    private function _user_submit()
    {
        extract(post(array(
            'username',
            'password'
        )));
        
        $this->load->model('user/User_model');
        
        if(!$this->User_model->authenticate($username,$password))
        {
            echo $this->_reply(0, 'Invalid username of password');  
            return false;
        }
        
        echo $this->_reply(1);
    }
    
    public function admin()
    {
        if($this->input->post()) return $this->_admin_submit();
        
        $this->load->view('admin/login');
    }
    
    private function _admin_submit()
    {
        extract(post(array(
            'username',
            'password'
        )));
        
        $this->load->model('Admin_model');
        
        if(!$this->Admin_model->authenticate($username,$password))
        {
          echo $this->_reply(0, 'Invalid username of password');  
          return false;
        }
        
        echo $this->_reply(1);
    }
    
  
    
}

