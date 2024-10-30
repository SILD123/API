<?php

$url = 'http://localhost/prestashop/api/customers';
$username= 'CQTXMMCI9UV5NVZE7JHACQLI687U7SZX';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CARLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $username . ':');

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpcode == 200){
	xml = simplexml_load_string($response);
	echo "<h2>Listado de Usuarios</h2>";
	echo "<table";
	echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th></tr>";

foreach ($xml->customers->customer as $customer) {
	echo "<tr>";
	echo "<td>" . $customer->id . "</td>";
	echo "<td>" . $customer->fristname . "</td>";
	echo "<td>" . $customer->lastname . "</td>";
	echo "<td>" . $customer->email . "</td>";
}
echo "</table>";

} else {
	echo "Error: no es posible en este momento recuperar la lista de usuarios. Còdigo HTTP: $httpcode";

 }
curl_close($ch);
?>






