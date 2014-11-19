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
class Jqgrid_model extends CI_Model
{
    private $overwrite;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('table_model');
        $this->overwrite = array();
    }

    public function overwrite($method,$callback)
    {
        $this->overwrite[$method] = $callback;
    }

    public function run($args)
    {
        $default = array(
           'get' => array(
               'table'    => '',
               'alias'    => '',
               'select'   => '',
               'where'    => '',
               'group_by' => '',
               'join'     => array()
           ),
           'row_id'       => '',
           'max_records'  => '',
		   'query'		  => '',
           'search'       => array(),
           'page'         => '',
           'sidx'         => '',
           'sord'         => ''
        );

        $args = extend_array($default, $args);

		$where_search_arr = array();

		if($args['query'])
		{
			foreach($args['search'] as $search)
			{
				$where_search_arr[] = str_replace('?',$args['query'],$search);
			}
		}

        $order_by = $args['sidx'].' '.$args['sord'];

        if(is_array($args['get']['where']))
        {
            $args['get']['where'] = $this->convert_where_arr_to_str($args['get']['where']);
        }

        if($args['get']['where'] != '' && count($where_search_arr))
        {
            $args['get']['where'] = $args['get']['where'].' AND ('.implode(' OR ',$where_search_arr).')';
        }
        else if($args['get']['where'] == '' && count($where_search_arr))
        {
            $args['get']['where'] = '('.implode(' OR ',$where_search_arr).')';
        }

        $total = $this->table_model->target($args['get']['table'],$args['get']['alias'])->count(array(
            'select'      => $args['get']['select'],
			'where'       => $args['get']['where'],
            'join'        => $args['get']['join'],
            'group_by'    => $args['get']['group_by'],
            'order_by'    => $order_by,
        ));


        $num_pages = ceil($total / $args['max_records']);
        $page      = $args['page'];

        if($page > $num_pages && $total != 0)
        {
              $page = $num_pages;
        }

        $offset = $args['max_records'] * $page - $args['max_records'];

        $result = $this->table_model->target($args['get']['table'],$args['get']['alias'])->get_list(array(
            'select'      => $args['get']['select'],
            'where'       => $args['get']['where'],
            'join'        => $args['get']['join'],
            'group_by'    => $args['get']['group_by'],
            'offset'      => $offset,
			'limit'       => $args['max_records'],
			'order_by'    => $order_by,
        ));

        $json = '{}';

        if($total > 0)
        {
            $json = $this->format($result, $args['row_id']);
        }

        return '{"page"    : "'.$page.'",
               "total"     : "'.$num_pages.'",
               "records"   : "'.$total.'",
               "rows"      : '.$json.'}';

    }

    private function convert_where_arr_to_str($arr)
    {
            $to_string = '';

            foreach($arr as $k => $v)
            {
                if(strstr($k,'!=') || strstr($k,'<=') || strstr($k,'=>'))
                {
                    $to_string .= $k.' '.$v;
                }
                else
                {
                    $to_string .= $k.' = '.$v;
                }
            }

          return $to_string;
    }

    private function format($result,$id)
    {
		$json = '[';
        
		foreach ($result as $row)
		{
			// Set primary key of row
			$json .= '{"id": "'. $row[$id] .'",';

			$json .= '"cell":[';

			// Per column traversal
			// Maps field values
			foreach ($row as $i => $val)
			{
				// Clean field value
				$json .= '"'. $this->parse($val) .'",';
			}

			// Remove last comma from row
			$json = substr($json, 0, -1);

			$json .= ']},';
		}

		// Remove last comma from whole json
		$json = substr($json, 0, -1);

		$json .= ']';

		return $json;

    }

    function parse($text)
	{
		// In case we encounter new line characters
		$parsed = str_replace(chr(10), ' ', $text);

		// Escape quoted strings
		$parsed = str_replace('"', '\"', $parsed);

		// Change return characters
		return str_replace(chr(13), ' ', $parsed);
	}
}
