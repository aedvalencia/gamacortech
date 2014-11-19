<div class="logowrap">
	<div class="row">
		<img src="<?php echo base_url('assets/images/logo.png') ?>" />
	</div>
</div>

<nav>
	<div class="row">
        <?php if(session('userid')){?>
		<ul>
            <li><a href="<?php echo site_url('company/admin');?>">COMPANIES</a></li>
			<li><a href="<?php echo site_url('branch/admin');?>" >BRANCHES</a></li>
			<li><a href="<?php echo site_url('user/admin');?>">USERS</a></li>
		</ul>
        <?php } ?>
		<div class="rightcol">
			<a class="logout" href="<?php echo site_url('login/void');?>">LOGOUT</a>
		</div>
	</div>
</nav>
