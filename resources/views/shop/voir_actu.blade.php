@extends('page2')
@section('content')
    <div class="container" >
        <div class="row" >
            <div class="col-md-12" id="videActu">
                        <iframe  class="col-lg-7" height="100%"
                            src="{{$actualite->url_video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                <div class="col-lg-5" id="actuPhoto">
                    <img src="{{asset('storage/uploads/'.$actualite->photo_principale)}}" class="card-img-top img-fluid" alt="Musique Malienne"/>
                </div>
            <div class="col-lg-8">
                <p class="card-text"><strong>{{$actualite->description}}</strong></p>
            </div>
       </div>

    </div>
 </div>
@endsection

