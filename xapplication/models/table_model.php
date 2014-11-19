<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of table_model
 *
 * @author JP Lataquin
 */
class table_model extends CI_Model
{
   private $table = '';
   private $alias = '';

   public function __construct()
   {
       parent::__construct();

   }

   public function target($table,$alias)
   {

       $this->table = $table;
       $this->alias = $alias;
       return $this;
   }

   public function get_list($args = array(),$to_object = false)
   {
       $default = array(
           'select'     => '',
           'where'      => '',
           'or_where'   => '',
           'in'         => array(),
           'or_in'      => array(),
           'join'       => array(),
           'order_by'   => '',
           'group_by'   => '',
           'limit'      => '',
           'offset'     => ''
       );

       $config = extend_array($default, $args);

       $this->db->select($config['select'],false);
       $this->db->from($this->table. ' '.$this->alias);

       if($config['where'])
       {
		   $this->db->where($config['where']);
       }

       if($config['or_where'])
       {
		   $this->db->or_where($config['or_where']);
       }

       if(count($config['in']))
       {
		   $this->db->where_in($config['in']['field'],$config['in']['values']);
       }

       if(count($config['or_in']))
       {
		   $this->db->or_where_in($config['or_in']['field'],$config['or_in']['values']);
       }

       foreach($config['join'] as $join)
       {
           $type = '';

           if(isset($join['type']))
           {
               $type = $join['type'];
           }

           $this->db->join($join['table'], $join['on'], $type);
       }

       if(trim($config['order_by']))
       {
           $this->db->order_by($config['order_by']);
       }

       if($config['group_by'])
       {
           $this->db->group_by($config['group_by']);
       }

       if($config['limit'])
       {
           $this->db->limit($config['limit'],$config['offset']);
       }

       if($to_object)
       {
           return $this->db->get()->result();
       }

       return $this->db->get()->result_array();
   }


   public function count($args = array())
   {
       return count($this->get_list($args));
   }

   public function to_option($text_col,$val_col,$args = array(),$flag = false)
   {
       $option = array();

       if($flag)
       {
            $option[''] = '--- select one ---';
       }

       foreach($this->get_list($args) as $result)
       {
           $option[$result[$val_col]] = $result[$text_col];
       }

       return $option;
   }

   public function get_record($args = array())
   {
       $default = array(
           'select'     => '',
           'where'      => '',
           'or_where'   => '',
           'in'         => array(),
           'or_in'      => array(),
           'join'       => array(),
           'order_by'   => '',
           'group_by'   => '',
           'limit'      => '',
           'offset'     => ''
       );

       $config = extend_array($default, $args);

       $this->db->select($config['select']);
       $this->db->from($this->table. ' '.$this->alias);

       if($config['where'])
       {
		   $this->db->where($config['where']);
       }


       if($config['or_where'])
       {
           $this->db->or_where($config['or_where']);
       }

       if(count($config['in']))
       {
		   $this->db->where_in($config['in']['field'],$config['in']['values']);
       }

       foreach($config['join'] as $join)
       {
           $type = '';

           if(isset($join['type']))
           {
               $type = $join['type'];
           }

           $this->db->join($join['table'], $join['on'], $type);
       }

       if($config['order_by'])
       {
            $this->db->order_by($config['order_by']);
       }

       if($config['group_by'])
       {
           $this->db->group_by($config['group_by']);
       }

       $this->db->limit(1);

       return $this->db->get()->row_array();
   }



   public function get_value($column,array $args = array())
   {
        $default = array(
           'select'     => '',
           'where'      => '',
           'or_where'   => '',
           'join'       => array(),
           'order_by'   => '',
           'group_by'   => ''
       );

       $config = extend_array($default, $args);

       $this->db->from($this->table. ' '.$this->alias);

       if($config['select'])
       {
           $this->db->select($config['select']);
       }

       if($config['where'])
       {
           $this->db->where($config['where']);
       }

       if($config['or_where'])
       {
           $this->db->or_where($config['or_where']);
       }

       foreach($config['join'] as $join)
       {
           $type = '';

           if(isset($join['type']))
           {
               $type = $join['type'];
           }

           $this->db->join($join['table'], $join['on'], $type);
       }

       if($config['order_by'])
       {
            $this->db->order_by($config['order_by']);
       }

       if($config['group_by'])
       {
           $this->db->group_by($config['group_by']);
       }

       $this->db->limit(1);

       $row = $this->db->get()->row();

       return (isset($row->$column)) ? $row->$column : '';
   }

   public function update($update,$where)
   {
       $this->db->where($where);
       return $this->db->update($this->table, $update);
   }
}
