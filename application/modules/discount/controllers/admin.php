<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author JP Lataquin
 */
class Admin extends System_admin
{
    public function __construct() 
    {
        parent::__construct();
        
        $this->load->model(array(
            'Discount_model'
        ));
    }
    
    public function index()
    {
        $this->_style[]     = 'assets/js/jqgrid/css/ui.jqgrid.css';
        
        $this->_script[]    = 'assets/js/jqgrid/js/i18n/grid.locale-en.js';
        $this->_script[]    = 'assets/js/jqgrid/js/jquery.jqGrid.min.js';
        
        $this->load->view('admin/list');
    }
    
    
    public function get_list()
    {
        extract(post(array(
            'query',
            'sord',
            'sidx',
            'page'  => 1
        )));
        
        $result = mdl('jqgrid_model')->run(array(
            'get' => array(
                'table' => 'discounts',
                'alias' => 'd',
                'select' => select(array(
                    'd.id[0]'                               => 'id',
                    'd.name'                                => 'discount_name',
                    'd.value'                               => 'value',
                    'd.type'                                => 'type',
                    's.text'                                => 'status',
                    'd.id[1]'                               => 'ops'
                )),
                'where' => array(
                    'deleted' => 0
                ),
                'join'  => array(
                    array(
                        'table' => 'options s',
                        'on'    => 'd.status = s.value AND s.group = "status"'
                    )
                )
             ),
            
            'row_id' => 'id',
            'max_records' => 12,
            'query'       => $query,
            'search'      => array(
                'd.name LIKE "%?%"',
             ),
            'page' => $page,
            'sidx' => $sidx,
            'sord' => $sord
       ));
        
        echo $result;
    }
    
    public function add()
    {
        if($this->input->post()) return $this->_submit();
        
        $data = $this->Discount_model->default_form_values();
        
        $this->load->view('admin/form',$data);
    }
    
    
    public function edit($id)
    {
        if($this->input->post()) return $this->_submit($id);
        
        $result = $this->Discount_model->get_data($id);
        
        if(!$result)
        {
            set_error('Record not found');
            
            redirect('product/admin');
            
            return false;
        }
        
        $data['name']           = $result->name;
        $data['value']          = $result->value;
        $data['description']    = $result->description;
        $data['type']           = $result->type;
        $data['status']         = $result->status;
        $data['id']             = $result->id;
        
        $this->load->view('admin/form',$data);
    }
    
    public function display($id)
    {
        $result = $this->Discount_model->get_data($id);
        
        if(!$result)
        {
            set_error('Record not found');
            
            redirect('discount/admin');
            
            return false;
        }
        
        $data['name']           = $result->name;
        $data['value']          = $result->value;
        $data['description']    = $result->description;
        $data['type']           = $result->type;
        $data['status']         = $result->status;
        $data['id']             = $result->id;
        
        $this->load->view('admin/display',$data);
    }
    
    private function _submit($id = '')
    {
        if($id)
        { 
            $test       = $this->_update($id, $errors);
            $message    = 'Update Complete';
        }
        else
        {
            $test = $this->_add($errors);
            $message    = 'Create Success';
        }
        
        if($test)
        {
           set_success($message);
           echo $this->_reply(1, $message);
           return true;
        }
        
        $errors = implode("\n",$errors);

        echo $this->_reply(0,$errors);
        
    }
    
    private function _update($id, &$errors)
    {
        extract(post(array(
            'name',
            'description',
            'value',
            'type',
            'status'
        )));
        
        return $this->Discount_model->update($id,array(
            'name' => $name,
            'description' => $description,
            'value' => $value,
            'type' => $type,
            'status' => $status,
        ),$errors);
    }
    
    private function _add(&$errors)
    {
        extract(post(array(
            'name',
            'description',
            'value',
            'type',
            'status'
        )));
        
        return $this->Discount_model->create(array(
            'name' => $name,
            'description' => $description,
            'value' => $value,
            'type' => $type,
            'status' => $status,
        ),$errors);
    }
    
    public function delete()
    {
        
    }
}

