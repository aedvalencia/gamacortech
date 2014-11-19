<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 002_branches_table
 *
 * @author JP Lataquin
 */
class Migration_Branches_table extends MY_Migration{
    
    public function init()
    {
        $this->table = 'branches';

        $this->structure = array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
                'auto_increment'    => true,
                'key'               => true
            ),
            'company_id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true
            ),
            'deleted TINYINT(1) UNSIGNED NOT NULL DEFAULT 0',
            'in_charge' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true
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
            'code' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'area' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '5'
            ),
            'name' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'tin' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'mobile_no' => array(
                'type'              => 'VARCHAR',
                'constraint'         => '100'
            ),
            'tel_no' => array(
                'type'              => 'VARCHAR',
                'constraint'         => '100'
            ),
            'email' => array(
                'type'              => 'VARCHAR',
                'constraint'         => '100'
            ),
            'contact_person' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100'
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

