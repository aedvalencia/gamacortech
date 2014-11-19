var User_admin = {
    
    moduleUrl: siteUrl + 'user/admin/',
            
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
        
        $('#company').change(function(e){
           
            $.get(self.moduleUrl + 'get_branches/'+$(this).val(),function(res){
               
                $('#branch').html(res);
                
            });
        });
        
        $('#company').trigger('change');
        
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
                'Name',
                'User Type',
                'Status',
                'Access Profile',
                'Operations'
            ],
            colModel: [
                {name: 'id', index: 'id', hidden: true, key: true},
                {name: 'company', index: 'company', align: 'center'},
                {name: 'branch', index: 'branch', align: 'center'},
                {name: 'name', index: 'name', align: 'center'},
                {name: 'user_type', index: 'user_type', align: 'center'},
                {name: 'status', index: 'status', align: 'center'},
                {name: 'access_profile', index: 'access_profile', align: 'center'},
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
        var self    = User_admin;
        
        //edit
        ret += '<a href="'+self.moduleUrl+'edit/'+cell+'" class="edit">Edit</a> | ';
        
        //reset
        ret += '<a href="#" data-value="'+cell+'" class="reset">Reset</a> | ';
        
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
                alert(status.message);
            }
            else
            {
                window.location = self.moduleUrl;
            }
        });
    }
    
    
}