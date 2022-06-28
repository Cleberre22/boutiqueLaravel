@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer un produit</h3>
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
                        <form method="post" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3 col-12">
                                <label for="name" class="form-label">Nom de la catégorie</label>
                                <input type="text" class="form-control" value="{{$product->name}}" name="name" id="name" aria-describedby="nameHelp">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                        <label>Quantité</label>
                                        <input type="number" name="quantite" class="form-control" value="{{ $product->quantite }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="categories" class="form-label">Catégorie</label>
                                <select class="form-select" name="categorie_id" id="categories">
                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary shadow-sm">Mettre à jour</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection