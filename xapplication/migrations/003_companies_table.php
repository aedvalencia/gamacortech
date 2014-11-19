<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 002_companies_table
 *
 * @author JP Lataquin
 */
class Migration_Companies_table extends MY_Migration{
    
    public function init()
    {
        $this->table = 'companies';
    
        $this->structure = array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
                'auto_increment'    => true,
                'key'               => true
            ), 
            'created_by'  => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
            ),
            'modified_by'  => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
            ),
            'name' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'contact_details' => array(
                'type'              => 'TEXT'
            ),
            'address' => array(
                'type'              => 'TEXT'
            ),
            'date_created' => array(
                'type'              => 'TIMESTAMP',
                'default'           => '0000-00-00 00:00:00'
            ),
            'date_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        );
    }
    
}

