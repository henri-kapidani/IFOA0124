<?php

setcookie('daPagina1', 'ciao', time() + 60 * 60, '/', 'localhost', true);

echo '<pre>' . print_r($_COOKIE, true) . '</pre>';
