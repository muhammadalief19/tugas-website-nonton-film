<?php 
// validasi user auth
session_start();
if (isset($_SESSION["email"])) {
  header("Location:index.php");
  exit;  
}


include_once('controller/UsersController.php');
$user = new UsersController;

if ( isset($_POST["submit"]) ) {

// cek apakah data berhasil atau tidak 
if( $user->register($_POST) > 0 ){
  echo "<script>
          alert ('Registrasi Berhasil');
          document.location.href = 'login.php';
        </script>";
} else {
  echo "<script>
          alert ('Registrasi Gagal');
        </script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
        body {
        font-family: "inter";
        }
        .bg-img {
          background-image: url(images/bg-2.jpg);
        }
        </style>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>
<body>
  <!-- component -->
<div class="h-screen md:flex">
	<div
		class="relative overflow-hidden md:flex w-1/2 bg-img justify-around items-center hidden">
		<div>
			<h1 class="text-white font-bold text-4xl font-sans">PENS XXI</h1>
			<p class="text-white mt-1">Silahkan mendaftar terlebih dahulu, sebelum masuk ke aplikasi PENS XII</p>
		</div>
		<!-- <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div> -->
	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form class="bg-white" method="post" action="">
			<h1 class="text-gray-400 font-bold text-2xl mb-5 text-center">Register</h1>

      <!-- input nama -->
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
						clip-rule="evenodd" />
				</svg>
				<input class="pl-2 outline-none border-none focus:border-0 focus:ring-0" type="text" name="nama" id="" placeholder="nama" autocomplete="off"/>
      </div>
      <!-- input nama -->

      <!-- input gender -->
      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
    </svg>
    <select id="countries" class="bg-transparent border border-transparent text-gray-400 text-sm rounded-lg focus:ring-transparent focus:border-transparent block w-full p-2.5" name="gender">
      <option selected>Gender</option>
      <option value="male">Male</option>
      <option value="famale">Famale</option>
    </select>
      </div>
      <!-- input gender -->

      <!-- input email -->
					<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						<input class="pl-2 outline-none border-none focus:border-0 focus:ring-0" type="email" name="email" id="email" placeholder="Email Address" autocomplete="off"x/>
      </div>
       <!-- input email -->

        <!-- input birthday -->
      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4 text-gray-400">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  stroke="currentColor" class="w-5 h-5 text-gray-500">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
      </svg>
					<input class="pl-2 outline-none border-none flex-1 focus:border-0 focus:ring-0" type="date" name="birthday" id="" placeholder="" />
      </div>
        <!-- input birthday -->
      
        <!-- input telepon -->
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
</svg>

				<input class="pl-2 outline-none border-none focus:border-0 focus:ring-0" type="text" name="telepon" id="" placeholder="No. Telpon" autocomplete="off"/>
      </div>
        <!-- input telepon -->

        <!-- input password -->
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
				fill="currentColor">
				<path fill-rule="evenodd"
				d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
				clip-rule="evenodd" />
				</svg>
				<input class="pl-2 outline-none border-none focus:border-0 focus:ring-0" type="password" name="password" id="" placeholder="Password" autocomplete="off"/>
      </div>
        <!-- input password -->
							<button type="submit" class="block w-full bg-indigo-600 mt-4 py-3 rounded-3xl text-white font-semibold mb-2 hover:bg-indigo-700 active:bg-indigo-800" name="submit">Register</button>
							<p class="text-sm text-gray-400 ml-2 font-semibold text-center py-3">Sudah Punya Akun ? <a href="login.php" class="text-blue-500 cursor-pointer">Login</a></p>
              
		</form>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>