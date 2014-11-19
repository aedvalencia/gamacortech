<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('public/head');?>
    </head>
    <body>
        <?php $this->load->view('public/top');?>
        
        <form action="" method="POST" id="form">
            <div>
                <label>Password</label>
                <input type="password" name="password" id="password"/>
            </div>
            <div>
                <label>Retype Password</label>
                <input type="password" name="repassword" id="repassword"/>
            </div>
            <div>
                <button id="submit">Submit</submit>
            </div>
        </form>
        
        <?php $this->load->view('public/bottom');?>
        
        <?php script('assets/js/password.js'); ?>
        <script type="text/javascript">
            Password.initForm();
        </script>
    </body>
</html>