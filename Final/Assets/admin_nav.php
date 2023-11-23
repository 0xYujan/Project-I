<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oxygen', sans-serif;
        }

        body {
            background: rgba(23, 23, 23, 1);
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height:15%;
            padding: 25px 12.5%;
            background: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }

        .navbar {
            display: flex;
            align-items: center;
        }

        .navbar a {
            top:15px;
            margin-right: 30px;
            font-size: 16px;
            color: rgba(255, 254, 254, 1);
            text-decoration: none;
            font-weight: 500;
            position: relative;
        }

        .navbar a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 2px;
            background: rgba(161, 254, 107, 1);
            border-radius: 5px;
            transform: translateY(10px);
            opacity: 0;
            transition: .5s;
        }

        .navbar a:hover::after {
            transform: translateY(0);
            opacity: 1;
        }

        .navbar .dropdown {
            position: relative;
        }

        .navbar .dropdown ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: black;
            list-style: none;
            padding: 10px;
        }

        .navbar .dropdown:hover ul {
            top:40px;
            display: block;
            padding:30px
        }

        .navbar .dropdown ul li {
            margin-bottom: 5px;
        }

        nav {
            width: 100%;
            display: inline-block;
            list-style: none;
        }

        nav a {
            text-decoration: none;
        }
        .logo{
            height:30px;
            width: 75px;
            margin-right:400px;
            margin-left : -110px;
        }
    </style>
</head>

<body>
    <header class="header">
    <a href="../Final/index.php"><img src="../Final/Assets/logo.png" alt="Mega Futsal" class="logo" ></a>

        <nav class="navbar">
            <a class="navbar-brand" href="<?php
                session_start();
                if (isset($_SESSION['email'])) {
                    if ($_SESSION['email'] == 'code') echo 'admin.php';
                    else echo 'customer.php';
                } else echo 'index.php';
            ?>"></a>
            <div class="navbar">
                <div class="dropdown">
                    <a href="#" class="nav-link">BOOKING</a>
                    <ul>
                        <li><a href="#approved">Approved</a></li>
                        <li><a href="#pending">Pending</a></li>
                    </ul>
                </div>
                <a href="#" class="nav-link" style="margin-right:200px;">MANAGE USERS</a>
                <?php
                if ($_SESSION['admin'] == 1) echo '
                <div class="dropdown">
                    <a href="#" class="nav-link">ADMIN</a>
                    <ul>
                        <li><a href="destroy.php">Logout</a></li>
                    </ul>
                </div>';
                ?>
            </div>
        </nav>
    </header>
</body>

</html>
