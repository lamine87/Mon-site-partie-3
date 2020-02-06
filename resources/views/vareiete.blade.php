<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/icon/logo5-menu.png')}}" >
    <title>MM223.com</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<!--Navbar-->
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-dark ">
        <div class="logo">
            <div class="icon-accueil"><a href="{{route('shop_home')}}"><img src="{{asset('img/icon/logo-menu.png')}}"></a>
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
                    <a class="nav-link " href="{{route('afficheActu')}}">Actualité <span class="sr-only"></span></a>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="variete">
                        Pays
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($countries as $countrie)
                            <a class="dropdown-item" href="{{route('voirPays',['id'=>$countrie->id])}}">
                                {{$countrie->nom}}
                                <img src="{{asset('img/icon/'.$countrie->image_drapeau)}}" >

                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item active">
                    <a href="{{route('home')}}" target="_self" class="nav-link " >Se connecter</a>
                </li>
            </ul>

                <form  action="{{route('musicRecherche') }}" class="form-inline mt-2 mt-md-0" method="POST">
                @csrf
                <input value="{{request()->input('query')}}" class="form-control mr-sm-1" type="text" placeholder="Recherche" aria-label="Search" name="search">
                <button class="btn btn-outline-primary my-1 my-sm-0" type="submit">Rechercher</button>
            </form>

        </div>

    </nav>

</header>
<!--fin de navbar-->
<p id="top"> </p>

<!--Carousel Animation-->
<div class=" container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bs-exemple">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>


                    <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{asset('images/maitre-gims-dadju.jpg')}}" alt="First Slide" class="carousel-image">
{{--                            <div class="carousel-caption">--}}
{{--                                <h2>Meilleur artiste du mois</h2>--}}
{{--                                <h5>Je remercie tous mes fans</h5>--}}
{{--                            </div>--}}
                          </div>
                        <div class="carousel-item" class="carousel-image">
                            <img src="{{asset('images/booba-font-ecran.jpg')}}"  alt="Second Slide" class="carousel-image">
{{--                            <div class="carousel-caption">--}}
{{--                                <h2>Meilleur artiste du mois</h2>--}}
{{--                                <h5>Je remercie tous mes fans</h5>--}}
{{--                            </div>--}}
                          </div>
                        <div class="carousel-item ">
                            <img src="{{asset('images/mhd-font-ecran.jpg')}}"  alt="Mali Musique" class="carousel-image">

{{--                            <div class="carousel-caption">--}}
{{--                                <h2>Meilleur artiste du mois</h2>--}}
{{--                                <h5>Je remercie tous mes fans</h5>--}}
{{--                            </div>--}}

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

<div class="plus-haut">
    <a href="#top" title="Haut de page" class="scrollup" >
        <img src="{{asset('img/icon/icon_top.png')}}" alt="Monter en haut de page"/>
    </a>
</div>


<br>
<footer class="page-footer font-small indigo">

    <div class="container">

        <div class="row text-center d-flex justify-content-center pt-5 mb-3">

            <div class="col-md-2 mb-3">

                <h6 class="text-uppercase font-weight-bold">
                    <a href="#">Service</a>
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

{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/like.js')}}"></script>
</body>
</html>
