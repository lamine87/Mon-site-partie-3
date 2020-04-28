@extends('back-admin')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Modifier Réseaux sociaux</h1>

                </div>

                <form action="{{route('backend_liste_update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif

                    <br><br>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="nom">Lien Facebook</label>
                            <input type="text" class="form-control" id="lien_facebook" name="lien facebook" value="{{$user->lien_facebook}}">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="prix_ht">Lien Instagram</label>
                            <input type="text" class="form-control" id="lien_instagram" name="lien instagram" value="{{$user->lien_instagram}}">
                        </div>
                     </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </main>
        </div>
    </div>
    @endsection
