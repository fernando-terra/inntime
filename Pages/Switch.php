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
	<?php echo $menu->loadHead(); ?>
	<!-- ATUALIZAÇÃO AUTOMATICA DA PAGINA | 10 segundos -->
	<meta http-equiv="refresh" content="10";url=switch.php;">

	<script type="text/javascript">
		function onchange_checkbox(chkstatus){
			var x = ""
			var d;

			if (d) document.body.removeChild(d);
			var chkbutton = document.getElementById(chkstatus).id;
			d = document.createElement("script");
			d.type = "text/javascript";

			if(document.getElementById(chkstatus).checked) {
				x = window.confirm("Deseja ATIVAR?")
				if (x){
					d.src = "../Services/decode.php?btn="+chkbutton+"&status=1";
					document.body.appendChild(d);
				}else{
					document.getElementById(chkstatus).checked = false;	
				}
			} else {
				x = window.confirm("Deseja DESATIVAR?")
				if (x){
					d.src = "../Services/decode.php?btn="+chkbutton+"&status=0";
					document.body.appendChild(d);
				}else{
					document.getElementById(chkstatus).checked = true;
				}
			}
		}
	</script>	
  </head>
  <body>

    <header>
		<?php echo $menu->loadMenu(); ?>
    </header>

	<section class="switcher" >
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
					<th><span class="glyphicon glyphicon-off"></span> Status</th>
						<th><span class="glyphicon glyphicon-bed"></span> Cômodo</th>
						<th><span class="glyphicon glyphicon-lamp"></span> Objeto</th>
					</tr>
				</thead>
				<tbody>			
					<?php			
					$arr = $obj->GetObjects();				
					foreach ($arr as $row) {
						(($row['o_status'] == 1) ? $status = "checked" : $status = "unchecked");						
						echo "
							<tr>
								<td>
									<label class=\"switch\">
									<input name=\"chkstatus\" id=\"btnstatus_" . $row['o_id'] . " \" onchange=\"onchange_checkbox(this.id);\" type=\"checkbox\"$status>
									<span class=\"slider round\"></span>
								</td>
								<td> " . $row['r_description'] . " </td>
								<td> " . $row['o_description'] . " </td>
							</tr> ";
					}								
					?>
				</tbody>
			</table>
		</div>
	</section>

    <script src="../Script/fastclick.js"></script>
    <script src="../Script/scroll.js"></script>
    <script src="../Script/fixed-responsive-nav.js"></script>
  </body>
</html>
