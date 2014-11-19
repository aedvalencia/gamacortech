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
    }
    
    public function create($data,&$error)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'code',
            'company_id',
            'in_charge',
            'area',
            'tin',
            'contact_details',
            'address'
        ),$data);
        
        //TO DO: run validation
        
        
        //Do insert
        $data['date_created'] = datetime();
        $data['created_by']   = session('userid');
    
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        
        $this->notify_new_account($id);
        
        return $id;
    }
    
    public function update($id,$data)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'code',
            'company_id',
            'in_charge',
            'area',
            'tin',
            'contact_details',
            'address'
        ),$data);
        
        //TO DO: run validation
        
        
        //Do update
        $data['modified_by']  = session('userid');
        
        $this->db->where(array(
            'id' => $id
        ))->update($this->table, $data);
        
        return $id;
    }
    
    public function notify_new_account($id){}
    
    public function confirm_email($id){}
    
    public function default_form_values()
    {
        return array(
            'name'              => '',
            'code'              => '',
            'company_id'        => '',
            'in_charge'         => '',
            'area'              => '',
            'tin'               => '',
            'contact_details'   => '',
            'address'           => '',
            'id'                => ''
        );
    }
}

