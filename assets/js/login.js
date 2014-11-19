var Login = {
    
    initAdmin: function(){
        
        $('#submit').click(function(e){
            
            e.preventDefault();
            blockUI();
            $.ajax({
                url: siteUrl + 'login/admin',
                data: $('#form').serialize(),
                dataType: 'json',
                type: 'POST'
            }).complete(function(reply){
                
                var reply = reply.responseJSON;
                
                if(reply.status == 0)
                {
                    unblockUI();
                    alert(reply.message);
                }
                else
                {
                    location.reload();
                }
                
            });
        })
    },
    
    initUser: function(){
        
        $('#submit').click(function(e){
            
            e.preventDefault();
            blockUI();
            $.ajax({
                url: siteUrl + 'login',
                data: $('#form').serialize(),
                dataType: 'json',
                type: 'POST'
            }).complete(function(reply){
                
                var reply = reply.responseJSON;
                
                if(reply.status == 0)
                {
                    unblockUI();
                    alert(reply.message);
                }
                else
                {
                    window.location = siteUrl + 'dashboard';
                }
                
            });
        })
    }
}