<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="companies">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/company-icon.png');?>" /> COMPANIES</h1>
            </div>
        </div>
        
        <!-- content -->
        <section class="row tmargin4">

            <form role="form" id="form" action="" method="POST">
                <div class="col-xs-6">
                    <div class="form-group form-inline">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" name="name" id="username" value="<?php echo $name; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="contact_person">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" id="contact_person" value="<?php echo $contact_person; ?>"/>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group form-inline">
                        <label for="mobile_no">Mobile No.</label>
                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $mobile_no; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="tel_no">Tel No.</label>
                        <input type="text" class="form-control" name="tel_no" id="tel_no" value="<?php echo $tel_no; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="contact_details">Address</label>
                        <textarea name="address" class="form-control" id="address"><?php echo $address; ?></textarea>
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
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/company/js/company_admin.js'); ?>
        <script type="text/javascript">
            Company_admin.initForm();
        </script>
    </body>
</html>