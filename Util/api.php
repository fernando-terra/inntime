<?php
class api{
	function response($method, $route){
		
		$url = "http://34.214.93.196:8080/" . $route; #inntime-api/users"
		$curl = curl_init();

		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => strtoupper($method), /* GET.POST.PUT.UPDATE */
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		$return_code = curl_getinfo($curl);
		
		$obj = json_decode($response, true);					
		//echo ("Reponse: " . $code['http_code']);		
		//echo ($err);

		curl_close($curl);
		
		return $obj;
	}
}
?>