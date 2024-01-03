<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:../login.php");
  exit;  
}
include('../controller/GenreController.php');
$genreController = new GenreController;

$genres = $genreController->listGenres();
if(isset($_POST["delete"])){
    $delete = $genreController->deleteGenre($_POST["id"]);
    if($delete > 0 ) {
        echo "<script>
        alert('Genre Berhasil diHapus👍');
        document.location.href = 'genres.php';
        </script>";
    } else {
        echo "<script>
        alert('Genre Gagal Dihapus 👎');
        document.location.href = 'genres.php';
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
    <div class="w-[90%] flex flex-col items-center gap-12 py-24">
        <p class="text-3xl font-extrabold">List Genres</p>
        <div class="w-4/5">
        <div class="w-full flex justify-center overflow-x-auto">
  <table class="table table-zebra w-2/3">
    <!-- head -->
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Genre</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($genres as $genre): ?>
        <tr>
        <th class="text-center"><?= $no++?></th>
        <td class="text-center"><?= $genre["genre"] ?></td>
        <td class="flex gap-5 justify-center">
            <a href="updateGenre.php?id=<?= $genre["id_genre"] ?>" class="btn btn-info">
                Update
            </a>
            <form action="" method="post" class="btn btn-active btn-accen">
                <input type="hidden" name="id" value="<?= $genre["id_genre"] ?>">
                <button type="submit" name="delete" class="">
                    Delete
                </button>
            </form>
        </td>
      </tr>
    <?php endforeach?>
    </tbody>
  </table>
</div>
        </div>
    </div>

</body>
</html>