<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('user/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('user/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Me</h1>
            </div>
        </div>
        
        <div class="row me">
            <!-- content -->
            
            <div class="sixcol">
                <div class="line">
                    <label>Username</label>
                    <?php echo $username; ?>
                </div>
                
                <div class="line">
                    <label>Email</label>
                    <?php echo $email; ?>
                </div>
                
                <div class="line">
                    <label>Status</label>
                    <?php echo $status; ?>
                </div>
                
                <div class="line">
                    <label>First Name</label>
                    <?php echo $firstname; ?>
                </div>
                
                <div class="line">
                    <label>Last Name</label>
                    <?php echo $lastname; ?>
                </div>
            </div>
            
            <div class="sixcol">
                <div class="line">
                    <label>Company Name</label>
                    <?php echo $company; ?>
                </div>
                
                <div class="line">
                    <label>Branch</label>
                    <?php echo $branch; ?>
                </div>
                
                <div class="line">
                    <label>User Type</label>
                    <?php echo $user_type; ?>
                </div>
                
                <div class="line">
                    <label>Access Profile</label>
                    <?php echo $access_profile; ?>
                </div>
            </div>
            
            
            
            <!--/ content -->
        </div>
        
        <?php $this->load->view('user/bottom');?>
        
    </body>
</html>