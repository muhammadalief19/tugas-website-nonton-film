<?php 
require '../config/connection.php';

class ProducerController {
    // create data 
    function store($data) {
        global $connect;
        $producer = htmlspecialchars($data["producer"]);
        $query = "INSERT INTO produser (nama_produser) VALUES ('$producer')";
        
        $connect->query($query);
        return $connect->affected_rows;
    }

    // menampilkan data
    function index($limit, $start) {
        global $connect;
        $query = "SELECT * FROM produser limit $start, $limit";
        $result = $connect->query($query);
        $producers = [];

        while($produser = $result->fetch_assoc()) {
            $producers[] = $produser;
        }

        return $producers;
    }

    // menampilkan data yang akan di update 
    function edit($id) {
        global $connect;
        $query = "SELECT * FROM produser WHERE id_produser='$id'";
        $result = $connect->query($query);
        return $result->fetch_assoc();
    }

    // edit / update data produser
    function update($id, $data) {
        global $connect;
        $nama = $data["producer"];
        $query = "UPDATE produser set nama_produser='$nama' WHERE id_produser='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    // delete data
    function destroy($id) {
        global $connect;
        $query = "DELETE FROM produser WHERE id_produser='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    // untuk menampilkan semua data dari tabel produser
    function dataAll() {
        global $connect;
        $query = "SELECT * FROM produser";
        $result = $connect->query($query);
        $producers = [];

        while($produser = $result->fetch_assoc()) {
            $producers[] = $produser;
        }

        return $producers;
    }
    
}