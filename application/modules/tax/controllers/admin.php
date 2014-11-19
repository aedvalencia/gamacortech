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
            'Tax_model'
        ));
    }
    
    public function index()
    {
        $this->_style[]     = 'assets/js/jqgrid/css/ui.jqgrid.css';
        
        $this->_script[]    = 'assets/js/jqgrid/js/i18n/grid.locale-en.js';
        $this->_script[]    = 'assets/js/jqgrid/js/jquery.jqGrid.min.js';
        
        $this->load->view('admin/list');
    }
    
    
    public function get_list_group()
    {
        extract(post(array(
            'query',
            'sord',
            'sidx',
            'page'  => 1
        )));
        
        $result = mdl('jqgrid_model')->run(array(
            'get' => array(
                'table' => 'tax_groups',
                'alias' => 't',
                'select' => select(array(
                    't.id[0]'                               => 'id',
                    't.name'                                => 'tax_name',
                    't.id[1]'                               => 'ops'
                ))
             ),
            
            'row_id'        => 'id',
            'max_records'   => 12,
            'query'         => $query,
            'search'        => array(
                'd.name LIKE "%?%"',
             ),
            'page' => $page,
            'sidx' => $sidx,
            'sord' => $sord
       ));
        
        echo $result;
    }
    
    public function get_list_tax()
    {
        extract(post(array(
            'query',
            'sord',
            'sidx',
            'page'  => 1
        )));
        
        $result = mdl('jqgrid_model')->run(array(
            'get' => array(
                'table' => 'taxes',
                'alias' => 't',
                'select' => select(array(
                    't.id[0]'                               => 'id',
                    't.name'                                => 'tax_name',
                    't.value'                               => 'value',
                    't.type'                                => 'type',
                    's.text'                                => 'status',
                    't.id[1]'                               => 'ops'
                )),
                'where' => array(
                    'deleted' => 0
                ),
                'join'  => array(
                    array(
                        'table' => 'options s',
                        'on'    => 't.status = s.value AND s.group = "status"'
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
        if($this->input->post()) return $this->_submit_tax();
        
        $data = $this->Tax_model->default_tax_form();
        
        $this->load->view('admin/tax/form',$data);
    }
    
    public function add_group()
    {
        if($this->input->post()) return $this->_submit_group();
        
        $data = $this->Tax_model->default_group_form();
        
        $tax_query = $this->Tax_model->get_data(array(
            'select' => 'name,id',
            'where' => array(
                'status' => 'A'
            )
        ));
        
        $data['tax_list'] = array();
        
        foreach($tax_query->result() as $tax)
        {
            $data['tax_list'][$tax->id] = $tax->name;
        }
        
        $this->load->view('admin/group/form',$data);
    }
    
    public function edit($id)
    {
        if($this->input->post()) return $this->_submit_tax($id);
        
        $this->load->view('admin/tax/form',$data);
    }
    
    public function edit_group($id)
    {
        if($this->input->post()) return $this->_submit_group($id);
        
        $data = $this->Tax_model->get_group_data_by_id($id);
        
        $tax_query = $this->Tax_model->get_data(array(
            'select' => 'name,id',
            'where' => array(
                'status' => 'A'
            )
        ));
        
        $data->tax_list = array();
        
        foreach($tax_query->result() as $tax)
        {
            $data->tax_list[$tax->id] = $tax->name;
        }
        
        $this->load->view('admin/group/form',$data);
    }
    
    public function display($id)
    {
       
    }
    
    private function _submit_tax($id = '')
    {
        if($id)
        { 
            $test       = $this->_update_tax($id, $errors);
            $message    = 'Update Complete';
        }
        else
        {
            $test = $this->_add_tax($errors);
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
    
    
    private function _submit_group($id = '')
    {
        if($id)
        { 
            $test       = $this->_update_group($id, $errors);
            $message    = 'Update Complete';
        }
        else
        {
            $test = $this->_add_group($errors);
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
    
    
    private function _update_tax($id, &$errors)
    {
        extract(post(array(
            'name',
            'description',
            'value',
            'type',
            'status'
        )));
        
        return $this->Tax_model->update_tax($id,array(
            'name' => $name,
            'description' => $description,
            'value' => $value,
            'type' => $type,
            'status' => $status,
        ),$errors);
    }
    
    private function _update_group($id, &$errors)
    {
        extract(post(array(
            'name',
            'description',
            'taxes' => array()
        )));
        
        return $this->Tax_model->update_group($id,array(
            'name'          => $name,
            'description'   => $description,
            'taxes'         => $taxes
        ),$errors);
    }
    
    private function _add_group(&$errors)
    {
        extract(post(array(
            'name',
            'description',
            'taxes' => array()
        )));
        
        return $this->Tax_model->create_group(array(
            'name'          => $name,
            'description'   => $description,
            'taxes'         => $taxes
        ),$errors);
    }
    
    private function _add_tax(&$errors)
    {
        extract(post(array(
            'name',
            'description',
            'value',
            'type',
            'status'
        )));
        
        return $this->Tax_model->create_tax(array(
            'name'          => $name,
            'description'   => $description,
            'value'         => $value,
            'type'          => $type,
            'status'        => $status,
        ),$errors);
    }
    
    public function delete()
    {
        
    }
}

