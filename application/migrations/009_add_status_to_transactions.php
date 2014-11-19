<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 009_add_status_to_transactions
 *
 * @author JP Lataquin
 */
class Migration_add_status_to_transactions extends MY_Migration{
    
    public function init()
    {
        $this->table = 'transactions';
    
    }
    
    public function up()
    {
        $fields = array(
           'status' => array(
               'type'           => 'VARCHAR',
               'constraint'     => 5
            )
        );
        
        $this->dbforge->add_column($this->table, $fields);
    }
    
    public function down()
    {
        $this->dbforge->drop_column($this->table,'status');
    }
}

