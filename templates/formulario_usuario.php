<?php

$url = 'http://localhost/prestashop/api/customers';
$username = 'CQTXMMCI9UV5NVZE7JHACQLI687U7SZX';

$action = isset($_POST['action']) ? $POST['action'] : null;
$id = isset($_POST['id']) ? $POST['id'] : null;

if($action){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, $username . ':');

if ($action == 'create'){
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
$data = [
	'customer' => [
	  'firstname' => $_POST['firstname'],
	  'lastname' => $_POST['lastname'],
	  'email' => $_POST['email'],
 	  'passwd' => md5($_POST['passwd']),
	  'active' => 1
]

];
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
} elseif ($action === 'update'){
	curl_setopt($ch, CURLOPT_URL, $url . '/' . $id);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	$data = [
	'customer' => [ 
          'firstname' => $_POST['firstname'],
          'lastname' => $_POST['lastname'],
          'email' => $_POST['email'],
          'passwd' => md5($_POST['passwd']),
          'active' => 1
]

];
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
} elseif ($action === 'delete'){
        curl_setopt($ch, CURLOPT_URL, $url . '/' . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
}

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpcode == 200 || $httpcode ==201){
	echo "Operaciòn $action  ejecutada correctamene.";
} else {
	echo "Error en la operaciòn $action. Còdigo HTTP: $httpcode. Respuesta: $response";
}
curl_close($ch);
}
?>

<!-- Formulario HTML para usuario -->

<h2> Formulario Usuario </h2>
<form method="POST" action="">

<input type="hidden" name="action" value="create">
<label for="firstname">Nombre:</label>
<input type="text" name="firstname" required><br>

<label for="lastname">Apellidos:</label>
<input type="text" name="lastname" required><br>

<label for="email">Email:</label>
<input type="email" name="email" required><br>

<label for="passwd">Contraseña:</label>
<input type="password" name="passwd" required><br>

<button type="submit" name="action" value="create">Crear Usuario</button>
<button type="submit" name="action" value="update">Actualizar Usuario</button>
<button type="submit" name="action" value="delete">ELiminar Usuario</button>

</form>










