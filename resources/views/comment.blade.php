<div class="col-md-4 col-sm-12 col-lg-4">
<form action="{{route('comment_store',['id'=>$mouve->id])}}" method="POST" enctype="multipart/form-data" class="voir">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    <div class="form-row">
        <div id="comment" style="overflow:scroll; height:180px;" class="form-group col-md-12">

            {{--                                @foreach($commentaires as $commentaire)--}}
            {{--                                    <p class="comment">--}}
            {{--                                    <img class="comment" src="{{asset('img/icon/user.png')}}">{{$commentaire->nom}}::--}}

            {{--                                    {{$commentaire->texte}}<br>--}}
            {{--                                        {{$commentaire->created_at}}--}}
            {{--                                    </p>--}}
            {{--                                @endforeach--}}
        </div>



        <div class="form-group col-md-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}" placeholder="Jean">
        </div>



        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="exemple@yahoo.com">
        </div>


        <div class="form-group col-md-12">
            <label for="description"></label>
            <textarea type="texte" class="form-control" name="texte" id="texte" placeholder="Votre Commentaire">{{old('texte')}}</textarea>
        </div>
    </div>

    <button type="submit" class="">
        <img src="{{asset('img/icon/envoyer3.png')}}" title="envoyer">
    </button>

</form>
</div>