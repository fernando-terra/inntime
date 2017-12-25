<?php

include ("encrypt.php");
$hash = new encryptation();

$password = 'admin1234';

print $hash->encrypt(trim($password));

?>