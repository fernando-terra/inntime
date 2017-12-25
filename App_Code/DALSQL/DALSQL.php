<?php

class DALSQL{
	function getLogin($login){	
		
		$sqlCmd  = " SELECT PASSWORD
					   FROM INNT.USERS 
				      WHERE LOGIN = '" . $login . "' 						
						AND DESACTIVATION_DATE IS NULL";
		
		return $sqlCmd; 
	}
	
	function getUserByLogin($login){	
		
		$sqlCmd  = " SELECT ID,
							NAME,
							EMAIL,
							ADMINISTRATOR AS ADMIN
					   FROM INNT.USERS 
					  WHERE UPPER(TRIM(LOGIN)) = UPPER(TRIM('" . $login . "'))
						AND DESACTIVATION_DATE IS NULL";
		
		return $sqlCmd; 
	}

	function getDashboard(){	
		
		$sqlCmd = "SELECT version()";
		
		return $sqlCmd; 
	}
	
	function getObjects(){
		$sqlCmd = "SELECT OBJ.STATUS 	  	AS O_STATUS, 
						  OBJ.ID			AS O_ID,
						  OBJ.DESCRIPTION 	AS O_DESCRIPTION,
						  ROM.DESCRIPTION 	AS R_DESCRIPTION,
						  ROM.ID			AS R_ID
				     FROM INNT.OBJECTS OBJ
		       INNER JOIN INNT.ROOM ROM ON ROM.ID = OBJ.ROOM_ID
					WHERE OBJ.ENABLED = TRUE
		         ORDER BY ROM.DESCRIPTION, OBJ.DESCRIPTION";
				
		return $sqlCmd;
	}
	
	function getObjectsRoom($Id_Room){
		$sqlCmd = "SELECT OBJ.STATUS 	  	AS O_STATUS, 
						  OBJ.ID			AS O_ID,
						  OBJ.DESCRIPTION 	AS O_DESCRIPTION,
						  ROM.DESCRIPTION 	AS R_DESCRIPTION,
						  ROM.ID			AS R_ID
				     FROM INNT.OBJECTS OBJ
		       INNER JOIN INNT.ROOM ROM ON ROM.ID = OBJ.ROOM_ID
					WHERE ROM.ID = " . $Id_Room . "
		         ORDER BY OBJ.ID";
				
		return $sqlCmd;
	}
	
	function getMonitorByRoomID($Id_Room){
		$sqlCmd = " SELECT  MON.ID						  AS ID,
							TO_CHAR(MON.CREATIONDATE,'DD/MM/YYYY hh24:mi:ss') 	AS CREATIONDATE,
							ROM.DESCRIPTION				  AS DESCRIPTION,
							COALESCE(MON.TEMPERATURE, 0) AS TEMPERATURE, 
							COALESCE(MON.UMIDITY, 0) 	  AS UMIDITY
					FROM INNT.MONITOR MON
					INNER JOIN INNT.ROOM ROM ON ROM.ID = MON.ROOM_ID
					WHERE ROM.ID = " . $Id_Room . "
					  AND MON.ID = (SELECT MAX(ID) FROM INNT.MONITOR)
					ORDER BY CREATIONDATE DESC";
		
		return $sqlCmd;
	}
	
	function getCountLastEvent($object_id){
		$sqlCmd = "	SELECT COUNT(ID) AS QTDE,
						   MAX(EVENT_ID) LASTEVT
					  FROM INNT.ACTION 
					 WHERE EVENT_ID = (SELECT MAX(EVENT_ID) 
					    				 FROM INNT.ACTION 
										WHERE OBJECT_ID = " . $object_id . ")";
		
		return $sqlCmd;
	}
	
	function getMaxEvent(){
		$sqlCmd = " SELECT COALESCE(MAX(EVENT_ID),0) AS MAXEVTID FROM INNT.ACTION ";
		
		return $sqlCmd;
	}	
	
	function getEnergySpent(){
		$sqlCmd = "
		    SELECT TBL.R_ID			 AS R_ID, 
				   TBL.R_DESCRIPTION AS R_DESCRIPTION, 
				   SUM(TBL.KWH)      AS KWH,
				   SUM(TBL.TIME_ON)  AS TIME_ON
			FROM (
					WITH A AS (SELECT * 
								 FROM INNT.ACTION 
								WHERE ENABLED = 1 ), 
						B AS (SELECT * 
								 FROM INNT.ACTION 
								WHERE ENABLED = 0 )
						SELECT ROM.ID AS R_ID,
								A.OBJECT_ID                         AS O_ID,
							   OBJ.DESCRIPTION                      AS O_DESCRIPTION,
							   ROM.DESCRIPTION                      AS R_DESCRIPTION,
							   SUM(B.CREATIONDATE - A.CREATIONDATE) AS TIME_ON,
							   OBJ.POWER                            AS O_POWER,       
							  (OBJ.POWER * EXTRACT(EPOCH FROM SUM(B.CREATIONDATE - A.CREATIONDATE)/(60*60) ))/1000 AS KWH
						FROM A 
						INNER JOIN 				  B ON A.EVENT_ID = B.EVENT_ID
						INNER JOIN INNT.OBJECTS OBJ ON OBJ.ID = A.OBJECT_ID
						INNER JOIN INNT.ROOM    ROM ON ROM.ID = OBJ.ROOM_ID
						GROUP BY ROM.ID, 
								 OBJ.ID,
								 A.OBJECT_ID 
				) TBL
			GROUP BY TBL.R_ID, 
					 TBL.R_DESCRIPTION
			ORDER BY 1";
		
		return $sqlCmd;
	}
	
	function setLogAcess($idUser, $guest){
		$sqlCmd = "
		INSERT INTO INNT.LOGACCESS(ID, 
								   ID_USER, 
								   ORIGIN,
								   CONNECTION_DATE) 
						   VALUES (NEXTVAL('SERIAL_LOGACCESS'),
								   " . $idUser . ",  
								   TRIM('" . (string)$guest . "'), 
								   CURRENT_TIMESTAMP)";
		
		return $sqlCmd;
	}
	
	function setStatusFromMobile($btn, $status, $guest, $event_id){
		$sqlCmd = "
		INSERT INTO INNT.ACTION (ID, 
							     CREATIONDATE, 
								 PROCESSDATE, 
						 		 ORIGIN, 
								 OBJECT_ID, 
								 ENABLED,
								 EVENT_ID)
						 VALUES (NEXTVAL('SERIAL_ACTION'), 
								 CURRENT_TIMESTAMP, 
								 NULL, 
								 TRIM('" . (string)$guest . "'), 
								 " . $btn . ",
								 " . $status . ",
								 " . $event_id . ")";
		return $sqlCmd;
	}

	function updateObjFromMobile($btn, $status){
		$sqlCmd = "UPDATE INNT.OBJECTS SET STATUS = " . $status . " WHERE ID = " . $btn;
		
		return $sqlCmd;
	}
} 
?>
