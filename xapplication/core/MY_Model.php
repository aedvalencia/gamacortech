<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author JP Lataquin
 */
class MY_Model extends CI_Model{
    
    private $rule_sets  = array();
    
    private $table_dependencies = array();
    
    protected $table = '';
    
    protected $alias = '';
    
    public function __construct() 
    {
        parent::__construct();
        
        
    }
      
    public function validate($set,$data,&$errors)
    {
        return lib('Valitron_ci')->rules($this->rule_sets[$set])->validate($data,$errors);
    }
    
    public function get_data($config)
    {
        //If ID
        if(is_numeric($config))
        {
            $query = $this->db->where(array(
                'id' => $config
            ))->get($this->table.' '.$this->alias);
            
            return $query->row();
        }
        //If Custom
        else if(is_array($config))
        {
            $this->db->_protect_identifiers = false;
            
            $config = elements(array(
                'select',
                'where',
                'join',
                'order_by',
                'group_by',
                'limit',
                'offset'
            ),$config);
            
            if($config['select']) $this->db->select($config['select']);
            
            if($config['where']) $this->db->where($config['where']);
            
            if($config['join']){
                
                foreach($config['join'] as $join)
                {
                    $this->db->join($join['table'], $join['on'], $join['type']);
                }
            }
            
            if($config['limit']) $this->db->limit($config['limit'],$config['offset']);
            
            if($config['order_by']) $this->db->order_by($config['order_by']);
            
            if($config['group_by']) $this->db->group_by($config['group_by']);
            
            $query = $this->db->get($this->table.' '.$this->alias);
            
            $this->db->_protect_identifiers = true;
            
            return $query;
            
        }
        //If list of IDs
        else if(is_string($config))
        {
            $query = $this->db->where_in('id',explode(',',$config))->get($this->table.' '.$this->alias);
            
            return $query;
        }
        
        return false;
    }
    
    
}

