@extends('layout')
@section('content')
<div class="row d-flex justify-content-center">
        <div class="col-lg-10">
          <div class="d-flex justify-content-center p-5">
            <img class="img-fluid" src="/storage/image/{{$product->image}}" alt="" width="350">
          </div>
          
          <div class="justify-content-start mb-4">
            <h2 class="mb-4">{{$product->name}}</h2>
            <p>Catégorie du produit: {{$product->categorie->name}}</p>
            <p>{{ $product->description }}</p>
            <div>{{$product->price}} € - quantité en stock: {{$product->quantite}}</div>
          </div>
          <div>
            <p class="justify-content-end">
            <a class="nav-link" href="{{ url('/products') }}">Retour aux Produits</a>
              
            </p>
          </div>
        </div>
      </div>
      @endsection