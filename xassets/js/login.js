var Login = {
    
    initAdmin: function(){
        
        $('#submit').click(function(e){
            
            e.preventDefault();
      
            $.ajax({
                url: siteUrl + 'login/admin',
                data: $('#form').serialize(),
                dataType: 'json',
                type: 'POST'
            }).complete(function(reply){
                
                var reply = reply.responseJSON;
                
                if(reply.status == 0)
                {
                    alert(reply.message);
                }
                else
                {
                    window.location = siteUrl + 'user/admin';
                }
                
            });
        })
    }
}