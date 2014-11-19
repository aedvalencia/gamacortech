<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('extend_array')) 
{
	function extend_array(array $default, array $data) 
	{
		foreach($data as $key=>$value)
        {
            if(isset($default[$key]))
            {
                if(is_array($default[$key]) && is_array($value))
                {
                    $default[$key] = extend_array($default[$key], $value);
                }
                else
                {
                    $default[$key] = $value;
                }
            }
            else
            {
                $default[$key] = $value;
            }
        }
        
        return $default;
	}
}