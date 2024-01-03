<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:../login.php");
  exit;  
}

require '../controller/FilmController.php';
require '../controller/ProducerController.php';
require '../controller/GenreController.php';

$FilmController = new FilmController;
$GenreController = new GenreController;
$ProduserController = new ProducerController;

$success = false;
$failed = false;

// create produser
if(isset($_POST["submit"])) {
  $result = $FilmController->store($_POST);

  if($result > 0) {
    $success = true;
  } else {
    $failed = true;
  }
}

$genres = $GenreController->listGenres(); 
$produsers = $ProduserController->dataAll();
?>
<!DOCTYPE html>
<html lang="en" data-theme="retro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="w-full h-screen">
    <!-- Navbar start -->
<div class="navbar bg-base-200 py-6" style="z-index: 10;">
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
          <li><a href="../master/genre.php">Genre</a></li>
          <li><a href="../master/produser.php">Produser</a></li>
          <li><a href="createFilm.php">Film</a></li>
        </ul>
      </li>
      <li tabindex="0">
        <p>
          List
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </p>
        <ul class="p-2 bg-base-100">
          <li><a href="../master/genres.php">Genre</a></li>
          <li><a href="../master/produsers.php">Produser</a></li>
          <li><a href="listFilm.php">Film</a></li>
        </ul>
      </li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>
</div>
    <!-- Navbar end -->

    <?php if($success) : ?>
    <!-- modal success -->
    <div class="w-full h-screen overflow-hidden flex justify-center items-center fixed bg-black bg-opacity-60 backdrop-blur-md z-50 top-0">
    <div class="absolute block top-52 ">
  <div class="modal-box w-max">
    <h3 class="font-bold text-lg">Success</h3>
    <p class="py-4">Selamat Film Berhasil Ditambahkan !</p>
    <div class="modal-action">
      <a for="my-modal-5" class="btn" href="listFilm.php">Alhamdulillah</a>
    </div>
  </div>
</div>
</div>
  <!-- modal success -->
  <?php elseif($failed) : ?>
        <!-- modal success -->
        <div class="w-full h-screen overflow-hidden flex justify-center items-center fixed bg-black bg-opacity-60 backdrop-blur-md z-50 top-0">
    <div class="absolute block top-52 ">
  <div class="modal-box w-max">
    <h3 class="font-bold text-lg">Failed</h3>
    <p class="py-4">Danger, Film gagal ditambahkan !</p>
    <div class="modal-action">
      <a for="my-modal-5" class="btn" href="listFilm.php">Subhanallah</a>
    </div>
  </div>
</div>
</div>
  <!-- modal success -->
  <?php endif ?>

      <div class="w-full flex justify-center py-10">
        <div class="w-[90%] grid grid-cols-2 gap-10">
          <div class="w-full">
            <img src="../images/illustration-10.webp" alt="" class="">
          </div>
          <div class="w-full h-auto flex flex-col gap-10 justify-center items-center">
            <p class="text-3xl font-bold text-secondary-focus">Add Film</p>
            <form action="" method="post" class="w-full h-auto flex flex-col items-center justify-center gap-6">
                <div class="flex flex-col w-4/5 gap-4">
                    <label for="judul" class="font-semibold text-secondary-focus">Judul Film</label>
                    <input type="text" name="judul" id="judul" class="input input-bordered input-secondary w-full" autocomplete="off">
                </div>
                <div class="flex flex-col w-4/5 gap-4">
                    <label for="judul" class="font-semibold text-secondary-focus">Genre</label>
                    <select class="select select-secondary w-full text-secondary-focus" name="id_genre">
                        <option disabled selected>Pilih Genre yang sesuai</option>
                        <?php foreach($genres as $genre): ?>
                        <option value="<?= $genre["id_genre"] ?>"><?= $genre["genre"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="flex flex-col w-4/5 gap-4">
                    <label for="judul" class="font-semibold text-secondary-focus">Produser Film</label>
                    <select class="select select-secondary w-full text-secondary-focus" name="id_produser">
                        <option disabled selected>Pilih Produser Film</option>
                        <?php foreach($produsers as $produser): ?>
                        <option value="<?= $produser["id_produser"] ?>"><?= $produser["nama_produser"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="flex flex-col w-4/5 gap-4">
                    <label for="tahun_rilis" class="font-semibold text-secondary-focus">Tahun Rilis</label>
                    <input type="date" name="tahun_rilis" id="tahun_rilis" class="input input-bordered input-secondary w-full text-secondary-focus" autocomplete="off">
                </div>
                <div class="flex flex-col w-4/5 gap-4">
                    <label for="rating" class="font-semibold text-secondary-focus">Rating</label>
                    <input type="text" name="rating" id="rating" class="input input-bordered input-secondary w-full" autocomplete="off">
                </div>
                <!-- <div class="flex flex-col w-4/5 gap-4">
                    <label for="poster_film" class="font-semibold text-secondary-focus">Poster</label>
                    <input type="file" id="poster_film" name="poster_film" class="file-input file-input-bordered file-input-secondary w-full" />
                </div> -->
                <button type="submit" name="submit" class="btn btn-active btn-secondary text-white">
                    Add Film
                </button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>