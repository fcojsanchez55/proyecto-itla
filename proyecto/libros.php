// libro.php
<?php
class Libro {
    public $isbn;
    public $titulo;
    public $autor;
    public $disponible;

    public function __construct($isbn, $titulo, $autor, $disponible = true) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->disponible = $disponible;
    }

    public function estaDisponible() {
        return $this->disponible;
    }
}
