@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3 class="mb-5">Liste des promotions</h3>
                        <a href="{{ route('admin.promotions.create')}}" class="btn btn-primary btn-sm mb-3">Ajouter</a>
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
                                    <th scope="col">Date de départ</th>
                                    <th scope="col">Date de fin</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Produit</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promotions as $promotion)
                                <tr>
                                    <td>{{$promotion->id}}</td>
                                    <td>{{$promotion->name}}</td>
                                    <td>{{$promotion->description}}</td>
                                    <td>{{$promotion->start_date}}</td>
                                    <td>{{$promotion->end_date}}</td>    
                                    <td><img src="/storage/image/{{$promotion->image}}" alt="" width="100"></td>
                                    <td>@foreach($promotion->product as $product)
                                                    <span class="me-2">{{$product->name}}</span>
                                        @endforeach</td> 
                                    <td>
                                        <a href="{{ route('admin.promotions.edit', $promotion->id)}}" class="btn btn-primary btn-sm"">Editer</a>
                                        <form action=" {{ route('admin.promotions.destroy', $promotion->id)}}" method="POST" style="display: inline-block">
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