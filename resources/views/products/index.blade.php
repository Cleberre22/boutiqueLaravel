@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
        
            <div class="bg-secondary">
                <h2 class="mb-3">Produits:</h2>
               
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-11 mb-3">
                        <h5 class="mb-1">Outillage:</h3>
                            <!-- Tableau -->
                            <table class="table table-light table-hover text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    @if($product->categorie->name == "Outillage")
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} €</td>
                                        <td>{{$product->quantite}}</td>
                                        <td><img src="/storage/image/{{$product->image}}" alt="" width="100"></td>
                                        <td><a href="{{ route('products.show', $product->id)}}" class="btn btn-primary btn-sm">Voir</a>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                    </div>

                    <div class="col-lg-11 mb-3">
                        <h5 class="mb-1">Salle de bains:</h3>
                            <!-- Tableau -->
                            <table class="table table-light table-hover text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    @if($product->categorie->name == "Salle de bains")
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} €</td>
                                        <td>{{$product->quantite}}</td>
                                        <td><img src="/storage/image/{{$product->image}}" alt="" width="100"></td>
                                        <td><a href="{{ route('products.show', $product->id)}}" class="btn btn-primary btn-sm">Voir</a>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                    </div>

                    <div class="col-lg-11 mb-3">
                        <h5 class="mb-1">Terrasse et jardin:</h3>
                            <!-- Tableau -->
                            <table class="table table-light table-hover text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    @if($product->categorie->name == "Terrasse et jardin")
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} €</td>
                                        <td>{{$product->quantite}}</td>
                                        <td><img src="/storage/image/{{$product->image}}" alt="" width="100"></td>
                                        <td><a href="{{ route('products.show', $product->id)}}" class="btn btn-primary btn-sm">Voir</a>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection