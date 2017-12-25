<!DOCTYPE html>
<?php
	include ("../Services/main.php");
	include ("../Script/script.php");
	include ("../Services/pageLoad.php");
	$menu = new menu();
	$obj = new main();
    $js = new script();
	
	$obj->validateSession();
	echo $js->js_dropdown();
?>
<html lang="en">
   <head>
	 <style> 
	 	#graphic_div{width: 100%; margin: 0 auto !important; text-align:center;}
	 </style>
	 <?php echo $menu->loadHead(); ?>
	 <script type="text/javascript" src="../Script/loader.js"></script>
	 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Objeto', 'KWh'],
		  
		<?php 		 
			$arr = $obj->EnergySpent();
			foreach ($arr as $row) {
				echo "['" . $row['r_description'] . " - " . $row['time_on'] . "'," . $row['kwh'] . "],";
				#echo "['" . $row['o_description'] . " - " . $row['r_description'] . "'," . $row['kwh'] . "],";
				#echo "['" . $row['r_description'] . "'," . $row['kwh'] . "],";			 
			}
		?>
        ]);

		var options = {
		  'title':'Consumo KWh',
		  'legend':'bottom',
		  'is3D':false,
		  'width':$(window).width(),
		  'height':$(window).height()
		}
        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
      }
    </script>
   </head>
  
   <body>
	<header>
		<?php echo $menu->loadMenu(); ?>
	</header>
	<div id="barchart"></div>
			
    <script src="../Script/fastclick.js"></script>
    <script src="../Script/scroll.js"></script>
    <script src="../Script/fixed-responsive-nav.js"></script>
  </body>
</html>
