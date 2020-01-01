<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/icon/logo5-menu.png')}}">

    <title>@yield('title')</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            border-right: 2px solid;
            font-size: 26px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>

<!--Navbar-->
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-dark ">
        <div class="logo">
            <div class="icon-accueil"><a href="#"><img src="{{asset('img/icon/logo-menu.png')}}"></a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- link/liens de la navbar-->

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="#">Accueil<span class="sr-only"></span></a>
                </li>

            </ul>

        </div>

    </nav>
</header>



<div class="flex-center position-ref full-height">
    <div class="code">
        @yield('code')
    </div>


    <div class="message" style="padding: 10px;">
        @yield('message')
    </div>
</div>



<footer class="page-footer font-small indigo">

    <div class="container">


        <div class="row text-center d-flex justify-content-center pt-5 mb-3">

            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Service</a>
                </h6>
            </div>


            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">News</a>
                </h6>
            </div>


            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Recrutement</a>
                </h6>
            </div>


            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="mailto:m.musique223@yahoo.com">Envoyez-email</a>
                </h6>
            </div>

            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Contact</a>
                </h6>
            </div>

        </div>
        <hr class="rgba-white-light" style="margin: 0 15%;">

        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <div class="col-md-8 col-12 mt-5">

                <p style="line-height: 1.7rem; color: #cce5ff">On sait depuis longtemps que travailler avec du texte lisible

                </p>
            </div>

        </div>
        <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

        <!-- Grid row-->
        <div class="row pb-3">

            <!-- Grid column -->
            <div class="col-md-12">

                <div class="mb-5 flex-center">

                    <!-- Facebook -->
                    <a class="facebook">
                        <a href="https://fr-fr.facebook.com/" target="_blank"><img src="{{asset('img/icon/facebook.png')}}" height="37px" width="37px" frameborder="0"/></a>
                    </a>
                    <!-- Twitter -->
                    <a class="Twitter">
                        <a href="https://www.Twitter.com" target="_blank"><img src="{{asset('img/icon/twitter.png')}}" height="35px" width="35px" frameborder="0"/></a>

                    </a>
                    <!-- Snapchat-->
                    <a class="snapchat">
                        <a href="https://www.snapchat.com" target="_blank"><img src="{{asset('img/icon/snapchat.png')}}" height="31px" width="31px" frameborder="0"/></a>
                    </a>

                    <!--Linkedin -->
                    <a class="li-ic">
                        <a href="https://www.linkedin.com" target="_blank"><img src="{{asset('img/icon/linkedin.png')}}" height="30px" width="30px" frameborder="0"/></a>
                    </a>

                    <!--whatsapp-->
                    <a class="whatsapp">
                        <a href="https://www.whatsapp.com" target="_blank"><img src="{{asset('img/icon/whatsapp.png')}}" height="30px" width="30px" frameborder="0"/></a>
                    </a>

                    <!--Youtube-->
                    <a class="youtube">
                        <a href="https://www.youtube.com/?gl=FR&hl=fr" target="_blank"><img src="{{asset('img/icon/youtube.png')}}" height="33px" width="33px" frameborder="0"/></a>
                    </a>


                    <!--Instagram-->
                    <a class="instagram">
                        <a href="https://www.instagram.com/?hl=fr" target="_blank"><img src="{{asset('img/icon/instagram.png')}}" height="36px" width="36px" frameborder="0"/></a>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="color: #cce5ff">© 2019 Copyright:
        <a href="#"> MM223.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
<script src="{{asset('js/like.js')}}"></script>
</body>
</html>


