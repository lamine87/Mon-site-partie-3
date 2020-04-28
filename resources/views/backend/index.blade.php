@extends('backend')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Ajouter de la Musique</h1>

                </div>
                <form action="{{route('backend_artiste_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-8">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="url_video">Url Vidéo</label>
                            <input type="text" class="form-control" id="url_video" name="url video" value="{{old('url_video')}}">
                            <a class="nav-link " href="{{route('aide_utiliser')}}"> Pour trouver l'url video cliquez ici</a>

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description">{{old('description')}}</textarea>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nom">Lien Facebook</label>
                            <input type="text" class="form-control" id="lien_facebook" name="lien facebook" value="{{old('lien_facebook')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prix_ht">Lien Instagram</label>
                            <input type="text" class="form-control" id="lien_instagram" name="lien instagram" value="{{old('lien_instagram')}}">
                        </div>
                     </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="photo_principale">Genre Musical</label>
                         <select multiple class="form-control form-control-lg" id="categories" name="categories[]">
                            @foreach($categories as $categorie)
                                <option
{{--                                    {{old('categorie_id') == $categorie->id ? "selected" : ""}}--}}
                                    value="{{$categorie->id}}">{{$categorie->nom}}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="photo_principale">Pays</label>
                        <select class="form-control form-control-lg" id="countrie_id" name="countrie_id">
                            @foreach($countries as $countrie)
                                    <option
                                        value="{{$countrie->id}}"> {{$countrie->nom}}
                                    </option>
                            @endforeach
                        </select>
                     </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="photo_principale">Photo</label>
                            <input type="file" class="form-control-file" id="photo_principale" name="photo_principale">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </main>
        </div>
    </div>
@endsection
