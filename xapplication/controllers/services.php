<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of super_services
 *
 * @author JP Lataquin
 */
class Services extends MY_Controller{
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->load->library('format');
    }
}

