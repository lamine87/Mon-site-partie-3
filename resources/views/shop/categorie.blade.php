@extends('page')
@section('content')
    <div class="album py-5 bg-light" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">
                @foreach($mouves as $mouve)
                    <div class="col-md-2 box-shadow">
                        <a href="{{route('voirArtiste',['id'=>$mouve->mouve_id])}}" target="_self">
                            <img src="{{asset('storage/uploads/'.$mouve->photo_principale)}}"  class="card-img-top img-fluid" alt="Photo d'artiste">

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
                                <br><br>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <br>
            <div class="col-12 text-center">
                {{$mouves->links()}}
            </div>
        </div>
    </div>
@endsection
