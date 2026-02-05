<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us | CraftNest</title>

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Main.css">

    <style>
        body {
            background-color: #f8f4ea;
            font-family: 'Lora', serif;
        }

        /* Hero Banner */
        .contact-hero {
            background: url('../Images/banner2.png') center/cover no-repeat;
            padding: 110px 20px;
            color: white;
            text-align: center;
            position: relative;
        }

        .contact-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
        }

        .contact-hero h1,
        .contact-hero p {
            position: relative;
            z-index: 2;
        }

        /* Contact Card */
        .contact-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e6d8c3;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #fff3ea;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9e5e40;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #d6c9af;
        }

        .form-control:focus {
            border-color: #9e5e40;
            box-shadow: 0 0 8px rgba(158, 94, 64, 0.35);
        }

        .btn-send {
            background-color: #9e5e40 !important;
            color: white !important;
            border-radius: 12px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }

        .btn-send:hover {
            background-color: #704b1d !important;
        }

        iframe {
            border-radius: 16px;
            border: 1px solid #e6d8c3;
            width: 100%;
            height: 350px;
            margin-top: 20px;
        }
    </style>
</head>

<body style="margin-top:100px;">

    <!-- HERO -->
    <section class="contact-hero">
        <h1 class="display-5 fw-bold">Get in Touch</h1>
        <p>We’d love to hear from you!</p>
    </section>

    <div class="container py-5">

        <!-- Contact Information -->
        <div class="row text-center mb-5">
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="icon-box"><i class="fas fa-phone"></i></div>
                    <h5>Phone</h5>
                    <p>+91 98765 43210</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-card">
                    <div class="icon-box"><i class="fas fa-envelope"></i></div>
                    <h5>Email</h5>
                    <p>support@craftnest.com</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-card">
                    <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                    <h5>Address</h5>
                    <p>Ahmedabad, Gujarat, India</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-card">
            <h3 class="text-center mb-4" style="color:#3D5229; font-weight:700;">Send Us a Message</h3>

            <form method="POST" action="send_message.php">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn-send">Send Message</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Google Map -->
        <h3 class="text-center mt-5 mb-3" style="color:#3D5229; font-weight:700;">Find Us on the Map</h3>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.585812296829!2d72.53137477526877!3d23.026207379168444!2m3!1f0!2f0!3f0!3m2!
            1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f00f61bbd9%3A0x45c3389e2fbc0de!2sAhmedabad%2C%20Gujarat!
            5e0!3m2!1sen!2sin!4v1700000000000"
            allowfullscreen="">
        </iframe>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>