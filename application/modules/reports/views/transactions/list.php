<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('user/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('user/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Reports - Transactions</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="search">
                <input type="text" id="query" class="form-control"/>
                
                From: <input type="text" id="from" value="<?php echo _date('m/d/Y',strtotime('-1 week')); ?>" class="form-control datepicker"/>
                
                To: <input type="text" id="to" value="<?php echo _date('m/d/Y'); ?>" class="form-control datepicker"/>
                
                Status:
                <select id="status">
                    <option value="">Choose</option>
                    <option value="A">Active</option>
                    <option value="V">Void</option>
                </select>
                <button id="search">Search</button>
                <button>Export</button>
            </div>
        </div>
        
        <div class="contentwrap" style="overflow-x:scroll; margin: 0 auto; position: relative; width: 1000px;">
            <!-- content -->
            
            <br>
            <div class="gridtbl">
                <table id="gridlist"></table>
                <div id="pagination"></div>
            </div>
            
            <!--/ content -->
        </div>
        
        <?php $this->load->view('user/bottom');?>
        
        <?php script(APPPATH.'modules/reports/js/transactions.js'); ?>
        <script type="text/javascript">
            $('document').ready(function(){
                ReportTransactions.initList();
            })
        </script>
    </body>
</html>