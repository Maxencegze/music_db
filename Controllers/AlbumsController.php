<?php

namespace Controllers;

use PDO;

require_once __DIR__ . '/../functions/db_connect.php';

class AlbumsController
{
    public function index()
    {
        $conn = dbConnect();

        $query = "SELECT * FROM albums a
        INNER JOIN artists ar ON a.artist_id = ar.id
    ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $albums = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $albums;
    }
}
