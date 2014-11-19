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

include(APPPATH.'third_party/Valitron/Validator.php');

class Valitron_ci {
    
    private $rules = array();
    
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
}

