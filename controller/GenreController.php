<?php
require('../config/connection.php');
class GenreController {
    function create($data) {
        global $connect;
        $genre = htmlspecialchars($data["genre"]);
        $query = "INSERT INTO genre (genre) VALUES ('$genre')";

        $connect->query($query);
        return $connect->affected_rows;
    }

    function listGenres() {
        global $connect;
        $query = "SELECT * FROM genre order by id_genre DESC";
        $result = $connect->query($query);
        $genres = [];
        while($genre = $result->fetch_assoc()) {
            $genres[] = $genre;
        }
        return $genres;
    }

    function updateGenre($data, $id) {
        global $connect;
        $genre = htmlspecialchars($data["genre"]);
        $query = "UPDATE genre SET genre='$genre' WHERE id_genre='$id'";

        $connect->query($query);
        return $connect->affected_rows;
    }

    function putGenre($id) {
        global $connect;
        $query = "SELECT * FROM genre WHERE id_genre='$id' limit 1";
        $result = $connect->query($query);
        return $result->fetch_assoc();
    }

    function deleteGenre($id) {
        global $connect;
        $query = "DELETE FROM genre WHERE id_genre='$id'";
        $connect->query($query);
        
        return $connect->affected_rows;
    }
}
?>