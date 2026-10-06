<?php

// $config = require __DIR__ . '/../config/config.php';

    $host = $_ENV['DB_HOST'];
    $user = $_ENV["DB_USER"];
    $db = $_ENV["DB_NAME"];
    $pass = $_ENV['DB_PASSWORD'];

    $conn = mysqli_connect($host, $user, $pass, $db)
                or die("Can't connect to the database");



?>