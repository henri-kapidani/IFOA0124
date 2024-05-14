<?php
include_once __DIR__ . '/MaterialeBibliotecario.php';

class DVD extends MaterialeBibliotecario
{
    static protected $contatoreMateriali = 0;
    protected $regista;

    public function __construct($title, $annoPubblicazione, $regista)
    {
        parent::__construct($title, $annoPubblicazione);
        $this->regista = $regista;
        self::$contatoreMateriali++;
    }

    static public function contaDVD()
    {
        return self::$contatoreMateriali;
    }
}
