<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 001_users_table
 *
 * @author JP Lataquin
 */
class Migration_Users_table extends MY_Migration{
    
    public function init()
    {
        
        $this->table = 'users';

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
                'unsigned'          => true,
            ),
            'branch_id'  => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
            ),
            'access_profile_id'  => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
            ),
            
            'deleted TINYINT(1) UNSIGNED NOT NULL DEFAULT 0',
            
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
            'user_type' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'status'    => array(
                'type'              => 'VARCHAR',
                'constraint'        => '5'
            ),
            'firstname'    => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100'
            ),
            'lastname'    => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100'
            ),
            'middlename'    => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100'
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
            ),
            
            'email_confirmed TINYINT(1) UNSIGNED NOT NULL DEFAULT 0',
          
            'reset_token' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            
            'email_token' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            
            'date_created' => array(
                'type'              => 'TIMESTAMP',
                'default'           => '0000-00-00 00:00:00'
            ),
            
            'date_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        );
    }
   
}

