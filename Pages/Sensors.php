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
   	 <!-- ATUALIZAÇÃO AUTOMATICA DA PAGINA | 10 segundos -->
	 <meta http-equiv="refresh" content="5";url=switch.php;">	
	 <style> 
	 	#graphic_div{width: 100%; margin: 0 auto !important; text-align:center;}
	 </style>
	 <?php echo $menu->loadHead(); ?>
	 <script type="text/javascript" src="../Script/loader.js"></script>
	 <script type="text/javascript">
       google.charts.load('current', {'packages':['gauge']});
       google.charts.setOnLoadCallback(drawChart);
   
       function drawChart() {
		   
	    <?php 		 
			$arr = $obj->Monitor(3);
			foreach ($arr as $row) {
			echo "
			 var data = google.visualization.arrayToDataTable([
			   ['Label', '".$row['description']."'],
			   ['Umidade', ".$row['umidity']."],
			   ['ºC', ".$row['temperature']."]
			 ]);
			 ";			 
			 $updated = $row['creationdate'];
			 $room = $row['description'];
			}
		?>
							 
         var options = {
           width: $(window).width(), height: $(window).height()*0.5,
           redFrom: 90, redTo: 100,
           yellowFrom:75, yellowTo: 90,
           minorTicks: 5
         };
   
         var chart = new google.visualization.Gauge(document.getElementById('graphic_div'));
   
         chart.draw(data, options);		
	 	}
     </script>
   </head>
  
   <body>
	<header>
		<?php echo $menu->loadMenu(); ?>
	</header>
	<br/><br/><br/><br/>	
	<div class="container">
		<div style="text-align: center; font-style:calibri;"><h1>Análise Tempo Real</h1></div>	
		<br/>
	</div>
	<div><h3 style="text-align: center;"><?php echo $room; ?></h3></div>
	<div id="graphic_div"></div>
	<br/><br/>	
	<div style="text-align: center; font-style: calibri; font-size:12px;">Atualizado em <?php echo $updated;?></div>			
    <script src="../Script/fastclick.js"></script>
    <script src="../Script/scroll.js"></script>
    <script src="../Script/fixed-responsive-nav.js"></script>
  </body>
</html>
