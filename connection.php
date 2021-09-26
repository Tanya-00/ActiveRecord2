<?php

function connection() : PDO {
    $user = 'Taki';
    $password = 'Uh3ge8ema';
    $dbName = 'db';
    $host = 'localhost';

    try {
        $dsn = "mysql:host = $host; port = 3306; dbName = $dbName";
        return new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    }
    catch(PDOException $exception) {
        die($exception->getMessage());
    }
    finally {
        echo 'success';
    }
}

return connection();

?>