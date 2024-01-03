<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:../login.php");
  exit;  
}
include('../controller/FilmController.php');
$FilmController = new FilmController;

// pagination
$limit = 5;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$pageStart = ($page > 1) ? ($page * $limit) - $limit : 0;

$previous = $page - 1;
$next = $page + 1;

$data = $FilmController->dataAll();
$sumData = count($data);
$sumPage = ceil($sumData / $limit);

$films = $FilmController->index($limit, $pageStart);
$number = $pageStart + 1;

$success = false;
$failed = false;

// delete Film
if(isset($_POST["delete"])) {
  $result = $FilmController->destroy($_POST["id"]);

  if($result > 0) {
    $success = true;
  } else {
    $failed = true;
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
<body class="w-full flex flex-col items-center overflow-x-hidden">
<?php if($success) : ?>
    <!-- modal success -->
    <div class="w-full h-screen overflow-hidden flex justify-center items-center fixed bg-black bg-opacity-60 backdrop-blur-md z-50 top-0">
    <div class="absolute block">
  <div class="modal-box w-max">
    <h3 class="font-bold text-lg">Success</h3>
    <p class="py-4">Selamat Film Berhasil Didelete !</p>
    <div class="modal-action">
      <a for="my-modal-5" class="btn" href="listFilm.php">Alhamdulillah</a>
    </div>
  </div>
</div>
</div>
  <!-- modal success -->
  <?php elseif($failed) : ?>
        <!-- modal success -->
        <div class="w-full h-screen overflow-hidden flex justify-center items-center fixed bg-black backdrop-blur-md bg-opacity-60 z-50 top-0">
    <div class="absolute block">
  <div class="modal-box w-max">
    <h3 class="font-bold text-lg">Failed</h3>
    <p class="py-4">Danger, Film gagal Didelete !</p>
    <div class="modal-action">
      <a for="my-modal-5" class="btn" href="listFilm.php">Subhanallah</a>
    </div>
  </div>
</div>
</div>
  <!-- modal success -->
  <?php endif ?>

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

    <!-- body -->
    <div class="w-[90%] flex flex-col items-center gap-12 py-24">
        <p class="text-3xl font-extrabold">List Film</p>
        <div class="w-4/5">
        <div class="w-full flex justify-center overflow-x-auto">
  <table class="table table-zebra w-2/3">
    <!-- head -->
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Judul</th>
        <th class="text-center">Genre</th>
        <th class="text-center">Tahun Rilis</th>
        <th class="text-center">Produser</th>
        <th class="text-center">Rating</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($films as $film): ?>
        <tr>
        <th class="text-center"><?= $no++?></th>
        <td class="text-center"><?= $film["judul"] ?></td>
        <td class="text-center"><?= $film["genre"] ?></td>
        <td class="text-center"><?= $film["tahun_rilis"] ?></td>
        <td class="text-center"><?= $film["nama_produser"] ?></td>
        <td class="text-center"><?= $film["rating"] ?></td>
        <td class="flex gap-5 justify-center">
            <a href="updateFilm.php?id=<?= $film["id_film"] ?>" class="btn btn-info">
                Update
            </a>
            <form action="" method="post" class="btn btn-active btn-error">
                <input type="hidden" name="id" value="<?= $film["id_film"] ?>">
                <button type="submit" name="delete" class="uppercase">
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
        <div class="btn-group">
      <?php for($i = 1; $i <= $sumPage; $i++) : ?>
      <a href="?page=<?= $i; ?>" class="btn <?= ($page == $i) ? "btn-active" : "" ?> "><?= $i; ?></a>
      <?php endfor  ?>
      </div>
    </div>

</body>
</html>