<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GAMACOR Innovative Technologies</title>
<link rel="icon" href="../assets/images/favicon.png" type="image/png">
	
<!--GOOGLE FONT-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	
<!--BOOTSTRAP CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/additional/bootstrap.css" />

<!--JQUERYUI CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/jquery/jquery-ui.css" />

<!--DEFAULT CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/default.css" />
<link rel="stylesheet" type="text/css" href="../assets/css/custom.css" />

<!-- JQUERY -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js" />
<!--JQuery UI -->
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js" />

<!-- jqGrid language file code-->
<script type="text/javascript" src="../assets/js/jquery/grid.locale-en.js" />

<!-- jqGrid code -->
<script type="text/javascript" src="../assets/js/jquery/jquery.jqGrid.src.js" />

<!-- jqGrid CSS -->
<link rel="stylesheet" href="../assets/css/jquery/ui.jqgrid.css" type="text/css" />

<!--BOOTSTRAP-->
<script src="../assets/js/additional/bootstrap.js" type="text/javascript"></script>

<!--HTML5-->
<script src="../assets/js/jquery/jquery.placeholder.min.js" type="text/javascript"></script>

<!--PLACEHOLDER-->
<script src="../assets/js/jquery/modernizr.js" type="text/javascript"></script>

<!--SLIMSCROLL-->
<script src="../assets/js/jquery/jquery.slimscroll.min.js" type="text/javascript"></script>

<!--css browser selector -->
<script src="../assets/js/jquery/css_browser_selector.js" type="text/javascript"></script>


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

<div class="logowrap">
	<div class="row">
		<img src="../assets/images/logo.png" />
	</div>
</div>

<nav>
	<div class="row">
		<ul>
			<li><a href="branches-list.php">BRANCHES</a></li>
			<li><a href="users-list.php">USERS</a></li>
		</ul>
		
		<div class="rightcol">
			<a class="logout" href="">LOGOUT</a>
		</div>
	</div>
</nav>
