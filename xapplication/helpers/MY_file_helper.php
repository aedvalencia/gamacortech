<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('delete_file')) 
{
	function delete_file($file) 
	{
		if(file_exists($file))
        {
            return unlink($file);
        }
        
        return false;
	}
}