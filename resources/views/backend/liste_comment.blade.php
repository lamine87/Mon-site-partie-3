@extends('back-admin')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12 text-center ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h1 class="h2">Les Commentaires</h1>
                </div>
                @if (session('notice'))
                    <div class="alert alert-success">
                        {{ session('notice') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>Numero</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Texte</th>
                            <th>Supprimer</th>


                        </tr>
                        </thead>
                        @foreach($commentaires as $commentaire)
                            <tbody>
                            <tr class="table-info">
                                <td>{{$commentaire->id}}</td>
                                <td>{{$commentaire->nom}}</td>
                               <td>{{$commentaire->email}}</td>
                               <td>{{$commentaire->texte}}</td>

                                <td>
                                    <a onclick="return(confirm('sans regret ?'))" href="{{route('deleteComment',['id'=>$commentaire->id])}}" class="btn btn-sm btn-outline-danger">Supprimer</a>
                                </td>

                          </tr>
                        </tbody>
                    @endforeach
                </table>
             </div>
                {{$commentaires->links()}}
          </div>
    </div>
</div>
@endsection
