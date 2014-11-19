<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tax_model
 *
 * @author JP Lataquin
 */
class Tax_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    private function init(){
        $this->table = 'taxes';
        $this->alias = 't';
    }
   
    public function create_group($data,&$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'description',
            'taxes',
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
        
        $this->db->insert('tax_groups', array(
            'name'          => $data['name'],
            'description'   => $data['description'],
            'date_created'  => datetime(),
            'created_by'    => session('userid')
        ));
        
        $id = $this->db->insert_id();
        
        $this->db->where(array(
            'tax_group_id' => $id
        ))->delete('tax_list');
        
        foreach($data['taxes'] as $tax)
        {
            $this->db->insert('tax_list', array(
                'tax_group_id'  => $id,
                'tax_id'        => $tax,
                'date_created'  => datetime(),
                'created_by'    => session('userid')
            ));
        }
        
        return $id;
    }
    
    public function create_tax($data,&$errors)
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
    
    
    public function get_group_data_by_id($id)
    {
        $group = new MY_Model();
        $list  = new MY_Model();
        
        $group->table = 'tax_groups';
        $group->alias = 'tg';
        
        $list->table = 'tax_list';
        $list->alias = 'tl';
        
        $data = $group->get_data($id);
        
        $data->taxes = $list->get_data(array(
            'select' => 't.name, t.id',
            'where' => array(
                'tl.tax_group_id' => $id
            ),
            'join' => array(
                array(
                    'table' => 'taxes t',
                    'on'    => 'tl.tax_id = t.id'
                )
            )
        ))->result();
        
        
        return $data;
    }
    
    
    public function update_group($id,$data,&$errors)
    {
         //Get what we need
        $data = elements(array(
            'name',
            'description',
            'taxes',
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
        
        $this->db->where(array(
            'id' => $id
        ))->update('tax_groups', array(
            'name'          => $data['name'],
            'description'   => $data['description'],
            'modified_by'   => session('userid')
        ));
        
      
        
        $this->db->where(array(
            'tax_group_id' => $id
        ))->delete('tax_list');
        
        foreach($data['taxes'] as $tax)
        {
            $this->db->insert('tax_list', array(
                'tax_group_id'  => $id,
                'tax_id'        => $tax,
                'date_created'  => datetime(),
                'created_by'    => session('userid')
            ));
        }
        
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
    
    
    public function default_group_form()
    {
   
        return array(
            'id'            => '',
            'name'          => '',
            'description'   => '',
            'taxes'         => array()
        );
    }
    
    public function default_tax_form()
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
    
    public function get_group_options(){
        
        $tax_group = new MY_Model();
        $tax_group->table = 'tax_groups';
        $tax_group->alias = 'tg';
        
        $groups = $tax_group->get_data(array(
            'select' => 'name,id'
        ))->result();
        
        $data = array();
        
        foreach($groups as $group)
        {
            $data[$group->id] = $group->name;
        }
        
        return $data;
    }
}

