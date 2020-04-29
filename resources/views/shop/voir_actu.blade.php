@extends('page2')
@section('content')
    <div class="container" >
        <div class="row" >
            <div class="col-md-8 text-center" id="videActu" >

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" class="embed-responsive-item"
                            src="{{$actualite->url_video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>

                    </div>
                <div class="col-sm-8 ">
                    <p class="card-text"><strong>{{$actualite->description}}</strong></p>
                </div>
       </div>

    </div>
 </div>

@endsection

