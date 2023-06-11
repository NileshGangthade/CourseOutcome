<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">



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
    <?= view('nav_bar') ?>

    <div id="success-alert" class="alert">
        <span id="alert-message">
            Your form is submitted successfully. Please wait for admin approval.
        </span>
    </div>

    <form id="login-in-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="form_wrapper">
            <div class="form_container">
                <div class="title_container">
                    <h1> Login</h1>
                </div>
                <div class="row clearfix">
                    <div class="">
                        <form>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope">✉</i></span>
                                <input type="email" id="email" name="email" placeholder="Email" required />
                            </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i>🔒</span>
                                <input type="password" id="password" name="password" placeholder="Password" required />
                            </div>
                            <div class="frame"><button class="custom-btn btn-9 , button" type="submit" id="register">Login</button>
                            </div>
                        </form>
                        <a href="forgot_password">Forgot password ?</a>

                    </div>
                </div>
            </div>

        </div>
    </form>
    <script src="script.js" defer></script>

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
            setTimeout(function() {
                alertElement.classList.remove('show-alert');
            }, 5000);
        }

        window.addEventListener('DOMContentLoaded', function() {
            var fromOtpEmailVerification = getParameterByName('from') === 'otp_email_verification';
            var fromNewPassword = getParameterByName('from') === 'new_password';

            if (fromOtpEmailVerification) {
                document.getElementById('alert-message').textContent =
                    'Your form is submitted successfully. Please wait for admin approval.';
                showAlert();
            } else if (fromNewPassword) {
                document.getElementById('alert-message').textContent =
                    'Password updated successfully. Now you can login with your new password.';
                showAlert();
            }
        });
    </script>

</body>

</html>