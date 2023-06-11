<!DOCTYPE html>
<html>

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify otp</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    .alert {
        padding: 15px;
        background-color: chartreuse;
        font-size: 17px;
        color: black;
        opacity: 5;
        visibility: hidden;
        transition: opacity 0.5s, visibility 100.5s;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .alert.show-alert {
        opacity: 1;
        visibility: visible;
    }
    </style>
</head>

<body>
    <div id="success-alert" class="alert">
        OTP for reset password has been sent on your register email address! Please check your email.
    </div>

    <form id="verify_otp-in-form" action="<?= site_url('verify_otp/verify'); ?>" method="POST">
        <div class="form_wrapper">
            <div class="form_container">
                <div class="title_container">
                    <h1>Verify otp</h1>
                </div>

                <div class="otp-timer" id="otp-timer"
                    style="text-align: center; font-weight: bold; margin-bottom: 15px;"></div>

                <div class="row clearfix">
                    <div class="">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i>🔒</span>
                            <input type="text" id="otp" name="otp" placeholder="Enter otp" required />
                        </div>
                        <div class="frame"><button class="custom-btn btn-9 , button" type="submit" id="register"
                                name="submit" value="submit">Submit</button>
                        </div>
                        <a href="forgot_password"> Re-generate otp </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    $otp_expiry_js = strtotime($otp_expiry) * 1000; // Convert OTP expiry time to JavaScript timestamp (milliseconds)
    ?>
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date(<?php echo $otp_expiry_js; ?>);

    // Update the count down every 1 second
    var countdownFunction = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="otp-timer"
        document.getElementById("otp-timer").innerHTML = "Time remaining: " + minutes + "m " + seconds + "s ";

        // If the count down is finished, display expired message
        if (distance < 0) {
            clearInterval(countdownFunction);
            document.getElementById("otp-timer").innerHTML = "OTP expired!";
        }
    }, 1000);
    </script>

    <script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    function showAlert() {
        var alertElement = document.getElementById('success-alert');
        alertElement.classList.add('show-alert');
        // setTimeout(function() {
        //     alertElement.classList.remove('show-alert');
        // }, 9000);
    }

    window.addEventListener('DOMContentLoaded', function() {
        var fromForgotPassword = <?= session()->get('from') === 'forgot_password' ? 'true' : 'false' ?>;
        if (fromForgotPassword) {
            showAlert();
        }
    });
    </script>
</body>

</html>