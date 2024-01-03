<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit;  
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="retro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENS XXI</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="w-full">
    <!-- Navbar start -->
<div class="navbar bg-base-200 py-6 fixed">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl" href="../index.php">Nonton Film</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="index.php">Home</a></li>
      <li tabindex="0">
        <p>
          Master
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </p>
        <ul class="p-2 bg-base-100">
          <li><a href="master/genre.php">Genre</a></li>
          <li><a href="master/produser.php">Produser</a></li>
        </ul>
      </li>
      <li tabindex="0">
        <p>
          List
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </p>
        <ul class="p-2 bg-base-100">
          <li><a href="master/genre.php">Genre</a></li>
          <li><a href="master/produsers.php">Produser</a></li>
          <li><a href="views/listFilm.php">Film</a></li>
        </ul>
      </li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>
    <!-- Navbar start -->
    <section class="">
	<div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
		<div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
			<h1 class="text-5xl font-bold leading-none sm:text-6xl">Welcome
				<span class=""><?= $_SESSION["nama"] ?></span>
			</h1>
			<p class="mt-6 mb-8 text-lg sm:mb-12">Selamat datang di web PENS XXI Temukan pengalaman sinematik yang luar biasa dengan berbagai pilihan film dari seluruh dunia, dari drama hingga aksi dan petualangan</p>
			<div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
				<a rel="noopener noreferrer" href="" class="btn btn-active">
          Yuk Nonton Film
        </a>
				<a rel="noopener noreferrer" href="" class="btn btn-outline">
          List Film
        </a>
			</div>
		</div>
		<div class="flex items-center justify-center p-6 mt-8 w-full">
			<img src="images/illustration-9.webp" alt="" class="object-contain w-[90%]">
		</div>
	</div>
</section>

</body>
</html>