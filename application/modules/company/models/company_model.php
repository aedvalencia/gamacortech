<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of company_model
 *
 * @author JP Lataquin
 */
class Company_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    private function init(){
        $this->table = 'companies';
        $this->alias = 'c';
        
        $this->rule_set['add'] = array(
            'required' => array(
                array('name'),
                array('email'),
                array('mobile_no'),
                array('tel_no'),
                array('contact_person'),
                array('address')
            ),
            'unique' => array(
               array('name','companies','name')
            ),
            'email' => array(
                array('email')
            )
        );
        
        $this->rule_set['update'] = array(
            'required' => array(
                array('name'),
                array('email'),
                array('mobile_no'),
                array('tel_no'),
                array('contact_person'),
                array('address')
            ),
            'unique' => array(
               array('name','companies','name',true)
            ),
            'email' => array(
                array('email')
            )
        );
    }
    
    public function create($data,&$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'email',
            'mobile_no',
            'tel_no',
            'contact_person',
            'address'
        ),$data);
        
        //Run validation
        if(!$this->validate('add', $data, $errors))
        {
            $messages = array();

            foreach($errros as $error)
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
    
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    public function update($id,$data,&$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'email',
            'mobile_no',
            'tel_no',
            'contact_person',
            'address'
        ),$data);
        
        //Run validation
        if(!$this->validate('update', $data, $errors))
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
    
    public function default_form_values()
    {
        return array(
            'name'              => '',
            'email'             => '',
            'mobile_no'         => '',
            'tel_no'            => '',
            'contact_person'    => '',
            'address'           => '',
            'id'                => ''
        );
    }
}

