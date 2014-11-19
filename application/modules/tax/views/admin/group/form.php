<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/head');?>
    </head>
    <body class="user">
        <?php $this->load->view('admin/top');?>
        
        <div class="heading">
            <div class="row">
                <h1><img src="<?php echo base_url('assets/images/icons/user-icon.png');?>" /> Tax Group</h1>
            </div>
        </div>
        
        <div class="row">
            <!-- content -->
            <section class="row tmargin4">
    
                <form role="form" id="form" action="" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group form-inline">
                            <label for="">Group Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"/>
                        </div>
                        
                        <div class="form-group form-inline">
                            <label for="">Tax List</label>
                            <select id="tax_options">
                                <?php echo options($tax_list,'');?>
                            </select>
                            <button id="add">Add</button>
                            <br>
                            <ul id="tax_list">
                                <?php foreach($taxes as $tax){?>
                                    <li id="tax_opt_<?php $tax->id;?>">
                                        <?php echo $tax->name;?> - [<a href="#" class="remove">Remove</a>]
                                        <input type="hidden" name="taxes[]" value="<?php echo $tax->id; ?>"/>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                    </div>
                    
                    <div class="col-xs-6">
                        <div class="form-group form-online">
                           <label for="">Description</label>
                           <textarea name="description"><?php echo $description; ?></textarea>
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
            Tax_admin.initGroupForm();
        </script>
    </body>
</html>