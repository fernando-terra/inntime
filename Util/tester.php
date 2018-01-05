<?php
include("api.php");

$http = new api;

$response = $http->response("GET", "inntime-api/users");
$obj = $response[0];

echo $obj['id'] . "<br/>";
echo $obj['name'] . "<br/>";
echo $obj['email'] . "<br/>";
echo $obj['creation_date'] . "<br/>";
echo $obj['desactivation_date'] . "<br/>";
echo $obj['login'] . "<br/>";
echo $obj['password'] . "<br/>";
echo $obj['administrator'] . "<br/>";

?>