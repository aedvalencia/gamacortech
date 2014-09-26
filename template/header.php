<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<!--JQUERYUI CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/jquery/jquery-ui.css" />

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/additional/bootstrap.css" />

<!--DEFAULT CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/default.css" />
<link rel="stylesheet" type="text/css" href="assets/css/custom.css" />

<!--JQUERY-->
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery/jquery-1.8.0.min.js"><\/script>')</script>
<script src="assets/js/jquery/jquery-ui.min.js" type="text/javascript"></script>

<!--BOOTSTRAP-->
<script src="assets/js/additional/bootstrap.js" type="text/javascript"></script>

<!--HTML5-->
<script src="assets/js/jquery/jquery.placeholder.min.js" type="text/javascript"></script>

<!--PLACEHOLDER-->
<script src="assets/js/jquery/modernizr.js" type="text/javascript"></script>

<!--SLIMSCROLL-->
<script src="assets/js/jquery/jquery.slimscroll.min.js" type="text/javascript"></script>

<!--css browser selector -->
<script src="assets/js/jquery/css_browser_selector.js" type="text/javascript"></script>


<script type="text/javascript">
$(function(){
	//Slim Scrollbar
	$('#target').slimscroll({
		height: '210px',
		width: '220px'
	});
	//Radio & Checkbox Styled
	$(".radio").dgStyle();
	$(".checkbox").dgStyle();
	
	//For Place Holder
	$('input, textarea').placeholder();
});
</script>
</head>
<body>
