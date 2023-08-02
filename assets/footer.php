    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oxygen', sans-serif;
        }

        body {
            line-height: 1.5;
        }

        .container-f {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .footer {
            background-color: black;
            padding: 70px 0;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: white;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #32a84e;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 5px 5px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }

        .footer-col .social-links a:hover {
            color: rgba(161, 254, 107, 1);
        }

        /* Responsive */
        @media(max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media(max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }
    </style>

    <footer class="footer">
        <div class="container-f">
            <div class="row">
                <div class="footer-col">
                    <h4>Users Policy</h4>
                    <ul>
                        <li><a>Privacy Policy</a></li>
                        <li><a>Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Connect Us</h4>
                    <div class="social-links">
                        <a href="www.facebook.com/sandip.ghiimire" class="fa fa-facebook"></a>
                        <a class="fa fa-twitter"></a>
                        <a class="fa fa-linkedin"></a>
                        <a class="fa fa-instagram"></a>
                        <a class="fa fa-youtube"></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Stay Connected</h4>
                    <ul>
                        <li><a>Bhaktapur, Nepal</a></li>
                        <li><a>+977 9860202933</a></li>
                        <li><a>info.futsal@gmail.com</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Soon On</h4>
                    <ul>
                        <li><a>Play Store</a></li>
                        <li><a>App Store</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>