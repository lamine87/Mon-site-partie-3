@extends('page')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($mouves as $mouve)
                    <div class="col-md-3 box-shadow">
                        <form action="{{ route('postVue',['id'=>$mouve->id])}}"
                              method="POST" enctype="multipart/form-data">
                                @csrf
                            <a href="{{route('voirArtiste',['id'=>$mouve->id])}}" target="_self">
                                <img src="{{asset('storage/uploads/'.$mouve->photo_principale)}}"
                                     class="card-img-top img-fluid" alt="Le meilleur de la Malienne">
                            </a>

                        </form>
                            <div class="horloge">
                                <div class="time">
                                <img src="{{asset('img/icon/icons8-horloge-64.png')}}" height="18px" width="18px"/>
                                    {{$mouve->created_at->format('d.M.y')}}

                                </div>
{{--                                <div>--}}
{{--                                    <a class="partage" onclick="share()" title="Partager sur facebook">--}}
{{--                                        <img src="{{asset('img/icon/facebook-c32.png')}}" height="18px" width="18px"/>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                                <div>
                                     <img src="{{asset('img/icon/icon-partager-24.png')}}" class="reseaux" height="15px" width="15px"/>
                                </div>
                                <div>
                                    <img src="{{asset('img/icon/icon-visible2.png')}}" class="reseaux" height="20px" width="20px"/>
                                </div>
                                <div>
                                     <img src="{{asset('img/icon/icon-coeur-48.png')}}" class="reseaux" height="20px" width="20px"/>
{{--                                    @if($like->count()>0)--}}
                                    @foreach($likes as $like)
                                        @if($mouve->id == $like->mouve_id)

                                            {{$like->like_id}}
                                        @endif
                                    @endforeach
{{--                                        @endif--}}
                                </div>
                            </div>
                            <div class="text-center">
                            @foreach($users as $user)
                                @if($user->id == $mouve->user_id)
                                <strong>{{$user->name}}</strong>
                                @endif
                            @endforeach
                                <p class="card-text">{{$mouve->description}}</p>

                                @foreach($users as $user)
                                    @if($user->id == $mouve->user_id)
                                <a href="{{asset($user->lien_facebook)}}" type="" title="Facebook" class="" target="_blank"><img src="{{asset('img/icon/facebook-c32.png')}}" alt="facebook"></a>
                                <a href="{{asset($user->lien_instagram)}}" type=""  title="Instagram" class="" target="_blank"><img src="{{asset('img/icon/insta-c32.png')}}" alt="instagram"></a>
                                    @endif
                                @endforeach
                                <br><br><br>
                            </div>
                    </div>
                @endforeach
                    <br>  <br>
                    <div class="col-md-12 text-center">
                        {{$mouves->links()}}
                    </div>
            </div>
            <br> <br>

     @include('button-tag')

        </div>
</div>
@endsection

