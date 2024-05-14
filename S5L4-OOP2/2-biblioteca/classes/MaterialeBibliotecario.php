<?php
include_once __DIR__ . '/../interfaces/Prestito.php';

abstract class MaterialeBibliotecario implements Prestito
{
    static protected $contatoreMateriali = 0;
    protected $titolo;
    protected $annoPubblicazione;

    public function __construct($titolo, $annoPubblicazione)
    {
        $this->titolo = $titolo;
        $this->annoPubblicazione = $annoPubblicazione;
        self::$contatoreMateriali++;
    }

    public function presta()
    {
        self::$contatoreMateriali--;
        static::$contatoreMateriali--;
    }

    public function restituisci()
    {
        self::$contatoreMateriali++;
        static::$contatoreMateriali++;
    }

    static public function contaMateriali()
    {
        return self::$contatoreMateriali;
    }
}
