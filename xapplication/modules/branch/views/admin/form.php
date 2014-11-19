<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body>
        <?php $this->load->view('admin/top');?>
        <h3>Branch</h3>
        <!-- content -->
        <section class="row tmargin4">

            <form role="form" id="form" action="" method="POST">
                <div class="form-group form-online">
                    <label for="company">Company</label>
                    <select name="company" id="company" class="form-control">
                        <?php echo options($company_options,$company_id);?>
                    </select>
                </div>
                <div class="form-group form-inline">
                    <label for="name">Branch Name</label>
                    <input type="text" class="form-control" name="name" id="username" value="<?php echo $name; ?>"/>
                </div>
                <div class="form-group form-inline">
                    <label for="code">Branch Code</label>
                    <input type="text" class="form-control" name="code" id="code" value="<?php echo $code; ?>"/>
                </div>
                <div class="form-group form-inline">
                    <label for="tin">TIN</label>
                    <input type="text" class="form-control" name="tin" id="tin" value="<?php echo $tin; ?>"/>
                </div>
                <div class="form-group form-online">
                    <label for="area">Area</label>
                    <select name="area" id="area" class="form-control">
                        <?php echo options('area',$area);?>
                    </select>
                </div>
                <div class="form-group form-online">
                    <label for="in_charge">In Charge</label>
                    <select name="in_charge" id="in_charge" class="form-control">
                        <?php echo options_with_empty($managers,$in_charge);?>
                    </select>
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
        
        <?php script(APPPATH.'modules/branch/js/branch_admin.js'); ?>
        <script type="text/javascript">
            Branch_admin.initForm();
        </script>
    </body>
</html>