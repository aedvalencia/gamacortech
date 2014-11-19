<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author JP Lataquin
 */
class User_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    private function init(){
        $this->table = 'users';
        $this->alias = 'u';
    }
    
    public function create($data,&$error)
    {
        //Get what we need
        $data = elements(array(
            'username',
            'lastname',
            'firstname',
            'middlename',
            'email',
            'status',
            'company_id',
            'branch_id',
            'user_type',
            'access_profile_id'
        ),$data);
        
        //TO DO: run validation
        
        
        //Do insert
        $data['date_created'] = datetime();
        $data['created_by']   = session('userid');
        $data['password']     = sha1(random_string('alnum', 40));
        $data['reset_token']  = sha1(random_string('alnum', 40));
        
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        
        //$this->notify_new_account($id);
        
        return $id;
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
                'usertype'  => $data->user_type
            ));
        }
        
        return !empty($data);
    }
    
    public function update($id,$data)
    {
        //Get what we need
        $data = elements(array(
            'username',
            'lastname',
            'firstname',
            'middlename',
            'email',
            'status',
            'company_id',
            'branch_id',
            'user_type',
            'access_profile_id'
        ),$data);
        
        //TO DO: run validation
        
        //Do update
        $data['modified_by']  = session('userid');
        $this->db->where(array(
            'id' => $id
        ))->update($this->table, $data);
        
        return $id;
    }
    
    public function notify_new_account($id)
    {
        
        $user = $this->get_data($id);
        
        $this->load->library('email');
        
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from(NO_REPLY_EMAIL, NO_REPLY_NAME);
        $this->email->to($user->email);
        $this->email->subject(NEW_ACCOUNT_NOTIFY_SUBJECT);
        
        $message = $this->load->view('admin/email/new_account.php',$user,true);
        
        $this->email->message($message);
    }
    
    public function setPassword($token,$password,$repassword,&$error){
        
        if($password != $repassword)
        {
            $error = 'Password did not match';
            
            return false;
        }
        
        $user = $this->get_data(array(
            'where' => array(
                'reset_token' => $token
            )
        ))->row();
        
        if(!$user)
        {
            $error = 'Password token does not exists';
            return false;
        }
    
        $this->db->where(array(
            'id' => $user->id
        ))->update($this->table,array(
            'password'      => sha1($user->username.$password),
            'reset_token'   => sha1(random_string('alnum', 40))
        ));
        
        return true;
    }
    
    public function confirm_email($id){}
    
    public function default_form_values()
    {
        return array(
            'username'              => '',
            'email'                 => '',
            'firstname'             => '',
            'lastname'              => '',
            'middlename'            => '',
            'company_id'            => '',
            'branch_id'             => '',
            'user_type'             => '',
            'access_profiile_id'    => '',
            'status'                => '',
            'id'                    => ''
        );
    }
}

