// prestamo.php
<?php
class Prestamo {
    public $id;
    public $isbnLibro;
    public $idUsuario;
    public $fechaPrestamo;
    public $fechaDevolucion;
    public $estado;

    public function __construct($id, $isbnLibro, $idUsuario, $fechaPrestamo, $fechaDevolucion, $estado = 'activo') {
        $this->id = $id;
        $this->isbnLibro = $isbnLibro;
        $this->idUsuario = $idUsuario;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
        $this->estado = $estado;
    }
}

// prestamos.php

// Funciones para la gestión de préstamos

// Simulamos una base de datos en un array
$prestamos = [];
$nextPrestamoId = 1;

// Función para registrar un nuevo préstamo
function registrarPrestamo($isbnLibro, $idUsuario, $fechaPrestamo, $fechaDevolucion) {
    global $prestamos, $nextPrestamoId;
    $prestamo = new Prestamo($nextPrestamoId, $isbnLibro, $idUsuario, $fechaPrestamo, $fechaDevolucion);
    $prestamos[$nextPrestamoId] = $prestamo;
    $nextPrestamoId++;
}

// Función para extender la fecha de devolución de un préstamo
function extenderFechaDevolucion($prestamoId, $nuevaFechaDevolucion) {
    global $prestamos;
    if (isset($prestamos[$prestamoId])) {
        $prestamos[$prestamoId]->fechaDevolucion = $nuevaFechaDevolucion;
    }
}

// Función para marcar un préstamo como recibido
function marcarPrestamoRecibido($prestamoId) {
    global $prestamos;
    if (isset($prestamos[$prestamoId])) {
        $prestamos[$prestamoId]->estado = 'devuelto';
    }
}

// Función para obtener detalles de un préstamo por su ID
function obtenerDetallesPrestamo($prestamoId) {
    global $prestamos;
    return isset($prestamos[$prestamoId]) ? $prestamos[$prestamoId] : null;
}

// Función para listar todos los préstamos
function listarPrestamos() {
    global $prestamos;
    return $prestamos;
}

// Función para listar préstamos de un usuario por su ID o cédula
function listarPrestamosPorUsuario($identificador) {
    global $prestamos, $usuarios;
    $prestamosUsuario = [];
    foreach ($prestamos as $prestamo) {
        if ($prestamo->idUsuario === $identificador) {
            $prestamosUsuario[] = $prestamo;
        }
    }
    return $prestamosUsuario;
}

// Función para filtrar préstamos por estado
function filtrarPrestamosPorEstado($estado) {
    global $prestamos;
    $prestamosFiltrados = [];
    foreach ($prestamos as $prestamo) {
        if ($prestamo->estado === $estado) {
            $prestamosFiltrados[] = $prestamo;
        }
    }
    return $prestamosFiltrados;
}

// Función para marcar préstamos como vencidos si la fecha de devolución ha pasado
function marcarPrestamosVencidos() {
    global $prestamos;
    $hoy = date('Y-m-d');
    foreach ($prestamos as $prestamo) {
        if ($prestamo->fechaDevolucion < $hoy && $prestamo->estado === 'activo') {
            $prestamo->estado = 'vencido';
        }
    }
}
