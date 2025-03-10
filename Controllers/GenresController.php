<?php

namespace Controllers;

use PDO;

require_once __DIR__ . '/../functions/db_connect.php';


class GenresController
{
    public function index()
    {
        $conn = dbConnect();

        $query = "SELECT * FROM genres";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $genres = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }
}
