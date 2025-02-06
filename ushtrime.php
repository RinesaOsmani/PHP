<?php

function greetUser($name, $greeting = 'Hello')
{

    echo $greeting . " " . $name;
}


greetUser('Rinesa');
greetUser('Rinesa', greeting: 'hi');


?>