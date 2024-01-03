<?php
$dbHost = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "db_pw_2022";

$connect = new mysqli($dbHost, $user, $password, $dbName);
class UsersController {
    function register($data) {
        global $connect;
        $nama = $data["nama"];
        $gender = $data["gender"];
        $birthday = $data["birthday"];
        $email = $data["email"];
        $telpon = $data["telepon"];
        $password = password_hash($data["password"], PASSWORD_DEFAULT);

        $insert = "INSERT INTO users(nama, gender, birthday, email, telepon, password) VALUES ('$nama', '$gender', '$birthday', '$email', '$telpon', '$password')";
        $connect->query($insert);
        return $connect->affected_rows;
    }

    function login($data) {
        global $connect;
        $email = $data["email"];
        $password = $data["password"];
        $query = $connect->query("SELECT * FROM users WHERE email='$email'");
        if($query->num_rows === 1) {
            // cek apakah password yang diinputkan itu benar
            $user = $query->fetch_assoc();
            if(password_verify($password, $user["password"])){
                $_SESSION["id"] = $user["id"];
                $_SESSION["nama"] = $user["nama"];
                $_SESSION["gender"] = $user["gender"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["birthday"] = $user["birthday"];
                $_SESSION["telepon"] = $user["telepon"];
                return $query->num_rows;
        }
    }
    }
    function auth() {
        return [
            "id" => $_SESSION["id"],
            "nama" => $_SESSION["nama"],
            "email" => $_SESSION["email"],
            "birthday" => $_SESSION["birthday"],
            "telepon" => $_SESSION["telepon"],
            "gender" => $_SESSION["gender"]
        ];
    }
}
?>