<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Tax</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            <section class="row tmargin4">
    
                <form role="form" id="form" action="" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group form-inline">
                            <label for="">Tax Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Value</label>
                            <input type="text" class="form-control" name="value" id="value" value="<?php echo $value; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="">Type</label>
                            <select name="type">
                                <?php echo options('value_type',$type);?>
                            </select>
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
        
        <?php script(APPPATH.'modules/tax/js/tax_admin.js'); ?>
        <script type="text/javascript">
            Tax_admin.initTaxForm();
        </script>
    </body>
</html>