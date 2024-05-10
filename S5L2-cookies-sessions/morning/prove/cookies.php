<?php

// 

setcookie('prova', 'ciao', time() + 60 * 60, '/', '', false, true);
echo '<pre>' . print_r($_COOKIE, true) . '</pre>';

