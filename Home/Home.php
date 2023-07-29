<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking System</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
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

.wrapper{
    margin: 150px auto;
    width: 90%;
}
.logo img{
    height: 0px;
    width: 0px;
}
.wrapper img{
    max-width: 600px;
    float: left;
    border: 3px solid white;
    border-radius: 20px;
    margin-right: 50px;
}
.text-box{
    color: white;
}

.text-box h1{
    font-size: 40px;
    margin-bottom: 30px;
}
.text-box p{
    font-size: 25px;
}
</style>
<body>

    <header class="header">
        <nav class="navbar">
            <a href="#">HOME</a>
            <a href="#">COURTS</a>
            <a href="#">ABOUT</a>
            <a href="#">CONTACT</a>
        </nav>
        <nav class="login-signup">
            <a href="../Log In/login.php">LOGIN</a>
            <a href="../SignUp/signup.php">SIGNUP</a>
        </nav>
    </header>
    <div class="wrapper">
    <img src="1.jpg" alt="futsal image">
        <div class="text-box">
            <h1>Futsal Management System</h1>
            <p>A futsal booking system is an online platform or application designed to facilitate 
                the booking of futsal courts or facilities. Futsal is a variant of soccer that is 
                played on a smaller, hard court with five players on each team. As the popularity of 
                futsal grows, efficient booking systems become essential for managing court reservations 
                and ensuring a smooth experience for players and venue owners.</p>
        </div>
    </div>
</body>
<footer>
    
<?php include("../assets/footer.php"); ?>
</footer>
</html>