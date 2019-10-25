@extends('page')
@section('content')
    <div class="album py-5 bg-light" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">
                @foreach($artistes as $artiste)
                    <div class="col-md-3 box-shadow">
                        <a href="{{route('voir_artiste',['id'=>$artiste->id])}}" target="_self">
                            <img src="{{asset('images/'.$artiste->photo_principale)}}"  class="card-img-top img-fluid" alt="Responsive">
                            <p class="card-text"><strong>{{$artiste->nom}}</strong><br>{{$artiste->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @foreach($tags as $tag)
                <a href="#" target="_self">
                    <a href="{{route('voir_tag',['id'=>$tag->id])}}" type="button" class="btn btn-primary">{{$tag->nom}}</a>
                </a>
            @endforeach
            <br><br><br>
            <div class="col-12 text-center">
                {{$artistes->links()}}
            </div>
        </div>
    </div>
@endsection
