<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="/static/libs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/static/libs/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="/static/styles/css/common.css?v=<?= rand() ?>">
    <script type="text/javascript" src="/static/libs/jquery/dist/jquery.js"></script>
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
                <div class="btn-group">
                    <div class="btn btn-success">
                        order a tour
                    </div>
                    <div id="menu" class="btn btn-secondary">
                        menu
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="content" style="margin-top: 10px; margin-bottom: 10px;">
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