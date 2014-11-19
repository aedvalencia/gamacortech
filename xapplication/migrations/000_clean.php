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
class Migration_clean extends MY_Migration{
    
    public function up()
    {
        $this->dbforge->create_database('jpmis');
    }
    
    public function down()
    {
        $query = $this->db->query('SHOW TABLES');
        
        $result = $query->result_array();
        
        foreach($result as $row)
        {
            $table = current(array_keys($row));
            $this->dbforge->drop_table($row[$table]);
        }
    }
}

