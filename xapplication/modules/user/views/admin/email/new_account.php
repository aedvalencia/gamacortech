<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        A new account has been created for you in <a href="<?php echo site_url()?>"><?php echo site_url()?></a>.
        <br>
        Please set your password in <a href="<?php echo site_url('user/set_password/'.$reset_token);?>">here</a> 
       
    </body>
</html>
