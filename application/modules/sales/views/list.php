<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('user/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('user/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Sales</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            <div class="search">
                <input type="text" id="query" class="form-control"/>
                <button id="search">Search</button>
            </div>
            <br>
            <table id="gridlist"></table>
            <div id="pagination"></div>
            <!--/ content -->
        </div>
        
        <?php $this->load->view('user/bottom');?>
        
        <?php //script(APPPATH.'modules/user/js/user.js'); ?>
        <script type="text/javascript">
           /**
            $('document').ready(function(){
                User.initList();
            })
            **/
        </script>
    </body>
</html>