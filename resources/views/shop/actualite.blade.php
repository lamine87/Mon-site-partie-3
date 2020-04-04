@extends('page')
@section('content')
        <div class="container" id="actu">
            <div class="row">
                @foreach($actualites as $actualite)
                    <div class="col-md-6 box-shadow">
                        <a href="{{route('voirActu',['id'=>$actualite->id])}}" target="_self">
                            <img src="{{asset('storage/uploads/'.$actualite->photo_principale)}}"  style="height: 500px" class="card-img-top img-fluid" alt="Image artiste">
                            <br> <br>
                            <div class="text-center">
                                <p class="card-text">{{$actualite->description}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

             </div>

            <div class="col-12 text-center">
                {{$actualites->links()}}
            </div>
        </div>

@endsection
