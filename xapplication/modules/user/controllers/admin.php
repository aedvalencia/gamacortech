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
            'User_model'
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
                'table' => 'users',
                'alias' => 'u',
                'select' => select(array(
                    'u.id[0]'                               => 'id',
                    'c.name'                                => 'company',
                    'b.name'                                => 'branch',
                    concat('u.lastname',', ','u.firstname') => 'name',
                    't.text'                                => 'user_type',
                    's.text'                                => 'status',
                    literal('test')                         => 'access_profile',
                    'u.id[1]'                               => 'ops'
                )),
                'join'  => array(
                    array(
                        'table' => 'companies c',
                        'on'    => 'u.company_id = c.id',
                        'type'  => 'left'
                    ),
                    array(
                        'table' => 'branches b',
                        'on'    => 'u.branch_id = b.id',
                        'type'  => 'left'
                    ),
                    array(
                        'table' => 'options s',
                        'on'    => 'u.status = s.value AND s.group = "user_status"'
                    ),
                    array(
                        'table' => 'options t',
                        'on'    => 'u.user_type = t.value AND t.group = "user_type"'
                    )
                )
             ),
            
            'row_id' => 'id',
            'max_records' => 12,
            'query'       => $query,
            'search'      => array(
                'u.firstname LIKE "%?%"',
                'u.lastname LIKE "%?%"',
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
        
        $data = $this->User_model->default_form_values();
        
        $companies = mdl('company/company_model')->get_data(array(
            'select' => 'id, name'
        ));
        
        $data['company_options'] = array();
        
        foreach($companies->result() as $row)
        {
            $data['company_options'][$row->id] = $row->name;    
        }
        
        $this->load->view('admin/form',$data);
    }
    
    public function get_branches($company_id)
    {
        $branches = mdl('branch/branch_model')->get_data(array(
            'select' => 'id, name AS branch',
            'where'  => array(
                'company_id' => $company_id
            )
        ));
        
        $options = array();
        
        foreach($branches->result() as $row)
        {
            $options[$row->id] = $row->branch;    
        }
        
        echo options($options);
    }
    
    public function edit($id)
    {
        if($this->input->post()) return $this->_submit($id);
        
        $data = $this->User_model->get_data($id);
        
        if(!$data)
        {
            set_error('Record not found');
            
            redirect('user/admin');
            
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
        
        $this->load->view('admin/form',$data);
    }
    
    private function _submit($id = '')
    {
        extract(post(array(
            'username',
            'email',
            'firstname',
            'middlename',
            'lastname',
            'company',
            'branch',
            'status',
            'user_type',
            'access_profile'
        )));
        
        if($id)
        {
            $this->User_model->update($id,array(
                'username' => $username,
                'email' => $email,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'lastname' => $lastname,
                'company_id' => $company,
                'branch_id' => $branch,
                'status' => $status,
                'user_type' => $user_type,
                'access_profile_id' => $access_profile
            ));
            
            set_success('Update Complete');
            echo $this->_reply(1, 'Update Complete');
            
            return true;
        }
        
        $test = $this->User_model->create(array(
            'username' => $username,
            'email' => $email,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'company_id' => $company,
            'branch_id' => $branch,
            'status' => $status,
            'user_type' => $user_type,
            'access_profile_id' => $access_profile
        ),$error);
        
        if($test)
        {
           set_success('Create Sucess');
           echo $this->_reply(1, 'Create Sucess');
           return true;
        }
        
        echo $this->_reply(0,$error);
        
    }
    
    public function reset_password()
    {
        
    }
    
    public function delete()
    {
        
    }
}

