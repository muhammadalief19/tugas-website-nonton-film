<?php
include_once '../config/connection.php';

class FilmController {
    function index($limit, $start) {
        global $connect;
        $query = "SELECT * FROM film JOIN genre ON film.id_genre = genre.id_genre JOIN produser ON film.id_produser = produser.id_produser limit $start, $limit";
        $result = $connect->query($query);
        $films = [];

        while($film = $result->fetch_assoc()) {
            $films[] = $film;
        }

        return $films;
    }

    function store($data) {
        global $connect;
        $id_genre = htmlspecialchars($data["id_genre"]);
        $id_produser = htmlspecialchars($data["id_produser"]);
        $judul = htmlspecialchars($data["judul"]);
        $tahun_rilis = htmlspecialchars($data["tahun_rilis"]);
        $rating = htmlspecialchars($data["rating"]);
        // $poster = $this->upload();

        // // jika poster gagal diupload
        // if(!$poster) {
        //     return false;
        // }

        $query = "INSERT INTO film (id_genre,id_produser,judul,tahun_rilis,rating) VALUES ('$id_genre', '$id_produser', '$judul', '$tahun_rilis', '$rating')";
        $connect->query($query);
        return $connect->affected_rows;
    }

    function dataAll() {
        global $connect;
        $query = "SELECT * FROM film JOIN genre ON film.id_genre = genre.id_genre JOIN produser ON film.id_produser = produser.id_produser";
        $result = $connect->query($query);
        $films = [];

        while($film = $result->fetch_assoc()) {
            $films[] = $film;
        }

        return $films;
    }

    function edit($id) {
        global $connect;
        $query = "SELECT * FROM film JOIN genre ON film.id_genre = genre.id_genre JOIN produser ON film.id_produser = produser.id_produser WHERE id_film='$id'";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }

    function update($data,$id) {
        global $connect;
        $judul = htmlspecialchars($data["judul"]);
        $id_produser = htmlspecialchars($data["id_produser"]);
        $id_genre = htmlspecialchars($data["id_genre"]);
        $tahun_rilis = htmlspecialchars($data["tahun_rilis"]);
        $rating = htmlspecialchars($data["rating"]);
        $query = "UPDATE film SET 
                  judul='$judul', 
                  id_produser='$id_produser', 
                  id_genre='$id_genre', 
                  tahun_rilis='$tahun_rilis', 
                  rating='$rating' 
                  WHERE id_film='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    function destroy($id) {
        global $connect;
        $query = "DELETE FROM film WHERE id_film=$id";
        $connect->query($query);

        return $connect->affected_rows;
    }

    // function upload() {
    //     $namaFile = $_FILES["poster_film"]["name"];
    //     $ukuranFile = $_FILES["poster_film"]["size"];
    //     $error = $_FILES["poster_film"]["error"];
    //     $tmpName = $_FILES["poster_film"]["tmp_name"];
    
    
    //     // cek apakah ada gambar yang diupload 
    //     if ($error === 4) {
    //         echo "<script>
    //         alert('Pilih gambar Terlebih Dahulu');
    //         </script>";
    //         return false;
    //     }
    
    //     // cek apakah yang diupload adalah gambar
    //     $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    //     $ekstensiGambar = explode('.', $namaFile);
    //     $ekstensiGambar = strtolower(end($ekstensiGambar));
    //     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    //         echo "<script>
    //         alert('Yang anda upload bukan gambar');
    //         </script>";
    //         return false;
    //     }
    
    //     // cek jika ukurannya terlalu besar
    //     if ($ukuranFile > 2000000) {
    //         echo "<script>
    //         alert('Ukuran gambar terlalu besar');
    //         </script>";
    //         return false;
    //     }
    
    //     // lolos pengecekan, gambar siap diupload

    //     // generate nama gambar baru
    //     $namaFileBaru = uniqid();
    //     $namaFileBaru .= '.';
    //     $namaFileBaru .= $ekstensiGambar;
    
    //     move_uploaded_file($tmpName, '../images/poster-film/' . $namaFileBaru);
    
    //     return $namaFileBaru;
    // }
}
?>