<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Valitron_ci
 *
 * @author JP Lataquin
 */

require_once(APPPATH.'third_party/Valitron/Validator.php');

class Valitron_ci {
    
    private $rules = array();
    
    public function __construct() 
    {
        Valitron\Validator::langDir(APPPATH.'language/valitron');
        
        $this->custom_rules();
    }
    
    public function rules(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    public function validate($data,&$errors)
    {
        $v = new \Valitron\Validator($data);
        
        $v->rules($this->rules);
        
        if(!$v->validate())
        {
            $errors = $v->errors();
            
            return false;
        }
        
        return true;
    }
    
    public function set_lang_dir(){}
    public function set_lang(){}
    
    private function custom_rules()
    {
        Valitron\Validator::addRule('unique', function($field, $value, array $params) {
            
            $CI =& get_instance();
            
            $where[] = $params[1].' = "'.$value.'"';
            
            $row = $CI->db->where(implode(' AND ',$where))->get($params[0])->row();
            
            if(isset($params[2]))
            {
                if($params[2] && ( $row->$params[1] == $value ))
                {
                    return true;
                }
            }
            
           return (boolean) !$row;
            
        }, 'should be unique');
    }
}

