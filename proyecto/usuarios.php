// usuario.php
<?php
class Usuario {
    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $email;

    public function __construct($id, $cedula, $nombre, $apellido, $email) {
        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
    }
}

// usuarios.php

// Funciones CRUD para usuarios

// Simulamos una base de datos en un array
$usuarios = [];

// Función para crear un nuevo usuario
function crearUsuario($id, $cedula, $nombre, $apellido, $email) {
    global $usuarios;
    $usuario = new Usuario($id, $cedula, $nombre, $apellido, $email);
    $usuarios[$id] = $usuario;
}

// Función para buscar un usuario por su ID
function buscarUsuarioPorId($id) {
    global $usuarios;
    return isset($usuarios[$id]) ? $usuarios[$id] : null;
}

// Función para buscar un usuario por su cédula
function buscarUsuarioPorCedula($cedula) {
    global $usuarios;
    foreach ($usuarios as $usuario) {
        if ($usuario->cedula === $cedula) {
            return $usuario;
        }
    }
    return null;
}

// Función para listar todos los usuarios
function listarUsuarios() {
    global $usuarios;
    return $usuarios;
}

// Función para eliminar un usuario
function eliminarUsuario($id) {
    global $usuarios;
    if (isset($usuarios[$id])) {
        unset($usuarios[$id]);
        return true;
    }
    return false;
}
