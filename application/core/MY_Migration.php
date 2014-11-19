<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Migration
 *
 * @author JP Lataquin
 */
class MY_Migration extends CI_Migration{
    
    
    public function __construct($config = array()) {
        parent::__construct($config);
        
        $this->init();
    }
    
    public function init()
    {
        $this->table       = '';
        $this->structure   = array();
        $this->data        = array();
    }
    
    public function up()
    {   
        if(!empty($this->structure) && $this->table != '')
        {
            $this->dbforge->add_field($this->structure);
           
            foreach($this->structure as $name => $col)
            {
                if(isset($col['key']))
                {
                    $this->dbforge->add_key($name,$col['key']);
                }
            }
            
            $this->dbforge->create_table($this->table,true);
            
            if(!empty($this->data))
            {
                $this->db->insert_batch($this->table,$this->data);
            }
        }
    }
    
    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }
}

