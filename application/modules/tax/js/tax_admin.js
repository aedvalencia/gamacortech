var Tax_admin = {
      
    moduleUrl: siteUrl + 'tax/admin/',
    
    initGroupForm:function(){
        var self = this;
       
        $('#add').click(function(e){
            e.preventDefault();
            
            var id      = $('#tax_options').val();
            var text    = $('#tax_options').find(':selected').html();
            
            if(!$('#tax_opt_'+id).length)
            {
                $('<li id="tax_opt_'+id+'">'+text+' - [<a href="#" class="remove">Remove</a>]<input type="hidden" name="taxes[]" value="'+id+'"/></li>').appendTo('#tax_list');
            }
            
        });
        
        $('#tax_list').on('click','.remove',function(e){
            e.preventDefault();
            
            $(this).parent().remove();
        });
        
        $('#submit').click(function(e){
            e.preventDefault();
            
            self.sendGroupForm();
        })
    },
            
    sendGroupForm: function(){
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
            
    initTaxForm: function()
    {
        var self = this; 
        
        $('#submit').click(function(e){
            e.preventDefault();
            
            self.sendTaxForm();
        });
        
        $('#cancel').click(function(e){
           e.preventDefault();
           
           window.location = self.moduleUrl;
        });
        
        
        
    },
    
    initList: function(){
        var self = this;
        
        self.tab_one();
        self.tab_two();
        
        $('#tabs').tabs();
        
        $('#tab-1').click(function(e){
            self.$list_one.trigger('reloadGrid');
        });
        
        $('#tab-2').click(function(e){
            self.$list_two.trigger('reloadGrid');
        });
        
        
    },  
    
    tab_one: function(){
         var self                = this;
        self.$list_one          = $('#tab-1-gridlist');
        self.$pagination_one    = $('#tab-1-pagination');
        
        self.$list_one.jqGrid({
            url: self.moduleUrl + 'get_list_group',
            mtype: 'post',
            datatype: 'json',
            colNames: [
                'ID',
                'Tax Group',
                'Operations'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                {name: 'tax_group_name', index: 'tax_list_name', align: 'center'},
                {name: 'ops', index: 'ops', align: 'center', search: false, sortable: false, formatter: self.operations_one}
            ],
            postData:{
                query: function()
                {
                    return $('#tab-1-query').val();
                }
            },
            autowidth: true,
            height: 'auto',
            pager: $('#tab-1-pagination'),
            sortname: 'id',
            sortorder: 'DESC',
            viewrecords: true,
            rownumbers: true
        });
        
        $('#tab-1-create').click(function(e){
           window.location = self.moduleUrl+'add_group'; 
        });
        
        $('#tab-1-search').click(function(e){
           self.$list_one.trigger('reloadGrid'); 
        });
    },
            
    tab_two: function(){
        
        var self                = this;
        self.$list_two          = $('#tab-2-gridlist');
        self.$pagination_two    = $('#tab-2-pagination');
        
        self.$list_two.jqGrid({
            url: self.moduleUrl + 'get_list_tax',
            mtype: 'post',
            datatype: 'json',
            colNames: [
                'ID',
                'Discount Name',
                'Value',
                'Type',
                'Status',
                'Operations'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                {name: 'tax_name', index: 'tax_name', align: 'center'},
                {name: 'value', index: 'value', align: 'center'},
                {name: 'type', index: 'type', align: 'center'},
                {name: 'status', index: 'status', align: 'center'},
                {name: 'ops', index: 'ops', align: 'center', search: false, sortable: false, formatter: self.operations_two}
            ],
            postData:{
                query: function()
                {
                    return $('#tab-2-query').val();
                }
            },
            autowidth: true,
            height: 'auto',
            pager: $('#tab-2-pagination'),
            sortname: 'id',
            sortorder: 'DESC',
            viewrecords: true,
            rownumbers: true
        });
        
        $('#tab-2-create').click(function(e){
           window.location = self.moduleUrl+'add'; 
        });
        
        $('#tab-2-search').click(function(e){
           self.$list_two.trigger('reloadGrid'); 
        });
    },
            
    sendTaxForm: function(){
      
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
    
    
    operations_one: function(cell, opts, rowObj){
        var ret     = '';
        var self    = Tax_admin;
        
        //edit
        ret += '<a href="'+self.moduleUrl+'edit_group/'+cell+'" class="edit">Edit</a> | ';
        
        //view
        ret += '<a href="'+self.moduleUrl+'display_group/'+cell+'" data-value="'+cell+'" class="view">View</a> | ';
        
        //delete
        ret += '<a href="#" data-value="'+cell+'" class="delete_group">Delete</a> ';
        
        return ret;
    },
            
    operations_two: function(cell, opts, rowObj){
        var ret     = '';
        var self    = Tax_admin;
        
        //edit
        ret += '<a href="'+self.moduleUrl+'edit/'+cell+'" class="edit">Edit</a> | ';
        
        //view
        ret += '<a href="'+self.moduleUrl+'display/'+cell+'" data-value="'+cell+'" class="view">View</a> | ';
        
        //delete
        ret += '<a href="#" data-value="'+cell+'" class="delete">Delete</a> ';
        
        return ret;
    },
    
    initTaxDisplay: function(){
        var self = this;
        
        
    },
    
    initGroupDisplay: function(){
        var self = this;
        
        
    }
}