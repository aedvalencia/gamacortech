var User = {
    moduleUrl : siteUrl + 'user/',
    
    initSetPassword: function(){
        var self = this;
        
        $('#submit').click(function(e){
            e.preventDefault();
            
            blockUI();
            
            $.ajax({
                url: window.location,
                data: $('#form').serialize(),
                dataType: 'json',
                type:'POST'
            }).complete(function(reply){
                reply = reply.responseJSON;
                
                if(reply.status == 0)
                {
                    unblockUI();
                    alert(reply.message);
                }
                else
                {
                    window.location  = siteUrl+'login';
                }
            })
        });
    },
            
    
}