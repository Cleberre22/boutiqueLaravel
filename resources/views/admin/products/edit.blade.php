@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3 class="text-center mb-5">Modifier un produit</h3>
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
                        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3 col-12">

                                <label for="categories" class="form-label">Catégorie du produit</label>
                                <select class="form-select" name="categorie_id" id="categories">
                                <option value="{{ $product->categorie->id }}">{{ $product->categorie->name }}</option>
                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3 col-12 form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                            <div class="mb-3 col-12 form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" value="{{ $product->description }} rows=" 3">{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Quantité</label>
                                        <input type="number" name="quantite" class="form-control" value="{{ $product->quantite }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="image" class="form-label">Image du produit</label>
                                <input type="file" class="form-control" name="image" id="image" value="{{ $product->image }}">
                            </div>

                            <div class=" col-sm-6 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">En avant</label>
                            </div>
                            <div class="col-sm-6 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                            </div>


                            <button type="submit" class="btn btn-primary shadow-sm my-3">Modifier le produit </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection