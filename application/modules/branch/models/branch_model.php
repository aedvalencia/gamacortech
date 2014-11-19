<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branch_model
 *
 * @author JP Lataquin
 */
class Branch_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    private function init(){
        $this->table = 'branches';
        $this->alias = 'b';
        
        $this->rule_set['add'] = array(
          'required' => array(
                array('name'),
                array('code'),
                array('company_id'),
                array('area'),
                array('tin'),
                array('email'),
                array('mobile_no'),
                array('tel_no'),
                array('contact_person'),
                array('address'),
                array('diesel_cap'),
                array('gas_cap')
          ),
          'email' => array(
                array('email')
          ),
          'unique' => array(
                array('name','branches','name'),
                array('code','branches','code')
          )
       );
        
       $this->rule_set['update'] = array(
          'required' => array(
                array('name'),
                array('code'),
                array('company_id'),
                array('area'),
                array('tin'),
                array('email'),
                array('mobile_no'),
                array('tel_no'),
                array('contact_person'),
                array('address'),
                array('diesel_cap'),
                array('gas_cap')
          ),
          'email' => array(
                array('email')
          ),
          'unique' => array(
                array('name','branches','name',true),
                array('code','branches','code',true)
          )
       );
    }
    
    public function create($data,&$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'code',
            'company_id',
            'in_charge',
            'area',
            'tin',
            'email',
            'mobile_no',
            'tel_no',
            'contact_person',
            'address',
            'diesel_cap',
            'gas_cap'
        ),$data);
        
        //Validate
        if( !$this->validate('add', $data, $errors) )
        {
            return false;
        }        
        
        //Do insert
        $data['date_created'] = datetime();
        $data['created_by']   = session('userid');
    
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        
        //$this->notify_new_account($id);
        
        return $id;
    }
    
    public function update($id,$data, &$errors)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'code',
            'company_id',
            'in_charge',
            'area',
            'tin',
            'email',
            'mobile_no',
            'tel_no',
            'contact_person',
            'address',
            'diesel_cap',
            'gas_cap'
        ),$data);
        
        //Validate
        if( !$this->validate('update', $data, $errors) )
        {
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
            'code'              => '',
            'company_id'        => '',
            'in_charge'         => '',
            'area'              => '',
            'tin'               => '',
            'email'             => '',
            'mobile_no'         => '',
            'tel_no'            => '',
            'contact_person'    => '',
            'address'           => '',
            'id'                => '',
            'diesel_cap'        => 0,
            'gas_cap'           => 0
        );
    }
}

