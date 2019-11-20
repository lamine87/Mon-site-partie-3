@extends('page_tag')
@section('content')
    <div class="album py-5 bg-light" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row">
                @foreach($media_tags as $media_tag)
                    <div class="col-md-2 box-shadow">
                         <a href="{{route('voir_tag',['id'=>$media_tag->tag_id])}}" target="_self">
                            <img src="{{asset('storage/uploads/'.$media_tag->photo_principale)}}"  class="card-img-top img-fluid" alt="Responsive">
                            <p class="card-text"><strong>{{$media_tag->description}}</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-12 text-center">
                {{$media_tags->links()}}
            </div>
        </div>
    </div>
@endsection
