<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 007_product_items_table
 *
 * @author JP Lataquin
 */
class Migration_product_items_table extends MY_Migration{
    
    public function init()
    {
        $this->table = 'product_items';
    
        $this->structure = array(
            'id' => array(
                'type'              => 'INT',
                'constraint'        => 9,
                'unsigned'          => true,
                'auto_increment'    => true,
                'key'               => true
            ),
            'code' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'name' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ),
            'description' => array(
                'type'              => 'TEXT'
            ),
            'unit_quantity' => array(
                'type'              => 'VARCHAR',
                'constraint'        => '5'
            ),
            'unit_price' => array(
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
            'date_created' => array(
                'type'              => 'TIMESTAMP',
                'default'           => '0000-00-00 00:00:00'
            ),
            'date_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        );
        
    
    }
}

