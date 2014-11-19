<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system_admin
 *
 * @author JP Lataquin
 */
class System_admin extends MY_Controller{
    
    public function __construct() 
    {
        parent::__construct();
        
        if($this->session->userdata('usertype') != 'ADMIN') redirect('login/admin');
    }
}

