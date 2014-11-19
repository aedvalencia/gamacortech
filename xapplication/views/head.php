<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GAMACOR Innovative Technologies</title>
<link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" type="image/png">
<?php 
    //Add pre-defined styles
    style(array(
        'assets/css/jquery/jquery-ui.css',
        'assets/css/additional/bootstrap.css',
        'assets/css/default.css',
        'assets/css/custom.css'
    ));
    
    //Add dynamic styles
    style($this->_style);
    
    //Add pre-defined scripts
    script(array(
        'assets/js/jquery/jquery.min.js',
        'assets/js/additional/bootstrap.js',
        'assets/js/jquery/jquery-ui.min.js',
        'assets/js/jquery/jquery.placeholder.min.js',
        'assets/js/jquery/modernizr.js',
        'assets/js/jquery/jquery.slimscroll.min.js',
        'assets/js/jquery/css_browser_selector.js'
    ));
    
    //Add dynamic scripts
    script($this->_script);
?>

<script type="text/javascript">
var siteUrl = "<?php echo site_url('/');?>";
var baseUrl = "<?php echo base_url();?>";

$(function(){
	//Slim Scrollbar
	$('#target').slimscroll({
		height: '210px',
		width: '220px'
	});
	
	//For Place Holder
	$('input, textarea').placeholder();
});
</script>