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
       
       $this->user_id = $this->session->userdata('userid');
       
       $data = mdl('user/user_model')->get_data($this->user_id);
       
       $this->company_id = $data->company_id;
       $this->branch_id  = $data->branch_id;
       
    }
}

