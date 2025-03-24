<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';


try {
    spl_autoload_register(function ($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        require base_path("{$class}.php");
    });

} catch (Exception $e) {
    dd($e);
}

require base_path('Core/router.php');

?>