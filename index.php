<?php
// index.php 

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name= 'viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Aplicacion PrestaShop</title>";
echo "</head>";
echo "body";

echo "<h1>Bienvenido a mi aplicaciòn de integraciòn con PrestaShop</h1>";

echo "<div>";
echo "<h2>Gestiòn de usuarios</h2>";
echo "<ul>";
echo "<li><a href='templates/listado_usuarios.php'>Listar Usuarios</a></li>";
echo "<li><a href='templates/formulario_usuario.php'>Crear usuario</a></li>";
echo "</ul>";

echo "<h2>Gestiòn de Productos</h2>";
echo "<ul>";
echo "<li><a href='templates/listado_productos.php'>Listar Productos</a></li>";
echo "<li><a href='templates/formulario_producto.php'>Crear producto</a></li>";
echo "</ul>";
echo "</div>";
echo "</html>";



