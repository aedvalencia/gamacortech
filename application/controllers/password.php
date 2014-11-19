<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of password
 *
 * @author JP Lataquin
 */
class Password extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function _remap($type = '', $param)
    {
        if(!$param && !$type) redirect('user');
        
        if($type == 'user')
        {
            return $this->_set_user_password($param[0]);
        }
        else if($type == 'admin')
        {
            return $this->_set_admin_password($param[0]);
        }
    }
    
    
    private function _set_user_password($token)
    {
        if($this->input->post()) return $this->_user_submit($token);

        $this->load->view('password_form');
    }

    private function _user_submit($token)
    {
        extract(post(array(
            'password',
            'repassword'
        )));
       
        $data = array(
            'token'         => $token,
            'password'      => $password,
            'repassword'    => $repassword
        );

        if(!mdl('user/user_model')->set_password($data,$errors))
        {
            $message = implode("/n",$errors);

            set_error($message);

            echo $this->_reply(0,$message);
            return false;
        }

        $message = 'Password set success';
        set_success($message);

        echo $this->_reply(1,$message);
    }
}

