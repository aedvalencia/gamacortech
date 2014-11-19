<header>
    <img src="<?php echo base_url('assets/images/ippos.png'); ?>" />
</header>
	


<nav>
        <ul>
        <?php if(session('userid')){?>
		
            <li>
                <a href="<?php echo site_url('dashboard');?>">
                    <img src="<?php echo base_url('assets/images/icons/dashboard.png')?>" />
                    Dashboard
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('transactions');?>">
                    <img src="<?php echo base_url('assets/images/icons/sales.png'); ?>" />
                    Transactions
                </a>
            </li>
           <li>
               <a href="#">
                   <img src="<?php echo base_url('assets/images/icons/inventory.png'); ?>" />
                   Inventory
               </a>
           </li>
            <li>
                <a href="#">Reports</a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('reports/transactions'); ?>">Transactions</a></li>
                </ul>
            </li>
           
           <!-- <li><a href="<?php echo site_url('user');?>">My Profile</a></li> -->
		
        <?php } ?>
            <li class="company">ENVIROTEST</li>
			<li><a href="<?php echo site_url('logout');?>">Logout</a></li>
		</ul>
</nav>