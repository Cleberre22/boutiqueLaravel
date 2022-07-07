@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <h1 class="text-center py-5">Ma superbe boutique</h1>
    <div class="col s12 cards-container">
 
      @foreach($products as $product)
      <a href="{{ route('products.show', $product->id)}}"</a>
        <div class="card mb-3">
          <div class="card-image">
            @if($product->quantite)
              <a href="#">
            @endif
              <img src="/storage/image/{{$product->image}}">
            @if($product->quantite) </a> @endif
          </div>          
          <div class="card-content center-align">
            <p>{{ $product->name }}</p>
            @if($product->quantite)
              <p><strong>{{ number_format($product->price, 2, ',', ' ') }} € TTC</strong></p>
            @else
              <p class="red-text"><strong>Produit en rupture de stock</strong></p>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>




@endsection