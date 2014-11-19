<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body>
        <?php $this->load->view('admin/top');?>
        <form method="POST" id="form" action="">
            <input name="username" type="text"/>
            <input name="password" type="password"/>
            <button id="submit">Submit</button>
        </form>
        <?php $this->load->view('admin/bottom');?>
        <?php script('assets/js/login.js');?>
        
        <script type="text/javascript">
            $(document).ready(function(){
                Login.initAdmin();
            })
        </script>
    </body>
</html>
