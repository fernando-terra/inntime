<?php
class main{
	
	function Login($login){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->Login($login);

		if ($result) {
			return $result;
		}
	}
	
	function isAdmin($login){
		#include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->isAdmin($login);
		
		return $result;
	}
	
	function UserByLogin($login){
		$BLL = new BLL();
		
		$result = $BLL->UserByLogin($login);
		return $result;
	}

	function LogAccess($idUser, $guest){
		#include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
				
		$result = $BLL->LogAccess($idUser, $guest);
		
		return $result;
	}
	
	function validateSession(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['password']) == true))
		{
			unset($_SESSION['login']);
			unset($_SESSION['password']);
			header('location:../index.php');
		}
		$logado = $_SESSION['login'];
		return $logado;
	}
	
	function dashboard(){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->Dashboard();

		if ($result) {
			for ($row = 0; $row < pg_numrows($result); $row++) {
				$values = pg_fetch_row($result, $row);
				$fullname = "";
				for ($col = 0; $col < count($values); $col++) {
					$fullname .= $values[$col] . " ";
				}
				echo "$fullname<br>";
			}
		}
	}
	
	function Monitor($Id_Room){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->Monitor($Id_Room);

		if ($result) {
			return $result;
		}
	}

	function GetObjects(){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->Objects();
		$values = array();

		if ($result) {
			return $result;
		}
	}
	
	function GetObjectsRoom($Id_Room){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->ObjectsRoom($Id_Room);

		if ($result) {
			return $result;
		}
	}	
	
	function EnergySpent(){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();
		$result = $BLL->EnergySpent();

		if ($result) {
			return $result;
		}
	}	
	
	function SetStatusFromMobile($btn, $status, $guest){
		include("../App_Code/BLL/BLL.php");
		$BLL = new BLL();		
		
		$_event = $BLL->CountLastEvent((string)$btn);	
		$event_id = $BLL->MaxEventAction();

		foreach($event_id as $row){
			$max = $row['maxevtid'];
		}	
		
		foreach($_event as $row){
			if($row['qtde'] == 0){
				$teste = $max + 1;
			}elseif($row['qtde'] == 2){
				$teste = $max + 1;
			}elseif($row['qtde'] == 1){
				$teste = $row['lastevt'];
			}
		}	
		
		$_result = $BLL->SetStatusFromMobile($btn, $status, $guest, $teste);		
		
		/*PROVISORIO!!!! */
		/* TEM QUE MUDAR ISSO AQUI.. ELE TA ATUALIZANDO O STATUS DO OBJ PRA APARECER NA TELA*/
		$_result2 = $BLL->updateObjFromMobile($btn, $status);
		/*PROVISORIO!!!! */	
		
		if($_result && $_result2){
			return "alert(\"Sucesso :)\");";
		}else{
			return "alert(\"Oops :(\");";
		}
	}
}
?>
