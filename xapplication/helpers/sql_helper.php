<?php

if ( ! function_exists('case_then'))
{
    function case_then(array $condition = array(), $else = '')
	{
        $case = 'CASE';

        foreach($condition as $when => $then)
        {
            $case .=' WHEN '.$when.' THEN '.$then.' ';
        }

        if($else)
        {
            $case .= 'ELSE '.$else.' END ';
        }
        else
        {
            $case .= 'END ';
        }

        return $case;
    }
}


if ( ! function_exists('select'))
{
    function select(array $select = array())
	{
        if(!count($select))
        {
            return '*';
        }

        $return = '';

        foreach($select as $column => $alias)
        {
            $return .= preg_replace('/\[(\d.*)\]/','',$column).' AS '.$alias.', ';
        }

        return substr($return,0,strlen($return) - 1);
    }
}


if ( ! function_exists('concat'))
{
    function concat()
	{
        return 'CONCAT('.implode(',',func_get_args()).')';
    }
}


if ( ! function_exists('literal'))
{
    function literal($literal)
	{
       return ' "'.$literal.'" ';
    }
}


if ( ! function_exists('last_query'))
{
    function last_query($flag = false)
	{
       $CI = &get_instance();

       if($flag)
       {
            echo $CI->db->last_query();
            return true;
       }

       return $CI->db->last_query();

    }
}


if(!function_exists('datetime')){
    
    function datetime($time = 'NOW'){
        
        return date('Y-m-d H:i:s',strtotime($time));
    }
}
