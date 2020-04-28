@extends('back-admin')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12 text-center ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                    <h1 class="h2">Liste des utilisateurs</h1>
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
                            <th>Lien Facebook</th>
                            <th>Lien Instagram</th>
                            <th>Bannir</th>
                            <th>Modifier</th>


                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tbody>
                            <tr class="table-info">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                               <td>{{$user->lien_facebook}}</td>
                               <td>{{$user->lien_instagram}}</td>

                                <td>
                                    <a onclick="return(confirm('sans regret ?'))" href="{{route('backend_bannir_user',['id'=>$user->id])}}" class="btn btn-sm btn-outline-danger">Oui</a>

                                </td>
                                <td>
                                    <a  href="{{route('backend_liste_edit',['id'=>$user->id])}}" class="btn btn-sm btn-primary">Modifier</a>
                                </td>

                          </tr>
                        </tbody>
                    @endforeach
                </table>
             </div>
                {{$users->links()}}
          </div>
    </div>
</div>
@endsection
