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

    .login-signup a {
        position: relative;
        font-size: 16px;
        color: rgba(255, 254, 254, 1);
        text-decoration: none;
        font-weight: 500;
        margin-right: 30px;

    }

    .login-signup a::after {
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

    .login-signup a:hover::after {
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
    .logo{
        height:30px;
            width: 75px;
            margin-right:200px;
            margin-left : -100px;
        }
</style>

<header class="header">
<a href="index.php"><img src="../assets/logo.png" alt="Your Logo" class="logo" ></a>

    <nav class="navbar">
    <a href="services.php">SERVICES</a>
                <a href="contact_us.php">CONTACT US</a>
                <a href="about.php">ABOUT US</a>
                <a href="booking.php">BOOKING</a>

    </nav>
    <nav class="login-signup" >
        <a href="../Final/login.php">LOGIN</a>
        <a href="../Final/signup.php">SIGNUP</a>
    </nav>
</header>