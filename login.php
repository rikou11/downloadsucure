<?php
include 'config/connection.php';

include 'validation/login-validation.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" media="all">
    <!-- our project just needs Font Awesome Solid + Brands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- tailwind css and Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <title>SecureDownload</title>
</head>

<body style="font-family: Inter" class="scroll-smooth bg-white">
    <img class="z-0 top-0 w-full absolute" src="download-page/svgs/Group 4.svg" alt="">

    <section class="text-gray-600 body-font">

        <form method="POST" class="z-40  container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="z-40  lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                <h1 class="title-font font-medium text-3xl text-gray-900">Slow-carb next level shoindcgoitch ethical authentic, poko scenester</h1>
                <p class="leading-relaxed mt-4">Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock starladder roathse. Craies vegan tousled etsy austin.</p>
            </div>
            <div class=" z-40  lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Connecter-vous pour commencer le téléchragement 🚀.</h2>

                <div class="relative mb-4">
                    <label for="username" class="leading-7 text-sm text-gray-600">Username</label>
                    <input type="username" id="username" name="username" value="<?php echo $usernameUser ?>" class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <span class="mb-4"> <?php echo $err_username ?></span>

                    <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo $passwordUser ?>" class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <span class="mb-4"> <?php echo $err_password ?></span>
                    <div class="mt-4"> <button name="login" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Connecter <i class="fa-solid fa-arrow-right-to-bracket"></i> </button>
                    </div>

                </div>
            </div>
        </form>
    </section>

    <div class="relative mt-16 bg-red-400">
        <svg class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-red-400" preserveAspectRatio="none" viewBox="0 0 1440 54">
            <path fill="currentColor" d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"></path>
        </svg>
        <section class="text-white bg-red-400 body-font">
            <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
                <a href="#_" class="text-xl font-black leading-none text-white select-none logo">INFODZ<span class="text-indigo-600">.</span></a>
                <p class="mt-4 text-sm text-white sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">© 2022

                </p>
                <span class="inline-flex justify-center mt-4 space-x-5 sm:ml-auto sm:mt-0 sm:justify-start">
                    <a href="#" class="text-white hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                        </svg>
                    </a>




                </span>
            </div>
        </section>
    </div>

</body>

</html>