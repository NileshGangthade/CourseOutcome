<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New password</title>
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

    <div id="success-alert" class="alert">
        OTP verified successfully. Please set a new password.
    </div>
    <form id="new_password-in-form" action="<?php echo base_url('/new_password/update'); ?>" method="POST" onsubmit="return validatePassword();">

        <div class="form_wrapper">
            <div class="form_container">
                <div class="title_container">
                    <h1> New password</h1>
                </div>
                <div class="row clearfix">
                    <div class="">

                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i>🔒</span>
                            <input type="password" id="password" name="password" placeholder="Enter new Password" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i>🔒</span>
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter Password" required />
                        </div>
                        <div class="frame"><button class="custom-btn btn-9 , button" type="submit" name="submit" id="register">submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <script>
        function validatePassword() {
            var password = document.getElementById("password");
            var confirmPassword = document.getElementById("confirm-password");

            // Check if password and confirm-password are the same
            if (password.value !== confirmPassword.value) {
                alert("Passwords do not match.");
                return false;
            }

            // Check if the password is at least 8 characters long
            if (password.value.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            // Check if the password contains at least one alphabet, symbol, and number
            var hasAlphabet = /[a-zA-Z]/.test(password.value);
            var hasNumber = /\d/.test(password.value);
            var hasSymbol = /[!@#$%^&*]/.test(password.value);

            if (!hasAlphabet || !hasNumber || !hasSymbol) {
                alert("Password must contain at least one alphabet, number, and symbol.");
                return false;
            }

            return true;
        }
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
            setTimeout(function() {
                alertElement.classList.remove('show-alert');
            }, 5000);
        }

        window.addEventListener('DOMContentLoaded', function() {
            var fromVerifyOtp = getParameterByName('from') === 'verify_otp';
            if (fromVerifyOtp) {
                showAlert();
            }
        });
    </script>

</body>

</html>