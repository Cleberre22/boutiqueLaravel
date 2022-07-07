@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3 class="mb-5">Liste des produits</h3>
                        <a href="{{ route('admin.products.create')}}" class="btn btn-primary btn-sm mb-3">Ajouter</a>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <!-- Tableau -->
                        <table class="table table-light table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Catégorie</th>
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
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->categorie->name}}</td>
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
                                
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection