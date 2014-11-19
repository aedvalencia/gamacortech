<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="branches">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/branch-icon.png');?>" /> BRANCHES</h1>
            </div>
        </div>
        
        <!-- content -->
        <section class="row tmargin4">

            <form role="form" id="form" action="" method="POST">
                <div class="col-xs-6">
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
                        <label for="diesel_cap">Diesel Cap</label>
                        <input type="text" class="form-control" name="diesel_cap" id="diesel_cap" value="<?php echo $diesel_cap; ?>"/>
                    </div>
                    
                     <div class="form-group form-inline">
                        <label for="gas_cap">Gas Cap</label>
                        <input type="text" class="form-control" name="gas_cap" id="gas_cap" value="<?php echo $gas_cap; ?>"/>
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group form-inline">
                        <label for="mobile_no">Mobile No:</label>
                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $mobile_no; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="tel_no">Tel No:</label>
                        <input type="text" class="form-control" name="tel_no" id="tel_no" value="<?php echo $tel_no; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="contact_person">Contact Person:</label>
                        <input type="text" class="form-control" name="contact_person" id="contact_person" value="<?php echo $contact_person; ?>"/>
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
        
        <?php script(APPPATH.'modules/branch/js/branch_admin.js'); ?>
        <script type="text/javascript">
            Branch_admin.initForm();
        </script>
    </body>
</html>