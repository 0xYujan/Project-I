<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

    .navbar a {
        position: relative;
        font-size: 16px;
        color: rgba(255, 254, 254, 1);
        text-decoration: none;
        font-weight: 500;
        margin-right: 30px;

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

    .row-line {
        position: absolute;
        top: 25%;
        left: 0;
        background: rgba(161, 254, 107, 1);
        width: 15%;
        height: 1%;
    }

    .user-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        margin-left: 30px;

    }

    nav {
        width: 100%;
        display: inline-block;
        list-style: none;
    }

    nav a {
        text-decoration: none;
    }
</style>

<header class="header">
    <nav class="navbar">
        <a href="#">HOME</a>
        <a href="#">COURTS</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT</a>
        <a href="#">BOOKED LIST</a>
    </nav>
    <a href="user_profile.php"> <!-- Replace "user_profile.php" with the actual URL of the user's profile page -->
        <img src="../assets/profile.png" class="user-pic">
    </a>

</header>