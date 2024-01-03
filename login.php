<?php
session_start();
if (isset($_SESSION["email"])) {
  header("Location:index.php");
  exit;  
}

include_once('controller/UsersController.php');
$user = new UsersController;
$err = false;
if(isset($_POST["submit"])) {
    $dataLogin = $user->login($_POST);
    if( $dataLogin > 0 ){
        header("Location:index.php");
    } else {
        $err = true;
    }
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Login Page</title>
        <style>
        body {
        font-family: "inter";
        }
        </style>
        <link rel="stylesheet" href="dist/output.css" type="text/css" media="screen" title="no title" charset="utf-8" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    </head>
    <body class>
        <div class="lg:flex">
            <div class="lg:w-1/2 xl:max-w-screen-sm">
                <div class="py-12 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                    <div class="cursor-pointer flex items-center">
                        <div>
                            <img src="images/logo-pens.png" alt="" class="w-10">
                        </div>
                        <div class="text-2xl text-indigo-800 tracking-wide ml-2 font-bold">PENS XXI</div>
                    </div>
                </div>
                <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                    <h2 class="text-center text-4xl text-indigo-900 font-display font-extrabold lg:text-left xl:text-5xl
                    xl:text-bold">Log in</h2>
                    <div class="mt-12">
                        <?php if($err): ?>
                        <p class="text-sm italic text-rose-600 mb-1">Email atau password yang anda masukkan salah</p>
                        <?php endif ?>
                        <form method="post" action="">
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide mb-3">Email Address</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 rounded-3xl px-5" type="email" placeholder="sabhik@gmail.com" name="email">
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide mb-3">
                                        Password
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 rounded-3xl px-5" type="password" placeholder="Enter your password" name="password">
                            </div>
                            <div class="mt-10">
                                <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg" type="submit" name="submit">
                                    Log In
                                </button>
                            </div>
                        </form>
                        <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                            Don't have an account ? <a class="cursor-pointer text-indigo-600 hover:text-indigo-800" href="register.php">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen">
                <div class="w-4/5 transform duration-200 hover:scale-110 cursor-pointer">
                    <img src="images/illustration-6.webp" alt="" class="w-full mx-auto" title="Login">
                </div>
            </div>
        </div>
    </body>
</html>
