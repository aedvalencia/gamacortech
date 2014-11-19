var Product_admin = {
      
    moduleUrl: siteUrl + 'product/admin/',
            
    initForm: function()
    {
        var self = this; 
        
        $('#submit').click(function(e){
            e.preventDefault();
            
            self.sendForm();
        });
        
        $('#cancel').click(function(e){
           e.preventDefault();
           
           window.location = self.moduleUrl;
        });
        
        
        
    },
    
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
                'Product Name',
                'Product Code',
                'Product Type',
                'Unit Quantity',
                'Unit Price',
                'Tax Group',
                'Status',
                'Operations'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                {name: 'product_name', index: 'product_name', align: 'center'},
                {name: 'product_code', index: 'product_code', align: 'center'},
                {name: 'product_type', index: 'product_type', align: 'center'},
                {name: 'unit_quantity', index: 'unit_quantity', align: 'center'},
                {name: 'unit_price', index: 'unit_price', align: 'center'},
                {name: 'tax_group', index: 'tax_group', align: 'center'},
                {name: 'status', index: 'status', align: 'center'},
                {name: 'ops', index: 'ops', align: 'center', search: false, sortable: false, formatter: self.operations},
            ],
            postData:{
                query: function()
                {
                    return $('#query').val();
                }
            },
            autowidth: true,
            height: 'auto',
            pager: $('#pagination'),
            sortname: 'id',
            sortorder: 'DESC',
            viewrecords: true,
            rownumbers: true
        });
        
        $('#create').click(function(e){
           window.location = self.moduleUrl+'add'; 
        });
        
        $('#search').click(function(e){
           self.$list.trigger('reloadGrid'); 
        });
        
    },
            
    sendForm: function(){
      
        var self = this;
         blockUI(); 
         
         $.ajax({
            url: window.location,
            type: 'POST',
            dataType:'json',
            data: $('#form').serialize()
         
        }).complete(function(res){
             
            var res = res.responseJSON;
            
            if(res.status == 0)
            {
                unblockUI();
                alert(res.message);
            }
            else
            {
                window.location = self.moduleUrl;
            }
        });
    },
    
     operations: function(cell, opts, rowObj){
        var ret     = '';
        var self    = Product_admin;
        
        //edit
        ret += '<a href="'+self.moduleUrl+'edit/'+cell+'" class="edit">Edit</a> | ';
        
        //view
        ret += '<a href="'+self.moduleUrl+'display/'+cell+'" data-value="'+cell+'" class="view">View</a> | ';
        
        //delete
        ret += '<a href="#" data-value="'+cell+'" class="delete">Delete</a> ';
        
        return ret;
    },
    
    initDisplay: function(){
        var self = this;
        
        
    }
}