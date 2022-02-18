<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include '../config/connection.php';
include '../config/interdit.php';
include 'action/logout.php';


$name = $_SESSION['username'];
$sql = 'SELECT * FROM users where username = :username';
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $name]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $file = $row['filename'];
    $color = $row["color_theme"];
    $link = $row['link'];
}
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

<body style="font-family: Inter" class="scroll-smooth bg-white 	">
    <nav class="flex items-center justify-between font-bold flex-wrap px-6 py-3 fixed w-full z-40 top-0" x-data="{ isOpen: false }" @keydown.escape="isOpen = false" :class="{ 'shadow-lg bg-gray-600' : isOpen , 'bg-[<?php echo $color; ?>] ' : !isOpen}">
        <!--Logo etc-->
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <!-- navbar logo -->
                <span class="text-2xl pl-2"><i class="em em-grinning"></i><?php echo $file ?> </span>
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
                    <form method="post">
                        <button name='logout' class="text-red-500 hover:text-white py-2 px-4  rounded bg-white border border-red-500 hover:bg-red-600 shadow-none hover:shadow-lg font-medium transition duration-200" href="#" @click="isOpen = false">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnecter
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
                    <div class="flex flex-col z-10 justify-center items-center sm:items-start md:py-24 lg:py-32">

                        <h1 class="text-gray-800 text-2xl md:text-3xl font-bold text-center sm:text-left mb-2">Bienvenue dans <span class="text-[<?php echo $color ?>]"><?php echo $file ?></span> </h1>

                        <p class="text-gray-500 md:text-lg text-center sm:text-left mb-8">Votre lien de téléchargement </p>


                        <a href="./<?php echo $link ?>" download class="inline-block bg-[<?php echo $color; ?>]  hover:opacity-75
                     focus-visible:ring ring-indigo-300 text-white active:text-gray-100
                      text-sm md:text-base font-semibold text-center rounded-lg outline-none
                       transition duration-100 px-8 py-3">Télécharger <i class="fa-solid fa-download"></i> </a>
                    </div>
                    <!-- shapes -->
                    <svg class="absolute z-0  w-full " xmlns="http://www.w3.org/2000/svg" width="781.573" height="600.004" viewBox="0 0 781.573 600.004">
                        <defs>
                            <style>
                                .cls-1 {
                                    opacity: 0.19;
                                }

                                .cls-2 {
                                    fill: <?php echo $color ?>;
                                }
                            </style>
                        </defs>
                        <g id="Group_1" data-name="Group 1" class="cls-1" transform="matrix(1, 0.017, -0.017, 1, 6.385, -6.444)">
                            <ellipse id="Ellipse_1" data-name="Ellipse 1" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(725.424 307.238)" />
                            <path id="Path_1" data-name="Path 1" class="cls-2" d="M154.8,120.309a31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7Z" transform="translate(489.682 150.808)" />
                            <path id="Path_2" data-name="Path 2" class="cls-2" d="M142.705,109.209a31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.1,0,21.655,21.655,0,0,0,0,33.7Z" transform="translate(412.689 85.098)" />
                            <path id="Path_3" data-name="Path 3" class="cls-2" d="M130.75,98.109a31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7Z" transform="translate(335.63 19.389)" />
                            <ellipse id="Ellipse_2" data-name="Ellipse 2" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(369.221 0)" />
                            <path id="Path_4" data-name="Path 4" class="cls-2" d="M154.36,142.909a31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7Z" transform="translate(486.864 284.595)" />
                            <ellipse id="Ellipse_3" data-name="Ellipse 3" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(544.064 310.006)" />
                            <path id="Path_5" data-name="Path 5" class="cls-2" d="M130.31,120.719a31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7Z" transform="translate(332.812 153.235)" />
                            <path id="Path_6" data-name="Path 6" class="cls-2" d="M118.29,109.583a30.717,30.717,0,0,0,39.027,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.027,0,21.53,21.53,0,0,0,0,33.7Z" transform="translate(255.818 87.492)" />
                            <ellipse id="Ellipse_4" data-name="Ellipse 4" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(276.948 79.577)" />
                            <path id="Path_7" data-name="Path 7" class="cls-2" d="M141.825,154.419a31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7,31.2,31.2,0,0,0-39.1,0,21.654,21.654,0,0,0,0,33.7Z" transform="translate(407.052 352.731)" />
                            <ellipse id="Ellipse_5" data-name="Ellipse 5" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(451.792 389.653)" />
                            <path id="Path_8" data-name="Path 8" class="cls-2" d="M117.85,132.313a30.717,30.717,0,0,0,39.027,0,21.53,21.53,0,0,0,0-33.7,30.717,30.717,0,0,0-39.027,0,21.53,21.53,0,0,0,0,33.7Z" transform="translate(253 221.218)" />
                            <ellipse id="Ellipse_6" data-name="Ellipse 6" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(273.69 236.034)" />
                            <path id="Path_9" data-name="Path 9" class="cls-2" d="M132.9,76.32a31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7,31.2,31.2,0,0,0,39.1,0,21.654,21.654,0,0,0,0-33.7Z" transform="translate(98.948 89.893)" />
                            <path id="Path_10" data-name="Path 10" class="cls-2" d="M129.4,165.988a31.2,31.2,0,0,0,39.1,0,21.657,21.657,0,0,0,0-33.769,31.2,31.2,0,0,0-39.1,0,21.657,21.657,0,0,0,0,33.769Z" transform="translate(327.204 420.809)" />
                            <ellipse id="Ellipse_7" data-name="Ellipse 7" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(359.445 469.23)" />
                            <ellipse id="Ellipse_8" data-name="Ellipse 8" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(270.432 392.42)" />
                            <path id="Path_11" data-name="Path 11" class="cls-2" d="M93.331,132.688a31.2,31.2,0,0,0,39.1,0,21.719,21.719,0,0,0,0-33.768,31.2,31.2,0,0,0-39.1,0,21.657,21.657,0,0,0,0,33.768Z" transform="translate(96.159 223.68)" />
                            <path id="Path_12" data-name="Path 12" class="cls-2" d="M120.4,87.82a31.2,31.2,0,0,0-39.1,0,21.657,21.657,0,0,0,0,33.768,31.2,31.2,0,0,0,39.1,0,21.657,21.657,0,0,0,0-33.768Z" transform="translate(19.101 157.971)" />
                            <path id="Path_13" data-name="Path 13" class="cls-2" d="M156,177.523a21.53,21.53,0,0,0,0-33.7,30.717,30.717,0,0,0-39.027,0,21.53,21.53,0,0,0,0,33.7A30.717,30.717,0,0,0,156,177.523Z" transform="translate(247.363 488.851)" />
                            <ellipse id="Ellipse_9" data-name="Ellipse 9" class="cls-2" cx="27.622" cy="23.873" rx="27.622" ry="23.873" transform="translate(267.173 548.877)" />
                            <path id="Path_14" data-name="Path 14" class="cls-2" d="M132.021,121.53a31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7,31.2,31.2,0,0,0,39.1,0,21.654,21.654,0,0,0,0-33.7Z" transform="translate(93.312 357.526)" />
                            <path id="Path_15" data-name="Path 15" class="cls-2" d="M119.991,110.43a31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7,31.2,31.2,0,0,0,39.1,0,21.53,21.53,0,0,0,0-33.7Z" transform="translate(16.254 291.817)" />
                            <path id="Path_16" data-name="Path 16" class="cls-2" d="M107.971,99.33a31.2,31.2,0,0,0-39.1,0,21.53,21.53,0,0,0,0,33.7,31.2,31.2,0,0,0,39.1,0,21.655,21.655,0,0,0,0-33.7Z" transform="translate(-60.74 226.107)" />
                        </g>
                    </svg>



                    <!-- content - end -->

                    <!-- image - start -->
                    <div class="h-80 md:h-auto bg-gray-100 overflow-hidden shadow-lg rounded-lg relative">
                        <svg class="h-full w-full bg-gray-50" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="733.86247" height="702.19479" viewBox="0 0 733.86247 702.19479" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>cloud_files</title>
                            <path d="M257.07474,533.1599a1.11537,1.11537,0,0,1-.23571-.46222,351.19117,351.19117,0,0,1,478.94006-405.746,1.11976,1.11976,0,1,1-.87626,2.061C612.32539,76.89059,473.23316,98.13255,371.90572,184.44937,271.19684,270.23927,227.9405,403.478,259.01686,532.17137a1.12007,1.12007,0,0,1-1.94212.98853Z" transform="translate(-233.06876 -98.90261)" fill="#e6e6e6" />
                            <path d="M461.79585,773.48566a1.11976,1.11976,0,0,1,1.28506-1.75985C585.19759,822.86767,723.62042,801.34331,824.331,715.552,926.61163,628.42316,970.04606,494.49037,937.6846,366.02043a1.12,1.12,0,0,1,2.17242-.54614,346.59614,346.59614,0,0,1-5.75077,189.35434A353.6721,353.6721,0,0,1,825.78337,717.257a351.07362,351.07362,0,0,1-363.569,56.53446A1.113,1.113,0,0,1,461.79585,773.48566Z" transform="translate(-233.06876 -98.90261)" fill="#e6e6e6" />
                            <path d="M435.91449,793.36365a1.11922,1.11922,0,0,1,.12628-1.57869L965.085,341.11317a1.11987,1.11987,0,1,1,1.45241,1.705L437.49318,793.48994A1.11922,1.11922,0,0,1,435.91449,793.36365Z" transform="translate(-233.06876 -98.90261)" fill="#e6e6e6" />
                            <path d="M233.33628,555.55682a1.11959,1.11959,0,0,1,.12629-1.5787L762.50681,103.30633a1.11988,1.11988,0,0,1,1.45241,1.705L234.915,555.6831A1.11959,1.11959,0,0,1,233.33628,555.55682Z" transform="translate(-233.06876 -98.90261)" fill="#e6e6e6" />
                            <path d="M435.91449,793.36365a1.11922,1.11922,0,0,1,.12628-1.57869L965.085,341.11317a1.11987,1.11987,0,1,1,1.45241,1.705L437.49318,793.48994A1.11922,1.11922,0,0,1,435.91449,793.36365Z" transform="translate(-233.06876 -98.90261)" fill="#e6e6e6" />
                            <path d="M851.60079,284.65378H646.84415v-1.07216a3.14805,3.14805,0,0,0-3.14805-3.14805H557.14758a3.14805,3.14805,0,0,0-3.148,3.14805v1.07216H348.39885A13.85024,13.85024,0,0,0,334.54861,298.504V578.87887a13.85024,13.85024,0,0,0,13.85024,13.85024H851.60073a13.8503,13.8503,0,0,0,13.8503-13.85029V298.504A13.85024,13.85024,0,0,0,851.60079,284.65378Z" transform="translate(-233.06876 -98.90261)" fill="#3f3d56" />
                            <path d="M359.41357,314.13086a1.29773,1.29773,0,0,0-1.29589,1.29639V581.36914a1.29732,1.29732,0,0,0,1.29589,1.2959H840.58594a1.297,1.297,0,0,0,1.2959-1.2959V315.42725a1.29742,1.29742,0,0,0-1.2959-1.29639Z" transform="translate(-233.06876 -98.90261)" fill="<?php echo $color; ?>" />
                            <circle cx="366.50903" cy="197.56776" r="5.06425" fill="<?php echo $color; ?>" />
                            <path d="M874.67264,573.83276H826.48442v-4.97648c0-.27332-.30819-.49487-.6884-.49487H809.27435c-.38021,0-.68841.22155-.68841.49487v4.97648h-10.326v-4.97648c0-.27332-.3082-.49487-.68841-.49487H781.04982c-.38021,0-.6884.22155-.6884.49487v4.97648H770.03537v-4.97648c0-.27332-.30819-.49487-.6884-.49487H752.8253c-.38021,0-.68841.22155-.68841.49487v4.97648h-10.326v-4.97648c0-.27332-.3082-.49487-.68841-.49487H724.60077c-.38021,0-.6884.22155-.6884.49487v4.97648H713.58632v-4.97648c0-.27332-.30819-.49487-.6884-.49487H696.37625c-.38021,0-.68841.22155-.68841.49487v4.97648h-10.326v-4.97648c0-.27332-.3082-.49487-.68841-.49487H668.15172c-.38021,0-.6884.22155-.6884.49487v4.97648H657.13727v-4.97648c0-.27332-.30819-.49487-.6884-.49487H527.0291c-.38021,0-.68841.22155-.68841.49487v4.97648h-10.326v-4.97648c0-.27332-.3082-.49487-.68841-.49487H498.80457c-.38021,0-.6884.22155-.6884.49487v4.97648H487.79012v-4.97648c0-.27332-.30819-.49487-.6884-.49487H470.58005c-.38021,0-.68841.22155-.68841.49487v4.97648h-10.326v-4.97648c0-.27332-.3082-.49487-.68841-.49487H442.35552c-.38021,0-.6884.22155-.6884.49487v4.97648H431.34107v-4.97648c0-.27332-.30819-.49487-.6884-.49487H414.131c-.38021,0-.68841.22155-.68841.49487v4.97648h-10.326v-4.97648c0-.27332-.3082-.49487-.68841-.49487H385.90647c-.38021,0-.6884.22155-.6884.49487v4.97648H374.892v-4.97648c0-.27332-.30819-.49487-.6884-.49487H357.68195c-.38021,0-.68841.22155-.68841.49487v4.97648H325.327c-9.12466,0-16.52167,5.31743-16.52167,11.8768V591.08c0,6.55934,7.397,11.87677,16.52167,11.87677H874.67264c9.12466,0,16.52167-5.31743,16.52167-11.87677v-5.37041C891.19431,579.15019,883.7973,573.83276,874.67264,573.83276Z" transform="translate(-233.06876 -98.90261)" fill="#3f3d56" />
                            <path d="M543.97808,426.01694H401.75433a1.11987,1.11987,0,1,1,0-2.23974H543.97808a1.11987,1.11987,0,1,1,0,2.23974Z" transform="translate(-233.06876 -98.90261)" fill="#f2f2f2" />
                            <path d="M543.97808,450.65413H401.75433a1.11987,1.11987,0,1,1,0-2.23974H543.97808a1.11987,1.11987,0,1,1,0,2.23974Z" transform="translate(-233.06876 -98.90261)" fill="#f2f2f2" />
                            <path d="M543.97808,475.29132H401.75433a1.11988,1.11988,0,1,1,0-2.23975H543.97808a1.11988,1.11988,0,1,1,0,2.23975Z" transform="translate(-233.06876 -98.90261)" fill="#f2f2f2" />
                            <rect x="373.06222" y="262.72169" width="182.53915" height="175.81992" rx="3.35962" fill="#fff" />
                            <path d="M642.683,454.67371a45.00606,45.00606,0,0,1,88.30268-9.48886c.54524-.01956,1.09-.04147,1.64-.04147a17.66745,17.66745,0,0,1,5.51476.93823c22.387,7.35112,16.49195,40.7751-7.07106,40.7751H673.1604a30.44228,30.44228,0,0,1-30.5093-31.51923Q642.66463,455.0061,642.683,454.67371Z" transform="translate(-233.06876 -98.90261)" fill="<?php echo $color; ?>" />
                            <polygon points="462.397 355.07 462.397 336.649 452.478 336.649 452.478 355.07 444.559 355.07 450.998 366.224 457.438 377.377 463.877 366.224 470.316 355.07 462.397 355.07" fill="#fff" />
                        </svg>
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