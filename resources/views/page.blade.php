<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site de musique">
    <meta name="author" content="Lamine Diarra">
    <link rel="icon" href="{{asset('img/icon/logo5-menu.png')}}" >
    <title>M223music.com le meilleur de la musique</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<!--Navbar-->
<body>

<header>

    @include('shop.nav')

</header>
<!--fin de navbar-->
<p id="top"> </p>

<!--Carousel Animation-->
<div class=" container-fluid" id="body-site">
    <div class="row">
        <div class="col-md-12">
            <div class="bs-exemple">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" height="auto" src="{{asset('images/m223-mali2.jpg')}}" alt="Musique Malienne">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto" src="{{asset('images/americain.news.jpg')}}" alt="Rap Americain">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto" src="{{asset('images/rap-francais-news.jpg')}}" alt="Rap Français">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto" src="{{asset('images/americain.news.jpg')}}" alt="Rap Americain">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto" src="{{asset('images/m223-mali2.jpg')}}" alt="Musique Malienne">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" height="auto" src="{{asset('images/rap-francais-news.jpg')}}" alt="Rap Français">
                        </div>


                    </div>

                </div>

                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin de Carousel Animation-->


@yield('content')


<!-- Footer -->

{{--<div class="plus-haut">--}}
{{--    <a href="#top" title="Haut de page" class="scrollup" >--}}
{{--        <img src="{{asset('img/icon/icon_top.png')}}" alt="Monter en haut de page" alt="Rap Malien"/>--}}
{{--    </a>--}}
{{--</div>--}}

<a href="#" title="Haut de page" class="scrollup">
    <img src="{{asset('img/icon/icon_top.png')}}" alt="Monter en haut de page" alt="Rap Malien" width="30px" height="30px"/>
</a>


<br>
<footer class="page-footer font-small indigo">

    <div class="container">

        <div class="row text-center d-flex justify-content-center pt-5 mb-3">

{{--            <div class="col-md-2 mb-3">--}}

{{--                <h6 class="text-uppercase font-weight-bold">--}}
{{--                    <a href="#">Service</a>--}}
{{--                </h6>--}}

{{--            </div>--}}


            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Conditions d'utilisation</a>
                </h6>
            </div>

            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">À propos</a>
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
                    <a href="{{route('nousContacter')}}">Contact</a>
                </h6>
            </div>

        </div>
        <hr class="rgba-white-light" style="margin: 0 15%;">

        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <div class="col-md-8 col-12 mt-5">

                <p style="line-height: 1.7rem; color: #cce5ff">
                    La musique dans le coeur résonne aussi fort que l'amour
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
                        <a href="https://www.facebook.com/M223music-105911157780003/" target="_blank"><img src="{{asset('img/icon/facebook.png')}}" height="37px" width="37px" frameborder="0" alt="Rap Français"/></a>
                    </a>
                    <!-- Twitter -->
                    <a class="Twitter">
                        <a href="https://twitter.com/m223music" target="_blank"><img src="{{asset('img/icon/twitter.png')}}" height="35px" width="35px" frameborder="0" alt="Rap Americain"/></a>

                    </a>
{{--                    <!-- Snapchat-->--}}
{{--                    <a class="snapchat">--}}
{{--                        <a href="https://www.snapchat.com" target="_blank"><img src="{{asset('img/icon/snapchat.png')}}" height="31px" width="31px" frameborder="0"/></a>--}}
{{--                    </a>--}}

                    <!--Linkedin -->
                    <a class="li-ic">
                        <a href="https://www.linkedin.com/in/m-music-b610961a9/" target="_blank"><img src="{{asset('img/icon/linkedin.png')}}" height="30px" width="30px" frameborder="0" alt="Musique Malienne"/></a>
                    </a>

                    <!--whatsapp-->
{{--                    <a class="whatsapp">--}}
{{--                        <a href="https://www.whatsapp.com" target="_blank"><img src="{{asset('img/icon/whatsapp.png')}}" height="30px" width="30px" frameborder="0"/></a>--}}
{{--                    </a>--}}

                    <!--Youtube-->
                    <a class="youtube">
                        <a href="https://www.youtube.com/channel/UCsHds9fFTG0tz4p9LprUiGA" target="_blank"><img src="{{asset('img/icon/youtube.png')}}" height="33px" width="33px" frameborder="0" alt="Musique Française"/></a>
                    </a>


                    <!--Instagram-->
                    <a class="instagram">
                        <a href="https://www.instagram.com/m223music/" target="_blank"><img src="{{asset('img/icon/instagram.png')}}" height="36px" width="36px" frameborder="0" alt="Musique Americaine"/></a>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="color: #cce5ff">© 2020 Copyright:
        <a href="#"> M223music.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<! - Accédez à www.addthis.com/dashboard pour personnaliser vos outils ->

{{--<script src="{{asset('js/app.js')}}"></script>--}}
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
<script src="{{asset('js/like.js')}}"></script>
<script src="{{asset('js/haut.js')}}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eb3c8f8ce9dc8e5"></script>
<script src="{{asset('js/haut.js')}}"></script>
<script>

    share = function(){
        url = 'https://facebook.com/sharer.php?display=popup&u=' + window.location.href;
        options = 'toolbar=0,status=0,resizable=1,width=626,height=436';
        window.open(url,'sharer',options);
    }
</script>
</body>
</html>
