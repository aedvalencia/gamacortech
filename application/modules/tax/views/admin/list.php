<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Taxes</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Groups</a></li>
                    <li><a href="#tabs-2">Tax</a></li>
                </ul>
                
                <div id="tabs-1">
                    <div class="search">
                        <input type="text" id="tab-1-query" class="form-control"/>
                        <button id="tab-1-search">Search</button>
                        <button id="tab-1-create">Create</button>
                    </div>
                    <br>
                    <table id="tab-1-gridlist"></table>
                    <div id="tab-1-pagination"></div>
                </div>
                
                <div id="tabs-2">
                    <div class="search">
                        <input type="text" id="tab-2-query" class="form-control"/>
                        <button id="tab-2-search">Search</button>
                        <button id="tab-2-create">Create</button>
                    </div>
                    <br>
                    <table id="tab-2-gridlist"></table>
                    <div id="tab-2-pagination"></div>
                </div>
            </div>
            
            <!--/ content -->
        </div>
        
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/tax/js/tax_admin.js'); ?>
        <script type="text/javascript">
            $('document').ready(function(){
                Tax_admin.initList();
            })
        </script>
    </body>
</html>