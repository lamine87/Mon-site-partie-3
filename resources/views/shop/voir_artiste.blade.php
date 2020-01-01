@extends('page2')
@section('content')
    <div class="container" >
        <div class="row" >
            <div class="col-md-8 col-sm-12 col-lg-8" id="piste" style="float: left">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" class="embed-responsive-item" src="{{$mouve->url_video}}"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>

                <br>
        <div class="row">
            <div class="col-sm-4 col-md-2 col-lg-2 ">
                <div class="votecell post-layout--left">
                    <div class="js-voting-container grid fd-column ai-stretch gs4 fc-black-200" data-post-id="11381730">


                        <div id="container">

                            <div id="photo">
                        {{--            <img src="{{asset('img/icon/like.png')}}" height="30px" width="30px" frameborder="0"/>--}}
                            </div>
                            <p id='counter'></p>

                             </div>

                            <div id="container2">

                                <div id="photo2">
                                    {{--            <img src="{{asset('img/icon/like.png')}}" height="30px" width="30px" frameborder="0"/>--}}
                                </div>
                                <p id='counter2'></p>

                        </div>

                    </div>

                </div>
             </div>

            <div class="col-sm-8 col-md-6 col-lg-6 ">
                <p class="card-text"><strong>{{$mouve->description}}</strong></p>
            </div>
        </div>
       </div>

{{--        <div class="col-md-4 col-sm-12 col-lg-4">--}}

{{--            <form action="{{route('comment_store',['id'=>$mouve->id])}}"  method="POST" enctype="multipart/form-data" class="voir">--}}
{{--                @csrf--}}
{{--                @if($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <p>{{$error}}</p>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <div class="form-row">--}}
{{--                     <div id="comment" style="overflow:scroll; height:180px;" class="form-group col-md-12">--}}

{{--                                @foreach($commentaires as $commentaire)--}}
{{--                                    <p class="comment">--}}
{{--                                    <img class="comment" src="{{asset('img/icon/user.png')}}">{{$commentaire->nom}}::--}}

{{--                                    {{$commentaire->texte}}<br>--}}
{{--                                        {{$commentaire->created_at}}--}}
{{--                                    </p>--}}
{{--                                @endforeach--}}
{{--                        </div>--}}



{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="nom">Nom</label>--}}
{{--                        <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}" placeholder="Jean">--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="email">Email</label>--}}
{{--                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="exemple@yahoo.com">--}}
{{--                    </div>--}}


{{--                    <div class="form-group col-md-12">--}}
{{--                        <label for="description"></label>--}}
{{--                        <textarea type="texte" class="form-control" name="texte" id="texte" placeholder="Votre Commentaire">{{old('texte')}}</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <button type="submit" class="">--}}
{{--                    <img src="{{asset('img/icon/envoyer3.png')}}" title="envoyer">--}}
{{--                </button>--}}

{{--              </form>--}}
{{--            </div>--}}

             <div id="app">

                 <comment-form></comment-form>

             </div>




{{--            <div class="col-md-4 col-sm-12 col-lg-4" >--}}
{{--                <div class="embed-responsive embed-responsive-16by9">--}}
{{--                    <div class="d1 conteneur1 embed-responsive-item" >--}}
{{--                        <img src="{{asset('storage/uploads/'.$mouves->photo_principale)}}"  class="card-img-top img-fluid " alt="Responsive">--}}
{{--                    </div>--}}

{{--            </div>--}}

{{--                <br>--}}
{{--                <div>--}}
{{--                    <a href="{{route('voir_titre', ['id'=>$mouves->user_id])}}" target="_self">--}}
{{--                    #Voir les titres de {{$mouves->user->name}}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}




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

