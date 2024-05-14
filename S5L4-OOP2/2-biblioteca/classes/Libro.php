<?php
include_once __DIR__ . '/MaterialeBibliotecario.php';

class Libro extends MaterialeBibliotecario
{
    static protected $contatoreMateriali = 0;
    protected $autore;

    public function __construct($titolo, $annoPubblicazione, $autore)
    {
        parent::__construct($titolo, $annoPubblicazione);
        $this->autore = $autore;
        self::$contatoreMateriali++;
    }

    static public function contaLibri()
    {
        return self::$contatoreMateriali;
    }
}
