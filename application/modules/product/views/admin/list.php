<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Products</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            <div class="search">
                <input type="text" id="query" class="form-control"/>
                <button id="search">Search</button>
                <button id="create">Create</button>
            </div>
            <br>
            <table id="gridlist"></table>
            <div id="pagination"></div>
            <!--/ content -->
        </div>
        
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/product/js/product_admin.js'); ?>
        <script type="text/javascript">
            $('document').ready(function(){
                Product_admin.initList();
            })
        </script>
    </body>
</html>