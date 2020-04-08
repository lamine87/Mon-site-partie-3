@extends('backend')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Liste utilisateur</h1>

                </div>
{{--                @foreach($users as $user)--}}
{{--                    <div>{{$user->name}}</div>--}}
{{--                @endforeach--}}

                <form action="{{route('backend_liste_update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
{{--                    <div class="form-row">--}}

{{--                        <div class="form-group col-md-8">--}}
{{--                            <label for="url_video">Nom</label>--}}
{{--                            <input type="text" class="form-control" id="url_video" name="url video" value="{{$user->name}}">--}}
{{--                        </div>--}}

{{--                    </div>--}}
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
