<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('script')) 
{
	function script($scripts) 
	{
		if(is_array($scripts))
		{
			foreach($scripts as $script)
			{
                script($script);
			}
		}
		else
		{
			echo '<script type="text/javascript" src="'.base_url($scripts).'"></script>';
		}
	}
}


if ( ! function_exists('style')) 
{
	function style($styles,$media = 'all') 
	{
		if(is_array($styles))
		{
			foreach($styles as $style)
			{
				style($style);
			}
		}
		else
		{
			echo '<link rel="stylesheet" media="'.$media.'" type="text/css" href="'.base_url($styles).'">';
		}
	}
}


if ( ! function_exists('set_error')) 
{
	function set_error($message) 
	{
		$CI = &get_instance();
        
        $CI->session->set_flashdata('error_msg',$message);
	}
}


if ( ! function_exists('set_success')) 
{
	function set_success($message) 
	{
		$CI = &get_instance();
        
        $CI->session->set_flashdata('success_msg',$message);
	}
}


if ( ! function_exists('show_prompt')) 
{
	function show_prompt() 
	{
		$CI = &get_instance();
        
        $error      = $CI->session->flashdata('error_msg');
        $success    = $CI->session->flashdata('success_msg');
        
        if($error) echo '<div class="error_msg">'.$error.'</div>';
           
        if($success) echo '<div class="success_msg">'.$success.'</div>';
	}
}


if ( ! function_exists('get_controller')) 
{
	function get_controller() 
	{
		$CI = &get_instance();
        return $CI->router->class;
    }
}


if ( ! function_exists('get_method')) 
{
	function get_method() 
	{
		$CI = &get_instance();
        return $CI->router->method;
    }
}


if ( ! function_exists('img_src')) 
{
	function img_src($path,$src,$default) 
	{
        return  ($path == '') ? $default : (!file_exists($path)) ? $default :  (is_dir($path)) ? $default : $src;
    }
}


if ( ! function_exists('post'))
{
    function post($item,$default = '')
    {
        $CI =& get_instance();

        $vars = array();

        if(is_array($item))
        {
            foreach($item as $key=>$val)
            {

                if(is_integer($key))
                {
                    $vars[$val] = $CI->input->post($val,true);
                }
                else
                {
                    $v = $CI->input->post($key,true);
                    $vars[$key] = empty($v) ? $val : $v;

                }
            }
        }
        else
        {
             $v = $CI->input->post($item,true);
             $vars[$item] = empty($v) ? $default : $v;
        }

        array_walk_recursive($vars, 'trim');

        return $vars;
    }
}


if(!function_exists('mdl'))
{
    function mdl($model)
    {
        $CI =& get_instance();
        
        $model = $CI->load->model($model);
        return $model;
    }
}

if(!function_exists('tbl'))
{
    function tbl($table,$alias)
    {
        $CI =& get_instance();
        
        $CI->load->model('table_model');
        
        return $CI->table_model->init($table,$alias);
    }
}

if(!function_exists('lib'))
{
    function lib($library)
    {
        $CI =& get_instance();
        
        $library = $CI->load->library($library);
        
        return $library;
    }
}

if(!function_exists('session'))
{
    function session($key){
        
        $CI =& get_instance();
        
        return $CI->session->userdata($key);
    }
}

if(!function_exists('_date'))
{
    function _date($format,$time){
        
        $CI =& get_instance();
        
        //return $CI->session->userdata($key);
    }
}


function options($group,$value = '',$desc = false, $extra = '')
{
      $CI =& get_instance();
      
      $show = '';
      
      if(is_string($group))
      {
            $order = 'ASC';

            if($desc == true)
            {
                $order = 'DESC';
            }

            $query = $CI->db->where(array('group' => $group))->order_by('sequence '.$order)->get('options');

            foreach($query->result() as $row)
            {
                if($row->value == $value)
                {
                    $selected = 'selected="true"';
                }
                else
                {
                    $selected = '';
                }

                $show .= '<option value="'.$row->value.'" '.$selected.' '.$extra.'>'.$row->text.'</option>';
            }
      
            
       } else {
          
           foreach($group as $v => $text)
           {
                if($v == $value)
                {
                    $selected = 'selected="true"';
                }
                else
                {
                    $selected = '';
                }

                $show .= '<option value="'.$v.'" '.$selected.' '.$extra.'>'.$text.'</option>';
           }
       
      }
      
      return $show;
}


function options_with_empty($group,$value = '', $text = 'Choose', $desc=false, $extra = '')
{
    $show  = '<option value="" '.$extra.'>'.$text.'</option>';
    $show .= options($group,$value,$desc);
    
    return $show;
}