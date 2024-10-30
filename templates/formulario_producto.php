<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de producto</title>
<link rel="stylesheet" href= "httpss://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
	<h1 class="my-4"><?php echo isset($producto) ? 'Editar Producto' : 'Crear Producto'; ?></h1>
	<form action="guardar_producto.php" method="POST">
	   <input type="hidden" name="id" value="<?php echo isset($producto['id']) ? $producto['id'] : ''; ?>">

	<div class="mb-3">
	<label for="name" class="form-label">Nombre</label>
	<input type="text" class="form-control" id="name" name="name"
		value="<?php echo isset($producto['name']) ? $producto['name'] : ''; ?>" required>
	</div>

	<div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="text" class="form-control" id="price" name="price"
                value="<?php echo isset($producto['price']) ? $producto['price'] : ''; ?>" required>
        </div>

	<button type="submit" class="btn btn-primary"><?php echo isset($producto) ? 'Actualizar' : 'Crear'; ?></button>
</form>
</div>
</body>
</html>
