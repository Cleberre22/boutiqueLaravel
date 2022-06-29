@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center mb-5">Dashboard</h1>
            <div class="bg-secondary">
                <h2 class="mb-3">Produits:</h2>
                <a href="{{ route('admin.products.create')}}" class="btn btn-primary btn-sm mb-3">Ajouter</a>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-11 mb-3">
                        <h5 class="mb-1">Outillage:</h3>
                            <!-- Tableau -->
                            <table class="table table-light table-hover text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">En avant</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Image</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    @if($product->categorie->name == "Outillage")
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} €</td>
                                        <td>{{$product->quantite}}</td>
                                        <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" value="{{$product->ahead}}"></td>
                                        <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="{{$product->active}}"></td>
                                        <td><img src="/storage/image/{{$product->image}}" alt="" width="100"></td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-primary btn-sm"">Editer</a>
                                        <form action=" {{ route('admin.products.destroy', $product->id)}}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                                </form>
                                        </td>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">En avant</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Image</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    @if($product->categorie->name == "Salle de bains")
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} €</td>
                                        <td>{{$product->quantite}}</td>
                                        <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" value="{{$product->ahead}}"></td>
                                        <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="{{$product->active}}"></td>
                                        <td><img src="/storage/image/{{$product->image}}" alt="" width="100"></td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-primary btn-sm"">Editer</a>
                                        <form action=" {{ route('admin.products.destroy', $product->id)}}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                                </form>
                                        </td>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">En avant</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Image</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    @if($product->categorie->name == "Terrasse et jardin")
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}} €</td>
                                        <td>{{$product->quantite}}</td>
                                        <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="ahead" value="{{$product->ahead}}"></td>
                                        <td><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" value="{{$product->active}}"></td>
                                        <td><img src="/storage/image/{{$product->image}}" alt="" width="100"></td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-primary btn-sm"">Editer</a>
                                        <form action=" {{ route('admin.products.destroy', $product->id)}}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                                </form>
                                        </td>
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