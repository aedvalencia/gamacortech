<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GAMACOR Innovative Technologies</title>
<link rel="icon" href="assets/images/favicon.png" type="image/png">
	
<!--GOOGLE FONT-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

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

<!--BROWSER SELECTOR-->
<script src="assets/js/jquery/css_browser_selector.js" type="text/javascript"></script>


<script type="text/javascript">
$(function(){
	//For Place Holder
	$('input, textarea').placeholder();
});
</script>
</head>
<body class="login">
	
	<div class="row">
		<div class="loginwrap">
			<div class="col-xs-6"></div>
			<div class="col-xs-6">
				<form>
					<div class="line has-error">
						<input type="text" placeholder="Enter Company Code">
					</div>
					<div class="line has-error">
						<input type="text" placeholder="Enter Username">
					</div>
					<div class="line has-error">
						<input type="text" placeholder="Enter Password">
					</div>
					<div class="center">
						<button class="submit">SUBMIT</button>
					</div>
				</form>
			</div>
		</div>
		
	</div>
	
	<footer>
		<p>Copyright &copy; <?php echo date("Y") ?> GAMACOR Innovative Technologies. All rights reserved.</p>
	</footer>
</body>
</html>
