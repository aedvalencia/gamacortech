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
    
    var $tables = array();
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->load->library('format');
        
        $this->_init();
    }
    
    protected function _service_reply($status,$message = '',$data = array())
    {
        header('Content-Type: application/xml; charset=utf-8');
        
        $data['reply'] = array(
            'status' => $status,
            'message' => $message,
            'data'    => $data
        );
        
        
        echo $this->format->factory($data)->to_xml();
        
        exit;
    }
    
    protected function _init()
    {
        extract(post(array(
            'username',
            'password'
        )));
        
        if(!$username || !$password)
        {
            $this->_service_reply(0, 'Access Denied');
        }
        
        $data = mdl('user/user_model')->authenticate($username,$password, true);
        
        if(!$data)
        {
            $this->_service_reply(0, 'Access Denied');
            return false;
        }
        
        $this->user_id = $data->id;
    }
    
   
}

