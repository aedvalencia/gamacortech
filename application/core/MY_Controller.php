<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author JP Lataquin
 */
class MY_Controller extends MX_Controller
{
    public $_script;
    public $_style;
    public $site_title;
    
    public function __construct() 
    {
        parent::__construct();
        
        date_default_timezone_set('Asia/Manila');
        
        $this->_script              = array();
        $this->_style               = array();
        $this->site_title           = config_item('site_title');
    }
    
    public function _add_script($script)
    {
        if(is_array($script)) 
        {
            foreach($script as $sc)
            {
                if(!in_array($sc, $this->_script))
                {
                    $this->_script[] = $sc;
                }
            }
        }
        else
        {
            $this->_script[] = $script;
        }
    }
    
    public function _add_style($style)
    {
        if(is_array($style)) 
        {
            foreach($style as $st)
            {
                if(!in_array($st, $this->_style))
                {
                    $this->_style[] = $st;
                }
            }
        }
        else
        {
            $this->_style[] = $style;
        }
    }
    
    public function _reply($status,$message = '',$extra = array())
    {
        $reply['status'] = $status;
        $reply['message'] = $message;
        
        $reply = extend_array($reply, $extra);
        
        return json_encode($reply);
    }
}

include(APPPATH.'controllers/system_admin.php');
include(APPPATH.'controllers/system_user.php');
include(APPPATH.'controllers/services.php');
