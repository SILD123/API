<?php

define('PRESTASHOP_API_URL', 'http://localhost/prestashop/api');
define('PRESTASHOP_API_KEY', 'CQTXMMCI9UV5NVZE7JHACQLI687U7SZX');

function hacerSolicitudAPI($endpoint, $metodo = 'GET', $data = null){ 
	$url = PRESTASHOP_API_URL . $endpoint;
	$curl curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_USERPWD, PRESTASHOP_API_KEY - ':');
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	switch ($metodo) { 
		case 'POST':
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;
		case 'PUT':
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		case 'DELETE':
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
			break;
}

$respuesta = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

return ($http_code >= 200 && $http_code  < 300)? json_decode($respuesta, true) :null;


function listarClientes(){ 
	return hacerSolicitudAPI('customers?display=full', 'GET');
}

function obtenerClientes($idCliente){ 
        return hacerSolicitudAPI("customers/$idCliente", 'GET');
}

function crearCliente($data){ 
	$xmlData = arrayToXML($data, 'customer');
	return hacerSolicitudAPI('customers', 'POST', $xmlData);
}

function actualizarCliente($idCliente, $data){ 
        $xmlData = arrayToXML($data, 'customer');
        return hacerSolicitudAPI("customers/$idCliente", 'PUT', $xmlData);
}

function eliminarCliente($idCliente){ 
	return hacerSolicitudAPI("customers/$idCliente", 'DELETE');
}


function listarProductos(){ 
        return hacerSolicitudAPI('products?display=full', 'GET');
}

function obtenerProductos($idProducto){ 
        return hacerSolicitudAPI("products/$idProducto", 'GET');
}

function crearProducto($data){ 
        $xmlData = arrayToXML($data, 'product');
        return hacerSolicitudAPI('products', 'POST', $xmlData);
}

function actualizarProducto($idProducto, $data){ 
        $xmlData = arrayToXML($data, 'product');
        return hacerSolicitudAPI("products/$idProducto", 'PUT', $xmlData);
}

function eliminarProducto($idProducto){ 
        return hacerSolicitudAPI("products/$idProducto", 'DELETE');
}

function arrayToXML($data, $rootElement){ 
	$xml = new SimpleXMLElement("<$rootElement/>");

	foreach ($data as $key => $value){
	    $xml->addChild($key, htmlspecialchars($value));
}

	return $xml-> asXML();
}
?>





