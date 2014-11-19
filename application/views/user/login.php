<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('user/head');?>
    </head>
    <body class="login">
        <div class="row">
            <div class="loginwrap">
                <div class="col-xs-6"></div>
                <div class="col-xs-6">
                    <form method="POST" id="form" action="">
                        <input name="username" type="text" placeholder="Enter your username" />
                        <input name="password" type="password" placeholder="Enter your password" />
                        <div class="center">
                            <button id="submit" class="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <footer>
            <p>Copyright &copy; <?php echo date("Y") ?> GAMACOR Innovative Technologies. All rights reserved.</p>
        </footer>
        <?php script('assets/js/login.js');?>
        
        <script type="text/javascript">
            $(document).ready(function(){
                Login.initUser();
                //For Place Holder
                $('input, textarea').placeholder();
            })
        </script>
    </body>
</html>
