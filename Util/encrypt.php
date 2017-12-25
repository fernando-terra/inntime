<?php
class encryptation{

	function encrypt($password){
		$options = [
			'cost' => 10,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
	
		//return password_hash($password, PASSWORD_BCRYPT, $options);
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
?>