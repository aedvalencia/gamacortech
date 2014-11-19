<div class="logowrap">
	<div class="row">
		<img src="<?php echo base_url('assets/images/ippos.png') ?>" />
	</div>
</div>

<nav>
	<div class="row">
        <?php if(session('userid')){?>
		<ul>
            <li><a href="<?php echo site_url('company/admin');?>">COMPANIES</a></li>
			<li><a href="<?php echo site_url('branch/admin');?>" >BRANCHES</a></li>
			<li><a href="<?php echo site_url('user/admin');?>">USERS</a></li>
            <li><a href="<?php echo site_url('product/admin');?>">PRODUCTS</a></li>
            <li><a href="<?php echo site_url('discount/admin');?>">DISCOUNTS</a></li>
            <li><a href="<?php echo site_url('tax/admin');?>">TAXES</a></li>
            <li><a href="<?php echo site_url('options/admin');?>">OPTIONS</a></li>
		</ul>
        <?php } ?>
		<div class="rightcol">
			<a class="logout" href="<?php echo site_url('logout');?>">LOGOUT</a>
	</div>
</nav>
