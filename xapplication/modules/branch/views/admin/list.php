<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body>
        <?php $this->load->view('admin/top');?>
        <h3>Branch</h3>
        <!-- content -->
        <div>
            <input type="text" id="query"/>
            <button id="search">Search</button>
            <button id="create">Create</button>
        </div>
        <br>
        <table id="gridlist"></table>
        <div id="pagination"></div>
        <!--/ content -->
        
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/branch/js/branch_admin.js'); ?>
        <script type="text/javascript">
            $('document').ready(function(){
                Branch_admin.initList();
            })
        </script>
    </body>
</html>