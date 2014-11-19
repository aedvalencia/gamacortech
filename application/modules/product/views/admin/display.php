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
            <section class="row tmargin4">
    
                <form role="form" id="form" action="" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group form-inline">
                            <label for="">Product Name</label>
                            <?php echo $product_name; ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Product Code</label>
                            <?php echo $product_code; ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Unit Quantity</label>
                            <?php echo $unit_quantity; ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Unit Price</label>
                            <?php echo $unit_price; ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-6">
                        <div class="form-group form-online">
                           <label for="">Description</label>
                           <?php echo $description; ?>
                        </div>

                    <div class="form-group form-online">
                         <label for="status">Status</label>
                         <?php echo $status; ?>
                    </div>
                     <div class="form-group form-online">
                         <label for="tax_group">Tax Group</label>
                         <?php echo $tax_group; ?>
                    </div>   
                        
                    </div>
                </form>
                
                <div class="clear"></div>
                
                <section class="buttons">
                    <div class="rightcol">
                        <a class="addbtn" href="<?php echo site_url('product/admin/edit/'.$id);?>">
                            EDIT
                        </a>
                        <a class="cancelbtn" id="cancel">CANCEL</a>
                    </div> 
                </section>
            </section>
            <!--/ content -->
        </div>
        
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/product/js/product_admin.js'); ?>
        <script type="text/javascript">
            Product_admin.initDisplay();
        </script>
    </body>
</html>