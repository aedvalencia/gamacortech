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
            'Product_model'
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
                'table' => 'product_items',
                'alias' => 'p',
                'select' => select(array(
                    'p.id[0]'                               => 'id',
                    'p.name'                                => 'product_name',
                    'p.code'                                => 'product_code',
                    'ty.text'                               => 'product_type',
                    'p.unit_quantity'                       => 'unit_quantity',
                    'p.unit_price'                          => 'unit_price',
                    'tg.name'                               => 'tax_group', 
                    's.text'                                => 'status',
                    'p.id[1]'                               => 'ops'
                )),
                'where' => array(
                    'deleted' => 0
                ),
                'join'  => array(
                    array(
                        'table' => 'options s',
                        'on'    => 'p.status = s.value AND s.group = "status"'
                    ),
                    array(
                        'table' => 'options ty',
                        'on'    => 'p.product_type = ty.value AND ty.group = "product_type"'
                    ),
                    array(
                        'table' => 'tax_groups tg',
                        'on'    => 'p.tax_group = tg.id',
                        'type'  => 'LEFT'
                    ),
                )
             ),
            
            'row_id' => 'id',
            'max_records' => 12,
            'query'       => $query,
            'search'      => array(
                'p.name LIKE "%?%"',
                'p.code LIKE "%?%"',
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
        
        $data                   = $this->Product_model->default_form_values();
        $data['tax_options']    = mdl('tax/Tax_model')->get_group_options();
        
        $this->load->view('admin/form',$data);
    }
    
    
    public function edit($id)
    {
        if($this->input->post()) return $this->_submit($id);
        
        $result = $this->Product_model->get_data($id);
        
        if(!$result)
        {
            set_error('Record not found');
            
            redirect('product/admin');
            
            return false;
        }
        
        $data['product_name']   = $result->name;
        $data['product_code']   = $result->code;
        $data['description']    = $result->description;
        $data['unit_price']     = $result->unit_price;
        $data['unit_quantity']  = $result->unit_quantity;
        $data['status']         = $result->status;
        $data['tax_group']      = $result->tax_group;
        $data['id']             = $result->id;
        $data['product_type']   = $result->product_type;
        $data['tax_options']    = mdl('tax/Tax_model')->get_group_options();
        
        
        $this->load->view('admin/form',$data);
    }
    
    public function display($id)
    {
        $result = $this->Product_model->get_data($id);
        
        if(!$result)
        {
            set_error('Record not found');
            
            redirect('product/admin');
            
            return false;
        }
        
        $data['product_name']   = $result->name;
        $data['product_code']   = $result->code;
        $data['description']    = $result->description;
        $data['unit_price']     = $result->unit_price;
        $data['unit_quantity']  = $result->unit_quantity;
        $data['status']         = $result->status;
        $data['tax_group']      = $result->tax_group;
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
            'product_name',
            'product_code',
            'description',
            'tax_group',
            'unit_quantity',
            'unit_price',
            'status',
            'product_type'
        )));
        
        return $this->Product_model->update($id,array(
            'name'          => $product_name,
            'code'          => $product_code,
            'description'   => $description,
            'tax_group'     => $tax_group,
            'unit_quantity' => $unit_quantity,
            'unit_price'    => $unit_price,
            'status'        => $status,
            'product_type'  => $product_type
        ),$errors);
    }
    
    private function _add(&$errors)
    {
        extract(post(array(
            'product_name',
            'product_code',
            'description',
            'tax_group',
            'unit_quantity',
            'unit_price',
            'status',
            'product_type'
        )));
        
        return $this->Product_model->create(array(
            'name'          => $product_name,
            'code'          => $product_code,
            'description'   => $description,
            'tax_group'     => $tax_group,
            'unit_quantity' => $unit_quantity,
            'unit_price'    => $unit_price,
            'status'        => $status,
            'product_type'  => $product_type
        ),$errors);
    }
    
    public function delete()
    {
        
    }
}

