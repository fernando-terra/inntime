<?php
include("../Util/connectDB.php");
include ("../App_Code/DALSQL/DALSQL.php");

class DAL{
	function getLogin($login){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getLogin($login);
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
	
		return $var; 
	} 
	
	function getUserByLogin($login){
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getUserByLogin($login);
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
	
		return $var; 
	}	
	
	function getDashboard(){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getDashboard();
		$cur = pg_query($link, $sqlCmd);
		
		return $cur; 
	} 	
		
	function getObjects(){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getObjects();
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
	
		return $var; 
	} 	
	
	function getObjectsRoom($Id_Room){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getObjectsRoom($Id_Room);
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
	
		return $var; 
	} 		
	
	function getMonitorByRoomID($Id_Room){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getMonitorByRoomID($Id_Room);
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
		
		return $var; 
	} 	
	
	function getEnergySpent(){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getEnergySpent();
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
		
		return $var; 
	}
	
	function getCountLastEvent($object_id){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getCountLastEvent($object_id);
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
		
		return $var; 
	} 
	
	function getMaxEvent(){	
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->getMaxEvent();
		$cur = pg_query($link, $sqlCmd);
		$var = pg_fetch_all($cur);
		
		return $var; 
	} 
	
	function setLogAcess($idUser, $guest){
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->setLogAcess($idUser, $guest);
		$cur = pg_query($link, $sqlCmd);
		
		return $cur;
	}
	
	function setStatusFromMobile($btn, $status, $guest, $event_id){
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->setStatusFromMobile($btn, $status, $guest, $event_id);
		$cur = pg_query($link, $sqlCmd);
		
		return $cur;
	}
	
	function updateObjFromMobile($btn, $status){
		$conn = new ConnectDB();
		$DALSQL = new DALSQL();
		
		$link = $conn->connect();
		
		$sqlCmd = $DALSQL->updateObjFromMobile($btn, $status);
		$cur = pg_query($link, $sqlCmd);
		
		return $cur;	
	}
} 

?>
