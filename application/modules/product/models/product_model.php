<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product_model
 *
 * @author JP Lataquin
 */
class Product_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    private function init(){
        $this->table = 'product_items';
        $this->alias = 'p';
    }
    
    public function create($data,&$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'code',
            'description',
            'unit_quantity',
            'unit_price',
            'status',
            'tax_group',
            'product_type'
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
            'code',
            'description',
            'unit_quantity',
            'unit_price',
            'status',
            'tax_group',
            'product_type'
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
            'product_name'  => '',
            'product_code'  => '',
            'unit_price'    => '',
            'unit_quantity' => '',
            'description'   => '',
            'product_type'  => 'GA'
        );
    }
    
}

