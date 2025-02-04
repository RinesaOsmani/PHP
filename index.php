<?php
$heading = 'Rinesa';

function dd($value)
{
    echo '<pre>';
    var_dump($value);

    echo '</pre>';

    die();
}

// dd($_SERVER);

// echo $_SERVER['REQUEST_URI'] === '/' ? 'bg-gray-900' : 'text-gray-300';

require "views/index.view.php";
?>