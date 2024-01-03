<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:../login.php");
  exit;  
}
include('../controller/GenreController.php');
$genreController = new GenreController;
$genre = $genreController->putGenre($_GET["id"]);
if(isset($_POST["submit"])) {
    $result = $genreController->updateGenre($_POST, $_GET["id"]);
    if($result > 0) {
        echo "<script>
                alert('Genre Berhasil diupdate 👍');
                document.location.href = 'genres.php';
              </script>";
    } else {
        echo "<script>
                alert('Genre Gagal diupdate 👎');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="retro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="w-full h-screen flex flex-col items-center overflow-x-hidden">
    <!-- Navbar start -->
<div class="navbar bg-base-200 py-6">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl" href="../index.php">Nonton Film</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="../index.php">Home</a></li>
      <li tabindex="0">
        <p>
          Master
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </p>
        <ul class="p-2 bg-base-100">
          <li><a href="genre.php">Genre</a></li>
          <li><a href="produser.php">Produser</a></li>
          <li><a href="../views/createFilm.php">Film</a></li>
        </ul>
      </li>
      <li tabindex="0">
        <p>
          List
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </p>
        <ul class="p-2 bg-base-100">
          <li><a href="genres.php">Genre</a></li>
          <li><a href="produsers.php">Produser</a></li>
          <li><a href="../views/listFilm.php">Film</a></li>
        </ul>
      </li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>
</div>
    <!-- Navbar start -->

    <!-- body -->
    <div class="w-[90%] flex-1 grid grid-cols-2 py-16">
        <div class="w-full h-auto flex flex-col justify-center gap-7">
            <p class="text-center font-bold text-3xl text-secondary">Add Genre</p>
            <form action="" method="post" class="w-full h-auto flex flex-col items-center justify-center gap-6">
                <div class="flex flex-col w-4/5 gap-4">
                    <label for="genre" class="font-semibold">Nama Genre</label>
                    <input type="text" name="genre" id="genre" class="input input-bordered input-secondary w-full" value="<?= $genre["genre"] ?>" autocomplete="off">
                </div>
                <button type="submit" name="submit" class="btn btn-active btn-secondary text-white">
                    Add Genre
                </button>
            </form>
        </div>
        <div class="w-full">
            <img src="../images/illustration-2.webp" alt="" class="w-full scale-125">
        </div>
    </div>

</body>
</html>