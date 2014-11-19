<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Discounts</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            <section class="row tmargin4">
    
                <form role="form" id="form" action="" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group form-inline">
                            <label for="">Discount Name</label>
                            <?php echo $name; ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Value</label>
                            <?php echo $value; ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Type</label>
                            <?php echo $type; ?>
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
                        
                    </div>
                </form>
                
                <div class="clear"></div>
                
                <section class="buttons">
                    <div class="rightcol">
                        <a class="addbtn" href="<?php echo site_url('discount/admin/edit/'.$id);?>">
                           Edit
                        </a>
                        <a class="cancelbtn" href="<?php echo site_url('discount/admin/');?>" id="cancel">CANCEL</a>
                    </div> 
                </section>
            </section>
            <!--/ content -->
        </div>
        
        <?php $this->load->view('admin/bottom');?>
     
    </body>
</html>