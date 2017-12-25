<?php
include ("../App_Code/DAL/DAL.php");

class BLL{
	function Login($login){	
		
		$DAL = new DAL();
		$result = $DAL->getLogin($login);

		return $result; 
	} 
	
	function UserByLogin($login){
		$DAL = new DAL();
		$result = $DAL->getUserByLogin($login);

		return $result;
	}
		
	function LogAccess($idUser, $guest){
		$DAL = new DAL();
		$result = $DAL->setLogAcess($idUser, $guest);

		return $result; 
		
	}

	function Dashboard(){	
		
		$DAL = new DAL();
		$result = $DAL->getDashboard();

		return $result; 
	} 
	
	function Objects(){	
		
		$DAL = new DAL();
		$result = $DAL->getObjects();

		return $result; 
	}
	
	function ObjectsRoom($Id_Room){	
		
		$DAL = new DAL();
		$result = $DAL->getObjectsRoom($Id_Room);

		return $result; 
	} 
	
	function Monitor($Id_Room){	
		
		$DAL = new DAL();
		$result = $DAL->getMonitorByRoomID($Id_Room);

		return $result; 
	} 
	
	function CountLastEvent($object_id){	
		
		$DAL = new DAL();
		$result = $DAL->getCountLastEvent($object_id);

		return $result; 
	} 
	
	function MaxEventAction(){	
		
		$DAL = new DAL();
		$result = $DAL->getMaxEvent();

		return $result; 
	} 
	
	function EnergySpent(){	
		
		$DAL = new DAL();
		$result = $DAL->getEnergySpent();

		return $result; 
	} 
	
	function SetStatusFromMobile($btn, $status, $guest, $event_id){
				
		$DAL = new DAL();
		$result = $DAL->setStatusFromMobile($btn, $status, $guest, $event_id);

		return $result; 
	}
	
	function updateObjFromMobile($btn, $status){
				
		$DAL = new DAL();
		$result = $DAL->updateObjFromMobile($btn, $status);

		return $result; 
	}	
} 

?>
