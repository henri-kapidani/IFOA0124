<?php

trait Sport
{
    public $sport = 'soccer';

    function exercise()
    {
        echo "I'm playing $this->sport<br>";
    }
}
