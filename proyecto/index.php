// index.php
<?php
// Incluir archivos y clases necesarias
require_once 'libro.php';
require_once 'usuario.php';
require_once 'prestamo.php';
require_once 'libros.php';
require_once 'usuarios.php';
require_once 'prestamos.php';


// Ejemplo de cómo listar todos los libros
$libros = listarLibros();
echo "<h2>Listado de Libros</h2>";
echo "<ul>";
foreach ($libros as $libro) {
    echo "<li>{$libro->titulo} (ISBN: {$libro->isbn}) - Autor: {$libro->autor}</li>";
}
echo "</ul>";

// Ejemplo de cómo listar todos los usuarios
$usuarios = listarUsuarios();
echo "<h2>Listado de Usuarios</h2>";
echo "<ul>";
foreach ($usuarios as $usuario) {
    echo "<li>{$usuario->nombre} {$usuario->apellido} (ID: {$usuario->id}, Cédula: {$usuario->cedula})</li>";
}
echo "</ul>";

// Ejemplo de cómo listar todos los préstamos
$prestamos = listarPrestamos();
echo "<h2>Listado de Préstamos</h2>";
echo "<ul>";
foreach ($prestamos as $prestamo) {
    echo "<li>Prestamo #{$prestamo->id}: Libro ISBN {$prestamo->isbnLibro}, Usuario ID {$prestamo->idUsuario}, Estado: {$prestamo->estado}</li>";
}
echo "</ul>";

// Puedes añadir más funcionalidades y formularios según tus necesidades
