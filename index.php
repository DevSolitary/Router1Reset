<?php
	$ip = '192.168.88.221'; //IP
	$proxy = '87.255.10.12:5999'; //Адрес и порт прокси
	$proxyauth = 'formade:formade2'; //Автоизация прокси
	$tclkey = 'KSDHSDFOGQ5WERYTUIQWERTYUISDFG1HJZXCVCXBN2GDSMNDHKVKFsVBNf'; //Ключ
	$login = "admin"; //Логин
	$password = "admin"; //Пароль


	$headers = array(
		'_TclRequestVerificationKey: '.$tclkey,
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36',
		'Referer: http://'.$ip.'/index.html',
		'Content-Type: application/json;charset=UTF-8'
	); 

	//Авторизация

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"Login","params" => array ("UserName"=>encrypter($login),"Password"=>encrypter($password)));
	$postdata = json_encode($data);


	$ch = curl_init('http://'.$ip.'/jrd/webapi'); //Адрес запроса к API
	curl_setopt($ch, CURLOPT_TIMEOUT, 4000); // Допустимое время выполнения запроса
	curl_setopt($ch, CURLOPT_PROXY, $proxy); // Адрес и порт прокси
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth); //Логин и пароль прокси
	curl_setopt($ch, CURLOPT_POST, true); // Тип запроса = POST
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); // Отдача параметров в JSON
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Отключаем проверку SSL
	curl_setopt($ch, CURLOPT_HEADER, false); // Отключаем выдачу заголовков
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Заголовки запроса
	$html = curl_exec($ch);
	$token = json_decode($html);


	$token = $token->result->token; //Получаем в ответе токен, из которого сгенерируем _TclRequestVerificationToken


	curl_close($ch);


	$tcl_key = encrypter(strval($token));


	sleep(2);

	// Отключаем сеть

	$headers = array(
		'_TclRequestVerificationKey: '.$tclkey,
		'_TclRequestVerificationToken: '.$tcl_key,
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36',
		'Referer: http://'.$ip.'/index.html',
		'Content-Type: application/json;charset=UTF-8'
	);

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"DisConnect","params" => array ());
	$postdata = json_encode($data);


	$ch = curl_init('http://'.$ip.'/jrd/webapi');
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

	// Ставим режим авто

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"SetNetworkSettings","params" => array ("NetworkMode"=>0,"NetselectionMode"=>0,"NetworkBand"=>255,"DomesticRoam"=>0,"DomesticRoamGuard"=>0));
	$postdata = json_encode($data);


	$ch = curl_init('http://'.$ip.'/jrd/webapi');
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

	// Ставим режим LTE

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"SetNetworkSettings","params" => array ("NetworkMode"=>3,"NetselectionMode"=>0,"NetworkBand"=>255,"DomesticRoam"=>0,"DomesticRoamGuard"=>0));
	$postdata = json_encode($data);


	$ch = curl_init('http://'.$ip.'/jrd/webapi');
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

	// Подключаем соединение. Ждем, пока на наш запрос придет успешный результат

	$is_connected = false;

	while(!$is_connected)
	{
		$data = array("id" => "12","jsonrpc" => "2.0","method"=>"Connect","params" => array ());
		$postdata = json_encode($data);


		$ch = curl_init('http://'.$ip.'/jrd/webapi');
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
		$res = json_decode($html);
		$is_connected = isset($res->result);

		curl_close($ch);

		sleep(2);
	}

	//Выходим, что бы следующий скрипт начал работать с авторизации без ошибок

	$data = array("id" => "12","jsonrpc" => "2.0","method"=>"Logout","params" => array ()); //Выход
	$postdata = json_encode($data);


	$ch = curl_init('http://'.$ip.'/jrd/webapi');
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


	function encrypter($str) //функция шифрования для данных
	{
		if ($str == "") 
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