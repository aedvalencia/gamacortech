<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service
 *
 * @author JP Lataquin
 */
class Service extends Services{
    
    public function __construct() {
        parent::__construct();
        
    }
    
    public function sync()
    {
        extract(post(array(
            'product_id',
            'batch_id',
            'payment_type',
            'customer_firstname',
            'customer_lastname',
            'card_holder',
            'remarks',
            'bank',
            'credit_card_holder',
            'credit_card_no',
            'quantity',
            'date_created'
        )));
        
        //TO DO: Validation
        
        $product = mdl('product/product_model')->get_data($product_id);
        
        $this->db->insert('transactions',array(
           'company_id' => 1,
           'branch_id'  => 1,
           'batch_id'   => $batch_id,
           'or_number'  => '',
           'customer_firstname' => $customer_firstname,
           'customer_lastname'  => $customer_lastname,
           'credit_card_holder' => $credit_card_holder,
           'bank'               => $bank,
           'credit_card_no'     => $credit_card_no,
           'remarks'            => $remarks,
           'payment_type'       => $payment_type,
           'product_item_id'    => $product_id,
           'unit_quantity'      => $product->unit_quantity,
           'unit_price'         => $product->unit_price,
           'quantity'           => $quantity,
           'total_tax'          => '',
           'created_by'         => $this->user_id,
           'date_synced'        => date('Y-m-d H:i:s'),
           'date_created'       => $date_created,
           'status'             => 'A'
        ));
        
        
        echo $this->_service_reply(1, 'success', array(
            'transaction_id' => $this->db->insert_id()
        ));
    }
    
    
    
}

