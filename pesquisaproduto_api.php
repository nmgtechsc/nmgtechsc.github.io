<?php
$url = 'https://api.tiny.com.br/api2/produtos.pesquisa.php';
$token = '5daebbe3221472ea8226d6c8b386d45f5586d83b';
$pesquisa = '';
$pagina = '';
$data = "token=$token&pesquisa=$pesquisa&pagina=$pagina&formato=JSON";


enviarREST($url, $data);    

function enviarREST($url, $data, $optional_headers = null) {
	$params = array('http' => array(
		'method' => 'POST',
	    'content' => $data
	));
	
	if ($optional_headers !== null) {
		$params['http']['header'] = $optional_headers;
	}
	
	$ctx = stream_context_create($params);
	$fp = @fopen($url, 'rb', false, $ctx);
	if (!$fp) {
		throw new Exception("Problema com $url, $php_errormsg");
	}
	$response = @stream_get_contents($fp);
	if ($response === false) {
		throw new Exception("Problema obtendo retorno de $url, $php_errormsg");
	}
	
	return $response;
}
 

$response = enviarREST($url, $data);
$responsedecode = json_decode($response,true);
$paginas = $responsedecode ['retorno']['numero_paginas'];
$pagina_atual = $responsedecode ['retorno']['pagina'];
	
	if ($pagina_atual <> $paginas){
		$pagina = $pagina_atual + 1;
		enviarREST($url, $data);
		//print_r($pagina . "<br>");
		//print_r($pagina_atual . "<br>");
		
	}
	


file_put_contents("BDprodutos.json",$response,1);

$BdProdutos = json_decode(file_get_contents("BDprodutos.json"), true);


    
?>