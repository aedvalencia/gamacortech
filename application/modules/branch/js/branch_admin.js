var Branch_admin = {
    
    moduleUrl: siteUrl + 'branch/admin/',
            
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
                'Company',
                'Branch',
                'Code',
                'Area',
                'In Charge',
                'Operations'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                {name: 'company', index: 'company', align: 'center'},
                {name: 'branch', index: 'branch', align: 'center'},
                {name: 'code', index: 'code', align: 'center'},
                {name: 'area', index: 'area', align: 'center'},
                {name: 'in_charge', index: 'in_charge', align: 'center'},
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
    
    operations: function(cell, opts, rowObj){
        var ret     = '';
        var self    = Branch_admin;
        
        //edit
        ret += '<a href="'+self.moduleUrl+'edit/'+cell+'" class="edit">Edit</a> | ';
        
        
        //delete
        ret += '<a href="#" data-value="'+cell+'" class="delete">Delete</a> ';
        
        return ret;
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
    }
    
}