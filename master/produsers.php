<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:../login.php");
  exit;  
}

require '../controller/ProducerController.php';

$ProducerController = new ProducerController;

// pagination
$limit = 3;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$pageStart = ($page > 1) ? ($page * $limit) - $limit : 0;

$previous = $page - 1;
$next = $page + 1;

$data = $ProducerController->dataAll();
$sumData = count($data);
$sumPage = ceil($sumData / $limit);

$producers = $ProducerController->index($limit, $pageStart);
$number = $pageStart + 1;


$success = false;
$failed = false;

// delete produser
if(isset($_POST["delete"])){
  $delete = $ProducerController->destroy($_POST["id"]);
  if($delete > 0 ) {
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
    <title>Producer</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="w-full h-screen overflow-x-hidden">
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
        <ul class="p-2 bg-base-100 z-10">
          <li><a href="genre.php">Genre</a></li>
          <li><a href="produser.php">Produser</a></li>
          <li><a href="../views/createFilm.php">Film</a></li>
        </ul>
      </li>
      <li class="z-10">
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

    <?php if($success) : ?>
    <!-- modal success -->
    <div class="w-full h-screen overflow-hidden flex justify-center items-center fixed bg-black bg-opacity-60 backdrop-blur-md z-50">
    <div class="absolute block top-52 ">
  <div class="modal-box w-max">
    <h3 class="font-bold text-lg">Success</h3>
    <p class="py-4">Selamat Produser Berhasil Dihapus !</p>
    <div class="modal-action">
      <a for="my-modal-5" class="btn" href="produsers.php">Alhamdulillah</a>
    </div>
  </div>
</div>
</div>
  <!-- modal success -->
  <?php elseif($failed) : ?>
        <!-- modal success -->
        <div class="w-full h-screen overflow-hidden flex justify-center items-center fixed bg-black bg-opacity-60 backdrop-blur-md z-50">
    <div class="absolute block top-52 ">
  <div class="modal-box w-max">
    <h3 class="font-bold text-lg">Failed</h3>
    <p class="py-4">Danger, Produser gagal dihapus !</p>
    <div class="modal-action">
      <a for="my-modal-5" class="btn" href="produsers.php">Subhanallah</a>
    </div>
  </div>
</div>
</div>
  <!-- modal success -->
  <?php endif ?>

    <div class="w-full flex justify-center relative">
      <img src="../images/illustration-7.webp" alt="" class="absolute -z-10 w-[40%] right-20 top-10 rotate-12">
    <!-- body -->
    <div class="w-[90%] flex flex-col items-center gap-12 py-24">
        <p class="text-3xl font-extrabold">List producers</p>
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
    <?php $no=$pageStart + 1; foreach($producers as $producer): ?>
        <tr>
        <th class="text-center"><?= $no++?></th>
        <td class="text-center"><?= $producer["nama_produser"] ?></td>
        <td class="flex gap-5 justify-center">
            <a href="updateProducer.php?id=<?= $producer["id_produser"] ?>" class="btn btn-info">
                Update
            </a>
            <form action="" method="post" class="btn btn-active btn-error">
                <input type="hidden" name="id" value="<?= $producer["id_produser"] ?>">
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
      <div class="btn-group">
      <?php for($i = 1; $i <= $sumPage; $i++) : ?>
      <a href="?page=<?= $i ?>" class="btn <?= ($page == $i) ? "btn-active" : "" ?> "><?= $i; ?></a>
      <?php endfor  ?>
      </div>

    </div>

    </div>
</body>
</html>