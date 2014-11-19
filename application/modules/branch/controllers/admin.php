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
            'Branch_model'
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
                'table' => 'branches',
                'alias' => 'b',
                'select' => select(array(
                    'b.id[0]'                               => 'id',
                    'c.name'                                => 'company',
                    'b.name'                                => 'branch',
                    'b.code'                                => 'code',
                    'a.text'                                => 'area',
                    concat('u.lastname',', ','u.firstname') => 'in_charge',
                    'b.id[1]'                               => 'ops'
                )),
                'join'  => array(
                    array(
                        'table' => 'companies c',
                        'on'    => 'b.company_id = c.id',
                        'type'  => 'left'
                    ),
                    array(
                        'table' => 'users u',
                        'on'    => 'b.in_charge = u.id',
                        'type'  => 'left'
                    ),
                    array(
                        'table' => 'options a',
                        'on'    => 'b.area = a.value AND a.group = "area"'
                    )
                )
             ),
            
            'row_id' => 'id',
            'max_records' => 12,
            'query'       => $query,
            'search'      => array(
                'b.name LIKE "%?%"'
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
        
        $data = $this->Branch_model->default_form_values();
        
        $companies = mdl('company/company_model')->get_data(array(
            'select' => 'id, name'
        ));
        
        $data['company_options'] = array();
        
        foreach($companies->result() as $row)
        {
            $data['company_options'][$row->id] = $row->name;    
        }
        
        $managers = mdl('user/user_model')->get_data(array(
            'select' => 'id, CONCAT(lastname," ", firstname) as name',
            'where'  => array(
                'user_type' => 'MNGR'
            )
        ));
        
        $data['managers'] = array();
        
        foreach($managers->result() as $row)
        {
            $data['managers'][$row->id] = $row->name;    
        }
        
        $this->load->view('admin/form',$data);
    }
    
    public function edit($id)
    {
        if($this->input->post()) return $this->_submit($id);
        
        $data = $this->Branch_model->get_data($id);
        
        if(!$data)
        {
            set_error('Record not found');
            
            redirect('branch/admin');
            
            return false;
        }
        
        $companies = mdl('company/company_model')->get_data(array(
            'select' => 'id, name'
        ));
        
        $data->company_options = array();
        
        foreach($companies->result() as $row)
        {
            $data->company_options[$row->id] = $row->name;    
        }
        
        $managers = mdl('user/user_model')->get_data(array(
            'select' => 'id, CONCAT(lastname," ",firstname) as name',
            'where'  => array(
                'user_type' => 'MNGR'
            )
        ));
        
        $data->managers = array();
        
        foreach($managers->result() as $row)
        {
            $data->managers[$row->id] = $row->name;    
        }
        
        $this->load->view('admin/form',$data);
    }
    
    private function _submit($id = '')
    {
        if($id)
        {
            $test = $this->_update($id, $errors);
            $reply = 'Update Complete';
            set_success($reply);
        }
        else {
            $test = $this->_add($errors);
            $reply = 'Create Success';
            set_success($reply);
        }
        
        if($test)
        {
           echo $this->_reply(1, $reply);
           return true;
        }
        
        $error_arr = '';
        
        foreach($errors as $msgs)
        {
            foreach($msgs as $msg)
            {
                $error_arr[] = $msg; 
            }
        }
        
        $error_message = implode("\n",$error_arr);
        
        echo $this->_reply(0,$error_message);
        
    }
    
    private function _add(&$errors)
    {
         extract(post(array(
            'name',
            'code',
            'in_charge',
            'area',
            'company',
            'tin',
            'email',
            'mobile_no',
            'tel_no',
            'contact_person',
            'address',
            'diesel_cap',
            'gas_cap'
        )));
         
        return $this->Branch_model->create(array(
            'name'              => $name,
            'code'              => $code,
            'in_charge'         => $in_charge,
            'tin'               => $tin,
            'company_id'        => $company,
            'area'              => $area,
            'email'             => $email,
            'mobile_no'         => $mobile_no,
            'tel_no'            => $tel_no,
            'contact_person'    => $contact_person,
            'address'           => $address,
            'diesel_cap'        => $diesel_cap,
            'gas_cap'           => $gas_cap
        ),$errors);
    }
    
    private function _update($id, &$errors)
    {
         extract(post(array(
            'name',
            'code',
            'in_charge',
            'area',
            'company',
            'tin',
            'email',
            'mobile_no',
            'tel_no',
            'contact_person',
            'address',
            'diesel_cap',
            'gas_cap'
        )));
         
        return $this->Branch_model->update($id,array(
                'name'              => $name,
                'code'              => $code,
                'in_charge'         => $in_charge,
                'tin'               => $tin,
                'company_id'        => $company,
                'area'              => $area,
                'email'             => $email,
                'mobile_no'         => $mobile_no,
                'tel_no'            => $tel_no,
                'contact_person'    => $contact_person,
                'address'           => $address,
                'diesel_cap'        => $diesel_cap,
                'gas_cap'           => $gas_cap
        ),$errors);
    }
    
    public function delete($id)
    {
        $this->Branch_model->delete($id);
        
        echo $this->_reply(1,'Data deleted');
    }
}

