<?php
	$ip = '192.168.88.221';
	$proxy = '87.255.10.12:5999:formade:formade2';
	$proxyauth = 'formade:formade2';


	$headers = array(
		'_TclRequestVerificationKey: KSDHSDFOGQ5WERYTUIQWERTYUISDFG1HJZXCVCXBN2GDSMNDHKVKFsVBNf',
		'_TclRequestVerificationToken: df76bgjo32;1_[YZ',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36',
		'Referer: http://192.168.88.221/index.html',
		'Content-Type: application/json;charset=UTF-8'
	);

	//$data = array("id" => "12","jsonrpc" => "2.0","method"=>"GetCurrentLanguage","params" => array ());
	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"Login","params" => array ("UserName"=>"dc13ibej?7","Password"=>"dc13ibej?7"));
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	$token = json_decode($html);
	$token = $token->result->token;
	curl_close($ch);

	$tcl_key = encrypter(strval($token));

	sleep(2);

	$headers = array(
		'_TclRequestVerificationKey: KSDHSDFOGQ5WERYTUIQWERTYUISDFG1HJZXCVCXBN2GDSMNDHKVKFsVBNf',
		'_TclRequestVerificationToken: '.$tcl_key,
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36',
		'Referer: http://192.168.88.221/index.html',
		'Content-Type: application/json;charset=UTF-8'
	);


	//$data = array("id" => "12","jsonrpc" => "2.0","method"=>"GetCurrentLanguage","params" => array ());
	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"DisConnect","params" => array ());
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	curl_close($ch);

	sleep(2);

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"SetNetworkSettings","params" => array ("NetworkMode"=>3,"NetselectionMode"=>0,"NetworkBand"=>255,"DomesticRoam"=>0,"DomesticRoamGuard"=>0));
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	curl_close($ch);

	sleep(2);

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"SetNetworkSettings","params" => array ("NetworkMode"=>0,"NetselectionMode"=>0,"NetworkBand"=>255,"DomesticRoam"=>0,"DomesticRoamGuard"=>0));
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	curl_close($ch);

	sleep(2);

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"SetNetworkSettings","params" => array ("NetworkMode"=>3,"NetselectionMode"=>0,"NetworkBand"=>255,"DomesticRoam"=>0,"DomesticRoamGuard"=>0));
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	curl_close($ch);

	sleep(2);

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"Connect","params" => array ());
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	curl_close($ch);

	sleep(2);

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"Logout","params" => array ());
	$postdata = json_encode($data);


	$ch = curl_init('http://192.168.88.221/jrd/webapi');
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
	curl_setopt($ch, CURLOPT_PROXY, $proxy); 
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$html = curl_exec($ch);
	curl_close($ch);

	echo "OK";


	function encrypter($str) 
	{
		if ($str == "" || $str === undefined) 
		{
			return "";
		}
		$key = "e5dl12XYVggihggafXWf0f2YSf2Xngd1"; // There's a hardcoded key here.
		$str1 = array();
		$encryStr = "";
		for ($i = 0; $i < strlen($str); $i++) 
		{
			$char_i = $str[$i];
			$num_char_i = ord($char_i);
			$str1[2 * $i] = 240 & ord($key[$i % strlen($key)]) | 15 & $num_char_i ^ 15 & ord($key[$i % strlen($key)]);
			$str1[2 * $i + 1] = 240 & ord($key[$i % strlen($key)]) | $num_char_i >> 4 ^ 15 & ord($key[$i % strlen($key)]);
		}
		for ($i = 0; $i < count($str1); $i++) 
		{
			$encryStr .= chr($str1[$i]);
		}
		return $encryStr;
	}
?>