<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>

<body>
    <?php include 'nav_bar.php'; ?>

    </nav>
    <form action="<?= base_url('forgot_password/sendOtp'); ?>" method="post">
        <div class="form_wrapper">
            <div class="form_container">
                <div class="title_container">
                    <h1> Forgot password</h1>
                </div>
                <div class="row clearfix">
                    <div class="">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope">✉</i></span>
                            <input type="email" id="email" name="email" placeholder="Email" required />
                        </div>
                        <div class="row clearfix">
                            <div class="input_field">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"> 👤</i></span>
                                    <input type="text" id="name" name="name" placeholder=" Name" />
                                </div>
                            </div>
                        </div>
                        <div class="frame">
                            <button class="custom-btn btn-9 , button" type="submit" id="register"
                                name="submit">submit</button>
                        </div>
                        <a href="<?= base_url('login'); ?>"> ← Back to login</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="js/script.js" defer></script>
</body>

</html>