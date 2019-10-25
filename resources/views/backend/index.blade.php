@extends('backend')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Ajouter de la Musique</h1>

                </div>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prix_ht">Url-video</label>
                            <input type="text" class="form-control" id="prix_ht" name="prix_ht">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nom">Url-Facabook</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prix_ht">Url-Instagram</label>
                            <input type="text" class="form-control" id="prix_ht" name="prix_ht">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="photo_principale">Photo</label>
                            <input type="file" class="form-control-file" id="photo_principale" name="photo_principale">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_id">Catégorie</label>
                            <select class="form-control form-control-lg" id="category_id" name="category_id">
                                <option>Catégorie nom</option>
                                <option>Catégorie nom</option>
                                <option>Catégorie nom</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </main>
        </div>
    </div>
    @endsection
