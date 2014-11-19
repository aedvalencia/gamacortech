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
class Migration_Modules_table extends MY_Migration{
    
    public function init()
    {
        $this->table = 'modules';

        $this->structure = array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
                'auto_increment'    => true,
                'key'               => true
            ),
            'name' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            )
        );

        $this->data = array(
            array(
                'name' => 'user'
            ),
            array(
                'name' => 'company'
            ),
            array(
                'name' => 'branch'
            ),
            array(
                'name' => 'report'
            ),
        );
    }
    
}

