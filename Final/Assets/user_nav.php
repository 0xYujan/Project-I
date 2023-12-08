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
            padding: 25px 12.5%;
            background: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }

        .navbarr {
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Align content to the left */
            text-align: left;
        }

        .navbarr a {
            margin-right: 30px;
            font-size: 16px;
            color: rgba(255, 254, 254, 1);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            white-space: nowrap; 
        }

        .navbarr a::after {
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

        .navbarr a:hover::after {
            transform: translateY(0);
            opacity: 1;
        }

        .navbarr .dropdown {
            position: relative;
        }

        .navbarr .dropdown ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: black;
            list-style: none;
            padding: 10px;
        }

        .navbarr .dropdown:hover ul {
            display: block;
        }

        .navbarr .dropdown ul li {
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
            margin-right:290px;
            margin-left : -110px;
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <header class="header">
        <a href="index.php"><img src="../Final/Assets/logo.png" alt="Mega Futsal" class="logo" ></a>
        <nav class="navbarr">

                <a href="index.php">HOME</a>
                <a href="Uhistory.php">HISTORY</a>
                <a href="User_edit.php" style=" margin-right: 80px; ">EDIT</a>
           
              
                <?php
                    echo '
                    <div class="dropdown">
                    <a href="#">'.strtoupper($_SESSION['user']).'&nbsp;&nbsp;&nbsp;<i class="bx bxs-user" style="color: rgba(161, 254, 107, 1);"></i></a>
                    <ul>
                        <li><a href="User.php">Dashboard</a></li>
                        <li><a href="destroy.php">Logout</a></li>
                    </ul>
                </div>';
                ?>
            </div>
        </nav>
    </header>
</body>

