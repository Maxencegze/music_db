<?php

namespace Controllers;

use PDO;

require_once __DIR__ . '/../functions/db_connect.php';

class ArtistsController
{
    public function index()
    {
        $conn = dbConnect();

        $query = "SELECT * FROM artists a";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $artists = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $artists;
    }

    public function store($name)
    {
        $conn = dbConnect();

        $query = "INSERT INTO artists (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name]);
        header("Location: ../index.php");
    }

    public function show($id)
    {
        $conn = dbConnect();

        $query = "SELECT * FROM artists a WHERE a.id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        $artist = $stmt->fetch(PDO::FETCH_OBJ);

        return $artist;
    }

    public function update($name, $id)
    {
        $conn = dbConnect();

        $query = "UPDATE artists SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $id]);
        header("Location: ../index.php?success=1&message=Artist updated successfully");
    }

    public function delete($id)
    {
        $conn = dbConnect();

        $query = "UPDATE artists SET deleted_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        header("Location: ../index.php?success=1&message=Artist deleted successfully");
    }

    public function restore($id)
    {
        $conn = dbConnect();

        $query = "UPDATE artists SET deleted_at = NULL WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        header("Location: ../index.php?success=1&message=Artist restored successfully");
    }
}
