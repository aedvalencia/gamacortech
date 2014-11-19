var ReportTransactions = {
    moduleUrl : siteUrl + 'reports/transactions/',
    
    initList: function(){
        var self = this;
        self.$list          = $('#gridlist');
        self.$pagination    = $('#pagination');
        
        self.$list.jqGrid({
            url: self.moduleUrl + 'get_list',
            mtype: 'post',
            datatype: 'json',
            colNames: [
                'ID',
                
                'Transaction ID',
                'Batch ID',
                'OR No.',
                
                'Payment Type',
                'Product Item Code',
                'Product Item Name',
                'Cashier',
                
                'Customer',
                'Card Holder',
                'Bank',
                'Credit Card No.',
                
                'Unit Price',
                'Unit Qty',
                'Qty',
                
                'Gross Sale',
                'Total Discount',
                'Total Tax',
                'Net Sale',
                
                'Date Synced',
                'Date Created'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                
                {name: 'transaction_id', index: 'transaction_id', align: 'center'},
                {name: 'batch_id', index: 'batch_id', align: 'center'},
                {name: 'or_no', index: 'or_no', align: 'center'},
                
                {name: 'payment_type', index: 'payment_type', align: 'center'},
                {name: 'product_item_code', index: 'product_item_code', align: 'center'},
                {name: 'product_item_name', index: 'product_item_name', align: 'center'},
                {name: 'cashier', index: 'cashier', align: 'center'},
                
                {name: 'customer', index: 'customer', align: 'center'},
                {name: 'credit_card_holder', index: 'credit_card_holder', align: 'center'},
                {name: 'bank', index: 'bank', align: 'center'},
                {name: 'credit_card_no', index: 'credit_card_no', align: 'center'},
                
                {name: 'unit_price', index: 'unit_price', align: 'center'},
                {name: 'unit_qty', index: 'unit_qty', align: 'center'},
                {name: 'qty', index: 'qty', align: 'center'},
                
                {name: 'gross_sale', index: 'gross_sale', align: 'center'},
                {name: 'total_discount', index: 'total_discount', align: 'center'},
                {name: 'total_tax', index: 'total_tax', align: 'center'},
                {name: 'net_sale', index: 'net_sale', align: 'center'},
                
                {name: 'date_synced', index: 'date_synced', align: 'center'},
                {name: 'date_created', index: 'date_created', align: 'center'},
                
            ],
            postData:{
                query: function()
                {
                    return $('#query').val();
                },
                from: function(){
            
                    return $('#from').val();
            
                },
                to: function(){
                
                    return $('#to').val();
                
                },
                status: function(){
                    return $('#status').val();
                }
            },
            height: 'auto',
            pager: $('#pagination'),
            sortname: 'id',
            sortorder: 'DESC',
            viewrecords: true,
            rownumbers: true
        });
        
    
        $('.datepicker').datepicker();
        
        $('#search').click(function(e){
           self.$list.trigger('reloadGrid'); 
        });
    }
            
    
}