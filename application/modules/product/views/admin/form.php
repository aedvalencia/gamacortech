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
                            <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product_name; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Product Code</label>
                            <input type="text" class="form-control" name="product_code" id="product_code" value="<?php echo $product_code; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Unit Quantity</label>
                            <select name="unit_quantity">
                                <option value="">Choose</option>
                                <option value="1">Pounds</option>
                                <option value="2">Gallons</option>
                            </select>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Unit Price</label>
                            <input type="text" class="form-control" name="unit_price" id="unit_price" value="<?php echo $unit_price; ?>"/>
                        </div>
                    </div>
                    
                    <div class="col-xs-6">
                        <div class="form-group form-online">
                           <label for="">Description</label>
                           <textarea name="description"><?php echo $description; ?></textarea>
                        </div>

                    <div class="form-group form-online">
                         <label for="status">Status</label>
                         <select name="status" id="status" class="form-control">
                             <?php echo options('status',$status); ?>
                         </select>
                    </div>
                    <div class="form-group form-online">
                         <label for="tax_group">Tax Group</label>
                         <select name="tax_group" id="tax_group" class="form-control">
                            <?php echo options_with_empty($tax_options, $tax_group); ?>
                         </select>
                    </div>   
                    <div class="form-group form-online">
                         <label for="product_type">Product Type </label>
                         <select name="product_type" id="product_type" class="form-control">
                            <?php echo options('product_type', $product_type); ?>
                         </select>
                    </div>   
                        
                    </div>
                </form>
                
                <div class="clear"></div>
                
                <section class="buttons">
                    <div class="rightcol">
                        <a class="addbtn" id="submit" href="#">
                            <?php if($id){?>
                                UPDATE
                            <?php }else{?>
                                ADD
                            <?php } ?>
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
            Product_admin.initForm();
        </script>
    </body>
</html>