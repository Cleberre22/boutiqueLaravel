@extends('layout')
@section('content')
<div class="container py-5">
<h1>HEYYYY</h1>
@foreach($promotions as promotion) 
    @foreach($promotion->products as $product)
        {{ $product->name }}
    @andforeach
@endforeach

</div>
@endsection