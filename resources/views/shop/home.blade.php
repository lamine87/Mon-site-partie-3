@extends('page')
@section('content')
    <div class="album py-5 bg-light" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">
                @foreach($artistes as $artiste)
                    <div class="col-md-3 box-shadow">
                        <a href="{{route('voir_artiste',['id'=>$artiste->id])}}" target="_self">
                            <img src="{{asset('storage/uploads/'.$artiste->photo_principale)}}"  class="card-img-top img-fluid" alt="Responsive">

                            <div class="text-center">
                                <p class="card-text"><strong>{{$artiste->nom}}</strong><br>{{$artiste->description}}</p>
                                <a href="{{asset($artiste->lien_facebook)}}" type="button" class="btn btn-warning" target="_blank">Facebook</a>
                                <a href="{{asset($artiste->lien_instagram)}}" type="button" class="btn btn-warning" target="_blank">instagram</a>
                                <br><br>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>
            <br>
            @foreach($tags as $tag)
                <a href="{{route('voir_tag',['id'=>$tag->id])}}" type="button" class="btn btn-primary">{{$tag->nom}}</a>
            @endforeach
           <br><br> <br>
            <div class="col-12 text-center">
                {{$artistes->links()}}
            </div>
        </div>
    </div>
@endsection
