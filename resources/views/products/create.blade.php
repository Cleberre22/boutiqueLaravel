@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3 class="text-center mb-5"> Ajouter un produit</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-12">
                                <select name="categorie_id" class="form-select">
                                    <option value=""> Catégorie </option>
                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-12 form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3 col-12 form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Quantité</label>
                                        <input type="number" name="quantite" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-12">
                                <label for="image" class="form-label">Image du produit</label>
                                <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp">
                            </div>

                            <div class="col-sm-6 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">En avant</label>
                            </div>
                            <div class="col-sm-6 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                            </div>


                            <button type="submit" class="btn btn-primary shadow-sm my-3"> Ajouter un produit </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection