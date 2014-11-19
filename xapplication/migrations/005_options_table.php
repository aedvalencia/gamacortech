<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 004_modules_table
 *
 * @author JP Lataquin
 */
class Migration_Options_table extends MY_Migration{
    
    public function init(){
        
        $this->table = 'options';
    
        $this->structure = array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
                'auto_increment'    => true,
                'key'               => true
            ),
            'group' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'sequence' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true
            ),
            'text' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'value' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            )
        );

        $this->data = array(
            array(
                'group'     => 'user_type',
                'sequence'  => 1,
                'text'      => 'manager',
                'value'     => 'MNGR'
            ),
            array(
                'group'     => 'user_type',
                'sequence'  => 2,
                'text'      => 'cashier',
                'value'     => 'CSHR'
            ),
            
            //User status
            array(
                'group'     => 'user_status',
                'sequence'  => 1,
                'text'      => 'Active',
                'value'     => 'A'
            ),
            array(
                'group'     => 'user_status',
                'sequence'  => 2,
                'text'      => 'Inactive',
                'value'     => 'I'
            ),
            
            //Area
            array(
                'group'     => 'area',
                'sequence'  => 1,
                'text'      => 'NCR',
                'value'     => 'N'
            ),
            array(
                'group'     => 'area',
                'sequence'  => 2,
                'text'      => 'Region 1',
                'value'     => 'R1'
            ),
            array(
                'group'     => 'area',
                'sequence'  => 3,
                'text'      => 'Region 2',
                'value'     => 'R2'
            ),
            array(
                'group'     => 'area',
                'sequence'  => 4,
                'text'      => 'Region 3',
                'value'     => 'R3'
            )
        );

    }
    
}

