<?php

include ('config.php');

?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
    <body class="bg-gray-100">
        <!--headerrrrr-->
        <header class="dark:bg-gray-900 sticky top-0 z-10" style="margin-left: 320px;">
            <div class="bg-gray-100 flex flex-wrap items-center justify-between mx-auto p-4">
                <!--left side of the header-->
                <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>

                <!-- Breadcrumb -->
                <nav class="md:flex hidden py-3 text-gray-700 rounded-lg dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="flex-shrink-0 w-4 h-4 mr-1  transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                            </svg>
                            Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Home</a>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!--right side of the header-->
                <div class="flex items-center md:order-2  gap-3 md:space-x-0 rtl:space-x-reverse">
                    <div class="gap-1">
                        <!--Notifacation icon-->
                        <button aria-expanded="false" aria-haspopup="menu" id="notif-menu-button" class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-700 hover:bg-blue-500/10 hover:text-blue-600 active:bg-blue-500/30" type="button" aria-expanded="false" data-dropdown-toggle="notif-dropdown" data-dropdown-placement="bottom" style="position: relative; overflow: hidden;">
                            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                                    <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>

                        <div class="z-50 hidden w-80 my-4 text-base list-none bg-white divide-y divide-gray-100 border rounded-lg shadow-md dark:bg-gray-700 dark:divide-gray-600" id="notif-dropdown">
                            <div class=" p-3 bg-gray-50">
                                <p class="text-center">Notification</p>
                            </div>
                            <ul class="py-2" aria-labelledby="notif-menu-button">
                                <li class="px-2">
                                    <a href="#" class="block p-4 text-sm rounded-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <div class="flex items-center gap-4">
                                            <img class="w-12 h-12 object-cover rounded-full" src="image/user.jpg" alt="">
                                            <div class="font-medium dark:text-white">
                                                <div class="text-sm font-medium mb-1 text-gray-600 dark:text-gray-400"><span class="font-bold text-gray-800">New Message</span> from Bryan</div>
                                                <div class="flex items-center gap-2 text-sm font-light text-gray-500">
                                                    <i class="fa-solid fa-clock text-blue-300"></i>
                                                    <p class="mb-1">1 minute ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="px-2">
                                    <a href="#" class="block p-4 text-sm rounded-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <div class="flex items-center gap-4">
                                            <img class="w-12 h-12 object-cover rounded-full" src="image/user.jpg" alt="">
                                            <div class="font-medium dark:text-white">
                                                <div class="text-sm font-medium mb-1 text-gray-600 dark:text-gray-400"><span class="font-bold text-gray-800">New Message</span> from Bryan</div>
                                                <div class="flex items-center gap-2 text-sm font-light text-gray-500">
                                                    <i class="fa-solid fa-clock text-blue-300"></i>
                                                    <p class="mb-1">1 minute ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="px-2">
                                    <a href="#" class="block p-4 text-sm rounded-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <div class="inline-block w-12 h-12 text-center rounded-full bg-green-400 shadow-soft-2xl">
                                                    <i class="fa-solid fa-clipboard-check text-xl relative top-3.5 text-white" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="font-medium dark:text-white">
                                                <div class="text-sm font-medium mb-1 text-gray-600 dark:text-gray-400"><span class="font-bold text-gray-800">Approval Request</span> from Bryan</div>
                                                <div class="flex items-center gap-2 text-sm font-light text-gray-500">
                                                    <i class="fa-solid fa-clock text-blue-300"></i>
                                                    <p class="mb-1">13 minutes ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="px-2">
                                    <a href="#" class="block p-4 text-sm rounded-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <div class="inline-block w-12 h-12 text-center rounded-full bg-blue-400 shadow-soft-2xl">
                                                    <i class="fa-solid fa-file text-xl relative top-3.5 text-white" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="font-medium dark:text-white">
                                                <div class="text-sm font-medium mb-1 text-gray-600 dark:text-gray-400"><span class="font-bold text-gray-800">Form Request</span> from Bryan</div>
                                                <div class="flex items-center gap-2 text-sm font-light text-gray-500">
                                                    <i class="fa-solid fa-clock text-blue-300"></i>
                                                    <p class="mb-1">1 hour ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <!--Messages icon-->
                        <button aria-expanded="false" aria-haspopup="menu" id=":r1q:" class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-700 hover:bg-blue-500/10 hover:text-blue-600 active:bg-blue-500/30" type="button" style="position: relative; overflow: hidden;">
                            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!--User profile-->
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-blue-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full object-cover" src="image/user.jpg" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="singout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!--SideBarrrrrrrrr-->
        <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full">
                <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800 shadow-md">
                    <div class="p-4 mb-3">
                        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-800">SPIS</span>
                        </a>
                    </div>
                    <div class="mt-4 p-2">
                        <ul class="space-y-2 font-medium">
                            <li>
                                <a href="./sportsDashboard.php" class="flex text-sm items-center p-3 text-blue-600 bg-blue-100 rounded-lg dark:text-white dark:hover:bg-gray-700 transition duration-75 group">
                                <svg class="flex-shrink-0 w-4 h-4 text-blue-600 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18"> 
                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <button type="button" class="flex text-sm items-center w-full p-3 text-gray-800 hover:text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <svg class="flex-shrink-0 w-4 h-4 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Event</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <ul id="dropdown-example" class="hidden py-1 space-y-1">
                                    <li>
                                        <a href="./sportsEvent.php" class="flex text-sm items-center w-full p-3 text-gray-500 hover:text-gray-800 transition duration-75 rounded-lg pl-11 group dark:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-caret-right mr-3"></i>Sport</a>
                                    </li>
                                    <li>
                                        <a href="./sportsVenue.php" class="flex text-sm items-center w-full p-3 text-gray-500 hover:text-gray-800 transition duration-75 rounded-lg pl-11 group dark:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-caret-right mr-3"></i>Venue</a>
                                    </li>
                                    <li>
                                        <a href="./sportsPoints.php" class="flex text-sm items-center w-full p-3 text-gray-500 hover:text-gray-800 transition duration-75 rounded-lg pl-11 group dark:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-caret-right mr-3"></i>Points</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./sportsAccount.php" class="flex text-sm items-center p-3 text-gray-800 hover:bg-gray-100 rounded-lg dark:text-white dark:hover:bg-gray-700 transition duration-75 group">
                                <svg class="w-4 h-4 text-gray-800 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                                    </svg>
                                    <span class="ms-3 ">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="./sportsDepartment.php" class="flex text-sm items-center p-3 text-gray-800 hover:bg-gray-100 rounded-lg dark:text-white dark:hover:bg-gray-700 transition duration-75 group">

                                    <svg class="flex-shrink-0 w-4 h-4 text-gray-800 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M377 52c11-13.8 8.8-33.9-5-45s-33.9-8.8-45 5L288 60.8 249 12c-11-13.8-31.2-16-45-5s-16 31.2-5 45l48 60L12.3 405.4C4.3 415.4 0 427.7 0 440.4V464c0 26.5 21.5 48 48 48H288 528c26.5 0 48-21.5 48-48V440.4c0-12.7-4.3-25.1-12.3-35L329 112l48-60zM288 448H168.5L288 291.7 407.5 448H288z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">Department</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <main class="py-0 sm:ml-80" style="margin-left: 320px;">
            <div class="container">
                <div class="w-full gap-4 pr-4 relative">
                    <h1 class="px-2 pt-4 text-3xl font-bold text-gray-800 mb-4">Dashboard</h1>
                    <div class="bg-white rounded-lg shadow-md mb-5 p-5">
                        <!--right side cards-->
                        <div class="grid grid-cols-2 gap-5">
                            <!--right side cards-->
                            <div class="grid grid-cols-2 gap-5">
                                <div class="flex items-center justify-between h-24 border-2 bg-white rounded-xl dark:bg-gray-800">
                                    <div class="p-5 ">
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800 dark:opacity-60">Event</p>
                                        <h5 class="mb-0 text-lg font-bold text-gray-600">
                                            <?php 
                                            
                                            $queryevent= "SELECT * FROM eventcategory";
                                            $result=mysqli_query($conn,$queryevent); 
                                            $queryevent=mysqli_num_rows($result);
                                            echo $queryevent;
                                            
                                            ?>
                                        </h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="inline-block w-14 h-14 text-center rounded-lg bg-gray-100 shadow-soft-2xl">
                                            <i class="fa-solid fa-trophy  text-xl relative top-4 text-gray-600" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between h-24 border-2 bg-white rounded-xl dark:bg-gray-800">
                                    <div class="p-5 ">
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800 dark:opacity-60">Account</p>
                                        <h5 class="mb-0 text-lg font-bold text-gray-600">
                                        <?php
                                        $queryuser= "SELECT * FROM user";
                                             $result=mysqli_query($conn,$queryuser); 
                                             $queryuser=mysqli_num_rows($result);
                                             echo $queryuser;
                                        ?>
                                        </h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="inline-block w-14 h-14 text-center rounded-lg bg-gray-100 shadow-soft-2xl">
                                            <i class="fa-solid fa-user  text-xl relative top-4 text-gray-600" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between h-24 border-2 bg-white rounded-xl dark:bg-gray-800">
                                    <div class="p-5 ">
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800 dark:opacity-60">Venue</p>
                                        <h5 class="mb-0 text-lg font-bold text-gray-600">
                                        <?php
                                        $queryvenue= "SELECT * FROM venue";
                                             $result=mysqli_query($conn,$queryvenue); 
                                             $queryvenue=mysqli_num_rows($result);
                                             echo $queryvenue;
                                        ?>
                                        </h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="inline-block w-14 h-14 text-center rounded-lg bg-gray-100 shadow-soft-2xl">
                                            <i class="fa-solid fa-map-location-dot  text-xl relative top-4 text-gray-600" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between h-24 border-2 bg-white rounded-xl dark:bg-gray-800">
                                    <div class="p-5 ">
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800 dark:opacity-60">Point</p>
                                        <h5 class="mb-0 text-lg font-bold text-gray-600">
                                        <?php
                                            $querypoints= "SELECT * FROM points";
                                             $result=mysqli_query($conn,$querypoints); 
                                             $querypoints=mysqli_num_rows($result);
                                             echo $querypoints;
                                        ?>
                                        </h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="inline-block w-14 h-14 text-center rounded-lg bg-gray-100 shadow-soft-2xl">
                                            <i class="fa-solid fa-flag-checkered  text-xl relative top-4 text-gray-600" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 bg-white border-2 rounded-lg">    
                                    
                                    <div class=" w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                                        <div class="flex justify-between mb-5">
                                            <div>
                                            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">CMAS</h5>
                                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rank 1st</p>
                                            </div>
                                            <div
                                            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                                            23%
                                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                                            </svg>
                                            </div>
                                        </div>
                                        <div id="data-labels-chart"></div>
                                    </div>
         
                                </div>
                            </div>
                            <!--left side cards-->
                            <div>
                                <div class="bg-white border-2 h-full rounded-lg">
                                    <div class="flex justify-end h-full items-end">
                                        <img class="w-44 h-44" src="./image/Persin-lappy.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!--Script-->
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            const options = {
            // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
            dataLabels: {
            enabled: true,
            // offsetX: 10,
            style: {
                cssClass: 'text-xs text-white font-medium'
            },
            },
            grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 16,
                right: 16,
                top: -26
            },
            },
            series: [
            {
                name: "SMFT",
                data: [12, 23, 53, 60, 89, 125, 402],
                color: "#1A56DB",
            },
            {
                name: "CESS",
                data: [10, 15, 70, 59, 72, 173,371],
                color: "#7E3BF2",
            },
            {
                name: "CAFES",
                data: [5, 23, 65, 78, 99, 157, 321],
                color: "#20de16",
            },
            {
                name: "IDS",
                data: [23, 30,80, 60, 120, 200, 300],
                color: "#ff85c8",
            },
            ],
            chart: {
            height: "100%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
            },
            tooltip: {
            enabled: true,
            x: {
                show: false,
            },
            },
            legend: {
            show: true
            },
            fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
            },
            stroke: {
            width: 6,
            },
            xaxis: {
            categories: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            },
            yaxis: {
            show: false,
            labels: {
                formatter: function (value) {
                return value;
                }
            }
            },
            }

            if (document.getElementById("data-labels-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("data-labels-chart"), options);
            chart.render();
            }


        </script>

    </body>
</html>