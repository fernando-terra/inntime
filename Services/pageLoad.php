<?php 
class menu{
 function loadMenu(){
	 return "
		<nav class=\"navbar navbar-inverse\" style=\"font-size:18px;\">
			<div class=\"container-fluid\">
				<div class=\"navbar-header\">
					<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>                        
					</button>
					<a class=\"navbar-brand\" href=\"../Pages/Main.php\">INNTIME Tech</a>
				</div>
				<div class=\"collapse navbar-collapse\" id=\"myNavbar\">
					<ul class=\"nav navbar-nav\">
						<li><a href=\"../Pages/Main.php\"><span class=\"glyphicon glyphicon-home\"></span> Home</a></li>
						<li><a href=\"../Pages/Analytics.php\"><span class=\"glyphicon glyphicon-stats\"></span> Consumo</a></li>
						<li><a href=\"../Pages/Sensors.php\"><span class=\"glyphicon glyphicon-dashboard\"></span> Sensores</a></li>
						<li><a href=\"../Pages/Switch.php\"><span class=\"glyphicon glyphicon-random\"></span> ON/OFF</a></li>					
					</ul>
					<ul class=\"nav navbar-nav navbar-right\">
						<li><a href=\"../Services/logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>";
	}
	
	function loadHead(){
		return "
		<meta charset=\"utf-8\">
		<title>INNTIME</title>
		<meta name=\"viewport\" content=\"width=device-width,initial-scale=1, maximum-scale=1.0, user-scalable=false\">
		<meta name=\"theme-color\" content=\"#000\">
		<meta name=\"mobile-web-app-capable\" content=\"yes\">
		<link rel=\"icon\" href=\"../Images/logopng.png\">	  
		<link rel=\"stylesheet\" href=\"../Content/style.css\">
		<link rel=\"stylesheet\" href=\"../Content/styles.css\">
		<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css\">  
		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
		<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
		<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
		<script src=\"../Script/responsive-nav.js\"></script>
		";
	}
}
 ?>
	