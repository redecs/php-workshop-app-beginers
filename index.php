<?php
// Acest cod ne ajuta sa depistam greselile pe care le putem face atunci cand scriem cod
error_reporting(E_ALL);
ini_set('display_errors', 1);

set_exception_handler(function(Throwable $exception) {
    echo '<strong>Error:</strong> '.$exception->getMessage().'<br>'
        .' in file <strong>'.$exception->getFile().'</strong>'
        .' on line <strong>'.$exception->getLine().'</strong>';
    exit($exception->getCode());
});

require 'app/app.php';