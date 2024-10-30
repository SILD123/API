<?php

$url = 'http://localhost/prestashop/api/products';
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
        echo "<h2>Listado de Productos</h2>";
        echo "<table";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>";

foreach ($xml->products->product as $product) {
        echo "<tr>";
        echo "<td>" . $customer->id . "</td>";
        echo "<td>" . $customer->name->language . "</td>";
        echo "<td>" . $customer->price . "</td>";
        echo "<td>" . $customer->quantity . "</td>";
}
echo "</table>";

} else {
        echo "Error: no es posible en este momento recuperar la lista de Productos. Còdigo HTT: $httpcode";

 }
curl_close($ch);
?>




