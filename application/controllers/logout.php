<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author JP Lataquin
 */
class Logout extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}

