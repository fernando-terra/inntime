<!DOCTYPE html>
<?php
	include ("../Services/main.php");
	include ("../Services/pageLoad.php");
	include ("../Script/script.php");
	
	$menu = new menu();
	$obj = new main();
    $js = new script();

	$obj->validateSession();
	echo $js->js_dropdown();

	$isAdmin = $_SESSION['isAdmin'];
?>
<html>
	<head>
		<head><?php echo $menu->loadHead(); ?></head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false">
		<link rel="stylesheet" href="../Content/menu.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>			
	
		<!-- InnTime Logo -->

		
		<div class="row">
			<div class="colt-4" style="background-color:#2d2d2d;"><img src="../Images/logopng.png"></div>
		</div>
		
		<br><br>

		<div class="row">
			<div class="col-4 menu menu-blue-light">
			  <ul><a href="Main.php"><li class="icon-text"><i class="fa fa-home w3-xxxlarge"><h4>Home</h4></i></li></a></ul>
			</div>
			<div class="col-4 menu menu-blue-light">
			  <ul><a href="Analytics.php"><li class="icon-text"><i class="fa fa-bar-chart w3-xxxlarge"><h4>Consumo</h4></i></li></a></ul>				
			</div>
			<div class="col-4 menu menu-blue-light">
			  <ul><a href="Switch.php"><li class="icon-text"><i class="fa fa-toggle-on w3-xxxlarge"><h4>On/Off</h4></i></li></a></ul>
			</div>
		</div><br/>

		<?php
			if ($isAdmin == 1){
				echo "
				<div class=\"row\">
					<div class=\"col-4 menu menu-blue-light-disabled\">
					  <ul><a href=\"#\"><li class=\"icon-text\"><i class=\"fa fa-users w3-xxxlarge\"><h4>Usuarios</h4></i></li></a></ul>
					</div>
					<div class=\"col-4 menu menu-blue-light-disabled\">
					  <ul><a href=\"#\"><li class=\"icon-text\"><i class=\"fa fa-lightbulb-o w3-xxxlarge\"><h4>Objetos</h4></i></li></a></ul>
					</div>
					<div class=\"col-4 menu menu-blue-light-disabled\">
					  <ul><a href=\"#\"><li class=\"icon-text\"><i class=\"fa fa-bed w3-xxxlarge\"><h4>Comodos</h4></i></li></a></ul>
					</div>
				</div><br/>
				";
			}
		?>

		<div class="row">
			<div class="col-4 menu menu-blue-light">
			  <ul><a href="Sensors.php"><li class="icon-text"><i class="fa fa-dashboard w3-xxxlarge"><h4>Sensores</h4></i></li></a></ul>
			</div>
			<div class="col-4 menu menu-blue-light">
			  <ul><a href="../Services/logout.php"><li class="icon-text"><i class="fa fa-sign-out w3-xxxlarge"><h4>Sair</h4></i></li></a></ul>
			</div>
		</div>

		<script src="../Script/fastclick.js"></script>
		<script src="../Script/scroll.js"></script>
		<script src="../Script/fixed-responsive-nav.js"></script>
	</body>
</html>
