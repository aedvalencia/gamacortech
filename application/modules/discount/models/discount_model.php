<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of discount_model
 *
 * @author JP Lataquin
 */
class Discount_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    private function init(){
        $this->table = 'discounts';
        $this->alias = 'd';
    }
    
    public function create($data,&$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'description',
            'value',
            'type',
            'status',
        ),$data);
        
        //Run validation
        /**
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
        **/
        
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
            'description',
            'value',
            'type',
            'status',
        ),$data);
        
        //Run validation
        /**
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
        }**/
        
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
            'id'            => '',
            'name'          => '',
            'description'   => '',
            'value'         => '',
            'type'          => '',
            'status'        => '',
        );
    }
    
}

