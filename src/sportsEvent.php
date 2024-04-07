<?php
    require_once('config.php');
    $query="SELECT * from eventcategory";
    $result=mysqli_query($conn,$query);
?>
<?php
    // Add event  
    include("config.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_Btn'])) {
        $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
        $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
        $event_category = mysqli_real_escape_string($conn, $_POST['event_category']);

            // Insert the new event without specifying eventcat_ID column
            $sql = "INSERT INTO eventcategory (event_name, event_type, event_category) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sss", $event_name, $event_type, $event_category);
                $result = mysqli_stmt_execute($stmt);
        

                if ($result) {
                    // Get the auto-incremented eventcat_ID
                    $eventcat_ID= mysqli_insert_id($conn);

                    // Generate the generated_id
                    $generated_id = strtoupper(substr($event_name, 0, 3)) . ($eventcat_ID + 100); // Start from 101

                    // Update the generated_id in the database
                    $update_sql = "UPDATE eventcategory SET generated_id = ? WHERE eventcat_ID = ?";
                    $update_stmt = mysqli_prepare($conn, $update_sql);

                    if ($update_stmt) {
                        mysqli_stmt_bind_param($update_stmt, "si", $generated_id, $eventcat_ID);
                        mysqli_stmt_execute($update_stmt);
                        mysqli_stmt_close($update_stmt);
                    }

                    echo "<script>alert('Event added successfully');window.location='sportsEvent.php'</script>";
                } else {
                    echo "<script>alert('Error in executing prepared statement');window.location='sportsEvent.php'</script>";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error in prepared statement');window.location='sportsEvent.php'</script>";
            }
        }
    mysqli_close($conn);
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
        <header class="dark:bg-gray-900 sticky top-0  z-10" style="margin-left: 320px;">
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
    
                            <svg class="flex-shrink-0 w-4 h-4 mr-1 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z"/>
                            </svg>
                            Event
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Sports</a>
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
                                            <img class="w-12 h-12 object-cover rounded-full" src="/image/user.jpg" alt="">
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
                                            <img class="w-12 h-12 object-cover rounded-full" src="/image/user.jpg" alt="">
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
                        <img class="w-10 h-10 rounded-full object-cover" src="./image/user.jpg" alt="user photo">
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
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
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
                                <a href="./sportsDashboard.php" class="flex text-sm items-center px-3 py-3 text-gray-800 hover:bg-gray-100  rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                                    <svg class="w-4 h-4 text-gray-800 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                    </svg>
                                    <span class="ms-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <button type="button" class="flex text-sm items-center w-full p-3 text-blue-600 bg-blue-100 transition ease-in-out duration-300 rounded-lg group dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 transition duration-75 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Event</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <ul id="dropdown-example" class="hidden py-1 space-y-1">
                                    <li>
                                        <a href="./sportsEvent.php" class="flex text-sm items-center w-full p-3 text-blue-600 transition duration-75 rounded-lg pl-11 group dark:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-caret-right mr-3"></i>Sport</a>
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
                                <a href="./sportsAccount.php" class="flex text-sm items-center p-3 text-gray-800 hover:text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="flex-shrink-0 w-4 h-4 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
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

        <main class="pr-4 sm:ml-80" style="margin-left: 320px;">
            <div class="container">
                <h1 class="px-2 pt-4 text-3xl font-bold text-gray-800">Sports</h1>
                <p class="px-2 text-gray-500 text-sm mt-1 mb-4">List of sports</p>
                <div class="flex w-full gap-4 relative">
                    <!--left side, compose of utilitites-->
                    <div class="h-28" style="width:290px;">
                        <div class="shadow-md p-4 rounded-xl bg-white dark:bg-gray-800">   
                            <p class="text-lg mb-2.5 font-semibold text-gray-800"><span>12 </span>Sports</p> 
                            <!-- Search bar -->
                            <div class="flex items-center justify-between gap-4 mb-4"> 
                                <form class="max-w-md w-full">   
                                    <label for="default-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
                                    </div>
                                </form>
                            </div>

                            <!-- Filter-->
                            <div>
                                <h1 class="text-gray-800 text-md font-medium">Filter by</h1>
                                <p class="text-gray-500 text-sm font-normal">Category:</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <ul class="grid grid-cols-1 w-full gap-2">
                                        <li class="col-span-1">
                                            <input type="checkbox" id="men" value="" class="hidden peer" required="">
                                            <label for="men" class="inline-flex justify-between items-center w-full gap-2 text-gray-500 p-2.5 bg-gray-100 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-500 peer-checked:text-blue-600 peer-checked:bg-blue-100 dark:peer-checked:text-gray-300 hover:text-blue-600 hover:bg-blue-500/10 active:bg-blue-500/30   dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform-gpu hover:scale-105">                           
                                                <div class="inline-flex items-center">
                                                    <i class="fa-solid fa-person mr-3"></i>    
                                                    <div class="block">
                                                        <div class="w-full text-sm font-semibold">Men</div>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold">19</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="women" value="" class="hidden peer" required="">
                                            <label for="women" class="inline-flex justify-between items-center w-full gap-2 text-gray-500 p-2.5 bg-gray-100 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-500 peer-checked:text-blue-600 peer-checked:bg-blue-100 hover:text-blue-600 dark:peer-checked:text-gray-300 hover:bg-blue-500/10 active:bg-blue-500/30 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform-gpu hover:scale-105">                           
                                                <div class="inline-flex items-center">
                                                    <i class="fa-solid fa-person-dress mr-3"></i>
                                                    <div class="block">
                                                        <div class="w-full text-sm font-semibold">Women</div>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold">8</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="mixed" value="" class="hidden peer" required="">
                                            <label for="mixed" class="inline-flex justify-between items-center w-full gap-2 text-gray-500 p-2.5 bg-gray-100 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-500 peer-checked:text-blue-600 peer-checked:bg-blue-100 dark:peer-checked:text-gray-300 hover:bg-blue-500/10 hover:text-blue-600 active:bg-blue-500/30 dark:text-gray-400  dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform-gpu hover:scale-105">                           
                                                <div class="inline-flex items-center">
                                                    <i class="fa-solid fa-person-half-dress mr-3"></i>
                                                    <div class="block">
                                                        <div class="w-full text-sm font-semibold">Mixed</div>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold">11</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <p class="text-gray-500 text-sm font-normal">Type:</p>
                                    <ul class="grid grid-cols-1 w-full gap-2">
                                        <li>
                                            <input type="checkbox" id="minor" value="" class="hidden peer" required="">
                                            <label for="minor" class="inline-flex justify-between items-center w-full gap-2 text-gray-500 p-2.5 bg-gray-100 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-500 peer-checked:text-blue-600 peer-checked:bg-blue-100 dark:peer-checked:text-gray-300 hover:bg-blue-500/10 hover:text-blue-600 active:bg-blue-500/30 dark:text-gray-400  dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform-gpu hover:scale-105">                           
                                                <div class="inline-flex items-center">
                                                    <i class="fa-solid fa-medal mr-3"></i>
                                                    <div class="block">
                                                        <div class="w-full text-sm font-semibold">Minor</div>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold">2</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="major" value="" class="hidden peer" required="">
                                            <label for="major" class="inline-flex justify-between items-center w-full gap-2 p-2.5 bg-gray-100 text-gray-500 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-500 peer-checked:text-blue-600 peer-checked:bg-blue-100 dark:peer-checked:text-gray-300 hover:bg-blue-500/10 hover:text-blue-500 active:bg-blue-500/30 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform-gpu hover:scale-105">                           
                                                <div class="inline-flex items-center">
                                                    <i class="fa-solid fa-trophy mr-3"></i>
                                                    <div class="block">
                                                        <div class="w-full text-sm font-semibold">Major</div>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold">13</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- YEar-->
                            <div class="mt-3">
                                <p class="text-md text-gray-700 mb-2">Event year</p>
                                <button type="button" class="text-white w-full bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 flex justify-between me-2 mb-2 transition-transform transform-gpu hover:scale-105">Activate<i class="fa-solid fa-cloud-arrow-up mt-1"></i></button>
                                                                
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-700 bg-gray-100 hover:bg-blue-100 hover:text-blue-600 w-full focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Activated year 
                                <i class="fa-solid fa-location-arrow"></i>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2019</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2020</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2021</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2022</a>
                                    </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--righ side, list of sports-->
                    <div class="flex-1">
                        <div class="overflow-y-auto">
                            <div class="bg-white shadow-lg mb-4 p-5 rounded-lg w-full">
                                <!--top side of the content-->
                                <div class="flex items-center justify-between">
                                    <div class="add">
                                        <!--Add Modal-->
                                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Add Sport
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form class="p-4 md:p-5" id="addEventForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                            <div class="col-span-2">
                                                                <label for="event_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                <input type="text" name="event_name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                                            </div>

                                                            <div class="col-span-2 sm:col-span-1">
                                                                <label for="event_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                                <select name="event_type" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected="" disabled selected hidden required>Select</option>
                                                                    <option value="Minor">Minor</option>
                                                                    <option value="Major">Major</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-span-2 sm:col-span-1">
                                                                <label for="event_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                                <select name="event_category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option selected="" disabled selected hidden required>Select</option>
                                                                    <option value="Men">Men</option>
                                                                    <option value="Women">Women</option>
                                                                    <option value="Mixed">Mixed</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-span-2 mt-2">
                                                                <div class="flex items-center justify-center w-full">
                                                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                        <div class="flex flex-col items-center justify-center pt-4 pb-5">
                                                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                                            </svg>
                                                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                                        </div>
                                                                        <input id="dropzone-file" type="file" class="hidden" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="submit_Btn" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                            Add Sport
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- list of sports -->         
                                <div id="sportsContainer" class="grid grid-cols-4 gap-5">
                                    <div class="max-w-sm bg-white h-full border-2 p-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center hover:border-blue-500">
                                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-tooltip-target="tooltip-animation" type="button"  type="button" class="text-gray-200 border-4 border-dashed border-gray-200 hover:text-blue-600 hover:border-blue-500 font-medium rounded-full text-sm p-8 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-transform transform-gpu hover:scale-105">
                                            <i class="fa-solid fa-circle-plus text-3xl"></i>
                                            <span class="sr-only">Icon description</span>
                                        </button>
                                        <div id="tooltip-animation" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-blue-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Add new venue
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <?php
                                        include("config.php");

                                        // Fetch data from the database
                                        $sql = "SELECT * FROM eventcategory";
                                        $result = mysqli_query($conn, $sql);

                                        // Check if records exist
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row of data
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Extract data from the current row
                                                $eventcat_ID = $row['eventcat_ID'];
                                                $event_name = $row['event_name'];
                                                $event_type = $row['event_type'];
                                                $event_category = $row['event_category'];

                                                // Output HTML for each card with dynamic data
                                                // Output HTML for each card with dynamic data and data attributes
                                                echo '<div id="event-' . $eventcat_ID . '" class="max-w-sm bg-white border h-44 p-3 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 " data-event-id="' . $eventcat_ID . '" data-event-name="' . htmlspecialchars($event_name) . '" data-event-type="' . htmlspecialchars($event_type) . '" data-event-category="' . htmlspecialchars($event_category) . '" data-venueName="Venue Name" data-venueDescription="Venue Description">';
                                                    echo '<div class="flex justify-end pb-4">';
                                                        echo '<button id="dropdownButton-' . $eventcat_ID . '" data-dropdown-toggle="dropdown-' . $eventcat_ID . '" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-blue-500/10 hover:text-blue-600 active:bg-blue-500/30 dark:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">';
                                                            echo '<span class="sr-only">Open dropdown</span>';
                                                                echo '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">';
                                                                echo '<path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>';
                                                            echo '</svg>';
                                                        echo '</button>';
                                                        // Dropdown menu
                                                        echo '<div id="dropdown-' . $eventcat_ID . '" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-md border-2 border-gray-200 w-32 dark:bg-gray-700">';
                                                            echo '<ul class="p-2" aria-labelledby="dropdownButton">';
                                                                // Edit option with onclick event to call openEditModal function
                                                                echo '<li>';
                                                                    echo '<button data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update" data-tooltip-target="tooltip-light" data-tooltip-style="light" type="button" class="block px-4 py-2 mb-2 bg-blue-50 font-medium text-sm w-full text-left rounded-md text-blue-500 hover:bg-blue-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fa-solid fa-file-pen mr-2"></i>Edit</button>';
                                                                echo '</li>';
                                                                // Delete option with onclick event to call deleteEvent function
                                                                echo '<li>';
                                                                    echo '<a href="javascript:void(0);" onclick="deleteEvent(' . $eventcat_ID . ')" class="block px-4 rounded-md py-2 text-sm font-medium text-red-500 bg-red-50  hover:bg-red-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fa-solid fa-trash-can mr-2"></i>Delete</a>';
                                                                echo '</li>';
                                                            echo '</ul>';
                                                        echo '</div>';
                                                        echo '</div>';

                                                        echo '<div class="flex flex-col items-center pb-6">';
                                                        echo '<h5 class="mb-1 text-md text-center font-bold text-gray-900 dark:text-white">' . $event_name . '</h5>';
                                                        echo '<div class="flex gap-1">';
                                                            echo '<span class="text-sm text-gray-500 dark:text-gray-400">' . $event_type . '</span>';
                                                            echo '<span class="text-sm text-gray-500">/</span>';
                                                            echo '<span class="text-sm text-gray-500 dark:text-gray-400">' . $event_category . '</span>';
                                                        echo '</div>';
                                                    echo '</div>';

                                                echo '</div>'; // Close max-w-sm div
                                            }
                                        } else {
                                            // Display a message if no records are found
                                            echo "No sports found";
                                        }

                                        // Close database connection
                                        mysqli_close($conn);
                                    ?>
                                <div id="crud-modal-update" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Update Sport
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-update">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" id="updateEventForm" action="sportsEvent-Update.php" method="POST" onsubmit="updateEvent(event)">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <input type="hidden" name="eventcat_ID" id="eventcat_ID" value=""> 
                                                    <div class="col-span-2">
                                                        <label for="event_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                        <input type="text" name="event_name" id="event_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                                    </div>

                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="event_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                        <select name="event_type" id="event_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option selected="" disabled selected hidden required>Select</option>
                                                            <option value="Minor">Minor</option>
                                                            <option value="Major">Major</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="event_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                        <select name="event_category" id="event_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option selected="" disabled selected hidden required>Select</option>
                                                            <option value="Men">Men</option>
                                                            <option value="Women">Women</option>
                                                            <option value="Mixed">Mixed</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-span-2 mt-2">
                                                        <div class="flex items-center justify-center w-full">
                                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                                <div class="flex flex-col items-center justify-center pt-4 pb-5">
                                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                                    </svg>
                                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                                </div>
                                                                <input id="dropzone-file" type="file" class="hidden" />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" name="update_Btn" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                    Update Sport
                                                </button>
                                            </form>
                                        </div>
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

        <!--delete sport-->
        <script>
            // Function to handle delete event
            function deleteEvent(eventcat_ID) {
                // Send AJAX request to delete the event
                $.ajax({
                    url: 'sportsEvent-Delete.php',
                    type: 'POST',
                    data: { eventcat_ID: eventcat_ID, delete_event: true },
                    success: function(response) {
                        if (response === 'success') {
                            // If deletion is successful, remove the corresponding card from the UI
                            $('#event-' + eventcat_ID).remove();
                        } else {
                            alert('Error deleting event.');
                        }
                    },
                    error: function() {
                        alert('Error deleting event. Please try again later.');
                    }
                });
            }
        </script>

        <!--Update-->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const crudModalUpdate = document.getElementById("crud-modal-update");
                const updateEventForm = document.getElementById("updateEventForm");

                const openModalButtons = document.querySelectorAll("[data-modal-toggle='crud-modal-update']");

                openModalButtons.forEach((button) => {
                    button.addEventListener("click", function () {
                        const eventId = this.closest(".max-w-sm").dataset.eventId;
                        const eventName = this.closest(".max-w-sm").dataset.eventName;
                        const eventType = this.closest(".max-w-sm").dataset.eventType;
                        const eventCategory = this.closest(".max-w-sm").dataset.eventCategory;

                        // Populate the input fields with data from the clicked event
                        updateEventForm.elements["eventcat_ID"].value = eventId;
                        updateEventForm.elements["event_name"].value = eventName;
                        updateEventForm.elements["event_type"].value = eventType;
                        updateEventForm.elements["event_category"].value = eventCategory;

                        // Show the modal
                        crudModalUpdate.classList.remove("hidden");
                        crudModalUpdate.setAttribute("aria-hidden", "false");
                    }); 
                });

                // JavaScript function to handle the update event
                function updateEvent(event) {
                    event.preventDefault(); // Prevent form submission

                    const formData = new FormData(updateEventForm);

                    // Send AJAX request to the PHP script
                    fetch(updateEventForm.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        return response.text();
                    })
                    .then(result => {
                        if (result === "success") {
                            alert("Sport updated successfully");
                            // Redirect back to the page after successful update
                            window.location.href = "sportsEvent.php"; // Replace "sportsEvent.php" with the actual URL of your page
                        } else {
                            alert("Failed to update sport");
                            console.error("Failed to update sport");
                        }
                    })

                    .catch(error => {
                        console.error('Error:', error);
                        alert("An error occurred while updating the sport");
                    });
                }
            });
        </script>

        <script>
            // Get the search input element
            const searchInput = document.getElementById('venue-search');

            // Get the container for the venue cards
            const venueContainer = document.getElementById('venueContainer');

            // Add event listener for changes in the search input
            searchInput.addEventListener('input', function () {
                const searchText = this.value.trim().toLowerCase();
                const venueCards = venueContainer.querySelectorAll('.max-w-sm');

                // Loop through each card and hide/show based on search text
                venueCards.forEach(function(card) {
                    const venueName = card.dataset.venueName.toLowerCase();
                    const venueDescription = card.dataset.venueDescription.toLowerCase();
                    if (venueName.includes(searchText) || venueDescription.includes(searchText)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        </script>

    <!--Filter-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("default-search");
        const sportsCards = document.querySelectorAll(".max-w-sm");

        // Function to filter cards based on search input
        function filterBySearchInput() {
            const searchValue = searchInput.value.toLowerCase();

            sportsCards.forEach(function(card) {
                const eventName = card.dataset.eventName.toLowerCase();
                const eventType = card.dataset.eventType.toLowerCase();
                const eventCategory = card.dataset.eventCategory.toLowerCase();

                console.log("Event Name:", eventName);
                console.log("Event Type:", eventType);
                console.log("Event Category:", eventCategory);

                if (eventName.includes(searchValue) || eventType.includes(searchValue) || eventCategory.includes(searchValue)) {
                    card.style.display = "block"; // Show the card
                } else {
                    card.style.display = "none"; // Hide the card
                }
            });
        }

        // Add event listener to the search input
        searchInput.addEventListener("input", filterBySearchInput);

        // Function to filter cards based on selected checkboxes
        function filterByCheckboxes() {
            const selectedFilters = Array.from(document.querySelectorAll("input[type='checkbox']:checked"))
                .map(checkbox => checkbox.id);

            sportsCards.forEach(function(card) {
                const cardCategories = [card.dataset.eventType.toLowerCase(), card.dataset.eventCategory.toLowerCase()];

                const showCard = selectedFilters.some(filter => {
                    if (filter === "minor") {
                        return cardCategories.some(category => category.includes("minor"));
                    } else {
                        return cardCategories.includes(filter);
                    }
                });

                card.style.display = showCard ? "block" : "none";
            });
        }

        // Add event listener to checkboxes
        const checkboxes = document.querySelectorAll("input[type='checkbox']");
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", filterByCheckboxes);
        });

        // Initial filtering on page load
        filterBySearchInput();
        filterByCheckboxes();
    });


</script>

    <!--number of cards counter-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the sports container
            const sportsContainer = document.getElementById("sportsContainer");
            // Get the span for displaying card count
            const cardCountSpan = document.getElementById("cardCount");

            // Function to update card count
            function updateCardCount() {
                // Get the number of cards inside the sports container
                const cardCount = sportsContainer.querySelectorAll(".max-w-sm").length;
                // Update the text content of the span
                cardCountSpan.textContent = cardCount;
            }
            updateCardCount();
        });
    </script>
    </body>
</html>