<?php

function debug($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

class Database
{
    public $connection;


    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = 'mysql:' . str_replace('&', ';', http_build_query($config, '', '&'));


        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }


    public function query($query, $params = [])
    {

        $statement = $this->connection->prepare($query);

        debug([$params]);
        $statement->execute($params);


        return $statement;

    }
}
