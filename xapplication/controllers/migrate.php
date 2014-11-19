<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of migrate
 *
 * @author JP Lataquin
 */
class Migrate extends MY_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('migration');
        include(APPPATH.'core/MY_Migration.php');
    }
    
    public function current() 
    {
        if (!$this->migration->current()) 
        {
            show_error($this->migration->error_string());
        }
        else 
        {
            echo 'Updated to current version '.config_item('migration_version');
        }
	}

	public function latest() 
    {
        if(!$this->migration->latest()) 
        {
			show_error($this->migration->error_string());	
		}
		else 
        {
			echo 'Updated to latest version';
		}
	}
    
    public function version($n)
    {
        if(!$this->migration->version($n)) 
        {
			show_error($this->migration->error_string());	
		}
		else 
        {
			echo 'Updated to version '.$n;
		}
    }
}
