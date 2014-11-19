<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />


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
        'assets/js/jquery/css_browser_selector.js',
        'assets/js/jquery/jquery.blockUI.js'
    ));
    
    //Add dynamic scripts
    script($this->_script);
?>

<script type="text/javascript">
var siteUrl = "<?php echo site_url('/');?>";
var baseUrl = "<?php echo base_url();?>";

function blockUI(){
     $.blockUI({ css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff'
    } });
}

function unblockUI()
{
     $.unblockUI();
}

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