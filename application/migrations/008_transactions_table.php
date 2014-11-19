<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 008_transactions_table
 *
 * @author JP Lataquin
 */
class Migration_transactions_table extends MY_Migration{
    
    public function init()
    {
        $this->table = 'transactions';
    
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
                'constraint'        => '9',
                'unsigned'          => true
            ),
            'branch_id' => array(
                'type'              => 'INT',
                'constraint'        => '9',
                'unsigned'          => true
            ),
            'batch_id' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'or_number' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'customer_firstname' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'customer_lastname' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'credit_card_holder' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'bank' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'credit_card_no' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'remarks' => array(
                'type'              => 'TEXT'
            ),
            'payment_type' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '5'
            ),
            'product_item_id' => array(
                'type'              => 'INT',
                'constraint'        => '9',
                'unsigned'          => true
            ),
            'unit_quantity' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '5'
            ),
            'unit_price' => array(
                'type'              => 'DECIMAL',
                'constraint'        => '11,2',
            ),
            'quantity' => array(
                'type'              => 'DECIMAL',
                'constraint'        => '11,2',
            ),
            'total_tax' => array(
                'type'              => 'DECIMAL',
                'constraint'        => '11,2',
            ),
            'total_discount' => array(
                'type'              => 'DECIMAL',
                'constraint'        => '11,2',
            ),
            'deleted'   => array(
                'type'              => 'TINYINT',
                'constraint'        => 1,
                'default'           => 0,
                'unsinged'          => true
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
            'date_synced' => array(
                'type'              => 'TIMESTAMP',
                'default'           => '0000-00-00 00:00:00'
            ),
            'date_created' => array(
                'type'              => 'TIMESTAMP',
                'default'           => '0000-00-00 00:00:00'
            ),
            'date_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        );
        
    
    }
}

