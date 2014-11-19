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
            'Company_model'
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
                'table' => 'companies',
                'alias' => 'c',
                'select' => select(array(
                    'c.id[0]'                               => 'id',
                    'c.name'                                => 'company',
                    'c.id[1]'                               => 'ops'
                ))
             ),
            
            'row_id' => 'id',
            'max_records' => 12,
            'query'       => $query,
            'search'      => array(
                'c.name LIKE "%?%"'
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
        
        $data = $this->Company_model->default_form_values();
        
        $this->load->view('admin/form',$data);
    }
    
    public function edit($id)
    {
        if($this->input->post()) return $this->_submit($id);
        
        $data = $this->Company_model->get_data($id);
        
        if(!$data)
        {
            set_error('Record not found');
            
            redirect('company/admin');
            
            return false;
        }
        
        $this->load->view('admin/form',$data);
    }
    
    private function _submit($id = '')
    {
        if($id)
        {
            $test   = $this->_update($id, $errors);
            $reply  = 'Update Success';
            set_success($reply);
        }
        else
        {
            $test   = $this->_add($errors);
            $reply  = 'Create Success';
            set_success($reply);
        }
        
        
        if($test)
        {
           echo $this->_reply(1, $reply);
           return true;
        }
        
        $errors = implode("\n",$errors);
        
        echo $this->_reply(0,$errors);
        
    }
    
    private function _update($id, &$errors)
    {
         extract(post(array(
            'name',
            'contact_person',
            'email',
            'tel_no',
            'mobile_no',
            'address'
        )));
          
        return $this->Company_model->update($id,array(
            'name'              => $name,
            'contact_person'    => $contact_person,
            'email'             => $email,
            'tel_no'            => $tel_no,
            'mobile_no'         => $mobile_no,
            'address'           => $address
        ),$errors);

    }
    
    private function _add(&$errors)
    {
         extract(post(array(
            'name',
            'contact_person',
            'email',
            'tel_no',
            'mobile_no',
            'address'
        )));
          
        return $this->Company_model->create(array(
            'name'              => $name,
            'contact_person'    => $contact_person,
            'email'             => $email,
            'tel_no'            => $tel_no,
            'mobile_no'         => $mobile_no,
            'address'           => $address
        ),$errors);
    }
    
    public function delete()
    {
        
    }
}

