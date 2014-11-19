<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system_user
 *
 * @author JP Lataquin
 */
class System_user extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        
       if(!$this->session->userdata('userid') || $this->session->userdata('usertype') == 'ADMIN') redirect('login');
    }
}

