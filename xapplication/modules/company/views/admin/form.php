<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body>
        <?php $this->load->view('admin/top');?>
        <!-- content -->
        <section class="row tmargin4">

            <form role="form" id="form" action="" method="POST">
                <div class="form-group form-inline">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" name="name" id="username" value="<?php echo $name; ?>"/>
                </div>
                <div class="form-group form-inline">
                    <label for="contact_details">Contact Details</label>
                    <textarea name="contact_details" class="form-control" id="contact_details"><?php echo $contact_details; ?></textarea>
                </div>
                <div class="form-group form-inline">
                    <label for="contact_details">Address</label>
                    <textarea name="address" class="form-control" id="address"><?php echo $address; ?></textarea>
                </div>
            </form>

            <a class="addbtn" id="submit" href="#">
                <?php if($id){?>
                    UPDATE
                <?php }else{?>
                    ADD
                <?php } ?>
            </a>
            <a class="cancelbtn" id="cancel">CANCEL</a>
        </section>
        <!--/ content -->
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/company/js/company_admin.js'); ?>
        <script type="text/javascript">
            Company_admin.initForm();
        </script>
    </body>
</html>