<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 006_admins_table
 *
 * @author JP Lataquin
 */
class Migration_admins_table extends MY_Migration{
    
    public function init()
    {
        $this->table = 'admins';
    
        $this->structure = array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
                'auto_increment'    => true,
                'key'               => true
            ),
            'username' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'password' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'email' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            )
        );
        
        $this->data =  array(
            array(
                'username' => 'admin',
                'password' => SHA1('adminadmin'),
                'email'    => 'jpmis@dispostable.com'
            )
        ); 
    }
}

