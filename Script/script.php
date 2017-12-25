<?php
class script{
	function js_dropdown(){
		$js = "	<script type=\"text/javascript\">
				function myFunction() {
					document.getElementById(\"myDropdown\").classList.toggle(\"show\");
				}

				// Close the dropdown menu if the user clicks outside of it
				window.onclick = function(event) {
				  if (!event.target.matches('.dropbtn')) {

					var dropdowns = document.getElementsByClassName(\"dropdown-content\");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					  var openDropdown = dropdowns[i];
					  if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					  }
					}
				  }
				}
				</script>
			";
		return $js;
	}
	
	
	function js_login(){
		$js = "
			<script>
				var modal = document.getElementById('id01');

				window.onclick = function(event) {
				if (event.target == modal) {
				modal.style.display = \"none\";
				}
				}
			</script>";
			
		return $js;
	}
	
	function js_check(){
		$js = "
		<script type=\"text/javascript\">
			alert('chegueaaai aqui nessamerda');
		</script>";
			
		return $js;
	}
	
	function js_alert($msg){
		$js = "
		<script>
			window.alert ('". $msg ."');
		</script>";
			
		return $js;
	}
	
	function js_alertredirect($msg, $redirect){
		$js = "
		<script>
			window.alert ('". $msg ."'); location.href='" . $redirect . "';
		</script>";
			
		return $js;
	}
}
?>
