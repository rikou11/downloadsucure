<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include '../config/connection.php';
include '../config/interdit.php';
include 'action/logout.php';

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

    <title>Document</title>
</head>

<body style="font-family: Inter" class="scroll-smooth bg-white">
    <nav class="flex items-center justify-between font-bold flex-wrap px-6 py-3 fixed w-full z-10 top-0" x-data="{ isOpen: false }" @keydown.escape="isOpen = false" :class="{ 'shadow-lg bg-red-600' : isOpen , 'bg-gradient-to-t from-yellow-400 to-yellow-600 ' : !isOpen}">
        <!--Logo etc-->
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <span class="text-2xl pl-2"><i class="em em-grinning"></i>Gds Pro v3.51</span>
            </a>
        </div>

        <!--Toggle button (hidden on large screens)-->
        <button @click="isOpen = !isOpen" type="button" class="block lg:hidden px-2 text-gray-500 hover:text-white focus:outline-none focus:text-white" :class="{ 'transition transform-180': isOpen }">
            <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path x-show="isOpen" fill-rule="evenodd" clip-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                <path x-show="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
            </svg>
        </button>

        <!--Menu-->
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto" :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false" x-show.transition="true">
            <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="#" @click="isOpen = false">
                    </a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#" @click="isOpen = false">
                    </a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#" @click="isOpen = false">
                    </a>
                </li>
                <li class="mr-3">
                    <form method="post">
                        <button name='logout' class="text-red-500 hover:text-white py-2 px-4  rounded bg-white border border-red-500 hover:bg-red-600 shadow-none hover:shadow-lg font-medium transition duration-200" href="#" @click="isOpen = false">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!--Container for content-->
    <div class="container mx-auto bg-white mt-24 md:mt-18">

        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
                <div class="grid sm:grid-cols-2 gap-8">
                    <!-- content - start -->
                    <div class="flex flex-col justify-center items-center sm:items-start md:py-24 lg:py-32">

                        <h1 class="text-gray-800 text-2xl md:text-3xl font-bold text-center sm:text-left mb-2">Bienvenue dans <span class="text-red-500">GDS pro</span> </h1>

                        <p class="text-gray-500 md:text-lg text-center sm:text-left mb-8">Votre lien de téléchargement </p>
                        <?php
                        $name = $_SESSION['username'];
                        $sql = 'SELECT * FROM users where username = :username';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['username' => $name]);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $file = $row['filename'];
                        }
                        ?>

                        <a href="./<?php echo $file ?>" download class="inline-block bg-yellow-400 hover:bg-yellow-600
                     focus-visible:ring ring-indigo-300 text-white active:text-gray-100
                      text-sm md:text-base font-semibold text-center rounded-lg outline-none
                       transition duration-100 px-8 py-3">Télécharger <i class="fa-solid fa-download"></i> </a>
                    </div>
                    <!-- content - end -->

                    <!-- image - start -->
                    <div class="h-80 md:h-auto bg-gray-100 overflow-hidden shadow-lg rounded-lg relative">
                        <img src="https://images.unsplash.com/photo-1622227922682-56c92e523e58?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" loading="lazy" alt="Photo by @heydevn" class="w-full h-full object-cover object-center absolute inset-0" />
                    </div>
                    <!-- image - end -->
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php include 'component/footer.php' ?>
</body>

</html>