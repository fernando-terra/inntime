<?php 
	include ("../Script/script.php");
    include ("main.php");
	include ("../Util/encrypt.php");
	
	$login = strtoupper((string)($_POST['login']));
	$password = (string)($_POST['password']);
	
	$obj = new main();
	$js = new script();
	$hash = new encryptation();
	
	$_result = $obj->Login(trim($login));
	
	foreach ($_result as $row) {
		((password_verify($password, trim($row['password']))) ? $logged = 1 : $logged = 0);
	}
		
	if ($logged == 1){		
		$user = $obj->UserByLogin(trim($login));
		
		foreach ($user as $_row) {
			(($_row['admin'] >= 1) ? $_admin = 1 : $_admin = 0);
			$idUser = $_row['id'];
		}
	
		$GUESTADDR = (string)$_SERVER['REMOTE_ADDR'];
		$logAccess = $obj->LogAccess($idUser, $GUESTADDR);
		
		if($logAccess){			
			session_start();
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
			$_SESSION['isAdmin'] = $_admin;
			header('location:/Pages/Main.php');	
		}else{
			echo $js->js_alertredirect("Nao foi possivel acessar o sistema!","../index.php");
		}		
	}else{		
		unset ($_SESSION['login']);
		unset ($_SESSION['password']);
		unset ($_SESSION['isAdmin']);
		echo $js->js_alertredirect("Usuario ou senha invalidos!","../index.php");
	}

?>