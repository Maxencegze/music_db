<?php

function dbConnect()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "root";
    $dbName = "music_db";
    $charset = "utf8";

    $conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=$charset", $userName, $password);

    return $conn;
}
