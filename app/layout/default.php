<?php
/** @var \app\entity\User $user */
$user = $user ?? null;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!--Bootstrap-->
    <link rel="stylesheet" href="/static/styles/css/bootstrap/bootstrap.css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="/static/styles/css/fontawesome/all.css">

    <!--Self-provided styles-->
    <link rel="stylesheet" href="/static/styles/css/common.css">

    <!--JQuery-->
    <script type="text/javascript" src="/static/scripts/js/jquery/jquery.js"></script>

    <!--Self-provided scripts-->
    <script type="text/javascript" src="/static/scripts/js/bundle.js"></script>

    <title>Red2Green</title>
</head>
<body>

<header style="margin-top: 10px;">
    <div class="container">
        <div class="row justify-content-around align-items-center">

            <div class="col">
                <a href="/" id="logo">
                    <img src="/static/img/earth.png" alt="earth"/>
                    <span>
                        red2green
                    </span>
                </a>
            </div>

            <div class="col text-right">
                <div class="btn-group" id="menu-container">
                    <div class="btn btn-success">
                        order a tour
                    </div>
                    <a href="#" class="btn btn-danger menu-item-optional" style="display: none;">
                        danger
                    </a>

                    <a href="/parthners/index" class="btn btn-primary menu-item-optional"
                       style="display: none;">
                        parthners
                    </a>
					
					<?php if ($user == null) { ?>

                        <a href="/sign/in" class="btn btn-secondary menu-item-optional"
                           style="display: none;">
                            sign in
                        </a>

                        <a href="/sign/up" class="btn btn-secondary menu-item-optional"
                           style="display: none;">
                            sign up
                        </a>
					
					<?php } else { ?>

                        <a href="/sign/out" class="btn btn-secondary menu-item-optional"
                           style="display: none;">
                            sign out
                        </a>
					
					<?php } ?>

                    <div class="btn btn-secondary" id="menu">
                        menu
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="content" style="margin-bottom: 10px;">
	<?= $viewContent ?? 'no content' ?>
</div>

<footer style="padding-bottom: 20px">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-6 col-lg-3 contact-list">
                <h3 class="font-weight-bold">Earth</h3>
                <ul>
                    <li>Ukraine, Kyiv, Politechnichna street, 5</li>
                    <li>+38 (099) 999 99 99</li>
                    <li>+38 (066) 666 66 66</li>
                </ul>
            </div>
            <div class="col-6 col-lg-3 contact-list">
                <h3 class="font-weight-bold">Mars</h3>
                <ul>
                    <li>Martian walley, Galle crater avenue, 3</li>
                    <li>+38 (099) 000 00 00</li>
                    <li>+38 (066) 000 00 00</li>
                </ul>
            </div>

            <div class="col-12 col-lg-3 offset-lg-3 contact-list">
                <ul>
                    <li>
                        tv61.drive@gmail.com
                    </li>
                    <li>
                        martian.team@solars.com
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    @Martian Team, 2018-2020
                </div>
                <div class="col social-list">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>