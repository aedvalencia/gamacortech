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
        
        $this->rule_set['add'] = [
          'required' => [
                ['username'],
                ['lastname'],
                ['firstname'],
                ['middlename'],
                ['email'],
                ['status'],
                ['company_id'],
                ['branch_id'],
                ['user_type'],
                ['access_profile_id']
          ],
          'email' => [
              ['email']
          ],
          'unique' => [
              ['username','users','username'],
              ['email','users','email']
          ]
        ];
        
        $this->rule_set['update'] = [
          'required' => [
                ['username'],
                ['lastname'],
                ['firstname'],
                ['middlename'],
                ['email'],
                ['status'],
                ['company_id'],
                ['branch_id'],
                ['user_type'],
                ['access_profile_id']
          ],
          'email' => [
              ['email']
          ],
          'unique' => [
              ['username','users','username',true],
              ['email','users','email',true]
          ]
        ];

        $this->rule_set['password'] = [
            'required' => [
                ['password'],
                ['repassword']
            ],
            'equals' => [
                ['password','repassword']
            ]
        ];
    }
    
    public function create($data,&$errors)
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
        
        //Run validation
        if( !$this->validate('add', $data, $errors) )
        {
            $messages = array();

            foreach($errors as $error)
            {
                foreach($error as $msg)
                {
                    $messages[] = $msg;
                }
            }

            $errors = $messages;

            return false;
        }
        
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
            'password'  => $this->encrypt_password($username,$password)
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
    
    public function update($id,$data,&$errors)
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
        
        //Run validation
        if( !$this->validate('update', $data, $errors) )
        {
            $messages = array();

            foreach($errors as $error)
            {
                foreach($error as $msg)
                {
                    $messages[] = $msg;
                }
            }

            $errors = $messages;

            return false;
        }
        
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
       
    public function confirm_email($id){}
    
    public function set_password($data, &$errors)
    {
        $data = elements(array(
            'repassword',
            'password',
            'token'
        ),$data);

        if(! $this->validate('password',$data,$errors))
        {
            $msgs  = array();

            foreach($errors as $error)
            {
                foreach($error as $msg)
                {
                    $msgs[] = $msg;
                }
            }

            $errors = $msgs;

            return false;
        }
        
        $user = $this->db->where(array(
            'reset_token' => $data['token']
        ))->get($this->table)->row();
        
        if(!$user)
        {
            $errors[] = 'This user is not set for password change';
            return false;
        }

        $this->db->where(array(
            'id' => $user->id
        ))->update($this->table,array(
            'password'      => $this->encrypt_password($user->username,$data['password']),
            'reset_token'   => sha1(random_string('alnum', 40))
        ));

        return true;
    }
    
    private function encrypt_password($username,$password)
    {
        return sha1($username.config_item('encryption_key').$password);
    }
    
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
    
    public function get_info($id)
    {
        return $this->get_data(array(
            'select' => select(array(
                'u.username'    => 'username',
                'u.firstname'   => 'firstname',
                'u.middlename'  => 'middlename',
                'u.lastname'    => 'lastname',
                'u.email'       => 'email',
                'c.name'        => 'company',
                'b.name'        => 'branch',
                's.text'        => 'status',
                't.text'        => 'user_type',
                "1"             => 'access_profile'
            )),
            'where' => array(
                'u.id' => $id
            ),
            'join' => array(
                array(
                    'table' => 'companies c',
                    'on'    => 'c.id = u.company_id'
                ),
                array(
                    'table' => 'branches b',
                    'on'    => 'b.id = u.branch_id',
                    'type'  => 'left'
                ),
                array(
                    'table' => 'options s',
                    'on'    => 's.value = u.status AND s.group = "user_status"'
                ),
                array(
                    'table' => 'options t',
                    'on'    => 't.value = u.user_type AND t.group = "user_type"'
                ),
            )
        ))->row();
    }
}

