<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> User</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            <section class="row tmargin4">
    
                <form role="form" id="form" action="" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group form-inline">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname; ?>"/>
                        </div>
                        <div class="form-group form-inline">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $middlename; ?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                         <div class="form-group form-online">
                        <label for="company">Company</label>
                        <select name="company" id="company" class="form-control">
                            <?php echo options($company_options,$company_id);?>
                        </select>
                    </div>
                    <div class="form-group form-online">
                        <label for="branch">Branch</label>
                        <select name="branch" id="branch" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    
                    <div class="form-group form-online">
                        <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <?php echo options('user_status',$status); ?>
                            </select>
                        </div>
                        
                        <div class="form-group form-online">
                            <label for="user_type">User Type</label>
                            <select name="user_type" id="user_type" class="form-control">
                                <?php echo options('user_type',$user_type); ?>
                            </select>
                        </div>
                        
                        <div class="form-group form-online">
                            <label for="access_profile">Access Profile</label>
                            <select name="access_profile" id="access_profile" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                <div class="clear"></div>
                
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
            <!--/ content -->
        </div>
        
        <?php $this->load->view('admin/bottom');?>
        
        <?php script(APPPATH.'modules/user/js/user_admin.js'); ?>
        <script type="text/javascript">
            User_admin.initForm();
        </script>
    </body>
</html>