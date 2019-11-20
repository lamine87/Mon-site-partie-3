@extends('page2')
@section('content')

    <div class="container" >

        <div class="row" >
            <div class="col-md-8 col-sm-12 col-lg-8" id="piste" style="float: left">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" class="embed-responsive-item" src="{{$mouves->url_video}}"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                 <p class="card-text"><strong>{{$mouves->description}}</strong></p>
            </div>

            <div class="col-md-4 col-sm-12 col-lg-4" >
                <div class="embed-responsive embed-responsive-16by9">
                    <div class="d1 conteneur1 embed-responsive-item" >
                        <img src="{{asset('storage/uploads/'.$mouves->photo_principale)}}"  class="card-img-top img-fluid " alt="Responsive">
                    </div>
            </div>
            </div>

       <div class="col-8">
        <div class="embed-responsive">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nom@example.com">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Commentaire</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
       </div>
    </div>
 </div>

    <br><br>

    <div class="album py-5 bg-light" xmlns="http://www.w3.org/1999/html">
        <div class="container" style="float: bottom" >
            <div class="row">
                @foreach($artiste_recommandes as $artiste_recommande)
                    <div class="col-md-2 box-shadow">
                        <a href="{{route('voir_artiste',['id'=>$artiste_recommande->id])}}" target="_self">
                            <img src="{{asset('storage/uploads/'.$artiste_recommande->photo_principale)}}"  class="card-img-top img-fluid" alt="Responsive">
                            <p class="card-text"><strong>{{$artiste_recommande->nom}}</strong><br>{{$artiste_recommande->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <br><br><br>
            <div class="col-12 text-center">
                {{$artiste_recommandes->links()}}
            </div>
        </div>
    </div>
@endsection
