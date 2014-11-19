var Company_admin = {
    
    moduleUrl: siteUrl + 'company/admin/',
    
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
                'Company Name',
                'Operations'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                {name: 'name', index: 'name', align: 'center'},
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
    
    operations: function(cell, opts, rowObj){
        var ret     = '';
        var self    = Company_admin;
        
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