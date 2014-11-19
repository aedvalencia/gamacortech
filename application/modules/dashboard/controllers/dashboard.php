<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author JP Lataquin
 */
class Dashboard extends System_user{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
        $this->load->view('dashboard');
    }
    
    
}

