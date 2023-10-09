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
        <div class="Court-Name-btn">
            <a href="#" class="button"><strong>Book Now</strong></a>
            <h1>Rs: 1200
            </h1>
        </div>


        <!-- after book now  -->


        <div class="overlay" id="overlay">
            <div class="overlay-content">
                <h2>Booking Form</h2>
                <div class="book_container">
                    <h3>Add Time</h3>
                    <form action="process_booking.php" method="post">
                        <div class="form-group">
                            <label for="user">Your Name:</label>
                            <input type="text" id="user" name="user" required>
                        </div>
                        <div class="form-group">
                            <label for="pitch">Futsal Pitch:</label>
                            <input type="text" id="pitch" name="pitch" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="bookday" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time:</label>
                            <select id="time" name="shift" required>
                                <option value="6-7">6 TO 7 AM</option>
                                <option value="7-8">7 TO 8 AM</option>
                                <option value="8-9">8 TO 9 AM</option>
                                <option value="9-10">9 TO 10 AM</option>
                                <option value="10-11">10 TO 11 AM</option>
                                <option value="11-12">11 TO 12 AM</option>
                                <option value="12-13">12 TO 1 PM</option>
                                <option value="13-14">1 TO 2 PM</option>
                                <option value="14-15">2 TO 3 PM</option>
                                <option value="15-16">3 TO 4 PM</option>
                                <option value="16-17">4 TO 5 PM</option>
                                <option value="17-18">5 TO 6 PM</option>
                                <option value="18-19">6 TO 7 PM</option>
                                <option value="19-20">7 TO 8 PM</option>
                                <option value="20-21">8 TO 9 PM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number:</label>
                            <input type="text" id="contact" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="proceed" value="Add Time">
                        </div>
                    </form>

                </div>
                <button class="close-btn" id="close-btn">Close</button>
            </div>
        </div>

    </div>
    <!-- </div> -->
    <div class="Court-map">

        <h1>MAP</h1>
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.043496233418!2d85.35969997465604!3d27.71594327617771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bd0e441b9d1%3A0x81962eaa6a191e35!2sFutsal%20Arena%20Boudha!5e0!3m2!1sen!2snp!4v1691133390561!5m2!1sen!2snp" width="1263" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <?php include("../assets/footer.php"); ?>
    <script src="script.js"></script>


</body>

</html>