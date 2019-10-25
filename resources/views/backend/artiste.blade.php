@extends('backend')
@section('content')

             <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 embed-responsive">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                <h1 class="h2">INSERER VOS MUSIQUES</h1>
                </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Page d'Accueil</h4>
                <div class="btn-toolbar mb-2 mb-md-0 pull-right">
                    <button class="btn btn-sm btn-outline-secondary">
                        <a href="{{route('ajoutMusic')}}" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                             Nouveau
                        </a>
                    </button>
                   </div>
                 </div>
             <div class="table-responsive">
                <table class="table table-sm">
                    <thead class="table-dark">
                    <tr>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Musique</th>
                        <th>En ligne</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-info">
                        <td>1</td>
                        <td>Booba</td>
                        <td>Photo</td>
                        <td>Desc</td>
                        <td>video</td>
                        <td>oui</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Voir / Modifier</button>
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
             </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h4>Tags</h4>

                <div class="btn-toolbar mb-2 mb-md-0 pull-right">

                    <button class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        Nouveau
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Numero</th>
                        <th>Nom du Tag</th>
                        <th> Description </th>
                        <th> URL-Video</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Booba</td>
                        <td>Desc</td>
                        <td>Url</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Voir / Modifier</button>
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

                 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                     <h4>Artiste Recommandé</h4>
                     <div class="btn-toolbar mb-2 mb-md-0 pull-right">
                         <button class="btn btn-sm btn-outline-secondary">
                             <span data-feather="calendar"></span>
                             Nouveau
                         </button>
                     </div>
                 </div>
                 <div class="table-responsive">
                     <table class="table table-sm">
                         <thead class="table-dark">
                         <tr>
                             <th>Numero</th>
                             <th>Nom</th>
                             <th>Image</th>
                             <th>Description</th>
                             <th>Musique</th>
                             <th>En ligne</th>
                             <th>Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         <tr class="table-info">
                             <td>1</td>
                             <td>Booba</td>
                             <td>Photo</td>
                             <td>Desc</td>
                             <td>video</td>
                             <td>oui</td>
                             <td>
                                 <button class="btn btn-sm btn-primary">Voir / Modifier</button>
                                 <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                             </td>
                         </tr>

                         </tbody>
                     </table>
                 </div>
        </main>
@endsection
