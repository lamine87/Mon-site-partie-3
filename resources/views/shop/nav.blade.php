<nav class="navbar fixed-top navbar-expand-md  navbar-dark bg-dark ">
    <div class="logo">
        <div class="icon-accueil">
            <a href="{{route('shop_home')}}">
                <img src="{{asset('img/icon/logo-menu.png')}}">
            </a>
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
            <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false" id="variete">
                Variété
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

{{--                @foreach($categories as $categorie)--}}
{{--                    <a class="dropdown-item" href="{{route('voir_categorie',['id'=>$categorie->id])}}">--}}
{{--                        {{$categorie->nom}}--}}
{{--                    </a>--}}
{{--                @endforeach--}}
            </div>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="variete">
                    Pays
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
{{--                    @foreach($countries as $countrie)--}}
{{--                        <a class="dropdown-item" href="{{route('voirPays',['id'=>$countrie->id])}}">--}}
{{--                            {{$countrie->nom}}--}}
{{--                            <img src="{{asset('img/icon/'.$countrie->image_drapeau)}}">--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
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



