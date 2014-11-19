<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_model
 *
 * @author JP Lataquin
 */
class Admin_model extends MY_Model{
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->init();
    }
    
    private function init(){
        
        $this->table = 'admins';
    }
    
    public function authenticate($username,$password)
    {
        $query = $this->db->where(array(
            'username' => $username,
            'password'  => sha1($username.$password)
        ))->get($this->table);
        
        $data = $query->row();
        
        if($data)
        {
            $this->session->set_userdata(array(
                'userid'    => $data->id,
                'usertype'  => 'ADMIN'
            ));
        }
        
        return !empty($data);
    }
    
    
}

