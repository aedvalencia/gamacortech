<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transactions
 *
 * @author JP Lataquin
 */
class Transactions extends System_user{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_style[]     = 'assets/js/jqgrid/css/ui.jqgrid.css';
        
        $this->_script[]    = 'assets/js/jqgrid/js/i18n/grid.locale-en.js';
        $this->_script[]    = 'assets/js/jqgrid/js/jquery.jqGrid.min.js';
        
        $this->load->view('transactions/list');
    }
    
    public function get_list()
    {
         extract(post(array(
            'query',
            'sord',
            'sidx',
            'from',
            'to',
            'status',
            'page'  => 1
        )));
        
        $gross_sale = '(t.unit_price * t.quantity)';
        $discount   = '(t.total_discount)';
        $total_tax  = '(t.total_tax)';
        $net_sale   = '( ('.$gross_sale.' - '.$discount.') - '.$total_tax.')';
        
        $where = array();
        
        $where[] = 't.company_id = "'.$this->company_id.'"';
        $where[] = 't.branch_id = "'.$this->branch_id.'"';
        
        if($from)
        {
            $where[] = 't.date_created >= "'._date('Y-m-d ', strtotime($from) ).' 00:00:00"';
        }
        
        if($to)
        {
            $where[] = 't.date_created <= "'._date('Y-m-d', strtotime($to) ).' 00:00:00"';
        }
        
        if($status)
        {
            $where[] = 't.status = "'.$status.'"';
        }
        
        $result = mdl('jqgrid_model')->run(array(
            'get' => array(
                'table' => 'transactions',
                'alias' => 't',
                'select' => select(array(
                    't.id[0]'   => 'id',
                    
                    't.id[1]'       => 'transaction_id',
                    't.batch_id'    => 'batch_id',
                    't.or_number'   => 'or_no',
                    
                    't.payment_type'                            => 'payment_type',
                    'p.code'                                    => 'product_item_code',
                    'p.name'                                    => 'product_item_name',
                    'CONCAT(u.lastname,", ",u.firstname)'       => 'cashier',
                    
                    'CONCAT(t.customer_firstname,", ",t.customer_lastname)'         => 'customer',
                    't.credit_card_holder'                                          => 'card_holder',
                    't.bank'                                                        => 'bank',
                    't.credit_card_no'                                              => 'credit_card_no',
                    
                    't.unit_price'      => 'unit_price',
                    't.unit_quantity'   => 'unit_qty',
                    't.quantity'        => 'qty',
                    
                    'FORMAT('.$gross_sale.',2)' => 'gross_sale',
                    'FORMAT('.$discount.',2)'   => 'total_discount',
                    'FORMAT('.$total_tax.',2)'  => 'total_tax',
                    'FORMAT('.$net_sale.',2)'   => 'net_sale',
                    
                    't.date_synced'     => 'date_synced',
                    't.date_created'    => 'date_created'
                )),
                'join'  => array(
                    array(
                        'table' => 'users u',
                        'on'    => 't.created_by = u.id'
                    ),
                    array(
                        'table' => 'product_items p',
                        'on'    => 't.product_item_id = p.id'
                        
                    )
                ),
                'where' => implode(' AND ',$where)
             ),
            
            'row_id' => 'id',
            'max_records' => 12,
            'query'       => $query,
            'search'      => array(
                't.id LIKE "%?%"',
                't.or_number LIKE "%?%"',
                'u.lastname LIKE "%?%"',
                'u.firstname LIKE "%?%"'
            ),
            'page' => $page,
            'sidx' => $sidx,
            'sord' => $sord
       ));
       
       
       echo $result;
    }
    
   
}

