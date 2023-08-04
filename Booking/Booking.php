<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Booking
    </title>

</head>

<body>

    <?php include("../assets/Login_nav.php"); ?>

    <div class="container">
        <div class="slides-wrapper">
            <div class="slider">
                <img id="slide-1" src="../assets/1.png">
                <img id="slide-2" src="../assets/2.png">
                <img id="slide-3" src="../assets/3.png">
            </div>
        </div>
    </div>

    <div class="slider-nav">
        <a href="#slide-1"></a>
        <a href="#slide-2"></a>
        <a href="#slide-3"></a>
    </div>

    <!-- <div class="near-you-container"> -->

    <div class="Court-Name">
        <h1>Futsal Arena Boudha</h1>
        <br />

        <p><i class='bx bxs-map' style="color: rgba(161, 254, 107, 1);"></i> Kathmandu</p>
        <p><i class='bx bxs-check-square' style="color: rgba(161, 254, 107, 1);"></i> Court Availability</p>
        <p><i class='bx bxs-check-circle' style="color: rgba(161, 254, 107, 1);"></i> Open 6 AM</p>
        <p><i class='bx bxs-x-circle' style="color: rgba(161, 254, 107, 1);"></i> Close 9 PM</p>
        <br />
        <p>4.1
            <i class='bx bxs-star' style="color: rgba(161, 254, 107, 1);"></i>
            <i class='bx bxs-star' style="color: rgba(161, 254, 107, 1);"></i>
            <i class='bx bxs-star' style="color: rgba(161, 254, 107, 1);"></i>
            <i class='bx bxs-star' style="color: rgba(161, 254, 107, 1);"></i>
            <i class='bx bxs-star-half' style="color: rgba(161, 254, 107, 1);"></i>
        </p>
        <br />
        <div class="price">
            Rs: 1200
        </div>
        <div class="Court-Name-btn">
            <a href="#" class="button"><strong>Map <i class='bx bx-map'></i></strong></a>
            <a href="#" class="button"><strong>Book Now</strong></a>
        </div>

    </div>
    <!-- </div> -->
    <div class="Court-map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.043496233418!2d85.35969997465604!3d27.71594327617771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bd0e441b9d1%3A0x81962eaa6a191e35!2sFutsal%20Arena%20Boudha!5e0!3m2!1sen!2snp!4v1691133390561!5m2!1sen!2snp" width="1263" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <br>
    <br>


    <?php include("../assets/footer.php"); ?>
    <script src="script.js"></script>


</body>

</html>