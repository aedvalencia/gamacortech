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
    }
    
    public function create($data,&$error)
    {
        //Get what we need
        $data = elements(array(
            'name',
            'contact_details',
            'address'
        ),$data);
        
        //TO DO: run validation
        
        
        //Do insert
        $data['date_created'] = datetime();
        $data['created_by']   = session('userid');
    
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    public function update($id,$data)
    {
        //Get what we need
        $data = elements(array(
            'name',
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
    
    public function default_form_values()
    {
        return array(
            'name'              => '',
            'contact_details'   => '',
            'address'           => '',
            'id'                => ''
        );
    }
}

