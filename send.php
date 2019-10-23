<?php
/*
* @Version 1.0
* @Envio de SMS via API / GET ou POST
* @Doc http://api.brsms.in/
* @suport <geralsmsbrasil.com.br>
* @date 10/01/2014
* @Web site www.brsms.in
*/

set_time_limit(0);

function send_sms($url,$data) {
	
   	$cURL = curl_init($url);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($cURL, CURLOPT_POST, true);
	curl_setopt($cURL, CURLOPT_POSTFIELDS, $data);

	$resultado = curl_exec($cURL);
	return $resultado;
	curl_close($cURL);  
   
}

$data = array(
	   "send" => "1", // não mudar
	   "token" => "asdasdasd", //Chave fornecida por e-mail
	   "auth" => "asdasdasd",
	   "ddd" => "11", // não usar o "0"
	   "cel" => "99990000",
	   "msg" => "Uma Mensagem enviada pelo sistema!",
	   "output" => "xml" // Saida Retorno do WebServices XML ou JSON
);

echo send_sms("http://api.brsms.in/WebServices.do",$data);
