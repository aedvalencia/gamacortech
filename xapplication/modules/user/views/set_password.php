<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
       <?php echo $this->load->view('user/head');?>
    </head>
    <body>
        <form id="form" action="" methond="POST">
            <div>
                <label>New Password:</label>
                <input id="password" type="password" name="password"/>
            </div>
            
            <div>
                <lable>Re-Type Password:</lable>
                <input id="repassword" type="password" name="repassword"/>
            </div>
            <button id="submit">Submit</button>
        </form>
        
        <?php script(APPPATH.'modules/user/js/user.js'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                
                User.initSetPassword();
            });
        </script>
    </body>
</html>
