<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/slider.css">



</head>

<body>

    <div class="main">

        <div class="container_s">
            <nav>
                <ul class="mcd-menu">
                    <li>
                        <a href="<?= site_url() ?>" class="active">
                            <i class="fa fa-home"></i>
                            <strong>Home</strong>
                            <small>sweet home</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('register') ?>">
                            <i class="fa fa-edit"></i>
                            <strong>About us</strong>
                            <small>sweet home</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-gift"></i>
                            <strong>Features</strong>
                            <small>sweet home</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('login') ?>">
                            <i class="fa fa-globe"></i>
                            <strong>News</strong>
                            <small>sweet home</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-comments-o"></i>
                            <strong>Blog</strong>
                            <small>what they say</small>
                        </a>
                        <ul>
                            <li><a href="#"><i class="fa fa-globe"></i>Mission</a></li>
                            <li>
                                <a href="#"><i class="fa fa-group"></i>Our Team</a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-female"></i>Leyla Sparks</a></li>
                                    <li>
                                        <a href="#"><i class="fa fa-male"></i>Gleb Ismailov</a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-leaf"></i>About</a></li>
                                            <li><a href="#"><i class="fa fa-tasks"></i>Skills</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="fa fa-female"></i>Viktoria Gibbers</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-trophy"></i>Rewards</a></li>
                            <li><a href="#"><i class="fa fa-certificate"></i>Certificates</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-picture-o"></i>
                            <strong>Portfolio</strong>
                            <small>sweet home</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-envelope-o"></i>
                            <strong>Contacts</strong>
                            <small>drop a line</small>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</body>

</html>